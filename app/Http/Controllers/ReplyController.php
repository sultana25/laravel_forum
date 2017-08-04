<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Like;
use App\Reply;

class ReplyController extends Controller
{
    public function like($id)
    {
        $reply=Reply::find($id);
         Like::create([
        'reply_id'=>$id,
        'user_id'=>Auth::id()
        ]);
        
    Session::flash('success','You liked the reply.');
    return redirect()->back();
    }
    
    
    public function unlike($id)
    {
        $like=Like::where('reply_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();
        Session('success','You unlked the reply.');
        return redirect()->back();
    }
    
   public function best_ans($id)
   {
       $reply=Reply::find($id);
       $reply->best_answer=1;
       $reply->save();
       $reply->user->points += 100;
       $reply->user->save();
       Session::flash('success','reply have been marked as a best answer');
       return redirect()->back();
   }
   
     
}
