@extends('layouts.app')
@section('stylesheets')
{!!Html::style('css/parsley.css')!!}
@endsection
@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Create a new channel</div>

                <div class="panel-body">
                    {!!Form::open(['method'=>'POST','action'=>'ChannelsController@store','data-parsley-validate'=>''])!!}
                    <div class="form-group">
                       
                        {!!Form::label('title','Channel:')!!}
                        {!!Form::text('title',null,['class'=>'form-control','required'=>''])!!}
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
@section('scripts')
{!!Html::script('js/parsley.min.js')!!}
@endsection
