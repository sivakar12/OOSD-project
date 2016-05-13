<!-- Performa Invoice View -->

@extends('master')
@section('content')
<div class="col-md-12">
	<h3>Performa Invoice</h3>

	<!-- Table of Items -->
	<div class="panel panel-default">
		<div class="panel-heading">Items</div>
		<div class="panel-body">
			<table class="table table-striped">
			<thead>
				<tr>
					<th>Item Code</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($pi->items as $item)
					<tr>
						<td>{{$item->item_code}}</td>
						<td>{{$item->description}}</td>
						<td>{{$item->quantity}}</td>
						<td>{{$item->price}}</td>
						<td>{{$item->quantity * $item->price}}</td>
						<td>
							<form target="/delete_pi_items/{{$item->id}}" method="post">
								{{ csrf_field() }}
								{{ method_field('delete')}}
								<button type="submit" class="btn btn-danger btn-xs">Remove</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@endsection