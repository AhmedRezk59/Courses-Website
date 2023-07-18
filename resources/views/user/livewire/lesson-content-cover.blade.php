<div class="content-cover" style="background-repeat: no-repeat;background-size: cover;background-image: url({{route('user.get.thmbinal' , $course)}})">
    <div class="course-navigation curriculum student-view ">
        <ul class="mCustomScrollbar _mCS_6 _mCS_7" style="overflow: hidden;">
            <div class="mCustomScrollBox mCS-light-thin" id="mCSB_7"
                style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 527px;">
                <div class="mCSB_container" style="position:relative; top:0;">
                    <div class="mCustomScrollBox mCS-light-thin" id="mCSB_6"
                        style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 650px;">
                        <div class="mCSB_container mCS_no_scrollbar" style="position:relative; top:0;">
                            <li class="curriculum-section">
                                <div class="section-title ">
                                    {{ $lesson->directory->name }} : {{ $lesson->name }}
                                </div>

                                <ul class="curriculum-section-content sortable">
                                    @foreach ($lesson->directory->lessons as $lesson)
                                        <li class="clearfix  active" id="items_lecture94">
                                            <span class="selected-arrow"></span>
                                            <a class="d-inline-block pt-2 position-relative"
                                                href="{{route('courses.lesson.view' , $lesson)}}">
                                                <span class="row-icon float-right ml-1"
                                                    title="لم تقم بانهاء هذا الجزء بعد"><i
                                                        class="icon-play-3 site-icons"></i>
                                                </span>
                                                <span class="row-title float-right">{{$lesson->name}}</span>

                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                        </div>
                     
                    </div>
                </div>
              
            </div>
        </ul>
        <div class="all-btn">
            <a class="site-btn grey-button" href="{{route('courses.course.contents' , $lesson->directory->course)}}">قائمة المحتويات</a>
        </div>

    </div>
</div>
