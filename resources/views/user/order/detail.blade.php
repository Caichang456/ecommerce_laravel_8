@extends('user.layouts.app')
@section('title', 'Pesanan')
@section('content')
	<x-title>Pesanan - Detail</x-title>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Tanggal Transaksi</x-th>
				<x-th>Keterangan</x-th>
				<x-th>Alamat</x-th>
				<x-th>Aksi</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($orders as $key => $order)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$order->transaction_date}}</x-td>
					<x-td>{{$order->description}}</x-td>
					<x-td>{{$order->address}}</x-td>
					<x-td>
						<x-link.editlink href="{{route('getOrderDetail2', ['order_id' => $order->id, 'user_id' => $user_id])}}">Lihat</x-link.editlink>
					</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$orders->links()}}
@endsection