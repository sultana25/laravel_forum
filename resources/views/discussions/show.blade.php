@extends('layouts.app')
@section('stylesheets')
{!!Html::style('css/parsley.css')!!}
@endsection

@section('content')

          
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <img src="{{$discussion->user->avatar}}" alt="" width="50px" height="50px">&nbsp;&nbsp;
                        <span>{{$discussion->user->name}} <b>{{$discussion->created_at->diffForHumans()}}</b></span>
                        <a href="{{route('Discussion',['slug'=>$discussion->slug])}}" class="btn btn-default pull-right">View</a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        <h5>{{$discussion->title}}</h5>
                        <hr>
                        <p>
                            {{$discussion->content}}
                        </p>
                    </div>
                </div>
                <div class="panel-footer">
                     <span>
                        {{$discussion->replies->count()}}Replies
                    </span>
                    <a href="{{route('channel',$discussion->channel->slug)}}" class="btn btn-default pull-right btn-xs">{{$discussion->channel->title}}</a>
                </div>
            </div>
            @foreach($discussion->replies as $reply)
             <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <img src="{{$reply->user->avatar}}" alt="" width="50px" height="50px">&nbsp;&nbsp;
                        <span>{{$reply->user->name}} <b>{{$reply->created_at->diffForHumans()}}</b></span>
                        
                    </div>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        
                        <p>
                            {{$reply->content}}
                        </p>
                    </div>
                </div>
                <div class="panel-footer">
                    @if($reply->is_liked_by_auth_user())
                    <a href="{{route('reply.unlike',$reply->id)}}" class="btn btn-danger btn-xs">Unlike<span class="badge">{{$reply->likes->count()}}</span></a>
                    
                    @else
                    <a href="{{route('reply.like',$reply->id)}}" class="btn btn-success btn-xs">Like<span class="badge">{{$reply->likes->count()}}</span></a>
                    @endif
                </div>
            </div>
            @endforeach

            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Auth::check())
                    {!!Form::open(['method'=>'POST','action'=>['DiscussionsController@reply',$discussion->id],'data-parsley-validate'=>''])!!}
                    <div class="form-group">
            
                    {!!Form::textarea('content',null,['class'=>'form-control','required'=>''])!!}
                    </div>
                    
                    <div class="form-group">
                        <div class="text-center">
                        {!!Form::submit('Leave a comment',['class'=>'btn btn-success '])!!}
                        </div>
                    </div>
                    @else
                    <div class="text-center">
                        <h3>Sign in to leave a reply</h3>
                    </div>
                    @endif
                </div>
            
            </div>
     
@endsection
@section('scripts')
{!!Html::script('js/parsley.min.js')!!}
@endsection
