<?php

namespace App\Livewire\Users;

use Throwable;
use Illuminate\Support\Facades\{Gate, Log};
use Symfony\Component\HttpKernel\Exception\HttpException;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use App\Lib\LivewireEvents;
use App\Livewire\BaseComponent;
use App\Models\Enums\Roles;
use App\Models\Permission;
use App\Models\User;

#[On(LivewireEvents::USERS_LIST_REFRESH)]
class PermissionsPage extends BaseComponent {

	public User $user;
	public $permissions;

	public function mount($id) {
		if(!Gate::allows('users-permissions-modify'))
			abort(403);

		$user = User::find($id);
		if(empty($user))
			abort(404);

		if($user->hasRole(Roles::ADMIN))
			abort(403, trans('admin_permissions_error'));

		$this->user = $user;
		$this->permissions = Permission::all();
	}

	#[Title('User Permissions')]
	public function render() {
		return view('livewire.users.permissions');
	}
}
