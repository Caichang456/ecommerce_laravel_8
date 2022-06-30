<?php

namespace App\Repositories\Admin;

use App\Models\Category;

class CategoryRepository{
	function getCategoriesWithPagination(){
		return Category::with('seller')->paginate(10);
	}

	function createCategory($categoryValidation){
		return Category::create($categoryValidation);
	}

	function getCategoriesWithoutPagination(){
		return Category::get();
	}

	function getCategory($id){
		return Category::where('id', $id)->first();
	}

	function updateCategory($categoryValidation, $id){
		return Category::where('id', $id)->update($categoryValidation);
	}

	function deleteCategory($id){
		return Category::where('id', $id)->delete();
	}
}