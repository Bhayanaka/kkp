		<script>
	$(function(){
		$("#tglvideo").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});

		});
		</script>
				
				<div class="laper3"></div>
				<a href="<?=$basedomain?>berita" class="sub_menu_in">Berita</a>
				<a href="<?=$basedomain?>agenda" class="sub_menu_in">Agenda</a>
				<a href="<?=$basedomain?>opini" class="sub_menu_in">Opini</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_foto_list" class="sub_menu_in">Gallery Foto</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_video_list" class="sub_menu_in on">Gallery Video</a>
				<a href="<?=$basedomain?>kontak" class="sub_menu_in">Kontak</a>
				<br/>
				<br/>	
				<h4 class="title_sub_menu_in">Edit Video</h4>
				<form method="POST" action="<?=$basedomain?>gallery/informasi_gallery_video_edit_submit" enctype="multipart/form-data">
				<div class="new_input">
					<table>
					<?php
					// pr($data);
					foreach($data as $key=>$val){
					//pr($val);
					}
					?>
						<tr>
							<td>Judul Video</td>
							<td>&nbsp;</td>
							<td><input type="text" name="namavideo" value="<?php echo $val['title'] ?>" /></td>
							<td><input type="hidden" name="id" value="<?php echo $val['id'] ?>" /></td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" id="tglvideo" name="tglvideo" value="<?php echo $val['postdate']?>" /></td>
						</tr>
						<tr>
							<td>Upload Video</td>
							<td>&nbsp;</td>
							<td><input type="file" name="video" />
							<input type="hidden"  name="video_hidden" value="<?php echo $val['image'] ?>" >
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><b>*) MP4</b></td>
						</tr>
						<table>
						<tr>
							<video width="60%"  controls stop>
							 <source src="<?=$app_domain?>public_assets/<?php echo $val['image']?>" type="video/mp4"> 
							
							</video>
							</tr>
							</table>
						
					</table>
					<br/>
					<input type="submit" class="btn btn-primary" value="Simpan"/>
					<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
				</div>
				
			