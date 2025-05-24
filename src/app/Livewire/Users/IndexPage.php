<?php

namespace App\Livewire\Users;

use Throwable;
use Illuminate\Support\Facades\{Gate, Log};
use Symfony\Component\HttpKernel\Exception\HttpException;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Lib\LivewireEvents;
use App\Livewire\BaseComponent;
use App\Models\Enums\Roles;
use App\Models\User;

#[On(LivewireEvents::USERS_LIST_REFRESH)]
class IndexPage extends BaseComponent {
	use WithPagination;

	public $filter;
	public $limit = 20;

	public function mount() {
		if(!Gate::allows('users-view'))
			abort(403);
	}

	#[Title('Users Index')]
	public function render() {
		return view('livewire.users.index', [
			'users' => $this->getUsersQuery()
		]);
	}

	public function getUsersQuery() {
		$q = userManager()->getUsers(asQuery: true);
		if(!empty($this->filter)) {
			$q->where(function($searchQuery) {
				$searchQuery->where('name', 'ILIKE', '%'.$this->filter.'%')
					->orWhere('email', 'ILIKE', '%'.$this->filter.'%');
			});
		}

		$q->orderBy('id', 'desc');
		return $q->paginate($this->limit);
	}

	#[On(LivewireEvents::USER_DELETE)]
	public function delete($id) {
		try {
			if(!Gate::allows('users-delete') || user()->id == $id)
				abort(403);

			$user = User::find($id);
			if(empty($user))
				abort(404);

			if($user->hasRole(Roles::ADMIN))
				abort(403, trans('delete_admin_error'));

			$user->delete();
			$this->dispatchSaveSuccess();
			$this->dispatch(LivewireEvents::USERS_LIST_REFRESH);

		} catch (HttpException $he) {
			$msg = $he->getMessage() ?? trans('error');
			$this->httpError($he->getStatusCode(), $msg);
		} catch (Throwable $e) {
			Log::error($e);
			$this->dispatchError(title: trans('error'), msg: trans('try_later'));
		}
	}
}
