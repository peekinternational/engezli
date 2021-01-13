@extends('frontend.layouts.master')
@section('title', 'Services  ')
@section('styling')
@endsection
@section('content')
<!-- Maan tabs -->
<section class="py-3 bg-white inner-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <ul class="nav nav-pills nav-justified services-tab" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-development-tab" data-toggle="pill" href="#pills-development" role="tab" aria-controls="pills-development" aria-selected="true">Web Development</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-design-tab" data-toggle="pill" href="#pills-design" role="tab" aria-controls="pills-design" aria-selected="false">Website Design</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-translation-tab" data-toggle="pill" href="#pills-translation" role="tab" aria-controls="pills-translation" aria-selected="false">Writing and Translation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-marketing-tab" data-toggle="pill" href="#pills-marketing" role="tab" aria-controls="pills-marketing" aria-selected="false">Digital Marketing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-consulting-tab" data-toggle="pill" href="#pills-consulting" role="tab" aria-controls="pills-consulting" aria-selected="false">Training and Consulting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="false">Video and Montage</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" id="pills-voice-tab" data-toggle="pill" href="#pills-voice" role="tab" aria-controls="pills-voice" aria-selected="false">Voice Over</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-business-tab" data-toggle="pill" href="#pills-business" role="tab" aria-controls="pills-business" aria-selected="false">Free Business</a>
          </li> -->
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Enfd Tabs -->
<!-- Inner Header -->
<section class="py-3 bg-white inner-header border-top">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-left">
            <div class="breadcrumbs">
               <p class="mb-0 text-dark"><a class="text-dark" href="#">Home</a>  /  <span class="text-success">Services</span></p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Inner Header -->
