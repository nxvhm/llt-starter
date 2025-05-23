<?php

namespace App\Livewire\Components\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\User;

class UserModifyForm extends Form {
	#[Validate('required|email')]
	public $email = '';

	#[Validate('required|min:5')]
	public $name = '';

	#[Validate('required|min:5|confirmed:confirm_password')]
	public $password = '';

	#[Validate('required|min:5')]
	public $confirm_password = '';

	public function store() {
		dd($this->all());
	}
}
