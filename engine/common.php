<?php

/* Kumpulan fungsi umum yang sering digunakan */

function base_url() {
	global $config;
	
	$base_url = $config['base_url'];
	
	return $base_url;
}

function changeDate($date=false)
{
	if (!$date) return false;
	$changeFormat = date("j F Y",strtotime($date));
	
	return $changeFormat;
}

function change_date_simple($date_data, $type, $order_by)
{
	/* ex : change_date_to_slash('2012-01-01', 'slash', 'by_date') */
	
	($date_data !='') ? $status = 1 : exit ('Date not complete');
	
	if ($type == 'slash')
	{
		list ($tahun, $bulan, $tanggal) = explode ('-',$date_data);
	
		if ($order_by == 'by_year') $new_date = "$tahun/$bulan/$tanggal";
		if ($order_by == 'by_month') $new_date = "$bulan/$tanggal/$tahun";
		if ($order_by == 'by_date') $new_date = "$tanggal/$bulan/$tahun";
	}
	else if ($type == 'strip')
	{
		list ($tahun, $bulan, $tanggal) = explode ('/',$date_data);
	
		if ($order_by == 'by_year') $new_date = "$tahun-$bulan-$tanggal";
		if ($order_by == 'by_month') $new_date = "$bulan-$tanggal-$tahun";
		if ($order_by == 'by_date') $new_date = "$tanggal-$bulan-$tahun";
	}
	
}
	
function simple_paging($paging_data, $limit)
{
	if ($paging_data==0)
	{
		echo '<script type=text/javascript>alert("Page Not Found"); window.location.href="?pid=1";</script>';
	}
	if ($paging_data== 1)
	{
		$paging = ((($paging_data - 1) * $limit));
	}else
	{
		$paging = ((($paging_data - 1) * $limit) + 1);
	}
	
	return $paging;
}
	
function form_validation($data)
{
	if (!$data) return false;
	$valid_post_vars = $data;
						
	$dataArr = array ();			
	foreach ($valid_post_vars as $key => $value) {
		//echo $key;
		//echo $value;
		//$prefix_post_vars = "p_";
		//$valid_post_var_name = $prefix_post_vars . $i_vpv;
		
		$valid_post_var_value = trim(htmlspecialchars($value));
		
		//$$valid_post_var_name = $valid_post_var_value;

		$dataArr[$key] = $valid_post_var_value;
		
	}
	
	return $dataArr;
	//print_r($dataArr);
}
	
function clear_var($data)
{
	return $$data = '';
}

function under_development() {

	echo 'Maaf, Situs ini sedang dalam perbaikan';
	
	exit;
}

function redirect($data) {
	
	echo "<meta http-equiv=\"Refresh\" content=\"0; url={$data}\">";

}

function uploadFile($data,$path=null) {
	// echo "masuk";
	// exit;
	global $CONFIG;
	
	if (array_key_exists('admin',$CONFIG)) $key = 'admin';
	if (array_key_exists('default',$CONFIG)) $key = 'default';
	
	if ($path!='') $path = $path.'/';
	$pathFile = $CONFIG[$key]['upload_path'].$path;
	$ext = explode ('.',$_FILES[$data]["name"]);
	$countExt = count($ext);
	$getExt = $ext[$countExt-1];
	$shufflefilename = md5(str_shuffle('codekir-v0.3'.$CONFIG[$key]['max_filesize']));
	$filename = $shufflefilename.'.'.$getExt;
	// echo $filename;
	
	if ($_FILES[$data]["error"] > 0)
		{
			echo "Return Code: " . $_FILES[$data]["error"] . "<br>";
		}
	else
		{
			$_FILES[$data]["name"];
			($_FILES[$data]["size"] / $CONFIG[$key]['max_filesize']);
			$_FILES[$data]["tmp_name"];
		if (file_exists($pathFile. $_FILES[$data]["name"]))
		  {
				$failed_result = 0;
				return $failed_result;
		  }
		else
		  {
				// pr($pathFile. $filename);exit;
				move_uploaded_file($_FILES[$data]["tmp_name"],$pathFile . $filename);
				$result['status'] = 1;
				$result['filename'] = $filename;
				// pr($result);
				return $result;
		  }
		}
		// pr($_FILES[$data]);
		// exit;
		// echo $filename;
		return $filename;
}

