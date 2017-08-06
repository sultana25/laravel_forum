
@extends('layouts.app')
@section('stylesheets')
{!!Html::style('css/parsley.css')!!}
@endsection
@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Update a reply</div>

                <div class="panel-body">
                    {!!Form::model($reply,['method'=>'PATCH','action'=>['ReplyController@update',$reply->id],'data-parsley-validate'=>''])!!}
                    
                   
                    <div class="form-group">
                        {!!Form::label('content','Ask questiopn')!!}
                        {!!Form::textarea('content',null,['class'=>'form-control','required'=>''])!!}
                    </div>
                      <div class="form-group">
                       <div class="text-center">
                           {!!Form::submit('Save',['class'=>'btn btn-success'])!!}
                       </div>
                        
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
    
@endsection
@section('scripts')
{!!Html::script('js/parsley.min.js')!!}
@endsection

