<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class norma_std_psdr_kriteria_c extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		global $basedomain, $CONFIG;
		$this->loadmodule();		
	}
	public function loadmodule()
	{		
		$this->models = $this->loadModel('norma_std_psdr_kriteria_m');
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index()
	{	  
		$this->pedoman_umum();
	}
	
	public function pedoman_umum()
	{	  
		global $basedomain;
	
		$table = "dtataruang_news_content_norma";
		
		$categoryid = "20";
		$articletype = '1';
		$gallerytype ='4';
		$orderby = array('createdate','ASC');
		
		if(isset($_POST['search'])){
			
			$x=form_validation($_POST);
			
			$_SESSION['title_peraturan'] = $x['cari'];			
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title');
			$search['nilai_like']=array($title);
	
		}else{
			
			$x = form_validation($_POST);	
		
			$_SESSION['title_peraturan'] = '';
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			
			$search['param_equal'] = array('categoryid','articletype');
			$search['nilai_equal'] = array($categoryid,$articletype);
			
			$search['param_like'] = array('title');
			$search['nilai_like'] = array($title);					
		}
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data		
		$count_data = $this->loadCountData_search($table,$search);
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'5');
		
		if (!$paging){ 		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,$gallerytype,$search);
			
		}else{		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],$gallerytype,$search);
			// pr($result_data);		
		}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Produk"; // judul sidebar
		$sidebar['produk'] = "";// kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
	
		$data['paging']=$paging;
		$data['news']=$result_data;
		$data['url']=$basedomain."norma_std_psdr_kriteria_c/pedoman_umum/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		

		return $this->loadView('norma_std_psdr_kriteria/index_pedoman_umum',$data);

	}
	
	public function pedoman_teknis()
	{	  
		global $basedomain;
	
		$table = "dtataruang_news_content_norma";
		
		$categoryid = "20";
		$articletype = 2;
		$gallerytype ='4';
		$orderby = array('createdate','ASC');
		
		if(isset($_POST['search'])){
			
			$x=form_validation($_POST);
			
			$_SESSION['title_peraturan'] = $x['cari'];			
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title');
			$search['nilai_like']=array($title);
	
		}else{
			
			$x = form_validation($_POST);	
		
			$_SESSION['title_peraturan'] = '';
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			$search['param_equal'] = array('categoryid','articletype');
			$search['nilai_equal'] = array($categoryid,$articletype);
			
			$search['param_like'] = array('title');
			$search['nilai_like'] = array($title);					
		}
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data		
		$count_data = $this->loadCountData_search($table,$search);
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'5');
		
		if (!$paging){ 		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,$gallerytype,$search);
			
		}else{		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],$gallerytype,$search);
			// pr($result_data);		
		}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Produk"; // judul sidebar
		$sidebar['produk'] = "";// kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
	
		$data['paging']=$paging;
		$data['news']=$result_data;
		$data['url']=$basedomain."norma_std_psdr_kriteria_c/pedoman_teknis/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		

		return $this->loadView('norma_std_psdr_kriteria/index_pedoman_teknis',$data);

	}
	
	public function modul_pelatihan()
	{	  
		global $basedomain;
	
		$table = "dtataruang_news_content_norma";
		
		$categoryid = "20";
		$articletype = '3';
		$gallerytype ='4';
		$orderby = array('createdate','ASC');
		
		if(isset($_POST['search'])){
			
			$x=form_validation($_POST);
			
			$_SESSION['title_peraturan'] = $x['cari'];			
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title');
			$search['nilai_like']=array($title);
	
		}else{
			
			$x = form_validation($_POST);	
		
			$_SESSION['title_peraturan'] = '';
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			$search['param_equal'] = array('categoryid','articletype');
			$search['nilai_equal'] = array($categoryid,$articletype);
			
			$search['param_like'] = array('title');
			$search['nilai_like'] = array($title);					
		}
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data		
		$count_data = $this->loadCountData_search($table,$search);
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'10');
		
		if (!$paging){ 		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,$gallerytype,$search);
			
		}else{		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],$gallerytype,$search);
			// pr($result_data);		
		}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Produk"; // judul sidebar
		$sidebar['produk'] = "";// kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
	
		$data['paging']=$paging;
		$data['news']=$result_data;
		$data['url']=$basedomain."norma_std_psdr_kriteria_c/modul_pelatihan/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		

		return $this->loadView('norma_std_psdr_kriteria/index_modul_pelatihan',$data);

	}
	
	public function prosedur_kriteria()
	{	  
		global $basedomain;
	
		$table = "dtataruang_news_content_norma";
		
		$categoryid = "20";
		$articletype = '4';
		$gallerytype ='4';
		$orderby = array('createdate','ASC');
		
		if(isset($_POST['search'])){
			
			$x=form_validation($_POST);
			
			$_SESSION['title_peraturan'] = $x['cari'];			
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			
			$search['param_equal']=array('categoryid','articletype');
			$search['nilai_equal']=array($categoryid,$articletype);
			
			$search['param_like']=array('title');
			$search['nilai_like']=array($title);
	
		}else{
			
			$x = form_validation($_POST);	
		
			$_SESSION['title_peraturan'] = '';
			$title = $_SESSION['title_peraturan'];
			$data['hsl_cri'] = $title;
			
			$search['param_equal'] = array('categoryid','articletype');
			$search['nilai_equal'] = array($categoryid,$articletype);
			
			$search['param_like'] = array('title');
			$search['nilai_like'] = array($title);					
		}
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data		
		$count_data = $this->loadCountData_search($table,$search);
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'10');
		
		if (!$paging){ 		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,0,5,$gallerytype,$search);
			
		}else{		
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page'],$gallerytype,$search);
			// pr($result_data);		
		}
		
		/* Deklarasi sidebar */
		$sidebar['title'] = "Produk"; // judul sidebar
		$sidebar['produk'] = "";// kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
	
		$data['paging']=$paging;
		$data['news']=$result_data;
		$data['url']=$basedomain."norma_std_psdr_kriteria_c/prosedur_kriteria/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		

		return $this->loadView('norma_std_psdr_kriteria/index_prosedur_kriteria',$data);

	}
	
	
}

?>
