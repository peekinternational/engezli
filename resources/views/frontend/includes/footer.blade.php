<!-- footer -->
<footer class="bg-white border-top">
  <div class="container">
    <div class="copyright">
      <div class="logo">
        <a href="{{url('/')}}">
          <img src="{{asset('images/logo.svg')}}">
        </a>
      </div>
      <ul class="social">
        <li>
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
    <p class="text-secondary pb-3">{{ __('home.copyrights')}}
    </p>
    <div class="d-flex justify-content-between pb-5">
      <div class="footer-list">
        <h2>Engezly</h2>
        <ul class="list">
          <li><a href="{{url('/')}}">{{ __('home.Home')}}</a></li>
          <li><a href="#">{{ __('home.How it work')}}</a></li>
          <li><a href="#">{{ __('home.FAQs')}}</a></li>
          <li><a href="#">{{ __('home.Privary Policy')}}</a></li>
        </ul>
      </div>
      <div class="footer-list">
        <h2>{{ __('home.Categories')}}</h2>
        @foreach(Engezli::get_categories()->chunk(4) as $chunk)
        <ul class="list">
          @foreach($chunk as $category)
          <li><a href="{{$category->cat_url}}">{{$category->cat_title}}</a></li>
          @endforeach
        </ul>
        @endforeach
      </div>
      <div class="footer-list">
        <h2><br></h2>
        <ul class="list">
          <li><a href="#">Digital Marketing</a></li>
          <li><a href="#">Web &amp; Development</a></li>
          <li><a href="#">Writing &amp; Translation</a></li>
          <li><a href="#">Training and consulting</a></li>
        </ul>
      </div>
      <div class="footer-list">
        <h2>{{ __('home.payment methods')}}</h2>
        <ul class="list">
          <li><a href="#">Careers</a></li>
          <li><a href="#"><img src="{{asset('frontend-assets/images/footer/visa.png')}}" width="50px"></a></li>
          <li><a href="#"><img src="{{asset('frontend-assets/images/footer/master.png')}}" width="50px"></a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="footer-list">
        <h2>{{ __('home.Support')}}</h2>
        <ul class="list">
          <li><a href="#" >{{ __('home.Help & Support')}}</a></li>
          <li><a href="#">{{ __('home.Trust & Safety')}}</a></li>
          <li><a href="#" >{{ __('home.Selling on Engezly')}}</a></li>
          <li><a href="#">{{ __('home.Buying on Engezly')}}</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
