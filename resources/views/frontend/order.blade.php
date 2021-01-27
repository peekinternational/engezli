@extends('frontend.layouts.app')
@section('title', 'Order  ')
@section('styling')
@endsection
@section('content')
<!-- Contact Us -->
<div class="create-service order-request">
  <div class="create-service-tabs">
    <div class="container">
      <div class="inner-service-content-box">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="overview-tab"
              data-toggle="tab"
              href="#overview"
              role="tab"
              aria-controls="overview"
              aria-selected="true"
              >order details</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="pricing-tab"
              data-toggle="tab"
              href="#pricing"
              role="tab"
              aria-controls="pricing"
              aria-selected="false"
              >confirm & pay</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="descriptionFaq-tab"
              data-toggle="tab"
              href="#descriptionFaq"
              role="tab"
              aria-controls="descriptionFaq"
              aria-selected="false"
              >submit request</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="outer-content">
    <div class="container">
      <div class="inner-content">
        <div class="service-tab-content">
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="overview"
              role="tabpanel"
              aria-labelledby="overview-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <div class="order-details">
                    <div class="outer-box">
                      <h5>Customize your package</h5>
                      <div class="inner-box">
                        <div class="box">
                          <img src="images/s1.png" alt="" />
                        </div>
                        <div class="box">
                          <h6 class="gig-title">digital agency website</h6>
                          <p>
                            by
                            <span class="name">john william</span>
                            <span class="rating">
                              <i class="fa fa-star"></i>
                              5
                            </span>
                            <span class="review">(1k+)</span>
                          </p>
                        </div>
                        <div class="box">
                          <span class="qty-text">Qty</span>
                          <span class="quantity">
                            <button class="btn">
                              <i class="fa fa-minus"></i>
                            </button>
                            <input type="text" placeholder="5" />
                            <button class="btn">
                              <i class="fa fa-plus"></i>
                            </button>
                          </span>
                          <span class="price"> $65 </span>
                        </div>
                      </div>
                    </div>

                    <div class="outer-box add-extra-service">
                      <h5>Add extra</h5>
                      <div class="list-group">
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck1"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck1"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck2"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck2"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck3"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck3"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                          <div class="text">
                            <p>
                              Lorem ipsum dolor sit amet consectetur
                              adipisicing elit. Ad delectus quasi quis
                              earum, aut incidunt eos deleniti a excepturi,
                              dolor quas asperiores enim placeat vitae sint
                              laboriosam, explicabo eligendi dolore!
                            </p>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck14"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck14"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck15"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck15"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-box">
                            <div class="form-check">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck16"
                              />
                              <label
                                class="form-check-label"
                                for="exampleCheck16"
                                >Extra fast 1 day delivery</label
                              >
                            </div>
                            <div class="price">$5</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>summary</h5>
                        <ul class="list-group">
                          <li>
                            <span>subtotal</span>
                            <span>$65</span>
                          </li>
                          <li>
                            <span>service fee</span>
                            <span>$5</span>
                          </li>
                        </ul>
                        <ul class="list-group">
                          <li>
                            <span>delivery time</span>
                            <span>4 days</span>
                          </li>
                          <li>
                            <span><strong>total</strong></span>
                            <span><strong>$70</strong></span>
                          </li>
                        </ul>
                        <a href="" class="btn custom-btn"> place order </a>
                        <small>You won't be changed yet</small>
                      </div>
                    </div>

                    <div class="payment-methods card mt-3">
                      <ul>
                        <li>
                          <a href="">
                            <img src="images/fawry.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img src="images/visa.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img src="images/mastercard.svg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <img
                              src="images/Meeza_Egyptian_company_logo.svg"
                              alt=""
                            />
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade pricing-tab-container"
              id="pricing"
              role="tabpanel"
              aria-labelledby="pricing-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <div class="confirm-and-pay">
                    <div class="outer-box">
                      <div class="payment-tab-container">
                        <div class="lists-item">
                          <h5>saved cards</h5>
                          <div class="inner-box">
                            <p class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="exampleRadios"
                                id="exampleRadios1134"
                                value="option1"
                                checked
                              />
                              <label
                                class="form-check-label"
                                for="exampleRadios1134"
                              >
                                <img src="images/mastercard.svg" alt="" />
                                MasterCard Ending in *****8900
                                <span class="expire-date">
                                  expires 30/2</span
                                >
                              </label>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="outer-box mt-4">
                      <div class="add-payment-method">
                        <h5>more payment options</h5>

                        <div class="payment-option">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="exampleRadios"
                              id="exampleRadios11"
                              value="option1"
                              checked
                            />
                            <label
                              class="form-check-label"
                              for="exampleRadios11"
                            >
                              <img src="images/mastercard.svg" alt="" />
                              Master Card
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="exampleRadios"
                              id="exampleRadios22"
                              value="option2"
                            />
                            <label
                              class="form-check-label"
                              for="exampleRadios22"
                            >
                              <img src="images/visa.svg" alt="" /> Visa Card
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="exampleRadios"
                              id="exampleRadios33"
                              value="option3"
                            />
                            <label
                              class="form-check-label"
                              for="exampleRadios33"
                            >
                              <img src="images/fawry.svg" alt="" /> Fawary
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>summary</h5>

                        <div class="gig-details">
                          <div class="box">
                            <img src="images/s1.png" alt="" />
                          </div>
                          <div class="box">
                            <h6>Digital agency website</h6>
                            <p>
                              Lorem ipsum dolor sit amet consectetur,
                              adipisicing elit. Voluptate, aliquam.
                            </p>
                          </div>
                        </div>

                        <ul class="list-group">
                          <li>
                            <span>subtotal</span>
                            <span>$65</span>
                          </li>
                          <li>
                            <span>service fee</span>
                            <span>$5</span>
                          </li>
                        </ul>

                        <ul class="list-group">
                          <li>
                            <span>delivery time</span>
                            <span>4 days</span>
                          </li>
                          <li>
                            <span><strong>total</strong></span>
                            <span><strong>$70</strong></span>
                          </li>
                        </ul>

                        <a href="" class="btn custom-btn"> confirm & pay </a>

                        <small
                          >By clicking Confirm and Pay you will be
                          charged</small
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade descriptionFaq-tab"
              id="descriptionFaq"
              role="tabpanel"
              aria-labelledby="descriptionFaq-tab"
            >
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                  <div class="submit-request">
                    <div class="confirm-purchase outer-box">
                      <div class="box">
                        <h5 class="mb-2">Thank you for your purchase</h5>
                        <p>A reciept was sent to your email</p>
                      </div>
                      <div class="box">
                      <p><i class="fa fa-check" aria-hidden="true"></i></p>
                      </div>
                    </div>

                    <div class="outer-box mt-4">
                      <div class="heading">
                        <h5>Submit requirements to start your order</h5>
                        <p>
                          The seller need the require information to start
                          working on your order
                        </p>
                      </div>

                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>1.</span> Logo in size 250*250
                        </h6>

                        <textarea
                          class="form-control"
                          name=""
                          id=""
                          rows="3"
                          placeholder="Write here..."
                        ></textarea>
                        <p>
                          <span class="length">0/2050</span>
                          <span class="form-field-file">
                            <label
                              for="cv-arquivo"
                              aria-label="Attach file"
                              class="btn1"
                            >
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              name="cv-arquivo"
                              id="cv-arquivo"
                              class="field-file"
                            />
                          </span>
                        </p>
                      </div>

                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>2.</span> Description about new service
                        </h6>

                        <textarea
                          class="form-control"
                          name=""
                          id=""
                          rows="3"
                          placeholder="Write here..."
                        ></textarea>
                        <p>
                          <span class="length">0/2050</span>
                          <span class="form-field-file">
                            <label
                              for="cv-arquivo"
                              aria-label="Attach file"
                              class="btn1"
                            >
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              name="cv-arquivo"
                              id="cv-arquivo"
                              class="field-file"
                            />
                          </span>
                        </p>
                      </div>

                      <div class="requirement-box">
                        <h6 class="mb-3">
                          <span>3.</span> Description about new service
                        </h6>

                        <textarea
                          class="form-control"
                          name=""
                          id=""
                          rows="3"
                          placeholder="Write here..."
                        ></textarea>
                        <p>
                          <span class="length">0/2050</span>
                          <span class="form-field-file">
                            <label
                              for="cv-arquivo"
                              aria-label="Attach file"
                              class="btn1"
                            >
                              <i
                                class="fa fa-paperclip"
                                aria-hidden="true"
                              ></i>
                            </label>

                            <input
                              type="file"
                              name="cv-arquivo"
                              id="cv-arquivo"
                              class="field-file"
                            />
                          </span>
                        </p>
                      </div>
                    </div>

                    <div class="request-btn-wrap mt-4">
                      <div class="mb-3 form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="exampleCheck1"
                        />
                        <label class="form-check-label" for="exampleCheck1"></label>
                          <small
                            >Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Et, deleniti.</small
                          >
                        </label>
                      </div>

                      <div class="btn-container">
                        <a href="" class="btn custom-btn"
                          >Reminde me later</a
                        >
                        <a href="" class="btn custom-btn">Start Order</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                  <div class="summary-wrapper">
                    <div class="card">
                      <div class="card-body">
                        <h5>summary</h5>

                        <div class="gig-details">
                          <div class="box">
                            <img src="images/s1.png" alt="" />
                          </div>
                          <div class="box">
                            <h6>Digital agency website</h6>
                            <p>
                              Lorem ipsum dolor sit amet consectetur,
                              adipisicing elit. Voluptate, aliquam.
                            </p>
                          </div>
                        </div>

                        <ul class="list-group">
                          <li>
                            <span>status</span>
                            <span class="status incomplete"
                              >incomplete</span
                            >
                          </li>
                          <li>
                            <span>order number</span>
                            <span>98946546879897</span>
                          </li>
                        </ul>

                        <ul class="list-group">
                          <li>
                            <span>order date</span>
                            <span>12 June, 2020</span>
                          </li>
                          <li>
                            <span><strong>price</strong></span>
                            <span><strong>$70</strong></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Order -->
@endsection
@section('script')
@endsection