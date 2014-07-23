<?php
class produk_m extends Database {
	
	//add Category Product & type
	//start
	function getCategory()
	{	
		$sql = "SELECT * FROM dtataruang_news_content_category_product WHERE  n_status =1 ORDER BY id ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getType()
	{	
		$sql = "SELECT * FROM dtataruang_news_content_type_product WHERE  n_status =1 ORDER BY id ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	//end
	
	
	function getProvinsi($request)
	{	
		$sql = "SELECT * FROM ".$request['tabel']." WHERE parent = '0' ORDER BY nama_wilayah ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getKabupaten($id)
	{
		$sql = "SELECT * FROM tbl_wilayah WHERE parent = '".$id."' ORDER BY nama_wilayah ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getPerencanaan($request)
	{	
		//$sql = "SELECT * FROM ".$request['tabel']." WHERE (articletype = '1' OR articletype = '2' OR articletype = '3' OR articletype = '4' ) AND n_status != '2' AND categoryid != '20' ORDER BY createdate ASC";
		$sql = "SELECT * FROM ".$request['tabel']." WHERE n_status != '2' ORDER BY createdate ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getProv()
	{	
		$sql = "SELECT * FROM tbl_wilayah WHERE parent = '0' ";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getKab()
	{	
		$sql = "SELECT * FROM tbl_wilayah WHERE parent != '0' ";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getKat()
	{	
		$sql = "SELECT * FROM dtataruang_news_content_type_product  ";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getKatNorma()
	{	
		$sql = "SELECT * FROM dtataruang_news_content_type_norma  ";
		// pr($sql);
		$res = $this->fetch($sql,1);
		// pr($res);	
		if ($res) return $res;
		return false;
	}
	
	function getKatProgram()
	{	
		$sql = "SELECT * FROM dtataruang_news_content_type_program  ";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getTipe($request)
	{	
		$sql = "SELECT * FROM ".$request['tabel2']." ORDER BY id ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getUser()
	{	
		$sql = "SELECT * FROM user_member where n_status !='2'";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	// function getSelectPerencanaan($request,$hidden_id)
	// {	
		// $sql = "SELECT * FROM ".$request['tabel']." WHERE categoryid = '1' OR categoryid = '2' OR categoryid = '3' OR categoryid = '4' OR categoryid = '7' AND id = '".$hidden_id."' ORDER BY createdate ASC";
		// $res = $this->fetch($sql,1);
			
		// if ($res) return $res;
		// return false;
	// }
	
	function getPerencanaanEdit($id)
	{
		$sql = "SELECT * FROM dtataruang_news_content_product WHERE id = '".$id."' ";
		$res = $this->fetch($sql,1);
		foreach($res as $ket => $value)
		{
			if ($value['id']){
				$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} ";	
				$res2 = $this->fetch($sql2,1);
				
				$res[$ket]['file'] = $res2;
			}
		}
			
		if ($res) return $res;
		return false;
	}
	
	function perencanaan_inp($id,$title,$content,$id_provinsi,$id_kabupaten,$kecamatan,
							$tahun,$jml_hal,$lampiran,
							$categoryid,$atricletype,$createdate,$postdate,
							$fromwho,$authorid,$deskripsi,$keyword,$image,$file,$df,$sr,$ppr,$id_repo_0,$id_repo_1,$id_repo_2,$id_repo_3,$OriFilename1,$OriFilename2)
	{      

		if($id)
		{
			//update
			$query = "UPDATE dtataruang_news_content_product SET title='".$title."',content='".slash($content)."',
											id_provinsi='".$id_provinsi."',id_kabupaten='".$id_kabupaten."',kecamatan='".$kecamatan."',
											tahun='".$tahun."',jml_hal='".$jml_hal."',lampiran='".$lampiran."',categoryid='".$categoryid."',
											articletype='".$atricletype."',createdate='".$createdate."',postdate='".$postdate."',
											fromwho='".$fromwho."',authorid='".$authorid."',brief ='".$deskripsi."',thumbnailimage='".$keyword."',image='".$image."' WHERE id='".$id."' ";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			if($result['data']){
				$sql = "SELECT id FROM dtataruang_news_content_product ORDER BY id DESC LIMIT 1";
				$res = $this->fetch($sql);
					//1
					$gallerytype = '3';
					if($id_repo_0 != ''){
						$flag = 'Naskah Akademis';
						$query1 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',tags='".$OriFilename1."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$file."' 
									WHERE id='".$id_repo_0."' "; 
						$result1= $this->query($query1);
					}else{
						$flag = 'Naskah Akademis';
						$query1 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename1."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$file."','".$gallerytype."','".$flag."')"; 
						$result1= $this->query($query1);	
					}
					//2
					if($id_repo_1 != ''){
						$flag = 'Dokumen Final';
						$query2 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',tags='".$OriFilename2."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$df."' 
									WHERE id='".$id_repo_1."' "; 
						$result2= $this->query($query2);	
					}else{
						$flag = 'Dokumen Final';
						$query2 = "INSERT INTO dtataruang_news_content_repo (
													title,content,tags,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."',tags='".$OriFilename2."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$df."','".$gallerytype."','".$flag."')"; 
						$result2= $this->query($query2);	
					}
					//3
					if($id_repo_2 != ''){
						$flag = 'Peta Struktur Ruang';
						$query3 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$sr."' 
									WHERE id='".$id_repo_2."' "; 
						$result3= $this->query($query3);	
					}else{
						$flag = 'Peta Struktur Ruang';
						$query3 = "INSERT INTO dtataruang_news_content_repo (
													title,content,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$sr."','".$gallerytype."','".$flag."')"; 
						$result3= $this->query($query3);	
					}
					//4
					if($id_repo_3 != ''){
						$flag = 'Peta Pola Ruang';
						$query4 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$ppr."' 
									WHERE id='".$id_repo_3."' "; 
						$result4= $this->query($query4);	
					}else{
						$flag = 'Peta Pola Ruang';
						$query4 = "INSERT INTO dtataruang_news_content_repo (
													title,content,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$ppr."','".$gallerytype."','".$flag."')"; 
						$result4= $this->query($query4);	
					}
	
			}
		}else 
		{
			// insert 
			$query = "INSERT INTO dtataruang_news_content_product (
											title,content,id_provinsi,id_kabupaten,kecamatan,
											tahun,jml_hal,lampiran,categoryid,articletype,createdate,postdate,
											fromwho,authorid,image,brief,thumbnailimage) 
									VALUES ('".$title."','".slash($content)."','".$id_provinsi."','".$id_kabupaten."',
									'".$kecamatan."',
											'".$tahun."','".$jml_hal."','".$lampiran."','".$categoryid."','".$atricletype."','".$createdate."',
											'".$postdate."',
											'".$fromwho."','".$authorid."','".$image."','".$deskripsi."','".$keyword."')"; 
			// pr($query);
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_product";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			
			if($result['data']){
				$sql = "SELECT id FROM dtataruang_news_content_product ORDER BY id DESC LIMIT 1";
				$res = $this->fetch($sql);
				$gallerytype = '3';
				if ($res){
					if($file != ''){
					$flag = 'Naskah Akademis';
					$query1 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename1."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$file."','".$gallerytype."','".$flag."')"; 
					// pr($query1);
					$result1= $this->query($query1);	
					}
					if($df != ''){
					$flag = 'Dokumen Final';
					$query2 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename2."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$df."','".$gallerytype."','".$flag."')"; 
					// pr($query2);
					$result2= $this->query($query2);	
					}
					if($sr != ''){
					$flag = 'Peta Struktur Ruang';
					$query3 = "INSERT INTO dtataruang_news_content_repo (
												title,content,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$sr."','".$gallerytype."','".$flag."')"; 
					$result3= $this->query($query3);	
					}
					if($ppr != ''){
					$flag = 'Peta Pola Ruang';
					$query4 = "INSERT INTO dtataruang_news_content_repo (
												title,content,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$ppr."','".$gallerytype."','".$flag."')"; 
					$result4= $this->query($query4);	
					}
					// exit;
				}
			}
		}

		return $result;

	}
	
	function updateStatusPerencanaan_m($id)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '2' WHERE id = '$id'";
		$res = $this->query($sql);
		
		$gallerytype = "3";	
		$status = '2';
		$thumbnail_upload_doc="Naskah Akademis";
		$thumbnail_peta_pola="Peta Pola Ruang";
		$thumbnail_struktur_ruang="Peta Struktur Ruang";
		$thumbnail_dok_final="Dokumen Final";
					
		$sql_upload_doc = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_upload_doc' AND n_status !=2";
		// pr($sql_upload_doc);
		$res_upload_doc = $this->fetch($sql_upload_doc,1);
		if($res_upload_doc){
			$query_upload_doc = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_upload_doc'";
			$result_upload_doc = $this->query($query_upload_doc);
		}
		
		$sql_peta_pola = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola' AND n_status !=2";
		// pr($sql_peta_pola);
		$res_peta_pola = $this->fetch($sql_peta_pola,1);
		if($res_peta_pola){
			$query_peta_pola = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola'";
	
			$result_peta_pola = $this->query($query_peta_pola);
		}

		$sql_struktur = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_struktur_ruang' AND n_status !=2";
		// pr($sql);
		$res_struktur = $this->fetch($sql_struktur,1);
		if($res_struktur){
			$query_struktur = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_struktur_ruang' ";
			$result_struktur = $this->query($query_struktur);
		}
		
		$sql_dok_final = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_dok_final' AND n_status !=2";
		// pr($sql);
		$res_dok_final = $this->fetch($sql_dok_final,1);
		if($res_dok_final){
			$query_dok_final = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_dok_final' ";
			$result_dok_final = $this->query($query_dok_final);
		}	
		//if ($res) return $res;
		return $id;
	}
	
	public function publish_update_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '1' WHERE id = '$param_1' ";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
  
	public function unpublish_update_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '0' WHERE id = '$param_1' ";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
	
	//NORMA
	function getNorma($request)
	{	
		$sql = "SELECT * FROM ".$request['tabel']." WHERE categoryid = '20'  AND n_status != '2' ORDER BY createdate ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getNormaEdit($id)
	{
		$sql = "SELECT * FROM dtataruang_news_content_norma WHERE id = '".$id."' ";
		$res = $this->fetch($sql,1);
		foreach($res as $ket => $value)
		{
			if ($value['id']){
				$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} ";	
				$res2 = $this->fetch($sql2,1);
				$res[$ket]['file'] = $res2;
			}
		}
			
		if ($res) return $res;
		return false;
	}
	
	function norma_inp($id,$title,$content,
							$tahun,$jml_hal,$lampiran,$categoryid,
							$atricletype,$createdate,$postdate,
							$fromwho,$authorid,$deskripsi,$keyword,$image,$file,$df,$sr,$ppr,$id_repo_0,$id_repo_1,$id_repo_2,$id_repo_3,$OriFilename1,$OriFilename2)
	{                          
		if($id)
		{
			//update
			$query = "UPDATE dtataruang_news_content_norma SET title='".$title."',content='".slash($content)."',
											tahun='".$tahun."',jml_hal='".$jml_hal."',lampiran='".$lampiran."',categoryid='".$categoryid."',
											articletype='".$atricletype."',createdate='".$createdate."',postdate='".$postdate."',
											fromwho='".$fromwho."',authorid='".$authorid."',brief='".$deskripsi."', thumbnailimage='".$keyword."',
											image='".$image."' WHERE id='".$id."' ";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			if($result['data']){
				$sql = "SELECT id FROM dtataruang_news_content_norma ORDER BY id DESC LIMIT 1";
				$res = $this->fetch($sql);
					//1
					$gallerytype = '4';
					if($id_repo_0 != ''){
						$flag = 'Naskah Akademis';
						$query1 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',tags='".$OriFilename1."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$file."' 
									WHERE id='".$id_repo_0."' "; 
						$result1= $this->query($query1);
					}else{
						$flag = 'Naskah Akademis';
						$query1 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename1."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$file."','".$gallerytype."','".$flag."')"; 
						$result1= $this->query($query1);	
					}
					//2
					if($id_repo_1 != ''){
						$flag = 'Dokumen Final';
						$query2 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',tags='".$OriFilename2."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$df."' 
									WHERE id='".$id_repo_1."' "; 
						$result2= $this->query($query2);	
					}else{
						$flag = 'Dokumen Final';
						$query2 = "INSERT INTO dtataruang_news_content_repo (
													title,content,tags,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."','".$OriFilename2."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$df."','".$gallerytype."','".$flag."')"; 
						$result2= $this->query($query2);	
					}
					//3
					if($id_repo_2 != ''){
						$flag = 'Peta Struktur Ruang';
						$query3 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$sr."' 
									WHERE id='".$id_repo_2."' "; 
						$result3= $this->query($query3);	
					}else{
						$flag = 'Peta Struktur Ruang';
						$query3 = "INSERT INTO dtataruang_news_content_repo (
													title,content,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$sr."','".$gallerytype."','".$flag."')"; 
						$result3= $this->query($query3);	
					}
					//4
					if($id_repo_3 != ''){
						$flag = 'Peta Pola Ruang';
						$query4 = "UPDATE dtataruang_news_content_repo SET
													title='".$title."',content='".slash($content)."',createdate='".$createdate."',postdate='".$postdate."',
													fromwho='".$fromwho."',otherid='".$res[id]."',files='".$ppr."' 
									WHERE id='".$id_repo_3."' "; 
						$result4= $this->query($query4);	
					}else{
						$flag = 'Peta Pola Ruang';
						$query4 = "INSERT INTO dtataruang_news_content_repo (
													title,content,createdate,postdate,
													fromwho,otherid,files,gallerytype,thumbnail) 
											VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
													'".$fromwho."','".$res[id]."','".$ppr."','".$gallerytype."','".$flag."')"; 
						$result4= $this->query($query4);	
					}
	
			}
		}else 
		{
			// insert 
			$query = "INSERT INTO dtataruang_news_content_norma (
											title,content,
											tahun,jml_hal,lampiran,categoryid,articletype,createdate,postdate,
											fromwho,authorid,image,brief,thumbnailimage) 
									VALUES ('".$title."','".slash($content)."',
											'".$tahun."','".$jml_hal."','".$lampiran."','".$categoryid."','".$atricletype."','".$createdate."',
											'".$postdate."',
											'".$fromwho."','".$authorid."','".$image."','".$deskripsi."','".$keyword."')"; 
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_norma";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			
			if($result['data']){
				$sql = "SELECT id FROM dtataruang_news_content_norma ORDER BY id DESC LIMIT 1";
				$res = $this->fetch($sql);
				$gallerytype = '4';
				if ($res){
					if($file != ''){
					$flag = 'Naskah Akademis';
					$query1 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename1."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$file."','".$gallerytype."','".$flag."')"; 
					$result1= $this->query($query1);	
					}
					if($df != ''){
					$flag = 'Dokumen Final';
					$query2 = "INSERT INTO dtataruang_news_content_repo (
												title,content,tags,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$OriFilename2."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$df."','".$gallerytype."','".$flag."')"; 
					$result2= $this->query($query2);	
					}
					if($sr != ''){
					$flag = 'Peta Struktur Ruang';
					$query3 = "INSERT INTO dtataruang_news_content_repo (
												title,content,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$sr."','".$gallerytype."','".$flag."')"; 
					$result3= $this->query($query3);	
					}
					if($ppr != ''){
					$flag = 'Peta Pola Ruang';
					$query4 = "INSERT INTO dtataruang_news_content_repo (
												title,content,createdate,postdate,
												fromwho,otherid,files,gallerytype,thumbnail) 
										VALUES ('".$title."','".slash($content)."','".$createdate."','".$postdate."',
												'".$fromwho."','".$res[id]."','".$ppr."','".$gallerytype."','".$flag."')"; 
					$result4= $this->query($query4);	
					}
				}
			}
		}

		return $result;

	}
	
	function updateStatusNorma_m($id)
	{
		$sql = "UPDATE dtataruang_news_content_norma SET n_status = '2' WHERE id = '$id'";
		$res = $this->query($sql);
			
		$gallerytype = "4";	
		$status = '2';
		$thumbnail_upload_doc="Naskah Akademis";
		$thumbnail_peta_pola="Peta Pola Ruang";
		$thumbnail_struktur_ruang="Peta Struktur Ruang";
		$thumbnail_dok_final="Dokumen Final";
					
		$sql_upload_doc = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_upload_doc' AND n_status !=2";
		// pr($sql_upload_doc);
		$res_upload_doc = $this->fetch($sql_upload_doc,1);
		if($res_upload_doc){
			$query_upload_doc = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_upload_doc'";
			$result_upload_doc = $this->query($query_upload_doc);
		}
		
		$sql_peta_pola = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola' AND n_status !=2";
		// pr($sql_peta_pola);
		$res_peta_pola = $this->fetch($sql_peta_pola,1);
		if($res_peta_pola){
			$query_peta_pola = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola'";
	
			$result_peta_pola = $this->query($query_peta_pola);
		}

		$sql_struktur = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_struktur_ruang' AND n_status !=2";
		// pr($sql);
		$res_struktur = $this->fetch($sql_struktur,1);
		if($res_struktur){
			$query_struktur = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_struktur_ruang' ";
			$result_struktur = $this->query($query_struktur);
		}
		
		$sql_dok_final = "SELECT * FROM dtataruang_news_content_repo WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_dok_final' AND n_status !=2";
		// pr($sql);
		$res_dok_final = $this->fetch($sql_dok_final,1);
		if($res_dok_final){
			$query_dok_final = "UPDATE dtataruang_news_content_repo SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_dok_final' ";
			$result_dok_final = $this->query($query_dok_final);
		}	
		//if ($res) return $res;
		return $id;
	}
	
	public function publish_update_norma_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_norma SET n_status = '1' WHERE id = '$param_1' ";
		
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
  
	public function unpublish_update_norma_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_norma SET n_status = '0' WHERE id = '$param_1' ";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
	
	//PROGRAM
	function getProgram($request)
	{	
		$sql = "SELECT * FROM ".$request['tabel']." WHERE categoryid = '11'  AND n_status != '2' ORDER BY createdate ASC";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
		return false;
	}
	
	function getProgramEdit($id)
	{
		$sql = "SELECT * FROM dtataruang_news_content_product WHERE id = '".$id."' ";
		$res = $this->fetch($sql,1);
		foreach($res as $ket => $value)
		{
			if ($value['id']){
				$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} ";	
				$res2 = $this->fetch($sql2,1);
				$res[$ket]['file'] = $res2;
			}
		}
			
		if ($res) return $res;
		return false;
	}
	
	function program_inp($id,$title,$content,
							$tahun,$jml_hal,$lampiran,$categoryid,
							$atricletype,$createdate,$postdate,
							$fromwho,$authorid,$image,$file)
	{                          
		if($id)
		{
			//update
			$query = "UPDATE dtataruang_news_content_product SET title='$title',content='".slash($content)."',											
											tahun='$tahun',jml_hal='$jml_hal',lampiran='$lampiran',
											categoryid='$categoryid',articletype='$atricletype',createdate='$createdate',postdate='$postdate',
											fromwho='$fromwho',authorid='$authorid',image='$image' WHERE id='$id'";
			$result= $this->query($query);
			if($result){
			$sql = "SELECT id FROM dtataruang_news_content_product ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
			if ($res){
			
				$query1 = "UPDATE dtataruang_news_content_repo SET
											title='$title',content='".slash($content)."',createdate='$createdate',postdate='$postdate',
											fromwho='$fromwho',otherid='$res[id]',files='$file' 
							WHERE otherid='$id'"; 
				$result1= $this->query($query1);
				
				}
			}
		}else 
		{
			// insert 
			$query = "INSERT INTO dtataruang_news_content_product (
											title,content,
											tahun,jml_hal,lampiran,categoryid,articletype,createdate,postdate,
											fromwho,authorid,image) 
									VALUES ('$title','".slash($content)."',
											'$tahun','$jml_hal','$lampiran','$categoryid','$atricletype','$createdate',
											'$postdate',
											'$fromwho','$authorid','$image')"; 
			$result= $this->query($query);
			if($result){
			$sql = "SELECT id FROM dtataruang_news_content_product ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
			if ($res){
			
				$query1 = "INSERT INTO dtataruang_news_content_repo (
											title,content,createdate,postdate,
											fromwho,otherid,files) 
									VALUES ('$title','".slash($content)."','$createdate','$postdate',
											'$fromwho','$res[id]','$file')"; 
				$result1= $this->query($query1);
				
				}
			}

		}

