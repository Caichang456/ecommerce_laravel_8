<?php

namespace App\Repositories\User;

use App\Models\OrderDetail;

class OrderDetailRepository{
	function createOrderDetail($orders, $carts, $user_id){
		foreach($carts as $cart){
			OrderDetail::create([
				'order_id' => $orders->id,
				'product_variant_id' => $cart->product_variant_id,
				'stock' => $cart->stock
			]);
		}
	}

	function getOrderDetails($order_id){
		return OrderDetail::where('order_id', $order_id)->get();
	}

	function getOrderDetails2($order_id){
		return OrderDetail::where('order_id', $order_id)->paginate(10);
	}
}