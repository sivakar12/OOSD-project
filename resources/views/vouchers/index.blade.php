@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Vouchers List</h1>
		<a class="btn btn-default pull-right" href="/vouchers/new">New</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<th>Voucher Number</th>
				<th>Vendor</th>
				<th></th>
			</thead>
			<tbody>
			@foreach($vouchers as $voucher)
				<tr>
					<td>Voucher #{{$voucher->id}}</td>
					<td>{{$voucher->vendor}}</td>
					<td><a class="pull-right" href="/vouchers/{{$voucher->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
@endsection