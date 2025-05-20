<?php

namespace App\Livewire\Home;

use App\Lib\LivewireEvents;
use App\Lib\Managers\WidgetManager;
use App\Livewire\BaseComponent;
use Livewire\Attributes\On;

class IndexPage extends BaseComponent {


	public function mount() {
	}

	public function render() {
		return view('livewire.home.index');
	}
}
