@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Create a discussion</div>

                <div class="panel-body">
                    {!!Form::open(['method'=>'POST','action'=>'DiscussionsController@store'])!!}
                    <div class="form-group">
                        {!!Form::label('channel','Pick a channel')!!}
                        {!! Form::select('channel_id', ['' => 'Choose Options']+$channel, null, ['class'=> 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('content','Ask questiopn')!!}
                        {!!Form::textarea('content',null,['class'=>'form-control'])!!}
                    </div>
                      <div class="form-group">
                       <div class="text-center">
                           {!!Form::submit('Create',['class'=>'btn btn-success'])!!}
                       </div>
                        
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
    
@endsection
