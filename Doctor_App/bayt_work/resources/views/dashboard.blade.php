@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!empty($sucess))
        
        <div class="alert alert-sucess alert-block">    
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{$sucess}}</strong>   
           
        <strong>{{$sucess}}</strong>
        </div>
    @endif
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Welcome {{Auth::user()->name}} </div>
                @if($patients->isNotEmpty())
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Pateints:</h3>
                       
                    <table class="table table-striped">
                    <tr>
                        <th>Patient Name:</th>
                        <th>Diesease</th>
                        <th>Assigned Doctor</th>
                        <th class="float-right" style="margin-right:30px;">Actions</th>
                    </tr>
                   
                  @foreach ($patients as $patient)
                  <tr>    
                  <td><a href="{{route('patient.show',$patient->id)}}"> {{$patient->fullname}}</a></td>
                      <td>{{$patient->diesease}}</td>
                  <td>{{$patient->doctor->name}}</td>
                  <td class="float-right"><a href="{{route('patient.edit',$patient->id)}}" class="btn btn-info">Edit</a>
                  <form action="{{ route('patient.destroy',$patient->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> </td>
                    </tr>
                  @endforeach

                    
                  @else
                <div class="alert alert-default">No Patients for your checkup. Add new Patients </div>
                  @endif

                  
                  
                    
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
