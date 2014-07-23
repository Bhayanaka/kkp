
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
								  <li><a href="#">Program</a></li>
								  <li class="active">Program - Penyusunan Rencana Zonasi  WP-3-K</li>
								</ul>
								<h3 class="text-primary">Program - Penyusunan Rencana Zonasi  WP-3-K</h3>
								<hr/>
								
								<div class="form-group">
								<form method="post" action="<?=$basedomain?>program/searchProgram" class="form-inline">	
								  <label class="control-label">Masukkan Kata Kunci Untuk Pencarian</label>
								  <div class="input-group">
									<span class="input-group-addon">
										<select name="categoryid" class="span5" >
											<option value="">- Pilih Kategori  -</option>
												<?php
												if($kategori){
												foreach ($kategori as $key => $value){
												?>
												<option value="<?=$value['id']?>"><?=$value['value']?></option>
												<?php
													}
												}
											?>	
										</select>
									</span>
									<input type="text" class="form-control" name="keywords" placeholder="Kata Kunci">
									<input class="span10" type="hidden" name="type" value="<?=$type?>">
									<span class="input-group-btn">
									  <button type="submit" class="btn btn-primary" name="search" >Cari</button>
									</span>
								  </div>
								</div>
								</div>
									<?php 
										$no = 1;
										// pr($data);
										$limit = $paging[item_per_page];
										if($data){
											if(isset($_GET['page']))
											{
												if($_GET['page'] == 1){
													$no = 1;
												}else{
													$no = ((($_GET['page'] - 1) * $limit) + 1);	
												}
											} else {
												$no=1;
											}
										foreach ($data as $key=>$val){
											// $path_cover = explode("/", $val['image']);
											if($val['image'] !=''){
												$path_cover = explode("/", $val['image']);
												$cover = "<img width=\"136px\" height=\"188px\" src=\"{$basedomain}public_assets/{$path_cover[0]}/{$path_cover[1]}\" >";
											
											}
										?>
								<table class="tb_produk_dokumen">
									<tr>
										<td><?=$cover?></td>
										<td width="10px;">&nbsp;</td>
										<td class="text-primary"><b><?=$val['title']?></b>
											<table class="tb_padding">
												<tr>
													<td width="130px;">Tahun Penyusunan</td>
													<td>:</td>
													<td><?=$val['tahun']?></td>
												</tr>
												<tr>
													<td>Jumlah Dokumen</td>
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
													<td>File Lampiran</td>
													<td>:</td>
													<td>
													<?php
													if($val['file']){
														foreach($val['file'] as $key=>$files){
														?>
														<a href="<?=$basedomain."public_assets/".$files['files']?>">
														<button type="button" class="btn btn-success btn-xs btn_max"
															title="Dokumen Final">
														   <span class="glyphicon glyphicon-save"></span>
														  <?=$files['thumbnail']?>
														</button>
														</a>
														<?php
														}
													}
													?>
														
													</td>
												</tr>
											</table>
											
										</td>
									</tr>

								</table>
								<?php
									$no++;
										}
									
									}
									else{
										pr("<center>Tidak Ada Data</center>"); 
									}
					
								
									generate_paging($paging,$url);
								?>
							
							</div>
							
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>