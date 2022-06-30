<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\ProductRepository;
use App\Repositories\User\ProductVariantRepository;
use App\Repositories\User\CartRepository;
use App\Repositories\User\UserRepository;

class ProductController extends Controller
{
    protected $product, $product_variant, $cart, $user;

    function __construct()
    {
        $this->product = new ProductRepository();
        $this->product_variant = new ProductVariantRepository();
        $this->cart = new CartRepository();
        $this->user = new UserRepository();
    }

    public function getProducts2(){
        $products = $this->product->getProducts();
        return view('user.product.index', compact('products'));
    }

    public function getProduct($id){
        $product = $this->product->getProduct($id);
        $product_variants = $this->product_variant->getProductVariants($id);
        return view('user.product.detail', compact('product', 'product_variants'));
    }

    public function getOrder($id, $product_variant_id){
        $users = $this->user->getUsersWithoutPagination();
        $product_variant = $this->product_variant->getProductVariant($product_variant_id);
        return view('user.product.order', compact('product_variant', 'users'));
    }

    public function createCart(Request $request){
        $cartValidation = $request->validate([
            'stock' => 'required',
            'user_id' => 'required',
            'product_variant_id' => 'required'
        ]);
        $stock = $this->cart->checkProductVariant($cartValidation);
        $this->cart->createCart($cartValidation);
        return redirect()->route('getProducts2');
    }
}
