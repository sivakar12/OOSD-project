@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Sales Invoices</h1>
		<a class="btn btn-default pull-right" href="/si/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Customer</th>
					<th>Vehicle</th>
					<th>Selling Price</th>
				</tr>
			</thead>
			<tbody>
			@foreach($sis as $si)
				<tr>
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