@extends('layouts.app')

@section('content')


<h1>{{$c}}</h1>

{!! Form::open(['action' => 'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!} 
    <div class="formgroup"> 
      {{Form::label('title','Title')}}
      {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
 
    <div class="formgroup"> 
      {{Form::label('body','Body')}}
      {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'main text'])}}
    </div>

    <div class="form-group">
      {{Form::file('cover_image')}}




    </div>

{!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}



@endsection