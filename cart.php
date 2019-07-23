<?php include "includes/header.php"; 
if(empty($user_id)){
	header("location:index.php");
}
?>
		<div id="content" class="site-content">
			<?php include "includes/findcourse.php"; ?>

			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">Shopping Cart</h2>
						<div class="row">
							<div class="col-md-8">
								<form class="cart-form" action="#" />
									<div class="table-responsive">
										<table class="table cart-table" id="removecartt">
											<thead>
												<tr>
													<th></th>
													<th class="product-name">Course</th>
													<th>Name of the course</th>
													
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
											
												<?php
													$details=$db->get_all("select a.*,b.img1,title from cart as a inner join course as b on a.course_id=b.id where a.user_id='$user_id'");
													$total=0;
													foreach($details as $det){
														$courseprice=$det['price'];
														$total=$total+$courseprice;
														
													?>	
												<tr>
												
													<td class="product-remove">
														<a href="javascript:;" class="remove"><i class="fa fa-times" id="removecart" onclick="deletecart(<?php echo $det['course_id'] ?>)"></i></a>
													</td>
													
													<td class="product-name">
														<a href="singlecourse.php?cid=<?php echo base64_encode($det['course_id'])?>">
															<img src="<?php echo 'uploads/course_images/'.$det['img1'] ?>" alt="" width="150"/>
														</a>
													</td>
													<td class="product-price">
														<p class="price"><?php echo $det['title'] ?></p>
													</td>
													
													<td class="product-subtotal">
														<p class="price"><?php echo $DCrncy.$det['price'] ?></p>
													</td>
													<? } ?>	
												</tr>
												
											</tbody>
										</table>
									</div>
								</form>
							</div>

							<div class="col-md-4">
								<div class="cart-collaterals">
									<h2>Cart Totals</h2>
									<table>
										<tbody>
											<tr class="cart-subtotal">
												<th>Subtotal:</th>
												<td><span class="amount"><?php echo $DCrncy.$total ?></span></td>
											</tr>
											

											<tr class="order-total">
											
												<th>Total</th>
												<td><span class="amount"><?php echo $DCrncy.$total ?></span></td>
											</tr>
										</tbody>
									</table>
									<?php
									$rec=$db->get_all("select * from cart where user_id='$user_id'");
										if(empty($rec)){
											echo $message='<font color="red" size="8em"><b>No courses in cart</b></font>';
											?>
											<a class="button large full rounded proceed-checkout">Proceed to Checkout<i class="fa fa-long-arrow-right"></i></a>
										<?php }
										else{		
										?>			
									<a class="button large full rounded proceed-checkout" href="cartcheckout.php">Proceed to Checkout<i class="fa fa-long-arrow-right"></i></a>
										<?php } ?>
								</div><!-- .cart-collaterals -->
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #our-university -->
			</main><!-- .site-main -->
		</div><!-- .site-content -->
<script type="text/javascript">
function deletecart(course_id)
{

	$.ajax({
		url:"deletecartajax.php?course_id="+course_id,
		success:function(result)
		{
			$('#removecart').html(result);
			$("#removecartt").load(location.href + " #removecartt");
		}
	})
}
</script>


	<?php include "includes/footer.php"; ?>
	</div><!-- #wrapper -->

</body>
</html>
