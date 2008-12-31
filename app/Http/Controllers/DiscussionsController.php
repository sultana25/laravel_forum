<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscussionRequest;
use App\Channel;
use App\Discussion;
use Auth;
use Session;

class DiscussionsController extends Controller
{
    public function create()
    {
        $channel=Channel::pluck('title','id')->all();
        return view('discuss',compact('channel'));
      
         	       
        
       
    }
    
    public function store(DiscussionRequest $request)
    {
        $discussion=Discussion::create([
            'title'=>$request->title,
            'channel_id'=>$request->channel_id,
            'content'=>$request->content,
            'user_id'=>Auth::id(),
            'slug'=>str_slug($request->title)
        ]);
        Session::flash('success','Discussion have been created');
        return redirect()->route('Discussion',['slug'=>$discussion->slug]);
        
    }
    
    
    public function show($slug)
    {
        $discussion=Discussion::whereSlug($slug)->first();
        return view('discussions.show',compact('discussion'));
    }
}
