<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission {
	public function getLabel() {
		return strtoupper(str_replace('-', ' ', $this->name));
	}
}
