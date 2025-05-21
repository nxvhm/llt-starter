<?php

namespace App\Lib\Traits;

trait EnumTrait {
	public static function getFullOptions(): array {
		$options = [];
		foreach(self::cases() as $case)
			$options[$case->value] = $case->value;

		return $options;
	}
}
