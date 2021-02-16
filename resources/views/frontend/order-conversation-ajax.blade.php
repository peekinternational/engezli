@if($conversation->status == 'message')
<div class="tab-list-item user-reply">
  <div class="t-header">
    <div class="box-item">
      @if($conversation->userInfo->profile_image !=null)
      <img src="{{asset('images/user_images/'.$conversation->userInfo->profile_image)}}" alt="" />
      @else
      <img src="{{asset('images/s1.png')}}" alt="" />
      @endif
    </div>
    <div class="box-item">
      <button
        class="btn btn-link btn-block pl-0"
        type="button"
        data-toggle="collapse"
        data-target="#collapseOne561"
        aria-expanded="true"
        aria-controls="collapseOne561"
      >
        <h6 class="text-primary">
          {{$conversation->userInfo->first_name}} {{$conversation->userInfo->last_name}}
          <?php
          $time = date('h:i A', strtotime($conversation->created_at))
           ?>
          <span class="time">{{$time}}</span>
        </h6>
      </button>
    </div>
  </div>
  <div class="t-body">
    <div
      class="accordion custom-accordion"
      id="accordionExamplesd{{$conversation->id}}"
    >
      <div class="card">
        <div
          id="collapseOne561"
          class="collapse show"
          data-parent="#accordionExamplesd{{$conversation->id}}"
        >
          <div class="card-body">
            <p>{{$conversation->message}}</p>
            <!-- <p>
              Lorem ipsum dolor sit amet consectetur
              adipisicing elit. Et, voluptas!
            </p> -->
            <!-- <a href="" class="report-btn">
              <i class="fa fa-flag"></i>
              report
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
