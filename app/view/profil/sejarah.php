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
	// box_legend('box_legend_2',$title_page,$link_title_page);
?>
		
	<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Informasi TRLP3K</a></li>
								  <li><a href="#">Profil</a></li>
								  <li class="active">Sejarah</li>
								</ul>

								<?php
								if($data){
								// pr($data);
								foreach($data as $key=>$val){
										echo "<h3 class=\"text-primary\">{$val['title']}</h3><br/>";
										$path=explode("/", $val['image']);
										// pr($path);
										echo"<center><img src=\"{$basedomain}public_assets/{$path[0]}/{$path[1]}\" width=\"448\" height=\"336px\"></center>";
										echo"&nbsp;";
										// echo "<p>{$val['content']}</p>";
										echo "<p>{$val['content']}</p>";
									}	
								}else{
									pr("<center>Tidak Ada Data</center>");
								 }
								?>

								
							</div>
							<div class="col-md-4">
								
								<hr>
								<?=$sidebar?>

							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>



		