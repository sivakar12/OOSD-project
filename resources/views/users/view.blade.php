@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>User Details</h1>

	<!-- The table showing details -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				{{ $user->username }}
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Username</td><td>{{ $user->username}}</td></tr>
				<tr><td>Password</td><td>{{ $user->password}}</td></tr>
				<tr><td>Type</td><td>{{ $user->type}}</td></tr>
			</table>
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<div class="pull-right">
	<a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
		<form action="/users/{{ $user->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection