@extends('frontend.layouts.app')
@section('title', 'Register  ')
@section('styling')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/intlTelInput.min.css')}}">
@endsection
@section('content')
<!-- Register -->
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
      
      <form action="{{url('/register')}}" id="register-form" method="post" class="form">
        <h4>Welcome back</h4>
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
          <a href="" class="facebook-btn btn"><i class="fab fa-facebook-f"></i> facebook</a>
          <a href="" class="google-btn btn"><img src="{{asset('images/google.svg')}}" alt=""> google</a>
        </div>

        <div class="or">
          <div class="text">or</div>
        </div>

        <div class="first-and-last-name">
          <div class="form-group">
            <label for="">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
            <div class="invalid-feedback">
              Please enter first name.
           </div>
          </div>
          <div class="form-group">
            <label for="">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="">
            <div class="invalid-feedback">
              Please enter last name.
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" name="username" placeholder="" id="username">
          <div class="invalid-feedback">
            Please enter user name.
          </div>
        </div>

        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="">
          <div class="invalid-feedback">
              Please enter email.
          </div>
        </div>

        <!-- <div class="form-group">
          <label for="">Mobile Number</label>
          <div class="input-box">
            <select name="" id="" class="custom-select">
              <option value="">+02</option>
              <option value="">+03</option>
              <option value="">+04</option>
              <option value="">+05</option>
            </select>
            <input type="text" class="form-control" placeholder="">
          </div>
        </div> -->

        <div class="form-group">
          <label for="">Mobile Number</label>
          <div class="input-box">
            <input type="tel" class="form-control" name="mobile_number" placeholder="" id="phone">
            <div class="invalid-feedback">
              Please enter mobile.
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="">
          <div class="invalid-feedback">
              Please enter password.
            </div>
        </div>
        <!-- <div class="form-group">
          <label>User Type</label>
          <div class="row">
            <div class="col">
              <label class="border p-2 d-flex align-items-center rounded">
                <input type="radio" name="account_type" value="Buyer">
                <label class="pl-2 mb-0">Buyer</label>
              </label>
            </div>
            <div class="col">
              <label class="border p-2 d-flex align-items-center rounded">
                <input type="radio" name="account_type" value="Seller">
                <label class="pl-2 mb-0">Seller</label>
              </label>
            </div>
          </div>
        </div> -->

        <div class="btn-container">
          <button type="submit" class="btn" id="submit-btn">Sign up</button>
          <p class="terms-condition">By signing up, you agree to our
            <a href="">Terms and Conditions</a> </p>
        </div>
        <p class="account-btn">Already have an account on Engezly? <a href="{{url('login')}}">Sing in</a></p>

        <!-- <p class="account-btn buyer-account">Looking to buy a service? <a href="sign_in.html">Create a Buyer
            Account</a></p> -->
      </form>
    </div>
  </div>
</div>
<!-- <div class="bg-white login-block">
  <div class="container-fluid px-3">
    <div class="row justify-content-center d-flex vh-100">
      <div class="col-lg-4 mx-auto ">
      </div>
      <div class="col-lg-8 mx-auto bg-white">
        <div class="row justify-content-center align-items-center vh-100 d-flex">
          <div class="col-lg-5 mx-auto">
            <div class="osahan-login py-4">
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
                        <input type="text" class="form-control" name="first_name">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="mb-1">Last name</label>
                      <div class="position-relative">
                        <input type="text" class="form-control" name="last_name">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Username</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-account position-absolute"></i>
                    <input type="text" class="form-control" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Email</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-email-outline position-absolute"></i>
                    <input type="email" class="form-control" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Mobile Number</label>
                  <div class="position-relative icon-form-control">
                    <i class="fa fa-phone position-absolute"></i>
                    <input type="text" class="form-control" name="mobile_number">
                  </div>
                </div>
                <div class="form-group">
                  <label class="mb-1">Password (6 or more characters)</label>
                  <div class="position-relative icon-form-control">
                    <i class="mdi mdi-key-variant position-absolute"></i>
                    <input type="password" class="form-control" name="password" id="password">
                    <i class="fa fa-eye position-absolute show-password"></i>
                    <i class="fa fa-eye-slash position-absolute hide-password d-none"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label>User Type</label>
                  <div class="row">
                    <div class="col">
                      <label class="border p-2 d-flex align-items-center rounded">
                        <input type="radio" name="account_type" value="Buyer">
                        <label class="pl-2 mb-0">Buyer</label>
                      </label>
                    </div>
                    <div class="col">
                      <label class="border p-2 d-flex align-items-center rounded">
                        <input type="radio" name="account_type" value="Seller">
                        <label class="pl-2 mb-0">Seller</label>
                      </label>
                    </div>
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
</div> -->
<!-- End Register -->
@endsection
@section('script')
<script src="{{asset('frontend-assets/js/intlTelInput.min.js')}}"></script>
<!-- <script src="{{asset('frontend-assets/js/intlTelInput-jquery.min.js')}}"></script> -->
<script>
  var input = document.querySelector("#phone");
  window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    // hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "js/utils.js",
  });

  $('#submit-btn').click(function(){

    if($('#first_name').val() == ""){
      $('#first_name').addClass('is-invalid');
      $('#first_name').attr("required", "true");
    }else{
      $('#first_name').addClass('is-valid');
    }
    if($('#last_name').val() == ""){
      $('#last_name').addClass('is-invalid');
      $('#last_name').attr("required", "true");
    }else{
      $('#last_name').addClass('is-valid');
    }
    if($('#username').val() == ""){
      $('#username').addClass('is-invalid');
      $('#username').attr("required", "true");
    }else{
      $('#username').addClass('is-valid');
    }
    if($('#email').val() == ""){
      $('#email').addClass('is-invalid');
      $('#email').attr("required", "true");
    }else{
      $('#email').addClass('is-valid');
    }
    if($('#phone').val() == ""){
      $('#phone').addClass('is-invalid');
      $('#phone').attr("required", "true");
    }else{
      $('#phone').addClass('is-valid');
    }
    if($('#password').val() == ""){
      $('#password').addClass('is-invalid');
      $('#password').attr("required", "true");
    }else{
      $('#password').addClass('is-valid');
    }
  });

  var empty = $(".is-invalid").filter(function() { return !this.value; })
                                  .next(".invalid-feedback").show();
</script>
@endsection