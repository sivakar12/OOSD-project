@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>Sales Invoice #{{ $si->id }}</h1>

	<!-- Details (Date and Cusotmer) -->
	<div class="panel panel-default">
		<div class="panel-heading">Details</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Date</td><td>{{ $si->created_at->format('d-m-Y')}}</td></tr>
				<tr><td>Customer</td><td> {{ $si->customer->name }}</td></tr>
				<tr><td>Customer's Telephone</td><td>{{ $si->customer->telephone }}</td></tr>
			</table>
			<div class="pull-right"><a href="/customers/{{$si->customer_id}}" class="btn btn-primary">View Customer</a></div>
		</div>
	</div>

	<!-- Payment Details -->
	<div class="panel panel-default">
		<div class="panel-heading">Payment Details</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Price</td><td>{{ $si->price}}</td></tr>
				<tr><td>Purchase Method</td><td> {{ $si->purchase_method }}</td></tr>
				<tr><td>Deposit</td><td>{{ $si->deposit }}</td></tr>
				<tr><td>Receipts Total</td><td>{{$receipt_total}}</td>
				<tr><td>Total Due</td><td>{{ $si->price - $si->deposit - $receipt_total }}</td>
			</table>
		</div>
	</div>
	<!-- The table showing vehicle details -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				Vehicle Details
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Chassis Number</td><td>{{ $si->chassis_number}}</td></tr>
				<tr><td>Make</td><td>{{ $si->make}}</td></tr>
				<tr><td>Model</td><td>{{ $si->model}}</td></tr>
				<tr><td>Year</td><td>{{ $si->year}}</td></tr>
				<tr><td>Engine Number</td><td>{{ $si->engine_number}}</td></tr>
				<tr><td>Color</td><td>{{ $si->color}}</td></tr>
				<tr><td>Milage</td><td>{{ $si->milage}}</td></tr>
				<tr><td>Body Type</td><td>{{ $si->body_type}}</td></tr>
				<tr><td>Fuel Type</td><td>{{ $si->fuel_type}}</td></tr>
				<tr><td>Engine Capacity</td><td>{{ $si->engine_capacity}}</td></tr>
				<tr><td>Transmission</td><td>{{ $si->transmission}}</td></tr>
				
				
			</table>
			
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<a class="btn btn-primary" href="/receipts/new/{{$si->id}}">Create Receipt</a>
	<a class="btn btn-primary" href="/returns/new/{{$si->id}}">Create Return</a>

	<div class="pull-right">
	<a href="/si/{{ $si->id }}/edit" class="btn btn-primary">Edit Details</a>
		<form action="/si/{{ $si->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Invoice</button>
		</form>
	</div>
</div>
@endsection