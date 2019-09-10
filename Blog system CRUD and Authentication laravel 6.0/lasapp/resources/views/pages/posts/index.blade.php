@extends('layouts.app')

@section('content')

   
{{-- {{$a}} --}}



{{-- @foreach ($posts as $post)


@foreach ($a as $item) --}}
    {{-- {{$item}} --}}
    

{{-- @endforeach

@endforeach --}}


    <h1>Posts</h1>
        @if (count($posts)>0)
            @foreach ($posts as $post)

               {{-- @foreach ($a as $item) --}}
                   
                
                 {{-- @if ($item==$post->id) --}}
    
                     <div class="card card-body bg-light">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                    <img style="width:100%" src="../storage/cover_images/{{$post->cover_image}}">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                
                                <h4><a href="posts/{{$post->id}}">{{$post->title}}</a></h4>
                                <small>Created on {{$post->created_at}}</small>
                            </div>
                        </div>

                     </div>
                 {{-- @endif --}}
               {{-- @endforeach      --}}

           
               
            @endforeach
            
         
                   {{$posts->links()}}  


        @else
            <p>No Posts Found</p>
        @endif




@endsection