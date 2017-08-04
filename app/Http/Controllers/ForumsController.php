<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;

class ForumsController extends Controller
{
    public function index()
    {
        $discussions=Discussion::orderBy('created_at','desc')->paginate(2);
        return view('forum',compact('discussions'));
    }
    
    public function channel($slug)
    {
        $discussions=Channel::whereSlug($slug)->first()->discussions()->paginate(1);
        return view('channel',compact('discussions'));
    }
}
