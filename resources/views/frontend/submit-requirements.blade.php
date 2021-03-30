@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
<style>
.myProgress {
  width: 100%;
  background-color: #ddd;
  position: inherit !important;
}

.myBar {
  width: 1%;
  height: 10px;
  background-color: #007bff;
}
#image{
  position: inherit !important;
}
</style>
@endsection
@section('content')
<!-- Contact Us -->
<div class="create-service order-request">
  <div class="create-service-tabs">
    <div class="container">
      <div class="inner-service-content-box">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link disabled"
              id="overview-tab"
              data-toggle="tab"
              href="#overview"
              role="tab"
              aria-controls="overview"
              aria-selected="true"
              >{{ __('home.order details')}}</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link disabled"
              id="pricing-tab"
              data-toggle="tab"
              href="#pricing"
              role="tab"
              aria-controls="pricing"
              aria-selected="false"
              >{{ __('home.confirm & pay')}}</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link active"
              id="descriptionFaq-tab"
              data-toggle="tab"
              href="#descriptionFaq"
              role="tab"
              aria-controls="descriptionFaq"
              aria-selected="false"
              >{{ __('home.submit request')}}</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="outer-content">
    <div class="container">
      <div class="inner-content">
        <div class="service-tab-content">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show active descriptionFaq-tab"
              id="descriptionFaq"
              role="tabpanel"
              aria-labelledby="descriptionFaq-tab">
              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <form class="" action="" method="post" id="requirement-form">
                  <div class="submit-request">
                    <div class="confirm-purchase outer-box">
                      <div class="box">
                        <h5 class="mb-2">{{ __('home.Thank you for your purchase')}}</h5>
                        <p>{{ __('home.A reciept was sent to your email')}}</p>
                      </div>
                      <div class="box">
                      <p><i class="fa fa-check" aria-hidden="true"></i></p>
                      </div>
                    </div>

                    <div class="outer-box mt-4">
                      <div class="heading">
                        <h5>{{ __('home.Submit requirements to start your order')}}</h5>
                        <p>
                          {{ __('home.The seller need the require information to start working on your order')}}
                        </p>
                      </div>
                      <input type="hidden" name="order_id" class="order_id" value="{{$order->id}}">
                      @foreach($order->serviceInfo->serviceReq as $key => $req)
                      <input type="hidden" name="requirement_id[]" value="{{$req->id}}">
                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>{{$key+1}}.</span>{{$req->question}}@if($req->mandatory_status == '1')<span class="text-danger">*</span> @endif
                        </h6>
                        @if($req->response == 'free text')
                        <textarea
                          class="form-control @if($req->mandatory_status == '1') required @endif"
                          name="desc-{{$req->id}}"
                          onkeydown="countWords({{$key}})"
                          id="desc-{{$key}}"
                          rows="3"
                          maxlength="2050"
                          placeholder="Write here..."></textarea>
                          @if($req->mandatory_status == '1')
                          <span class="asterisk text-danger"  style="display:none;">{{ __('home.Field Required')}}</span>
                          @endif
                        @endif
                        <p>
                          @if($req->response == 'free text')
                          <span class="length"><span class="descCount-{{$key}}">0</span>/2050</span>
                          @elseif($req->response == 'attachement')
                          <span class="form-field-file">
                            <label
                              for="attachment-{{$key}}"
                              aria-label="Attach file"
                              class="btn1">
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              onchange="move({{$key}});"
                              name="attachment-{{$req->id}}"
                              id="attachment-{{$key}}"
                              class="field-file @if($req->mandatory_status == '1') required @endif"/>
                              <span class="asterisk text-danger"  style="display:none;">{{ __('home.Field Required')}}</span>
                          </span>
                          <div id="myProgress-{{$key}}" class="myProgress" style="display: none;">
                            <div id="myBar-{{$key}}" class="myBar"></div>
                          </div>
                          @endif
                        </p>
                        <div id="image-{{$key}}"></div>
                      </div>
                      @endforeach

                      <!-- <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>2.</span> Description about new service
                        </h6>

                        <textarea
                          class="form-control"
                          name=""
                          id=""
                          rows="3"
                          placeholder="Write here..."
                        ></textarea>
                        <p>
                          <span class="length">0/2050</span>
                          <span class="form-field-file">
                            <label
                              for="cv-arquivo"
                              aria-label="Attach file"
                              class="btn1"
                            >
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              name="cv-arquivo"
                              id="cv-arquivo"
                              class="field-file"
                            />
                          </span>
                        </p>
                      </div>

                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>3.</span> Description about new service
                        </h6>

                        <textarea
                          class="form-control"
                          name=""
                          id=""
                          rows="3"
                          placeholder="Write here..."
                        ></textarea>
                        <p>
                          <span class="length">0/2050</span>
                          <span class="form-field-file">
                            <label
                              for="cv-arquivo"
                              aria-label="Attach file"
                              class="btn1"
                            >
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              name="cv-arquivo"
                              id="cv-arquivo"
                              class="field-file"
                            />
                          </span>
                        </p>
                      </div> -->
                    </div>

                    <div class="request-btn-wrap mt-4">
                      <div class="mb-3 form-check">
                        <input
                          type="checkbox"
                          name="agreed"
                          class="form-check-input required"
                          id="agreed"
                          checked />
                        <label class="form-check-label" for="agreed"></label>
                          <small>{{ __('home.I agree with terms and conditions')}}</small>
                          <br>
                        <span class="asterisk2 text-danger"  style="display:none;">{{ __('home.Field Required')}}</span>
                      </div>

                      <div class="btn-container">
                        <a href="{{url('manage-orders')}}" class="btn custom-btn"
                          >{{ __('home.Reminde me later')}}</a
                        >
                        <button type="submit" class="btn custom-btn">{{ __('home.Start Order')}}</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>{{ __('home.summary')}}</h5>

                        <div class="gig-details">
                          <div class="box box-img">
                            <img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt="" />
                          </div>
                          <div class="box">
                            <h6>{{$order->serviceInfo->service_title}}</h6>
                            <p>
                              {!! Str::limit($order->serviceInfo->service_desc,80) !!}
                            </p>
                          </div>
                        </div>
                        <?php
                        $order_date = date('M d, h:i A',strtotime($order->order_time));
                         ?>
                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.status')}}</span>
                            <span class="status incomplete"
                              >{{ __('home.incomplete')}}</span
                            >
                          </li>
                          <li>
                            <span>{{ __('home.order number')}}</span>
                            <span class="order_number">#{{$order->order_number}}</span>
                          </li>
                        </ul>

                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.order date')}}</span>
                            <span class="order_date">{{$order_date}}</span>
                          </li>
                          <li>
                            <span><strong>{{ __('home.price')}}</strong></span>
                            <span><strong class="order_price">${{$order->order_fee}}</strong></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Order -->
