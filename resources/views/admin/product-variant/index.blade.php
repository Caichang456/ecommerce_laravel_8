@extends('admin.layouts.app')
@section('title', 'Produk Variant')
@section('content')
	<x-title>Produk Variant</x-title>
	<x-link.addlink href="{{route('addProductVariant')}}">Tambah</x-link.addlink>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama Produk</x-th>
				<x-th>Nama Produk Variant</x-th>
				<x-th>Gambar</x-th>
				<x-th>Harga</x-th>
				<x-th>Stok</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($product_variants as $key => $product_variant)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$product_variant->product->name}}</x-td>
					<x-td>{{$product_variant->name}}</x-td>
					<x-td>Comming Soon</x-td>
					<x-td>{{$product_variant->price}}</x-td>
					<x-td>{{$product_variant->stock}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editProductVariant', ['id' => $product_variant->id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteProductVariant', ['id' => $product_variant->id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$product_variants->links()}}
@endsection