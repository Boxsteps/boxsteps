@extends('layouts.main')

@section('title')
    @lang('message.index.title')
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

                <div class="mail-env">

                    <!-- Mail table -->
                    <table class="table mail-table">

                        <!-- Mail table header -->
                        <thead>
                            <tr>
                                <th class="col-cb">
                                    <input type="checkbox" class="cbr" />
                                </th>
                                <th colspan="4" class="col-header-options">

                                    <div class="mail-select-options">@lang('message.index.select-all')</div>

                                    <div class="mail-pagination">
                                        <strong>{{ ( $auth_user->messages_received->count() > 0 ) ? $auth_user->messages_received->count() : '' }}</strong>
                                        {{ trans_choice('message.index.emails', $auth_user->messages_received->count()) }}

                                        <div class="next-prev">
                                            <a href="#"><i class="fa-angle-left"></i></a>
                                            <a href="#"><i class="fa-angle-right"></i></a>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                        </thead>

                        <!-- Mail table footer -->
                        <tfoot>
                            <tr>
                                <th class="col-cb">
                                    <input type="checkbox" class="cbr" />
                                </th>
                                <th colspan="4" class="col-header-options">

                                    <div class="mail-select-options">@lang('message.index.select-all')</div>

                                    <div class="mail-pagination">
                                        <strong>{{ ( $auth_user->messages_received->count() > 0 ) ? $auth_user->messages_received->count() : '' }}</strong>
                                        {{ trans_choice('message.index.emails', $auth_user->messages_received->count()) }}

                                        <div class="next-prev">
                                            <a href="#"><i class="fa-angle-left"></i></a>
                                            <a href="#"><i class="fa-angle-right"></i></a>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                        </tfoot>

                        <!-- Email list -->
                        <tbody>

                            @if ( $auth_user->messages_received->count() > 0)
                                @foreach ( $auth_user->messages_received->sortBy('created_at') as $message )
                                    <tr class="{{ $message->pivot->state_id == trans('globals.active') ? 'unread' : '' }}">
                                        <td class="col-cb">
                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" class="cbr" />
                                            </div>
                                        </td>
                                        <td class="col-name">
                                            <a href="{{ url( 'messages/' . $message->id ) }}" class="col-name">{{ $message->sender->name }} {{ $message->sender->second_name }}</a>
                                        </td>
                                        <td class="col-subject">
                                            <a href="{{ url( 'messages/' . $message->id ) }}">
                                                {{ $message->message }}
                                            </a>
                                        </td>
                                        <td class="col-options hidden-sm hidden-xs"></td>
                                        <td class="col-time">{{ $message->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="col-cb">
                                    </td>
                                    <td class="col-name">@lang('message.index.no-new-messages')</td>
                                </tr>
                            @endif

                        </tbody>

                    </table>

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
                                    @if ( $message->pivot->state_id == trans('globals.active') )
                                        @php $count++ @endphp
                                    @endif
                                @endforeach
                                @if ( $count > 0 )
                                    <span class="badge badge-success pull-right">{{ $count }}</span>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ url('messages/sent') }}">@lang('message.index.sent')</a></li>
                        <li><a href="{{ url('messages/drafts') }}">@lang('message.index.drafts')</a></li>
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
             * Stars highlighting
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
