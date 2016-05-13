@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Add New User</h1>
		@include('errors')
		<form action="/users/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="username">Username: </label>
				<input name="username" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input name="password" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="type">Type: </label>
				<select name="type" class="form-control">
					<option value="manager">Manager</option>
					<option value="accountant">Accountant</option>
					<option value="salesperson">Salesperson</option>
					<option value="stockkeeper">Stock keeper</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Add User</button>
		</form>
</div>
@endsection