<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscussionRequest;
use App\Http\Requests\ReplyRequest;
use App\Channel;
use App\Discussion;
use App\Reply;
use Auth;
use Session;
use App\User;
use Notification;

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
        $best_ans=$discussion->replies()->where('best_answer',1)->first();
        return view('discussions.show',compact('discussion','best_ans'));
    }
    
    public function reply(ReplyRequest $request,$id)
    {
       
      $discussion=Discussion::find($id);
        
        $reply=Reply::create([
            'user_id'=>Auth::id(),
            'discussion_id'=>$id,
            'content'=>$request->content
        ]);
        $reply->user->points += 25;
        $reply->user->save();
         $watchers=array();
        foreach($discussion->watchers as $watcher):
            array_push($watchers,User::find($watcher->user_id));
        endforeach;
        Notification::send($watchers,new \App\Notifications\NewReplyAdded($discussion));
        
        Session::flash('success','Reply have been created successfully');
        return redirect()->back();
    }
    
    
    
    
    
    
    
}
