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
            <li class="active"><a href="#overview">Overview</a></li>
            <li><a href="#description">description</a></li>
            <li><a href="#aboutSeller">about seller</a></li>
            <li><a href="#comparePackage">compare package</a></li>
            <li><a href="#faq">faq</a></li>
            <li><a href="#reviews">reviews</a></li>
          </ul>
        </div>
        <div class="right">
          <ul class="lists-group">
            <li>
              <button>
                <i class="fa fa-heart" aria-hidden="true"></i>
                Save
              </button>
            </li>
            <li>
              <span class="collect-count">138</span>
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
                    <a href="{{url('services/all')}}">service</a>
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
                  <li><span class="seller-level">Level 1 Seller</span></li>
                  <li>
                    <span class="user-info-rating d-flex">
                      <span class="star-rating-wrapper">
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                      </span>
                      <span class="total-rating-out-five">5.0</span>
                      <span class="total-rating">(36)</span>
                    </span>
                  </li>
                  <li><span class="queue">2 Orders in Queue</span></li>
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
                <h3>About This Gig</h3>
                <p>
                  {!! $serviceData->service_desc !!}
                </p>
              </div>
              <ul class="metadata">
                <li class="metadata-attribute">
                  <p>Main Type</p>
                  <ul>
                    <li>Websites</li>
                    <li>Mobile Apps</li>
                  </ul>
                </li>
                <li class="metadata-attribute">
                  <p>Image File Format</p>
                  <ul>
                    <li>JPG</li>
                    <li>PNG</li>
                    <li>PSD</li>
                  </ul>
                </li>
              </ul>
              <h3 id="aboutSeller" class="aboutSeller">About The Seller</h3>
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
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                          </span>
                        </div>
                        <span class="total-rating-out-five">5.0</span>
                        <span class="total-rating">(36 reviews)</span>
                      </span>
                      <a href="#">Contact Me</a>
                    </div>
                  </div>
                </div>
                <div class="stats-desc">
                  <ul class="user-stats">
                    <li>From<strong>{{$serviceData->sellerInfo->country}}</strong></li>
                    <li>Member since<strong><?php echo date('F Y', strtotime($serviceData->sellerInfo->member_since)); ?></strong></li>
                    <li>Avg. Response Time<strong>1 hour</strong></li>
                  </ul>
                  <article class="seller-desc">
                    <div class="inner">
                      {{$serviceData->sellerInfo->bio}}
                    </div>
                  </article>
                </div>
                <div id="comparePackage" class="table-package">
                  <h3>Compare Packages</h3>
                  <table>
                    <colgroup>
                      <col />
                      <col />
                      <col />
                      <col />
                    </colgroup>
                    <tbody>
                      <tr class="package-type">
                        <th>Package</th>
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
                              ># of Pages / Screens</span
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
                              >Revisions</span
                            >
                          </div>
                        </th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>{{$packg->revision}}</td>
                        @endforeach
                      </tr>
                      <tr class="delivery-time">
                        <th>Delivery Time</th>
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
                        <th>Total</th>
                        @foreach($serviceData->packageInfo as $key => $packg)
                        <td>

                          <p class="price-label">${{$packg->price}}</p>
                          <form class="" action="{{url('order')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="service_id" value="{{$serviceData->id}}">
                            <input type="hidden" name="package_id" value="{{$packg->id}}">
                            <button type="submit" class="custom-btn">Select</button>
                          </form>

                        </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div id="faq" class="faq">
                <h3>FAQ</h3>
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
                    <h4 class="m-0">37 Reviews</h4>
                    <select class="select2 ml-2">
                      <option>Most Relevant</option>
                      <option>Most Recent</option>
                    </select>
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
                                    5 Stars
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 90%"
                                    aria-valuenow="90"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">(36)</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    5 Stars
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 25%"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">(2)</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    5 Stars
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 0%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">(0)</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    5 Stars
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 0%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">(0)</td>
                            </tr>
                            <tr class="">
                              <td>
                                <span>
                                  <button
                                    class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter"
                                  >
                                    5 Stars
                                  </button>
                                </span>
                              </td>
                              <td class="progress-bar-container">
                                <div class="progress">
                                  <div
                                    class="progress-bar"
                                    role="progressbar"
                                    style="width: 0%"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                              </td>
                              <td class="star-num">(0)</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <div class="ranking">
                          <h6 class="text-display-7">Rating Breakdown</h6>
                          <ul>
                            <li>
                              Seller communication level<span
                                >5<span
                                  class="review-star rate-10 show-one"
                                ></span
                              ></span>
                            </li>
                            <li>
                              Recommend to a friend<span
                                >5<span
                                  class="review-star rate-10 show-one"
                                ></span
                              ></span>
                            </li>
                            <li>
                              Service as described<span
                                >4.9<span
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
                            Askbootstrap
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
                                src="images/flag/india.png"
                              />
                            </span>
                            <div class="country-name font-accent">
                              India
                            </div>
                          </div>
                          <div class="review-description">
                            <p>
                              The process was smooth, after providing the
                              required info, Pragyesh sent me an outstanding
                              packet of wireframes. Thank you a lot!
                            </p>
                          </div>
                          <span class="publish py-3 d-inline-block w-100"
                            >Published 4 weeks ago</span
                          >
                          <div class="helpful-thumbs">
                            <div class="helpful-thumb text-body-2">
                              <span class="fit-icon thumbs-icon">
                                <svg
                                  width="14"
                                  height="14"
                                  viewBox="0 0 14 14"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    d="M13.5804 7.81165C13.8519 7.45962 14 7 14 6.43858C14 5.40843 13.123 4.45422 12.0114 4.45422H10.0932C10.3316 3.97931 10.6591 3.39024 10.6591 2.54516C10.6591 0.948063 10.022 0 8.39207 0C7.57189 0 7.26753 1.03682 7.11159 1.83827C7.01843 2.31708 6.93041 2.76938 6.65973 3.04005C6.01524 3.68457 5.03125 5.25 4.44013 5.56787C4.38028 5.59308 4.3038 5.61293 4.22051 5.62866C4.06265 5.39995 3.79889 5.25 3.5 5.25H0.875C0.391754 5.25 0 5.64175 0 6.125V13.125C0 13.6082 0.391754 14 0.875 14H3.5C3.98325 14 4.375 13.6082 4.375 13.125V12.886C5.26354 12.886 7.12816 14.0002 9.22728 13.9996C9.37781 13.9997 10.2568 14.0004 10.3487 13.9996C11.9697 14 12.8713 13.0183 12.8188 11.5443C13.2325 11.0596 13.4351 10.3593 13.3172 9.70944C13.6578 9.17552 13.7308 8.42237 13.5804 7.81165ZM0.875 13.125V6.125H3.5V13.125H0.875ZM12.4692 7.5565C12.9062 7.875 12.9062 9.1875 12.3159 9.48875C12.6856 10.1111 12.3529 10.9439 11.9053 11.1839C12.1321 12.6206 11.3869 13.1146 10.3409 13.1246C10.2504 13.1255 9.32247 13.1246 9.22731 13.1246C7.23316 13.1246 5.54296 12.011 4.37503 12.011V6.44287C5.40611 6.44287 6.35212 4.58516 7.27847 3.65879C8.11368 2.82357 7.83527 1.43153 8.3921 0.874727C9.78414 0.874727 9.78414 1.84589 9.78414 2.54518C9.78414 3.69879 8.94893 4.21561 8.94893 5.32924H12.0114C12.6329 5.32924 13.1223 5.88607 13.125 6.44287C13.1277 6.99967 12.9062 7.4375 12.4692 7.5565ZM2.84375 11.8125C2.84375 12.1749 2.54994 12.4688 2.1875 12.4688C1.82506 12.4688 1.53125 12.1749 1.53125 11.8125C1.53125 11.4501 1.82506 11.1562 2.1875 11.1562C2.54994 11.1562 2.84375 11.4501 2.84375 11.8125Z"
                                  ></path>
                                </svg>
                              </span>
                              <span class="thumb-title">Helpful</span>
                            </div>
                            <div class="helpful-thumb text-body-2 ml-3">
                              <span class="fit-icon thumbs-icon">
                                <svg
                                  width="14"
                                  height="14"
                                  viewBox="0 0 14 14"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    d="M0.419563 6.18835C0.148122 6.54038 6.11959e-07 7 5.62878e-07 7.56142C2.81294e-05 8.59157 0.876996 9.54578 1.98863 9.54578L3.90679 9.54578C3.66836 10.0207 3.34091 10.6098 3.34091 11.4548C3.34089 13.0519 3.97802 14 5.60793 14C6.42811 14 6.73247 12.9632 6.88841 12.1617C6.98157 11.6829 7.06959 11.2306 7.34027 10.9599C7.98476 10.3154 8.96875 8.75 9.55987 8.43213C9.61972 8.40692 9.6962 8.38707 9.77949 8.37134C9.93735 8.60005 10.2011 8.75 10.5 8.75L13.125 8.75C13.6082 8.75 14 8.35825 14 7.875L14 0.875C14 0.391754 13.6082 -3.42482e-08 13.125 -7.64949e-08L10.5 -3.0598e-07C10.0168 -3.48226e-07 9.625 0.391754 9.625 0.875L9.625 1.11398C8.73647 1.11398 6.87184 -0.000191358 4.77272 0.00038257C4.62219 0.000300541 3.74322 -0.000438633 3.65127 0.000382472C2.03027 -1.04643e-06 1.12867 0.981667 1.18117 2.45566C0.76754 2.94038 0.564868 3.64065 0.682829 4.29056C0.342234 4.82448 0.269227 5.57763 0.419563 6.18835ZM13.125 0.875L13.125 7.875L10.5 7.875L10.5 0.875L13.125 0.875ZM1.53079 6.4435C1.09375 6.125 1.09375 4.8125 1.6841 4.51125C1.31436 3.88891 1.64713 3.05613 2.09467 2.81605C1.86791 1.37941 2.61313 0.885417 3.65906 0.875355C3.74962 0.874535 4.67753 0.875355 4.77269 0.875355C6.76684 0.875355 8.45704 1.98898 9.62497 1.98898L9.62497 7.55713C8.5939 7.55713 7.64788 9.41484 6.72153 10.3412C5.88632 11.1764 6.16473 12.5685 5.6079 13.1253C4.21586 13.1253 4.21586 12.1541 4.21586 11.4548C4.21586 10.3012 5.05107 9.78439 5.05107 8.67076L1.9886 8.67076C1.36708 8.67076 0.877707 8.11393 0.874973 7.55713C0.872266 7.00033 1.09375 6.5625 1.53079 6.4435ZM11.1563 2.1875C11.1563 1.82506 11.4501 1.53125 11.8125 1.53125C12.1749 1.53125 12.4688 1.82506 12.4688 2.1875C12.4688 2.54994 12.1749 2.84375 11.8125 2.84375C11.4501 2.84375 11.1563 2.54994 11.1563 2.1875Z"
                                  ></path>
                                </svg>
                              </span>
                              <span class="thumb-title">Not Helpful</span>
                            </div>
                          </div>
                          <div class="response-item mt-4 d-flex">
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
                                Gurdeep Osahan
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
                              <div
                                class="country d-flex align-items-center"
                              >
                                <span>
                                  <img
                                    class="country-flag img-fluid"
                                    src="images/flag/india.png"
                                  />
                                </span>
                                <div class="country-name font-accent">
                                  India
                                </div>
                              </div>
                              <div class="review-description">
                                <p>
                                  The process was smooth, after providing
                                  the required info, Pragyesh sent me an
                                  outstanding packet of wireframes. Thank
                                  you a lot!
                                </p>
                              </div>
                              <span
                                class="publish py-3 d-inline-block w-100"
                                >Published 4 weeks ago</span
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="tags">
                <h3>Related tags</h3>
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

                  <div class="header">
                    <h3>
                      <b class="title">{{$packg->no_of_pages}} Screens</b
                      ><span class="price">${{$packg->price}}</span>
                    </h3>
                    <form class="" action="{{url('order')}}" method="post">
                    {{csrf_field()}}
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
                        Delivery</b
                      >
                      @if($packg->revision != '')
                      <b class="delivery ml-3"
                        ><i class="fa fa-refresh" aria-hidden="true"></i> {{$packg->revision}}
                        Revision</b>
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
                        Pages
                      </li>
                    </ul>
                  </article>
                  <button type="submit">Continue (${{$packg->price}})</button>
                </form>
                </div>
                @endforeach
              </div>
              <div class="contact-seller-wrapper">
                <a class="fit-button" href="#">Contact Seller</a>
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
