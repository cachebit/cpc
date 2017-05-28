<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $score = factory(Score::class)->times(120)->make();
      Score::insert($score->toArray());

      for($i = 1; $i <= 120; $i++)
      {
        $id = $i%30;
        if($id == 0)
        {
          $id = 30;
        }
        if($i<=30){
          $user_id = 1;
        }elseif($i>30 && $i <=60){
          $user_id = 2;
        }elseif($i>60 && $i <=90){
          $user_id = 3;
        }elseif($i>90 && $i <=120){
          $user_id = 4;
        }

        $user_id+=10;
        $score = Score::find($i);
        $score->user_id = $user_id;
        $score->gallery_id = $id;
        $score->save();

        $score_string = $score->gallery->imageable->scores;
        $score->gallery->imageable->scores = $score_string.$score->score.' ';
        $score->gallery->imageable->save();
      }
    }
}
