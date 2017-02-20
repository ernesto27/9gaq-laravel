	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.css">
		<link rel="stylesheet" type="text/css" href="/css/app.css">
	</head>
	<body>

		@include('nav')

		<hr>
		<div class="container" style="">	
			@yield('content')

		</div>


		<script src="/js/app.js"></script>
		<script src="/js/main.js"></script>
	</body>
	</html>