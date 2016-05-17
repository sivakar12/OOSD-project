@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
		<h1>Returns</h1>
		<a class="btn btn-default pull-right" href="/returns/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Return Number</th>
					<th>Invoice Number</th>
					<th>Customer</th>
					<th>Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			
			@foreach($returns as $return)
				<tr>
					<td>{{ $return->id }}</td>
					<td>{{ $return->sales_invoice_id }}</td>
					<td>{{ $return->customer->name }}</td>
					<td>{{ $return->created_at->format('d-m-Y') }}</td>
					<td><a href="/returns/{{$return->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
@endsection