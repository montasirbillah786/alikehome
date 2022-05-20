<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        return view ('frontend.homepage.homepage');
    }
     public function comment_store(Request $request){

         $request->validate
       ([

        'comment' => 'required|max:255',
         
    

        ],

    [
         'comment.required' => "Please provide give a comment ",
       
        



        ]);

       $comment = new Comment();


       $comment->email =$request->email;
       $comment->name =$request->name;
       $comment->product_id = $request->product_id;
       $comment->comment = $request->comment;

       $comment->save();


       return back();

    }
}
