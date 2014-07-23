<?php
class m_gallery extends Database {
	
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
	
	public function getData_news_content($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0,$condition=false){
	
		
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
		
		}else{
			$i=0;
			foreach ($search['param_equal'] as $key=>$val){ 
			
				$newArr[] = $val."='".$search['nilai_equal'][$i]."'"; 
				$i++; 
			} 
			
			$j=0;
			foreach ($search['param_like'] as $key_like=>$val_like){ 
			
				$newArr_like[] = $val_like." LIKE '%".$search['nilai_like'][$j]."%'"; 
				$j++; 
			} 
			
			$data_search= implode(' AND ',$newArr);
			$data_search_like= implode(' AND ',$newArr_like);
			
			$query= "SELECT * FROM ".$table." Where ".$data_search." AND n_status='1' AND ".$data_search_like." ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";
			
		}
		// pr($query);
		// exit;
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	public function getData_news($table,$categoryid=1,$articletype=1,$id=false){
		
		$query= "SELECT * FROM ".$table." Where id='".$id."' AND categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1'";
		//pr($id);
		//exit;
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery($table,$categoryid,$articletype,$batas=0,$item_per_page=5){
		
		$query= "SELECT DISTINCT (b.id), b.image, b.title, b.postdate FROM dtataruang_news_content AS b, dtataruang_news_content_repo AS a
					WHERE b.id = a.otherid And categoryid=".$categoryid." AND b.n_status='1' AND articletype=".$articletype." limit ".$batas.",".$item_per_page."";
		// pr($query);
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery_detail($id,$table,$categoryid=1,$articletype=2,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM dtataruang_news_content_repo WHERE otherid ='$id' AND n_status='1' AND gallerytype='1' AND typealbum='1' limit ".$batas.",".$item_per_page."";
		// pr($query);
		$result= $this->fetch($query,1);
		return $result;
	}
	
	public function getData_video($table,$categoryid=7,$articletype=2,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM $table
		WHERE categoryid=$categoryid AND articletype =$articletype AND n_status='1'  limit ".$batas.",".$item_per_page."";
		// pr($query);
		// exit;
		$result= $this->fetch($query,1);
		return $result;
	}
	public function getData_video_detail($id,$table,$categoryid=1,$articletype=1,$batas=0,$item_per_page=5){
		
		$query= "SELECT * FROM dtataruang_news_content
		where n_status='1' limit ".$batas.",".$item_per_page."";
		pr($query);
		$result= $this->fetch($query,1);
		pr($result);
		exit;
		return $result;
	}
}
?>