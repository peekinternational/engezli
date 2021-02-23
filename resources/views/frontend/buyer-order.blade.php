@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
@endsection
@section('content')
<div class="admin">
  <div class="create-service order-request buyer-order">
  <div class="create-service-tabs">
    <div class="container">
      <div class="inner-service-content-box">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="acitvity-tab"
              data-toggle="tab"
              href="#acitvity"
              role="tab"
              aria-controls="acitvity"
              aria-selected="true"
              >{{ __('home.acitvity')}}</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="details-tab"
              data-toggle="tab"
              href="#details"
              role="tab"
              aria-controls="details"
              aria-selected="false"
              >{{ __('home.details')}}</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="requirements-tab"
              data-toggle="tab"
              href="#requirements"
              role="tab"
              aria-controls="requirements"
              aria-selected="false"
              >{{ __('home.requirements')}}</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="delivery-tab"
              data-toggle="tab"
              href="#delivery"
              role="tab"
              aria-controls="delivery"
              aria-selected="false"
              >{{ __('home.delivery')}}</a
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
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <div class="tab-content" id="myTabContent">
                <div
                  class="tab-pane fade show active"
                  id="acitvity"
                  role="tabpanel"
                  aria-labelledby="acitvity-tab">
                  @if(count($order->orderRequirement) == 0)
                  <div class="submit-requirements card p-4 mb-4">
                    <div class="rqm-box-container">
                      <div class="rqm-box">
                        <h5 class="mb-2">
                          {{ __('home.One last step to get your order started!')}}
                        </h5>
                        <p>
                          {{ __('home.We noticed Finchbill about your order. Submit your requirements to get your order started.')}}
                        </p>
                      </div>
                      <div class="rqm-box">
                        <button class="btn custom-btn-warning">
                          {{ __('home.submit requirements')}}
                        </button>
                      </div>
                    </div>
                  </div>
                  @endif

                  <div class="gig-extras card p-4 mb-4">
                    <div class="header">
                      <h5>{{ __('home.Have everything you need?')}}</h5>
                      <p class="mt-2">{{ __('home.enhance your order with Gig extras')}}</p>
                    </div>

                    <div class="table-responsive border rounded">
                      <table class="table">
                        <tr class="text-uppercase">
                          <th>{{ __('home.item')}}</th>
                          <th>{{ __('home.QTY.')}}</th>
                          <th>{{ __('home.duration')}}</th>
                          <th>{{ __('home.price')}}</th>
                          <th></th>
                        </tr>
                        <tr>
                          <td>Lorem ipsum dolor sit, amet consectetur</td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button
                              class="btn btn-primary custom-btn text-white"
                            >
                              {{ __('home.add')}}
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>Lorem ipsum dolor sit, amet consectetur</td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button
                              class="btn btn-primary custom-btn text-white"
                            >
                              {{ __('home.add')}}
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>Lorem ipsum dolor sit, amet consectetur</td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button
                              class="btn btn-primary custom-btn text-white"
                            >
                              {{ __('home.add')}}
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>Lorem ipsum dolor sit, amet consectetur</td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button
                              class="btn btn-primary custom-btn text-white"
                            >
                              {{ __('home.add')}}
                            </button>
                          </td>
                        </tr>
                      </table>
                    </div>

                    <p>
                      <i class="fa fa-lock text-primary"></i>
                      <strong>SSL Secure payment.</strong> {{ __('home.you will not be changed yet')}}.
                    </p>
                  </div>

                  <div class="activity-tab-container card">
                    <?php
                    $order_date = date('M d, h:i A',strtotime($order->order_time));
                    $duratoin = $order->order_duration;
                    $delivery_date = date('M d, h:i A',strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    $requirements_date = date('M d, h:i A',strtotime($order->orderRequirement[0]->created_at));
                    $only_date = date('M d',strtotime($order->order_time));
                     ?>
                    <span class="date">{{$only_date}}</span>
                    <div class="tab-list-item">
                      <div class="t-header">
                        <div class="box-item">
                          <i class="fa fa-file-o"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            {{ __('home.You Placed The Order')}}
                            <span class="time">{{$order_date}}</span>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="tab-list-item">
                      <div class="t-header">
                        <div class="box-item">
                          <i class="fa fa-pencil"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            {{ __('home.You Submitted The Requirements')}}
                            <span class="time">{{$requirements_date}}</span>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="tab-list-item">
                      <div class="t-header">
                        <div class="box-item">
                          <i class="fa fa-rocket"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            {{ __('home.Your Order Started')}}
                            <span class="time">{{$requirements_date}}</span>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="tab-list-item">
                      <div class="t-header">
                        <div class="box-item">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            {{ __('home.our Delivery Date Was Updated')}}
                            <span class="time">{{$delivery_date}}</span>
                          </h6>
                        </div>
                      </div>
                    </div>

                    <!-- ////////////////////////// -->

                    <!-- component -->
                    <orderconversation :orderdata="{{$order}}" :userdata="{{auth()->user()}}"></orderconversation>
                    <!-- /component -->

                    <!-- ///////////////////////////////////// -->

                    <div
                      class="accordion custom-accordion buyer-reply message_area"
                      id="accordionExample"
                    >
                      <div class="card p-3">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button
                              class="btn btn-link btn-block text-left d-flex justify-content-between"
                              type="button"
                              data-toggle="collapse"
                              data-target="#collapseOne"
                              aria-expanded="true"
                              aria-controls="collapseOne"
                            >
                              <div
                                class="share-info d-flex align-items-center"
                              >
                                <div class="box">
                                  @if($order->buyerInfo->profile_image)
                                  <img src="{{asset('/images/user_images/'.$order->buyerInfo->profile_image)}}" alt="" />
                                  @else
                                  <img src="../images/s1.png" alt="" />
                                  @endif
                                </div>
                                <div class="box">
                                  <h6 class="text-primary">
                                    {{ __('home.Have something to share with')}} {{$order->sellerInfo->first_name}}?
                                  </h6>
                                  <p>
                                    <span class="box first"
                                      >local time:
                                      <span>10:54 PM</span></span
                                    >
                                    <span class="box second"
                                      ><i class="fa fa-circle"></i>
                                      {{ __('home.seller is')}}
                                      <span>{{ __('home.online')}}</span></span
                                    >
                                  </p>
                                </div>
                              </div>
                            </button>
                          </h2>
                        </div>

                        <div
                          id="collapseOne"
                          class="collapse show "
                          aria-labelledby="headingOne"
                          data-parent="#accordionExample">
                        <form class="" id="message-form" enctype="multipart/form-data">
                          <div class="card-body mt-3">
                            <textarea
                              name="message" id=""
                              rows="6"
                              class="form-control"
                              placeholder="Type your message here..."></textarea>

                            <div
                              class="d-flex justify-content-between align-items-center mt-2"
                            >
                              <span class="form-field-file">
                                <label
                                  for="message_image"
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
                                  name="file"
                                  id="message_image"
                                  class="field-file"
                                />
                              </span>
                              <button type="submit" class="btn text-primary pr-0">
                                {{ __('home.Send')}}
                              </button>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="details"
                  role="tabpanel"
                  aria-labelledby="details-tab"
                >
                  <div
                    class="details-tab-container text-capitalize card p-4"
                  >
                    <div
                      class="details-header d-flex justify-content-between align-items-center"
                    >
                      <div class="box">
                        <h5>{{$order->serviceInfo->service_title}}</h5>
                        <div class="order-info d-flex">
                          <p>
                            {{ __('home.order info')}}
                            <strong class="text-primary">{{$order->sellerInfo->first_name}} {{$order->sellerInfo->last_name}}</strong>
                          </p>
                          <p>
                            {{ __('home.delivery date')}}
                            <span class="font-weight-bold"
                              >{{$delivery_date}}</span
                            >
                          </p>
                        </div>
                      </div>
                      <div class="box text-right">
                        <p class="text-uppercase font-weight-bold mb-1">
                          {{ __('home.total price')}}
                        </p>
                        <h4>${{$order->order_fee}}</h4>
                      </div>
                    </div>

                    <div
                      class="order-no d-flex justify-content-between py-2 border-top border-bottom mt-3"
                    >
                      <p>
                        {{ __('home.order number')}}
                        <strong class="order-number">#{{$order->order_number}}</strong>
                      </p>
                      <a href="" class="text-primary text-capitalize"
                        ><strong>{{ __('home.view invoice')}}</strong></a
                      >
                    </div>

                    <div class="description my-4">
                      <h6 class="text-uppercase border-bottom pb-3 mb-3">
                        {{ __('home.description')}}
                      </h6>
                      <p>
                        {{$order->serviceInfo->service_desc}}
                      </p>
                    </div>

                    <div class="order-detail-info border">
                      <div
                        class="heading-container d-flex justify-content-between p-3 border-bottom"
                      >
                        <p>
                          <i class="fa fa-file"></i>
                          <strong>{{ __('home.your order')}} </strong>
                          <small>{{$order_date}}</small>
                        </p>
                        <p>{{ __('home.paid with credit card')}}</p>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <tr class="text-uppercase">
                            <th>{{ __('home.item')}}</th>
                            <th>{{ __('home.QTY.')}}</th>
                            <th>{{ __('home.duration')}}</th>
                            <th>{{ __('home.price')}}</th>
                          </tr>
                          <tr class="bg-white">
                            <?php
                            $original_free = $order->order_fee-$order->service_fee;
                             ?>
                            <td>{{$order->serviceInfo->service_title}}</td>
                            <td>{{$order->order_qty}}</td>
                            <td>{{$order->order_duration}}</td>
                            <td>${{$original_free}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">{{ __('home.subtotal')}}</td>
                            <td>${{$original_free}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">{{ __('home.service fee')}}</td>
                            <td>${{$order->service_fee}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">{{ __('home.total')}}</td>
                            <td>${{$order->order_fee}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <small class="customer-support text-center w-100 mt-3"
                      >Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Rerum, fugit
                      <a href="" class="text-primary"
                        >customer support sepecialists.</a
                      ></small
                    >
                  </div>
                </div>
                <div
                  class="tab-pane fade requirements-tab"
                  id="requirements"
                  role="tabpanel"
                  aria-labelledby="requirements-tab">
                  <div class="requirement-tab-container card @if(count($order->orderRequirement) == 0) empty-box @endif p-4">
                    <div class="inner-content">
                      @if(count($order->orderRequirement) > 0)
                      @foreach($order->orderRequirement as $key => $req)
                      <div class="requrement-list-item">
                        <h6><span>{{$key+1}}</span> {{$req->requirementInfo->question}}</h6>
                        @if($req->requirement !=null)
                        <p>
                          {{$req->requirement}}
                        </p>
                        @else
                        <div class="gig-details">
                          <div class="box">
                            <a target="_blank" href="{{asset('images/order_requirements/'.$req->image)}}"><img src="{{asset('images/order_requirements/'.$req->image)}}" style="width:250px; height:200px;" alt=""></a>
                          </div>
                        </div>
                        @endif
                      </div>
                      @endforeach
                      @else
                      <img src="../images/requirements.svg" alt="" />
                      <h6>{{ __('home.Submit the requirements')}}</h6>
                      <p>
                        {{ __('home.Please submit the requirements so that')}}
                        <strong class="text-primary">{{$order->sellerInfo->first_name}}</strong>
                        {{ __('home.can start working on your order')}}.
                      </p>
                      <button
                        class="btn btn-primary custom-btn text-white mt-3">
                        {{ __('home.submit requirement')}}
                      </button>
                      @endif
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade delivery-tab"
                  id="delivery"
                  role="tabpanel"
                  aria-labelledby="delivery-tab"
                >
                  <!-- <div class="delivery-tab-container card empty-box p-4"> -->
                  <div class="delivery-tab-container card p-4">
                    <delivery :orderdata="{{$order}}" :userdata="{{auth()->user()}}"></delivery>
                    <div class="inner-content no_delivery">
                      <img src="../images/delivery-box.svg" alt="" />
                      <h6>{{ __('home.The best things are worth the wait')}}</h6>
                      <p>
                        <span>{{$order->sellerInfo->first_name}}</span> {{ __('home.should deliver this order by')}}
                        {{$delivery_date}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <div class="summary-wrapper">
                <div class="card">
                  <div class="p-3">
                    <div
                      class="summary-header d-flex align-items-center justify-content-between mb-3"
                    >
                      <h5 class="mb-0">{{ __('home.order-details')}}</h5>

                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          id="dropdownMenuButton"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div
                          class="dropdown-menu"
                          aria-labelledby="dropdownMenuButton"
                        >
                          <a class="dropdown-item" href="#">{{ __('home.Action')}}</a>
                          <a class="dropdown-item" href="#"
                            >{{ __('home.Another action')}}</a
                          >
                          <a class="dropdown-item" href="#"
                            >{{ __('home.Something else here')}}</a
                          >
                        </div>
                      </div>
                    </div>

                    <div class="gig-details">
                      <div class="box box-img">
                        <img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt="" />
                      </div>
                      <div class="box">
                        <h6>{{$order->serviceInfo->service_title}}</h6>
                        <p class="mt-3">
                          @if($order->order_status == 'completed')
                          <span
                            class="bg-success text-white text-capitalize font-weight-bold px-2 py-1 rounded"
                            >{{$order->order_status}}</span>
                          @else
                          <span
                            class="bg-warning text-white text-capitalize font-weight-bold px-2 py-1 rounded"
                            >{{$order->order_status}}</span>
                          @endif
                        </p>
                      </div>
                    </div>

                    <ul class="list-group">
                      <li>
                        <span>{{ __('home.order from')}}</span>
                        <span class="text-primary">{{$order->sellerInfo->first_name}}</span>
                      </li>
                      <li>
                        <span>{{ __('home.delivery date')}}</span>
                        <span>{{$delivery_date}}</span>
                      </li>
                    </ul>

                    <ul class="list-group">
                      <li>
                        <span>{{ __('home.total price')}}</span>
                        <span>${{$order->order_fee}}</span>
                      </li>
                      <li>
                        <span>{{ __('home.order number')}}</span>
                        <span class="text-uppercase">#{{$order->order_number}}</span>
                      </li>
                    </ul>
                  </div>

                  <div class="track-order">
                    <div
                      class="accordion custom-accordion"
                      id="accordionExamples42"
                    >
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button
                              class="btn btn-link"
                              type="button"
                              data-toggle="collapse"
                              data-target="#collapseOnes98"
                              aria-expanded="true"
                              aria-controls="collapseOnes98"
                            >
                              {{ __('home.track order')}}
                            </button>
                          </h2>
                        </div>

                        <div
                          id="collapseOnes98"
                          class="collapse show"
                          data-parent="#accordionExamples42">
                          <?php
                            $order_requirements = count($order->orderRequirement);
                            $order_progress = Engezli::getorderDelivery($order->id,'delivery');
                            $order_delivery = Engezli::getorderDelivery($order->id,'delivery');
                            $order_completed = Engezli::getorderDelivery($order->id,'approved');
                           ?>
                          <div class="card-body">
                            <div class="track-order-lists">
                              <div class="list-item completed">
                                <span>{{ __('home.order placed')}}</span>
                                <div class="status"></div>
                              </div>
                              <div class="list-item @if($order_requirements > 0) completed
                                @else in-progress  @endif">
                                <span>{{ __('home.requirements submitted')}}</span>
                                <div class="status"></div>
                              </div>
                              <div class="list-item @if($order_completed == '1') completed
                              @else @if($order_progress == '0') in-progress @else completed @endif @endif">
                                <span>{{ __('home.order in progress')}}</span>
                                <div class="status"></div>
                              </div>
                              <div class="list-item @if($order_completed == '1') completed
                              @else @if($order_delivery == '1') completed @elseif($order_delivery == '1') in-progress @endif @endif">
                                <span>{{ __('home.review delivery')}}</span>
                                <div class="status"></div>
                              </div>
                              <div class="list-item @if($order_completed == '1') completed @endif">
                                <span>{{ __('home.complete order')}}</span>
                                <div class="status"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="help mt-4">
                <div class="card">
                  <div class="row">
                    <div class="col-1">
                      <i class="fa fa-info-circle fa-2x"></i>
                    </div>
                    <div class="col-10 offset-md-1">
                      <p>Have issue with your order? visit the <a href="{{url('resolution-center/'.$order->order_number)}}">resolution center</a> </p>
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
@endsection
@section('script')
<script>
$(document).ready(function () {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#message-form').on('submit', function(event){
    event.preventDefault();
    // var image = $('#message_image')[0].files[0];
    // console.log(image);
    var order_id = "{{$order->id}}"
    var formData = new FormData(this);
    formData.append('order_id', order_id);
    // formData.append('image', $('.message_image')[0].files[0]);
    $.ajax({
     url:"{{ url('order_conversation') }}",
     method:"POST",
     data:formData,
     // dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data){
       var form = document.getElementById("message-form");
       form.reset();
      // console.log(data);
      // $('.show_messages').append(data);
      const socket = io.connect('https://peekvideochat.com:22000');
      console.log('check 1', socket.connected);
      socket.emit('message', data);

     }
   });
 });
});

function addFriend(user_id) {
  var sender_id  = "{{auth()->user()->id}}";
  // alert(user_id+'/'+sender_id);
  $.ajax({
   type: 'POST',
   url: "{{url('/api/add-friend')}}",
   data:{receiver_id:user_id,sender_id:sender_id},
   xhrFields: {withCredentials: true},
   success:function(data){
     console.log(data);
     window.location.href = "{{url('messages?conversation=')}}"+data;
   }
 });
}
</script>
@endsection
