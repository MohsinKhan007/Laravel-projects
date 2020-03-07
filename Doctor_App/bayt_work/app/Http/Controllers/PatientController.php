<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Patient;    
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{

    //adding auth so that other than the logged in person, nobody could acess it
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $patient= Patient::orderBy('fullname','asc')->get();

         return view('patient.index')->with('Patient',$patient);
    }

   

    public function create(){
        return view('patient.create');  
    }
    public function store(Request $request) {
        
        //Server Side Validations
       
        $validator = $request->validate([
            'fullname'=>['required'],
            'fathername'=>['required'],
            'image'=>['required','image','mimes:jpeg,png,jpg','max:2048'],
            'registered_date'=>['required','before_or_equal:today'],
        ]);
        
        
        $file=$request->file('image');

        $filename=$request->file('image')->getClientOriginalName();
        //get extension
        $extension=$request->file('image')->getClientOriginalExtension();

        //using timestamp for differciating the names of thr files
        $filenameToDB=$filename.'_'.time().'.'.$extension;
        // $path=$request->file('image')->storeAs('public/images/patients',$filenameToDB);
        
        $file->move(public_path('images/patients'),$filenameToDB);

        $patient=new Patient;
        $patient->fullname=$request->input('fullname');
        $patient->fathername=$request->input('fathername');
        $patient->diesease=$request->input('diesease');
        $patient->symptoms=$request->input('symptoms');
        $patient->registered_date=$request->input('registered_date');
        $patient->doctor_id= Auth::user()->id; 
        $patient->image=$filenameToDB;
        $patient->save();
        return redirect('/home')->withSucess('Patient added sucessfully');
    } 
    public function edit(Patient $patient){
    
        if(Auth::user()->id !== $patient->doctor_id){
            return 'illegal access';
        } else {
            return view('patient.edit')->with('patient',$patient);
        }
    }
    public function update(Request $request,$id){

        $patient=Patient::find($id);

        $validator = $request->validate([
            'fullname'=>['required'],
            'fathername'=>['required'],
           
            'registered_date'=>['required','before_or_equal:today'],
        ]); 

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'mimes:jpeg,png,jpg|max:2048'
            ]);
        }


       
        if($request->hasFile('image')){
            $file=$request->file('image');
        
            $filename=$request->file('image')->getClientOriginalName();
        
            $extension=$request->file('image')->getClientOriginalExtension();
            $filenameToDB=$filename.'_'.time().'.'.$extension;
            $file->move(public_path('images/patients'),$filenameToDB);
            $patient->image=$filenameToDB;
        }

        $patient->fullname=$request->input('fullname');
        $patient->fathername=$request->input('fathername');
        $patient->diesease=$request->input('diesease');
        $patient->symptoms=$request->input('symptoms');
        $patient->registered_date=$request->input('registered_date');
        $patient->image=$patient->image;
        $patient->save();
        return redirect('/home')->withSuccess('Patient Edited sucessfully');


    }
    public function show($id){
        $patient=Patient::find($id);
    
        return view('patient.profile')->with('patient',$patient);
    }
    public function destroy(Patient $patient){
        $patient->delete();
        return redirect()->back()->with('sucess','Deleted Sucessfully');
    }
    public function search($id){}
    
}
