<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('admin.livewire.search-users', [
            'users' => User::when($this->search, function ($q) {
                $q->where('email', 'like', "{$this->search}%")
                    ->orWhere('first_name', 'like', "{$this->search}%")
                    ->orWhere('last_name', 'like', "{$this->search}%");
            })
                ->with('currency')
                ->paginate(10)
        ]);
    }
}
