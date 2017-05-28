<?php

use Illuminate\Database\Seeder;
use App\Story;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $story = factory(Story::class)->times(10)->make();
      Story::insert($story->toArray());

      for($i = 1; $i <= 10; $i++)
      {
        $story = Story::find($i);
        $story->user_id = $i;
        $story->save();
      }
    }
}
