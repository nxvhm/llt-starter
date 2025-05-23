<?php

namespace App\Livewire\Users;

use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\{Gate, Log};
use App\Livewire\BaseComponent;
use App\Models\Enums\Status;
use App\Models\User;
use App\Livewire\Components\Forms\UserModifyForm;

class ModifyPage extends BaseComponent {

	public ?User $user = null;
	public array $statuses;
	public UserModifyForm $form;

	public function mount(?int $id = null) {
		if(!$this->isAuthorized())
			abort(403);

		$this->statuses = Status::userStatuses();
	}

	public function render() {
		return view('livewire.users.modify');
	}

	public function save() {
		$this->form->validate();
		try {
			$user = userManager()->saveUser($this->form);
			$this->dispatchSaveSuccess();
			return $this->redirectRoute('users.index');
		} catch (HttpException $he) {
			$msg = $he->getMessage() ?? trans('error');
			$this->httpError($he->getStatusCode(), $msg);
		} catch (Throwable $e) {
			Log::error($e);
			$this->dispatchError(title: trans('error'), msg: trans('try_later'));
		}
	}

	public function isAuthorized(): bool {
		return Gate::allows('users-create');
	}

}
