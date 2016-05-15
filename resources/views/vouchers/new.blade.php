@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Add New Voucher</h1>
		@include('errors')
		<form action="/vouchers/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="vendor">Vendor: </label>
				<input name="vendor" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Description: </label>
				<textarea name="description" type="text" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="amount">Amount: </label>
				<input name="amount" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label for="payment_type">Payment Type: </label>
				<select name="payment_type" class="form-control">
					<option value="Cash">Cash</option>
					<option value="Cheque">Cheque</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Add Voucher</button>
		</form>
</div>
@endsection