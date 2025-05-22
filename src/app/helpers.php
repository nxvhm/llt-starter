<?php

declare(strict_types=1);

if(!function_exists('user')) {
	function user(): ?\App\Models\User {
 		return Illuminate\Support\Facades\Auth::user();
	}
}

if(!function_exists('main')) {
	function main(): \App\Lib\Managers\Main {
		return app()->make(\App\Lib\Managers\Main::class);
	}
}
if(!function_exists('userManager')) {
	function userManager(): \App\Lib\Managers\UserManager {
		return app()->make(\App\Lib\Managers\Main::class)->getUserManager();
	}
}

if(!function_exists('prev_page')) {
	function prev_page(string $default = '/'): string {
		return request()->header('Referer') ?? $default;
	}
}

if(!function_exists('getRawSql')) {
	function getRawSql($q) {
    $addSlashes = str_replace('?', "'?'", $q->toSql());
    return vsprintf(str_replace('?', '%s', $addSlashes), $q->getBindings());
	}
}

if(!function_exists('currentRouteName')) {
	function currentRouteName(): string {
		return Illuminate\Support\Facades\Route::currentRouteName();
	}
}
