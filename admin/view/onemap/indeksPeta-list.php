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
				$('#indeksPetaTable').dataTable({
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
					"sAjaxSource": "../datatables_api/server_processing_indeksPetaTematik",
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
					oTable= $('#indeksPetaTable').dataTable();
					oTable.fnReloadAjax("../datatables_api/server_processing_indeksPetaTematik/?category='15'&articletype='4'");
			} );
		</script>
				<div class="laper3"></div>
				<a class="sub_menu_in" href="<?php $basedomain?>index/?categoryid=10">Visi Misi</a>
				<a class="sub_menu_in" href="<?php $basedomain?>index/?categoryid=11">Rencana Aksi</a>
				<a class="sub_menu_in" href="<?php $basedomain?>index/?categoryid=12">Target dan Capaian</a>
				<a class="sub_menu_in" href="<?php $basedomain?>index/?categoryid=13">Dokumentasi</a>
				<a class="sub_menu_in" href="<?php $basedomain?>dbtematik_view">Database Tematik</a>
				<a class="sub_menu_in on" href="<?php $basedomain?>indeksPeta_view">Indeks Peta Tematik</a>
				<a class="sub_menu_in" href="<?php $basedomain?>dbspasial_view">Database Spasial</a>
				<br />
				<br />
				<h4 class="title_sub_menu_in">List Indeks Peta Tematik </h4>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>onemap/add" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<?php
				}
				?>
				<br />
				<table class="table table-striped" id="indeksPetaTable">
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
					// pr($data);
					$no = 1;
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
							/*if ($val['fromwho'] == '1'){
								echo $_SESSION['user']['name'].' As Administrator';
							}elseif($val['fromwho'] == '2'){
								echo $_SESSION['user']['name'].' As Guest';
							}
							else{	
								echo $_SESSION['user']['name'].' As User';
							} */
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
								<a href="status_peta/?id=<?php echo $val['id'];?>&status_peta=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_peta/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
						
							<?php
							}elseif($_SESSION['user']['usertype'] == '2' && $val['fromwho'] !='1'){
							?>	
								<a href="status_peta/?id=<?php echo $val['id'];?>&status_peta=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_peta/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
							<?php
							}elseif($_SESSION['user']['usertype'] == '3' && $val['fromwho'] =='3'){
							?>		
								<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
								<a href="del_peta/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
							
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
				
		
		