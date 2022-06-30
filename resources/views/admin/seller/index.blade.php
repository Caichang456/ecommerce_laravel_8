@extends('admin.layouts.app')
@section('title', 'Penjual')
@section('content')
	<x-title>Penjual</x-title>
	<x-link.addlink href="{{route('addSeller')}}">Tambah</x-link.addlink>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama</x-th>
				<x-th>Email</x-th>
				<x-th>Jenis Kelamin</x-th>
				<x-th>Nomor Handphone</x-th>
				<x-th>Alamat</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($sellers as $key => $seller)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$seller->name}}</x-td>
					<x-td>{{$seller->email}}</x-td>
					<x-td>
						@if($seller->gender==1)
							Pria
						@else
							Wanita
						@endif
					</x-td>
					<x-td>{{$seller->mobile_phone}}</x-td>
					<x-td>{{$seller->address}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editSeller', ['id' => $seller->id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteSeller', ['id' => $seller->id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$sellers->links()}}
@endsection