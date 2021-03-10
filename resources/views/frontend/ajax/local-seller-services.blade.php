
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
          <a href="{{url('/'.$service->sellerInfo->username)}}">{{$service->sellerInfo->first_name}} {{$service->sellerInfo->last_name}}</a>
          <p class="level">Level 1 Seller</p>
        </div>
        <a href="" class="gig-title">
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
        @if($service->seller_id == auth()->user()->id)
        <i aria-hidden="true" class="fa @if(count($service->favorite) == 0) fa-heart-o @else fa-heart dil @endif favorite{{$service->id}}" title="You can favorite your own service"></i>
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
