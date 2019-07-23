<?php
include "includes/header.php"; 
//$payid=isset($payid)?base64_decode($payid):'';
//echo $payid;exit;
$getdetails=$db->singlerec("select * from bankdetails where id='1'");
$accno=$getdetails['accno'];
$accname=$getdetails['accname'];
$ifsc=$getdetails['ifsc'];
$banknm=$getdetails['bank_name']; 
$branch=$getdetails['branch'];
if(empty($user_id)){
	header("location:index.php");
}

if(isset($pay_now)){
	$carttid=$db->escapstr($carttid);
	$cartarr=explode(',',$carttid);
/* 	$cardname=$db->escapstr($cname);
	$cardnum=$db->escapstr($number);
	$cvvnum=$db->escapstr($cvv);
	$expmonth=$db->escapstr($month);
	$expyear=$db->escapstr($year); */
	$fname=$db->escapstr($fname);
	$lname=$db->escapstr($lname);
	$country=$userinfo['country'];
	
	$towncity=$userinfo['city'];
	$constate=$userinfo['state'];
	$zip=$db->escapstr($zipcode);
	$email=$db->escapstr($email);
	$phone=$db->escapstr($phonenumber);
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$paytype=$db->escapstr($paypal);
	foreach($cartarr as $cartt){
		$set="user_id='$user_id'";
		$set.=",course_id='$cartt'";
		/*$set.=",card_name='$cardname'";
		$set.=",card_number='$cardnum'";
		$set.=",cvv='$cvvnum'";
		$set.=",exp_month='$expmonth'";
		$set.=",exp_year='$expyear'"; */
		$set.=",first_name='$fname'";
		$set.=",last_name='$lname'";
		$set.=",country='$country'";
		$set.=",state='$constate'";
		$set.=",city='$towncity'";
		$set.=",zip='$zip'";
		$set.=",email='$email'";
		$set.=",mobile='$phone'";
		$set.=",crcdt='$date'";
		$set.=",ip_addr='$ip'";
		$set.=",pay_type='$paytype'";
		if(!empty($cartt)){
		$db->insertrec("insert into checkout set $set");
		}
		if($db){
			$db->insertrec("delete from cart where user_id='$user_id'");
		}
	}
		
	if($paytype==0){
$sub="Account Details";
	    $mgs="<table class='table table-striped' style='border:1px solid#dadada;'>
		 <tbody>
		 <tr>
		 <td>Account Number</td>
		 <td>&nbsp;&nbsp;$accno</td>
		 </tr>
		 <tr>
		 <td>Account Holder Name</td>
		 <td>&nbsp;&nbsp;$accname</td>
		 </tr>
		 <tr>
		 <td>Ifsc Code</td>
		 <td>&nbsp;&nbsp;$ifsc</td>
		 </tr>
		 <tr>
		 <td>Bank Name</td>
		 <td>&nbsp;&nbsp;$banknm</td>
		 </tr>
		 <tr>
		 <td>Branch Name</td>
		 <td>&nbsp;&nbsp;$branch</td>
		 </tr>
		 </tbody>
		 </table>";							  
	$message=$email_temp->bankdata($mgs,$siteinfo);
	$com_obj->email("",$email,$sub,$message);
		header("location:bank-details.php?added");
	}
	else{
		header("location:paypal.php");
	}
}?>

		<div id="content" class="site-content">
			<?php include "includes/findcourse.php"; ?>

			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">Checkout</h2>
						<div class="row">
							<div class="col-md-8">
								<div class="shipping-fields">
									
									<!--<h2>Pay Via Card</h2>-->
									<form class="form-horzandal" name="checkform" onsubmit="return ValidateCheckout()" method="POST" action="">
									   <!-- <div class="input-field clearfix">
											<input type="text" name="cname" placeholder="Name On Card" />
										</div>
										
										<div class="input-field pull-left col-2">
											<input type="text" name="number" placeholder="Card Number" />
										</div>
										
										<div class="input-field pull-right col-2">
											<input type="text" name="cvv" placeholder="CVV" />
										</div>
										
										
										<p>Expiration date</p>
										
										<div class="input-field pull-left col-2">
											<input type="text" name="month" placeholder="Month" />
										</div>
										
										<div class="input-field pull-right col-2">
											<input type="text" name="year" placeholder="Year" />
										</div> -->
									   
								
									<h2>User Details</h2>
									
									<div class="input-field pull-left col-2">
										<input type="text" name="fname" value="<?php echo $userinfo['fname']; ?>" placeholder="First Name *" readonly />
									</div><!-- .input-field -->

									<div class="input-field pull-right col-2">
										<input type="text" name="lname" value="<?php echo $userinfo['lname']; ?>" placeholder="Last Name" readonly />
									</div><!-- .input-field -->
									<div class="input-field">
										
										<?php  $country=$userinfo['country']; if(empty($country)){ 
														$coun='';
														}else{
															$name=$db->singlerec("SELECT country_name FROM country WHERE country_id='$country'");
															$coun=$name['country_name'];
														}
										?>
										<input type="text" name="country" value="<?php echo $coun; ?>" readonly>
										
									</div>


									<div class="input-field">
									<?php $city= $userinfo['city'];
											if(empty($city)){ 
												$citys='';
											}else{
												$citname=$db->singlerec("SELECT city_name FROM city WHERE city_id='$city'");
												$citys=$citname['city_name'];
											}
											?>
										<input type="text" name="towncity" value="<?php echo $citys; ?>" placeholder="Town/City *" readonly />
									</div>

									<div class="input-field">
									<?php $state=$userinfo['state'];
														if(empty($state)){ 
														$stat='';
														}else{
															$stname=$db->singlerec("SELECT state_name FROM state WHERE state_id='$state'");
															$stat=$stname['state_name'];
														}
									?>
									
										<input type="text" name="contrystate" value="<?php echo $stat; ?>" placeholder="Contry/States" readonly />
									</div>

									<div class="input-field">
										Pin<input type="text" name="zipcode" value="<?php echo $userinfo['zip_code']; ?>" placeholder="Post code/Zip *"readonly />
									</div>

									<div class="input-field pull-left col-2">
										Email<input type="text" name="email" value="<?php echo $userinfo['email']; ?>" placeholder="Email Address *" readonly />
									</div>

									<div class="input-field pull-right col-2">
										Phone<input type="text" name="phonenumber" value="<?php echo $userinfo['mobile']; ?>" placeholder="Phone Number" readonly />
									</div><!-- .input-field -->
																	
								</div><!-- .shipping-fields -->
							</div>

							<div class="col-md-4">
								<div class="your-order">
									<h2>Your Order</h2>
									<table>
										<thead>
											<tr>
												<th>Product</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
											<?php 
										$details=$db->get_all("select a.*,b.title,b.id as bid from cart as a inner join course as b on a.course_id=b.id where a.user_id='$user_id'");
										$total=0;
										$cartidarr=array();
										foreach($details as $det){
											$price=$det['price'];
											$total=$total+$price;
											$cartid=$det['bid'];
											array_push($cartidarr,$cartid);
										?>
											<tr>
												<td><?php echo $det['title']; ?></td>
												<td><?php echo $DCrncy.$det['price']; ?></td>
											</tr>
										<?php } ?>
									
										</tbody>
										<tfoot>
											<tr class="order-total">
												<th>Total</th>
												<td><span class="amount"><?php echo $DCrncy.$total ?></span></td>
											</tr>
										</tfoot>
									</table><br>
											
												<div class="radio">
													<input checked id="payment_method_cheque" type="radio" class="input-radio" name="paypal" value="0" checked="checked" />
													<label for="payment_method_cheque">Wire Transfer</label>
												</div><br>
											
											
												<!--<div class="radio">
													<input id="payment_method_paypal" type="radio" class="input-radio" name="paypal" value="1" />
													<label for="payment_method_paypal">PayPal</label>
												</div>-->
												
												<input type="hidden" name="carttid" value="<?php echo implode(',',$cartidarr) ?>"/>
												<?php
												$rec=$db->get_all("select * from cart where user_id='$user_id'");
												if(empty($rec)){
													echo $message='<font color="red" size="8em"><b>No courses in cart</b></font>';
												?>
													<input type="button" name="pay_now" value="Pay Now" class="button large rounded full place-order"/>
												<?php 	}
													else{
														?>
														<input type="submit" name="pay_now" value="Pay Now" class="button large rounded full place-order" />
													<? } ?>
												
												
									</form>	
									<!-- .checkout-payment -->
								</div><!-- your-order -->
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