function deleteFile($data=null, $path=null)
{		
	global $CONFIG;
	
	if (array_key_exists('admin',$CONFIG)) $key = 'admin';
	if (array_key_exists('default',$CONFIG)) $key = 'default';
	
	if ($data == null) return false;
	if ($path!='') $path = $path.'/';
	$fileName = $CONFIG[$key]['upload_path'].$data;
	if (is_file($fileName)){
		unlink($fileName);
	}else{
		return false;
	}
	
}

function encode($data=false)
{
	$hasil = base64_encode(serialize($data));
	return $hasil;
}

function decode($data=false)
{
	$hasil = unserialize(base64_decode($data));
	return $hasil;
}

function getindexzip($name=null)
{
	
	if ($name==null) return false;
	
	$zip = new ZipArchive;

	if ($zip->open($name) == TRUE) {
		for ($i = 0; $i < $zip->numFiles; $i++) {
			$filename[] = $zip->getNameIndex($i);
		 
		}
	}
	
	if (is_array($filename)) return $filename;
	return false;
}

function unzip($name=null)
{
	global $CONFIG;
	
	if ($name==null) return false;
	
	$zip = new ZipArchive;
	if ($zip->open($name) === TRUE) {
		$zip->extractTo($CONFIG['zip']['path']);
		$zip->close();
		return true;
	} 
	
	return false;
}

function e($data=false)
{
	if (!$data) return false;
	echo $data;
}


/* 
	function untuk menghasilkan jumlah hal, item per page, batas dan halaman
*/
function paging($count_data=false,$item_per_page=5){
	
   if (!$count_data) return false;
   // untuk memberikan nilai pada $page berdasarkan hasil GET pada variable page   
   $page =  isset($_GET['page']) ? $_GET['page'] : 1 ;
  
   // melakukan kondisi jika nilai $page kosong maka akan diberikan nilai 1   
   if( ( $page < 1) && (empty( $page ) ) ){
      $page=1;
   }
   // menghitung jumlah halaman yang akan dibuat   
   $jumlah_hal    = ceil($count_data/$item_per_page );
   
   // untuk membatasi agar nilai page tidak lebih besar dari jumlah halaman
   if( $page>$jumlah_hal ){
      $page=$jumlah_hal;
   }   
  
   // menghitung nilai batas awal yang digunakan saat query nanti
   $batas = ($page - 1) * $item_per_page;
  
   // menyimpan semua dalam bentuk array kedalam $paging
   $paging['item_per_page']=$item_per_page;
   $paging['batas']=$batas;
   $paging['jumlah_hal']=$jumlah_hal;
   $paging['page']=$page;
   return $paging;
} 
/*
	function yang digunakan untuk men-generate paging
*/
function generate_paging($paging=false,$url=false,$param=false){

	if(!$paging or !$url)return false;
	// memberikan nilai terhadap $page dan $jumlah_hal dari nilai $paging yang diterima
	$page=$paging['page'];
	$jumlah_hal=$paging['jumlah_hal'];
	
	$x=form_validation($_GET);
	
	if(isset($x['id'])){
	
		$id=$x['id'];
		
		$page_cond="&page=";
		
	}else{
	
		$page_cond="?page=";
	
	}
	
	if(isset($_GET['page'])){$pnumber = $_GET['page'];}else{$pnumber=1;}
	
	echo "<center>
			<ul class=\"pagination\">";
				  
	// menampilkan link First
	if ($pnumber > 1){
		// echo  "<li><a href='".$url.$page_cond.('1').$param."'>First</a></li>";
		echo  "<li ><a href=\"".$url.$page_cond.('1').$param."\">&laquo;</a></li>";
	}else{
		echo  "<li class=\"disabled\"><a href=\"#\">&laquo;</a></li>";
	}
	
	// menampilkan link Prev
	if ($pnumber > 1){
		echo  "<li><a href='".$url.$page_cond.($pnumber-1).$param."'>Prev</a></li>";
	}else{
		echo  "<li class=\"disabled\"><a href='#'>Prev</a></li>";
	}


	/*
		menampilkan nomor per halaman beserta linknya
		tapi bagian yang ini lum ngerti alurnyaa hahahahahah
	*/
	for($halaman = 1; $halaman <= $jumlah_hal; $halaman++)
	{
			 if ((($halaman >= $page - 3) && ($halaman <= $page + 3)) || ($halaman == 1) || ($halaman == $jumlah_hal)) 
			 {   
			    				
				if ($halaman == $page){ 
					echo " <li  class='active'><a href='#'><b>".$halaman."</b></a><li> ";
				}else{ 
					echo "<li> <a href='".$url.$page_cond.$halaman.$param."'>".$halaman."</a><li> ";
				}
						
			 }
	}

	// menampilkan link next
	if ($pnumber < $jumlah_hal){ 
		echo "<li><a href='".$url.$page_cond.($pnumber+1).$param."'>Next</a></li>";
	}else{
		echo "<li class=\"disabled\"><a href='' class='active'>Next</a></li>";
	}
	
	// menampilkan link Last
	if ($pnumber < $jumlah_hal){ 
		echo "<li class=\"disabled\"><a href=\"".$url.$page_cond.($jumlah_hal).$param."\">&raquo;</a></li>";
	}else{
		echo "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
	}
	
	echo 	"</ul>
			</center>";
}

