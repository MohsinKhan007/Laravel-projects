@extends('layouts.app')


@section('content')
    
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    
   <h2>Add Patient</h2>
<form autocomplete="off" method="POST" action="{{ route('patient.store') }} " enctype="multipart/form-data">
    <div class="form-group">
        <label for="fullname">Patient Name</label>
        <input type="name" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
    </div>
    @csrf
    <div class="form-group">
        <label for="fathername">Father Name</label>
        <input type="name" class="form-control" id="fathername" name="fathername" placeholder="Father Name">
    </div>
    <div class="form-group">
        <label for="diesease">Diesease</label>
        <input type="diesease" class="form-control" id="diesease" name="diesease" placeholder="Diesease">
    </div>
    <div class="form-group">
        <label for="symptom">Symptoms</label>
        <textarea class="form-control" rows="5" name="symptoms" id="symptom"></textarea>
    </div>
    <div class="form-group">
    <label for="registeredDate">Resgistered Date</label>
    <br/>
    <input type="date" name="registered_date" min="2015-1-1" max="" />
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