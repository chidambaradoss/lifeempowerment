<?php include "admin/AMframe/config.php";
$crcdt=time();
$id=isset($id) ? $id :'';
$user_id=isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$set="user_id='$user_id'";
$set.=",course_id='$id'";
$set.=",crcdt='$crcdt'";
$ipaddr=$_SERVER['REMOTE_ADDR'];
$set.=",ip_addr='$ipaddr'";
	$success=$db->insertid("insert into wishlist set $set");
	if($success!="")
		 echo '<li><a href="#"><i class="fa fa-heart fa-2x" data-toggle="tooltip" title="Already added">Wishlist</i></a> </li>'; 


?>
