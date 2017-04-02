<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebtoonsController extends Controller
{

     public function create(Request $request)
     {
       return view('works.genre_create',compact('request'));
     }


    public function store(Request $request)
    {
        return 'webtoons controller store';
    }

    
}
