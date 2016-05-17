@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit User Credentials</h1>
		@include('errors')
		<form action="/users/{{ $user->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="username">Username: </label>
				<input name="username" type="text" class="form-control"
							 value="{{$user->username}}">
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input name="password" type="text" class="form-control"
							 value="{{$user->password}}">
			</div>
			<div class="form-group">
				<label for="type">Type: </label>
				<select name="type" class="form-control"
						value="{{ $user->type}}">
					<option value="manager">Manager</option>
					<option value="accountant">Accountant</option>
					<option value="salesperson">Salesperson</option>
					<option value="stockkeeper">Stock Keeper</option>
					<option value="admin">System Administrator</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Change Details</button>
		</form>
</div>
@endsection