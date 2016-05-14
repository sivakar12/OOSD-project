@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Performa Invoices List</h1>
		<a class="btn btn-default pull-right" href="/pi/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Supplier</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			@foreach($pis as $pi)
				<tr>
					<td>{{ $pi->id }}</td>
					<td>{{ $pi->created_at->format('d-m-Y')}}</td>
					<td>{{ $pi->supplier->name }}</td>
					<td><a href="/pi/{{$pi->id}}">View</a></td>
					<td><a href="/pi/edit/{{$pi->id}}">Edit</a></td>
				</tr>
			@endforeach
		</table>
</div>
@endsection