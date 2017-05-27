<?php

use Illuminate\Database\Seeder;
use App\Gallery;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $gallery = factory(Gallery::class)->times(1500)->make();
      Gallery::insert($gallery->toArray());

      for($i = 1; $i <= 1500; $i++)
      {
        $gallery = Gallery::find($i);
        if($i <= 500)
        {
          $id = $i%500;
          if($id == 0){
            $id =500;
          }
          $gallery->imageable_id = $id;
          $gallery->user_id = \App\Poster::find($id)->first()->get_user()->id;
          $gallery->imageable_type = 'App\Poster';

        }elseif($i > 500 && $i <= 1000){

          $id = $i%500;
          if($id == 0){
            $id =500;
          }
          $gallery->imageable_id = $id;
          $gallery->user_id = \App\Setting::find($id)->first()->get_user()->id;
          $gallery->imageable_type = 'App\Setting';

        }else{

          $id = $i%500;
          if($id == 0){
            $id =500;
          }
          $gallery->imageable_id = $id;
          $gallery->user_id = \App\Sketch::find($id)->first()->get_user()->id;
          $gallery->imageable_type = 'App\Sketch';

        }

        $gallery->save();

      }
    }
}
