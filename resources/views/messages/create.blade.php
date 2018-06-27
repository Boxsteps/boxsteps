@extends('layouts.main')

@section('title')
    @lang('message.create.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <section class="mailbox-env">

        <div class="row col-md-10 col-md-offset-1">

            <!-- Compose email -->
            <div class="col-sm-9 mailbox-right">

                <div class="mail-compose">

                    <form role="form" method="POST" action="{{ url('/messages') }}">
                        {{ csrf_field() }}

                        <div class="mail-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>@lang('message.create.title')</h3>
                                </div>
                            </div>
                        </div>

                        <label class="control-label">@lang('message.create.destiny')</label>
                        <div class="form-group {{ $errors->has('destiny') ? ' has-error' : '' }}">
                            <div class="input-group col-xs-12">
                                <select class="form-control" name="destiny" id="destiny">
                                    <option value="">@lang('globals.value.null')</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                                data-name="{{ $user->name }} {{ $user->second_name }}"
                                                data-email="{{ $user->email }}">
                                            {{ $user->name }} {{ $user->second_name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('destiny'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('destiny') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
    						<textarea class="editor" name="message" id="message"></textarea>
    						@if ($errors->has('message'))
    							<span class="help-block error">
    								<strong>{{ $errors->first('message') }}</strong><br><br>
    							</span>
    						@endif
    					</div>

                        <div class="row">
                            <div class="col-sm-offset-9 col-sm-3">
                                <button type="submit" class="btn btn-secondary btn-block btn-icon btn-icon-standalone">
                                    <i class="linecons-mail"></i>
                                    <span>@lang('message.create.send')</span>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>



                <div class="panel-body">

                    <div class="panel-body col-sm-12">



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
        $(document).ready(function() {

            $('.editor').summernote({
				dialogsInBody: true,
				height: 200,
				lang: 'es-ES',
				toolbar: [
					['style', ['style']],
					['font', ['bold', 'underline', 'clear']],
					['fontname', ['fontname']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['table', ['table']],
					['insert', ['link', 'picture', 'video']],
					['view', ['codeview']]
				]
			});

            function matchUsersContent(term, text, option) {
                if ( $(option).data('email') && $(option).data('name') ) {
                    return  $(option).data('email').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('name').toUpperCase().indexOf(term.toUpperCase()) >= 0;
                }

                return text.toUpperCase().indexOf(term.toUpperCase()) >= 0;
            }

            function formatUsersContent(state) {
                var option = state.element;
                if ( state.text == '@lang('globals.value.null')' ) {
                    return '@lang('globals.value.null')';
                }
                return  '<span>' + $(option).data('name') + '</span><br>' +
                        '<span>&lt;' + $(option).data('email') + '&gt;</span>';
            }

            function formatSelectionContent(state) {
                return state.text;
            }

            $('#destiny').select2({
                placeholder: '@lang('message.create.users')',
                language: "es",
                allowClear: true,
                matcher: matchUsersContent,
                formatResult: formatUsersContent,
                formatSelection: formatSelectionContent,
                escapeMarkup: function(m) { return m; }
            }).on('select2-open', function()
            {
                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
            });

        });
    </script>

    <script src="{{ asset('boxsteps/js/summernote/summernote.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/summernote/lang/summernote-es-es.js') }}"></script>
    <script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
