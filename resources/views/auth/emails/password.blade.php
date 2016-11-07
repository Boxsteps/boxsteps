<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">
			<table class="email-content" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding: 25px 0; text-align: center;" class="email-masthead">
						<a href="{{ url('/') }}" class="email-masthead-logo">
                            <img src="http://www.boxsteps.com.ve/images/logo/logo-light.png" width="250" alt="@lang('globals.boxsteps')" />
                        </a>
					</td>
				</tr>
				<!-- Email Body -->
				<tr>
					<td class="email-body" width="100%" cellpadding="0" cellspacing="0">
						<table class="email-body-inner" align="center" width="570" cellpadding="0" cellspacing="0">
							<!-- Body content -->
							<tr>
								<td class="content-cell">
									<h1>@lang('email.hi') {{ $user->name }},</h1>
									<p>
                                        @lang('email.request')
                                        @lang('globals.boxsteps').
                                        @lang('email.use')
                                        <strong>@lang('email.valid')
                                        </strong>
                                    </p>
									<!-- Action -->
									<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td align="center">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td align="center">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
																		<a style="background-color: #22BC66; border-top: 10px solid #22BC66; border-right: 18px solid #22BC66; border-bottom: 10px solid #22BC66; border-left: 18px solid #22BC66; display: inline-block; color: #FFF; text-decoration: none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);" href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" target="_blank">@lang('email.reset')</a>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<p>@lang('email.ignore')
                                        <a href="@lang('email.mailto')">
											@lang('email.support')
										</a>.
                                    </p>
									<p>
                                        @lang('email.thanks')<br>
                                        @lang('email.team')
                                        @lang('globals.boxsteps')
                                    </p>
									<!-- Sub copy -->
									<table class="body-sub">
										<tr>
											<td>
												<p class="sub">@lang('email.troubles')</p>
												<p class="sub">{{ $link }}</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
							<tr>
								<td class="content-cell" align="center">
									<p class="sub align-center">@lang('globals.boxsteps') &copy; @lang('globals.year'). @lang('globals.rights')</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
