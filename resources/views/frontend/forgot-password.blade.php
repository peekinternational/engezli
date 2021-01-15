@extends('frontend.layouts.app')
@section('title', 'Forgot Password')
@section('styling')
@endsection
@section('content')
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
      <form action="{{url('/password/email')}}" method="post" class="form">
        @csrf
        <h4>Reset Your Password</h4>
        <p class="reset-text">Please enter your phone number and you will receive a link to reset your password</p>

        <div class="form-group">
          <label for="">Email</label>
            <!-- <select name="" id="" class="custom-select">
              <option value="">+02</option>
              <option value="">+03</option>
              <option value="">+04</option>
              <option value="">+05</option>
            </select> -->
            <input type="text" class="form-control" name="email" placeholder="">
        </div>

        <div class="btn-container">
          <button type="submit" class="btn">Reset Password</button>
        </div>

        <p class="account-btn">Back to <a href="{{url('login')}}">Sing in</a></p>

      </form>
    </div>
  </div>
</div>
<!-- 
<div class="bg-white login-block">
  <div class="container-fluid px-3">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-lg-4 mx-auto ">
      </div>
      <div class="col-lg-8 mx-auto bg-white">
        <div class="row justify-content-center align-items-center vh-100 d-flex">
          <div class="col-lg-5 mx-auto">
            <div class="osahan-login py-4">
              <div class="text-center mb-4">
                <h5 class="font-weight-bold mt-3">Reset your password</h5>
                <p class="text-muted">Please enter your email or phone to receive a link to reset your password</p>
              </div>
              <form action="{{url('/password/email')}}" method="post">
                <div class="form-group">
                  <label class="mb-1">Email or Phone</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-account position-absolute"></i>
                    <input type="text" class="form-control" name="email">
                  </div>
                </div>
                <button class="btn btn-success btn-block text-uppercase pb-2 pt-2" type="submit"> Find account </button>
                <div class="py-3 align-item-center text-center">
                  Back to <a href="{{url('login')}}">Sign In</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
@endsection
@section('script')
@endsection
