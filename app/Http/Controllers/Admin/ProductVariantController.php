<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ProductVariantRepository;
use App\Repositories\Admin\ProductRepository;

class ProductVariantController extends Controller
{
    protected $product_variant, $product;

    function __construct()
    {
        $this->product_variant = new ProductVariantRepository();
        $this->product = new ProductRepository();
    }

    public function getProductVariants(){
        $product_variants = $this->product_variant->getProductVariantsWithPagination();
        return view('admin.product-variant.index', compact('product_variants'));
    }

    public function addProductVariant(){
        $products = $this->product->getProductsWithoutPagination();
        return view('admin.product-variant.add', compact('products'));
    }

    public function createProductVariant(Request $request){
        $productVariantValidation = $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);
        $this->product_variant->createProductVariant($productVariantValidation);
        return redirect()->route('getProductVariants');
    }

    public function editProductVariant($id){
        $product_variant = $this->product_variant->getProductVariant($id);
        $products = $this->product->getProductsWithoutPagination();
        return view('admin.product-variant.edit', compact('product_variant', 'products', 'id'));
    }

    public function updateProductVariant(Request $request){
        $productVariantValidation = $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);
        $id = $request->id;
        $this->product_variant->updateProductVariant($productVariantValidation, $id);
        return redirect()->route('getProductVariants');
    }

    public function deleteProductVariant($id){
        $this->product_variant->deleteProductVariant($id);
        return redirect()->route('getProductVariants');
    }
}
