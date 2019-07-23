<?php include "admin/AMframe/config.php";
$crcdt=time();
$id=isset($id)? $id : '';
$price=isset($price) ? $price : '';
$user_id=isset($_SESSION['userid'])?$_SESSION['userid']:'';
$set="user_id='$user_id'";
$set.=",course_id='$id'";
$set.=",price='$price'";
$set.=",crcdt='$crcdt'";
	$record=$db->insertrec("insert into cart set $set");
	echo '1';
       
	?>

