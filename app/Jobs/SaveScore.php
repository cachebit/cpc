<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Gallery;
use App\Score;
use App\User;

class SaveScore extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $gallery;
    protected $grade;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Gallery $gallery, $grade)
    {
      $this->gallery = $gallery;
      $this->grade = $grade;
      $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $score = new Score();
      $score->score = $this->grade;
      $score->user_id = $this->user->id;
      $this->gallery->scores()->save($score);

      $score_array = $this->gallery->imageable->scores;

      $aesthetic = $this->user->aesthetic;
      if($score_array == '')
      {
        $score_array = $aesthetic.' ';
      }else{
        $aesthetic_sum = 0.0;
        for($i = 0; $i < strlen($score_array); $i++)
        {
          if($score_array[$i] == ' ')
          {
            $aesthetic_sum = substr($score_array, 0, $i);
            $score_array = substr($score_array, ($i+1));
            $aesthetic_sum+=$aesthetic;
            $score_array = $aesthetic_sum.' '.$score_array;
            break;
          }
        }
      }

      $grade = round($this->grade*$this->user->aesthetic, 2);

      $this->gallery->imageable->scores = $score_array.$grade.' ';
      $this->gallery->imageable->save();
      if(count($this->gallery->scores) >= 5)
      {
        $this->gallery->scored();
      }
    }
}
