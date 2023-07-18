<div class="user-small user_cover">
    <a class="user-link_cover" href="{{ route('user.page') }}">
        <img src="{{ isset(auth()->user()->avatar) ? route('get.avatar', auth()->user()) : asset('default-logo.png') }}"
            style="display: inline;">
        <span>{{ auth()->user()->name }}</span>
    </a> <span class="subject-date text-white"> </span>
</div>
