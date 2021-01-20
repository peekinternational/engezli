@extends('frontend.layouts.app')
@section('title', 'Services  ')
@section('styling')
@endsection
@section('content')
<!-- Category Slider -->
@include('frontend.includes.category-slider')
<!-- Maan tabs -->
<div class="search-container">
  <div class="page-headers">
    <div class="container">
      <h2>Service lists</h2>
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="">service</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            writing and translation
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="filter-options">
    <div class="container">
      <div class="outer-content">
        <div class="left">
          <div class="sellter-details-select select-box">
            <select name="" class="select2" id="">
              <option value="">seller details</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select>
          </div>

          <div class="budget-select select-box">
            <select name="" class="select2" id="">
              <option value="">budget</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select>
          </div>

          <div class="delivery-time-select select-box">
            <select name="" class="select2" id="">
              <option value="">delivery time</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select>
          </div>
        </div>
        <div class="right">
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="customSwitch1"
              data="off"
              checked
            />
            <label
              class="custom-control-label control-package"
              for="customSwitch1"
            >
              Pro Services
            </label>
          </div>
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="customSwitch2"
              data="off"
              checked
            />
            <label
              class="custom-control-label control-package"
              for="customSwitch2"
            >
              Local Sellers
            </label>
          </div>
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="customSwitch3"
              data="off"
              checked
            />
            <label
              class="custom-control-label control-package"
              for="customSwitch3"
            >
              Online Sellers
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="service-lists-wrapper outer-content">
    <div class="container">
      <div class="result-and-sort">
        <div class="headers">
          <p class="result">1,162 services available</p>
          <h2>Services In Web & Mobile Design</h2>
        </div>
        <div class="sort">
          <p>Sort by</p>
          <select name="" id="" class="select2">
            <option value="">best selling</option>
            <option value="">option 1</option>
            <option value="">option 2</option>
            <option value="">option 3</option>
            <option value="">option 4</option>
            <option value="">option 5</option>
          </select>
        </div>
      </div>

      <div class="post-lists">
        <div class="row">
          @foreach($services as $service)
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-box">
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
                  src="{{asset('images/card (1).png')}}"
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
                  <a href="#">{{$service->sellerInfo->first_name}} {{$service->sellerInfo->last_name}}</a>
                  <p class="level">Level 1 Seller</p>
                </div>
                <a href="" class="gig-title">
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
                      <span>{{$packg->price}} </span>
                    @endif
                    @endforeach
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
        <!-- <nav class="pagination-container">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fa fa-angle-left"></i>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#"
                >2 <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#"
                ><i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </nav> -->
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection