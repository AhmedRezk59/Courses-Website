<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCurrencies extends Component
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
        return view('admin.livewire.search-currencies' , [
            'currencies'=> Currency::select('id' , 'rate','code','name')
            ->when($this->search , function($q) {
               $q->where('name' , 'like' , "%{$this->search}%")->orWhere('code' , 'like' , "%{$this->search}%");
            })
            ->paginate(10)
        ]);
    }
}
