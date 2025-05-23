<div class="page-header d-print-none mt-0" aria-label="Page header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">{{$subtitle ?? 'Not Available'}}</div>
				<h2 class="page-title">{{$title ?? 'Not Available'}}</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					@yield('pageHeaderButtonsList')
				</div>
			</div>
		</div>
	</div>
</div>
