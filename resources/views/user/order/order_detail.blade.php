@extends('user.layouts.app')
@section('title', 'Pesanan')
@section('content')
	<x-title>Pesanan - Order Detail</x-title>
	<x-table>
		<x-thead>
			<x-tr>
				<x-th>No</x-th>
				<x-th>Nama Produk Variant</x-th>
				<x-th>Stok</x-th>
				<x-th>Harga</x-th>
			</x-tr>
		</x-thead>
		<x-tbody>
			@foreach($order_details as $key => $order_detail)
				<x-tr>
					<x-td>
						@if(empty(Request('page')) || Request('page') == 1)
							{{($key + 1)}}
						@else
							{{((Request('page') - 1) * 10) + ($key + 1)}}
						@endif
					</x-td>
					<x-td>{{$order_detail->product_variant->name}}</x-td>
					<x-td>{{$order_detail->stock}}</x-td>
					<x-td>{{$order_detail->product_variant->price}}</x-td>
				</x-tr>
			@endforeach
		</x-tbody>
	</x-table>
	{{$order_details->links()}}
@endsection