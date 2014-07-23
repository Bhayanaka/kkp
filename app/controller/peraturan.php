<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class peraturan extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->models = $this->loadModel('m_peraturan');
	}
	
	public function index(){
        
		global $basedomain;
		$table="dtataruang_news_content_peraturan";
		
		$categoryid="1";
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		
		// menyimpang semuanya kedalam array $data
		$data['kategori']=$result_data_type_peraturan;
		
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		return $this->loadView('peraturan/index_peraturan',$data);

	}
	
    public function search_peraturan(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		
		$categoryid="1";
		$jml_data="5";
		
		$orderby=array('createdate','ASC');
		
		if(isset($_POST['search'])){
			
			$x=form_validation($_POST);
			// pr($x);
			$_SESSION['kategori_peraturan'] = $x['kategori'];
			$_SESSION['title_peraturan'] = $x['title'];
			$_SESSION['tahun_peraturan'] = $x['tahun'];
			
			$articletype=$_SESSION['kategori_peraturan'];
			$title=$_SESSION['title_peraturan'];
			$tahun=$_SESSION['tahun_peraturan'];
			
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title','title');
			$search['nilai_like']=array($title,$tahun);
			
			
		}else{
			
			$x = form_validation($_POST);	
		
			$_SESSION['kategori_peraturan'] = $_SESSION['kategori_peraturan'];
			$_SESSION['title_peraturan'] = $_SESSION['title_peraturan'];
			$_SESSION['tahun_peraturan'] = $_SESSION['tahun_peraturan'];
			
			$articletype=$_SESSION['kategori_peraturan'];
			$title=$_SESSION['title_peraturan'];
			$tahun=$_SESSION['tahun_peraturan'];
			
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title','title');
			$search['nilai_like']=array($title,$tahun);			
		
		}
		
		// exit;
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		
		$count_data = $this->loadCountData_search($table,$search);
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,$gallerytype,$search);
			
		}else{		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],$gallerytype,$search);
						
		}
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		
		$data['title']=$title;
		$data['tahun']=$tahun;
		
		$data['kategori']=$result_data_type_peraturan;
		$data['value_kategori']=$x['kategori'];
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/search_peraturan/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		
		return $this->loadView('peraturan/search_peraturan',$data);

	}
	// peraturan undang-undang
	public function undangundang(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="1";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/undangundang/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		

		return $this->loadView('peraturan/undang_undang',$data);

	}
	
	// peraturan pemerintah
	public function pemerintah(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="2";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
	
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/pemerintah/";
		
		return $this->loadView('peraturan/peraturan_pemerintah',$data);

	}
	
	// peraturan presiden
	public function presiden(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="3";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
	
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/presiden/";
		
		return $this->loadView('peraturan/peraturan_presiden',$data);

	}
	
	// keputusan presiden
	public function keppres(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="4";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/keppres/";
		
		return $this->loadView('peraturan/keputusan_presiden',$data);

	}
	
	// instruksi presiden
	public function inspres(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="5";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);		
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/inspres/";
		
		return $this->loadView('peraturan/instruksi_presiden',$data);

	}
	
	//peraturan menteri
	public function menteri(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="6";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/menteri/";
		
		return $this->loadView('peraturan/peraturan_menteri',$data);

	}
	
	//keputusan menteri
	public function kepment(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="7";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/kepment/";
		
		return $this->loadView('peraturan/keputusan_menteri',$data);

	}
	
	// peraturan / keputusan direktur jenderal
	public function perkep_dirjen(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="8";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/perkep_dirjen/";
		
		return $this->loadView('peraturan/perkep_dirjen',$data);

	}
	
	// standard nasional indonesia
	public function sni(){
        
		global $basedomain;
		
		$table="dtataruang_news_content_peraturan";
		$categoryid="1";
		$jml_data="5";
		$articletype="9";
		$orderby=array('createdate','ASC');
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);		
		
		$paging= paging($count_data,$jml_data);
		
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			
		}
		
		$result_data_type_peraturan = $this->models->getData_news_content_type_peraturan();
		/* Deklarasi sidebar */
		$sidebar['title'] = "Peraturan Terbaru"; // judul sidebar
		$sidebar['kategori_side']=$result_data_type_peraturan;
		$sidebar['peraturan'] = $this->sidebar($table,$categoryid,$articletype); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		$data['kategori']=$result_data_type_peraturan;
		$data['paging']=$paging;
		$data['jml_data']=$paging['item_per_page'];
		$data['data']=$result_data;
		$data['url']=$basedomain."peraturan/sni/";
		
		return $this->loadView('peraturan/sni',$data);

	}
}

?>
