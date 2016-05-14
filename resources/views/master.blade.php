<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bitulink Dealings</title>
		<link rel="stylesheet" href="/bootstrap-darkly.min.css">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nb">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
      				</button>
					<a class="navbar-brand" href="/">Bitulink Dealings</a>
				</div>
				<div class="collapse navbar-collapse" id="nb">
					<ul class="nav navbar-nav">
						<li><a href="/suppliers">Suppliers</a></li>
						<li><a href="/customers">Customers</a></li>
						<li><a href="/pi">Performa Invoices</a></li>
						<li><a href="/po">Purchase Orders</a></li>
						<li><a href="/sales_invoices">Sales Inovices</a></li>
						<li><a href="#">Stock</a></li>
						<li><a href="/users">Users</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::check())
						<li><a href="/logout">Logout ({{ Auth::user()->username }})</a></li>
						@else
						<li><a href="/login">Login</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>