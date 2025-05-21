<?php

namespace App\Models\Enums;
use App\Lib\Traits\EnumTrait;
use App\Models\User;

enum Roles: string {
	use EnumTrait;

	case ADMIN = 'admin';
	case USER = 'user';
}
