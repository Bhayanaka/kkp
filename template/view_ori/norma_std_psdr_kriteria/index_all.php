<?php
//Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view		
	$title_menu=array('Produk','Program','Aplikasi');
	$link_menu=array('dok_perencanaan/typewp3k/?type=1','program/strategis','minapolitan/polaruangnasional');
	//sub_top_menu('bg_ungu','m4',$title_menu,$link_menu);
	sub_top_menu('bg_ungu');
	
	
	$title_page=array('Produk','Norma, Standart, Prosedur dan Kriteria');
	$link_title_page=array('#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Produk - Norma, Standart, Prosedur dan Kriteria</h3>
						<form action="<?=$basedomain.'norma_std_psdr_kriteria_c/index/'?>" method="post" class="form-inline" >
							<div class="controls">
								<select class="span7">
									<option value="">Semua</option>
									<option value="1">Pedoman Umum</option>
									<option value="2">Pedoman Teknis</option>
									<option value="3">Modul Pelatihan</option>
								</select>
								<input class="span4" type="text" name="cari" placeholder="Kata Kunci">
								<button type="submit" name="search" class="btn">Cari</button>
							</div>
						</form>
						<p style="margin-left:50px">
							Hasil Pencarian kategori: <i>
							<font color="blue">Nasional / Perairan Yuridiksi</font>&nbsp;+&nbsp;
							<font color="blue">album peta</font>
							</i>
						</p>
						<table class="peraturan" border="0">
						<?php
						
						$i = 1;
						if (isset($news)){
							foreach ($news as $val){
						?>
							<tr>
								<td><b><?= $i;?></b></td>
								<td rowspan="7" class="img"><img src="<?=$basedomain?>/upload/buku.jpg" /></td>
								<td colspan="3"><b><?= $val['postdate'];?></b></td>
							</tr>
							<tr>
								<td rowspan="6"></td>
								<td colspan="3">
									<b><i><?= $val['title'];?></i></b>
								</td>
							</tr>
							<tr>
								<td style="width:130px">Tahun Penyusunan</td>
								<td style="width:5px">:</td>
								<td><?= $val['tahun'];?></td>
							</tr>
							<tr>
								<td>Jumlah Halaman</td>
								<td>:</td>
								<td><?= $val['jml_hal'];?></td>
							</tr>
							<tr>
								<td>Lampiran</td>
								<td>:</td>
								<td><?= $val['lampiran'];?></td>
							</tr>
							<tr>
								<td>Abstraksi</td>
								<td>:</td>
								<td><?= $val['content'];?>
								</td>
							</tr>						
							<tr>
								<td>Dokumen</td>
								<td>:</td>
								<td>
									<?php
									if ($val['file']){
										foreach ($val['file'] as $value){
									?>
									<p><a class="btn btn-mini btn-success" href="#"><?= $value['title'];?>&nbsp;<i class=" icon-arrow-down icon-white"></i></a></p>
									<?php
										}
									}	
									?>									
								</td>
							</tr>
						<?php 
						$i++;
							} 
						}
						?>	
						</table>
						<div class="row-fluid">
							 <div class="span12">
								<div class="pagination" align="center">
									<?php
									// untuk menampilkan paging pada halaman view
									generate_paging($paging,$url);
									?>

								</div>
							</div>
						</div>
						
				  </div>
				  <?php box_kanan('produk');?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->