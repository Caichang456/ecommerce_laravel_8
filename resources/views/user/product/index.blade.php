@extends('user.layouts.app')
@section('title', 'Produk')
@section('content')
	<x-title>Produk</x-title>
	<x-listgroup>
		@foreach($products as $product)
			<x-link.listlink href="{{route('getProduct', ['id' => $product->id])}}">{{$product->name}}</x-link.listlink>
		@endforeach
	</x-listgroup>
@endsection