<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/safira-preview/safira/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jul 2020 12:23:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @if(isset($seo_title))
        {{$seo_title}}
        @else
        Alike Home
        @endif
    </title>
    <meta name="description" content="@if(isset($seo_title))
    {{$seo_description}}
    @else
        RoadStrv
        @endif">
    <meta name="keyword" content="@if(isset($seo_title))
    {{$seo_keyword}}
    @else
        RoadStrv
        @endif">
    <meta name="viewport" content="initial-scale=1, max-width=575">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('assets/css/font.awesome.css') }}">
    <!--ionicons css-->
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <!--linearicons css-->
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slinky.menu.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
</head>

<body>



<!--header area start-->

<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>

                    <div class="header_social text-right">
                        <ul>
                            @foreach(App\Contact::orderBy('id','desc')->get() as $contact)
                                <li><a href="{{$contact->twitter}}"><i class="ion-social-twitter"></i></a></li>

                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="{{$contact->facebook}}"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="{{$contact->instagram}}"><i class="ion-social-instagram-outline"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search_container">
                        <form action="#">

                            <div class="search_box">
                                <input placeholder="Search product..." type="text">
                                <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                            </div>
                        </form>
                    </div>

                    <div class="call-support">
                        <p><a href="tel:+8801869-51152">(+88)01869-51152</a> Customer Support</p>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has">
                                <a href="{{url('/')}}">@lang('home.Home')</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('product.index')}}">Shop</a>
                            </li>
                            <li class="mega_items"><a href="{{route('order_track')}}">Order</a> </li>
                            <li><a href="{{route('compare.show')}}"> Compare</a></li>
                            <li class="mega_items"><a href="{{url('/about')}}">About Us</a> </li>




                            <?php if(Auth::user()){ ?>
                            <li><a href="">{{Auth::user()->name}}</a></li>
                            <li><span>/</span></li>
                            <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>

                            <?php } else {?>
                            <li><a href="{{ route('register') }}">Register</a></li>

                            <li><a href="{{ route('login') }}">Login</a></li>

                            <?php }?>



                        </ul>
                    </div>
                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> support@alikehome.net</a></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<header>
    <div class="main_header">
        <div class="header_bottom sticky-header">
            <div class="container">
               <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="categories_menu">
                            <div class="logo">
                           <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/logos.png')}}" alt=""></a>

                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a class="mega_items"  href="{{url('/')}}">Home</a>

                                    </li>
                                    <li class="mega_items"><a href="{{route('product.index')}}">Rooms</a>

                                    </li>
                                    <li class="mega_items"><a href="{{route('vendor.store.all')}}">Hostels</a>

                                    </li>

                                
                                    <li class="mega_items"><a href="{{url('/about')}}">About</a>

                                    </li>
                                    <li><a href="{{url('/contact/map')}}"> Contact us</a></li>


                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">


                            <div class="header_account_list register">
                                    <ul>
                                        <?php if(Auth::user()){ ?>
                                        <li><a href="">{{Auth::user()->name}}</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form></li>

                                        <?php } else {?>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>

                                        <?php }?>
                                    </ul>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
<!--header area end-->

@yield("content")


<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widgets_container contact_us">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/logos.png')}}" alt=""></a>

                        
                            </div>
                        </div>

                        <p class="footer_desc mt-3"> Gaining the trust and ensuring the best service is our first and foremost priority.</p>
                      
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer_menu">

                            <ul>
                                <li><a href="{{route('product.index')}}">Rooms Us</a></li>
                                <li><a href="{{route('vendor.store.all')}}">Hostels</a></li>
                                <li><a href="{{route('policy')}}"> Privacy Policy</a></li>
                            
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer_menu">

                            <ul>
                                <li><a href="{{url('/about')}}"> Terms & Conditions</a></li>
                                <li><a href="{{url('/contact/map')}}"> Contact Us</a></li>
                        
                            </ul>
                        </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="widgets_container widget_newsletter">
                        <h3>Address</h3>
                         @foreach(App\Contact::orderBy('id','desc')->get() as $contact)
                            <p><span>Address:</span> {{$contact->address}}</p>
                            <p><span>Email:</span> <a href="#">{{$contact->email}}</a></p>
                            <p><span>Call us:</span> <a href="{{$contact->phone_number}}">{{$contact->phone_number}}</a> </p>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12" style="text-align:center;">
                    <div class="copyright_area">
                        <p>Copyright  © 2021  <a href="www.grabsoft.tech">AlikeHome</a>  . All Rights Reserved.Design by  <a href="">AlikeHome</a></p>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area start-->
