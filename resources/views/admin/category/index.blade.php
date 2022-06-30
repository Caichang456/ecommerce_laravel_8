@extends('admin.layouts.app')
@section('title', 'Ketegori')
@section('content')
	<x-title>Kategori</x-title>
	<x-link.addlink href="{{route('addCategory')}}">Tambah</x-link.addlink>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama Penjual</x-th>
				<x-th>Nama Kategori</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($categories as $key => $category)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$category->seller->name}}</x-td>
					<x-td>{{$category->name}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editCategory', ['id' => $category->id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteCategory', ['id' => $category->id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$categories->links()}}
@endsection