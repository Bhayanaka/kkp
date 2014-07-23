<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class berita extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
	}
	public function loadmodule()
	{
		
		$this->informasi = $this->loadModel('m_berita');
		$this->m_paging = $this->loadModel('userHelper');
	}
	
	public function index(){
        
		
		return $this->loadView('profil');

	}
	
	public function info_berita(){
        
		//deklarasi variabel
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="4";
		$articletype="1";
		$orderby=array('postdate','DESC'); 
		$categoryidopini = "5";
		$categoryidfoto="6";
		$typeid = "2";
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		// echo $count_data;
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'5');
	
		if (!$paging){ 
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['changeDate'] = changeDate($val['postdate']);
				}
			}
		}else{
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['changeDate'] = changeDate($val['postdate']);
				}
			}
		}
		// pr($result_data);	
			/* Deklarasi sidebar */
			$sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
			$sidebar['berita'] = $this->sidebar($table,$categoryid,$articletype,0,5); // kategori sidebar
			// $sidebar['judulopini'] = "Opini"; // judul sidebar
			// $sidebar['foto'] = "Foto Kegiatan"; 
			// $sidebar['opini'] = $this->sidebar($table,$categoryidopini,$articletype,0,5); // kategori sidebar
			// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,3); // kategori sidebar
			$data['sidebar'] = $this->loadView('sidebar',$sidebar);
			/* End Deklarasi sidebar */
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."berita/info_berita/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('informasi_terkini/info_berita',$data);

	}
	

	
	public function info_berita_detail(){
	
        //deklarasi variabel
		global $basedomain;
		
		$table="dtataruang_news_content";
		$categoryid="4";
		$articletype="1";
		$orderby=array('postdate','DESC');
		$categoryidopini = "5";
		$categoryidfoto="6";
		$typeid = "2";
		
		$id = intval($_GET['id']);

		/* Deklarasi sidebar */
		$sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		$sidebar['berita'] = $this->sidebar($table,$categoryid,$articletype,0,5); // kategori sidebar
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulberita'] = "Berita"; // judul sidebar
		// $sidebar['foto'] = "Foto Kegiatan"; //judul sidebar
		// $sidebar['opini'] = $this->sidebar($table,$categoryidopini, $articletype,0,5); // kategori sidebar
		// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,3); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryid, $articletype,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$result_data = $this->informasi->getData_news('dtataruang_news_content','4','1',$id);
		
		$data['detail']=$result_data[0];
		$data['berita_lain'] = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
		//pr($data);s
		//exit;
		return $this->loadView('informasi_terkini/info_berita_detail',$data);

	}
	
	
	
	public function info_opini(){
        
		global $basedomain;
		
		$table="dtataruang_news_content";
		$categoryid="5";
		$articletype="1";
		$orderby=array('postdate','DESC');
		$categoryidberita = "4";
		$categoryidfoto="6";
		
		$typeid = "2";
		
		
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		/* Deklarasi sidebar */
		// $sidebar['judulberita'] = "Berita"; // judul sidebar
		// $sidebar['foto'] = "Foto Kegiatan"; 
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita, $articletype,0,5); // kategori sidebar
		// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,5); // kategori sidebar
		$sidebar['judulopini'] = "Opini Terkini"; // judul sidebar
		$sidebar['opini'] = $this->sidebar($table,$categoryid, $articletype,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
				
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['postdate'] = changeDate($val['postdate']);
				}
			}
		}else{
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['postdate'] = changeDate($val['postdate']);
				}
			}
			
		}
		
		
		
		// menyimpang semuanya kedalam array $data
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."berita/info_opini/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
// pr($data);
		return $this->loadView('informasi_terkini/info_opini',$data);

	}
	
	
	
	public function info_opini_detail(){
        
		global $basedomain;
		$table="dtataruang_news_content";
		$categoryid="5";
		$articletype="1";
		$orderby=array('postdate','DESC');
		$categoryidberita = "4";
		$categoryidfoto="6";
		$typeid = "2";
		
			
		$id = intval($_GET['id']);
		/* Deklarasi sidebar */
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulberita'] = "Berita"; // judul sidebar
		// $sidebar['foto'] = "Foto Kegiatan"; 
		// $sidebar['opini'] = $this->sidebar($table,$categoryid, $articletype,0,5); // kategori sidebar
		// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,3); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita, $articletype,0,5); // kategori sidebar
		$sidebar['judulopini'] = "Opini Terkini"; // judul sidebar
		$sidebar['opini'] = $this->sidebar($table,$categoryid, $articletype,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$result_data = $this->informasi->getData_news('dtataruang_news_content','5','1',$id);
		
		$data['opini_detail']=$result_data[0];
		$data['opini_lain'] = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
		$data['opini_comment'] = $this->m_paging->get_all_comment(0,5);
		$data['opini_comment_total'] = $this->m_paging->count_comment();
		//pr($data);
		//exit;
		return $this->loadView('informasi_terkini/info_opini_detail',$data);

	}
	
	public function info_agenda(){
        
		global $basedomain;
		
		$table="dtataruang_news_content";
		$categoryid="9";
		$articletype="1";
		$orderby=array('postdate','DESC');
		$categoryidfoto="6";
		$categoryidopini="5";
		$categoryidberita="4";
		$typeid = "2";
		$count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		//$id = intval($_GET['id']);
		
		/* Deklarasi sidebar */
		$sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		$sidebar['judulopini'] = "Opini Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan"; 
		$sidebar['berita'] = $this->sidebar($table,$categoryidberita, $articletype,0,5); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,9); // kategori sidebar
		$sidebar['opini'] = $this->sidebar($table,$categoryidopini, $articletype,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'5');
		
		if (!$paging){ 
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['postdate'] = changeDate($val['postdate']);
				}
			}
			
		}else{
			$result_data = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
			if ($result_data){
				foreach ($result_data as $key => $val){
					$result_data[$key]['postdate'] = changeDate($val['postdate']);
				}
			}
		}
		
		
		// menyimpang semuanya kedalam array $data
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."berita/info_agenda/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
// pr($data);
		return $this->loadView('informasi_terkini/info_agenda',$data);

	}
	
	
	
	public function info_agenda_detail(){
        
		global $basedomain;
		
		$table="dtataruang_news_content";
		$categoryid="9";
		$articletype="1";
		$orderby=array('postdate','DESC');
		$categoryidfoto="6";
		$categoryidopini="5";
		$categoryidberita="4";
		$typeid = "2";
		$id = intval($_GET['id']);
		/* Deklarasi sidebar */
		$sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		$sidebar['judulopini'] = "Opini Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan"; 
		$sidebar['berita'] = $this->sidebar($table,$categoryidberita, $articletype,0,5); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,9); // kategori sidebar
		$sidebar['opini'] = $this->sidebar($table,$categoryidopini, $articletype,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */		
		
		
		$result_data = $this->informasi->getData_news('dtataruang_news_content','9','1',$id);
		
		$data['agenda_detail']=$result_data[0];
		$data['agenda_lain'] = $this->informasi->getData_news_content($table,$categoryid,$articletype,$orderby);
		
		return $this->loadView('informasi_terkini/info_agenda_detail',$data);

	}

	public function paging_opini_count(){
		$paging_count = $this->m_paging->count_comment();
		echo $paging_count['total'];
		exit;
	}
	
	public function paging_opini_data(){
		$start = $_GET['start'];
		$end = $_GET['end']; 
		$data['all_opini'] = $this->m_paging->get_all_comment($start,$end);
		echo json_encode($data['all_opini']);
		exit;
	}
	

}

?>

