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
        <p>{{ __('home.Find The Perfect Services')}}</p>
      </div>
    </div>
  </div>
  <div class="outer-box right-side">
    <div class="inner-box">
      <form action="{{url('login')}}" method="post" class="form">
        <h4> {{ __('home.Welcome back')}}</h4>
        @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
        @endif
        @csrf
        <div class="facebook-and-google">
          <a href="{{url('login/facebook')}}" class="facebook-btn btn"><i class="fa fa-facebook-f"></i> {{ __('home.facebook')}}</a>
          <a href="{{url('login/google')}}" class="google-btn btn"><img src="{{asset('images/google.svg')}}" alt=""> {{ __('home.google')}}</a>
        </div>

        <div class="or">
          <div class="text">{{ __('home.or')}}</div>
        </div>

        <div class="form-group">
          <label for="">{{ __('home.Username or Email')}}</label>
          <input type="text" class="form-control" name="username" placeholder="">
          <span class="text-danger">{{ $errors->first('username') }}</span>
        </div>

        <div class="form-group">
          <label for="">{{ __('home.Password')}}</label>
          <input type="password" class="form-control" name="password" placeholder="">
          <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        <div class="btn-container">
          <button type="submit" class="btn">{{ __('home.Sign in')}}</button>
          <a href="{{url('forgot-password')}}" class="forget-password">{{ __('home.Forget Password')}}</a>
        </div>
        <p class="account-btn">{{ __('home.New to Engezly')}}<a href="{{url('register')}}">{{ __('home.Sign up')}}</a></p>
      </form>
    </div>
  </div>
</div>
<!-- End Login -->
@endsection
@section('script')
@endsection