<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\User;
use App\Models\Services;
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

        return \View::make('frontend.services')->with(compact('services','serviceCount','cat_name'));
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
        // dd($category_id);
        $services = Services::where('cat_id', $category_id)->with('sellerInfo','packageInfo')->paginate(50);
        $serviceCount = $services->count();
        return view('frontend.ajax.category-service',compact('services','serviceCount'));
    }

    // Get Online Seller Services
    public function online_seller_services(Request $request){
      $seller_status = $request->input('seller_status');
      // dd($seller_status);
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
      
      return view('frontend.ajax.online-seller-services',compact('services'));
    }
    // Get Local Seller Services
    public function local_seller_services(Request $request){
      $seller_country = $request->input('seller_country');
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
      
      return view('frontend.ajax.local-seller-services',compact('services'));
    }
    // Get Buget Filter Services
    public function budget_filter_services(Request $request){
      $budgt = $request->budgt;
      dd($budgt);
      $services = Services::where('cat_id', $category_id)->with('sellerInfo','packageInfo')->paginate(50);
      $serviceCount = $services->count();
      return view('frontend.ajax.budget-filter-service',compact('services','serviceCount'));
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
