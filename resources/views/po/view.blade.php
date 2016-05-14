<!-- Performa Invoice View -->

@extends('master')
@section('content')
<div class="col-md-12">
	<h3>Purchase Order #{{$po->id}}</h3>

	<!-- Details Panel -->
	<div class="panel panel-default">
		<div class="panel-heading">
			Details
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
					<tr>
						<td>Date</td>
						<td>{{$po->created_at->format('d-m-Y')}}</td>
					</tr>
					<tr>
						<td>Invoice Number</td>
						<td><a href="/pi/{{$po->performa_invoice_id}}">{{$po->performa_invoice_id}}</a></td>
					</tr>
					<tr>
						<td>Supplier</td>
						<td><a href="/suppliers/{{$po->supplier->id}}">{{$po->supplier->name}}</a></td>
					</tr>
					<tr>
						<td>Supplier Address</td>
						<td>{{$po->supplier->address}}</td>
					</tr>
			</table>
		</div>
	</div>

	<!-- Table of Items -->
	<div class="panel panel-default">
		<div class="panel-heading">Items</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Type</th>
						<th>Brand</th>
						<th>Model</th>
						<th>Year</th>
						<th>Description</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Amount</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($po->items as $item)
						<tr>
							<td>{{$item->type}}</td>
							<td>{{$item->brand}}</td>
							<td>{{$item->model}}</td>
							<td>{{$item->year}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{$item->price}}</td>
							<td>{{$item->quantity * $item->price}}</td>
						</tr>
					@endforeach
					<tr>
						<td></td><td></td><td></td><td></td><td></td><td></td>
						<td>Total:</td><td>{{$total}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Delete and Edit buttons -->
	<div class="pull-right">
		<form action="/po/{{ $po->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Order</button>
		</form>
	</div>
</div>
@endsection