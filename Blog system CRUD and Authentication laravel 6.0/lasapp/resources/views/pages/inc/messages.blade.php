@if (count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger"></div>
        {{$error}}
        
    @endforeach
    

    
@endif


@if (session('sucess'))
    <div class="alert alert-sucess">
        {{session('sucess')}}
    </div>
    
@endif


@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    
@endif 
