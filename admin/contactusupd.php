	<?php include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Site Contact </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active"> Site Contact </li>
                            </ol>
                        </div>
                    </div>
<?php

$msg=isset($msg) ? $msg :''; 
if($submit){
	$address=$db->escapstr($address);
	$india_phn=$db->escapstr($india_phn);
	$usa_phn=$db->escapstr($usa_phn);
	$uk_phn=$db->escapstr($uk_phn);
	$email=$db->escapstr($email);
	
	$set="address='$address'";
	$set.=",india_phn='$india_phn'";
	$set.=",usa_phn='$usa_phn'";
	$set.=",uk_phn='$uk_phn'";
	$set.=",email='$email'";

		$db->insertrec("update contactus set $set where id='1'");
		$msg="<font color='Green' size='5em'>Contact updated successfully</font>";
}	

$GetRecord=$db->singlerec("select * from contactus where id='1'");
@extract($GetRecord);
$address=stripslashes($address);
$india_phn=stripslashes($india_phn);
$usa_phn=stripslashes($usa_phn);
$uk_phn=stripslashes($uk_phn);
$email=stripslashes($email); 
?>			
					
<h3>View Contact Details</h3></br>
<div class="panel">

<div class="panel-heading">

	</div>
		<div class="panel-body">
		 <?php echo $msg ?> 
			<table>

				<thead>
				
					<form method="post" action="contactusupd.php" class="form-horizontal">
					
					<tr>
						<td valign="top"><label valign="top">Address <font color="red">*</font></label></td>
						<td><textarea name="address" class="form-control tiny" rows="4" cols="45"><?php echo $address; ?></textarea></td>
					</tr>
					<tr>
						<td><label>USA Phoneno<font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="usa_phn" value="<?=$usa_phn; ?>" placeholder="Enter USA phnno" required></td>
					</tr>
					<tr>
						<td><label>NIGERIA PhoneNo <font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="india_phn" value="<?php echo $india_phn; ?>" placeholder="Enter India phnno" required></td>
					</tr>
					
					<tr>
						<td><label>GHANA PhoneNo<font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="uk_phn" value="<? echo $uk_phn; ?>" placeholder="Enter UK phnno" required></td>
					</tr>
					
					<tr>
						<td ><label>Email<font color="red">*</font></label></label></td>
						<td><input name="email" class="form-control" value="<?echo $email;?>" placeholder="Enter email"></td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
						<input type="submit" name="submit" class="btn btn-primary" value="Save">
						<input type="reset" name="reset" class="btn btn-primary" value="Reset">
						</td>
					</tr>
					</form>
				</thead>
			</table>
		</div>
	</div>
</div>
					

					
					<!--END CONTENT CONTAINER-->
<? include "leftmenu.php"; ?>	
</div>
<?

include "footer.php";
?>