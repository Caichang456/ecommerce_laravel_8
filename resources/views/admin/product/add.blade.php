@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('content')
	<x-title>Tambah Produk</x-title>
	<form method="POST" action="{{route('createProduct')}}">
		@csrf
		<x-label>Nama Penjual</x-label>
		<x-select name="seller_id">
			<option value="">Pilih Penjual</option>
			@foreach($sellers as $seller)
				<option value="{{$seller->id}}">{{$seller->name}}</option>
			@endforeach
		</x-select>
		@error('seller_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Kategori</x-label>
		<x-select name="category_id">
			<option value="">Pilih Kategori</option>
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</x-select>
		@error('category_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Produk</x-label>
		<x-input name="name" type="text"></x-input>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Deskripsi</x-label>
		<x-textarea name="description"></x-textarea>
		@error('description')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getProducts')}}">Batal</x-link.deletelink>
	</form>
@endsection