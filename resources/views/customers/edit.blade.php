@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Edit Supplier Details</h1>
		<form action="/customers/{{ $customer->id }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name: </label>
				<input name="name" type="text" class="form-control"
							 value="{{$customer->name}}">
			</div>
			<div class="form-group">
				<label for="address">Address: </label>
				<textarea name="address" type="text" class="form-control"
							 value="{{$customer->address}}"></textarea>
			</div>
			<div class="form-group">
				<label for="telephone">Telephone: </label>
				<input name="telephone" type="text" class="form-control"
							 value="{{$customer->telephone}}">
			</div>
			<div class="form-group">
				<label for="email">Email: </label>
				<input name="email" type="text" class="form-control"
							 value="{{ $customer->email}}">
			</div>
			<button type="submit" class="btn btn-primary">Change Details</button>
		</form>
</div>
@endsection