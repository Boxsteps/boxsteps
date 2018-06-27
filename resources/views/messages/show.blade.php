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
                            @if ( Request::is('messages/sent/*') )
                                <a href="{{ url('messages/sent') }}" class="go-back">
                                    <i class="fa-angle-left"></i>
                                    @lang('message.show.back')
                                </a>
                            @else
                                <a href="{{ url('messages') }}" class="go-back">
                                    <i class="fa-angle-left"></i>
                                    @lang('message.show.back')
                                </a>
                            @endif
                        </h2>

                        <div class="mail-single-header-options">
                            <form style="display: inline-block;" role="form" action="{{ url('/messages/' . $message->id ) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-gray btn-icon" role="button" title="@lang('message.destroy.delete')" data-toggle="modal" data-target="#message-delete">
                                    <i class="fa-trash"></i>
                                </button>
                                <div class="modal fade" id="message-delete" tabindex="-1" role="dialog" aria-labelledby="message-delete-label">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('message.destroy.question.close')"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="message-delete-label">@lang('message.destroy.delete')</h4>
                                            </div>
                                            <div class="modal-body">
                                                @lang('message.destroy.question')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">@lang('message.destroy.question.close')</button>
                                                <button type="submit" class="btn btn-danger">@lang('message.destroy.delete')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Email info from/reply -->
                    <div class="mail-single-info">

                        <div style="width: 100%;" class="mail-single-info-user dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" alt="user-image" width="38" />
                                @lang('message.show.from') {!! $sender !!} @lang('message.show.to') {!! $recipient !!}
                                <em class="time">{{ $timestamp }}</em>
                            </a>
                        </div>

                    </div>

                    <!-- Email body -->
                    <div class="mail-single-body">
                        <p>{{ $message->message }}</p>
                    </div>

                </div>


            </div>

            <!-- Mailbox sidebar -->
            <div class="col-sm-3 mailbox-left">

                <div class="mailbox-sidebar">

                    <a href="{{ url('messages/compose') }}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-left">
                        <i class="linecons-mail"></i>
                        <span>@lang('message.index.compose')</span>
                    </a>


                    <ul class="list-unstyled mailbox-list">
                        <li class="active">
                            <a href="{{ url('messages') }}">@lang('message.index.inbox')
                                @if ( $messages_received_count > 0 )
                                    <span class="badge badge-success pull-right">{{ $messages_received_count }}</span>
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
