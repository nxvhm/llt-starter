<div class="container">
@include('livewire.main.loader')
<livewire:components.page-header title="Users" subtitle="Create New User" />
<div class="row mt-3">
	<div class="col-12 col-lg-8">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Example Form with Icons</h3>
			</div>
			<div class="card-body">
				<form class="space-y" wire:submit="save">
					<div>
						<div class="input-icon">
							<span class="input-icon-addon">
								<i class="icon ti ti-user"></i>
							</span>
							<input type="text" class="form-control" placeholder="Username" wire:model="form.name" autocomplete="off">
						</div>
						@error('form.name')<div class="form-text text-danger">{{ $message }}</div>@enderror
					</div>
					<div>
						<div class="input-icon">
							<span class="input-icon-addon">
								<i class="icon ti ti-mail"></i>
							</span>
							<input type="mail" class="form-control" placeholder="Email address" wire:model="form.email">
						</div>
						@error('form.email')<div class="form-text text-danger">{{ $message }}</div>@enderror
					</div>
					<div>
						<div class="input-icon">
							<span class="input-icon-addon">
								<i class="icon ti ti-lock"></i>
							</span>
							<input type="password" class="form-control" placeholder="Password" wire:model="form.password" autocomplete="off">
						</div>
						@error('form.password')<div class="form-text text-danger">{{ $message }}</div>@enderror
					</div>
					<div>
						<div class="input-icon">
							<span class="input-icon-addon">
								<i class="icon ti ti-lock"></i>
							</span>
							<input type="password" value="" class="form-control" placeholder="Confirm Password" wire:model="form.confirm_password">
						</div>
						@error('form.confirm_password')<div class="form-text text-danger">{{ $message }}</div>@enderror
					</div>
					<div>
						<select name="status" id="status" class="form-control" wire:model="form.status">
							<option value=""></option>
							@foreach($statuses as $status)
								<option value="{{$status}}">{{$status}}</option>
							@endforeach
						</select>
						@error('form.status')<div class="form-text text-danger">{{ $message }}</div>@enderror
					</div>
					<div>
						<div class="row align-items-center">
							<div class="col">
								<button type="submit" class="btn btn-primary btn-3">
									<i class="ti icon icon-left ti-device-floppy icon-2"></i>
									Save Changes
								</button>
							</div>
							<div class="col-auto">
									<a href="{{route('users.index')}}" class="btn btn-secondary btn-3" wire:navigate>
										<i class="ti icon icon-left ti-arrow-left icon-2"></i>
										Cancel
									</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
