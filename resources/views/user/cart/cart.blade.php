@extends('user.layouts.app')
@section('title', 'Keranjang')
@section('content')
	<x-title>Keranjang - Keranjang</x-title>
	<form method="POST" action="{{route('checkOut')}}">
		@csrf
		<x-input2 name="user_id" type="hidden" value="{{$user_id}}"></x-input2>
		<x-label>Keterangan</x-label>
		<x-textarea name="description"></x-textarea>
		@error('description')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Alamat</x-label>
		<x-textarea name="address"></x-textarea>
		@error('address')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		@if(!empty($carts))
			<x-button.savebutton type="submit" name="Checkout"></x-button.savebutton>
		@endif
	</form>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama Produk Variant</x-th>
				<x-th>Stok</x-th>
				<x-th>Harga</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($carts as $key => $cart)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$cart->product_variant->name}}</x-td>
					<x-td>{{$cart->stock}}</x-td>
					<x-td>{{$cart->product_variant->price}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editStockCart', ['id' => $cart->id, 'user_id' => $user_id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteStockCart', ['id' => $cart->id, 'user_id' => $user_id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$carts->links()}}
@endsection