  <div class="page-content">

      <div class="mobile-padding dashboard-page">
          <div class="centered-nav mobile-tabs-bar  mobile-tabs-4 clearfix" data-no-turbolink="">
              <span>
                  <a wire:click="changeStatus('current')" id="all" @class([
                      'courses_type_filter-dev all-dev ',
                      'active' => $status == 'current',
                  ])
                      href="javascript:void(0)">الحالية</a>

                  <a wire:click="changeStatus('upcoming')" id="upcoming" @class([
                      'courses_type_filter-dev upcoming-dev remote',
                      'active' => $status == 'upcoming',
                  ])
                      href="javascript:void(0)">المرتقبة</a>

                  <a wire:click="changeStatus('ended')" id="ended" @class([
                      'courses_type_filter-dev ended-dev remote',
                      'active' => $status == 'ended',
                  ])
                      href="javascript:void(0)">المنتهية</a>

                  <a wire:click="changeStatus('archive')" id="archive" @class([
                      'courses_type_filter-dev archive-dev remote',
                      'active' => $status == 'archive',
                  ])
                      href="javascript:void(0)">المؤرشفة</a>


              </span>
          </div>



          <div id="courses">
              <ul class="course-list container-fluid taking-course current-course">
                  @foreach ($courses as $course)
                      <li class="row mx-0 mb-md-0 mb-3">
                          <div class="col-sm-4 p-0">
                              <span class="course-list-cat">{{ $course->department->name }}</span>
                              <a href="/courses/pmp3/announcements" class="cover" id="show_course_1380">
                                  <img class="w-100" style="max-width: 175px;max-height: 100px"
                                      src="{{ route('user.get.thmbinal', $course) }}" style="display: inline;">
                              </a>
                          </div>
                          <div class="col-sm-5 course-info">
                              <h6 class="font-weight-bold">
                                  <a id="course_1380"
                                      href="{{ route('courses.course.contents', $course->id) }}">{{ $course->name }}</a>
                              </h6>
                              <p class="subject-instructor mb-0">
                                  <strong>المحاضر:</strong>
                                  <a
                                      href="{{ route('instructor.page', $course->instructor) }}">{{ $course->instructor->name }}</a>
                              </p>
                              <div class="clearfix">
                                  <span>{{ $course->date_from_to }}</span>
                              </div>
                              <p class="course-due-date"><i class="site-icons pull-right icon-calendar mr-1 pl-1"></i>
                                  <span>
                                      {{ $course->continous_status }}
                                  </span>
                              </p>
                          </div>
                          <div class="col-sm-3 block-control clearfix  ">
                              <a class="site-btn btn btn-primary go-class" id="go_to_class_1380"
                                  href="{{ route('courses.course.contents', $course->id) }}">اذهب الى المادة</a>
                          </div>
                      </li>
                  @endforeach

              </ul>
          </div>
      </div>

  </div>
