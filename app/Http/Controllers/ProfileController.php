<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\BillingInformation;
use App\Models\Categories;
use App\Models\NotificationSetting;
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
        $user = User::with('userReviews')->where('id', $user_id)->first();
        $userServices = Services::with('serviceRating')->where('seller_id', $user_id)->with('sellerInfo','packageInfo')->paginate(16);
        $userExp = UserExperience::where('user_id',$user_id)->first();
        $userEdu = UserEducation::where('user_id',$user_id)->first();
        $serviceCount = $userServices->count();
        // dd($user);
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
        $userBillingData = BillingInformation::where('user_id',$user_id)->first();
        return view('frontend.setting', compact('userData','languages','skills','userEduData','userExpData','userBillingData'));
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

    public function ChangePassword(Request $request)
    {
      $this->validate($request,[
        'old_password' => 'required',
        'new_password' => 'required|min:2|max:32|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'required|min:2|max:32',

      ],[

        'old_password.required' =>'Enter Old Password',
        'new_password' => 'Enter New Password',
        'confirm_password.required' => 'Enter Confirm Password',
      ]);
      $getUser = auth()->user();
      $old_password = $request->input('old_password');
      $new_password = $request->input('new_password');
      $check_password = Hash::check($old_password, $getUser->password);
      // dd($check_password);
      if ($check_password == true) {
        $user = User::findorfail($getUser->id);
        $user->password = Hash::make(trim($new_password));
        $user->update();
        return redirect('/settings?password')->with('password_success', 'Password updated successfully.');
      }else {
        // dd('false');
        return redirect('/settings?password')->with('password_danger', 'Old password is incorrect');
      }
    }

    public function SaveBilling(Request $request)
    {
      // dd($request->all());
      $id = $request->input('billing_id');
      $user_id = auth()->user()->id;
      if ($id != null) {
        $billing = BillingInformation::findorfail($id);
        $billing->user_id = $user_id;
        $billing->name = $request->input('name');
        $billing->company_name = $request->input('company_name');
        $billing->country = $request->input('country');
        $billing->state = $request->input('state');
        $billing->city = $request->input('city');
        $billing->address = $request->input('address');
        $billing->post_code = $request->input('post_code');
        $billing->vat_number = $request->input('vat_number');
        $status =  $request->input('status');
        if ($status !='') {
          $billing->status = $request->input('status');
        }else {
          $billing->status = '0';
        }
        $billing->update();
      }else {
        $billing = new BillingInformation;
        $billing->user_id = $user_id;
        $billing->name = $request->input('name');
        $billing->company_name = $request->input('company_name');
        $billing->country = $request->input('country');
        $billing->state = $request->input('state');
        $billing->city = $request->input('city');
        $billing->address = $request->input('address');
        $billing->post_code = $request->input('post_code');
        $billing->vat_number = $request->input('vat_number');
        $status =  $request->input('status');
        if ($status !='') {
          $billing->status = $request->input('status');
        }else {
          $billing->status = '0';
        }
        $billing->save();
      }
      return redirect('/settings?billing')->with('billing_success', 'Billing Information updated successfully.');
    }

    public function SaveNotificationSetting(Request $request)
    {
      // dd($request->all());
      $email_inbox_message = $request->input('email_inbox_message');
      $mobile_inbox_message = $request->input('mobile_inbox_message');
      $inbox_data['type'] = $request->input('type_inbox_message');
      $inbox_data['user_id'] = auth()->user()->id;
      if ($email_inbox_message != null) {
        $inbox_data['email'] = $request->input('email_inbox_message');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_inbox_message != null) {
        $inbox_data['mobile'] = $request->input('mobile_inbox_message');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_inbox_message'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_inbox_message'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_order_message = $request->input('email_order_message');
      $mobile_order_message = $request->input('mobile_order_message');
      $inbox_data['type'] = $request->input('type_order_message');
      if ($email_order_message != null) {
        $inbox_data['email'] = $request->input('email_order_message');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_order_message != null) {
        $inbox_data['mobile'] = $request->input('mobile_order_message');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_order_message'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_order_message'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_order_updates = $request->input('email_order_updates');
      $mobile_order_updates = $request->input('mobile_order_updates');
      $inbox_data['type'] = $request->input('type_order_updates');
      if ($email_order_updates != null) {
        $inbox_data['email'] = $request->input('email_order_updates');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_order_updates != null) {
        $inbox_data['mobile'] = $request->input('mobile_order_updates');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_order_updates'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_order_updates'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_buyer_request = $request->input('email_buyer_request');
      $mobile_buyer_request = $request->input('mobile_buyer_request');
      $inbox_data['type'] = $request->input('type_buyer_request');
      if ($email_buyer_request != null) {
        $inbox_data['email'] = $request->input('email_buyer_request');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_buyer_request != null) {
        $inbox_data['mobile'] = $request->input('mobile_buyer_request');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_buyer_request'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_buyer_request'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_my_gigs = $request->input('email_my_gigs');
      $mobile_my_gigs = $request->input('mobile_my_gigs');
      $inbox_data['type'] = $request->input('type_my_gigs');
      if ($email_my_gigs != null) {
        $inbox_data['email'] = $request->input('email_my_gigs');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_my_gigs != null) {
        $inbox_data['mobile'] = $request->input('mobile_my_gigs');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_my_gigs'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_my_gigs'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_my_account = $request->input('email_my_account');
      $mobile_my_account = $request->input('mobile_my_account');
      $inbox_data['type'] = $request->input('type_my_account');
      if ($email_my_account != null) {
        $inbox_data['email'] = $request->input('email_my_account');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_my_account != null) {
        $inbox_data['mobile'] = $request->input('mobile_my_account');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_my_account'))->first();
      if ($check_message_data != null) {
         NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_my_account'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }

      $email_to_dos = $request->input('email_to_dos');
      $mobile_to_dos = $request->input('mobile_to_dos');
      $inbox_data['type'] = $request->input('type_to_dos');
      if ($email_to_dos != null) {
        $inbox_data['email'] = $request->input('email_to_dos');
      }else {
        $inbox_data['email'] = '0';
      }
      if ($mobile_to_dos != null) {
        $inbox_data['mobile'] = $request->input('mobile_to_dos');
      }else {
        $inbox_data['mobile'] = '0';
      }

      $check_message_data = NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_to_dos'))->first();
      if ($check_message_data != null) {
        NotificationSetting::where('user_id',auth()->user()->id)->where('type',$request->input('type_to_dos'))->update($inbox_data);
      }else {
        NotificationSetting::create($inbox_data);
      }
      $notification = $request->input('notification');
      $sound = $request->input('sound');
      if ($notification != null) {
        $user_data['notification'] = $notification;
      }else {
        $user_data['notification'] = '0';
      }
      if ($sound != null) {
        $user_data['sound'] = $sound;
      }else {
        $user_data['sound'] = '0';
      }
      $update = User::whereid(auth()->user()->id)->update($user_data);

      return redirect('/settings?notification')->with('notification_success', 'Notification updated successfully.');
    }
}
