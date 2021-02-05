@extends('frontend.layouts.app')
@section('title', 'Edit Service  ')
@section('styling')
@endsection
@section('content')
<div class="create-service">
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
							>{{ __('home.service information')}}</a
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
							>{{ __('home.pricing')}}</a
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
							>{{ __('home.description & FAQ')}}</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="requirements-tab"
							data-toggle="tab"
							href="#requirements"
							role="tab"
							aria-controls="requirements"
							aria-selected="false"
							>{{ __('home.requirements')}}</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="gallery-tab"
							data-toggle="tab"
							href="#gallery"
							role="tab"
							aria-controls="gallery"
							aria-selected="false"
							>{{ __('home.gallery')}}</a
						>
					</li>
				</ul>

				<div class="btn-container">
					<div class="btn-groups">
						<a href="" class="btn">{{ __('home.Save')}}</a>
						<a href="" class="btn">{{ __('home.Save & Preview')}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="outer-content">
		<div class="container">
			<div class="inner-content">
				<div class="row justify-content-center">
					<div class="col-xs-12 col-md-12 col-lg-10">
						<div class="service-tab-content">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
									@if ($errors->any())
									 <div class="alert alert-danger">
									    <ul>
									       @foreach ($errors->all() as $error)
									       <li>{{ $error }}</li>
									       @endforeach
									    </ul>
									 </div>
									@endif
									<form id="service-form">
										@csrf
										<div class="tab-pane-box">
											<div class="pane-box">
												<h6>{{ __('home.gig Title')}}</h6>
												<div class="inner-pane-box">
													<textarea name="" id="service_title" class="form-control" rows="2"
														placeholder="I will do something I'm really good at" name="service_title">{{$getSingleData->service_title}}</textarea>
													<span class="service_title-error text-danger"  style="display: none;">title is required</span>
													<div class="sub-box">
														<p class="text">{{ __('home.Just perfect')}}</p>
														<p class="max-char"><span class="descCount">0</span>/80 max</p>
													</div>
													<span class="display_error">{{ $errors->first('service_title') }}</span>

												</div>
											</div>

											<div class="pane-box">
												<h6>{{ __('home.seo Title')}}</h6>
												<div class="inner-pane-box">
													<input type="text" class="form-control" value="{{$getSingleData->seo_title}}" id="seo_title" name="seo_title" />

													<div class="sub-box">
														<!-- <p class="text">Just perfect</p> -->
														<p class="max-char"><span class="seoCount">0</span>/50 max</p>
													</div>
												</div>
											</div>

											<div class="pane-box">
												<h6>{{ __('home.category')}}</h6>
												<div class="inner-pane-box">
													<div class="select-category">
														<select name="cat_id" id="category" class="custom-select">
															<option value="">{{ __('home.Select Category')}}</option>
															@foreach($mainCategories as $mainCat)
															<option value="{{$mainCat->id}}" {{$getSingleData->cat_id == $mainCat->id ? 'selected': ''}}>{{$mainCat->cat_title}}</option>
															@endforeach
														</select>

														<select name="cat_child_id" id="sub-category" class="custom-select">
															<option value="{{$getSingleData->cat_child_id}}">{{Engezli::get_subcat($getSingleData->cat_child_id)->cat_title}}</option>
														</select>
														<span class="cat_error text-danger"  style="display: none;">category is required</span>
														<span class="sub_cat-error text-danger"  style="display: none;">sub category is required</span>
													</div>
												</div>
											</div>

											<div class="pane-box">
												<h6>{{ __('home.search tags')}}</h6>
												<div class="inner-pane-box">

													<input type="text" name="search_tags" id="search_tags" value="{{$getSingleData->search_tags}}"
														data-role="tagsinput" class="form-control tagsinput" />

													<div class="sub-box">
														<!-- <p class="text">Just perfect</p> -->
														<p class="max-char">
															5 tags maximum. Use letters and numbers only.
														</p>
													</div>
												</div>
											</div>

											<div class="pane-box">
												<h6></h6>
												<div class="inner-pane-box">
													<p class="note">
														<span>
															<i class="fa fa-info-circle"></i> Please note:
														</span>
														Some categories require that sellers verify their
														skills.
													</p>
												</div>
											</div>
										</div>
										<div class="btns-group">
											<!-- <button class="prevtab btn btn-primary">Prev</button> -->
											<button class="cancle custom-btn">{{ __('home.Cancel')}}</button>
											<button class=" custom-btn" type="submit" id="submit"  form="service-form">{{ __('home.Save')}}</button>
										</div>
									</form>
								</div>
								<div class="tab-pane fade pricing-tab-container" id="pricing" role="tabpanel"
									aria-labelledby="pricing-tab">
									<form id="package-form">
										<input type="hidden" name="type" value="2">
										<div class="tab-pane-box">
											<div class="heading">
												<h3>{{ __('home.Packages & Pricing')}}</h3>
												<p>The buyer needs the following information</p>
											</div>

											<!-- New Pricing Design -->
											<div class="packages-pricing-wrapper">
												<div class="pricing-box">
													<div class="category border-bottom">
														<h5>{{ __('home.Basic')}}</h5>
													</div>

													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="basic">
														<input type="hidden" name="proposal_packages[1][package_title]" value="Basic">
														<input type="hidden" name="proposal_packages[1][package_id]" value="<?= $package1->id; ?>">

														<textarea
															name="proposal_packages[1][package_name]"
															id=""
															rows="3"
															class="form-control title1"
															placeholder="Name your package..."
														>{{$package1->title}}</textarea>
														<span class="title1-error text-danger" style="display: none;">Package title is required</span>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[1][package_desc]"
															id=""
															rows="3"
															class="form-control description1"
															placeholder="Describe the details of your service..."
														>{{$package1->description}}</textarea>
														<span class="desc1-error text-danger"  style="display: none;"> Description is required</span>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[1][delivery_time]" id="delivery_time1" class="select2 ">
															<option value="">{{ __('home.delivery time')}}</option>
															<option value="{{$package1->delivery_time}}" selected="">{{$package1->delivery_time}}</option>
															<option value="1 day">1 {{ __('home.day delivery')}}</option>
															<option value="2 day">2 {{ __('home.day delivery')}}</option>
															<option value="3 day">3 {{ __('home.day delivery')}}</option>
															<option value="4 day">4 {{ __('home.day delivery')}}</option>
															<option value="5 day">5 {{ __('home.day delivery')}}</option>
															<option value="6 day">6 {{ __('home.day delivery')}}</option>
															<option value="7 day">7 {{ __('home.day delivery')}}</option>
															<option value="8 day">8 {{ __('home.day delivery')}}</option>
															<option value="9 day">9 {{ __('home.day delivery')}}</option>
															<option value="10 day">10 {{ __('home.day delivery')}}</option>
														</select>
													</div>
														<span class="delivery1-error text-danger"  style="display: none;">Delivery time is required</span>
													<div class="form-group border-bottom">
														<select name="proposal_packages[1][no_of_pages]" id="no_of_pages1" class="select2">
															<option value="">{{ __('home.Number of Pages')}}</option>
															<option value="{{$package1->no_of_pages}}" selected="">{{$package1->no_of_pages}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>
														<span class="no_of_pages1-error text-danger"  style="display: none;">No of pages required</span>
													<div class="form-group border-bottom">
														<select name="proposal_packages[1][revision]" id="revision1" class="select2">
															<option value="">{{ __('home.revisions')}}</option>
															<option value="{{$package1->revision}}" selected="">{{$package1->revision}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>
														<span class="revision1-error text-danger"  style="display: none;">Revision is required</span>
													<div class="extra-options packg-options1">

													</div>

													{{$package1->package_price}}
													<div class="form-group price-dropdown">
														<select name="proposal_packages[1][package_price]" id="package_price1" class="select2">
															<option value="{{$package1->price}}" selected="">${{$package1->price}}</option>
															<option value="5">$5</option>
															<option value="10">$10</option>
															<option value="15">$15</option>
															<option value="20">$20</option>
															<option value="25">$25</option>
															<option value="30">$30</option>
															<option value="35">$35</option>
															<option value="40">$40</option>
															<option value="45">$45</option>
															<option value="50">$50</option>
														</select>
													</div>
														<span class="price1-error text-danger"  style="display: none;">Package price is required</span>
												</div>

												<div class="pricing-box">
													<div class="category border-bottom">
														<h5>{{ __('home.Standard')}}</h5>
													</div>
													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="standard">
														<input type="hidden" name="proposal_packages[2][package_title]" value="Standard">
														<input type="hidden" name="proposal_packages[2][package_id]" value="<?= $package2->id; ?>">

														<textarea
															name="proposal_packages[2][package_name]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Name your package..."
														>{{$package2->title}}</textarea>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[2][package_desc]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Describe the details of your service..."
														>{{$package2->description}}</textarea>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[2][delivery_time]" id="" class="select2">
															<option value="">{{ __('home.delivery time')}}</option>
															<option value="{{$package2->delivery_time}}" selected="">{{$package2->delivery_time}}</option>
															<option value="1 day">1 {{ __('home.day delivery')}}</option>
															<option value="2 day">2 {{ __('home.day delivery')}}</option>
															<option value="3 day">3 {{ __('home.day delivery')}}</option>
															<option value="4 day">4 {{ __('home.day delivery')}}</option>
															<option value="5 day">5 {{ __('home.day delivery')}}</option>
															<option value="6 day">6 {{ __('home.day delivery')}}</option>
															<option value="7 day">7 {{ __('home.day delivery')}}</option>
															<option value="8 day">8 {{ __('home.day delivery')}}</option>
															<option value="9 day">9 {{ __('home.day delivery')}}</option>
															<option value="10 day">10 {{ __('home.day delivery')}}</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[2][no_of_pages]" id="" class="select2">
															<option value="">{{ __('home.Number of Pages')}}</option>
															<option value="{{$package2->no_of_pages}}" selected="">{{$package2->no_of_pages}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[2][revision]" id="" class="select2">
															<option value="">{{ __('home.revisions')}}</option>
															<option value="{{$package2->revision}}" selected="">{{$package2->revision}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>

													<div class="extra-options packg-options2">

													</div>

													<div class="form-group price-dropdown">
														<select name="proposal_packages[2][package_price]" id="" class="select2">
															<option value="{{$package2->price}}" selected="">${{$package2->price}}</option>
															<option value="5">$5</option>
															<option value="10">$10</option>
															<option value="15">$15</option>
															<option value="20">$20</option>
															<option value="25">$25</option>
															<option value="30">$30</option>
															<option value="35">$35</option>
															<option value="40">$40</option>
															<option value="45">$45</option>
															<option value="50">$50</option>
														</select>
													</div>
												</div>

												<div class="pricing-box">
													<div class="category border-bottom">
														<h5>{{ __('home.premium')}}</h5>
													</div>
													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="premium">
														<input type="hidden" name="proposal_packages[3][package_title]" value="Premium">
														<input type="hidden" name="proposal_packages[3][package_id]" value="<?= $package3->id; ?>">
														<textarea
															name="proposal_packages[3][package_name]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Name your package..."
														>{{$package3->title}}</textarea>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[3][package_desc]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Describe the details of your service..."
														>{{$package3->description}}</textarea>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[3][delivery_time]" id="" class="select2">
															<option value="">{{ __('home.delivery time')}}</option>
															<option value="{{$package3->delivery_time}}" selected="">{{$package3->delivery_time}}</option>
															<option value="1 day">1 {{ __('home.day delivery')}}</option>
															<option value="2 day">2 {{ __('home.day delivery')}}</option>
															<option value="3 day">3 {{ __('home.day delivery')}}</option>
															<option value="4 day">4 {{ __('home.day delivery')}}</option>
															<option value="5 day">5 {{ __('home.day delivery')}}</option>
															<option value="6 day">6 {{ __('home.day delivery')}}</option>
															<option value="7 day">7 {{ __('home.day delivery')}}</option>
															<option value="8 day">8 {{ __('home.day delivery')}}</option>
															<option value="9 day">9 {{ __('home.day delivery')}}</option>
															<option value="10 day">10 {{ __('home.day delivery')}}</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[3][no_of_pages]" id="" class="select2">
															<option value="">{{ __('home.Number of Pages')}}</option>
															<option value="{{$package3->no_of_pages}}" selected="">{{$package3->no_of_pages}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[3][revision]" id="" class="select2">
															<option value="">{{ __('home.revisions')}}</option>
															<option value="{{$package3->revision}}" selected="">{{$package3->revision}}</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>

													<div class="extra-options packg-options3">

													</div>

													<div class="form-group price-dropdown">
														<select name="proposal_packages[3][package_price]" id="" class="select2">
															<option value="{{$package3->price}}" selected="">${{$package3->price}}</option>
															<option value="5">$5</option>
															<option value="10">$10</option>
															<option value="15">$15</option>
															<option value="20">$20</option>
															<option value="25">$25</option>
															<option value="30">$30</option>
															<option value="35">$35</option>
															<option value="40">$40</option>
															<option value="45">$45</option>
															<option value="50">$50</option>
														</select>
													</div>
												</div>
											</div>
											<!-- End Pricing Design -->
										<div class="add-extra-service">
											<h5>{{ __('home.Add extra service')}}</h5>
											<div class="extra-service-container">
												<div class="note">
													<p>
														<span
															><i class="fa fa-lightbulb"></i> {{ __('home.Note')}}:</span
														>
														{{ __('home.Increase your revenue by offering in-demand services at an additional cost.')}}
													</p>
												</div>

												<div class="extra-service-list-item">
													<div class="list-item fast-delivery">
														<div class="item-title">
															<div class="custom-control custom-checkbox">
																<input
																	type="checkbox"
																	class="custom-control-input"
																	id="customCheck01"
																/>
																<label
																	class="custom-control-label"
																	for="customCheck01"
																>
																	{{ __('home.Extra fast delivery')}}
																</label>
															</div>
														</div>
														<div class="inner-list-item-box d-none">
															<table class="table">
																<tr>
																	<td>{{ __('home.Basic')}}</td>
																	<td>
																		<span>{{ __('home.I will deliver in only')}}</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">{{ __('home.Select')}}</option>
																			<option value="">1 {{ __('home.days')}}</option>
																			<option value="">2 {{ __('home.days')}}</option>
																			<option value="">3 {{ __('home.days')}}</option>
																			<option value="">4 {{ __('home.days')}}</option>
																			<option value="">5 {{ __('home.days')}}</option>
																			<option value="">6 {{ __('home.days')}}</option>
																			<option value="">7 {{ __('home.days')}}</option>
																			<option value="">8 {{ __('home.days')}}</option>
																			<option value="">9 {{ __('home.days')}}</option>
																			<option value="">10 {{ __('home.days')}}</option>
																		</select>
																	</td>
																	<td>
																		<span>{{ __('home.for an extra')}}</span>
																		<select
																			name=""
																			class="custom-select"
																			id=""
																		>
																			<option value="">$</option>
																			<option value="">$5</option>
																			<option value="">$10</option>
																			<option value="">$15</option>
																			<option value="">$20</option>
																			<option value="">$25</option>
																			<option value="">$30</option>
																			<option value="">$35</option>
																			<option value="">$40</option>
																			<option value="">$45</option>
																			<option value="">$50</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td>{{ __('home.Standard')}}</td>
																	<td>
																		<span>{{ __('home.I will deliver in only')}}</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">{{ __('home.Select')}}</option>
																			<option value="">1 {{ __('home.days')}}</option>
																			<option value="">2 {{ __('home.days')}}</option>
																			<option value="">3 {{ __('home.days')}}</option>
																			<option value="">4 {{ __('home.days')}}</option>
																			<option value="">5 {{ __('home.days')}}</option>
																			<option value="">6 {{ __('home.days')}}</option>
																			<option value="">7 {{ __('home.days')}}</option>
																			<option value="">8 {{ __('home.days')}}</option>
																			<option value="">9 {{ __('home.days')}}</option>
																			<option value="">10 {{ __('home.days')}}</option>
																		</select>
																	</td>
																	<td>
																		<span>{{ __('home.for an extra')}}</span>
																		<select
																			name=""
																			class="custom-select"
																			id=""
																		>
																			<option value="">$</option>
																			<option value="">$5</option>
																			<option value="">$10</option>
																			<option value="">$15</option>
																			<option value="">$20</option>
																			<option value="">$25</option>
																			<option value="">$30</option>
																			<option value="">$35</option>
																			<option value="">$40</option>
																			<option value="">$45</option>
																			<option value="">$50</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td>{{ __('home.premium')}}</td>
																	<td>
																		<span>{{ __('home.I will deliver in only')}}</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">{{ __('home.Select')}}</option>
																			<option value="">1 {{ __('home.days')}}</option>
																			<option value="">2 {{ __('home.days')}}</option>
																			<option value="">3 {{ __('home.days')}}</option>
																			<option value="">4 {{ __('home.days')}}</option>
																			<option value="">5 {{ __('home.days')}}</option>
																			<option value="">6 {{ __('home.days')}}</option>
																			<option value="">7 {{ __('home.days')}}</option>
																			<option value="">8 {{ __('home.days')}}</option>
																			<option value="">9 {{ __('home.days')}}</option>
																			<option value="">10 {{ __('home.days')}}</option>
																		</select>
																	</td>
																	<td>
																		<span>{{ __('home.for an extra')}}</span>
																		<select
																			name=""
																			class="custom-select"
																			id=""
																		>
																			<option value="">$</option>
																			<option value="">$5</option>
																			<option value="">$10</option>
																			<option value="">$15</option>
																			<option value="">$20</option>
																			<option value="">$25</option>
																			<option value="">$30</option>
																			<option value="">$35</option>
																			<option value="">$40</option>
																			<option value="">$45</option>
																			<option value="">$50</option>
																		</select>
																	</td>
																</tr>
															</table>
														</div>
													</div>

													<div class="list-item additional-page">
														<div class="item-title">
															<div class="custom-control custom-checkbox">
																<input
																	type="checkbox"
																	class="custom-control-input"
																	id="customCheck1"
																/>
																<label
																	class="custom-control-label"
																	for="customCheck1"
																>
																	{{ __('home.Additional Page')}}
																</label>
															</div>
														</div>
														<div class="hided-option d-none">
															<div class="extra-pay">
																<span>{{ __('home.for an extra')}}</span>
																<select name="" class="custom-select" id="">
																	<option value="">$</option>
																	<option value="">$5</option>
																	<option value="">$10</option>
																	<option value="">$15</option>
																	<option value="">$20</option>
																	<option value="">$25</option>
																	<option value="">$30</option>
																	<option value="">$35</option>
																	<option value="">$40</option>
																	<option value="">$45</option>
																	<option value="">$50</option>
																</select>
															</div>
															<div class="addition-date">
																<span>{{ __('home.an additional')}}</span>
																<select name="" class="custom-select" id="">
																	<option value="">$</option>
																	<option value="">$5</option>
																	<option value="">$10</option>
																	<option value="">$15</option>
																	<option value="">$20</option>
																	<option value="">$25</option>
																	<option value="">$30</option>
																	<option value="">$35</option>
																	<option value="">$40</option>
																	<option value="">$45</option>
																	<option value="">$50</option>
																</select>
															</div>
														</div>
													</div>
													<div class="list-item additional-revision">
														<div class="item-title">
															<div class="custom-control custom-checkbox">
																<input
																	type="checkbox"
																	class="custom-control-input"
																	id="customCheck2"
																/>
																<label
																	class="custom-control-label"
																	for="customCheck2"
																>
																	{{ __('home.Additional revision')}}
																</label>
															</div>
														</div>
														<div class="hided-option d-none">
															<div class="extra-pay">
																<span>{{ __('home.for an extra')}}</span>
																<select name="" class="custom-select" id="">
																	<option value="">$</option>
																	<option value="">$5</option>
																	<option value="">$10</option>
																	<option value="">$15</option>
																	<option value="">$20</option>
																	<option value="">$25</option>
																	<option value="">$30</option>
																	<option value="">$35</option>
																	<option value="">$40</option>
																	<option value="">$45</option>
																	<option value="">$50</option>
																</select>
															</div>
															<div class="addition-date">
																<span>{{ __('home.an additional')}}</span>
																<select name="" class="custom-select" id="">
																	<option value="">$</option>
																	<option value="">$5</option>
																	<option value="">$10</option>
																	<option value="">$15</option>
																	<option value="">$20</option>
																	<option value="">$25</option>
																	<option value="">$30</option>
																	<option value="">$35</option>
																	<option value="">$40</option>
																	<option value="">$45</option>
																	<option value="">$50</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="btns-group">
										<!-- <button class="prevtab btn btn-primary">Prev</button> -->
										<button class="cancle custom-btn">{{ __('home.Cancel')}}</button>
										<button class="custom-btn" type="submit" id="package-submit" form="package-form">{{ __('home.Save')}}</button>
									</div>
									</form>
								</div>
								<div class="tab-pane fade descriptionFaq-tab" id="descriptionFaq" role="tabpanel"
									aria-labelledby="descriptionFaq-tab">

									<div class="tab-pane-box">
										<form id="description-form">
											<div class="heading">
												<h3>{{ __('home.description')}}</h3>
												<p>{{ __('home.briefly describe you gig')}}</p>
											</div>

											<div class="page-wrapper box-content">
												<textarea class="content" id="service_desc" name="service_desc">{{$getSingleData->service_desc}}</textarea>
												<div class="max-char">
													<p>0/1200 characters</p>
												</div>
											</div>
										</form>
											<div class="faq-section">
												<div class="faq-header">
													<h3>{{ __('home.frequently ask questions')}}</h3>
													<button class="custom-btn add-faq-btn">
														<i class="fa fa-plus"></i> {{ __('home.add faq')}}
													</button>
												</div>
												<p class="QA">
													{{ __('home.Add Questions & Answers for Your Buyers.')}}
												</p>
												<form id="faq-form">
													<input type="hidden" name="service_id" value="{{$getSingleData->id}}">
													<div class="input-box-container d-none" id="input-box-content">
														<div class="form-group">
															<input type="hidden" name="type" value="3">
															<input type="text" id="faq_title" name="title" class="form-control faq_title"
																placeholder="Add a Question: i.e. Do you translate to English as well?" />
														</div>
														<div class="form-group">
															<textarea maxlength="300" id="faq_description" name="description" class="form-control faq_desc" rows="3"
																placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew."></textarea>
														</div>

														<div class="btn-container-box">
															<div class="btns">
																<a class="custom-btn cancle-btn">
																	{{ __('home.Cancel')}}
																</a>
																<button class="custom-btn" type="submit" id="faq-submit">{{ __('home.Save')}}</button>
															</div>
														</div>
													</div>
												</form>
												<div class="added-faq-box-container">

													@foreach($getSingleFaq as $faq)
													<div class="card">
														<div class="card-header" id="heading{{$faq->id}}">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" id="collapse-button{{$faq->id}}" data-toggle="collapse"
																	data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
																	<span class="faq_heading{{$faq->id}}">{{$faq->title}}</span>
																</button>
															</h5>
														</div>

														<div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
															data-parent="#accordion">
															<div class="card-body">
																<div class="input-box-container">
																	<div class="form-group">
																		<input type="text" value="{{$faq->title}}" name="title" id="title-{{$faq->id}}"  class="form-control"
																			placeholder="Add a Question: i.e. Do you translate to English as well?" />
																	</div>
																	<div class="form-group">
																		<textarea maxlength="300" name="description" id="description-{{$faq->id}}" class="form-control" rows="3"
																			placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">{{$faq->description}}</textarea>
																	</div>

																	<div class="btn-container-box">
																		<div class="btns">
																			<button onclick="deleteFaq({{$faq->id}})" class="custom-btn delete-btn">
																				<i class="fa fa-times"></i> delete
																			</button>
																		</div>
																		<div class="btns">
																			<button class="custom-btn" data-toggle="collapse"
																				data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
																				cancel
																			</button>
																			<button class="custom-btn faq_button" data-id="{{$faq->id}}">
																				save
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													@endforeach
													<div id="accordion" class="accordion">

													</div>
												</div>
											</div>
										</div>
										<div class="btns-group">
											<!-- <button class="prevtab btn btn-primary">Prev</button> -->
											<button class="cancle custom-btn">{{ __('home.Cancel')}}</button>
											<button class="nexttab custom-btn" type="submit" id="submit-desc"  form="description-form">{{ __('home.Save')}}</button>
										</div>
								</div>
								<div class="tab-pane fade  requirements-tab" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">
										<div class="tab-pane-box">
											<form id="requirements-form">
												<input type="hidden" name="service_id" value="{{$getSingleData->id}}">
												<input type="hidden" name="type" value="4">
											<div class="require-text-title">
												<h5>
													<i class="fa fa-file"></i> {{ __('home.Here’s how buyers will see your questions. You can edit or remove questions anytime.')}}
												</h5>
											</div>
											<div class="question-input-container add-requirment d-none">
												<div class="add-ques-header">
													<h6>{{ __('home.add question')}}</h6>
													<div class="answer-type">
														<span>{{ __('home.answer type')}}</span>
														<select name="response" id="response" class="select2">
															<option value="free text">{{ __('home.free text')}}</option>
															<option value="attachement">{{ __('home.Attachement')}}</option>
														</select>
													</div>
												</div>

												<textarea
													name="question"
													id="question"
													class="form-control question-textarea"
													rows="3"
													placeholder="Request necessary details such as dimensions, brand guidelines, and more."
												></textarea>

												<div class="sub-box">
													<div class="form-check">
														<input
															type="checkbox"
															class="form-check-input"
															id="exampleCheck1"
															name="mandatory"
															value="1" />
														<label class="form-check-label"
															for="exampleCheck1">{{ __('home.Answer is mandatory')}}</label>
													</div>
													<p class="max-char"><span>0</span>/450 max</p>
												</div>

												<div class="btn-container-box">
													<div class="btns">
														<button class="custom-btn btn-cancle">
															{{ __('home.Cancel')}}
														</button>
														<button class="custom-btn btn-add" type="submit" id="requirements-submit">{{ __('home.add')}}</button>
													</div>
												</div>
											</div>
										</form>
											<div class="added-questions d-none" id="added-questions">
												<!-- <div class="question-list-item">
													<div class="inner-text">
														<p>free text</p>
														<div class="dropdown">
															<a
																class="nav-link globe-icon"
																href="#"
																id="navbarDropdown"
																role="button"
																data-toggle="dropdown"
																aria-haspopup="true"
																aria-expanded="false"
															>
																<i class="fa fa-ellipsis-h"></i>
															</a>
															<div
																class="dropdown-menu"
																aria-labelledبواسطة="navbarDropdown"
															>
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
													<h6>
														Lorem ipsum dolor sit amet consectetur,
														adipisicing elit.
													</h6>
												</div> -->
											</div>
											<div class="added-questions">
												@foreach($getSingleReq as $request)
												<div class="question-list-item requiremet-question-{{$request->id}}">
													<div class="inner-text">
														<p class="requirement-response{{$request->id}}">{{$request->response}}</p>
														<div class="dropdown">
															<a
																class="nav-link globe-icon"
																href="#"
																id="navbarDropdown"
																role="button"
																data-toggle="dropdown"
																aria-haspopup="true"
																aria-expanded="false"
															>
																<i class="fa fa-ellipsis-h"></i>
															</a>
															<div
																class="dropdown-menu"
																aria-labelledبواسطة="navbarDropdown"
															>
																<a class="dropdown-item" href="javascript:void(0);" onclick="showRequirement({{$request->id}})">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);" onclick="deleteRequirement({{$request->id}})">Delete</a>
															</div>
														</div>
													</div>
													<h6 class="requirement-heading{{$request->id}}">
														{{$request->question}}
													</h6>
												</div>
												<div class="question-input-container d-none requiremet-question-{{$request->id}}" id="requirement{{$request->id}}">
													<div class="add-ques-header">
														<h6>{{ __('home.add question')}}</h6>
														<div class="answer-type">
															<span>{{ __('home.answer type')}}</span>
															<select name="response" id="response{{$request->id}}" class="select2">
																<option value="free text"{{$request->response == 'free text' ? 'selected="selected"' : ''}}>{{ __('home.free text')}}</option>
																<option value="attachement"{{$request->response == 'attachement' ? 'selected="selected"' : ''}}>{{ __('home.Attachement')}}</option>
															</select>
														</div>
													</div>

													<textarea
														name="question"
														class="form-control question-textarea"
														id="question{{$request->id}}"
														rows="3"
														placeholder="Request necessary details such as dimensions, brand guidelines, and more."
													>{{$request->question}}</textarea>

													<div class="sub-box">
														<div class="form-check">
															<input
																type="checkbox"
																class="form-check-input"
																id="exampleCheck1"
																name="mandatory"
																value="1" {{$request->mandatory_status == '1' ? 'checked="checked"' : ''}} />
															<label
																class="form-check-label"
																for="exampleCheck1"
																>{{ __('home.Answer is mandatory')}}</label
															>
														</div>
														<p class="max-char"><span>0</span>/450 max</p>
													</div>

													<div class="btn-container-box">
														<div class="btns">
															<button class="custom-btn btn-cancle cancel_button" data-id="{{$request->id}}">
																{{ __('home.Cancel')}}
															</button>
															<button class="custom-btn btn-add requirement_button" data-id="{{$request->id}}"  id="requirements-btn">{{ __('home.add')}}</button>
														</div>
													</div>
												</div>
												@endforeach
											</div>
											<button class="custom-btn add-new-btn-ques" >
												<i class="fa fa-plus"></i> {{ __('home.add new question')}}
											</button>
										</div>

										<!-- <div class="tab-pane-box">
											<div class="require-text-title">
												<h5>
													<i class="fa fa-file"></i> Here’s how buyers will
													see your questions. You can edit or remove questions
													anytime.
												</h5>
											</div>
											<div class="question-input-container d-none">
												<h6>add question</h6>
												<textarea name="question" id="" class="form-control question-textarea" rows="3"
													placeholder="Request necessary details such as dimensions, brand guidelines, and more."></textarea>
												<select name="response" class="form-control">
													<option value="free text">Free text</option>
													<option value="attachement">Attachement</option>
												</select>
												<div class="btn-container-box">
													<div class="btns">
														<button class="custom-btn btn-cancle">
															cancle
														</button>
														<button type="submit" id="requirements-submit" class="custom-btn btn-add">add</button>
													</div>
												</div>
											</div>
											<div class="added-questions d-none">
												<div class="question-list-item">
													<div class="inner-text">
														<p>free text</p>
														<div class="dropdown">
															<a class="nav-link globe-icon" href="#" id="navbarDropdown" role="button"
																data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="fa fa-ellipsis-h"></i>
															</a>
															<div class="dropdown-menu" aria-labelledبواسطة="navbarDropdown">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
													<h6>
														Lorem ipsum dolor sit amet consectetur,
														adipisicing elit.
													</h6>
												</div>
											</div>
											<button class="custom-btn add-new-btn-ques">
												<i class="fa fa-plus"></i> add new question
											</button>
										</div> -->

									<div class="btns-group">
										<!-- <button class="prevtab btn btn-primary">Prev</button> -->
										<button class="cancle custom-btn">{{ __('home.Cancel')}}</button>
										<button class="nexttab custom-btn">{{ __('home.Save')}}</button>
									</div>
								</div>
								<div class="tab-pane fade gallery-tab-container" id="gallery" role="tabpanel"
									aria-labelledby="gallery-tab">
									<form id="gallery-form" enctype="multipart/form-data">
										<input type="hidden" name="service_id" value="{{$getSingleData->id}}">
										<input type="hidden" name="type" value="5">
										<div class="tab-pane-box">

											<div class="heading">
												<h3>{{ __('home.Build Your Gig Gallery')}}</h3>
												<p>{{ __('home.Add memorable content to your gallery to set yourself apart from competitors.')}}</p>
											</div>

											<div class="note">
												<p class="icon"><i class="fa fa-info-circle"></i></p>
												<p class="text"><span>{{ __('home.Note')}}: </span> To comply with Fiverr’s terms of service, make sure to
													upload only
													content you either
													own or you have the permission or license to use.</p>
											</div>
											<div class="main-upload-wrapper">

												<div class="box gig-photos">

													<div class="outer-box">
														<div class="inner-heading">
															<h5>{{ __('home.Gig Photos')}}</h5>
															<p>{{ __('home.Upload photos that describe or are related to your Gig.')}}</p>
														</div>
														<p class="show-result">(0/3)</p>
													</div>

													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01" style="background-image: url('/images/service_images/{{$getSingleData->service_img1}}');"></div>
															<input id="01" class="file" value="" name="service_img1" type="file" accept="image/*">

															<!-- <div class="control">
																<input id="01" class="file" type="file" accept="image/*">
																<label for="file">choose a file</label>
															</div> -->
														</div>
														<div class="gig-photo-wrap">
															<div class="uploadpreview 02" style="background-image: url('/images/service_images/{{$getSingleData->service_img2}}');"></div>
															<input id="02" type="file" name="service_img2" accept="image/*">
														</div>

														<div class="gig-photo-wrap">
															<div class="uploadpreview 03" style="background-image: url('/images/service_images/{{$getSingleData->service_img3}}');"></div>
															<input id="03" type="file" name="service_img3" accept="image/*">
														</div>
													</div>
												</div>
												<div class="box gig-video">

													<div class="outer-box">
														<div class="inner-heading">
															<h5>{{ __('home.Gig Video')}}</h5>
															<p>{{ __('home.Add a relevant, high quality video that best showcases your Gig.')}}</p>
															<p class="size">{{ __('home.Please choose a video shorter than 75 seconds and smaller than 50MB')}}</p>
														</div>
														<p class="show-result">(0/1)</p>
													</div>
													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01"></div>
															<input id="video01" class="file" type="file" name="service_video" accept="video/mp4,video/x-m4v,video/*">

															<!-- <div class="control">
																<input id="01" class="file" type="file" accept="image/*">
																<label for="file">choose a file</label>
															</div> -->
														</div>
													</div>
												</div>
												<div class="box gig-pdf">
													<div class="outer-box">
														<div class="inner-heading">
															<h5>{{ __('home.Gig PDFs')}}</h5>
															<p>{{ __('home.We only recommend adding a PDF file if it further clarifies the service you will be providing.')}}</p>
														</div>
														<p class="show-result">(0/2)</p>
													</div>

													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01"></div>
															<input id="pdf01" class="file" type="file" name="service_pdf1" accept="application/pdf,application/vnd.ms-excel">

															<!-- <div class="control">
																<input id="01" class="file" type="file" accept="image/*">
																<label for="file">choose a file</label>
															</div> -->
														</div>

														<div class="gig-photo-wrap">
															<div class="uploadpreview 02"></div>
															<input id="padf02" type="file" name="service_pdf2" accept="application/pdf,application/vnd.ms-excel">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="btns-group">
											<!-- <button class="prevtab btn btn-primary">Prev</button> -->
											<button class="cancle custom-btn">{{ __('home.Cancel')}}</button>
											<button class="nexttab custom-btn" type="submit" id="gallery-submit" form="gallery-form">{{ __('home.Save')}}</button>
										</div>
									</form>
								</div>
							</div>


						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="service-guides">
							<div class="card">
								<div class="card-body"></div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function bootstrapTabControl() {
		var i,
			items = $(".create-service .nav-link"),
			pane = $(".create-service .tab-pane");
		// next
		$(".nexttab").on("click", function () {

			for (i = 0; i < items.length; i++) {
				if ($(items[i]).hasClass("active") == true) {
					break;
				}
			}
			if (i < items.length - 1) {
				// for tab
				$(items[i]).removeClass("active");
				$(items[i + 1]).addClass("active");
				// for pane
				$(pane[i]).removeClass("show active");
				$(pane[i + 1]).addClass("show active");
			}
		});
		// Prev
		$(".prevtab").on("click", function () {
			for (i = 0; i < items.length; i++) {
				if ($(items[i]).hasClass("active") == true) {
					break;
				}
			}
			if (i != 0) {
				// for tab
				$(items[i]).removeClass("active");
				$(items[i - 1]).addClass("active");
				// for pane
				$(pane[i]).removeClass("show active");
				$(pane[i - 1]).addClass("show active");
			}
		});
	}
	bootstrapTabControl();
</script>

<script>
	$(document).ready(function () {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		// show question-input-container
		$(".add-new-btn-ques").on("click", function (e) {
			$(".add-requirment").removeClass("d-none");
			// $(".added-questions").removeClass("d-none");
			$(this).addClass("d-none");
		});

		// hide question-input-container
		$(".add-requirment .btn-cancle").on("click", function (e) {
			$(".add-requirment").addClass("d-none");
			$(".add-new-btn-ques").removeClass("d-none");
		});

		// show added-questions
		$(".add-requirment .btn-add").on("click", function (e) {
			$(".added-questions").removeClass("d-none");
			$(".add-requirment").addClass("d-none");
			$(".add-new-btn-ques").removeClass("d-none");
		});

		// show faq-added-questions-container
		$(".add-faq-btn").on("click", function (e) {
			$(".faq-section #input-box-content").removeClass("d-none");
		});

		// hide faq-added-questions-container
		$(".faq-section .cancle-btn").on("click", function (e) {
			$(".faq-section #input-box-content").addClass("d-none");
		});

		/////////////////////////////////////
		// hide try-now container
		$(".try-now-btn").on("click", function (e) {
			e.preventDefault();
			$(".try-now").addClass("d-none");
		});


		////////////////////////////////////////
		// fast-deliver
		$('.fast-delivery input[type="checkbox"]').click(function () {
			if ($(this).prop("checked") == true) {
				$(".fast-delivery .inner-list-item-box").removeClass('d-none');
			} else if ($(this).prop("checked") == false) {
				$(".fast-delivery .inner-list-item-box").addClass('d-none');
			}
		});

		// extra-additional-gig
		$('.additional-page input[type="checkbox"]').click(function () {
			if ($(this).prop("checked") == true) {
				$(".additional-page .hided-option").removeClass('d-none');
			} else if ($(this).prop("checked") == false) {
				$(".additional-page .hided-option").addClass('d-none');
			}
		});

		// extra-additional-revision
		$('.additional-revision input[type="checkbox"]').click(function () {
			if ($(this).prop("checked") == true) {
				$(".additional-revision .hided-option").removeClass('d-none');
			} else if ($(this).prop("checked") == false) {
				$(".additional-revision .hided-option").addClass('d-none');
			}
		});


		// POST SERVICE

		$('#submit').click(function(e){
			e.preventDefault();

			var service_title = $('#service_title').val();
			var seo_title = $('#seo_title').val();
			var cat_id = $('#category').val();
			var cat_child_id = $('#sub-category').val();
			var search_tags = $('#search_tags').val();
			var type = "1";
			// alert(cat_id);
			if(service_title == '' && cat_id == '' || cat_child_id == ''){
				$('.service_title-error').show();
				$('.cat_error').show();
				$('.sub_cat-error').show();
			}else if(service_title == ''){
				$('.service_title-error').show();
			}else if(cat_id == ''){
				$('.cat_error').show();
				$('.service_title-error').hide();
			}else{
				$.ajax({
					url: "{{url('create-service/'.$getSingleData->id)}}",
					type: 'PATCH',
					data:{service_title:service_title,seo_title:seo_title,cat_id:cat_id,cat_child_id:cat_child_id,search_tags:search_tags,type:type},
					success:function(data){
						console.log(data);
						// $("#sub-category").html(data);
						$("#overview-tab").removeClass("active");
						$("#pricing-tab").addClass("active");
						$("#overview").removeClass("show active");
						$("#pricing").addClass("show active");
					}
				});
			}


		})

		$('#submit-desc').click(function(e){
			e.preventDefault();

			var service_desc = $('#service_desc').val();
			var type = "3"
			// alert(service_desc);
			$.ajax({
				url: "{{url('create-service/'.$getSingleData->id)}}",
				type: 'PATCH',
				data:{service_desc:service_desc,type:type},
				success:function(data){
					console.log(data);

					$("#requirements-tab").removeClass("active");
			    $("#descriptionFaq-tab").addClass("active");
		    	$("#descriptionFaq").removeClass("show active");
			    $("#requirements-tab").addClass("show active");
				}
			});

		})

		// $('#faq-form').on('submit', function(event){
		//   event.preventDefault();
		//   var title = $('#faq_title').val();
		//   var description = $('#faq_description').val();
		//   var type = "3";
		//   $.ajax({
		//    url:"{{url('create-service/'.$getSingleData->id)}}",
		//    method:"PATCH",
		//    data:{title: title, description: description, type: type},
		//    // dataType:'JSON',
		//    // contentType: false,
		//    cache: false,
		//    processData: false,
		//    success:function(data){
		//     console.log(data);
		//     $('.accordion').append(data);
		//     $("#faq-form input").val('');
		//     $("#faq-form textarea").val('');
		//    }
		//   })
	 // });

	 $('#faq-form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
		 url:"{{url('create-faq')}}",
		 method:"POST",
		 data:new FormData(this),
		 dataType:'JSON',
		 contentType: false,
		 cache: false,
		 processData: false,
		 success:function(data){
			// console.log(data);
			$('.accordion').append(data);
			$("#faq-form .faq_title").val('');
			$("#faq-form .faq_desc").val('');
		 }
		})
 });

 $(document).on('click','.faq_button', function () {
 	var id = $(this).data('id');
	var title = $('#title-'+id).val();
	var description = $('#description-'+id).val();
	console.log(id,title,description);
	$.ajax({
	 url:"{{url('update-faq')}}",
	 method:"POST",
	 data:{id:id,title:title,description:description},
	 dataType:'JSON',
	 success:function(data){
		$('.faq_heading'+id).text(title);
		$('#collapse-button'+id).addClass('collapsed');
		$('#collapse'+id).removeClass('show');
	 }
	})
 });

 $('#gallery-form').on('submit', function(event){
	 event.preventDefault();
	 $.ajax({
		url:"{{ url('update_gallery') }}",
		method:"POST",
		data:new FormData(this),
		dataType:'JSON',
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
		 swal({
		 type: 'success',
		 text: 'Your Service Updated Successfully',
		 timer: 2000,
		 onOpen: function(){
		 swal.showLoading()
		 }
		 }).then(function(){
			 window.open('../../profile','_self');
		 });
		}
	 })
});


		$('#requirements-form').on('submit', function(event){
		  event.preventDefault();
		  var response = $('#response').val();
		  var question = $('#question').val();
		  var type = "4";
		  $.ajax({
		   url:"{{url('create-requirements')}}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data){
		   	$('#added-questions').append(data);
		   	$('#requirements-form textarea').val('');
		   }
		  })
	 });

	 $(document).on('click','.requirement_button', function () {
		 var id = $(this).data('id');
	 var response = $('#response'+id).val();
	 var question = $('#question'+id).val();
	 console.log(id,response,question);
	 $.ajax({
		url:"{{url('update-requirement')}}",
		method:"POST",
		data:{id:id,response:response,question:question},
		dataType:'JSON',
		success:function(data){
		 $('#requirement'+id).addClass('d-none');
		 $('.requirement-response'+id).text(response);
		 $('.requirement-heading'+id).text(question);
		}
	 })
	 });

	 $(document).on('click','.cancel_button', function () {
		 var id = $(this).data('id');
		 $('#requirement'+id).addClass('d-none');
	 });

		$('#package-form').on('submit', function(event){
		  event.preventDefault();
		  var createFormData = $('#package-form').serialize();
		  // alert(createFormData);
		  var items = $(".create-service .nav-link");
		  var pane = $(".create-service .tab-pane");
		  if($('.description1').val() == '' && $('.title1').val() == '' && $('#delivery_time1').val() == '' && $('#no_of_pages1').val() == '' && $('.revision1').val() == '')
		  {
		    event.preventDefault();
		    $('.desc1-error').show();
		    $('.title1-error').show();
		    $('.delivery1-error').show();
		    $('.price1-error').show();
		    $('.description1').addClass('border-red');
		    $('.description1').prop('required', true);
		    $('.title1').addClass('border-red');
		    $('.title1').prop('required', true);
		  }else{
		    $('.desc1-error').hide();
		    $('.title1-error').hide();
		    $('.delivery1-error').hide();
		    $('.no_of_pages1-error').hide();
		    $('.revision1-error').hide();
		    $('.price1-error').hide();
		    $('.description1').removeClass('border-red');
		    alert($('.description1').val());
		  $.ajax({
			  url:"{{url('create-service/'.$getSingleData->id)}}",
			  method:"PATCH",
			  data: createFormData,
			  // dataType:'JSON',
			  // contentType: false,
			  // cache: false,
			  processData: false,
			  success:function(data){
			  	console.log(data);
			    $("#pricing-tab").removeClass("active");
			    $("#descriptionFaq-tab").addClass("active");
			    $("#pricing").removeClass("show active");
			    $("#descriptionFaq").addClass("show active");
			  }
			  })
			}
	 });


	});
