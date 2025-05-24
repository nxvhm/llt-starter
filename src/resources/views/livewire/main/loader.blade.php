<div wire:loading.class="d-flex" class="loading-state">
	<div class="row">
		<div class="col">
			<div class="card text-center">
				<div class="card-body">
					<div class="text-primary rounded">
						<i class="icon ti ti-rotate-2 spinning text-primary align-middle"></i>
						{{!empty($message) ? $message : __('...processing_request')}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
