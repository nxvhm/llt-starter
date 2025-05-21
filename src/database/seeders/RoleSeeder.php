<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Enums\Roles;
use App\Models\Enums\Permissions;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder {
	public function run(): void {
		$roles = Roles::getFullOptions();
		foreach($roles as $roleName) {
			$this->command->line(sprintf("=== %s ===", $roleName));
			if(empty(Role::where('name', '=', $roleName)->first()))
				Role::create(['name' => $roleName]);
		}
		$this->syncPermissions();
	}

	public function syncPermissions() {
		$currentPermissions = Permission::all();
		$permissions = Permissions::getFullOptions();

		# Delete removed permissions
		$this->command->line("Delete old Permissions...");
		foreach($currentPermissions as $currentPermission) {
			if(!in_array($currentPermission->name, $permissions)) {
				$this->command->error(sprintf("Deleting %s", $currentPermission->name));
				$currentPermission->delete();
			}
		}

		foreach($permissions as $permissionName) {
			$permission = Permission::where('name', '=', $permissionName)->first();
			$exists = !empty($permission);
			$permission = $permission ?? new Permission();
			$permission->name = $permissionName;
			$permission->save();

			if(!$exists)
				$this->command->info(sprintf("Created %s permission", $permissionName));
		}
	}
}
