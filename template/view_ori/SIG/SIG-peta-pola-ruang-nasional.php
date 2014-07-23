<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/	
	$title_menu=array('Produk','Program','Aplikasi');
	$link_menu=array('dok_perencanaan/typewp3k/?type=1','program/strategis','minapolitan/polaruangnasional');
	//sub_top_menu('bg_ungu','m4',$title_menu,$link_menu);
	sub_top_menu('bg_ungu');
	
	$title_page=array('Aplikasi','SIG Pengelolaan Pesisir dan Pulau - Pulau Kecil','Peta Struktur Ruang','Nasional');
	$link_title_page=array('#','#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
	box_legend('box_legend_2',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Peta Pola Ruang - Nasional</h3>
						<form method="post" action="<?=$basedomain?>minapolitan/searchSigPola" class="form-inline" >
							<div class="controls">
								<input class="span10" type="text" name="keywords" placeholder="Kata Kunci">&nbsp;
								<button type="submit" class="btn" name="search">Cari</button>
								<input class="" type="hidden" name="type" value="1">&nbsp;	
								<input class="" type="hidden" name="categoryid" value="33">&nbsp;	
								
							</div>
						</form>
						<!--<p style="margin-left:50px">
							Hasil Pencarian kategori: <i>
							<font color="blue">Nasional</font>
							</i>
						</p>-->
						<?php
						
						$limit = $paging[item_per_page];
						if ($data){
							if(isset($_GET['page']))
							{
								if($_GET['page'] == 1){
									$no = 1;
								}else{
									$no = ((($_GET['page'] - 1) * $limit) + 1);	
								}
							}else {
								$no=1;
							}
						// pr($data);	
						foreach ($data as $val){
						if($val['file'][0]['files'] != ''){
							$patch_naskah = explode("/", $val['file'][0]['files']);
							$directory_naskah = $patch_naskah[0];
							$directory_naskah_again = $patch_naskah[1];
							$file_naskah = $patch_naskah[2];
							
							$download_file_1 = "<a class=\"btn btn-mini btn-success fancybox\" href=\"{$basedomain}public_assets/{$directory_naskah}/{$directory_naskah_again}/{$file_naskah}\">Unduh Peta&nbsp;<i class=\" icon-arrow-down icon-white\"></i></a>";
							$download_file_2 = "<a class=\"btn btn-mini btn-success fancybox\" href=\"{$basedomain}public_assets/{$directory_naskah}/{$directory_naskah_again}/{$file_naskah}\">Lihat Peta&nbsp;<i class=\" icon-eye-open icon-white\"></i></a>";
										
						}else{
							$directory_naskah = '-';
							$file_naskah = '-';
							$download_file_1 =""; 
							$download_file_2 =""; 
						}
						?>
						<table class="peraturan" border="0">
							<tr>
								<td><b><?=$no?></b></td>
								<td rowspan="5" class="img">
								<?php 
									if($val['image']){
									?>
									<img src="<?=$basedomain?>public_assets/<?=$val['image']?>" width="136px" height="188px" /></td>
								<?php									
									}
								?>
								<td width ="100px">Tahun Kegiatan</td>
								<td>:</td>
								<td><?=$val['tahun']?></td>
							</tr>
							<tr>
								<td rowspan="4"></td>
								<td colspan="3">
									<b><i><?=$val['title']?></i></b>
								</td>
							</tr>
							<tr>
								<td>Lokasi Kegiatan</td>
								<td>:</td>
								<td>	
									<?php foreach ($provinsi as $value){
									if($value['kode_wilayah'] == $val['id_provinsi']){
										$namaprov = $value['nama_wilayah'];
									}else{
										$namaprov = "";
									}
									?>
									<?=$namaprov?>
									<?php 
									}
									?>
								</td>
							</tr>
							<tr>
								<td>Abstraksi</td>
								<td>:</td>
								<td><?=$val['content']?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>
								<?php
							       echo $download_file_1 ;
								   echo "&nbsp;&nbsp;";
							       echo $download_file_2 ;
								?>
								</td>
							</tr>
						</table>
						<?php
						$no++;
						}
						generate_paging($paging,$url);
						}
						else{

							pr("<center>Tidak Ada Data</center>");
			}
					?>
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
		