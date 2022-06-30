<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\User\OrderRepository;
use App\Repositories\User\OrderDetailRepository;

class OrderController extends Controller
{
    protected $user, $order, $order_detail;

    function __construct()
    {
        $this->user = new UserRepository();
        $this->order = new OrderRepository();
        $this->order_detail = new OrderDetailRepository();
    }

    public function getUser3(){
        $users = $this->user->getUsersWithoutPagination();
        return view('user.order.index', compact('users'));
    }

    public function checkUser2(Request $request){
        $user_id = $request->user_id;
        $orders = $this->order->getOrders($user_id); 
        return view('user.order.detail', compact('orders', 'user_id'));
    }

    public function getOrderDetail2($user_id, $order_id){
        $order_details = $this->order_detail->getOrderDetails2($order_id);
        return view('user.order.order_detail', compact('order_details'));
    }
}
