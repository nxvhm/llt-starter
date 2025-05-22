<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@livewireStyles
</head>
<body>
	@livewireScripts
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<div class="page page-center">
		<div class="container container-normal py-4">
			{{$slot}}
		</div>
	</div>

	@stack('scripts')
</body>
</html>
