@extends('layouts.app')

@section('content')
            @foreach($discussions as $d)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <img src="{{$d->user->avatar}}" alt="" width="50px" height="50px">&nbsp;&nbsp;
                        <span>{{$d->user->name}} <b>{{$d->created_at->diffForHumans()}}</b></span>
                        <a href="{{route('Discussion',['slug'=>$d->slug])}}" class="btn btn-default btn-xs pull-right" style="margin-left:9px;">View</a>
                        @if($d->hasBestAnswer())
                            <span class="btn btn-success btn-xs pull-right">Closed</span>
                        @else
                            <span class="btn btn-danger btn-xs pull-right">Open</span>
                        @endif
                    </div>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        <h5>{{$d->title}}</h5>
                        <p>
                            {{str_limit($d->content,100)}}
                        </p>
                    </div>
                </div>
                <div class="panel-footer">
                    <span>
                        {{$d->replies->count()}}Replies
                    </span>
                    <a href="{{route('channel',$d->channel->slug)}}" class="btn btn-default pull-right btn-xs">{{$d->channel->title}}</a>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                {{$discussions->links()}}
            </div>
@endsection

