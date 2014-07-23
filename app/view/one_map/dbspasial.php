	
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							<div class="col-md-4">
								
								<?=$sidebar?>	
							</div>
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Produk & Program</a></li>
								  <li><a href="#">Aplikasi</a></li>
								  <li><a href="#">One Map</a></li>
								  <li class="active">Database Spasial</li>
								</ul>
								<h3 class="text-primary">Database Spasial</h3>
								<hr/>
								
								
								<table class="tb_produk_dokumen tb_padding">
								<?php
								// pr($data);
								 if($data){
									foreach($data as $key=>$val){
								?>
									<tr>
										<td style="min-width:150px;"><h4><a href=""><?=$val['title']?></a></h4></td>
										<td width="10px;">&nbsp;</td>
										<?php
										if($val['image']){
										$path=explode("/", $val['image']);
										// pr($path);
										?>
										<td>
										<a class="fancybox" title="" data-fancybox-group="gallery" href="<?=$basedomain?>public_assets/<?=$val['image']?>" rel="media-gallery">
											<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="150px"/>
										</a>
										<?
											}
										?>
										<td width="10px;">&nbsp;</td>
										<td>
											<?=$val['brief']?>
										</td>
									</tr>
									<?php
										}	
									}
									else{
										pr("<center>Tidak Ada Data</center>");
									 }
									?>

								</table>
								
								<?php
									generate_paging($paging,$url);
								?>
							
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>