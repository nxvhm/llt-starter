<?php

namespace App\Livewire;

use App\Models\LayoutPreference;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class BaseComponent extends Component {
	public $layout;
	public array $afterSaveEventDispatch = [];

	public function unauthorizedError() {
		$this->dispatch('unauthorized',
			title: trans('warning'),
			text: trans('unauthorized_msg')
		);
	}

	public function httpError($code, ?string $msg = null) {
		$this->dispatch('warning',
			title: trans('warning'),
			text: !empty($msg) ? $msg : trans('http-statuses.'.$code)
		);
	}

	public function dispatchError(?string $title = null, ?string $msg = null) {
		$this->dispatch('error',
			title: $title ? $title : trans('error'),
			text: !empty($msg) ? $msg : trans('try_later')
		);
	}

	public function dispatchSaveSuccess(?string $title = null, ?string $msg = null): void {
		$this->dispatch('success',
			title: $title ? $title : trans('save_successfull'),
			text: !empty($msg) ? $msg : null
		);

		foreach(array_filter(array_unique($this->afterSaveEventDispatch)) as $event) {
			$this->dispatch($event);
		}
	}

	public function initAfterSaveEvents(array|null $afterSave): void {
		if(empty($afterSave))
			return;

		if(!empty($afterSave['dispatch-resource-to'])) {
			if(method_exists($this, 'dispatchResource') && method_exists($this, 'setResourceDispatchEvent'))
				$this->setResourceDispatchEvent($afterSave['dispatch-resource-to']);

			unset($afterSave['dispatch-resource-to']);
		}

		$this->afterSaveEventDispatch = array_merge($this->afterSaveEventDispatch, $afterSave);
	}

	public function hasAfterSaveEvents(): bool {
		return !empty($this->afterSaveEventDispatch);
	}


}
