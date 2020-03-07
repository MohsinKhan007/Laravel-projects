<?php

namespace App\Http\Controllers;

use App\Patient;  
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $user = Auth::user();

        $data = [
            'patients' => $user->patients
        ];
             return view('dashboard',$data);
    
    }
}
