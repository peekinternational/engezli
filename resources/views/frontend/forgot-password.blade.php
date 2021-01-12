@extends('frontend.layouts.master')
@section('title', 'Forgot Password  ')
@section('styling')
@endsection
@section('content')
<div class="bg-white">
  <div class="container">
    <div class="row justify-content-center align-items-center d-flex vh-100">
      <div class="col-lg-4 mx-auto">
        <div class="osahan-login py-4">
          <div class="text-center mb-4">
            <a href="index.html"><img src="{{asset('frontend-assets/images/fav.svg')}}" alt=""></a>
            <h5 class="font-weight-bold mt-3">First, let's find your account</h5>
            <p class="text-muted">Please enter your email or phone</p>
          </div>
          <form action="index.html">
            <div class="form-group">
              <label class="mb-1">Email or Phone</label>
              <div class="position-relative icon-form-control">
                <i class="mdi mdi-account position-absolute"></i>
                <input type="email" class="form-control">
              </div>
            </div>
            <button class="btn btn-success btn-block text-uppercase" type="submit"> Find account </button>
            <div class="py-3 d-flex align-item-center">
              <a href="{{url('login')}}">Sign In</a>
              <span class="ml-auto"> New to Miver? <a href="{{url('register')}}">Join now</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection
