<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class profil extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
        
		$var = 'masuk';
		// pr($var);
		// exit;
		return $this->loadView('profil');

	}
    
	// Profil Struktur Organisasi	
	public function struktur_organisasi(){
        
		global $basedomain;
		$orderby=array('createdate','ASC');
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		/*ref article type: 1 ->Profil, 2 ->Info, 1 ->Agenda*/
		$count_data = $this->loadCountData('dtataruang_news_content','2','1');
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'1');
		// pr($paging);
		// exit;
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','2','1',$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','2','1',$orderby,$paging['batas'],$paging['item_per_page']);
		}
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		/* Deklarasi sidebar */
		$table = "dtataruang_news_content";
		//berita = 4
		$categoryidAgenda = "9";
		//berita = 9
		$categoryidBerita = "4";
		$categoryidlink = "18";
		$articletype="1";
		$articletypelink="0";
		$sidebar['judullink'] = "Link Terkait Profil TRLP3K"; // judul sidebar
		$sidebar['judulagenda'] = "Agenda Tentatif"; // judul sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidBerita,$articletype,0,5); // kategori sidebar
		$sidebar['agenda'] = $this->sidebar($table,$categoryidAgenda,$articletype,0,5); // kategori sidebar
		
		$sidebar['link'] = $this->sidebar($table,$categoryidlink,$articletypelink,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		// menyimpang semuanya kedalam array $data
		// $data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."profil/struktur_organisasi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('profil/struktur_organisasi',$data);

	} 
	
	// Profil Sejarah	
	public function sejarah(){
        
		global $basedomain;
		$orderby=array('createdate','ASC');
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		/*ref article type: 1 ->Profil, 2 ->Info, 1 ->Agenda*/
		$count_data = $this->loadCountData('dtataruang_news_content','1','1');
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'1');
		// pr($paging);
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','1','1',$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','1','1',$orderby,$paging['batas'],$paging['item_per_page']);
		}
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		/* Deklarasi sidebar */
		$table = "dtataruang_news_content";
		//berita = 4
		$categoryidAgenda = "9";
		//berita = 9
		$categoryidBerita = "4";
		$categoryidlink = "18";
		$articletype="1";
		$articletypelink="0";
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidBerita,$articletype,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryidAgenda,$articletype,0,5); // kategori sidebar
		$sidebar['judullink'] = "Link Terkait Profil TRLP3K"; // judul sidebar
		$sidebar['judulagenda'] = "Agenda Tentatif"; // judul sidebar
		$sidebar['agenda'] = $this->sidebar($table,$categoryidAgenda,$articletype,0,5); // kategori sidebar
		$sidebar['link'] = $this->sidebar($table,$categoryidlink,$articletypelink,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		// menyimpang semuanya kedalam array $data
		// $data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."profil/sejarah/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('profil/sejarah',$data);

	} 	
	
	// Profil Tugas Pokok dan Fungsi	
	public function tupoksi(){
        
		$orderby=array('createdate','ASC');
		global $basedomain;
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		/*ref article type: 1 ->Profil, 2 ->Info, 1 ->Agenda*/
		$count_data = $this->loadCountData('dtataruang_news_content','3','1');
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'1');
		// pr($paging);
		if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','3','1',$orderby);
			
		}else{
			$result_data = $this->contentHelper->getData_news_content('dtataruang_news_content','3','1',$orderby,$paging['batas'],$paging['item_per_page']);
		}
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		/* Deklarasi sidebar */
		$table = "dtataruang_news_content";
		//berita = 4
		$categoryidAgenda = "9";
		//berita = 9
		$categoryidBerita = "4";
		$categoryidlink = "18";
		$articletype="1";
		$articletypelink="0";
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidBerita,$articletype,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryidAgenda,$articletype,0,5); // kategori sidebar
		$sidebar['judullink'] = "Link Terkait Profil TRLP3K"; // judul sidebar
		$sidebar['judulagenda'] = "Agenda Tentatif"; // judul sidebar
		$sidebar['agenda'] = $this->sidebar($table,$categoryidAgenda,$articletype,0,5); // kategori sidebar
		$sidebar['link'] = $this->sidebar($table,$categoryidlink,$articletypelink,0,5); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		// menyimpang semuanya kedalam array $data
		// $data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."profil/tupoksi/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('profil/tupoksi',$data);
	} 	
}

?>
