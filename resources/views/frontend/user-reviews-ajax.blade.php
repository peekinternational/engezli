<div class="review-list-group">
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
</nav>
