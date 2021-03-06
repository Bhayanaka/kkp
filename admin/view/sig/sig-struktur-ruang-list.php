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
				$('#sigStrukturTable').dataTable({
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
					"sAjaxSource": "../datatables_api/server_processing_petaStrukturRuang",
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
					oTable= $('#sigStrukturTable').dataTable();
					oTable.fnReloadAjax("../datatables_api/server_processing_petaStrukturRuang/?category='34'");
			} );
				$(document).on("change",'#provinsi,#kabupaten,#type',function(){
                    // Reload data based on choice
                    // var category	= $("#category").val();  
					var provinsi		= $("#provinsi").val();
					var kabupaten		= $("#kabupaten").val();
					var type			= $("#type").val();
					
					oTable.fnReloadAjax("../datatables_api/server_processing_petaStrukturRuang/?category='34' & provinsi=" + provinsi +"& kabupaten="+ kabupaten +"& type="+ type );
					// oTable.fnReloadAjax("../datatables_api/server_processing_program/?category="+$("#category option:selected").val());
                 });  
		</script>
					<h4 class="title_sub_menu_in">List Peta Struktur Ruang</h4>
					
					<?php 
					if($_SESSION['user']['usertype'] == '1' || $_SESSION['user']['usertype'] == '2' || $_SESSION['user']['usertype'] == '3' ){
					?>
					<div class="span4"><a href="<?=$basedomain?>sig/addpola_struktur" class="btn btn-primary"> Tambah Data</a></div>
					<?php
					}
					?>
					<table class="form-inline">
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td> 
									<?php
									if(isset($lokasi[0]['id_provinsi'])) $provinsi=$lokasi[0]['id_provinsi']; else $provinsi="";
									if(isset($lokasi[0]['id_kabupaten'])) $kabupaten=$lokasi[0]['id_kabupaten']; else $kabupaten="";
									if(isset($data['kabupaten'])) $list=$data['kabupaten']; else $list="";
									provLocation($data['lokasi'],'on',$provinsi);
								?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								</td>
								<td> 
									<?php
									kabLocation('off',$list,$kabupaten);?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td> 
									<select name="type" id="type" required>
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
							</tr>
						</table>
						<div class="laper3"></div>
				<br/>
				
				<table class="table table-striped" id="sigStrukturTable">
					<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Upload</th>
						<th>Judul</th>
						<th>Provinsi</th>
						<th>Kabupaten / Kota</th>
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
				
				
				
			