<li class="dropdown user-profile">

    <a href="#" data-toggle="dropdown">
        <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
        <span>
            {{ $auth_user->name }} {{ $auth_user->second_name }}
            <i class="fa-angle-down"></i>
        </span>
    </a>

    <ul class="dropdown-menu user-profile-menu list-unstyled">
        <li><a href="{{ url('/profile') }}"><i class="fa-user"></i>Perfil</a></li>
        <li><a href="{{ url('/courses') }}"><i class="fa-group"></i>Cursos</a></li>
        <li class="last"><a href="{{ url('/logout') }}"><i class="fa-lock"></i>Salir</a></li>
    </ul>

</li>
