@extends('user.layouts.app')
@section('title', 'Pesan')
@section('content')
	<x-title>Pesan: {{$product_variant->name}}</x-title>
	<form method="POST" action="{{route('createCart')}}">
		@csrf
		<x-input2 name="product_variant_id" type="hidden" value="{{$product_variant->id}}"></x-input2>
		<x-label>Pengguna</x-label>
		<x-select name="user_id">
			<option value="">Pilih Pengguna</option>
			@foreach($users as $user)
				<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</x-select>
		@error('user_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Jumlah Barang</x-label>
		<x-input name="stock" type="number"></x-input>
		@error('stock')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
	</form>
@endsection