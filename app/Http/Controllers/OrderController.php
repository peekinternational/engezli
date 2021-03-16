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
use App\Models\AcceptPayment;
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
      // dd($request->all());
      $order = new Order;
      $order->order_number  = rand();
      $service_id  = $request->input('service_id');
      $package_id  = $request->input('package_id');
      $seller_id = $request->input('seller_id');
      $buyer_id  = auth()->user()->id;
      $order_date  = date("Y-m-d");
      $order_time  = Carbon::now();
      $order_duration  = $request->input('order_duration');
      $order_qty = $request->input('quantity');
      $order_fee = $request->input('order_fee');
      $service_fee = $request->input('service_fee');
      $type = $request->input('paymentOption');
      // $sub_total = $order_fee + $service_fee;
      $sub_total = $order_fee;
      $total_amount = $sub_total * 100;
      $merchant_order_id = rand();
      $indentifier = auth()->user()->mobile_number;

      // $request->session()->put('service_id', $service_id);
      // $request->session()->put('package_id', $package_id);
      // $request->session()->put('seller_id', $seller_id);
      // $request->session()->put('order_duration', $order_duration);
      // $request->session()->put('order_qty', $order_qty);
      // $request->session()->put('order_fee', $order_fee);
      // $request->session()->put('service_fee', $service_fee);

      $transId = $request->input('id');
      if($transId == ''){
        $order->order_number  = rand();
        $service_id  = $request->input('service_id');
        $package_id  = $request->input('package_id');
        $seller_id = $request->input('seller_id');
        $buyer_id  = auth()->user()->id;
        $order_date  = date("Y-m-d");
        $order_time  = Carbon::now();
        $order_duration  = $request->input('order_duration');
        $order_qty = $request->input('quantity');
        $order_fee = $request->input('order_fee');
        $service_fee = $request->input('service_fee');
        $type = $request->input('paymentOption');
        $sub_total = $order_fee;
        $total_amount = $sub_total * 100;
        $merchant_order_id = rand();
        // dd($type);
        if($type == 'card'){
          $integration_id = '189757';
        }elseif($type == 'kiosk'){
          $integration_id = '197430';
        }else{
          $integration_id = '197428';
        }

        // dd($token);
        $auth_token = $this->getAuthToken();
        $insertPayment = AcceptPayment::create([
            "merchant_order_id" => $merchant_order_id,
            "seller_id" => $seller_id,
            "buyer_id" => $buyer_id,
            "service_id" => $service_id,
            "package_id" => $package_id,
            "status" => "pending",
            "type" => $type
        ]);

        $payment_id = $insertPayment->merchant_order_id;
        // dd($payment_id);
        $paymentData = AcceptPayment::where("merchant_order_id", $payment_id)->first();

        // if($type == "kiosk"){
        //     $_SESSION["payment_id"] = $payment_id;
        // }

        // return $paymentData->id;

        $order_data = $this->registerOrder($total_amount,$auth_token,$type,$paymentData->merchant_order_id);
        $payToken = $this->getPaymentKey($auth_token,$total_amount,$integration_id,$order_data);
        // dd($payToken);

        if($type == 'card'){
          $iframe = $this->payRequest($payToken,$type);
          // dd($iframe);
          // echo $iframe;
          $data = array(
            'card' => $iframe
          );
          return $data;
        }
        if($type == 'kiosk'){
          $iframe = $this->payRequest($payToken,$type);

          $order->service_id  = $service_id;
          $order->seller_id = $seller_id;
          $order->buyer_id  = auth()->user()->id;
          $order->order_date  = date("Y-m-d");
          $order->order_time  = Carbon::now();
          $order->order_duration  = $order_duration;
          $order->order_qty = $order_qty;
          $order->order_fee = $order_fee;
          $order->service_fee = $service_fee;
          $order->order_active  = 'no';
          $order->order_status  = 'pending';
          $order->save();
          $order->date = date('d F, Y',strtotime($order->order_date));

      

          $seller = User::find($order->seller_id);
          $buyer = User::find($order->buyer_id);
          $toemail =  $seller->email;
          Mail::send('mail.seller-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });

          $toemail =  $buyer->email;
          Mail::send('mail.buyer-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });
          // echo $order;
          // return $order;
          // dd($order);
          $data = array(
            'kiosk' => $iframe,
            'order' => $order
          );
          return $data;
        }
        if($type == 'wallet'){
          $response = $this->payWallet($payToken,$indentifier);

          $order->service_id  = $service_id;
          $order->seller_id = $seller_id;
          $order->buyer_id  = auth()->user()->id;
          $order->order_date  = date("Y-m-d");
          $order->order_time  = Carbon::now();
          $order->order_duration  = $order_duration;
          $order->order_qty = $order_qty;
          $order->order_fee = $order_fee;
          $order->service_fee = $service_fee;
          $order->order_active  = 'no';
          $order->order_status  = 'pending';
          $order->save();
          $order->date = date('d F, Y',strtotime($order->order_date));


          $seller = User::find($order->seller_id);
          $buyer = User::find($order->buyer_id);
          $toemail =  $seller->email;
          Mail::send('mail.seller-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });

          $toemail =  $buyer->email;
          Mail::send('mail.buyer-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });

          $data = array(
            'wallet' => $response,
            'order' => $order
          );
          return $data;
          // return $response;
        }

      }else{
        $hmac = $request->input("hmac");

        if(empty($hmac)){
            http_response_code(400);
            exit;
        }

        $hmacSecret = "7FD0725C9B7DCFEACEB78D8CC1ECFDFC";

        // $idd = $request->input('id');
        // dd($idd);
        $transaction = $request->all();

        $paymentId = $transaction['merchant_order_id'];
        $tanxId = $transaction['id'];
        // dd($transaction);


        if(!$this->checkHmac($hmac,$transaction,$hmacSecret)){
            http_response_code(401);
            exit;
        }


        $status = "";

        if(filter_var($transaction["success"],FILTER_VALIDATE_BOOLEAN)){
            $status = "success";
        }elseif(filter_var($transaction["pending"],FILTER_VALIDATE_BOOLEAN)){
            $status = "pending";
        }elseif(filter_var($transaction["is_void"],FILTER_VALIDATE_BOOLEAN)){
            $status = "void";
        }
        // dd($status);
        $acceptPayment = AcceptPayment::find($paymentId);

        $updatePayment = AcceptPayment::where('merchant_order_id',$paymentId)->update([
            "accept_transaction_id" => $tanxId,
            "status" => $status,
            "paid" => $status == "success",
            "paid_at" => $status == "success" ? Carbon::now() : null,
        ]);
        $orderData = AcceptPayment::where('accept_transaction_id',$transId)->first();
        // dd($transId,$orderData);
        // session(['u_session' => '25']);
        // dd($order_duration,$order_qty,$order_fee,$service_fee);
        $order->service_id  = $orderData->service_id;
        $order->seller_id = $orderData->seller_id;
        $order->buyer_id  = auth()->user()->id;
        $order->order_date  = date("Y-m-d");
        $order->order_time  = Carbon::now();
        $order->order_duration  = $order_duration;
        $order->order_qty = $order_qty;
        $order->order_fee = $order_fee;
        $order->service_fee = $service_fee;
        $order->order_active  = 'no';
        $order->order_status  = 'pending';
        $order->save();
        $order->date = date('d F, Y',strtotime($order->order_date));

        $seller = User::find($order->seller_id);
        $buyer = User::find($order->buyer_id);
        $toemail =  $seller->email;
        Mail::send('mail.seller-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
        function ($message) use ($toemail)
        {

          $message->subject('Paidpro - New Order');
          $message->from('peek.zeeshan@gmail.com', 'Engezli');
          $message->to($toemail);
        });

        $toemail =  $buyer->email;
        Mail::send('mail.buyer-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
        function ($message) use ($toemail)
        {

          $message->subject('Paidpro - New Order');
          $message->from('peek.zeeshan@gmail.com', 'Engezli');
          $message->to($toemail);
        });

        // echo $order;
        return redirect('requirements/'.$order->order_number);
      }



      // $hmac = $request->input("hmac");

      // if(empty($hmac)){
      //     http_response_code(400);
      //     exit;
      // }

      // $hmacSecret = "7FD0725C9B7DCFEACEB78D8CC1ECFDFC";

      // $transaction = $request->all();

      // $paymentId = $transaction['merchant_order_id'];
      // $tanxId = $transaction['id'];
      // // dd($transaction);


      // if(!$this->checkHmac($hmac,$transaction,$hmacSecret)){
      //     http_response_code(401);
      //     exit;
      // }


      // $status = "";

      // if(filter_var($transaction["success"],FILTER_VALIDATE_BOOLEAN)){
      //     $status = "success";
      // }elseif(filter_var($transaction["pending"],FILTER_VALIDATE_BOOLEAN)){
      //     $status = "pending";
      // }elseif(filter_var($transaction["is_void"],FILTER_VALIDATE_BOOLEAN)){
      //     $status = "void";
      // }
      // // dd($status);
      // $acceptPayment = AcceptPayment::find($paymentId);

      // $updatePayment = AcceptPayment::where('id',$paymentId)->update([
      //     "accept_transaction_id" => $tanxId,
      //     "status" => $status,
      //     "paid" => $status == "success",
      //     "paid_at" => $status == "success" ? Carbon::now() : null,
      // ]);
      // $paymentInfo = AcceptPayment::where('id',$paymentId)->first();
      // // $service_id = $request->input('service_id');
      // // $package_id = $request->input('package_id');
      // return $updatePayment;

      //  $postData4 = array(
      //   "source"=>[
      //     "identifier" => auth()->user()->mobile_number,
      //     "subtype" => "WALLET"
      //   ],
      //   "payment_token" => $payToken
      // );

      // $curl_cash = curl_init();

      // curl_setopt_array($curl_cash, array(
      //   CURLOPT_URL => "https://accept.paymobsolutions.com/api/acceptance/payments/pay",
      //   CURLOPT_RETURNTRANSFER => true,
      //   CURLOPT_ENCODING => "",
      //   CURLOPT_MAXREDIRS => 10,
      //   CURLOPT_TIMEOUT => 0,
      //   CURLOPT_FOLLOWLOCATION => true,
      //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      //   CURLOPT_CUSTOMREQUEST => "POST",
      //   CURLOPT_POSTFIELDS => json_encode($postData4),
      //   CURLOPT_HTTPHEADER => array(
      //     "Content-Type: application/json"
      //   ),
      // ));

      // $cash = curl_exec($curl_cash);

      // curl_close($curl_cash);
      // echo $cash;


      // $order->service_id  = $request->input('service_id');
      // $order->seller_id = $request->input('seller_id');
      // $order->buyer_id  = auth()->user()->id;
      // $order->order_date  = date("Y-m-d");
      // $order->order_time  = Carbon::now();
      // $order->order_duration  = $request->input('order_duration');
      // $order->order_qty = $request->input('quantity');
      // $order->order_fee = $request->input('order_fee');
      // $order->service_fee = $request->input('service_fee');
      // $order->order_active  = 'no';
      // $order->order_status  = 'pending';
      // $order->save();
      // $order->date = date('d F, Y',strtotime($order->order_date));
      // echo $order;

    }

    public function CreateOrderStripe(Request $request)
    {
      // dd($request->all());
      try {
        $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        // dd($stripe);
        $user = User::find(auth()->user()->id);
        $tokenId= $request->stripeToken;
        $paymentMethodId= $request->payment_methods;
        $order_fee = $request->input('order_fee');
        $service_fee = $request->input('service_fee');
        // $sub_total = $order_fee;
        // dd($sub_total,$order_fee,$service_fee);
        $total = $order_fee * 100;
        $total = (int) $total;
        if ($user->stripe_id == null) {
          $stripeCustomer = $user->createAsStripeCustomer();
        }
        $stripeCharge = $user->charge($total,$paymentMethodId);
        // dd($stripeCharge);
        $user->card_brand = $stripeCharge->charges->data[0]->payment_method_details->card->brand;
        $user->card_last_four = $stripeCharge->charges->data[0]->payment_method_details->card->last4;
        $user->update();
        $accept_transaction_id = $stripeCharge->charges->data[0]->payment_method;
        $receipt = $stripeCharge->charges->data[0]->receipt_url;

        $order = new Order;
        $order->order_number  = rand();
        $service_id  = $request->input('service_id');
        $package_id  = $request->input('package_id');
        $seller_id = $request->input('seller_id');
        $buyer_id  = auth()->user()->id;
        $order_date  = date("Y-m-d");
        $order_time  = Carbon::now();
        $order_duration  = $request->input('order_duration');
        $order_qty = $request->input('quantity');
        $order->service_id  = $service_id;
        $order->seller_id  = $seller_id;
        $order->buyer_id  = $buyer_id;
        $order->order_date  = $order_date;
        $order->order_time  = $order_time;
        $order->order_duration  = $order_duration;
        $order->order_qty = $order_qty;
        $order->order_fee = $order_fee;
        $order->service_fee = $service_fee;
        $order->order_active  = 'no';
        $order->order_status  = 'pending';
        $order->save();
        $order->date = date('d F, Y',strtotime($order->order_date));
        $type = 'Stripe';
        $sub_total = $order_fee + $service_fee;
        $total_amount = $sub_total * 100;
        $order_id = $order->id;
        $transId = $request->input('id');
        $merchant_order_id = rand();
          // dd($token);
          $auth_token = $this->getAuthToken();
          $insertPayment = AcceptPayment::create([
            "merchant_order_id" => $merchant_order_id,
            "seller_id" => $seller_id,
            "buyer_id" => $buyer_id,
            "service_id" => $service_id,
            "package_id" => $package_id,
            "accept_transaction_id" => $accept_transaction_id,
            "status" => "pending",
            "type" => $type
          ]);

          $payment_id = $insertPayment->merchant_order_id;
          // dd($payment_id);
          $paymentData = AcceptPayment::where("merchant_order_id", $payment_id)->first();

          $seller = User::find($order->seller_id);
          $buyer = User::find($order->buyer_id);
          $toemail =  $seller->email;
          Mail::send('mail.seller-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });

          $toemail =  $buyer->email;
          Mail::send('mail.buyer-order-email',['seller' =>$seller, 'buyer'=>$buyer,'order'=>$order],
          function ($message) use ($toemail)
          {

            $message->subject('Paidpro - New Order');
            $message->from('peek.zeeshan@gmail.com', 'Engezli');
            $message->to($toemail);
          });


          return redirect('requirements/'.$order->order_number);
        } catch (\Exception $ex) {
          return $ex->getMessage();
        }
      }
    // Payment Integration
    public function getAuthToken(){
      $postData1 = [
          'api_key' => 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SnVZVzFsSWpvaU1UWXhORGcxTmpVd055NHhPRFV6TkRraUxDSndjbTltYVd4bFgzQnJJam8zTXpNM05Td2lZMnhoYzNNaU9pSk5aWEpqYUdGdWRDSjkuaHZ4T3EtVUM2cm5BLTI0Zzg4X25UWXg1NVNCQlVGX0Y0UzJVNGh2U3lBaURmSXNlUlFhaWp4UThYUzAyWVpwOWdweDdkT2k5MWt2U0NlN0wxVUlaUXc='
      ];
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://accept.paymobsolutions.com/api/auth/tokens",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postData1),
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json"
        ),
      ));

      $response = curl_exec($curl);
        if(!curl_errno($curl)){
           $result = json_decode($response, true);

          $token=$result['token'];
        }else{
          echo 'Curl error: ' . curl_error($curl);
        }
      curl_close($curl);
      // dd($token);
      return $token;
    }

    public function registerOrder($total_amount,$auth_token,$type,$paymentId){
      // dd($auth_token);
      // $merchant_order_id = rand();
      // $payment = $this->createPayment($auth_token,$type);
      $postData2 = array(
          'auth_token' => $auth_token,
          'delivery_needed' => 'false',
          'merchant_id' => '1149',
          'merchant_order_id' => $paymentId,
          'amount_cents' => $total_amount,
          'currency' => 'EGP',
          'items' => []
      );

      $curl_order = curl_init();

      curl_setopt_array($curl_order, array(
        CURLOPT_URL => "https://accept.paymobsolutions.com/api/ecommerce/orders",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postData2),
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json"
        ),
      ));

      $order_data = curl_exec($curl_order);
      if(!curl_errno($curl_order)){
       $order_result = json_decode($order_data, true);
      }else{
        echo 'Curl error: ' . curl_error($curl_order);
      }
      curl_close($curl_order);
      // dd($order_result);
      return $order_result['id'];
    }


    public function getPaymentKey($auth_token,$total_amount,$integration_id,$order_data){
        $postData3 = array(
          "auth_token" => $auth_token,
          "amount_cents" => $total_amount,
          "expiration" => 3600,
          "order_id" => $order_data,
          "billing_data" => [
              "apartment" => 'NA',
              "email" => auth()->user()->email,
              "floor" => 'NA',
              "first_name" => auth()->user()->first_name,
              "phone_number" => auth()->user()->mobile_number,
              "city" => 'NA',
              "country" => auth()->user()->country,
              "state" => 'NA',
              "street" => "NA",
              "building" => "NA",
              "last_name" => auth()->user()->last_name,
              "order_id" => $order_data
            ],
          "currency" => "EGP",
          "integration_id" => $integration_id,
          "lock_order_when_paid" => "false"
        );
      $curl_payment = curl_init();

      curl_setopt_array($curl_payment, array(
        CURLOPT_URL => "https://accept.paymobsolutions.com/api/acceptance/payment_keys",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postData3),
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json"
        ),
      ));

      $payment_response = curl_exec($curl_payment);
      if(!curl_errno($curl_payment)){
       $payment_data = json_decode($payment_response, true);
      }else{
        echo 'Curl error: ' . curl_error($curl_payment);
      }
      curl_close($curl_payment);
       // dd($payment_data);

      $payToken=$payment_data['token'];
      return $payToken;
    }

    // public function createPayment(Request $request,$type){
    //   $service_id  = $request->input('service_id');
    //   $seller_id = $request->input('seller_id');
    //   $buyer_id  = auth()->user()->id;
    //   $order_date  = date("Y-m-d");
    //   $order_time  = Carbon::now();
    //   $order_duration  = $request->input('order_duration');
    //   $order_qty = $request->input('quantity');
    //   $order_fee = $request->input('order_fee');
    //   $service_fee = $request->input('service_fee');
    //   $sub_total = $order_fee + $service_fee;
    //   $total_amount = $sub_total * 100;
    //   $merchant_order_id = rand();


    // }

    public function payRequest($payment_key,$type){
      if($type == 'card'){
      $curl_card = curl_init();

      curl_setopt_array($curl_card, array(
        CURLOPT_URL => "https://accept.paymobsolutions.com/api/acceptance/iframes/179872?payment_token=".$payment_key,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
      ));

      $iframeData = curl_exec($curl_card);

      curl_close($curl_card);

      return $payment_key;
      }
      if($type == 'kiosk'){
        $postWallet = array(
          "source"=>[
            "identifier" => "AGGREGATOR",
            "subtype" => "AGGREGATOR"
          ],
          "payment_token" => $payment_key
        );

        $curl_wallet = curl_init();

        curl_setopt_array($curl_wallet, array(
          CURLOPT_URL => "https://accept.paymobsolutions.com/api/acceptance/payments/pay",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($postWallet),
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));
        $wallet_response = curl_exec($curl_wallet);

        // dd($wallet_response);
        if(!curl_errno($curl_wallet)){
         $wallet_data = json_decode($wallet_response, true);
         // dd($wallet_data["data"]["bill_reference"]);
        }else{
          echo 'Curl error: ' . curl_error($curl_wallet);
        }
        curl_close($curl_wallet);

        return $wallet_data["data"]["bill_reference"];
      }
    }

    public function payWallet($payment_key,$identifier){
      $postWallet = array(
        "source"=>[
          "identifier" => $identifier,
          "subtype" => "WALLET"
        ],
        "payment_token" => $payment_key
      );

      $curl_wallet = curl_init();

      curl_setopt_array($curl_wallet, array(
        CURLOPT_URL => "https://accept.paymobsolutions.com/api/acceptance/payments/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postWallet),
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json"
        ),
      ));
      $wallet_response = curl_exec($curl_wallet);

      // dd(json_decode($wallet_response));
      if(!curl_errno($curl_wallet)){
       $wallet_data = json_decode($wallet_response, true);
       // dd($wallet_data["redirect_url"]);
      }else{
        echo 'Curl error: ' . curl_error($curl_wallet);
      }
      curl_close($curl_wallet);

      return $wallet_data["redirect_url"];
    }


    public function proceed_order(Request $request){


      $hmac = $request->input("hmac");

      if(empty($hmac)){
          http_response_code(400);
          exit;
      }

      $hmacSecret = "7FD0725C9B7DCFEACEB78D8CC1ECFDFC";

      // $idd = $request->input('id');
      // dd($idd);
      $transaction = $request->all();

      $paymentId = $transaction['merchant_order_id'];
      $tanxId = $transaction['id'];
      // dd($transaction);


      if(!$this->checkHmac($hmac,$transaction,$hmacSecret)){
          http_response_code(401);
          exit;
      }


      $status = "";

      if(filter_var($transaction["success"],FILTER_VALIDATE_BOOLEAN)){
          $status = "success";
      }elseif(filter_var($transaction["pending"],FILTER_VALIDATE_BOOLEAN)){
          $status = "pending";
      }elseif(filter_var($transaction["is_void"],FILTER_VALIDATE_BOOLEAN)){
          $status = "void";
      }
      // dd($status);
      $acceptPayment = AcceptPayment::find($paymentId);

      $updatePayment = AcceptPayment::where('merchant_order_id',$paymentId)->update([
          "accept_transaction_id" => $tanxId,
          "status" => $status,
          "paid" => $status == "success",
          "paid_at" => $status == "success" ? Carbon::now() : null,
      ]);
      $paymentInfo = AcceptPayment::where('merchant_order_id',$paymentId)->first();
      // $service_id = $request->input('service_id');
      // $package_id = $request->input('package_id');
      $order = new Order;
      $order->order_number  = rand();
      dd(Session::get('service_id'));
      $order->service_id  = Session::get('service_id');
      $order->seller_id = Session::get('seller_id');
      $order->buyer_id  = auth()->user()->id;
      $order->order_date  = date("Y-m-d");
      $order->order_time  = Carbon::now();
      $order->order_duration  = Session::get('order_duration');
      $order->order_qty = Session::get('order_qty');
      $order->order_fee = Session::get('order_fee');
      $order->service_fee = Session::get('service_fee');
      $order->order_active  = 'no';
      $order->order_status  = 'pending';
      $order->save();
      $order->date = date('d F, Y',strtotime($order->order_date));

      // echo $order;
      return $order;
      // $package = Packages::with('serviceInfo')->where('id',$paymentInfo->package_id)->first();
      // return view('frontend.order',compact('package'));
      // return redirect()->route('order');

    }
    function checkHmac($hmac,$data,$hmacSecret){
      $keys = ["amount_cents", "created_at", "currency", "error_occured", "has_parent_transaction", "id", "integration_id", "is_3d_secure", "is_auth", "is_capture", "is_refunded", "is_standalone_payment", "is_voided", "order.id", "owner", "pending", "source_data_pan", "source_data_sub_type", "source_data_type", "success"];
      natcasesort($keys);
      // dd($keys);
      $string = "";
      foreach($keys as $key){
          $splited = explode(".",$key);
          // dd($key);
          if(count($splited) > 1){
              $value = $data[$splited[0]];
              // dd($value);
              $string .= is_bool($value) ? json_encode($value) : $value;
          }else{
              $string .= is_bool($data[$key]) ? json_encode($data[$key]) : $data[$key];
          }
      }

      $localHmac = hash_hmac("SHA512",$string,$hmacSecret);
      // dd($localHmac);
      return $localHmac === $hmac;
    }
    // End Payment Integration


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
      //dd($order);
      if ($order->buyer_id == auth()->user()->id) {
        return view('frontend.buyer-order',compact('order'));
      }else {
        return view('frontend.seller-order',compact('order'));
      }
    }

    public function acceptCancellation(Request $request)
    {
      $request_value = $request->input('request');
      $order_id = $request->input('order_id');

      $order = Order::find($order_id);

      $order->order_status = 'cancelled';
      $order->update();
      return $order->order_number;

    }

    public function rejectCancellation(Request $request)
    {
      $request_value = $request->input('request');
      $order_id = $request->input('order_id');

      $order = Order::find($order_id);

      $order->order_status = 'started';
      $order->update();
      return $order->order_number;

    }
    public function manageOrders(Request $request)
    {
      $user_id = auth()->user()->id;
      $orders = Order::with('serviceInfo')->wherebuyer_id($user_id)->orWhere('seller_id',$user_id)->orderby('id','desc')->paginate(10);
      $activeOrders = Order::with('serviceInfo')->where('order_status','started')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      $completeOrders = Order::with('serviceInfo')->where('order_status','completed')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      $deliverOrders = Order::with('serviceInfo')->where('order_status','delivered')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      $waitingOrders = Order::with('serviceInfo')->where('order_status','waiting review')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      $pendingOrders = Order::with('serviceInfo')->where('order_status','pending')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      $cancelOrders = Order::with('serviceInfo')->where('order_status','cancelled')->Where(function($q) use ($user_id){
               $q->orWhere('buyer_id', $user_id)
                 ->orWhere('seller_id', $user_id);
          })->orderby('id','desc')->paginate(10);
      return view('frontend.manage-orders',compact('orders','activeOrders','completeOrders','deliverOrders','waitingOrders','pendingOrders','cancelOrders'));
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

      $order->order_status = 'delivered';
      $order->update();

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

      $order = Order::find($conversation->order_id);
      $order->order_status = 'waiting review';
      $order->update();

      $getconversation = OrderConversations::with('userInfo','delivery')->where('id',$conversation_id)->first();
      $notification =  Notifications::with('senderInfo','receiverInfo','lastMessage','orderInfo')
      ->where('conversation_id',$conversation_id)->first();
      $data = array(
        'conversation' => $getconversation,
        'notification' => $notification
      );
      return $data;
    }

    public function rejectDelivery(Request $request)
    {
      $data = $request->input('conversation');
      $conversation_id = $data['id'];
      $conversation = OrderConversations::find($conversation_id);
      $conversation->status = 'reject';
      $conversation->update();

      $order = Order::find($conversation->order_id);
      $order->order_status = 'started';
      $order->update();

      $getconversation = OrderConversations::with('userInfo','delivery')->where('id',$conversation_id)->first();
      $notification =  Notifications::with('senderInfo','receiverInfo','lastMessage','orderInfo')
      ->where('conversation_id',$conversation_id)->first();
      $data = array(
        'conversation' => $getconversation,
        'notification' => $notification
      );
      return $data;
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
      Notifications::where('order_id',$order->id)->delete();
      $notificationData['receiver_id'] = $order->seller_id;
      $notificationData['sender_id'] = $order->buyer_id;
      $notificationData['order_id'] = $order->id;
      $notificationData['conversation_id'] = null;
      $notificationData['reason'] = 'order_rating';
      $notificationData['rating'] = $overall_rating;
      $notificationData['notification_date'] = Carbon::now();
      $notificationData['status'] = 'unread';
      $notification = Notifications::create($notificationData);
      $data = array(
        'notifications' => $notification
      );
      return $data;
      // return redirect('/manage-orders')->with('success', 'Order completed successfully');
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
        $order_id = $request->input('order_id');
        $data['user_id'] = $user_id;
        $data['order_id'] = $request->input('order_id');
        $data['order_number'] = $request->input('order_number');
        $data['reason'] = $request->input('reason');
        $data['details'] = $request->input('details');
        $data['status'] = 'pending';
        $resolution = ResolutionCenter::create($data);

        $order = Order::find($order_id);
        $order->order_status = 'cancellation requested';
        $order->update();

        return redirect('/manage-orders')->with('success', 'Request send successfully');

    }




}
