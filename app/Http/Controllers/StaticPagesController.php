<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Image;

class StaticPagesController extends Controller
{
    public function home()
    {
      return view('static_pages.home');
    }

    public function create()
    {
      return view('static_pages.create');
    }

    public function test()
    {
      $img = Image::make('test/test.jpg');
      $img->resize(320,240)->save('test/small.jpg');
      return view('static_pages.test');
    }
}