</script>

<!-- Rich text editor -->
<script>
	$(document).ready(function () {
		$(".content").richText();
	});
</script>


<!-- image-upload -->
<script>

	// Gig photos
	$('.gig-photos input[type=file]').change(function () {
		var id = $(this).attr("id");
		var newimage = new FileReader();
		newimage.readAsDataURL(this.files[0]);
		newimage.onload = function (e) {
			$('.gig-photos .uploadpreview.' + id).css('background-image', 'url(' + e.target.result + ')');
		}
	});

	$('.gig-video input[type=file]').change(function () {
		var id = $(this).attr("id");
		var newimage = new FileReader();
		newimage.readAsDataURL(this.files[0]);
		newimage.onload = function (e) {
			$('.gig-video .uploadpreview.' + id).css('background-image', 'url(' + e.target.result + ')');
		}
	});

	$('.gig-pdf input[type=file]').change(function () {
		var id = $(this).attr("id");
		var newimage = new FileReader();
		newimage.readAsDataURL(this.files[0]);
		newimage.onload = function (e) {
			$('.gig-pdf .uploadpreview.' + id).css('background-image', 'url(' + e.target.result + ')');
		}
	});

	$("#category").change(function(){
	  $("#sub-category").show();
	  var category_id = $(this).val();
	  // alert(category_id);
	  $.ajax({
	  	url: "{{url('fetch_subcategory')}}",
	  	type: 'post',
	  	data:{category_id:category_id},
	  	success:function(data){
	  		// console.log(data);
	  		$("#sub-category").html(data);
	  	}
	  });
	});

	$("#sub-category").change(function(){

	  var category_id = $(this).val();
	  // alert(category_id);
	  $.ajax({
	  	url: "{{url('fetch_package_option')}}",
	  	type: 'post',
	  	data:{category_id:category_id},
	  	success:function(data){
	  		console.log(data.packg1);
	  		$('.packg-options1').html(data.packg1);
	  		$('.packg-options2').html(data.packg2);
	  		$('.packg-options3').html(data.packg3);
	  	}
	  });
	});

	$("#service_title").keydown(function(){
		var textarea = $("#service_title").val();
		$(".descCount").text(textarea.length);
	});

	$("#seo_title").keydown(function(){
		var textarea = $("#seo_title").val();
		$(".seoCount").text(textarea.length);
	});

	function deleteFaq(faq_id) {
		$.ajax({
		 url: "{{url('delete_faq')}}/"+faq_id,
		 success:function(data){
			 $('#heading'+faq_id).remove();
			 $('#collapse'+faq_id).remove();
		 }
	 });
	}

	function showRequirement(req_id) {
		$('#requirement'+req_id).removeClass('d-none');
	}

	function deleteRequirement(req_id) {
		$.ajax({
		 url: "{{url('delete_requirement')}}/"+req_id,
		 success:function(data){
			 $('.requiremet-question-'+req_id).remove();
		 }
	 });
	}
</script>
@endsection