		return $result;

	}
	
	function updateStatusProgram_m($id)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '2' WHERE id = '$id'";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
	
	public function publish_update_program_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '1' WHERE id = '$param_1' ";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
  
	public function unpublish_update_program_m($param_1)
	{
		$sql = "UPDATE dtataruang_news_content_product SET n_status = '0' WHERE id = '$param_1' ";
		$res = $this->query($sql);
			
		if ($res) return $res;
		return false;
	}
	
	function viewData_product_cond_id($table_select,$id){

		$sql = "SELECT * FROM ".$table_select." WHERE n_status !='2' AND cp.id = ".$id."";

		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_product_upload_doc($table_select_join,$otherid,$gallerytype,$thumbnail){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_product_peta_pola($table_select_join,$otherid,$gallerytype,$thumbnail){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_product_struktur_ruang($table_select_join,$otherid,$gallerytype,$thumbnail){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_product_dok_final($table_select_join,$otherid,$gallerytype,$thumbnail){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function updateCover($image=null,$id=false)
	{
		
		if ($image==null) return false;
		if (!$id) return false;
		
		$sql = "UPDATE dtataruang_news_content_product SET image = '{$image}' WHERE id = {$id} LIMIT 1";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function insert_news_m($data,$no,$judul,$keterangan)
	{	
		if($data == "insert"){
			$sql = "INSERT INTO tbl_news (id,title,ket) VALUES ('$no','$judul','$keterangan')";
		}else{
			$sql = "UPDATE tbl_news SET title='$judul',ket='$keterangan' WHERE no='$no'";
		}
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return $res;
		return false;
	}
	
	function delete_news_m($data){
	// pr($data);
	// exit;
		try{
		  $query = " DELETE FROM tbl_news WHERE id = '".$data[id]."' ";
		// echo $query;
		// exit;
		  $this->query($query);
		  
		}catch(Exception $e){}   
	} 
	
	function readNews($url=false)
	{
		if(!$url) return false;
		
		$urlArticle = clean($url);
		global $CONFIG;
		
		if ($CONFIG['uri']['short']) $field = " shortUrl ";
		if ($CONFIG['uri']['friendly']) $field = " friendlyUrl ";
		
		
		$sql = "SELECT n.* FROM tbl_news n LEFT JOIN code_url_redirect cr 
				ON n.id = cr.articleId WHERE cr.{$field} = '{$urlArticle}' LIMIT 1";
		// pr($sql);
		$res = $this->fetch($sql);
		if ($res) return $res;
		return false;
		
	}
	// $sql = "SELECT 
					// news_content.id AS id_news,
					// news_content.title AS title_news,
					// news_content.brief AS brief_news,
					// news_content.content AS content_news,
					// news_content.image AS image_news,
					// news_content.thumbnailimage AS thumbnailimage_news,
					// news_content.categoryid AS categoryid_news,
					// news_content.articletype AS articletype_news,
					// news_content.tags AS tags_news,
					// news_content.createdate AS createdate_news,
					// news_content.postdate AS postdate_news,
					// news_content.expiredate AS expireddate_news,
					// news_content.fromwho AS fromwho_news,
					// news_content.authorid AS authorid_news,
					
					// news_repo.title AS title_repo,
					// news_repo.brief AS brief_repo,
					// news_repo.content AS content_repo,
					// news_repo.typealbum AS typealbum_repo,
					// news_repo.gallerytype AS gallerytype_repo,
					// news_repo.files AS files_repo,
					// news_repo.thumbnail AS thumbnail_repo,
					// news_repo.fromwho AS fromwho_repo,
					// news_repo.otherid AS otherid_repo,
					// news_repo.userid AS userid_repo,
					// news_repo.created_date AS createdate_repo
					
				// FROM dtataruang_news_content AS news_content
				// LEFT JOIN dtataruang_news_content_repo AS news_repo
				// ON news_content.id = news_repo.otherid
				// WHERE news_content.id LIKE '%$param%' LIMIT ".$batas.",".$item_per_page."
				// ";
	
}
?>