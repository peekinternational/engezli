<?php
namespace App\Classes;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;
use App\Models\PackagesOption;
use Str;

class Engezli {
	public function get_categories(){
		$categories = Categories::where('parent_id', '==', 0)->get();
		return $categories;
	}
	public function get_optionName($id){
		$option_name = PackagesOption::whereid($id)->get();
		return $option_name;
	}
}
?>