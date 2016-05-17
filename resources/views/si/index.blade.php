@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
		<h1>Sales Invoices</h1>
		<a class="btn btn-default pull-right" href="/si/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Customer</th>
					<th>Vehicle</th>
					<th>Selling Price</th>
				</tr>
			</thead>
			<tbody>
			@foreach($sis as $si)
				<tr>
					<td>{{ $si->id }}</td>
					<td>{{ $si->created_at->format('d-m-Y') }}</td>
					<td>{{ $si->customer->name }}</td>
					<td>{{ $si->make }} {{ $si->model }}</td>
					<td>{{ $si->price }}</td>
					<td><a href="/si/{{$si->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
@endsection