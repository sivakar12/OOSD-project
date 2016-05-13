@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Add New Supplier</h1>
		@include('errors')
		<form action="/suppliers/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name: </label>
				<input name="name" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Address: </label>
				<textarea name="address" type="text" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="telephone">Telephone: </label>
				<input name="telephone" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email: </label>
				<input name="email" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label for="website">Website: </label>
				<input name="website" type="text" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Add Supplier</button>
		</form>
</div>
@endsection