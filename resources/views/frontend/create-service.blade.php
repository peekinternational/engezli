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
						<a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
							aria-controls="overview" aria-selected="true">overview</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pricing-tab" data-toggle="tab" href="#pricing" role="tab" aria-controls="pricing"
							aria-selected="false">pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="descriptionFaq-tab" data-toggle="tab" href="#descriptionFaq" role="tab"
							aria-controls="descriptionFaq" aria-selected="false">description & FAQ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="requirements-tab" data-toggle="tab" href="#requirements" role="tab"
							aria-controls="requirements" aria-selected="false">requirements</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery"
							aria-selected="false">gallery</a>
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
					<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
						<div class="service-tab-content">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
									<div class="tab-pane-box">
										<div class="pane-box">
											<h6>gig Title</h6>
											<div class="inner-pane-box">
												<textarea name="" id="" class="form-control" rows="2"
													placeholder="I will do something I'm really good at"></textarea>

												<div class="sub-box">
													<p class="text">Just perfect</p>
													<p class="max-char"><span>0</span>/80 max</p>
												</div>
											</div>
										</div>

										<div class="pane-box">
											<h6>seo Title</h6>
											<div class="inner-pane-box">
												<input type="text" class="form-control" />

												<div class="sub-box">
													<!-- <p class="text">Just perfect</p> -->
													<p class="max-char"><span>0</span>/50 max</p>
												</div>
											</div>
										</div>

										<div class="pane-box">
											<h6>category</h6>
											<div class="inner-pane-box">
												<div class="select-category">
													<select name="" id="" class="custom-select">
														<option value="">Category 1</option>
														<option value="">Category 2</option>
														<option value="">Category 3</option>
													</select>
													<select name="" id="" class="custom-select">
														<option value="">Category 1</option>
														<option value="">Category 2</option>
														<option value="">Category 3</option>
													</select>
												</div>
											</div>
										</div>

										<div class="pane-box">
											<h6>search tags</h6>
											<div class="inner-pane-box">
												<input type="text" value="Web design, branding, ui design, ux design, mobile design"
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
								</div>
								<div class="tab-pane fade pricing-tab-container" id="pricing" role="tabpanel"
									aria-labelledby="pricing-tab">
									<div class="tab-pane-box">
										<div class="heading">
											<div class="inner-heading">
												<h3>Scope & Pricing</h3>
												<div class="custom-control custom-switch">
													<input type="checkbox" class="custom-control-input" id="customSwitch1" data="off" />
													<label class="custom-control-label control-package" for="customSwitch1">
														3 Packages
													</label>
												</div>
											</div>
											<h5>Packages</h5>
										</div>

										<div class="input-wrapper">
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th></th>
															<th>BASIC</th>
															<th>STANDARD</th>
															<th>PREMIUM</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td>
																<textarea name="" id="" placeholder="Name your package"></textarea>
															</td>
															<td>
																<textarea name="" id="" placeholder="Name your package"></textarea>
															</td>
															<td>
																<textarea name="" id="" placeholder="Name your package"></textarea>
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
																<textarea name="" id=""
																	placeholder="Describe the details of your offering"></textarea>
															</td>
															<td>
																<textarea name="" id=""
																	placeholder="Describe the details of your offering"></textarea>
															</td>
															<td>
																<textarea name="" id=""
																	placeholder="Describe the details of your offering"></textarea>
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1 day delivery</option>
																	<option value="">2 day delivery</option>
																	<option value="">3 day delivery</option>
																	<option value="">4 day delivery</option>
																	<option value="">5 day delivery</option>
																	<option value="">6 day delivery</option>
																	<option value="">7 day delivery</option>
																	<option value="">8 day delivery</option>
																	<option value="">9 day delivery</option>
																	<option value="">10 day delivery</option>
																</select>
															</td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1 day delivery</option>
																	<option value="">2 day delivery</option>
																	<option value="">3 day delivery</option>
																	<option value="">4 day delivery</option>
																	<option value="">5 day delivery</option>
																	<option value="">6 day delivery</option>
																	<option value="">7 day delivery</option>
																	<option value="">8 day delivery</option>
																	<option value="">9 day delivery</option>
																	<option value="">10 day delivery</option>
																</select>
															</td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1 day delivery</option>
																	<option value="">2 day delivery</option>
																	<option value="">3 day delivery</option>
																	<option value="">4 day delivery</option>
																	<option value="">5 day delivery</option>
																	<option value="">6 day delivery</option>
																	<option value="">7 day delivery</option>
																	<option value="">8 day delivery</option>
																	<option value="">9 day delivery</option>
																	<option value="">10 day delivery</option>
																</select>
															</td>
														</tr>
														<tr>
															<td>Number of Pages</td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1</option>
																	<option value="">2</option>
																	<option value="">3</option>
																	<option value="">4</option>
																	<option value="">5</option>
																	<option value="">6</option>
																	<option value="">7</option>
																	<option value="">8</option>
																	<option value="">9</option>
																	<option value="">10</option>
																</select>
															</td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1</option>
																	<option value="">2</option>
																	<option value="">3</option>
																	<option value="">4</option>
																	<option value="">5</option>
																	<option value="">6</option>
																	<option value="">7</option>
																	<option value="">8</option>
																	<option value="">9</option>
																	<option value="">10</option>
																</select>
															</td>
															<td>
																<select name="" id="" class="custom-select">
																	<option value="">Select</option>
																	<option value="">1</option>
																	<option value="">2</option>
																	<option value="">3</option>
																	<option value="">4</option>
																	<option value="">5</option>
																	<option value="">6</option>
																	<option value="">7</option>
																	<option value="">8</option>
																	<option value="">9</option>
																	<option value="">10</option>
																</select>
															</td>
														</tr>
														<tr>
															<td>Design Customization</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" checked /></label>
																</div>
															</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" /></label>
																</div>
															</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" /></label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Responsive Design</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" /></label>
																</div>
															</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" checked /></label>
																</div>
															</td>
															<td>
																<div class="checkbox">
																	<label><input type="checkbox" value="" checked /></label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Price</td>
															<td>
																<select name="" id="" class="custom-select">
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
															<td>
																<select name="" id="" class="custom-select">
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
															<td>
																<select name="" id="" class="custom-select">
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
													</tbody>
												</table>
												<div class="try-now">
													<h3>
														Unlock your potential<br />
														revenue with all 3 Packages
													</h3>

													<div class="btn-container">
														<a href="#!" class="custom-btn try-now-btn">try now</a>
														<a href="#!" class="learn-more js-learn-more">Learn more</a>
													</div>
												</div>
											</div>
										</div>

										<div class="add-extra-service">
											<h5>Add extra service</h5>
											<div class="extra-service-container">

												<div class="note">
													<p><span><i class="fa fa-lightbulb"></i> Note:</span> Increase your revenue by offering
														in-demand
														services at an additional
														cost.
													</p>
												</div>

												<div class="extra-service-list-item">

													<div class="list-item fast-delivery">
														<div class="item-title">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="customCheck01">
																<label class="custom-control-label" for="customCheck01"> Extra fast delivery
																</label>
															</div>
														</div>
														<div class="inner-list-item-box d-none">
															<table class="table">
																<tr>
																	<td>Basic</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select name="" id="" class="custom-select">
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
																	</td>
																</tr>
																<tr>
																	<td>Standard</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select name="" id="" class="custom-select">
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
																	</td>
																</tr>
																<tr>
																	<td>Premium</td>
																	<td>
																		<span>I'll deliver in only</span>
																		<select name="" id="" class="custom-select">
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
																	</td>
																</tr>
															</table>
														</div>
													</div>

													<div class="list-item additional-page">
														<div class="item-title">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="customCheck1">
																<label class="custom-control-label" for="customCheck1"> Additional Page
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
																<input type="checkbox" class="custom-control-input" id="customCheck2">
																<label class="custom-control-label" for="customCheck2">
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
								</div>
								<div class="tab-pane fade descriptionFaq-tab" id="descriptionFaq" role="tabpanel"
									aria-labelledby="descriptionFaq-tab">
									<div class="tab-pane-box">
										<div class="heading">
											<h3>description</h3>
											<p>briefly describe you gig</p>
										</div>

										<div class="page-wrapper box-content">
											<textarea class="content" name="example"></textarea>
											<div class="max-char">
												<p>0/1200 characters</p>
											</div>
										</div>

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

											<div class="input-box-container d-none" id="input-box-content">
												<div class="form-group">
													<input type="text" class="form-control"
														placeholder="Add a Question: i.e. Do you translate to English as well?" />
												</div>
												<div class="form-group">
													<textarea maxlength="300" class="form-control" rows="3"
														placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew."></textarea>
												</div>

												<div class="btn-container-box">
													<div class="btns">
														<button class="custom-btn cancle-btn">
															cancle
														</button>
														<button class="custom-btn">save</button>
													</div>
												</div>
											</div>

											<div class="added-faq-box-container">
												<div id="accordion">
													<div class="card">
														<div class="card-header" id="headingOne">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" data-toggle="collapse"
																	data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
																	Collapsible Group Item #1
																</button>
															</h5>
														</div>

														<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
															data-parent="#accordion">
															<div class="card-body">
																<div class="input-box-container">
																	<div class="form-group">
																		<input type="text" class="form-control"
																			placeholder="Add a Question: i.e. Do you translate to English as well?" />
																	</div>
																	<div class="form-group">
																		<textarea maxlength="300" class="form-control" rows="3"
																			placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew."></textarea>
																	</div>

																	<div class="btn-container-box">
																		<div class="btns">
																			<button class="custom-btn delete-btn">
																				<i class="fa fa-times"></i> delete
																			</button>
																		</div>
																		<div class="btns">
																			<button class="custom-btn">
																				cancle
																			</button>
																			<button class="custom-btn">
																				save
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="card">
														<div class="card-header" id="headingTwo">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" data-toggle="collapse"
																	data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																	Collapsible Group Item #2
																</button>
															</h5>
														</div>
														<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
															data-parent="#accordion">
															<div class="card-body">
																<div class="input-box-container">
																	<div class="form-group">
																		<input type="text" class="form-control"
																			placeholder="Add a Question: i.e. Do you translate to English as well?" />
																	</div>
																	<div class="form-group">
																		<textarea maxlength="300" class="form-control" rows="3"
																			placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew."></textarea>
																	</div>

																	<div class="btn-container-box">
																		<div class="btns">
																			<button class="custom-btn delete-btn">
																				<i class="fa fa-times"></i> delete
																			</button>
																		</div>
																		<div class="btns">
																			<button class="custom-btn">
																				cancle
																			</button>
																			<button class="custom-btn">
																				save
																			</button>
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
								<div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">
									<div class="tab-pane-box">
										<div class="require-text-title">
											<h5>
												<i class="fa fa-file"></i> Here’s how buyers will
												see your questions. You can edit or remove questions
												anytime.
											</h5>
										</div>
										<div class="question-input-container d-none">
											<h6>add question</h6>
											<textarea name="" id="" class="form-control question-textarea" rows="3"
												placeholder="Request necessary details such as dimensions, brand guidelines, and more."></textarea>

											<div class="btn-container-box">
												<div class="btns">
													<button class="custom-btn btn-cancle">
														cancle
													</button>
													<button class="custom-btn btn-add">add</button>
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
									</div>
								</div>
								<div class="tab-pane fade gallery-tab-container" id="gallery" role="tabpanel"
									aria-labelledby="gallery-tab">
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
														<input id="01" class="file" type="file" accept="image/*">

														<!-- <div class="control">
															<input id="01" class="file" type="file" accept="image/*">
															<label for="file">choose a file</label>
														</div> -->
													</div>

													<div class="gig-photo-wrap">
														<div class="uploadpreview 02"></div>
														<input id="02" type="file" accept="image/*">
													</div>

													<div class="gig-photo-wrap">
														<div class="uploadpreview 03"></div>
														<input id="03" type="file" accept="image/*">
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
														<input id="01" class="file" type="file" accept="image/*">

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
														<input id="01" class="file" type="file" accept="image/*">

														<!-- <div class="control">
															<input id="01" class="file" type="file" accept="image/*">
															<label for="file">choose a file</label>
														</div> -->
													</div>

													<div class="gig-photo-wrap">
														<div class="uploadpreview 02"></div>
														<input id="02" type="file" accept="image/*">
													</div>
												</div>
											</div>


										</div>

									</div>
								</div>
							</div>

							<div class="btns-group">
								<!-- <button class="prevtab btn btn-primary">Prev</button> -->
								<button class="cancle custom-btn">Cancle</button>
								<button class="nexttab custom-btn">save</button>
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
</script>
@endsection