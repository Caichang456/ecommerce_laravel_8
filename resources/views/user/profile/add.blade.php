@extends('user.layouts.app')
@section('title', 'Tambah User')
@section('content')
	<x-title>Tambah User</x-title>
	<form method="POST" action="{{route('createUser')}}">
		@csrf
		<x-label>Nama</x-label>
		<x-input name="name" type="text"></x-input>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nomor Handphone</x-label>
		<x-input name="mobile_phone" type="text"></x-input>
		@error('mobile_phone')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Alamat</x-label>
		<x-input name="address" type="text"></x-input>
		@error('address')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Password</x-label>
		<x-input name="password" type="password"></x-input>
		@error('password')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Email</x-label>
		<x-input name="email" type="email"></x-input>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Tanggal Lahir</x-label>
		<x-input name="date_of_birth" type="date"></x-input>
		@error('date_of_birth')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Jenis Kelamin</x-label>
		<x-select name="gender">
			<option value="">Pilih Jenis Kelamin</option>
			<option value="1">Pria</option>
			<option value="0">Wanita</option>
		</x-select>
		@error('gender')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getUsers')}}">Batal</x-link.deletelink>
	</form>
@endsection