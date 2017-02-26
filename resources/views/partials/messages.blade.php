<li class="dropdown xs-left">

    <a href="{{ url('messages') }}" data-toggle="dropdown" class="notification-icon">
        <i class="fa-envelope-o"></i>
        @php $count = 0; @endphp
        @foreach ( $auth_user->messages_received as $message )
            @if ( $message->pivot->state_id == trans('globals.active') )
                @php $count++ @endphp
            @endif
        @endforeach
        @if ( $count > 0 )
            <span class="badge badge-green">{{ $count }}</span>
        @endif
    </a>

    <ul class="dropdown-menu messages">
        <li>
            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                @if ( $count > 0 )
                    @foreach ( $auth_user->messages_received as $message )
                        @if ( $message->pivot->state_id == trans('globals.active') )
                            <li class="active">
                                <a href="{{ url( 'messages/' . $message->id ) }}">
                                    <span class="line">
                                        <strong>{{ $message->sender->name }} {{ $message->sender->second_name}}</strong>
                                        <span class="light small">{{ $message->created_at->diffForHumans() }}</span>
                                    </span>

                                    <span class="line desc small">
                                        {{ $message->message }}
                                    </span>
                                </a>
                            </li>                            
                        @endif
                    @endforeach
                @else
                    <li class="no-new-messages">
                        <a href="{{ url('messages') }}">
                            <span class="line">@lang('message.index.no-new-messages')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        <li class="external">
            <a href="{{ url('messages') }}">
                <span>@lang('partials.all-messages')</span>
                <i class="fa-link-ext"></i>
            </a>
        </li>
    </ul>

</li>