function parseUri($data,$position=3)
{
	if (!$data) return false;
	
	$i = 0;
	$uriFriendly = false;
	foreach ($data as $key => $val){
		
		if ($i==0) $uriFriendly = $key;
		$i++;
	}
	
	if ($uriFriendly){
		$exp = explode('/',$uriFriendly);
	}
	
	$realLink = $exp[$position];
	if ($realLink){
		$expLink = explode('-',$realLink);
	}
	
	if ($expLink) return $expLink[0];
	return false;
}	

//----
function sub_top_menu($css_bg,$css_a=false,$title_menu=0,$link_menu=0){
		global $basedomain;
		if($title_menu=='0'){
		
		echo '<div class="row-fluid sub_top_menu '.$css_bg.'"></div>';
			
		}else{
		
		echo'<div class="row-fluid sub_top_menu '.$css_bg.'">
				<div class="span1"></div>
				<div class="span10">
					<div class="laper3"></div>';
					
						$i=0;
						foreach ($title_menu as $key=>$val){	

						
						echo '<a class="menu '.$css_a.'" href="'.$basedomain.$link_menu[$i].'"><div>'.$val.'</div></a>';

						$i++;
						}				
					
				
		echo		'</div>
				<div class="span1"></div>
			</div>';
		}
	}
	
	function box_legend($css_box,$title_page,$link_title_page){
		
		$i=0; 
		foreach ($title_page as $key=>$val){ 
		
			$newArr[] = "<a href='".$link_title_page[$i]."'>".$val."</a>"; 
			$i++; 
		} 
		
		$data_link_page= implode('&nbsp;&raquo;&nbsp;',$newArr);
		
		echo'<div class="row-fluid '.$css_box.'">
				<div class="span1"></div>
				<div class="span10">
					<p class="legend">';
		echo $data_link_page;
		echo		'</p>
				</div>
				<div class="span1"></div>
			</div>';
	
	}
	
	function getData_tahun($tahun_awal,$realyear='2014'){
		$tahunawal=$tahun_awal;
		$tahunsekarang=date("Y");
		if ($tahunsekarang < $realyear) $tahunsekarang = $realyear;
		$jaraktahun=$tahunsekarang-$tahunawal;
	
		for ($i = 1; $i <= $jaraktahun+1; $i++) {
			echo '<option value="'.$tahunawal.'">'.$tahunawal.'</option>';
			$tahunawal++;
		}
	}
	
	function maxupload($image=true,$video=false)
	{
		global $CONFIG;
		$byte2Mb = intval($CONFIG['admin']['max_filesize'] / 2048);
		if ($byte2Mb>2)$byte2Mb=2;
		if ($image) echo "Max. upload file ".$byte2Mb." MB";
		
	}
	
	function slash($data=false){
		
		if (!$data) return false;
		return	addslashes(html_entity_decode($data));
	
	}
	
	function provLocation($data,$on=false,$updateid=false,$require=false){
		// pr($data);
		// echo $on;
		// pr($updateid);
		
		// exit;
		global $CONFIG;
		if (array_key_exists('admin',$CONFIG)) $width = "style='width:100%'";
		if (array_key_exists('default',$CONFIG)) $width = '';
		if($require) $required = $require; else $required="";
		if($on=="on") $onchange="onchange='autoLocation(\"provinsi\",\"kabupaten\")'"; else $onchange="";
		echo "<select class='span3' name='provinsi' id='provinsi' {$onchange} {$width} {$required}>
		<option value=''>- Pilih Provinsi -</option>";
		if($data){
			foreach($data as $val){
				if($updateid!=""){
					if($val['kode_wilayah']==$updateid){
						$selected="selected";
					} else {
						$selected="";
					}
				}
				echo "<option value='".$val['kode_wilayah']."_".$val['nama_wilayah']."' {$selected}>{$val['nama_wilayah']}</option>";
			}
		}
		echo "</select>";
	}
	
	function kabLocation($on=false,$data=false,$updateid=false,$require=false){
		global $CONFIG;
		if (array_key_exists('admin',$CONFIG)) $width = "style='width:100%'";
		if (array_key_exists('default',$CONFIG)) $width = '';
		if($require) $required = $require; else $required="";
		if($on=="on") $onchange="onchange='autoLocation(\"kabupaten\",\"kecamatan\")'"; else $onchange="";
		if(!$data){
			echo "<select class='span2' name='kabupaten' id='kabupaten' {$onchange} {$width} {$required}>
				<option value=''>- Pilih Kab / Kota -</option>
			</select>";
		} else {
			echo "<select class='span2' name='kabupaten' id='kabupaten' {$onchange} {$width} {$required}>
				<option value=''>- Pilih Kab / Kota -</option>
			";
			if($data){
				foreach($data as $val){
					if($updateid!=""){
						if($val['kode_wilayah']==$updateid){
							$selected="selected";
						} else {
							$selected="";
						}
					}
					echo "<option value='".$val['kode_wilayah']."_".$val['nama_wilayah']."' {$selected}>{$val['nama_wilayah']}</option>";
				}
			}
			echo "</select>";
		}
	}
	
	function kecLocation($updateid=false){
		global $CONFIG;
		if (array_key_exists('admin',$CONFIG)) $width = "style='width:100%'";
		if (array_key_exists('default',$CONFIG)) $width = '';
		echo "<select class='span2' name='kabupaten' id='kabupaten' {$width}></select>";
	}

	function date_display($date,$type=false){
		if(!$type){
			return date_format(date_create($date), 'l\,\ jS F Y');
		} elseif($type==1){
			return date_format(date_create($date), 'F jS\,\ Y');
		}
	}
	
	function date2Ind($str) {
	setlocale (LC_TIME, 'id_ID');
	$date = strftime( "%A, %d %B %Y", strtotime($str));

	return $date;
	}	
	
