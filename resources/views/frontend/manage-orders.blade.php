@extends('frontend.layouts.master')
@section('title', 'Manage Order  ')
@section('styling')
@endsection
@section('content')
<!-- Contact Us -->
<section class="py-5 bg-white">
  <div class="container">
    <h4 class="mb-4">Manage Orders</h4>
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="nav flex-column nav-pills order-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">All <label class="count-circle float-right mb-0">22</label></a>
          <a class="nav-link" id="v-pills-active-tab" data-toggle="pill" href="#v-pills-active" role="tab" aria-controls="v-pills-active" aria-selected="false">Active</a>
          <a class="nav-link" id="v-pills-missing-tab" data-toggle="pill" href="#v-pills-missing" role="tab" aria-controls="v-pills-missing" aria-selected="false">Missing Details</a>
          <a class="nav-link" id="v-pills-waiting-tab" data-toggle="pill" href="#v-pills-waiting" role="tab" aria-controls="v-pills-waiting" aria-selected="false">Waiting Review</a>
          <a class="nav-link" id="v-pills-delivered-tab" data-toggle="pill" href="#v-pills-delivered" role="tab" aria-controls="v-pills-delivered" aria-selected="false">Delivered</a>
          <a class="nav-link" id="v-pills-completed-tab" data-toggle="pill" href="#v-pills-completed" role="tab" aria-controls="v-pills-completed" aria-selected="false">Completed <label class="count-circle float-right mb-0">15</label></a>
          <a class="nav-link" id="v-pills-cancelled-tab" data-toggle="pill" href="#v-pills-cancelled" role="tab" aria-controls="v-pills-cancelled" aria-selected="false">Cancelled <label class="count-circle float-right mb-0">10</label></a>
        </div>
      </div>
      <div class="col-md-9 col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
            <div class="order-table table-responsive">
              <table class="table">
                <thead>
                  <tr role="row">
                    <th role="column">All Order</th>
                    <th role="column">Order Date</th>
                    <th role="column">Due on</th>
                    <th role="column">Total</th>
                    <th role="column">Status</th>
                  </tr>
                </thead>
                <tbody class="border">
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                      <div class="text-warning">Incomplete</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                      <div class="text-success">Completed</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                      <div class="text-danger">Cancel</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                      Incomplete
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-active" role="tabpanel" aria-labelledby="v-pills-active-tab">
            
          </div>
          <div class="tab-pane fade" id="v-pills-missing" role="tabpanel" aria-labelledby="v-pills-missing-tab">
            <div class="order-table table-responsive">
              <table class="table">
                <thead>
                  <tr role="row">
                    <th role="column">All Order</th>
                    <th role="column">Order Date</th>
                    <th role="column">Due on</th>
                    <th role="column">Total</th>
                    <th role="column">Status</th>
                  </tr>
                </thead>
                <tbody class="border">
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                      <div class="text-warning">Missing</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                       <div class="text-warning">Missing</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                       <div class="text-warning">Missing</div>
                    </td>
                  </tr>
                  <tr role="row">
                    <td data-label="Description" role="column">
                      <div class="order-desc d-flex flex-wrap">
                        <div class="order-image">
                          <img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" width="90px" />
                        </div>
                        <div class="order-desc-text pl-2">
                          <p>Lorem ipsum dolor sit amet</p>
                        </div>
                      </div>
                    </td>
                    <td data-label="Order Date" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Due on" role="column">
                      12-June-2020
                    </td>
                    <td data-label="Total" role="column">
                      $70
                    </td>
                    <td data-label="Total" role="column">
                       <div class="text-warning">Missing</div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-waiting" role="tabpanel" aria-labelledby="v-pills-waiting-tab">...</div>
          <div class="tab-pane fade" id="v-pills-delivered" role="tabpanel" aria-labelledby="v-pills-delivered-tab">...</div>
          <div class="tab-pane fade" id="v-pills-completed" role="tabpanel" aria-labelledby="v-pills-completed-tab">...</div>
          <div class="tab-pane fade" id="v-pills-cancelled" role="tabpanel" aria-labelledby="v-pills-cancelled-tab">...</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Order -->
@endsection
@section('script')
@endsection