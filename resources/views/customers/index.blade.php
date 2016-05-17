@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Customers List</h1>
		<a class="btn btn-default pull-right" href="/customers/new">New</a><br><br><br>
		<input type="text" id="searchbox" class="form-control" placeholder="Search"><br><br><br>
		<ul class="list-group">
		@foreach($customers as $customer)
			<li class="list-group-item">
				<span class="customer-name">{{ $customer->name }}</span>
				<a class="pull-right" href="/customers/{{$customer->id}}">Details</a>
			</li>
		@endforeach
		</ul>
</div>
<script>
$(document).ready(function(){
	$('#searchbox').keyup(function() {
		var filter = $(this).val();

		$('.customer-name').each(function() {
			if ($(this).text().search(new RegExp(filter, 'i')) < 0) {
				$(this).parent().fadeOut();
			} else {
				$(this).parent().fadeIn();
			}
		});
	});
});
</script>
@endsection