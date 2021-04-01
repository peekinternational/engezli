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
        <a href="">
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
      <td>{{Engezli::convertCurrency($order->order_fee)}}</td>
      @if($order->order_status == 'completed')
      <td><span class="status complete">complete</span></td>
      @else
      <td><span class="status incomplete">{{$order->order_status}}</span></td>
      @endif
    </tr>
    @endforeach

  </tbody>
</table>
{{$orders->render()}}
