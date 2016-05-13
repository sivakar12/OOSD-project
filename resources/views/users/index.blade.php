@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>All Users</h1>
		<a class="btn btn-default pull-right" href="/users/new">New</a>
		<br><br>
		<ul class="list-group">
		@foreach($users as $user)
			<li class="list-group-item">
				{{ $user->username }}
				<a class="pull-right" href="/users/{{$user->id}}">Details</a>
			</li>
		@endforeach
		</ul>
</div>
@endsection