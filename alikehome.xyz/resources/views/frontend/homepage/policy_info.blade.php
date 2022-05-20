 @extends("layouts.master")

 @section('content')


    
    <!--faq area start-->
    <div class="faq_content_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                <div class="faq_content_wrapper">
                        @foreach(App\about_company::orderby('id','desc')->get() as $about)
                       <p>{!!$about->description!!}</p>
                       @endforeach

















                    </div>
                </div>
            </div> 
        </div>    
    </div>


     @endsection