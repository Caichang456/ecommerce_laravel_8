<?php

namespace App\Repositories\Admin;

use App\Models\Order;

class OrderRepository{
	function getOrders($user_id){
		return Order::where('user_id', $user_id)->paginate(10);
	}
}