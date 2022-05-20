




@extends("layouts.master")

 @section('content')

    
    <!--product details start-->
    <div class="product_details mt-70 mb-70" style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     <p class="hid" style="color:#31D769;font-weight:500;letter-spacing: 1px;background-color:#40A944;padding:8px 10px;color:white;"> Having Issues? <i class="fa fa-phone" aria-hidden="true"></i> Call Us 09678454545</p>
                     <h3>The easiest way to choice the best product<br>from our website </h3>
                    
                 <p>No.1 Bangladeshi E-commerce Website, With lakhs of Profiles.Register Now. Free Registeration. Safe & Secure. Hassle-Free Registeration.</p>
                </div>

                <div class="col-lg-6 ">

                    <div class="card">
                <div class="card-header" style="background-color:#40A944;"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      <!--   <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success" >
                                    {{ __('Login') }}
                                </button>

                               <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>

             </div>
         </div>
    </div>
 </div>

@endsection