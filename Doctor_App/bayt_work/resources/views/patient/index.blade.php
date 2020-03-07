@extends('layouts.app')

@section('content')



<div class="container">
    <h1>All Patients</h1>   
    @if (!empty($success))
    <div class="alert alert-sucess">
    {{$success}}
    </div>
@endif

@if(count($Patient)>0)
    @foreach ( $Patient as $patient  )
   
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
<div class="alert alert-default">No Patients Found</div>
@endif

</div>

@endsection

