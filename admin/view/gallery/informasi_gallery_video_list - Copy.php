
				<div class="laper3"></div>
				<a href="<?=$basedomain?>berita" class="sub_menu_in">Berita</a>
				<a href="<?=$basedomain?>agenda" class="sub_menu_in">Agenda</a>
				<a href="<?=$basedomain?>opini" class="sub_menu_in">Opini</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_foto_list" class="sub_menu_in">Gallery Foto</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_video_list" class="sub_menu_in on">Gallery Video</a>
				<a href="<?=$basedomain?>kontak" class="sub_menu_in">Kontak</a>
				<br/>
				<br/>
				<h4 class="title_sub_menu_in">List Gallery Video</h4>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>gallery/informasi_gallery_video_input" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<?php
				}
				echo "&nbsp;";
				?>
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					// pr($_SESSION);
					// pr($user);	
					if ($data) {
					$no=1;
					foreach($data as $key=>$val){
					//echo ('ada');
					//echo $val['content']."<br/>";
					//pr($data);
					if ($val['n_status']=='1')  $status ='Publish';
					if ($val['n_status']=='0') $status ='Non Publish';
					if ($val['n_status']=='2') $status ='Delete';
					
					
					?>
					
					<tr>
						<td><?=$no++?></td>
						<td><?php echo $val['postdate'] ?></td>
						<td class="berita"><?php echo $val['title'] ?></td>
						<td><?php echo ($status)?></td>
						<td><?php 
							if ($val['fromwho'] == '1'){
								$as = ' As Administrator';
							}elseif($val['fromwho'] == '2'){
								$as =' As Publisher';
							}else{	
								$as =' As Operator';
							}
							
							foreach($user as $key=>$value){
									if($value['id'] == $val['authorid'] && $value['usertype'] == $val['fromwho'] ){
										echo $value['name'].$as;
									} 
								}	
							?></td>
						<td>
							<?php
							// echo $val['fromwho'];
							if($_SESSION['user']['usertype'] == '1'){
							?>
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_publish/?id=<?=$val['id']?>&n_status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_publish/?id=<?=$val['id']?>&n_status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_video_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
						
							<?php
							}else{
								//no action
							}
							?>
						</td>
					</tr>
					<?php
						}
						}
						?>
					</tbody>
				<tfoot>
				<td colspan="6"></td>
				</tfoot>

				</table>
				
				
			