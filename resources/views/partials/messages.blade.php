<li class="dropdown xs-left">

    <a href="#" data-toggle="dropdown" class="notification-icon">
        <i class="fa-envelope-o"></i>
    </a>

    <ul class="dropdown-menu messages">
        <li>
            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                @foreach ($auth_user->messages_received as $message)
                    <li class="{{ $message->condition->first()->id == trans('globals.active') ? 'active' : '' }}">
                        <a href="#">
                            <span class="line">
                                <strong>{{ $message->sender->name }} {{ $message->sender->second_name }}</strong>
                                <span class="light small">{{ $message->created_at->diffForHumans() }}</span>
                            </span>

                            <span class="line desc small">
                                {{ $message->message }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="external">
            <a href="mailbox-main.html">
                <span>Todos los mensajes</span>
                <i class="fa-link-ext"></i>
            </a>
        </li>
    </ul>

</li>
