<?php
/*
	Batas Awal dari Isi Content Acuan Untuk di taruh di dalam File app/view
*/		
	$title_menu=array('Sejarah','Struktur Organisasi','Tugas Pokok Dan Fungsi');
	$link_menu=array('profil/sejarah','profil/struktur_organisasi','profil/tupoksi');
	//sub_top_menu('bg_hijau','trans',$title_menu,$link_menu);
	sub_top_menu('bg_hijau');
	
	$title_page=array('Informasi TRLP-3-K','Profil','Sejarah');
	$link_title_page=array('#','#','#');
	//box_legend('box_legend',$title_page,$link_title_page);
	box_legend('box_legend_2',$title_page,$link_title_page);
?>
		<div class="row-fluid ">
			<div class="span1"></div>
			<div class="span10 bg_putih body">
				<div class="row-fluid">
				  <div class="span8">
					<?php
						if($data){
						// pr($data);
						foreach($data as $key=>$val){
								echo "<h3>{$val['title']}</h3><br/>";
								$path=explode("/", $val['image']);
								// pr($path);
								echo"<center><img src=\"{$basedomain}public_assets/{$path[0]}/{$path[1]}\" width=\"448\" height=\"336px\"></center>";
								echo"&nbsp;";
								echo "<p>{$val['content']}</p>";
							}	
						}else{
							pr("<center>Tidak Ada Data</center>");
						 }
						?>
				  </div>
				  <?=$sidebar?>
				</div>
				
			</div>
			<div class="span1"></div>
		</div>

    </body>
</html>