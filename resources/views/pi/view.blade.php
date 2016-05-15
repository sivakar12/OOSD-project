<!-- Performa Invoice View -->

@extends('master')
@section('content')
<div class="col-md-12">
	<h3>Performa Invoice #{{$pi->id}}</h3>

	<!-- Details Panel -->
	<div class="panel panel-default">
		<div class="panel-heading">
			Details
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
					<tr>
						<td>Date</td>
						<td>{{$pi->created_at->format('d-m-Y')}}</td>
					</tr>
					<tr>
						<td>Supplier</td>
						<td>{{$pi->supplier->name}}</td>
					</tr>
					<tr>
						<td>Supplier Address</td>
						<td>{{$pi->supplier->address}}</td>
					</tr>
			</table>
			<div class="pull-right"><a href="/suppliers/{{$pi->supplier->id}}"class="btn btn-primary">View Supplier</a></div>
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
					@foreach($pi->items as $item)
						<tr>
							<td>{{$item->type}}</td>
							<td>{{$item->brand}}</td>
							<td>{{$item->model}}</td>
							<td>{{$item->year}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{$item->price}}</td>
							<td>{{$item->quantity * $item->price}}</td>
							<td>
								<form action="/pi/{{$pi->id}}/{{$item->id}}" method="post">
									{{ csrf_field() }}
									{{ method_field('delete')}}
									<button type="submit" class="btn btn-danger btn-xs">Remove</button>
								</form>
							</td>
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
	@if($edit)
	<!-- Form to add next item -->
	<div class="panel panel-default">
		<div class="panel-heading">Add a new item</div>
		<div class="panel-body">
			<form action="/pi/{{$pi->id}}" method="post">
				{{ csrf_field() }}
				<!-- type input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="type" class="control-label">Type:</label>
						<select name="type" class="form-control input-sm">
							<option value="Car">Car</option>
							<option value="Van">Van</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>
				<!-- brand input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="brand" class="control-label">Brand:</label>
						<input name="brand" type="text" class="form-control input-sm">
					</div>
				</div>
				<!-- model input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="model" class="control-label">Model:</label>
						<input name="model" type="text" class="form-control input-sm">
					</div>
				</div>
				<!-- year input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="year" class="control-label">Year:</label>
						<input name="year" type="text" class="form-control input-sm">
					</div>
				</div>

				<!-- descripton input -->
				<div class="col-md-6">
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<input name="description" type="" class="form-control input-sm">
					</div>
				</div>
				<!-- quantity input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="quantity" class="control-label">Quantity:</label>
						<input name="quantity" type="" class="form-control input-sm">
					</div>
				</div>
				<!-- price input -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="price" class="control-label">Price:</label>
						<input name="price" type="" class="form-control input-sm">
					</div>
				</div>
				<div class="pull-right">
					<button type="sumbmit" class="btn btn-primary">Add Item</button>
				</div>
			</form>
		</div>
	</div>
	@endif
	<!-- Delete and Edit buttons -->
	<div class="pull-right">
		@if(!$edit)
		<a class="btn btn-primary" href="/pi/edit/{{$pi->id}}">Edit Invoice</a>
		@endif
		<form action="/pi/{{ $pi->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Invoice</button>
		</form>
	</div>
</div>
@endsection