@extends('frontend.layouts.app')
@section('title', 'Sign In ')
@section('styling')
@endsection
@section('content')
<!-- Login -->
<div class="sing-in-and-up-container">
  <div class="outer-box left-side">
    <div class="inner-box">
      <div class="img-container">
        <img src="{{asset('images/sign-up-bg.jpg')}}" alt="">
      </div>

      <div class="logo-and-text">
        <img src="{{asset('images/logo-white.svg')}}" alt="">
        <p>Find The Perfect Services
          with Engezly For Your Business</p>
      </div>
    </div>
  </div>
  <div class="outer-box right-side">
    <div class="inner-box">
      <form action="" class="form">
        <h4>Welcome back</h4>

        <div class="facebook-and-google">
          <a href="" class="facebook-btn btn"><i class="fab fa-facebook-f"></i> facebook</a>
          <a href="" class="google-btn btn"><img src="{{asset('images/google.svg')}}" alt=""> google</a>
        </div>

        <div class="or">
          <div class="text">or</div>
        </div>

        <div class="form-group">
          <label for="">Username or Email</label>
          <input type="text" class="form-control" placeholder="">
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" placeholder="">
        </div>
        <div class="btn-container">
          <button type="submit" class="btn">Sign in</button>
          <a href="reset.html" class="forget-password">Forget Password?</a>
        </div>
        <p class="account-btn">New to Engezly?<a href="{{url('register')}}">Sing up</a></p>
      </form>
    </div>
  </div>
</div>
<!-- <div class="bg-white login-block">
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-lg-5 mx-auto">
        <div class="text-center">
          <h3>
            <a href="{{url('/')}}">
            </a>
          </h3>
        </div>
        <div class="osahan-login py-4 bg-white p-4">
          <div class="text-center mb-4 ">
            <h5 class="font-weight-bold">Welcome Back</h5>
          </div>
            <div class="social-links login-by-social flex-column flex-lg-row align-items-center justify-content-center">
              <a class="social-button facebook d-flex flex-row align-items-center" href="{{url('login/facebook')}}">
                <span>
                  <i class="fa fa-facebook-f"></i>
                </span>
                <span>Continue with Facebook</span>
              </a>
              <a class="social-button bg-secondary d-flex flex-row align-items-center" href="{{url('login/facebook')}}">
                <span>
                  <i class="fa fa-google"></i>
                </span>
                <span>Continue with Google</span>
              </a>
              <p class="small text-muted text-center"><span>OR</span></p>
            </div>
          <form action="index.html">
            <div class="form-group">
              <label class="mb-1">User name or Email</label>
              <div class="position-relative icon-form-control">
                <i class="mdi mdi-account position-absolute"></i>
                <input type="text" class="form-control" name="username">
              </div>
            </div>
            <div class="form-group">
              <label class="mb-1">Password</label>
              <div class="position-relative icon-form-control">
                <i class="mdi mdi-key-variant position-absolute"></i>
                <input type="password" class="form-control" name="password">
              </div>
            </div>
            <button class="btn btn-success btn-block text-uppercase" type="submit"> Sign in </button>
            <p class="text-center"><a href="{{url('forgot-password')}}">Forgot password?</a></p>
            <div class="py-3 align-item-center border-top text-center">
              <span class="ml-auto"> New to PaidPro? <a href="{{url('register')}}">Sign Up</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- End Login -->
@endsection
@section('script')
@endsection