@extends('frontend.layouts.app')
@section('title', 'Create Service  ')
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
							>service information</a
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
							>pricing</a
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
							>description & FAQ</a
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
							>requirements</a
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
							>gallery</a
						>
					</li>
				</ul>

				<div class="btn-container">
					<div class="btn-groups">
						<a href="" class="btn">Save</a>
						<a href="" class="btn">Save & Preview</a>
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
												<h6>gig Title</h6>
												<div class="inner-pane-box">
													<textarea name="" id="service_title" class="form-control" rows="2"
														placeholder="I will do something I'm really good at" name="service_title"></textarea>
													<span class="service_title-error text-danger"  style="display: none;">title is required</span>
													<div class="sub-box">
														<p class="text">Just perfect</p>
														<p class="max-char"><span class="descCount">0</span>/80 max</p>
													</div>
													<span class="display_error">{{ $errors->first('service_title') }}</span>
													
												</div>
											</div>

											<div class="pane-box">
												<h6>seo Title</h6>
												<div class="inner-pane-box">
													<input type="text" class="form-control" id="seo_title" name="seo_title" />

													<div class="sub-box">
														<!-- <p class="text">Just perfect</p> -->
														<p class="max-char"><span class="seoCount">0</span>/50 max</p>
													</div>
												</div>
											</div>

											<div class="pane-box">
												<h6>category</h6>
												<div class="inner-pane-box">
													<div class="select-category">
														<select name="cat_id" id="category" class="custom-select">
															<option value="">Select Category</option>
															@foreach($mainCategories as $mainCat)
															<option value="{{$mainCat->id}}">{{$mainCat->cat_title}}</option>
															@endforeach
														</select>
														
														<select name="cat_child_id" id="sub-category" class="custom-select">
														</select>
														<span class="cat_error text-danger"  style="display: none;">category is required</span>
														<span class="sub_cat-error text-danger"  style="display: none;">sub category is required</span>
													</div>
												</div>
											</div>

											<div class="pane-box">
												<h6>search tags</h6>
												<div class="inner-pane-box">
													<input type="text" name="search_tags" id="search_tags" value=""
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
											<button class="cancle custom-btn">Cancle</button>
											<button class=" custom-btn" type="submit" id="submit"  form="service-form">save</button>
										</div>
									</form>
								</div>
								<div class="tab-pane fade pricing-tab-container" id="pricing" role="tabpanel"
									aria-labelledby="pricing-tab">
									<form id="package-form">
										<input type="hidden" name="type" value="2">
										<div class="tab-pane-box">
											<div class="heading">
												<h3>Packages & Pricing</h3>
												<p>The buyer needs the following information</p>
											</div>

											<!-- New Pricing Design -->
											<div class="packages-pricing-wrapper">
												<div class="pricing-box">
													<div class="category border-bottom">
														<h5>Basic</h5>
													</div>
													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="basic">
														<textarea
															name="proposal_packages[1][package_name]"
															id=""
															rows="3"
															class="form-control title1"
															placeholder="Name your package..."
														></textarea>
														<span class="title1-error text-danger" style="display: none;">Package title is required</span>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[1][package_desc]"
															id=""
															rows="3"
															class="form-control description1"
															placeholder="Describe the details of your service..."
														></textarea>
														<span class="desc1-error text-danger"  style="display: none;"> Description is required</span>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[1][delivery_time]" id="delivery_time1" class="select2 ">
															<option value="">delivery time</option>
															<option value="1 day">1 day delivery</option>
															<option value="2 day">2 day delivery</option>
															<option value="3 day">3 day delivery</option>
															<option value="4 day">4 day delivery</option>
															<option value="5 day">5 day delivery</option>
															<option value="6 day">6 day delivery</option>
															<option value="7 day">7 day delivery</option>
															<option value="8 day">8 day delivery</option>
															<option value="9 day">9 day delivery</option>
															<option value="10 day">10 day delivery</option>
														</select>
													</div>
														<span class="delivery1-error text-danger"  style="display: none;">Delivery time is required</span>
													<div class="form-group border-bottom">
														<select name="proposal_packages[1][no_of_pages]" id="no_of_pages1" class="select2">
															<option value="">Number of Pages</option>
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
															<option value="">revisions</option>
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
													

													<div class="form-group price-dropdown">
														<select name="proposal_packages[1][package_price]" id="package_price1" class="select2">
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
														<h5>Standard</h5>
													</div>
													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="standard">
														<textarea
															name="proposal_packages[2][package_name]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Name your package..."
														></textarea>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[2][package_desc]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Describe the details of your service..."
														></textarea>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[2][delivery_time]" id="" class="select2">
															<option value="">delivery time</option>
															<option value="1 day">1 day delivery</option>
															<option value="2 day">2 day delivery</option>
															<option value="3 day">3 day delivery</option>
															<option value="4 day">4 day delivery</option>
															<option value="5 day">5 day delivery</option>
															<option value="6 day">6 day delivery</option>
															<option value="7 day">7 day delivery</option>
															<option value="8 day">8 day delivery</option>
															<option value="9 day">9 day delivery</option>
															<option value="10 day">10 day delivery</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[2][no_of_pages]" id="" class="select2">
															<option value="">Number of Pages</option>
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
															<option value="">revisions</option>
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
														<h5>premium</h5>
													</div>
													<div class="form-group border-bottom">
														<input type="hidden" name="package_type" value="premium">
														<textarea
															name="proposal_packages[3][package_name]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Name your package..."
														></textarea>
													</div>
													<div class="form-group border-bottom">
														<textarea
															name="proposal_packages[3][package_desc]"
															id=""
															rows="3"
															class="form-control"
															placeholder="Describe the details of your service..."
														></textarea>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[3][delivery_time]" id="" class="select2">
															<option value="">delivery time</option>
															<option value="1 day">1 day delivery</option>
															<option value="2 day">2 day delivery</option>
															<option value="3 day">3 day delivery</option>
															<option value="4 day">4 day delivery</option>
															<option value="5 day">5 day delivery</option>
															<option value="6 day">6 day delivery</option>
															<option value="7 day">7 day delivery</option>
															<option value="8 day">8 day delivery</option>
															<option value="9 day">9 day delivery</option>
															<option value="10 day">10 day delivery</option>
														</select>
													</div>
													<div class="form-group border-bottom">
														<select name="proposal_packages[3][no_of_pages]" id="" class="select2">
															<option value="">Number of Pages</option>
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
															<option value="">revisions</option>
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
											<h5>Add extra service</h5>
											<div class="extra-service-container">
												<div class="note">
													<p>
														<span
															><i class="fa fa-lightbulb"></i> Note:</span
														>
														Increase your revenue by offering in-demand
														services at an additional cost.
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
																	Extra fast delivery
																</label>
															</div>
														</div>
														<div class="inner-list-item-box d-none">
															<table class="table">
																<tr>
																	<td>Basic</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">Select</option>
																			<option value="">1 days</option>
																			<option value="">2 days</option>
																			<option value="">3 days</option>
																			<option value="">4 days</option>
																			<option value="">5 days</option>
																			<option value="">6 days</option>
																			<option value="">7 days</option>
																			<option value="">8 days</option>
																			<option value="">9 days</option>
																			<option value="">10 days</option>
																		</select>
																	</td>
																	<td>
																		<span>for an extra</span>
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
																	<td>Standard</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">Select</option>
																			<option value="">1 days</option>
																			<option value="">2 days</option>
																			<option value="">3 days</option>
																			<option value="">4 days</option>
																			<option value="">5 days</option>
																			<option value="">6 days</option>
																			<option value="">7 days</option>
																			<option value="">8 days</option>
																			<option value="">9 days</option>
																			<option value="">10 days</option>
																		</select>
																	</td>
																	<td>
																		<span>for an extra</span>
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
																	<td>Premium</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select
																			name=""
																			id=""
																			class="custom-select"
																		>
																			<option value="">Select</option>
																			<option value="">1 days</option>
																			<option value="">2 days</option>
																			<option value="">3 days</option>
																			<option value="">4 days</option>
																			<option value="">5 days</option>
																			<option value="">6 days</option>
																			<option value="">7 days</option>
																			<option value="">8 days</option>
																			<option value="">9 days</option>
																			<option value="">10 days</option>
																		</select>
																	</td>
																	<td>
																		<span>for an extra</span>
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
																	Additional Page
																</label>
															</div>
														</div>
														<div class="hided-option d-none">
															<div class="extra-pay">
																<span>for an extra</span>
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
																<span>an additional</span>
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
																	Additional revision
																</label>
															</div>
														</div>
														<div class="hided-option d-none">
															<div class="extra-pay">
																<span>for an extra</span>
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
																<span>an additional</span>
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
										<button class="cancle custom-btn">Cancel</button>
										<button class="custom-btn" type="submit" id="package-submit" form="package-form">save</button>
									</div>
									</form>
								</div>
								<div class="tab-pane fade descriptionFaq-tab" id="descriptionFaq" role="tabpanel"
									aria-labelledby="descriptionFaq-tab">
									
									<div class="tab-pane-box">
										<form id="description-form">
											<div class="heading">
												<h3>description</h3>
												<p>briefly describe you gig</p>
											</div>

											<div class="page-wrapper box-content">
												<textarea class="content" id="service_desc" name="service_desc"></textarea>
												<div class="max-char">
													<p>0/1200 characters</p>
												</div>
											</div>
										</form>
											<div class="faq-section">
												<div class="faq-header">
													<h3>frequently ask questions</h3>
													<button class="custom-btn add-faq-btn">
														<i class="fa fa-plus"></i> add faq
													</button>
												</div>
												<p class="QA">
													Add Questions & Answers for Your Buyers.
												</p>
												<form id="faq-form">
													<div class="input-box-container d-none" id="input-box-content">
														<div class="form-group">
															<input type="hidden" name="type" value="3">
															<input type="text" name="title" class="form-control"
																placeholder="Add a Question: i.e. Do you translate to English as well?" />
														</div>
														<div class="form-group">
															<textarea maxlength="300" name="description" class="form-control" rows="3"
																placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew."></textarea>
														</div>

														<div class="btn-container-box">
															<div class="btns">
																<button class="custom-btn cancle-btn">
																	cancel
																</button>
																<button class="custom-btn" type="submit" id="faq-submit">save</button>
															</div>
														</div>
													</div>
												</form>
												<div class="added-faq-box-container">
													<div id="accordion" class="accordion">
														
													</div>
												</div>
											</div>
										</div>
										<div class="btns-group">
											<!-- <button class="prevtab btn btn-primary">Prev</button> -->
											<button class="cancle custom-btn">Cancle</button>
											<button class="nexttab custom-btn" type="submit" id="submit-desc"  form="description-form">save</button>
										</div>
								</div>
								<div class="tab-pane fade  requirements-tab" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">
									<form id="requirements-form">
										<input type="hidden" name="type" value="4">
										<div class="tab-pane-box">
											<div class="require-text-title">
												<h5>
													<i class="fa fa-file"></i> Here’s how buyers will
													see your questions. You can edit or remove questions
													anytime.
												</h5>
											</div>
											<div class="question-input-container d-none">
												<div class="add-ques-header">
													<h6>add question</h6>
													<div class="answer-type">
														<span>answer type</span>
														<select name="response" id="" class="select2">
															<option value="free text">free text</option>
															<option value="attachement">Attachement</option>
														</select>
													</div>
												</div>

												<textarea
													name="question"
													id=""
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
														/>
														<label
															class="form-check-label"
															for="exampleCheck1"
															>Answer is mandatory</label
														>
													</div>
													<p class="max-char"><span>0</span>/450 max</p>
												</div>

												<div class="btn-container-box">
													<div class="btns">
														<button class="custom-btn btn-cancle">
															cancle
														</button>
														<button class="custom-btn btn-add" type="submit" id="requirements-submit">add</button>
													</div>
												</div>
											</div>
											<div class="added-questions d-none">
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
											<button class="custom-btn add-new-btn-ques" >
												<i class="fa fa-plus"></i> add new question
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
									</form>

									<div class="btns-group">
										<!-- <button class="prevtab btn btn-primary">Prev</button> -->
										<button class="cancle custom-btn">Cancel</button>
										<button class="nexttab custom-btn">save</button>
									</div>
								</div>
								<div class="tab-pane fade gallery-tab-container" id="gallery" role="tabpanel"
									aria-labelledby="gallery-tab">
									<form id="gallery-form" enctype="multipart/form-data">
										<input type="hidden" name="type" value="5">
										<div class="tab-pane-box">

											<div class="heading">
												<h3>Build Your Gig Gallery</h3>
												<p>Add memorable content to your gallery to set yourself apart from competitors.</p>
											</div>

											<div class="note">
												<p class="icon"><i class="fa fa-info-circle"></i></p>
												<p class="text"><span>Note: </span> To comply with Fiverr’s terms of service, make sure to
													upload only
													content you either
													own or you have the permission or license to use.</p>
											</div>
											<div class="main-upload-wrapper">

												<div class="box gig-photos">

													<div class="outer-box">
														<div class="inner-heading">
															<h5>Gig Photos</h5>
															<p>Upload photos that describe or are related to your Gig.</p>
														</div>
														<p class="show-result">(0/3)</p>
													</div>

													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01"></div>
															<input id="01" class="file" name="service_img1" type="file" accept="image/*">

															<!-- <div class="control">
																<input id="01" class="file" type="file" accept="image/*">
																<label for="file">choose a file</label>
															</div> -->
														</div>
														<div class="gig-photo-wrap">
															<div class="uploadpreview 02"></div>
															<input id="02" type="file" name="service_img2" accept="image/*">
														</div>

														<div class="gig-photo-wrap">
															<div class="uploadpreview 03"></div>
															<input id="03" type="file" name="service_img3" accept="image/*">
														</div>
													</div>
												</div>
												<div class="box gig-video">

													<div class="outer-box">
														<div class="inner-heading">
															<h5>Gig Video</h5>
															<p>Add a relevant, high quality video that best showcases your Gig.</p>
															<p class="size">Please choose a video shorter than 75 seconds and smaller than 50MB</p>
														</div>
														<p class="show-result">(0/1)</p>
													</div>
													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01"></div>
															<input id="01" class="file" type="file" name="service_video" accept="video/mp4,video/x-m4v,video/*">

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
															<h5>Gig PDFs</h5>
															<p>We only recommend adding a PDF file if it further clarifies the service you will be
																providing.</p>
														</div>
														<p class="show-result">(0/2)</p>
													</div>

													<div class="upload-wrap">
														<div class="gig-photo-wrap">
															<div class="uploadpreview 01"></div>
															<input id="01" class="file" type="file" name="service_pdf1" accept="application/pdf,application/vnd.ms-excel">

															<!-- <div class="control">
																<input id="01" class="file" type="file" accept="image/*">
																<label for="file">choose a file</label>
															</div> -->
														</div>

														<div class="gig-photo-wrap">
															<div class="uploadpreview 02"></div>
															<input id="02" type="file" name="service_pdf2" accept="application/pdf,application/vnd.ms-excel">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="btns-group">
											<!-- <button class="prevtab btn btn-primary">Prev</button> -->
											<button class="cancle custom-btn">Cancel</button>
											<button class="nexttab custom-btn" type="submit" id="gallery-submit" form="gallery-form">save</button>
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
			$(".question-input-container").removeClass("d-none");
			// $(".added-questions").removeClass("d-none");
			$(this).addClass("d-none");
		});

		// hide question-input-container
		$(".question-input-container .btn-cancle").on("click", function (e) {
			$(".question-input-container").addClass("d-none");
			$(".add-new-btn-ques").removeClass("d-none");
		});

		// show added-questions
		$(".question-input-container .btn-add").on("click", function (e) {
			$(".added-questions").removeClass("d-none");
			$(".question-input-container").addClass("d-none");
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
					url: "{{url('post_service')}}",
					type: 'post',
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
				url: "{{url('post_service')}}",
				type: 'post',
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

		$('#faq-form').on('submit', function(event){
		  event.preventDefault();
		  $.ajax({
		   url:"{{ url('post_service') }}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data){
		    console.log(data);
		    $('.accordion').append(data);
		    $("#faq-form input").val('');
		    $("#faq-form textarea").val('');
		   }
		  })
	 });

		$('#gallery-form').on('submit', function(event){
		  event.preventDefault();
		  $.ajax({
		   url:"{{ url('post_service') }}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data){
		    swal({
		    type: 'success',
		    text: '$text',
		    timer: 2000,
		    onOpen: function(){
		    swal.showLoading()
		    }
		    }).then(function(){
		    	window.open('profile','_self');
		    });
		   }
		  })
	 });

		$('#requirements-form').on('submit', function(event){
		  event.preventDefault();
		  $.ajax({
		   url:"{{ url('post_service') }}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data){
		   	$('.added-questions').append(data);
		   	$('#requirements-form textarea').val('');
		   }
		  })
	 });

		$('#package-form').on('submit', function(event){
		  event.preventDefault();
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
		  $.ajax({
			  url:"{{ url('post_service') }}",
			  method:"POST",
			  data:new FormData(this),
			  dataType:'JSON',
			  contentType: false,
			  cache: false,
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
</script>
@endsection