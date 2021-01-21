@extends('frontend.layouts.app')
@section('title', 'Search  ')
@section('styling')
@endsection
@section('content')
<!-- Category Slider -->
@include('frontend.includes.category-slider')
<!-- Inner Header -->
<div class="search-container">
  <div class="page-headers">
    <div class="container">
      <h2>Results for "<span>{{Request::get('service_title')}}</span>"</h2>
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="">service</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Search Page
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="search-filter-wrapper">
    <div class="container">
      <div class="outer-content">
        <div class="left dropdown-filters">
          <div class="category-select select-box">
            <select name="category_id" class="select2" id="category">
              <option value="">Category</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->cat_title}}</option>
              @endforeach
            </select>
          </div>

          <div class="logo-select select-box">
            <select name="" class="select2" id="">
              <option value="">logo option</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select>
          </div>
          <!-- <div class="sellter-details-select select-box">
            <select name="" class="select2" id="">
              <option value="">seller details</option>
              <option value="">option 1</option>
              <option value="">option 2</option>
              <option value="">option 3</option>
              <option value="">option 4</option>
              <option value="">option 5</option>
            </select>
          </div> -->


          <div class="budget-select select-box">
            <select name="budget" class="select2" id="budget">
              <option value="">budget</option>
              <option value="$5-$50">$5-$50</option>
              <option value="$50-$100">$50-$100</option>
              <option value="$100-1000">$100-1000</option>
              <option value="$1000-$2000">$1000-$2000</option>
            </select>
          </div>

          <!-- <div class="dropdown ml-4">
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
                         <label>Max.</label>
                         <input type="text" placeholder="Any">
                         <i class="fa fa-inr" aria-hidden="true"></i>
                      </div>
                   </div>
                </div>
             </div>
          </div> -->

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
          <!-- <div class="delivery-time-select select-box">
            <select name="" class="select2" id="">
              <option value="">delivery time</option>
              <option value="">1 day</option>
              <option value="">2 day</option>
              <option value="">3 day</option>
              <option value="">4 day</option>
              <option value="">5 day</option>
              <option value="">6 day</option>
              <option value="">7 day</option>
              <option value="">8 day</option>
              <option value="">9 day</option>
              <option value="">10 day</option>
            </select>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <div class="service-lists-wrapper outer-content">
    <div class="container">
      <div class="result-and-sort">
        <div class="headers">
          <p class="result">{{$serviceCount}} services available</p>
          <h2>Search results</h2>
        </div>
        <div class="sort">
          <p>Sort by</p>
          <select name="" id="" class="select2">
            <option value="">best selling</option>
            <option value="">Recommanded</option>
            <option value="">Newest</option>
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
        <div class="row hidden" id="category-services" >
          
        </div>
        <nav class="pagination-container">
          {{$services->links()}}
         <!--  <ul class="pagination">
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
    $('#category').change(function(e){
      e.preventDefault();

      var category = $('#category').val();
      // alert(category);
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data:{category_id:category},
        success:function(data){
          console.log(data);
          $("#services").hide();
          $("#category-services").html(data);
        }
      });

    })
    $('#budget').change(function(e){
      // e.preventDefault();

      var buget = $('#budget').val();
      alert(buget);
      $.ajax({
        url: "{{url('budget_filter_services')}}",
        type: 'get',
        data:{budgt:budget},
        success:function(data){
          console.log(data);
          $("#services").hide();
          $("#category-services").html(data);
        }
      });

    })
  });
</script>
@endsection