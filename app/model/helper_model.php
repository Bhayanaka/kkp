<?php
/* contoh models */

class helper_model extends Database {
	
	/*
		function untuk menhasilkan jumlah data
	*/

	public function getCountData($table,$categoryid,$articletype,$condition=false){
		$result = false;
		if($categoryid!=0){
			$query_category = "categoryid=".$categoryid." AND";
		} else { $query_category="";}
		if($articletype!=0){
				$query_article = "articletype=".$articletype." AND";
			} else { $query_article="";}
		if($condition != '' && $condition != '0'){
			$query_extra = $condition ."AND"; 
		}else{
			$query_extra = "";
		}
		$query= "SELECT * FROM ".$table." where {$query_category} {$query_article} {$query_extra} n_status='1' ";
		$result_query= $this->fetch($query,1);
		if ($result_query){
			$result=count($result_query);
		}
		return $result;
	}
	
	public function getCountData_search($table,$search){
		
		
		$result = false;
		
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
		
		$query= "SELECT * FROM ".$table." where n_status='1' AND ".$data_search." AND ".$data_search_like." ";
		// pr($query);
		$result_query= $this->fetch($query,1);
		
		if ($result_query){
			$result=count($result_query);
		
		}
		return $result;
	}
	
	function getSidebar($table,$content=1, $type=false, $start=0, $limit=5,$n_status=1)
	{
		
		$filter = "";
		if ($type) $filter = " AND articletype = {$type}";
		$query = "SELECT * FROM {$table} WHERE categoryid = {$content} 
				AND n_status = {$n_status} {$filter} ORDER BY postdate DESC LIMIT {$start},{$limit}";
		// pr($query);
		$result_query= $this->fetch($query,1);
		if ($result_query){
			
			foreach ($result_query as $key => $val){
				$result_query[$key]['postdate'] = changeDate($val['postdate']);
			}
			return $result_query;
		}
		return false;
	}

}
?>
