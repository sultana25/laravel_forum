@extends('layouts.app')

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
                    <p>
                        {{$discussion->replies->count()}}Replies
                    </p>
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
                    <p>
                        Like
                    </p>
                </div>
            </div>
            @endforeach

            <div class="panel panel-default">
                <div class="panel-body">
                    {!!Form::open(['method'=>'POST','action'=>['DiscussionsController@reply',$discussion->id]])!!}
                    <div class="form-group">
            
                    {!!Form::textarea('content',null,['class'=>'form-control'])!!}
                    </div>
                    
                    <div class="form-group">
                        <div class="text-center">
                        {!!Form::submit('Leave a comment',['class'=>'btn btn-success'])!!}
                        </div>
                    </div>
                </div>
            
            </div>
     
@endsection
