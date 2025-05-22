<?php

namespace App\Livewire\Main;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Header extends Component {

	public Model $user;

	public function mount() {
		$this->user = user();
	}

	public function render() {
		return view('livewire.main.header');
	}

	public function logout() {
		if(Auth::check())
			Auth::logout();

		return redirect()->route('login');
	}
}
