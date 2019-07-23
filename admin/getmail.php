<?php
include ('AMframe/config.php');
$email=isset($email)?$email:'';
if(!empty($email)){
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$count=$db->numrows("select * from register where email='$email'");
			if($count==0){
				echo json_encode(array("status"=>"succ"));
			}else{
				echo json_encode(array("status"=>"fail"));
			}
	}
	else{
		echo json_encode(array("status"=>"fails"));
	}
}
?>
