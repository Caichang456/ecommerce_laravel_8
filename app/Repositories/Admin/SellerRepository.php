<?php

namespace App\Repositories\Admin;

use App\Models\Seller;

class SellerRepository{
	function getSellersWtihPagination(){
		return Seller::paginate(10);
	}

	function createSeller($sellerValidation){
		return Seller::create($sellerValidation);
	}

	function getSeller($id){
		return Seller::where('id', $id)->first();
	}

	function deleteSeller($id){
		return Seller::where('id', $id)->delete();
	}

	function updateSeller($sellerValidation, $id){
		return Seller::where('id', $id)->update($sellerValidation);
	}

	function getSellersWithoutPagination(){
		return Seller::get();
	}
}