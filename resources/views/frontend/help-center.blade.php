@extends('frontend.layouts.app')
@section('title', 'Help Center  ')
@section('styling')
@endsection
@section('content')
<div class="help-center-container">
  <div class="main-headers">
    <div class="container">
      <h2>Help & support</h2>
    </div>
  </div>

  <div class="container">
    <div class="main-wrapper">
      <div class="outer-content">
        @if(Session::has('danger'))
        <div class="alert alert-danger">
          {{ Session::get('danger') }}
          @php
          Session::forget('danger');
          @endphp
        </div>
        @endif
        <div class="hp-header">
          <h4>Submit a Request</h4>
          <a href="">my activities</a>
        </div>
        <form class="" action="{{url('request-help')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
        <div class="form-group">
          <label for="">What can we help you with?</label>
          <div class="select-box">
            <select name="issue" id="" class="select2">
              <option value="Order issue">Order issue</option>
              <option value="Option 1">Option 1</option>
              <option value="Option 2">Option 2</option>
              <option value="Option 3">Option 3</option>
              <option value="Option 4">Option 4</option>
              <option value="Option 5">Option 5</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for=""
            >What kind of issue are you having with this order?</label
          >
          <div class="select-box">
            <select name="order_issue" id="" class="select2" required>
              <option value="">Please select</option>
              <option value="Option 1">Option 1</option>
              <option value="Option 2">Option 2</option>
              <option value="Option 3">Option 3</option>
              <option value="Option 4">Option 4</option>
              <option value="Option 5">Option 5</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="">Select</label>
          <div class="select-box">
            <select name="type" id="" class="select2">
              <option value="I'm buying on Fiverr">I'm buying on Fiverr</option>
              <option value="Option 1">Option 1</option>
              <option value="Option 2">Option 2</option>
              <option value="Option 3">Option 3</option>
              <option value="Option 4">Option 4</option>
              <option value="Option 5">Option 5</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="">What seems to be the problem?</label>
          <div class="select-box">
            <select name="problem" id="" class="select2" required>
              <option value="I have an issue with delivery">I have an issue with delivery</option>
              <option value="Option 1">Option 1</option>
              <option value="Option 2">Option 2</option>
              <option value="Option 3">Option 3</option>
              <option value="Option 4">Option 4</option>
              <option value="Option 5">Option 5</option>
            </select>
          </div>
        </div>

        <div class="issue-suggestion">
          <div class="box">
            <p class="title">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Delectus, non!
            </p>
            <ul>
              <li>
                <p>
                  Lorem ipsum dolor sit amet. <a href="">manage order</a>
                </p>
              </li>
              <li><p>Lorem ipsum dolor sit.</p></li>
              <li><p>Lorem ipsum dolor.</p></li>
              <li><p>Lorem ipsum dolor sit.</p></li>
            </ul>
          </div>
          <div class="box">
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Adipisci veritatis provident eligendi pariatur accusantium
              iste officiis sunt neque similique accusamus. Vitae nostrum
              architecto totam tempore itaque. <a href="">contact us</a>
            </p>
          </div>
          <div class="box">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit
              fugit eius.
            </p>
            <a href="" class="d-block">my orders</a>
            <a href="" class="d-block">resolving issues with an order</a>
          </div>
          <div class="box like-btns d-flex">
            <a href=""><i class="fa fa-thumbs-o-up"></i> helpful</a>
            <a href=""><i class="fa fa-thumbs-o-down"></i> not helpful</a>
          </div>
        </div>

        <p class="small">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
          neque. <a href="">here</a>
        </p>

        <div class="form-group">
          <label for="">subject</label>
          <div class="select-box">
            <select name="subject" id="" class="select2" required>
              <option value="I have an issue with delivery">I have an issue with delivery</option>
              <option value="Option 1">Option 1</option>
              <option value="Option 2">Option 2</option>
              <option value="Option 3">Option 3</option>
              <option value="Option 4">Option 4</option>
              <option value="Option 5">Option 5</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="">description</label>
          <textarea name="description" id="" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
          <label for=""
            >attachments <small class="text-muted">optional</small></label
          >
          <div class="attchement-file">
            <span class="form-field-file">
              <label for="cv-arquivo" aria-label="Attach file" class="btn1">
                <i class="fa fa-paperclip" aria-hidden="true"></i>
                add file
              </label>

              <input
                type="file"
                name="file"
                id="cv-arquivo"
                class="field-file"
              />
            </span>
          </div>
        </div>

        <div class="form-group">
          <label for=""
            >order id
            <small class="text-muted">(e.g. DLKOIH09DF)</small></label
          >
          <input
            type="text"
            name="order_number"
            class="form-control"
            placeholder="Order Number"
            required
            value=""
          />
        </div>

        <div class="btn-container">
          <div class="">
            <button type="submit" class="btn btn-primary">submit Request</button>
          </div>
          <div class="text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Aliquam in molestias accusamus perferendis mollitia,
              consequatur nisi vero, dolore illo odit ut tempora nulla
              perspiciatis eaque soluta, enim id corporis! At?
              <a href="">my activity</a>
            </p>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection
