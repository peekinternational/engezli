@extends('frontend.layouts.master')
@section('title', 'Register  ')
@section('styling')
@endsection
@section('content')
<!-- Register -->
<div class="bg-white login-block">
  <div class="container-fluid px-3">
    <div class="row justify-content-center d-flex vh-100">
      <div class="col-lg-4 mx-auto ">
      </div>
      <div class="col-lg-8 mx-auto bg-white">
        <div class="row justify-content-center align-items-center vh-100 d-flex">
          <div class="col-12 text-right pr-5"><a href="">Create Account As a Buyer</a></div>
          <div class="col-lg-5 mx-auto">
            <div class="osahan-login py-4">
              <!-- <div class="text-center mb-4">
                <a href="index.html"><img src="images/fav.svg" alt=""></a>
                <h5 class="font-weight-bold mt-3">Join Miver</h5>
                <p class="text-muted">Make the most of your professional life</p>
              </div> -->
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
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="mb-1">First name</label>
                      <div class="position-relative icon-form-control">
                        <i class="mdi mdi-account position-absolute"></i>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="mb-1">Last name</label>
                      <div class="position-relative">
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Email</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-email-outline position-absolute"></i>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Mobile Number</label>
                  <div class="position-relative icon-form-control">
                    <i class="fa fa-phone position-absolute"></i>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Password (6 or more characters)</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-key-variant position-absolute"></i>
                    <input type="password" class="form-control">
                  </div>
                </div>
                
                <button class="btn btn-success btn-block text-uppercase pb-2 pt-2" type="submit"> Agree & Join </button>
                <div class="mb-2 mt-2">
                  <p class="text-center">By signing up you agree to our <a href="#">Terms and Conditions</a></p>
                </div>
                <div class="py-3 border-top text-center">
                  <span class="ml-auto"> Already on PaidPro? <a href="{{url('login')}}">Sign in</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Register -->
@endsection
@section('script')
@endsection