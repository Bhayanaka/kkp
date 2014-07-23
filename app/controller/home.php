<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class home extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->models = $this->loadModel('frontend');
	}
	
	public function index(){
        
		global $basedomain;
		$orderby=array('createdate','ASC');
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		/*ref article type: 1 ->Profil, 2 ->Info, 1 ->Agenda*/
		// $count_data = $this->loadCountData('dtataruang_news_content','17','0');
		// pr($count_data);
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		// $paging= paging($count_data,'5');
		// pr($paging);
		// exit;
		// if (!$paging){ 
			// $result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','2','1',$orderby);
			
		// }else{
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','17','',$orderby,'1','5');
			// pr($result_data);
		// }
		// exit;
		$data['data']=$result_data;
		return $this->loadView('home',$data);
		// return $this->loadView('home');

	}
	
	function search()
	{
		global $basedomain;
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}
		
		if(isset($_POST['search'])){
			$_SESSION['search'] = array();
			$_SESSION['search']['keywords'] = $_POST['keywords'];
		}
		
		if(isset($_SESSION['search'])){
			//define parameters
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'][0] = "dtataruang_news_content";
			// $search_param['tablename'][1] = "dtataruang_news_content_peraturan";
			// $search_param['tablename'][2] = "dtataruang_news_content_product";
			$search_param['condition'] = "";
			
			//count all search result
			$count = $this->models->search_table($search_param,'yes');
			$count_data = array_sum($count);
			// pr($count_data);
			//total item per page
			$paging= paging($count_data,'5');
			
			//get paged data
			$search_param['batas'] = $paging['batas'];
			$search_param['item_per_page'] = $paging['item_per_page'];
			$result_data = $this->models->search_table($search_param);
			
			//data for paging
			$data['paging']=$paging;
			$data['url']=$basedomain."home/search/";
			
			//get data content
			$data['content'] = $result_data;
			
			//category and type
			$data['category'] = $this->models->getCategory();
			// $data['type'] = $this->models->getType();
			
			return $this->loadView('search-engine',$data);
		} else {
			return $this->loadView('search-engine');
		}
	}
	
}

?>
