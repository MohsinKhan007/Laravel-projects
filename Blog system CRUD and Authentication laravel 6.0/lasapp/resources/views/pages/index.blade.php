@extends('layouts.app')

@section('content')
    
    <div class="jumbotron text-center">

        <h1>Welcome to Laravel!</h1>
        <p>This is Laravel work</p>
        <p><a class="btn btn-primary" href="/login" role="button">Login</a>       <a class="btn btn-success" href="/register" role="button">Register</a></p>


    </div>



{{-- comming from the controller remember!  --}}
{{-- <p>{{$value}}</p> --}}






@endsection


