@extends('master')
@section('content')
<div class="col-md-offset-2 col-md-8">
	@if($edit)
	<h3>Edit Inventory Item</h3>
	@else
	<h3>New Inventory Item</h3>
	@endif

	@include('errors')

	<div class="panel panel-default">
		<!-- <div class="panel-heading">Enter Details</div> -->
		<div class="panel-body">
			@if($edit)
			<form method="post" action="/inventory/{{$item->id}}">
				{{ method_field('PATCH') }}
			@else
			<form method="post" action="/inventory">
			@endif
				{{csrf_field()}}

				<!-- A row of three input fields -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="type" class="control_label">Type:</label>
							<select name="type" class="form-control input-sm">
								<option value="Car">Car</option>
								<option value="Van">Van</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="chassis_number" class="control_label">Chassis Number:</label>
							<input name="chassis_number" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->chassis_number}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="manufacturers_part" class="control_label">Manufacturer's Part:</label>
							<input name="manufacturers_part" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->manufacturers_part}}"@endif>
						</div>
					</div>
				</div>

				<!-- A row of three input fields -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="year" class="control_label">Year:</label>
							<input name="year" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->year}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="manufacturer" class="control_label">Make:</label>
							<input name="manufacturer" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->manufacturer}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="model" class="control_label">Model:</label>
							<input name="model" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->model}}"@endif>
						</div>
					</div>
				</div>

				<!-- A row of three input fields -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="body_type" class="control_label">Body Type:</label>
							<input name="body_type" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->body_type}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="primary_color" class="control_label">Primary Color:</label>
							<input name="primary_color" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->primary_color}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="engine_number" class="control_label">Engine Number:</label>
							<input name="engine_number" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->engine_number}}"@endif>
						</div>
					</div>
				</div>

				<!-- A row of three input fields -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="milage" class="control_label">Milage:</label>
							<input name="milage" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->milage}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="transmission" class="control_label">Transmission:</label>
							<input name="transmission" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->transmission}}"@endif>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="engine_capacity" class="control_label">Engine Capacity:</label>
							<input name="engine_capacity" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->engine_capacity}}"@endif>
						</div>
					</div>
				</div>

				<!-- A row of two four fields -->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="cylinders" class="control_label">Cylinders:</label>
							<input name="cylinders" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->cylinders}}"@endif>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="fuel_type" class="control_label">Fuel Type:</label>
							<input name="fuel_type" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->fuel_type}}"@endif>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="purchase_cost" class="control_label">Purchase Cost:</label>
							<input name="purchase_cost" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->purchase_cost}}"@endif>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
							<label for="sales_price" class="control_label">Sales Price:</label>
							<input name="sales_price" type="text" class="form-control input-sm"
							@if($edit)value="{{$item->sales_price}}"@endif>
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">
					@if($edit)
					Update Details
					@else
					Add Item
					@endif
				</button>
			</form>
		</div>
	</div>
</div>
@endsection