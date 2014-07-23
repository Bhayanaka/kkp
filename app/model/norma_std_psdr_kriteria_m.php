<?php
class norma_std_psdr_kriteria_m extends Database {
	
	// getdata content berdasarkan limitnya
	function getNews($table,$categoryid,$articletype,$param,$batas,$item_per_page)
	{	
		$sql = "SELECT * FROM ".$table." WHERE categoryid='".$categoryid."' AND articletype='".$articletype."' AND title LIKE '%$param%' limit ".$batas.",".$item_per_page." ";
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
	
	function getRencanaZonasi($table,$catZonePlan)
	{	
		$sql = "SELECT * FROM ".$table." WHERE category='".$catZonePlan."' ";
		$res = $this->fetch($sql,1);
			
		if ($res) return $res;
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