@foreach(App\Product::orderby('id','asc')->get() as $product)
    <div class="modal fade" id="modal_box{{$product->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-x"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        @php $i=1; @endphp
                                        @foreach ($product->images as $image)
                                            @if ($i>0)
                                                <div class="tab-pane fade show active" id="tab{{$image->id}}" role="tabpanel" >
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="{{asset('img/product/'.$image->image)}}" alt=""></a>
                                                    </div>
                                                </div>
                                            @endif

                                            @php $i-- @endphp
                                        @endforeach

                                        @php $i=0; @endphp
                                        @foreach ($product->images as $image)
                                            @if ($i>=0)
                                                <div class="tab-pane fade" id="tab{{$image->id}}" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="{{asset('img/product/'.$image->image)}}" alt=""></a>
                                                    </div>
                                                </div>

                                            @endif

                                            @php $i++ @endphp
                                        @endforeach






                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            @php $i=1; @endphp
                                            @foreach ($product->images as $image)
                                                @if ($i==0)
                                                    <li >
                                                        <a class="nav-link active" data-toggle="tab" href="#tab{{$image->id}}" role="tab" aria-controls="tab{{$image->id}}" aria-selected="false"><img src="{{asset('img/product/'.$image->image)}}" alt=""></a>

                                                    </li>

                                                @endif
                                            @endforeach
                                            @php $i=0; @endphp
                                            @foreach ($product->images as $image)
                                                @if ($i>=0)

                                                    <li>
                                                        <a class="nav-link" data-toggle="tab" href="#tab{{$image->id}}" role="tab" aria-controls="tab{{$image->id}}" aria-selected="false"><img src="{{asset('img/product/'.$image->image)}}" alt=""></a>
                                                    </li>


                                                @endif

                                                @php $i++ @endphp
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>{{$product->title}}</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">{{$product->offer_price}} TAKA</span>
                                        <span class="old_price" >{{$product->price}} TAKA</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>{!! $product->description !!}  </p>
                                    </div>
                                    <div class="variants_selects">

                                        <table>
                                            <tbody>
                                            <tr>
                                                <td class="first_child">Category :</td>
                                                <td>{{$product->category->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Institute :</td>
                                                <td>{{$product->brand->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Offer Price :</td>
                                                <td>{{$product->offer_price}}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Price :</td>
                                                <td>{{$product->price}}</td>
                                            </tr>
                                            <tr>
                                
                                             
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="modal_add_to_cart" style="padding-top: 25px;">
                                            @include('frontend.partials.cart_button')
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this</h2>
                                        <ul>
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- modal area end-->

@stack('js')

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f2b9119d5580e48"></script>


<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
<!--popper min js-->
<script src="{{ asset('assets/js/popper.js') }}"></script>
<!--bootstrap min js-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--owl carousel min js-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--slick min js-->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!--magnific popup min js-->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--counterup min js-->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<!--jquery countdown min js-->
<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
<!--jquery ui min js-->
<script src="{{ asset('assets/js/jquery.ui.js') }}"></script>
<!--jquery elevatezoom min js-->
<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
<!--isotope packaged min js-->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<!--slinky menu js-->
<script src="{{ asset('assets/js/slinky.menu.js') }}"></script>
<!--instagramfeed menu js-->
<script src="{{ asset('assets/js/jquery.instagramFeed.min.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>



</body>


<!-- Mirrored from demo.hasthemes.com/safira-preview/safira/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jul 2020 12:23:04 GMT -->
</html>
