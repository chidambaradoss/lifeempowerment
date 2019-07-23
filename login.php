<?php
if((isset($login) || isset($_REQUEST['dlogin']))
) {
	

if(isset($_REQUEST['dlogin'])){
        $email=base64_decode($_REQUEST['username']);
        $password=base64_decode($_REQUEST['password']);
        $pass=md5($password);
} else {

	$email=$db->escapstr($email);
	$password=$db->escapstr($pwd);
	$pass=md5($password);
	}
	$ip=$_SERVER['REMOTE_ADDR'];
	$ldate=time();
	$result=$db->singlerec("SELECT * FROM register WHERE email='$email' AND password='$pass'");
	$id=$result['id'];
	$activestatus=$result['active_status'];
	if(empty($id)){
		echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
		$row="<div class='alert alert-danger'>Invalid login!</div>";
	}
	else if($activestatus==5){
		echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
		$delete="<div class='alert alert-danger'>Your login account deleted,If you want to login your account please contact admin </div>";
	}
	else if($activestatus==0){
		echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
		$row="<div class='alert alert-danger'>Your login account is not verified in your email</div>";
	} 
	else{	
		$_SESSION['userid']=$id;
		$db->insertrec("UPDATE register SET login_ip_addr='$ip',last_login_date='$ldate' WHERE id='$id'");
		echo "<script>location.href='userprofile.php';</script>";
		header("Location: userprofile.php");exit;
	}	
}


if(isset($getpass)) {
	$email=$db->escapstr($email);
	$count=$db->singlerec("SELECT count(*) as tot,fname FROM register WHERE email='$email'");
	$tot=$count['tot'];
	$fname=$count['fname'];
	if($tot==1){
		$pass=strtoupper(substr(uniqid(),0,6));
		$pw=md5($pass);
		$db->insertrec("UPDATE register SET password='$pw' WHERE email='$email'");
		$sub="User password";
		$mgs="Email:&nbsp; $email<br><br> Password:&nbsp; $pass";
		$message=$email_temp->forget($mgs,$siteinfo);
		$com_obj->email("",$email,$sub,$message);
		echo '<script>$(window).load(function(){$("#forget-password").modal("show"); });</script>';
		$show="<div class='alert alert-success'>We are sending new password in your email !</div>";
	}
	else{
		echo '<script>$(window).load(function(){$("#forget-password").modal("show"); });</script>';
		$show="<div class='alert alert-danger'>Your email id is invalid,Please enter your valid email id !</div>";
	}
	
}
?>