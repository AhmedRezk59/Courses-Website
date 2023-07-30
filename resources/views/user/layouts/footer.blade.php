  <div class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-7 footer-nav">
                  <ul class="clearfix">
                      <li><a href="{{ url('/') }}">الرئيسية</a></li>
                      <li><a href="{{ route('courses.all') }}">تصفح المواد</a></li>
                      <li><a href="{{ route('terms') }}">سياسة الخصوصية</a></li>
                  </ul>

                  <ul class="clearfix">
                      <li><a target="_blank" href="{{ route('instructor.register') }}">انضم كمحاضر</a></li>

                  </ul>

                  <div class="copyright">
                      <p>جميع الحقوق محفوظة © {{ config('app.name') }}</p>
                  </div>
              </div>
              @include('user.layouts.social')



          </div>
      </div>
  </div>
  <script>
      $(document).ready(function() {
          $('a').on('click', function(event) {
              event.preventDefault();
              var url = $(this).attr('href');
              $.get(url, function(data) {
                  console.log(url)
                  if (url == '#' || url == 'javascript:void(0)') {
                      event.preventDefault();

                  } else {
                      window.location.href = url;
                  }
              });
          });
      });
  </script>
