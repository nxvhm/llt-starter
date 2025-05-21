<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder {

	public function run(): void {
		$admin = User::query()
			->where('email', '=', 'admin@expensemanager.com')
			->first();

		$adminRole = Role::where('name', 'admin')->first();
		if(!$admin) {
			$admin = User::factory()->create([
				'name' => 'System Admin',
				'email' => 'admin@expensemanager.com',
				'password' => Hash::make('pass123'),
				'email_verified_at' => date('Y-m-d H:i:s')
			]);

			echo "Admin user created".PHP_EOL;
		}

		$admin->assignRole($adminRole);
	}
}
