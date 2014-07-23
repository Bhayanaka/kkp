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
				$('#produkTable').dataTable({
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
                         {"bSortable": true},
                         {"bSortable": true},
                         {"bSortable": false}],
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "../datatables_api/server_processing_produk",
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
					oTable= $('#produkTable').dataTable();
					oTable.fnReloadAjax("../datatables_api/server_processing_produk");
			} );
				$(document).on("change",'#category,#type',function(){
                    // Reload data based on choice
                    var category	= $("#category").val();  
					var type		= $("#type").val(); 
					oTable.fnReloadAjax("../datatables_api/server_processing_produk/?category=" + category +"& type="+ type);
					// oTable.fnReloadAjax("../datatables_api/server_processing_program/?category="+$("#category option:selected").val());
                 });  
		</script>
				<div class="row-fluid" >
					<div class="span12">
						<h4 class="title_sub_menu_in">Dokumen Perencanaan WP3K</h4>
					</div>
				</div>
				<?php 
				if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
				?>
				
					<div class="span6"><a href="<?=$basedomain?>produk/addPerencanaan" class="btn btn-primary"> Tambah Data</a></div>
				
				<?php
				}
				?>
				<div class="row-fluid">
					<table class="form-inline">
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td> 
									<select name="type" id="type" width="100%">
									<option value="">- Semua Tipe -</option>
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
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td> 
									<select name="category" id="category" width="100%">
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
				<table class="table table-striped table-hover" id="produkTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>						
						<th>Provinsi</th>
						<th>Kabupaten</th>
						<th>Kecamatan</th>
						<th>Status</th>
						<th>Operator</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
					<td colspan="9"></td>
				</tfoot>
				</table>
				
				
				
			