<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class PagesController extends Controller
{
    public function index(){
        
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return  view('pages.contact');
    }

    public function search(Request $request){
         $results = DB::table('patients')
                ->where('fullname', 'like', '%'.$request->search.'%')
                ->get();
        return view('patient.search')->with('patients',$results);
        
    }

    public function profile(){
        
        $user=new User;

    $usernew=$user->find(Auth::user()->id);

        return view('pages.profile',$usernew);
    }


}
