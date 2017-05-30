<?php

use Illuminate\Database\Seeder;
use App\Poster;
use App\Story;

class PostersTableSeeder extends Seeder
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
        $poster = factory(Poster::class)->make();
        $story = Story::find($i);
        $story->posters()->save($poster);
      }
    }
}
