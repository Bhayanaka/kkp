<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	sub_top_menu('bg_orange');
	
	$title_page=array('Peraturan','Instruksi Presiden');
	$link_title_page=array('#','#');
	box_legend('box_legend_2',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Instruksi Presiden</h3>
						<div class="controls controls-row">
							<form  method="POST" action="<?=$basedomain;?>peraturan/search_peraturan/">
								
							<input type="hidden" name="kategori" value="5" />
								<select name="tahun" class="span2">
									<option value="">Tahun</option>
									<?=getData_tahun(2010)?>
								</select>
								<input type="text" name="title" class="span7" placeholder="Kata Kunci"/>&nbsp;&nbsp;
								<input type="submit" class="btn span2" name="search" value="Cari"/>
							</form>
						</div>
						<?php
						if($data){	
						if(isset($_GET['page'])){$no=(($_GET['page']-1)*$jml_data+1);} else {$no=1;}
							foreach($data as $key=>$val){
							if($val['files'] != ''){
									$patch = explode("/", $val['files']);
									$directory= $patch[0];
									$file = $patch[1];
									$download_file ="<a class=\"btn btn-success\"  href=\"{$basedomain}public_assets/{$directory}/{$file}\">Unduh Dokumen <i class=\"icon-arrow-down icon-white\"></i> </a>";
								}else{
									$directory = '-';
									$file = '-';
									$download_file="";
								}
							echo'<table class="peraturan">
							<tr>
								<td><b>'.$no++.'</b></td>
								<td colspan="3"><b>'.$val['title'].'</b></td>
							</tr>
							<tr>
								<td rowspan="5"></td>
								<td>Tanggal Terbit</td>
								<td>:</td>
								<td>'.$val['postdate'].'</td>
							</tr>
							<tr>
								<td>Tentang</td>
								<td>:</td>
								<td>'.$val['deskripsi'].'</td>
							</tr>
							<tr>
								<td>Ketegori</td>
								<td>:</td>
								<td>';
								if($kategori){	
										foreach($kategori as $keykat=>$valkat){
											if($valkat['id']==$val['articletype']){
												echo $valkat['value'];
											}
										}
									}
								
							echo'</td>
							</tr>
							<tr>
								<td></td>
								<td></td>';
							echo"<td>$download_file</td>								
							</tr>
						</table>";
							}
							// untuk menampilkan paging pada halaman view
							generate_paging($paging,$url);
						}else{
							echo "<br />";
							pr("<center>Tidak Ada Data</center>"); 
						
						}
						?>
						
						
						
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>