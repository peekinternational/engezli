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

  <div class="search-filter-wrapper filter-options">
    <div class="container">
      <div class="outer-content">
        <div class="left">
          <div class="dropdown category-dropdown">
            <button
              class="btn dropdown-toggle selected"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <span>category</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <ul class="category-list">
                @foreach($all_categories as $category)
                <li>
                <a class="dropdown-item main-category" href="{{url('services/'.$category->cat_url)}}">
                  {{$category->cat_title}}
                  <!-- <span>(1)</span> -->
                </a>
                <ul>
                  @foreach(Engezli::get_subcategories($category->id) as $subcat)
                  <li><a class="dropdown-item" href="{{url('services/'.$subcat->cat_url)}}">
                    {{$subcat->cat_title}}
                    <!-- <span>(1)</span> -->
                  </a></li>
                  @endforeach
                </ul>
                </li>
                @endforeach
              </ul>

            </div>
          </div>
          <div class="dropdown seller-details-dropdown">
            <button
              class="btn dropdown-toggle selected"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <span>seller details</span>
            </button>
            <div
              class="dropdown-menu menu-content"
              aria-labelledby="dropdownMenuButton"
            >
              <div class="content-scroll border-bottom py-3 px-4">
                <div class="more-filters">
                  <h6>seller level</h6>
                  <div class="checkbox-lists">
                    <div class="form-check">
                      <input
                        type="checkbox"
                        data-level="Top Rated Seller"
                        class="form-check-input seller-level"
                        id="1"/>
                      <label class="form-check-label" for="1"
                        >top rated seller
                        <!-- <span class="quantity">(1)</span> -->
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        type="checkbox"
                        data-level="Level One Seller"
                        class="form-check-input seller-level"
                        id="2"
                      />
                      <label class="form-check-label" for="2"
                        >level one
                        <!-- <span class="quantity">(1)</span> -->
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        type="checkbox"
                        data-level="Level Two Seller"
                        class="form-check-input seller-level"
                        id="3"
                      />
                      <label class="form-check-label" for="3"
                        >level two
                        <!-- <span class="quantity">(1)</span> -->
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        type="checkbox"
                        data-level="New Seller"
                        class="form-check-input seller-level"
                        id="4"
                      />
                      <label class="form-check-label" for="4"
                        >new seller
                        <!-- <span class="quantity">(1)</span> -->
                      </label>
                    </div>
                  </div>
                  <!-- <span class="show-more-less text-primary">show more</span> -->
                </div>
              </div>
              <div class="btn-row d-flex justify-content-between p-3">
                <button class="btn btn-sm pl-0 text-muted clear_all">
                  clear all
                </button>
                <button class="btn btn-sm btn-primary text-white">
                  apply
                </button>
              </div>
            </div>
          </div>
          <div class="dropdown budget-dropdown">
            <button
              class="btn dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <span>budget</span>
            </button>
            <div
              class="dropdown-menu menu-content"
              aria-labelledby="dropdownMenuButton"
            >
              <div class="input-group border-bottom py-2 px-3">
                <div class="form-group">
                  <label for="">Min.</label>
                  <div class="inner-box">
                    <input id="min" type="number" name="min"
                      class="form-control" placeholder="Any" />
                    <span>$</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Max.</label>
                  <div class="inner-box">
                    <input id="max" type="number" name="max"
                      class="form-control" placeholder="Any"/>
                    <span>$</span>
                  </div>
                </div>
              </div>
              <div class="btn-row d-flex justify-content-between p-3">
                <button class="btn btn-sm pl-0 text-muted clear_all">
                  clear all
                </button>
                <button id="price_btn" class="btn btn-sm btn-primary text-white">
                  apply
                </button>
              </div>
            </div>
          </div>
          <div class="dropdown delivery-time-dropdown">
            <button
              class="btn dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <span>delivery time</span>
            </button>
            <div
              class="dropdown-menu menu-content"
              aria-labelledby="dropdownMenuButton"
            >
              <div class="delivery-radio-lists border-bottom py-2 px-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="delivery_time"
                    id="exampleRadios1"
                    value="1 day"
                    checked
                  />
                  <label class="form-check-label" for="exampleRadios1">
                    express 24H
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="delivery_time"
                    id="exampleRadios2"
                    value="3 day"
                  />
                  <label class="form-check-label" for="exampleRadios2">
                    Up to 3 days
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="delivery_time"
                    id="exampleRadios3"
                    value="7 day"
                  />
                  <label class="form-check-label" for="exampleRadios3">
                    Up to 7 days
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="delivery_time"
                    id="exampleRadios4"
                    value="all day"
                  />
                  <label class="form-check-label" for="exampleRadios4">
                    Anytime
                  </label>
                </div>
              </div>
              <div class="btn-row d-flex justify-content-between p-3">
                <button class="btn btn-sm pl-0 text-muted clear_all">
                  clear all
                </button>
                <button class="btn btn-sm btn-primary text-white">
                  apply
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="local_seller"
              data="off"

            />
            <label
              class="custom-control-label control-package"
              for="local_seller">
              Local Sellers
            </label>
          </div>
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="online_seller"
              data="off"

            />
            <label
              class="custom-control-label control-package"
              for="online_seller">
              online Sellers
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="filtered-tags">
    <div class="container">
      <div class="outer-content tags">
        <!-- <a href="javascript:void(0);">check <span><i class="fa fa-times"></i></span></a> -->
      </div>
    </div>
  </div>

  <div class="service-lists-wrapper outer-content">
    <div class="container" id="services">
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
        <div class="row" id="">
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
                  <p class="level">{{$service->sellerInfo->level}}</p>
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

        <div class="row hidden" id="filter-services">
        </div>
        <nav class="pagination-container">
          {{$services->links()}}
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
var seller_level = [];
var min = '';
var max = '';
var delivery_time = '';
var seller_status = '';
var local_seller = '';
var sort_by = '';
var child_url_id = "{{$child_url_id}}";
var child_url = "{{$child_url}}";
var cat_name = "{{$cat_name}}";

  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#online_seller').click(function(e){
      // e.preventDefault();
      if($('#online_seller').is(":checked")){
        seller_status ="on";
      }else{
        seller_status = "off";
      }
      sort_by = '';
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by},
        success:function(data){
          $("#services").html(data);
          // $("#filter-services").html(data);
        }
      });

    })
    $('#local_seller').click(function(e){
      // e.preventDefault();
      if($('#local_seller').is(":checked")){
         local_seller ="on";
      }else{
         local_seller = "off";
      }
      // alert(local_seller);
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by},
        success:function(data){
          // console.log(data);
          $("#services").html(data);
          // $("#online_seller-service").hide();
          // $("#filter-services").html(data);
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

    $('input[type=radio][name=delivery_time]').change(function(e){
      e.preventDefault();
      delivery_time = $(this).val();
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by},
        cache : false,
        success:function(data){
          // console.log(data);
          $("#services").html(data);
        }
      });

    })

    $(document).change('#sort_by',function(e){
      e.preventDefault();
      sort_by = $('#sort_by').val();
      if (sort_by != undefined) {
          $.ajax({
            url: "{{url('get_services')}}",
            type: 'get',
            data: {seller_level:seller_level,min:min,max:max,
                  delivery_time:delivery_time,seller_status:seller_status,
                  local_seller:local_seller,child_url_id:child_url_id,
                  child_url:child_url,cat_name:cat_name,sort_by:sort_by},
            cache : false,
            success:function(data){
              // console.log(data);
              $("#services").html(data);
            }
          });
      }

    })
