<?php
defined ('TATARUANG') or exit ( 'Forbidden Access' );

class datatables_api extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		
		// $this->validatePage();
	}
	public function loadmodule()
	{
		
		$this->models = $this->loadModel('m_datatablesApi');
	}
	public function index(){
	echo "masuk";
	exit;
	}
	
	//Berita	
	public function server_processing_berita(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !='' || $pilihan !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_berita($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}
	
	//Agenda
	public function server_processing_agenda(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_agenda($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}
	
	//Opini
	public function server_processing_opini(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !='' || $pilihan !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_opini($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}

	//Gallery Foto
	public function server_processing_galleryFoto(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_galleryFoto($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}
	
	//Gallery Video
	public function server_processing_galleryVideo(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_galleryVideo($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}

	//Peraturan	
	public function server_processing_peraturan(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_peraturan";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		}
		
		if ($articletype !=''){
			$sWhere.=" AND articletype = '{$articletype}'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			if($articletype !=''){
				$sWhere = "WHERE categoryid = {$categoryid} AND articletype = '{$articletype}' AND n_status !='2' AND (";
			}else{
				$sWhere = "WHERE categoryid = {$categoryid} AND n_status !='2' AND (";
			}
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_peraturan($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}

	//Norma	
	public function server_processing_norma(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_norma";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		}
		
		if ($articletype !=''){
			$sWhere.=" AND articletype = '{$articletype}'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			if($articletype !=''){
				$sWhere = "WHERE categoryid = {$categoryid} AND articletype = '{$articletype}' AND n_status !='2' AND (";
			}else{
				$sWhere = "WHERE categoryid = {$categoryid} AND n_status !='2' AND (";
			}
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_norma($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}			

	//One Map Database Tematik
	public function server_processing_dbTematik(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_dbTematik($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}	

	//One Map Indeks Peta Tematik
	public function server_processing_indeksPetaTematik(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_indeksPetaTematik($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}		
	
	//One Map Indeks Peta Tematik
	public function server_processing_dbSpasial(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND articletype = {$articletype} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_dbSpasial($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}		
	
	//Slide Show
	public function server_processing_slideShow(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','tags','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_slideShow($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}		
	
	//RSS
	public function server_processing_rss(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'postdate', 'title','brief','n_status', 'fromwho','authorid','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		$articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_rss($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}

	//User
	public function server_processing_user(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array( 'register_date', 'name','usertype','id' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "user_member";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		// $categoryid=$_GET['category'];
		// $articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = " WHERE n_status !='2' ";
		
		/* extra condition */
		// if ($categoryid !=''){
			// $sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		// }
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE n_status !='2' AND(";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_user($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}		

	//Program	
	public function server_processing_program(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','n_status','fromwho','authorid','id','categoryid','articletype' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_program";
		
		/* Condition for content type */
		$category=$_GET['category'];
		$articletype=$_GET['type'];
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		// if ($category !=''){
			// $sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
			// $query_category = "categoryid=".$category." AND";
		// }
		
		if ($articletype !=''){
			// $sWhere.=" AND articletype = '{$articletype}'";
			$query_article = "articletype=".$articletype." AND";
		}
		
		$sWhere=" WHERE  {$query_category} {$query_article} n_status !='2'";
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			// if ($category !=''){
				// $query_category = "categoryid=".$category." AND";
			// }
			
			if ($articletype !=''){
				$query_article = "articletype=".$articletype." AND";
			}
			$sWhere = "WHERE {$query_category} {$query_article} n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_program($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}	
	
	//Produk	
	public function server_processing_produk(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','id_provinsi','id_kabupaten','kecamatan','n_status','fromwho','authorid','id','categoryid','articletype' );
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_product";
		
		/* Condition for content type */
		$category=$_GET['category'];
		$articletype=$_GET['type'];
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($category !=''){
			// $sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
			$query_category = "categoryid=".$category." AND";
		}
		
		if ($articletype !=''){
			// $sWhere.=" AND articletype = '{$articletype}'";
			$query_article = "articletype=".$articletype." AND";
		}
		
		$sWhere=" WHERE  {$query_category} {$query_article} n_status !='2'";
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			if ($category !=''){
				$query_category = "categoryid=".$category." AND";
			}
			
			if ($articletype !=''){
				$query_article = "articletype=".$articletype." AND";
			}
			$sWhere = "WHERE {$query_category} {$query_article} n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_product($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}

	//SIG Peta Pola Ruang	
	public function server_processing_petaPolaRuang(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','id_provinsi','id_kabupaten','kecamatan','n_status','fromwho','authorid','id');
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_sig";
		
		/* Condition for content type */
		$articletype=@$_GET['type'];
		$category=@$_GET['category'];
		
		$idProvinsi = (@$_GET['provinsi']);
		$idProv = explode("_", $idProvinsi);
		$KodeProv = $idProv[0];
						
		$idKabupaten = (@$_GET['kabupaten']);
		$idKab = explode("_", $idKabupaten);
		$KodeKab = $idKab[0];
		// pr($_GET);
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		
		$query_idProv = "";
		$query_idKab = "";
		$query_article = "";
		
		if ($idProvinsi !=''){
			$query_idProv = "id_provinsi=".$KodeProv." AND";
		}
		
		if ($idKabupaten !=''){
			$query_idKab = "id_kabupaten=".$KodeKab." AND";
		}
		
		if ($articletype !=''){
			$query_article = "articletype=".$articletype." AND";
		}
		
		if ($category !=''){
			$query_category = "categoryid=".$category." AND";
		}
		
		$sWhere=" WHERE  {$query_idProv} {$query_idKab} {$query_category} {$query_article} n_status !='2'";
		// echo $sWhere;
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			if ($idProvinsi !=''){
				$query_idProv = "id_provinsi=".$KodeProv." AND";
			}
		
			if ($idKabupaten !=''){
				$query_idKab = "id_kabupaten=".$KodeKab." AND";
			}
		
			if ($articletype !=''){
				$query_article = "articletype=".$articletype." AND";
			}
			
			if ($category !=''){
				$query_category = "categoryid=".$category." AND";
			}
			
			$sWhere = "WHERE {$query_idProv} {$query_idKab} {$query_article} {$query_category} n_status !='2' AND (";
			
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_sigPola($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}
		
	//SIG Peta Pola Ruang	
	public function server_processing_petaStrukturRuang(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */	
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		
		$aColumns = array( 'postdate', 'title','id_provinsi','id_kabupaten','kecamatan','n_status','fromwho','authorid','id');
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content_sig";
		
		/* Condition for content type */
		$articletype=$_GET['type'];
		$category=$_GET['category'];
		
		$idProvinsi = ($_GET['provinsi']);
		$idProv = explode("_", $idProvinsi);
		$KodeProv = $idProv[0];
						
		$idKabupaten = ($_GET['kabupaten']);
		$idKab = explode("_", $idKabupaten);
		$KodeKab = $idKab[0];
		// pr($_GET);
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($idProvinsi !=''){
			$query_idProv = "id_provinsi=".$KodeProv." AND";
		}
		
		if ($idKabupaten !=''){
			$query_idKab = "id_kabupaten=".$KodeKab." AND";
		}
		
		if ($articletype !=''){
			$query_article = "articletype=".$articletype." AND";
		}
		
		if ($category !=''){
			$query_category = "categoryid=".$category." AND";
		}
		
		$sWhere=" WHERE  {$query_idProv} {$query_idKab} {$query_category} {$query_article} n_status !='2'";
		// echo $sWhere;
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			if ($idProvinsi !=''){
				$query_idProv = "id_provinsi=".$KodeProv." AND";
			}
		
			if ($idKabupaten !=''){
				$query_idKab = "id_kabupaten=".$KodeKab." AND";
			}
		
			if ($articletype !=''){
				$query_article = "articletype=".$articletype." AND";
			}
			
			if ($category !=''){
				$query_category = "categoryid=".$category." AND";
			}
			
			$sWhere = "WHERE {$query_idProv} {$query_idKab} {$query_article} {$query_category} n_status !='2' AND (";
			
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// echo $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_sigStruktur($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}	

	//Kotak Saran 	
	public function server_processing_kotaksaran(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array('createdate','title','brief', 'content','n_status','id');
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = "dtataruang_news_content";
		
		/* Condition for content type */
		// $categoryid=4;
		// $articletype=1;
		$categoryid=$_GET['category'];
		// $articletype=$_GET['articletype'];
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$sWhere = "";
		
		/* extra condition */
		if ($categoryid !='' || $pilihan !=''){
			$sWhere=" WHERE categoryid = {$categoryid} AND n_status !='2'";
		}
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "WHERE categoryid = {$categoryid} AND n_status !='2' AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_kotaksaran($aColumns,$_POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}	

	//Notif	
	public function server_processing_notif(){
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		// echo "masukk";
		// exit;
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		 // print_r($_GET);
		$aColumns = array('log.userid','ca.activityValue','log.activityDesc','log.datetimes','ca.activityId');
		$aColumnsSelect = array('userid','userid','activityValue','activityDesc','datetimes',);
		
		// /* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "log.id";
		
		/* DB table to use */
		$sTable		= "code_activity_log log";
		$sTableJoin = "code_activity ca";
		
		/* Condition for content type */
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * Local functions
		 */
		function fatal_error ( $sErrorMessage = '' )
		{
			header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
			die( $sErrorMessage );
		}

		
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
			{
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]." ".
						($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		// $pilihan = $_POST['pilihan'];
		$Ext_Query = "log.activityId = ca.id";
		$sWhere = "{$Ext_Query} WHERE log.userid != {$_SESSION['user']['id']} AND log.n_status != 0";
		// $sWhere = "{$Ext_Query} ";
		
		/* extra condition */
		
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
		{
			$sWhere = "{$Ext_Query} WHERE log.userid != {$_SESSION['user']['id']} AND log.n_status != 0 AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "".$aColumns[$i]." LIKE '%".mysql_real_escape_string( $_POST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		// ECHO $sWhere;
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		 
		$output = $this->models->get_data_notif($aColumns,$_POST,$sTable,$sTableJoin,$sWhere,$sOrder,$sLimit,$sIndexColumn,$aColumnsSelect);
		// pr($output);exit;
		
		echo json_encode( $output );
		
		exit;

	}		
}

?>
