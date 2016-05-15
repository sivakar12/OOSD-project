@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit Voucher Details</h1>
		<form action="/vouchers/{{ $voucher->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="vendor">Vendor: </label>
				<input name="vendor" type="text" class="form-control" value="{{$voucher->vendor}}">
			</div>
			<div class="form-group">
				<label for="description">Description: </label>
				<textarea name="description" type="text" class="form-control" value="{{$voucher->description}}"></textarea>
			</div>
			<div class="form-group">
				<label for="amount">Amount: </label>
				<input name="amount" type="text" class="form-control" value="{{$voucher->amount}}">
			</div>
			<div class="form-group">
				<label for="payment_type">Payment Type: </label>
				<select name="payment_type" class="form-control" value="{{$voucher->payment_type}}">
					<option value="Cash">Cash</option>
					<option value="Cheque">Cheque</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Change Details</button>
		</form>
</div>
@endsection