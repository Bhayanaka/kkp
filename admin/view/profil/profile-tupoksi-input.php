<script>
	$(function(){
		$("#postdate").datetimepicker({
		dateFormat:'yy-mm-dd',
		timeFormat:'HH:mm:ss',
		stepSecond:10});
	});
	function myFunction(){
		// alert("Page is loaded");
		$('#btn-primary').attr('disabled','disabled');
		$('#btn-primary').css('background','grey');
		$('#title').attr('disabled','disabled');
		$('#postdate').attr('disabled','disabled');
		// $('#content').attr('disabled','disabled');
		$('#img_strtr').attr('disabled','disabled');
	} 
	
	/*function check_edit(){
		var checked=false;
		var elements = document.getElementsByName("check_strutur");
		if(elements[0].checked){
				checked = true;
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#title').removeAttr('disabled');
				$('#postdate').removeAttr('disabled');
				$('#content').removeAttr('disabled');
				$('#img_strtr').removeAttr('disabled');
		}
		else if (!checked){
			$('#btn-primary').attr('disabled','disabled');
			$('#btn-primary').css('background','grey');
			$('#title').attr('disabled','disabled');
			$('#postdate').attr('disabled','disabled');
			$('#content').attr('disabled','disabled');
			$('#img_strtr').attr('disabled','disabled');
		}
		return checked;
	}*/
	function edit(){
		var elements = $("#edit").val();
		if(elements == 0){
				$('#title').removeAttr('disabled');
				$('#postdate').removeAttr('disabled');
				$('#img_strtr').removeAttr('disabled');
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#createdate').removeAttr('disabled');
				$('#imgInpPlay').removeAttr('disabled');
				$('#edit').val('1');
				$('#edit').html('Kembali');
				$('#edit').css("background","#BD362F");
		}
		else {
				$('#title').attr('disabled','disabled');
				$('#postdate').attr('disabled','disabled');
				$('#img_strtr').attr('disabled','disabled');
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
<a href="<?=$basedomain?>profil/sejarah" class="sub_menu_in">Sejarah</a>
<a href="<?=$basedomain?>profil/struktur" class="sub_menu_in">Struktur Organisasi</a>
<a href="<?=$basedomain?>profil/tupoksi" class="sub_menu_in on">Tupoksi</a>
<br/>
<br/>
<h4 class="title_sub_menu_in">Tugas Pokok dan Fungsi</h4>
<div class="new_input">
	<form method="post" action="<?=$basedomain?>profil/input_tupoksi" enctype = "multipart/form-data">
		<table>
			<tr>
				<?php //echo"<td><input type=\"checkbox\" name=\"check_strutur\" id=\"check_strutur\" value=\"Edit\" onchange=\"return check_edit(this)\" >&nbsp;&nbsp;Edit ";?>
			</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>&nbsp;</td>
				<td><input type="text" name="title" id="title" required="required" value="<?=(isset($result[0]['title']) ? $result[0]['title'] : '')?>"/></td>
			</tr>
			<tr>
				<td>Tanggal dibuat</td>
				<td>&nbsp;</td>
				<td><input type="text" name="postdate" id="postdate" value="<?=(isset($result[0]['postdate']) ? $result[0]['postdate'] : '')?>"/></td>
			</tr>
			<!--<tr>
				<td>Unggah Gambar</td>
				<td>&nbsp;</td>
				<td><input type="file" name="img_strtr" id="img_strtr"/></td>
				<input type="hidden" name="img_hidden" value="<?//=(isset($result[0]['image']) ? $result[0]['image'] : '')?>">
			</tr>-->
		</table>
		<p><b>Isi Tugas Pokok dan Fungsi :</b></p>
		<!--better diganti Editor text-->
		<textarea style="width:100%;height:200px;" name="content" id="content" class="ckeditor"><?=(isset($result[0]['content']) ? $result[0]['content'] : '');?></textarea>
			
		<!-- input type hidden-->
		<input type="hidden" name="id" id="id"  value="<?=(isset($result[0]['id']) ? $result[0]['id'] : '')?>"/>
		<input type="hidden" name="categoryid" id="categoryid"  value="<?=(isset($result[0]['categoryid']) ? $result[0]['categoryid'] : '3') ?>"/>
		<input type="hidden" name="articletype" id="articletype"  value="<?=(isset($result[0]['articletype']) ? $result[0]['articletype'] : '1')?>"/>
		<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($result[0]['createdate']) ? $result[0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
		<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($result[0]['fromwho']) ? $result[0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
		<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($result[0]['authorid']) ? $result[0]['authorid'] : $_SESSION['user']['id'])?>"/>
		<input type="hidden" name="n_status" id="n_status"  value="<?=(isset($result[0]['n_status']) ? $result[0]['n_status'] : '1')?>"/>
			
		<input type="submit" class="btn btn-primary" id="btn-primary" value="Simpan"/>
		<?php if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){ ?>
			<a href="#" onclick="return edit()"><button type="button" class="btn btn-primary" id="edit" value="0"/>Edit</button></a>
		<?php } ?>
	</form>
</div>

				
			