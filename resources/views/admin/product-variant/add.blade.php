@extends('admin.layouts.app')
@section('title', 'Tambah Produk Variant')
@section('content')
	<x-title>Tambah Produk Variant</x-title>
	<form method="POST" action="{{route('createProductVariant')}}">
		@csrf
		<x-label>Nama Produk</x-label>
		<x-select name="product_id">
			<option value="">Pilih Produk</option>
			@foreach($products as $product)
				<option value="{{$product->id}}">{{$product->name}}</option>
			@endforeach
		</x-select>
		@error('product_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Produk Variant</x-label>
		<x-input name="name" type="text"></x-input>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Harga</x-label>
		<x-input name="price" type="text"></x-input>
		@error('price')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Stok Barang</x-label>
		<x-input name="stock" type="number"></x-input>
		@error('stock')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Gambar (comming soon)</x-label>
		<x-input name="file" type="file"></x-input>
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getProductVariants')}}">Batal</x-link.deletelink>
	</form>
@endsection