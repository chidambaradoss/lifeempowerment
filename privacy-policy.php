<?php include "includes/header.php"; ?>

		<div id="content" class="site-content">
			<?php include "includes/findcourse.php"; ?>

			<main id="main" class="site-main">
				<section id="our-university">
					<div class="container">
						<h2 class="main-title">Privacy Policy</h2>
						<div class="row">
						<?php
							$records=$db->singlerec("select privacy from cms");
							?>
							<div class="col-sm-12">
								<p><?php echo $records['privacy']; ?></p>
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
