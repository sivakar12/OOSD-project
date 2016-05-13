@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Customers List</h1>
		<a class="btn btn-default pull-right" href="/customers/new">New</a>
		<br><br>
		<ul class="list-group">
		@foreach($customers as $customer)
			<li class="list-group-item">
				{{ $customer->name }}
				<a class="pull-right" href="/customers/{{$customer->id}}">Details</a>
			</li>
		@endforeach
		</ul>
</div>
@endsection