<?php
if(isset($register)) {
	$firstname=$db->escapstr($fname);
	$lastname=$db->escapstr($lname); 
	$email=$db->escapstr($email);
	$password=$db->escapstr($pwd);
	$pass=md5($password);
	$conpass=$db->escapstr($cpwd);
	$date=time();
	$code=base64_encode(time()*27);
	$ip=$_SERVER['REMOTE_ADDR'];
	$value = $db->check1column("register","email",$email);
	if($value==1){
		echo '<script>$(window).load(function(){$("#sign-up").modal("show"); });</script>';
		$text="<div class='alert alert-danger'>Account already exists!</div>";
	}
	else if($password!=$conpass){
		echo '<script>$(window).load(function(){$("#sign-up").modal("show"); });</script>';
		$text="<div class='alert alert-danger'>Password does not match!</div>";
	}
	else{
		$set ="fname='$firstname'";
		$set .=",lname='$lastname'";
		$set .=",email='$email'";
		$set .=",password='$pass'";
		$set .=",crcdt='$date'";
		$set .=",temp_key='$code'";
	
		$id=$db->insertid("INSERT INTO register set $set");
		$sub="Account activation";
		$url="$siteurl/confirm.php?code=$code";
		$msg=$email_temp->signup($url,$siteinfo);
		$com_obj->email("",$email,$sub,$msg);

		header("location:index.php?registered");
	}
}
?>
