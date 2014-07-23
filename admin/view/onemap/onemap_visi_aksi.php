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
		$('#postdate').attr('disabled','disabled');
		// $('#content').attr('disabled','disabled');
		$('#imgInpPlay').attr('disabled','disabled');
	} 
	
	/*function check_edit(){
		var checked=false;
		var elements = document.getElementsByName("check_strutur");
		if(elements[0].checked){
				checked = true;
				$('#btn-primary').removeAttr('disabled');
				$('#btn-primary').css("background","#006DCC");
				$('#postdate').removeAttr('disabled');
				$('#content').removeAttr('disabled');
				$('#imgInpPlay').removeAttr('disabled');
		}
		else if (!checked){
				$('#btn-primary').attr('disabled','disabled');
				$('#btn-primary').css('background','grey');
				$('#postdate').attr('disabled','disabled');
				$('#content').attr('disabled','disabled');
				$('#imgInpPlay').attr('disabled','disabled');
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

<?php ?>
				<div class="laper3"></div>
				<?php
				// echo $basedomain;
					$page=false; 
					if($kategori){
						
						if(isset($_GET)){
			
							if(isset($_GET['categoryid']) && count($_GET['categoryid'])!=0)
							{
								$categoryid=$_GET['categoryid'];
							}else{
								$categoryid=10;
							}
						}
					foreach($kategori as $key=>$val){
						if($categoryid==$val['id']){
							$class="sub_menu_in on";
							$page=$val['value'];
						}else{
							$class="sub_menu_in";		
						}
							if($val['id'] != '14'){
							echo'<a href="'.$basedomain.'onemap/index/?categoryid='.$val['id'].'" class="'.$class.'">'.$val['value'].'</a>';
						}else{
								echo'<a href="'.$basedomain.'onemap/dbtematik_view" class="sub_menu_in">Database Tematik</a>';
								echo'<a href="'.$basedomain.'onemap/indeksPeta_view" class="sub_menu_in">Indeks Peta Tematik</a>';
								echo'<a href="'.$basedomain.'onemap/dbspasial_view" class="sub_menu_in">Database Spasial</a>';
							
							
						}
						
					}
				}
				?>
				<br/>
				<br/>
				<?php 
				
				if($page != 'Database Tematik' && $categoryid !='14') { ?>
				<h4 class="title_sub_menu_in"><?=$page?></h4>
				<div class="new_input">
					<form method="post" action="<?=$basedomain?>onemap/changeData"  enctype="multipart/form-data">
					<table>
						<tr>
							<?php 
							// pr($_SESSION['user']['usertype']);
							// pr($_SESSION);
							/*if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){
								echo"<td><input type=\"checkbox\" name=\"check_strutur\" id=\"check_strutur\" value=\"Edit\" onchange=\"return check_edit(this)\" >&nbsp;&nbsp;Edit ";
							}*/
							?>
							
						</td>
						</tr>
						<tr>
							<td>Tanggal dibuat</td>
							<td>&nbsp;
								<input type="hidden" name="id" value="<?=(isset($data[0]['id']) ? $data[0]['id'] : '');?>">
								<input type="hidden" name="categoryid" value="<?=$categoryid?>">
								<input type="hidden" name="title" value="<?=$page?>">
							</td>
							<td><input type="text" name="postdate" id="postdate" value="<?=(isset($data[0]['postdate']) ? $data[0]['postdate'] : '');?>"/></td>
						</tr>
						<?php 
						if(isset($data[0])){
							$directory = explode("/",$data[0]['image']);
						}else{
							$directory = '';
						}
						if(isset($data[0]['image']) != '' && $data[0]['image'] != ''){
							$default_image_cover = 'public_assets/'.$directory[0].'/'.$directory[1];
							$prev_image_cover = $app_domain.$default_image_cover;
						}else{
							
							$default_image_cover = 'images/no-images.gif';
							$prev_image_cover = $basedomain.$default_image_cover;
						}
						?>
						<tr>
							<td>Upload Gambar</td>
							<td>&nbsp;</td>
							<td><img src="<?=$prev_image_cover?>" style="height:160px;margin-bottom:10px;" class="img-polaroid" id="previewplay"/><br/>
								<input type="hidden" name="image_hidden" id="image_hidden"  value="<?=(isset($data[0]['image']) ? $data[0]['image'] : '')?>"/>
								<input type="file" name="image" id="imgInpPlay"/></td>
						</tr>
					</table>
					<p><b>Isi <?=$page?> :</b></p>
					<!--better diganti Editor text-->
					<textarea style="width:100%;height:200px;" name="content" id="content" class="ckeditor">
						<?=(isset($data[0]['content']) ? $data[0]['content'] : '');?>
					</textarea>
					<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($data['edit'][0]['createdate']) ? $data['edit'][0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
					<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($data['edit'][0]['fromwho']) ? $data['edit'][0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
					<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($data['edit'][0]['authorid']) ? $data['edit'][0]['authorid'] : $_SESSION['user']['id'])?>"/>
			
					<input type="submit" class="btn btn-primary" id="btn-primary" value=" Simpan "/>
					<?php if($_SESSION['user']['usertype'] =='1' || $_SESSION['user']['usertype'] =='2'){ ?>
					<a href="#" onclick="return edit()"><button type="button" class="btn btn-primary" id="edit" value="0"/>Edit</button></a>
					<?php } ?>
					</form>
				</div>
				<?php }
				else{
				echo "tidak ada";
				}?>
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
				
			