<?php

use Illuminate\Database\Seeder;
use App\Poster;

class PostersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $poster = factory(Poster::class)->times(500)->make();
      Poster::insert($poster->toArray());

      for($i = 1; $i <= 500; $i++)
      {
        $poster = Poster::find($i);
        $poster->story_id = $i;
        $poster->save();
      }
    }
}
