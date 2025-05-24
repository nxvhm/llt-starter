@php
use App\Lib\LivewireEvents;
use Illuminate\Support\Str;
@endphp
<div class="container" x-data="permissionsPage">
	@section('pageHeaderButtonsList')
		<a href="{{route('users.index')}}" class="btn btn-1">
			<i class="icon ti ti-arrow-left"></i>
			{{__('actions.back')}}
		</a>
		@can('users-profile-modify')
		<a href="{{route('users.create')}}" class="btn btn-primary btn-5 d-none d-sm-inline-block" wire:navigate>
			<i class="icon ti ti-pencil"></i>
			{{__('actions.named.update', ['name' => __('Profile')])}}
		</a>
		@endcan
	@endsection
	<livewire:components.page-header title="{{$user->name}}" subtitle="Permissions Page" />

	<div class="row mt-3">
		<div class="col-12 col-md-6">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">{{trans_choice('permission', 2)}}</h3>
			</div>
			<div class="card-body">
				@foreach($permissions as $permission)
					<label for="" class="form-check">
						<input
							class="form-check-input"
							type="checkbox"
							@checked($user->hasPermissionTo($permission->name))
							id="{{$permission->name}}"
							x-on:click='handlePermissionToggle("{{$permission->name}}")'
						>
						<span class="form-check-label fw-bold">{{Str::of($permission->name)->replace('-', ' ')->upper()}}</span>
					</label>
				@endforeach
			</div>
		</div>
		</div>
	</div>
</div>
@script
<script>
Alpine.data('permissionsPage', () => ({
	handlePermissionToggle(permissionName){
	const permissionCheckboxElement = document.getElementById(permissionName);
	console.log(permissionName, permissionCheckboxElement);
	if(!permissionCheckboxElement)
		return false;

		{{-- Livewire.dispatch('update-user-permission', {
			name: permissionName,
			check: permissionCheckboxElement.checked
		}); --}}
},
}));
</script>
@endscript
