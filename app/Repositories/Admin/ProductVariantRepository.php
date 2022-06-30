<?php

namespace App\Repositories\Admin;

use App\Models\ProductVariant;

class ProductVariantRepository{
	function getProductVariantsWithPagination(){
		return ProductVariant::with('product')->paginate(10);
	}

	function createProductVariant($productVariantValidation){
		return ProductVariant::create($productVariantValidation);
	}

	function getProductVariantsWithoutPagination(){
		return ProductVariant::get();
	}

	function getProductVariant($id){
		return ProductVariant::where('id', $id)->first();
	}

	function updateProductVariant($productVariantValidation, $id){
		return ProductVariant::where('id', $id)->update($productVariantValidation);
	}

	function deleteProductVariant($id){
		return ProductVariant::where('id', $id)->delete();
	}
}