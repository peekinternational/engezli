<?php
namespace App\Classes;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;
use Str;

class Engezli {
	public function get_categories(){
		$categories = Categories::where('parent_id', '==', 0)->get();
		return $categories;
	}
}
?>