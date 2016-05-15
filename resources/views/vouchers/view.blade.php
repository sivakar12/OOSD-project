@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<h1>Voucher Details</h1>

	<!-- The table showing details -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				Voucher #{{ $voucher->id }}
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr><td>Vendor</td><td>{{ $voucher->vendor}}</td></tr>
				<tr><td>Description</td><td>{{ $voucher->description}}</td></tr>
				<tr><td>Amount</td><td>{{ $voucher->amount}}</td></tr>
				<tr><td>Payment Type</td><td>{{ $voucher->payment_type}}</td></tr>
			</table>
		</div>
	</div>
	<!-- Delete and Edit buttons -->
	<div class="pull-right">
	<a href="/vouchers/{{ $voucher->id }}/edit" class="btn btn-primary">Edit Details</a>
		<form action="/vouchers/{{ $voucher->id }}" method="post" style="display: inline-block">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete Voucher</button>
		</form>
	</div>
</div>
@endsection