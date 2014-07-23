				
				<h4 class="title_sub_menu_in">List Slideshow</h4>
				<div class="row-fluid" >
					<?php 
					if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
					?>
					<div class="span6"><a href="<?=$basedomain?>slideshow/add" class="btn btn-primary">Tambah Data</a></div>
					<?php
					}
					?>
				</div>
				<br />
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Tipe</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					if($data['result']){
					foreach($data['result'] as $key=>$val){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $val['postdate']; ?></td>
						<td><?php echo $val['title']; ?></td>
						<td><?php echo $val['tags']; ?></td>
						
						<td><?php 
							if($val['n_status'] == '0'){
								echo "unpublished";
							}elseif($val['n_status'] == '1'){
								echo "published";
							}else{
								echo "inactive";
							}?>
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
									// pr($value);
									if($value['id'] == $val['authorid'] && $value['usertype'] == $val['fromwho']){
										// echo $value['id'];
										echo $value['name'].$as;
									} 
								}
							?></td>
						<td>
						<?php
						if($_SESSION['user']['usertype'] == '1'){
							?>
								<a href="status_slide/?id=<?php echo $val['id'];?>&status_slide=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_slide/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="status_slide/?id=<?php echo $val['id'];?>&status_slide=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_slide/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_slide/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}else{
								//no action
							}
							?>
						
						</td>
					</tr>
					<?php	
						}	
					}?>
					</tbody>
					<tfoot>
					<td colspan="6"></td>
					</tfoot>
				</table>
				
				
				<div class="row-fluid" >
				</div>
		