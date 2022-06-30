<?php

namespace App\Repositories\Admin;

use App\Models\OrderDetail;

class OrderDetailRepository{
	function getOrderDetails3($order_id){
		return OrderDetail::where('order_id', $order_id)->paginate(10);
	}
}