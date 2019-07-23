<?php
include "admin/AMframe/config.php";
$crcdt=time();
$ipaddr=$_SERVER['REMOTE_ADDR'];
$pid=isset($pid) ? $pid : '';
$user_id=isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$set="from_id='$user_id'";
$set.=",to_id='$pid'";
$set.=",crcdt='$crcdt'";
$set.=",ip_addr='$ipaddr'";
$statusvalue=$db->singlerec("select status from follows where from_id='$user_id' and to_id='$pid'");

if($statusvalue==''){
	$status='1';
	$set.=",status='$status'";
	$db->insertrec("insert into follows set $set"); 
	echo "UnFollow";
 }
elseif($statusvalue='1'){
	$db->insertrec("delete from follows where from_id='$user_id' and to_id='$pid'");
	echo "Follow";
}
?>