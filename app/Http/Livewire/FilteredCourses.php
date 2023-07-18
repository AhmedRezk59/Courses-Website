<?php

namespace App\Http\Livewire;

use App\Enums\CourseStatus;
use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class FilteredCourses extends Component
{
    use WithPagination;
    public $categories = [];
    public $price;
    public $name;
    public $status = 'all';
    protected $listeners = [
        'categories' => 'setCategories',
        'price' => 'setPrice',
        'name' => 'setName'
    ];

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function changeStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('user.livewire.filtered-courses', [
            'courses' => Course::query()
                ->where('status', CourseStatus::ACCEPTED->value)
                ->when(count($this->categories) > 0 && !in_array('all', $this->categories), function ($q) {
                    $q->whereIn('department_id', $this->categories);
                })
                ->when(isset($this->price) && $this->price !== 'all', function ($q) {
                    $q->where('is_paid', $this->price);
                })
                ->when($this->name, function ($q) {
                    $q->where('name','like' , "%{$this->name}%");
                })
                ->when($this->status !== 'all', function ($q) {
                    $now = Carbon::now();
                    if ($this->status === 'current') {
                        $q->where('start_date', '<=', $now)
                            ->where('end_date', '>=', $now);
                    }
                    if ($this->status === 'ended') {
                        $q->where('end_date', '<', $now);
                    }
                    if ($this->status == 'upcoming') {
                        $q->where('start_date', '>', $now);
                    }
                })
                ->with(['department', 'instructor:name,id'])
                ->simplePaginate(15)
        ]);
    }
}
