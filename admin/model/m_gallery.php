<?php
class m_gallery extends Database {
	
	function getData()
	
	{
		$sql = "SELECT * FROM tbl_news";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	public function getData_users($table){
		
		$query= "SELECT * FROM ".$table." ORDER BY id ASC";
		// pr($query);
		$result= $this->fetch($query,1);
	//pr($result);
	//	exit;
		return $result;
	}
	
	function getFile($id)
	
	{
		$sql = "SELECT files FROM dtataruang_news_content_repo where id='$id'";
		$res = $this->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	public function getData_news($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5,$search=0){
		
		$query= "SELECT * FROM ".$table." Where categoryid='".$categoryid."' AND articletype='".$articletype."' AND n_status='1' ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";
		// pr($query);
		$result= $this->fetch($query,1);
		return $result;
	}
	
	public function getAlbum($id=false,$categoryid=1,$articletype=1,$all=false){
		
		$filter = "";
		if ($id) $filter = " AND id = {$id}";
		
		$query= "SELECT * FROM dtataruang_news_content Where categoryid={$categoryid} AND articletype ={$articletype} AND n_status='1' {$filter}";
		if ($all) $result= $this->fetch($query,1);
		else $result= $this->fetch($query);
		return $result;
	}
	
	public function getData_gallery($table,$categoryid,$articletype,$batas=0,$item_per_page=15){
		
		//pr($batas);
		// $query= "SELECT DISTINCT (b.id), b.image, b.title, b.postdate, b.n_status,b.fromwho FROM ".$table." AS b, dtataruang_news_content_repo AS a
					// WHERE b.id = a.otherid AND b.n_status!='2' AND b.categoryid=".$categoryid." AND b.articletype=".$articletype." limit ".$batas.",".$item_per_page."";
		
		$query= "SELECT * FROM $table WHERE categoryid=".$categoryid." AND articletype=".$articletype." AND n_status != 2";
		// pr($query);
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_gallery_edit($id,$table,$categoryid,$articletype,$gallerytype,$batas=0,$item_per_page=15){

		$query= "SELECT title,files,postdate, thumbnail,id FROM dtataruang_news_content_repo Where otherid='".$id."' AND gallerytype='".$gallerytype."' AND n_status!='2' limit ".$batas.",".$item_per_page."";
		// pr($query);
		//	$result= $this->fetch($query,1);
		$result['gallery']= $this->fetch($query,1);
	
		$query1= "SELECT id,title,image,postdate FROM dtataruang_news_content Where id='".$id."' AND n_status!='2' limit ".$batas.",".$item_per_page."";
		// pr($query);
		$result['cover']= $this->fetch($query1,1);
	
		
		
		
		return $result;
	}
	
	public function getData_video($table,$categoryid=7,$articletype=2,$orderby,$batas=0,$item_per_page=10,$search=0){
		
		$query = "SELECT * FROM dtataruang_news_content WHERE categoryid=".$categoryid." AND articletype=".$articletype." AND n_status!='2' ";
		// pr($query);
		$result= $this->fetch($query,1);
		
		return $result;
	}
	public function getData_video_edit($id,$table,$categoryid=7,$articletype=2,$orderby,$batas=0,$item_per_page=10,$search=0){
		
	$query= "SELECT * FROM dtataruang_news_content WHERE categoryid=".$categoryid." AND articletype=".$articletype." AND n_status!='2' AND id=".$id."  limit ".$batas.",".$item_per_page."";
		// pr($query);
		$result= $this->fetch($query,1);
		
		return $result;
	}
	
	public function input_data_foto($table,$data)
	{
		$query= "INSERT INTO $table( id, title, brief, content, image, thumbnailimage, categoryid, articletype, tags, createdate, postdate, expiredate, fromwho, authorid, n_status) VALUES ('','{$data ['judul_gallery']}','','','gallery/foto/{$data ['image']}','gallery/foto/{$data ['image']}','{$data ['categoryid']}','{$data ['articletype']}','','{$data ['createdate']}','{$data ['tglfoto']}','','{$data ['fromwho']}','{$data ['authorid']}','0') ";	
		$result['data'] = $this->query($query);
		$result['param'] = 'I';
		$query_sel ="SELECT max(id) FROM ".$table."";
		$hasil = $this->fetch($query_sel,1);
		$result['id'] = $hasil[0]['max(id)'];
		
		if($result['data']){
			$sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
			// pr($res);
			// exit;
			if ($res){
					/*	if (!empty($_FILES['image']['name']) ) {
							$query1="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','cover','','','1','6','gallery/foto/{$data ['image']}','gallery/foto/{$data ['image']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
							//pr($query1);
							$result1= $this->query($query1);
						}
						*/
						
						if (!empty($_FILES['image2']['name']) ) {
							$query2="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan1']}','','1','1','gallery/foto/{$data ['image2']}','gallery/foto/{$data ['image2']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
							//pr($query2);
							$result2= $this->query($query2);
						}if (!empty($_FILES['image3']['name']) ) {
							$query3="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan2']}','','1','1','gallery/foto/{$data ['image3']}','gallery/foto/{$data ['image3']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
							//pr($query3);
							$result3= $this->query($query3);
						}if (!empty($_FILES['image4']['name']) ) {
							$query4="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan3']}','','1','1','gallery/foto/{$data ['image4']}','gallery/foto/{$data ['image4']}','','{$res['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','0')";
							//pr($query4);
							$result4= $this->query($query4);
						}
					}
				}	
	
		return $result;
	}
	public function input_data_foto_edit($table,$data)

	{			
				// pr($data);
			
				$query4="UPDATE dtataruang_news_content SET title ='{$data ['judul_gallery']}',postdate ='{$data ['tglfoto']}' WHERE id='{$data ['id']}'";
				$hasil['data'] = $this->query($query4);
				$hasil['param'] = 'U';
				$hasil['id'] = $data['id'];
				$query="UPDATE dtataruang_news_content_repo SET title ='{$data ['judul_gallery']}',postdate ='{$data ['tglfoto']}' WHERE otherid='{$data ['id']}' AND title !='cover'";
				$result= $this->query($query);
				if (!empty($_FILES['imagecover']['name']) ) {
					$query6="UPDATE dtataruang_news_content SET image ='gallery/foto/{$data ['imagecover']}',thumbnailimage='gallery/foto/{$data ['imagecover']}' WHERE id='{$data ['id']}'";
					$result6= $this->query($query6);
					}
				if (!empty($_FILES['image']['name']) ) {
					$query1="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan']}','','1','1','gallery/foto/{$data ['image']}','gallery/foto/{$data ['image']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','1')";
					$result1= $this->query($query1);
				}if (!empty($_FILES['image2']['name']) ) {
					$query2="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan1']}','','1','1','gallery/foto/{$data ['image2']}','gallery/foto/{$data ['image2']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','1')";
					$result2= $this->query($query2);
				}	if (!empty($_FILES['image3']['name']) ) {
					$query3="INSERT INTO dtataruang_news_content_repo(id, title, brief, content, typealbum, gallerytype, files, thumbnail, fromwho, otherid, userid, createdate, postdate, n_status) VALUES ('','{$data ['judul_gallery']}','{$data ['keterangan2']}','','1','1','gallery/foto/{$data ['image3']}','gallery/foto/{$data ['image3']}','','{$data ['id']}','','{$data ['createdate']}','{$data ['tglfoto']}','1')";
					$result3= $this->query($query3);
				}
				
		return $hasil;
	}
	public function input_data_video($table,$data)
	{

		//pr($data);
		$query= "INSERT INTO dtataruang_news_content( id, title, brief, content, image, categoryid, articletype, tags, createdate, postdate, expiredate, fromwho, authorid, n_status) VALUES ('','{$data ['namavideo']}','','','{$data ['video']}','{$data ['categoryid']}','{$data ['articletype']}','','{$data ['createdate']}','{$data ['tglvideo']}','','{$data ['fromwho']}','{$data ['authorid']}','0') ";	
		$result['data'] = $this->query($query);
		$result['param'] = 'I';
		$query_sel ="SELECT max(id) FROM ".$table."";
		$hasil = $this->fetch($query_sel,1);
		$result['id'] = $hasil[0]['max(id)'];
	
		if($result['data']){
			$sql = "SELECT id FROM dtataruang_news_content ORDER BY id DESC LIMIT 1";
			$res = $this->fetch($sql);
		}
	
		return $result;
	}
	public function delete_data_foto($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE otherid=$id";
		$result= $this->query($query);
		$result1= $this->query($query1);
		return $id;
	}
	public function delete_data_foto_satu($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		// pr($query);
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE id=$id";	
		// pr($query1);
		$result= $this->query($query);
		$result= $this->query($query1);
		
		return 0;
	}
	
	public function delete_data_video($id){

		$query= "UPDATE dtataruang_news_content SET n_status='2' WHERE id=$id";	
		// $query1= "UPDATE dtataruang_news_content_repo SET n_status='2' WHERE otherid=$id";	
		$result= $this->query($query);
		// $result= $this->query($query1);
		
		return $id;
	}
	public function publish_data_foto($id,$status)
	{
		if ($status=='1'){
		$query= "UPDATE dtataruang_news_content SET n_status='0' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='0' WHERE otherid=$id";	
		$result= $this->query($query);
		$result= $this->query($query1);
		}if ($status=='0'){
		$query= "UPDATE dtataruang_news_content SET n_status='1' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='1' WHERE otherid=$id";	
		$result= $this->query($query);
		$result= $this->query($query1);
		}
		return $result;
	}
	public function publish_data_video($id,$status)
	{
	if ($status=='1'){
		$query= "UPDATE dtataruang_news_content SET n_status='0' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='0' WHERE otherid=$id";	
		$result= $this->query($query);
		$result= $this->query($query1);
		}if ($status=='0'){
		$query= "UPDATE dtataruang_news_content SET n_status='1' WHERE id=$id";	
		$query1= "UPDATE dtataruang_news_content_repo SET n_status='1' WHERE otherid=$id";	
		$result= $this->query($query);
		$result= $this->query($query1);
		
		}
		return $result;
	}
	public function publish_data_video_edit_submit($data)
	{
		
		$query= "UPDATE dtataruang_news_content SET title= '{$data ['namavideo']}', image= '{$data ['video']}' ,postdate= '{$data ['tglvideo']}' WHERE id='{$data ['id']}'";	
		$result['data'] = $this->query($query);
		$result['param'] = 'U';
		$result['id'] = $data['id'];
		return $result;
		
		
	}
	
	
	
	
}
?>