@endsection
@section('script')
<script>
$('#place_order').on('click',function () {
  $('#overview-tab').removeClass('active');
  $('#overview').removeClass('show active');
  $('#pricing').addClass('show active');
  $('#pricing').addClass('show active');
  $('#pricing-tab').addClass('active');
});

$(document).ready(function () {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });



  $('#requirement-form').on('submit', function(event){
    event.preventDefault();
    $(".asterisk").hide();
      var empty = $(".required").filter(function() { return !this.value; })
                .next(".asterisk").show();
    if(empty.length) return false;   //uh oh, one was empty!
    $('.right').stop().animate({scrollTop: 0}, { duration: 1500, easing: 'easeOutQuart'});
    if($('#agreed').prop('checked') == false){
      $('.asterisk2').show();
      return false;
    }

    $.ajax({
     url:"{{ url('save_requirement') }}",
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data){
      window.location.href = "{{url('manage-orders')}}"
     }
    })
 });
});

function countWords(id) {
  var textarea = $('#desc-'+id).val();
  $(".descCount-"+id).text(textarea.length);
}
</script>
<script>
var i = 0;
function move(key) {
  if (i == 0) {
    i = 1;
    $('#myProgress-'+key).show();
    var elem = document.getElementById("myBar-"+key);
    var input = document.getElementById('attachment-'+key);
    var filename = input.files.item(0).name;
    var output = document.getElementById('image-'+key);
    var width = 1;
    var id = setInterval(frame, 1);
    function frame() {
      if (width >= 100) {
        $('#myProgress-'+key).hide();
        clearInterval(id);
        i = 0;
        output.innerHTML = filename;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}
</script>
@endsection
