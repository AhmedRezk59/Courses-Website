<?php

namespace App\Http\Livewire;

use App\Enums\CourseStatus;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
                        $finished_courses_id = DB::table('course_user')->where('user_id' , auth()->user()->id)->where('is_completed' , true)->pluck('course_id');
                        $q->whereIn('courses.id' , $finished_courses_id);
                    }
                })
                ->with(['department', 'instructor:name,id'])
                ->simplePaginate(15)
        ]);
    }
}
