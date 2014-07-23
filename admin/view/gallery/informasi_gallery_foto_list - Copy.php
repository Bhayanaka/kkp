			<script type="text/javascript" charset="utf-8">
				$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
			{
			// DataTables 1.10 compatibility - if 1.10 then versionCheck exists.
			// 1.10s API has ajax reloading built in, so we use those abilities
			// directly.
			if ( $.fn.dataTable.versionCheck ) {
				var api = new $.fn.dataTable.Api( oSettings );
		 
				if ( sNewSource ) {
					api.ajax.url( sNewSource ).load( fnCallback, !bStandingRedraw );
				}
				else {
					api.ajax.reload( fnCallback, !bStandingRedraw );
				}
				return;
			}
		 
			if ( sNewSource !== undefined && sNewSource !== null ) {
				oSettings.sAjaxSource = sNewSource;
			}
		 
			// Server-side processing should just call fnDraw
			if ( oSettings.oFeatures.bServerSide ) {
				this.fnDraw();
				return;
			}
		 
			this.oApi._fnProcessingDisplay( oSettings, true );
			var that = this;
			var iStart = oSettings._iDisplayStart;
			var aData = [];
		 
			this.oApi._fnServerParams( oSettings, aData );
		 
			oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
				/* Clear the old information from the table */
				that.oApi._fnClearTable( oSettings );
		 
				/* Got the data - add it to the table */
				var aData =  (oSettings.sAjaxDataProp !== "") ?
					that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
		 
				for ( var i=0 ; i<aData.length ; i++ )
				{
					that.oApi._fnAddData( oSettings, aData[i] );
				}
				 
				oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
		 
				that.fnDraw();
		 
				if ( bStandingRedraw === true )
				{
					oSettings._iDisplayStart = iStart;
					that.oApi._fnCalculateEnd( oSettings );
					that.fnDraw( false );
				}
		 
				that.oApi._fnProcessingDisplay( oSettings, false );
		 
				/* Callback user function - for event handlers etc */
				if ( typeof fnCallback == 'function' && fnCallback !== null )
				{
					fnCallback( oSettings );
				}
			}, oSettings );
		};
				var oTable;
				$(document).ready(function() {
				$('#galleryFototable').dataTable({
					// "aoColumnDefs": [
						// { "sType": "numeric", "aTargets": [ 0 ] },
						// { "bSearchable": false, "aTargets": [ 1 ] }
						
					// ],
					"aoColumns":[
						 {"bSortable": true},
						 {"bSortable": true},
                         {"bSortable": true},
                         {"bSortable": true},
                         {"bSortable": true},
                         {"bSortable": false}],
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "datatables_api/server_processing_galleryFoto",
					"fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
						oSettings.jqXHR = $.ajax( {
							"dataType": 'json',
							"type": "POST",
							"url": sSource,
							"data":aoData,
							"success": fnCallback
						});
					}
				});	
					oTable= $('#galleryFototable').dataTable();
					oTable.fnReloadAjax("datatables_api/server_processing_galleryFoto/?category='6'&articletype='2'");
			} );
		</script>
				<div class="laper3"></div>
				<a href="<?=$basedomain?>berita" class="sub_menu_in">Berita</a>
				<a href="<?=$basedomain?>agenda" class="sub_menu_in">Agenda</a>
				<a href="<?=$basedomain?>opini" class="sub_menu_in">Opini</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_foto_list" class="sub_menu_in on">Gallery Foto</a>
				<a href="<?=$basedomain?>gallery/informasi_gallery_video_list" class="sub_menu_in">Gallery Video</a>
				<a href="<?=$basedomain?>kontak" class="sub_menu_in">Kontak</a>
				<br/>
				<br/>
				<h4 class="title_sub_menu_in">List Gallery Foto</h4>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>gallery/informasi_gallery_foto_input" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<?php
				}
				echo "&nbsp;";
				?>
				<table class="table table-striped" id="galleryFototable">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Nama Album</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					// pr($_SESSION);
					if ($data) {
					$no=1;
					foreach($data as $key=>$val){
					//pr($val);
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
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_publish/?id=<?=$val['id']?>&n_status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_publish/?id=<?=$val['id']?>&n_status=<?=$val['n_status']?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_edit/?id=<?=$val['id']?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp;
								<a href="<?=$basedomain?>gallery/informasi_gallery_foto_delete/?id=<?=$val['id']?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
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
				
				
				
			