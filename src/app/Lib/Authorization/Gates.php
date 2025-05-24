<?php

namespace App\Lib\Authorization;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Enums\Roles;
use App\Models\Enums\Permissions;

class Gates {

	public static function register() {
		Gate::define('users-view', function(User $user) {
			if($user->hasRole([Roles::ADMIN->value]))
				return true;

			return $user->hasPermissionTo(Permissions::USERS_VIEW);
		});

		Gate::define('users-create', fn(User $user) => $user->hasRole(Roles::ADMIN->value) || $user->hasPermissionTo(Permissions::USERS_CREATE));

		Gate::define('users-delete', fn(User $user) => $user->hasRole(Roles::ADMIN->value));
	}
}
