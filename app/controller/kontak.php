<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class kontak extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		$this->loadmodule();
		
		// $this->validatePage();
		// $test = $this->isUserOnline();
		// pr($test);
	}
	public function loadmodule()
	{
		
		$this->contentHelper = $this->loadModel('contentHelper');
	}
	
	public function index(){
   
		
		$table="dtataruang_news_content";
		$categoryid="8";
		$articletype="1";
		
		$table_rss="dtataruang_news_content";
		$categoryid_rss="18";
		$articletype_rss="";
		
		$orderby=array('createdate','ASC');
		
		$result_data = $this->contentHelper->getData_news_content($table,$categoryid,$articletype,$orderby);
		$result_rss= $this->contentHelper->getData_news_content($table_rss,$categoryid_rss,$articletype_rss,$orderby,0,10);
		$data['hasil']=$result_data;
		$data['rss']=$result_rss;
		
		return $this->loadView('kontak',$data);
		

	}
        
	
}

?>