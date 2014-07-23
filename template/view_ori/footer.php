<?php
if ($DATA['default']['page']==$CONFIG['default']['default_view']){
?>
	<!--<div class="footer" >
		<p><?//=$LOCALE['default']['footer']?></p>
	</div>-->
				<!-- end SHORT MENU -->
				
				<div class="wrapper-profile"></div>
				<div class="wrapper-profile"></div>
				
				
				
				
				
				
				<!-- FOOTER-->
				<div class="row-fluid footer">
					<div class="span1"></div>
					<div class="span10">
						&copy; Direktorat Tata Ruang Laut Pesisir dan Pulau-pulau Kecil 2014
					</div>
					<div class="span1"></div>
				</div>
				<!-- FOOTER-->
<?php
}else{
?>
	<div class="row-fluid sitemap">
		<div class="span1"></div>
		<div class="span10" style="margin:20px;">
			<h3>Sitemap</h3>
			<div class="row-fluid">
				<div class="span2">
					<h4>Informasi</h4>
					<a href="<?=$basedomain?>berita/info_berita">Berita</a><br/>
					<a href="<?=$basedomain?>berita/info_opini">Opini</a><br/>
					<a href="<?=$basedomain?>informasi_terkini/informasi_gallery">Galeri Foto</a><br/>
					<a href="<?=$basedomain?>informasi_terkini/informasi_video">Galeri Video</a><br/>
					<br/>
					<h4>Profile</h4>
					<a href="<?=$basedomain?>profil/struktur_organisasi">Stuktur Organisasi</a><br/>
					<a href="<?=$basedomain?>profil/sejarah">Sejarah</a><br/>
					<a href="<?=$basedomain?>profil/tupoksi">Tupoksi</a><br/>
				</div>
				<div class="span2">
					<h4>Peraturan</h4>
					<a href="<?=$basedomain?>peraturan/undangundang">Undang - Undang</a><br/>
					<a href="<?=$basedomain?>peraturan/pemerintah">Peraturan Presiden</a><br/>
					<a href="#">PP penganti UU</a><br/>
					<a href="<?=$basedomain?>peraturan/menteri">Peraturan Menteri</a><br/>
					<a href="<?=$basedomain?>peraturan/keppres">Keputusan Presiden</a><br/>
					<a href="<?=$basedomain?>peraturan/kepment">Keputusan Menteri</a><br/>
					<a href="#">Intruksi Menteri</a><br/>
					<a href="#">Lain - lain</a><br/>
				</div>
				<div class="span3">
					<h4>Produk</h4>
					<a href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=1">Rencana Strategis WP3K</a><br/>
					<a href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=2">Rencana Zonasi WP3K</a><br/>
					<a href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=3">Recana Pengelolaaan WP3K</a><br/>
					<a href="<?=$basedomain?>dok_perencanaan/typewp3k/?type=4">Recana Aksi WP3K</a><br/>
					<br />
					<h4>Program</h4>
					<a href="<?=$basedomain?>program/strategis">Penyusunan Rencana Strategis WP3K</a><br/>
					<a href="<?=$basedomain?>program/zonasi">Penyusunan Zonasi WP3K</a><br/>
					<a href="<?=$basedomain?>program/pengelolaan">Penyusunan Pengelolaaan WP3K</a><br/>
					<a href="<?=$basedomain?>program/aksi">Penyusunan Aksi WP3K</a><br/>
					<a href="<?=$basedomain?>program/lainLain">Lain-lain</a><br/>
				</div>
				<div class="span4">
					<h4>Norma, Standart, Prosedur dan Kriteria</h4>
					<a href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_umum">Pedoman Umum</a><br/>
					<a href="<?=$basedomain?>norma_std_psdr_kriteria_c/pedoman_teknis">Pedoman Teknis</a><br/>
					<a href="<?=$basedomain?>norma_std_psdr_kriteria_c/modul_pelatihan">Modul Pelatihan</a><br/>
					<br />
					<h4>Aplikasi</h4>
					<a href="<?=$basedomain?>one_map/sejarah">One Map</a><br/>
					<a href="#">Gis  Minapolitan</a><br/>
					<a href="#">One Map Sumberdaya Pesisir dan Laut Nasional</a><br/>
					<a href="#">SIM GIS Pengelolaan Pesisir dan Pulau - Pulau Kecil</a><br/>
					
				</div>
				<div>	
					<a href="<?=$basedomain?>kontak"><h4>Kontak</h4></a>
				</div>
			</div>
			<div class="span1"></div>
		</div>
	</div>
	<div class="row-fluid footer_sub">
		<div class="span1"></div>
		<div class="span10 " align="center">
			&copy; Direktorat Tata Ruang Laut Pesisir dan Pulau-pulau Kecil
		</div>
		<div class="span1"></div>
	</div>
<?php
}
?>


<script type="text/javascript" src="<?=$basedomain?>assets/js/modernizr.custom.86080.js"></script>
