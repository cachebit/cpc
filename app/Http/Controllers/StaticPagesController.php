<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Queue;
use Log;


class StaticPagesController extends Controller
{
    public function home()
    {
      return view('static_pages.home');
    }

    public function create()
    {
      return view('create.create');
    }

    public function beans()
    {
      Queue::push(function($job)
      {

        Log::info('beanstaldk 成功记录此消息。');

        $job->delete();

      });
    }

}
