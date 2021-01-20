
@foreach($packageOptions as $key => $option)
<tr>
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
</tr>
@endforeach