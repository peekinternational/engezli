@extends('frontend.layouts.master')
@section('title', 'Sign In ')
@section('styling')
@endsection
@section('content')
<!-- Login -->
<div class="bg-white login-block">
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-lg-5 mx-auto">
        <div class="text-center">
          <h3>
            <a href="{{url('/')}}">
            <!-- <img src="{{asset('frontend-assets/images/fav.svg')}}" alt=""> --> PaidPro
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
                <input type="email" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="mb-1">Password</label>
              <div class="position-relative icon-form-control">
                <i class="mdi mdi-key-variant position-absolute"></i>
                <input type="password" class="form-control">
              </div>
            </div>
            <!-- <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div> -->
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
</div>
<!-- End Login -->
@endsection
@section('script')
@endsection