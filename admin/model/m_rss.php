<?php
class m_rss extends Database {
	
	function update_status($table_select,$id,$st){
		$query = "UPDATE ".$table_select." SET n_status=".$st." WHERE id =".$id."";
		// pr($query);
		$result = $this->query($query);
		return $result;
	}
	
	//view sejarah
	function viewData($table_select,$categoryid){
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' AND n_status !=2 ";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	
	function viewData_cond_id($table_select,$categoryid,$id){
		
		// exit;
		$sql = "SELECT * FROM ".$table_select." WHERE categoryid='".$categoryid."' AND id='".$id."'";
		// pr($sql);
		$result = $this->fetch($sql,1);
		if ($result) return $result;
		return false;
	}
	//insert or update sejarah
	function inputDataFile($id,$title,$link,$image,$categoryid,$createdate,$postdate,$fromwho,$authorid,$n_status)
	{
		
		if($id){
			$query = "UPDATE dtataruang_news_content SET 
					title='".$title."',brief='".$link."',image='".$image."',categoryid='".$categoryid."',
					createdate='".$createdate."',postdate='".$postdate."',fromwho='".$fromwho."',authorid='".$authorid."',n_status='".$n_status."' WHERE id='".$id."'";
			// $parameter ="Update Slide Show";
			$result['data'] = $this->query($query);
			$result['param'] = 'U';
			$result['id'] = $id;
		}else{
		
			$query = "INSERT INTO dtataruang_news_content (title,brief,image,categoryid,createdate,postdate,fromwho,authorid,n_status) 
					VALUES ('".$title."','".$link."','".$image."','".$categoryid."','".$createdate."','".$postdate."','".$fromwho."','".$authorid."','".$n_status."')";
			$result['data'] = $this->query($query);
			$result['param'] = 'I';
			$query_sel ="SELECT max(id) FROM dtataruang_news_content";
			$hasil = $this->fetch($query_sel,1);
			$result['id'] = $hasil[0]['max(id)'];
		}
		return $result;
	}
	
	function delData($table_select,$id,$status){
		$query = "UPDATE ".$table_select." SET n_status=".$status." WHERE id =".$id."";
		$result = $this->query($query);
		return $id;
	}
	
}
?>