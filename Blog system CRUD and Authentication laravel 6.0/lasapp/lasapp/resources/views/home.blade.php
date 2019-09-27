@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <div class="panel-body">

                            <h3>Your Posts</h3>

                            <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:azure;" href="posts/create"> Create Posts</a></button>

{{-- {{$posts}} --}}


<br><br>

                            @if(count($posts) > 0)
                            <table class="table table-striped">
                                <tr>
                                   <th>Title</th>
                                   <th>Edit</th>
                                    <th>Delete</th>
                                  
                                </tr>
                                
                                @foreach ($posts as $post)
                                    <tr class="table-dark text-dark">
                                    <td>{{$post->title}}</td>
                                    <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:bisque;" href="posts/{{$post->id}}/edit" >Edit</a></button></td>
                                    <td>
                                        {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE'])!!}
                                        {{-- {{  Form::hidden('_mehtod','DELETE')}} --}}
                                        {{  Form::submit('Delete',['class'=>'btn btn-danger' ]) }}
                                        {!! Form::close()!!}</td> 
                                    </tr>
                                @endforeach 
                            

                            </table>
                            @else
                            <p>You have no posts</p>
                            @endif
                           
                        </div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
