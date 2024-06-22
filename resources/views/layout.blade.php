<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
	<script src="{{ mix('js/app.js') }}" defer></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
	<div id="app" class="d-flex flex-column h-screen justify-content-between">
		<header>
			@include('nave')
		</header>
		<main>
		@yield('content')
		</main>
	

		<footer class="bg-white text-center text-black-50 py-3 shadow">
			{{ config('app.name')}} | Copyright @ {{ date('Y') }}
		</footer>
	</div>
	
	

</body>
</html>