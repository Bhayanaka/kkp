	
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							<h3 style='color:green'><?php if ($validate) echo $validate; ?></h3>
							<div class="col-md-8">
									<h3>Register</h3>
										
										<form method="POST" action="<?=$basedomain?>register/doregister">
										
										<table style="font-size:12px;vertical-align:top;margin-left:50px;" cellspacing="10px;">
											<tr>
												<td width="100px;">Nama</td>
												<td><input type="text" name="name" required="required"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><input type="text" name="email" required="required"></td>
											</tr>
											<tr>
												<td>Password</td>
												<td><input type="password" name="password" required="required"></td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>
													<?php
														//require_once('recaptcha/recaptchalib.php');
														require_once('engine/recaptchalib.php');
													//  $publickey = "your_public_key"; // you got this from the signup page
														$publickey = "6LeTiPASAAAAAFY09-K67Do3LC2AEnjkyFFdxiKO ";
														echo recaptcha_get_html($publickey, $error);
													?>
												</td>	
													<!--<script type="text/javascript" 
													src="http://www.google.com/recaptcha/api/challenge?k=6LeOueYSAAAAAHgyAob9xb40OYNPStHv_bIz-rfR "></script>-->

												<!--<noscript>
													<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeOueYSAAAAAHgyAob9xb40OYNPStHv_bIz-rfR " height="300" width="500" frameborder="0"></iframe><br/>
													<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
													<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
												</noscript>-->						
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td align="right"><br/>
													<input type="submit" class="btn btn-info" value="Register">
													<input type="reset" class="btn" value="Kosongkan">
												</td>
											</tr>
										</table>
										</form>
										
										<br/>
										<br/>
							
							
							</div>

							

							<div class="col-md-4">
								

							<div class="col-md-4">
									<h3>Login</h3>
										
										<form method="POST" action="<?=$basedomain?>register/login">
										
										<table style="font-size:12px;vertical-align:top;margin-left:50px;" cellspacing="10px;">
											<tr>
												<td width="100px;">Email</td>
												<td><input type="text" name="email" required="required"></td>
											</tr>
											<tr>
												<td>Password</td>
												<td><input type="text" name="password" required="required"></td>
											</tr>
											
											<tr>
												<td>&nbsp;</td>
												<td align="right"><br/>
													<input type="submit" class="btn btn-info" value="Login">
													
												</td>
											</tr>
										</table>
										</form>
										
										<br/>
										<br/>
							
							
							</div>

							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>