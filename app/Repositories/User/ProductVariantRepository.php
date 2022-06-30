<?php

namespace App\Repositories\User;

use App\Models\ProductVariant;

class ProductVariantRepository{
	function getProductVariants($id){
		return ProductVariant::where('product_id', $id)->get();
	}

	function getProductVariant($product_variant_id){
		return ProductVariant::where('id', $product_variant_id)->first();
	}
}