<?php

namespace App\Repositories\Admin;

use App\Models\Product;

class ProductRepository{
	function getProductsWithPagination(){
		return Product::with(['seller', 'category'])->paginate(10);
	}

	function createProduct($productValidation){
		return Product::create($productValidation);
	}

	function getProductsWithoutPagination(){
		return Product::get();
	}

	function getProduct($id){
		return Product::where('id', $id)->first();
	}

	function updateProduct($productValidation, $id){
		return Product::where('id', $id)->update($productValidation);
	}

	function deleteProduct($id){
		return Product::where('id', $id)->delete();
	}
}