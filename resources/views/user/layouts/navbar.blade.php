@auth
    <div class="dropdown site-nav-list">
        <a href="#" class="deema-icons menu-icon d-flex justify-content-center align-items-center"
            data-toggle="dropdown">

            <svg xmlns="http://www.w3.org/2000/svg" class="svg-bar" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
            <style>
                .svg-bar {
                    fill: white;
                    height: 80%;
                }
            </style>

            {{-- <i class="fa-solid fa-bars"
                                    style="color: #fff;text-shadow: 1px 1px 1px #ccc;font-size: 1.5em;"></i> --}}
        </a>
        <ul class="dropdown-menu mt-0">
            <li><a href="{{route('user.page')}}">{{ auth()->user()->name }}</a></li>
            <li><a href="{{ route('courses.all') }}">تصفح المواد</a></li>
            <li class="pb-2 "><a href="{{ route('courses.mine') }}">موادي</a></li>

            <li><a href="{{ route('settings') }}">إعدادات الحساب</a></li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class=" logout-btn" type='submit' id="logout_link" rel="nofollow"
                        data-method="delete">خروج</button>
                </form>
            </li>
            <style>
                .logout-btn {
                    /* centre the button  */
                    margin: 0;

                    /* adding colour and style */
                    background-color: #008CBA;
                    /* Green */
                    border: none;
                    color: white;
                    padding: 7px 15px;
                    /* text-decoration: none; */
                }
            </style>
        </ul>
        <script>
            $('.menu-icon').click(function() {
                $('.dropdown-menu').css('visibility', 'visible');
            })
        </script>
    </div>


@endauth
