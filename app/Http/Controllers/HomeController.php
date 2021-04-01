<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Services;
use App\Facade\Engezli;
use Hash;
use Session;
use Mail;
use Redirect;
use App;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('parent_id', '==', 0)->get();

        $services = Services::with('sellerInfo','packageInfo','serviceRating','favorite')->get();
         // dd($services->serviceRating->overall_rating);
        return \View::make('frontend.index')->with(compact('categories','services'));
    }

    public function getState(Request $request){
  		if(!$request->ajax()){
  			exit('Directory access is forbidden');
  		}
  		$countryId = $request->segment(2);
  		$states = Engezli::getStates($countryId);
  		return view('frontend.states',compact('states'));
  	}

    public function getCities(Request $request){
  		if(!$request->ajax()){
  			exit('Directory access is forbidden');
  		}
  		$stateId = $request->segment(2);
  		$cities = Engezli::getCities($stateId);
  		return view('frontend.cities',compact('cities'));
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
        Toastr::success('Post added successfully :)','Success');
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

    // Language Change
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
    // Currency Change
    public function CurrencyChange(Request $request)
    {
        session()->put('currency', $request->currency);
        return redirect()->back();
    }
}
