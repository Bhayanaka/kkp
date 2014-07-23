
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
								  <li><a href="#">Produk</a></li>
								  <li><a href="#">Dokumen Perencanaan WP-3-K </a></li>
								  <li class="active"><?=$data['item']['type'][0]['value']?></li>
								</ul>
								<h3 class="text-primary">Index <?=$data['item']['type'][0]['value']?></h3>
								<hr/>
								
								<div class="form-group">
								  <form class="form-inline" method="post" action="<?=$basedomain?>dok_perencanaan/typewp3k/?type=<?=$_GET['type']?>">
								  <div class="input-group">
									<span class="input-group-addon">
										<select class="span3" name="category">
											<option value="0">Semua Kategori</option>
												<?php
													foreach($data['item']['category'] as $val){
														echo "<option value='".$val['id']."_".$val['value']."'>{$val['value']}</option>";
													}
												?>
											</select>
									</span>
									<span class="input-group-addon">
										<?php
											provLocation($data['lokasi'],'on'); echo "&nbsp;";
											kabLocation('off');
										?>
									</span>
									
								  </div>
								   <div class="input-group">
								  <input type="text" class="form-control" name="keywords" placeholder="Kata Kunci">
									<span class="input-group-btn">
									  <button class="btn btn-primary"  type="submit">Cari</button>
									</span>
									</div>
								  </form>
								  <?php
									if(isset($_SESSION['search'])){
									?>
									<p style="margin-right:50px">
										Hasil Pencarian : <i>
										<font color="blue"><?=$_SESSION['search']['value']?></font>&nbsp;
										<?
										if($_SESSION['search']['keywords']){
											echo"+ <font color=\"blue\">";
											echo $_SESSION['search']['keywords'];
										}
										?></font>
										<?
											if($prov){
											echo"+ <font color=\"blue\">";
											echo $prov;
											}
										?></font>
											<?php
											if($kab){
											echo"+ <font color=\"blue\">";
											echo $kab;
											}
											?>
										</font>
										</i>
									</p>
									<?php
									}
									?>
								</div>
								<?php
								// pr($data['content']);
								$no=1;
								if($data['content']){
									if(isset($_GET['page'])){$no=(($_GET['page']-1)*$paging['item_per_page']+1);} else {$no=1;}
									foreach($data['content'] as $key=>$val){
								?>
								<table class="tb_produk_dokumen">
									<tr>
										<td><?=$no?></td>
										<td>&nbsp;</td>
										<td>
										<?php
										if($val['image']){
										// echo $no
										?>
										<img width="136px" height="188px" src="<?=$basedomain."public_assets/".$val['image']?>" /></td>
										<?php }else{
										?>
										<img width="136px" height="188px" src="<?=$basedomain?>public_assets/noImageAvailable.jpg"/></td>
										<?php
										}
										?></td>
										<td width="10px;">&nbsp;</td>
										<td class="text-primary"><b><?=$val['title']?></b>
											<table class="tb_padding">
												<tr>
													<td width="130px;">Tahun Penyusunan</td>
													<td>:</td>
													<td><?=$val['tahun']?></td>
												</tr>
												<tr>
													<td>Jumlah Halaman</td>
													<td>:</td>
													<td><?=$val['jml_hal']?></td>
												</tr>
												<tr>
													<td>Lampiran</td>
													<td>:</td>
													<td><?=$val['lampiran']?></td>
												</tr>
												<tr>
													<td>Abstraksi</td>
													<td>:</td>
													<td><?=$val['content']?></td>
												</tr>
												<tr>
													<td>Deskripsi</td>
													<td>:</td>
													<td><?=$val['brief']?></td>
												</tr>
												<tr>
													<td>Kata Kunci</td>
													<td>:</td>
													<td>
													<?php 
													$text=$val['thumbnailimage'];
													$ex = explode(" ",$text);
													$count = sizeof($ex);
													for ($i = 0; $i < $count; $i++) {
													?>
														<span class="label label-primary">
															<i><?=$ex[$i]?></i>
														</span>&nbsp;
													<?php 
													}
													?>
													</td>
												</tr>
												<tr>
													<td>File Lampiran </td>
													<td>:</td>
													<td>
													<?php
														
														if($val['file']){
															$i=1;
															// pr($val['file']);
															foreach($val['file'] as $key=>$files){
															if($i<4){
																// echo "masukkkkk";
																?>
																<a class="fancybox" title="" data-fancybox-group="gallery"  href="<?=$basedomain."public_assets/".$files['files']?>">
																	<button type="button" class="btn btn-success btn-xs btn_max"
																		title="Dokumen Final">
																	   <span class="glyphicon glyphicon-save"></span>
																	 <?=$files['thumbnail']?>
																	</button></a>
																	
																<?php
																}else{
																// echo "sini";
																?>
																</td>
																</tr>		
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																	<td>
																		<a class="fancybox" title="" data-fancybox-group="gallery" href="<?=$basedomain."public_assets/".$files['files']?>">
																	<button type="button" class="btn btn-success btn-xs btn_max"
																		title="Dokumen Final">
																	   <span class="glyphicon glyphicon-save"></span>
																	 <?=$files['thumbnail']?>
																	</button></a>
																	</td>
																<?php
																}
																// echo $i;
																	$i++;
																}
															}
															?>
													</tr>
											</table>
											
										</td>
									</tr>

								</table>
								<?php
									$no++;
									}
								} else {pr("<center>Tidak Ada Data</center>");} 
								
									generate_paging($data['paging'],$data['url'],"&type=".$_GET['type']);
								?>
							
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>