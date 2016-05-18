@extends('master')

@section('content')
<div class="col-md-7">
		<h1>Inventory</h1>
		<a class="btn btn-default pull-right" href="/inventory/new">Add Vehicle</a>
		<br><br><br><br>
		<div class="row">
			<div class="col-md-6">
			<input type="text" id="cn-search" class="form-control" placeholder="Find by Chassis Number">
			</div>
			<div class="col-md-6">
			<input type="text" id="model-search" class="form-control" placeholder="Search for Model">
			</div>
		</div>
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
					<td class="cn">{{ $item->chassis_number }}</td>
					<td class="model">{{ $item->manufacturer}} {{ $item->model }}</td>
					<td>{{ $item->sales_price }}</td>
					<td><a href="/inventory/{{$item->id}}">Details</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
</div>

<div class="col-md-5">
	{{--<div class="container">--}}

	<canvas id="daily-reports" height="300" width="400"></canvas>
	<script src="/Chart.js"></script>
	<script>
		(function() {
			var ctx = document.getElementById('daily-reports').getContext('2d');
			var pieData = [
				{
					label: "Car",
					value: {{$car}},
					color:"#878BB6"
				},
				{
					label: "Van",
					value : {{$van}},
					color : "#4ACAB4"
				},
				{
					label: "Others",
					value : {{$other}},
					color : "#FF8153"
				}
			];
			// pie chart options
			var pieOptions = {
				segmentShowStroke : false,
				animateScale : true
			}
			// get pie chart canvas
			// draw pie chart
			new Chart(ctx).Pie(pieData, pieOptions);

		})();
	</script>
	{{--</div>--}}
</div>
<script>
$(document).ready(function(){
	$('#cn-search').keyup(function() {
		var filter = $(this).val();

		$('.cn').each(function() {
			if ($(this).text().search(new RegExp(filter, 'i')) < 0) {
				$(this).parent().fadeOut();
			} else {
				$(this).parent().fadeIn();
			}
		});
	});
	$('#model-search').keyup(function() {
		var filter = $(this).val();

		$('.model ').each(function() {
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