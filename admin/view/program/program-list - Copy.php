<?php
// pr($data);
?>
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in">List Program</h4>
					</div>
				</div>
				<div class="row-fluid" >
					<?php 
					if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
					?>
					<div class="span9"><a href="<?=$basedomain?>program/addprogram" class="btn btn-primary"> Tambah Data</a></div>
					<?php
					}
					?>
					<table class="form-inline">
							<tr>
								<td>Sort by : 
								</td>
								<td> 
									<select name="category" required>
									<option value="">- Semua Kategori -</option>
										<?php
										if($data['category']){
										foreach ($data['category'] as $key => $value){
										?>
										<option value="<?=$value['id']?>"><?=$value['value']?></option>
										<?php
											}
										}
									?>	
								</select>
								</td>
							</tr>
						</table>
				</div>	
				<?php echo "&nbsp";?>		
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Status</th>
						<th>Tipe</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					// pr($data);
					if($result){
					foreach($result as $key=>$val){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $val['postdate']; ?></td>
						<td><?php echo $val['title']; ?></td>
						
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
							if($val['articletype']=='1'){
								echo 'Penyusunan Rencana Strategis WP-3-K';
							}elseif($val['articletype']=='2'){
								echo 'Penyusunan Rencana Zonasi WP-3-K';
							}elseif($val['articletype']=='3'){
								echo 'Penyusunan Rencana Pengelolaan WP-3-K';
							}elseif($val['articletype']=='4'){
								echo 'Penyusunan Rencana Aksi WP-3-K';
							}elseif($val['articletype']=='5'){
								echo 'Lain-Lain';
							} 
							?></td>
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
								<a href="status_program/?id=<?php echo $val['id'];?>&status_program=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="addprogram/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_program/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="status_program/?id=<?php echo $val['id'];?>&status_program=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="addprogram/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_program/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="addprogram/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_program/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
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
					<td colspan="7"></td>
				</tfoot>
				</table>
				
				
			