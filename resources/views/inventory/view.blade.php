@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>{{ $item->manufacturer . ' ' . $item->model }}</h1>

	<!-- The table showing details -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				Vehicle Details
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Type</td><td>{{ $item->type}}</td>
				<td>Chassis Number</td><td>{{ $item->chassis_number}}</td></tr>
				<tr><td>Manufacturer's Part</td><td>{{ $item->manufacturers_part}}</td>
				<td>Year</td><td>{{ $item->year}}</td></tr>
				<tr><td>Manufacturer</td><td>{{ $item->manufacturer}}</td>
				<td>Model</td><td>{{ $item->model}}</td></tr>
				<tr><td>Body Type</td><td>{{ $item->body_type}}</td>
				<td>Primary Color</td><td>{{ $item->primary_color}}</td></tr>
				<tr><td>Engine Number</td><td>{{ $item->engine_number}}</td>
				<td>Milage</td><td>{{ $item->milage}}</td></tr>
				<tr><td>Transmission</td><td>{{ $item->transmission}}</td>
				<td>Engine Capacity</td><td>{{ $item->engine_capacity}}</td></tr>
				<tr><td>Cylinders</td><td>{{ $item->cylinders}}</td>
				<td>Fuel Type</td><td>{{ $item->fuel_type}}</td></tr>
				<tr><td>Purchase Cost</td><td>{{ $item->purchase_cost}}</td>
				<td>Sales Price</td><td>{{ $item->sales_price}}</td></tr>
			</table>
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<a class="btn btn-primary" href="/si/new/{{$item->chassis_number}}">Add to Sales Invoice</a>
	<div class="pull-right">
	<a href="/inventory/{{ $item->id }}/edit" class="btn btn-primary">Edit Details</a>
		<form action="/inventory/{{ $item->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Customer</button>
		</form>
	</div>
</div>
@endsection