@extends('user.layouts.app')
@section('title', 'Pengguna')
@section('content')
	<x-title>Pengguna</x-title>
	<x-link.addlink href="{{route('addUser')}}">Tambah</x-link.addlink>
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
			@foreach($users as $key => $user)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$user->name}}</x-td>
					<x-td>{{$user->email}}</x-td>
					<x-td>
						@if($user->gender==1)
							Pria
						@else
							Wanita
						@endif
					</x-td>
					<x-td>{{$user->mobile_phone}}</x-td>
					<x-td>{{$user->address}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('editUser', ['id' => $user->id])}}">Edit</x-link.editlink>
						<x-link.deletelink href="{{route('deleteUser', ['id' => $user->id])}}">Delete</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$users->links()}}
@endsection