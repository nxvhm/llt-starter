<div class="container">
@section('pageHeaderButtonsList')
	@can('users-create')
	<a href="{{route('users.create')}}" class="btn btn-primary btn-5 d-none d-sm-inline-block" wire:navigate>
		<i class="icon ti ti-users-plus"></i>
		Create New User
	</a>
	@endcan
@endsection

<livewire:components.page-header title="Users" subtitle="Index Page" />
<div class="row mt-3">
	<div class="col-md-12 col-xl-4">
		<div class="input-icon">
			<input type="text" class="form-control" wire:model="filter" placeholder="Search...">
			<span class="input-icon-addon">
				<i class="icon ti ti-search"></i>
			</span>
		</div>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
	<div class="card">
		<div class="table-responsive-sm">
		<table class="table table-vcenter card-table">
			<thead>
				<tr>
					<th>#ID</th>
					<td>Name</td>
					<td>Email</td>
					<td>Status</td>
					<td>Role</td>
					<td>Created At</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->status}}</td>
						<td>
							{!! implode(',', array_map(fn($role) => '<span class="badge bg-blue text-blue-fg">'.$role.'</span>' ,$user->roles->pluck('name')->toArray())) !!}
						</td>
						<td>{{date('d M Y H:i:s', strtotime($user->created_at))}}</td>
						<td>
							<div class="dropdown">
								<a href="#" class="btn dropdown-toggle" data-boundary="window" data-bs-toggle="dropdown">Open
									dropdown</a>
								<div class="dropdown-menu">
									<span class="dropdown-header">Dropdown header</span>
									<a class="dropdown-item" href="#">
										<i class="icon dropdown-item-icon ti ti-edit"></i>
										Edit
									</a>
									<a class="dropdown-item" href="#">
										<i class="icon dropdown-item-icon ti ti-pencil"></i>
										Another Edit
									</a>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
	</div>
</div>
</div>
