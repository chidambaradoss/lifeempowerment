<?php
include "AMframe/config.php";
$get_val = $_REQUEST['get_val'];
$get_val = str_replace("www.","",$get_val);
if($get_val !="192.168.1.48"){ 
 $get_val= $_SERVER['HTTP_HOST']; 
 $get_val = str_replace("www.","",$get_val);
}
$getva = md5($get_val);
$GetRec = $db->singlerec("select cms_on from cms");
@extract($GetRec);
if($cms_on != $getva){
    $data = base64_encode($get_val);
	 $db->insertrec("update cms set cms_approve_st='$data',cms_approve ='$getva'");
}
?>