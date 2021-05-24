<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Marketplace ">
    <meta name="author" content="Engezli">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Engezli | @yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/fav.svg">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="{{asset('frontend-assets/vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="{{asset('frontend-assets/vendor/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css">
    <!-- Slick -->
    <link href="{{asset('frontend-assets/vendor/slick-master/slick/slick.css')}}" rel="stylesheet" type="text/css">
    <!-- Lightgallery -->
    <link href="{{asset('frontend-assets/vendor/lightgallery-master/dist/css/lightgallery.min.css')}}" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="{{asset('frontend-assets/vendor/select2/css/select2-bootstrap.css')}}" />
    <link href="{{asset('frontend-assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('frontend-assets/css/style.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('frontend-assets/css/custom.css')}}" rel="stylesheet">
     @yield('styling')
  </head>
  <body>
    <div class="main-loader">
      <img src="{{asset('frontend-assets/images/loader.gif')}}">
    </div>
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    @include('frontend.includes.navbar')
    @endif
    <!-- <div id="overlay">
      <img src="{{asset('frontend-assets/images/loader.gif')}}" alt="Loading" />
      Loading...
    </div> -->

    @yield('content')
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    @include('frontend.includes.footer')
    @endif
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend-assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="{{asset('frontend-assets/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('frontend-assets/js/contact_me.js')}}"></script>
    <!-- Slick -->
    <script src="{{asset('frontend-assets/vendor/slick-master/slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>
    <!-- lightgallery -->
    <script src="{{asset('frontend-assets/vendor/lightgallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <!-- select2 Js -->
    <script src="{{asset('frontend-assets/vendor/select2/js/select2.min.js')}}"></script>
    <!-- Custom -->
    <script src="{{asset('frontend-assets/js/custom.js')}}"></script>
    <script>
        var url = "{{ route('changeLang') }}";
        $(document).ready(function () {
            // Change to arabic style
            $(".arabic-format").on("click", function (e) {
                e.preventDefault();
                $('.main-loader').show();
                $("body").addClass("arabic").attr("dir", "rtl");
                alert(this.data('value'));
            });
            // Change to noramal style
            $(".english-format").on("click", function (e) {
                e.preventDefault();
                $('.main-loader').show();
                $("body").removeClass("arabic").removeAttr("dir", "rtl");
            });
        });

        setTimeout(function(){ $('.main-loader').fadeOut(); }, 1000);
        // $(window).load(function(){
        //   // PAGE IS FULLY LOADED
        //   // FADE OUT YOUR OVERLAYING DIV
        //   $('.main-loader').fadeOut();
        // });
    </script>
    @yield('script')
  </body>
</html>
