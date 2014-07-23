<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
	/*function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}
		
	function isNumber2(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}*/
</script>	
<?php
// pr($data);
?>
<h4 class="title_sub_menu_in">Tambah Program</h4>
<div class="new_input">
<form method="post" action="<?=$basedomain?>program/input_program" enctype = "multipart/form-data">
<table border=0>
	<tr>
		<td>Judul</td>
		<td>&nbsp;</td>
		<td><input type="text" name="title" required="required" value="<?//=(isset($data['result'][0]['title']) ? $data['result'][0]['title'] : '')?>"/></td>
		<!--<td>&nbsp;</td>
		<td>Tanggal Upload</td>
		<td>&nbsp;</td>
		<td><input type="text" name="postdate" id="postdate" value="<?//=(isset($data['result'][0]['postdate']) ? $data['result'][0]['postdate'] : '')?>"/></td>
		<td>&nbsp;</td>
		<td>Tahun Pembuatan</td>
		<td>&nbsp;</td>
		<td><input type="text" name="tahun"  onkeypress="return isNumber2(event)"  maxlength="4"  value="<?//=(isset($data['result'][0]['tahun']) ? $data['result'][0]['tahun'] : date('Y'))?>"/></td>-->
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>&nbsp;</td>
		<td><input type="text" name="postdate" id="postdate" value="<?=(isset($data['result'][0]['postdate']) ? $data['result'][0]['postdate'] : '')?>"/></td>
	</tr>
	<!--<tr>
		<td>Tipe</td>
		<td>&nbsp;</td>
		<td>
			<select name="type_program" required>
				<option value="">- Pilih Tipe  -</option>
					<?php
					// if($data['type']){
					// foreach ($data['type'] as $key => $value){
					?>
					<option value="<?//=$value['id']?>" <?//=(isset($data['result'][0]['articletype']) ? ($value['id'] == $data['result'][0]['articletype'] ? 'selected' : '') : '' );?>><?//=$value['value']?></option>
					<?php
						// }
					// }
				?>	
			</select>
		</td>
		<td>&nbsp;</td>
		<td>Lampiran</td>
		<td>&nbsp;</td>
		<td><input type="text" name="lampiran" id="lampiran" value="<?//=(isset($data['result'][0]['lampiran']) ? $data['result'][0]['lampiran'] : '')?>"/></td>
		<td>&nbsp;</td>
		<td>Pilih Provinsi</td>
		<td>&nbsp;</td>
		<td>
			<?php
				// if(isset($result[0]['id_provinsi'])) $provinsi=$result[0]['id_provinsi']; else $provinsi="";
				// if(isset($result[0]['id_kabupaten'])) $kabupaten=$result[0]['id_kabupaten']; else $kabupaten="";
				// if(isset($data['kabupaten'])) $list=$data['kabupaten']; else $list="";
				// provLocation($data['lokasi'],'on',$provinsi,'required');
			?>
		</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>&nbsp;</td>
		<td>
			<select name="category" required>
				<option value="">- Pilih Kategori -</option>
					<?php
					// if($data['category']){
					// foreach ($data['category'] as $key => $value){
					?>
					<option value="<?//=$value['id']?>" <?//=(isset($data['result'][0]['categoryid']) ? ($value['id'] == $data['result'][0]['categoryid'] ? 'selected' : '') : '' );?>><?//=$value['value']?></option>
					<?php
						// }
					// }
				?>	
			</select>
		</td>
		<td>&nbsp;</td>
		<td>Jumlah Halaman</td>
		<td>&nbsp;</td>
		<td><input type="text" name="jml_hal" id="jml_hal" onkeypress="return isNumber(event)" placeholder ="hanya nomor" value="<?=(isset($data['result'][0]['jml_hal']) ? $data['result'][0]['jml_hal'] : '')?>"/></td>
		<td>&nbsp;</td>
		<td>Pilih Kabupaten / Kota</td>
		<td>&nbsp;</td>
		<td>
			<?php
			// kabLocation('off',$list,$kabupaten,'required');?>
		</td>
	</tr>
	<tr>
		<td>Upload Dokumen Final</td>
		<td>&nbsp;</td>
		<td><input type="file" name="dokfinal" id="files"/>
			<input type="hidden" name="dokfinal_hidden" value="<?//=(isset($data['repo_final'][0]['files']) ? $data['repo_final'][0]['files'] : '')?>">
			<input type="hidden" name="dokfinal_tags_hidden" value="<?//=(isset($data['repo_final'][0]['tags']) ? $data['repo_final'][0]['tags'] : '')?>">
		</td>
		<td>&nbsp;</td>
		<td>Upload Naskah Akademis</td>
		<td>&nbsp;</td>
		<td><input type="file" name="naskah" id="files_2"/></td>
			<input type="hidden" name="naskah_hidden" value="<?//=(isset($data['repo_naskah'][0]['files']) ? $data['repo_naskah'][0]['files'] : '')?>">
			<input type="hidden" name="naskah_tags_hidden" value="<?//=(isset($data['repo_naskah'][0]['tags']) ? $data['repo_naskah'][0]['tags'] : '')?>">
		<td>&nbsp;</td>
		<td>Kecamatan</td>
		<td>&nbsp;</td>
		<td><input type="text" name="kecamatan" id="kecamatan" value="<?//=(isset($data['result'][0]['kecamatan']) ? $data['result'][0]['kecamatan'] : '')?>"/>
		</td>
	</tr>-->
	<?php
	
	
	//untuk naskah akademis
	/*if(isset($data['repo_naskah'][0]['files']) != ''){
		$directory_naskah = explode("/",$data['repo_naskah'][0]['files']);
		$default_image_naskah = 'public_assets/'.$directory_naskah[0].'/'.$directory_naskah[1];
		$prev_image_naskah = $app_domain.$default_image_naskah;
	}else{
		$default_image_naskah = 'images/no-images.gif';
		$prev_image_naskah = $basedomain.$default_image_naskah;
	}*/
	/*if(isset($data['repo_naskah'][0]['files'])){
		$exp_naskah =explode("/", $data['repo_naskah'][0]['files']);
		$prev_doc = "<input type=\"text\" name=\"\" value=\"{$exp_naskah[1]}\" readonly>";
	}
	
	if(isset($data['repo_final'][0]['files'])){
		$exp_final =explode("/", $data['repo_final'][0]['files']);
		$prev_doc2 = "<input type=\"text\" name=\"\" value=\"{$exp_final[1]}\" readonly>";
	}*/
	/*if(isset($data['repo_final'][0]['tags']) !='' && $data['repo_final'][0]['tags'] !=''){
		$exp_naskah =explode("/", $data['repo_final'][0]['files']);
		$directory= $exp_naskah[0];
		$file = $exp_naskah[1];
		$prev_doc ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['repo_final'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
	}
	if(isset($data['repo_naskah'][0]['tags']) !='' && $data['repo_naskah'][0]['tags'] !=''){
		$exp_naskah =explode("/", $data['repo_naskah'][0]['files']);
		$directory= $exp_naskah[0];
		$file = $exp_naskah[1];
		$prev_doc2 ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['repo_naskah'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
	}*/
	
	?>
	<!--<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><output id="list"></output></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><output id="list2"></output></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>	
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><output id="list"><?//=$prev_doc?></output></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><output id="list2"><?//=$prev_doc2?></output></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>	
		<td>&nbsp;</td>
	</tr>-->
	<?php
	// untuk cover preview
	if(isset($data['result'][0]['image']) != '' && $data['result'][0]['image'] != ''){
		$directory_cover = explode("/",$data['result'][0]['image']);
		$default_image_cover = 'public_assets/'.$directory_cover[0].'/'.$directory_cover[1];
		$prev_image_cover = $app_domain.$default_image_cover;
	}else{
		$default_image_cover = 'images/no-images.gif';
		$prev_image_cover = $basedomain.$default_image_cover;
	}
	
	//peta pola
	/*if(isset($data['repo_pola'][0]['files']) != '' && $data['repo_pola'][0]['files'] !=''){
		$directory_peta_pola = explode("/",$data['repo_pola'][0]['files']);
		$default_image_peta_pola = 'public_assets/'.$directory_peta_pola[0].'/'.$directory_peta_pola[1];
		$prev_image_peta_pola = $app_domain.$default_image_peta_pola;
	}else{
		$default_image_peta_pola = 'images/no-images.gif';
		$prev_image_peta_pola = $basedomain.$default_image_peta_pola;
	}
	//peta struktur
	if(isset($data['repo_struktur'][0]['files']) != '' && $data['repo_struktur'][0]['files'] != ''){
		$directory_peta_struktur = explode("/",$data['repo_struktur'][0]['files']);
		$default_image_peta_struktur = 'public_assets/'.$directory_peta_struktur[0].'/'.$directory_peta_struktur[1];
		$prev_image_peta_struktur = $app_domain.$default_image_peta_struktur;
	}else{
		$default_image_peta_struktur = 'images/no-images.gif';
		$prev_image_peta_struktur = $basedomain.$default_image_peta_struktur;
	}
	*/
	?>
	<tr>
		<td>Upload Cover</td>
		<td>&nbsp;</td>
		<td><input type="file" name="cover" id="imgInpPlay"/></td>
			<input type="hidden" name="cover_hidden" value="<?=(isset($data['result'][0]['image']) ? $data['result'][0]['image'] : '')?>">
		<td>&nbsp;</td>
		<!--<td>Upload Peta Pola Ruang</td>
		<td>&nbsp;</td>
		<td><input type="file" name="peta_pola" id="imgInpPlay3"/></td>
			<input type="hidden" name="peta_pola_hidden" value="<?//=(isset($data['repo_pola'][0]['files']) ? $data['repo_pola'][0]['files'] : '')?>">
		<td>&nbsp;</td>
		<td>Upload Peta Struktur Ruang</td>
		<td>&nbsp;</td>
		<td><input type="file" name="peta_struktur" id="imgInpPlay4"/></td>
			<input type="hidden" name="peta_struktur_hidden" value="<?//=(isset($data['repo_struktur'][0]['files']) ? $data['repo_struktur'][0]['files'] : '')?>">
	</tr>-->
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><img src="<?=$prev_image_cover?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/><br/></td>
		<!--<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><img src="<?//=$prev_image_peta_pola?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay_3"/><br/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><img src="<?//=$prev_image_peta_struktur?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay_4"/><br/></td>
	</tr>-->
