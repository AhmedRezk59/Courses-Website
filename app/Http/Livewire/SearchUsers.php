<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ='';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('admin.livewire.search-users', [
            'users' => User::when($this->search , function($q){
                $q->where('email' , 'like' , "{$this->search}%")
                    ->orWhere('name', 'like', "{$this->search}%");
            })->paginate(10)
        ]);
    }
}
