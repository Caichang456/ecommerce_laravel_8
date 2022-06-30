@extends('user.layouts.app')
@section('title', 'Edit User')
@section('content')
	<x-title>Edit User</x-title>
	<form method="POST" action="{{route('updateUser')}}">
		@csrf
		<x-input2 name="id" type="hidden" value="{{$user->id}}"></x-input2>
		<x-label>Nama</x-label>
		<x-input2 name="name" type="text" value="{{$user->name}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Nomor Handphone</x-label>
		<x-input2 name="mobile_phone" type="text" value="{{$user->mobile_phone}}"></x-input2>
		@error('mobile_phone')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Alamat</x-label>
		<x-input2 name="address" type="text" value="{{$user->address}}"></x-input2>
		@error('address')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Email</x-label>
		<x-input2 name="email" type="email" value="{{$user->email}}"></x-input2>
		@error('name')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Tanggal Lahir</x-label>
		<x-input2 name="date_of_birth" type="date" value="{{$user->date_of_birth}}"></x-input2>
		@error('date_of_birth')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-label>Jenis Kelamin</x-label>
		<x-select name="gender">
			<option value="">Pilih Jenis Kelamin</option>
			<option value="1" {{ ($user->gender==1) ? 'selected' : '' }}>Pria</option>
			<option value="0" {{ ($user->gender==0) ? 'selected' : '' }}>Wanita</option>
		</x-select>
		@error('gender')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
		<x-link.deletelink href="{{route('getUsers')}}">Batal</x-link.deletelink>
	</form>
@endsection