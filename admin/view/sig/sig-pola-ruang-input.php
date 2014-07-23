<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}
	
</script>	
<?php
// pr($data);
?>				
<h4 class="title_sub_menu_in">Tambah Peta Pola Ruang</h4>
<div class="new_input">
<form method="post" action="<?=$basedomain?>sig/input_pola" enctype = "multipart/form-data">
<table border=0>
	<tr>
		<td>Judul</td>
		<td>&nbsp;</td>
		<td><input type="text" name="title" value="<?=(isset($result[0]['title']) ? $result[0]['title'] : '')?>" required="required"></td>
		<td>&nbsp;</td>
		<td>Tanggal Upload</td>
		<td>&nbsp;</td>
		<td><input type="text" name="postdate" id="postdate" value="<?=(isset($result[0]['postdate']) ? $result[0]['postdate'] : '')?>"/></td>
		<td>&nbsp;</td>
		<td>Pilih Provinsi</td>
		<td>&nbsp;</td>
		<td>
			<?php
				if(isset($result[0]['id_provinsi'])) $provinsi=$result[0]['id_provinsi']; else $provinsi="";
				if(isset($result[0]['id_kabupaten'])) $kabupaten=$result[0]['id_kabupaten']; else $kabupaten="";
				if(isset($data['kabupaten'])) $list=$data['kabupaten']; else $list="";
				provLocation($data['lokasi'],'on',$provinsi);
			?>
		</td>
	</tr>
	<tr>
		<td>Tipe</td>
		<td>&nbsp;</td>
		<td>
			<select name="type_peta" required>
				<option value="">- Pilih Tipe -</option>
					<?php
					if($data['type']){
					foreach ($data['type'] as $key => $value){
					?>
					<option value="<?=$value['id']?>" <?=(isset($result[0]['articletype']) ? ($value['id'] == $result[0]['articletype'] ? 'selected' : '') : '' );?>><?=$value['value']?></option>
					<?php
						}
					}
				?>	
			</select>
		</td>
			<td>&nbsp;</td>
			<td>Tahun Kegiatan</td>
			<td>&nbsp;</td>
			<td><input type="text" name="tahun" onkeypress="return isNumber(event)" maxlength="4"  value="<?=(isset($result[0]['tahun']) ? $result[0]['tahun'] : date('Y'))?>"/></td>
		<td>&nbsp;</td>
		<td>Pilih Kabupaten / Kota</td>
		<td>&nbsp;</td>
		<td>
			<?php
			kabLocation('off',$list,$kabupaten);?>
		</td>
	</tr>
	
	<tr>
		<td>Upload Cover </td>
		<td>&nbsp;</td>
		<td>
			<input type="file" name="cover" id="imgInpPlay"/>
			<input type="hidden" name="cover_hidden" value="<?=(isset($result[0]['image']) ? $result[0]['image'] : '')?>">
		</td>
		<td>&nbsp;</td>
		<td>Upload Peta</td>
		<td>&nbsp;</td>
		<td>
			<input type="file" name="peta" id="imgInpPlay2"/>
			<input type="hidden" name="peta_hidden" value="<?=(isset($result[0]['files']) ? $result[0]['files'] : '')?>">
		</td>
		<td>&nbsp;</td>	
		<td>Kecamatan</td>	
		<td>&nbsp;</td>	
		<td><input type="text" name="kecamatan" value="<?=(isset($result[0]['kecamatan']) ? $result[0]['kecamatan'] : '')?>"></td>	
	</tr>
	<?php
	if(isset($result[0]['image']) && $result[0]['image'] != ''){
		$directory = explode("/",$result[0]['image']);
		$default_image = 'public_assets/'.$directory[0].'/'.$directory[1].'/'.$directory[2];
		$prev_image = $app_domain.$default_image;
	}else{
		$default_image = 'images/no-images.gif';
		$prev_image = $basedomain.$default_image;
	}

	if(isset($result[0]['files']) != ''){
		$directory_2 = explode("/",$result[0]['files']);
		$default_image_2 = 'public_assets/'.$directory_2[0].'/'.$directory_2[1].'/'.$directory_2[2];
		$prev_image_2 = $app_domain.$default_image_2;
	}else{
		$default_image_2 = 'images/no-images.gif';
		$prev_image_2 = $basedomain.$default_image_2;
	}
	
	
	?>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><img src="<?=$prev_image?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/><br/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><img src="<?=$prev_image_2?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay_2"/><br/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<br/>
<p><b>Infografis mengenai peta yang dimiliki  :</b></p>
<!--better diganti Editor text-->
<textarea style="width:100%;height:200px;" name="content" class="ckeditor"><?=(isset($result[0]['content']) ? $result[0]['content'] : '');?></textarea>
		
		<input type="hidden" name="id" id="id"  value="<?=(isset($result[0]['id']) ? $result[0]['id'] : '')?>"/>
		<input type="hidden" name="otherid" id="otherid"  value="<?=(isset($result[0]['otherid']) ? $result[0]['otherid'] : '')?>"/>
		<input type="hidden" name="categoryid" id="categoryid"  value="<?=(isset($result[0]['categoryid']) ? $result[0]['categoryid'] : '33') ?>"/>
		<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
		<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($result[0]['fromwho']) ? $result[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
		<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($result[0]['authorid']) ? $result[0]['authorid'] : $_SESSION['user']['id'])?>"/>
		<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($result[0]['n_status']) ? $result[0]['n_status'] : '0')?>"/>
		
<input type="submit" class="btn btn-primary" value="Simpan"/>
<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					
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
	
	
	function readURLplay2(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
			reader.onload = function (e) {
                $('#previewplay_2').attr('src', e.target.result);
				$('#previewplay_2').attr('width', '200px');
                $('#previewplay_2').attr('height', '200px');
            }
			 reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInpPlay2").change(function(){
        readURLplay2(this);
    });
</script>

			