@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>Customer Details</h1>

	<!-- The table showing details -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				{{ $customer->name }}
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Name</td><td>{{ $customer->name}}</td></tr>
				<tr><td>Address</td><td>{{ $customer->address}}</td></tr>
				<tr><td>Telephone</td><td>{{ $customer->telephone}}</td></tr>
				<tr><td>Email</td><td>{{ $customer->email}}</td></tr>
			</table>
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<div class="pull-right">
	<a href="/customers/{{ $customer->id }}/edit" class="btn btn-primary">Edit Details</a>
		<form action="/customers/{{ $customer->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Customer</button>
		</form>
	</div>
</div>
@endsection