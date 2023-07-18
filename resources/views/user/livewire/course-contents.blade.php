 <div class="wrapper">
     <div class="wrapper-inner">
         <div class="main">
             <ul class="nav course-nav clearfix  mobile-tabs-bar mobile-tabs-6 pb-1">
                 <li @class(['pb-2', 'active' => $tab == 'contents']) wire:click="changeTab('contents')"><a id="contents"
                         href="javascript:void(0)">المحتويات</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'discussion']) wire:click="changeTab('discussion')"><a id="discussion"
                         href="javascript:void(0)">نقاشات</a>
                 </li>

                 <li @class(['pb-2', 'active' => $tab == 'announcements']) wire:click="changeTab('announcements')"><a id="announcements"
                         href="javascript:void(0)">تنويهات</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'show']) wire:click="changeTab('show')"><a id="show"
                         href="javascript:void(0)">عن المادة</a></li>
                 <li @class(['pb-2', 'active' => $tab == 'my_activity']) wire:click="changeTab('my_activity')"><a id="my_activity"
                         href="javascript:void(0)">نشاطي</a>
                 </li>
             </ul>


             <div class="page-content">


                 @if ($tab == 'contents')
                     <livewire:course-contents-view :course="$course" />
                 @elseif($tab == 'discussion')
                     <livewire:discussion :course="$course" />
                 @elseif($tab == 'show')
                     @include('user.about_course', ['course' => $course])
                @elseif($tab == 'announcements')
                     @include('user.announcements', ['course' => $course])
                 @elseif($tab == 'my_activity')
                     @include('user.user_activity', ['course' => $course])
                 @endif


             </div>
         </div>
         @include('user.layouts.footer')

     </div>
 </div>
