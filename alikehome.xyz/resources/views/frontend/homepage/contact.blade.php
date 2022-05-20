@extends("layouts.master")

@section('content')


   
   <!--faq area start-->
   <div class="faq_content_area">
       <div class="container">   
           <div class="row">
               <div class="col-12 text-center">
                   <div class="faq_content_wrapper">
                    @foreach(App\Contact::orderBy('id','desc')->get() as $contact)
                    <p><span><b>Office Address:</b></span> {{$contact->address}}</p>
                    <p><span><b>Email:</b></span> <a href="#">{{$contact->email}}</a></p>
                    <p><span><b>Call us:</b></span> <a href="tel:(08)23456789">{{$contact->phone_number}}</a> </p>
                    @endforeach
                   </div>
               </div>
           </div> 
       </div>    
   </div>


    @endsection