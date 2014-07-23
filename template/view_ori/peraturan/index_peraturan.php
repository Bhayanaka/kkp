<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	sub_top_menu('bg_orange');
	
	$title_page=array('Peraturan','Standar Nasional Indonesia');
	$link_title_page=array('#','#');
	box_legend('box_legend_2',$title_page,$link_title_page);//<!--LEGEND 2 BIAR AGAK NAIK-->
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Peraturan</h3>
						<form class="bs-docs-example form-inline" method="POST" action="<?=$basedomain;?>peraturan/search_peraturan/">
							<select name="kategori">
								<option>Pilih Kategori Peraturan</option>
								<?php
									if($kategori){	
										$i=1;
										foreach($kategori as $key=>$val){
											echo'<option value="'.$val['id'].'">'.$val['value'].'</option>';
										}
									}
								?>
							</select>
							<select name="tahun">
								<option value="">Tahun</option>
								<?=getData_tahun(2010)?>
							</select>
							<input type="text" name="title" style="width:200px" placeholder="Kata Kunci">
							<input type="submit" class="btn" name="search" value="Cari"/>
						</form><br/>
					
						<h3> Data Tidak Ditemukan</h3>
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>