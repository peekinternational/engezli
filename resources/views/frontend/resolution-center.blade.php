@extends('frontend.layouts.app')
@section('title', 'Resolution Center  ')
@section('styling')
@endsection
@section('content')
<div class="create-service order-request resolution-center">
  <div class="create-service-tabs">
    <div class="container">
      <div class="inner-service-content-box">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="select-action-tab"
              data-toggle="tab"
              href="#select-action"
              role="tab"
              aria-controls="select-action"
              aria-selected="true"
            >
              <span class="t-no">1</span>
              <span class="t-name">select action</span>
              <span><i class="fa fa-angle-right"></i></span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="details-and-submit-tab"
              data-toggle="tab"
              href="#details-and-submit"
              role="tab"
              aria-controls="details-and-submit"
              aria-selected="false"
            >
              <span class="t-no">2</span>
              <span class="t-name">add details & submit</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="outer-content">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
          <form class="" action="{{url('make-resolution-request')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <input type="hidden" name="order_number" value="{{$order->order_number}}">
           <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active"
              id="select-action" role="tabpanel"
              aria-labelledby="select-action-tab">
              <div class="card p-4">
                <div class="res-header">
                  <h3>resolution center</h3>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Vero, consectetur.
                  </p>
                </div>
                <div class="radio-box">
                  <h6>What issues are you having with this order?</h6>

                  <div class="radio-lists mt-3">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="reason"
                        id="exampleRadios1"
                        value="Seller is not responding"

                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Seller is not responding
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="reason"
                        id="exampleRadios2"
                        value="Seller is extremely rude"
                      />
                      <label class="form-check-label" for="exampleRadios2">
                        Seller is extremely rude
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="reason"
                        id="exampleRadios3"
                        value="Order doesn't meet requirement"
                      />
                      <label class="form-check-label" for="exampleRadios3">
                        Order doesn't meet requirement
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="reason"
                        id="exampleRadios4"
                        value="Seller asked me to cancel"
                      />
                      <label class="form-check-label" for="exampleRadios4">
                        Seller asked me to cancel
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="reason"
                        id="exampleRadios5"
                        value="Seller cannot do required task"
                      />
                      <label class="form-check-label" for="exampleRadios5">
                        Seller cannot do required task
                      </label>
                    </div>
                  </div>
                </div>
                <!-- <div class="radio-box">
                  <h6>Can you give us more detail on why?</h6>
                  <div class="radio-lists mt-3">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios11"
                        id="exampleRadios11"
                        value="option11"
                        checked
                      />
                      <label class="form-check-label" for="exampleRadios11">
                        Default radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios22"
                        id="exampleRadios22"
                        value="option22"
                      />
                      <label class="form-check-label" for="exampleRadios22">
                        Second default radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios33"
                        id="exampleRadios33"
                        value="option33"
                      />
                      <label class="form-check-label" for="exampleRadios33">
                        Disabled radio
                      </label>
                    </div>
                  </div>
                </div> -->
                <div class="dropdown-divider my-4"></div>
                <div class="btn-containers">
                  <div class="box">
                    <p>
                      Couldn't find what you need? Contact our
                      <a href="" class="link">Customer Support</a>
                    </p>
                  </div>
                  <div class="box">
                    <a href="javascript:void(0);" id="nexttab" class="btn btn-primary nexttab disabled"
                      >Continue</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade"
              id="details-and-submit"
              role="tabpanel"
              aria-labelledby="details-and-submit-tab">
              <div class="card p-4">
                <div class="res-header">
                  <h3>resolution center</h3>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Vero, consectetur.
                  </p>
                </div>
                <div class="form-group">
                  <label for="">
                    Explain to the seller why you would like to cancel this
                    order</label>
                  <textarea
                    name="details" id=""
                    class="form-control"
                    rows="4" required></textarea>
                  <p><small>45/2500 Characters</small></p>
                </div>

                <p class="">
                  Once this order has been cancelled, you will receive a
                  refund to your
                  <a href="" class="link">shopping balance</a>
                </p>
                <div class="dropdown-divider my-4"></div>
                <div class="btn-containers">
                  <div class="box">
                    <p>
                      Couldn't find what you need? Contact our
                      <a href="" class="link">Customer Support</a>
                    </p>
                  </div>
                  <div class="box">
                    <a href="javascript:void(0);" id="prevtab" class="btn btn-white prevtab">back</a>
                    <button type="submit" class="btn btn-primary">send</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
          <div class="summary-wrapper">
            <div class="card p-3">
              <div class="gig-details">
                <div class="box box-img">
                  <img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt="" />
                </div>
                <div class="box">
                  <h6>{{$order->serviceInfo->service_title}}</h6>
                </div>
              </div>

              @if($order->serviceInfo->service_desc != null)
              <ul class="gig-list-group">
                <li>
                  <i class="fa fa-check"></i> {!! $order->serviceInfo->service_desc !!}
                </li>
              </ul>
              @endif

              <ul class="list-group">
                <li>
                  <span>status</span>
                  <p>
                    <span
                      class="status bg-pink text-white text-capitalize font-weight-bold px-2 py-1 rounded"
                      >{{$order->order_status}}</span
                    >
                  </p>
                </li>
                <li>
                  <span>order number</span>
                  <span class="text-uppercase">#{{$order->order_number}}</span>
                </li>
                <li>
                  <?php
                  $order_date = date('M d, h:i A',strtotime($order->order_time));

                   ?>
                  <span>order date</span>
                  <span>{{$order_date}}</span>
                </li>
                <li>
                  <span>quantity</span>
                  <span>X {{$order->order_qty}}</span>
                </li>
                <li>
                  <span>price</span>
                  <span>{{Engezli::convertCurrency($order->order_fee)}}</span>
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
$('input:radio[name="reason"]').change(function(){
      $('#nexttab').removeClass('disabled');
});

$('#nexttab').on('click',function () {
  $('#select-action-tab').removeClass('active');
  $('#select-action').removeClass('show active');
  $('#details-and-submit').addClass('show active');
  $('#details-and-submit-tab').addClass('active');
});
$('#prevtab').on('click',function () {
  $('#details-and-submit').removeClass('show active');
  $('#details-and-submit-tab').removeClass('active');
  $('#select-action-tab').addClass('active');
  $('#select-action').addClass('show active');
});
</script>
@endsection
