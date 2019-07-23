<?php
include "admin/AMframe/config.php";
$user_id=isset($_SESSION['userid'])?$_SESSION['userid']:'';
if(!empty($user_id)){
	$ip=$_SERVER['REMOTE_ADDR'];
	$logdate=time();
	$log=$db->insertrec("UPDATE register SET logout_ip_addr='$ip',last_logout_date='$logdate' WHERE id='$user_id'");
	unset($_SESSION['userid']);
	session_destroy();
}
	echo "<script>location.href='index.php';</script>";
	header("Location:index.php");exit;
	?>