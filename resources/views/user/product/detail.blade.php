@extends('user.layouts.app')
@section('title', 'Produk Detail')
@section('content')
	<x-title>Produk Detail</x-title>
	<x-card.card>
		<x-card.cardheader>
			Nama Produk: {{$product->name}}
		</x-card.cardheader>
		<x-card.cardbody>
			Deskripsi:<br>
			{{$product->description}}
		</x-card.cardbody>
		<x-card.cardfooter>
			Produk Variant
			<x-listgroup2>
				@forelse($product_variants as $product_variant)
					<x-listitem>
						<x-label>Nama Variant: {{$product_variant->name}}</x-label>
						<x-label>Harga: {{$product_variant->price}}</x-label>
						<x-link.editlink href="{{route('getOrder', ['id' => $product->id, 'product_variant_id' => $product_variant->id])}}">Pesan</x-link.editlink>
					</x-listitem>
				@empty
					Tidak ada produk variant ya :)
				@endforelse
			</x-listgroup2>
		</x-card.cardfooter>
	</x-card.card>
@endsection