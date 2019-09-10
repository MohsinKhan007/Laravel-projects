
    @extends('layouts.app')

    @section('content')
 <h1>ali</h1>
 

 
 
    @if (count($data['services'])>0)
    
    <ul class="list-group">
        @foreach ($data['services'] as $service)
                <li class="list-group-item">{{$service}}</li>
        @endforeach
        

    </ul>
        
    
    @endif






 @endsection