<!--   header -->
<!-- <div class="third-menu filter-options py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex align-items-center justify-content-between">
        <div class="left">
          <div class="dropdown-filters d-flex">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Seller Details
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="options">
                  <h5>Main type</h5>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="custom-checkbox">Mobile Apps
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">Email Templates
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">Landing pages
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">Websites
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="options">
                  <h5>Image file format</h5>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="custom-checkbox">jpg
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">png
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">psd
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="custom-checkbox">pdf
                        <span class="count">(150)</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dropdown ml-4">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="budget" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Budget
              </button>
              <div class="dropdown-menu budget" aria-labelledby="budget">
                <div class="options">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Min.</label>
                      <input type="text" placeholder="Any">
                      <i class="fa fa-inr" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-6">
                      <label>Min.</label>
                      <input type="text" placeholder="Any">
                      <i class="fa fa-inr" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dropdown ml-4">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="delivery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Delivery Time
              </button>
              <div class="dropdown-menu delivery" aria-labelledby="delivery">
                <div class="options">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="fake-radio-wrapper">
                        <div><input type="hidden" name="gig_items[2][0007284419489][gig_item_id]"
                          value="117210558"><input type="hidden"
                        name="gig_items[2][0007284419489][quantity]" value="0"></div>
                        <label
                          class="fake-radio"><input type="radio" name="2" value="0" checked=""><span
                          class="radio-img"></span><span>Express 24H</span></label><label
                          class="fake-radio"><input type="radio" name="2" value="1"><span
                          class="radio-img"></span><span>Up to 3 days</span>
                        </label>
                        <label
                          class="fake-radio"><input type="radio" name="2" value="1"><span
                          class="radio-img"></span><span>Up to 7 days</span>
                        </label>
                        <label
                          class="fake-radio"><input type="radio" name="2" value="1"><span
                          class="radio-img"></span><span>Anytime</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="right">
          <ul class="d-flex align-items-center">
            <li>
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
              <h5>Pro Services</h5>
            </li>
            <li>
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
              <h5>Local Sellers</h5>
            </li>
            <li>
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
              <h5>Online Sellers</h5>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
    <div class="main-page best-selling">
      <div class="view_slider recommended pt-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between pb-4">
              <div class="left">
                <h3 class="pb-0">Services In Web &amp; Mobile Design</h3>
              </div>
              <div class="right">
                <div class="dropdown-filters d-flex">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seller Details
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <div class="options">
                        <h5>Main type</h5>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="custom-checkbox">Mobile Apps
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Email Templates
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Landing pages
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Websites
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="options">
                        <h5>Image file format</h5>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="custom-checkbox">jpg
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">png
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">psd
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">pdf
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="budget" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Budget
                    </button>
                    <div class="dropdown-menu budget" aria-labelledby="budget">
                      <div class="options">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Min.</label>
                            <input type="text" placeholder="Any">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                          </div>
                          <div class="col-md-6">
                            <label>Min.</label>
                            <input type="text" placeholder="Any">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="delivery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Delivery Time
                    </button>
                    <div class="dropdown-menu delivery" aria-labelledby="delivery">
                      <div class="options">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="fake-radio-wrapper">
                              <div><input type="hidden" name="gig_items[2][0007284419489][gig_item_id]"
                                value="117210558"><input type="hidden"
                              name="gig_items[2][0007284419489][quantity]" value="0"></div>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="0" checked=""><span
                                class="radio-img"></span><span>Express 24H</span></label><label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Up to 3 days</span>
                              </label>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Up to 7 days</span>
                              </label>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Anytime</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <ul class="d-flex align-items-center">
                  <li>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                    <h5>Pro Services</h5>
                  </li>
                  <li>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                    <h5>Local Sellers</h5>
                  </li>
                  <li>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                    <h5>Online Sellers</h5>
                  </li>
                </ul> -->
              </div>
            </div>
          </div>
          <div class="sorting-div d-flex align-items-center justify-content-between pb-4">
            <p class="mb-2">463 Services available</p>
            <div class="sorting d-flex align-items-center">
              <p>Sortby</p>
              <select class="custom-select custom-select-sm border-0 shadow-sm ml-2">
                <option>Best Selling</option>
                <option>Recommended</option>
                <option>Newest Arrivals</option>
              </select>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v1.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s1.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v2.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s2.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v3.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s3.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v4.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s4.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s5.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v6.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s6.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v7.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s7.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v8.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s8.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v2.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s9.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v4.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s10.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s1.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v1.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s3.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-pagination text-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                <!--                    <span class="sr-only"></span>-->
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                <!--                    <span class="sr-only"></span>-->
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
    <div class="main-page best-selling">
      <div class="view_slider recommended pt-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between pb-4">
              <div class="left">
                <h3 class="pb-0">Services In Web &amp; Mobile Design</h3>
              </div>
              <div class="right">
                <div class="dropdown-filters d-flex">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seller Details
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <div class="options">
                        <h5>Main type</h5>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="custom-checkbox">Mobile Apps
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Email Templates
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Landing pages
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">Websites
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="options">
                        <h5>Image file format</h5>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="custom-checkbox">jpg
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">png
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">psd
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="custom-checkbox">pdf
                              <span class="count">(150)</span>
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="budget" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Budget
                    </button>
                    <div class="dropdown-menu budget" aria-labelledby="budget">
                      <div class="options">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Min.</label>
                            <input type="text" placeholder="Any">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                          </div>
                          <div class="col-md-6">
                            <label>Min.</label>
                            <input type="text" placeholder="Any">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="delivery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Delivery Time
                    </button>
                    <div class="dropdown-menu delivery" aria-labelledby="delivery">
                      <div class="options">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="fake-radio-wrapper">
                              <div><input type="hidden" name="gig_items[2][0007284419489][gig_item_id]"
                                value="117210558"><input type="hidden"
                              name="gig_items[2][0007284419489][quantity]" value="0"></div>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="0" checked=""><span
                                class="radio-img"></span><span>Express 24H</span></label><label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Up to 3 days</span>
                              </label>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Up to 7 days</span>
                              </label>
                              <label
                                class="fake-radio"><input type="radio" name="2" value="1"><span
                                class="radio-img"></span><span>Anytime</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="sorting-div d-flex align-items-center justify-content-between pb-4">
            <p class="mb-2">463 Services available</p>
            <div class="sorting d-flex align-items-center">
              <p>Sortby</p>
              <select class="custom-select custom-select-sm border-0 shadow-sm ml-2">
                <option>Best Selling</option>
                <option>Recommended</option>
                <option>Newest Arrivals</option>
              </select>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v1.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s1.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v2.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s2.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v3.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s3.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v4.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s4.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="#">
                <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
              </a>
              <div class="inner-slider">
                <div class="inner-wrapper">
                  <div class="d-flex align-items-center">
                    <span class="seller-image">
                      <img class="img-fluid"
                      src="{{asset('frontend-assets/images/user/s5.png')}}"
                      alt='' />
                    </span>
                    <span class="seller-name">
                      <a href="#">Stave Martin</a>
                      <span class="level hint--top level-one-seller">
                        Level 1 Seller
                      </span>
                    </span>
                  </div>
                  <h3>
                  Contrary to popular belief, Lorem Ipsum is not simply...
                  </h3>
                  <div class="content-info">
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="price">
                      <a href="#">
                        Starting At <span> $1,205</span>
                      </a>
                    </div>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-pagination text-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                <!--                    <span class="sr-only"></span>-->
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                <!--                    <span class="sr-only"></span>-->
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-design" role="tabpanel" aria-labelledby="pills-design-tab">...</div>
</div>
@endsection
@section('script')
@endsection