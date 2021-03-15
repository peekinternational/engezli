@extends('frontend.layouts.app')
@section('title', 'Profile  ')
@section('styling')
<style>
.pagination-container a{
  margin-right: 20px;
  margin-left: 20px;
}
</style>
@endsection
@section('content')
<div class="seller-profile">
  <div class="containe">
    <div class="outer-content">
      <div class="inner-content">
        <div class="container">
          <div class="inner-box">
            <div class="seller-details">
              <div class="seller-image">
                <div class="avatar">
                  @if($user->facebook_id != Null || $user->google_id != Null)
                  <img class="img-fluid" src="{{Auth::user()->profile_image}}">
                  @elseif($user->profile_image != Null)
                  <img class="img-fluid" src="{{asset('images/user_images/'.$user->profile_image)}}">
                  @else
                  <img src="{{asset('images/avatar (1).svg')}}" alt="" />
                  @endif
                </div>
                <div class="level">level two</div>
              </div>

              <div class="name-designation-rating">
                <h2 class="name">{{$user->first_name}} {{$user->last_name}}</h2>
                <p class="designation">{{$user->occuption}}</p>
                <div class="rating">
                  <?php
                    $total_reviews = count($user->userReviews);
                    $starAvg     = ($user->userReviews != null) ? $user->userReviews->avg('overall_rating') : 0;
                    $comunicationAvg     = ($user->userReviews != null) ? $user->userReviews->avg('communication_rating') : 0;
                    $recommentAvg     = ($user->userReviews != null) ? $user->userReviews->avg('recommend_rating') : 0;
                    $serviceAvg     = ($user->userReviews != null) ? $user->userReviews->avg('service_rating') : 0;

                   ?>
                   <ul>
                     <li><i class="fa fa-star avg-star-1 {{($starAvg >= 1) ? 'yellow-star' : 'grey-star'}}"></i></li>
                     <li><i class="fa fa-star avg-star-2 {{($starAvg >= 2) ? 'yellow-star' : 'grey-star'}}"></i></li>
                     <li><i class="fa fa-star avg-star-3 {{($starAvg >= 3) ? 'yellow-star' : 'grey-star'}}"></i></li>
                     <li><i class="fa fa-star avg-star-4 {{($starAvg >= 4) ? 'yellow-star' : 'grey-star'}}"></i></li>
                     <li><i class="fa fa-star avg-star-5 {{($starAvg >= 5) ? 'yellow-star' : 'grey-star'}}"></i></li>
                   </ul>
                  <div class="no-of-rating">{{number_format($starAvg, '1', '.','')}} <span>({{$total_reviews}})</span></div>
                </div>
              </div>

              <div class="contact-btns">
                <a href="" class="btn">{{ __('home.Contact Me')}}</a>
                <div class="dropdown">
                  <button
                    class="btn"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-ellipsis-h"></i>
                  </button>
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#"
                      >Something else here</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="cover-photo">
            <img src="{{asset('images/cover-photo.jpg')}}" alt="" />
          </div>
        </div>
      </div>

      <div class="tab-header">
        <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="project-tab"
                data-toggle="tab"
                href="#project"
                role="tab"
                aria-controls="project"
                aria-selected="true"
                >{{ __('home.Projects')}} {{$serviceCount}}</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="about-tab"
                data-toggle="tab"
                href="#about"
                role="tab"
                aria-controls="about"
                aria-selected="false"
                >{{ __('home.About')}}</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="review-tab"
                data-toggle="tab"
                href="#review"
                role="tab"
                aria-controls="review"
                aria-selected="false"
                >{{ __('home.Review')}} {{$total_reviews}}</a
              >
            </li>
          </ul>
          <!-- <select name="" id="" class="select2>
            <option value="">recent</option>
            <option value="">option 1</option>
            <option value="">option 2</option>
            <option value="">option 3</option>
            <option value="">option 4</option>
            <option value="">option 5</option>
          </select> -->
        </div>
      </div>

      <div class="profile-details">
        <div class="container">
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active projects"
              id="project"
              role="tabpanel"
              aria-labelledby="project-tab"
            >
              <div class="row">
                @foreach($userServices as $service)
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box mb-4">
                  <a class="edit_project" href="{{url('create-service/'.$service->id.'/edit')}}"><i class="fa fa-edit"></i></a>
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
                        <p class="level">{{ __('home.Level')}} 1 {{ __('home.Seller')}}</p>
                      </div>
                      <a href="{{url('/'.$service->sellerInfo->username.'/'.$service->service_url)}}" class="gig-title">
                        {{$service->service_title}}
                      </a>
                      <?php
                      $totalgig_reviews = count($service->serviceRating);
                      $gigAvg     = ($service->serviceRating != null) ? round($service->serviceRating->avg('overall_rating')) : 0;
                       ?>
                      <div class="content-info">
                        <div class="rating-wrapper">
                          <span class="gig-rating text-body-2">
                            <i class="fa fa-star"></i>
                            {{number_format($gigAvg, '1', '.','')}}
                            <span>({{$totalgig_reviews}})</span>
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
                          {{ __('home.Starting At')}}
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

              <nav class="pagination-container">
                {{$userServices->links()}}
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

            <div
              class="tab-pane fade about"
              id="about"
              role="tabpanel"
              aria-labelledby="about-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                  <div class="outer-tab-box">
                    <div class="box biography">
                      <h5>{{ __('home.biography')}}</h5>
                      <p>{{$user->bio}}</p>
                    </div>
                    <div class="box languages">
                      <h5>{{ __('home.Languages')}}</h5>
                        <?php $langData = json_decode($user->language_id);?>
                      <ul>
                      @if($langData != null)
                        @foreach($langData as $userLang)
                        <li>{{Engezli::get_language($userLang)->language_title}}</li>
                        @endforeach
                      @endif
                      </ul>
                    </div>
                    <div class="box skills">
                      <h5>{{ __('home.Skills')}}</h5>
                      <?php $skil = json_decode($user->skills_id);?>
                      <ul>
                      @if($skil != '')
                        @foreach($skil as $userSkil)
                        <li>{{Engezli::get_skill($userSkil)->skill_title}}</a></li>
                        @endforeach
                      @endif
                      </ul>
                    </div>
                    <div class="box education">
                      <h5>{{ __('home.Education')}}</h5>
                      <div class="education-list">
                        <div class="list-item">
                          @if($userEdu != '')
                          <h6>{{$userEdu->major}}</h6>
                          <p>
                            {{$userEdu->institute}}, {{$userEdu->country}}, Graduated {{$userEdu->degree_year}}
                          </p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="box linked-acounts">
                      <h5>{{ __('home.Linked Accounts')}}</h5>
                      <ul>
                        <li>
                          <a href="">
                            <p><i class="fab fa-facebook-f"></i></p>
                            facebook
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <p><i class="fab fa-linkedin-in"></i></p>
                            linkedin
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                  <div class="seller-activity">
                    <ul>
                      <li>
                        <i class="fa fa-map-marker-alt"></i>{{$user->country}}
                      </li>
                      <li>
                        <i class="fa fa-address-card"></i><?php echo date('F Y', strtotime($user->member_since)); ?>
                      </li>
                      <li>
                        <i class="fa fa-clock"></i>avg response time 2hrs
                      </li>
                      <li>
                        <i class="fa fa-paper-plane"></i>last delivery 7
                        days
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="tab-pane fade reviews"
              id="review"
              role="tabpanel"
              aria-labelledby="review-tab"
            >

              <div class="review-headers">
                <div class="inner-box">
                  <h5>{{$total_reviews}} @if($total_reviews > 1) {{ __('home.Reviews')}} @else {{ __('home.Review')}} @endif</h5>
                  <div class="rating">
                    <ul>
                      <li><i class="fa fa-star avg-star-1 {{($starAvg >= 1) ? 'yellow-star' : 'grey-star'}}"></i></li>
                      <li><i class="fa fa-star avg-star-2 {{($starAvg >= 2) ? 'yellow-star' : 'grey-star'}}"></i></li>
                      <li><i class="fa fa-star avg-star-3 {{($starAvg >= 3) ? 'yellow-star' : 'grey-star'}}"></i></li>
                      <li><i class="fa fa-star avg-star-4 {{($starAvg >= 4) ? 'yellow-star' : 'grey-star'}}"></i></li>
                      <li><i class="fa fa-star avg-star-5 {{($starAvg >= 5) ? 'yellow-star' : 'grey-star'}}"></i></li>
                    </ul>
                    <div class="no-of-rating">{{number_format($starAvg, '1', '.','')}}</div>
                  </div>
                </div>
                <div class="review-category">
                  <div class="box">
                    <h6>{{ __('home.Seller communication level')}}</h6>
                    <p>{{number_format($comunicationAvg, '1', '.','')}} <i class="fa fa-star"></i></p>
                  </div>
                  <div class="box">
                    <h6>{{ __('home.Recommend to a friend')}}</h6>
                    <p>{{number_format($recommentAvg, '1', '.','')}} <i class="fa fa-star"></i></p>
                  </div>
                  <div class="box">
                    <h6>{{ __('home.Service as described')}}</h6>
                    <p>{{number_format($serviceAvg, '1', '.','')}} <i class="fa fa-star"></i></p>
                  </div>
                </div>
              </div>
              <div class="show_reviews">
                <div class="review-list-group ">
                  @foreach($userReviews as $review)
                  <div class="review-list-item">
                    <div class="user-img">
                      <div class="avatar">
                        @if($review->buyerInfo->profile_image != null)
                        <img src="{{asset('images/user_images/'.$review->buyerInfo->profile_image)}}" alt="" />
                        @else
                        <img src="{{asset('images/s1.png')}}" alt="" />
                        @endif
                      </div>
                    </div>
                    <div class="comments">
                      <div class="review-inner-content">
                        <a href="" class="name">
                          {{$review->buyerInfo->first_name}} {{$review->buyerInfo->last_name}}
                          <span> <i class="fa fa-star"></i>{{number_format($review->overall_rating, '1', '.','')}}</span></a>
                          <p class="desc">
                            {{$review->review}}
                          </p>
                          <?php
                          $date = date('d M, Y', strtotime($review->date))
                          ?>
                          <p class="posted-time">{{$date}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>

                  <nav class="pagination-container">
                    {{$userReviews->render()}}
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
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$('body').on('click', '.pagination-container a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
   getArticles(page)
   // alert(page);
});
 function getArticles(page) {
     location.hash=page;
     var token   = "{{ csrf_Token() }}";
     var id = "{{$user->id}}"
    $.ajax({
        url : '/profile_ajax/?page='+page,
        data: {id:id,_token:token},
    }).done(function (data) {
      console.log(data);
        $('.show_reviews').html(data);

    }).fail(function () {
        alert('Articles could not be loaded.');
    });
}
</script>
@endsection
