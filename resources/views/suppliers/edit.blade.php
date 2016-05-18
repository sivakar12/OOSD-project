@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit Supplier Details</h1>
		@include('errors')
		<form action="/suppliers/{{ $supplier->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name: </label>
				<input name="name" type="text" class="form-control"
							 value="{{$supplier->name}}">
			</div>
			<div class="form-group">
				<label for="address">Address: </label>
				<textarea name="address" type="text" class="form-control">{{$supplier->address}}</textarea>
			</div>
			<div class="form-group">
				<label for="telephone">Telephone: </label>
				<input name="telephone" type="text" class="form-control"
							 value="{{$supplier->telephone}}">
			</div>
			<div class="form-group">
				<label for="email">Email: </label>
				<input name="email" type="text" class="form-control"
							 value="{{ $supplier->email}}">
			</div>
			<div class="form-group">
				<label for="website">Website: </label>
				<input name="website" type="text" class="form-control"
							 value="{{$supplier->website}}">
			</div>
			<button type="submit" class="btn btn-primary">Change Details</button>
		</form>
</div>
@endsection