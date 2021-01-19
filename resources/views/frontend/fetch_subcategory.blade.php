<option>Select SubCategory</option>
@foreach($subCategory as $subCat)
<option value="{{$subCat->id}}">{{$subCat->cat_title}}</option>
@endforeach