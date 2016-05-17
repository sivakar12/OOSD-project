@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>Receipt #{{ $receipt->id }}</h1>

	<!-- Details (Date and Cusotmer) -->
	<div class="panel panel-default">
		<div class="panel-heading">Details</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Date</td><td>{{ $receipt->created_at->format('d-m-Y')}}</td></tr>
				<tr><td>Invoice Number</td><td>{{ $receipt->sales_invoice_id }}</td></tr>
				<tr><td>Customer</td><td> {{ $receipt->customer->name }}</td></tr>
			</table>
			<div class="pull-right">
				<a href="/customers/{{$receipt->customer_id}}" class="btn btn-primary">View Customer</a>
				<a href="/si/{{$receipt->sales_invoice_id}}" class="btn btn-primary">View Invoice</a>

			</div>
		</div>
	</div>

	<!-- Payment Details -->
	<div class="panel panel-default">
		<div class="panel-heading">Payment Details</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Amount</td><td>{{ $receipt->amount}}</td></tr>
				<tr><td>Payment Type</td><td> {{ $receipt->payment_type }}</td></tr>
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
				<tr><td>Chassis Number</td><td>{{ $receipt->sales_invoice->chassis_number}}</td></tr>
				<tr><td>Make</td><td>{{ $receipt->sales_invoice->make}}</td></tr>
				<tr><td>Model</td><td>{{ $receipt->sales_invoice->model}}</td></tr>
				<tr><td>Year</td><td>{{ $receipt->sales_invoice->year}}</td></tr>
				<tr><td>Engine Number</td><td>{{ $receipt->sales_invoice->engine_number}}</td></tr>
				<tr><td>Color</td><td>{{ $receipt->sales_invoice->color}}</td></tr>
				<tr><td>Milage</td><td>{{ $receipt->sales_invoice->milage}}</td></tr>
				<tr><td>Body Type</td><td>{{ $receipt->sales_invoice->body_type}}</td></tr>
				<tr><td>Fuel Type</td><td>{{ $receipt->sales_invoice->fuel_type}}</td></tr>
				<tr><td>Engine Capacity</td><td>{{ $receipt->sales_invoice->engine_capacity}}</td></tr>
				<tr><td>Transmission</td><td>{{ $receipt->sales_invoice->transmission}}</td></tr>
			</table>
			
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<div class="pull-right">
	<a href="/receipt/{{ $receipt->id }}/edit" class="btn btn-primary">Edit Details</a>
		<form action="/receipt/{{ $receipt->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Receipt</button>
		</form>
	</div>
</div>
@endsection