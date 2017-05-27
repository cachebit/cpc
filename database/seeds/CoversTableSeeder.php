<?php

use Illuminate\Database\Seeder;
use App\Cover;

class CoversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cover = factory(Cover::class)->times(500)->make();
      Cover::insert($cover->toArray());

      for($i = 1; $i <= 500; $i++)
      {
        $cover = Cover::find($i);
        $cover->imageable_id = $i;
        $cover->save();
      }
    }
}
