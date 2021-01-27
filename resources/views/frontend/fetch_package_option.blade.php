@if($packageOptions != '')
@foreach($packageOptions as $key => $option)
<div class="form-group-check border-bottom ">
	<div class="form-check">
		<input
			type="checkbox"
			class="form-check-input"
			id="exampleCheck1"
			value=""
			name="package_attribute[{{$key+1}}][value]"
		/>
		<input type="hidden" name="package_attribute[{{$key+1}}][package_option_id]" value="{{$option->id}}">
		<label
			class="form-check-label"
			for="exampleCheck1"
			>{{$option->name}}</label
		>
	</div>
</div>
<!-- <tr>
	<td>{{$option->name}}</td>
	<td>
		<div class="checkbox">
			<label><input name="package_attribute[{{$key+1}}][id]" type="checkbox" value="{{$option->id}}" /></label>
		</div>
	</td>
	<td>
		<div class="checkbox">
			<label><input name="package_attribute[{{$key+2}}][id]" type="checkbox" value="{{$option->id}}" /></label>
		</div>
	</td>
	<td>
		<div class="checkbox">
			<label><input name="package_attribute[{{$key+3}}][id]" type="checkbox" value="{{$option->id}}" /></label>
		</div>
	</td>
</tr> -->
@endforeach
@endif