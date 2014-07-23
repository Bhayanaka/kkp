<script>
	$(function(){
	$('#createdate').datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
	
	function myFunction(){
		// alert("Page is loaded");
		$('#btn-primary').attr('disabled','disabled');
		$('#btn-primary').css('background','grey');
		$('#createdate').attr('disabled','disabled');
		// $('#content').attr('disabled','disabled');
		$('#imgInpPlay').attr('disabled','disabled');
	} 
	
	// function check_edit(){
		// var checked=false;
		// var elements = document.getElementsByName("check_strutur");
		// if(elements[0].checked){
				// checked = true;
				// $('#btn-primary').removeAttr('disabled');
				// $('#btn-primary').css("background","#006DCC");
				// $('#createdate').removeAttr('disabled');
				//$('#content').removeAttr('disabled');
				// $('#imgInpPlay').removeAttr('disabled');
		// }
		// else if (!checked){
				// $('#btn-primary').attr('disabled','disabled');
				// $('#btn-primary').css('background','grey');
				// $('#createdate').attr('disabled','disabled');
				//('#content').attr('disabled','disabled');
				// $('#imgInpPlay').attr('disabled','disabled');
		// }
		// return checked;
	// }
	
	function edit(){
		var elements = $("#edit").val();
		if(elements == 0){
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#createdate').removeAttr('disabled');
				$('#imgInpPlay').removeAttr('disabled');
				$('#edit').val('1');
				$('#edit').html('Kembali');
				$('#edit').css("background","#BD362F");
		}
		else {
				$('#btn-primary').attr('disabled','disabled');
				$('#btn-primary').css('background','grey');
				$('#createdate').attr('disabled','disabled');
				$('#imgInpPlay').attr('disabled','disabled');
				$('#edit').val('0');
				$('#edit').html('Edit');
				$('#edit').css("background","#006DCC");
		}
	}
</script>
					<div class="laper3"></div>
				<a href="<?=$basedomain?>berita" class="sub_menu_in">Berita</a>
				<a href="<?=$basedomain?>agenda" class="sub_menu_in">Agenda</a>
				<a href="<?=$basedomain?>opini" class="sub_menu_in">Opini</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_foto_list" class="sub_menu_in">Gallery Foto</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_video_list" class="sub_menu_in">Gallery Video</a>
				<a href="<?=$basedomain?>kontak" class="sub_menu_in on">Kontak</a>
				<br/>
				<br/>
				
				<?php
				// pr($data);
				
				?>
				<h4 class="title_sub_menu_in">Kontak</h4>
				<div class="new_input">
					<form method="post" action="<?=$basedomain?>kontak/inputData" enctype="multipart/form-data">
					<table >
						<tr>
							<?php 
							// pr($_SESSION);
							// if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){
							// echo"<td><input type=\"checkbox\" name=\"check_strutur\" id=\"check_strutur\" value=\"Edit\" onchange=\"return check_edit(this)\" >&nbsp;&nbsp;Edit ";?>
							<?php
							// }?>
							<input type="hidden" name="id" value="<?=(isset($data['isi'][0]['id']) ? $data['isi'][0]['id'] : '');?>">
							
						</td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;</td>
							<td><input type="text" id="createdate" name="createdate" value="<?=(isset($data['isi'][0]['createdate']) ? $data['isi'][0]['createdate'] : '');?>" /></td>
						</tr>
						<?php 
						/*if(isset($data['isi'][0])){
							$directory = explode("/",$isi[0]['image']);
						}else{
							$directory = '';
						}
						if(isset($isi[0]['image']) != ''){
							$default_image_cover = 'public_assets/'.$directory[0].'/'.$directory[1];
							$prev_image_cover = $app_domain.$default_image_cover;
						}else{
							
							$default_image_cover = 'images/no-images.gif';
							$prev_image_cover = $basedomain.$default_image_cover;
						}*/
						?>
						<!--<tr>
							<td>Unggah Gambar</td>
							<td>&nbsp;</td>
							<td rowspan="6" >
							<img src="<?=$prev_image_cover?>" style="height:150px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/><br/>
							<input type="file" name="image" id="imgInpPlay"/>
						</td>
						</tr>-->
					</table>
					<p><b>Isi Kontak :</b></p>
					<!--better diganti Editor text-->
					<textarea style="width:100%;height:200px;" name="content" id="content" class="ckeditor">
						<?php
							// pr($data);
							if($isi){
								foreach ($isi as $key=>$val){
								echo $val['content'];
								}
							}
						?>
					
					</textarea>
					
					<input type="submit" class="btn btn-primary" id="btn-primary" value="Simpan"/>
					<?php if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){ ?>
					<a href="#" onclick="return edit()"><button type="button" class="btn btn-primary" id="edit" value="0"/>Edit</button></a>
					<?php } ?>
					</form>
				</div>
				
				<script>
					function readURLplay(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$('#previewplay').attr('src', e.target.result);
								$('#previewplay').attr('width', '200px');
								$('#previewplay').attr('height', '200px');
							}
							 reader.readAsDataURL(input.files[0]);
						}
					}
					
					$("#imgInpPlay").change(function(){
						readURLplay(this);
					});
				</script>
			