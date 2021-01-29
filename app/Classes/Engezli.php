<?php
namespace App\Classes;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;
use App\Models\PackagesOption;
use App\Models\Language;
use App\Models\Skills;
use Str;

class Engezli {
	public function get_categories(){
		$categories = Categories::where('parent_id', '==', 0)->get();
		return $categories;
	}
	public function get_subcat($id){
		$sub_cat = Categories::whereid($id)->first();
		return $sub_cat;
	}
	public function get_optionName($id){
		$option_name = PackagesOption::whereid($id)->get();
		return $option_name;
	}
	public function get_subCatName($url){
		$subCatName = Categories::wherecat_url($url)->first();
		return $subCatName;
	}
	public function get_skill($id){
		$skillName = Skills::whereid($id)->first();
		return $skillName;
	}
	public function get_language($id){
		$langName = Language::whereid($id)->first();
		return $langName;
	}
}
?>