</table>
<br/>
<p><b>Infografis mengenai peta yang dimiliki  :</b></p>
<!--better diganti Editor text-->
<textarea style="width:100%;height:200px;" name="content" class="ckeditor"><?=(isset($data['result'][0]['content']) ? $data['result'][0]['content'] : '');?></textarea>
		
		<input type="hidden" name="id" id="id"  value="<?=(isset($data['result'][0]['id']) ? $data['result'][0]['id'] : '')?>"/>
		
		<!--<input type="hidden" name="id_repo_0" id="id"  value="<?//=(isset($data['repo_naskah'][0]['id']) ? $data['repo_naskah'][0]['id'] : '')?>"/>
		<input type="hidden" name="id_repo_1" id="id"  value="<?//=(isset($data['repo_pola'][0]['id']) ? $data['repo_pola'][0]['id'] : '')?>"/>
		<input type="hidden" name="id_repo_2" id="id"  value="<?//=(isset($data['repo_struktur'][0]['id']) ? $data['repo_struktur'][0]['id'] : '')?>"/>
		<input type="hidden" name="id_repo_3" id="id"  value="<?//=(isset($data['repo_final'][0]['id']) ? $data['repo_final'][0]['id'] : '')?>"/>
		
		<input type="hidden" name="otherid" id="otherid"  value="<?=(isset($data['result'][0]['otherid']) ? $data['result'][0]['otherid'] : '')?>"/>-->
		<input type="hidden" name="createdate" id="createdate"  value="<?=(isset($data['result'][0]['createdate']) ? $data['result'][0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
		<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($data['result'][0]['fromwho']) ? $data['result'][0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
		<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($data['result'][0]['authorid']) ? $data['result'][0]['authorid'] : $_SESSION['user']['id'])?>"/>
		<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($data['result'][0]['n_status']) ? $data['result'][0]['n_status'] : '0')?>"/>
		
<input type="submit" class="btn btn-primary" value="Simpan"/>
<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
					
</form>
</div>
<script>
	 /*function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong>  - ',
                  f.size, ' bytes','',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
	
	function handleFileSelect2(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong>  - ',
                  f.size, ' bytes','',
                  '</li>');
    }
    document.getElementById('list2').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files_2').addEventListener('change', handleFileSelect2, false);*/
	
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
	
	/*function readURLplay2(input) {
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
	
	function readURLplay3(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
			reader.onload = function (e) {
                $('#previewplay_3').attr('src', e.target.result);
				$('#previewplay_3').attr('width', '200px');
                $('#previewplay_3').attr('height', '200px');
            }
			 reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInpPlay3").change(function(){
        readURLplay3(this);
    });
	
	function readURLplay4(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
			reader.onload = function (e) {
                $('#previewplay_4').attr('src', e.target.result);
				$('#previewplay_4').attr('width', '200px');
                $('#previewplay_4').attr('height', '200px');
            }
			 reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInpPlay4").change(function(){
        readURLplay4(this);
    });*/
	
</script>


			