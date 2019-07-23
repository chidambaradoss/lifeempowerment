<?php
include "includes/header.php"; 
$getdetails=$db->singlerec("select * from bankdetails where id='1'");?>
		<div id="content" class="site-content">
			<?php include "includes/findcourse.php"; ?>
			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">Bank Details</h2>
						<div class="row">
							<div class="col-md-8">
							<?php if(isset($added)){
								echo "<script>swal('Success','Bank details are send it to your email Successfully','success')</script>";
								echo"<div class='alert alert-success'>Transfer money to the following account to complete course purchase. Once your payment has been completed, You can view the course videos.</div>";
							} ?>
								<div class="shipping-fields">
									<center>
									<h2>Bank Details</h2>
									
									    <table class="table table-striped" style="border:1px solid#dadada;">
										   <tbody>
										      <tr>
											    <td>Account Number</td>
												<td><?php echo $getdetails['accno']; ?></td>
											  </tr>
											  
											  <tr>
											    <td>Account Holder Name</td>
												<td><?php echo $getdetails['accname']; ?></td>
											  </tr>
											  
											  <tr>
											    <td>Ifsc Code</td>
												<td><?php echo $getdetails['ifsc']; ?></td>
											  </tr>
											  <tr>
											    <td>Bank Name</td>
												<td><?php echo $getdetails['bank_name']; ?></td>
											  </tr>
											  
											  <tr>
											    <td>Branch Name</td>
												<td><?php echo $getdetails['branch']; ?></td>
											  </tr>
										   </tbody>
										</table>
									</center>										
								</div><!-- .shipping-fields -->
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #our-university -->
			</main><!-- .site-main -->
		</div><!-- .site-content -->
<?php include "includes/footer.php"; ?>	
<script> 	
	function ValidateCheckout()  
	{ 
		//fname validation fn field is required
		var a = document.checkform.cname.value;
    if (a == "") {
        swal("Oops...","Name on card field is required","error" );
        return false;
    }
	//lname validation
		var b = document.checkform.number.value;
    if (b == "") {
        swal("Oops...","Card number field is required","error");
        return false;
    }
		var c = document.checkform.cvv.value;
	if (c == "") {
        swal("Oops...","CVV field is required","error");
        return false;
    }
		var d = document.checkform.month.value;
	if (d == "") {
        swal("Oops...","Month field is required","error");
        return false;
    }
		var e = document.checkform.year.value;
	if (e == "") {
        swal("Oops...","Year field is required","error");
        return false;
    }
}
</script>