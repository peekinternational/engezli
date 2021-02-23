@foreach($getfriends as $frnd)
<a class="dropdown-item" href="#">
  <div class="contacts-list-item">
    @if($frnd->sender_id == $user_id)
    <div class="avatar">
      @if($frnd->receiverInfo->profile_image)
      <img src="{{asset('images/user_images/'.$frnd->receiverInfo->profile_image)}}" alt="" />
      @else
      <img src="{{asset('images/s1.png')}}" alt="" />
      @endif
    </div>
    <div class="text">
      <h4>{{$frnd->receiverInfo->first_name}} {{$frnd->receiverInfo->last_name}} <span class="time notificationTime-{{$frnd->conversation_id}}">{{$frnd->lastMessage->message_date}}</span></h4>
      <p class="notificationMessage-{{$frnd->conversation_id}}">{{$frnd->lastMessage->message_desc}}</p>
    </div>
    @else
    <div class="avatar">
      @if($frnd->senderInfo->profile_image)
      <img src="{{asset('images/user_images/'.$frnd->senderInfo->profile_image)}}" alt="" />
      @else
      <img src="{{asset('images/s1.png')}}" alt="" />
      @endif
    </div>
    <div class="text">
      <h4>{{$frnd->senderInfo->first_name}} {{$frnd->senderInfo->last_name}} <span class="time notificationTime-{{$frnd->conversation_id}}">{{$frnd->lastMessage->message_date}}</span></h4>
      <p class="notificationMessage-{{$frnd->conversation_id}}">{{$frnd->lastMessage->message_desc}}</p>
    </div>
    @endif
  </div>
</a>
@endforeach
