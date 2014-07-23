<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class produk extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		global $basedomain, $CONFIG;
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('produk_m');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('produk/produk-produk-std-list');

	}
	
	function show(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('home');

	}
	
	public function perencanaan()
	{
		// $request = array('tabel' => 'dtataruang_news_content_product');		
		// $data['get_data'] = $this->models->getPerencanaan($request);	
		// $data['prov'] = $this->models->getProv();	
		// $data['kab'] = $this->models->getKab();	
		// $data['kat'] = $this->models->getKat();	
		// $data['user'] = $this->models->getUser();	
		
		$data['category'] = $this->models->getCategory();	
		$data['type'] = $this->models->getType();	
		
		return $this->loadView('produk/produk-produk-std-list',$data);

	}
	
	function addPerencanaan()
	{
		$id = $_GET['edit'];
		$kode = $_GET['kode'];
		if($id != ''){
			$request = array('tabel' => 'tbl_wilayah','tabel2' => 'dtataruang_news_content_category_product');
			$data['get_prov'] = $this->models->getProvinsi($request);
			$data['get_kab'] = $this->models->getKabupaten($kode);	
			$data['get_tipe'] = $this->models->getTipe($request);				
			$data['editPerencanaan']  = $this->models->getPerencanaanEdit($id);
			
			$table_select_join="dtataruang_news_content_repo";
			$gallerytype = "3";
			
			$thumbnail_upload_doc="Naskah Akademis";
			$thumbnail_peta_pola="Peta Pola Ruang";
			$thumbnail_struktur_ruang="Peta Struktur Ruang";
			$thumbnail_dok_final="Dokumen Final";
			$otherid = $id;
			
			$data['dok'] = $this->models->viewData_product_upload_doc($table_select_join,$otherid,$gallerytype,$thumbnail_upload_doc);
			$data['ppr'] = $this->models->viewData_product_peta_pola($table_select_join,$otherid,$gallerytype,$thumbnail_peta_pola);
			$data['sr'] = $this->models->viewData_product_struktur_ruang($table_select_join,$otherid,$gallerytype,$thumbnail_struktur_ruang);
			$data['df'] = $this->models->viewData_product_dok_final($table_select_join,$otherid,$gallerytype,$thumbnail_dok_final);
			
		}else{
			$request = array('tabel' => 'tbl_wilayah','tabel2' => 'dtataruang_news_content_category_product');
			$data['get_prov'] = $this->models->getProvinsi($request);	
			$data['get_tipe'] = $this->models->getTipe($request);	
		}
		
		return $this->loadView('produk/produk-produk-std-input',$data);
	}
	
	function insertPerencanaan()
	{
		global $basedomain; 

		
		if(isset($_POST)){
		   $x = form_validation($_POST);
		   try{
				if(isset($x) && count($x) != 0)
				    {					
						
							if($_FILES['cover']['name'] != ''){
								if($_FILES['cover']['name'] != ""){
									deleteFile($x['cover_hidden'],'product');
									
								}
								$files = uploadFile('cover','product'); 
								$data["cover"]="product/".$files['filename']; 
							}else{
								$data["cover"]=$_POST['cover_hidden'];
							}
							if($_FILES['upload_file']['name'] != ''){
								if($_FILES['upload_file']['name'] != ""){
										deleteFile($x['file_hidden'],'product');
								}
								$OriFilename1 = $_FILES['upload_file']['name'];
								$files2 = uploadFile('upload_file','product'); 
								$data["upload_file"]="product/".$files2['filename']; 
							}else{
								$data["upload_file"]=$_POST['file_hidden'];
								$OriFilename1 = $_POST['file_tags_hidden'];
							}
							if($_FILES['df']['name'] != ''){
								if($_FILES['df']['name'] != ""){
									deleteFile($x['df_hidden'],'product');
								}
								$OriFilename2 = $_FILES['df']['name'];
								$files3 = uploadFile('df','product'); 
								$data["df"]="product/".$files3['filename']; 
							}else{
								$data["df"]=$_POST['df_hidden'];
								$OriFilename2 = $_POST['df_tags_hidden'];
							}
							if($_FILES['sr']['name'] != ''){
								if($_FILES['sr']['name'] != ""){
									deleteFile($x['sr_hidden'],'product');
								}
								$files4 = uploadFile('sr','product'); 
								$data["sr"]="product/".$files4['filename'];
							}else{
								$data["sr"]=$_POST['sr_hidden'];
							}
							
							if($_FILES['ppr']['name'] != ''){
								if($_FILES['ppr']['name'] != ""){
									deleteFile($x['ppr_hidden'],'product');
								}
								$files5 = uploadFile('ppr','product'); 
								$data["ppr"]="product/".$files5['filename']; 
							}else{
								$data["ppr"]=$_POST['ppr_hidden'];
							}
						// exit;
					$inputProd= $this->models->perencanaan_inp($x['hidden_id'],		//id
																	$x['judul'], 		//$title,																						
																	$x['editor'],		//$content,
																	$x['provinsi'],		//$id_provinsi,
																	$x['kabupaten'],	//$id_kabupaten,
																	$x['kecamatan'],	//$kecamatan,
																	$x['thn_buat'],		//$tahun,
																	$x['jml_hal'],		//$jml_hal,
																	$x['lampiran'],		//$lampiran,		CHANGE  $x['instansi'],																					
																	$x['kategori'],		//$categoryid, 
																	$x['artikel'],		//$atricletype,		ADD
																	$x['createdate'],			//$createdate,					
																	$x['tgl_upload'],	//$postdate,					
																	$x['fromwho'],		//$fromwho,			CHECK
																	$x['authorid'],		//$authorid,		CHECK	
																	$x['deskripsi'],		
																	$x['keyword'],		
																	$data['cover'],
																	$data['upload_file'],
																	$data["df"],
																	$data["sr"],
																	$data["ppr"],
																	$x['id_repo_0'],
																	$x['id_repo_1'],
																	$x['id_repo_2'],
																	$x['id_repo_3'],$OriFilename1,$OriFilename2
																  );	
																  
					if($inputProd['param'] == 'I'){
							$this->activityHelper->log('INSERT PRODUK',$inputProd['id']);	
						}else{
							$this->activityHelper->log('UPDATE PRODUK',$inputProd['id']);	
						}	
					}
			} catch(Exception $e){}		
		}
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."produk/perencanaan'</script>";	
																	
	}
	
	
	function updateStatusPerencanaan(){
		global $basedomain;
    	if(isset($_GET)){
               $x = form_validation($_GET);
               $data= $this->models->updateStatusPerencanaan_m($x['delete']);
			   $this->activityHelper->log('DELETE PRODUK',$data);	
            }
      echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."produk/perencanaan'</script>";		
	} 
	
	public function change_status()
    {
		global $basedomain;
		$param_1 = $_GET['id']; 
		$param_2 = $_GET['status'];  

		if($param_1 != "" && $param_2 != "")
		{
			if($param_2 == 0)
			{
				$data['query'] = $this->models->publish_update_m($param_1);
				redirect($basedomain.'produk/perencanaan');
			}
			else
			{
				$data['query'] = $this->models->unpublish_update_m($param_1);
				redirect($basedomain.'produk/perencanaan');
			}
		}	
		
    }   
	
	function kabupaten()
	{
		$id = _p('id');
		$tmp    = '';
		$data   = $this->models->getKabupaten($id);	
		if(!empty($data)){
			$tmp .= "<option value=''>- Pilih Kabupaten / Kota-</option>"; 
			foreach($data as $row) {
				$tmp .= "<option value='".$row['kode_wilayah']."'>".$row['nama_wilayah']."</option>";
			}
		} else {
			$tmp .= "<option value=''>- Pilih Kabupaten / Kota-</option>"; 
		}
		die($tmp);
	}
	
	//NORMA
	public function norma(){
       
		$request = array('tabel' => 'dtataruang_news_content_norma');		
		// $data['get_data'] = $this->models->getNorma($request);
		$data['kat'] = $this->models->getKatNorma();	
		// $data['user'] = $this->models->getUser();	
		// pr($data);
		return $this->loadView('produk/produk-norma-std-list',$data);

	}
	
	function addNorma()
	{
		$id = $_GET['edit'];
		if($id != ''){
			$request = array('tabel' => 'tbl_wilayah');					
			$data['editNorma']  = $this->models->getNormaEdit($id);
			
			$table_select_join="dtataruang_news_content_repo";
			$gallerytype = "4";
			$thumbnail_upload_doc="Naskah Akademis";
			$thumbnail_peta_pola="Peta Pola Ruang";
			$thumbnail_struktur_ruang="Peta Struktur Ruang";
			$thumbnail_dok_final="Dokumen Final";
			$otherid = $id;
			$data['dok'] = $this->models->viewData_product_upload_doc($table_select_join,$otherid,$gallerytype,$thumbnail_upload_doc);
			$data['ppr'] = $this->models->viewData_product_peta_pola($table_select_join,$otherid,$gallerytype,$thumbnail_peta_pola);
			$data['sr'] = $this->models->viewData_product_struktur_ruang($table_select_join,$otherid,$gallerytype,$thumbnail_struktur_ruang);
			$data['df'] = $this->models->viewData_product_dok_final($table_select_join,$otherid,$gallerytype,$thumbnail_dok_final);
			return $this->loadView('produk/produk-norma-std-input',$data);
		}else{
			return $this->loadView('produk/produk-norma-std-input',$data);
		}
		
		
	}
	
	function insertNorma()
	{
		global $basedomain; 

		if(isset($_POST)){
		   $x = form_validation($_POST);
		   //pr($x);exit;
		   try{
				if(isset($x) && count($x) != 0)
				    {					
						
						if($_FILES['cover']['name'] != ''){
							if($_FILES['cover']['name'] != ""){
								deleteFile($x['cover_hidden'],'norma');
							}
							$files = uploadFile('cover','norma'); 
							$data["cover"]="norma/".$files['filename']; 
						}else{
							$data["cover"]=$_POST['cover_hidden'];
						}
						if($_FILES['upload_file']['name'] != ''){
							if($_FILES['upload_file']['name'] != ""){
								deleteFile($x['file_hidden'],'norma');
							}
							$OriFilename1 = $_FILES['upload_file']['name'];
							$files2 = uploadFile('upload_file','norma'); 
							$data["upload_file"]="norma/".$files2['filename']; 
						}else{
							$data["upload_file"]=$_POST['file_hidden'];
							$OriFilename1 = $_POST['file_tags_hidden'];
						}
						if($_FILES['df']['name'] != ''){
							if($_FILES['df']['name'] != ""){
								deleteFile($x['df_hidden'],'norma');
							}	
							$OriFilename2 = $_FILES['df']['name'];
							$files3 = uploadFile('df','norma'); 
							$data["df"]="norma/".$files3['filename']; 
						}else{
							$data["df"]=$_POST['df_hidden'];
							$OriFilename2=$_POST['df_tags_hidden'];
						}
						if($_FILES['sr']['name'] != ''){
							if($_FILES['sr']['name'] != ""){
								deleteFile($x['sr_hidden'],'norma');
							}
							$files4 = uploadFile('sr','norma'); 
							$data["sr"]="norma/".$files4['filename'];
						}else{
							$data["sr"]=$_POST['sr_hidden'];
						}
						if($_FILES['ppr']['name'] != ''){
							if($_FILES['ppr']['name'] != ""){
								deleteFile($x['ppr_hidden'],'norma');
							}
							$files5 = uploadFile('ppr','norma'); 
							$data["ppr"]="norma/".$files5['filename']; 
						}else{
							$data["ppr"]=$_POST['ppr_hidden'];
						}

					$input_data_norma = $this->models->norma_inp($x['hidden_id'],		//id
																	$x['judul'], 		//$title,																						
																	$x['editor'],		//$content,
																	$x['thn_buat'],		//$tahun,
																	$x['jml_hal'],		//$jml_hal,
																	$x['lampiran'],		//$lampiran,		CHANGE  $x['instansi'],																					
																	'20',		//$categoryid, 
																	$x['artikel'],		//$atricletype,		ADD
																	$x['createdate'],	//$createdate,					
																	$x['tgl_upload'],	//$postdate,					
																	$x['fromwho'],		//$fromwho,			CHECK
																	$x['authorid'],		//$authorid,		CHECK															                                                                                                                   															
																	$x['deskripsi'],															                                                                                                                   															
																	$x['keyword'],															                                                                                                                   															
																	$data['cover'],
																	$data['upload_file'],
																	$data["df"],
																	$data["sr"],
																	$data["ppr"],
																	$x['id_repo_0'],
																	$x['id_repo_1'],
																	$x['id_repo_2'],
																	$x['id_repo_3'],$OriFilename1,$OriFilename2
																  );
																  
					if($input_data_norma['param'] == 'I'){
							$this->activityHelper->log('INSERT NORMA',$input_data_norma['id']);	
						}else{
							$this->activityHelper->log('UPDATE NORMA',$input_data_norma['id']);	
						}			
					}
			} catch(Exception $e){}		
		}
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."produk/norma'</script>";	
																	
	}
	
	
	function updateStatusNorma(){
		global $basedomain;
    	if(isset($_GET)){
               $x = form_validation($_GET);
               $data= $this->models->updateStatusNorma_m($x['delete']);
			   $this->activityHelper->log('DELETE NORMA',$data);	
            }
      echo "<script>alert('Data telah dihapus!');window.location.href='".$basedomain."produk/norma'</script>";		
	} 
	
	public function change_status_norma()
    {
		global $basedomain;
		$param_1 = $_GET['id']; 
		$param_2 = $_GET['status']; 
		
		
		// echo "masuk";
		// exit;
		if($param_1 != "" && $param_2 != "")
		{
			if($param_2 == 0)
			{
				$data['query'] = $this->models->publish_update_norma_m($param_1);
				redirect($basedomain.'produk/norma');
			}
			else
			{
				$data['query'] = $this->models->unpublish_update_norma_m($param_1);
				redirect($basedomain.'produk/norma');
			}
		}			
    } 
	
	
	//PROGRAM
	public function program(){
       
		$request = array('tabel' => 'dtataruang_news_content_product');		
		$data['get_data'] = $this->models->getProgram($request);
		$data['kat'] = $this->models->getKatProgram();	
		$data['user'] = $this->models->getUser();	
		
		return $this->loadView('produk/produk-program-std-list',$data);

	}
	
	function addProgram()
	{
		$id = $_GET['edit'];
		if($id != ''){
			$request = array('tabel' => 'tbl_wilayah');					
			$data['editProgram']  = $this->models->getProgramEdit($id);
		}
		
		return $this->loadView('produk/produk-program-std-input',$data);
	}
	
	function insertProgram()
	{
		global $basedomain; 

		$today = "2014-01-14 00:00:00";
		
		if(isset($_POST)){
		   $x = form_validation($_POST);
		   try{
				if(isset($x) && count($x) != 0)
				    {					
					//insert produk
					if (!empty($_FILES['cover']['name']) || ($_FILES['upload_file']['name']) ) {
							if($x['cover_hidden'] != $_FILES['cover']['name']){
								deleteFile($x['cover_hidden'],'product');
							}
							if($x['file_hidden'] != $_FILES['upload_file']['name']){
								deleteFile($x['file_hidden'],'product');
							}
							$files = uploadFile('cover','product'); 
							$files2 = uploadFile('upload_file','product'); 
							$data["cover"]="product/".$files['filename']; 
							$data["upload_file"]="product/".$files2['filename']; 
						}else{
							$data["cover"]=$_POST['cover_hidden'];
							$data["upload_file"]=$_POST['file_hidden'];
						}
					$data['input'] = $this->models->program_inp($x['hidden_id'],		//id
																	$x['judul'], 		//$title,																						
																	$x['editor'],		//$content,
																	//$x['provinsi'],		//$id_provinsi,
																	//$x['kabupaten'],	//$id_kabupaten,
																	$x['thn_buat'],		//$tahun,
																	$x['jml_hal'],		//$jml_hal,
																	$x['lampiran'],		//$lampiran,		CHANGE  $x['instansi'],																					
																	'11',		//$categoryid, 
																	$x['artikel'],		//$atricletype,		ADD
																	$today,				//$createdate,					
																	$x['tgl_upload'],	//$postdate,					
																	$x['fromwho'],		//$fromwho,			CHECK
																	$x['authorid'],		//$authorid,		CHECK															                                                                                                                   															
																	$data['cover'],
																	$data['upload_file']
																  );	
						
					}
			} catch(Exception $e){}		
		}
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='".$basedomain."produk/program/'</script>";	
																	
	}
	
	
	function updateStatusProgram(){
		global $basedomain;
    	if(isset($_GET)){
               $x = form_validation($_GET);
               $data['input'] = $this->models->updateStatusProgram_m($x['delete']);
            }
      echo "<script>alert('Data telah dihapus!');window.location.href='".$basedomain."produk/program/'</script>";		
	} 
	
	public function change_status_program()
    {
		global $basedomain;
		$param_1 = $_GET['id']; 
		$param_2 = $_GET['status'];  

		if($param_1 != "" && $param_2 != "")
		{
			if($param_2 == 0)
			{
				$data['query'] = $this->models->publish_update_program_m($param_1);
				redirect($basedomain.'produk/program/');
			}
			else
			{
				$data['query'] = $this->models->unpublish_update_program_m($param_1);
				redirect($basedomain.'produk/program/');
			}
		}	
		
    } 

}

?>
