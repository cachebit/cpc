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
      for($i = 1; $i <= 30; $i++)
      {
        $gallery = factory(Gallery::class)->make();
        if($i <= 10)
        {
          $user = \App\Poster::find($i)->get_user();
          $gallery->imageable_id = $i;
          $gallery->imageable_type = 'App\Poster';

        }elseif($i > 10 && $i <= 20){

          $id = $i%10;
          if($id == 0){
            $id =10;
          }
          $user = \App\Setting::find($id)->get_user();
          $gallery->imageable_id = $id;
          $gallery->imageable_type = 'App\Setting';

        }else{

          $id = $i%10;
          if($id == 0){
            $id =10;
          }
          $user = \App\Sketch::find($id)->get_user();
          $gallery->imageable_id = $id;
          $gallery->imageable_type = 'App\Sketch';

        }

        $user->galleries()->save($gallery);

      }
    }
}
