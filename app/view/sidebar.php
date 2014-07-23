

<!--Foto kegiatan -->
	
	<?php


	if (isset($album)){
		
		echo '<br/>
		<i>
		<h4><a href="'.$basedomain.'informasi_terkini/informasi_gallery" class="sub_head">'.$foto.'</a></h4>
		</i>
		<hr>';
		
		?>
		
		<?php
		// vd($album);
		
		if ($album){
			$i=1;
			$j=1;
			$total = count($album);
			echo"<div class=\"side_blue_block\">
			<table class=\"table_foto_side\">";
			if ($album){
				// pr($album);
				foreach ($album as $val){
					// pr ($foto);
					if($i==1){
						echo "<tr>";
						
					}
					?>
					<td><a href="<?=$basedomain?>informasi_terkini/informasi_gallery_detail/?id=<?=$val['id']?>"><img src="<?=$basedomain?>public_assets/<?php echo $val['image']?>" title="<?=$val['title']?>" width="80px" /></a></td>
								
					<?php
					$i++;
					$j++;
					if($i>3 || $j>$total){
						echo "</tr>";
						$i=1;
					}
				}
			}
			echo"</table><br/>
				<center><p><a href=\"{$basedomain}informasi_terkini/informasi_gallery\"><strong>Index Foto Kegiatan</strong></a><br/></p></center>
								</div>";
								
		}else{
		echo"<center>";
		pr('Tidak Ada Data');
		echo"</center>";
		
		}
	}
	?>
		
	<!--video -->

		
	<?php
	
	if (isset($video)){
	
		echo '<br/><i><h4><a href="'.$basedomain.'/informasi_terkini/informasi_video" class="sub_head">'.$titlevideo.'</a></h4></i><hr>';
		if($video){
		echo"<div class=\"side_blue_block\">
			<table class=\"table_foto_side\">";
			foreach ($video as $val){
			//echo $val['image']
			?>
			<tr>
											<td><a href="">
													
													<div class="box_video">
														<a href="<?=$basedomain?>informasi_terkini/informasi_video_detail/?id=<?=$val['id']?>">
														<video width="100%" style="margin:5px 10px 0px 0px">
														<source src="<?=$basedomain?>public_assets/<?php echo $val['image']?>">
														
														</video></a>
														<div class="video"><div class="arrow-right"></div></div>
													</div><br/>
													<a href="<?=$basedomain?>/informasi_terkini/informasi_video"><strong>Index Video Kegiatan</strong></a>
													
													
												</a>
											</td>
										</tr>
			<?php
			}
			echo"</table>
				</div>";
		}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";	
		
		}
	}
	?>
	
	<!---BERITA TERKINI-->
	
	<?php
	
	if (isset($berita)){
	
		echo '<br/><i><h4><a href="'.$basedomain.'berita/info_berita" class="sub_head">'.$judulberita.'</a></h4></i><hr>';
		echo"	<div class=\"side_blue_block\">";
		if ($berita){
			// echo "masukkkkkkk";
			// pr($berita);
			foreach ($berita as $val){
			?>
				<p>
					<small><?=date2Ind($val['postdate'])?></small></br>
					<a href="<?=$basedomain?>berita/info_berita_detail/?id=<?=$val['id']?>" ><b><?=$val['title']?></b></a>
					<small><?=$val['brief']?></small></br>
				</p>
				
			<?php
			}
		}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";
		
		}
		echo"<center><p><a href=\"{$basedomain}berita/info_berita\"><strong>Index Berita</strong></a><br/></p>
			 </center></div>";
		
	}
	?>
	
	<!---link-->
	<?php
	if (isset($link)){
	// echo "masukkk";
		// echo '<h3>'.$judulagenda.'</h3>';
		echo '<br/><i><h4><a href="'.$basedomain.'/kontak" class="sub_head">'.$judullink.'</a></h4></i><hr>';
		echo"<div class=\"panel panel-default\">
			<div class=\"panel-body\">
			<table>";
		// pr($link);	
		if ($link){
			foreach($link as $key=>$values){
			?>
				<tr>
					<td width="45px">
					<?php 
						if($values['image']){
					?>
					<img src="<?=$basedomain?>public_assets/<?=$values['image']?>" width="30px"/></td>
					<?php
						}					
					?>
					<td><h5><a href="<?="https://".$values['brief']?>"><?=$values['title']?></a></h5></td>
				</tr>
			<?php
				}
		}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";
		}
		echo"</table>";
		echo"</div>";
		echo"</div>";

		// echo '<p><a href="">Index Agenda</a></p>';
		
	}
	?>
	
	
	
	<!---AGENDA-->
	<?php
	if (isset($agenda)){
		// echo '<h3>'.$judulagenda.'</h3>';
		echo '<br/><i><h4><a href="'.$basedomain.'/berita/info_agenda" class="sub_head">'.$judulagenda.'</a></h4></i><hr>';
		echo"	<div class=\"side_blue_block\">";
		if ($agenda){
			foreach ($agenda as $val){
			?>
			<p><small><?=date2Ind($val['postdate'])?></small>
			<br>
			<a href="<?=$basedomain?>berita/info_agenda_detail/?id=<?=$val['id']?>" ><?=$val['title']?></a>
			<small><?=$val['brief']?></small></br>
			</p>
			<?php
			}
		}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";
		
		}
		echo"<center><p><a href=\"{$basedomain}berita/info_agenda\"><strong>Index Agenda</strong></a><br/></p>
			 </center></div>";

		// echo '<p><a href="">Index Agenda</a></p>';
		
	}
	?>
	
	<!--Opini -->
	<?php
	
	if (isset($opini)){
		echo '<br/><i><h4><a href="'.$basedomain.'berita/info_opini" class="sub_head">'.$judulopini.'</a></h4></i><hr>';
		echo"<div class=\"side_blue_block\">";
		if ($opini){
			foreach ($opini as $val){
			?>
			<p>
				<small><?=date2Ind($val['postdate'])?></small></br>
				<a href="<?=$basedomain?>berita/info_opini_detail/?id=<?=$val['id']?>" ><b><?=$val['title']?></b></a>
				<small><?=$val['brief']?></small></br>
			</p>
			<?php
			}
		}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";
		
		}
		echo"<center><p><a href=\"{$basedomain}berita/info_opini\"><strong>Index Opini</strong></a><br/></p>
								</center></div>";
		
	}
	?>
	
	
		
		<!--PERATURAN -->
	<?php
	if(isset($produk)){
	
		echo'<br/><h4>'.$title.'</h4><hr>
			<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<li><b>Dokumen Perencanaan WP-3-K</b>
											<ul>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=1">Rencana Strategis WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=2">Rencana Tata Ruang Laut dan Zonasi WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=3">Rencana Pengelolaan WP-3-K</a></li>
												<li><a href="'.$basedomain.'dok_perencanaan/typewp3k/?type=4">Rencana Aksi WP-3-K</a><br/><br/></li>
											</ul>
										</li>
										<li><b>Norma,Standart,Prosedur & Kriteria</b>
											<ul>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/pedoman_umum">Pedoman Umum</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/pedoman_teknis">Pedoman Teknis</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/modul_pelatihan">Modul Pelatihan</a></li>
												<li><a href="'.$basedomain.'norma_std_psdr_kriteria_c/prosedur_kriteria">Prosedur Pelatihan</a></li>
											</ul>
										</li>
									</ul>
								  </div>
								</div>
					';
	}
	?>
	<?php
	if(isset($minapolitan)){
		echo '	
					<h4>'.$title.'</h4>
					<a class="menu m4_on m_right" href="#"><div><center>Peta Pola Ruang </center></div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangnasional"><div>Nasional</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangprovinsi"><div>Provinsi</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangkabkot"><div>Kabupaten/Kota</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/polaruangkabkotrinci"><div>Kabupaten/Kota Rinci</div></a>
					
					<div class="laper2"></div>
					<a class="menu m4_on m_right" href="#"><div><center>Peta Struktur Ruang</center></div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangnasional"><div>Nasional</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangprovinsi"><div>Provinsi</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangkabkot"><div>Kabupaten/Kota</div></a>
					<a class="menu m4 m_right" href="'.$basedomain.'minapolitan/strukturruangkabkotrinci"><div>Kabupaten/Kota Rinci</div></a>
						
					';
	
	}
	
	?>
	<?php
	if(isset($aplikasi)){
		echo' 
					<br/>
					<h4><i>Link <span class="text-primary">One Map</span> </i></h4>
					<hr>
					<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<ul class="link_terkait">
										<li><a href="'.$basedomain.'one_map/sejarah">Sejarah</a></li>
										<li><a href="'.$basedomain.'one_map/visi_misi">Visi & Misi</a></li>
										<li><a href="'.$basedomain.'one_map/organisasi">Organisasi</a></li>
										<li><a href="'.$basedomain.'one_map/rencana_aksi">Rencana Aksi</a></li>
										<li><a href="'.$basedomain.'one_map/database_tematik">Database Tematik</a></li>
										<li><a href="'.$basedomain.'one_map/target_capaian">Target & Capaian</a></li>
										<li><a href="'.$basedomain.'one_map/dokumentasi">Dokumentasi</a></li>
										<li><a href="'.$basedomain.'one_map/indeksPeta">Index Peta Tematik</a></li>
										<li><a href="'.$basedomain.'one_map/databasespasial">Database Spacial</a></li>
									</ul>
									</ul>
								  </div>
								</div>
					<br/>
					
					<hr>
					<div class="panel panel-default">
								  <div class="panel-body">
									<ul class="link_terkait">
										<ul class="link_terkait">
										<li><a href="#">SIG Minapolitan</a></li>
										<li><a href="#">SIG Pengelolaan Pesisir<br/>dan Pulau - Pulau Kecil</a></li>
										<li><a href="'.$basedomain.'minapolitan/polaruangnasional">Pola Ruang</a></li>
										<li><a href="'.$basedomain.'minapolitan/strukturruangnasional">Struktur Ruang</a></li>
									</ul>
									</ul>
								  </div>
								</div>
					';
	
	}
	?>
	<?php
	
	if (isset($peraturan)){
		echo '<br/>
								<h4><i>'.$title.' </i></h4>
								<hr>';
			echo"<div class=\"side_blue_block\">";
			if ($peraturan){
				$i=1;
				
					foreach($peraturan as $key=>$val){
					
					if($val['files'] != ''){
									$patch = explode("/", $val['files']);
									$directory= $patch[0];
									$file = $patch[1];
									$download_file = "<a class=\"btn btn-mini btn-success\" href=\"{$basedomain}public_assets/{$directory}/{$file}\">Unduh Dokumen <i class=\" icon-arrow-down icon-white\"></i> </a>";
								}else{
									$directory = '-';
									$file = '-';
									$download_file ="";
								}
					?>
								<table class="tb_padding white">
										<tr>
											<td colspan="3"><a href=""><strong><?=$val['title']?></strong></a></td>
										</tr>
										<tr>
											<td width="100px;">Tanggal Terbit</td>
											<td>:</td>
											<td><?=date2Ind($val['postdate'])?></td>
										</tr>
										<tr>
											<td>Tentang</td>
											<td>:</td>
											<td><?=$val['deskripsi']?></td>
										</tr>
									</table><br/>
					<?php		
							
			}
			
			}else{
			echo"<center>";
			pr('Tidak Ada Data');
			echo"</center>";
			}
			echo"</div>";
				
	}
	?>
	<?php
	if(isset($program)){
		echo'<br/>
				<h4><i>'.$title.'</i></h4>
				<hr>
				<div class="panel panel-default">
				  <div class="panel-body">
					<ul>
						<li><a href="'.$basedomain.'program/strategis">Penyusunan Rencana Strategis WP3K</a></li>
						<li><a href="'.$basedomain.'program/zonasi">Penyusunan Rencana Zonasi WP3K</a></li>
						<li><a href="'.$basedomain.'program/pengelolaan">Penyusunan Rencana Pengelolaan WP3K</a></li>
						<li><a href="'.$basedomain.'program/aksi">Penyusunan Rencana Aksi WP3K</a></li>
						<li><a href="'.$basedomain.'program/lainLain">Lain-lain</a></li>
					</ul>
				  </div>
				</div>
					';
					
	
	}
	?>
	