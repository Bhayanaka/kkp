<?php

class minapolitan extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		global $basedomain, $CONFIG;
		$this->loadmodule();
		$this->folder = "SIG/";
		// if (!$this->isUserOnline()){
			
			// redirect($basedomain.$CONFIG['default']['login']);
		// }
	}
	public function loadmodule()
	{
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_minapolitan');
	}
	
	public function index(){
		
		$this->polaruangprovinsi();
		// exit;
		$data = array();
		return $this->loadView('read', $data);
		
	}
	
	function read()
	{
		
		$data = array();
		return $this->loadView('read',$read);
	}
    function searchSigPola(){
		
		global $basedomain;
		// pr($_POST);
		// exit;
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}
		
		if($_POST['type'] == '1'){
			$articletype="1";
		}elseif($_POST['type'] == '2'){
			$articletype="2";
		}elseif($_POST['type'] == '3'){
			$articletype="3";
		}elseif($_POST['type'] == '4'){
			$articletype="4";
		}else{
			$articletype="";
		}
		$table="dtataruang_news_content_sig";
		$categoryid="";
		$orderby=array('createdate','DESC');
		
		// pr($_SESSION);
		if(isset($_POST['search'])){
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
			
			$postProvinsi = explode("_",$_POST['provinsi']);
			$_SESSION['search']['provinsi'] = $postProvinsi[0];
			$_SESSION['search']['provValue'] = $postProvinsi[1];
			
			$postKabupaten = explode("_",$_POST['kabupaten']);
			$_SESSION['search']['kabupaten'] = $postKabupaten[0];
			$_SESSION['search']['kabValue'] = $postKabupaten[1];
			// echo "isset";				
		}
		// echo "lewat";
		// exit;
		if(isset($_SESSION['search'])){
			
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
					
			if($_POST['provinsi']!=""){
				$postProvinsi = explode("_",$_POST['provinsi']);
				$_SESSION['search']['provinsi'] = $postProvinsi[0];
				$_SESSION['search']['provValue'] = $postProvinsi[1];
				$query_prov = "id_provinsi = '{$_SESSION['search']['provinsi']}' AND";
			} else {$query_prov="";}
			if(isset($_POST['kabupaten'])){
				if($_POST['kabupaten'] !=''){
					$postKabupaten = explode("_",$_POST['kabupaten']);
					$_SESSION['search']['kabupaten'] = $postKabupaten[0];
					$_SESSION['search']['kabValue'] = $postKabupaten[1];
					$query_kab = "id_kabupaten = '{$_SESSION['search']['kabupaten']}' AND ";
				}
			} else {$query_kab="";}
			
			if($_POST['type'] != ''){
				$_SESSION['search']['type'] = $_POST['type'];
				$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				
				if($_POST['categoryid'] != ''){
					$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				}
			}
				
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			// pr($search_param);
			$count = $this->models->search_table($search_param,'yes');
			// pr($count);
			// exit;
			$count_data = $count[0]['count(*)'];
			// pr($count_data);
			// exit;
		} else {
			// echo "masuk";
			$count_data = $this->loadCountData($table,$categoryid,$articletype);
			// pr($count_data);
		}
			// exit;
			//total item per page
		$paging= paging($count_data,'5');
		// pr($paging); 
		// exit;
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
				$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				
				if($_POST['categoryid'] != ''){
					$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				}
			}
			
			$search_param['batas'] = $paging['batas'];
			$search_param['item_per_page'] = $paging['item_per_page'];
			// pr($search_param);
			// exit;
			$result_data = $this->models->search_table($search_param);
			// pr($result_data);
			// exit;
			
		} else {
			if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				// echo "masuk sini";
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				// echo "masuk sini";
				// pr($result_data);
			}
		}
		
		// exit;
		$list_category = $this->models->get_category(); 

		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['type'] = $articletype;
		$data['keyword'] = $_POST['keywords'];
		$data['prov'] = $postProvinsi[1];
		$data['kab'] = $postKabupaten[1];
		
		// pr($data['keyword']);
		$data['listtype'] = $this->models->getData_type();
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/searchSigPola/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView($this->folder.'SIG-peta-pola-ruang-search',$data);
	}
	
	function polaruangnasional()
	{
		$data = array();
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="33";
		$articletype="1";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		// echo $count_data;
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/polaruangnasional/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView($this->folder.'SIG-peta-pola-ruang-nasional',$data);
	}
	
	function polaruangprovinsi()
	{
		// echo "paging = ".$paging;
		/* deklarasi parameter */
		// $data = array();
		// $page = 0;
		// $param = array();
		// $param['provinsi'] = 1;
		// $param['kabupaten'] = 0;
		// $param['kecamatan'] = 0;
		// $param['categoryid'] = 12;
		// $param['articletype'] = 2;
		
		// if (_g('page')) $page = @_g('page');
		// $listprovinsi = $this->contentHelper->getWilayah(true,$param);
		// $data['province'] = $listprovinsi['wilayah'];
		// $data['dokumen'] = $this->contentHelper->getDataSIG(true, $param,$page);
		$data = array();	
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="33";
		$articletype="2";
		$orderby=array('createdate','ASC');
			
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/polaruangprovinsi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView($this->folder.'SIG-peta-pola-ruang-provinsi',$data);
	}
	
	
	
	function polaruangkabkot()
	{
		$data = array();
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="33";
		//article type =3
		$articletype="3";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/polaruangkabkot/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView($this->folder.'SIG-peta-pola-ruang-kabupaten-kota',$data);
	}
	
	
	/* function ajaxKab()
	{
		$param['provinsi'] = 0;
		$param['kabupaten'] = 1;
		
		$listkabupaten = $this->contentHelper->getWilayah(true,$param);
		$kabupaten = $listkabupaten['wilayah'];
		if($kabupaten){
			print json_encode(array('status'=>true, 'res'=>$kabupaten));
		}else{
			print json_encode(array('status'=>false));
		}
		exit;
	} */
	
	function polaruangkabkotrinci()
	{
		$data = array();
		
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="33";
		//article type =4
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['provinsi'] = $data['provinsi'];
		$data['url']=$basedomain."minapolitan/polaruangkabkotrinci/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView($this->folder.'SIG-peta-pola-ruang-kabupaten-kota-rinci',$data);
	}
	
	
	//====================================================================================
	//struktur
	//====================================================================================
	function searchSigStruktur(){
		
		global $basedomain;
		// pr($_POST);
		// exit;
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}
		
		if($_POST['type'] == '1'){
			$articletype="1";
		}elseif($_POST['type'] == '2'){
			$articletype="2";
		}elseif($_POST['type'] == '3'){
			$articletype="3";
		}elseif($_POST['type'] == '4'){
			$articletype="4";
		}else{
			$articletype="";
		}
		$table="dtataruang_news_content_sig";
		$categoryid="";
		$orderby=array('createdate','DESC');
		
		// pr($_SESSION);
		if(isset($_POST['search'])){
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
			
			$postProvinsi = explode("_",$_POST['provinsi']);
			$_SESSION['search']['provinsi'] = $postProvinsi[0];
			$_SESSION['search']['provValue'] = $postProvinsi[1];
			
			$postKabupaten = explode("_",$_POST['kabupaten']);
			$_SESSION['search']['kabupaten'] = $postKabupaten[0];
			$_SESSION['search']['kabValue'] = $postKabupaten[1];
			// echo "isset";				
		}
		// echo "lewat";
		// exit;
		if(isset($_SESSION['search'])){
			
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$_SESSION['search']['categoryid'] = $_POST['categoryid'];
			$cgr = $_SESSION['search']['categoryid'];
					
			if($_POST['provinsi']!=""){
				$postProvinsi = explode("_",$_POST['provinsi']);
				$_SESSION['search']['provinsi'] = $postProvinsi[0];
				$_SESSION['search']['provValue'] = $postProvinsi[1];
				$query_prov = "id_provinsi = '{$_SESSION['search']['provinsi']}' AND";
			} else {$query_prov="";}
			if(isset($_POST['kabupaten'])){
				if($_POST['kabupaten'] !=''){
					$postKabupaten = explode("_",$_POST['kabupaten']);
					$_SESSION['search']['kabupaten'] = $postKabupaten[0];
					$_SESSION['search']['kabValue'] = $postKabupaten[1];
					$query_kab = "id_kabupaten = '{$_SESSION['search']['kabupaten']}' AND ";
				}
			} else {$query_kab="";}
			
			if($_POST['type'] != ''){
				$_SESSION['search']['type'] = $_POST['type'];
				$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				
				if($_POST['categoryid'] != ''){
					$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				}
			}
				
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			// pr($search_param);
			$count = $this->models->search_table($search_param,'yes');
			// pr($count);
			// exit;
			$count_data = $count[0]['count(*)'];
			// exit;
		} else {
			// echo "masuk";
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
				$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				
				if($_POST['categoryid'] != ''){
					$search_param['condition'] = $search_param['condition']. " categoryid = '$cgr' AND";
				}else{
					$search_param['condition'] = "articletype ='$articletype' AND  {$query_prov} {$query_kab}";
				}
			}	
			
			if($_POST['categoryid'] != ''){
				$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
				
				if($_POST['type'] != ''){
					$_SESSION['search']['type'] = $_POST['type'];
					$search_param['condition'] = $search_param['condition']. " articletype ='$articletype' AND";
				}else{
					$search_param['condition'] = " categoryid = '$cgr' AND {$query_prov} {$query_kab}";
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
		// pr($result_data);
		// exit;
		$list_category = $this->models->get_category(); 

		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['type'] = $articletype;
		$data['keyword'] = $_POST['keywords'];
		$data['prov'] = $postProvinsi[1];
		$data['kab'] = $postKabupaten[1];
		// pr($data['keyword']);
		$data['listtype'] = $this->models->getData_type();
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/searchSigStruktur/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView($this->folder.'SIG-peta-struktur-ruang-search',$data);
	}
	
	
	
	function strukturruangprovinsi()
	{
		$data = array();	
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="34";
		$articletype="2";
		$orderby=array('createdate','ASC');
			
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/strukturruangprovinsi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView($this->folder.'SIG-peta-struktur-ruang-provinsi',$data);
	}
	
	function strukturruangnasional()
	{
		$data = array();
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="34";
		$articletype="1";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		// echo $count_data;
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
			// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/strukturruangnasional/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView($this->folder.'SIG-peta-struktur-ruang-nasional',$data);
	}
	
	function strukturruangkabkot()
	{
		$data = array();
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="34";
		//article type =3
		$articletype="3";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."minapolitan/polaruangkabkot/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView($this->folder.'SIG-peta-struktur-ruang-kabupaten-kota',$data);
	}
	
	function strukturruangkabkotrinci()
	{
		$data = array();
		
		global $basedomain;
		$table="dtataruang_news_content_sig";
		$categoryid="34";
		//article type =4
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->models->getData_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "SIG Pengelolaan Pesisir dan<br/>Pulau - Pulau Kecil"; // judul sidebar
		$sidebar['minapolitan'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['provinsi'] = $this->contentHelper->getDataLokasi();
		$data['kabupaten'] = $this->contentHelper->getDataKabupaten();
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['provinsi'] = $data['provinsi'];
		$data['url']=$basedomain."minapolitan/strukturruangkabkotrinci/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView($this->folder.'SIG-peta-struktur-ruang-kabupaten-kota-rinci',$data);
	}
	
}

?>
