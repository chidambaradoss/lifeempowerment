				<section id="home-partner" class="">
					<div class="container">
						<div class="carousel animation-element fade-in">
							<div class="slider">
							<?php
							$partner=$db -> get_all("select * from partners where active_status='1'");
							foreach($partner as $part){								
							?>
								<div class="item">
									<img src="uploads/partner/<?php echo $part['image']?>" alt="<?php echo $part['name']?>" />
								</div>
							<?php } ?>
							</div><!-- .slider -->
						</div><!-- .carousel -->
					</div><!-- .container -->
				</section><!-- .home-partner -->