<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class dok_perencanaan extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_perencanaan');
	}
	
	public function index(){
        
		// $var = 'masuk';
		// return $this->loadView('beranda');

	}
	
	public function generateMenu($data,$fullCat,$withid=false){
		$listCat = explode(",",$data);
		$count = count($listCat);
		for($i=0;$i<$count;$i++){
			foreach($fullCat as $key=>$val){
				if($listCat[$i] == $val['id']){
					if($withid){
						$listMenu[$i]['id'] = $val['id'];
						$listMenu[$i]['value'] = $val['value'];
					} else {
						$listMenu[$i] = $val['value'];
					}
				}
			}
		}
		return $listMenu;
	}
	
	public function generateLink($data,$fullCat,$type){
		$listCat = explode(",",$data);
		$count = count($listCat);
		for($i=0;$i<$count;$i++){
			foreach($fullCat as $key=>$val){
				if($listCat[$i] == $val['id']){
					$linkMenu[$i] = "dok_perencanaan/wp3k/?cat={$val['id']}&type={$type}";
				}
			}
		}
		return $linkMenu;
	}
	
	public function wp3k(){
		//get category and type menu
		$category = $_GET['cat'];
		$type = $_GET['type'];
		
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}

		//list category and type
		$menuList = $this->models->getMenuList($type);
		//Generate List Menu
		$listMenu = $this->generateMenu($menuList['type'][0]['category_list'],$menuList['category']);
		//Generate Link Menu
		$linkMenu = $this->generateLink($menuList['type'][0]['category_list'],$menuList['category'],$type);
		
		//paging
		global $basedomain;
		$table="dtataruang_news_content_product";
		$categoryid=$category;
		$articletype=$type;
		$orderby=array('createdate','DESC');
		
		if(isset($_POST['search'])){
			// pr($_POST);
			// exit;
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			if($_POST['provinsi']!=""){
				$postProvinsi = explode("_",$_POST['provinsi']);
				$_SESSION['search']['provinsi'] = $postProvinsi[0];
				$_SESSION['search']['provValue'] = $postProvinsi[1];
				$query_prov = "AND id_provinsi = '{$_SESSION['search']['provinsi']}'";
			} else {$query_prov="";}
			if(isset($_POST['kabupaten'])){
				$postKabupaten = explode("_",$_POST['kabupaten']);
				$_SESSION['search']['kabupaten'] = $postKabupaten[0];
				$_SESSION['search']['kabValue'] = $postKabupaten[1];
				$query_kab = "AND id_kabupaten = '{$_SESSION['search']['kabupaten']}'";
			} else {$query_kab="";}
		}

		if(isset($_SESSION['search'])){
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$search_param['condition'] = "articletype ='{$type}' AND categoryid = '{$category}' {$query_prov} {$query_kab}";
			$count = $this->models->search_table($search_param,'yes');
			$count_data = $count[0]['count(*)'];
		} else {
			$count_data = $this->loadCountData($table,$categoryid,$articletype);
		}

		//total item per page
		$paging= paging($count_data,'5');
		
		//Fungsi Search
		if(isset($_SESSION['search']))
		{	
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$search_param['condition'] = "articletype ='{$type}' AND categoryid = '{$category}' {$query_prov} {$query_kab}";
			$search_param['batas'] = $paging['batas'];
			$search_param['item_per_page'] = $paging['item_per_page'];
			$result_data = $this->models->search_table($search_param);
		} else {
			if (!$paging){ 
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				// pr($result_data);
			}
		}
		
		//data for paging
		$data['paging']=$paging;
		$data['url']=$basedomain."dok_perencanaan/wp3k/";
		
		//get data content
		$data['content'] = $result_data;
		$data['files'] = $this->models->getDataFiles($type);
		
		//Data sent to view
		$data['item'] = $this->models->getPage($category,$type);
		$data['title_menu'] = $listMenu;
		$data['link_menu'] = $linkMenu;
		
		/* Deklarasi sidebar */
		$sidebar['judulopini'] = "Dokumen Perencanaan WP-3-K"; // judul sidebar
		$sidebar['title'] = "Dokumen Perencanaan WP-3-K"; 
		$sidebar['produk'] = $this->sidebar($table); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		//only if Provinsi
		if($category==7){
			$data['lokasi'] = $this->contentHelper->getDataLokasi();
		}
		//load view
		return $this->loadView('dok_perencanaan/wp3k',$data);
	}
    
	
	public function typewp3k(){
		//get category and type menu
		$type = $_GET['type'];
		
		if(!isset($_GET['page'])){
			unset($_SESSION['search']);
		}
		
		//list category and type
		$menuList = $this->models->getMenuList($type);
		//Generate List Menu
		// $listMenu = $this->generateMenu($menuList['type'][0]['category_list'],$menuList['category'],'yes');
		//Generate Link Menu
		// $linkMenu = $this->generateLink($menuList['type'][0]['category_list'],$menuList['category'],$type);
		
		//pagination
		global $basedomain;
		
		$table="dtataruang_news_content_product";
		if(isset($_POST['category'])){$categoryid = $_POST['category'];} else {$categoryid ='';}
		$articletype=$type;
		$orderby=array('createdate','DESC');
		if(isset($_POST['provinsi']) && $_POST['provinsi'] !=""){
			$postProvinsi = explode("_",$_POST['provinsi']);
			$_SESSION['search']['provinsi'] = $postProvinsi[0];
			$_SESSION['search']['provValue'] = $postProvinsi[1];
			$query_prov = "AND id_provinsi = '{$_SESSION['search']['provinsi']}'";
		} else {$query_prov="";}
		if(isset($_POST['kabupaten']) && $_POST['kabupaten'] != ""){
			$postKabupaten = explode("_",$_POST['kabupaten']);
			$_SESSION['search']['kabupaten'] = $postKabupaten[0];
			$_SESSION['search']['kabValue'] = $postKabupaten[1];
			$query_kab = "AND id_kabupaten = '{$_SESSION['search']['kabupaten']}'";
		} else {$query_kab="";}
		
		if(isset($_POST['category']) && $_POST['category'] != 0){
			$_SESSION['search']['keywords'] = $_POST['keywords'];
			$postCategory = explode("_",$_POST['category']);
			$_SESSION['search']['category'] = $postCategory[0];
			$_SESSION['search']['value'] = $postCategory[1];
		}

		if(isset($_SESSION['search']['category'])){
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$search_param['condition'] = "articletype ='{$type}' AND categoryid = '{$_SESSION['search']['category']}' {$query_prov} {$query_kab}";
			$count = $this->models->search_table($search_param,'yes');
			$count_data = $count[0]['count(*)'];
		} else {
			$count_data = $this->loadCountData($table,$categoryid,$articletype);
		}

		//total item per page
		$paging= paging($count_data,'5');
		
		//Fungsi Search
		if(isset($_SESSION['search']['category']))
		{	
			$search_param['search_text'] = mysql_real_escape_string($_SESSION['search']['keywords']);
			$search_param['tablename'] = $table;
			$search_param['condition'] = "articletype ='{$type}' AND categoryid = '{$_SESSION['search']['category']}' {$query_prov} {$query_kab}";
			$search_param['batas'] = $paging['batas'];
			$search_param['item_per_page'] = $paging['item_per_page'];
			$result_data = $this->models->search_table($search_param);
		} else {
			if (!$paging){ 
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,3,0,3);
				
			}else{
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],3,0,3);
				// pr($result_data);
			}
		}
		
		//data for paging
		$data['paging']=$paging;
		$data['prov']=$postProvinsi[1];
		$data['kab']=$postKabupaten[1];
		$data['url']=$basedomain."dok_perencanaan/typewp3k/";
		
		//get data content
		$data['content'] = $result_data;
		// $data['files'] = $this->models->getDataFiles($type);
		
		//Data sent to view
		$data['item'] = $menuList;
		$data['lokasi'] = $this->contentHelper->getDataLokasi();
		// $data['title_menu'] = $listMenu;
		// $data['link_menu'] = $linkMenu;
		
		/* Deklarasi sidebar */
		$sidebar['judulopini'] = "Dokumen Perencanaan WP-3-K"; // judul sidebar
		$sidebar['title'] = "Dokumen Perencanaan WP-3-K"; 
		$sidebar['produk'] = $this->sidebar($table); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		//load view
		return $this->loadView('dok_perencanaan/type_wp3k',$data);
	}
	
	public function ajax()
	{
		
		$idLocation = explode("_",$_POST['idLocation']);
		
		
		if ($_POST['idLocation']){
			$data = $this->models->getChildLoc($idLocation[0]);
			echo json_encode($data);
		}
		exit;
	} 
	
}

?>
