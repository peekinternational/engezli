<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BuyerReviews;
use App\Models\Categories;
use App\Models\HelpCenter;
use App\Models\User;
use App\Models\Services;
use App\Models\Packages;
use App\Models\Language;
use App\Models\Notifications;
use App\Models\Order;
use App\Models\OrderConversations;
use App\Models\OrderDelivery;
use App\Models\OrderRequirement;
use App\Models\ResolutionCenter;
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

    public function GetRequirements(Request $request, $order_number)
    {
      $order = Order::with('serviceInfo')->where('order_number',$order_number)->first();
      return view('frontend.submit-requirements',compact('order'));
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
            $descData['type'] = '0';
            $save_requirement = OrderRequirement::create($descData);
          }elseif ($attachment != null) {
            if($attachment != ''){
              // $filename= $attachment->getClientOriginalName();
              // $imagename= 'order-requirement-'.rand(000000,999999).'.'.$attachment->getClientOriginalExtension();
              // $imagename= $filename;
              $extension= $attachment->getClientOriginalExtension();
              if ($extension == 'png' || $extension == 'jpg'|| $extension == 'jpeg') {
                $attchData['type'] = '1';
              }else {
                $attchData['type'] = '2';
              }
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
      $order->start_time = Carbon::now();
      $order->update();
      return '1';

    }

    public function OrderDetails(Request $request, $number)
    {
      $order = Order::with('serviceInfo','orderRequirement','sellerInfo','buyerInfo')->where('order_number',$number)->first();
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
      // dd($request->all());
      $message = $request->input('message');
      $user_id = auth()->user()->id;
      $conversationData['sender_id'] = $user_id;
      $conversationData['order_id'] = $request->input('order_id');
      $conversationData['message'] = $request->input('message');
      $conversationData['date'] = Carbon::now();
      $conversationData['status'] = 'message';
      $file = $request->file('file');
      $conversationData['message_type'] = 'message';
      if($file != ''){
        $filename= $file->getClientOriginalName();
        $imagename= 'orderconversation-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
        $extension = $file->getClientOriginalExtension();
        if ($extension == 'png' || $extension == 'jpg'|| $extension == 'jpeg') {
          $conversationData['message_type'] = 'image';
        }else {
          $conversationData['message_type'] = 'file';
        }
        $conversationData['file_name'] = $filename;

        $imagename= $imagename;
        $destinationpath= public_path('images/order_conversation');
        $file->move($destinationpath, $imagename);
        $conversationData['file'] = $imagename;
      }
      $Order_conversation = OrderConversations::create($conversationData);
      $conversation = OrderConversations::with('userInfo')->where('id',$Order_conversation->id)->first();
      $order = Order::find($conversation->order_id);
      if ($user_id == $order->seller_id) {
        $receiver_id = $order->buyer_id;
      }else {
        $receiver_id = $order->seller_id;
      }
      $conversation->receiver_id = $receiver_id;
      // dd($order);
      Notifications::where('order_id',$conversation->order_id)->delete();
      $notificationData['sender_id'] = $conversation->sender_id;
      $notificationData['receiver_id'] = $receiver_id;
      $notificationData['order_id'] = $conversation->order_id;
      $notificationData['conversation_id'] = $conversation->id;
      $notificationData['reason'] = 'order_message';
      $notificationData['notification_date'] = Carbon::now();
      $notificationData['status'] = 'unread';
      $notifications = Notifications::create($notificationData);
      $notification =  Notifications::with('senderInfo','receiverInfo','lastMessage','orderInfo')
      ->where('id',$notifications->id)->first();
      // return $conversation;
      $data = array(
        'conversation' => $conversation,
        'notification' => $notification
      );
      return $data;
      // return view('frontend.order-conversation-ajax',compact('conversation'));

    }

    public function getNotification(Request $request, $id){
      $getNotifications = Notifications::with('senderInfo','receiverInfo','lastMessage','orderInfo')->Where('receiver_id',$id)
      ->orWhere('sender_id',$id)->orderBy('id', 'DESC')->get();
      // dd($getNotifications);
      return $getNotifications;
    }

    public function DeliverWork(Request $request)
    {
      // dd($request->all());
      $user_id = auth()->user()->id;
      $conversationData['sender_id'] = $user_id;
      $conversationData['order_id'] = $request->input('order_id');
      $conversationData['message'] = $request->input('message');
      $conversationData['date'] = Carbon::now();
      $conversationData['status'] = 'delivery';
      $conversationData['message_type'] = 'delivery';
      $Order_conversation = OrderConversations::create($conversationData);
      $conversation_id = $Order_conversation->id;
      $files = $request->file('work_file');
      if($files != ''){
        foreach ($files as $file) {
          $deliveryData['conversation_id'] = $conversation_id;
          $deliveryData['order_id'] = $request->input('order_id');
          $deliveryData['sender_id'] = $user_id;
          $deliveryData['date'] = Carbon::now();

          $filename= $file->getClientOriginalName();
          $imagename= 'delivery-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
          $extension = $file->getClientOriginalExtension();
          if ($extension == 'png' || $extension == 'jpg'|| $extension == 'jpeg') {
            $deliveryData['type'] = 'image';
          }else {
            $deliveryData['type'] = 'file';
          }
          $deliveryData['file_name'] = $filename;

          $imagename= $imagename;
          $destinationpath= public_path('images/order_delivery');
          $file->move($destinationpath, $imagename);
          $deliveryData['file'] = $imagename;
          $delivery = OrderDelivery::create($deliveryData);
        }
      }
      $conversation = OrderConversations::with('userInfo','delivery')->where('id',$conversation_id)->first();
      $order = Order::find($conversation->order_id);
      if ($user_id == $order->seller_id) {
        $receiver_id = $order->buyer_id;
      }else {
        $receiver_id = $order->seller_id;
      }
      $conversation->receiver_id = $receiver_id;
      // dd($order);
      Notifications::where('order_id',$conversation->order_id)->delete();
      $notificationData['sender_id'] = $conversation->sender_id;
      $notificationData['receiver_id'] = $receiver_id;
      $notificationData['order_id'] = $conversation->order_id;
      $notificationData['conversation_id'] = $conversation->id;
      $notificationData['reason'] = 'order_delivery';
      $notificationData['notification_date'] = Carbon::now();
      $notificationData['status'] = 'unread';
      $notifications = Notifications::create($notificationData);
      $notification =  Notifications::with('senderInfo','receiverInfo','lastMessage','orderInfo')
      ->where('id',$notifications->id)->first();
      // return $conversation;
      $data = array(
        'conversation' => $conversation,
        'notification' => $notification
      );
      return $data;

    }

    public function approveDelivery(Request $request)
    {
      $data = $request->input('conversation');
      $conversation_id = $data['id'];
      $conversation = OrderConversations::find($conversation_id);
      $conversation->status = 'approved';
      $conversation->update();
      $getconversation = OrderConversations::with('userInfo','delivery')->where('id',$conversation_id)->first();
      return $getconversation;
    }

    public function rejectDelivery(Request $request)
    {
      $data = $request->input('conversation');
      $conversation_id = $data['id'];
      $conversation = OrderConversations::find($conversation_id);
      $conversation->status = 'reject';
      $conversation->update();
      $getconversation = OrderConversations::with('userInfo','delivery')->where('id',$conversation_id)->first();
      return $getconversation;
    }

    public function getConversation(Request $request, $id)
    {
      $conversation = OrderConversations::with('userInfo','delivery')->where('order_id',$id)->get();
      return $conversation;
    }

    public function getDelivery(Request $request, $id)
    {
      $conversation = OrderConversations::with('userInfo','delivery')->where('order_id',$id)->where('message_type','delivery')->get();
      return $conversation;
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

    public function Rating(Request $request,$order_number)
    {
      $order = Order::with('serviceInfo')->whereorder_number($order_number)->first();
      return view('frontend.rating',compact('order'));
    }

    public function BuyerReview(Request $request)
    {
      // dd($request->all());
      $order_id = $request->input('order_id');
      $order = Order::find($order_id);
      $reviewData['order_id'] = $request->input('order_id');
      $reviewData['service_id'] = $request->input('service_id');
      $reviewData['buyer_id'] = $order->buyer_id;
      $reviewData['seller_id'] = $order->seller_id;
      $reviewData['communication_rating'] = $request->input('communication_rating');
      $reviewData['service_rating'] = $request->input('service_rating');
      $reviewData['recommend_rating'] = $request->input('recommend_rating');
      $total_rating =  $request->input('communication_rating')+$request->input('service_rating')+$request->input('recommend_rating');
      $overall_rating = $total_rating/3;
      // dd($overall_rating);
      $reviewData['overall_rating'] = $overall_rating;
      $reviewData['review'] = $request->input('review');
      $reviewData['date'] = Carbon::now();
      $show_work = $request->input('show_work');
      if ($show_work != null) {
        $reviewData['show_work'] = $show_work;
      }
      $review = BuyerReviews::create($reviewData);
      $order->order_status = 'completed';
      $order->update();
      return redirect('/manage-orders')->with('success', 'Order completed successfully');
    }

    public function ResolutionCenter(Request $request, $order_number)
    {
      $order = Order::with('serviceInfo','orderRequirement','sellerInfo','buyerInfo')->where('order_number',$order_number)->first();
      return view('frontend.resolution-center',compact('order'));
    }

    public function ResolutionRequest(Request $request)
    {
        // dd($request->all());
        $user_id = auth()->user()->id;
        $data['user_id'] = $user_id;
        $data['order_id'] = $request->input('order_id');
        $data['order_number'] = $request->input('order_number');
        $data['reason'] = $request->input('reason');
        $data['details'] = $request->input('details');
        $data['status'] = 'pending';
        $resolution = ResolutionCenter::create($data);
        return redirect('/manage-orders')->with('success', 'Request send successfully');

    }




}
