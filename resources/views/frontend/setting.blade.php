@extends('frontend.layouts.app')
@section('title', 'Profile Settings ')
@section('styling')
@endsection
@section('content')
<?php $years = range(1910,date("Y")); ?>
<div class="manage-order settings-container">
	<div class="container">
		<div class="outer-content">
			<!-- <div class="headers">
				<h4>settings</h4>
			</div> -->

			<div class="manage-tab-container">
				<ul class="nav nav-pills" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a
							class="nav-link active"
							id="pills-account-tab"
							data-toggle="pill"
							href="#pills-account"
							role="tab"
							aria-controls="pills-account"
							aria-selected="true"
						>
							account
						</a>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="pills-security-tab"
							data-toggle="pill"
							href="#pills-security"
							role="tab"
							aria-controls="pills-security"
							aria-selected="false"
							>security</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="pills-notifications-tab"
							data-toggle="pill"
							href="#pills-notifications"
							role="tab"
							aria-controls="pills-notifications"
							aria-selected="false"
							>notifications</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="pills-billing-information-tab"
							data-toggle="pill"
							href="#pills-billing-information"
							role="tab"
							aria-controls="pills-billing-information"
							aria-selected="false"
							>billing information</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="pills-balance-tab"
							data-toggle="pill"
							href="#pills-balance"
							role="tab"
							aria-controls="pills-balance"
							aria-selected="false"
							>balance</a
						>
					</li>
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<div
						class="tab-pane fade show active"
						id="pills-account"
						role="tabpanel"
						aria-labelledby="pills-account-tab"
					>
						<div class="inner-tab-container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
									<div class="outer-box user-info">
										<div class="uploadpreview">
											@if($userData->facebook_id != Null || $userData->google_id != Null)
											<img src="{{$userData->profile_image}}" alt="">
											@elseif($userData->profile_image != Null)
                			<img src="{{asset('images/user_images/'.$userData->profile_image)}}">
											@else
											<img src="images/s1.png" alt="" />
											@endif
										</div>
										<h5>{{$userData->organization}}</h5>
										<p>{{$userData->occuption}}</p>
										<div class="btn-container">
											<span class="form-field-file">
												<label
													for="cv-arquivo"
													aria-label="Attach file"
													class="btn1 custom-btn"
												>
													<i class="fa fa-paperclip" aria-hidden="true"></i>
													upload
												</label>

												<input
													type="file"
													name="profile_image"
													id="cv-arquivo"
													class="field-file"
													form="edit-profile-form"
												/>
											</span>
											<a id="delete_img" class="btn custom-btn"> delete </a>
										</div>
									</div>

									<div class="outer-box about mt-4">
										<div class="header">
											<h6>About</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>

										<div class="form-content">
											<div class="form-group">
												<label for="">BIO</label>
												<textarea
													name="bio"
													id=""
													rows="3"
													class="form-control"
													form="edit-profile-form"
												>{{$userData->bio}}</textarea>
											</div>
										</div>
									</div>

									<form class="outer-box social-profiles mt-4">
										<div class="header">
											<h6>social profiles</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>

										<div class="form-content">
											<div class="form-group">
												<span><i class="fa fa-instagram"></i></span>
												<input
													type="text"
													class="form-control"
													placeholder="Add instagram link"
												/>
											</div>
											<div class="form-group">
												<span><i class="fa fa-facebook"></i></span>
												<input
													type="text"
													class="form-control"
													placeholder="Add facebook link"
												/>
											</div>
											<div class="form-group">
												<span><i class="fa fa-twitter"></i></span>
												<input
													type="text"
													class="form-control"
													placeholder="Add twitter link"
												/>
											</div>
										</div>
									</form>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
									@if(Session::has('success'))
						       <div class="alert alert-success">
						           {{ Session::get('success') }}
						           @php
						               Session::forget('success');
						           @endphp
						       </div>
						       @endif
									<form class="outer-box basic-info form" action="{{url('edit_profile_info')}}" method="post" id="edit-profile-form" enctype="multipart/form-data">
										@csrf
										<div class="header">
											<h6>edit basic info</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">First Name <span>*</span></label>
														<input type="text" name="first_name" value="{{$userData->first_name}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('first_name') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Last Name <span>*</span></label>
														<input type="text" name="last_name" value="{{$userData->last_name}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('last_name') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">username <span>*</span></label>
														<input type="text" name="username" value="{{$userData->username}}" class="form-control" readonly="" />

													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">birth date <span>*</span></label>
														<input type="date" value="{{$userData->birth_date}}" name="birth_date" class="form-control" />
														<span class="text-danger">{{ $errors->first('birth_date') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">gender <span>*</span></label>
														<select name="gender" id="" class="select2">
															<option value="">gender</option>
															<option value="male" @if($userData->gender == 'male') selected @endif>male</option>
															<option value="female" @if($userData->gender == 'female') selected @endif>female</option>
														</select>
														<span class="text-danger">{{ $errors->first('gender') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">email <span>*</span></label>
														<input type="text" name="email" value="{{$userData->email}}" class="form-control" readonly="" />
														<span class="text-danger">{{ $errors->first('email') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Country <span>*</span></label>
														<input type="text" name="country" value="{{$userData->country}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('country') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">website <span>*</span></label>
														<input type="text" value="{{$userData->website}}" name="website" class="form-control" />
														<span class="text-danger">{{ $errors->first('website') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>organization <span>*</span></label
														>
														<input type="text" value="{{$userData->organization}}" name="organization"  class="form-control" />
														<span class="text-danger">{{ $errors->first('organization') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>Occuption <span>*</span></label
														>
														<input type="text" name="occuption" value="{{$userData->occuption}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('occuption') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>phone number <span>*</span></label
														>
														<input type="text" value="{{$userData->mobile_number}}" name="mobile_number" class="form-control" />
														<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>preferred language <span>*</span></label
														>
														<?php $langData = json_decode($userData->language_id);?>
														<select name="language_id[]" id="" class="select2" multiple>
															@if($langData != '')
															@foreach($langData as $userLang)
															<option value="{{$userLang}}" selected>{{Engezli::get_language($userLang)->language_title}}</option>
															@endforeach
															@endif
															@foreach($languages as $lang)
															<option value="{{$lang->id}}">{{$lang->language_title}}</option>
															@endforeach
														</select>
														<span class="text-danger">{{ $errors->first('language_id') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="form-group">
														<label for=""
															>Skills <span>*</span></label
														>
														<?php $skil = json_decode($userData->skills_id);?>
														<select name="skills_id[]" id="" class="select2" multiple>
															@if($skil != '')
															@foreach($skil as $userSkil)
															<option value="{{$userSkil}}" selected>{{Engezli::get_skill($userSkil)->skill_title}}</option>
															@endforeach
															@endif
															@foreach($skills as $skill)
															<option value="{{$skill->id}}">{{$skill->skill_title}}</option>
															@endforeach

														</select>
														<span class="text-danger">{{ $errors->first('skills_id') }}</span>
													</div>
												</div>
											</div>
										</div>
									</form>
									<div class="outer-box form mt-4">
										<div class="header">
											<h6>Experience</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">from </label>
														<input type="date" value="{{$userExpData != null ? $userExpData->from_date : ''}}" form="edit-profile-form" name="from_date" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">to </label>
														<input type="date" form="edit-profile-form" value="{{$userExpData != null ? $userExpData->to_date : ''}}" name="to_date" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">company </label>
														<input type="text" value="{{$userExpData != null ? $userExpData->company : ''}}" form="edit-profile-form" name="company" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">position </label>
														<input type="text" form="edit-profile-form" value="{{$userExpData != null ? $userExpData->position : ''}}" name="position" class="form-control" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="outer-box form mt-4">
										<div class="header">
											<h6>Education</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Degree Name </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->major : ''}}" name="degree" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Institute </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->institute : ''}}" name="institute" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Country </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->country : ''}}"  name="country" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">Degree year </label>
														<input type="text" value="{{$userEduData != null ? $userEduData->degree_year : ''}}"  form="edit-profile-form" name="degree_year" class="form-control" />
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="btn-container mt-3 text-right">
										<a href="" class="btn custom-btn">cancel</a>
										<button type="submit" form="edit-profile-form" class="btn custom-btn btn-primary text-white"
											>submit</a
										>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div
						class="tab-pane fade"
						id="pills-security"
						role="tabpanel"
						aria-labelledby="pills-security-tab"
					>
						security
					</div>
					<div
						class="tab-pane fade"
						id="pills-notifications"
						role="tabpanel"
						aria-labelledby="pills-notifications-tab"
					>
						notifications
					</div>
					<div
						class="tab-pane fade"
						id="pills-billing-information"
						role="tabpanel"
						aria-labelledby="pills-billing-information-tab"
					>
						billing-information
					</div>
					<div
						class="tab-pane fade"
						id="pills-balance"
						role="tabpanel"
						aria-labelledby="pills-balance-tab"
					>
						<div class="inner-tab-container outer-box">
							<div class="tab-headers">
								<h4>your account balance</h4>
								<p>
									Lorem ipsum dolor sit, amet consectetur adipisicing elit.
									Iste, molestias!
								</p>
							</div>

							<div class="balance-container">
								<div class="box">
									<h6>engezly balance</h6>

									<div class="inner-box">
										<p>total</p>
										<h4>$0.00</h4>
									</div>
								</div>
								<div class="box">
									<h6>balance on hold</h6>

									<div class="inner-box">
										<p>total</p>
										<h4>$0.00</h4>
									</div>
								</div>
								<div class="box">
									<h6>balance can be withdrawn</h6>

									<div class="inner-box">
										<p>total</p>
										<h4>$0.00</h4>
									</div>
								</div>
							</div>

							<div class="payment-method-tab">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a
											class="nav-link active"
											id="seller-tab"
											data-toggle="tab"
											href="#seller"
											role="tab"
											aria-controls="seller"
											aria-selected="true"
										>
											Payment Methods as a Seller
										</a>
									</li>
									<li class="nav-item">
										<a
											class="nav-link"
											id="buyer-tab"
											data-toggle="tab"
											href="#buyer"
											role="tab"
											aria-controls="buyer"
											aria-selected="false"
										>
											Payment Methods as a Buyer
										</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div
										class="tab-pane fade show active"
										id="seller"
										role="tabpanel"
										aria-labelledby="seller-tab"
									>
										<div class="payment-tab-container">
											<div class="lists-item">
												<h5>saved cards</h5>
												<div class="inner-box">
													<p>
														<img src="images/mastercard.svg" alt="" />
														MasterCard Ending in *****8900
														<span class="expire-date"> expires 30/2</span>
													</p>
													<a href="">remove</a>
												</div>
											</div>
										</div>
										<div class="add-payment-method">
											<h5>add a new payment options</h5>

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
									<div
										class="tab-pane fade"
										id="buyer"
										role="tabpanel"
										aria-labelledby="buyer-tab"
									>
										<div class="payment-tab-container">
											<div class="lists-item">
												<h5>saved cards</h5>
												<div class="inner-box">
													<p>
														<img src="images/mastercard.svg" alt="" />
														MasterCard Ending in *****8900
														<span class="expire-date"> expires 30/2</span>
													</p>
													<a href="">remove</a>
												</div>
											</div>
										</div>
										<div class="add-payment-method">
											<h5>add a new payment options</h5>

											<div class="payment-option">
												<div class="form-check">
													<input
														class="form-check-input"
														type="radio"
														name="exampleRadios"
														id="exampleRadios1"
														value="option1"
														checked
													/>
													<label
														class="form-check-label"
														for="exampleRadios1"
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
														id="exampleRadios2"
														value="option2"
													/>
													<label
														class="form-check-label"
														for="exampleRadios2"
													>
														<img src="images/visa.svg" alt="" /> Visa Card
													</label>
												</div>
												<div class="form-check">
													<input
														class="form-check-input"
														type="radio"
														name="exampleRadios"
														id="exampleRadios3"
														value="option3"
													/>
													<label
														class="form-check-label"
														for="exampleRadios3"
													>
														<img src="images/fawry.svg" alt="" /> Fawary
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="transaction-history">
								<div class="heading">
									<h4>transaction history</h4>
								</div>
								<div class="transaction-lists">
									<div class="list-item">
										<div class="price">
											<h5>-$5.00</h5>
										</div>
										<div class="info">
											<h6>
												Lorem ipsum dolor sit amet consectetur adipisicing
												elit. Iusto, eius?
											</h6>
											<p>
												<span class="date"
													><i class="fa fa-clock"></i> 20.07.2020</span
												>
												<span class="amount">$5.00</span>
											</p>
										</div>
										<div class="receipt">
											<a href="" class="custom-btn"
												><i class="fa fa-file"> </i>receipt</a
											>
										</div>
									</div>
									<div class="list-item">
										<div class="price">
											<h5>+$10.00</h5>
										</div>
										<div class="info">
											<h6>
												Lorem ipsum dolor sit amet consectetur adipisicing
												elit. Iusto, eius?
											</h6>
											<p>
												<span class="date"
													><i class="fa fa-clock"></i> 20.07.2020</span
												>
												<span class="amount">$5.00</span>
											</p>
										</div>
										<div class="receipt">
											<a href="" class="custom-btn"
												><i class="fa fa-file"> </i>receipt</a
											>
										</div>
									</div>
									<div class="list-item">
										<div class="price">
											<h5>+$5.00</h5>
										</div>
										<div class="info">
											<h6>
												Lorem ipsum dolor sit amet consectetur adipisicing
												elit. Iusto, eius?
											</h6>
											<p>
												<span class="date"
													><i class="fa fa-clock"></i> 20.07.2020</span
												>
												<span class="amount">$5.00</span>
											</p>
										</div>
										<div class="receipt">
											<a href="" class="custom-btn"
												><i class="fa fa-file"> </i>receipt</a
											>
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
@endsection
@section('script')
<script>
	$('#cv-arquivo').change(function () {
		// var id = $(this).attr("id");
		var newimage = new FileReader();
		newimage.readAsDataURL(this.files[0]);
		newimage.onload = function (e) {
			$('.uploadpreview').html('<img src="'+ e.target.result + '">');
		}
	});
	$('#delete_img').click(function(){
		$('.uploadpreview').html('<img src="images/s1.png">');
	});
</script>
@endsection