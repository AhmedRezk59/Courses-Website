 <div class="page-content">
     <div id="flash_messages">

     </div>
     <link rel="stylesheet" media="screen"
         href="{{asset('/assets/browse-course-d2145c5e861ab878e93a7c251c3d2591b2acee5c994e89299af3659e266b2184.css')}}"
         data-turbolinks-track="true">
     <div class="mobile-padding courses-list-page">

         <div class="page-title ">
             <h4><i class="icon-document-alt-fill site-icons mr-1"></i> تصفح المواد</h4>
         </div>
         <div class="centered-nav mobile-tabs-bar  mobile-tabs-4  clearfix" id="course_filter" >
             <span>
                 <a wire:click="changeStatus('all')" id="all" @class(['courses_type_filter-dev all-dev ' , 'active' => $status == 'all']) href="javascript:void(0)">الجميع</a>

                 <a wire:click="changeStatus('current')" id="current" @class(['courses_type_filter-dev current-dev remote' , 'active' => $status == 'current'])
                     href="javascript:void(0)">الحالية</a>
                 <a wire:click="changeStatus('upcoming')"  id="upcoming" 
                 @class(['courses_type_filter-dev upcoming-dev remote' , 'active' => $status == 'upcoming'])
                     href="javascript:void(0)">المرتقبة</a>
                 <a wire:click="changeStatus('ended')" id="ended"
                 @class(['courses_type_filter-dev ended-dev remote' , 'active' => $status == 'ended'])
                     href="javascript:void(0)">المؤرشفة</a>
             </span>
         </div>

         <div>
             <div id="courses">
                 <ul class="course-list container-fluid courses-all-page p-0">
                     @foreach ($courses as $course)
                         <li>
                             <div class="media row no-gutters">
                                 <div class=" col-md-9 ">
                                     <div class="row m-0">
                                         <div class=" col-sm-5 p-0 pl-md-0">
                                             <span class="course-list-cat">{{ $course->department->name }}</span>
                                             <a class="cover d-block" href="{{ route('courses.show', $course) }}">
                                                 <img class=" align-self-center w-100"
                                                     src="{{ route('get.thumbinal.course', $course) }}"
                                                     max-width="177px" height="99px" style="display: inline;">
                                             </a>
                                         </div>

                                         <div class=" col-sm-7">
                                             <div class="media-body">
                                                 <div class=" pt-3 pt-md-0">
                                                     <p class="font-weight-bold mt-0">
                                                         <a id="show_course_1360"
                                                             href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                                                     </p>
                                                     <p class="mb-0"><i
                                                             class="site-icons pull-right icon-calendar ml-1"></i>
                                                         <span>
                                                             {{$course->continous_status}}
                                                         </span>
                                                     </p>

                                                     <p class="subject-date">
                                                         {{ $course->date_from_to }}

                                                     </p>


                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>




                                 <div class=" col-md-3 border-right border-top border-sm-top-0 pb-2 pt-0 pt-sm-3 ">
                                     <div class="instructor-block pl-sm-0 pt-2 pt-md-0    one-instructor">
                                         <div class="lecturer-block d-flex flex-row text-center flex-sm-column">
                                             <div class="px-2 px-sm-0">
                                                 <a class="lecturer-photo"
                                                     href="{{ route('instructor.page', $course->instructor) }}">
                                                     <img class="lecturer-dp"
                                                         src="{{ isset($course->instructor->avatar) ? route('instructor.avatar', $course->instructor) : asset('default-logo.png') }}"
                                                         style="display: inline;">
                                                 </a>
                                             </div>

                                             <div class="lecturer-data overflow-hidden px-2">
                                                 <a title="{{ $course->instructor->name }}"
                                                     href="{{ route('instructor.page', $course->instructor) }}">
                                                     <span>{{ $course->instructor->name }}</span>
                                                 </a>
                                                 <p class="text-truncate m-auto"
                                                     title="{{ $course->instructor->job }}">
                                                     {{ $course->instructor->job }}</p>
                                             </div>
                                         </div>


                                     </div>



                                 </div>
                             </div>
                         </li>
                     @endforeach


                 </ul>


                 {{ $courses->links() }}
             </div>
         </div>
     </div>



 </div>
