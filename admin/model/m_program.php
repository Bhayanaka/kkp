<?php
class m_program extends Database {
	
	/**************************************************Begin Program**************************************************/
	//start update//
	function viewData_program($table_select,$type){

		$sql = "SELECT * FROM ".$table_select." WHERE n_status !='2' AND articletype = ".$type." ORDER BY id DESC";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function changeData_onemap($id,$title,$content,$image,$articel_type,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		
		if($id){
			$query= "UPDATE dtataruang_news_content_program SET content='".slash($content)."',files = '".$image."',createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."' WHERE id='".$id."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			$result['articel_type'] = $articel_type;
		}else{
			$query= "INSERT INTO  dtataruang_news_content_program (title,content,files,articletype,createdate,postdate,fromwho,authorid,n_status) VALUES ('".$title."','".slash($content)."','".$image."','".$articel_type."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_program";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			$result['articel_type'] = $articel_type;
		}
		// pr($query);
		// exit;
		
		
		// if ($result){
			
			// $sql = "SELECT id FROM dtataruang_news_content WHERE categoryid='".$categoryid."' AND articletype='4' AND n_status='1' ORDER by id DESC LIMIT 1";
			// $result = $this->fetch($sql);
			// if ($result['id']) return $result['id'];
		// }
		return $result;
	}
	
	
	
	//end update//
	//status published or unpublished program
	function update_status($table_select,$st,$id){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		// exit;
		$result = $this->query($query);
		return $result;
	}
	
	//view dropdown program
	function viewData_type_program($table){
		$sql = "SELECT * FROM ".$table." WHERE n_status='1' ";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view dropdown program
	function viewData_category_program($table_category){
		$sql = "SELECT * FROM ".$table_category." WHERE n_status='1' ";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_user($tableusers){
		$sql = "SELECT * FROM ".$tableusers." WHERE n_status='1' ";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view program all
	function viewData_program_all($table_select,$table_select_join){

		$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.lampiran,cp.jml_hal,cp.n_status,cp.articletype,cp.fromwho,cp.authorid
				FROM ".$table_select." AS cp WHERE cp.n_status !='2' ORDER BY cp.id DESC";
		
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_program_repo_naskah($table_select_join,$otherid,$gallerytype,$thumbnail_repo_naskah){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_repo_naskah' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_program_repo_pola($table_select_join,$otherid,$gallerytype,$thumbnail_peta_pola){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_program_repo_struktur($table_select_join,$otherid,$gallerytype,$thumbnail_peta_struktur){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_struktur' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	function viewData_program_repo_final($table_select_join,$otherid,$gallerytype,$thumbnail_dok_final){
		$sql = "SELECT * FROM ".$table_select_join." WHERE otherid=".$otherid." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_dok_final' AND n_status !=2";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	//view program kondisional id
	function viewData_program_cond_id($table_select,$id){

		$sql = "SELECT cp.id,cp.content,cp.tahun,cp.image,cp.postdate,cp.title,cp.lampiran,cp.jml_hal,cp.n_status,cp.articletype,cp.categoryid,cp.authorid,cp.id_provinsi,
				cp.id_kabupaten,cp.kecamatan FROM ".$table_select." AS cp WHERE cp.n_status !='2' AND cp.id = ".$id."";
		
		
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}

	
	//insert or update Program
	function inputData_program($id,$title,$content,$lampiran,$jml_hal,$image_cover,$image_naskah,$image_peta_pola,$image_peta_struktur,$image_final,$category,$type_program,$tahun,$createdate,$postdate,$fromwho,$authorid,$n_status,
								$id_repo_0,$id_repo_1,$id_repo_2,$id_repo_3,$id_provinsi,$id_kabupaten,$kecamatan,$OriFilename1,$OriFilename2)
	{
		if($id){
			$query = "UPDATE dtataruang_news_content_program SET 
					title='".$title."',content='".addslashes(html_entity_decode($content))."',lampiran='".$lampiran."',jml_hal='".$jml_hal."',
					image='".$image_cover."',categoryid='".$category."',articletype='".$type_program."',tahun='".$tahun."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',id_provinsi='".$id_provinsi."' ,
					id_kabupaten='".$id_kabupaten."' , kecamatan='".$kecamatan."' WHERE id='".$id."'";
			
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			
			$typealbum = '1';
			$gallerytype = "5";
			$thumbnail_repo_naskah="Naskah Akademis";
			$thumbnail_peta_pola="Peta Pola Ruang";
			$thumbnail_peta_struktur="Peta Struktur Ruang";
			$thumbnail_dok_final="Dokumen Final";
			
			if($id_repo_0 != ''){
				$query_repo_naskah = "UPDATE dtataruang_news_content_repo SET 
										title='".$title."',content='".addslashes(html_entity_decode($content))."',tags='".$OriFilename1."',files='".$image_naskah."',
										createdate='".$createdate."',postdate='".$postdate."' WHERE id='".$id_repo_0."' AND thumbnail= '$thumbnail_repo_naskah'";
				$result_repo_naskah = $this->query($query_repo_naskah);
			}else {
				if($image_naskah){
				$query_repo_naskah = "INSERT INTO dtataruang_news_content_repo (title,content,tags,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							              VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$OriFilename1."','".$typealbum."','".$gallerytype."','".$image_naskah."','$thumbnail_repo_naskah','".$id."','".$createdate."','".$postdate."')";		
				$result_repo_naskah = $this->query($query_repo_naskah);
				}else{
					//no action
				}
			}
			
			if($id_repo_1 != ''){
				$query_repo_peta_pola = "UPDATE dtataruang_news_content_repo SET 
										title='".$title."',content='".addslashes(html_entity_decode($content))."',files='".$image_peta_pola."',
										createdate='".$createdate."',postdate='".$postdate."' WHERE id='".$id_repo_1."' AND thumbnail= '$thumbnail_peta_pola'";
				$result_repo_peta_pola = $this->query($query_repo_peta_pola);
			}else{
				if($image_peta_pola){
				$query_repo_peta_pola = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							              VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$typealbum."','".$gallerytype."','".$image_peta_pola."','$thumbnail_peta_pola','".$id."','".$createdate."','".$postdate."')";
				$result_repo_peta_pola = $this->query($query_repo_peta_pola);
				}else{
					//no action
				}
			}
			if($id_repo_2 != ''){
				$query_repo_peta_struktur = "UPDATE dtataruang_news_content_repo SET 
											title='".$title."',content='".addslashes(html_entity_decode($content))."',files='".$image_peta_struktur."',
											createdate='".$createdate."',postdate='".$postdate."' WHERE id='".$id_repo_2."'  AND thumbnail= '$thumbnail_peta_struktur'";
				$result_repo_peta_struktur = $this->query($query_repo_peta_struktur);
			}else{
				if($image_peta_struktur){
				$query_repo_peta_struktur = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							              VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$typealbum."','".$gallerytype."','".$image_peta_struktur."','$thumbnail_peta_struktur','".$id."','".$createdate."','".$postdate."')";
				$result_repo_peta_struktur = $this->query($query_repo_peta_struktur);
				}else{
					//no action
				}
			}
			
			if($id_repo_3 != ''){
				$query_repo_dok_final = "UPDATE dtataruang_news_content_repo SET 
											title='".$title."',content='".addslashes(html_entity_decode($content))."',tags='".$OriFilename2."',files='".$image_final."',
											createdate='".$createdate."',postdate='".$postdate."' WHERE id='".$id_repo_3."'  AND thumbnail= '$thumbnail_dok_final'";
				$result_repo_dok_final = $this->query($query_repo_dok_final);
			}else{
				if($image_final){
				$query_repo_dok_final = "INSERT INTO dtataruang_news_content_repo (title,content,tags,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							              VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$OriFilename2."','".$typealbum."','".$gallerytype."','".$image_final."','$thumbnail_dok_final','".$id."','".$createdate."','".$postdate."')";
				$result_repo_dok_final = $this->query($query_repo_dok_final);
				}else{
					//no action
				}
			}
		}else{
		
			$query = "INSERT INTO dtataruang_news_content_program (title,content,lampiran,jml_hal,image,categoryid,articletype,tahun,createdate,postdate,fromwho,authorid,n_status,id_provinsi,id_kabupaten,kecamatan) 
					VALUES ('".$title."','".addslashes(html_entity_decode($content))."','".$lampiran."','".$jml_hal."','".$image_cover."',
							'".$category."','".$type_program."','".$tahun."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."',
							'".$id_provinsi."','".$id_kabupaten."','".$kecamatan."')";
			
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content_program";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			
				if($result['data']){
					$table_select="dtataruang_news_content_program";
					$sql = "SELECT * FROM ".$table_select." ORDER BY id DESC";
					$res = $this->fetch($sql,1);
					//typealbum 1: image, 2 : video
					$typealbum = '1';
					$gallerytype = "5";
					$thumbnail_repo_naskah="Naskah Akademis";
					$thumbnail_peta_pola="Peta Pola Ruang";
					$thumbnail_peta_struktur="Peta Struktur Ruang";
					$thumbnail_dok_final="Dokumen Final";
					
					if($image_naskah){
						$query_repo_naskah = "INSERT INTO dtataruang_news_content_repo (title,content,tags,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							              VALUES ('".$res[0]['title']."','".addslashes(html_entity_decode($res[0]['content']))."','$OriFilename1','$typealbum','$gallerytype','$image_naskah','$thumbnail_repo_naskah','".$res[0]['id']."','".$createdate."','".$postdate."')";
						$result_repo_naskah = $this->query($query_repo_naskah);
					}
					if($image_peta_pola){
						$query_repo_peta_pola = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							                VALUES ('".$res[0]['title']."','".addslashes(html_entity_decode($res[0]['content']))."','$typealbum','$gallerytype','$image_peta_pola','$thumbnail_peta_pola','".$res[0]['id']."','".$createdate."','".$postdate."')";
						$result_repo_peta_pola = $this->query($query_repo_peta_pola);
					}
					if($image_peta_struktur){
						$query_repo_peta_struktur = "INSERT INTO dtataruang_news_content_repo (title,content,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
							                      VALUES ('".$res[0]['title']."','".addslashes(html_entity_decode($res[0]['content']))."','$typealbum','$gallerytype','$image_peta_struktur','$thumbnail_peta_struktur','".$res[0]['id']."','".$createdate."','".$postdate."')";
						$result_repo_peta_struktur = $this->query($query_repo_peta_struktur);
					}
					if($image_final){
						$query_repo_dok_final = "INSERT INTO dtataruang_news_content_repo (title,content,tags,typealbum,gallerytype,files,thumbnail,otherid,createdate,postdate) 
												  VALUES ('".$title."','".addslashes(html_entity_decode($content))."','$OriFilename2','".$typealbum."','".$gallerytype."','".$image_final."','$thumbnail_dok_final','".$res[0]['id']."','".$createdate."','".$postdate."')";
						$result_repo_dok_final = $this->query($query_repo_dok_final);
					}
				}
			}
			return $result;
		}
	
	//delete program
	function delData_Program($table_select,$id,$status,$table_select_repo,$gallerytype){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		$thumbnail_repo_naskah="repo_naskah";
		$thumbnail_peta_pola="peta_pola";
		$thumbnail_peta_struktur="peta_struktur";
					
		$sql_repo = "SELECT * FROM ".$table_select_repo." WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_repo_naskah' AND n_status !=2";
		// pr($sql_repo);
		$res_repo = $this->fetch($sql_repo,1);
		if($res_repo){
			$query_repo = "UPDATE ".$table_select_repo." SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_repo_naskah'";
			$result_repo = $this->query($query_repo);
		}
		//peta pola
		$sql_pola = "SELECT * FROM ".$table_select_repo." WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola' AND n_status !=2";
		// pr($sql_pola);
		$res_pola = $this->fetch($sql_pola,1);
		if($res_pola){
			$query_pola = "UPDATE ".$table_select_repo." SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_pola'";
	
			$result_pola = $this->query($query_pola);
		}
		//peta struktur
		$sql_struktur = "SELECT * FROM ".$table_select_repo." WHERE otherid=".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_struktur' AND n_status !=2";
		// pr($sql);
		$res_struktur = $this->fetch($sql_struktur,1);
		if($res_struktur){
			$query_struktur = "UPDATE ".$table_select_repo." SET n_status=".$status." WHERE otherid =".$id." AND gallerytype='$gallerytype' AND thumbnail ='$thumbnail_peta_struktur' ";
			$result_struktur = $this->query($query_struktur);
		}
	return $id;
	}
	
	/**************************************************End Program**************************************************/
	
	
}
?>