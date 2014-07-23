		<div class="laper3"></div>
				
				<h4 class="title_sub_menu_in">List Peraturan</h4>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="span9"><a href="<?=$basedomain?>peraturan/formPeraturan" class="btn btn-primary">Tambah Data</a></div>
				<?php
				}
				?>
				<div class="row-fluid">
					<table class="form-inline">
					<tr>
						<td> 
							<select>
								<option>- Semua Kategori -</option>
									<?php
										if($kategori){	
											$i=1;
											foreach($kategori as $key=>$val){
												echo'<option value="'.$val['id'].'">'.$val['value'].'</option>';
											}
										}
									?>
							</select>
						</td>
						<td>
						</td>
					</tr>
				</table>	
				</div>
				<?php
				echo "&nbsp;";
				?>
				<table class="table table-striped table-hover" id="tableajax">
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
							// pr($data);
							 if($data){
							 $no=1;
							 foreach($data as $key=>$val){
							 
							 
								//echo $val['brief']."<br/>";
								
								?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$val['postdate']?></td>
						<td class="berita"><?=$val['title']?></td>
						<td>
						<?php
						if($val['n_status']==1){
							echo "Published";
						} elseif($val['n_status']==0){
							echo "Unpublish";
						}
						?>						
						</td>
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
								<a href="<?=$basedomain?>peraturan/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>peraturan/formPeraturan/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>peraturan/delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="<?=$basedomain?>peraturan/change_status/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>peraturan/formPeraturan/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>peraturan/delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="<?=$basedomain?>peraturan/formPeraturan/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>peraturan/delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
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
					<td colspan="8"></td>
					</tfoot>
				</table>
				
				
				
			</div>
	
		