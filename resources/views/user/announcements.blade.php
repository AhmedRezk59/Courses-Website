<ul class="announcements_list ">
    @if (\Carbon\Carbon::now()->gt($course->end_date))
        <div class="alert alert-warning system-messages clearfix">
        <div class="row ">
          <i class="site-icons icon-warning"></i>
          <span>
            <p> انتهت المادة في يوم {{$course->end_date}}</p>
          </span>
        </div>
      </div>
    @endif
    @foreach ($course->announcements as $announcement)
        <li style="list-style-type: none">
            {!! $announcement->body !!}
        </li>
    @endforeach

</ul>
