@extends('frontend.layouts.master')
@section('title', 'Forgot Password')
@section('styling')
@endsection
@section('content')
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
                <!-- <a href="index.html"><img src="{{asset('frontend-assets/images/fav.svg')}}" alt=""></a> -->
                <h5 class="font-weight-bold mt-3">Reset your password</h5>
                <p class="text-muted">Please enter your email or phone to receive a link to reset your password</p>
              </div>
              <form action="index.html">
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
</div>
@endsection
@section('script')
@endsection
