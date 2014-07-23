<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class sig extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('m_sig');
		$this->contentHelper = $this->loadModel('contentHelper');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		// $data = $this->contentHelper->getData();
		// pr($data);
		return $this->loadView('sig/sig-pola-ruang-list');

	}
	
	/**************************************************Begin Peta Pola Ruang**************************************************/
	
	//update status publish or unpublished SIG Peta Pola Ruang 
	public function status(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content_sig";
		$data['status']= $this->models->update_status($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."sig/pola'</script>";	
	}
	
	//view SIG Peta Pola Ruang 
	public function pola(){
        // $table_select="dtataruang_news_content_sig";
		// $table_select_join="dtataruang_news_content_repo";
		$table_wilayah="tbl_wilayah";
		// $table_user="user_member";
		// $categoryid="33";
		$data['lokasi']= $this->contentHelper->getDataLokasi();
		$table="dtataruang_news_content_type_peta";
		$data['type'] = $this->models->viewData_type_peta($table);
		// $data['result']= $this->models->viewData_ppr_nasional_all($table_select,$categoryid,$table_select_join,$table_wilayah);
		// $data['user'] = $this->models->viewDataUser($table_user);
		// pr($data['result']);
		return $this->loadView('sig/sig-pola-ruang-list',$data);

	}
	//insert or update SIG Peta Pola Ruang
	public function addpola()
	{
		//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				// echo "edit";
				$id = $id['id'];
				$categoryid="33";
				$table="dtataruang_news_content_type_peta";
				$data['type'] = $this->models->viewData_type_peta($table);
				
				$table_select="dtataruang_news_content_sig";
				$table_select_join="dtataruang_news_content_repo";
				$table_wilayah="tbl_wilayah";
				$data['result']= $this->models->viewData_ppr_nasional_cond_id($table_select,$categoryid,$table_select_join,$id,$table_wilayah);
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				$data['kabupaten']= $this->contentHelper->getChildLoc($data['result'][0]['id_provinsi']);	
				// pr($data);
				return $this->loadView('sig/sig-pola-ruang-input',$data);
			}else{
				// echo "tambah";
				$table="dtataruang_news_content_type_peta";
				$data['type'] = $this->models->viewData_type_peta($table);
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				return $this->loadView('sig/sig-pola-ruang-input',$data);
			}	
		}
	}
	
	//insert or edit sejarah
	public function input_pola(){
		if(isset($_POST)){
			// pr($_POST);
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						if (!empty($_FILES['cover']['name'])){
							deleteFile($x['cover_hidden'],'sig/peta_pola_ruang');
							$files_cover = uploadFile('cover','sig/peta_pola_ruang'); 
							$data_1["cover"]="sig/peta_pola_ruang/".$files_cover['filename'];
						}else{
							$data_1["cover"]=$_POST['cover_hidden'];
						}	
						
						if(!empty($_FILES['peta']['name'])){
							deleteFile($x['peta_hidden'],'sig/peta_pola_ruang');
							$files_peta = uploadFile('peta','sig/peta_pola_ruang'); 
							$data_2["peta"]="sig/peta_pola_ruang/".$files_peta['filename'];
						}else{
							$data_2["peta"]=$_POST['peta_hidden'];
						}
						
						$provinsi = explode("_", $x['provinsi']);
						$id_provinsi = $provinsi[0];
						$kabupaten = explode("_", $x['kabupaten']);
						$id_kabupaten = $kabupaten[0];
						$input_data_sig_pola = $this->models->inputData_Pola_Ruang($x['id'],$x['title'],$x['content'],$id_provinsi,$id_kabupaten,$x['kecamatan'],$data_1["cover"],$data_2["peta"],$x['categoryid'],$x['type_peta'],
																					$x['tahun'],$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status'],$x['otherid']);
						if($input_data_sig_pola['param'] == 'I'){
							$this->activityHelper->log('INSERT SIG PETA POLA RUANG',$input_data_sig_pola['id']);	
						}else{
							$this->activityHelper->log('UPDATE SIG PETA POLA RUANG',$input_data_sig_pola['id']);	
						}
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='pola';</script>";
	}
	
	//update status publish or unpublished SIG Peta Pola Ruang
	public function del_pola(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content_sig";
		$data['status']= $this->models->delData_Pola_Ruang($table_select,$id,$status);
		$this->activityHelper->log('DELETE SIG PETA POLA RUANG',$data['status']);
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."sig/pola'</script>";	
	}
	
	 /**************************************************End Peta Pola Ruang**************************************************/
	
	 /**************************************************Begin Peta Struktur Ruang**************************************************/
	
	//update status publish or unpublished SIG Peta Pola Ruang 
	public function status_struktur(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_struktur'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content_sig";
		
		$data['status']= $this->models->update_status_struktur($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."sig/struktur'</script>";	
	}
	
	//view SIG Peta Pola Ruang 
	public function struktur(){
		// $table_select="dtataruang_news_content_sig";
		// $table_select_join="dtataruang_news_content_repo";
		$table_wilayah="tbl_wilayah";
		// $table_user="user_member";
		// $categoryid="34";
		// $data['result']= $this->models->viewData_ppr_nasional_struktur($table_select,$categoryid,$table_select_join,$table_wilayah);
		$data['lokasi']= $this->contentHelper->getDataLokasi();
		$table="dtataruang_news_content_type_peta";
		$data['type'] = $this->models->viewData_type_peta($table);
		// $data['prov'] = $this->models->view_prov($table_wilayah);
		// $data['user'] = $this->models->viewDataUser($table_user);
		return $this->loadView('sig/sig-struktur-ruang-list',$data);

	}
	//insert or update SIG Peta Pola Ruang
	public function addpola_struktur()
	{
		
		
		//SIG Peta Struktur Ruang = 13
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				$categoryid="34";
				$table="dtataruang_news_content_type_peta";
				$data['type'] = $this->models->viewData_type_peta($table);
				$table_select="dtataruang_news_content_sig";
				$table_select_join="dtataruang_news_content_repo";
				$table_wilayah="tbl_wilayah";
				$data['result']= $this->models->viewData_ppr_nasional_struktur_id($table_select,$categoryid,$table_select_join,$id,$table_wilayah);
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				$data['kabupaten']= $this->contentHelper->getChildLoc($data['result'][0]['id_provinsi']);
							// pr($data);
				// exit;
				return $this->loadView('sig/sig-struktur-ruang-input',$data);
			}else{
				// echo "tambah";
				$table="dtataruang_news_content_type_peta";
				$data['type'] = $this->models->viewData_type_peta($table);
				$data['lokasi']= $this->contentHelper->getDataLokasi();
				return $this->loadView('sig/sig-struktur-ruang-input',$data);
			}	
		}
	}
	
	//insert or edit pola struktur
	public function input_pola_struktur(){
		if(isset($_POST)){
			// pr($_POST);
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						if(!empty($_FILES['cover']['name'])){
							deleteFile($x['cover_hidden'],'sig/peta struktur ruang');
							$files_cover = uploadFile('cover','sig/peta struktur ruang'); 
							$data_1["cover"]="sig/peta struktur ruang/".$files_cover['filename'];
						}else{
							$data_1["cover"]=$_POST['cover_hidden'];
						}	
						
						if(!empty($_FILES['peta']['name'])){
							deleteFile($x['peta_hidden'],'sig/peta struktur ruang');
							$files_peta = uploadFile('peta','sig/peta struktur ruang'); 
							$data_2["peta"]="sig/peta struktur ruang/".$files_peta['filename'];
						}else{
							$data_2["peta"]=$_POST['peta_hidden'];
						}
						
						$provinsi = explode("_", $x['provinsi']);
						$id_provinsi = $provinsi[0];
						$kabupaten = explode("_", $x['kabupaten']);
						$id_kabupaten = $kabupaten[0];
						// exit;
						$input_data_sig_struktur = $this->models->inputData_Pola_Ruang_struktur($x['id'],$x['title'],$x['content'],$id_provinsi,$id_kabupaten,$x['kecamatan'],$data_1["cover"],$data_2["peta"],$x['categoryid'],$x['type_peta'],
																					$x['tahun'],$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status'],$x['otherid']);
						if($input_data_sig_struktur['param'] == 'I'){
							$this->activityHelper->log('INSERT SIG PETA STRUKTUR RUANG',$input_data_sig_struktur['id']);	
						}else{
							$this->activityHelper->log('UPDATE SIG PETA STRUKTUR RUANG',$input_data_sig_struktur['id']);	
						}
					}
				}catch (Exception $e){}
		}
		// exit;
		echo "<script>alert('Data Berhasil Disimpan');document.location='struktur';</script>";
	}
	
	//update status publish or unpublished SIG Peta struktur Ruang
	public function del_pola_struktur(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content_sig";
		$data['status']= $this->models->delData_Pola_struktur($table_select,$id,$status);
		$this->activityHelper->log('DELETE SIG PETA STRUKTUR RUANG',$data['status']);
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."sig/struktur'</script>";	
	
		// echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."sig/pola_struktur'</script>";	
	
	}
	
	 /**************************************************End Peta Struktur Ruang**************************************************/
		
}

?>
