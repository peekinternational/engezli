<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\User;
use App\Models\Services;
use App\Models\ServiceRequirement;
use App\Models\ServiceFaq;
use App\Models\Packages;
use App\Models\PackagesOption;
use App\Models\PackagesOptionService;
use App\Facade\Engezli;
use Hash;
use Session;
use Mail;
use Redirect;
use App;
use Response;
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

    // Fetch Package Attribute Using id
    public function fetch_package_option(Request $request){
      $category_id = $request->input('category_id');

      $packageOptions = PackagesOption::wherecat_id($category_id)->get();
      // dd($packageOptions);
      $packg1[] ='';
      $packg2[] ='';
      $packg3[] ='';
      if($packageOptions != ''){
        foreach ($packageOptions as $key => $option) {

          $packg1[] = '<div class="form-group-check border-bottom ">'.
            '<div class="form-check">'.
              '<input type="checkbox" class="form-check-input"  id="exampleCheck'.$option->id.'1"  name="package_attribute[1][value]" />'.
              '<input type="hidden" name="package_attribute[1][package_option_id]"value="'.$option->id.'">'.
              '<label class="form-check-label" for="exampleCheck'.$option->id.'1" >'.$option->name.'</label>'.
            '</div>'.
          '</div>';
          $packg2[] = '<div class="form-group-check border-bottom ">'.
            '<div class="form-check">'.
              '<input type="checkbox" class="form-check-input"  id="exampleCheck'.$option->id.'2"  name="package_attribute[2][value]" />'.
              '<input type="hidden" name="package_attribute[2][package_option_id]" value="'.$option->id.'">'.
              '<label class="form-check-label" for="exampleCheck'.$option->id.'2" >'.$option->name.'</label>'.
            '</div>'.
          '</div>';
          $packg3[] = '<div class="form-group-check border-bottom ">'.
            '<div class="form-check">'.
              '<input type="checkbox" class="form-check-input"  id="exampleCheck'.$option->id.'3"   name="package_attribute[3][value]" />'.
              '<input type="hidden" name="package_attribute[3][package_option_id]"value="'.$option->id.'">'.
              '<label class="form-check-label" for="exampleCheck'.$option->id.'3" >'.$option->name.'</label>'.
            '</div>'.
          '</div>';
        }
      }

        return response()->json(['packg1'=>$packg1,'packg2'=>$packg2,'packg3'=>$packg3]);



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
      // dd($type);
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
          // dd($type);
          $service_id = Session::get('u_session');
          $package_type = $request->input('package_type');

          $packages = $request->input('proposal_packages');

          foreach ($packages as $key => $package) {
            $packageBasic = [
              "services_id" => $service_id,
              "package_name" => $package['package_title'],
              "title" => $package['package_name'],
              "description" => $package['package_desc'],
              "delivery_time" => $package['delivery_time'],
              "price" => $package['package_price'],
              "revision" => $package['revision'],
              "no_of_pages" => $package['no_of_pages']
            ];

            $insertPackage = Packages::insert($packageBasic);

          }

          $attributes = $request->input('package_attribute');
          if($attributes != ''){
            // dd($attributes);
            foreach ($attributes as $key => $attr) {
              $serviceAttr = [
                "services_id" => $service_id,
                "package_option_id" => $attr['package_option_id'],
                "value" => $attr['value']
              ];

              $insertOption = PackagesOptionService::insert($serviceAttr);
            }
          }
          return $insertPackage;
          // return $service_id;

        }elseif ($type == 3) {
          $service_id= Session::get('u_session');
          // $service->service_desc = $request->input('service_desc');
          $update = Services::where('id', $service_id)->update(['service_desc' => $request->input('service_desc')]);
          // dd($service_id);
          $faqData =[
            'services_id' => $service_id,
            'title' => $request->input('title'),
            'description' => $request->input('description')
          ];
          $inserFaq = ServiceFaq::create($faqData);
          $faqId = $inserFaq->id;
          // dd($faqId);
          $faq = ServiceFaq::where('id',$faqId)->first();

          $faq_data = '<div class="card"><div class="card-header" id="heading'.$faq->id.'">'.
            '<h5 class="mb-0">'.
              '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse'.$faq->id.'" aria-expanded="false" aria-controls="collapse'.$faq->id.'">'.$faq->title.'</button>'.
              '</h5>'.
            '</div>'.
            '<div id="collapse'.$faq->id.'" class="collapse" aria-labelledby="heading'.$faq->id.'" data-parent="#accordion">'.
              '<div class="card-body">'.
                '<div class="input-box-container">'.
                  '<div class="form-group">'.
                    '<input type="text" value="'.$faq->title.'" class="form-control" placeholder="Add a Question: i.e. Do you translate to English as well?" />'.
                  '</div>'.
                  '<div class="form-group">'.
                    '<textarea maxlength="300" class="form-control" rows="3" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">'.$faq->description.'</textarea>'.
                  '</div>'.

                  '<div class="btn-container-box">'.
                    '<div class="btns">'.
                      '<button class="custom-btn delete-btn">'.
                        '<i class="fa fa-times"></i> delete'.
                      '</button>'.
                    '</div>'.
                    '<div class="btns">'.
                      '<button class="custom-btn">cancle</button>'.
                      '<button class="custom-btn">save</button>'.
                    '</div>'.
                  '</div>'.
                '</div>'.
              '</div>'.
            '</div>'.
            '</div>';
          return json_encode($faq_data);

        }elseif ($type == 4) {
          $service_id= Session::get('u_session');
          // dd($request->all());
          $requirementsData = [
            'question' => $request->input('question'),
            'response' => $request->input('response'),
            'services_id' => $service_id
          ];
          $mandatory = $request->input('mandatory');
          if ($mandatory !=null) {
            $requirementsData['mandatory_status'] = $mandatory;
          }
          $insertRequr = ServiceRequirement::create($requirementsData);

          $requestId = $insertRequr->id;
          // dd($faqId);
          $request = ServiceRequirement::where('id',$requestId)->first();
          // dd($request);
          $req_data =
          '<div class="question-list-item requiremet-question-'.$request->id.'">'.
                        '<div class="inner-text">'.
                          '<p class="requirement-response'.$request->id.'">'.$request->response.'</p>'.
                          '<div class="dropdown">'.
                            '<a class="nav-link globe-icon" href="#"id="navbarDropdown"'.
                             'role="button" data-toggle="dropdown"aria-haspopup="true"'.
                              'aria-expanded="false">'.
                              '<i class="fa fa-ellipsis-h"></i></a>'.
                            '<div class="dropdown-menu"'.
                              'aria-labelledبواسطة="navbarDropdown">'.
                              '<a class="dropdown-item" href="javascript:void(0);" onclick="showRequirement('.$request->id.')">Edit</a>'.
                              '<a class="dropdown-item" href="javascript:void(0);" onclick="deleteRequirement('.$request->id.')">Delete</a>'.
                            '</div>'.
                          '</div>'.
                        '</div>'.
                        '<h6 class="requirement-heading'.$request->id.'">'.$request->question.'</h6>'.
                      '</div>'.
                      '<div class="question-input-container d-none requiremet-question-'.$request->id.'" id="requirement'.$request->id.'">'.
                        '<div class="add-ques-header">'.
                          '<h6>'. __("home.add question").'</h6>'.
                          '<div class="answer-type">'.
                            '<span>'. __("home.answer type").'</span>'.
                            '<select name="response" id="response'.$request->id.'" class="select2">'.
                              '<option value="free text"'.$request->response .' == "free text" ? "selected="selected"" : "">'. __("home.free text").'</option>'.
                              '<option value="attachement"'.$request->response .' == "attachement" ? "selected="selected"" : "">'. __('home.Attachement').'</option>'.
                            '</select>'.
                          '</div>'.
                        '</div>'.
                        '<textarea name="question" class="form-control question-textarea"'.
                          'id="question'.$request->id.'" rows="3"'.
                          'placeholder="Request necessary details such as dimensions,'.
                          'brand guidelines, and more">'.$request->question.'</textarea>'.
                        '<div class="sub-box">'.
                          '<div class="form-check">'.
                            '<input type="checkbox"'.
                              'class="form-check-input"'.
                              'id="exampleCheck1"'.
                              'name="mandatory"'.
                              'value="1"'.$request->mandatory_status.' == "1" ? "checked" : ""/>'.
                            '<label class="form-check-label"'.
                              'for="exampleCheck1">'. __("home.Answer is mandatory").'</label>'.
                          '</div>'.
                          '<p class="max-char"><span>0</span>/450 max</p>'.
                        '</div>'.
                        '<div class="btn-container-box">'.
                          '<div class="btns">'.
                            '<button class="custom-btn btn-cancle cancel_button" data-id="'.$request->id.'">'. __("home.Cancel").'</button>'.
                            '<button class="custom-btn btn-add requirement_button" data-id="'.$request->id.'"  id="requirements-btn">'. __('home.add').'</button>'.
                          '</div>';
                        '</div>';
                      '</div>';
          return json_encode($req_data);
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
          return $update;
          // return redirect('profile');
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
        $getSingleData = Services::find($id);
        $mainCategories = Categories::where('parent_id', '0')->get();
        $subCategories = Categories::where('parent_id', '!=', '0')->get();
        $package1 = Packages::where('services_id',$id)->where('package_name','Basic')->first();
        $package2 = Packages::where('services_id',$id)->where('package_name','Standard')->first();
        $package3 = Packages::where('services_id',$id)->where('package_name','Premium')->first();
        $getSingleFaq = ServiceFaq::where('services_id',$id)->get();
        $getSingleReq = ServiceRequirement::where('services_id',$id)->get();
        return \View::make('frontend.edit-service' , compact('getSingleData','mainCategories','subCategories','package1','package2','package3','getSingleFaq','getSingleReq'));
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
      $user_id = auth()->user()->id;

      $service = Services::find($id);
      $type = $request->input('type');
      dd($request->all());
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
          $service_id = $id;
          $package_type = $request->input('package_type');

          $packages = $request->input('proposal_packages');
          foreach ($packages as $key => $package) {

            $packageBasic = [
              "services_id" => $service_id,
              "package_name" => $package['package_title'],
              "title" => $package['package_name'],
              "description" => $package['package_desc'],
              "delivery_time" => $package['delivery_time'],
              "price" => $package['package_price'],
              "revision" => $package['revision'],
              "no_of_pages" => $package['no_of_pages']
            ];
            // dd($package['package_id']);
            $insertPackage = Packages::where('services_id',$id)->where('id',$package['package_id'])->update($packageBasic);

          }

          $attributes = $request->input('package_attribute');
          if($attributes != ''){
            // dd($attributes);
            foreach ($attributes as $key => $attr) {
              $serviceAttr = [
                "services_id" => $service_id,
                "package_option_id" => $attr['package_option_id'],
                "value" => $attr['value']
              ];

              $insertOption = PackagesOptionService::where('services_id',$id)->update($serviceAttr);
            }
          }
          return $insertPackage;

        }elseif ($type == 3) {
          $service_id= $id;
          // $service->service_desc = $request->input('service_desc');
          $update = Services::where('id', $service_id)->update(['service_desc' => $request->input('service_desc')]);
          // dd($service_id);
          $faqData =[
            'services_id' => $service_id,
            'title' => $request->input('title'),
            'description' => $request->input('description')
          ];
          $inserFaq = ServiceFaq::create($faqData);
          $faqId = $inserFaq->id;
          // dd($faqId);
          $faq = ServiceFaq::where('id',$faqId)->first();

          $faq_data = '<div class="card"><div class="card-header" id="heading'.$faq->id.'">'.
            '<h5 class="mb-0">'.
              '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse'.$faq->id.'" aria-expanded="false" aria-controls="collapse'.$faq->id.'">'.$faq->title.'</button>'.
              '</h5>'.
            '</div>'.
            '<div id="collapse'.$faq->id.'" class="collapse" aria-labelledby="heading'.$faq->id.'" data-parent="#accordion">'.
              '<div class="card-body">'.
                '<div class="input-box-container">'.
                  '<div class="form-group">'.
                    '<input type="text" value="'.$faq->title.'" class="form-control" placeholder="Add a Question: i.e. Do you translate to English as well?" />'.
                  '</div>'.
                  '<div class="form-group">'.
                    '<textarea maxlength="300" class="form-control" rows="3" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">'.$faq->description.'</textarea>'.
                  '</div>'.

                  '<div class="btn-container-box">'.
                    '<div class="btns">'.
                      '<button class="custom-btn delete-btn">'.
                        '<i class="fa fa-times"></i> delete'.
                      '</button>'.
                    '</div>'.
                    '<div class="btns">'.
                      '<button class="custom-btn">cancle</button>'.
                      '<button class="custom-btn">save</button>'.
                    '</div>'.
                  '</div>'.
                '</div>'.
              '</div>'.
            '</div>'.
            '</div>';
          return json_encode($faq_data);

        }elseif ($type == 4) {
          $service_id= $id;
          // dd($service_id);
          $requirementsData = [
            'question' => $request->input('question'),
            'response' => $request->input('response'),
            'services_id' => $service_id
          ];
          $insertRequr = ServiceRequirement::create($requirementsData);

          $requestId = $insertRequr->id;
          // dd($faqId);
          $request = ServiceRequirement::where('id',$requestId)->first();

          $req_data =
            '<div class="question-list-item">'.
              '<div class="inner-text">'.
                '<p>'.$request->response.'</p>'.
                '<div class="dropdown">'.
                  '<a class="nav-link globe-icon" href="#" id="navbarDropdown'.$request->id.'" ="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                    '<i class="fa fa-ellipsis-h"></i></a>'.
                  '<div class="dropdown-menu" aria-labelledبواسطة="navbarDropdown'.$request->id.'">'.
                    '<a class="dropdown-item" href="#">Edit</a>'.
                    '<a class="dropdown-item" href="#">Delete</a>'.
                  '</div>'.
                '</div>'.
              '</div>'.
              '<h6>'.$request->question.'</h6>'.
            '</div>';
          return json_encode($req_data);
        }else{
          // dd($type);
          $data = [];
          $service_id= $id;
          $service_img1 = $request->file('service_img1');
          if($service_img1 != ''){
            $filename= $service_img1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img1->getClientOriginalExtension();
            $extension= $service_img1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img1->move($destinationpath, $imagename);
            $service->service_img1 = $imagename;
          }
          $service_img2 = $request->file('service_img2');
          if($service_img2 != ''){
            $filename= $service_img2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img2->getClientOriginalExtension();
            $extension= $service_img2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img2->move($destinationpath, $imagename);
            $service->service_img2 = $imagename;
          }
          $service_img3 = $request->file('service_img3');
          if($service_img3 != ''){
            $filename= $service_img3->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img3->getClientOriginalExtension();
            $extension= $service_img3->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img3->move($destinationpath, $imagename);
            $service->service_img3 = $imagename;
          }
          $service_video = $request->file('service_video');
          if($service_video != ''){
            $filename= $service_video->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_video->getClientOriginalExtension();
            $extension= $service_video->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_video->move($destinationpath, $imagename);
            $service->service_video = $imagename;
          }
          $service_pdf1 = $request->file('service_pdf1');
          if($service_pdf1 != ''){
            $filename= $service_pdf1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf1->getClientOriginalExtension();
            $extension= $service_pdf1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf1->move($destinationpath, $imagename);
            $service->service_pdf1 = $imagename;
          }
          $service_pdf2 = $request->file('service_pdf2');
          if($service_pdf2 != ''){
            $filename= $service_pdf2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf2->getClientOriginalExtension();
            $extension= $service_pdf2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf2->move($destinationpath, $imagename);
            $service->service_pdf2 = $imagename;
          }
          $service->save();
          // dd($service);
          // $update = Services::where('id', $service_id)->update($data);
          $request->session()->flash('u_session');
          return "1";
          // return redirect('profile');
        }
    }

    public function updateGallery(Request $request)
    {
      // dd($request->all());
      $service_id = $request->input('service_id');
      $service = Services::find($service_id);
      $data = [];
      $service_img1 = $request->file('service_img1');
      if($service_img1 != ''){
        $filename= $service_img1->getClientOriginalName();
        $extension= $service_img1->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_img1->move($destinationpath, $imagename);
        $service_img1_old = $service->service_img1;
        if($service_img1_old != ''){
          @unlink(public_path('/images/service_images/'.$service_img1_old));
        }
        $service->service_img1 = $imagename;
      }
      $service_img2 = $request->file('service_img2');
      if($service_img2 != ''){
        $filename= $service_img2->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$service_img2->getClientOriginalExtension();
        $extension= $service_img2->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_img2->move($destinationpath, $imagename);
        $service_img2_old = $service->service_img2;
        if($service_img2_old != ''){
          @unlink(public_path('/images/service_images/'.$service_img2_old));
        }
        $service->service_img2 = $imagename;
      }
      $service_img3 = $request->file('service_img3');
      if($service_img3 != ''){
        $filename= $service_img3->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$service_img3->getClientOriginalExtension();
        $extension= $service_img3->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_img3->move($destinationpath, $imagename);
        $service_img3_old = $service->service_img3;
        if($service_img3_old != ''){
          @unlink(public_path('/images/service_images/'.$service_img3_old));
        }
        $service->service_img3 = $imagename;
      }
      $service_video = $request->file('service_video');
      if($service_video != ''){
        $filename= $service_video->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$service_video->getClientOriginalExtension();
        $extension= $service_video->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_video->move($destinationpath, $imagename);
        $service_video_old = $service->service_video;
        if($service_video_old != ''){
          @unlink(public_path('/images/service_images/'.$service_video_old));
        }
        $service->service_video = $imagename;
      }
      $service_pdf1 = $request->file('service_pdf1');
      if($service_pdf1 != ''){
        $filename= $service_pdf1->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf1->getClientOriginalExtension();
        $extension= $service_pdf1->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_pdf1->move($destinationpath, $imagename);
        $service_pdf1_old = $service->service_pdf1;
        if($service_pdf1_old != ''){
          @unlink(public_path('/images/service_images/'.$service_pdf1_old));
        }
        $service->service_pdf1 = $imagename;
      }
      $service_pdf2 = $request->file('service_pdf2');
      if($service_pdf2 != ''){
        $filename= $service_pdf2->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf2->getClientOriginalExtension();
        $extension= $service_pdf2->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/service_images');
        $service_pdf2->move($destinationpath, $imagename);
        $service_pdf2_old = $service->service_pdf2;
        if($service_pdf2_old != ''){
          @unlink(public_path('/images/service_images/'.$service_pdf2_old));
        }
        $service->service_pdf2 = $imagename;
      }
      $service->save();
      $request->session()->flash('u_session');
      return "1";
    }



    public function createFaq(Request $request)
    {
      // dd($request->all());

      $service_id= $request->input('service_id');
      // $service->service_desc = $request->input('service_desc');
      $update = Services::where('id', $service_id)->update(['service_desc' => $request->input('service_desc')]);
      // dd($service_id);
      $faqData =[
        'services_id' => $service_id,
        'title' => $request->input('title'),
        'description' => $request->input('description')
      ];
      $inserFaq = ServiceFaq::create($faqData);
      $faqId = $inserFaq->id;
      // dd($faqId);
      $faq = ServiceFaq::where('id',$faqId)->first();

      $faq_data = '<div class="card"><div class="card-header" id="heading'.$faq->id.'">'.
        '<h5 class="mb-0">'.
          '<button class="btn btn-link collapsed" id="collapse-button'.$faq->id.'" data-toggle="collapse" data-target="#collapse'.$faq->id.'" aria-expanded="false" aria-controls="collapse'.$faq->id.'">'.
          '<span class="faq_heading'.$faq->id.'">'.$faq->title.'</span></button>'.
          '</h5>'.
        '</div>'.
        '<div id="collapse'.$faq->id.'" class="collapse" aria-labelledby="heading'.$faq->id.'" data-parent="#accordion">'.
          '<div class="card-body">'.
            '<div class="input-box-container">'.
              '<div class="form-group">'.
                '<input type="text" value="'.$faq->title.'" id="title-'.$faq->id.'" class="form-control" placeholder="Add a Question: i.e. Do you translate to English as well?" />'.
              '</div>'.
              '<div class="form-group">'.
                '<textarea maxlength="300" class="form-control" id="description-'.$faq->id.'" rows="3" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">'.$faq->description.'</textarea>'.
              '</div>'.

              '<div class="btn-container-box">'.
                '<div class="btns">'.
                  '<button onclick="deleteFaq('.$faq->id.')" class="custom-btn delete-btn">'.
                    '<i class="fa fa-times"></i> delete'.
                  '</button>'.
                '</div>'.
                '<div class="btns">'.
                  '<button class="custom-btn" data-toggle="collapse"
                    data-target="#collapse'.$faq->id.'" aria-expanded="false" aria-controls="collapse'.$faq->id.'">cancel</button>'.
                  '<button class="custom-btn faq_button" data-id="'.$faq->id.'">save</button>'.
                '</div>'.
              '</div>'.
            '</div>'.
          '</div>'.
        '</div>'.
        '</div>';
      return json_encode($faq_data);

    }

    public function deleteFaq(Request $request, $id)
    {
      $faq = ServiceFaq::find($id);
      $faq->delete();
      echo "delete";
    }

    public function updateFaq(Request $request)
    {
      // dd($request->all());
      $id = $request->input('id');
      $faq = ServiceFaq::find($id);
      $faq->title = $request->input('title');
      $faq->description = $request->input('description');
      $faq->update();
      return $faq;
    }

    public function createRequirement(Request $request)
    {
      // dd($request->all());
      $service_id = $request->input('service_id');
      $requirementsData = [
        'question' => $request->input('question'),
        'response' => $request->input('response'),
        'services_id' => $service_id
      ];
      $mandatory = $request->input('mandatory');
      if ($mandatory !=null) {
        $requirementsData['mandatory_status'] = $mandatory;
      }
      // dd($requirementsData);
      $insertRequr = ServiceRequirement::create($requirementsData);

      $requestId = $insertRequr->id;
      // dd($faqId);
      $request = ServiceRequirement::where('id',$requestId)->first();
      // dd($request);
      $req_data ='<div class="question-list-item requiremet-question-'.$request->id.'">'.
                    '<div class="inner-text">'.
                      '<p class="requirement-response'.$request->id.'">'.$request->response.'</p>'.
                      '<div class="dropdown">'.
                        '<a class="nav-link globe-icon" href="#"id="navbarDropdown"'.
                         'role="button" data-toggle="dropdown"aria-haspopup="true"'.
                          'aria-expanded="false">'.
                          '<i class="fa fa-ellipsis-h"></i></a>'.
                        '<div class="dropdown-menu"'.
                          'aria-labelledبواسطة="navbarDropdown">'.
                          '<a class="dropdown-item" href="javascript:void(0);" onclick="showRequirement('.$request->id.')">Edit</a>'.
                          '<a class="dropdown-item" href="javascript:void(0);" onclick="deleteRequirement('.$request->id.')">Delete</a>'.
                        '</div>'.
                      '</div>'.
                    '</div>'.
                    '<h6 class="requirement-heading'.$request->id.'">'.$request->question.'</h6>'.
                  '</div>'.
                  '<div class="question-input-container d-none requiremet-question-'.$request->id.'" id="requirement'.$request->id.'">'.
                    '<div class="add-ques-header">'.
                      '<h6>'. __("home.add question").'</h6>'.
                      '<div class="answer-type">'.
                        '<span>'. __("home.answer type").'</span>'.
                        '<select name="response" id="response'.$request->id.'" class="select2">'.
                          '<option value="free text"'.$request->response .' == "free text" ? "selected="selected"" : "">'. __("home.free text").'</option>'.
                          '<option value="attachement"'.$request->response .' == "attachement" ? "selected="selected"" : "">'. __('home.Attachement').'</option>'.
                        '</select>'.
                      '</div>'.
                    '</div>'.
                    '<textarea name="question" class="form-control question-textarea"'.
                      'id="question'.$request->id.'" rows="3"'.
                      'placeholder="Request necessary details such as dimensions,'.
                      'brand guidelines, and more">'.$request->question.'</textarea>'.
                    '<div class="sub-box">'.
                      '<div class="form-check">'.
                        '<input type="checkbox"'.
                          'class="form-check-input"'.
                          'id="exampleCheck1"'.
                          'name="mandatory"'.
                          'value="1"'.$request->mandatory_status.' == "1" ? "checked" : ""/>'.
                        '<label class="form-check-label"'.
                          'for="exampleCheck1">'. __("home.Answer is mandatory").'</label>'.
                      '</div>'.
                      '<p class="max-char"><span>0</span>/450 max</p>'.
                    '</div>'.
                    '<div class="btn-container-box">'.
                      '<div class="btns">'.
                        '<button class="custom-btn btn-cancle cancel_button" data-id="'.$request->id.'">'. __("home.Cancel").'</button>'.
                        '<button class="custom-btn btn-add requirement_button" data-id="'.$request->id.'"  id="requirements-btn">'. __('home.add').'</button>'.
                      '</div>';
                    '</div>';
                  '</div>';
      return json_encode($req_data);
    }

    public function updateRequirement(Request $request)
    {
      // dd($request->all());
      $id = $request->input('id');
      $mandatory = $request->input('mandatory');
      $requirement = ServiceRequirement::find($id);
      $requirement->response = $request->input('response');
      $requirement->question = $request->input('question');
      if ($mandatory !=null) {
        $requirement->mandatory_status = $mandatory;
      }
      $requirement->update();
      return $requirement;
    }

    public function deleteRequirement(Request $request, $id)
    {
      $requirement = ServiceRequirement::find($id);
      $requirement->delete();
      echo "delete";
    }


    public function update_service(Request $request, $id)
    {
      $user_id = auth()->user()->id;

      $service = Services::find($id);
      $type = $request->input('type');
      // dd($type);


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
          $service_id = $id;
          $package_type = $request->input('package_type');

          $packages = $request->input('proposal_packages');
          foreach ($packages as $key => $package) {

            $packageBasic = [
              "services_id" => $service_id,
              "package_name" => $package['package_title'],
              "title" => $package['package_name'],
              "description" => $package['package_desc'],
              "delivery_time" => $package['delivery_time'],
              "price" => $package['package_price'],
              "revision" => $package['revision'],
              "no_of_pages" => $package['no_of_pages']
            ];
            // dd($package['package_id']);
            $insertPackage = Packages::where('services_id',$id)->where('id',$package['package_id'])->update($packageBasic);

          }

          $attributes = $request->input('package_attribute');
          if($attributes != ''){
            // dd($attributes);
            foreach ($attributes as $key => $attr) {
              $serviceAttr = [
                "services_id" => $service_id,
                "package_option_id" => $attr['package_option_id'],
                "value" => $attr['value']
              ];

              $insertOption = PackagesOptionService::where('services_id',$id)->update($serviceAttr);
            }
          }
          return $insertPackage;

        }elseif ($type == 3) {
          $service_id= $id;
          // $service->service_desc = $request->input('service_desc');
          $update = Services::where('id', $service_id)->update(['service_desc' => $request->input('service_desc')]);
          // dd($service_id);
          $faqData =[
            'services_id' => $service_id,
            'title' => $request->input('title'),
            'description' => $request->input('description')
          ];
          $inserFaq = ServiceFaq::create($faqData);
          $faqId = $inserFaq->id;
          // dd($faqId);
          $faq = ServiceFaq::where('id',$faqId)->first();

          $faq_data = '<div class="card"><div class="card-header" id="heading'.$faq->id.'">'.
            '<h5 class="mb-0">'.
              '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse'.$faq->id.'" aria-expanded="false" aria-controls="collapse'.$faq->id.'">'.$faq->title.'</button>'.
              '</h5>'.
            '</div>'.
            '<div id="collapse'.$faq->id.'" class="collapse" aria-labelledby="heading'.$faq->id.'" data-parent="#accordion">'.
              '<div class="card-body">'.
                '<div class="input-box-container">'.
                  '<div class="form-group">'.
                    '<input type="text" value="'.$faq->title.'" class="form-control" placeholder="Add a Question: i.e. Do you translate to English as well?" />'.
                  '</div>'.
                  '<div class="form-group">'.
                    '<textarea maxlength="300" class="form-control" rows="3" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">'.$faq->description.'</textarea>'.
                  '</div>'.

                  '<div class="btn-container-box">'.
                    '<div class="btns">'.
                      '<button class="custom-btn delete-btn">'.
                        '<i class="fa fa-times"></i> delete'.
                      '</button>'.
                    '</div>'.
                    '<div class="btns">'.
                      '<button class="custom-btn">cancle</button>'.
                      '<button class="custom-btn">save</button>'.
                    '</div>'.
                  '</div>'.
                '</div>'.
              '</div>'.
            '</div>'.
            '</div>';
          return json_encode($faq_data);

        }elseif ($type == 4) {
          $service_id= $id;
          // dd($service_id);
          $requirementsData = [
            'question' => $request->input('question'),
            'response' => $request->input('response'),
            'services_id' => $service_id
          ];
          $mandatory = $request->input('mandatory');
          if ($mandatory !=null) {
            $requirementsData['mandatory_status'] = $mandatory;
          }
          $insertRequr = ServiceRequirement::create($requirementsData);

          $requestId = $insertRequr->id;
          // dd($faqId);
          $request = ServiceRequirement::where('id',$requestId)->first();

          $req_data =
            '<div class="question-list-item">'.
              '<div class="inner-text">'.
                '<p>'.$request->response.'</p>'.
                '<div class="dropdown">'.
                  '<a class="nav-link globe-icon" href="#" id="navbarDropdown'.$request->id.'" ="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                    '<i class="fa fa-ellipsis-h"></i></a>'.
                  '<div class="dropdown-menu" aria-labelledبواسطة="navbarDropdown'.$request->id.'">'.
                    '<a class="dropdown-item" href="#">Edit</a>'.
                    '<a class="dropdown-item" href="#">Delete</a>'.
                  '</div>'.
                '</div>'.
              '</div>'.
              '<h6>'.$request->question.'</h6>'.
            '</div>';
          return json_encode($req_data);
        }else{
          dd($type);
          $data = [];
          $service_id= $id;
          $service_img1 = $request->file('service_img1');
          if($service_img1 != ''){
            $filename= $service_img1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img1->getClientOriginalExtension();
            $extension= $service_img1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img1->move($destinationpath, $imagename);
            $service->service_img1 = $imagename;
          }
          $service_img2 = $request->file('service_img2');
          if($service_img2 != ''){
            $filename= $service_img2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img2->getClientOriginalExtension();
            $extension= $service_img2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img2->move($destinationpath, $imagename);
            $service->service_img2 = $imagename;
          }
          $service_img3 = $request->file('service_img3');
          if($service_img3 != ''){
            $filename= $service_img3->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_img3->getClientOriginalExtension();
            $extension= $service_img3->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_img3->move($destinationpath, $imagename);
            $service->service_img3 = $imagename;
          }
          $service_video = $request->file('service_video');
          if($service_video != ''){
            $filename= $service_video->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_video->getClientOriginalExtension();
            $extension= $service_video->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_video->move($destinationpath, $imagename);
            $service->service_video = $imagename;
          }
          $service_pdf1 = $request->file('service_pdf1');
          if($service_pdf1 != ''){
            $filename= $service_pdf1->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf1->getClientOriginalExtension();
            $extension= $service_pdf1->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf1->move($destinationpath, $imagename);
            $service->service_pdf1 = $imagename;
          }
          $service_pdf2 = $request->file('service_pdf2');
          if($service_pdf2 != ''){
            $filename= $service_pdf2->getClientOriginalName();
            // $imagename= 'message-'.rand(000000,999999).'.'.$service_pdf2->getClientOriginalExtension();
            $extension= $service_pdf2->getClientOriginalExtension();
            $imagename= $filename;
            $destinationpath= public_path('images/service_images');
            $service_pdf2->move($destinationpath, $imagename);
            $service->service_pdf2 = $imagename;
          }
          $service->save();
          // dd($service);
          // $update = Services::where('id', $service_id)->update($data);
          $request->session()->flash('u_session');
          return "1";
          // return redirect('profile');
        }
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
