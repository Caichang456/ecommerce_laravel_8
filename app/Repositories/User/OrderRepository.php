<?php

namespace App\Repositories\User;

use App\Models\Order;

class OrderRepository{
	function createOrder($cartValidation, $user_id){
		return Order::create([
			'user_id' => $user_id,
			'transaction_date' => date("Y-m-d h:i:s"),
			'status' => 1,
			'description' => $cartValidation['description'],
			'address' => $cartValidation['address']
		]);
	}

	function getOrders($user_id){
		return Order::where('user_id', $user_id)->paginate(10);
	}
}