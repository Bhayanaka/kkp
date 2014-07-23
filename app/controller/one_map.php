<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class one_map extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_one_map');
	}
	
	
	public function index(){
        
		return $this->loadView('one_map');


	}
	//ok
	public function sejarah(){
        
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="1";
		$articletype="1";
		//$orderby=array('createdate','ASC');
		
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		$data['data']=$result_data;
		//pr($data);
		return $this->loadView('one_map/sejarah',$data);

	}
	

	
	public function visi_misi(){
        
		global $basedomain;
		
		
		$table="dtataruang_news_content";
		$categoryid="10";
		$articletype="4";
		//$orderby=array('createdate','ASC');
		
			/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		// pr($result_data);
		$data['data']=$result_data;
		// pr($data);
		// exit;
		return $this->loadView('one_map/visimisi',$data);

	}
	
	public function organisasi(){
        
		global $basedomain;
		
		
		$table="dtataruang_news_content";
		$categoryid="2";
		$articletype="1";
		//$orderby=array('createdate','ASC');
		
			/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		$data['data']=$result_data;
		//pr($data);
		return $this->loadView('one_map/organisasi',$data);

	}
	
	public function rencana_aksi(){
        
		global $basedomain;
		
		
		$table="dtataruang_news_content";
		$categoryid="11";
		$articletype="4";
		//$orderby=array('createdate','ASC');
		
			/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		$data['data']=$result_data;
		//pr($data);
		return $this->loadView('one_map/rencana_aksi',$data);

	}
	
	
	public function database_tematik(){
		
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="14";
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['kategori']= $list_category;
		$data['url']=$basedomain."one_map/database_tematik/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView('one_map/database_tematik',$data);

	}
	
	public function target_capaian(){
        
		global $basedomain;
		
		
		$table="dtataruang_news_content";
		$categoryid="12";
		$articletype="4";
		//$orderby=array('createdate','ASC');
		
			/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		$data['data']=$result_data;
		//pr($data);
		return $this->loadView('one_map/target_capaian',$data);

	}
	
	public function dokumentasi(){
        
		global $basedomain;
		
		
		$table="dtataruang_news_content";
		$categoryid="13";
		$articletype="4";
		//$orderby=array('createdate','ASC');
		
			/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$result_data = $this->models->getData_news($table,$categoryid,$articletype);
		$data['data']=$result_data;
		//pr($data);
		return $this->loadView('one_map/dokumentasi',$data);

	}

	public function indeksPeta(){
        
		//with paging
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="15";
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['kategori']= $list_category;
		$data['url']=$basedomain."one_map/indeksPeta/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView('one_map/indekpeta',$data);

	}
	public function databasespasial(){
        
		//with paging
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="16";
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
				
			}else{
				$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
				
			}
		// pr($result_data);
		/* Deklarasi sidebar */
		$sidebar['title'] = "Aplikasi"; // judul sidebar
		$sidebar['aplikasi'] = ""; // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['kategori']= $list_category;
		$data['url']=$basedomain."one_map/databasespasial/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		return $this->loadView('one_map/dbspasial',$data);

	}

}

?>

