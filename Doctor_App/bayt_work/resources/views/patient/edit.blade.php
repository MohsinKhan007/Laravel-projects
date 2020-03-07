@extends('layouts.app')

@section('content')
    <h2>Edit Form</h2>

<form autocomplete="off" method="POST" action="{{route('patient.update',$patient->id)}}">   
     {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="fullname">Patient Name</label>
        <input type="name" class="form-control" value=<?php echo $patient->fullname ?> id="fullname" name="fullname" placeholder="Full Name">
    </div>
    {{-- {{$patient}} --}}
    @csrf
    <div class="form-group">
        <label for="fathername">Father Name</label>
        <input type="name" class="form-control" id="fathername" value={{$patient->fathername}} name="fathername" placeholder="Father Name">
    </div>
    <div class="form-group">
        <label for="diesease">Diesease</label>
        <input type="diesease" class="form-control" value={{$patient->diesease}} id="diesease" name="diesease" placeholder="Diesease">
    </div>
    <div class="form-group">
        <label for="symptom">Symptoms</label>
        <textarea class="form-control" rows="5"  name="symptoms" id="symptom" > {{$patient->symptoms}}</textarea>
    </div>
    <div class="form-group">
    <label for="registeredDate">registeredDate Date</label>
    <br/>
    <input type="date" name="registered_date" value={{$patient->registered_date}} min="2015-1-1" max="" />
    </div>
    <div class="form-group">
        <label for="patient image">Patient Image</label><br/>
        <input type="file" name="image"/>
        <small>only upload .jpeg,.png image</small>
    </div>
    <br/>
            
   
    <button type="submit" class="btn btn-primary">Add Patient</button>
</form>


@endsection