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
      $sketch = factory(Sketch::class)->times(10)->make();
      Sketch::insert($sketch->toArray());

      for($i = 1; $i <= 10; $i++)
      {
        $sketch = Sketch::find($i);
        $sketch->story_id = $i;
        $sketch->save();
      }
    }
}
