<?php

namespace App\Lib;

class ViewHelper {

	public static function getNavigation(): array {
		$nav = [
			[
				'icon' => 'ti ti-brand-tabler',
				'label' => 'Dashboard',
				'url' => route('home'),
			], [
				'icon' => 'ti ti-users',
				'label' => 'Users',
				'url' => route('users.index')
			],
		];

		return $nav;
	}

}
