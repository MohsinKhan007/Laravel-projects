<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'start_date'  => 'date_format:Y-m-d|before:today',
            //  'phone'=>['required','regex:^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$'],   
            'phone'=>['required','min:11'],
            'dob'=>['required']
        ]);
    }

    protected function create(array $data)
    {

        $user=new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=$data['password'];
        $user->phone=$data['phone'];
        $user->gender=$data['gender'];
        $user->dob=$data['dob'];
        $user->address=$data['address'];
        $user->save();  


        return $user;
    }
}