var language_id = [];
    $('.language-checkbox').change(function(){
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

    $('#price_btn').on('click',function(){

       min = $('#min').val();
       max = $('#max').val();
      console.log(min,max);
      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by},
        cache: false,
        success:function(data){
          $("#services").html(data);
        }
      });
    })

    $('.clear_all').on('click',function(){
      seller_level = [];
      min = '';
      max = '';
      delivery_time = '';
      seller_status = '';
      local_seller = '';
      var reset = "reset";
      $('.tags').html("");

      $.ajax({
        url: "{{url('get_services')}}",
        type: 'get',
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by,reset:reset},
        cache: false,
        success:function(data){
          // console.log(data);
          $("#services").html(data);
          $("input:checkbox").prop("checked", false);
          $("input").val("");
        }
      });
    })
$('.seller-level').on('change',function () {
  var level = $(this).data('level');
  var id = $(this).attr("id");

  if ($(this).is(':checked')) {
    seller_level.push(level);
    var temp = '<a href="javascript:void(0);" onClick="removeTag('+id+');" id="level-'+id+'">'+level+' <span><i class="fa fa-times"></i></span></a>';
    $('.tags').append(temp);

    $.ajax({
      url: "{{url('get_services')}}",
      type: 'get',
      data: {seller_level:seller_level,min:min,max:max,
            delivery_time:delivery_time,seller_status:seller_status,
            local_seller:local_seller,child_url_id:child_url_id,
            child_url:child_url,cat_name:cat_name,sort_by:sort_by},
      cache: false,
      success:function(data){
        // console.log(data);
        $("#services").html(data);
        // $("#services").hide();
        // $("#filter-services").html(data);
      }
    });
  }else {
    seller_level.splice(seller_level.indexOf(level), 1);
    $('#level-'+id).remove();
  }
});

});
function removeTag(id) {
  $('#level-'+id).remove();
  var level = $("#"+id).data('level');
  seller_level.splice(seller_level.indexOf(level), 1);
  $("#"+id).prop("checked", false);
  $.ajax({
    url: "{{url('get_services')}}",
    type: 'get',
    data: {'seller_level':seller_level},
    cache: false,
    success:function(data){
      // console.log(data);
      $("#services").html(data);
    }
  });
}

$('body').on('click', '.pagination-container a', function(e) {
    e.preventDefault();
   var page = $(this).attr('href').split('page=')[1];
   getArticles(page)
});
 function getArticles(page) {
     location.hash=page;
     var token   = "{{ csrf_Token() }}";
    $.ajax({
        url: "{{url('get_services')}}?page="+page,
        data: {seller_level:seller_level,min:min,max:max,
              delivery_time:delivery_time,seller_status:seller_status,
              local_seller:local_seller,child_url_id:child_url_id,
              child_url:child_url,cat_name:cat_name,sort_by:sort_by,_token:token},
    }).done(function (data) {
      // console.log(data);
        $('#services').html(data);
        // $('#gifid').hide();

    }).fail(function () {
        alert('Articles could not be loaded.');
    });
}
</script>
@endsection
