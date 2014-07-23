	
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li class="active">Kontak</li>
								</ul>
								<h3 class="text-primary">Kontak Kami</h3>
								<hr/>
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3956.7591229182194!2d112.74468300000001!3d-7.380869999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4f3d9e65467%3A0xd19c8068a886a78f!2sKementerian+Kelautan+%26+Perikanan!5e0!3m2!1sen!2s!4v1404803057351" width="100%" height="450" frameborder="0" style="border:0"></iframe>
							<br/>
							<br/>
							<br/>
							<?php
								// pr($data);
								if($hasil){
									foreach($hasil as $key=>$val){
									echo "<h3>".$val['title']."</h3>";
									//echo '<center><img src="assets/images/logo.png" /></center>';
									//echo '<center><img src ="'.$basedomain.'public_assets/'.$val['image'].'" style="height:250px" width="auto"/></center>';
									echo"&nbsp;";
									echo"<address>";
									echo $val['content'];
									echo"</address>";
									}
								}
							?>
							
							
							
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
											<td><h5><a href="<?="https://".$values['brief']?>"><?=$values['title']?></a></h5></td>
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