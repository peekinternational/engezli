<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\User;
use App\Models\Services;
use App\Models\Packages;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderRequirement;
use App\Models\SellerLevel;
use App\Facade\Engezli;
use Hash;
use Session;
use Mail;
use Redirect;
use App;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function order(Request $request)
    {
      $service_id = $request->input('service_id');
      $package_id = $request->input('package_id');
      $package = Packages::with('serviceInfo')->where('id',$package_id)->first();
      return view('frontend.order',compact('package'));
    }

    public function CreateOrder(Request $request)
    {
      $order = new Order;
      $order->order_number	= rand();
      $order->service_id	= $request->input('service_id');
      $order->seller_id	= $request->input('seller_id');
      $order->buyer_id	= auth()->user()->id;
      $order->order_date	= date("Y-m-d");
      $order->order_time	= Carbon::now();
      $order->order_duration	= $request->input('order_duration');
      $order->order_qty	= $request->input('quantity');
      $order->order_fee	= $request->input('order_fee');
      $order->service_fee	= $request->input('service_fee');
      $order->order_active	= 'no';
      $order->order_status	= 'pending';
      $order->save();
      $order->date = date('d F, Y',strtotime($order->order_date));
      echo $order;

    }

    public function SaveRequirement(Request $request)
    {
      // dd($request->all());
      $order_id = $request->input('order_id');
      $description = $request->input('desc');
      $attachment = $request->file('attachment');
      if ($description != null) {
        foreach ($description as $key => $desc) {
          $descData['order_id'] = $order_id;
          // dd($desc);
          $descData['requirement'] = $desc;
          $save_requirement = OrderRequirement::create($descData);
        }
      }
      if ($attachment != null) {
        foreach ($attachment as $key => $attch) {
          // dd($attch);
          if($attch != ''){
            $filename= $attch->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$attch->getClientOriginalExtension();
            $extension= $attch->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/order_requirements');
            $attch->move($destinationpath, $imagename);
            $attchData['image'] = $imagename;
          }
          $attchData['order_id'] = $order_id;
          $save_requirements = OrderRequirement::create($attchData);
        }
      }
      return $save_requirement;
    }

    public function OrderDetails(Request $request, $number)
    {
      $order = Order::with('serviceInfo','orderRequirement','sellerInfo')->where('order_number',$number)->first();
      // dd($order);
      return view('frontend.buyer-order',compact('order'));
    }

    public function manageOrders(Request $request)
    {
      $user_id = auth()->user()->id;
      $orders = Order::with('serviceInfo')->wherebuyer_id($user_id)->orderby('id','desc')->paginate(10);
      return view('frontend.manage-orders',compact('orders'));
    }

    public function manageOrders_ajax(Request $request, $order)
    {
      // dd($order);
      $user_id = auth()->user()->id;
      if ($order== 'old') {
        $orders = Order::with('serviceInfo')->wherebuyer_id($user_id)->orderby('id','asc')->paginate(10);
      }else {
        $orders = Order::with('serviceInfo')->wherebuyer_id($user_id)->orderby('id','desc')->paginate(10);
      }
      return view('frontend.manage-orders-ajax',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
