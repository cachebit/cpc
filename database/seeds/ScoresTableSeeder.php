<?php

use Illuminate\Database\Seeder;
use App\Score;
use App\User;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      for($i = 1; $i <= 120; $i++)
      {
        $score = factory(Score::class)->make();

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
        $user = User::find($user_id);
        $score->gallery_id = $id;
        $user->scores()->save($score);

        $score_array = $score->gallery->imageable->scores;
        $aesthetic = $score->get_user()->aesthetic;

        if($score_array == '')
        {
          $score_array = $aesthetic.' ';
        }else{
          $aesthetic_sum = 0.0;
          for($j = 0; $j < strlen($score_array); $j++)
          {
            if($score_array[$j] == ' ')
            {
              $aesthetic_sum = substr($score_array, 0, $j);
              $score_array = substr($score_array, ($j+1));
              $aesthetic_sum = $aesthetic_sum+$aesthetic+0.016;
              $aesthetic_sum = round($aesthetic_sum, 2);
              $score_array = $aesthetic_sum.' '.$score_array;
              break;
            }
          }
        }
        $grade = $score->score*$aesthetic;
        $grade = round($grade, 2);

        $score->gallery->imageable->scores = $score_array.$grade.' ';
        $score->gallery->imageable->save();
      }
    }
}
