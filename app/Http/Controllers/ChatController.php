<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\ChatFriends;
use App\Models\ChatMessages;
use App\Models\User;
use DB;

class ChatController extends Controller
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

    public function addfriend(Request $request)
    {
      $sender_id = $request->input('sender_id');
      $receiver_id = $request->input('receiver_id');
      $check_friend = ChatFriends::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->first();
      if ($check_friend != null) {
        $conversation_id = $check_friend->conversation_id;
      }else {
      $friendData['conversation_id'] = rand();
      $friendData['sender_id'] = $request->input('sender_id');
      $friendData['receiver_id'] = $request->input('receiver_id');
      $friendData['message_id'] = '0';
      $friendData['time'] = carbon::now();
      $friend = ChatFriends::create($friendData);
      $conversation_id = $friend->conversation_id;
      }

      return $conversation_id;
    }

    public function friendsList(Request $request, $id){
      $getfriends = ChatFriends::with('senderInfo','receiverInfo')->orWhere('sender_id',$id)
      ->orWhere('receiver_id',$id)->orderBy('id', 'DESC')->get();
      return $getfriends;
    }

    public function messages(Request $request)
    {
      $user = auth()->user();
      return view('frontend.messages', compact('user'));
    }

    public function singleChat(Request $request){

      $receiver_id = $request->input('receiver_id');
      $sender_id = $request->input('sender_id');

      $getsingleChat = ChatMessages::with('senderInfo','receiverInfo')
      ->orWhere(function($q) use ($sender_id, $receiver_id){
         $q->where('message_sender', $sender_id)
           ->where('message_receiver', $receiver_id);
    })->orWhere(function($h) use ($sender_id, $receiver_id){
         $h->where('message_sender', $receiver_id)
           ->where('message_receiver', $sender_id);
    })->get();
      // dd($getsingleChat);
      return $getsingleChat;

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
