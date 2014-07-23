<?php
class m_sig extends Database {
	
	/**************************************************Begin Peta Pola Ruang**************************************************/
	function viewDataUser($table_user){
		$sql = "SELECT * FROM ".$table_user." WHERE n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	//status published or unpublished SIG Peta Pola Ruang - Nasional
	function update_status($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		$result = $this->query($query);
		return $result;
	}
	
	//view dropdown type SIG Peta Pola Ruang - Nasional
	function viewData_type_peta($table){
		$sql = "SELECT * FROM ".$table." WHERE n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view SIG Peta Pola Ruang - Nasional all
	function viewData_ppr_nasional_all($table_select,$categoryid,$table_select_join,$table_wilayah){
		$thumbnail_sig_pola="sig_pola";
		$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,cp.kecamatan,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files AS file1,
					   pr.kode_wilayah,pr.nama_wilayah as prov, pro.kode_wilayah,pro.nama_wilayah as kab  
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cr.gallerytype = '6' AND cr.thumbnail = '$thumbnail_sig_pola'
				INNER JOIN ".$table_wilayah." AS pr ON cp.id_provinsi = pr.kode_wilayah AND cp.categoryid = ".$categoryid." AND cp.n_status !='2' 
				INNER JOIN ".$table_wilayah." AS pro ON cp.id_kabupaten = pro.kode_wilayah";  
				// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view SIG Peta Pola Ruang - Nasional kondisional id
	function viewData_ppr_nasional_cond_id($table_select,$categoryid,$table_select_join,$id,$table_wilayah){
		$thumbnail_sig_pola="sig_pola";
		/*$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,cp.kecamatan,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files,cr.gallerytype,
					   pr.kode_wilayah,pr.nama_wilayah as prov, pro.kode_wilayah,pro.nama_wilayah as kab  
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cp.categoryid = ".$categoryid." AND cp.n_status !='2' AND cr.gallerytype = '6' AND cr.thumbnail = '$thumbnail_sig_pola'
				INNER JOIN ".$table_wilayah." AS pr ON cp.id_provinsi = pr.kode_wilayah
				INNER JOIN ".$table_wilayah." AS pro ON cp.id_kabupaten = pro.kode_wilayah WHERE cp.id = ".$id.""; */ 
		
		$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,cp.kecamatan,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files,cr.gallerytype
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cp.categoryid = ".$categoryid." 
						AND cr.gallerytype = '6' AND cr.thumbnail = '$thumbnail_sig_pola' WHERE cp.id = ".$id."";
		
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}

	
	//insert or update SIG Peta Pola Ruang - Nasional
	function inputData_Pola_Ruang($id,$title,$content,$id_provinsi,$id_kabupaten,$kecamatan,$image_cover,$image_dok,$categoryid,$type_peta,$tahun,$createdate,$postdate,$fromwho,$authorid,$n_status,$otherid)
	{
		if($id){
			$query = "UPDATE  	dtataruang_news_content_sig SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',id_provinsi='".$id_provinsi."',id_kabupaten='".$id_kabupaten."',
					kecamatan='".$kecamatan."',image='".$image_cover."',categoryid='".$categoryid."',articletype='".$type_peta."',tahun='".$tahun."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."' WHERE id='".$id."'";
			// pr($query);
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			$typealbum = '1';
			$gallerytype = "6";
			$thumbnail_sig_pola="sig_pola";
			
			if($otherid != ''){
				$query_repo = "UPDATE dtataruang_news_content_repo SET 
							title='".$title."',content='".addslashes(html_entity_decode($content))."',files='".$image_dok."',
							createdate='".$createdate."',postdate='".$postdate."' WHERE otherid='".$id."' AND thumbnail= '$thumbnail_sig_pola'";
				// pr($query_repo);
				$result_repo = $this->query($query_repo);
				
			}else{
				if($image_dok){
											
				$query_repo ="INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
									VALUES ('".$title."',
											'".addslashes(html_entity_decode($content))."',
											'".$typealbum."',
											'".$gallerytype."',
											'".$image_dok."',
											'".$thumbnail_sig_pola."',
											'".$id."',
											'".$createdate."',
											'".$postdate."')"; 
				$result_repo = $this->query($query_repo);
				}
				//else{
					// no action
				// }
			}
			
			
		}else{
		
			$query = "INSERT INTO dtataruang_news_content_sig (title,content,id_provinsi,id_kabupaten,kecamatan,image,categoryid,articletype,tahun,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$id_provinsi."','".$id_kabupaten."','".$kecamatan."','".$image_cover."',
							'".$categoryid."','".$type_peta."','".$tahun."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_sig";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			
				
			$table_select="dtataruang_news_content_sig";
			//SIG Peta Pola Ruang = 12
			$categoryid = "33";
			// $articletype = "1";
			$sql = "SELECT * FROM ".$table_select." WHERE categoryid=".$categoryid." ORDER BY id DESC";
			$res = $this->fetch($sql,1);
			// pr($res);
			if($res){
				//typealbum 1: image, 2 : video
				$typealbum = '1';
				$gallerytype = "6";
				$thumbnail_sig_pola="sig_pola";
				
				if($res){
					if($image_dok){
					$query_repo = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							VALUES ('".$res[0]['title']."','".addslashes(html_entity_decode($res[0]['content']))."','".$typealbum."','$gallerytype','".$image_dok."','$thumbnail_sig_pola','".$res[0]['id']."','".$createdate."','".$postdate."')";
					// pr($query_repo);
					$result_repo = $this->query($query_repo);
					}
				}
					// exit;
			}
		}
		return $result;
	}
	
	//delete SIG Peta Pola Ruang 
	function delData_Pola_Ruang($table_select,$id,$status){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		
		$table_select_repo ="dtataruang_news_content_repo";
		$gallerytype = "6";
		$thumbnail_sig_pola="sig_pola";
		$sql_repo = "SELECT * FROM ".$table_select_repo." WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_sig_pola' AND n_status !=2";
		// pr($sql_repo);
		$res_repo = $this->fetch($sql_repo,1);
		if($res_repo){
			$query_repo = "UPDATE ".$table_select_repo." SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_sig_pola'";
			$result_repo = $this->query($query_repo);
		}
		return $id;
	}
	
	/**************************************************End Peta Pola Ruang**************************************************/
	
	/**************************************************Begin Peta Struktur Ruang**************************************************/
	//status published or unpublished SIG Peta Pola Ruang - Nasional
	function update_status_struktur($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		// exit;
		$result = $this->query($query);
		return $result;
	}
	
	//view SIG Peta Pola Ruang - Nasional all
	function viewData_ppr_nasional_struktur($table_select,$categoryid,$table_select_join,$table_wilayah){
		$gallerytype = "7";
		$thumbnail_sig_struktur="sig_struktur";
		$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files,
					   pr.kode_wilayah,pr.nama_wilayah as prov, pro.kode_wilayah,pro.nama_wilayah as kab  
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cr.gallerytype = '$gallerytype' AND cr.thumbnail = '$thumbnail_sig_struktur'
				INNER JOIN ".$table_wilayah." AS pr ON cp.id_provinsi = pr.kode_wilayah AND cp.categoryid = ".$categoryid." AND cp.n_status !='2'
				INNER JOIN ".$table_wilayah." AS pro ON cp.id_kabupaten = pro.kode_wilayah";  
	
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view SIG Peta Pola Ruang - Nasional kondisional id
	function viewData_ppr_nasional_struktur_id($table_select,$categoryid,$table_select_join,$id,$table_wilayah){
		$gallerytype = "7";
		$thumbnail_sig_struktur="sig_struktur";
		
		/*$sql="SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,cp.kecamatan,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files,
					   pr.kode_wilayah,pr.nama_wilayah as prov, pro.kode_wilayah,pro.nama_wilayah as kab  
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cr.gallerytype = '$gallerytype' AND cr.thumbnail = '$thumbnail_sig_struktur'
				INNER JOIN ".$table_wilayah." AS pr ON cp.id_provinsi = pr.kode_wilayah AND cp.categoryid = ".$categoryid." AND cp.n_status !='2' 
				INNER JOIN ".$table_wilayah." AS pro ON cp.id_kabupaten = pro.kode_wilayah WHERE cp.id = ".$id."";*/		
				
		$sql="SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.id_provinsi,cp.id_kabupaten,cp.kecamatan,
					   cp.n_status,cp.articletype,cp.fromwho,cp.authorid,cr.otherid,cr.files
					  
				FROM ".$table_select." AS cp 
				LEFT JOIN ".$table_select_join." AS cr ON cp.id = cr.otherid AND cr.gallerytype = '$gallerytype' AND cr.thumbnail = '$thumbnail_sig_struktur'
				AND cp.categoryid = ".$categoryid." WHERE cp.id = ".$id."";			
		// pr($sql);
		// exit;
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//insert or update SIG Peta Pola Ruang - Nasional
	function inputData_Pola_Ruang_struktur($id,$title,$content,$id_provinsi,$id_kabupaten,$kecamatan,$image_cover,$image_dok,$categoryid,$type_peta,$tahun,$createdate,$postdate,$fromwho,$authorid,$n_status,$otherid)
	{
		if($id){
			$query = "UPDATE dtataruang_news_content_sig SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',id_provinsi='".$id_provinsi."',id_kabupaten='".$id_kabupaten."',kecamatan = '".$kecamatan."',
					image='".$image_cover."',categoryid='".$categoryid."',articletype='".$type_peta."',tahun='".$tahun."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."' WHERE id='".$id."'";
			
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			$gallerytype = "7";
			$thumbnail_sig_struktur="sig_struktur";
			
			if($otherid != ''){
				$query_repo = "UPDATE dtataruang_news_content_repo SET 
						title='".$title."',content='".addslashes(html_entity_decode($content))."',files='".$image_dok."',
						createdate='".$createdate."',postdate='".$postdate."' WHERE otherid='".$id."' AND thumbnail= '$thumbnail_sig_struktur'";
				// pr($query_repo);
				$result_repo = $this->query($query_repo);
			}else{
				if($image_dok){
				$query_repo = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
									VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$typealbum."','$gallerytype','".$image_dok."','$thumbnail_sig_struktur','".$id."','".$createdate."','".$postdate."')";
							// pr($query_repo);
				$result_repo = $this->query($query_repo);
				}
			}
			
		}else{
		
			$query = "INSERT INTO dtataruang_news_content_sig (title,content,id_provinsi,id_kabupaten,kecamatan,image,categoryid,articletype,tahun,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$id_provinsi."','".$id_kabupaten."','".$kecamatan."','".$image_cover."',
							'".$categoryid."','".$type_peta."','".$tahun."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			// pr($query);
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_sig";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			
				if($result['data']){
					$table_select="dtataruang_news_content_sig";
					//SIG Peta Pola Ruang = 12
					$categoryid = "34";
					// $articletype = "1";
					$sql = "SELECT * FROM ".$table_select." WHERE categoryid=".$categoryid." ORDER BY id DESC";
					// pr($sql);
					$res = $this->fetch($sql,1);
					// pr($res);
					//typealbum 1: image, 2 : video
					$typealbum = '1';
					$gallerytype = "7";
					$thumbnail_sig_struktur="sig_struktur";
					
					if($res){
						if($image_dok){
							$query_repo = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
									VALUES ('".$res[0]['title']."','".addslashes(html_entity_decode($res[0]['content']))."','".$typealbum."','$gallerytype','".$image_dok."','$thumbnail_sig_struktur','".$res[0]['id']."','".$createdate."','".$postdate."')";
							// pr($query_repo);
							$result_repo = $this->query($query_repo);
						}
					}
				}
		}
		return $result;
	}	
	
	//delete SIG Peta Pola Ruang 
	function delData_Pola_struktur($table_select,$id,$status){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		$table_select_repo ="dtataruang_news_content_repo";
		$gallerytype = "7";
		$thumbnail_sig_struktur="sig_struktur";
		$sql_repo = "SELECT * FROM ".$table_select_repo." WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_sig_struktur' AND n_status !=2";
		// pr($sql_repo);
		$res_repo = $this->fetch($sql_repo,1);
		if($res_repo){
			$query_repo = "UPDATE ".$table_select_repo." SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_sig_struktur'";
			$result_repo = $this->query($query_repo);
		}
		return $id;
	}
	
	
	/**************************************************End Peta Struktur Ruang**************************************************/
	
}
?>