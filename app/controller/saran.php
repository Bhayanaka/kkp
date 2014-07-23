<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class saran extends Controller {
	
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
   
		
		if (isset($_POST)){
			
			$cleanData = form_validation($_POST);
			$saveData = $this->contentHelper->insertSaran($cleanData);
		}
		
		$table="dtataruang_news_content";
		$categoryid="8";
		$articletype="1";
		$orderby=array('createdate','ASC');
		
		// memanggil function loadCountData berdasarkan nilai dari table, catgoryid, article dan disimpan kedalam $count_data
		
		// $count_data = $this->loadCountData($table,$categoryid,$articletype);
		
		
		//memanggil function paging berdasarkan jumlah data($count_data) dan banyaknya baris yang akan ditampilkan '1'
		// $paging= paging($count_data,'3');
		
		// if (!$paging){ 
			$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
		// }else{
			// $result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby,$paging['batas'],$paging['item_per_page']);
		// }
		// mengambil data berdasarkan tabel,categoryid,article dan Limitnya
		
		// menyimpang semuanya kedalam array $data
		// $data['paging']=$paging;
		$data['data']=$result_data;
		// $data['url']="kontak";//disesuaikan dengan link yang menampilkan data atau nama class dan fungsi
	
		/* Deklarasi sidebar */
		$sidebar['judulberita'] = "Berita Terkini"; // judul sidebar
		$sidebar['judulagenda'] = "Agenda"; // judul sidebar
		$sidebar['berita'] = $this->sidebar($table,4,1,0,1); // kategori sidebar
		$sidebar['agenda'] = $this->sidebar($table,4,1,0,4); // kategori sidebar
		
		$data['sidebar'] = $this->loadView('sidebar',$sidebar);
		/* End Deklarasi sidebar */
		
		
		return $this->loadView('kontak',$data);
		

	}
        
	
}

?>