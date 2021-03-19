@extends('frontend.layouts.app')
@section('title', 'Service Detail ')
@section('styling')
@endsection
@section('content')
<div class="service-details">
  <div class="filter-options">
    <div class="container">
      <div class="outer-content">
        <div class="left">
          <ul class="lists-group">
            <li class="active"><a href="#overview">{{ __('home.Overview')}}</a></li>
            <li><a href="#description">{{ __('home.Description')}}</a></li>
            <li><a href="#aboutSeller">{{ __('home.about seller')}}</a></li>
            <li><a href="#comparePackage">{{ __('home.compare package')}}</a></li>
            <li><a href="#faq">{{ __('home.Faq')}}</a></li>
            <li><a href="#reviews">{{ __('home.Reviews')}}</a></li>
          </ul>
        </div>
        <div class="right">
          <ul class="lists-group">
            <li>
                @if(auth()->user())
                @if($serviceData->seller_id == auth()->user()->id)
                <button>
                <i aria-hidden="true" class="fa @if(count($serviceData->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$serviceData->id}}" title="You can favorite your own serviceData"></i>
                Save</button>
                @else
                <button>
                <i aria-hidden="true" class="fa @if(count($serviceData->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$serviceData->id}}" onclick="makeFavorite({{$serviceData->id}})" style="cursor: pointer;"></i>
                Save</button>
                @endif
                @else
                <button>
                <i aria-hidden="true" class="fa @if(count($serviceData->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$serviceData->id}}" onclick="makeFavorite({{$serviceData->id}})" style="cursor: pointer;"></i>
                Save</button>
                @endif
            </li>
            <li>
              <span class="collect-count">{{count($serviceData->favorite)}}</span>
            </li>
            <li class="ml-2">
              <button>
                <i class="fa fa-share-alt" aria-hidden="true"></i>
                Share
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="service-wrapper">
    <div class="container">
      <div class="outer-content">
        <div class="row">
          <div class="col-lg-8 left">
            <div class="service-header">
              <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">
                    <a href="{{url('services/all')}}">{{ __('home.Service')}}</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="{{url('services/'.$productCat->cat_url)}}">{{$productCat->cat_title}}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    {{$productSubCat->cat_title}}
                  </li>
                </ol>
              </nav>
              <h2 class="gig-title">
                {{$serviceData->service_title}}
              </h2>
              <div
                class="user-info d-flex align-items-center"
                id="overview"
              >
                <div class="avatar_name d-flex align-items-center">
                  @if($serviceData->sellerInfo->facebook_id != null || $serviceData->sellerInfo->google_id != null)
                  <img alt="" class="" src="{{$serviceData->sellerInfo->profile_image}}" />
                  @elseif($serviceData->sellerInfo->profile_image != '')
                  <img alt="" class="" src="{{asset('images/user_images/'.$serviceData->sellerInfo->profile_image)}}" />
                  @else
                  <img src="{{asset('images/avatar (2).svg')}}">
                  @endif
                  <a href="{{url('profile/'.$serviceData->sellerInfo->username)}}">{{$serviceData->sellerInfo->first_name}} {{$serviceData->sellerInfo->last_name}}</a>
                </div>
                <ul class="lists-group d-flex align-items-center">
                  <li><span class="seller-level">{{ __('home.Level')}} 1 {{ __('home.Seller')}}</span></li>
                  <?php
                    $total_reviews = count($user->userReviews);
                    $userReviews     = ($user->userReviews != null) ? $user->userReviews->avg('overall_rating') : 0;
                    ?>
                  <li>
                    <span class="user-info-rating d-flex">
                      <span class="star-rating-wrapper">
                        <span><i class="fa fa-star avg-star-1 {{($userReviews >= 1) ? 'yellow-star' : 'grey-star'}}"></i></span>
                        <span><i class="fa fa-star avg-star-2 {{($userReviews >= 2) ? 'yellow-star' : 'grey-star'}}"></i></span>
                        <span><i class="fa fa-star avg-star-3 {{($userReviews >= 3) ? 'yellow-star' : 'grey-star'}}"></i></span>
                        <span><i class="fa fa-star avg-star-4 {{($userReviews >= 4) ? 'yellow-star' : 'grey-star'}}"></i></span>
                        <span><i class="fa fa-star avg-star-5 {{($userReviews >= 5) ? 'yellow-star' : 'grey-star'}}"></i></span>
                      </span>
                      <span class="total-rating-out-five">{{number_format($userReviews, '1', '.','')}}</span>
                      <span class="total-rating">({{$total_reviews}})</span>
                    </span>
                  </li>
                  <li><span class="queue">2 {{ __('home.Orders in Queue')}}</span></li>
                </ul>
              </div>
              <div class="gig-thumbnails">
                <div class="swiper-container">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="slider">
                        <img src="{{asset('images/service_images/'.$serviceData->service_img1)}}" alt="" />
                      </div>
                    </div>
                    @if($serviceData->service_img2)
                    <div class="swiper-slide">
                      <div class="slider">
                        <img src="{{asset('images/service_images/'.$serviceData->service_img2)}}" alt="" />
                      </div>
                    </div>
                    @endif
                    @if($serviceData->service_img3)
                    <div class="swiper-slide">
                      <div class="slider">
                        <img src="{{asset('images/service_images/'.$serviceData->service_img3)}}" alt="" />
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="swiper-btn-container">
                    <div class="swiper-button-prev">
                      <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="swiper-button-next">
                      <i class="fa fa-angle-right"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div id="description" class="description">
                <h3>{{ __('home.About This Gig')}}</h3>
                <p>
                  {!! $serviceData->service_desc !!}
                </p>
              </div>
              <ul class="metadata">
                <li class="metadata-attribute">
                  <p>{{ __('home.Main Type')}}</p>
                  <ul>
                    <li>Websites</li>
                    <li>Mobile Apps</li>
                  </ul>
                </li>
                <li class="metadata-attribute">
                  <p>{{ __('home.Image File Format')}}</p>
                  <ul>
                    <li>JPG</li>
                    <li>PNG</li>
                    <li>PSD</li>
                  </ul>
                </li>
              </ul>
              <h3 id="aboutSeller" class="aboutSeller">{{ __('home.About The Seller')}}</h3>
              <div class="profile-card">
                <div class="user-profile-image d-flex">
                  <label class="profile-pict" for="profile_image">
                    @if($serviceData->sellerInfo->facebook_id != null || $serviceData->sellerInfo->google_id != null)
                    <img alt="" class="" src="{{$serviceData->sellerInfo->profile_image}}" />
                    @elseif($serviceData->sellerInfo->profile_image != '')
                    <img alt="" class="" src="{{asset('images/user_images/'.$serviceData->sellerInfo->profile_image)}}" />
                    @else
                    <img src="{{asset('images/avatar (2).svg')}}">
                    @endif
                  </label>
                  <div class="right">
                    <div class="profile-name">
                      <span class="user-status">
                        <a href="{{url('profile/'.$serviceData->sellerInfo->username)}}" class="seller-link"
                          >{{$serviceData->sellerInfo->first_name}} {{$serviceData->sellerInfo->last_name}}</a
                        >
                      </span>
                      <div class="seller-level">
                        {{$serviceData->sellerInfo->occuption}}
                      </div>
                    </div>
                    <div class="user-info">
                      <span
                        class="user-info-rating d-flex align-items-center"
                      >
                        <div class="star-rating-s15-wrapper">
                          <span class="star-rating-s15 rate-10">
                            <i class="fa fa-star avg-star-1 {{($userReviews >= 1) ? 'yellow-star' : 'grey-star'}}" aria-hidden="true"></i>
                            <i class="fa fa-star avg-star-2 {{($userReviews >= 2) ? 'yellow-star' : 'grey-star'}}" aria-hidden="true"></i>
                            <i class="fa fa-star avg-star-3 {{($userReviews >= 3) ? 'yellow-star' : 'grey-star'}}" aria-hidden="true"></i>
                            <i class="fa fa-star avg-star-4 {{($userReviews >= 4) ? 'yellow-star' : 'grey-star'}}" aria-hidden="true"></i>
                            <i class="fa fa-star avg-star-5 {{($userReviews >= 5) ? 'yellow-star' : 'grey-star'}}" aria-hidden="true"></i>
                          </span>
                        </div>
                        <span class="total-rating-out-five">{{number_format($userReviews, '1', '.','')}}</span>
                        <span class="total-rating">({{$total_reviews}})</span>
                      </span>
                      <a href="#">{{ __('home.Contact Me')}}</a>
                    </div>
                  </div>
                </div>
                <div class="stats-desc">
                  <ul class="user-stats">
                    <li>{{ __('home.From')}}<strong>{{$serviceData->sellerInfo->country}}</strong></li>
                    <li>{{ __('home.Member since')}}<strong><?php echo date('F Y', strtotime($serviceData->sellerInfo->member_since)); ?></strong></li>
                    <li>{{ __('home.Avg. Response Time')}}<strong>1 hour</strong></li>
                  </ul>
                  <article class="seller-desc">
                    <div class="inner">
                      {{$serviceData->sellerInfo->bio}}
                    </div>
                  </article>
                </div>
                <div id="comparePackage" class="table-package">
                  <h3>{{ __('home.Compare Packages')}}</h3>
                  <table>
                    <colgroup>
                      <col />
                      <col />
                      <col />
                      <col />
                    </colgroup>
                    <tbody>
                      <tr class="package-type">
                        <th>{{ __('home.Package')}}</th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>
                          <p class="price">${{$packg->price}}</p>
                          <b class="type">{{$packg->package_name}}</b>
                          <b class="title">{{$packg->no_of_pages}} Screens</b>
                        </td>
                        @endforeach
                      </tr>
                      <tr class="description">
                        <th></th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>{{$packg->description}}</td>
                        @endforeach
                      </tr>
                      @foreach($serviceData->servicePackgOptions as $key => $optionId)
                      <tr>
                        @foreach(Engezli::get_optionName($optionId->id) as $key => $optionName)
                        <th>
                          <div
                            class="fit-popover fit-popover-top fit-tooltip"
                            data-position="top">
                            <span class="fit-popover-content"
                              >{{$optionName->name}}</span>
                          </div>
                        </th>
                        <td class="boolean-pricing-factor included"></td>
                        <td class="boolean-pricing-factor included"></td>
                        <td class="boolean-pricing-factor included"></td>
                        @endforeach
                      </tr>
                      @endforeach
                      <tr>
                        <th>
                          <div
                            class="fit-popover fit-popover-top fit-tooltip"
                            data-position="top"
                          >
                            <span class="fit-popover-content"
                              >{{ __('home.# of Pages / Screens')}}</span
                            >
                          </div>
                        </th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>{{$packg->no_of_pages}}</td>
                        @endforeach
                      </tr>
                      <tr>
                        <th>
                          <div
                            class="fit-popover fit-popover-top fit-tooltip"
                            data-position="top"
                          >
                            <span class="fit-popover-content"
                              >{{ __('home.Revisions')}}</span
                            >
                          </div>
                        </th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>{{$packg->revision}}</td>
                        @endforeach
                      </tr>
                      <tr class="delivery-time">
                        <th>{{ __('home.Delivery Time')}}</th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>
                          <div class="fake-radio-wrapper">
                            <!-- <div>
                              <input
                                type="hidden"
                                name="gig_items[1][4694800919471][gig_item_id]"
                                value="117210558"
                              /><input
                                type="hidden"
                                name="gig_items[1][4694800919471][quantity]"
                                value="0"
                              />
                            </div> -->
                            <label class="fake-radio">
                              <!-- <input
                                type="radio"
                                name="1"
                                value="0"
                                checked=""
                              /> -->
                              <span class="radio-img"></span
                              ><span>{{$packg->delivery_time}}</span></label
                            >
                            <!-- <label class="fake-radio">
                              <input type="radio" name="1" value="1" /><span
                                class="radio-img"
                              ></span
                              ><span>2 days</span>
                              <p class="faster-price">(+$2,008)</p>
                            </label> -->
                          </div>
                        </td>
                        @endforeach
                      </tr>
                      <tr class="select-package">
                        <th>{{ __('home.Total')}}</th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>

                          <p class="price-label">${{$packg->price}}</p>
                          <form class="" action="{{url('order')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="service_id" value="{{$serviceData->id}}">
                            <input type="hidden" name="package_id" value="{{$packg->id}}">
                            @if(auth()->user())
                            <button type="submit" class="custom-btn">{{ __('home.Select')}}</button>
                            @else
                            <a href="{{url('login?next='.$username.'/'.$slug)}}" class="custom-btn">{{ __('home.Select')}}</button>
                            @endif
                          </form>

                        </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div id="faq" class="faq">
                <h3>{{ __('home.FAQ')}}</h3>
                <div
                  class="accordion custom-accordion"
                  id="accordionExample"
                >
                  @foreach($serviceData->serviceFaq as $key => $faq)
                  <div class="card">
                    <div class="card-header" id="heading{{$faq->id}}">
                      <h2 class="mb-0">
                        <button
                          class="btn btn-link"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapse{{$faq->id}}"
                          aria-expanded="true"
                          aria-controls="collapse{{$faq->id}}"
                        >
                          {{$faq->title}}
                        </button>
                      </h2>
                    </div>
                    <div
                      id="collapse{{$faq->id}}"
                      class="collapse @if($key == 0)show @endif"
                      aria-labelledby="heading{{$faq->id}}"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        {{$faq->description}}
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="review-container card">
                <div id="reviews" class="review-section bord p-3">
                  <div
                    class="d-flex align-items-center justify-content-between mb-4"
                  >
                    <h4 class="m-0">{{$total_reviews}} {{ __('home.Reviews')}}</h4>
                    <!-- <select class="select2 ml-2">
                      <option>Most Relevant</option>
                      <option>Most Recent</option>
                    </select> -->
                  </div>

                  <div class="car mt-4">
                    <div class="row">
                      <div class="col-md-6">
                        <table class="stars-counters">
                          <tbody>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    5 {{ __('home.Stars')}}
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: {{$rating_avg[4]}}%"
                                    aria-valuenow="90"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">({{$count_stars[4]}})</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    4 {{ __('home.Stars')}}
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: {{$rating_avg[3]}}%"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">({{$count_stars[3]}})</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    3 {{ __('home.Stars')}}
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: {{$rating_avg[2]}}%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">({{$count_stars[2]}})</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    2 {{ __('home.Stars')}}
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: {{$rating_avg[1]}}%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">({{$count_stars[1]}})</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    1 {{ __('home.Stars')}}
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: {{$rating_avg[0]}}%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">({{$count_stars[0]}})</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <div class="ranking">
                          <h6 class="text-display-7">{{ __('home.Rating Breakdown')}}</h6>
                          <ul>
                            <li>
                              {{ __('home.Seller communication level')}}<span
                                >{{number_format($user->userReviews->avg('communication_rating'),'1','.','')}}<span
                                  class="review-star rate-10 show-one"
                                ></span
                              ></span>
                            </li>
                            <li>
                              {{ __('home.Recommend to a friend')}}<span>
                                {{number_format($user->userReviews->avg('recommend_rating'),'1','.','')}}<span
                                  class="review-star rate-10 show-one"
                                ></span
                              ></span>
                            </li>
                            <li>
                              {{ __('home.Service as described')}}<span>
                                {{number_format($user->userReviews->avg('service_rating'),'1','.','')}}<span
                                  class="review-star rate-10 show-one"
                                ></span
                              ></span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="review-list p-4">
                  <ul>
                    @foreach($serviceData->serviceRating as $review)
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
                                height="15">
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
                                src="images/flag/india.png"
                              />
                            </span> -->
                            <div class="country-name font-accent">
                              {{$review->buyerInfo->country}}
                            </div>
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

              <div class="tags">
                <h3>{{ __('home.Related tags')}}</h3>
                <ul class="d-flex">
                  <?php $tags = explode(',', $serviceData->search_tags);
                   ?>
                   @foreach($tags as $tag)
                  <li>
                    <a href="#">{{$tag}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 right">
            <div class="sticky">
              <ul class="nav nav-tabs">
                @foreach($serviceData->packageInfo as $key => $packg)
                <li>
                  <a @if($key == 0) class="active" @endif data-toggle="tab" href="#{{$packg->package_name}}"
                    >{{$packg->package_name}}</a
                  >
                </li>
                @endforeach
              </ul>
              <div class="tab-content">
                @foreach($serviceData->packageInfo as $key => $packg)
                <div id="{{$packg->package_name}}" class="tab-pane fade @if($key == 0)show active @endif">
                  <form class="" action="{{url('order')}}" method="post">
                    {{csrf_field()}}
                  <div class="header">
                    <h3>
                      <b class="title">{{$packg->no_of_pages}} {{ __('home.Screens')}}</b
                      ><span class="price">${{$packg->price}}</span>
                    </h3>

                    <input type="hidden" name="service_id" value="{{$packg->services_id}}">
                    <input type="hidden" name="package_id" value="{{$packg->id}}">
                    <p>
                      {{$packg->description}}
                    </p>
                  </div>
                  <article>
                    <div class="d-flex">
                      <b class="delivery"
                        ><i class="fa fa-clock-o" aria-hidden="true"></i> {{$packg->delivery_time}}
                        {{ __('home.Delivery')}}</b
                      >
                      @if($packg->revision != '')
                      <b class="delivery ml-3"
                        ><i class="fa fa-refresh" aria-hidden="true"></i> {{$packg->revision}}
                        {{ __('home.Revision')}}</b>
                      @endif
                    </div>
                    <ul class="features">
                      @foreach($serviceData->servicePackgOptions as $key => $optionId)
                        @foreach(Engezli::get_optionName($optionId->id) as $key => $optionName)
                      <li class="feature included">
                        <i class="fa fa-check" aria-hidden="true"></i>{{$optionName->name}}
                      </li>
                      @endforeach
                      @endforeach
                      <li class="feature included">
                        <i class="fa fa-check" aria-hidden="true"></i>{{$packg->no_of_pages}}
                        {{ __('home.Pages')}}
                      </li>
                    </ul>
                  </article>
                  @if(auth()->user())
                  <button type="submit">{{ __('home.Continue')}} (${{$packg->price}})</button>
                  @else
                  <a href="{{url('login?next=order&&package_id='.$packg->id)}}">{{ __('home.Continue')}} (${{$packg->price}})</a>
                  @endif
                </form>
                </div>
                @endforeach
              </div>
              <div class="contact-seller-wrapper">
                <a class="fit-button" href="#">{{ __('home.Contact Seller')}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  // swiper slider
  var swiper = new Swiper(".gig-thumbnails .swiper-container", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    // autoplay: {
    // delay: 2500,
    // disableOnInteraction: false,
    // },
    // init: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  // swiper slider
</script>
@endsection
