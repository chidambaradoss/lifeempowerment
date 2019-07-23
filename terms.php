<?php include "includes/header.php"; ?>

		<div id="content" class="site-content">
			<?php include "includes/findcourse.php"; ?>

			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">Terms and Condition</h2>
						<div class="row">
						<?php
							$records=$db->singlerec("select terms from cms");
							?>
							<div class="col-sm-12">
							   
								<p><?php echo $records['terms']; ?></p>
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #our-university -->
			</main><!-- .site-main -->
		</div><!-- .site-content -->

		

	<?php include "includes/footer.php"; ?>
	</div><!-- #wrapper -->

</body>
</html>
