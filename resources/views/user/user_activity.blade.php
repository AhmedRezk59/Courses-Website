<div class="page-content">
    <div class="page-title ">
        <h4>
            <i class="site-icons icon-stats float-right ml-2 mt-1"></i>
            {{ auth()->user()->name }}
        </h4>

    </div>
    

    <!-- <div class="reports-content">
</div> -->

@php
    $lessons = $course->lessons()->get();
   $completed_lessons = DB::table('lesson_user')->select('lesson_id')->where('user_id' , auth()->user()->id)->whereIn('lesson_id' , $lessons->pluck('id'))->get(); 
@endphp
    <div class="container-fluid report-section">
        <h5><i class="site-icons icon-eye-4"></i>ملخص اﻷنشطة</h5>
        <div class="row">
            <div class="col-6 lecture-stats">
                <div class="subject-progress">
                    <span class="circular-chart chart-selector" id="lectures_seen_chart" data-percent="{{round($completed_lessons->count() / $lessons->count() * 100) ?? 0}}"> <span
                            class="percent">{{round($completed_lessons->count() / $lessons->count() * 100) ?? 0}}</span> </span>
                </div>
                <p>شاهدت <strong class="text-primary">{{$completed_lessons->count() ?? 0}} محتوى</strong> من
                    <strong class="text-primary">{{$lessons->count()}}</strong>
                </p>
               
            </div>

       
        </div>

       

       
        </div>
    </div>




</div>
