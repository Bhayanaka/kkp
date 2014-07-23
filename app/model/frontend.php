<?php
/* contoh models */

class frontend extends Database {
	
	public function getDataDesc(){
		$query = "SELECT * FROM tests ORDER BY ID DESC";
		//pr($query);
		/* 
			fetch parameternya ($query, boolean)
			boolean true : looping data
			boolean false : single data
		*/
		 $result = $this->fetch($query,1);
		
		 return $result;
	}
	function inputData($id, $nama, $alamat){
            $query = "call testsInputProcedure(".$id.",'".$nama."','".$alamat."')";
            
            $result = $this->query($query);
            
            return $result;
        }
	
	public function getCategory(){
            $query = "SELECT * FROM dtataruang_news_content_category WHERE n_status='1'";
            
            $result = $this->fetch($query,1);
            
            return $result;
        }
	
	public function getType(){
            $query = "SELECT * FROM dtataruang_news_content_type WHERE n_status='1'";
            
            $result = $this->fetch($query,1);
            
            return $result;
        }
        
	public function get_article_asc(){
		$query = "SELECT * FROM Aset ORDER BY Aset_ID ASC LIMIT 2";
		pr($query);
		// $result = $this->fetch($query,0);
		
		// return $result;
	}
	
	public function search_table($search_param,$countonly=false){
		//define variable
		global $dbConfig;
		$dbname = $dbConfig['name'];
		$tables[0]['Tables_in_'.$dbname] = $search_param['tablename'][0];
		// $tables[1]['Tables_in_'.$dbname] = $search_param['tablename'][1];
		// $tables[2]['Tables_in_'.$dbname] = $search_param['tablename'][2];
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
				} else {
					$search_sql = 'select count(*) as count from '.$tables[$i]['Tables_in_'.$dbname].' where '.$search_param['condition'].' n_status=1 and (';
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
					} else {
						$sql_fix = $search_sql.") ";
					}
					// pr($sql_fix);
					if($countonly){
						$part = $this->fetch($sql_fix,0);
						$result[$i] = $part['count'];
						// pr($result);
					} else {
						$result[$i] = $this->fetch($sql_fix,1);
					}
				}
			}//@endof  querry building and searching 

				
	   }
	   
	   return $result;
	
	}
}
?>
