@extends('user.layouts.app')
@section('title', 'Keranjang')
@section('content')
	<x-title>Keranjang - Edit Stock {{$cart->product_variant->name}}</x-title>
	<form method="POST" action="{{route('editStock')}}">
		@csrf
		<x-input2 name="user_id" type="hidden" value="{{$user_id}}"></x-input2>
		<x-input2 name="cart_id" type="hidden" value="{{$cart->id}}"></x-input2>
		<x-label>Stock</x-label>
		<x-inputnumber name="stock" value="{{$cart->stock}}" min="1"></x-inputnumber>
		@error('stock')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getCarts', ['user_id' => $user_id])}}">Batal</x-link.deletelink>
	</form>
@endsection