<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\User;
use App\Models\Services;
use App\Models\Language;
use App\Models\SellerLevel;
use App\Models\BuyerReviews;
use App\Models\FavoriteService;
use App\Facade\Engezli;
use Hash;
use Session;
use Mail;
use Redirect;
use App;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cat_url = $request->segment(2);
        $child_url = $request->segment(3);
        if($cat_url == 'all'){
            $services = Services::with('sellerInfo','packageInfo','favorite')->paginate(16);

            $serviceCount = $services->count();
            $cat_name = "All Categories";
        }else{
            $get_cat = Categories::wherecat_url($cat_url)->first();

            // dd($get_cat->id);
            $services = Services::wherecat_id($get_cat->id)->orWhere('cat_child_id',$get_cat->id)->with('sellerInfo','packageInfo','favorite')->paginate(16);
            $serviceCount = $services->count();
            $cat_name = $get_cat->cat_title;
        }
        $languages = Language::get();
        $sellerLevels = SellerLevel::get();
        $sellerCountries = User::select('country')->where('country','!=', '')->distinct()->get();

        return \View::make('frontend.services')->with(compact('services','serviceCount','cat_name','languages','sellerLevels','sellerCountries'));
    }

    public function search_service(Request $request){
        if($request->has('service_title')){
            $services = Services::where('service_title','like','%'.$request->service_title.'%')->paginate(15);
            $serviceCount = $services->count();
        }else{
            $services = Services::paginate(15);
            $serviceCount = $services->count();
        }
        $categories = Categories::where('parent_id', '==', 0)->get();
        $languages = Language::get();
        $sellerLevels = SellerLevel::get();
        $sellerCountries = User::select('country')->where('country','!=', '')->distinct()->get();
        return view('frontend.search',compact('services','serviceCount','categories','languages','sellerLevels','sellerCountries'));
    }

    // Get Category Search Service
    public function get_services(Request $request){

        $category_id = $request->category_id;
        $seller_status = $request->input('seller_status');
        $seller_country = $request->input('seller_country');
        $budget = $request->input('budget');
        $delivery_time = $request->input('delivery_time');
        $sort_by = $request->input('sort_by');
        $language_id = $request->input('language_id');
        $level_id = $request->input('level_id');
        $country = $request->input('country');
        $reset = $request->input('reset');

        if($category_id != null){
        // dd($category_id);
          $services = Services::where('cat_id', $category_id)->with('sellerInfo','packageInfo','favorite')->paginate(50);
          $serviceCount = $services->count();
          return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($seller_status != null){
          if($seller_status == "on"){
            $seller_status = "online";
            $get_seller = User::whereuser_status($seller_status)->get();
            // dd($get_seller);
            foreach ($get_seller as $key => $seller) {
              $services = Services::where('seller_id',$seller->id)->with('sellerInfo','packageInfo','favorite')->get();
            }
          }else{
            $seller_status = "offline";
            $services = Services::with('sellerInfo','packageInfo','favorite')->get();
          }

          return view('frontend.ajax.category-service',compact('services'));
        }
        // dd($seller_country);
        if($seller_country != null){
          $country = auth()->user()->country;
          // dd($country);
          if($seller_country == "on"){
            $seller_country = $country;
            $get_seller = User::wherecountry($seller_country)->get();
            // dd($get_seller);
            if($get_seller->count() == 0){
              $services = Services::with('sellerInfo','packageInfo','favorite')->get();
            }else{
              foreach ($get_seller as $key => $seller) {
                $services = Services::where('seller_id',$seller->id)->with('sellerInfo','packageInfo','favorite')->get();
              }
            }
          }else{
            $seller_country = "all";
            $services = Services::with('sellerInfo','packageInfo','favorite')->get();
          }

          return view('frontend.ajax.category-service',compact('services'));
        }

        if($budget != null){
          $data = explode("-", $budget);
          // dd($price);
          $min = $data[0];
          $max = $data[1];
          // dd($data);
          $query = Services::query();
          $query = $query->with('sellerInfo','packageInfo','favorite');

          $query = $query->whereHas('packageInfo', function($q) use($min,$max) {
            $q->whereBetween('price',[(int)$min, (int)$max]);
          });

          $services = $query->paginate(16);;
          // dd($services);
          $serviceCount = $services->count();
          return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }

        if($delivery_time != null){
          // dd($delivery_time);
          if($delivery_time != 'all day'){
            $query = Services::query();
            $query = $query->with('sellerInfo','packageInfo','favorite');

            $query = $query->whereHas('packageInfo', function($q) use($delivery_time) {
              $q->where('delivery_time','<=',$delivery_time);
            });

            $services = $query->paginate(16);
            // dd($services);
            $serviceCount = $services->count();
          }else{
            $services = Services::with('sellerInfo','packageInfo','favorite')->get();
            $serviceCount = $services->count();
          }
          return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($sort_by != null){
          if($sort_by == 'newest'){
            $services = Services::with('sellerInfo','packageInfo','favorite')->orderBy('id','DESC')->get();
            $serviceCount = $services->count();
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
          }
          else{
            $services = Services::with('sellerInfo','packageInfo','favorite')->get();
            $serviceCount = $services->count();
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
          }
        }
        // dd($language_id);
        if($language_id != null){
          $query = Services::query();
          $query = $query->with('sellerInfo');
          $query = $query->whereHas('sellerInfo', function($q) use($language_id) {
            $q->where('language_id', 'like', "%".$language_id."%");
          });
          $services = $query->get();
          $serviceCount = $services->count();
          // $userData = User::where('language_id', 'like', "%".$language_id."%")->get();
          // foreach ($userData as $key => $user) {
          //   $services = Services::where('seller_id',$user->id)->with('sellerInfo','packageInfo','favorite')->get();
          //   $serviceCount = $services->count();
          // }
          // dd($services);
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($level_id != null){
          $query = Services::query();
          $query = $query->with('sellerInfo');
          $query = $query->whereHas('sellerInfo', function($q) use($level_id) {
            $q->where('level_id',$level_id);
          });
          $services = $query->get();
          $serviceCount = $services->count();
          // $userData = User::wherelevel_id($level_id)->get();
          // foreach ($userData as $key => $user) {
          //   $services = Services::where('seller_id',$user->id)->with('sellerInfo','packageInfo','favorite')->get();
          //   $serviceCount = $services->count();
          //   // dd($services);
          // }
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($country != null){
          $userData = User::wherecountry($country)->get();
          foreach ($userData as $key => $user) {
            $services = Services::where('seller_id',$user->id)->with('sellerInfo','packageInfo','favorite')->get();
            $serviceCount = $services->count();
            // dd($services);
          }
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($reset != null){
            $services = Services::with('sellerInfo','packageInfo')->get();
            $serviceCount = $services->count();

            return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
    }

    public function service_detail(Request $request,$username, $slug){

      $user = User::with('userReviews')->where('username', $username)->first();
      $serviceData = Services::where('service_url',$slug)->where('seller_id',$user->id)->with('sellerInfo', 'packageInfo','serviceFaq','serviceReq','servicePackgOptions','serviceRating','favorite')->first();
      // dd($serviceData);
      $productCat = Categories::where('id',$serviceData->cat_id)->first();
      $productSubCat = Categories::where('id',$serviceData->cat_child_id)->first();

      $rating_avg = array();
      $count_stars = array();
      $userinfo   = auth()->user();

      $star1 = BuyerReviews::where('service_id',$serviceData->id)->where(function ($query)
      {
        $query->whereBetween('overall_rating', ['0.5','1.4']);
      })->count();
      $star2 = BuyerReviews::where('service_id',$serviceData->id)->where(function ($query)
      {
        $query->whereBetween('overall_rating', ['1.5','2.4']);
      })->count();
      $star3 = BuyerReviews::where('service_id',$serviceData->id)->where(function ($query)
      {
        $query->whereBetween('overall_rating', ['2.5','3.4']);
      })->count();
      $star4 = BuyerReviews::where('service_id',$serviceData->id)->where(function ($query)
      {
        $query->whereBetween('overall_rating', ['3.5','4.4']);
      })->count();
      $star5 = BuyerReviews::where('service_id',$serviceData->id)->where(function ($query)
      {
        $query->whereBetween('overall_rating', ['4.5','5']);
      })->count();

      $tot_stars = $star1 + $star2 + $star3 + $star4 + $star5;
      // dd($star1,$star2,$star3,$star4,$star5);
      if($tot_stars == 0){
          $rating_avg = array('0','0','0','0','0');
          $count_stars = array('0','0','0','0','0');
      } else{

          for ($i=1;$i<=5;++$i) {

            $var     = "star$i";
            $count   = $$var;
            $percent = $count * 100 / $tot_stars;
            $avg     = number_format($percent,2)+0;
            array_push($rating_avg, $avg);
            array_push($count_stars, $count);

          }

      }

      // dd($count_stars);

      return view('frontend.service-detail',compact('serviceData','productCat','productSubCat','user','rating_avg','count_stars','username','slug'));
    }


    public function favoriteService(Request $request){
      $user_id = $request->input('user_id');
      $service_id = $request->input('service_id');

      $favorite = new FavoriteService;

      $get_favorite = FavoriteService::where('user_id',$user_id)->where('services_id',$service_id)->first();
      if($get_favorite == ''){
        $favorite->user_id = $user_id;
        $favorite->services_id = $service_id;
        $favorite->save();
        return $favorite;
      }else{
        $unfavorite = FavoriteService::find($get_favorite->id);

        $unfavorite->delete();
        return 1;
      }

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
