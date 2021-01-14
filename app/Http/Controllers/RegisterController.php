<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;
use Mail;
use Redirect;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
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

    public function register(Request $request){
      if($request->isMethod('post')){
        $get_user = User::whereusername($request->input('username'))->first();
        if ($get_user !='') {
          $request->session()->flash('loginAlert',"Username Already Taken");
          return redirect('/login');
        }
        // dd($request->all());
        $this->validate($request,[
          'first_name' => 'required|min:1|max:50',
          'last_name' => 'required|min:2|max:32',
          'mobile_number' => 'required|min:2|max:32',
          'email' => 'required|email|unique:users,email',
          'username' => 'required|unique:users,username',
          'password' => 'required|min:5|max:50',
          'account_type' => 'required'

        ],[

          'first_name.required' =>'Enter First Name',
          'email.unique' => 'Email must be unique',
          'email.required' => 'Enter Email',
          'last_name.required' => 'Enter Last Name',
          'mobile_number.required' => 'Enter Mobile Number',
          'address.required' => 'Enter Address',
          'password.required' => 'Enter password',
          'account_type.required' => 'Choose Account type',
        ]);

        // save User
        $user = new User;
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->mobile_number = $request->input('mobile_number');
        $user->account_type = $request->input('account_type');
        $user->remember_token = $request->input('_token');
        $user->password = Hash::make(trim($request->input('password')));
        $user->verification = '0';
        $user->user_status = 'online';
        // $slug = $this->createSlug($request->input('username'));
        // $user->slug = $slug;
        $user->save();
        $user->id;
        $new_user = User::find($user->id);
        // dd($new_user);
        $toemail =  $new_user->email;
        // dd($toemail);
        // Mail::send('mail.user_registration_email',['user' =>$new_user],
        // function ($message) use ($toemail)
        // {

        //   $message->subject('Paidpro - Verify Account');
        //   $message->from('peek.zeeshan@gmail.com', 'Engezli');
        //   $message->to($toemail);
        // });


        $request->session()->flash('registerSuccess',"Account created. Please check your email.");

        return redirect('login');
      }
      return view('frontend.register');
    }
}
