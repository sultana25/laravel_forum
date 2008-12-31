<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class DiscussionsController extends Controller
{
    public function create()
    {
        $channel=Channel::pluck('title','id')->all();
        return view('discuss',compact('channel'));
      
         	       
        
       
    }
    
    public function store()
    {
        dd(request());
    }
}
