<?php include "header.php"; 
$text=isset($text)?$text:'';
if($submit){
	$accno=$db->escapstr($accno);
	$accname=$db->escapstr($accname);
	$ifsc=$db->escapstr($ifsc);
	$bank_name=$db->escapstr($bank_name);
	$branch=$db->escapstr($branch);
	
	$set="bank_name='$bank_name'";
	$set.=",accno='$accno'";
	$set.=",accname='$accname'";
	$set.=",ifsc='$ifsc'";
	$set.=",branch='$branch'";

	$db->insertrec("update bankdetails set $set where id='1'");
	$text="<font color='Green' size='5em'>Bank details updated successfully</font>";
}
	$bankdetail=$db->singlerec("select * from bankdetails where id='1'");
	@extract($bankdetail);
	
?>
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
			
					
<h3>View Bank Account Details</h3></br>
<div class="panel">
 <?php echo $text; ?> 
<div class="panel-heading">

	</div>
		<div class="panel-body">
		
			<table>

				<thead>
				
					<form method="post" action="bankdetails.php" class="form-horizontal">
					
					<tr>
						<td ><label >Account Number <font color="red">*</font></label></td>
						<td><input type="text" name="accno" value="<?php echo $accno; ?>"  class="form-control"  placeholder="Enter Account Number" required></td>
					</tr>
					
					<tr>
						<td><label>Account Name <font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="accname" value="<?php echo $accname;?>" placeholder="Enter Account Name" required></td>
					</tr>
					<tr>
						<td><label>Ifsc Code <font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="ifsc" value="<?php echo $ifsc; ?>" placeholder="Enter Ifsc Code" required></td>
					</tr>
					<tr>
						<td><label>Bank Name<font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="bank_name" value="<?php echo $bank_name; ?>" placeholder="Enter Bank Name" required></td>
					</tr>
					<tr>
						<td><label>Branch name<font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="branch" value="<?php echo $branch; ?>" placeholder="Enter Branch Name" required></td>
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