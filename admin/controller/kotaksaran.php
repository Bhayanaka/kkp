<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class kotaksaran extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->models = $this->loadModel('m_kotaksaran');
	}
	
	public function index(){
       
		$table_select="dtataruang_news_content";
		$categoryid="19";
		$data['result']= $this->models->viewData($table_select,$categoryid);
		return $this->loadView('kotaksaran',$data);
	}
	
	public function status(){
		global $basedomain;
	    $id=$_GET['id'];
		$status = $_GET['n_status'];
		if($status =='0'){
			$st = '1';
		}elseif($status =='1'){
			$st = '0';
		}
		$table_select="dtataruang_news_content";
		$data['status']= $this->models->update_status($table_select,$id,$st);
		echo "<script>window.location.href='".$basedomain."kotaksaran'</script>";	
	}
   
}

?>
