@extends('layouts.main')

@section('title')
    {{ trans('message.show.title', ['user' => $message->sender->name]) }}
@endsection

@section('custom-css')
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <section class="mailbox-env">

        <div class="row col-md-10 col-md-offset-1">

            <!-- Inbox emails -->
            <div class="col-sm-9 mailbox-right">

                <div class="mail-single">

                    <!-- Email title and button options -->
                    <div class="mail-single-header">
                        <h2>
                            <a href="{{ url('messages') }}" class="go-back">
                                <i class="fa-angle-left"></i>
                                @lang('message.show.back')
                            </a>
                        </h2>

                        <div class="mail-single-header-options">
                            <a href="{{ url('messages/reply') }}" class="btn btn-gray btn-icon">
                                <span>@lang('message.show.reply')</span>
                                <i class="fa-reply-all"></i>
                            </a>
                            <form style="display: inline-block;" role="form" action="{{ url('/messages/' . $message->id ) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-gray btn-icon">
                                    <i class="fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Email info from/reply -->
                    <div class="mail-single-info">

                        <div class="mail-single-info-user dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" alt="user-image" width="38" />
                                <span>{{ $message->sender->name }} {{ $message->sender->second_name }}</span>
                                ({{ $message->sender->email }}) @lang('message.show.to')
                                <span>@lang('message.show.me')</span>
                                <em class="time">{{ $message->sender->created_at->format('d-m-Y') }} - {{ $message->sender->created_at->timezone('-4')->format('g:i A') }}</em>
                            </a>

                            <ul class="dropdown-menu dropdown-secondary">
                                <li><a href="{{ url('messages/reply') }}"><i class="fa-reply"></i>&nbsp; @lang('message.show.reply-to') {{ $message->sender->name }} {{ $message->sender->second_name }}</a></li>
                                <li><a href="{{ url('messages/reply') }}"><i class="fa-reply-all"></i>&nbsp; @lang('message.show.reply-to-all')</a></li>
                                <li><a href="{{ url('messages/forward') }}"><i class="fa-forward"></i>&nbsp; @lang('message.show.forward')</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();">
                                        <form role="form" action="{{ url( 'messages/' . $message->id ) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                        <i class="fa-trash"></i>&nbsp; @lang('message.show.move-trash')
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!-- Email body -->
                    <div class="mail-single-body">
                        <p>{{ $message->message }}</p>
                    </div>

                    <div class="mail-single-reply">

                        <div class="fake-form">
                            <div>
                                <a href="{{ url('messages/reply') }}">@lang('message.show.box.reply')</a>
                                @lang('message.show.box.this-message')
                            </div>
                        </div>

                    </div>

                </div>


            </div>

            <!-- Mailbox sidebar -->
            <div class="col-sm-3 mailbox-left">

                <div class="mailbox-sidebar">

                    <a href="{{ url('messages/compose') }}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
                        <i class="linecons-mail"></i>
                        <span>@lang('message.index.compose')</span>
                    </a>


                    <ul class="list-unstyled mailbox-list">
                        <li class="active">
                            <a href="{{ url('messages') }}">@lang('message.index.inbox')
                                @php $count = 0; @endphp
                                @foreach ( $auth_user->messages_received as $message )
                                    @if ( $message->pivot->state_id == trans('globals.condition.active') )
                                        @php $count++ @endphp
                                    @endif
                                @endforeach
                                @if ( $count > 0 )
                                    <span class="badge badge-success pull-right">{{ $count }}</span>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ url('messages/sent') }}">@lang('message.index.sent')</a></li>
                        <li><a href="{{ url('messages/trash') }}">@lang('message.index.trash')</a></li>
                    </ul>

                </div>

            </div>

        </div>

    </section>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            var $state = $(".mail-table thead input[type='checkbox'], .mail-table tfoot input[type='checkbox']"),
                $chcks = $(".mail-table tbody input[type='checkbox']");

            /**
             * Script to select all checkboxes
             */
            $state.on('change', function(ev)
            {
                if($state.is(':checked'))
                    $chcks.prop('checked', true).trigger('change');
                else
                    $chcks.prop('checked', false).trigger('change');
            });

            /**
             * Row highlighting
             */
            $chcks.each(function(i, el)
            {
                var $tr = $(el).closest('tr');

                $(this).on('change', function(ev)
                {
                    $tr[$(this).is(':checked') ? 'addClass' : 'removeClass']('highlighted');
                });
            });

            /**
             * Stars
             */
            $(".mail-table .star").on('click', function(ev)
            {
                ev.preventDefault();

                if( ! $(this).hasClass('starred'))
                    $(this).addClass('starred').find('i').attr('class', 'fa-star');
                else
                    $(this).removeClass('starred').find('i').attr('class', 'fa-star-o');
            });
        });
    </script>
@endsection
