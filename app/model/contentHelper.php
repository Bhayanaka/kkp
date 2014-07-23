<?php
class contentHelper extends Database {
	
	public function getTabel()
     {
		
		
	$query= "SELECT image FROM dtataruang_news_content where categoryid = '20' AND n_status ='1'";
		
		
	$result= $this->fetch($query,1);
		
		
	return $result;
	
     }
	
	public function getRunText()
     {
		
		

	$query= "SELECT * FROM dtataruang_news_content where categoryid = '4' and articletype ='1' and n_status ='1' ORDER BY id DESC LIMIT 1 ";
		
	$result= $this->fetch($query,1);
		
		
	return $result;
	
     }
	
	
	function getNews()
	{
		
		$sql = "SELECT n.title, cr.friendlyUrl FROM tbl_news n LEFT JOIN code_url_redirect cr ON n.id = cr.articleId
				WHERE cr.n_status = 1";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
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
	
	public function getData_news_content($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$gallerytype=0,$search=0,$condition=false){
		if($search==0){
			if($categoryid!=0){
				$query_category = "categoryid=".$categoryid." AND";
			} else { $query_category="";}
			
			if($articletype!=0){
				$query_article = "articletype=".$articletype." AND";
			} else { $query_article="";}
			if($condition!=0){
				$query_extra = $condition." AND";
			} else { $query_extra="";}
			$query= "SELECT * FROM ".$table." Where {$query_category} {$query_article} {$query_extra} n_status='1' ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";
			// pr($query);
		}else{
			$i=0;
			foreach ($search['param_equal'] as $key=>$val){ 
			
				$newArr[] = $val."='".$search['nilai_equal'][$i]."'"; 
				$i++; 
			} 
			
			$j=0;
			foreach ($search['param_like'] as $key_like=>$val_like){ 
			
				$newArr_like[] = $val_like." LIKE '%".$search['nilai_like'][$j]."%'"; 
				// pr($newArr_like);
				$j++; 
			} 
			
			$data_search= implode(' AND ',$newArr);
			$data_search_like= implode(' AND ',$newArr_like);
			$query= "SELECT * FROM ".$table." Where ".$data_search." AND n_status='1' AND (".$data_search_like.") ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";
			// pr($query);
		}
		// pr($query);
		// exit;
		$result= $this->fetch($query,1);
		// pr($result);
		if($result){
			foreach($result as $ket => $value)
			{
				if ($value['id']){
					$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} AND gallerytype = '$gallerytype'";	
					// pr($sql2);
					$res2 = $this->fetch($sql2,1);
					// pr($res2);
					$result[$ket]['file'] = $res2;
					
				}
			}
		}
		// exit;
		return $result;
	}
	
