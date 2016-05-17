@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h1>Suppliers List</h1>
		<a class="btn btn-default pull-right" href="/suppliers/new">New</a><br><br><br>
		<input type="text" id="searchbox" class="form-control" placeholder="Search"><br>
		
		<ul class="list-group">
		@foreach($suppliers as $supplier)
			<li class="list-group-item supplier-view">
				<span class="supplier-name">{{ $supplier->name }}</span>
				<a class="pull-right" href="/suppliers/{{$supplier->id}}">Details</a>
			</li>
		@endforeach
		</ul>
</div>
<script>
$(document).ready(function(){
	$('#searchbox').keyup(function() {
		var filter = $(this).val();

		$('.supplier-name').each(function() {
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