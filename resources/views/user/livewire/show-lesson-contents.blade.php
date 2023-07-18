 <div class="wrapper">
     <div class="wrapper-inner">
         <div class="main">
             <ul class="nav course-nav clearfix  mobile-tabs-bar mobile-tabs-6 pb-1">
                 <li @class(['pb-2', 'active' => $tab == 'contents' || $tab == 'lesson'])><a id="contents"
                         href="{{ route('courses.course.contents', $course) }}">المحتويات</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'discussion']) ><a href="{{ route('courses.course.contents', $course) }}"
                         id="discussion">نقاشات</a>
                 </li>

                 <li @class(['pb-2', 'active' => $tab == 'announcements'])><a id="announcements"
                         href="{{ route('courses.course.contents', $course) }}">تنويهات</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'show'])><a id="show"
                         href="{{ route('courses.course.contents', $course) }}">عن المادة</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'my_activity'])><a id="my_activity"
                         href="{{ route('courses.course.contents', $course) }}">نشاطي</a>
                 </li>
             </ul>


             <div class="page-content">


                 <livewire:show-lesson :lesson="$lesson" :course="$course" />


             </div>
         </div>
         @include('user.layouts.footer')

     </div>
 </div>
