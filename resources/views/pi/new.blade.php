@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Choose Supplier</h1>
		<form action="/pi/" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="supplier_id">Supplier: </label>
				<select name="supplier_id" class="form-control">
					@foreach($suppliers as $supplier)
					<option value="{{$supplier->id}}">{{$supplier->name}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Choose</button>
		</form>
</div>
@endsection