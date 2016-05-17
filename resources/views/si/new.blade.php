@extends('master')
@section('content')
	<div class="col-md-offset-3 col-md-6">
		<h3>Create New Sales Invoice</h3>
		<form action="/si/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="customer_id" class="control-label">Customer: </label>
				<select name="customer_id" class="form-control">
					@foreach($customers as $customer)
					<option value="{{$customer->id}}">{{$customer->name}} (Customer ID: {{$customer->id}})</option>
					@endforeach
				</select>
			</div>
			@if(!$vehicle)
			<div class="form-group">
				<label for="chassis_number" class="control-label">Vehicle Chassis Number:</label>
				<input name="chassis_number" type="text" class="form-control">
			</div>
			@else
				<input type="hidden" name="chassis_number" value="{{$vehicle->chassis_number}}">
			@endif
			<div class="row">
				
				<div class="form-group col-md-6">
					<label for="price" class="control-label">Price:</label>
					<input name="price" type="text" class="form-control input-sm">
				</div>
				<div class="form-group col-md-6">
					<label for="deposit" class="control-label">Deposit:</label>
					<input name="deposit" type="text" class="form-control input-sm">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="purchase_method" class="control-label">Purchase Method</label><br>
					<div class="radio-inline">
						<label><input type="radio" name="purchase_method">Lease</label>
					</div>
					<div class="radio-inline">
						<label><input type="radio" name="purchase_method" checked>Cash</label>
					</div>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary pull-right">Create Sales Invoice</button>
				</div>
			</div>
		</form>
		<br>

		<!-- Vehicle Details -->
		@if($vehicle)
		<div class="panel panel-default">
			<div class="panel-heading">
				Vehicle Details
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr><td>Chassis Number</td><td>{{$vehicle->chassis_number}}</td>
					<td>Make</td><td>{{$vehicle->manufacturer}}</td></tr>
					<tr><td>Model</td><td>{{$vehicle->model}}</td>
					<td>Year</td><td>{{$vehicle->year}}</td></tr>
					<tr><td>Engine Number</td><td>{{$vehicle->engine_number}}</td>
					<td>Color</td><td>{{$vehicle->primary_color}}</td></tr>
					<tr><td>Milage</td><td>{{$vehicle->milage}}</td>
					<td>Body Type</td><td>{{$vehicle->body_type}}</td></tr>
					<tr><td>Fuel Type</td><td>{{$vehicle->fuel_type}}</td>
					<td>Engine Capacity</td><td>{{$vehicle->engine_capacity}}</td></tr>
				</table>
			</div>
		</div>
		@endif
</div>
@endsection