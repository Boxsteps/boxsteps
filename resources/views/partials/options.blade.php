<li class="dropdown user-profile">

    <a href="#" data-toggle="dropdown">
        <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
        <span>
            {{ $auth_user->name }} {{ $auth_user->second_name }}
            <i class="fa-angle-down"></i>
        </span>
    </a>

    <ul class="dropdown-menu user-profile-menu list-unstyled">
        <li><a href="{{ url('profile') }}"><i class="fa-user"></i>@lang('partials.profile')</a></li>
        @if ( $auth_user->role->id == trans('globals.teacher') )
            <li><a href="{{ url('courses') }}"><i class="fa-group"></i>@lang('partials.courses')</a></li>
        @endif
        <li class="last"><a href="{{ url('logout') }}"><i class="fa-lock"></i>@lang('partials.logout')</a></li>
    </ul>

</li>
