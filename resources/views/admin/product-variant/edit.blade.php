@extends('admin.layouts.app')
@section('title', 'Edit Produk Variant')
@section('content')
	<x-title>Edit Produk Variant</x-title>
	<form method="POST" action="{{route('updateProductVariant')}}">
		@csrf
		<x-input2 name="id" type="hidden" value="{{$id}}"></x-input2>
		<x-label>Nama Produk</x-label>
		<x-select name="product_id">
			<option value="">Pilih Produk</option>
			@foreach($products as $product)
				<option value="{{$product->id}}" @if($product->id == $product_variant->product_id) selected @endif>{{$product->name}}</option>
			@endforeach
		</x-select>
		@error('product_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Produk Variant</x-label>
		<x-input2 name="name" type="text" value="{{$product_variant->name}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Harga</x-label>
		<x-input2 name="price" type="text" value="{{$product_variant->price}}"></x-input2>
		@error('price')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Stok Barang</x-label>
		<x-input2 name="stock" type="number" value="{{$product_variant->stock}}"></x-input2>
		@error('stock')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Gambar (comming soon)</x-label>
		<x-input name="file" type="file"></x-input>
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getProductVariants')}}">Batal</x-link.deletelink>
	</form>
@endsection