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
                <i class="fa fa-circle"></i>online
              </div>
              @else
              <div
                class="user-online-indicator is-online border-danger text-danger"
                data-user-id="{{$user->id}}"
              >
                <i class="fa fa-circle"></i>offline
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
                  <small class="oneliner">Professional Voice Actress</small>
                  <div class="ratings-wrapper">
                    <p class="rating-text">
                      <strong>5.0</strong> (1k+ reviews)
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="buttons-wrapper">
              <a
                href="#"
                class="btn-lrg-standard btn-contact-me js-contact-me js-open-popup-join"
                >Contact Me</a
              >
              <div class="btn-lrg-standard btn-white btn-custom-order">
                Get a Quote
              </div>
            </div>
            <div class="user-stats-desc">
              <ul class="user-stats">
                <li class="location">From<strong>{{$user->country}}</strong></li>
                <li class="member-since">
                  Member since<strong>{{$user->member_since }}</strong>
                </li>
                <li class="response-time">
                  Avg. Response Time<strong>2 hours</strong>
                </li>
                <li class="recent-delivery">
                  Recent Delivery<strong>about&nbsp;15</strong>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="seller-profile">
          <div class="description">
            <h3>Description</h3>
            <p>
              I am a Voice Actress with over 16+ years experience in
              everything from video games to phone systems to explainer
              videos to children's books. I am originally from the South
              East of England and have a natural British accent, as well as
              a Standard American accent from living in the US for 15 years.
            </p>
          </div>
          <div class="languages">
            <h3>Languages</h3>
            <ul>
              <li>English&nbsp;&nbsp;- <span>Fluent</span></li>
              <li>
                Spanish&nbsp;<strong>(español)</strong>&nbsp;-
                <span>Conversational</span>
              </li>
              <li>
                French&nbsp;<strong>(français)</strong>&nbsp;-
                <span>Basic</span>
              </li>
            </ul>
          </div>
          <div class="linked-accounts">
            <h3>Linked Accounts</h3>
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
            <h3>Skills</h3>
            <ul>
              <li class=""><a href="#">voice talent</a></li>
              <li class=""><a href="#">voice acting</a></li>
              <li class=""><a href="#">voiceover</a></li>
              <li class=""><a href="#">voice over</a></li>
              <li class=""><a href="#">voiceover talent</a></li>
              <li class=""><a href="#">voice actor</a></li>
              <li class=""><a href="#">voicetalent</a></li>
              <li class=""><a href="#">voiceacting</a></li>
              <li class=""><a href="#">voiceactor</a></li>
              <li class=""><a href="#">voiceover artist</a></li>
            </ul>
          </div>
          <div class="education-list list">
            <h3>Education</h3>
            <ul>
              <li>
                <p>B.A. - communication studies</p>
                <p>
                  Clayton State University, United States, Graduated 2006
                </p>
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
            <div class="col-md-4 mb-4">
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
                    <p class="level">Level 1 Seller</p>
                  </div>
                  <a href="{{url('/'.$service->sellerInfo->username.'/'.$service->service_url)}}" class="gig-title">
                    {{$service->service_title}}
                  </a>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <i class="fa fa-star"></i>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <i aria-hidden="true" class="fa fa-heart"></i>
                  <div class="price">
                    <a href="#">
                      Starting At
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
              Reviews as Seller
              <small
                ><span class="star-rating-s15">
                  <i class="fa fa-star"></i></span
                ><span
                  ><span
                    class="total-rating-out-five header-average-rating"
                    data-impression-collected="true"
                    >5</span
                  ></span
                ><span
                  ><span
                    class="total-rating header-total-rating"
                    data-impression-collected="true"
                    >(28051)</span
                  ></span
                ></small
              >
            </h4>
            <select class="select2 border-0 shadow-sm ml-2">
              <option>Most Relevant</option>
              <option>Most Recent</option>
            </select>
          </div>
          <div class="breakdown">
            <ul class="header-stars">
              <li>
                Seller communication level
                <small>
                  <span class="star-rating-s15">
                    <i class="fa fa-star"></i>
                  </span>
                  <span class="total-rating-out-five">5</span>
                </small>
              </li>
              <li>
                Recommend to a friend
                <small>
                  <span class="star-rating-s15"
                    ><i class="fa fa-star"></i
                  ></span>
                  <span class="total-rating-out-five">5</span>
                </small>
              </li>
              <li>
                Service as described
                <small>
                  <span class="star-rating-s15"
                    ><i class="fa fa-star"></i
                  ></span>
                  <span class="total-rating-out-five">5</span>
                </small>
              </li>
            </ul>
          </div>
        </div>

        <div class="review-list">
          <ul>
            <li>
              <div class="d-flex">
                <div class="left">
                  <span>
                    <img
                      src="{{asset('images/s1.png')}}"
                      class="profile-pict-img img-fluid"
                      alt=""
                    />
                  </span>
                </div>
                <div class="right">
                  <h4>
                    Engezly
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
                      5.0
                    </span>
                  </h4>
                  <div class="country d-flex align-items-center">
                    <span>
                      <img
                        class="country-flag img-fluid"
                        src="{{asset('images/flag/flag.png')}}"
                      />
                    </span>
                    <div class="country-name font-accent">Germany</div>
                  </div>
                  <div class="review-description">
                    <p>
                      The process was smooth, after providing the required
                      info, Pragyesh sent me an outstanding packet of
                      wireframes. Thank you a lot!
                    </p>
                  </div>
                  <span class="publish py-3 d-inline-block w-100"
                    >Published 4 weeks ago</span
                  >
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <div class="left">
                  <span>
                    <img
                      src="{{asset('images/s1.png')}}"
                      class="profile-pict-img img-fluid"
                      alt=""
                    />
                  </span>
                </div>
                <div class="right">
                  <h4>
                    Engezly
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
                      5.0
                    </span>
                  </h4>
                  <div class="country d-flex align-items-center">
                    <span>
                      <img
                        class="country-flag img-fluid"
                        src="{{asset('images/flag/uk.png')}}"
                      />
                    </span>
                    <div class="country-name font-accent">UK</div>
                  </div>
                  <div class="review-description">
                    <p>
                      The process was smooth, after providing the required
                      info, Pragyesh sent me an outstanding packet of
                      wireframes. Thank you a lot!
                    </p>
                  </div>
                  <span class="publish py-3 d-inline-block w-100"
                    >Published 4 weeks ago</span
                  >
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <div class="left">
                  <span>
                    <img
                      src="{{asset('images/s1.png')}}"
                      class="profile-pict-img img-fluid"
                      alt=""
                    />
                  </span>
                </div>
                <div class="right">
                  <h4>
                    Engezly
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
                      5.0
                    </span>
                  </h4>
                  <div class="country d-flex align-items-center">
                    <span>
                      <img
                        class="country-flag img-fluid"
                        src="{{asset('images/flag/australia.png')}}"
                      />
                    </span>
                    <div class="country-name font-accent">Australia</div>
                  </div>
                  <div class="review-description">
                    <p>
                      The process was smooth, after providing the required
                      info, Pragyesh sent me an outstanding packet of
                      wireframes. Thank you a lot!
                    </p>
                  </div>
                  <span class="publish py-3 d-inline-block w-100"
                    >Published 4 weeks ago</span
                  >
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection