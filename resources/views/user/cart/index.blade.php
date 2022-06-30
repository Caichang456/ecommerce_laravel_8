@extends('user.layouts.app')
@section('title', 'Keranjang')
@section('content')
	<x-title>Keranjang - Pilih User</x-title>
	<form method="POST" action="{{route('checkUser')}}">
		@csrf
		<x-label>Pilih User</x-label>
		<x-select name="user_id">
			<option value="">Pilih User</option>
			@foreach($users as $user)
				<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</x-select>
		@error('user_id')
			<x-alertdanger>{{$message}}</x-alertdanger>
		@enderror
		<x-button.savebutton type="submit" name="Simpan"></x-button.savebutton>
	</form>
@endsection