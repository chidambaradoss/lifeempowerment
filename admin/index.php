<? 	session_start();
	setcookie("HmAcc","",0,"/");
	@session_destroy();
	echo "<script>location.href='login.php';</script>"; 
	header("Location:login.php");
	exit;
?>