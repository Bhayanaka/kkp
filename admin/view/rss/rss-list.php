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
				$('#rssTable').dataTable({
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
                         {"bSortable": true},
                         {"bSortable": false}],
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "../datatables_api/server_processing_rss",
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
					oTable= $('#rssTable').dataTable();
					oTable.fnReloadAjax("../datatables_api/server_processing_rss/?category='18'");
			} ); 
		</script>
				<h4 class="title_sub_menu_in">List RSS</h4>
				<div class="row-fluid" >
					<div class="span6"><a href="<?=$basedomain?>rss/add" class="btn btn-primary">Tambah Data</a></div>
				</div>
				<br />
				<table class="table table-striped" id="rssTable">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Link Rss</th>
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
						<td><?php echo $val['brief']; ?></td>
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
								echo $_SESSION['user']['name'].' As Administrator';
							}elseif($val['fromwho'] == '2'){
								echo $_SESSION['user']['name'].' As Guest';
							}
							else{	
								echo $_SESSION['user']['name'].' As User';
							} 
							?></td>
						<td><a href="status_rss/?id=<?php echo $val['id'];?>&status_rss=<?php echo $val['n_status'];?>" class="icon-globe" title="Publish"></a>&nbsp;&nbsp;&nbsp;
							<a href="add/?id=<?php echo $val['id'];?>" class="icon-edit" title="Edit"></a>&nbsp;&nbsp;&nbsp; 
							<a href="del_rss/?id=<?php echo $val['id'];?>" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>
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
		