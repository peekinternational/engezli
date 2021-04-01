<?php
namespace App\Classes;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\Categories;
use App\Models\NotificationSetting;
use App\Models\PackagesOption;
use App\Models\Order;
use App\Models\OrderConversations;
use App\Models\Language;
use App\Models\Skills;
use Str;

class Engezli {
	public function get_categories(){
		$categories = Categories::where('parent_id', '==', 0)->get();
		return $categories;
	}
	public function get_subcategories($id){
		$subcategories = Categories::where('parent_id', $id)->get();
		return $subcategories;
	}
	public function check_child($id){
		$subcategories = Categories::where('parent_id', $id)->first();
		if ($subcategories !=null) {
			return '1';
		}else {
			return '0';
		}
	}
	public function get_subcat($id){
		$sub_cat = Categories::whereid($id)->first();
		return $sub_cat;
	}
	public function get_optionName($id){
		$option_name = PackagesOption::whereid($id)->get();
		return $option_name;
	}
	public function get_subCatName($url){
		$subCatName = Categories::wherecat_url($url)->first();
		return $subCatName;
	}
	public function get_skill($id){
		$skillName = Skills::whereid($id)->first();
		return $skillName;
	}
	public function get_language($id){
		$langName = Language::whereid($id)->first();
		return $langName;
	}
	public function get_countries(){
		$countries = Countries::get();
		return $countries;
	}
	public function getStates($id){
		$states = States::where('country_id',$id)->get();
		return $states;
	}
	public function getCities($id){
		$cities = Cities::where('state_id',$id)->get();
		return $cities;
	}
	public function getNotificationEmail($user_id,$type){
		$notifications = NotificationSetting::where('user_id',$user_id)->where('type',$type)->first();
		if ($notifications != null) {
			$notifications = $notifications->email;
		}
		return $notifications;
	}
	public function getNotificationMobile($user_id,$type){
		$notifications = NotificationSetting::where('user_id',$user_id)->where('type',$type)->first();
		if ($notifications != null) {
			$notifications = $notifications->mobile;
		}
		return $notifications;
	}
	public function getorderDelivery($order_id,$status){
		$delivery = OrderConversations::where('order_id',$order_id)->where('status',$status)->first();
		if ($delivery !=null) {
			return '1';
		}else {
			return '0';
		}
		return $delivery;
	}
	public function getUserorder($user_id){
		$delivery = Order::where('buyer_id',$user_id)->orwhere('seller_id',$user_id)->get();
		// dd($delivery);
		return $delivery;
	}
	public function getUserDetails($user_id){
		$user = User::where('id',$user_id)->first();
		return $user;
	}

	public function convertCurrency($amount){
		$apikey = 'b0f04aa4d64da9f6b68c';
		// session()->forget('currency');
		$currency = session()->get('currency');
		if ($currency != null) {
			if ($currency == 'USD') {
				$from_currency = 'EGP';
				$to_currency = 'USD';
			}elseif ($currency == 'EGP') {
				$from_currency = 'USD';
				$to_currency = 'EGP';
			}
		}else {
			$currency = session()->put('currency','USD');
			$from_currency = 'EGP';
			$to_currency = 'USD';
		}

		if ($to_currency == "EGP") {
			$from_Currency = urlencode($from_currency);
			$to_Currency = urlencode($to_currency);
			$query =  "{$from_Currency}_{$to_Currency}";
			// change to the free URL if you're using the free version
			// free version
			$json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
			// paid version
			// $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
			$obj = json_decode($json, true);

			$val = floatval($obj["$query"]);


			$total = $val * $amount;
			$total = number_format($total, 2, '.', ',');
			// return $amount = 'EGP '.$total;
			return $amount = 'E£ '.$total;

		}else {
			return $amount = '$'.$amount;
		}

	}

	public function convertCurrency2($amount){
		$apikey = 'b0f04aa4d64da9f6b68c';
		// session()->forget('currency');
		$currency = session()->get('currency');
		if ($currency != null) {
			if ($currency == 'USD') {
				$from_currency = 'EGP';
				$to_currency = 'USD';
			}elseif ($currency == 'EGP') {
				$from_currency = 'USD';
				$to_currency = 'EGP';
			}
		}else {
			$currency = session()->put('currency','USD');
			$from_currency = 'EGP';
			$to_currency = 'USD';
		}

		if ($to_currency == "EGP") {
			$from_Currency = urlencode($from_currency);
			$to_Currency = urlencode($to_currency);
			$query =  "{$from_Currency}_{$to_Currency}";
			// change to the free URL if you're using the free version
			// free version
			$json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
			// paid version
			// $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
			$obj = json_decode($json, true);

			$val = floatval($obj["$query"]);


			$total = $val * $amount;
			$total = number_format($total, 2, '.', ',');
			return $total;
		}else {
			return $amount;
		}

	}

//uncomment to test
//echo convertCurrency(10, 'USD', 'PHP');
}
?>
