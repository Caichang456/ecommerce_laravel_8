<?php

namespace App\Repositories\User;

use App\Models\Product;

class ProductRepository{
	function getProducts(){
		return Product::get();
	}

	function getProduct($id){
		return Product::where('id', $id)->first();
	}
}