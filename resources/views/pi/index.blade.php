@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h2>Performa Invoices List</h2>
		<a class="btn btn-default pull-right" href="/pi/new">New</a>
		<br><br>
		<input type="text" id="searchbox" class="form-control" placeholder="Find by ID"><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Supplier</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($pis as $pi)
				<tr>
					<td class="pi-id">{{ $pi->id }}</td>
					<td>{{ $pi->created_at->format('d-m-Y')}}</td>
					<td>{{ $pi->supplier->name }}</td>
					<td><a href="/pi/{{$pi->id}}">View</a></td>
					<td><a href="/pi/edit/{{$pi->id}}">Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
<script>
$(document).ready(function(){
	$('#searchbox').keyup(function() {
		var filter = $(this).val();

		$('.pi-id').each(function() {
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