<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\User;
use App\Models\Services;
use App\Models\Language;
use App\Models\Skills;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Facade\Engezli;
use Hash;
use Session;
use Mail;
use Redirect;
use App;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id; 
        $user = User::where('id', $user_id)->first();
        $userServices = Services::where('seller_id', $user_id)->with('sellerInfo','packageInfo')->paginate(16);
        $userExp = UserExperience::where('user_id',$user_id)->first();
        $userEdu = UserEducation::where('user_id',$user_id)->first();
        $serviceCount = $userServices->count();

        return \View::make('frontend.profile')->with(compact('user','userServices','serviceCount','userExp','userEdu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show($username)
    {
        $user = User::whereusername($username)->first();
        $userServices = Services::where('seller_id', $user->id)->with('sellerInfo','packageInfo')->paginate(16);
        $userExp = UserExperience::where('user_id',$user->id)->first();
        $userEdu = UserEducation::where('user_id',$user->id)->first();
        $serviceCount = $userServices->count();
        // dd($userServices);
        return \View::make('frontend.user')->with(compact('user','userServices','userEdu','userExp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
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

    public function edit_profile(Request $request){
        $user_id = auth()->user()->id; 
        $userData = User::where('id', $user_id)->first();
        $languages = Language::get();
        $skills = Skills::get();
        $userEduData = UserEducation::where('user_id',$user_id)->first();
        $userExpData = UserExperience::where('user_id',$user_id)->first();
        return view('frontend.setting', compact('userData','languages','skills','userEduData','userExpData'));
    }

    public function edit_profile_info(Request $request){
      $user_id = auth()->user()->id;
      $this->validate($request,[
        'first_name' => 'required|min:1|max:50',
        'last_name' => 'required|min:2|max:32',
        'mobile_number' => 'required',
        'gender' => 'required',
        'birth_date' => 'required',
        'country' => 'required',
        'website' => 'required',
        'country' => 'required',
        'organization' => 'required',
        'occuption' => 'required',
        'language_id' => 'required',
        'skills_id' => 'required',

      ],[

        'first_name.required' =>'Enter First Name',
        'last_name.required' => 'Enter Last Name',
        'mobile_number.required' => 'Enter Mobile Number',
        'gender.required' => 'Please select gender',
        'birth_date.required' => 'Please select birth date',
        'country.required' => 'Please choose country',
        'website.required' => 'Enter website',
        'organization.required' => 'Enter organization',
        'occuption.required' => 'Enter occuption',
        'language_id.required' => 'Please select language',
        'skills_id.required' => 'Please select skills',
      ]);

      $languageData = $request->input('language_id');
      $user_language = json_encode($languageData);
      $skillData = $request->input('skills_id');
      $user_skills = json_encode($skillData);

      
      // save User
      $user = User::find($user_id);
      $user->username = $request->input('username');
      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->email = $request->input('email');
      $user->mobile_number = $request->input('mobile_number');
      $user->gender = $request->input('gender');
      $user->birth_date = $request->input('birth_date');
      $user->country = $request->input('country');
      $user->website = $request->input('website');
      $user->organization = $request->input('organization');
      $user->occuption = $request->input('occuption');
      $user->bio = $request->input('bio');
      $profile_image = $request->file('profile_image');
      if($profile_image != ''){
        $filename= $profile_image->getClientOriginalName();
        // $imagename= 'message-'.rand(000000,999999).'.'.$profile_image->getClientOriginalExtension();
        $extension= $profile_image->getClientOriginalExtension();
        $imagename= $filename;
        $destinationpath= public_path('images/user_images');
        $profile_image->move($destinationpath, $imagename);
        $user->profile_image = $imagename;
      }
      // dd($user->profile_image);
      $user->language_id = $user_language;
      $user->skills_id = $user_skills;
      
      
      $user->save();
      $userEdu = UserEducation::whereuser_id($user_id)->first();
      
      if($userEdu == ''){
        $educationdata = [
          "user_id" => $user_id,
          "country" => $request->input('country'),
          "major" => $request->input('degree'),
          "institute" => $request->input('institute'),
          "degree_year" => $request->input('degree_year'),
        ];
        $insertEdu = UserEducation::create($educationdata);
      }else{
        $educationdata = [
          "country" => $request->input('country'),
          "major" => $request->input('degree'),
          "institute" => $request->input('institute'),
          "degree_year" => $request->input('degree_year'),
        ];
        $update = UserEducation::where('user_id',$user_id)->update($educationdata);
      }
      $userExp = UserExperience::whereuser_id($user_id)->first();
      
      if($userExp == ''){
        $experiencedata = [
          "user_id" => $user_id,
          "from_date" => $request->input('from_date'),
          "to_date" => $request->input('to_date'),
          "company" => $request->input('company'),
          "position" => $request->input('position'),
        ];
        $insertExp = UserExperience::create($experiencedata);
        return back()->with('success', 'Profile updated successfully.');
      }else{
        $experiencedata = [
          "from_date" => $request->input('from_date'),
          "to_date" => $request->input('to_date'),
          "company" => $request->input('company'),
          "position" => $request->input('position'),
        ];
        $updateExp = UserExperience::where('user_id',$user_id)->update($experiencedata);
        return back()->with('success', 'Profile updated successfully.');
      }
      
        
    }
}
