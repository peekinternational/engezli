@extends('frontend.layouts.app')
@section('title', 'Profile Settings ')
@section('styling')
<style>
	.select2-container--default .select2-search--inline .select2-search__field{
		display: none;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
		-webkit-appearance: media-slider;
	}
	.settings-container .outer-content .tab-content form .form-content .form-group.language .select2-container--default.select2-container{
		width: 290px !important;
	}
	.settings-container .outer-content .tab-content form .form-content .form-group.skill .select2-container--default.select2-container{
		width: 610px !important;
	}
	.settings-container .select2{
		width: auto;
	}
</style>
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
							{{ __('home.account')}}
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
							>{{ __('home.security')}}</a
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
							>{{ __('home.notifications')}}</a
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
							>{{ __('home.billing information')}}</a
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
							>{{ __('home.balance')}}</a
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
													{{ __('home.upload')}}
												</label>

												<input
													type="file"
													name="profile_image"
													id="cv-arquivo"
													class="field-file"
													form="edit-profile-form"
												/>
											</span>
											<a id="delete_img" class="btn custom-btn"> {{ __('home.delete')}} </a>
										</div>
									</div>

									<div class="outer-box about mt-4">
										<div class="header">
											<h6>{{ __('home.About')}}</h6>
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
											<h6>{{ __('home.social profiles')}}</h6>
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
											<h6>{{ __('home.edit basic info')}}</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.First Name')}} <span>*</span></label>
														<input type="text" name="first_name" value="{{$userData->first_name}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('first_name') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Last Name')}} <span>*</span></label>
														<input type="text" name="last_name" value="{{$userData->last_name}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('last_name') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Username')}} <span>*</span></label>
														<input type="text" name="username" value="{{$userData->username}}" class="form-control" readonly="" />

													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.birth date')}} <span>*</span></label>
														<input type="date" value="{{$userData->birth_date}}" name="birth_date" class="form-control" />
														<span class="text-danger">{{ $errors->first('birth_date') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.gender')}} <span>*</span></label>
														<select name="gender" id="" class="select2">
															<option value="">{{ __('home.gender')}}</option>
															<option value="male" @if($userData->gender == 'male') selected @endif>male</option>
															<option value="female" @if($userData->gender == 'female') selected @endif>female</option>
														</select>
														<span class="text-danger">{{ $errors->first('gender') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Email')}} <span>*</span></label>
														<input type="text" name="email" value="{{$userData->email}}" class="form-control" readonly="" />
														<span class="text-danger">{{ $errors->first('email') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Country')}} <span>*</span></label>
														<select class="form-control" name="user_country" id="" required>
															<option value="">Select Country</option>
															@foreach(Engezli::get_countries() as $country)
															<option value="{{$country->name}}" @if($userData) {{$userData->country == $country->name ? 'selected="selected"' : ''}} @endif>{{$country->name}}</option>
															@endforeach
														</select>
														<!-- <input type="text" name="country" value="{{$userData->country}}" class="form-control" /> -->
														<span class="text-danger">{{ $errors->first('country') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.website')}} <span>*</span></label>
														<input type="text" value="{{$userData->website}}" name="website" class="form-control" />
														<span class="text-danger">{{ $errors->first('website') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>{{ __('home.organization')}} <span>*</span></label
														>
														<input type="text" value="{{$userData->organization}}" name="organization"  class="form-control" />
														<span class="text-danger">{{ $errors->first('organization') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>{{ __('home.Occuption')}} <span>*</span></label
														>
														<input type="text" name="occuption" value="{{$userData->occuption}}" class="form-control" />
														<span class="text-danger">{{ $errors->first('occuption') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for=""
															>{{ __('home.Mobile Number')}} <span>*</span></label
														>
														<input type="text" value="{{$userData->mobile_number}}" name="mobile_number" class="form-control" />
														<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group language">
														<label for=""
															>{{ __('home.preferred languages')}} <span>*</span></label
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
													<div class="form-group skill">
														<label for=""
															>{{ __('home.Skills')}} <span>*</span></label
														>
														<?php $skil = json_decode($userData->skills_id);?>
														<select name="skills_id[]" id="" class="select2 form-control" multiple>
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
											<h6>{{ __('home.Experience')}}</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.from')}} </label>
														<input type="date" value="{{$userExpData != null ? $userExpData->from_date : ''}}" form="edit-profile-form" name="from_date" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.to')}} </label>
														<input type="date" form="edit-profile-form" value="{{$userExpData != null ? $userExpData->to_date : ''}}" name="to_date" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.company')}} </label>
														<input type="text" value="{{$userExpData != null ? $userExpData->company : ''}}" form="edit-profile-form" name="company" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.position')}} </label>
														<input type="text" form="edit-profile-form" value="{{$userExpData != null ? $userExpData->position : ''}}" name="position" class="form-control" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="outer-box form mt-4">
										<div class="header">
											<h6>{{ __('home.Education')}}</h6>
											<p>Lorem ipsum dolor sit amet.</p>
										</div>
										<div class="form-content">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Degree')}} </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->major : ''}}" name="degree" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Institute')}} </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->institute : ''}}" name="institute" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Country')}} </label>
														<input type="text" form="edit-profile-form" value="{{$userEduData != null ? $userEduData->country : ''}}"  name="country" class="form-control" />
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="form-group">
														<label for="">{{ __('home.Degree year')}} </label>
														<input type="text" value="{{$userEduData != null ? $userEduData->degree_year : ''}}"  form="edit-profile-form" name="degree_year" class="form-control" />
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="btn-container mt-3 text-right">
										<a href="" class="btn custom-btn">{{ __('home.Cancel')}}</a>
										<button type="submit" form="edit-profile-form" class="btn custom-btn btn-primary text-white"
											>{{ __('home.Submit')}}</button>
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
						<!-- {{ __('home.security')}} -->
						<div class="outer-box security-tab">
							<h5 class="text-uppercase">Change password</h5>
							<div class="dropdown-divider mt-3 mb-4"></div>
							@if(Session::has('password_success'))
							<div class="alert alert-success">
								{{ Session::get('password_success') }}
								@php
								Session::forget('password_success');
								@endphp
							</div>
							@endif
							@if(Session::has('password_danger'))
							<div class="alert alert-danger">
								{{ Session::get('password_danger') }}
								@php
								Session::forget('password_danger');
								@endphp
							</div>
							@endif
							<form class="" action="{{url('change-password')}}" method="post">
								{{csrf_field()}}
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-4 col-form-label"
									><strong>Current Password</strong></label
								>
								<div class="col-sm-8">
									<input
										type="password"
										name="old_password"
										class="form-control"
										id="inputPassword"
										required
									/>
									<span class="text-danger">{{$errors->first('old_password')}}</span>
								</div>
							</div>

							<div class="form-group row mt-3">
								<label for="inputPassword" class="col-sm-4 col-form-label"
									><strong>New Password</strong></label
								>
								<div class="col-sm-8">
									<input
										type="password"
										name="new_password"
										class="form-control"
										id="inputPassword"
										required
									/>
									<span class="text-danger">{{$errors->first('new_password')}}</span>
								</div>
							</div>

							<div class="form-group row mt-3">
								<label for="inputPassword" class="col-sm-4 col-form-label"
									><strong>Confirm Password</strong></label
								>
								<div class="col-sm-8">
									<input
										type="password"
										name="confirm_password"
										class="form-control"
										id="inputPassword"
										required
									/>
								</div>
							</div>

							<!-- <div class="row mt-4">
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="">Current password</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="">New password</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="">Confirm password</label>
										<input type="text" class="form-control" />
									</div>
								</div>
							</div> -->

							<div class="btn-container text-right mt-2">
								<button type="submit" class="btn custom-btn btn-primary text-white">
									save changes
								</button>
							</div>
						</form>

							<div class="dropdown-divider my-4"></div>

							<div class="form-group row mt-5">
								<label
									for="staticEmail"
									class="col-sm-4 col-form-label text-uppercase"
									><strong>Email</strong>
								</label>
								<div class="col-sm-6">
									<small>
										Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Nemo, odit. Dolor, autem dolorum. Veritatis sequi, in
										quisquam ipsum.
									</small>
								</div>
								<div class="col-sm-2 btn-container text-right">
									<button
										class="btn btn-sm btn-primary text-white px-3"
										data-toggle="modal"
										data-target="#exampleModal"
									>
										Edit
									</button>
								</div>
							</div>

							<div class="form-group row mt-5">
								<label
									for="staticEmail"
									class="col-sm-4 col-form-label text-uppercase"
									><strong>security question</strong></label
								>
								<div class="col-sm-6">
									<small>
										Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Nemo, odit. Dolor, autem dolorum. Veritatis sequi, in
										quisquam ipsum.
									</small>
								</div>
								<div class="col-sm-2 btn-container text-right">
									<button class="btn btn-sm btn-primary text-white px-3">
										Edit
									</button>
								</div>
							</div>

							<div class="form-group row mt-5">
								<label
									for="staticEmail"
									class="col-sm-4 col-form-label text-uppercase"
									><strong>two factor authentication</strong>
									<small class="d-block text-success text-uppercase"
										><strong>recommended</strong></small
									></label
								>
								<div class="col-sm-6">
									<div class="custom-control custom-switch">
										<input
											type="checkbox"
											class="custom-control-input"
											id="customSwitch134545"
										/>
										<label
											class="custom-control-label"
											for="customSwitch134545"
										></label>
									</div>
									<small>
										Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Nemo, odit. Dolor, autem dolorum. Veritatis sequi, in
										quisquam ipsum.
									</small>
								</div>
								<div class="col-sm-2 btn-container text-right">
									<button class="btn btn-sm btn-primary text-white px-3">
										Edit
									</button>
								</div>
							</div>
						</div>
					</div>
					<div
						class="tab-pane fade"
						id="pills-notifications"
						role="tabpanel"
						aria-labelledby="pills-notifications-tab"
					>
						<!-- {{ __('home.notifications')}} -->
						<div class="outer-box notification-tab">
							@if(Session::has('notification_success'))
							<div class="alert alert-success">
								{{ Session::get('notification_success') }}
								@php
								Session::forget('notification_success');
								@endphp
							</div>
							@endif
						 <form class="" action="{{url('save-notificatoins-setting')}}" method="post">
							 {{csrf_field()}}
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>notifications</th>
											<th>type</th>
											<th>email</th>
											<th>mobile</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												Lorem ipsum dolor sit, amet consectetur adipisicing
												elit. Numquam sunt beatae ducimus nihil voluptatum
												consequuntur corrupti perferendis repudiandae vitae
												nulla.
											</td>
											<td>inbox messages</td>
											<td>

												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck1"
														name="email_inbox_message"
														value="1" {{Engezli::getNotificationEmail($userData->id,'inbox message') == '1' ? 'checked="checked"' : ''}}
													/>
													<label
														class="form-check-label"
														for="exampleCheck1"
													>
													</label>
												</span>
											</td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck122"
														name="mobile_inbox_message"
														value="1" {{Engezli::getNotificationMobile($userData->id,'inbox message') == '1' ? 'checked="checked"' : ''}}
													/>
													<label
														class="form-check-label"
														for="exampleCheck122"
													></label>
												</span>
												<input type="hidden" name="type_inbox_message" value="inbox message">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>order messages</td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck1565"
														name="email_order_message"
														value="1" {{Engezli::getNotificationEmail($userData->id,'order messages') == '1' ? 'checked="checked"' : ''}}
													/>
													<label
														class="form-check-label"
														for="exampleCheck1565"
													>
													</label>
												</span>
											</td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck122654654"
														name="mobile_order_message"
														value="1" {{Engezli::getNotificationMobile($userData->id,'order messages') == '1' ? 'checked="checked"' : ''}}
													/>
													<label
														class="form-check-label"
														for="exampleCheck122654654"
													></label>
												</span>
												<input type="hidden" name="type_order_message" value="order messages">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>order updates</td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck1"
														name="email_order_updates"
														value="1" {{Engezli::getNotificationEmail($userData->id,'order updates') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck1"
													>
													</label>
												</span>
											</td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck122"
														name="mobile_order_updates"
														value="1" {{Engezli::getNotificationMobile($userData->id,'order updates') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck122"
													></label>
												</span>
												<input type="hidden" name="type_order_updates" value="order updates">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>buyer request</td>
											<td></td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck12234534"
														name="mobile_buyer_request"
														value="1" {{Engezli::getNotificationMobile($userData->id,'buyer request') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck12234534"
													></label>
												</span>
												<input type="hidden" name="type_buyer_request" value="buyer request">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>my gigs</td>
											<td></td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck12202"
														name="mobile_my_gigs"
														value="1" {{Engezli::getNotificationMobile($userData->id,'my gigs') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck12202"
													></label>
												</span>
												<input type="hidden" name="type_my_gigs" value="my gigs">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>my account</td>
											<td></td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck12268531"
														name="mobile_my_account"
														value="1" {{Engezli::getNotificationMobile($userData->id,'my account') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck12268531"
													></label>
												</span>
												<input type="hidden" name="type_my_account" value="my account">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>to-dos</td>
											<td></td>
											<td>
												<span class="form-check">
													<input
														type="checkbox"
														class="form-check-input"
														id="exampleCheck12268531"
														name="mobile_to_dos"
														value="1" {{Engezli::getNotificationMobile($userData->id,'to-dos') == '1' ? 'checked="checked"' : ''}}
														/>
													<label
														class="form-check-label"
														for="exampleCheck12268531"
													></label>
												</span>
												<input type="hidden" name="type_to_dos" value="to-dos">
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="real-time-notification">
								<h6>
									real-time notifications <i class="fa fa-info-circle"></i>
								</h6>
								<div class="inner-content mt-3">
									<div class="box d-flex">
										<p>Enable/Disable real-time notification</p>
										<div class="custom-control custom-switch">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customSwitch984"
												data="off"
												name="notification"
												value="1"
												{{$userData->notification == '1' ? 'checked="checked"' : ''}}
											/>
											<label
												class="custom-control-label control-package text-primary ml-md-5"
												for="customSwitch984"
											>
												<strong>Try me</strong>
											</label>
										</div>
									</div>
									<div class="box d-flex">
										<p>Enable/Disable sound</p>
										<div class="custom-control custom-switch">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customSwitch1654"
												name="sound"
												data="off"
												value="1"
												{{$userData->sound == '1' ? 'checked="checked"' : ''}}
											/>
											<label
												class="custom-control-label control-package text-secondary ml-md-5"
												for="customSwitch1654"
											>
												<i class="fa fa-volume-up" aria-hidden="true"></i>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="btn-container text-right mt-4">
								<button type="submit" class="btn custom-btn btn-primary text-white">
									save changes
								</button>
							</form>
							</div>
						</div>
					</div>
					<div
						class="tab-pane fade"
						id="pills-billing-information"
						role="tabpanel"
						aria-labelledby="pills-billing-information-tab"
					>
						<!-- {{ __('home.billing information')}} -->
						<div class="outer-box">
							@if(Session::has('billing_success'))
							<div class="alert alert-success">
								{{ Session::get('billing_success') }}
								@php
								Session::forget('billing_success');
								@endphp
							</div>
							@endif
							<form class="" action="{{url('save-billing-info')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="billing_id" value="@if($userBillingData) {{$userBillingData->id}} @endif">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>Full name</strong></label>
										<input type="text" name="name" class="form-control"
										value="@if($userBillingData) {{$userBillingData->name}} @endif"
										 required />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>Company name</strong></label>
										<input type="text" name="company_name" class="form-control"
										value="@if($userBillingData) {{$userBillingData->company_name}} @endif"
										 />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>Country</strong></label>
										<div class="country">
											<select class="form-control billing-country" name="country" id="" required>
												<option value="">Select Country</option>
												@foreach(Engezli::get_countries() as $country)
												<option value="{{$country->id}}" @if($userBillingData) {{$userBillingData->country == $country->id ? 'selected="selected"' : ''}} @endif>{{$country->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""
											><strong>State/Province/Territory</strong></label>
										<select class="form-control billing-state" name="state" required>
											@if($userBillingData)
											@foreach(Engezli::getStates($userBillingData->country) as $state)
											<option value="{{$state->id}}" @if($userBillingData) {{$userBillingData->state == $state->id ? 'selected="selected"' : ''}} @endif>{{$state->name}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>City</strong></label>
										<select class="form-control billing-city" name="city" required>
											@if($userBillingData)
											@foreach(Engezli::getCities($userBillingData->state) as $city)
											<option value="{{$city->id}}" @if($userBillingData) {{$userBillingData->city == $city->id ? 'selected="selected"' : ''}} @endif>{{$city->name}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>Address</strong></label>
										<input type="text" name="address" class="form-control"
										value="@if($userBillingData) {{$userBillingData->address}} @endif"
										required />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>Postal code</strong></label>
										<input type="text" name="post_code" class="form-control"
										value="@if($userBillingData) {{$userBillingData->post_code}} @endif"
										 required/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for=""><strong>VAT number</strong></label>
										<input type="text" name="vat_number" class="form-control"
										value="@if($userBillingData) {{$userBillingData->vat_number}} @endif"
										 required/>
									</div>
								</div>
								<div class="col-12">
									<label for=""><strong>Invoices</strong></label>
									<div class="form-group form-check">
										<input
											type="checkbox"
											class="form-check-input"
											id="exampleCheck16546546"
											name="status"
											value="1"
											@if($userBillingData) {{$userBillingData->status == '1' ? 'checked="checked"' : ''}} @endif
										/>
										<label
											class="form-check-label"
											for="exampleCheck16546546"
											>Yes, email my billing info and original
											invoices.</label
										>
									</div>
								</div>
							</div>

							<div class="btn-container text-right mt-4">
								<button type="submit" class="btn custom-btn btn-primary text-white">
									save changes
								</button>
							</div>
						</form>
						</div>
					</div>
					<div
						class="tab-pane fade"
						id="pills-balance"
						role="tabpanel"
						aria-labelledby="pills-balance-tab"
					>
						<div class="inner-tab-container outer-box">
							<div class="tab-headers">
								<h4>{{ __('home.your account balance')}}</h4>
								<p>
									Lorem ipsum dolor sit, amet consectetur adipisicing elit.
									Iste, molestias!
								</p>
							</div>

							<div class="balance-container">
								<div class="box">
									<h6>{{ __('home.engezly balance')}}</h6>

									<div class="inner-box">
										<p>{{ __('home.total')}}</p>
										<h4>$0.00</h4>
									</div>
								</div>
								<div class="box">
									<h6>{{ __('home.balance on hold')}}</h6>

									<div class="inner-box">
										<p>{{ __('home.total')}}</p>
										<h4>$0.00</h4>
									</div>
								</div>
								<div class="box">
									<h6>{{ __('home.balance can be withdrawn')}}</h6>

									<div class="inner-box">
										<p>{{ __('home.total')}}</p>
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
											{{ __('home.Payment Methods as a Seller')}}
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
											{{ __('home.Payment Methods as a Buyer')}}
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
												<h5>{{ __('home.saved cards')}}</h5>
												<div class="inner-box">
													<p>
														<img src="images/mastercard.svg" alt="" />
														MasterCard Ending in *****8900
														<span class="expire-date"> expires 30/2</span>
													</p>
													<a href="">{{ __('home.remove')}}</a>
												</div>
											</div>
										</div>
										<div class="add-payment-method">
											<h5>{{ __('home.add a new payment options')}}</h5>

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
												<h5>{{ __('home.saved cards')}}</h5>
												<div class="inner-box">
													<p>
														<img src="images/mastercard.svg" alt="" />
														MasterCard Ending in *****8900
														<span class="expire-date"> expires 30/2</span>
													</p>
													<a href="">{{ __('home.remove')}}</a>
												</div>
											</div>
										</div>
										<div class="add-payment-method">
											<h5>{{ __('home.add a new payment options')}}</h5>

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
									<h4>{{ __('home.transaction history')}}</h4>
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
												><i class="fa fa-file"> </i>{{ __('home.receipt')}}</a
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
												><i class="fa fa-file"> </i>{{ __('home.receipt')}}</a
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
												><i class="fa fa-file"> </i>{{ __('home.receipt')}}</a
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

<!-- Modal -->
<div
	class="modal fade"
	id="exampleModal"
	tabindex="-1"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body p-4">
				<h5 class="modal-title" id="exampleModalLabel">
					Change Your Phone Number
				</h5>
				<small
					>Please answer the security question so we can make sure it’s
					you.</small
				>

				<div class="form-group mt-4">
					<label for=""
						><strong>What was your childhood nickname?</strong></label
					>
					<input type="text" class="form-control" />
				</div>

				<div class="btn-container">
					<button
						type="button"
						class="btn custom-btn btn-primary text-white mt-3"
						disabled
					>
						Save changes
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
var url = window.location.href;
    var id = url.substring(url.lastIndexOf('?') + 1);
		if (id == 'password') {
			$('#pills-account-tab').removeClass('active');
			$('#pills-account').removeClass('active show');
			$('#pills-security-tab').addClass('active');
			$('#pills-security').addClass('active show');
		}else if (id == 'billing') {
			$('#pills-account-tab').removeClass('active');
			$('#pills-account').removeClass('active show');
			$('#pills-billing-information-tab').addClass('active');
			$('#pills-billing-information').addClass('active show');
		}else if (id == 'notification') {
			$('#pills-account-tab').removeClass('active');
			$('#pills-account').removeClass('active show');
			$('#pills-notifications-tab').addClass('active');
			$('#pills-notifications').addClass('active show');
		}
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

	$(document).ready(function () {
		$('.billing-country').on('change',function(){
			var countryId = $(this).val();
			States(countryId,'billing-state')
		})
		function States(countryId,cType){
			$.ajax({
				url: "{{ url('get-state') }}/"+countryId,
				success: function(response){
					var currentState = $('.'+cType).attr('data-state');
					$('.'+cType).html('').trigger('change');
					$('.'+cType).append(response).trigger('change');
				}
			})
		}
		$('.billing-state').on('change',function(){
			var stateId = $(this).val();
				Cities(stateId,'billing-city');
		})

		function Cities(stateId,cType){
			$.ajax({
				url: "{{ url('get-city') }}/"+stateId,
				success: function(response){
					var currentState = $('.'+cType).attr('data-city');
					$('.'+cType).html('').trigger('change');
					$('.'+cType).append(response).trigger('change');
				}
			})
		}
	});
</script>
@endsection
