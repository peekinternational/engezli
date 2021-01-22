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
        if($cat_url == 'all'){
            $services = Services::with('sellerInfo','packageInfo')->paginate(15);
            $serviceCount = $services->count();
            $cat_name = "All Categories";  
        }else{
            $get_cat = Categories::wherecat_url($cat_url)->first();
            // dd($get_cat->id);
            $services = Services::wherecat_id($get_cat->id)->with('sellerInfo','packageInfo')->paginate(15);
            $serviceCount = $services->count();
            $cat_name = $get_cat->cat_title;
        }
        $languages = Language::get();
        $sellerLevels = SellerLevel::get();

        return \View::make('frontend.services')->with(compact('services','serviceCount','cat_name','languages','sellerLevels'));
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
        return view('frontend.search',compact('services','serviceCount','categories'));
    }

    // Get Category Search Service
    public function get_services(Request $request){

        $category_id = $request->category_id;
        $seller_status = $request->input('seller_status');
        $seller_country = $request->input('seller_country');
        $budget = $request->input('budget');
        $delivery_time = $request->input('delivery_time');
        $sort_by = $request->input('sort_by');

        if($category_id != null){
        // dd($category_id);
          $services = Services::where('cat_id', $category_id)->with('sellerInfo','packageInfo')->paginate(50);
          $serviceCount = $services->count();
          return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($seller_status != null){
          if($seller_status == "on"){
            $seller_status = "online";
            $get_seller = User::whereuser_status($seller_status)->get();
            // dd($get_seller);
            foreach ($get_seller as $key => $seller) {
              $services = Services::where('seller_id',$seller->id)->with('sellerInfo','packageInfo')->get();
            }
          }else{
            $seller_status = "offline";
            $services = Services::with('sellerInfo','packageInfo')->get();
          }
          
          return view('frontend.ajax.category-service',compact('services'));
        }
        if($seller_country != null){
          $country = auth()->user()->country;
          // dd($country);
          if($seller_country == "on"){
            $seller_country = $country;
            $get_seller = User::wherecountry($seller_country)->get();
            // dd($get_seller);
            if($get_seller->count() == 0){
              $services = Services::with('sellerInfo','packageInfo')->get();
            }else{
              foreach ($get_seller as $key => $seller) {
                $services = Services::where('seller_id',$seller->id)->with('sellerInfo','packageInfo')->get();
              }
            }
          }else{
            $seller_country = "all";
            $services = Services::with('sellerInfo','packageInfo')->get();
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
          $query = $query->with('sellerInfo','packageInfo');
          
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
            $query = $query->with('sellerInfo','packageInfo');
            
            $query = $query->whereHas('packageInfo', function($q) use($delivery_time) {
              $q->where('delivery_time','<=',$delivery_time);
            });

            $services = $query->paginate(16);
            // dd($services);
            $serviceCount = $services->count();
          }else{
            $services = Services::with('sellerInfo','packageInfo')->get();
            $serviceCount = $services->count();
          }
          return view('frontend.ajax.category-service',compact('services','serviceCount'));
        }
        if($sort_by != null){
          if($sort_by == 'newest'){
            $services = Services::with('sellerInfo','packageInfo')->orderBy('id','DESC')->get();
            $serviceCount = $services->count();
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
          }
          else{
            $services = Services::with('sellerInfo','packageInfo')->get();
            $serviceCount = $services->count();
            return view('frontend.ajax.category-service',compact('services','serviceCount'));
          }
        }
    }

    public function service_detail(Request $request, $url){
      $serviceData = Services::where('service_url',$url)->with('sellerInfo', 'packageInfo','serviceFaq','serviceReq','servicePackgOptions')->first();
      // dd($serviceData);
      $productCat = Categories::where('id',$serviceData->cat_id)->first();
      $productSubCat = Categories::where('id',$serviceData->cat_child_id)->first();
      
      return view('frontend.service-detail',compact('serviceData','productCat','productSubCat'));
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
