<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@livewireStyles
</head>
<body>
	<div class="page">
		{{--  BEGIN SIDEBAR  --}}
		<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
			<livewire:main.sidebar />
		</aside>
		{{-- END SIDEBAR --}}

		<div class="page-wrapper">
			{{-- BEGIN PAGE HEADER --}}
			<livewire:main.header />
			{{-- END PAGE HEADER --}}

			{{-- BEGIN PAGE BODY --}}
			<div class="page-body">
				{{ $slot }}
			</div>
			{{-- END PAGE BODY --}}
		</div>
	</div>
	@livewireScripts
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	@stack('scripts')
</body>
</html>
