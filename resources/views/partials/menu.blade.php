<ul class="navbar-nav">
    @foreach ($auth_features as $feature)
        @if ( $feature->feature_id == null )
            <li>
                <a href="{{ url($feature->url) }}">
                    <i class="{{ $feature->icon }}"></i>
                    <span class="title">{{ $feature->feature }}</span>
                </a>
                @if ( $feature->childs->first() )
                    <ul>
                        @foreach ($feature->childs as $child)
                            <li>
                                <a href="{{ url($child->url) }}">
                                    <i class="{{ $child->icon }}"></i>
                                    <span class="title">{{ $child->feature }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
</ul>
