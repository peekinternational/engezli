@extends('frontend.layouts.master')
@section('title', 'Order  ')
@section('styling')
@endsection
@section('content')
<!-- Contact Us -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <ul class="nav nav-pills align-items-center order-tab" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-orderDetail-tab" data-toggle="pill" href="#pills-orderDetail" role="tab" aria-controls="pills-all" aria-selected="true">Order Details</a>
          </li> <span>&nbsp; > &nbsp;</span>
          <li class="nav-item">
            <a class="nav-link" id="pills-confirmPay-tab" data-toggle="pill" href="#pills-confirmPay" role="tab" aria-controls="pills-confirmPay" aria-selected="true">Confirm and Pay</a>
          </li> <span>&nbsp; > &nbsp;</span>
          <li class="nav-item">
            <a class="nav-link" id="pills-requirement-tab" data-toggle="pill" href="#pills-requirement" role="tab" aria-controls="pills-requirement" aria-selected="false">Submit Requirements</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <!-- Order Detail Tab -->
      <div class="tab-pane fade show active" id="pills-orderDetail" role="tabpanel" aria-labelledby="pills-orderDetail-tab">
        <div class="row mt-5 mb-3">
          <div class="col-lg-7 col-md-7">
            <div class="customize-order border p-3 mb-3">
              <h6 class="font-weight-bold mb-4">Customize Your Package</h6>
              <div class="row">
                <div class="col-md-2 pr-0 d-flex align-items-center">
                  <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
                </div>
                <div class="col-md-6">
                  <p class="font-weight-bold mb-0">Digital Agency Website</p>
                  <div class="d-flex">
                    <p>by <a href="">zeeshan</a> | </p> 
                    <div class="rating-wrapper">
                      <span class="gig-rating text-body-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                          <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                          </path>
                        </svg>
                        5.0
                        <span>(7)</span>
                      </span>
                    </div>
                  </div>
                  <p class="mb-0 pt-3 small"><span class=" text-primary">view more details</span> <i class="fa fa-chevron-down"></i></p>
                </div>
                <div class="col-md-3 col-6">
                  <span>Qty</span>
                  <div class="input-counter">
                    <span class="minus-btn"><i class="fa fa-minus"></i></span>
                    <input type="text" name="quantity" value="1" min="1" max="10">
                    <span class="plus-btn"><i class="fa fa-plus"></i></span>
                  </div>
                </div>
                <div class="col-md-1 pl-0 col-6">
                  <p class="text-primary"><a>$65</a></p>
                </div>
              </div>
            </div>
            <!-- Add Extra -->
            <div class="add-extra border p-3">
              <h6 class="font-weight-bold">Add Extras</h6>
              <div class="form-group border-bottom py-3 mb-0">
                <div class="row d-flex">
                  <div class="col-md-1 col-2">
                    <label class="custom-checkbox">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-md-9 pl-0 col-8">
                    <label class="custom-checkbox">Extra fast 1 day delivery
                    </label>
                  </div>
                  <div class="col-md-2 text-right col-2">
                    <p class="text-primary mb-0">$5</p>
                  </div>
                </div>
              </div>
              <div class="form-group border-bottom py-3 mb-0">
                <div class="row d-flex">
                  <div class="col-md-1 col-2">
                    <label class="custom-checkbox">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-md-9 pl-0 col-8">
                    <label class="custom-checkbox">Additional Revision (+1 day) 
                    </label>
                  </div>
                  <div class="col-md-2 text-right col-2">
                    <p class="text-primary mb-0">$15</p>
                  </div>
                </div>
              </div>
              <div class="form-group border-bottom py-3 mb-0">
                <div class="row d-flex">
                  <div class="col-md-1 col-2">
                    <label class="custom-checkbox">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-md-9 pl-0 col-8">
                    <label class="custom-checkbox">Incluide social media kit
                    </label>
                  </div>
                  <div class="col-md-2 text-right col-2">
                    <p class="text-primary mb-0">$50</p>
                  </div>
                </div>
              </div>
              <div class="form-group border-bottom py-3 mb-0">
                <div class="row d-flex">
                  <div class="col-md-1 col-2">
                    <label class="custom-checkbox">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-md-9 pl-0 col-8">
                    <label class="custom-checkbox">Incluide source file
                    </label>
                  </div>
                  <div class="col-md-2 text-right col-2">
                    <p class="text-primary mb-0">$90</p>
                  </div>
                </div>
              </div>
              <div class="form-group py-3 mb-0">
                <div class="row d-flex">
                  <div class="col-md-1 col-2">
                    <label class="custom-checkbox">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-md-9 pl-0 col-8">
                    <label class="custom-checkbox">Additional Revision (+1 day)
                    </label>
                    <span class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </span>
                  </div>
                  <div class="col-md-2 text-right col-2">
                    <p class="text-primary mb-0">$25</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 visible-lg"></div>
          <div class="col-lg-4 col-md-4">
            <div class="card">
              <div class="card-body">
                <h6 class="font-weight-bold mb-3">Summary</h6>
                <div class="row">
                  <p class="col">Subtotal</p>
                  <p class="col text-right">$65</p>
                </div>
                <div class="row">
                  <p class="col">Service Fee</p>
                  <p class="col text-right">$5</p>
                </div>
                <div class="row p-3">
                  <div class="col bg-light">
                    <div class="row">
                      <p class="col mb-0">Delivery Time</p>
                      <p class="col text-right">4 Days</p>
                    </div>
                    <div class="row">
                      <p class="col">Total</p>
                      <p class="col text-right">$70</p>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary btn-block">Place Order</button>
                  <p class="small text-center text-muted pt-2">You won't be charged yet</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Confirm and Pay -->
      <div class="tab-pane fade" id="pills-confirmPay" role="tabpanel" aria-labelledby="pills-confirmPay-tab">
        <div class="row mt-5 mb-3">
          <div class="col-lg-7 col-md-7">
            <div class="customize-order border p-3 mb-3">
              <h6 class="font-weight-bold mb-4">Saved Cards</h6>
              <label for="saved_card" class="d-flex align-items-center">
                <input type="radio" name="card" class="mr-2" checked="">
                <span><img src="{{asset('frontend-assets/images/footer/master.png')}}" width="20px"> MasterCard Ending in ****8960 <small>Expires 30/2</small></span>
              </label>
            </div>
            <!-- Add Extra -->
            <div class="add-extra border p-3">
              <h6 class="font-weight-bold">More Payment Options</h6>
              <div class="form-group pt-3 mb-0">
                <label for="saved_card" class="d-flex align-items-center">
                  <input type="radio" name="card" class="mr-2">
                  <span>Credit &Debit Cards <img src="{{asset('frontend-assets/images/footer/master.png')}}" width="35px" class="ml-2"> <img src="{{asset('frontend-assets/images/footer/visa.png')}}" width="35px"> </span>
                </label>
                <label for="saved_card" class="d-flex align-items-center">
                  <input type="radio" name="fawary" class="mr-2">
                  <span>Fawary  </span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 visible-lg"></div>
          <div class="col-lg-4 col-md-4">
            <div class="card">
              <div class="card-body">
                <h6 class="font-weight-bold mb-3">Summary</h6>
                <div class="row mb-3 border-bottom">
                  <div class="col-3 col-md-3 pr-0">
                    <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
                  </div>
                  <div class="col-9 col-md-9">
                    <p class="font-weight-bold mb-0">Digital Agency Website</p>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do .</p>
                  </div>
                </div>
                <div class="row">
                  <p class="col">Subtotal</p>
                  <p class="col text-right">$65</p>
                </div>
                <div class="row">
                  <p class="col">Service Fee</p>
                  <p class="col text-right">$5</p>
                </div>
                <div class="row p-3">
                  <div class="col bg-light">
                    <div class="row">
                      <p class="col mb-0">Delivery Time</p>
                      <p class="col text-right">4 Days</p>
                    </div>
                    <div class="row">
                      <p class="col">Total</p>
                      <p class="col text-right">$70</p>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary btn-block">Confirm and Pay</button>
                  <p class="small text-center text-muted pt-2">By clicking confirm and pay you will be charged</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Submit Requirements -->
      <div class="tab-pane fade" id="pills-requirement" role="tabpanel" aria-labelledby="pills-requirement-tab">
        <div class="row mt-5 mb-3">
          <div class="col-lg-7 col-md-7">
            <div class="customize-order border p-3 mb-3">
              <h6 class="font-weight-bold mb-2">Thank you for your purchase</h6>
              <p class="mb-0">A receipt was sent to your email</p>
            </div>
            <!-- Add Extra -->
            <div class="add-extra border p-3">
              <h6 class="font-weight-bold">Submit Requirements to start your order</h6>
              <p>The seller needs the following information to start working on your order</p>
              <form method="post" id="requiremnt-form">
                <div class="form-group pt-2">
                  <label class="label-circle">1</label><label>Logo</label>
                  <button class="btn btn-secondary d-block">Upload Logo</button>
                  <input type="file" name="logo" class="form-control d-none">
                </div>
                <div class="form-group pt-2">
                  <label class="label-circle">2</label><label>Description about new service</label>
                  <textarea rows="3" cols="10" class="form-control" name="description"></textarea>
                  <div class="p-2 border">
                    <span>0/2050</span>
                    <label class="float-right mr-1 text-right">
                      <input type="file" name="attachment" class="d-none">
                      <i class="fa fa-paperclip"></i>
                    </label>
                  </div>
                </div>
                <div class="form-group pt-2">
                  <label class="label-circle">3</label><label>Description about new service</label>
                  <textarea rows="3" cols="10" class="form-control" name="description"></textarea>
                  <div class="p-2 border">
                    <span>0/2050</span>
                    <label class="float-right mr-1 text-right">
                      <input type="file" name="attachment" class="d-none">
                      <i class="fa fa-paperclip"></i>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <input type="checkbox" name="agree">
                  <span class="small">The information i provide is accurate and complete. Any changes will require the seller approval. And may be subject to additional cost.</span>
                </div>
                <div class="form-group text-right">
                  <button class="btn">Remind me Later</button>
                  <button class="btn btn-primary px-5">Start Order</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 visible-lg"></div>
          <div class="col-lg-4 col-md-4">
            <div class="card">
              <div class="card-body">
                <h6 class="font-weight-bold mb-3">Summary</h6>
                <div class="row mb-3 border-bottom">
                  <div class="col-3 col-md-3 pr-0">
                    <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
                  </div>
                  <div class="col-9 col-md-9">
                    <p class="font-weight-bold mb-0">Digital Agency Website</p>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do .</p>
                  </div>
                </div>
                <div class="row">
                  <p class="col">Status</p>
                  <p class="col text-right text-warning">Incomplete</p>
                </div>
                <div class="row">
                  <p class="col">Order Number</p>
                  <p class="col text-right">123455678575</p>
                </div>
                <div class="row">
                  <p class="col">Order Date</p>
                  <p class="col text-right">12-June-2020</p>
                </div>
                <div class="row">
                  <p class="col font-weight-bold">Price</p>
                  <p class="col text-right">$70</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End Order -->
@endsection
@section('script')
@endsection