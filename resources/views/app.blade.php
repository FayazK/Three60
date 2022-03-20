<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel with Inertia</title>
		<!-- Styles -->
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		@routes
		<!-- Scripts -->
		<script src="{{ mix('js/app.js') }}" defer></script>
	</head>
	<body class="antialiased bg-gray-900">
		@inertia
		@env ('local')
			<script src="https://three60.test/browser-sync/browser-sync-client.js"></script>
		@endenv
	</body>
</html>
