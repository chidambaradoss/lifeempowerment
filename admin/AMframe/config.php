<?php
error_reporting(1);
date_default_timezone_set("Asia/Calcutta");
include "framedb.php";
include "global.php";
include "routing.php";
include "dropdownelement.php";
include "images.php";
include "common.php"; 
include "emailtemplate.php"; 
include "resize-class.php";

$db=new database();

$GLOBALS['db']=$db;
$com_obj= new common();
$drop = new dropdown;
$imgobj = new images;
$email_temp = new emailtemplate();

$captchasitekey = "6LeJcxoUAAAAAAzcRUIyzcu1ET5EXMgR20eIL8Ab";
$captchasecretkey = "6LeJcxoUAAAAALtRkRl6jHMGZ0utWGj9CT_-MSCX";
$GetSite = $db->singlerec("select * from general_setting where active_status='1'");

$sitelogo = $GetSite['img'];
$sitetitle = $GetSite['website_title'];
$sitetitle_main = $sitetitle;
$siteurl = $GetSite['website_url'];
$siteemail = $GetSite['admin_email'];
$admin_fee = $GetSite['onepoint'];
$from_email = $siteemail;
$fburl = $GetSite['fburl'];
$twurl = $GetSite['twurl'];
$gpurl = $GetSite['gplusurl'];
$lnurl = $GetSite['linkedinurl'];

$sitepaypalemil = $GetSite['paypal_email'];

$siteinfo = array("siteemail"=>$siteemail,"siteurl"=>$siteurl,
					"sitetitle"=>$sitetitle,
					"sitelogo"=>$sitelogo,
					"fburl"=>$fburl,
					"twurl"=>$twurl,
					"gpurl"=>$gpurl,
					"lnurl"=>$lnurl);
					
$date = date("d-m-Y H:i:s");

$GetCMS = $db->singlerec("select * from cms where active_status='1'");

$cms_on = $GetCMS['cms_on'];					
$cms_approve = $GetCMS['cms_approve'];					
$cms_approve_st = $GetCMS['cms_approve_st'];					

function textwatermark($src, $watermark, $save=NULL) { 
	$getext = substr(strrchr($src, '.'), 1);
	$ext = strtolower($getext);
	list($width, $height) = getimagesize($src);
	$image_p = imagecreatetruecolor($width, $height);
	if($ext == "png")
		$image = imagecreatefrompng($src);
	else if($ext == "jpeg" || $ext == "jpg")
		$image = imagecreatefromjpeg($src);
	else if($ext == "gif")
		$image = imagecreatefromgif($src);
	
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
	$txtcolor = imagecolorallocate($image_p, 255, 255, 255);
	$font = 'monofont.ttf';
	$font_size = 14;
	imagettftext($image_p, $font_size, 0, 50, 150, $txtcolor, $font, $watermark);
	if ($save<>'') {
		imagejpeg ($image_p, $save, 100); 
	}
	else {
		header('Content-Type: image/jpeg');
		imagejpeg($image_p, null, 100);
	}
	imagedestroy($image); 
	imagedestroy($image_p); 
}

function currency($from_Currency, $to_Currency, $amount) {
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt ($ch, CURLOPT_USERAGENT,
                 "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
	
    $data = explode('bld>', $rawdata);
    $data = explode($to_Currency, $data[1]);
    return round($data[0], 2);
}

function getCountry($id){
	GLOBAL $db;
	$country = $db->singlerec("select country_name from country where country_id='$id'");
	return $country[0];
}

function getState($id){
	GLOBAL $db;
	$state = $db->singlerec("select state_name from state where state_id='$id'");
	return $state[0];
}

function getCity($id){
	GLOBAL $db;
	$city = $db->singlerec("select city_name from city where city_id='$id'");
	return $city[0];
}

function checkLength($str,$len){
	$strs = (strlen($str)>$len)?substr($str,0,$len).'...':$str;
	return $strs;
}

function isApproved($user_id){
	GLOBAL $db;
	$approve_status = $db->singlerec("select approve_status from register where id='$user_id'");
	return (int)$approve_status[0];
}

function userInfo($id,$col){
	GLOBAL $db;
	$user = $db->singlerec("select $col from register where id='$id'");
	return $user[0];
}

function ss_start(){
	$checkUrl = substr($_SERVER['HTTP_HOST'],0,9);
	if($checkUrl!='192.168.1' && $checkUrl!='localhost'){
	//session_save_path("/home/thavasu/tmp");
	//ini_set('session.gc_probability',1);
	}
	@session_start();
}
ss_start();
ob_start();

$DCrncy="$";
?>