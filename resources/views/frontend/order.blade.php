@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
<style>
  .iframBody {
    width: 70% !important;
  }
  .iframeOut {
    margin: 50px 0 !important;
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
              class="nav-link active"
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
              class="nav-link"
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
              class="nav-link"
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
            <div
              class="tab-pane fade show active"
              id="overview"
              role="tabpanel"
              aria-labelledby="overview-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <div class="order-details">
                    <div class="outer-box">
                      <h5>{{ __('home.Customize your package')}}</h5>
                      <div class="inner-box">
                        <div class="box">
                          <img src="{{asset('images/service_images/'.$package->serviceInfo->service_img1)}}" alt="" />
                        </div>
                        <div class="box">
                          <h6 class="gig-title">{{$package->serviceInfo->service_title}}</h6>
                          <p>
                            {{ __('home.by')}}
                            <span class="name">{{$package->serviceInfo->sellerInfo->first_name}} {{$package->serviceInfo->sellerInfo->last_name}}</span>
                            <span class="rating">
                              <i class="fa fa-star"></i>
                              {{number_format($package->serviceInfo->serviceRating->avg('overall_rating'),'1','.','')}}
                            </span>
                            <span class="review">({{count($package->serviceInfo->serviceRating)}})</span>
                          </p>
                        </div>
                        <div class="box">
                          <span class="qty-text">Qty</span>
                          <span class="quantity">
                            <button class="btn minus-btn">
                              <i class="fa fa-minus"></i>
                            </button>
                            <input type="text" name="quantity" value="1" form="order-form" />
                            <button class="btn plus-btn">
                              <i class="fa fa-plus"></i>
                            </button>
                          </span>
                          <span class="price quantity-price"> ${{$package->price}} </span>
                        </div>
                      </div>
                    </div>

                    <div class="outer-box add-extra-service">
                      <h5>{{ __('home.Add extra')}}</h5>
                      <div class="list-group">
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox" name="extra"
                                class="form-check-input extra-input"
                                id="exampleCheck1" value="5"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck1"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox" name="extra"
                                class="form-check-input extra-input"
                                id="exampleCheck2" value="10"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck2"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$10</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck3"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck3"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                          <div class="text">
                            <p>
                              Lorem ipsum dolor sit amet consectetur
                              adipisicing elit. Ad delectus quasi quis
                              earum, aut incidunt eos deleniti a excepturi,
                              dolor quas asperiores enim placeat vitae sint
                              laboriosam, explicabo eligendi dolore!
                            </p>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck14"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck14"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck15"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck15"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck16"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck16"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>{{ __('home.summary')}}</h5>
                        <?php
                        $total_price = $package->price+5;
                         ?>

                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.subtotal')}}</span>
                            <span class="package-price subtotal">${{$package->price}}</span>
                          </li>
                          <li>
                            <span>{{ __('home.service fee')}}</span>
                            <span>$5</span>
                          </li>
                        </ul>
                        <ul class="list-group border-top mt-2 pt-2">
                          <li>
                            <span>{{ __('home.delivery time')}}</span>
                            <span>{{$package->delivery_time}}</span>
                          </li>
                          <li>
                            <span><strong>{{ __('home.total')}}</strong></span>
                            <span><strong class="total-price">${{$total_price}}</strong></span>
                          </li>
                        </ul>
                        <a href="javascript:void(0);" class="btn custom-btn" id="place_order"> {{ __('home.place order')}} </a>
                        <small>{{ __("home.You won't be changed yet")}}</small>
                      </div>
                    </div>

                    <div class="payment-methods card mt-3">
                      <ul>
                        <li>
                          <a href="">
                            <img src="images/fawry.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img src="images/visa.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img src="images/mastercard.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img
                              src="images/Meeza_Egyptian_company_logo.svg"
                              alt=""
                            />
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade pricing-tab-container"
              id="pricing"
              role="tabpanel"
              aria-labelledby="pricing-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <div class="confirm-and-pay">
                    <div class="outer-box">
                      <div class="payment-tab-container">
                        <div class="lists-item">
                          <h5>{{ __('home.saved cards')}}</h5>
                          <div class="inner-box">
                            <p class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="exampleRadios"
                                id="exampleRadios1134"
                                value="option1"
                                checked
                              />
                              <label
                                class="form-check-label"
                                for="exampleRadios1134"
                              >
                                <img src="images/mastercard.svg" alt="" />
                                MasterCard Ending in *****8900
                                <span class="expire-date">
                                  expires 30/2</span
                                >
                              </label>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="outer-box mt-4">
                      <div class="add-payment-method">
                        <h5>{{ __('home.more payment options')}}</h5>

                        <div class="payment-option">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="paymentOption"
                              id="masterCard"
                              value="card"
                              form="order-form"
                              checked
                            />
                            <label
                              class="form-check-label"
                              for="masterCard"
                            >
                              <img src="images/mastercard.svg" alt="" />
                              Master Card
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="paymentOption"
                              id="visaCard"
                              value="card"
                              form="order-form"
                            />
                            <label
                              class="form-check-label"
                              for="visaCard"
                            >
                              <img src="images/visa.svg" alt="" /> Visa Card
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="paymentOption"
                              id="acceptKisok"
                              value="kiosk"
                              form="order-form"
                            />
                            <label
                              class="form-check-label"
                              for="acceptKisok"
                            >
                              <img src="images/fawry.svg" alt="" /> Accept Kiosk
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="paymentOption"
                              id="mobileWallet"
                              value="wallet"
                              form="order-form"
                            />
                            <label
                              class="form-check-label"
                              for="mobileWallet"
                            >
                              <img src="images/fawry.svg" alt="" /> Mobile Wallet
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="paymentOption"
                              id="stripe"
                              value="stripe"
                              form="order-form" data-toggle="modal" data-target="#paymentCardModal" />
                            <label
                              class="form-check-label"
                              for="stripe">
                              <img src="images/mastercard.svg" alt="" /> Stripe
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>{{ __('home.summary')}}</h5>

                        <div class="gig-details">
                          <div class="box box-img">
                            <img src="{{asset('images/service_images/'.$package->serviceInfo->service_img1)}}" alt="" />
                          </div>
                          <div class="box">
                            <h6>{{$package->serviceInfo->service_title}}</h6>
                            <p>
                                {!! Str::limit($package->serviceInfo->service_desc,80) !!}
                            </p>
                          </div>
                        </div>

                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.subtotal')}}</span>
                            <span class="package-price subtotal">${{$package->price}}</span>
                          </li>
                          <li>
                            <span>{{ __('home.service fee')}}</span>
                            <span>$5</span>
                          </li>
                        </ul>

                        <ul class="list-group border-top mt-2 pt-2">
                          <li>
                            <span>{{ __('home.delivery time')}}</span>
                            <span>{{$package->delivery_time}}</span>
                          </li>
                          <li>
                            <span><strong>{{ __('home.total')}}</strong></span>
                            <span><strong class="total-price">${{$total_price}}</strong></span>
                          </li>
                        </ul>
                        <form class="" action="" method="post" id="order-form">
                          {{csrf_field()}}
                          <input type="hidden" name="package_price" class="package_price" value="{{$package->price}}">
                          <input type="hidden" name="package_id" class="package_price" value="{{$package->id}}">
                          <input type="hidden" name="service_id" class="service_id" value="{{$package->services_id}}">
                          <input type="hidden" name="seller_id" class="seller_id" value="{{$package->serviceInfo->seller_id}}">
                          <input type="hidden" name="order_fee" class="total_price" value="{{$total_price}}">
                          <input type="hidden" name="order_duration" class="order_duration" value="{{$package->delivery_time}}">
                          <input type="hidden" name="service_fee" class="service_fee" value="5">


                        <button type="submit" id="#card-button" class="btn custom-btn btn-block"> {{ __('home.confirm & pay')}} </button>
                      </form>

                        <small>{{ __('home.By clicking Confirm and Pay you will be charged')}}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade descriptionFaq-tab"
              id="descriptionFaq"
              role="tabpanel"
              aria-labelledby="descriptionFaq-tab"
            >
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
                      <input type="hidden" name="order_id" class="order_id" value="22">
                      @foreach($package->serviceInfo->serviceReq as $key => $req)
                      <input type="hidden" name="requirement_id[]" value="{{$req->id}}">
                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>{{$key+1}}.</span>{{$req->question}}@if($req->mandatory_status == '1')<span class="text-danger">*</span> @endif
                        </h6>
                        @if($req->response == 'free text')
                        <textarea
                          class="form-control @if($req->mandatory_status == '1') required @endif"
                          name="desc-{{$req->id}}"
                          id="desc-{{$key}}"
                          rows="3"
                          placeholder="Write here..."></textarea>
                          @if($req->mandatory_status == '1')
                          <span class="asterisk text-danger"  style="display:none;">{{ __('home.Field Required')}}</span>
                          @endif
                        @endif
                        <p>
                          @if($req->response == 'free text')
                          <span class="length">0/2050</span>
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
                              name="attachment-{{$req->id}}"
                              id="attachment-{{$key}}"
                              class="field-file @if($req->mandatory_status == '1') required @endif"/>
                              <span class="asterisk text-danger"  style="display:none;">{{ __('home.Field Required')}}</span>
                          </span>
                          @endif

                        </p>
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
                            <img src="{{asset('images/service_images/'.$package->serviceInfo->service_img1)}}" alt="" />
                          </div>
                          <div class="box">
                            <h6>{{$package->serviceInfo->service_title}}</h6>
                            <p>
                              {!! Str::limit($package->serviceInfo->service_desc,80) !!}
                            </p>
                          </div>
                        </div>

                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.status')}}</span>
                            <span class="status incomplete"
                              >{{ __('home.incomplete')}}</span
                            >
                          </li>
                          <li>
                            <span>{{ __('home.order number')}}</span>
                            <span class="order_number"></span>
                          </li>
                        </ul>

                        <ul class="list-group">
                          <li>
                            <span>{{ __('home.order date')}}</span>
                            <span class="order_date"></span>
                          </li>
                          <li>
                            <span><strong>{{ __('home.price')}}</strong></span>
                            <span><strong class="order_price"></strong></span>
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
<!-- Button trigger modal -->
<div class="modal fade" id="paymentCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stripe Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" id="stripe_form" action="{{url('create_order_stripe')}}"  method="post">
          {{csrf_field()}}
          <input type="hidden" name="package_price" class="package_price" value="{{$package->price}}">
          <input type="hidden" name="package_id" class="package_price" value="{{$package->id}}">
          <input type="hidden" name="service_id" class="service_id" value="{{$package->services_id}}">
          <input type="hidden" name="seller_id" class="seller_id" value="{{$package->serviceInfo->seller_id}}">
          <input type="hidden" name="order_fee" class="total_price" value="{{$total_price}}">
          <input type="hidden" name="order_duration" class="order_duration" value="{{$package->delivery_time}}">
          <input type="hidden" name="service_fee" class="service_fee" value="5">
          <input type="hidden" name="quantity" value="1" class="quantity-stripe" />
          <div class="form-group">
            <label for="card-element">
              Credit or debit card
            </label>
            <input type="hidden" name="payment_methods" id="payment_methods" class="payment_methods" value="">
            <input id="card-holder-name" class="form-control" placeholder="Card Holder Name" type="text">

          </div>
          <div class="form-group">

          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>
          <div id="card-errors" role="alert"></div>
          </div>
          <button class="button-continue-payment btn btn-primary" id="card-button" type="submit">Confrim & Pay</button>
        </form>

      <!-- </form> -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Order -->
@endsection
@section('script')
<!-- <script src="{{asset('js/cdn/bootstrap.min.js')}}"></script> -->
<script>
$('.minus-btn').click(function () {
  var $input = $(this).parent().find('input');
  var price = "{{$package->price}}";
  var count = parseInt($input.val()) - 1;
  count = count < 1 ? 1 : count;
  $input.val(count);
  $('.quantity-stripe').val(count);
  var new_price = $input.val()*price;
  var quantity_price = $input.val()*price;
  var extra = '';
  $('.quantity-price').text('$'+quantity_price);
  $('input[name="extra"]:checked').each(function() {
    console.log(this.value);
    if (extra == '') {
      extra = this.value;
    }else {
      extra = parseFloat(extra)+parseFloat(this.value);
    }
});
if (extra !='') {
  new_price = parseFloat(new_price)+parseFloat(extra);
}
  var total_price = new_price+5;

  $('.package_price').val(new_price);
  $('.total_price').val(total_price);
  $('.package-price').text('$'+new_price);
  $('.total-price').text('$'+total_price);
  $input.change();
  return false;
});
$('.plus-btn').click(function () {
  var $input = $(this).parent().find('input');
  var price = "{{$package->price}}";
  $input.val(parseInt($input.val()) + 1);
  $('.quantity-stripe').val(parseInt($('.quantity-stripe').val()) + 1);
  var new_price = $input.val()*price;
  var extra = '';
  $('.quantity-price').text('$'+new_price);
  $('input[name="extra"]:checked').each(function() {
    console.log(this.value);
    if (extra == '') {
      extra = this.value;
    }else {
      extra = parseFloat(extra)+parseFloat(this.value);
    }
});
if (extra !='') {
  new_price = parseFloat(new_price)+parseFloat(extra);
}
  console.log(new_price);
  var total_price = new_price+5;
  $('.package-price').text('$'+new_price);
  $('.package_price').val(new_price);
  $('.total_price').val(total_price);
  $('.total-price').text('$'+total_price);
  $input.change();
  return false;
});

$('.extra-input').on('change', function () {
  if($(this).is(':checked')){
    var extra = $(this).val();
    var package_price = $('.package_price').val();
    var subtotal = parseFloat(package_price)+parseFloat(extra);
    var total = subtotal+5;
  }else {
    var extra = $(this).val();
    var package_price = $('.package_price').val();
    var subtotal = parseFloat(package_price)-parseFloat(extra);
    var total = subtotal+5;
  }
  $('.subtotal').text('$'+subtotal);
  $('.package_price').val(subtotal);
  $('.total_price').val(total);
  $('.total-price').text('$'+total);
});

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

  $('#order-form').on('submit', function(event){
    event.preventDefault();
    var stripe = $('#stripe').val();
    // alert(stripe);
    // $('#paymentCardModal').modal('show')
    $('.main-loader').css('display','flex');
    $.ajax({
     url:"{{ url('create_order') }}",
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data){
      $('.main-loader').css('display','none');
       // alert(data.kiosk);
       if(data.kiosk){
        swal({
        type: 'success',
        // text: 'You order has been successfully received.',
        // html: $('<div>').text('Reference number:''<b>'+data.kiosk+''),
        text: 'You order has been successfully received.Reference number:'+data.kiosk+'To pay, go to the nearest Aman or Masary or Momkn outlet, ask for "مدفوعات اكسبت/ Madfouaat Accept" and provide your reference number.',
        // timer: 2000,
        button: "Ok"
        // onOpen: function(){
        // swal.showLoading()
        // }
        });
        $('.order_number').text(data.order.order_number);
        $('.order_id').val(data.order.id);
        $('.order_date').text(data.order.date);
        $('.order_price').text('$'+data.order.order_fee);
        $('#pricing-tab').removeClass('active');
        $('#pricing').removeClass('active show');
        $('#descriptionFaq-tab').addClass('active');
        $('#descriptionFaq').addClass('active show');
       }
       if(data.card){
        location.href = 'https://accept.paymob.com/api/acceptance/iframes/179872?payment_token='+data.card;
       }
       if(data.wallet){
        location.href = data.wallet;
        $('#pricing-tab').removeClass('active');
        $('#pricing').removeClass('active show');
        $('#descriptionFaq-tab').addClass('active');
        $('#descriptionFaq').addClass('active show');
       }
       // $('#card_form').html(data);
       console.log(data.order_number);
       // $('#paymentCardModal').modal('show')
       $('.order_number').text(data.order.order_number);
       $('.order_id').val(data.order.id);
       $('.order_date').text(data.order.date);
       $('.order_price').text('$'+data.order.order_fee);
       $('#pricing-tab').removeClass('active');
       $('#pricing').removeClass('active show');
       $('#descriptionFaq-tab').addClass('active');
       $('#descriptionFaq').addClass('active show');
      // $('.added-questions').append(data);
      // $('#requirements-form textarea').val('');
     }
    })
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
      // $('.added-questions').append(data);
      // $('#requirements-form textarea').val('');
     }
    })
 });
});
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe("pk_test_51HA9gfGtetOlRlqTdCFvmVNMKRgtvCrQB5qmWRN2dXzRiRmPPvAGwRt63gP0EBwhIDO6hG1cRTHwhXwBXbgDeOKI00Z9THfEP2");
console.log(stripe);
// Create an instance of Elements.
const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

// cardButton.addEventListener('click', async (e) => {
//
// });

var form = document.getElementById('stripe_form');
form.addEventListener('submit', async(event) => {
event.preventDefault();
const { paymentMethod, error } = await stripe.createPaymentMethod(
    'card', cardElement, {
        billing_details: { name: cardHolderName.value }
    }
);

// Handle real-time validation errors from the card Element.
cardElement.addEventListener('change', function (event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

console.log(paymentMethod);
if (error) {
    // Display "error.message" to the user...
} else {
  // alert(paymentMethod.id)
  console.log(paymentMethod.id);
  $('#payment_methods').val(paymentMethod.id);

}
stripe.createToken(cardElement).then(function(result) {

    if (result.error) {
    // Inform the user if there was an error.
    var errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
    // resetButton()
    } else {
      $('#card-button').prop('disabled', true);
      $('#card-button').html('Processing ...');
    // Send the token to your server.
    stripeTokenHandler(result.token);
    }
});
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('stripe_form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
</script>

@endsection
