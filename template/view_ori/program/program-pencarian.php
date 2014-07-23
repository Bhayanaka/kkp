<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Produk','Program','Aplikasi');
	$link_menu=array('dok_perencanaan/typewp3k/?type=1','program/strategis','minapolitan/polaruangnasional');
	//sub_top_menu('bg_ungu','m4',$title_menu,$link_menu);
	sub_top_menu('bg_ungu');
	
	$title_page=array('Produk','Pencarian');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Program - Pencarian</h3>
						
						<form method="post" action="<?=$basedomain?>program/searchProgram" class="form-inline" >
							<div class="controls">
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
								<?php //pr($data['type']);?>
							</select>&nbsp;
								<input class="span4" type="text" name="keywords" placeholder="Kata Kunci">
								<input class="span10" type="hidden" name="type" value="<?=$type?>">&nbsp;	
								<button type="submit" class="btn" name="search">Cari</button>
							</div>
						</form>
						
						<p style="margin-right:50px">
								Hasil Pencarian : <font color="blue"><i>
								
								<?php
								foreach ($kategori as $key => $value){
									if($value['id'] == $param_cat){
										$cgtr = $value['value'];
										echo $cgtr;
									}
								}
								?>
								</i></font> 
								<?php 
								if ($param_search !=''){
								?>
								+ <font color="blue"><i><?=$param_search?></i></font>
								<?php
								}
								if ($prov !=''){
								?>
								+ <font color="blue"><i><?=$prov?></i></font>
								<?php
								}
								if ($kab !=''){
								?>
								+ <font color="blue"><i><?=$kab?></i></font>
								<?php
								}
								?>
							</p>
						<?php 
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
								/*if($val['file'][0]['files'] != ''){
									$patch_naskah = explode("/", $val['file'][0]['files']);
									$directory_naskah = $patch_naskah[0];
									$file_naskah = $patch_naskah[1];
									$download_file_1 = "<a class=\"btn btn-mini btn-success\" href=\"{$basedomain}public_assets/{$directory_naskah}/{$file_naskah}\">Naskah akademis&nbsp;<i class=\"icon-arrow-down icon-white\"></i></a>";
								}else{
									$directory_naskah = '-';
									$file_naskah = '-';
									$download_file_1 =""; 
								}
								
								if($val['file'][1]['files'] != ''){
									$patch_peta_pola = explode("/", $val['file'][1]['files']);
									$directory_peta_pola = $patch_peta_pola[0];
									$file_peta_pola = $patch_peta_pola[1];
									$download_file_2 ="<a class=\"btn btn-mini btn-success\" href=\"{$basedomain}public_assets/{$directory_peta_pola}/{$file_peta_pola}\">Peta Pola Ruang&nbsp;<i class=\" icon-arrow-down icon-white\"></i></a>";
								
								}else{
									$directory_peta_pola = '-';
									$file_peta_pola = '-';
									$download_file_2 ="";
								}
								
								if($val['file'][2]['files'] != ''){
									$patch_peta_struktur = explode("/", $val['file'][2]['files']);
									$directory_peta_struktur = $patch_peta_struktur[0];
									$file_peta_struktur = $patch_peta_struktur[1];
									$download_file_3 ="<a class=\"btn btn-mini btn-success\" href=\"{$basedomain}public_assets/{$directory_peta_struktur}/{$file_peta_struktur}\">Peta Struktur Ruang&nbsp;<i class=\" icon-arrow-down icon-white\"></i></a>";
								}else{
									$directory_peta_struktur = '-';
									$file_peta_struktur = '-';
									$download_file_3 ="";
								}*/
						echo"<table class=\"peraturan\" border=\"0\">
							
							<tr>
								<td><b>$no</b></td>
								<td rowspan=\"6\" class=\"img\">";
								echo $cover;
								echo"<td colspan=\"3\">
									<b><i>{$val['title']}</i></b>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td style=\"width:130px\">Tahun Pembuatan</td>
								<td style=\"width:5px\">:</td>
								<td>{$val['tahun']}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Jumlah Halaman</td>
								<td>:</td>
								<td>{$val['jml_hal']}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Lampiran</td>
								<td>:</td>
								<td>{$val['lampiran']}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Abstraksi</td>
								<td>:</td>
								<td>{$val['content']}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Dokumen</td>
								<td>:</td>
								<td>";
								if($val['file']){
									foreach($val['file'] as $key=>$files){
									?>
									<p><a class="btn btn-mini btn-success fancybox" href="<?=$basedomain."public_assets/".$files['files']?>"><?=$files['thumbnail']?>&nbsp;<i class="icon-arrow-down icon-white"></i></a></p>
									<?php
									}
								}
								echo"</td>
							</tr>
						</table>";
						
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
<!-- Batas Akhir dari Isi Content-->