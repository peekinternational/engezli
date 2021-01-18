<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SocialFacebookAccount;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;
use GuzzleHttp\Client;
use Hash;
use Str;

class SocialAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function FacebookProviderCallback()
     {
        // $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        $user = Socialite::driver('facebook')->user();
        // dd($user);
        $checkExist = User::where('email', $user->email)->first();
        if ($checkExist) {
          if(!$checkExist->facebook_id){
            $checkExist->facebook_id = $user->id;
            $checkExist->save();
          }
          Auth::login($checkExist);
          $user = Auth::user();
          $id = $user->id;
          return redirect()->route('profile');
        }else {
          $newuser = new User;
          $newuser->email = $user->email;
          $newuser->first_name = $user->name;
          $username = $user->name;
          $username = str_replace(' ', '', $username);
          $username = strtolower($username);
          $newuser->username = $user->email;
          $newuser->facebook_id = $user->id;
          $newuser->user_status = 'online';
          $user->verification = '1';
          $newuser->profile_image = $user->avatar_original;
          $newuser->password = Hash::make(Str::random(10));
          $newuser->save();
          Auth::login($newuser);
          return redirect()->route('profile');
       }
       // auth()->login($user);
       // return redirect()->to('/user/about');
     }

    public function redirectToInstagramProvider()
    {
      $appId = config('services.instagram.client_id');
      $redirectUri = urlencode(config('services.instagram.redirect'));
      return redirect()->to("https://api.instagram.com/oauth/authorize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code");
    }

    public function instagramProviderCallback(Request $request)
    {
      $code = $request->code;
      if (empty($code)) return redirect()->route('home')->with('error', 'Failed to login with Instagram.');

      $appId = config('services.instagram.client_id');
      $secret = config('services.instagram.client_secret');
      $redirectUri = config('services.instagram.redirect');

      $client = new Client();

      // Get access token
      $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
        'form_params' => [
          'app_id' => $appId,
          'app_secret' => $secret,
          'grant_type' => 'authorization_code',
          'redirect_uri' => $redirectUri,
          'code' => $code,
        ]
      ]);

      if ($response->getStatusCode() != 200) {
        return redirect()->route('home')->with('error', 'Unauthorized login to Instagram.');
      }

      $content = $response->getBody()->getContents();
      $content = json_decode($content);

      $accessToken = $content->access_token;
      $userId = $content->user_id;

      // Get user info
      $response = $client->request('GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}");

      $content = $response->getBody()->getContents();
      $oAuth = json_decode($content);

      // Get instagram user name
      $username = $oAuth->username;
      // dd($oAuth);
      $user = $oAuth;
      dd($user);
      // $checkExist = User::where('username', $user->username)->first();
      // if ($checkExist) {
      //     if(!$checkExist->instagram_id){
      //         $checkExist->instagram_id = $user->id;
      //         $checkExist->save();
      //     }
      //     Auth::login($checkExist);
      //     $user = Auth::user();
      //     $id = $user->id;
      //     return redirect()->route('profile');
      // } else {
      //     $newuser = new User;
      //     $newuser->email = $user->email;
      //     $newuser->firstname = $user->name;
      //     $username = $user->name;
      //     $username = str_replace(' ', '', $username);
      //     $username = strtolower($username);
      //     $newuser->username = $username;
      //     $newuser->fb_id = $user->id;
      //     $newuser->avatar = $user->avatar_original;
      //     $newuser->password = Hash::make(Str::random(10));
      //     $newuser->save();
      //     Auth::login($newuser);
      //     return redirect()->route('profile');
      // }
      // do your code here
    }

    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    // public function FacebookProviderCallback(SocialFacebookAccountService $service)
    public function TwitterProviderCallback()
    {
      $user = Socialite::driver('twitter')->user();
      // dd($user);
      $checkExist = User::where('email', $user->email)->first();
      if ($checkExist) {
        if(!$checkExist->twitter_id){
            $checkExist->twitter_id = $user->id;
            $checkExist->save();
        }
        Auth::login($checkExist);
        $user = Auth::user();
        $id = $user->id;
        return redirect()->route('profile');
      } else {
        $newuser = new User;
        $newuser->email = $user->email;
        $newuser->firstname = $user->name;
        $username = $user->name;
        $username = str_replace(' ', '', $username);
        $username = strtolower($username);
        $newuser->username = $username;
        $newuser->fb_id = $user->id;
        $newuser->avatar = $user->avatar_original;
        $newuser->password = Hash::make(Str::random(10));
        $newuser->save();
        Auth::login($newuser);
        return redirect()->route('profile');
      }
      auth()->login($user);
      return redirect()->to('/login');
    }


    // Google Login
    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
    }

    public function GoogleProviderCallback()
    {
      try {
        $user = Socialite::driver('google')->user();
     
        $finduser = User::where('google_id', $user->id)->first();
        // dd($user);
        if($finduser){
   
          Auth::login($finduser);
  
          return redirect()->route('profile');
   
        }else{
          $username = $user->name;
          $username = str_replace(' ', '', $username);
          $username = strtolower($username);
          $newUser = User::create([
              'first_name' => $user->name,
              'last_name' => $user->nickname,
              'email' => $user->email,
              'username' => $username,
              'profile_image' => $user->avatar_original,
              'google_id'=> $user->id,
              'password' => Hash::make(Str::random(10)),
              'user_status' => 'online',
              'verification' => '1',
          ]);

          Auth::login($newUser);

          return redirect()->intended('profile');
        }
    
      } catch (Exception $e) {
          dd($e->getMessage());
      }
    }
}
