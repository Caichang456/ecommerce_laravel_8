<?php

namespace App\Repositories\User;

use App\Models\Cart;

class CartRepository{
	function checkProductVariant($cartValidation){
		return Cart::where('product_variant_id', $cartValidation['product_variant_id'])->where('user_id', $cartValidation['user_id'])->exists();
	}

	function createCart($cartValidation){
		return Cart::create($cartValidation);
	}

	function checkUser($cartValidation){
		return Cart::where('user_id', $cartValidation['user_id'])->paginate(10);
	}

	function deleteStockCart($id){
		return Cart::where('id', $id)->delete();
	}

	function getCarts($user_id){
		return Cart::where('user_id', $user_id)->paginate(10);
	}

	function editStockCart($id){
		return Cart::with('product_variant')->where('id', $id)->first();
	}

	function editStock($cartValidation, $cart_id){
		return Cart::where('id', $cart_id)->update([
			'stock' => $cartValidation['stock']
		]);
	}

	function checkOut($user_id){
		return Cart::where('user_id', $user_id)->get();
	}

	function cleanCart($user_id){
		return Cart::where('user_id', $user_id)->delete();
	}
}