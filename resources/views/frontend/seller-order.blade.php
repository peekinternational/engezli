@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
@endsection
@section('content')
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
              >acitvity</a
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
              >details</a
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
              >requirements</a
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
              >delivery</a
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
            <div class="col-8">
              <div class="tab-content" id="myTabContent">
                <div
                  class="tab-pane fade show active"
                  id="acitvity"
                  role="tabpanel"
                  aria-labelledby="acitvity-tab"
                >
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
                            You Placed The Order
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
                            You Submitted The Requirements
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
                            Your Order Started
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
                            our Delivery Date Was Updated
                            <span class="time">{{$delivery_date}}</span>
                          </h6>
                        </div>
                      </div>
                    </div>

                    <!-- ////////////////////////// -->

                  <orderconversation></orderconversation>
                  </div>

                  <div class="btn-container text-center d-block my-4">
                    <div class="">
                      <a
                        href=""
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        >deliver now</a
                      >
                      <h6 class="small font-weight-bold mt-3">- OR -</h6>
                    </div>
                  </div>

                  <div class="seller-reply-box text-capitalize">
                    <div class="card">
                      <form class="" id="message-form">
                        <div class="card-header d-flex justify-content-between align-items-center p-3">
                          <div class="select-box">
                            <select name="" id="" class="select2">
                              <option value="">usee a quick response</option>
                              <option value="">option 1</option>
                              <option value="">option 2</option>
                              <option value="">option 3</option>
                              <option value="">option 4</option>
                            </select>
                          </div>
                          <div class="d-flex">
                            <small class="pr-2 mr-2 border-right">
                              last seen <strong>4 days ago</strong>
                            </small>
                            <small>local time <strong>mon 06:32</strong></small>
                          </div>
                        </div>
                        <div class="card-body">
                          <textarea
                          name="message"
                          id=""
                          class="form-control"
                          rows="4"
                          placeholder="Type your message here..."></textarea>

                          <div class="d-flex justify-content-between align-items-center mt-2">
                            <p>
                              <a href="" class="text-primary">
                                <i class="fa fa-plus-circle"></i> offer more extras</a>
                                <a href="" class="text-muted">
                                  <i class="fa fa-eraser ml-3"></i> clear message</a>
                                </p>
                                <p>
                                  <span>0 / 2500</span>
                                  <a href="" class="mx-2"><i class="fa fa-smile-o"></i></a>
                                  <span class="form-field-file">
                                    <label
                                    for="cv-arquivo"
                                    aria-label="Attach file"
                                    class="btn1">
                                    <i class="fa fa-paperclip"
                                    aria-hidden="true"></i>
                                  </label>

                                  <input
                                  type="file"
                                  name="cv-arquivo"
                                  ref="msg_file"
                                  id="cv-arquivo"
                                  class="field-file" />
                                </span>
                              </p>
                            </div>

                            <div class="d-block text-right mt-3">
                              <button type="submit" class="btn btn-primary">send</button>
                            </div>
                          </div>
                        </form>
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
                        <h5>i will do modern web UI Design</h5>
                        <div class="order-info d-flex">
                          <p>
                            order info
                            <strong class="text-primary">amnawrites</strong>
                          </p>
                          <p>
                            delivery date
                            <span class="font-weight-bold"
                              >nov 22, 01:21 PM</span
                            >
                          </p>
                        </div>
                      </div>
                      <div class="box text-right">
                        <p class="text-uppercase font-weight-bold mb-1">
                          total price
                        </p>
                        <h4>$78</h4>
                      </div>
                    </div>

                    <div
                      class="order-no d-flex justify-content-between py-2 border-top border-bottom mt-3"
                    >
                      <p>
                        order number
                        <strong class="order-number">#d0f9gdf0gfg</strong>
                      </p>
                      <a href="" class="text-primary text-capitalize"
                        ><strong>view invoice</strong></a
                      >
                    </div>

                    <div class="description my-4">
                      <h6 class="text-uppercase border-bottom pb-3 mb-3">
                        description
                      </h6>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Optio, quas eveniet distinctio necessitatibus
                        aperiam, velit incidunt, placeat nemo aliquam soluta
                        reiciendis! Eum earum inventore amet corrupti,
                        necessitatibus deserunt tempore reprehenderit.
                      </p>
                    </div>

                    <div class="order-detail-info border">
                      <div
                        class="heading-container d-flex justify-content-between p-3 border-bottom"
                      >
                        <p>
                          <i class="fa fa-file"></i>
                          <strong>your order </strong>
                          <small>nov 10, 12:34PM</small>
                        </p>
                        <p>paid with credit card</p>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <tr class="text-uppercase">
                            <th>item</th>
                            <th>QTY.</th>
                            <th>duration</th>
                            <th>price</th>
                          </tr>
                          <tr class="bg-white">
                            <td>Lorem ipsum dolor sit, amet consectetur</td>
                            <td>1</td>
                            <td>3 days</td>
                            <td>$60</td>
                          </tr>
                          <tr>
                            <td colspan="3">sub total</td>
                            <td>$60</td>
                          </tr>
                          <tr>
                            <td colspan="3">service fee</td>
                            <td>$4</td>
                          </tr>
                          <tr>
                            <td colspan="3">total</td>
                            <td>$63</td>
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
                  aria-labelledby="requirements-tab"
                >
                  <div class="requirement-tab-container card empty-box p-4">
                    <div class="inner-content">
                      <img src="images/requirements.svg" alt="" />
                      <h6>Submit the requirements</h6>
                      <p>
                        Please submit the requirements so that
                        <strong class="text-primary">Seormitu</strong>
                        can start working on your order.
                      </p>
                      <button
                        class="btn btn-primary custom-btn text-white mt-3"
                      >
                        submit requirement
                      </button>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade delivery-tab"
                  id="delivery"
                  role="tabpanel"
                  aria-labelledby="delivery-tab"
                >
                  <div class="delivery-tab-container card empty-box p-4">
                    <div class="inner-content">
                      <img src="images/delivery-box.svg" alt="" />
                      <h6>The best things are worth the wait</h6>
                      <p>
                        <span>Seormitu</span> should deliver this order by
                        Feb 27, 11:53 PM
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="summary-wrapper">
                <div class="card p-3">
                  <div
                    class="summary-header d-flex align-items-center justify-content-between mb-3"
                  >
                    <h5 class="mb-0">order-details</h5>

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
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                  </div>

                  <div class="gig-details">
                    <div class="box">
                      <img src="{{asset('images/s1.png')}}" alt="" />
                    </div>
                    <div class="box">
                      <h6>Digital agency website</h6>
                      <p class="mt-3">
                        <span
                          class="bg-success text-white text-capitalize font-weight-bold px-2 py-1 rounded"
                          >completed</span
                        >
                      </p>
                    </div>
                  </div>

                  <ul class="list-group">
                    <li>
                      <span>order from</span>
                      <span class="text-primary">amnawrites</span>
                    </li>
                    <li>
                      <span>delivery date</span>
                      <span>nov 22, 01:21 PM</span>
                    </li>
                  </ul>

                  <ul class="list-group">
                    <li>
                      <span>total price</span>
                      <span>$43</span>
                    </li>
                    <li>
                      <span>order number</span>
                      <span class="text-uppercase">#98a7df97dfg</span>
                    </li>
                  </ul>

                  <a href="" class="btn custom-btn"> order again </a>

                  <div class="have-questions text-capitalize text-center">
                    <small
                      ><a href="" class="font-weight-bold"
                        >have questions?</a
                      >
                      we have answer.</small
                    >
                    <small class="mt-2"
                      >Check out the
                      <a href="" class="text-primary">FAQs</a>.</small
                    >
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
var meeting_file =  this.$refs.msg_file.files;

  $('#message-form').on('submit', function(event){
    event.preventDefault();
    var meetingformDatas = new FormData();
        meetingformDatas.append('file',meeting_file[0]);
    $.ajax({
     url:"{{ url('order_conversation') }}",
     method:"POST",
     data:meetingformDatas,
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data){
      // console.log(data);
      // $('.accordion').append(data);
      // $("#faq-form .faq_title").val('');
      // $("#faq-form .faq_desc").val('');
     }
    })
 });
})
</script>
@endsection
