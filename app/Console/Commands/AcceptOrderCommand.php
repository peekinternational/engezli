<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Facade\Engezli;
use DateTime;
use Mail;
use DB;

class AcceptOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:acceptorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Accept Order after 3 days of delivery';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      //Check cron job by sending email
        // $toemail='mwaqas.peek@gmail.com';
        // $new_user = DB::table('users')->where('email','mwaqas.peek@gmail.com')->first();
        // $toemail =  $new_user->email;
        // // dd($toemail);
        // Mail::send('mail.user-registration-email',['user' =>$new_user],
        // function ($message) use ($toemail)
        // {
        //
        //   $message->subject('Paidpro - Test Cron Job');
        //   $message->from('peek.zeeshan@gmail.com', 'Engezli');
        //   $message->to($toemail);
        // });

        $orders = DB::table('orders')->where('order_status','delivered')->get();
        foreach ($orders as $order) {
          $user_country = Engezli::getUserDetails($order->seller_id)->country;
          if($user_country == 'Pakistan'){
            date_default_timezone_set("Asia/Karachi");
          }elseif ($user_country == 'Egypt') {
            date_default_timezone_set("Africa/Cairo");
          }
          $time1 =date("Y-m-d H:i:s");
          $time2 = date("Y-m-d H:i:s", strtotime('+3 days',strtotime($order->delivery_time)));
          // $time2 = date("Y-m-d H:i:s", strtotime('+10 minutes',strtotime($order->delivery_time)));
          $time3 = $order->delivery_time;
          if ($time1 >= $time2) {
            // dd($time1,$time2,$time3);
            $input['order_status'] = 'waiting review';
            DB::table('orders')->where('id',$order->id)->update($input);

          }

        }

    }
}
