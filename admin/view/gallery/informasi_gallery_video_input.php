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
				<h4 class="title_sub_menu_in">Tambah Video</h4>
				<form method="POST" action="<?=$basedomain?>gallery/informasi_gallery_video_submit" enctype="multipart/form-data">
				<div class="new_input">
					<table>
						<tr>
							<td>Judul Video</td>
							<td>&nbsp;</td>
							<td><input type="text" name="namavideo" required/></td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" id="tglvideo" name="tglvideo" /></td>
						</tr>
						<tr>
							<td>Upload Video</td>
							<td>&nbsp;</td>
							<td><input type="file" name="video" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><b>*) MP4</b></td>
						</tr>
					</table>
					<br/>
					<input type="submit" class="btn btn-primary" value="Simpan"/>
					<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
				</div>
				
			