<?php

namespace App\Lib\Managers;

use App\Livewire\Components\Forms\UserModifyForm;
use Illuminate\Database\Eloquent\{Builder, Collection};
use Illuminate\Support\Facades\{Gate, DB, Cache, Storage, Hash, Log};
use App\Models\User;
use App\Models\Enums\Roles;
use App\Models\Enums\Status;
use App\Models\Permission;
use App\Models\Enums\Permissions;

class UserManager {
	private ?User $user = null;

	public function __construct(User|null $user = null) {
		$this->user = user() ?? (app()->runningInConsole() ? null : user());
	}

	public function setUser(null|User $user): self {
		$this->user = $user;
		return $this;
	}

	public function getUser(): ?User {
		return $this->user;
	}

	public function getUsers(
		bool $asQuery = false,
		array $with = [],
		array $withPermissions = [],
		array $params = []
	): Collection | Builder {
		if(!Gate::allows('users-view'))
			abort(403, 'You are not allowed to perform this action');

		if(empty($this->user))
			return Collect([]);

		if(!$this->user->hasRole(Roles::ADMIN->value) && !$this->user->hasPermissionTo(Permissions::USERS_VIEW))
			abort(403);

		$usersQ = User::query();

		if(!empty($with))
			$usersQ->with($with);

		if(!empty($withPermissions))
			$usersQ->permission(Permission::whereIn('name', $withPermissions)->get());

		if($this->user->hasRole(Roles::ADMIN->value))
			return $asQuery ? $usersQ : $usersQ->get();

		return $asQuery ? $usersQ : $usersQ->get();
	}

	public function saveUser(UserModifyForm $form): User {
		if(!empty($form->id))
			$user = User::find($form->id);

		$user = $user ?? new User;
		$user->name = $form->name;
		$user->email = $form->email;
		$user->password = Hash::make($form->password);
		$user->status = $form->status;
		$user->save();
		$user->assignRole(Roles::USER);

		return $user;
	}
}
