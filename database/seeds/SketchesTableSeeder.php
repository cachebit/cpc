<?php

use Illuminate\Database\Seeder;
use App\Sketch;
use App\Story;

class SketchesTableSeeder extends Seeder
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
        $sketch = factory(Sketch::class)->make();
        $story = Story::find($i);
        $story->posters()->save($sketch);
      }
    }
}
