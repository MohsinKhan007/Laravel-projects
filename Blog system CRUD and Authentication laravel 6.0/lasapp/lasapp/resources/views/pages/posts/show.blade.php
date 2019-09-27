@extends('layouts.app')

@section('content')

{{-- 
@if ($posts==true)
Hello Kitty
    
    
@endif --}}

<button type="button" class="btn btn-info"><a style="text-declaration:none; color:white;" href="../posts">Go Back</a></button>


<br>
<br>
<h1>{{$posts->title}}</h1>
{{-- <p>{{$posts->cover_image}}</p> --}}
<img style="width:100%" src="../storage/cover_images/{{$posts->cover_image}}" >
<br>

<small>Written at the time {{$posts->created_at}}</small>
<div>
    {{$posts->body}}
</div>

    @if (!Auth::guest())
        @if (Auth::user()->id==$posts->user_id)
            
<a href="../posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>

{!! Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'DELETE','class'=>'float-right'])!!}
{{-- {{  Form::hidden('_mehtod','DELETE')}} --}}
{{  Form::submit('Delete',['class'=>'btn btn-danger' ]) }}
{!! Form::close()!!}

    @endif
        @endif
@endsection

