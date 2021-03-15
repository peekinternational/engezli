@extends('frontend.layouts.app')
@section('title', 'Services  ')
@section('styling')
@endsection
@section('content')
<?php $child_url_id = Request::segment(3);
$child_url = request()->segment(count(request()->segments(3)));

?>
<!-- Category Slider -->
@include('frontend.includes.category-slider')
<!-- Maan tabs -->
<div class="search-container service-page-header">
  <div class="page-headers">
    <div class="container">
      <h2>Service lists</h2>
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="">Services</a></li>
          <li class="breadcrumb-item"><a href="" @if($child_url_id == '') style="color: #0099ff" @endif>{{$cat_name}}</a></li>
          @if($child_url_id != '')
          <li class="breadcrumb-item active" aria-current="page">
            {{Engezli::get_subCatName($child_url)->cat_title}}
          </li>
          @else

          @endif
        </ol>
      </nav>
    </div>
  </div>

  <div class="filter-options">
    <div class="container">
      <div class="outer-content">
        <div class="left">
          <div class="sellter-details-select dropdown-filters select-box">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Seller Details
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="options">
                     <h5>Seller Level</h5>
                     <div class="row" id="level_filter">
                        @foreach($sellerLevels as $level)
                        <div class="col-md-6">
                           <label class="custom-checkbox">{{$level->level_title}}
                           <span class="count"></span>
                           <input type="checkbox" value="{{$level->id}}" id="level{{$level->id}}">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="options">
                     <h5>Seller Speaks</h5>
                     <div class="row" id="language_filter">
                        @foreach($languages as $language)
                        <div class="col-md-6">
                           <label class="custom-checkbox">{{$language->language_title}}
                           <span class="count"></span>
                           <input type="checkbox" value="{{$language->id}}" id="language{{$language->id}}">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="options">
                     <h5>Seller Lives In</h5>
                     <div class="row" id="country_filter">
                      @foreach($sellerCountries as $country)
                        <div class="col-md-6">
                           <label class="custom-checkbox">{{$country->country}}
                           <span class="count"></span>
                           <input type="checkbox" value="{{$country->country}}">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="options">
                     <!-- <h5>Seller Lives In</h5> -->
                     <div class="row">
                        <div class="col-md-6">
                           <label class="custom-checkbox">Reset Filter
                           <span class="count"></span>
                           <input type="checkbox" value="reset" id="reset">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <select name="" class="select2" id="">
              <option value="">seller details</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select> -->
          </div>

          <div class="budget-select select-box">
            <select name="budgets" class="select2" id="budget">
              <option value="">budget</option>
              <option value="5-50">$5-$50</option>
              <option value="50-100">$50-$100</option>
              <option value="100-1000">$100-$1000</option>
              <option value="1000-2000">$1000-$2000</option>
            </select>
          </div>

          <div class="delivery-time-select select-box">
            <select name="delivery_time" class="select2" id="delivery_time">
              <option value="">delivery time</option>
              <option value="1 day">24 H</option>
              <option value="3 day">Up to 3 days</option>
              <option value="7 day">Up to 7 days</option>
              <option value="all day">Anytime</option>
            </select>
          </div>
        </div>
        <div class="right">
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="pro_service"
              data="off"
            />
            <label
              class="custom-control-label control-package"
              for="pro_service"
            >
              Pro Services
            </label>
          </div>
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="local_seller"
              data="off"
            />
            <label
              class="custom-control-label control-package"
              for="local_seller"
            >
              Local Sellers
            </label>
          </div>
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="online_seller"
              data="off"
              value="online"
            />
            <label
              class="custom-control-label control-package"
              for="online_seller"
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
          <p class="result">{{$serviceCount}} services available</p>
          <h2>Services In
            @if($child_url_id != '')
            <span>
              {{Engezli::get_subCatName($child_url)->cat_title}}
            </span>
            @else
              {{$cat_name}}
            @endif
            </h2>
        </div>
        <div class="sort">
          <p>Sort by</p>
          <select name="sort_by" id="sort_by" class="select2">
            <option value="best selling">best selling</option>
            <option value="recommanded">Recommanded</option>
            <option value="newest">Newest</option>
          </select>
        </div>
      </div>

      <div class="post-lists">
        <div class="row" id="services">
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
        <!-- <div class="row hidden" id="online_seller-service">

        </div>
        <div class="row hidden" id="local_seller-service">

        </div> -->
        <div class="row hidden" id="filter-services">

        </div>
        <nav class="pagination-container">
          {{$services->links()}}
          <!-- <ul class="pagination">
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
          </ul> -->
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#online_seller').click(function(e){
      // e.preventDefault();
      if($('#online_seller').is(":checked")){
        var seller_status ="on";
      }else{
        var seller_status = "off";
      }
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{seller_status:seller_status},
        success:function(data){
          console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });

    })
    $('#local_seller').click(function(e){
      // e.preventDefault();
      if($('#local_seller').is(":checked")){
        var local_seller ="on";
      }else{
        var local_seller = "off";
      }
      // alert(local_seller);
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{seller_country:local_seller},
        success:function(data){
          console.log(data);
          $("#services").hide();
          $("#online_seller-service").hide();
          $("#filter-services").html(data);
        }
      });

    })

    $('#budget').change(function(e){
      e.preventDefault();

      var budget = $('#budget').val();
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{budget:budget},
        cache : false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });

    })

    $('#delivery_time').change(function(e){
      e.preventDefault();

      var delivery_time = $('#delivery_time').val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{delivery_time:delivery_time},
        cache : false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });

    })

    $('#sort_by').change(function(e){
      e.preventDefault();

      var sort_by = $('#sort_by').val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{sort_by:sort_by},
        cache : false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });

    })

    $('#language_filter :checkbox').change(function(){

      var language_id = $(this).val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {'language_id':language_id},
        cache: false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });
    })

    $('#level_filter :checkbox').change(function(){

      var level_id = $(this).val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {'level_id':level_id},
        cache: false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });
    })

    $('#country_filter :checkbox').change(function(){

      var country = $(this).val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {'country':country},
        cache: false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });
    })

    $('#reset').change(function(){

      var reset = $(this).val();

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {'reset':reset},
        cache: false,
        success:function(data){
          // console.log(data);
          $("#services").hide();
          $("#filter-services").html(data);
        }
      });
    })

  });
</script>
@endsection
