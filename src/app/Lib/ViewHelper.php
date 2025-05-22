<?php

namespace App\Lib;

class ViewHelper {

	public static function getNavigation(): array {
		$nav = [
			[
				'icon' => 'ti ti-brand-tabler',
				'label' => 'Dashboard'
			], [
				'icon' => 'ti ti-users',
				'label' => 'Users'
			],
		];

		return $nav;
	}

}
