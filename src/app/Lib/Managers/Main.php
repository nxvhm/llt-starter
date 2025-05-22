<?php

namespace App\Lib\Managers;

class Main {

	private UserManager $userManager;

	public function __construct() {
		$this->userManager = new UserManager();
	}

	public function getUserManager(): UserManager {
		return $this->userManager;
	}
}
