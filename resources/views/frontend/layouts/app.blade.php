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
    <link href="{{asset('css/cdn/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/richtext.min.css')}}" rel="stylesheet">
    <!-- Font Awesome-->
    <!-- <link href="{{asset('frontend-assets/vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
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
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend-assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/arabic_style.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
     @yield('styling')
  </head>
  <body>
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    @include('frontend.includes.header')
    @endif

    @yield('content')
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    @include('frontend.includes.footer1')
    @endif
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/cdn/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/cdn/popper.min.js')}}"></script>
    <script src="{{asset('js/cdn/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/cdn/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/cdn/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('js/cdn/jquery.richtext.js')}}"></script>
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
            var url = "{{ route('changeLang') }}";
            var session ="{{session()->get('locale') == 'en'}}";
            console.log(session);
            // Change to arabic style
            $(".arabic-format").on("click", function (e) {
                e.preventDefault();
                $("body").addClass("arabic").attr("dir", "rtl");
                window.location.href = url + "?lang="+ $(this).data('info');
                // console.log( $(this).data('info') );
                // console.log(this.data('value'));
                // alert(this.data('value'));
            });
            // Change to noramal style
            $(".english-format").on("click", function (e) {
                e.preventDefault();
                $("body").removeClass("arabic").removeAttr("dir", "rtl");
                // console.log( $(this).data('info') );
                window.location.href = url + "?lang="+ $(this).data('info');
            });
            if(session == 1){
                $("body").removeClass("arabic").removeAttr("dir", "rtl");
            }else{
                $("body").addClass("arabic").attr("dir", "rtl");
            }
        });
    </script>
    @yield('script')
  </body>
</html>