<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\HelpCenter;
use App\Models\User;
use App\Models\Services;
use App\Models\Packages;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderConversations;
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
      $requirement_id = $request->input('requirement_id');
      $order_id = $request->input('order_id');
      if ($requirement_id !=null) {
        foreach ($requirement_id as $key => $req_id) {
          $desc = $request->input('desc-'.$req_id);
          $attachment = $request->file('attachment-'.$req_id);
          if ($desc != null) {
            $descData['order_id'] = $order_id;
            $descData['requirement_id'] = $req_id;
            $descData['requirement'] = $desc;
            $save_requirement = OrderRequirement::create($descData);
          }elseif ($attachment != null) {
            if($attachment != ''){
              // $filename= $attachment->getClientOriginalName();
              // $imagename= 'order-requirement-'.rand(000000,999999).'.'.$attachment->getClientOriginalExtension();
              // $imagename= $filename;
              // $extension= $attachment->getClientOriginalExtension();
              $imagename = 'order-requirement-'.time().'-'.rand(000000,999999).'.'.$attachment->getClientOriginalExtension();
              $destinationpath= public_path('images/order_requirements');
              $attachment->move($destinationpath, $imagename);
              $attchData['image'] = $imagename;
              $attchData['order_id'] = $order_id;
              $attchData['requirement_id'] = $req_id;
              $save_requirement = OrderRequirement::create($attchData);
            }
          }
        }
      }
      $order = Order::find($order_id);
      $order->order_status = 'started';
      $order->update();
      return '1';

    }

    public function OrderDetails(Request $request, $number)
    {
      $order = Order::with('serviceInfo','orderRequirement','sellerInfo')->where('order_number',$number)->first();
      if ($order->buyer_id == auth()->user()->id) {
        return view('frontend.buyer-order',compact('order'));
      }else {
        return view('frontend.seller-order',compact('order'));
      }
    }

    public function manageOrders(Request $request)
    {
      $user_id = auth()->user()->id;
      $orders = Order::with('serviceInfo')->wherebuyer_id($user_id)->orWhere('seller_id',$user_id)->orderby('id','desc')->paginate(10);
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

    public function SendOrderMessage(Request $request)
    {
      dd($request->all());
      $message = $request->input('message');
      $user_id = auth()->user()->id;
      $conversationData['sender_id'] = $user_id;
      $conversationData['order_id'] = $request->input('order_id');
      $conversationData['message'] = $request->input('message');
      $conversationData['date'] = Carbon::now();
      $conversationData['status'] = 'message';
      $file = $request->file('file');
      if($file != ''){
        // $filename= $file->getClientOriginalName();
        $imagename= 'orderconversation-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
        $extension = $file->getClientOriginalExtension();
        $imagename= $imagename;
        $destinationpath= public_path('images/order_conversation');
        $file->move($destinationpath, $imagename);
        $conversationData['file'] = $imagename;
      }
      $Order_conversation = OrderConversations::create($conversationData);
      $conversation = OrderConversations::with('userInfo')->where('id',$Order_conversation->id)->first();
      // dd($conversation);
      return view('frontend.order-conversation-ajax',compact('conversation'));

    }

    public function HelpCenter(Request $request)
    {
      return view('frontend.help-center');
    }

    public function RequestHelp(Request $request)
    {
      // dd($request->all());
      $user_id = auth()->user()->id;
      $order_number = $request->input('order_number');
      $check_order = Order::whereorder_number($order_number)->first();
      if ($check_order != null) {
        $order_id = $check_order->id;
      }else {
        return redirect()->back()->with('danger', 'Invalid Order Number');
      }
      // dd($check_order);
      $helpData['order_id'] = $order_id;
      $helpData['order_number'] = $order_number;
      $helpData['user_id'] = $user_id;
      $helpData['issue'] = $request->input('issue');
      $helpData['order_issue'] = $request->input('order_issue');
      $helpData['type'] = $request->input('type');
      $helpData['problem'] = $request->input('problem');
      $helpData['subject'] = $request->input('subject');
      $helpData['description'] = $request->input('description');
      $file = $request->file('file');
      if($file != ''){
        // $filename= $file->getClientOriginalName();
        $imagename= 'helpcenter-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
        $extension = $file->getClientOriginalExtension();
        $imagename= $imagename;
        $destinationpath= public_path('images/help_center');
        $file->move($destinationpath, $imagename);
        $helpData['file'] = $imagename;
      }

      $helpCenter = HelpCenter::create($helpData);
      return redirect('/manage-orders')->with('success', 'Request send successfully');

    }


}
