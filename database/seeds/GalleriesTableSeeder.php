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
      $gallery = factory(Gallery::class)->times(30)->make();
      Gallery::insert($gallery->toArray());

      for($i = 1; $i <= 30; $i++)
      {
        $gallery = Gallery::find($i);
        if($i <= 10)
        {
          $gallery->imageable_id = $i;
          $gallery->user_id = \App\Poster::find($i)->get_user()->id;
          $gallery->imageable_type = 'App\Poster';

        }elseif($i > 10 && $i <= 20){

          $id = $i%10;
          if($id == 0){
            $id =10;
          }
          $gallery->imageable_id = $id;
          $gallery->user_id = \App\Setting::find($id)->get_user()->id;
          $gallery->imageable_type = 'App\Setting';

        }else{

          $id = $i%10;
          if($id == 0){
            $id =10;
          }
          $gallery->imageable_id = $id;
          $gallery->user_id = \App\Sketch::find($id)->get_user()->id;
          $gallery->imageable_type = 'App\Sketch';

        }

        $gallery->save();

      }
    }
}
