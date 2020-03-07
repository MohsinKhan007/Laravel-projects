@extends('layouts.app')

@section('content')


<h2>Patient Profile</h2>

<a href="/home" class="btn btn-primary">Go Back</a>
<br />
<div class="row">
    <div class="col-sm-3">
        <img src="../images/patients/{{$patient->image}}" class="rounded float-left" alt="...">

    </div>
    <div class="col-sm-6">
        <!--left col-->
        <ul class="list-group">
            <li class="list-group-item text-muted" contenteditable="false">Profile</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Name: </strong></span>
                {{$patient->fullname}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Fathername :
                    </strong></span> {{$patient->fathername}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Diesease:
                    </strong></span>{{$patient->diesease}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Symptoms:
                    </strong></span>{{$patient->symptoms}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Registered Date
                    </strong></span>{{$patient->registered_date}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Doctor's Name </strong></span>{{$patient->doctor->name}}</li>
        </ul>
    </div>
</div>



@endsection