<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}"
</head>
<body>
	@include('inc.navbar')
	<div class="container" style="margin-top: 20px">
		@yield('content')
	</div>
</body>
</html>