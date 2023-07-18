<div class="page-content">
    <div class="page-title ">
        <h4>
            <i class="site-icons icon-stats float-right ml-2 mt-1"></i>
            {{ auth()->user()->name }}
        </h4>

    </div>
    

    <!-- <div class="reports-content">
</div> -->


    <div class="container-fluid report-section">
        <h5><i class="site-icons icon-eye-4"></i>ملخص اﻷنشطة</h5>
        <div class="row">
            <div class="col-6 lecture-stats">
                <div class="subject-progress">
                    <span class="circular-chart chart-selector" id="lectures_seen_chart" data-percent="{{DB::table('course_user')->where('course_id' ,$course->id)->where('user_id' , auth()->user()->id)->first()->last_completed_lesson != 0 ?DB::table('course_user')->where('course_id' ,$course->id)->where('user_id' , auth()->user()->id)->first()->last_completed_lesson/$course->lessons->count()*100 : 0}}"> <span
                            class="percent">{{DB::table('course_user')->where('course_id' ,$course->id)->where('user_id' , auth()->user()->id)->first()->last_completed_lesson != 0 ?DB::table('course_user')->where('course_id' ,$course->id)->where('user_id' , auth()->user()->id)->first()->last_completed_lesson/$course->lessons->count()*100 : 0}}</span> </span>
                </div>
                <p>شاهد <strong><a href="#lectures_seen" data-turbolinks="false">{{DB::table('course_user')->where('course_id' ,$course->id)->where('user_id' , auth()->user()->id)->first()->last_completed_lesson ?? 0}} محتوى</a></strong> من
                    <strong>{{$course->lessons->count()}}</strong>
                </p>
               
            </div>

       
        </div>

       

       
        </div>
    </div>




</div>
