@extends('admin.layouts.app')
@section('title', 'Edit Kategori')
@section('content')
	<x-title>Edit Kategori</x-title>
	<form method="POST" action="{{route('updateCategory')}}">
		@csrf
		<x-input2 name="id" type="hidden" value="{{$category->id}}"></x-input2>
		<x-label>Nama Penjual</x-label>
		<x-select name="seller_id">
			<option value="">Pilih Penjual</option>
			@foreach($sellers as $seller)
				<option value="{{$seller->id}}" @if($seller->id == $category->seller_id) selected @endif>{{$seller->name}}</option>
			@endforeach
		</x-select>
		@error('seller_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nama Kategori</x-label>
		<x-input2 name="name" type="text" value="{{$category->name}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getCategories')}}">Batal</x-link.deletelink>
	</form>
@endsection