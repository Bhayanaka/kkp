<?php
/* contoh models */

class m_perencanaan extends Database {
	
	public function getPage($cat,$type){
		$query_type = "SELECT value FROM dtataruang_news_content_type_product WHERE id='{$type}' and n_status='1'";
		$query_cat = "SELECT value FROM dtataruang_news_content_category_product WHERE id='{$cat}' and n_status='1'";
		
		$result['type'] = $this->fetch($query_type,1);
		$result['category'] = $this->fetch($query_cat,1);
		
		return $result;
	}
	
	public function getMenuList($type){
		$query_type = "SELECT id,value,category_list FROM dtataruang_news_content_type_product WHERE id='{$type}'";
		$query_cat = "SELECT id,value FROM dtataruang_news_content_category_product";
		
		$result['type'] = $this->fetch($query_type,1);
		$result['category'] = $this->fetch($query_cat,1);
		
		return $result;
	}
	
	public function getDataType($type){
		$query = "SELECT * FROM dtataruang_news_content_product WHERE articletype={$type}";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	public function getDataFiles($type){
		$query = "SELECT otherid,title,files FROM dtataruang_news_content_repo WHERE typealbum='3' AND gallerytype='3'";
		
		$result = $this->fetch($query,1);
		
		return $result;
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
					$search_sql = 'select * from '.$tables[$i]['Tables_in_'.$dbname].' where '.$search_param['condition'].' and n_status=1 and (';
				} else {
					$search_sql = 'select count(*) from '.$tables[$i]['Tables_in_'.$dbname].' where '.$search_param['condition'].' and n_status=1 and (';
				}
				$no_varchar_field = 0;
				
				for($j=0;$j<sizeof($res);$j++)
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
					}
					$result = $this->fetch($sql_fix,1);
					
					//repo
					if($result && !$countonly){
						foreach($result as $ket => $value)
						{
							if ($value['id']){
								$sql2 = "SELECT * FROM dtataruang_news_content_repo WHERE otherid = {$value['id']} AND gallerytype = 3";	
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
	
	public function getChildLoc($id){
		$query = "SELECT * FROM tbl_wilayah WHERE parent='{$id}' ORDER BY nama_wilayah ASC";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
}
?>
