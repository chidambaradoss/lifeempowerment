<?
session_start();
setcookie("HmAcc","",0,"/");
@session_destroy();
echo "<script>location.href='index.php'</script>";
?>