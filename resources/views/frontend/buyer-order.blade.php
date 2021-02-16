@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
@endsection
@section('content')
<!-- Contact Us -->
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
                  <div class="activity-tab-container card pt-4">
                    <div class="without-attachment">
                      <?php
                      $order_date = date('M d, h:i A',strtotime($order->order_time));
                      $duratoin = $order->order_duration;
                      $delivery_date = date('M d, h:i A',strtotime('+ '.$duratoin,strtotime($order->order_time)));
                      $requirements_date = date('M d, h:i A',strtotime($order->orderRequirement[0]->created_at));
                      $only_date = date('M d',strtotime($order->order_time));
                       ?>
                      <span class="date">{{$only_date}}</span>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-file-o"></i>
                        </div>
                        <div class="box-item">

                          <h6>
                            you placed the order
                            <span>{{$order_date}}</span>
                          </h6>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-pencil"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            you submitted the requirements
                            <span>{{$requirements_date}}</span>
                          </h6>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-rocket"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            your order started <span>{{$requirements_date}}</span>
                          </h6>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            your delivery date was updated to november 22
                            <span>{{$delivery_date}}</span>
                          </h6>
                        </div>
                      </div>
                      <div
                        class="list-item user-info-content align-items-start pt-3"
                      >
                        <div class="box user-img">
                          <img src="{{asset('images/s1.png')}}" alt="" />
                        </div>
                        <div class="box user-details border-bottom ml-0">
                          <h6 class="user-name">
                            me <span>nov 10, 12:34 PM</span>
                          </h6>
                          <p>
                            Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit.
                          </p>
                        </div>
                      </div>
                      <div
                        class="list-item user-info-content align-items-start pt-3"
                      >
                        <div class="box user-img">
                          <img src="{{asset('images/s1.png')}}" alt="" />
                        </div>
                        <div class="box user-details ml-0">
                          <h6 class="user-name">
                            amnawrites <span>nov 10, 12:34 PM</span>
                          </h6>
                          <p>
                            Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit.
                          </p>

                          <div class="report">
                            <a href=""><i class="fa fa-flag"></i> report</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="with-attachment">
                      <span class="date">nov 15</span>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-file"></i>
                        </div>
                        <div class="box-item">
                          <div
                            class="accordion custom-accordion"
                            id="accordionExample"
                          >
                            <div class="card">
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
                                    <p>
                                      <span>amnawrites</span>
                                      <span>delivered your order </span>
                                      <span>nov 10, 12:34 PM</span>
                                    </p>

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
                                  </button>
                                </h2>
                              </div>

                              <div
                                id="collapseOne"
                                class="collapse show"
                                aria-labelledby="headingOne"
                                data-parent="#accordionExample"
                              >
                                <div class="card-body">
                                  <div
                                    class="delivery-list-item border rounded"
                                  >
                                    <div class="content-header">
                                      <h6>delivery #1</h6>
                                    </div>
                                    <div class="content-body">
                                      <div class="user-info-content d-flex">
                                        <div class="box user-img">
                                          <img src="{{asset('images/s1.png')}}" alt="" />
                                        </div>
                                        <div class="box user-details">
                                          <h6 class="user-name">
                                            amnawrites'
                                            <span> message</span>
                                          </h6>
                                          <p>Hello</p>
                                          <p>Lorem ipsum dolor sit amet.</p>
                                          <p>
                                            Lorem ipsum dolor sit amet
                                            consectetur, adipisicing elit.
                                            Molestias architecto optio,
                                            dolorum corporis dolor
                                            reprehenderit?
                                          </p>

                                          <div class="attachments">
                                            <h6>attachment</h6>
                                            <div class="attachment-lists">
                                              <div class="list-item-box">
                                                <img
                                                  src="{{asset('images/s1.png')}}"
                                                  alt=""
                                                />

                                                <div
                                                  class="attachment-info d-flex justify-content-between align-items-center"
                                                >
                                                  <p>
                                                    logo.jpg
                                                    <span>(173 kb)</span>
                                                  </p>
                                                  <a href=""
                                                    ><i
                                                      class="fa fa-download"
                                                    ></i
                                                  ></a>
                                                </div>
                                              </div>

                                              <div class="list-item-box">
                                                <img
                                                  src="{{asset('images/s1.png')}}"
                                                  alt=""
                                                />

                                                <div
                                                  class="attachment-info d-flex justify-content-between align-items-center"
                                                >
                                                  <p>
                                                    logo.jpg
                                                    <span>(173 kb)</span>
                                                  </p>
                                                  <a href=""
                                                    ><i
                                                      class="fa fa-download"
                                                    ></i
                                                  ></a>
                                                </div>
                                              </div>
                                              <div class="list-item-box">
                                                <img
                                                  src="{{asset('images/s1.png')}}"
                                                  alt=""
                                                />

                                                <div
                                                  class="attachment-info d-flex justify-content-between align-items-center"
                                                >
                                                  <p>
                                                    logo.jpg
                                                    <span>(173 kb)</span>
                                                  </p>
                                                  <a href=""
                                                    ><i
                                                      class="fa fa-download"
                                                    ></i
                                                  ></a>
                                                </div>
                                              </div>
                                              <div class="list-item-box">
                                                <img
                                                  src="{{asset('images/s1.png')}}"
                                                  alt=""
                                                />

                                                <div
                                                  class="attachment-info d-flex justify-content-between align-items-center"
                                                >
                                                  <p>
                                                    logo.jpg
                                                    <span>(173 kb)</span>
                                                  </p>
                                                  <a href=""
                                                    ><i
                                                      class="fa fa-download"
                                                    ></i
                                                  ></a>
                                                </div>
                                              </div>
                                              <div class="list-item-box">
                                                <img
                                                  src="{{asset('images/s1.png')}}"
                                                  alt=""
                                                />

                                                <div
                                                  class="attachment-info d-flex justify-content-between align-items-center"
                                                >
                                                  <p>
                                                    logo.jpg
                                                    <span>(173 kb)</span>
                                                  </p>
                                                  <a href=""
                                                    ><i
                                                      class="fa fa-download"
                                                    ></i
                                                  ></a>
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
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="box-item">
                          <i class="fa fa-file-o"></i>
                        </div>
                        <div class="box-item">
                          <h6>
                            your order was compoleted
                            <span>nov 10, 12:34 PM</span>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div
                      class="user-info-content d-flex order-completed border-top p-3 px-4"
                    >
                      <div class="box user-img">
                        <img src="{{asset('images/s1.png')}}" alt="" />
                      </div>
                      <div class="box user-details">
                        <h6>
                          your order is completed. if you need to contact
                          the seller, <a href="">go to inbox</a>
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade details-tab-container"
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
                            order info
                            <strong class="text-primary">{{$order->sellerInfo->first_name}}</strong>
                          </p>
                          <p>
                            delivery date
                            <span class="font-weight-bold"
                              >{{$delivery_date}}</span
                            >
                          </p>
                        </div>
                      </div>
                      <div class="box text-right">
                        <p class="text-uppercase font-weight-bold mb-1">
                          total price
                        </p>
                        <h4>${{$order->order_fee}}</h4>
                      </div>
                    </div>

                    <div
                      class="order-no d-flex justify-content-between py-2 border-top border-bottom mt-3"
                    >
                      <p>
                        order number
                        <strong class="order-number">#{{$order->order_number}}</strong>
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
                        {{$order->serviceInfo->service_desc}}
                      </p>
                    </div>

                    <div class="order-detail-info border">
                      <div
                        class="heading-container d-flex justify-content-between p-3 border-bottom"
                      >
                        <p>
                          <i class="fa fa-file"></i>
                          <strong>your order </strong>
                          <small>{{$order_date}}</small>
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
                            <?php
                            $original_free = $order->order_fee-$order->service_fee;
                             ?>
                            <td>{{$order->serviceInfo->service_title}}</td>
                            <td>{{$order->order_qty}}</td>
                            <td>{{$order->order_duration}}</td>
                            <td>${{$original_free}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">sub total</td>
                            <td>${{$original_free}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">service fee</td>
                            <td>${{$order->service_fee}}</td>
                          </tr>
                          <tr>
                            <td colspan="3">total</td>
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
                  aria-labelledby="requirements-tab"
                >
                  <div class="requirement-tab-container card p-4">
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
                  </div>
                </div>
                <div
                  class="tab-pane fade delivery-tab"
                  id="delivery"
                  role="tabpanel"
                  aria-labelledby="delivery-tab">
                  <div class="delivery-tab-container card p-4">
                    <div class="delivery-list-item border rounded">
                      <div class="content-header">
                        <h6>delivery #1</h6>
                      </div>
                      <div class="content-body">
                        <div class="user-info-content d-flex">
                          <div class="box user-img">
                            <img src="{{asset('images/s1.png')}}" alt="" />
                          </div>
                          <div class="box user-details">
                            <h6 class="user-name">
                              amnawrites' <span> message</span>
                            </h6>
                            <p>Hello</p>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p>
                              Lorem ipsum dolor sit amet consectetur,
                              adipisicing elit. Molestias architecto optio,
                              dolorum corporis dolor reprehenderit?
                            </p>

                            <div class="attachments">
                              <h6>attachment</h6>
                              <div class="attachment-lists">
                                <div class="list-item-box">
                                  <img src="{{asset('images/s1.png')}}" alt="" />

                                  <div
                                    class="attachment-info d-flex justify-content-between align-items-center"
                                  >
                                    <p>logo.jpg <span>(173 kb)</span></p>
                                    <a href=""
                                      ><i class="fa fa-download"></i
                                    ></a>
                                  </div>
                                </div>

                                <div class="list-item-box">
                                  <img src="{{asset('images/s1.png')}}" alt="" />

                                  <div
                                    class="attachment-info d-flex justify-content-between align-items-center"
                                  >
                                    <p>logo.jpg <span>(173 kb)</span></p>
                                    <a href=""
                                      ><i class="fa fa-download"></i
                                    ></a>
                                  </div>
                                </div>
                                <div class="list-item-box">
                                  <img src="{{asset('images/s1.png')}}" alt="" />

                                  <div
                                    class="attachment-info d-flex justify-content-between align-items-center"
                                  >
                                    <p>logo.jpg <span>(173 kb)</span></p>
                                    <a href=""
                                      ><i class="fa fa-download"></i
                                    ></a>
                                  </div>
                                </div>
                                <div class="list-item-box">
                                  <img src="{{asset('images/s1.png')}}" alt="" />

                                  <div
                                    class="attachment-info d-flex justify-content-between align-items-center"
                                  >
                                    <p>logo.jpg <span>(173 kb)</span></p>
                                    <a href=""
                                      ><i class="fa fa-download"></i
                                    ></a>
                                  </div>
                                </div>
                                <div class="list-item-box">
                                  <img src="{{asset('images/s1.png')}}" alt="" />

                                  <div
                                    class="attachment-info d-flex justify-content-between align-items-center"
                                  >
                                    <p>logo.jpg <span>(173 kb)</span></p>
                                    <a href=""
                                      ><i class="fa fa-download"></i
                                    ></a>
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
                      <span>order from</span>
                      <span class="text-primary font-weight-bold"
                        >{{$order->sellerInfo->first_name}}</span
                      >
                    </li>
                    <li>
                      <span>delivery date</span>
                      <span><strong>{{$delivery_date}}</strong></span>
                    </li>
                  </ul>

                  <ul class="list-group">
                    <li>
                      <span>total price</span>
                      <span><strong>${{$order->order_fee}}</strong></span>
                    </li>
                    <li>
                      <span>order number</span>
                      <span class="text-uppercase"
                        ><strong>#{{$order->order_number}}</strong></span
                      >
                    </li>
                  </ul>

                  <a href="{{route('service-details',['username' => $order->sellerInfo->username,'url'=>$order->serviceInfo->service_url])}}" class="btn custom-btn"> order again </a>

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
<!-- End Order -->
@endsection
@section('script')
<script>

</script>
@endsection
