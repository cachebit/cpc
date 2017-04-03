<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function upload()
    {
      return view('static_pages.upload');
    }

    public function store(Request $request)
    {
      dd($request);
      $img = $request->file('photo');
      dd($img);
    }
}
