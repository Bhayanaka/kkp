	
				<div class="container-fluid big_body" >
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container-fluid">
							<div class="col-md-8">
								<br/>
								<ul class="breadcrumb" style="margin-bottom: 5px;">
								  <li><a href="#">Peraturan</a></li>
								  <li class="active">Index Peraturan Pemerintah</li>
								</ul>
								<h3 class="text-primary">Index Peraturan Pemerintah</h3>
								<hr/>
								
								<div class="form-group">
									<form method="POST" action="<?=$basedomain;?>peraturan/search_peraturan/">
								  <label class="control-label">Masukkan Kata Kunci Untuk Pencarian</label>
								  <div class="input-group">
									<span class="input-group-addon">
										<select name="tahun" class="span2">
											<option value="" >Tahun</option>
											<?=getData_tahun(2010)?>
										</select>
									</span>
									<input type="text" class="form-control" name="title" placeholder="Kata Kunci">
									<input type="hidden" name="kategori" value="" />
									<input type="hidden" name="namakategori" value="Index Peraturan" />
									<span class="input-group-btn">
									 <input type="submit" class="btn btn-primary" name="search" value="Cari"/>
									</span>
								  </div>
								  </form>
								</div>
								
								<table class="tb_produk_dokumen">
									<tr>
										<td colspan="3" align="center">Tidak Ada Data</td>
									</tr>
								</table>
								
								<?=generate_paging($paging,$url);?>
															
							</div>
							<div class="col-md-4">
								 <?=$sidebar?>									
							</div>
							
						</div>	
					
					</div>
					<div class="col-md-1"></div>
			
			</div>