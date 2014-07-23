<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Produk','Program','Aplikasi');
	$link_menu=array('dok_perencanaan/typewp3k/?type=1','program/strategis','minapolitan/polaruangnasional');
	//sub_top_menu('bg_ungu','m4',$title_menu,$link_menu);
	sub_top_menu('bg_ungu');
	
	$title_page=array('Produk','Norma, Standart, Prosedur dan Kriteria','Pedoman Teknis');
	$link_title_page=array('#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
						<h3>Produk - Pedoman Teknis</h3>
						
						<form action="<?=$basedomain.'norma_std_psdr_kriteria_c/pedoman_teknis/'?>" method="post" class="form-inline" >
							<div class="controls">
								<input class="span10" type="text" name="cari" placeholder="Kata Kunci">
								<button type="submit" name="search" class="btn">Cari</button>
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
						<table class="peraturan" border="0">
						<?php
						$limit = $paging[item_per_page];
						// pr($news);
						if ($news){
							foreach ($news as $val){
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
								$img = $val['image'];
								$a = explode('/',$img);
								$dir = $a[0];
								$file = $a[1];
						?>
							<tr>
								<td><b><?= $no;?></b></td>
								<td rowspan="6" class="img">
								<?php if($file !=''){?>
								<img width="136" height="188" src="<?=$basedomain?>public_assets/norma/<?php echo $file;?>" /></td>
								<?php } ?>
								<td colspan="3"><b><i><?= $val['title'];?></i></b></td>
							</tr>
							<!--<tr>
								<td rowspan="6"></td>
								<td colspan="3">
									<b><i><?= $val['title'];?></i></b>
								</td>
							</tr>-->
							<tr>
								<td rowspan="5"></td>
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
									// pr($val['file']);
									if ($val['file']){
										foreach ($val['file'] as $value){
											$imgs = $value['files'];
											$b = explode('/',$imgs); 
											$dirs = $b[0];
											$files = $b[1];
									?>

									<p><a class="btn btn-mini btn-success fancybox" href="<?=$basedomain?>public_assets/norma/<?php echo $files;?>"><?= $value['thumbnail'];?>&nbsp;<i class=" icon-arrow-down icon-white"></i></a></p>							

									<?php
										}
									}	
									?>									
								</td>
							</tr>
						<?php 
						$no++;
							} 
						}else{
						?>	
						<pre><center>Tidak Ada Data</center></pre>
						<?php } ?>
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
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>
<!-- Batas Akhir dari Isi Content-->