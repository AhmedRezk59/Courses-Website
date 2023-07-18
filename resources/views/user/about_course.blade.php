 <div class="page-content">
     <div id='flash_messages'>

     </div>
     <div id="course_show">
         @if (\Carbon\Carbon::now()->gt($course->end_date))
             <div id="flash_errors" class="field_with_errors">
                 انتهت المادة في {{$course->end_date}}
             </div>
         @endif

         <div id='organization' class="course-show-page mobile-padding organization-dev">

             <div class="page-title lec-title position-relative">
                 <h2 class="mb-2 w-75 pl-3">{{ $course->name }}</h2>
                 <div class="top-control">




                 </div>
             </div>




             <div class="video  widescreen">

                 <video width="700" height="450" src="{{ route('user.get.trailer', $course) }}" frameborder="0"
                     allowfullscreen controls preload="metadata"></video>

             </div>

             <div class="row subject-action no-gutters">
                 <div class="col-md-8">
                     <div class=" clearfix">
                         <p class="subject-date">
                             {{ $course->date_from_to }}
                         </p>
                         <div id='social' class="addthis_toolbox addthis_default_style ">
                             <a class="addthis_button_preferred_1"></a>
                             <a class="addthis_button_preferred_2"></a>
                             <a class="addthis_button_preferred_3"></a>
                             <a class="addthis_button_compact"></a>
                             <a id='counter' class="addthis_counter addthis_bubble_style"></a>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="course-content">
                 <div class="container-fluid lecture_desc info-item " id="summary_truncated">
                     <p class="text-wrap">

                         <strong><span
                                 style="color:#666666;font-family:Nassim Arabic Regular , Geeza Pro , Arial , Helvetica , sans-serif;"><span
                                     style="font-size:18px;">{{ $course->description }}</span></strong>
                     </p>
                 </div>

                 <div id="instructors" class="container-fluid instructor-info info-item pr-0">
                     <div class="item-title">
                         <h5 class="mb-0"> <i class="icon-user-4  site-icons" aria-hidden="true"></i>عن المحاضر</h5>
                     </div>


                     <div class="row mb-3 pb-5 border-bottom">
                         <div class="col-4 col-sm-2 instructor-image clearfix m-auto">
                             <a href="{{ route('instructor.page', $course->instructor) }}" class="tool-tip"
                                 title="اذهب إلى صفحة المحاضر">
                                 <img class="img-fluid"
                                     src="{{ isset($course->instructor->avatar) && $course->instructor->avatar != false ? route('instructor.avatar', $course->instructor) : asset('default-logo.png') }}"
                                     alt="">
                             </a>
                         </div>
                         <div class="col-12 col-sm-10 instructor-details">
                             <a class="user-link tool-tip" href="{{ route('instructor.page', $course->instructor) }}"
                                 title="اذهب إلى صفحة المحاضر">
                                 {{ $course->instructor->name }}
                             </a>
                             <p class="text-center text-sm-right"> </p>

                             <div id="bio_2221606_truncated">
                                 <p>{{ $course->instructor->job }}</p>
                             </div>

                         </div>
                     </div>
                 </div>

                 <div class="container-fluid subject-content-info info-item">
                     <div class="item-title">
                         <h5>الفئة المستهدفة</h5>
                     </div>
                     <div class="row-fluid">
                         {!! $course->target_audience !!}
                     </div>
                 </div>
                 <div class="container-fluid subject-content-info info-item">
                     <div class="item-title">
                         <h5>المنهج</h5>
                     </div>
                     <div class="row-fluid">
                         {!! $course->curriculum !!}
                     </div>
                 </div>
                 <div class="container-fluid subject-content-info info-item">
                     <div class="item-title">
                         <h5>المخرجات</h5>
                     </div>
                     <div class="row-fluid">
                         {!! $course->outputs !!}
                     </div>
                 </div>


             </div>
         </div>




     </div>

 </div>
