@extends('admin.layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
	<x-title>Tambah Kategori</x-title>
	<form method="POST" action="{{route('createCategory')}}">
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
		<x-input name="name" type="text"></x-input>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getCategories')}}">Batal</x-link.deletelink>
	</form>
@endsection