@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h2>Purchase Orders List</h2>
		<a class="btn btn-default pull-right" href="/po/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Order Number</th>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Supplier</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			@foreach($pos as $po)
				<tr>
					<td>{{ $po->id }}</td>
					<td>{{ $po->performa_invoice->id}}</td>
					<td>{{ $po->created_at->format('d-m-Y')}}</td>
					<td>{{ $po->supplier->name }}</td>
					<td><a href="/po/{{$po->id}}">View</a></td>
					<td><a href="/po/edit/{{$po->id}}">Edit</a></td>
				</tr>
			@endforeach
		</table>
</div>
@endsection