function sendMail($company_e_mail,$subject,$isi){
	error_reporting(E_ALL ^ E_NOTICE);
	global $basedomain;
	
	$plugin_mail_path = "libs/PHPMailer_v5.1/class.phpmailer.php";
	// pr($plugin_mail_path);
	require_once($plugin_mail_path);
	
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

	$mail->IsSMTP(); // telling the class to use SMTP

	try {


	ob_start();
	  $mail->Host       = "mail.gmail.com"; // SMTP server
	  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	  $mail->Username   = "trinata.webmail@gmail.com";  // GMAIL username
	  $mail->Password   = "testermail";            // GMAIL password
	  $mail->AddReplyTo('trinata.webmail@gmail.com', 'No Reply');
	  $mail->AddAddress($company_e_mail, 'Customer');
	  $mail->SetFrom('trinata.webmail@gmail.com', 'KKP');
	  $mail->AddReplyTo('trinata.webmail@gmail.com', 'No Reply');
	  $mail->Subject = $subject;
	  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	  $mail->MsgHTML($isi);
	  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
	  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
	   
	  $mail->Send();
 
	 ob_end_clean();
	  // echo "Message Sent OK</p>\n";
	} catch (phpmailerException $e) {
	  // echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
	  // echo $e->getMessage(); //Boring error messages from anything else!
	}
}
?>
