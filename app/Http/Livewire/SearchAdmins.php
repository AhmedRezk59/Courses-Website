<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAdmins extends Component
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
        return view('admin.livewire.search-admins', [
            'admins' => Admin::when($this->search, function ($q) {
                $q->where('email', 'like', "{$this->search}%")
                    ->orWhere('name', 'like', "{$this->search}%");
            })->paginate(10)
        ]);
    }
}
