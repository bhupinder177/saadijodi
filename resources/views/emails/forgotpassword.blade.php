<table border="0" width="100%">
	<tbody>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#fff; box-shadow:0 0 10px #ccc;" width="600">
				<tbody>
					<tr>
						<td align="center" height="100" width="100" style="background:#c3c8ca;border-bottom:solid 1px #f5f5f5;" valign="middle">
              <img width="150px" src="{{ asset('front/img/logo.png') }}" alt="">
            </td>
					</tr>
					<tr>
						<td>
						<table cellpadding="0" cellspacing="0" width="100%">
							<tbody>
								<tr>
									<td width="15">&nbsp;</td>
									<td width="670">
									<table cellpadding="0" cellspacing="0" width="100%">
										<tbody>
											<tr>
												<td height="15">&nbsp;</td>
											</tr>
											<tr>
												<td width="530">
												<table cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:13px;">
															<table border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
                                    <td>
																			 Hi {{ $data['name'] }},
															         <br/>
															         <p>We've received a request to reset your password . If you didn't make the request, just ignore this email. Otherwise, you can reset your password using this link :<br><br>
																			<a style='display: block;width: 262px;height: 14px;background: #4E9CAF;padding: 10px;text-align: center;border-radius: 5px;color: white;font-weight: bold;text-decoration:none;' class='click' href="{{ $data['link'] }}">
	 																			 Click here to reset your password</a><br><br>
															         </p>
															        <br/>Thank You,<br/>
																			 My Cab Share Team</br>
															         <br/><br/>
                                    </td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
											<!-- <tr>
												<td height="15" style="padding-bottom:15px;">
												<p>*This email account is not monitored. Please do not reply to this email as we will not be able to read and respond to your messages.</p>
												</td>
											</tr> -->
										</tbody>
									</table>
									</td>
									<td width="15">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding:5px; background: none repeat scroll 0 0 #333;
             border-top: 1px solid #CCCCCC;color:#fff;" valign="top">
						<!-- <p>You have received this message by auto generated e-mail.</p> -->

						<center><?php echo '&copy; '.date('Y'). ' ALL RIGHTS RESERVED'; ?></center>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
