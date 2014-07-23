	
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
									<br/>
									<ul class="breadcrumb" style="margin-bottom: 5px;">
									  <li class="active">Kotak Saran</li>
									</ul>
									<h3>Kotak Saran</h3>
										<p>
											<ul>
												<li>Kirimkan saran, kritik dan pertanyaan Anda pada Rubrik Kritik dan saran.</li>
												<li>Saran, pesan dan pertanyaan Anda akan kami filter terlebih dahulu, sebelum di muat
													 dalam rubrik Kritik dan saran ini. Kami mohon maaf jika saran, pesan dan pertanyaan Anda 
													 tidak kami muat di rubrik ini. 
												</li>
											</ul>
										</p>
										
										<form method="POST" action="<?=$basedomain?>kotaksaran/changeData">
										
										<table style="font-size:12px;vertical-align:top;margin-left:50px;" cellspacing="10px;">
											<tr>
												<td width="100px;">Nama</td>
												<td><input type="text" name="nama" required="required"></td>
											</tr>
											<tr>
												<td>E - mail</td>
												<td><input type="text" name="email" required="required"></td>
											</tr>
											<tr>
												<td>Pesan</td>
												<td><textarea name="pesan" required="required"></textarea></td>
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
													<input type="submit" class="btn btn-info" value="Kirim">
													<input type="reset" class="btn" value="Kosongkan">
												</td>
											</tr>
										</table>
										</form>
										
										<br/>
										<br/>
							
							
							</div>
							<div class="col-md-4">
								<br/>
								<h4><i>Link <span class="text-primary">Terkait</span> </i></h4>
								<hr>
								<div class="panel panel-default">
								  <div class="panel-body">
									<table>
									<?php
										// pr($rss);
										if($rss){
										foreach($rss as $key=>$values){
									?>
										<tr>
											<td width="45px"><img src="<?=$basedomain?>public_assets/<?=$values['image']?>" width="30px"/></td>
											<td><h5><a href="<?=$values['brief']?>"><?=$values['title']?></a></h5></td>
										</tr>
									<?php
										}
									}
									?>																				
									</table>
								  </div>
								</div>
								<br/>
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>