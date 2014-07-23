<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class informasi_terkini extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
	}
	public function loadmodule()
	{
		
		$this->m_gallery = $this->loadModel('m_gallery');
	}
	
	public function index(){
        
		
		return $this->loadView('profil');

	}

	public function informasi_gallery(){
        
		global $basedomain;
		$categoryid = 6;
		
		//video
		$categoryidvid =7;
		$typeid = 2;
		
		//foto
		$categoryidfoto =6;
		$typeidfoto = 2;
		
		//berita
		$categoryidberita =4;
		$typeidberita = 1;
		
		//opini
		$categoryiopini =5;
		$typeidopini = 1;
		
		//agenda
		$categoryagenda =9;
		$typeidagenda = 1;
		
		$table='dtataruang_news_content';
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		$count_data = $this->loadCountData('dtataruang_news_content',$categoryid,$typeid);
		//pr($count_data);
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'10');
		if(!$paging){
			$result_data = $this->m_gallery->getData_gallery('dtataruang_news_content','6','2',0,5);
		} else {
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		$result_data = $this->m_gallery->getData_gallery('dtataruang_news_content','6','2',$paging['batas'],$paging['item_per_page']);
		//pr($paging);
		// menyimpang semuanya kedalam array $data
		}
		
		/* Deklarasi sidebar */
		//$sidebar['foto'] = "Foto Kegiatan Terbaru"; // judul sidebar
		$sidebar['titlevideo'] = "video Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan "; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terbaru"; // judul sidebar
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		//$sidebar['album'] = $this->sidebar($table,$categoryid,$typeid,0,6); // kategori sidebar
		$sidebar['video'] = $this->sidebar($table,$categoryidvid,$typeid,0,1); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeidfoto,0,9); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita,$typeidberita,0,5); // kategori sidebar
		// $sidebar['opini'] = $this->sidebar($table,$categoryiopini,$typeidopini,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryagenda,$typeidagenda,0,5); // kategori sidebar
		// pr($sidebar);
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		//pr($data);exit;
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."informasi_terkini/informasi_gallery/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		return $this->loadView('informasi_terkini/informasi_gallery',$data);

	}
	public function informasi_gallery_detail(){
		global $basedomain;
		$id =$_GET['id'];
		// $x = $id;
		$categoryid = 6;
		
		//video
		$categoryidvid =7;
		$typeid = 2;
		
		//foto
		$categoryidfoto =6;
		$typeidfoto = 2;
		
		//berita
		$categoryidberita =4;
		$typeidberita = 1;
		
		//opini
		$categoryiopini =5;
		$typeidopini = 1;
		
		//agenda
		$categoryagenda =9;
		$typeidagenda = 1;
		
		$table='dtataruang_news_content';
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		
		$count_data = $this->loadCountData('dtataruang_news_content_repo','','','otherid='."'".$id."'");
		// exit;
		// echo $count_data;
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		
		$paging= paging($count_data,'10');
		
		if(!$paging){
			$result_data = $this->m_gallery->getData_gallery_detail($id,'dtataruang_news_content','','',0,5);
		} else {
		
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		$result_data = $this->m_gallery->getData_gallery_detail($id,'dtataruang_news_content','','',$paging['batas'],$paging['item_per_page'],'otherid=$id');
		}
		// pr($result_data);
		// menyimpang semuanya kedalam array $data
	
		/* Deklarasi sidebar */
		//$sidebar['foto'] = "Foto Kegiatan Terbaru"; // judul sidebar
		$sidebar['titlevideo'] = "video Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan "; // judul sidebar
		// $sidebar['titlevideo'] = "video Kegiatan Terbaru"; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terbaru"; // judul sidebar
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		//$sidebar['album'] = $this->sidebar($table,$categoryid,$typeid,0,6); // kategori sidebar
		// $sidebar['video'] = $this->sidebar($table,$categoryidvid,$typeid,0,1); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita,$typeidberita,0,5); // kategori sidebar
		// $sidebar['opini'] = $this->sidebar($table,$categoryiopini,$typeidopini,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryagenda,$typeidagenda,0,5); // kategori sidebar
		$sidebar['video'] = $this->sidebar($table,$categoryidvid,$typeid,0,1); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeidfoto,0,9); // kategori sidebar
		// pr($sidebar);
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."informasi_terkini/informasi_gallery_detail/?id=".$id;//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
		
		
		return $this->loadView('informasi_terkini/informasi_gallery_detail',$data);

	}

	
    
	public function informasi_video(){
        
		global $basedomain;
		
		// $categoryid = 6;
		// $typeid = 2;
		
		//video
		$categoryidvid =7;
		$typeid = 2;
		
		//foto
		$categoryidfoto =6;
		$typeid = 2;
		
		//berita
		$categoryidberita =4;
		$typeidberita = 1;
		
		//opini
		$categoryiopini =5;
		$typeidopini = 1;
		
		//agenda
		$categoryagenda =9;
		$typeidagenda = 1;
		
		$table='dtataruang_news_content';
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		$count_data = $this->loadCountData('dtataruang_news_content','7','2');
		//pr($count_data);
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'10');
		if(!$paging){
			$result_data = $this->m_gallery->getData_video('dtataruang_news_content','7','2',0,5);
		} else {
		//pr($paging);
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		$result_data = $this->m_gallery->getData_video('dtataruang_news_content','7','2',$paging['batas'],$paging['item_per_page']);
		}
	
		/* Deklarasi sidebar */
		// $sidebar['foto'] = "Foto Kegiatan Terbaru"; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terbaru"; // judul sidebar
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,3); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita,$typeidberita,0,5); // kategori sidebar
		// $sidebar['opini'] = $this->sidebar($table,$categoryiopini,$typeidopini,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryagenda,$typeidagenda,0,5); // kategori sidebar
		// pr($sidebar);
		$sidebar['titlevideo'] = "video Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan "; // judul sidebar
		$sidebar['video'] = $this->sidebar($table,$categoryidvid,$typeid,0,1); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeidfoto,0,9); // kategori sidebar
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		// menyimpang semuanya kedalam array $data
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."informasi_terkini/informasi_video/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('informasi_terkini/informasi_video',$data);

	}
	public function informasi_video_detail(){
        
		global $basedomain;
			
		$id=$_GET['id'];
		
		//video
		$categoryidvid =7;
		$typeid = 2;
		
		//foto
		$categoryidfoto =6;
		$typeid = 2;
		
		//berita
		$categoryidberita =4;
		$typeidberita = 1;
		
		//opini
		$categoryiopini =5;
		$typeidopini = 1;
		
		//agenda
		$categoryagenda =9;
		$typeidagenda = 1;
		
		$table='dtataruang_news_content';
		//pr($id);
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		$count_data = $this->loadCountData('dtataruang_news_content','7','2');
	
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		$paging= paging($count_data,'2');
		if(!$paging){
			$result_data = $this->m_gallery->getData_video('dtataruang_news_content','7','2',0,5);
		} else {
		//pr($paging);
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
			$result_data = $this->m_gallery->getData_video('dtataruang_news_content','7','2',$paging['batas'],$paging['item_per_page']);
		}
		// pr($result_data);
		/* Deklarasi sidebar */
		// $sidebar['foto'] = "Foto Kegiatan Terbaru"; // judul sidebar
		// $sidebar['judulberita'] = "Berita Terbaru"; // judul sidebar
		// $sidebar['judulopini'] = "Opini"; // judul sidebar
		// $sidebar['judulagenda'] = "Agenda"; // judul sidebar
		// $sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeid,0,3); // kategori sidebar
		// $sidebar['berita'] = $this->sidebar($table,$categoryidberita,$typeidberita,0,5); // kategori sidebar
		// $sidebar['opini'] = $this->sidebar($table,$categoryiopini,$typeidopini,0,5); // kategori sidebar
		// $sidebar['agenda'] = $this->sidebar($table,$categoryagenda,$typeidagenda,0,5); // kategori sidebar
		$sidebar['titlevideo'] = "video Terkini"; // judul sidebar
		$sidebar['foto'] = "Foto Kegiatan "; // judul sidebar
		$sidebar['video'] = $this->sidebar($table,$categoryidvid,$typeid,0,1); // kategori sidebar
		$sidebar['album'] = $this->sidebar($table,$categoryidfoto,$typeidfoto,0,9); // kategori sidebar
		// pr($sidebar);
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		// menyimpang semuanya kedalam array $data
		$data['paging']=$paging;
		$data['data']=$result_data;
		$data['url']=$basedomain."informasi_terkini/informasi_video_detail/";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi

		return $this->loadView('informasi_terkini/informasi_video_detail',$data);

	}
}

?>

