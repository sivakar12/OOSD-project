@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit Receipt</h1>
		@include('errors')
		<form action="/receipts/{{ $receipt->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="amount">Amount: </label>
				<input name="amount" type="text" class="form-control"
							 value="{{$receipt->amount}}">
			</div>
			<div class="form-group">
				<label for="payment_type">Payment Type: </label>
				<select name="payment_type" class="form-control">
					<option value="Cash">Cash</option>
					<option value="Cheque">Cheque</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Edit Receipt</button>
		</form>
</div>
@endsection