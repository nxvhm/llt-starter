<?php

namespace App\Livewire\Components\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserModifyForm extends Form {

	public ?int $id = null;

	public function rules() {
		return [
			'email' => ['required', 'email', Rule::unique('users')->ignore($this->id)],
			'name' => 'required|min:5',
			'password' => ['nullable', 'required_without:id', 'min:5', 'confirmed:confirm_password'],
			'confirm_password' => 'required_with:password|min:5',
			'status' => 'required|string'
		];
	}

	public function messages() {
		return [
			'password.required_without' => trans('validation.required_without', ['attribute' => trans('validation.attributes.password'), 'values' => trans('user')])
		];
	}

	public $email = '';
	public $name = '';
	public $password = '';
	public $confirm_password = '';
	public $status;

	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}
