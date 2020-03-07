@extends('layouts.app')

@section('content')



<h2>profile</h2>

<a href="/home" class="btn btn-primary">Go Back</a>
<br />
<div class="row">
    <div class="col-sm-3">
        

    </div>
    <div class="col-sm-6">
        <!--left col-->
   
        <ul class="list-group">
            <li class="list-group-item text-muted" contenteditable="false">Dr. {{$name}} Profile</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Name: </strong></span>
                {{$name}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Email :
                    </strong></span> {{$email}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Phone:
                    </strong></span>{{$phone}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Address:
                    </strong></span>{{$address}}</li>
            <li class="list-group-item text-right"><span class="float-left"><strong class="">Date of birth
                    </strong></span>{{$dob}}</li>
            {{-- <li class="list-group-item text-right"><span class="float-left"><strong class="">Doctor's Name </strong></span>{{$patient->doctor->name}}</li> --}}
        </ul>
    </div>
</div>


@endsection