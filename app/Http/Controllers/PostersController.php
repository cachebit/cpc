<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Poster;
use App\SingleFrame;

class PostersController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'posters']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'genre' => 'required',
      ]);

      $poster = Poster::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $poster->genre;

      return $this->$function($poster);
    }

    public function single_frames(Poster $poster)
    {
      $single_frame = new SingleFrame([
        'user_id' => $poster->user_id,
        'path' => 'image path',
      ]);

      $poster->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

}
