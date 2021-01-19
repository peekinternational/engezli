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
use Cviebrock\EloquentSluggable\Services\SlugService;

class CreateServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = Categories::where('parent_id', '0')->get();
        $subCategories = Categories::where('parent_id', '!=', '0')->get();
        return \View::make('frontend.create-service')->with(compact('mainCategories', 'subCategories'));
    }

    // Fetch SuBcategory
    public function fetch_subcategory(Request $request){
        $category_id =  $request->input('category_id');
        // dd($category_id);
        $subCategory = Categories::where('parent_id', $category_id)->get();
        // dd($subCategory);
       

            return view('frontend.fetch_subcategory',compact('subCategory'));
        
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
        
    }

    public function post_service(Request $request)
    {
      $user_id = auth()->user()->id;
      $service = new Services;
      $type = $request->input('type');
      $service->seller_id = $user_id;
      $service->service_status = "pending";
      $service->posted_date = date("Y-m-d");
      
        if($type == 1){
          $service_id = 0;
          $this->validate($request,[
            'service_title' => 'required',
            'seo_title' => 'required',
            'cat_id' => 'required',
            'cat_child_id' => 'required',
            'search_tags' => 'required'

          ],[

            'service_title.required' =>'Enter service title',
            'seo_title.required' => 'Enter seo title',
            'cat_id.required' => 'Please select category',
            'cat_child_id.required' => 'Please select sub category',
            'search_tags.required' => 'Enter search tags',
          ]);
          
          
          $service->service_title = $request->input('service_title');
          $service->service_url = Str::slug($request->input('service_title'), '-');
         
          $service->seo_title = $request->input('seo_title');
          $service->cat_id = $request->input('cat_id');
          $service->cat_child_id = $request->input('cat_child_id');
          $service->search_tags = $request->input('search_tags');
          
          $service->save();
          $service_id = $service->id;
          $request->session()->put('u_session', $service_id);
          // dd($session_id);
        }elseif($type == 2){
          $service_id= Session::get('u_session');

        }elseif ($type == 3) {
          $service_id= Session::get('u_session');
          // $service->service_desc = $request->input('service_desc');
          $update = Services::where('id', $service_id)->update(['service_desc' => $request->input('service_desc')]);
        }elseif ($type == 4) {
          $service_id= Session::get('u_session');
        }else{
          $data = [];
          $service_id= Session::get('u_session');
          $service_img1 = $request->file('service_img1');
          if($service_img1 != ''){
            $filename= $service_img1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img1->getClientOriginalExtension();
            $extension= $service_img1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img1->move($destinationpath, $imagename);
            $data['service_img1'] = $imagename;
          }
          $service_img2 = $request->file('service_img2');
          if($service_img2 != ''){
            $filename= $service_img2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img2->getClientOriginalExtension();
            $extension= $service_img2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img2->move($destinationpath, $imagename);
            $data['service_img2'] = $imagename;
          }
          $service_img3 = $request->file('service_img3');
          if($service_img3 != ''){
            $filename= $service_img3->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img3->getClientOriginalExtension();
            $extension= $service_img3->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img3->move($destinationpath, $imagename);
            $data['service_img3'] = $imagename;
          }
          $service_video = $request->file('service_video');
          if($service_video != ''){
            $filename= $service_video->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_video->getClientOriginalExtension();
            $extension= $service_video->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_video->move($destinationpath, $imagename);
            $data['service_video'] = $imagename;
          }
          $service_pdf1 = $request->file('service_pdf1');
          if($service_pdf1 != ''){
            $filename= $service_pdf1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf1->getClientOriginalExtension();
            $extension= $service_pdf1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf1->move($destinationpath, $imagename);
            $data['service_pdf1'] = $imagename;
          }
          $service_pdf2 = $request->file('service_pdf2');
          if($service_pdf2 != ''){
            $filename= $service_pdf2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf2->getClientOriginalExtension();
            $extension= $service_pdf2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf2->move($destinationpath, $imagename);
            $data['service_pdf2'] = $imagename;
          }

          $update = Services::where('id', $service_id)->update($data);
          $request->session()->flash('u_session');
          
          return redirect('create-service');
        }

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
