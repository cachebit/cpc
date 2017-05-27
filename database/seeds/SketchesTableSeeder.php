<?php

use Illuminate\Database\Seeder;
use App\Sketch;

class SketchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sketch = factory(Sketch::class)->times(500)->make();
      Sketch::insert($sketch->toArray());

      for($i = 1; $i <= 500; $i++)
      {
        $sketch = Sketch::find($i);
        $sketch->story_id = $i;
        $sketch->save();
      }
    }
}
