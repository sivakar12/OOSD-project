@extends('master')

@section('content')
<div class="col-md-offset-2 col-md-8">
		<h1>Inventory</h1>
		<a class="btn btn-default pull-right" href="/inventory/new">Add Vehicle</a>
		<br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Chassis Number</th>
					<th>Model</th>
					<th>Sales Price</th>
				</tr>
			</thead>
			<tbody>
			@foreach($items as $item)
				<tr>
					<td>{{ $item->chassis_number }}</td>
					<td>{{ $item->manufacturer}} {{ $item->model }}</td>
					<td>{{ $item->sales_price }}</td>
					<td><a href="/inventory/{{$item->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>
@endsection