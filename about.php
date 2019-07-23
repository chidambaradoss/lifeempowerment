<?php include "includes/header.php"; ?>
		<div id="content" class="site-content">
			<?php include "includes/findcourse.php";?>
			<main id="main" class="site-main">
				<div class="clearfix"></div>
				<div class="container">
				<?
				$cms=$db->singlerec("select aboutus from cms where active_status='1'");
				echo $cms['aboutus'];
				?>
				</div>
				<div class="clearfix"></div>
				<section id="about-featured">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="service-box">
									<span class="icon"><img src="images/assets/icons/icon1.png" alt="" /></span>
									<h3>Top university</h3>
									<span class="desc">Vivamus bibendum maximus finibus. Proin maximus varius elit ut accumsan. Integer in eros varius diam molestie</span>
								</div>
							</div>

							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="service-box">
									<span class="icon"><img src="images/assets/icons/icon2.png" alt="" /></span>
									<h3>Best Courses</h3>
									<span class="desc">Vivamus bibendum maximus finibus. Proin maximus varius elit ut accumsan. Integer in eros varius diam molestie</span>
								</div>
							</div>

							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="service-box">
									<span class="icon"><img src="images/assets/icons/icon3.png" alt="" /></span>
									<h3>Award events</h3>
									<span class="desc">Vivamus bibendum maximus finibus. Proin maximus varius elit ut accumsan. Integer in eros varius diam molestie</span>
								</div>
							</div>
						</div>
					</div>
				</section><!-- #about-featured -->

				<section id="our-team">
					<div class="container">
						<h2 class="main-title">LeaderShip Smart Edu</h2>
						<div class="row">
						<?
						$leader=$db->get_all("select * from leaders where active_status='1'");
						foreach($leader as $lead){
						?>
							<div class="col-md-3 col-sm-4 col-xs-4">
								<div class="team">
									<div class="thumb">
										<img src="<?php echo 'uploads/leader_images/'.$lead['image']; ?>" alt="<?php echo $lead['name']; ?> "/>
									</div><!-- .thumb -->

									<div class="info">
										<span class="name"><?php echo $lead['name']; ?></span>
										<span class="job"><?php echo $lead['position']; ?></span>
									</div>
								
								</div><!-- .team -->
							</div>
							<? } ?>		
						</div>
					</div>
				</section><!-- #our-team -->

				<section id="testimonial" class="testimonial parallax-window" data-parallax="scroll" data-image-src="images/placeholder/testimonial-bg.jpg">
					<div class="slider">
						<?php
						$testimonial=$db->get_all("select * from testimonials where active_status='1'");
						foreach($testimonial as $testi){
						?>
						<div class="item">
						
							<div class="testimonial-content">
								<?php echo $testi['message'];?>
							</div><!-- .testimonial-content -->
							<div class="testimonial-author">
								<div class="thumb">
									<img src="<?php echo 'uploads/testimonial_images/'.$testi['image'];?>" alt="<?php echo $testi['name']; ?>" />
								</div><!-- .thumb -->
								<div class="info">
									<span class="name"><?php echo $testi['name'];?></span>
									<span class="job">- Photographer</span>
								</div><!-- .info -->
							</div><!-- .testimonial-author -->
						
						</div><!-- .item -->
						<? } ?>


						</div><!-- .slider -->
				</section><!-- #testimonial -->

				<? include "includes/partner.php"; ?>
			</main><!-- .site-main -->
		</div><!-- .site-content -->
<? include "includes/footer.php"; ?>
