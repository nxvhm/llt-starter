<?php

namespace App\Livewire\Auth;

use App\Models\Enums\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Models\User;

class Login extends Component {

	#[Validate('required|email', onUpdate: false)]
	public $email;

	#[Validate('required|min:4', onUpdate: false)]
	public $password;
	public $error = false;

	public function boot() {
		// Debugbar::disable();
		// $this->turnstile = new Turnstile();
	}

	public function mount() {
		if(Auth::check())
			return $this->redirectRoute('home');
	}

	#[Layout('layouts.auth')]
	public function render() {
		return view('livewire.auth.login');
	}

	public function requestLogin() {
		$validated = $this->validate();
		try {
			$user = User::where('email', $validated['email'])->where('status', Status::ACTIVE->value)->first();
			if(!$user)
				return $this->error = trans("invalid_credentials");

			if(Auth::attempt($validated))
				return redirect()->intended('/');

			$this->error = trans("invalid_credentials");
			$this->dispatch('turnstile-reload');
		} catch (\Throwable $th) {
			Log::error($th);
			$this->error = trans("Internal Server Error");
		}

	}
}
