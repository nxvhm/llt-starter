<?php

namespace App\Livewire\Components;

use App\Livewire\BaseComponent;

class PageHeader extends BaseComponent {

	public ?string $title;
	public ?string $subtitle;
	public ?array $primaryButton;

	public function mount(?string $title, ?string $subtitle, ?array $primaryButton = []) {
		$this->title = $title;
		$this->subtitle = $subtitle;
		$this->primaryButton = $primaryButton;
	}

	public function render() {
		return view('livewire.components.pageHeader');
	}

}
