<?php
/* contoh models */

class m_program extends Database {
	
	
	public function getDataFiles($other_id,$gallerytype){
		$query = "SELECT otherid,title,files FROM dtataruang_news_content_repo WHERE otherid='$other_id' AND gallerytype='$gallerytype'";
		// pr($query);
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	public function get_category(){
		$query = "SELECT * FROM dtataruang_news_content_category_product WHERE n_status = '1'";
		// pr($query);
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	public function getData_content($table,$categoryid=1,$articletype=1,$orderby,$batas=0,$item_per_page=5){
	
			if($categoryid!=0){
				$query_category = "categoryid=".$categoryid." AND";
			} else { $query_category="";}
			
			if($articletype!=0){
				$query_article = "articletype=".$articletype." AND";
			} else { $query_article="";}
			
			$query= "SELECT * FROM ".$table." Where {$query_category} {$query_article} n_status='1' ORDER BY ".$orderby[0]." ".$orderby[1]." limit ".$batas.",".$item_per_page."";
			// pr($query);
		$result= $this->fetch($query,1);
		// pr($result);
		$gallerytype = "5";
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
	
		if ($result)return $result;
		return false;
		// exit;
	}
	
	
	
	public function search_table($search_param,$countonly=false){
		//define variable
		
		global $dbConfig;
		$dbname = $dbConfig['name'];
		$tables[0]['Tables_in_'.$dbname] = $search_param['tablename'];
		$search_text = $search_param['search_text'];
		
		for($i=0;$i<sizeof($tables);$i++)
	   // cari dari multiple table
	   {
			//generate query count multiple table
			$sql = 'select count(*) from '.$tables[$i]['Tables_in_'.$dbname];

			$res = $this->fetch($sql,0);

			if($res['count(*)']>0)
			//Generate search query
			{
				//Ambil desc dari table
				$sql = 'desc '.$tables[$i]['Tables_in_'.$dbname]; 
				
				$res = $this->fetch($sql,1);
				if(!$countonly){
					$search_sql = 'select * from '.$tables[$i]['Tables_in_'.$dbname].' where '.$search_param['condition'].' n_status=1 and (';
					// echo $search_sql;
				} else {
					$search_sql = 'select count(*) from '.$tables[$i]['Tables_in_'.$dbname].' where '.$search_param['condition'].'  n_status=1 and (';
					// echo $search_sql;
				}
				// exit;
				$no_varchar_field = 0;
				
				for($j=0;$j<10;$j++)
				// ambil data dari setiap field
				{
						## Search dari semua field
						
						//if(substr($collum[$j]['Type'],0,7)=='varchar'|| substr($collum[$j]['Type'],0,7)=='text')
						// @abstractonly type selection part of query buliding
						// @todo seach all field in the data base put a 1 in if(1)
						// @example if(1) 
						//{
							//echo $collum[$j]->Field .'<br />';
							if($no_varchar_field!=0){$search_sql .= ' or ' ;}
							$search_sql .= '`'.$res[$j]['Field'] .'` like \'%'.$search_text.'%\' ';	
							// echo $search_sql;	
							$no_varchar_field++;
						//} // endof type selection part of query bulidingtype selection part
						
				}//@endof for |buliding search query
				
				if($no_varchar_field>0)
				// main searching part showing the data
				{
					if(isset($search_param['batas'])){
						$sql_fix = $search_sql.") limit ".$search_param['batas'].",".$search_param['item_per_page'];
						// echo $sql_fix; 
					} else {
						$sql_fix = $search_sql.")";
						// echo $sql_fix;;
					}
					
					$result = $this->fetch($sql_fix,1);
					$gallerytype ='5';
					if($result){
						foreach($result as $ket => $value)
						{
							if ($value['id']){
								$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} AND gallerytype='$gallerytype'";	
								// pr($sql2);
								$res2 = $this->fetch($sql2,1);
								$result[$ket]['file'] = $res2;
							}
						}
					}
				}
			}//@endof  querry building and searching 

				
	   }
	   
	   return $result;
	
	}
}
?>
