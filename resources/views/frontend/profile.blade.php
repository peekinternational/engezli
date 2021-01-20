@extends('frontend.layouts.app')
@section('title', 'Profile  ')
@section('styling')
@endsection
@section('content')
<div class="seller-profile">
  <div class="container">
    <div class="outer-content">
      <div class="inner-content">
        <div class="inner-box">
          <div class="seller-details">
            <div class="seller-image">
              <div class="avatar">
                <img src="images/avatar (1).svg" alt="" />
              </div>
              <div class="level">level two</div>
            </div>

            <div class="name-designation-rating">
              <h2 class="name">{{$user->first_name}} {{$user->last_name}}</h2>
              <p class="designation">UI/UX Designer</p>
              <div class="rating">
                <ul>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="no-of-rating">5.0 <span>(1k+)</span></div>
              </div>
            </div>

            <div class="contact-btns">
              <a href="" class="btn">contact me</a>
              <div class="dropdown">
                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="fa fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="cover-photo">
          <img src="images/cover-photo.jpg" alt="" />
        </div>
      </div>

      <div class="profile-details">
        <div class="tab-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="project-tab" data-toggle="tab" href="#project" role="tab"
                aria-controls="project" aria-selected="true">projects 25</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                aria-selected="false">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                aria-selected="false">review 200</a>
            </li>
          </ul>
          <select name="" id="" class="custom-select">
            <option value="">recent</option>
            <option value="">option 1</option>
            <option value="">option 2</option>
            <option value="">option 3</option>
            <option value="">option 4</option>
            <option value="">option 5</option>
          </select>
        </div>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active projects" id="project" role="tabpanel" aria-labelledby="project-tab">
            <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (1).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href="" class="active"><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (2).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (2).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (3).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (3).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href="" class="active"><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (4).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (1).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href="" class="active"><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (2).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (2).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (3).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (3).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (4).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href="" class="active"><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (1).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (2).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (2).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (3).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (3).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (4).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (1).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (2).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (2).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (3).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (3).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (4).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (1).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (2).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (2).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (3).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (3).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-box">
                <div class="card-box">
                  <div class="card-img-top">
                    <img src="images/card (4).png" alt="" />
                  </div>

                  <div class="card-body">
                    <div class="outer-card-box">
                      <a href="" class="inner-card-box">
                        <div class="avatar">
                          <img src="images/avatar (1).svg" alt="" />
                        </div>
                        <div class="name-and-level">
                          <h6 class="author-name">Sohanur Rahman</h6>
                          <p>level two seller</p>
                        </div>
                      </a>
                      <div class="rating">
                        <div class="no-of-rating">
                          5.0 <span>(1k+)</span>
                        </div>
                      </div>
                    </div>

                    <a href="" class="post-title">
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Quae, saepe!
                    </a>
                  </div>
                  <div class="price-and-save">
                    <p>Starting at $20</p>
                    <a href=""><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>

            </div>

            <nav class="pagination-container">
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
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

          <div class="tab-pane fade about" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="row">
              <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                <div class="outer-tab-box">
                  <div class="box biography">
                    <h5>biography</h5>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Doloremque fuga cum obcaecati, quod ipsum nisi.
                      Aperiam doloribus doloremque quisquam aliquid
                      obcaecati, facilis libero. Maiores culpa assumenda,
                      vel velit nulla eligendi!
                    </p>
                  </div>
                  <div class="box languages">
                    <h5>languages</h5>
                    <ul>
                      <li>English</li>
                      <li>French</li>
                      <li>Arabic</li>
                    </ul>
                  </div>
                  <div class="box skills">
                    <h5>skills</h5>
                    <ul>
                      <li>web</li>
                      <li>UI</li>
                      <li>front-end</li>
                      <li>web design</li>
                      <li>UX</li>
                      <li>back-end</li>
                    </ul>
                  </div>
                  <div class="box education">
                    <h5>education</h5>
                    <div class="education-list">
                      <div class="list-item">
                        <h6>M.B.A. - Business administration</h6>
                        <p>
                          university of dallas, united states, graduated
                          2015
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="box linked-acounts">
                    <h5>linked accounts</h5>
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
                      <i class="fa fa-map-marker-alt"></i>Sarasota, FL
                    </li>
                    <li>
                      <i class="fa fa-address-card"></i>member since july
                      2018
                    </li>
                    <li>
                      <i class="fa fa-clock"></i>avg response time 2hrs
                    </li>
                    <li>
                      <i class="fa fa-paper-plane"></i>last delivery 7 days
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade reviews" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="review-headers">
              <div class="inner-box">
                <h5>200 reviews</h5>
                <div class="rating">
                  <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  <div class="no-of-rating">4.8</div>
                </div>
              </div>
              <div class="review-category">
                <div class="box">
                  <h6>seller communication level</h6>
                  <p>4.8 <i class="fa fa-star"></i></p>
                </div>
                <div class="box">
                  <h6>recommend to a friend</h6>
                  <p>4.8 <i class="fa fa-star"></i></p>
                </div>
                <div class="box">
                  <h6>service as described</h6>
                  <p>4.8 <i class="fa fa-star"></i></p>
                </div>
              </div>
            </div>

            <div class="review-list-group">

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (1).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up active"><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>

                  <div class="sub-comments">
                    <div class="user-img">
                      <div class="avatar">
                        <img src="images/avatar (3).svg" alt="">
                      </div>
                    </div>
                    <div class="review-inner-content">
                      <a href="" class="name">john william <span>(seller)</span></a>
                      <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat
                        delectus</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (2).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up "><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (3).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up "><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (1).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up "><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (2).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up "><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-list-item">
                <div class="user-img">
                  <div class="avatar">
                    <img src="images/avatar (3).svg" alt="">
                  </div>
                </div>
                <div class="comments">
                  <div class="review-inner-content">
                    <a href="" class="name">Ali ahmed <span> <i class="fa fa-star"></i> 5.0</span></a>
                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat delectus
                      esse illo
                      necessitatibus adipisci fugiat? Ipsum, architecto molestiae ratione deleniti fuga cumque
                      excepturi, inventore autem facilis incidunt consectetur voluptatum?</p>

                    <p class="posted-time">14 hours ago</p>

                    <div class="btns-group">
                      <a href="" class="thumbs-up active"><i class="fa fa-thumbs-up"> </i>helpful</a>
                      <a href="" class="thumbs-down"><i class="fa fa-thumbs-down"> </i>not helpful</a>
                    </div>
                  </div>

                  <div class="sub-comments">
                    <div class="user-img">
                      <div class="avatar">
                        <img src="images/avatar (1).svg" alt="">
                      </div>
                    </div>
                    <div class="review-inner-content">
                      <a href="" class="name">john william <span>(seller)</span></a>
                      <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, placeat
                        delectus</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <nav class="pagination-container">
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
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
            </nav>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection