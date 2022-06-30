<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\SellerRepository;

class SellerController extends Controller
{
    protected $seller;

    function __construct()
    {
        $this->seller = new sellerRepository();
    }

    public function getSellers(){
        $sellers = $this->seller->getSellersWtihPagination();
        return view('admin.seller.index', compact('sellers'));
    }

    public function addSeller(){
        return view('admin.seller.add');
    }

    public function createSeller(Request $request){
        $sellerValidation = $request->validate([
            'name' => 'required',
            'mobile_phone' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'password' => 'required',
            'email' => 'required|email'
        ]);
        $sellerValidation['password'] = bcrypt($sellerValidation['password']);
        $this->seller->createSeller($sellerValidation);
        return redirect()->route('getSellers');
    }

    public function editSeller($id){
        $seller = $this->seller->getSeller($id);
        return view('admin.seller.edit', compact('seller'));
    }

    public function updateSeller(Request $request){
        $sellerValidation = $request->validate([
            'name' => 'required',
            'mobile_phone' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email'
        ]);
        $id = $request->id;
        $this->seller->updateSeller($sellerValidation, $id);
        return redirect()->route('getSellers');
    }

    public function deleteSeller($id){
        $this->seller->deleteSeller($id);
        return redirect()->route('getSellers');
    }
}
