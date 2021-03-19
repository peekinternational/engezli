@extends('frontend.layouts.app')
@section('title', 'Profile  ')
@section('styling')
@endsection
@section('content')
<div class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 left">
        <div class="profile_info">
          <div class="seller-card">
            <div>
              @if($user->user_status == 'online')
              <div
                class="user-online-indicator is-online"
                data-user-id="{{$user->id}}"
              >
                <i class="fa fa-circle"></i>{{ __('home.online')}}
              </div>
              @else
              <div
                class="user-online-indicator is-online border-danger text-danger"
                data-user-id="{{$user->id}}"
              >
                <i class="fa fa-circle"></i>{{ __('home.offline')}}
              </div>
              @endif
            </div>

            <div class="user-profile-info">
              <div>
                <div class="user-profile-image">
                  <label class="user-pict">
                    @if($user->facebook_id != Null || $user->google_id != Null)
                    <img class="img-fluid" src="{{Auth::user()->profile_image}}">
                    @elseif($user->profile_image != Null)
                    <img class="img-fluid" src="{{asset('images/user_images/'.$user->profile_image)}}">
                    @else
                    <img
                      src="{{asset('images/s1.png')}}"
                      class="img-fluid user-pict-img"
                      alt="Engezly" />
                    @endif
                    <a
                      href="#"
                      class="user-badge-round user-badge-round-med locale-en-us top-rated-seller"
                    ></a
                  ></label>
                </div>
              </div>
              <div class="user-profile-label">
                <div class="username-line">
                  <a href="#" class="seller-link">{{$user->first_name}} {{$user->last_name}}</a>
                </div>
                <div class="oneliner-wrapper">
                  <small class="oneliner">{{$user->occuption}}</small>
                  <div class="ratings-wrapper">
                    <p class="rating-text">
                      <strong>{{number_format($user->userReviews->avg('overall_rating'),'1','.','')}}</strong> ({{count($user->userReviews)}} reviews)
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="buttons-wrapper">
              <a
                href="javascript:void(0);"
                onclick="addFriend({{$user->id}})"
                class="btn-lrg-standard btn-contact-me js-contact-me js-open-popup-join"
                >{{ __('home.Contact Me')}}</a
              >
              <div class="btn-lrg-standard btn-white btn-custom-order">
                {{ __('home.Get a Quote')}}
              </div>
            </div> -->
            <div class="user-stats-desc">
              <ul class="user-stats">
                <li class="location">{{ __('home.From')}}<strong>{{$user->country}}</strong></li>
                <li class="member-since">
                  {{ __('home.Member since')}}<strong><?php echo date('F Y', strtotime($user->member_since)); ?></strong>
                </li>
                <li class="response-time">
                  {{ __('home.Avg. Response Time')}}<strong>2 hours</strong>
                </li>
                <li class="recent-delivery">
                  {{ __('home.Avg. Recent Delivery')}}<strong>about&nbsp;15</strong>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="seller-profile">
          <div class="description">
            <h3>{{ __('home.Description')}}</h3>
            <p>{{$user->bio }}</p>
          </div>
          <div class="languages">
            <h3>{{ __('home.Languages')}}</h3>
            <ul>
              <?php $langData = json_decode($user->language_id);?>
              @if($langData != '')
                @foreach($langData as $userLang)
                <li>{{Engezli::get_language($userLang)->language_title}}</li>
                @endforeach
                @endif
            </ul>
          </div>
          <div class="linked-accounts">
            <h3>{{ __('home.Linked Accounts')}}</h3>
            <ul>
              <li class="platform social-account facebook">
                <i
                  class="platform-icon facebook hint--top"
                  aria-hidden="true"
                  data-hint="facebook"
                ></i
                ><span class="text">facebook</span>
              </li>
              <li class="platform social-account google">
                <i
                  class="platform-icon google hint--top"
                  aria-hidden="true"
                  data-hint="google"
                ></i
                ><span class="text">google</span>
              </li>
            </ul>
          </div>
          <div class="skills">
            <h3>{{ __('home.Skills')}}</h3>
            <?php $skil = json_decode($user->skills_id);?>
            <ul>
              @if($skil != '')
              @foreach($skil as $userSkil)
              <li class=""><a href="#">{{Engezli::get_skill($userSkil)->skill_title}}</a></li>
              @endforeach
              @endif
            </ul>
          </div>
          <div class="education-list list">
            <h3>{{ __('home.Education')}}</h3>
            <ul>
              <li>
                @if($userEdu != '')
                <p>{{$userEdu->major}}</p>
                <p>
                  {{$userEdu->institute}}, {{$userEdu->country}}, Graduated {{$userEdu->degree_year}}
                </p>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8 right">
        <h2>{{$user->first_name}} {{$user->last_name}} Gigs</h2>
        <div class="recommended">
          <div class="row">
            @foreach($userServices as $service)
            <div class="col-md-4 mb-4 col-box">
             <a class="edit_project" href="{{url('create-service/'.$service->id.'/edit')}}"><i class="fa fa-edit"></i></a>
              <div class="card">
                <span class="gig-image">
                  @if($service->service_img1 != '')
                  <img
                    alt=""
                    class="card-img-top"
                    src="{{asset('images/service_images/'.$service->service_img1)}}"
                  />
                  @else
                  <img
                    alt=""
                    class="card-img-top"
                    src="{{asset('images/default_image.jpg')}}"
                  />
                  @endif
                </span>
                <div class="card-body seller-info">
                  <div class="seller-image">
                    @if($service->sellerInfo->facebook_id != null || $service->sellerInfo->google_id != null)
                    <img alt="" class="" src="{{$service->sellerInfo->profile_image}}" />
                    @elseif($service->sellerInfo->profile_image != '')
                    <img alt="" class="" src="{{asset('images/user_images/'.$service->sellerInfo->profile_image)}}" />
                    @else
                    <img src="{{asset('images/avatar (1).svg')}}">
                    @endif
                  </div>

                  <div class="seller-name">
                    <a href="{{url('profile/'.$service->sellerInfo->username)}}">{{$service->sellerInfo->first_name}} {{$service->sellerInfo->last_name}}</a>
                    <p class="level">{{ __('home.Level')}} 1 {{ __('home.Seller')}}</p>
                  </div>
                  <a href="{{url('/'.$service->sellerInfo->username.'/'.$service->service_url)}}" class="gig-title">
                    {{$service->service_title}}
                  </a>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <i class="fa fa-star"></i>
                        {{number_format($service->serviceRating->avg('overall_rating'),'1','.','')}}
                        <span>({{count($service->serviceRating)}})</span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  @if(auth()->user())
                  @if($service->seller_id == auth()->user()->id)
                  <i aria-hidden="true" class="fa @if(count($service->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$service->id}}" title="You can favorite your own service"></i>
                  @else
                  <i aria-hidden="true" class="fa @if(count($service->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$service->id}}" onclick="makeFavorite({{$service->id}})" style="cursor: pointer;"></i>
                  @endif
                  @else
                  <i aria-hidden="true" class="fa @if(count($service->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$service->id}}" onclick="makeFavorite({{$service->id}})" style="cursor: pointer;"></i>
                  @endif
                  <div class="price">
                    <a href="#">
                      {{ __('home.Starting At')}}
                      @foreach($service->packageInfo as $key => $packg)
                      @if($key == 0)
                        <span>${{$packg->price}} </span>
                      @endif
                      @endforeach
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="review-section">
          <div
            class="review-header d-flex align-items-center justify-content-between mb-4"
          >
            <h4 class="m-0">
              {{ __('home.Reviews as Seller')}}
              <small
                ><span class="star-rating-s15">
                  <i class="fa fa-star"></i></span
                ><span
                  ><span
                    class="total-rating-out-five header-average-rating"
                    data-impression-collected="true"
                    >{{number_format($user->userReviews->avg('overall_rating'),'1','.','')}}</span
                  ></span
                ><span
                  ><span
                    class="total-rating header-total-rating"
                    data-impression-collected="true"
                    >({{count($user->userReviews)}})</span
                  ></span
                ></small
              >
            </h4>
            <!-- <select class="select2 border-0 shadow-sm ml-2">
              <option>Most Relevant</option>
              <option>Most Recent</option>
            </select> -->
          </div>
          <div class="breakdown">
            <ul class="header-stars">
              <li>
                {{ __('home.Seller communication level')}}
                <small>
                  <span class="star-rating-s15">
                    <i class="fa fa-star"></i>
                  </span>
                  <span class="total-rating-out-five">{{number_format($user->userReviews->avg('communication_rating'),'1','.','')}}</span>
                </small>
              </li>
              <li>
                {{ __('home.Recommend to a friend')}}
                <small>
                  <span class="star-rating-s15"
                    ><i class="fa fa-star"></i
                  ></span>
                  <span class="total-rating-out-five">{{number_format($user->userReviews->avg('recommend_rating'),'1','.','')}}</span>
                </small>
              </li>
              <li>
                {{ __('home.Service as described')}}
                <small>
                  <span class="star-rating-s15"
                    ><i class="fa fa-star"></i
                  ></span>
                  <span class="total-rating-out-five">{{number_format($user->userReviews->avg('service_rating'),'1','.','')}}</span>
                </small>
              </li>
            </ul>
          </div>
        </div>

        <div class="review-list">
          <ul>
            @foreach($user->userReviews as $review)
            <li>
              <div class="d-flex">
                <div class="left">
                  <span>
                    @if($review->buyerInfo->profile_image != null)
                    <img src="{{asset('images/user_images/'.$review->buyerInfo->profile_image)}}" class="profile-pict-img img-fluid" alt="" />
                    @else
                    <img src="{{asset('images/s1.png')}}" class="profile-pict-img img-fluid" alt="" />
                    @endif
                  </span>
                </div>
                <div class="right">
                  <h4>
                    {{$review->buyerInfo->first_name}} {{$review->buyerInfo->last_name}}
                    <span class="gig-rating text-body-2">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1792 1792"
                        width="15"
                        height="15"
                      >
                        <path
                          fill="currentColor"
                          d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"
                        ></path>
                      </svg>
                      {{number_format($review->overall_rating, '1', '.','')}}
                    </span>
                  </h4>
                  <div class="country d-flex align-items-center">
                    <!-- <span>
                      <img
                        class="country-flag img-fluid"
                        src="{{asset('images/flag/flag.png')}}"
                      />
                    </span> -->
                    <div class="country-name font-accent">{{$review->buyerInfo->country}}</div>
                  </div>
                  <div class="review-description">
                    <p>
                      {{$review->review}}
                    </p>
                  </div>
                  <?php
                  $date = date('d M, Y', strtotime($review->date))
                   ?>
                  <span class="publish py-3 d-inline-block w-100">
                    {{$date}}</span>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
var username = "{{$user->username}}";
  function addFriend(user_id) {
    @if(auth()->user() == '')
    window.location.href="{{url('/login?next=profile/')}}"+username;
    @else
    var sender_id  = "{{auth()->user()->id}}";
    @endif
    // alert(user_id+'/'+sender_id);
    $.ajax({
		 type: 'POST',
     url: "{{url('/api/add-friend')}}",
     data:{receiver_id:user_id,sender_id:sender_id},
     xhrFields: {withCredentials: true},
		 success:function(data){
       console.log(data);
       window.location.href = "{{url('messages?conversation=')}}"+data;
		 }
	 });
  }
</script>
@endsection
