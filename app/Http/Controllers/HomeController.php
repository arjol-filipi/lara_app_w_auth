<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user_id = auth()->user()->id ;
        
        $user = Post::where('user_id',$user_id)->orderBy('created_at')->get() ;
        
        return view('home')->with('posts',$user);
    }
}
