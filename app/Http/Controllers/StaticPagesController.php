<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    public function home()
    {
      return view('static_pages.home');
    }

    public function painter()
    {
      return view('static_pages.painter');
    }

    public function writer()
    {
      return view('static_pages.writer');
    }

    public function works()
    {
      return view('static_pages.works');
    }

    public function kuolie()
    {
      return view('static_pages.kuolie');
    }
}
