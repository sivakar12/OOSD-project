@extends('master')

@section('content')
<div class="col-md-offset-3 col-md-6">
		<h2>Purchase Orders List</h2>
		<a class="btn btn-default pull-right" href="/po/new">New</a>
		<br><br>
		<input type="text" id="searchbox" class="form-control" placeholder="Find by ID"><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Order Number</th>
					<th>Invoice Number</th>
					<th>Date</th>
					<th>Supplier</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			@foreach($pos as $po)
				<tr>
					<td class="po-id">{{ $po->id }}</td>
					<td>{{ $po->performa_invoice->id}}</td>
					<td>{{ $po->created_at->format('d-m-Y')}}</td>
					<td>{{ $po->supplier->name }}</td>
					<td><a href="/po/{{$po->id}}">View</a></td>
					<td><a href="/po/edit/{{$po->id}}">Edit</a></td>
				</tr>
			@endforeach
		</table>
</div>
<script>
$(document).ready(function(){
	$('#searchbox').keyup(function() {
		var filter = $(this).val();

		$('.po-id').each(function() {
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