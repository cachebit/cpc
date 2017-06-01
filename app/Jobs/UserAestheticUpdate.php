<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Gallery;
use Log;


class UserAestheticUpdate extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $gallery;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Gallery $gallery)
    {
      $this->gallery = $gallery;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      Log::info('进入 UserAestheticUpdate 队列');
      $scores = $this->gallery->scores;

      $scores->each(function ($score, $key) {
        $score->get_user()->update_aesthetic();
      });
    }
}
