@extends('admin.layouts.app')
@section('title', 'Edit Produk')
@section('content')
	<x-title>Edit Produk</x-title>
	<form method="POST" action="{{route('updateProduct')}}">
		@csrf
		<x-input2 name="id" type="hidden" value="{{$product->id}}"></x-input2>
		<x-label>Nama Penjual</x-label>
		<x-select name="seller_id">
			<option value="">Pilih Penjual</option>
			@foreach($sellers as $seller)
				<option value="{{$seller->id}}" @if($seller->id == $product->seller_id) selected @endif>{{$seller->name}}</option>
			@endforeach
		</x-select>
		@error('seller_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Kategori</x-label>
		<x-select name="category_id">
			<option value="">Pilih Kategori</option>
			@foreach($categories as $category)
				<option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
			@endforeach
		</x-select>
		@error('category_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Produk</x-label>
		<x-input2 name="name" type="text" value="{{$product->name}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Deskripsi</x-label>
		<textarea name="description" class="form-control">{{$product->description}}</textarea>
		@error('description')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getProducts')}}">Batal</x-link.deletelink>
	</form>
@endsection