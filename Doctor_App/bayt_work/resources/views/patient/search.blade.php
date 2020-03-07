@extends('layouts.app')


@section('content')



<h3>Searched Results</h3>


@if(count($patients)>0)


    @foreach ( $patients as $patient  ) 
  
    <div class="card card-body bg-light">
        
        <div class="row">
            <div class="col-md-10">
                <img src="../images/patients/{{$patient->image}}" class="rounded float-left"height="100" width="100"  alt="...">
            
               <div style="margin-left:20%;">
                <h3><b style="color: black">Name:</b> {{$patient->fullname}}</h3>
             <h4><b style="color:black">Disease:</b> {{$patient->diesease}}</h4> 
               </div>
             
            </div>
            <div class="col-md-2">
                <a href="{{route('patient.show',$patient->id)}}" class="btn btn-info">View Profile</a>
            </div>   
            
        </div>
    </div>
    <br/>
        @endforeach
    
 @else 
 <div class="alert alert-default">No Patient Found</div> 
@endif 

</div>

@endsection