<?php

namespace App\Livewire\Users;

use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Gate;

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
}
