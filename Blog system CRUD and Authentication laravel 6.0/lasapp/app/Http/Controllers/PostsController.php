<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $post=new Post;

        // 1. this is the chapi arrangment used for showin only the posts which user added 
        // $a=$post::where('user_id',auth()->user()->id)->pluck('id');
        //  auth()->user()->id
        // echo $a;
        // foreach ($a as $id)
        // {
        // $var_dump($id->id);
        // }
        // echo $var_dump;        
        //$posts=DB::select('SELECT * FROM posts');
        //$posts =orderBy('title','desc')->take(2)->get();
        //this is the end of panga baazi




        $posts= Post::orderBy('created_at','desc')->paginate(2);
        //$posts =Post::orderBy('title','desc')->get();
        //$a=     Post::where('id','1')->get();

        
        return view('pages.posts.index',compact('posts'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c='Create Posts';
        return view('pages.posts.create',compact('c'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

            //handle file upload

            if($request->hasFile('cover_image')){

                //get filename with extension
                $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
                //get filename
                $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //get extension
                $extension =$request->file('cover_image')->getClientOriginalExtension();

                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            }

            else{

                $fileNameToStore='noimage.jpg';


            }


           $post=new Post;
           $post->title=$request->input('title');
           $post->body=$request->input('body');
           $post->cover_image=$fileNameToStore;
           $post->user_id=auth()->user()->id;
           $post->save();

        return redirect('posts')->with('sucess','Post created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $image=new Post;

        
        

        
        $posts=Post::find($id);
        
        
        return view('pages.posts.show',compact('posts','image'));
    
    
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $post=Post::find($id);

            if(auth()->user()->id !== $post->user_id){
            
                return redirect('/posts')->with('error','Unauthorized Access');
            }


        return view('pages.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required'

        ]);


            
        if($request->hasFile('cover_image')){

            //get filename with extension
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get extension
            $extension =$request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

       

           $post=Post::find($id);
           $post->title=$request->input('title');
           $post->body=$request->input('body');
           if($request->hasFile('cover_image')){
               $post->cover_image=$fileNameToStore;
           }
           $post->save();

        return redirect('posts')->with('sucess','Post updated Sucessfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            
            return redirect('/posts')->with('error','Unauthorized Access');
        }

        if($post->cover_image!='noimage.jpg'){

            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('sucess','Post Deleted Sucessfully');
    }
}
