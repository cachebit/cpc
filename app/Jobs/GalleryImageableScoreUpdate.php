<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Gallery;

class GalleryImageableScoreUpdate extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Gallery $gallery)
    {
      $scores = $gallery->imageable->scores;
      $score_array = explode(' ', $scores);
      $sum = (float)0.0;
      $n = count($score_array);
      $grade = 0.0;
      $diff = 0;
      for($i = 1; $i < $n; $i++)
      {
        if($score_array[$i] == '')
        {
          $diff++;
        }else{
          $sum+=$score_array[$i];
        }
      }
      $grade = (float)$sum/$score_array[0];

      $grade = round($grade, 2);

      $gallery->imageable->score = $grade;
      $gallery->imageable->save();
    }
}
