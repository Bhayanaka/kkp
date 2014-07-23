<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Peraturan</a></li>
								  <li class="active">Peraturan Pemerintah
</li>
								</ul>
								<h3 class="text-primary">Peraturan Pemerintah
</h3>
								<hr/>
								
								<div class="form-group">
									<form method="POST" action="<?=$basedomain;?>peraturan/search_peraturan/">
								  <label class="control-label">Masukkan Kata Kunci Untuk Pencarian</label>
								  <div class="input-group">
									<span class="input-group-addon">
										<select name="tahun" class="span2">
											<option value="" >Tahun</option>
											<?=getData_tahun(2010)?>
										</select>
									</span>
									<input type="text" class="form-control" name="title" placeholder="Kata Kunci">
									<input type="hidden" name="kategori" value="2" />
									<input type="hidden" name="namakategori" value="Peraturan Pemerintah" />
									<span class="input-group-btn">
									 <input type="submit" class="btn btn-primary" name="search" value="Cari"/>
									</span>
								  </div>
								  </form>
								</div>
								
								<table class="tb_produk_dokumen">
								<?php
								if($data){	
									if(isset($_GET['page'])){$no=(($_GET['page']-1)*$jml_data+1);} else {$no=1;}
									foreach($data as $key=>$val){
									//$path=explode("/", $val['files']);				
									if($val['files'] != ''){
											$patch = explode("/", $val['files']);
											$directory= $patch[0];
											$file = $patch[1];
											$download_file ="<a class=\"btn btn-success btn-xs btn_max\"  href=\"{$basedomain}public_assets/{$directory}/{$file}\"><span class=\"glyphicon glyphicon-save\"></span>Unduh Dokumen <i class=\"icon-arrow-down icon-white\"></i> </a>";
										}else{
											$directory = '-';
											$file = '-';
											$download_file="";
										}
									
								?>
									<tr>
										<td class="text-primary"><b><?=$val['title']?></b>
											<table class="tb_padding">
												<tr>
													<td width="130px;">Tanggal Terbit</td>
													<td>:</td>
													<td><?=$val['postdate']?></td>
												</tr>
												<tr>
													<td>Tentang</td>
													<td>:</td>
													<td><?=$val['deskripsi']?></td>
												</tr>
												<tr>
													<td>Kategori</td>
													<td>:</td>
													<td>
													<?php
														if($kategori){	
															foreach($kategori as $keykat=>$valkat){
																if($valkat['id']==$val['articletype']){
																	echo $valkat['value'];
																}
															}
														}
													?>
													</td>
												</tr>
												<tr>
													<td>File Lampiran</td>
													<td>:</td>
													<td><?=$download_file?>
														
													</td>
												</tr>
											</table><br/>
										</td>
									</tr>
									
								<?php
									}
							// untuk menampilkan paging pada halaman view
							//generate_paging($paging,$url);
								}else{
									echo "<tr><td colspan=\"3\" align=\"center\">Tidak Ada Data</td></tr>";
								//	pr("<center>Tidak Ada Data</center>"); 
								
								}
								?>
								</table>
								
								<?=generate_paging($paging,$url);?>
															
							</div>
							<div class="col-md-4">
								 <?=$sidebar?>									
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>