<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//storage support
use Illuminate\Support\Facades\Storage;

//database libraty use DB;
class PostController extends Controller
{ //acces controll 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //getall Post::all()
        //to order the response
        // Post::orderBy('created_at','asc')->get();
        //desc for descending
        //query Post::where('title,'Post Tow')->get();
        //paginate Post::where('title,'Post Tow')->paginate();

        $posts =  Post::orderBy('created_at','desc')->paginate(10);
        $data = array(
            'title'=>'Posts',
            'posts'=>$posts
        );
        return view('post.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('post.create')->with('title','Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title'=>'required',
            'body' => 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]); 
        //hadle file upload
        if($request->hasFile('cover_image')){
           
            // file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME) ; 
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName .'_'. time().'.'. $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore) ;
        }else{
            
            $fileNameToStore = 'noImage.jpg';
        }$post = new Post;
        $post->cover_image = $fileNameToStore;
        //create post
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id =  auth()->user()->id ;
        
            $post->save();
        return redirect('/post')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = array(
            'title'=>$post->title,
            'post'=>$post
        );
        return view('post.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','You cannot edit another users post');
        }
        $data = array(
            'title'=>'Edit',
            'post'=>$post
        );
        return view('post.edit')->with($data);
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
        //validation
        $this->validate($request,[
            'title'=>'required',
            'body' => 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);
        $post =  Post::find($id);
        //hadle file upload
        if($request->hasFile('cover_image')){
            // file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME) ; 
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName .'_'. time().'.'. $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore) ;
        }
        if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
        }
        //create post
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/post')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);

        // check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','You cannot edit another users post');
        }
        if($post->cover_image != 'noImage.jpg'){
            //delete image
            Storage::delete('/public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/post')->with('success','Post Deleted');
    }
}
