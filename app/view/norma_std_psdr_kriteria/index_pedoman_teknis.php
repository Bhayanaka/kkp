	
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
								  <li><a href="#">Norma,Standart,Prosedur & Kriteria</a></li>
								  <li class="active">Pedoman Teknis</li>
								</ul>
								<h3 class="text-primary">Index Pedoman Teknis</h3>
								<hr/>
								
								<div class="form-group">
								<form action="<?=$basedomain.'norma_std_psdr_kriteria_c/pedoman_teknis/'?>" method="post">
								  <label class="control-label">Masukkan Kata Kunci Untuk Pencarian</label>
								  <div class="input-group">
									<input type="text" class="form-control" name="cari" placeholder="Kata Kunci">
									<span class="input-group-btn">
									  <button class="btn btn-primary" name="search" type="submit">Cari</button>
									</span>
								  </div>
								  </form>
								  <?php 
									if($hsl_cri){
									echo"<p style=\"margin-left:50px\">
											Hasil Pencarian: <i><font color=\"blue\">";
										if($hsl_cri){echo $hsl_cri;} else {echo "-";}
										echo"</font>
										</i>
									</p>";
									}else{
									}
									?>
								</div>
								<?php
									// pr($data);
									$limit = $paging[item_per_page];
									if ($news){
										if(isset($_GET['page']))
											{
												if($_GET['page'] == 1){
													$no = 1;;
												}else{
													$no = ((($_GET['page'] - 1) * $limit) + 1);	
												}
											} else {
												$no=1;
											}
										foreach ($news as $val){
											$img = $val['image'];
											$a = explode('/',$img);
											$dir = $a[0];
											$file = $a[1];
									?>
								<table class="tb_produk_dokumen">
									<tr>
										<td><?=$no?></td>
										<td>&nbsp;</td>
										<td>
										<?php if($file !=''){?>
											<img width="136" height="188" src="<?=$basedomain?>public_assets/norma/<?php echo $file;?>" />
										<?php }else{
										?>										
											<img width="136px" height="188px" src="<?=$basedomain?>public_assets/noImageAvailable.jpg"/></td>
										<?php
										} ?>
										</td>
										<td width="10px;">&nbsp;</td>
										<td class="text-primary"><b><?=$val['title'];?></b>
											<table class="tb_padding">
												<tr>
													<td width="130px;">Tahun Penyusunan</td>
													<td>:</td>
													<td><?=$val['tahun'];?></td>
												</tr>
												<tr>
													<td>Jumlah Halaman</td>
													<td>:</td>
													<td><?=$val['jml_hal'];?></td>
												</tr>
												<tr>
													<td>Lampiran</td>
													<td>:</td>
													<td><?=$val['lampiran'];?></td>
												</tr>
												<tr>
													<td>Abstraksi</td>
													<td>:</td>
													<td><?=$val['content'];?></td>
												</tr>
												<tr>
													<td>Deskripsi</td>
													<td>:</td>
													<td><?=$val['brief'];?></td>
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
													<td>File Lampiran</td>
													<td>:</td>
													<td>
														<?php
															if ($val['file']){
																$i=1;
																foreach ($val['file'] as $value){
																if($i<4){
																$imgs = $value['files'];
																$b = explode('/',$imgs); 
																$dirs = $b[0];
																$files = $b[1];
															?>
															<a class="fancybox" href="<?=$basedomain?>public_assets/norma/<?php echo $files;?>">
															<button type="button" class="btn btn-success btn-xs btn_max"
															title="Dokumen Final">
														   <span class="glyphicon glyphicon-save"></span>
															<?=$value['thumbnail'];?>
															</button></a>															
															<?php
																}else{
																?>
																</td>
																</tr>		
																<tr>
																	<td>&nbsp;</td>
																	<td>&nbsp;</td>
																	<td>
																		<a class="fancybox" title="" data-fancybox-group="gallery" href="<?=$basedomain?>public_assets/norma/<?php echo $files;?>">
																	<button type="button" class="btn btn-success btn-xs btn_max"
																		title="Dokumen Final">
																	   <span class="glyphicon glyphicon-save"></span>
																	 <?=$value['thumbnail'];?>
																	</button></a>
																	</td>
																<?php
																}
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
								}else{
								?>	
								<pre><center>Tidak Ada Data</center></pre>
								<?php } ?>
								
								
								<?php
									generate_paging($paging,$url);
								?>
							
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>