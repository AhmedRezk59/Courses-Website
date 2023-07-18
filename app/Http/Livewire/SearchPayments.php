<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPayments extends Component
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
        return view(
            'admin.livewire.search-payments',
            [
                'payments' => Payment::query()
                    ->when($this->search, function ($q) {
                        $users = User::where('email', 'like', "%{$this->search}%")->pluck('id');
                        $q->where('order_id', 'like', "%{$this->search}%")
                            ->orWhereIn('user_id' , $users);
                    })
                    ->where('is_successful', true)
                    ->with(['course:id,name', 'user:id,email'])
                    ->paginate(15)
            ]
        );
    }
}
