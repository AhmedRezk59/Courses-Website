<?php

namespace App\Http\Livewire;

use App\Enums\CourseStatus;
use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class MyCourses extends Component
{
    use WithPagination;
    public $status = 'current';

    public function changeStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('user.livewire.my-courses', [
            'courses' => auth()->user()->courses()
                ->when($this->status !== 'all', function ($q) {
                    $now = Carbon::now();
                    if ($this->status === 'current') {
                        $q->where('start_date', '<=', $now)
                            ->where('end_date', '>=', $now);
                    }
                    if ($this->status === 'archive') {
                        $q->where('end_date', '<', $now);
                    }
                    if ($this->status == 'upcoming') {
                        $q->where('start_date', '>', $now);
                    }
                    if($this->status == 'ended'){
                        $q->where('is_complated' , true);
                    }
                })
                ->with(['department', 'instructor:name,id'])
                ->simplePaginate(15)
        ]);
    }
}
