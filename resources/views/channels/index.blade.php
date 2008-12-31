@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                           @foreach($channels as $channel)
                            <tr>
                                <td>{{$channel->title}}</td>
                                <td>
                                <a href="{{route('channels.edit',$channel->id)}}" class="btn btn-xs btn-info">Edit</a>
                                </td>
                                <td>
                                    {!!Form::open(['method'=>'DELETE','action'=>['ChannelsController@destroy',$channel->id]])!!}
                                    <div class="form-group">
                                        {!!Form::submit('Delete',['class'=>'btn btn-xs btn-danger'])!!}
                                    </div>
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
   
@endsection
