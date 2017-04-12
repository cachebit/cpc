<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Mail;
use App\Type;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', [
        'only' => ['edit', 'update', 'show', 'index', 'destroy']
      ]);

      $this->middleware('guest', [
            'only' => ['create', 'store']
      ]);
    }

    public function works($id)
    {
      $opuscules = new Type;
      $opuscules->getTypes($id,'opuscules','30');
      dd($opuscules);
      return view('users.works', ['opuscules' => $opuscules]);
    }

    public function create()
    {
      return view('users.create');
    }

    public function index()
    {
      $users = User::paginate(30);
      return view('users.index', compact('users'));
    }

    public function show($id)
    {
      $user = User::findOrFail($id);
      return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|min:6'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'character' => '围观群众',
        'portrait_path' => '/img/portrait/user.gif',
        'prestige' => '50',
        'experience' => '0'
      ]);

      $this->sendEmailConfirmationTo($user);
      session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
      return redirect('/');
    }

    protected function sendEmailConfirmationTo($user)
    {
      $view = 'emails.confirm';
      $data = compact('user');
      $from = 'gunsmoke@qq.com';
      $name = 'Gray';
      $to = $user->email;
      $subject = "感谢注册 CPC 应用！请确认你的邮箱。";

      Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
          $message->from($from, $name)->to($to)->subject($subject);
      });
    }

    public function confirmEmail($token)
    {
      $user = User::where('activation_token', $token)->firstOrFail();

      $user->activated = true;
      $user->activation_token = null;
      $user->save();

      Auth::login($user);
      session()->flash('success', '恭喜你，激活成功！');
      return redirect()->route('users.show', [$user]);
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      $this->authorize('update', $user);
      return view('users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:50',
        'original_password' => 'required',
        'password' => 'confirmed|min:6',
      ]);

      $user = User::findOrFail($id);
      $this->authorize('update', $user);

      $credentials = [
        'id' => $user->id,
        'password' => $request->original_password,
      ];

      if (Auth::attempt($credentials))
      {
        $data = [];
        $data['name'] = $request->name;
        if($request->password)
        {
          $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $id);
      } else {
        session()->flash('danger', '初始密码不正确，资料未作更改！');
        return redirect()->back();
      }
    }

    public function destroy($id, Request $request)
    {
      $this->validate($request, [
        'password' => 'required',
      ]);

      $user = User::findOrFail($id);
      $this->authorize('update', $user);

      $credentials = [
        'id' => $user->id,
        'password' => $request->password,
      ];

      if(Auth::attempt($credentials))
      {
        $user->delete();
        session()->flash('success', '您的账号已完全删除，再见！');
        Auth::logout();
        return redirect('/');
      } else {
        session()->flash('danger', '密码不正确，删除帐户失败！');
        return redirect()->back();
      }

    }
}
