<?php
class m_onemap extends Database {
	//indeks peta tematik
	function inputDataFile($id,$title,$image,$categoryid,$articletype,$brief,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		
		if($id){
			$query = "UPDATE dtataruang_news_content SET 
					title='".$title."',image='".$image."',articletype='".$articletype."',categoryid='".$categoryid."',brief='".addslashes(html_entity_decode($brief))."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
			// $parameter ="Update Slide Show";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			
		}else{
		
			$query = "INSERT INTO dtataruang_news_content (title,image,categoryid,articletype,brief,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".$image."','".$categoryid."','".$articletype."','".addslashes(html_entity_decode($brief))."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			// $parameter ="Insert Slide Show";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	function viewData($table_select,$categoryid){
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' AND n_status !=2 ";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	function viewData_cond_id($table_select,$categoryid,$id){
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' and id='".$id."'";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	function viewData_user($table_user){
		$sql = "SELECT * FROM ".$table_user." WHERE n_status='1'";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	
	function update_status($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		$result = $this->query($query);
		return $result;
	}
	
	function delData($table_select,$id,$status){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		return $id;
	}
	
	
	//database spasial
	function inputDataFiledb($id,$title,$image,$categoryid,$articletype,$brief,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		// exit;
		if($id){
			$query = "UPDATE dtataruang_news_content SET 
					title='".$title."',image='".$image."',categoryid='".$categoryid."',articletype='".$articletype."',brief='".addslashes(html_entity_decode($brief))."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;	
		}else{
		
			$query = "INSERT INTO dtataruang_news_content (title,image,categoryid,articletype,brief,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".$image."','".$categoryid."','".$articletype."','".addslashes(html_entity_decode($brief))."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		// pr($query);
		// exit;	
		return $result;
	}
	
	function viewDatadb($table_select,$categoryid){
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' AND n_status !=2 ";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	function viewData_cond_db_id($table_select,$categoryid,$id){
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' and id='".$id."'";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	function update_status_db($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		// exit;
		$result = $this->query($query);
		return $result;
	}
	
	function deldbspasial($table_select,$id,$status){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		return $id;
	}
	
	
	
	
	public function getData_news_content_cat_onemap(){
		
		$query= "SELECT * FROM dtataruang_news_content_category WHERE category='4' ";
		
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	public function getData_onemap($id)
	{
		$sql = "SELECT * FROM dtataruang_news_content WHERE categoryid='".$id."' AND articletype='4'";
		// pr($sql);
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function getData_image($otherid)
	{
		$sql = "SELECT * FROM dtataruang_news_content_repo WHERE otherid='".$otherid."'";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	
	public function changeData_onemap($id,$title,$content,$image,$categoryid,$articel_type,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		
		if($id){
			$query= "UPDATE dtataruang_news_content SET content='".slash($content)."',image = '".$image."',createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."' WHERE id='".$id."'";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
			$result['category'] = $categoryid;
		}else{
			$query= "INSERT INTO dtataruang_news_content (title,content,image,categoryid,articletype,createdate,postdate,fromwho,authorid,n_status) VALUES ('".$title."','".slash($content)."','$image','".$categoryid."',$articel_type,'".$createdate."','".$postdate."','".$fromwho."','".$authorid."',$n_status)";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
			$result['category'] = $categoryid;
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
	
	function updateUserImage($image=null,$id=false)
	{
		
		if ($image==null) return false;
		if (!$id) return false;
		
		$sql = "UPDATE dtataruang_news_content SET image = '{$image}' WHERE id = {$id} LIMIT 1";
		// pr($sql);
		$res = $this->query($sql);
		if ($res) return true;
		return false;
	}
	
	
}
?>