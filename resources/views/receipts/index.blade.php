@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Receipts</h1>
		<a class="btn btn-default pull-right" href="/receipts/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Receipt Number</th>
					<th>Invoice Number</th>
					<th>Customer</th>
					<th>Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			
			@foreach($receipts as $receipt)
				<tr>
					<td>{{ $receipt->id }}</td>
					<td>{{ $receipt->sales_invoice_id }}</td>
					<td>{{ $receipt->customer->name }}</td>
					<td>{{ $receipt->created_at->format('d-m-Y') }}</td>
					<td><a href="/receipts/{{$receipt->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
@endsection