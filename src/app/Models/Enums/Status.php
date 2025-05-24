<?php

namespace App\Models\Enums;
use App\Lib\Traits\EnumTrait;

enum Status: string {
	use EnumTrait;

	case ACTIVE = 'Active';
	case INACTIVE = 'Inactive';
	case PENDING = 'Pending';
	case DISABLED = 'Disabled';
	case CLOSED = 'Closed';

	public static function active(): array {
		return [
			self::ACTIVE->value => self::ACTIVE->value,
			self::INACTIVE->value => self::INACTIVE->value,
		];
	}

	public static function userStatuses(): array {
		return [
			self::ACTIVE->value => self::ACTIVE->value,
			self::INACTIVE->value => self::INACTIVE->value,
			self::PENDING->value => self::PENDING->value,
			self::DISABLED->value => self::DISABLED->value,
		];
	}

}
