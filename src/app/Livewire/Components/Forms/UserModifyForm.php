<?php

namespace App\Livewire\Components\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use App\Models\User;

class UserModifyForm extends Form {

	public ?int $id = null;

	#[Validate('required|email|unique:users')]
	public $email = '';

	#[Validate('required|min:5')]
	public $name = '';

	#[Validate('required|min:5|confirmed:confirm_password')]
	public $password = '';

	#[Validate('required|min:5')]
	public $confirm_password = '';

	#[Validate('required|string')]
	public $status;

	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}
