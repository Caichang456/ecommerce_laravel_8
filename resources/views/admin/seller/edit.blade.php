@extends('admin.layouts.app')
@section('title', 'Edit Penjual')
@section('content')
	<x-title>Edit Penjual</x-title>
	<form method="POST" action="{{route('updateSeller')}}">
		@csrf
		<x-input2 name="id" type="hidden" value="{{$seller->id}}"></x-input2>
		<x-label>Nama</x-label>
		<x-input2 name="name" type="text" value="{{$seller->name}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nomor Handphone</x-label>
		<x-input2 name="mobile_phone" type="text" value="{{$seller->mobile_phone}}"></x-input2>
		@error('mobile_phone')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Alamat</x-label>
		<x-input2 name="address" type="text" value="{{$seller->address}}"></x-input2>
		@error('address')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Email</x-label>
		<x-input2 name="email" type="email" value="{{$seller->email}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Tanggal Lahir</x-label>
		<x-input2 name="date_of_birth" type="date" value="{{$seller->date_of_birth}}"></x-input2>
		@error('date_of_birth')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Jenis Kelamin</x-label>
		<x-select name="gender">
			<option value="">Pilih Jenis Kelamin</option>
			<option value="1" {{ ($seller->gender==1) ? 'selected' : '' }}>Pria</option>
			<option value="0" {{ ($seller->gender==0) ? 'selected' : '' }}>Wanita</option>
		</x-select>
		@error('gender')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getSellers')}}">Batal</x-link.deletelink>
	</form>
@endsection