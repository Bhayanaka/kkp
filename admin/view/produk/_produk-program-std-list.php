
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in">Program</h4>
					</div>
					<div class="span7">
						<div class="laper3"></div>
						
					</div>
				</div>
				<table class="table table-striped table-hover" id="tableajax">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>						
						<th>Kategori</th>
						<th>Operator</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>				
					<?php
					$i = 1;
					if($get_data){
						foreach ($get_data as $val){
						
					?>
					<tr>
						<td><?= $i;?></td>
						<td><?= $val['createdate'];?></td>
						<td class="berita"><?= $val['title'];?></td>						
						<td>
						<?php
						foreach ($kat as $valst){
							if($val['articletype'] == $valst['id']){
								if($valst['value'] != ''){
									echo $valst['value'];
								}
							}
						}
						?>
						</td>
						<td>
						<?php
						foreach ($user as $var){
							if($val['authorid'] == $var['id']){
								if($var['name'] != ''){
									echo $var['name'];
								}
							}
						}
						?>
						</td>
						<td>
						<?php
						  if($val['n_status'] == '1'){
							echo "Publish";
						  }else{
							echo "Unpublish";
						  }
						  ?>
						</td>
						<td>
							<?php if($val['n_status'] == '1'){?>
							<a href="<?=$basedomain?>produk/change_status_program/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Unpublish'></a>&nbsp;&nbsp;&nbsp;
							<?php }else{ ?>
							<a href="<?=$basedomain?>produk/change_status_program/?id=<?=$val['id']?>&status=<?=$val['n_status']?>" class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;
							<?php } ?>&nbsp;&nbsp;&nbsp;
							<a href="<?=$basedomain.'produk/addProgram/?edit='.$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
							<a href="<?=$basedomain.'produk/updateStatusProgram/?delete='.$val['id']?>" class="icon-trash" title="Hapus"></a>
						</td>
					</tr>
					<?php
					$i++;
						}
					}
					?>
				</tbody>
				<tfoot>
					<td colspan="8"></td>
				</tfoot>
				</table>
				
				
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>produk/addProgram" class="btn btn-primary"> Tambah </a></div>
				</div>
			