	public function getData_news($table,$categoryid=1,$articletype=1,$id=false){
		
//		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' limit ".$batas.",".$item_per_page."";

		$query= "SELECT * FROM ".$table." Where id='".$id."' AND categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1'";
		//pr($id);

		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery($table,$categoryid,$articletype,$batas=0,$item_per_page=5){
		
		$query= "SELECT DISTINCT (b.id), b.image, b.title FROM dtataruang_news_content AS b, dtataruang_news_content_repo AS a
					WHERE b.id = a.otherid And categoryid=".$categoryid." AND b.n_status='1' AND articletype=".$articletype." limit ".$batas.",".$item_per_page."";
		//pr($query);
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery_detail($id,$table,$categoryid=6,$articletype=2,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM dtataruang_news_content_repo WHERE otherid ='$id' limit ".$batas.",".$item_per_page."";
		$result= $this->fetch($query,1);
		return $result;
	}
	
	public function getData_video($table,$categoryid=7,$articletype=2,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM `dtataruang_news_content_repo`
		WHERE `typealbum` =$articletype AND n_status='1'  limit ".$batas.",".$item_per_page."";
		
		$result= $this->fetch($query,1);
		return $result;
	}
	public function getData_video_detail($id,$table,$categoryid=1,$articletype=1,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM dtataruang_news_content_repo
		WHERE id ='$id' AND n_status='1' limit ".$batas.",".$item_per_page."";
		$result= $this->fetch($query,1);
		
		return $result;
	}

	
	function getDataSIG($all=false, $data=false, $start, $limit=5)
	{
		// pr($all);
		// pr($data);
		// pr();
		
		if (!$data) return false;
		if (!is_array($data)) return false;
		
		$provinsi = $data['provinsi'];
		$kabupaten = $data['kabupaten'];
		$kecamatan = $data['kecamatan'];
		$categoryid = $data['categoryid'];
		$articletype = $data['articletype'];
		
		$filter = "";
		$join = "";
		if ($provinsi) $join = "id_provinsi";
		if ($kabupaten) $join = "id_kabupaten";
		if ($kecamatan) $join = "id_kecamatan";
		
		if ($all){
			// echo "masuk";
			if ($provinsi) $filter .= "AND p.id_provinsi <> 0";
			if ($kabupaten) $filter .= "AND p.id_kabupaten <> 0";
			if ($kecamatan) $filter .= "AND p.id_kecamatan <> 0";
			
		}else{
		
			if ($provinsi) $filter .= "AND p.id_provinsi = {$provinsi}";
			if ($kabupaten) $filter .= "AND p.id_kabupaten = {$kabupaten}";
			if ($kecamatan) $filter .= "AND p.id_kecamatan = {$kecamatan}";
		}
		
		
		$sql = "SELECT p.*, w.* FROM  dtataruang_news_content_product p LEFT JOIN tbl_wilayah w 
				ON p.{$join} = w.kode_wilayah WHERE p.n_status = 1 AND categoryid = '$categoryid' AND articletype = '$articletype' {$filter} ORDER BY p.postdate DESC 
				LIMIT {$start},{$limit}";
		// pr($sql);
		$result= $this->fetch($sql,1);
		if($result){
			foreach($result as $ket => $value)
			{
				if ($value['id']){
					$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} ";	
					$res2 = $this->fetch($sql2,1);
					$result[$ket]['file'] = $res2;
				}
			}
		}
		if ($result){
			return $result;
		}
		return false;
	}
	
	function getWilayah($all=false, $data=array())
	{
	
		$filter = "";
		
		$provinsi = $data['provinsi'];
	
		$kabupaten = $data['kabupaten'];
		
		$kecamatan = $data['kecamatan'];
		// pr($kecamatan);
		if ($all){
			echo "masuk";
			if ($provinsi) $filter .= " WHERE parent = 0";
			if ($kabupaten) $filter .= " WHERE parent <> 0";
			// if ($kecamatan) $filter .= "AND p.id_kecamatan <> 0";
			
		}else{
		
			if ($provinsi) $filter .= " WHERE kode_wilayah = {$provinsi}";
			if ($kabupaten) $filter .= " WHERE kode_wilayah = {$kabupaten}";
			// if ($kecamatan) $filter .= "AND p.id_kecamatan = {$kecamatan}";
		}
		
		
		$data = array();
		
		$sql = "SELECT * FROM tbl_wilayah {$filter}
				ORDER BY nama_wilayah ";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res){
			
			$data['wilayah'] = $res;
			// pr($data['wilayah']);
			if (!$all){
				foreach ($res as $val){
					if ($val['parent']!=0){
						$subsql = "SELECT * FROM tbl_wilayah WHERE kode_wilayah = {$val['parent']}
								ORDER BY nama_wilayah ";
						$subres = $this->fetch($subsql,1);
						$data['subwilayah'] = $subres;
						
						// if ($subres['parent']!=0){
							// $childsql = "SELECT * FROM tbl_wilayah WHERE kode_wilayah = {$subres['parent']}
									// ORDER BY nama_wilayah ";
							// $children = $this->fetch($childsql,1);
							// $data['childrenwilayah'] = $children;
							
						// }
					}
				}
				
			}
			
		}
		if ($data)return $data;
		return false;
	}
	

	
	public function getDataLokasi(){
		$query = "SELECT kode_wilayah,nama_wilayah FROM tbl_wilayah WHERE parent=0";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}

	
	public function getDataKabupaten(){
		$query = "SELECT kode_wilayah,nama_wilayah FROM tbl_wilayah WHERE parent <> 0";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}

	
	function insertSaran($data=array())
	{
		if (empty($data)) return false;
		
		$field = array('title','content','categoryid','n_status');
		
		foreach ($data as $key =>$val){
			
			if (in_array($key, $field)){
				$fieldsTmp[] = $key;
				$dataInsTmp[] = addslashes($val); 
			}
			
		}
		
		if (empty($fieldsTmp)) return false;
		
		$fieldsTmp[] = 'categoryid';
		$dataInsTmp[] = 20; // set kategori id terserah
		
		$fields = implode(',',$fieldsTmp);
		$dataIns = implode(',',$dataInsTmp);
		
		$query = "INSERT INTO dtataruang_news_content ({$fields}) VALUES ({$dataIns})";
		$result = $this->query($query);
		if ($result) return true;
		return false;
	}
	
	function addData($x){
		// pr($x);
		// exit;
		$query = "INSERT INTO dtataruang_news_content (title,brief,content,categoryid,createdate,n_status) 
				VALUES ('".addslashes(html_entity_decode($x['nama']))."','".addslashes(html_entity_decode($x['email']))."','".addslashes(html_entity_decode($x['pesan']))."','".$x['categoryid']."','".$x['createdate']."','".$x['n_status']."')";
		// pr($query);
		// exit;
		$result = $this->query($query);
		return $result; 
	
	}


}
?>