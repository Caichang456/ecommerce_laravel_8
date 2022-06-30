<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\SellerRepository;

class CategoryController extends Controller
{
    protected $category, $seller;

    function __construct()
    {
        $this->category = new CategoryRepository();
        $this->seller = new SellerRepository();
    }

    public function getCategories(){
        $categories = $this->category->getCategoriesWithPagination();
        return view('admin.category.index', compact('categories'));
    }

    public function addCategory(){
        $sellers = $this->seller->getSellersWithoutPagination();
        return view('admin.category.add', compact('sellers'));
    }

    public function createCategory(Request $request){
        $categoryValidation = $request->validate([
            'name' => 'required',
            'seller_id' => 'required'
        ]);
        $this->category->createCategory($categoryValidation);
        return redirect()->route('getCategories');
    }

    public function editCategory($id){
        $category = $this->category->getCategory($id);
        $sellers = $this->seller->getSellersWithoutPagination();
        return view('admin.category.edit', compact('category', 'sellers'));
    }

    public function updateCategory(Request $request){
        $categoryValidation = $request->validate([
            'name' => 'required',
            'seller_id' => 'required'
        ]);
        $id = $request->id;
        $this->category->updateCategory($categoryValidation, $id);
        return redirect()->route('getCategories');
    }

    public function deleteCategory($id){
        $this->category->deleteCategory($id);
        return redirect()->route('getCategories');
    }
}
