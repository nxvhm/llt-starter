<?php

namespace App\Livewire\Main;

use App\Lib\ViewHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Component {

	public array $navigation = [];

	public function mount() {
		$this->navigation = ViewHelper::getNavigation();
	}

	public function render() {
		return view('livewire.main.sidebar');
	}
}
