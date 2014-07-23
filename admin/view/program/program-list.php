		<script type="text/javascript" charset="utf-8">
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
				<?php 
					if($data['type']){
						
						if(isset($_GET)){
			
							if(isset($_GET['type']) && count($_GET['type'])!=0)
							{
								$type=$_GET['type'];
							}else{
								$type=1;
							}
						}
					foreach($data['type'] as $key=>$val){
						if($type==$val['id']){
							$class="sub_menu_in on";
							$page=$val['value'];
						}else{
							$class="sub_menu_in";		
						}
						echo'<a href="'.$basedomain.'program/program_view/?type='.$val['id'].'" class="'.$class.'">'.$val['value'].'</a>';
						
					}
				}
				
				?>
				<br />
				<br />
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in"><?=$page?></h4>
					</div>
				</div>
				<div class="new_input">
					<form method="post" action="<?=$basedomain?>program/changeData"  enctype="multipart/form-data">
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
							<td>Tanggal</td>
							<td>&nbsp;
								<input type="hidden" name="id" value="<?=(isset($data['result'][0]['id']) ? $data['result'][0]['id'] : '');?>">
								<input type="hidden" name="articletype" value="<?=(isset($data['result'][0]['articletype']) ? $data['result'][0]['articletype'] : $type);?>">
								<input type="hidden" name="title" value="<?=$page?>">
							</td>
							<td><input type="text" name="postdate" id="postdate" required="required" value="<?=(isset($data['result'][0]['postdate']) ? $data['result'][0]['postdate'] : '');?>"/></td>
						</tr>
						<?php 
						if(isset($data['result'][0])){
							$directory = explode("/",$data['result'][0]['files']);
						}else{
							$directory = '';
						}
						if(isset($data['result'][0]['files']) != '' && $data['result'][0]['files'] != ''){
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
								<input type="hidden" name="image_hidden" id="image_hidden"  value="<?=(isset($data['result'][0]['files']) ? $data['result'][0]['files'] : '')?>"/>
								<input type="file" name="image" id="imgInpPlay"/></td>
						</tr>
					</table>
					<p><b>Isi <?=$page?> :</b></p>
					<!--better diganti Editor text-->
					<textarea style="width:100%;height:200px;" name="content" id="content" class="ckeditor">
						<?=(isset($data['result'][0]['content']) ? $data['result'][0]['content'] : '');?>
					</textarea>
					<input type="hidden" name="createdate" id="postdate"  value="<?=(isset($data['result'][0]['createdate']) ? $data['result'][0]['createdate'] : date('Y-m-d H:i:s'))?>"/>
					<input type="hidden" name="fromwho" id="fromwho"  value="<?=(isset($data['result'][0]['fromwho']) ? $data['result'][0]['fromwho'] : $_SESSION['user']['usertype'])?>"/>
					<input type="hidden" name="authorid" id="authorid"  value="<?=(isset($data['result'][0]['authorid']) ? $data['result'][0]['authorid'] : $_SESSION['user']['id'])?>"/>
			
					<input type="submit" class="btn btn-primary" id="btn-primary" value=" Simpan "/>
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
				
					
				
				
			