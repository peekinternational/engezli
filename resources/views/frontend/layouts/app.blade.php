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
    <!-- <link rel="icon" type="image/png" href="{{asset('images/fav.svg')}}"> -->
    <!-- Font Awesome-->
    <link href="{{asset('css/fonts/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" /> -->

    <!-- Custom styles for this template -->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/cdn/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/richtext.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/cdn/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('frontend-assets/css/custom.css')}}" rel="stylesheet"> -->
    <link href="{{asset('css/arabic_style.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('frontend-assets/css/sweat_alert.css')}}" rel="stylesheet">
    <!-- Rating css -->
    <link href="{{asset('frontend-assets/css/rating-style.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
     @yield('styling')
  </head>
  <body>
    <div class="main-loader">
      <img src="{{asset('images/loader.gif')}}">
    </div>
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    <div id="app">
    @include('frontend.includes.header')
    @endif

    @yield('content')
  </div>
    @if(Request::path() != 'login' && Request::path() != 'register' && Request::path() != 'forgot-password')
    @include('frontend.includes.footer1')
    @endif

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/cdn/jquery-3.4.1.min.js')}}"></script>
    <!-- Vue JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{asset('js/cdn/jquery-3.6.0.min.js')}}"></script> -->
    <script src="{{asset('js/cdn/popper.min.js')}}"></script>
    <!-- <script src="{{asset('js/cdn/bootstrap.min.js')}}"></script> -->
    <script src="{{asset('js/cdn/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/cdn/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('js/cdn/select2.min.js')}}"></script>
    <script src="{{asset('js/cdn/jquery.richtext.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('frontend-assets/js/sweat_alert.js')}}"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Contact form JavaScript -->

    <script src="https://peekvideochat.com:22000/socket.io/socket.io.js"></script>
    <script>
    // @if(auth()->user() != '')
    // const socket = io.connect('https://peekvideochat.com:22000');
    // console.log('check 1', socket.connected);
    // socket.on('birdsreceivemsg', function(data) {
    //   var user_id = "{{auth()->user()->id}}";
    //   var dt = new Date();
    //   var time = dt.getHours() + ":" + dt.getMinutes()
    //   console.log(data);
    //   if( user_id == data.message_receiver){
    //     $('.notificationTime-'+data.conversation_id).html(time);
    //     $('.notificationMessage-'+data.conversation_id).html(data.message_desc);
    //   }
    // });
    // @endif

    // Query.noConflict();
    // $(".select2").select2();
        var url = "{{ route('changeLang') }}";
        $(document).ready(function () {
            var url = "{{ route('changeLang') }}";
            var session ="{{session()->get('locale') == 'ar'}}";
            console.log(session);
            // Change to arabic style
            $(".arabic-format").on("click", function (e) {
                e.preventDefault();
                $("body").addClass("arabic").attr("dir", "rtl");
                window.location.href = url + "?lang="+ $(this).data('info');

            });
            // Change to noramal style
            $(".english-format").on("click", function (e) {
                e.preventDefault();
                $("body").removeClass("arabic").removeAttr("dir", "rtl");
                // console.log( $(this).data('info') );
                window.location.href = url + "?lang="+ $(this).data('info');
            });
            if(session == 1){
                $("body").addClass("arabic").attr("dir", "rtl");
            }else{
                $("body").removeClass("arabic").removeAttr("dir", "rtl");
            }

            $('.notification-anchor').on('click',function () {
              $('.notification-dot').hide();
            });

            $('.message-anchor').on('click',function () {
              $('.message-dot').hide();
            });

          // @if(auth()->user() != '')
          //   var user_id = "{{auth()->user()->id}}";
          //
          //   $.ajaxSetup({
          //       headers: {
          //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //       }
          //   });
          //   $.ajax({
          //    url:"http://localhost:8000/api/friendlist/friendsList2/"+user_id,
          //    // method:"POST",
          //    success:function(data){
          //      $('.show-notification').html(data);
          //     // $('.added-questions').append(data);
          //     // $('#requirements-form textarea').val('');
          //    }
          //   })
          // @endif


        });
      @if(auth()->user())
        function makeFavorite(id){
          // $('.favorite'+id).click(function(){
            var user_id = "{{auth()->user()->id}}";
            var service_id = id;
          // })
          $.ajax({
            url: "{{url('favorite_service')}}",
            type: 'post',
            data:{user_id:user_id,service_id:service_id},
            success:function(data){
              if(data == 1){
                $('.favorite'+id).addClass('fa-heart-o');
                $('.favorite'+id).removeClass('fa-heart');
                $('.favorite'+id).removeClass('dil');
                $('.favorite'+id).css('color','#62646a');
              }else{
                $('.favorite'+id).removeClass('fa-heart-o');
                $('.favorite'+id).addClass('fa-heart');
                $('.favorite'+id).css('color','red');
              }
            }
          });
        }
        @endif
    </script>

    @yield('script')
  </body>
</html>
