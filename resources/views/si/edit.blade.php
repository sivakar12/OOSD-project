@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit SI Details</h1>
		@include('errors')
		<form action="/si/{{ $si->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="price">Price: </label>
				<input name="price" type="text" class="form-control"
							 value="{{$si->price}}">
			</div>
			<div class="form-group">
				<label for="deposit">Deposit: </label>
				<input name="deposit" type="text" class="form-control"
							 value="{{$si->deposit}}">
			</div>
			<div class="form-group">
				<label for="purchase_method">Purchase Method: </label>
				<select name="purchase_method" class="form-control">
					<option value="Lease">Lease</option>
					<option value="Cash">Cash</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Edit Details</button>
		</form>
</div>
@endsection