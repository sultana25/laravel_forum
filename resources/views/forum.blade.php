@extends('layouts.app')

@section('content')
            @foreach($discussions as $d)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <img src="{{$d->user->avatar}}" alt="" width="50px" height="50px">&nbsp;&nbsp;
                        <span>{{$d->user->name}} <b>{{$d->created_at->diffForHumans()}}</b></span>
                        <a href="{{route('Discussion',['slug'=>$d->slug])}}" class="btn btn-default pull-right">View</a>
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
                    <p>
                        {{$d->replies->count()}}Replies
                    </p>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                {{$discussions->links()}}
            </div>
@endsection

