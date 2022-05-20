 @extends("layouts.master")

 @section('content')


    
    <!--faq area start-->
  <!--contact map end-->
    <div class="contact_map">
       <div class="map-area">


    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14663.083294215605!2d90.84135526925064!3d23.251425272423813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754f3b88ebb04b9%3A0xdf85d1b06f66f8e!2sHaziganj!5e0!3m2!1sen!2sbd!4v1607080262328!5m2!1sen!2sbd" width="1310" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
     </div>
    </div>
    
    <!--contact area start-->


    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message content">
                        <h3>contact us</h3>

                         
                        <ul>
                            @foreach(App\Contact::orderBy('id','asc')->get() as $contact)
                            <li><i class="fa fa-fax"></i>  Address : {{$contact->address}}</li>
                            <li><i class="fa fa-phone"></i> <a href="#">{{$contact->phone_number}}</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">{{$contact->email}}</a>  </li>
                            @endforeach
                        </ul>             
                    </div> 
                </div>
            </div>
        </div>
    </div>



     @endsection