<?php if(isset($subscribe)){
	$email=$db->escapstr($email);
	$result=$db->singlerec("SELECT email FROM newsletter WHERE email='$email'");
	$date=time();
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$set ="email='$email'";
	$set .=",crcdt='$date'";
	$set .=",ip_addr='$ip'";
	if($result['email']==$email){
		echo"<script>swal('Oops...', 'Invalid email address!', 'error')</script>";
	}
	else{
		$db->insertrec("INSERT INTO newsletter SET $set ");		
		echo"<script>swal('Great', 'Your subscribe email was sent successfully!', 'success')</script>";
	}
} ?>	
	<div id="bottom" class="site-bottom">
			<div class="container">
				<div class="footer-widget bottom1">
					<div class="row">
						<div class="col-md-3 col-md-6">
							<div class="widget">
								<h3 class="widget-title">Top Courses</h3>
								<ul>
									<?php  $topcrs=$db->get_all("select title,id from course where active_status='1' order by rand() limit 6");foreach($topcrs as $top){ ?>
									<li><a href="singlecourse.php?cid=<?php echo base64_encode($top['id']); ?>"><?php echo $top['title']; ?></a></li>
									<? } ?>
									
								</ul>
							</div><!-- .widget -->
						</div>

						<div class="col-md-3 col-md-6">
							<div class="widget">
								<h3 class="widget-title">Top Categories</h3>
								<ul>
									<?php $topcat=$db->get_all("select cat,id from course where active_status='1' order by rand() limit 6");foreach($topcat as $cat){ ?>
								<li><a href="singlecourse.php?cid=<?php echo base64_encode($cat['id']); ?>"><?php $catid=$cat['cat']; $cate=$db->singlerec("SELECT category_name FROM category WHERE id='$catid'"); echo $cate ['category_name'];?></a></li>
								<? } ?>
								</ul>
							</div><!-- .widget -->
						</div>

						<div class="col-md-3 col-md-6">
							<div class="widget contact-widget">
								<h3 class="widget-title">Contact Us</h3>
								<ul>
								<?php
								$contact=$db->singlerec("select * from contactus where id='1'");?>
									<li class="address"><?=$contact['address'] ?></li>
									<li class="mobile">USA <?= $contact['usa_phn'] ?></li>
									<li class="mobile">NIGERIA <?= $contact['india_phn'] ?></li>
									<li class="mobile">GHANA <?= $contact['uk_phn'] ?></li>
									<li class="email"><a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a></li>
									
								</ul>
								
							</div><!-- .widget -->
						</div>
						
						<div class="col-md-3 col-md-6">
							<div class="widget">
								<h3 class="widget-title">Our Socials</h3>
								<p>Follow Us </p>
								<div class="socials">
									<ul>
										<li><a href="<?php echo $fburl; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php echo $twurl; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?php echo $gpurl; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a href="<?php echo $lnurl; ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
									</ul>
								</div>
							</div><!-- .widget -->
							<div class="widget newsletter-widget">
								<!-- <h3 class="widget-title">Newsletter</h3> -->
								<!-- <p>Sign up for our mailing ist to get new course and course updates.</p> -->
								<form action="" method="POST" />
									<input type="email" name="email" placeholder="Enter email address" />
									<input type="submit" name="subscribe" value="Subscribe" />
								</form>
							</div><!-- .widget -->
						</div>
					</div>
				</div><!-- .bottom1 -->
			</div><!-- .container -->
		</div><!-- .site-bottom -->

		<footer id="footer" class="site-footer">
			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<div class="copyright">
							<p>Copyright © <?php echo date("Y"); ?> <?php echo $sitetitle;?></p>
						</div><!-- .copyright -->
					</div>

					<div class="col-md-6">
						<nav class="nav-footer">
							<ul>
								<li><a href="privacy-policy.php">Privacy Policy</a></li>
								<li><a href="terms.php">Terms</a></li>
								<!--<li><a href="#">Feedback</a></li>-->
							</ul>
						</nav>
					</div>
				</div>
			</div><!-- .container -->
		</footer><!-- .site-footer -->
	</div><!-- #wrapper -->

	<!-- jQuery -->    
    <script src="js/jquery-1.11.3.js"></script>
    <!-- Boostrap -->
    <script src="js/vendor/bootstrap.min.js"></script>
    <!-- Jquery Parallax -->
    <script src="js/vendor/parallax.min.js"></script>
    <!-- jQuery UI -->
	<script src="js/vendor/jquery-ui.min.js"></script>
	<!-- jQuery Sticky -->
	<script src="js/vendor/jquery.sticky.js"></script>
	<!-- OWL CAROUSEL Slider -->    
    <script src="js/vendor/owl.carousel.js"></script>
    <!-- PrettyPhoto -->   
    <script src="js/vendor/jquery.prettyPhoto.js"></script>
    <!-- Jquery Isotope -->
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <!-- Main -->    
    <script src="js/main.js"></script>
    <script>
	function show()
	{
		$(document).ready(function () {
		$('#sign-in').modal('show');
		});
	}
	</script>
</body>
</html>
