<?php
class m_datatablesApi extends Database {
	//Berita
	function get_data_berita($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}berita/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}berita/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						// $act_del = '<a href="{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}" class="icon-trash" title="Hapus" onclick="return confirm('Hapus Data');"></a>';	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}berita/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}berita/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						//$act_del = "<a href='{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}' class='icon-trash' title='Hapus' onclick='return confirm('Hapus Data');'></a>";	
						$act_del = "<a href=\"{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}berita/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						//$act_del = "<a href='{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}' class='icon-trash' title='Hapus' onclick='return confirm('Hapus Data');'></a>";
						$act_del = "<a href=\"{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($output);
		return $output;
		
	}
	
	//Agenda
	function get_data_agenda($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}agenda/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}agenda/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}agenda/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}agenda/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}agenda/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}agenda/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}agenda/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						//$act_del = "<a href='{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}' class='icon-trash' title='Hapus' onclick='return confirm('Hapus Data');'></a>";
						$act_del = "<a href=\"{$basedomain}agenda/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Opini
	function get_data_opini($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}opini/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}opini/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}opini/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}opini/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}opini/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}opini/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}opini/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						//$act_del = "<a href='{$basedomain}berita/delete/?id={$aRow[ $aColumns[$i] ]}' class='icon-trash' title='Hapus' onclick='return confirm('Hapus Data');'></a>";
						$act_del = "<a href=\"{$basedomain}opini/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Gallery Foto
	function get_data_galleryFoto($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}gallery/informasi_gallery_foto_publish/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_foto_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_foto_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}gallery/informasi_gallery_foto_publish/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_foto_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_foto_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_foto_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_foto_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Gallery Video
	function get_data_galleryVideo($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}gallery/informasi_gallery_video_publish/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_video_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_video_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}gallery/informasi_gallery_video_publish/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_video_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_video_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}gallery/informasi_gallery_video_edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}gallery/informasi_gallery_video_delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Peraturan
	function get_data_peraturan($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}peraturan/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}peraturan/formPeraturan/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}peraturan/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}peraturan/change_status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}peraturan/formPeraturan/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}peraturan/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}peraturan/formPeraturan/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}peraturan/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Norma
	function get_data_norma($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}produk/change_status_norma/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}produk/addNorma/?edit={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusNorma/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}produk/change_status_norma/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}produk/addNorma/?edit={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusNorma/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}produk/addNorma/?edit={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusNorma/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//One Map Database Tematik
	function get_data_dbTematik($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_dbtematik/?id={$aRow[ $aColumns[$i] ]}&status_peta={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add_dbtematik/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbtematik/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_dbtematik/?id={$aRow[ $aColumns[$i] ]}&status_peta={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add_dbtematik/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbtematik/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}onemap/add_dbtematik/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbtematik/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//One Map Indeks Peta Tematik
	function get_data_indeksPetaTematik($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_peta/?id={$aRow[ $aColumns[$i] ]}&status_peta={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_peta/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_peta/?id={$aRow[ $aColumns[$i] ]}&status_peta={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_peta/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}onemap/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_peta/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//One Map Database Spasial
	function get_data_dbSpasial($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_dbspasial/?id={$aRow[ $aColumns[$i] ]}&status_dbspasial={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add_dbspasial/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbspasial/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}onemap/status_dbspasial/?id={$aRow[ $aColumns[$i] ]}&status_dbspasial={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}onemap/add_dbspasial/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbspasial/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}onemap/add_dbspasial/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}onemap/del_dbspasial/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Slide Show
	function get_data_slideShow($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}slideshow/status_slide/?id={$aRow[ $aColumns[$i] ]}&status_slide={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}slideshow/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}slideshow/del_slide/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}slideshow/status_slide/?id={$aRow[ $aColumns[$i] ]}&status_slide={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}slideshow/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}slideshow/del_slide/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}slideshow/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}slideshow/del_slide/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//RSS
	function get_data_rss($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}rss/status_rss/?id={$aRow[ $aColumns[$i] ]}&status_rss={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}rss/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}rss/del_rss/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}rss/status_rss/?id={$aRow[ $aColumns[$i] ]}&status_rss={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}rss/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}rss/del_rss/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}rss/add/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}rss/del_rss/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//User
	function get_data_user($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "usertype" )
				{
					/* Special output formatting for 'version' column */
					if($aRow[ $aColumns[$i] ]=="1"){
						$row[] = 'Administrator';
					}elseif($aRow[ $aColumns[$i] ]=="2"){
						$row[] = 'Publisher';
					}else{
						$row[] = 'Operator';
					}
					// $row[] = ($aRow[ $aColumns[$i] ]=="1") ? 'Administrator' : '';
					// $row[] = ($aRow[ $aColumns[$i] ]=="2") ? 'Publisher': '';
					// $row[] = ($aRow[ $aColumns[$i] ]=="3") ? 'Operator': '';
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] != $aRow[ $aColumns[$i] ]){
						$act_edit = "<a href='{$basedomain}user/edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}user/delete/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
										
					}
					else if($_SESSION['user']['usertype'] == $aRow[ $aColumns[$i] ]){
						
						$act_edit = "<a href='{$basedomain}user/edit/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						
					}
					
					$row[] = $act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Program
	function get_data_program($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}program/status_program/?id={$aRow[ $aColumns[$i] ]}&status_program={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}program/addprogram/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}program/del_program/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
							
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}program/status_program/?id={$aRow[ $aColumns[$i] ]}&status_program={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}program/addprogram/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}program/del_program/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}program/addprogram/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}program/del_program/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Product
	function get_data_product($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				if ( $aColumns[$i] == "id_provinsi" )
				{
					if($aRow[ $aColumns[$i] ] != ''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent = '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] ='';
					}
				}
				
				else if ( $aColumns[$i] == "id_kabupaten" )
				{
					if($aRow[ $aColumns[$i] ] != ''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent != '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] ='';
					}
				}
				
				else if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}produk/change_status/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}produk/addPerencanaan/?edit={$aRow[ $aColumns[$i] ]}&kode={$aRow['id_provinsi']}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusPerencanaan/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}produk/change_status/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}produk/addPerencanaan/?edit={$aRow[ $aColumns[$i] ]}&kode={$aRow['id_provinsi']}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusPerencanaan/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}produk/addPerencanaan/?edit={$aRow[ $aColumns[$i] ]}&kode={$aRow['id_provinsi']}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}produk/updateStatusPerencanaan/?delete={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//SIG Peta Pola Ruang
	function get_data_sigPola($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		
		global $basedomain; 
		
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery; 
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				if ( $aColumns[$i] == "id_provinsi" )
				{	
					if($aRow[ $aColumns[$i] ] !=''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent = '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] = '';
					}
				}
				
				else if ( $aColumns[$i] == "id_kabupaten" )
				{
					if($aRow[ $aColumns[$i] ] !=''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent != '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] = '';
					} 
				}
				
				else if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}sig/status/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}sig/addpola/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}sig/status/?id={$aRow[ $aColumns[$i] ]}&status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}sig/addpola/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}sig/addpola/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//SIG Peta Struktur Ruang
	function get_data_sigStruktur($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery; 
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);

		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				if ( $aColumns[$i] == "id_provinsi" )
				{	
					if($aRow[ $aColumns[$i] ] !=''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent = '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] = '';
					}
				}
				
				else if ( $aColumns[$i] == "id_kabupaten" )
				{
					if($aRow[ $aColumns[$i] ] !=''){
						$sql = "SELECT nama_wilayah FROM tbl_wilayah WHERE kode_wilayah = {$aRow[ $aColumns[$i] ]} AND parent != '0'";
						$usr = $this->fetch( $sql );
						$row[] = $usr['nama_wilayah'];
					}else{
						$row[] = '';
					} 
				}
				
				else if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if ( $aColumns[$i] == "fromwho" )
				{
					if ($aRow[ $aColumns[$i] ] == '1'){
						$as = ' As Administrator';
					}elseif($aRow[ $aColumns[$i] ] == '2'){
						$as =' As Publisher';
					}else{	
						$as =' As Operator';
					}
				}
				
				else if ( $aColumns[$i] == "authorid" )
				{
					$sql = "SELECT name FROM user_member WHERE id = {$aRow[ $aColumns[$i] ]}";
					$usr = $this->fetch( $sql );
					$row[] = $usr['name'].$as;
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					$act_publhs ="";
					$act_edit = "";
					$act_del = "";
					if($_SESSION['user']['usertype'] == '1'){
						$act_publhs ="<a href='{$basedomain}sig/status_struktur/?id={$aRow[ $aColumns[$i] ]}&status_struktur={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}sig/addpola_struktur/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola_struktur/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					else if($_SESSION['user']['usertype'] == '2' && $aRow['fromwho'] !='1'){
						$act_publhs ="<a href='{$basedomain}sig/status_struktur/?id={$aRow[ $aColumns[$i] ]}&status_struktur={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
						$act_edit = "<a href='{$basedomain}sig/addpola_struktur/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola_struktur/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					elseif($_SESSION['user']['usertype'] == '3' && $aRow['fromwho'] =='3'){
						$act_edit = "<a href='{$basedomain}sig/addpola_struktur/?id={$aRow[ $aColumns[$i] ]}' class='icon-edit' title='Edit'></a>&nbsp;&nbsp;&nbsp;";
						$act_del = "<a href=\"{$basedomain}sig/del_pola_struktur/?id={$aRow[ $aColumns[$i] ]}\" class=\"icon-trash\" title=\"Hapus\" onclick=\"return confirm('Hapus Data');\"></a>";	
						
					}
					$row[] = $act_publhs.$act_edit.$act_del;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($_SESSION);
		return $output;
		
	}
	
	//Kotak Saran
	function get_data_kotaksaran($aColumns,$POST,$sTable,$sWhere,$sOrder,$sLimit,$sIndexColumn){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable $sWhere
		";
		// echo $sQuery;
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		// print_r($iTotal);
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(`id`)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(`id`)'],
			"aaData" => array()
		);
		// pr($output);
		$no = $POST['iDisplayStart']+1;

		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{	
			
				
				
				if ( $aColumns[$i] == "n_status" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? 'Unpublish' : 'Published';
				}
				
				else if (  $aColumns[$i] == "id" )
				{
					// $act_publhs ="";
					$act_publhs ="<a href='{$basedomain}kotaksaran/status/?id={$aRow[ $aColumns[$i] ]}&n_status={$aRow['n_status']}' class='icon-globe' title='Publish'></a>&nbsp;&nbsp;&nbsp;";
					
					$row[] = $act_publhs;
				}
				
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumns[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($output);
		return $output;
		
	}

	//Notif
	function get_data_notif($aColumns,$POST,$sTable,$sTableJoin,$sWhere,$sOrder,$sLimit,$sIndexColumn,$aColumnsSelect){
		global $basedomain;
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM   $sTable LEFT JOIN $sTableJoin ON 
			$sWhere
			$sOrder
			$sLimit
			";
			// echo $sQuery;
		$rResult = $this->fetch( $sQuery, 1 );
		// pr($rResult);
		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultFilterTotal);
		$iFilteredTotal = $rResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   $sTable LEFT JOIN $sTableJoin ON $sWhere
		";
		// pr($sQuery);
		$rResultTotal = $this->fetch( $sQuery, 1 );
		// print_r($rResultTotal);
		$iTotal = $rResultTotal[0];
		// pr($iTotal);
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($POST['sEcho']),
			"iTotalRecords" => $iTotal['COUNT(log.id)'],
			"iTotalDisplayRecords" => $iTotal['COUNT(log.id)'],
			"aaData" => array()
		);
		// pr($output);
		$no = $POST['iDisplayStart']+1;
		// pr($rResult);
		// pr($aColumnsSelect);
		foreach( $rResult as $key => $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumnsSelect) ; $i++ )
			{	
				// echo $aColumnsSelect[0];
				if ( $aColumnsSelect[$i] == "userid" )
				{
					/* Special output formatting for 'version' column */
					$sql1 = "SELECT username FROM user_member WHERE id = {$aRow[$aColumnsSelect[0]]}";
					// pr($sql);
					$usr = $this->fetch( $sql1 );
					// pr($usr);
					$row[] = $usr['username'];
					
				}
				else if ( $aColumnsSelect[$i] == "activityDesc" )
				{
					if ($aRow['activityId'] == '1'){
						$table="dtataruang_news_content";
					}elseif($aRow['activityId'] == '2'){
						$table="dtataruang_news_content_norma";
					}elseif($aRow['activityId'] == '3'){
						$table="dtataruang_news_content_peraturan";
					}elseif($aRow['activityId'] == '4'){
						$table="dtataruang_news_content_product";
					}elseif($aRow['activityId'] == '5'){
						$table="dtataruang_news_content_program";
					}elseif($aRow['activityId'] == '6'){
						$table="dtataruang_news_content_sig";
					}elseif($aRow['activityId'] == '7'){
						$table="dtataruang_news_content_sig";
					}elseif($aRow['activityId'] == '8'){
						$table="user_member";
					}
						
					$sql = "SELECT title FROM {$table} WHERE id = {$aRow[ $aColumnsSelect[$i] ]}";
					$title = $this->fetch( $sql );
					$row[] = $title['title'];
					
				}
				
				else if ( $aColumnsSelect[$i] != ' ' )
				{
					/* General output */
					$row[0] = $no;
					$row[] = $aRow[ $aColumnsSelect[$i] ];
					// pr($aColumns);
				}
			}
			$no++;
			$output['aaData'][] = $row;
		}
		// print_r($output);
		return $output;
		
	}	
}
?>