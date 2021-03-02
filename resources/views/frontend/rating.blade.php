@extends('frontend.layouts.app')
@section('title', 'Review ')
@section('styling')
@endsection
@section('content')
<div class="create-service order-request resolution-center feedback-wrapper">
  <div class="container">
    <div class="outer-content">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
          <div class="feedback-container card p-4">
            <div class="panel show">
              <form role="form" id="reviews-form">
                {{csrf_field()}}
                <input type="hidden" name="communication_rating" id="communication_rating">
                <input type="hidden" name="service_rating" id="service_rating">
                <input type="hidden" name="recommend_rating" id="recommend_rating">
                <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                <input type="hidden" name="service_id" id="service_id" value="{{$order->service_id}}">
              <div class="feedback-headers">
                <p>Public Feedback</p>
                <h5>
                  Share you experience with the community, to help the make
                  better decisions.
                </h5>
              </div>

              <div class="feedback-body">

                  <div class="feed-box d-flex align-items-center justify-content-between">
                   <div class="box">
                    <h6>communicate with the seller</h6>
                    <p>How responsive was the seller during the process?</p>
                  </div>
                  <div class="box">
                    <div class='rating-stars'>
                       <div class="row" style="margin: 15px -15px;">
                         <div id="half-stars-example" class="col-md-12">
                            <div class="rating-group">
                             <input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
                             <label aria-label="0 stars" data-label="0" class="rating__label" for="rating2-0" style="padding: 0 0em;">&nbsp;</label>
                             <label aria-label="0.5 stars" data-label="0.5" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio">
                             <label aria-label="1 stars" data-label="1" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
                             <label aria-label="1.5 stars" data-label="1.5" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio">
                             <label aria-label="2 stars" data-label="2" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
                             <label aria-label="2.5 stars" data-label="2.5" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio">
                             <label aria-label="3 stars" data-label="3" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
                             <label aria-label="3.5 stars" data-label="3.5" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio">
                             <label aria-label="4 stars" data-label="4" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
                             <label aria-label="4.5 stars" data-label="4.5" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio">
                             <label aria-label="5 stars" data-label="5" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
                            </div>
                         </div>
                       </div>
                    </div>
                    <!-- <p>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </p> -->
                  </div>
                </div>
                <div class="feed-box d-flex align-items-center justify-content-between">
                  <div class="box">
                    <h6>service as described</h6>
                    <p>Did the result match the Gig's description?</p>
                  </div>
                  <div class="box">
                    <div class='rating-stars'>
                       <div class="row" style="margin: 15px -15px;">
                         <div id="half-stars-example-service" class="col-md-12">
                            <div class="rating-group">
                             <input class="rating__input rating__input--none" checked name="rating2-service" id="rating2-service-0" value="0" type="radio">
                             <label aria-label="0 stars" data-label="0" class="rating__label" for="rating2-service-0" style="padding: 0 0em;">&nbsp;</label>
                             <label aria-label="0.5 stars" data-label="0.5" class="rating__label rating__label--half" for="rating2-service-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-05" value="0.5" type="radio">
                             <label aria-label="1 stars" data-label="1" class="rating__label" for="rating2-service-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-10" value="1" type="radio">
                             <label aria-label="1.5 stars" data-label="1.5" class="rating__label rating__label--half" for="rating2-service-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-15" value="1.5" type="radio">
                             <label aria-label="2 stars" data-label="2" class="rating__label" for="rating2-service-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-20" value="2" type="radio">
                             <label aria-label="2.5 stars" data-label="2.5" class="rating__label rating__label--half" for="rating2-service-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-25" value="2.5" type="radio">
                             <label aria-label="3 stars" data-label="3" class="rating__label" for="rating2-service-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-30" value="3" type="radio">
                             <label aria-label="3.5 stars" data-label="3.5" class="rating__label rating__label--half" for="rating2-service-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-35" value="3.5" type="radio">
                             <label aria-label="4 stars" data-label="4" class="rating__label" for="rating2-service-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-40" value="4" type="radio">
                             <label aria-label="4.5 stars" data-label="4.5" class="rating__label rating__label--half" for="rating2-service-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-45" value="4.5" type="radio">
                             <label aria-label="5 stars" data-label="5" class="rating__label" for="rating2-service-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-service" id="rating2-service-50" value="5" type="radio">
                            </div>
                         </div>
                       </div>
                    </div>
                    <!-- <p>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                    </p> -->
                  </div>
                </div>
                <div
                  class="feed-box d-flex align-items-center justify-content-between"
                >
                  <div class="box">
                    <h6>buy again or recommend</h6>
                    <p>Would you recommend buying this Gig?</p>
                  </div>

                     <div class="box">
                    <div class='rating-stars'>
                       <div class="row" style="margin: 15px -15px;">
                         <div id="half-stars-example-recommend" class="col-md-12">
                            <div class="rating-group">
                             <input class="rating__input rating__input--none" checked name="rating2-recommend" id="rating2-recommend-0" value="0" type="radio">
                             <label aria-label="0 stars" data-label="0" class="rating__label" for="rating2-recommend-0" style="padding: 0 0em;">&nbsp;</label>
                             <label aria-label="0.5 stars" data-label="0.5" class="rating__label rating__label--half" for="rating2-recommend-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-05" value="0.5" type="radio">
                             <label aria-label="1 stars" data-label="1" class="rating__label" for="rating2-recommend-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-10" value="1" type="radio">
                             <label aria-label="1.5 stars" data-label="1.5" class="rating__label rating__label--half" for="rating2-recommend-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-15" value="1.5" type="radio">
                             <label aria-label="2 stars" data-label="2" class="rating__label" for="rating2-recommend-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-20" value="2" type="radio">
                             <label aria-label="2.5 stars" data-label="2.5" class="rating__label rating__label--half" for="rating2-recommend-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-25" value="2.5" type="radio">
                             <label aria-label="3 stars" data-label="3" class="rating__label" for="rating2-recommend-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-30" value="3" type="radio">
                             <label aria-label="3.5 stars" data-label="3.5" class="rating__label rating__label--half" for="rating2-recommend-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-35" value="3.5" type="radio">
                             <label aria-label="4 stars" data-label="4" class="rating__label" for="rating2-recommend-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-40" value="4" type="radio">
                             <label aria-label="4.5 stars" data-label="4.5" class="rating__label rating__label--half" for="rating2-recommend-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-45" value="4.5" type="radio">
                             <label aria-label="5 stars" data-label="5" class="rating__label" for="rating2-recommend-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                             <input class="rating__input" name="rating2-recommend" id="rating2-recommend-50" value="5" type="radio">
                            </div>
                         </div>
                       </div>
                    </div>
                    <!-- <p>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                    </p> -->
                  </div>
                </div>

                <div class="form-group text-area">
                  <h5>What was it like working with this Seller?</h5>
                  <textarea
                    name="review"
                    id=""
                    class="form-control mb-1 mt-3"
                    rows="6"></textarea>
                  <p><small>0/700 Characters</small></p>
                </div>

                <div class="skills-endorsement">
                  <h5>skills endorsement (optional)</h5>
                  <ul>
                    <li><a href="">offpage seo</a></li>
                    <li><a href="">offpage seo</a></li>
                    <li><a href="">link building</a></li>
                    <li><a href="">seo</a></li>
                  </ul>
                </div>

                <div class="preview">
                  <div class="form-group form-check">
                    <input
                      name="show_work"
                      type="checkbox"
                      class="form-check-input"
                      id="exampleCheck1"
                      value="1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                      >Show the delivered work in my review</label
                    >
                  </div>
                  <div class="img-container">
                    <img src="{{asset('images/s1.png')}}" alt="" />
                  </div>
                </div>
              </div>
              <div class="btn-container">
                <a href="" class="btn">Skip</a>
                <button type="submit" class="btn btn-primary next">Send feedback</button>
              </div>
            </form>
            </div>
            <div class="panel">
              <div class="feedback-headers">
                <h5>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Facilis in est earum eligendi, ipsa mollitia nesciunt
                  deserunt illo!
                </h5>
                <p class="mt-2">Your answer will remain anonymous.</p>
              </div>
              <div class="feedback-body">
                <div class="list-group">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios1svds"
                      value="option1"
                      checked
                    />
                    <label
                      class="form-check-label"
                      for="exampleRadios1svds"
                    >
                      not satisfied at all
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios2dv"
                      value="option2"
                    />
                    <label class="form-check-label" for="exampleRadios2dv">
                      not so satisfied
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios36d5"
                      value="option3"
                    />
                    <label class="form-check-label" for="exampleRadios36d5">
                      neutral
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios36d5s"
                      value="option3"
                    />
                    <label
                      class="form-check-label"
                      for="exampleRadios36d5s"
                    >
                      satisfied
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios36d5s"
                      value="option3"
                    />
                    <label
                      class="form-check-label"
                      for="exampleRadios36d5s"
                    >
                      very satisfied
                    </label>
                  </div>
                </div>
              </div>
              <div class="btn-container">
                <a href="" class="btn">Skip</a>
                <a href="" class="btn btn-primary next">continue</a>
              </div>
            </div>
            <div class="panel">
              <div class="feedback-headers">
                <p class="mt-2">Thanks for your Review!</p>
                <h5>
                  It's customary to leave a tip for the seller's service.
                </h5>
              </div>
              <div class="feedback-body">
                <p>
                  <small
                    >You won't be changed yet. Service fees apply.</small
                  >
                </p>

                <div class="tips">
                  <a href="" class="btn">$5</a>
                  <a href="" class="btn">$10</a>
                  <a href="" class="btn">$15</a>
                  <a href="" class="btn">
                    <i class="fa fa-pencil"></i>
                    custom
                  </a>
                </div>

                <div class="btn-container">
                  <a href="" class="btn">later</a>
                  <a href="" class="btn btn-primary">tip now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
          <div class="summary-wrapper">
            <div class="card p-3">
              <div class="gig-details">
                <div class="box box-img">
                  <img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt="" />
                </div>
                <div class="box">
                  <h6>
                    {{$order->serviceInfo->service_title}}
                  </h6>
                </div>
              </div>

              <ul class="list-group">
                <li>
                  <span>seller</span>
                  <span> {{$order->sellerInfo->first_name}} </span>
                </li>
                <?php
                  $approve_date = date('d M, Y', strtotime($order->updated_at));
                 ?>
                <li>
                  <span>date</span>
                  <span>{{$approve_date}}</span>
                </li>
                <li>
                  <span>amount</span>
                  <span>${{$order->order_fee}}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$('body').on('click', '#half-stars-example .rating__label', function() {
    var onStar = $(this).data('label');
    $('#communication_rating').val(onStar);
});
$('body').on('click', '#half-stars-example-service .rating__label', function() {
    var onStar = $(this).data('label');
    $('#service_rating').val(onStar);
});
$('body').on('click', '#half-stars-example-recommend .rating__label', function() {
    var onStar = $(this).data('label');
    $('#recommend_rating').val(onStar);
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#reviews-form').on('submit', function(event){
      event.preventDefault();
      // var image = $('#message_image')[0].files[0];
      var order_id = "{{$order->id}}"
      var formData = new FormData(this);
      formData.append('order_id', order_id);
      // formData.append('image', $('.message_image')[0].files[0]);
      $.ajax({
       url:"{{ url('buyer_review') }}",
       method:"POST",
       data:formData,
       // dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data){
        const socket = io.connect('https://peekvideochat.com:22000');
        console.log('check 1', socket.connected);
        socket.emit('message', data);
        toastr.success('Reviewed successfully', '', {timeOut: 5000, positionClass: "toast-top-right"});
        window.setTimeout(function(){
          window.location.href = "{{url('/manage-orders')}}";
        }, 3000);

       }
     });
   });

});
</script>
@endsection
