<?php

namespace App\Http\Livewire;

use App\Enums\CourseStatus;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCourses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $status;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view(
            'instructor.livewire.search-courses',
            [
                'courses' => Course::query()
                    ->select(['id', 'department_id', 'name', 'status', 'is_paid', 'price', 'discount_price', 'end_discount_date', 'start_date', 'end_date'])
                    ->when($this->status, function ($q) {
                        $q->where('status', $this->status);
                    })
                    ->when($this->search, function ($q) {
                        $q->where('name', 'like', "{$this->search}%");
                    })
                    ->withCount([
                        'payments' => function($q){
                            $q->where('is_successful' , true);                        }
                    ])
                    ->where('instructor_id', auth()->guard('instructor')->user()->id)
                    ->with('department')
                    ->orderBy('id', 'desc')
                    ->paginate(10),
            ]
        );
    }
}
