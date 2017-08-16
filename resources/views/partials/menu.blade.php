<ul class="navbar-nav">
    @foreach ( $auth_features as $feature )
        @if ( $feature->feature_id == null )
            {{-- Search roles for feature --}}
            @foreach ( $feature->roles as $role )
                {{-- Compare role of the feature with role of the user --}}
                @if ( $role->id == $auth_user->role->id )
                    <li>
                        <a href="{{ url($feature->url) }}">
                            <i class="{{ $feature->icon }}"></i>
                            <span class="title">{{ $feature->feature }}</span>
                        </a>
                        @if ( $feature->childs->first() )
                            <ul>
                                @foreach ( $feature->childs as $child )
                                    {{-- Search roles for child feature --}}
                                    @foreach ( $child->roles as $role )
                                        {{-- Compare role of the child feature with role of the user --}}
                                        @if ( $role->id == $auth_user->role->id )
                                            <li>
                                                <a href="{{ url($child->url) }}">
                                                    <i class="{{ $child->icon }}"></i>
                                                    <span class="title">{{ $child->feature }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach
</ul>
