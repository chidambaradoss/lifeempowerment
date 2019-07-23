<?php include "includes/header.php";
$code=isset($code)?$code:'';
	if(empty($code)){
		header("location:index.php");
	}
	else{
		$row=$db->singlerec("SELECT temp_key FROM register WHERE temp_key='$code'");
		if(!empty($row)){
			$db->insertrec("UPDATE register SET active_status='1',email_active_status='1',temp_key='' WHERE temp_key='$code'");
			$mgs="Your email activated successfully";
		}
		else{
			$mgs="Key expired";
		}
	}	
?>
<div id="content" class="site-content">
			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">You've Authenticated Your Email </h2>
						<div class="row intro-wrap">
							<div class="col-md-12 ">
								<h3 class="title"><?php echo $mgs=isset($mgs)?$mgs:''; ?></h3></br></br>
								<p><a href="index.php?activated" value="" class="button primary rounded large">Go To Login</a></p>
							</div>
						</div><!-- .intro-wrap -->
					</div><!-- .container -->
				</section><!-- #our-university -->
			</main><!-- .site-main -->
		</div><!-- .site-content -->
	<?php include "includes/footer.php"; ?>