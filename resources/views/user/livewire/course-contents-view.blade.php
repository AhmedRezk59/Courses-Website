  <div class="curriculum mobile-padding student-view">
      <ul>
          @foreach ($course->directories as $d)
              <li class="curriculum-section">
                  <div class="section-title ">
                      {{ $d->name }}
                  </div>

                  <ul class="curriculum-section-content sortable">
                      @foreach ($d->lessons as $lesson)
                          <li class="clearfix">
                              <span class="selected-arrow"></span>
                              <a class="d-inline-block pt-2 position-relative"
                                  href="{{route('courses.lesson.view' ,$lesson)}}">
                                  <span class="row-icon float-right ml-1"><i
                                          class="icon-play-3 site-icons"></i>
                                  </span>
                                  <span class="row-title float-right">{{$lesson->name}}</span>

                              </a>
                          </li>
                      @endforeach



                  </ul>
              </li>
          @endforeach


      </ul>
  </div>