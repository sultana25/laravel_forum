<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        //$discussions=Discussion::orderBy('created_at','desc')->paginate(2);
        switch(request('filter'))
        {
            case 'me':
                $results=Discussion::where('user_id',Auth::id())->paginate(2);
                break;
                
            case 'solved':
                $answered=array();
                foreach(Discussion::all() as $d)
                {
                    if($d->hasBestAnswer())
                    {
                        array_push($answered,$d);
                    }
                }
                $results=new paginator($answered,3);
                break;
                
                case 'unsolved':
                $unanswered=array();
                foreach(Discussion::all() as $d)
                {
                    if(!$d->hasBestAnswer())
                    {
                        array_push($unanswered,$d);
                    }
                }
                $results=new paginator($unanswered,2);
                break;
                
            default:
                $results=Discussion::orderBy('created_at','desc')->paginate(2);
                break;
        }
        return view('forum')->with(['discussions'=>$results]);
    }
    
    public function channel($slug)
    {
        $discussions=Channel::whereSlug($slug)->first()->discussions()->paginate(1);
        return view('channel',compact('discussions'));
    }
}
