<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\Managers\Main;
use App\Lib\Authorization\Gates;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 */
	public function register(): void {
		$this->app->singleton(Main::class, function() {
			return new Main();
		});
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		Gates::register();
	}
}
