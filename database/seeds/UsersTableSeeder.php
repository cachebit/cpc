<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(User::class)->times(50)->make();
      User::insert($users->toArray());

      $user = User::find(1);
      $user->name = 'ray';
      $user->email = 'gunsmoke@qq.com';
      $user->password = bcrypt('password');
      $user->activated = true;
      $user->activation_token = null;
      $user->aesthetic = 100;
      $user->passion = 100;
      $user->experience = 0;
      $user->practice = 0;
      $user->title = '宗师';
      $user->group = '创始人';
      $user->save();
    }
}
