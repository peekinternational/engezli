<div class="added-faq-box-container">
	<div id="accordion">
		@foreach($getFaq as $faq)
		<div class="card">
			<div class="card-header" id="heading{{$faq->id}}">
				<h5 class="mb-0">
					<button class="btn btn-link collapsed" data-toggle="collapse"
						data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
						{{$faq->title}}
					</button>
				</h5>
			</div>

			<div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
				data-parent="#accordion">
				<div class="card-body">
					<div class="input-box-container">
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Add a Question: i.e. Do you translate to English as well?" />
						</div>
						<div class="form-group">
							<textarea maxlength="300" class="form-control" rows="3"
								placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew.">{{$faq->description}}</textarea>
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
		@endforeach
	</div>
</div>