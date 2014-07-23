<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class onemap extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
	}
	public function loadmodule()
	{
		
		$this->models = $this->loadModel('m_onemap');
		$this->activityHelper = $this->loadModel('activityHelper');
	}
	
	public function index(){
       
		if(isset($_GET)){
		
			if(isset($_GET['categoryid']) && count($_GET['categoryid'])!=0)
			{
				$categoryid=$_GET['categoryid'];
			}else{
			
				$categoryid=10;
				
			}
		}
			//get result data
			$result_data = $this->models->getData_onemap($categoryid);
			//get category
			$result_data_cat_onemap = $this->models->getData_news_content_cat_onemap();
			//get result image
			$result_image = $this->models->getData_image($result_data[0]['id']);	
			$data['kategori']=$result_data_cat_onemap;
			$data['data']=$result_data;
			$data['image']=$result_image;
			return $this->loadView('onemap/onemap_visi_aksi',$data);
	

	}
	
	public function changeData(){
	
	if(isset($_POST)){
			   
			$x = form_validation($_POST);	
			// pr($x);
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						
						if (!empty($_FILES['image']['name']) ) {
							deletefile($x['image_hidden'],'');
							$files = uploadFile('image','onemap'); 
							$data["image"]="onemap/".$files['filename']; 
						}
						else{
							$data["image"]=$_POST['image_hidden'];
						}	
						$articel_type = '4';
						$n_status = '1';
						// exit;
						$change_data_onemap = $this->models->changeData_onemap($x['id'],$x['title'],$x['content'],$data["image"],$x['categoryid'],$articel_type,$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],
															$n_status);
						
						if($change_data_onemap['category'] == '10'){
							if($change_data_onemap['param'] == 'I'){
							$this->activityHelper->log('INSERT VISI MISI',$change_data_onemap['id']);	
							}else{
								$this->activityHelper->log('UPDATE VISI MISI',$change_data_onemap['id']);	
							}
						}elseif($change_data_onemap['category'] == '11'){
							if($change_data_onemap['param'] == 'I'){
							$this->activityHelper->log('INSERT RENCANA AKSI',$change_data_onemap['id']);	
							}else{
								$this->activityHelper->log('UPDATE  RENCANA AKSI',$change_data_onemap['id']);	
							}
						}elseif($change_data_onemap['category'] == '12'){
							if($change_data_onemap['param'] == 'I'){
							$this->activityHelper->log('INSERT TARGET DAN CAPAIAN',$change_data_onemap['id']);	
							}else{
								$this->activityHelper->log('UPDATE TARGET DAN CAPAIAN',$change_data_onemap['id']);	
							}
						}elseif($change_data_onemap['category'] == '13'){
							if($change_data_onemap['param'] == 'I'){
							$this->activityHelper->log('INSERT DOKUMENTASI',$change_data_onemap['id']);	
							}else{
								$this->activityHelper->log('UPDATE DOKUMENTASI',$change_data_onemap['id']);	
							}
						}
						
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='index/?categoryid=".$x['categoryid']."';</script>";
	}

	//indeks peta tematik
	public function status_peta(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_peta'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."onemap/indeksPeta_view'</script>";	
	}
	
	
	public function indeksPeta_view(){
		$table_select="dtataruang_news_content";
		$table_user ="user_member";
		$categoryid="15";
		$data['result']= $this->models->viewData($table_select,$categoryid);
		$data['user']= $this->models->viewData_user($table_user);
		
		return $this->loadView('onemap/indeksPeta-list',$data);

	}
	
	public function add(){
	
		//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				$table_select="dtataruang_news_content";
				$categoryid="15";
				$data['result']= $this->models->viewData_cond_id($table_select,$categoryid,$id);
				// pr($data['result']);
				return $this->loadView('onemap/indeksPeta-input',$data);
			}else{
				return $this->loadView('onemap/indeksPeta-input');
			}	
		}
	}
	
	public function inputData(){
		if(isset($_POST)){
			// pr($_POST);
			// exit;
			$x = form_validation($_POST);	
			try
			   {
			   		if(!empty($_FILES['files']['name'])){	
								$ext = explode('/',$_FILES['files']['type']);
									if($ext[0] =='image'){
										
										deletefile($x['files_hidden'],'');
										$files_cover = uploadFile('files','onemap'); 
										$data_1["files"]="onemap/".$files_cover['filename'];
										$category  = "15";
										$articletype  = "4";
							
										$input_data_program = $this->models->inputDataFile($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																			$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
										if($input_data_program['param'] == 'I'){
												$this->activityHelper->log('INSERT INDEKS PETA TEMATIK',$input_data_program['id']);	
										}else{
												$this->activityHelper->log('UPDATE INDEKS PETA TEMATIK',$input_data_program['id']);	
										}
									}else{
										echo "<script>alert('File Yang Di Upload Harus Gambar');document.location='indeksPeta_view';</script>";
									}
							}else{
								$data_1["files"]=$_POST['files_hidden'];
								$category  = "15";
								$articletype  = "4";
								$input_data_program = $this->models->inputDataFile($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																		$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
									if($input_data_program['param'] == 'I'){
											$this->activityHelper->log('INSERT INDEKS PETA TEMATIK',$input_data_program['id']);	
									}else{
											$this->activityHelper->log('UPDATE INDEKS PETA TEMATIK',$input_data_program['id']);	
									}
							}
					}
				catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='indeksPeta_view';</script>";
	}

	public function del_peta(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->delData($table_select,$id,$status);
		$this->activityHelper->log('DELETE INDEKS PETA TEMATIK',$data['status']);	
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."onemap/indeksPeta_view'</script>";	
	}	
	
	
	//database sapasial 
	public function status_dbspasial(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_dbspasial'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status_db($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."onemap/dbspasial_view'</script>";	
	}
	
	public function dbspasial_view(){
		$table_select="dtataruang_news_content";
		$table_user="user_member";
		$categoryid="16";
		$data['result']= $this->models->viewDatadb($table_select,$categoryid);
		$data['user']= $this->models->viewData_user($table_user);
		
		return $this->loadView('onemap/databasespasial-list',$data);

	}
	
	public function add_dbspasial(){	
	//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				$table_select="dtataruang_news_content";
				$categoryid="16";
				$data['result']= $this->models->viewData_cond_db_id($table_select,$categoryid,$id);
				// pr($data['result']);
				return $this->loadView('onemap/databasespasial-input',$data);
			}else{
				return $this->loadView('onemap/databasespasial-input');
			}	
		}
	}
	
	public function inputDatadbspasial(){
		if(isset($_POST)){
			// pr($_POST);
			// exit;
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						if(!empty($_FILES['files']['name'])){	
								$ext = explode('/',$_FILES['files']['type']);
									if($ext[0] =='image'){
										deletefile($x['files_hidden'],'');
										$files_cover = uploadFile('files','onemap'); 
										$data_1["files"]="onemap/".$files_cover['filename'];
										
										$category  = "16";
										$articletype  = "4";
										$input_data_program = $this->models->inputDataFiledb($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																			$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
										if($input_data_program['param'] == 'I'){
												$this->activityHelper->log('INSERT DATABASE SPASIAL',$input_data_program['id']);	
										}else{
												$this->activityHelper->log('UPDATE DATABASE SPASIAL',$input_data_program['id']);	
										}
									}else{
										echo "<script>alert('File Yang Di Upload Harus Gambar');document.location='dbspasial_view';</script>";
									}
							}else{
								$data_1["files"]=$_POST['files_hidden'];
								$category  = "16";
								$articletype  = "4";
								$input_data_program = $this->models->inputDataFiledb($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																			$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
								if($input_data_program['param'] == 'I'){
										$this->activityHelper->log('INSERT DATABASE SPASIAL',$input_data_program['id']);	
								}else{
										$this->activityHelper->log('UPDATE DATABASE SPASIAL',$input_data_program['id']);	
								}
							}	
							
						
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='dbspasial_view';</script>";
	}

	public function del_dbspasial(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->deldbspasial($table_select,$id,$status);
		$this->activityHelper->log('DELETE DATABASE SPASIAL',$data['status']);	
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."onemap/dbspasial_view'</script>";	
	}	
	
	//database tematik
	public function status_dbtematik(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['status_peta'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status_db($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."onemap/dbtematik_view'</script>";	
	}
	
	public function dbtematik_view(){
		$table_select="dtataruang_news_content";
		$table_user="user_member";
		$categoryid="14";
		$data['result']= $this->models->viewDatadb($table_select,$categoryid);
		$data['user']= $this->models->viewData_user($table_user);
		
		return $this->loadView('onemap/databasetematik-list',$data);

	}
	
	public function add_dbtematik(){	
	//SIG Peta Pola Ruang = 12
		if(isset($_GET))
		{
			$id = form_validation($_GET);
			if(isset($id['id']) && count($id)!=0)
			{	
				$id = $id['id'];
				$table_select="dtataruang_news_content";
				$categoryid="14";
				$data['result']= $this->models->viewData_cond_db_id($table_select,$categoryid,$id);
				// pr($data['result']);
				return $this->loadView('onemap/databasetematik-input',$data);
			}else{
				return $this->loadView('onemap/databasetematik-input');
			}	
		}
	}
	
	public function inputDatadbtematik(){
		if(isset($_POST)){
			// pr($_POST);
			// exit;
			$x = form_validation($_POST);	
			try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
							if(!empty($_FILES['files']['name'])){	
								$ext = explode('/',$_FILES['files']['type']);
									if($ext[0] =='image'){
										deletefile($x['files_hidden'],'');
										$files_cover = uploadFile('files','onemap'); 
										$data_1["files"]="onemap/".$files_cover['filename'];	
										$category  = "14";
										$articletype  = "4";
										$input_data_program = $this->models->inputDataFiledb($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																	$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
										if($input_data_program['param'] == 'I'){
												$this->activityHelper->log('INSERT DATABASE TEMATIK',$input_data_program['id']);	
										}else{
												$this->activityHelper->log('UPDATE DATABASE TEMATIK',$input_data_program['id']);	
										}
									}else{
										echo "<script>alert('File Yang Di Upload Harus Gambar');document.location='dbtematik_view';</script>";
									}
							}else{
								$data_1["files"]=$_POST['files_hidden'];
								$category  = "14";
								$articletype  = "4";
								$input_data_program = $this->models->inputDataFiledb($x['id'],$x['title'],$data_1["files"],$category,$articletype,$x['brief'],
																	$x['createdate'],$x['postdate'],$x['fromwho'],$x['authorid'],$x['n_status']);
								if($input_data_program['param'] == 'I'){
								$this->activityHelper->log('INSERT DATABASE TEMATIK',$input_data_program['id']);	
								}else{
										$this->activityHelper->log('UPDATE DATABASE TEMATIK',$input_data_program['id']);	
								}
							}
						
					}
				}catch (Exception $e){}
		}
		echo "<script>alert('Data Berhasil Disimpan');document.location='dbtematik_view';</script>";
	}

	public function del_dbtematik(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = '2';
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->deldbspasial($table_select,$id,$status);
		$this->activityHelper->log('DELETE DATABASE SPASIAL',$data['status']);	
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='".$basedomain."onemap/dbtematik_view'</script>";	
	}	

	
}
?>
