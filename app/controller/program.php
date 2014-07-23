<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class program extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		// $this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_program');
	}
	
	public function index(){
        
		// global $basedomain;
		// echo "masuk";
		// exit;
	
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		return $this->loadView('program/program-Penyusunan-Rencana-Strategis',$data);

	}
	
	public function searchProgram(){
        
		
		// pr($_POST);
		// exit;
		if($_POST['type'] == '1'){
			$articletype="1";
		}elseif($_POST['type'] == '2'){
			$articletype="2";
		}elseif($_POST['type'] == '3'){
			$articletype="3";
		}elseif($_POST['type'] == '4'){
			$articletype="4";
		}elseif($_POST['type'] == '5'){
			$articletype="5";
		}else{
			$articletype="";
		}
		
		global $basedomain;
		
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}
		
		$table="dtataruang_news_content_program";
		$categoryid="";
		$orderby=array('createdate','DESC');
		$gallerytype = "5";
		// pr($_SESSION);
		if(isset($_POST['search'])){
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			
		}
		if(isset($_SESSION['search'])){
			
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
					
			if($_POST['type'] != ''){
				$_SESSION['search']['type'] = $_POST['type'];
				$search_param['condition'] = "articletype ='$articletype' AND";
				if($_POST['categoryid'] != ''){
				$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND";
				}
			}
				
			// pr($search_param['condition']);	
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$count = $this->models->search_table($search_param,'yes');
			// pr($count);
			// exit;
			$count_data = $count[0]['count(*)'];
		} else {
			
			$count_data = $this->loadCountData($table,$categoryid,$articletype);
			
		
		}
			// exit;
			//total item per page
		$paging= paging($count_data,'5');
		
		//Fungsi Search
		if(isset($_SESSION['search']))
		{	
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
					
			if($_POST['type'] != ''){
				$_SESSION['search']['type'] = $_POST['type'];
				$search_param['condition'] = "articletype ='$articletype' AND";
				if($_POST['categoryid'] != ''){
				$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND";
				}
			}
			
			$search_param['batas'] = $paging['batas'];
			$search_param['item_per_page'] = $paging['item_per_page'];
			$result_data = $this->models->search_table($search_param);
			
		} else {
			if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		}
		$list_category = $this->models->get_category(); 

		//data for paging
		$data['type'] = $articletype;
		// pr($data['type']);
		$data['param_search'] = $search_param['search_text'];
		$data['prov'] = $postProvinsi[1];
		$data['kab'] = $postKabupaten[1];
		$data['param_cat'] = $cgr;
		$data['kategori']= $list_category;
		$data['data'] = $result_data;
		$data['paging']=$paging;
		$data['url']=$basedomain."program/searchProgram/";
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		return $this->loadView('program/program-pencarian',$data);
		
	}
	
	public function strategis(){
        
		global $basedomain;
		$table="dtataruang_news_content_program";
		$categoryid="";
		$articletype="1";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		$list_category = $this->models->get_category(); 
		// pr($list_category);
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['kategori']= $list_category;
		$data['url']=$basedomain."program/strategis/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView('program/program-Penyusunan-Rencana-Strategis',$data);

	}
	
	public function zonasi(){
        
		global $basedomain;
		$table="dtataruang_news_content_program";
		//static category untuk menu program = 14
		$categoryid="";
		$articletype="2";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		$list_category = $this->models->get_category(); 
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		$data['kategori']= $list_category;
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."program/zonasi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView('program/program-Penyusunan-Rencana-Zonasi',$data);

	}
	
	public function pengelolaan(){
        
		global $basedomain;
		$table="dtataruang_news_content_program";
		//static category untuk menu program = 14
		$categoryid="";
		$articletype="3";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		$list_category = $this->models->get_category(); 
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		$data['kategori']= $list_category;
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."program/pengelolaan/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		
		return $this->loadView('program/program-Penyusunan-Rencana-Pengelolaan',$data);

	}
	
	public function aksi(){
        
		global $basedomain;
		$table="dtataruang_news_content_program";
		//static category untuk menu program = 14
		$categoryid="";
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging = paging($count_data,'5');
		
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		$list_category = $this->models->get_category(); 
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		$data['kategori']= $list_category;
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."program/aksi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		
		return $this->loadView('program/program-Penyusunan-Rencana-Aksi',$data);

	}
	
	public function lainLain(){
        
		global $basedomain;
		$table="dtataruang_news_content_program";
		//static category untuk menu program = 14
		$categoryid="";
		$articletype="5";
		$orderby=array('createdate','ASC');
		
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		$list_category = $this->models->get_category(); 
		/* Deklarasi sidebar */
		$sidebar['title'] = "Program"; // judul sidebar
		$sidebar['program'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['kategori']= $list_category;
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."program/lainLain/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		
		return $this->loadView('program/program-lain-lain',$data);

	}
}

?>
