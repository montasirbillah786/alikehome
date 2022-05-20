<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Category;
use App\Comment;
use App\Aboutsite;
use App\about_company;
use App\delivery_info;
use Auth;

class ContactController extends Controller
{

     public function __construct()
    {
        
        $this->middleware('auth:admin')->except('logout');
    }

      public function index()
    {
        $contact=Contact::orderBy('id','desc')->get();
        return view ('backend.pages.contact.index')->with('contact',$contact);
    }

    public function delete($id)
          {

            $contact =Contact::find($id);

            if(!is_null($contact))
            {
                $contact->delete();

            }
            return back();

           }

      public function edit($id){
        
        $contact = Contact::find($id);
        if(!is_null( $contact )){
            return view('backend.pages.contact.edit',compact('contact'));

        }
        else{
            return redirect()->route('admin.contact');

        }
    }


         public function update( Request $request,$id)
        {

              

           $contact =Contact::find($id);

            $contact->email=$request->email;
            $contact->phone_number=$request->phone_number;
            $contact->address=$request->address;
            $contact->facebook=$request->facebook;
            $contact->instagram=$request->instagram;
            $contact->twitter=$request->twitter;
            

            

         
            $contact->save();

            return redirect()->route('admin.contacts');

      
           
         }


         public function aboutsite_index()
    {
        $aboutsite=Aboutsite::orderBy('id','desc')->get();
        return view ('backend.pages.aboutsite.index')->with('aboutsite',$aboutsite);
    }

    public function aboutsite_delete($id)
          {

            $aboutsite =Aboutsite::find($id);

            if(!is_null($aboutsite))
            {
                $aboutsite->delete();

            }
            return back();

           }

      public function aboutsite_edit($id){
        
        $aboutsite = Aboutsite::find($id);
        if(!is_null( $aboutsite )){
            return view('backend.pages.aboutsite.edit',compact('aboutsite'));

        }
        else{
            return redirect()->route('admin.aboutsite');

        }
    }


         public function aboutsite_update( Request $request,$id)
        {

              

           $aboutsite =Aboutsite::find($id);

            $aboutsite->description=$request->description;
            
            

            

         
            $aboutsite->save();

            return redirect()->route('admin.aboutsite');

      
           
         }


         public function index_comment()
    {
        $comment=Comment::orderBy('id','desc')->get();
        return view ('backend.pages.comment.index')->with('comment',$comment);
    }

    public function edit_comment($id)
    {
        $comment = Comment::find($id);
        if(!is_null( $comment )){
            return view('backend.pages.comment.edit',compact('comment'));

        }
        else{
            return redirect()->route('admin.index_comment');

        }

    }

    public function comment_update(Request $request,$id)
    {
        $comment =Comment::find($id);

            $comment->active=$request->active;

            $comment->save();

            return redirect()->route('admin.index_comment');
    }


       public function policy_index()
    {
        $aboutsite=about_company::orderBy('id','desc')->get();
        return view ('backend.pages.policy.index')->with('aboutsite',$aboutsite);
    }

    

      public function policy_edit($id){
        
        $aboutsite = about_company::find($id);
        if(!is_null( $aboutsite )){
            return view('backend.pages.policy.edit',compact('aboutsite'));

        }
        else{
            return redirect()->route('admin.policy');

        }
    }


         public function policy_update( Request $request,$id)
        {

              

           $aboutsite =about_company::find($id);

            $aboutsite->description=$request->description;
            
            

            

         
            $aboutsite->save();

            return redirect()->route('admin.policy');

      
           
         }

          public function delivery_index()
    {
        $aboutsite=delivery_info::orderBy('id','desc')->get();
        return view ('backend.pages.delivery.index')->with('aboutsite',$aboutsite);
    }

    

      public function delivery_edit($id){
        
        $aboutsite = delivery_info::find($id);
        if(!is_null( $aboutsite )){
            return view('backend.pages.delivery.edit',compact('aboutsite'));

        }
        else{
            return redirect()->route('admin.delivery');

        }
    }


         public function delivery_update( Request $request,$id)
        {

              

           $aboutsite =delivery_info::find($id);

            $aboutsite->description=$request->description;
            
            

            

         
            $aboutsite->save();

            return redirect()->route('admin.delivery');

      
           
         }

}
