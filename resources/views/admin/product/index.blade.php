@extends('admin.layouts.app')
@section('title', 'Produk')
@section('content')
	<x-title>Produk</x-title>
	<x-link.addlink href="{{route('addProduct')}}">Tambah</x-link.addlink>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama Penjual</x-th>
				<x-th>Nama Kategori</x-th>
				<x-th>Nama Produk</x-th>
				<x-th>Deskripsi</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($products as $key => $product)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$product->seller->name}}</x-td>
					<x-td>{{$product->category->name}}</x-td>
					<x-td>{{$product->name}}</x-td>
					<x-td>{{$product->description}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editProduct', ['id' => $product->id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteProduct', ['id' => $product->id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$products->links()}}
@endsection