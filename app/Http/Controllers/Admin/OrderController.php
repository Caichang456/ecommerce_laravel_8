<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\OrderDetailRepository;

class OrderController extends Controller
{
    protected $user, $order, $order_detail;

    function __construct()
    {
        $this->user = new UserRepository();
        $this->order = new OrderRepository();
        $this->order_detail = new OrderDetailRepository();
    }

    public function getUser4(){
        $users = $this->user->getUsersWithoutPagination();
        return view('admin.order.index', compact('users'));
    }

    public function checkUser3(Request $request){
        $user_id = $request->user_id;
        $orders = $this->order->getOrders($user_id); 
        return view('admin.order.detail', compact('orders', 'user_id'));
    }

    public function getOrderDetail3($user_id, $order_id){
        $order_details = $this->order_detail->getOrderDetails3($order_id);
        return view('admin.order.order_detail', compact('order_details'));
    }
}
