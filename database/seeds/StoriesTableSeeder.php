<?php

use Illuminate\Database\Seeder;
use App\Story;
use App\User;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 10; $i++)
      {
        $story = factory(Story::class)->make();
        $user = User::find($i);
        $user->stories()->save($story);
      }
    }
}
