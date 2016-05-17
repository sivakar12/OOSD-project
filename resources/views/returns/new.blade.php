@extends('master')
@section('content')
	<div class="col-md-offset-3 col-md-6">
		<h3>Create New Return</h3>
		<!-- Vehicle Details -->
		@if($invoice)
		<div class="panel panel-default">
			<div class="panel-heading">
				Vehicle Details
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr><td>Chassis Number</td><td>{{$invoice->chassis_number}}</td>
					<td>Make</td><td>{{$invoice->make}}</td></tr>
					<tr><td>Model</td><td>{{$invoice->model}}</td>
					<td>Year</td><td>{{$invoice->year}}</td></tr>
					<tr><td>Engine Number</td><td>{{$invoice->engine_number}}</td>
					<td>Color</td><td>{{$invoice->color}}</td></tr>
					<tr><td>Milage</td><td>{{$invoice->milage}}</td>
					<td>Body Type</td><td>{{$invoice->body_type}}</td></tr>
					<tr><td>Fuel Type</td><td>{{$invoice->fuel_type}}</td>
					<td>Engine Capacity</td><td>{{$invoice->engine_capacity}}</td></tr>
				</table>
			</div>
		</div>
		@endif
		<form action="/returns/" method="post">
			{{ csrf_field() }}
			@if(!$invoice)
			<div class="form-group">
				<label for="sales_invoice_id" class="control-label">Invoice Number: </label>
				<input name="sales_invoice_id" type="text" class="form-control">
			</div>
			@else
				<input type="hidden" name="sales_invoice_id" value="{{$invoice->id}}">
			@endif
			<button type="submit" class="btn btn-primary pull-right">Create Return</button>
		</form>
		<br><br><br>

</div>
@endsection