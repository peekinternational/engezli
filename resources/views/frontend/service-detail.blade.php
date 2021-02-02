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

              <div id="reviews" class="review-section">
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <h4 class="m-0">37 Reviews</h4>
                  <select class="select2 ml-2">
                    <option>Most Relevant</option>
                    <option>Most Recent</option>
                  </select>
                </div>
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
                <div class="review-list-group">
                  <div class="review-list-item">
                    <div class="user-img">
                      <div class="avatar">
                        <img src="{{asset('images/avatar (1).svg')}}" alt="" />
                      </div>
                    </div>
                    <div class="comments">
                      <div class="review-inner-content">
                        <a href="" class="name"
                          >Ali ahmed
                          <span> <i class="fa fa-star"></i> 5.0</span></a
                        >
                        <p class="desc">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Beatae, placeat delectus esse illo
                          necessitatibus adipisci fugiat? Ipsum, architecto
                          molestiae ratione deleniti fuga cumque excepturi,
                          inventore autem facilis incidunt consectetur
                          voluptatum?
                        </p>

                        <p class="posted-time">14 hours ago</p>

                        <div class="btns-group">
                          <a href="" class="thumbs-up active"
                            ><i class="fa fa-thumbs-up"> </i>helpful</a
                          >
                          <a href="" class="thumbs-down"
                            ><i class="fa fa-thumbs-down"> </i>not
                            helpful</a
                          >
                        </div>
                      </div>

                      <div class="sub-comments">
                        <div class="user-img">
                          <div class="avatar">
                            <img src="{{asset('images/avatar (3).svg')}}" alt="" />
                          </div>
                        </div>
                        <div class="review-inner-content">
                          <a href="" class="name"
                            >john william <span>(seller)</span></a
                          >
                          <p class="desc">
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Beatae, placeat delectus
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="review-list-item">
                    <div class="user-img">
                      <div class="avatar">
                        <img src="{{asset('images/avatar (2).svg')}}" alt="" />
                      </div>
                    </div>
                    <div class="comments">
                      <div class="review-inner-content">
                        <a href="" class="name"
                          >Ali ahmed
                          <span> <i class="fa fa-star"></i> 5.0</span></a
                        >
                        <p class="desc">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Beatae, placeat delectus esse illo
                          necessitatibus adipisci fugiat? Ipsum, architecto
                          molestiae ratione deleniti fuga cumque excepturi,
                          inventore autem facilis incidunt consectetur
                          voluptatum?
                        </p>

                        <p class="posted-time">14 hours ago</p>

                        <div class="btns-group">
                          <a href="" class="thumbs-up"
                            ><i class="fa fa-thumbs-up"> </i>helpful</a
                          >
                          <a href="" class="thumbs-down"
                            ><i class="fa fa-thumbs-down"> </i>not
                            helpful</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
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
