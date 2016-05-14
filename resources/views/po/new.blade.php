@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Choose Performa Invoice</h1>
		<form action="/po/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="performa_invoice_id">Supplier: </label>
				<select name="performa_invoice_id" class="form-control">
					@foreach($invoices as $invoice)
					<option value="{{$invoice->id}}">PI #{{$invoice->id}} ({{$invoice->supplier->name}})</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Choose</button>
		</form>
</div>
@endsection