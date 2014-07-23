<?php
class contentHelper extends Database {
	
	function getData()
	
	{
		$sql = "SELECT * FROM tbl_news";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function getData_news($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";

		$result= $this->fetch($query,1);
		return $result;
	}
	
	public function getData_gallery($table,$categoryid,$articletype,$batas=0,$item_per_page=15){
		
		//pr($batas);
		$query= "SELECT DISTINCT (b.id), b.image, b.title, b.createdate, b.n_status FROM ".$table." AS b, dtataruang_news_content_repo AS a
					WHERE b.id = a.otherid AND b.n_status!='2' AND b.categoryid=".$categoryid." AND b.articletype=".$articletype." limit ".$batas.",".$item_per_page."";
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery_edit($id,$table,$categoryid,$articletype,$batas=0,$item_per_page=15){

		$query= "SELECT title,files,postdate, thumbnail,id FROM dtataruang_news_content_repo Where otherid='".$id."' AND n_status='1' limit ".$batas.",".$item_per_page."";
		
		$result= $this->fetch($query,1);
		
		
		
		return $result;
	}
	
	public function getData_video($table,$categoryid=7,$articletype=2,$orderby,$batas=0,$item_per_page=10,$search=0){
		
	$query= "SELECT * FROM dtataruang_news_content WHERE categoryid=".$categoryid." AND articletype=".$articletype." AND n_status!='2'  limit ".$batas.",".$item_per_page."";

		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_video_edit($id,$table,$categoryid=7,$articletype=2,$orderby,$batas=0,$item_per_page=10,$search=0){
		
	$query= "SELECT * FROM dtataruang_news_content WHERE categoryid=".$categoryid." AND articletype=".$articletype." AND n_status!='2' AND id=".$id."  limit ".$batas.",".$item_per_page."";
//pr($query);

		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	public function input_data_foto($table,$data)
	{
		$query= "INSERT INTO dtataruang_news_content( id, title, brief, content, image, thumbnailimage, categoryid, articletype, tags, createdate, postdate, expiredate, fromwho, authorid, n_status) VALUES ('','{$data ['judul_gallery']}','','','gallery/foto/{$data ['image']}','gallery/foto/{$data ['image']}','{$data ['categoryid']}','{$data ['articletype']}','','{$data ['createdate']}','{$data ['tglfoto']}','','{$data ['fromwho']}','{$data ['authorid']}','0') ";	
		$result= $this->query($query);
		
		
		if($result){
			$sql = "SELECT id FROM dtataruang_news_content ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
			if ($res){
			
				$query1="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','gallery/foto/{$data ['image']}','gallery/foto/{$data ['image']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				$query2="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','gallery/foto/{$data ['image2']}','gallery/foto/{$data ['image2']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				$query3="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','gallery/foto/{$data ['image3']}','gallery/foto/{$data ['image3']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				$query4="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','gallery/foto/{$data ['image4']}','gallery/foto/{$data ['image4']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				
				$result1= $this->query($query1);
				$result2= $this->query($query2);
				$result3= $this->query($query3);
				$result4= $this->query($query4);
			}
		}
		
		
		
	
		return $result;
	}
	public function input_data_foto_edit($table,$data)

	{			//pr($data);
			
				$query4="UPDATE dtataruang_news_content SET title ='{$data ['judul_gallery']}' WHERE id='{$data ['id']}'";
			
		
				$query="UPDATE dtataruang_news_content_repo SET title ='{$data ['judul_gallery']}' WHERE otherid='{$data ['id']}'";
		
				$result= $this->fetch($query);
				$result= $this->fetch($query4);
		
		
				$query1="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','{$data ['image']}','{$data ['image']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				$query2="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','{$data ['image2']}','{$data ['image2']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				$query3="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','','','1','6','{$data ['image3']}','{$data ['image3']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
				
				
				$result1= $this->query($query1);
				$result2= $this->query($query2);
				$result3= $this->query($query3);

		return $result;
	}
	public function input_data_video($table,$data)
	{

		//pr($data);
		$query= "INSERT INTO dtataruang_news_content( id, title, brief, content, image,thumbnailimage, categoryid, articletype, tags, createdate, postdate, expiredate, fromwho, authorid, n_status) VALUES ('','{$data ['namavideo']}','','','{$data ['image']}','{$data ['image']}','{$data ['categoryid']}','{$data ['articletype']}','','{$data ['createdate']}','{$data ['tglvideo']}','','{$data ['fromwho']}','{$data ['authorid']}','0') ";	
		//pr($query);
		$result= $this->query($query);
	
		if($result){
			$sql = "SELECT id FROM dtataruang_news_content ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
			
			if ($res){
						$query="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['namavideo']}','','','2','7','{$data ['image']}','{$data ['image']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglvideo']}','0')";
						
						$result1= $this->query($query);
						
					}
				}
	
		return $result;
	}
	public function delete_data_foto($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE otherid=$id";
		$result= $this->query($query);
		$result1= $this->query($query1);
		return 0;
	}
	public function delete_data_foto_satu($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE id=$id";	
		$result= $this->query($query);
		$result= $this->query($query1);
		
		return 0;
	}
	
	public function delete_data_video($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE otherid=$id";	
		$result= $this->fetch($query);
		$result= $this->fetch($query1);
		
		return $result;
	}
	public function publish_data_foto($id)
	{
		$query= "UPDATE dtataruang_news_content SET n_status='1' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='1' WHERE otherid=$id";	
		$result= $this->fetch($query);
		$result= $this->fetch($query1);
		return $result;
	}
	public function publish_data_video($id)
	{
		$query= "UPDATE dtataruang_news_content SET n_status='1' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='1' WHERE otherid=$id";	
		$result= $this->fetch($query);
		$result= $this->fetch($query1);
		return $result;
	}
	public function publish_data_video_edit_submit($data)
	{
	
		$query= "UPDATE dtataruang_news_content SET title= '{$data ['namavideo']}' ,postdate= '{$data ['tglvideo']}' $tglvideo WHERE id='{$data ['id']}'";	
		
		$query1= "UPDATE dtataruang_news_content_repo SET title= '{$data ['namavideo']}' ,postdate= '{$data ['tglvideo']}' WHERE otherid='{$data ['id']}'";	
		//pr($query);
		//pr($query1);
		$result= $this->fetch($query);
		$result= $this->fetch($query1);
		return $result;
		
	}
	
	public function getDataLokasi(){
		$query = "SELECT kode_wilayah,nama_wilayah FROM tbl_wilayah WHERE parent=0";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	public function getChildLoc($id){
		$query = "SELECT * FROM tbl_wilayah WHERE parent='{$id}' ORDER BY nama_wilayah ASC";

		$result = $this->fetch($query,1);

		return $result;
	}
	
	function getNotif($id=1)
	{
		$query = "SELECT log.*,ca.activityValue,ca.activityId FROM code_activity_log log LEFT JOIN code_activity ca 
					ON log.activityId=ca.id WHERE log.userid!={$id} AND log.n_status != 0 ORDER BY datetimes DESC";
					
		// pr($query);
		$result = $this->fetch($query,1);
		// pr($result);
		foreach($result as $key=>$res){
			$sql = "SELECT username FROM user_member WHERE id = {$res['userid']}";
			$user = $this->fetch($sql);
			// pr($user);
			$result[$key]['username'] = $user['username'];
			
			if($res['activityId']==1)$table="dtataruang_news_content";
			elseif($res['activityId']==2)$table="dtataruang_news_content_norma";
			elseif($res['activityId']==3)$table="dtataruang_news_content_peraturan";
			elseif($res['activityId']==4)$table="dtataruang_news_content_product";
			elseif($res['activityId']==5)$table="dtataruang_news_content_program";
			elseif($res['activityId']==6)$table="dtataruang_news_content_sig";
			elseif($res['activityId']==7)$table="dtataruang_news_content_sig";
			elseif($res['activityId']==8)$table="user_member";
			
			$sql_title = "SELECT title FROM {$table} WHERE id = {$res['activityDesc']}";
			$title = $this->fetch($sql_title);
			$result[$key]['title'] = $title['title'];
		}
		if ($result) return $result;
		return false;
	}
	
}
?>