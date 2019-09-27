<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index(){

    $value='My name is Mohsin';

    return view('pages.index',compact('value'));

   }
   
   public function about(){
       return view('pages.about');
   }

   public function services(){
    
    $data = array(

        'title' => 'About us',
        'contact' => 'Contact us',
        'services'=>['Web desinging', 'Programming' , 'Data Sciences','Python'],
        'phone' => 'Phone No'
    );
    
    return view('pages.services',compact('data'));
    }

    public function portfolio(){
     return view('pages.portfolio');
    }





}
