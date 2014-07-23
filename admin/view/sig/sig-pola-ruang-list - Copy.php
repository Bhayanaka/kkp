
					<h4 class="title_sub_menu_in">List Peta Pola Ruang</h4>
					<div class="row-fluid" >
					<?php 
					if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
					?>
					<div class="span2"><a href="<?=$basedomain?>sig/addpola" class="btn btn-primary"> Tambah Data</a></div>
					<?php
					}
					?>
					<table class="form-inline">
							<tr>
								
								<td>Pilih Provinsi  
								<td>:&nbsp;</td>
								</td>
								<td> 
									<?php
									if(isset($lokasi[0]['id_provinsi'])) $provinsi=$lokasi[0]['id_provinsi']; else $provinsi="";
									if(isset($lokasi[0]['id_kabupaten'])) $kabupaten=$lokasi[0]['id_kabupaten']; else $kabupaten="";
									if(isset($data['kabupaten'])) $list=$data['kabupaten']; else $list="";
									provLocation($data['lokasi'],'on',$provinsi);
								?>
								</td>
								<td>&nbsp; 
								</td>
								<td>Pilih Kabupaten / Kota 
								<td>:&nbsp;</td>
								</td>
								<td> 
									<?php
									kabLocation('off',$list,$kabupaten);?>
								</td>
								<td>&nbsp; 
								</td>
								<td>Pilih Tipe  
								<td>:&nbsp;</td>
								</td>
								<td> 
									<select name="type_peta" required>
										<option value="">- Pilih Tipe -</option>
											<?php
											if($data['type']){
											foreach ($data['type'] as $key => $value){
											?>
											<option value="<?=$value['id']?>"><?=$value['value']?></option>
											<?php
												}
											}
										?>	
									</select>
								</td>
								<td>&nbsp; 
								</td>
								
							</tr>
						</table>
					</div>
					<?php echo"&nbsp;";?>
						<div class="laper3"></div>
						
						
					
				<br/>
				
				<table class="table table-striped" id="tableajax">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Provinsi</th>
						<th>Kabupaten / Kota</th>
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
					// pr($data['result']);
					if($data['result']){
					foreach($data['result'] as $key=>$val){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $val['postdate']; ?></td>
						<td><?php echo $val['title']; ?></td>
						<td><?php echo $val['prov'] ; ?></td>
						<td><?php echo $val['kab']; ?></td>
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
							if($val['articletype'] == '1'){
								echo "Nasional";
							}elseif($val['articletype'] == '2'){
								echo "Provinsi";
							}elseif($val['articletype'] == '3'){
								echo "Kabupaten / Kota ";
							}elseif($val['articletype'] == '4'){
								echo "Kabupaten / Kota Rinci";
							}
							?></td>
						<td><?php 
							/*if ($val['fromwho'] == '1'){
								echo $_SESSION['user']['name'].' As Administrator';
							}elseif($val['fromwho'] == '2'){
								echo $_SESSION['user']['name'].' As Guest';
							}
							else{	
								echo $_SESSION['user']['name'].' As User';
							}*/
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
						
								<a href="status/?id=<?php echo $val['id'];?>&status=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="addpola/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_pola/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								
								<a href="status/?id=<?php echo $val['id'];?>&status=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="addpola/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_pola/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="addpola/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_pola/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
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
				<td colspan="9"></td>
				</tfoot>
				</table>
				
				
				
			