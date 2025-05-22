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
	}
}
