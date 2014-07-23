<?php 
  //echo "<pre>";
  //print_r($data);
?>
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

function isNumber2(evt) {
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
<h4 class="title_sub_menu_in">Dokumen Perencanaan WP3K</h4>
<div class="new_input">
	<form action="<?=$basedomain.'produk/insertPerencanaan/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=(isset($editPerencanaan[0]['id']) ? $editPerencanaan[0]['id'] : '')?>" name="hidden_id" readonly id="hidden_id"  />	
	<table >
		<tr>
			<td>Judul</td>
			<td>&nbsp;</td>
			<td><input type="text" name="judul" value="<?=(isset($editPerencanaan[0]['title']) ? $editPerencanaan[0]['title'] : '')?>" required="required"></td>
			<td>&nbsp;</td>
			<td>Tanggal Upload</td>
			<td>&nbsp;</td>
			<td><input type="text"  name="tgl_upload" id="postdate" value="<?=(isset($editPerencanaan[0]['postdate']) ? $editPerencanaan[0]['postdate'] : '')?>"></td>
			<td>&nbsp;</td>
			<td>Tahun Pembuatan</td>
			<td>&nbsp;</td>
			<td><input type="text"  name="thn_buat" value="<?=(isset($editPerencanaan[0]['tahun']) ? $editPerencanaan[0]['tahun'] : date('Y'))?>"/></td>
		</tr>
		<tr>
			<td>Pilih Tipe</td>
			<td>&nbsp;</td>
			<td>
				<select name="artikel" required="required">
					<option id="k0" value="">- Pilih Tipe -</option>
					<option id="k1" value="1" <?=(isset($editPerencanaan[0]['articletype']) ? (1 == $editPerencanaan[0]['articletype'] ? 'selected' : '') : '' );?>>Rencana Strategis WP-3-K</option>
					<option id="k2" value="2" <?=(isset($editPerencanaan[0]['articletype']) ? (2 == $editPerencanaan[0]['articletype'] ? 'selected' : '') : '' );?>>Rencana Zonasi WP-3-K</option>
					<option id="k3" value="3" <?=(isset($editPerencanaan[0]['articletype']) ? (3 == $editPerencanaan[0]['articletype'] ? 'selected' : '') : '' );?>>Rencana Pengelolaan WP-3-K</option>
					<option id="k4" value="4" <?=(isset($editPerencanaan[0]['articletype']) ? (4 == $editPerencanaan[0]['articletype'] ? 'selected' : '') : '' );?>>Rencana Aksi WP-3-K</option>
				</select>
			</td>
			<td>&nbsp;</td>
			<td>Lampiran</td>
			<td>&nbsp;</td>
			<td><input type="text"  name="lampiran" value="<?=(isset($editPerencanaan[0]['lampiran']) ? $editPerencanaan[0]['lampiran'] : '')?>"/>
				
			</td>
			<td>&nbsp;</td>
			<td>Pilih Provinsi</td>
			<td>&nbsp;</td>
			<td>
				<select name="provinsi" id="provinsi">
					<option value="">- Pilih Provinsi -</option>
					<?php
						foreach ($get_prov as $val){									
					?>
					<option value="<?= $val['kode_wilayah'];?>" <?=(isset($editPerencanaan[0]['id_provinsi']) ? ($val['kode_wilayah'] == $editPerencanaan[0]['id_provinsi'] ? 'selected' : '') : '' );?>><?= $val['nama_wilayah'];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>&nbsp;</td>
			<td>
			<select name="kategori" id="artikel" required="required">
				<option value="">- Pilih Kategori -</option>
				<?php
					foreach ($get_tipe as $val_tipe){									
				?>
				<option value="<?= $val_tipe['id'];?>" <?=(isset($editPerencanaan[0]['categoryid']) ? ($val_tipe['id'] == $editPerencanaan[0]['categoryid'] ? 'selected' : '') : '' );?>><?= $val_tipe['value'];?></option>
				<?php } ?>
			</select>
			</td>
			<td>&nbsp;</td>
			<td>Jumlah Halaman</td>
			<td>&nbsp;</td>
			<td><input type="number" name="jml_hal" onkeypress="return isNumber2(event)" maxlength ="4"  placeholder="hanya nomor" value="<?=(isset($editPerencanaan[0]['jml_hal']) ? $editPerencanaan[0]['jml_hal'] : '')?>"/></td>
			<td>&nbsp;</td>
			<td>Pilih Kabupaten / Kota</td>
			<td>&nbsp;</td>
			<td>	
				<select name="kabupaten" id="kabupaten">
					<option value="">- Pilih Kabupaten / Kota -</option>
					<?php
						foreach ($get_kab as $vals){									
					?>
					<option value="<?= $vals['kode_wilayah'];?>" <?=(isset($editPerencanaan[0]['id_kabupaten']) ? ($vals['kode_wilayah'] == $editPerencanaan[0]['id_kabupaten'] ? 'selected' : '') : '' );?>><?= $vals['nama_wilayah'];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Upload Dokumen final</td>
			<td>&nbsp;</td>
			<td><input type="file" name="df" id="files"/></td>
			<input type="hidden" name="df_hidden" id="df_hidden"  value="<?=(isset($data['df'][0]['files']) ? $data['df'][0]['files'] : '')?>"/>
			<input type="hidden" name="df_tags_hidden" id="df_hidden"  value="<?=(isset($data['df'][0]['tags']) ? $data['df'][0]['tags'] : '')?>"/>
			<td>&nbsp;</td>
			<td>Upload Naskah Akademis</td>
			<td>&nbsp;</td>
			<td><input type="file" name="upload_file" id="files_2"/></td>
			<input type="hidden" name="file_hidden" id="file_hidden"  value="<?=(isset($data['dok'][0]['files']) ? $data['dok'][0]['files'] : '')?>"/>
			<input type="hidden" name="file_tags_hidden" id="file_hidden"  value="<?=(isset($data['dok'][0]['tags']) ? $data['dok'][0]['tags'] : '')?>"/>
			<td>&nbsp;</td>
			<td>Kecamatan</td>
			<td>&nbsp;</td>
			<td>
				<input type="text" name="kecamatan" id="kecamatan" value="<?=(isset($editPerencanaan[0]['kecamatan']) ? $editPerencanaan[0]['kecamatan'] : '')?>"/>
			</td>		
		</tr>
		<?php 
		/*if(isset($data['df'][0]['files']) && ($data['df'][0]['files'] != '')){
			$exp_naskah =explode("/", $data['df'][0]['files']);
			$prev_doc = "<input type=\"text\" name=\"\" value=\"{$exp_naskah[1]}\" readonly>";
		}
	
		if(isset($data['dok'][0]['files']) && ($data['dok'][0]['files'] != '')){
			$exp_final =explode("/", $data['dok'][0]['files']);
			$prev_doc2 = "<input type=\"text\" name=\"\" value=\"{$exp_final[1]}\" readonly>";
		}*/
		
		if(isset($data['df'][0]['tags']) && ($data['df'][0]['tags'] != '')){
			$exp_naskah =explode("/", $data['df'][0]['files']);
			$directory= $exp_naskah[0];
			$file = $exp_naskah[1];
			$ex  = explode('.',$data['df'][0]['tags']);
			$sub = substr($ex[0],0,18);
			$join= $sub.".".$ex[1];
			// $prev_doc ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['df'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			$prev_doc ="<a class=\"btn btn-success\" title=\"{$data['df'][0]['tags']}\" href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$join}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			
		}
	
		if(isset($data['dok'][0]['tags']) && ($data['dok'][0]['tags'] != '')){
			$exp_final =explode("/", $data['dok'][0]['files']);
			$directory= $exp_final[0];
			$file = $exp_final[1];
			$ex2  = explode('.',$data['dok'][0]['tags']);
			$sub2 = substr($ex2[0],0,18);
			$join2= $sub2.".".$ex2[1];
			// $prev_doc2 ="<a class=\"btn btn-success\"  href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$data['dok'][0]['tags']}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			$prev_doc2 ="<a class=\"btn btn-success\"  title=\"{$data['dok'][0]['tags']}\" href=\"{$app_domain}public_assets/{$directory}/{$file}\">{$join2}<i class=\"icon-arrow-down icon-white\"></i> </a>";
			
		}
		?>
		<tr>
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
			<td><?=$prev_doc?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?=$prev_doc2?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>	
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td>Upload Cover Dokumen</td>
			<td>&nbsp;</td>
			<td><input type="file" name="cover" id="imgInpPlay" /></td>
			<input type="hidden" name="cover_hidden"   value="<?=(isset($editPerencanaan[0]['image']) ? $editPerencanaan[0]['image'] : '')?>"/>
			<td>&nbsp;</td>			
			<td>Upload Peta Struktur ruang</td>
			<td>&nbsp;</td>
			<td><input type="file" name="sr" id="imgInpPlay2"/></td>
			<input type="hidden" name="sr_hidden" id="sr_hidden"  value="<?=(isset($data['sr'][0]['files']) ? $data['sr'][0]['files'] : '')?>"/>
			<td>&nbsp;</td>
			<td>Upload Peta pola ruang</td>
			<td>&nbsp;</td>
			<td><input type="file" name="ppr" id="imgInpPlay3" /></td>
			<input type="hidden" name="ppr_hidden" id="ppr_hidden" value="<?=(isset($data['ppr'][0]['files']) ? $data['ppr'][0]['files'] : '')?>"/>
		</tr>	
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td><?php 
				if($editPerencanaan[0]['image'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$editPerencanaan[0]['image']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay"/><br/>
				<?php } ?>
			</td>
			<td>&nbsp;</td>
			
			<td></td>
			<td>&nbsp;</td>
			<td><?php 
				if($data['sr'][0]['files'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$data['sr'][0]['files']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay2"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay2"/><br/>
				<?php } ?>
			</td>
			<td>&nbsp;</td>
			
			<td>&nbsp;</td>
			<td><td><?php 
				if($data['ppr'][0]['files'] != ''){
				?>
				<img src="<?=$app_domain?>public_assets/<?=$data['ppr'][0]['files']?>" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay3"/><br/>
				<?php }else{ ?>
				<img src="<?=$basedomain?>images/no-images.gif" style="height:200px;margin-bottom:10px; width:200px" class="img-polaroid" id="previewplay3"/><br/>
				<?php } ?>
			</td></td>		
		</tr>
		<tr>
			<td>Kata Kunci</td>
			<td>&nbsp;</td>
			<td><input type="text"  name="keyword" value="<?=(isset($editPerencanaan[0]['thumbnailimage']) ? $editPerencanaan[0]['thumbnailimage'] : '')?>"/></td>
		</tr>
	</table>	
	<input type="hidden" name="id_repo_0" id="id"  value="<?=(isset($data['dok'][0]['id']) ? $data['dok'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_1" id="id"  value="<?=(isset($data['df'][0]['id']) ? $data['df'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_2" id="id"  value="<?=(isset($data['sr'][0]['id']) ? $data['sr'][0]['id'] : '')?>"/>
	<input type="hidden" name="id_repo_3" id="id"  value="<?=(isset($data['ppr'][0]['id']) ? $data['ppr'][0]['id'] : '')?>"/>
	<br/>
	<p><b>Abstraksi :</b></p>
	<!--better diganti Editor text-->
	<textarea style="width:100%;height:200px;"  name="editor" id ="editor1" class="ckeditor"><?=(isset($editPerencanaan[0]['content']) ? $editPerencanaan[0]['content'] : '')?>
	</textarea>
	<br/>
	<p><b>Deskripsi :</b></p>
	<!--better diganti Editor text-->
	<textarea style="width:100%;height:200px;"  name="deskripsi" id ="editor2" class="ckeditor"><?=(isset($editPerencanaan[0]['brief']) ? $editPerencanaan[0]['brief'] : '')?>
	</textarea>
	<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($editPerencanaan[0]['fromwho']) ? $editPerencanaan[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
	<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($editPerencanaan[0]['authorid']) ? $editPerencanaan[0]['authorid'] : $_SESSION['user']['id'])?>"/>
    <input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>	
	<input type="submit" class="btn btn-primary" name="posting" value=" Simpan "/>
	<a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="button" class="btn btn-primary" value="Kembali"/></a>
	</form>
</div>
<script language="javascript">
function handleFileSelect(evt) {
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

  document.getElementById('files_2').addEventListener('change', handleFileSelect2, false);
  


$(document).ready(function(){
    $('#provinsi').change(function(){
	$("#kabupaten").show();
	$("#kabupaten_h").hide();
	var idKab = $(this).val();	
        $.post(basedomain+"produk/kabupaten",{id:idKab},function(obj){
			$('#kabupaten').html(obj);
        });
    });
});

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
			$('#previewplay2').attr('src', e.target.result);
			$('#previewplay2').attr('width', '200px');
			$('#previewplay2').attr('height', '200px');
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
			$('#previewplay3').attr('src', e.target.result);
			$('#previewplay3').attr('width', '200px');
			$('#previewplay3').attr('height', '200px');
		}
		 reader.readAsDataURL(input.files[0]);
	}
}   
$("#imgInpPlay3").change(function(){
	readURLplay3(this);
});
</script>


				
				
		