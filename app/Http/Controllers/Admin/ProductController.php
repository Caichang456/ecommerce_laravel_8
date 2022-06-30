<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\SellerRepository;
use App\Repositories\Admin\ProductRepository;

class ProductController extends Controller
{
    protected $category, $seller, $product;

    function __construct()
    {
        $this->category = new CategoryRepository();
        $this->seller = new SellerRepository();
        $this->product = new ProductRepository();
    }

    public function getProducts(){
        $products = $this->product->getProductsWithPagination();
        return view('admin.product.index', compact('products'));
    }

    public function addProduct(){
        $sellers = $this->seller->getSellersWithoutPagination();
        $categories = $this->category->getCategoriesWithoutPagination();
        return view('admin.product.add', compact('sellers', 'categories'));
    }

    public function createProduct(Request $request){
        $productValidation = $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $this->product->createProduct($productValidation);
        return redirect()->route('getProducts');
    }

    public function editProduct($id){
        $product = $this->product->getProduct($id);
        $sellers = $this->seller->getSellersWithoutPagination();
        $categories = $this->category->getCategoriesWithoutPagination();
        return view('admin.product.edit', compact('product', 'sellers', 'categories'));
    }

    public function updateProduct(Request $request){
        $productValidation = $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $id = $request->id;
        $this->product->updateProduct($productValidation, $id);
        return redirect()->route('getProducts');
    }

    public function deleteProduct($id){
        $this->product->deleteProduct($id);
        return redirect()->route('getProducts');
    }
}
