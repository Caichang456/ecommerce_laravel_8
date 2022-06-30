<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\CartRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\User\OrderRepository;
use App\Repositories\User\OrderDetailRepository;

class CartController extends Controller
{
    protected $cart, $user, $order, $order_detail;

    function __construct()
    {
        $this->cart = new CartRepository();
        $this->user = new UserRepository();
        $this->order = new OrderRepository();
        $this->order_detail = new OrderDetailRepository();
    }

    public function getUsers2(){
        $users = $this->user->getUsersWithoutPagination();
        return view('user.cart.index', compact('users'));
    }

    public function checkUser(Request $request){
        $cartValidation = $request->validate([
            'user_id' => 'required'
        ]);
        $carts = $this->cart->checkUser($cartValidation);
        $user_id = $cartValidation['user_id'];
        return view('user.cart.cart', compact('carts', 'user_id'));
    }

    public function editStockCart($id, $user_id){
        $cart = $this->cart->editStockCart($id);
        return view('user.cart.edit', compact('cart', 'user_id'));
    }

    public function editStock(Request $request){
        $cartValidation = $request->validate([
            'stock' => 'required'
        ]);
        $user_id = $request->user_id;
        $cart_id = $request->cart_id;
        $this->cart->editStock($cartValidation, $cart_id);
        return redirect()->route('getCarts', ['user_id' => $user_id]);
    }

    public function deleteStockCart($id, $user_id){
        $this->cart->deleteStockCart($id);
        return redirect()->route('getCarts', ['user_id' => $user_id]);
    }

    public function getCarts($user_id){
        $carts = $this->cart->getCarts($user_id);
        return view('user.cart.cart', compact('carts', 'user_id'));
    }

    public function checkOut(Request $request){
        $cartValidation = $request->validate([
            'description' => 'required',
            'address' => 'required'
        ]);
        $user_id = $request->user_id;
        $carts = $this->cart->checkOut($user_id);
        if(!empty($carts)){
            
        }
        $orders = $this->order->createOrder($cartValidation, $user_id);
        $this->order_detail->createOrderDetail($orders, $carts, $user_id);
        $this->cart->cleanCart($user_id);
        return redirect()->route('getCarts', ['user_id' => $user_id]);
    }
}
