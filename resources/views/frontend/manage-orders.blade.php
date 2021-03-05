@extends('frontend.layouts.app')
@section('title', 'Manage Order  ')
@section('styling')
@endsection
@section('content')
<div class="manage-order">
  <div class="container">
    <div class="outer-content">
      <div class="headers">
        <h4>{{ __('home.Manage orders')}}</h4>
        <select name="orderby" id="orderdy" class="select2">
          <option value="new">newests</option>
          <option value="old">oldest</option>
        </select>
      </div>

      <div class="manage-tab-container">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="pills-all-tab"
              data-toggle="pill"
              href="#pills-all"
              role="tab"
              aria-controls="pills-all"
              aria-selected="true"
            >
              <span class="text">all</span> <span class="count">{{count($orders)}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-active-tab"
              data-toggle="pill"
              href="#pills-active"
              role="tab"
              aria-controls="pills-active"
              aria-selected="false"
              ><span class="text">active</span> <span class="count">{{count($activeOrders)}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-missing-details-tab"
              data-toggle="pill"
              href="#pills-missing-details"
              role="tab"
              aria-controls="pills-missing-details"
              aria-selected="false"
              ><span class="text">missing details</span>
              <span class="count">{{count($pendingOrders)}}</span></a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-waiting-review-tab"
              data-toggle="pill"
              href="#pills-waiting-review"
              role="tab"
              aria-controls="pills-waiting-review"
              aria-selected="false"
              ><span class="text">waiting review</span>
              <span class="count">{{count($waitingOrders)}}</span></a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-delivered-tab"
              data-toggle="pill"
              href="#pills-delivered"
              role="tab"
              aria-controls="pills-delivered"
              aria-selected="false"
              >
              <span class="text">delivered</span>
              <span class="count">{{count($deliverOrders)}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-completed-tab"
              data-toggle="pill"
              href="#pills-completed"
              role="tab"
              aria-controls="pills-completed"
              aria-selected="false"
            >
              <span class="text">completed</span>
              <span class="count">{{count($completeOrders)}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pills-cancelled-tab"
              data-toggle="pill"
              href="#pills-cancelled"
              role="tab"
              aria-controls="pills-cancelled"
              aria-selected="false"
            >
              <span class="text">cancelled</span>
              <span class="count">{{count($cancelOrders)}}</span>
            </a>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-all"
            role="tabpanel"
            aria-labelledby="pills-all-tab"
          >
          @if(Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
          </div>
          @endif
            <div class="inner-tab-container table-responsive show-orders">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    @if($order->order_status == 'completed')
                    <td><span class="status complete">completed</span></td>
                    @else
                    <td><span class="status incomplete">{{$order->order_status}}</span></td>
                    @endif
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- {{$orders->render()}} -->
              <!-- <nav class="pagination-container">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fa fa-angle-left"></i>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#"
                      >2 <span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#"
                      ><i class="fa fa-angle-right"></i>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-active"
            role="tabpanel"
            aria-labelledby="pills-active-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($activeOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    <td><span class="status incomplete">started</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-missing-details"
            role="tabpanel"
            aria-labelledby="pills-missing-details-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pendingOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    <td><span class="status incomplete">pending</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-waiting-review"
            role="tabpanel"
            aria-labelledby="pills-waiting-review-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($waitingOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    <td><span class="status incomplete">started</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-delivered"
            role="tabpanel"
            aria-labelledby="pills-delivered-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($deliverOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    <td><span class="status incomplete">Delivered</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-completed"
            role="tabpanel"
            aria-labelledby="pills-completed-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($completeOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    <td><span class="status complete">completed</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-cancelled"
            role="tabpanel"
            aria-labelledby="pills-cancelled-tab"
          >
            <div class="inner-tab-container table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>all orders</th>
                    <th>order date</th>
                    <th>due on</th>
                    <th>total</th>
                    <th>status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cancelOrders as $order)
                  <tr>
                    <td>
                      <a href="{{route('order-details',['number' => $order->order_number])}}">
                        <span
                          ><img src="{{asset('images/service_images/'.$order->serviceInfo->service_img1)}}" alt=""
                        /></span>
                        <span class="text"
                          >{{$order->serviceInfo->service_title}}</span
                        >
                      </a>
                    </td>
                    <?php
                    $order_date = date('d F, Y',strtotime($order->order_date));
                    $duratoin = $order->order_duration;
                    $due_date = date("d F, Y", strtotime('+ '.$duratoin,strtotime($order->order_time)));
                    // dd($order->order_time, $due_date);
                     ?>
                    <td>{{$order_date}}</td>
                    <td>{{$due_date}}</td>
                    <td>${{$order->order_fee}}</td>
                    @if($order->order_status == 'completed')
                    <td><span class="status complete">completed</span></td>
                    @else
                    <td><span class="status incomplete">{{$order->order_status}}</span></td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
  $('#orderdy').on('change',function () {
    var order = $(this).val();
    $.ajax({
     url:"{{ url('manage-orders-ajax') }}/"+order,
     success:function(data){
       $('.show-orders').html(data);
     }
    })
  });
</script>
@endsection
