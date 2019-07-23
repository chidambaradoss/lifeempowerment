<style>
.banner-title {

    position: absolute;
    bottom: 0px;
    width: 100%;
    text-align: center;
    background: #00000075;
    height: 100px;
    padding: 15px;

}

.banner-title h2{

    font-size: 30px !important;
    font-weight: 600  !important;
    color: #fff  !important;
    margin-bottom: 5px !important;

}
.banner-title h3 {

    font-size: 24px;
    font-weight: 600;
    color: #fff;

}
.row.program_list_row {
    padding: 10px;
}
.program_left_box {
    border-radius: 10px;
    height: 250px;
    margin-bottom: 15px;
    box-shadow: rgba(0, 0, 0, 0.65) 1px 2px 10px;
    overflow: hidden;

}
.program_right_box {
    border-radius: 10px;
    min-height: 250px;
    padding: 15px;
    box-shadow: rgba(0, 0, 0, 0.65) 1px 2px 10px;

}
.program_left_box_img {
    width: 100%;
    height: 100%;
    transition: all 0.5s ease-in-out 0s;
	-moz-transition: all 0.5s ease-in-out 0s;
	-ms-transition: all 0.5s ease-in-out 0s;
	-webkit-transition: all 0.5s ease-in-out 0s;
	-o-transition: all 0.5s ease-in-out 0s;
}
.program_left_box_img:hover {

    transform: scale(1.10);
	-moz-transform: scale(1.10);
	-ms-transform: scale(1.10);
	-webkit-transform: scale(1.10);
	-o-transform: scale(1.10);
}
.program_left_box_title {

    position: absolute;
    bottom: 15px;
    min-height: 30px;
    background-color: #0000008f;
    width: calc(100% - 30px);
    text-align: center;
    font-weight: bold;
    color: #fff;
    border-radius: 0px 0px 10px 10px;

}
.program_list {

    padding: 25px 0px;

}
.program_right_box_title {

    font-size: 20px;
    font-weight: bold;

}
@media only screen and (max-width: 600px) {
  .banner-title h2{
    font-size: 20px !important;
}
.banner-title h3 {
    font-size: 15px;
	}
}
</style>
<?php  include "includes/header.php"; ?>
	<div id="content" class="site-content">
		<main id="main" class="site-main">
			<section class="main-banner pattern" style="max-height: 100vh;">
				<img class="banner-image" src="images/slider/empowerment_bk.jpg" alt="" />
				<div class="banner-title">
					<h2>Watch Learn And Be Empowered</h2>
					<h3>Enroll In Our Online/InClass Courses  Anytime Anywhere</h3>
				</div>
				<div class="banner-content" style="top: 200px;max-width: 700px;">
					<form action="courselist.php" method="GET" >
							<div class="input-group" style="margin: auto 80px;">
							  <input style="height: 40px" type="text" name="keywordss" class="form-control" placeholder="Find tutorial, courses, and more ...">
							  <div class="input-group-addon " style="padding: 0px 25px;">
								<input class="trns" type="submit" name="search"  value="Search" style="height: 37px;margin-top: -15px;">
							  </div>
							</div>
					</form>
				</div>
			</section>
				
		<section class="program_list">
			<div class="container">
				<div class="row program_list_row">
					<div class="col-md-3">
						<div class="program_left_box">
							<img src="https://res.cloudinary.com/www-wowhubb-com/image/upload/v1563346086/ap3ju6xufd6f32vhfopb.jpg" class="program_left_box_img">
							<div class="program_left_box_title">
								Church Access Plan
							</div>
						</div>
						
					</div>
					<div class="col-md-9">
						<div class="program_right_box">
							<div class="program_right_box_title">
								Church Access Plan
							</div>
							<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu es massa vestibulum malesuada, integer vivamus elit eu mauris eus, cum eros quis aliquam wisi. Nulla wisi laoreet suspendisse integer vivamus elit eu mauris hendrerit facilisi, mi mattis pariatur aliquam pharetra eget.</p>
						</div>
					</div>
				</div>
				<div class="row program_list_row">
					<div class="col-md-3">
						<div class="program_left_box">
							<img src="https://res.cloudinary.com/www-wowhubb-com/image/upload/v1561719288/jyzwyqgdbjdyvtm6nonn.jpg" class="program_left_box_img">
							<div class="program_left_box_title">
								Entrepreneurial Training Program 
							</div>
						</div>
						
					</div>
					<div class="col-md-9">
						<div class="program_right_box">
							<div class="program_right_box_title">
								Entrepreneurial Training Program 
							</div>
							<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu es massa vestibulum malesuada, integer vivamus elit eu mauris eus, cum eros quis aliquam wisi. Nulla wisi laoreet suspendisse integer vivamus elit eu mauris hendrerit facilisi, mi mattis pariatur aliquam pharetra eget.</p>
						</div>
					</div>
				</div>
				<div class="row program_list_row">
					<div class="col-md-3">
						<div class="program_left_box">
							<img src="https://res.cloudinary.com/www-wowhubb-com/image/upload/v1561547345/ljxunwtkjgka2pobeywy.jpg" class="program_left_box_img">
							<div class="program_left_box_title">
								Online Courses 
							</div>
						</div>
						
					</div>
					<div class="col-md-9">
						<div class="program_right_box">
							<div class="program_right_box_title">
								Online Courses 
							</div>
							<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu es massa vestibulum malesuada, integer vivamus elit eu mauris eus, cum eros quis aliquam wisi. Nulla wisi laoreet suspendisse integer vivamus elit eu mauris hendrerit facilisi, mi mattis pariatur aliquam pharetra eget.</p>
						</div>
					</div>
				</div>
				<div class="row program_list_row">
					<div class="col-md-3">
						<div class="program_left_box">
							<img src="https://res.cloudinary.com/www-wowhubb-com/image/upload/v1561547416/pycg2gw70eos1lri5pzs.jpg" class="program_left_box_img">
							<div class="program_left_box_title">
								Inclass Training Programs
							</div>
						</div>
						
					</div>
					<div class="col-md-9">
						<div class="program_right_box">
							<div class="program_right_box_title">
								Inclass Training Programs
							</div>
							<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu es massa vestibulum malesuada, integer vivamus elit eu mauris eus, cum eros quis aliquam wisi. Nulla wisi laoreet suspendisse integer vivamus elit eu mauris hendrerit facilisi, mi mattis pariatur aliquam pharetra eget.</p>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<section id="university-courses-2">
			<div class="container">
				<div class="row animation-element fade-in animated fadeInUp">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="image-box">
							<?php
							$maincat=$db->singlerec("select * from category where active_status='1' and parent_id='0' order by category_name asc limit 1");
							$catimgpath="uploads/category/";
							?>
							<a href="courselist.php?cattid=<?php echo $maincat['id']; ?>" class="mini-zoom"><img src="<?php echo $catimgpath.$maincat['img']; ?>" alt=""></a>
							<a href="courselist.php?cattid=<?php echo $maincat['id']; ?>" class="caption"><?php echo $maincat['category_name']; ?></a>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
						$count=1;
						$getcats=$db->get_all("select * from category where active_status='1' and parent_id='0' order by category_name asc limit 1,4");
						$catimgpath="uploads/category/";
						foreach($getcats as $cat) {
						if ($count%2 == 1) {  
							echo "<div class='row'>";
						}
						?>
						<div class="col-sm-6">
							<div class="image-box">
								<a href="courselist.php?cattid=<?php echo $cat['id'];?>" class="mini-zoom"><img src="<?php echo $catimgpath.$cat['img']; ?>" alt="<?php echo $cat['category_name']; ?>"></a>
								<a href="courselist.php?cattid=<?php echo $cat['id']; ?>" class="caption"><?php echo $cat['category_name']; ?></a>
							</div>
						</div>
						<?php
						if ($count%2 == 0) {
							echo '</div>';
						}
						$count++;
						}
						if ($count%2 != 1) echo '</div>';
						?>	
					</div>
				</div>
			</div>
		</section>
				
				<section id="home-services-2">
					<div class="container">
						<div class="row animation-element fade-in">
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="service-box icon-cycle">
									<span class="icon"><img src="images/ico-1.png" alt="" /></span>
									<div class="info">
										<h3>Unlimited Access</h3>
										<p>Quisque pulvinar libero dolor, quis bibendum eros euismod sit amet. Proin dapibus id diam at</p>
									</div>	
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="service-box icon-cycle">
									<span class="icon"><img src="images/ico-2.png" alt="" /></span>
									<div class="info">
										<h3>Expert Teachers</h3>
										<p>Pellentesque non diam euismod metus vehicula varius. Donec et velit placerat arcu lobortis.</p>
									</div>	
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="service-box icon-cycle">
									<span class="icon"><img src="images/ico-3.png" alt="" /></span>
									<div class="info">
										<h3>Learn Anywhere</h3>
										<p>Gravida at convallis a, tempor sed magna. Pellentesque non diam euismod metus vehicula</p>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</section>

				<section id="university-courses-2">
					<div class="container">
						<h2 class="main-title ribbon"><span>Popular Courses</span></h2>
						<div class="carou-slider animation-element fade-in">
							<div class="courses-slider">
								<?php
								$count=1;
								$getcrs=$db->get_all("select a.*,b.category_name,c.fname,c.lname,c.img from course as a inner join category as b on a.cat=b.id left join register as c on a.user_id=c.id where a.active_status='1' limit 0,8  ");
								$path="uploads/course_images/";
								$usrimg="uploads/profile_images/";
								foreach($getcrs as $crs) {
								if ($count%8 == 1) {  
									echo "<div class='item'>";
									echo "<div class='courses layout column-4'>";
								}
								?>
								<div class="course">
									<div class="course-inner shadow">
										<div class="course-thumb">
											<a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>">
												<img src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
												<img class="img-list" src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
											</a>
											
										</div>

										<div class="course-info">
											<span class="course-cat"><a href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>"><?php echo $crs['category_name']; ?></a></span>	

											<h3 class="course-title"><a href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>"><?php 
													$len=28;
											echo checklength($crs['title'],$len); ?></a></h3>

											<div class="course-desc">
												<p><?php 
												
												echo $crs['description']; ?></p>
											</div>

											<div class="course-author">
												<?php
												$img=!empty($crs['img'])?$crs['img']:'noimage.png';
												$name=!empty($crs['fname'])?$crs['fname'].' '.$crs['lname']:'Admin';
												?>
												<a href="javascript:;"><img src="<?php echo $usrimg.$img; ?>" width="20" alt="<?php echo $name; ?>"/></a>
												<span>By <a href="publicprofile.php?pid=<?php echo base64_encode($crs['user_id']);?>"><?php echo $name; ?></a></span>
											</div>

											<div class="course-meta">
												<ul>
													<li><i class="fa fa-users"></i> 2</li>
													<li><a href="javascript:;"><i class="fa fa-comment"></i> <?php echo $com_obj->review_count($crs['id']); ?></a></li>
													<li><a href="javascript:;" class="c-price"> <?php echo $DCrncy.$crs['price']; ?></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?php
								if ($count%8 == 0) {
									echo '</div></div>';
								}
								$count++;
								}
								if ($count%8 != 1) echo '</div></div>';
								?>
							</div>
						</div>
					</div>
				</section>

				<section id="call-to-action-6" class="call-to-action bg-color">
					<div class="container">
						<div class="call-to-action-content animation-element fade-in">
							<div class="desc">Committed to learning new creative skills? Subscribe to Smart Edu today.</div>
							<?php if(empty($user_id)){ ?>
							<a href="#" data-toggle="modal" data-target="#sign-up" class="button primary rounded large">Access All Courses $9/mth</a>
							<?php } ?>
						</div>
					</div>
				</section>
                <div class="clearfix"></div>
				<section id="latest-courses-6">
					<div class="container">
						<h2 class="main-title ribbon"><span>Latest Courses</span></h2>

						<div class="filter animation-element fade-in">
							<ul>
								<li><a class="active" href="#" data-filter="*">All categories</a></li>
								<?php
								$getcats=$db->get_all("select * from category where active_status='1' and parent_id='0' order by category_name asc");
								foreach($getcats as $cat):
								echo '<li><a href="#" data-filter=".'.$cat['category_name'].'">'.$cat['category_name'].'</a></li>';
								endforeach;
								?>
							</ul>
						</div>
						<style type="text/css">
							/* doss testing need to check */
							.course.isotope-item {
    								position: unset !important;
    								left: unset !important;
    								top: unset !important;
								}
						</style>

						<div class="courses layout column-4 isotope animation-element fade-in">
							<?php
							$getcrs=$db->get_all("select a.*,b.category_name,c.fname,c.lname,c.img from course as a inner join category as b on a.cat=b.id left join register as c on a.user_id=c.id where a.active_status='1' order by a.id desc limit 0,8");
							$path="uploads/course_images/";
							$usrimg="uploads/profile_images/";
							foreach($getcrs as $crs) {
							?>

							<div class="course isotope-item <?php echo $crs['category_name']; ?>">
								<div class="course-inner shadow">
									<div class="course-thumb">
										<a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>">
											<img src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
											<img class="img-list" src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
										</a>
									</div>
									<div class="course-info">
										<span class="course-cat"><a href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>"><?php echo $crs['category_name']; ?></a></span>
										<h3 class="course-title"><a href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>"><?php 
												$len=28;
											echo checklength($crs['title'],$len);

										 ?></a></h3>
										<div class="course-desc">
											<p><?php echo $crs['description']; ?></p>
										</div>
										<div class="course-author">
											<?php
											$img=!empty($crs['img'])?$crs['img']:'noimage.png';
											$name=!empty($crs['fname'])?$crs['fname'].' '.$crs['lname']:'Admin';
											?>
											<a href="javascript:;"><img src="<?php echo $usrimg.$img; ?>" width="20" alt="<?php echo $name; ?>"/></a>
											<span>By <a href="publicprofile.php?pid=<?php echo base64_encode($crs['user_id']);?>"><?php echo $name; ?></a></span>
										</div>
										<div class="course-meta">
											<ul>
												<li class="hidden"><i class="fa fa-thumbs-o-up"></i> 50</li>
												<li><a href="javascript:;"><i class="fa fa-users"></i><?php echo $com_obj->buy_count($crs['id']); ?></a></li>
												<li><a href="javascript:;"><i class="fa fa-comment"></i> <?php echo $com_obj->review_count($crs['id']); ?></a></li>
												<li><a href="javascript:;" class="c-price"> <?php echo $DCrncy.$crs['price']; ?></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					 <div class="clearfix"></div>
				</section>
                <div class="clearfix"></div>

				<section id="home-professor">
				 <!--<div class="clearfix"></div>-->
					<div class="container" style="margin: 0px auto;width: 90%;">
						<h2 class="main-title ribbon"><span>Top Professor</span></h2>
						 
						<div class="team-slider carou-slider animation-element fade-in">
						
							<div class="slider">
								<?php
								$getprof=$db->get_all("select * from register where user_role='1' and active_status='1'");
								$usrimgpath="uploads/profile_images/";
								foreach($getprof as $prof){
								?>
								<div class="item">
									<div class="team box">
										<div class="thumb">
											<a  href="publicprofile.php?pid=<?php echo base64_encode($prof['id']); ?>"><img src="<?php echo $usrimgpath.$prof['img']; ?>"  alt="<?php echo $prof['fname'].' '.$prof['lname']; ?>"/></a>
											<div class="thumb-info">
												<div class="socials">
													<ul>
														<li><a href="<?php echo $prof['fb_url']; ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
														<li><a href="<?php echo $prof['tw_url']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
														<li><a href="<?php echo $prof['linkedin_url']; ?>" target="_blank"><i class="fa fa-linkedin "></i></a></li>
													</ul>
												</div>
												<!--<a href="#" class="read-more">Read More</a>-->
											</div><!-- .thumb-info -->
										</div><!-- .thumb -->

										<div class="info">
											<span class="name"><?php echo $prof['fname'].' '.$prof['lname']; ?></span>
											<span class="job"><?php 
											$len=20;
											echo checklength($prof['headline'],$len); ?></span>
											<!--<p><?php
												

											 echo $prof['bio']; ?></p>-->
										</div>
									</div><!-- .team -->
								</div>
								<?php 
								} 

								?>
								
							</div>
							
						</div>
							
					</div>
				</section>
					
				<section id="learn-trial">
					<img class="thumb" src="images/placeholder/learn-trial.jpg" alt="" />
					<div class="container">
						<div class="row animation-element fade-in">
							<div class="col-md-6 col-md-offset-6">
								<div class="learn-trial-content">
									<h2>Everything you need to learn creative skills.</h2>
									<ul class="learn">
										<li>
											<span class="icon"><i class="fa fa-trophy"></i></span>
											<div class="info">
												<h3>Over 20,970 Free Tutorials.</h3>
												<span class="desc">Quisque pulvinar libero dolor, quis bibendum eros euismod sit amet. Proin dapibus id diam at.</span>
											</div><!-- .info -->
										</li>

										<li>
											<span class="icon"><i class="fa fa-graduation-cap"></i></span>
											<div class="info">
												<h3>670 Courses, and Counting!</h3>
												<span class="desc">Sed vel arcu eget sapien varius lacinia. Pellentesque urna ante, iaculis eu dui in, eleifend condimentum est.</span>
											</div><!-- .info -->
										</li>

										<li>
											<span class="icon"><i class="fa fa-book"></i></span>
											<div class="info">
												<h3>Over 170 eBooks Available.</h3>
												<span class="desc">Vivamus a felis consequat, consequat odio ac, aliquet nisl. Fusce ac mi eu tellus lobortis.</span>
											</div><!-- .info -->
										</li>
									</ul>
									<?php if(empty($user_id)){ ?>
									<a href="#" data-toggle="modal" data-target="#sign-up" class="button rounded primary large">Start your free 10 day trial</a>
									<?php } ?>
								</div><!-- .learn-trial-content -->								
							</div>
						</div>
					</div><!-- .container -->
				</section><!-- #learn-trial -->

				

				<section id="home-partner" class="">
					<div class="container">
						<h2 class="main-title ribbon"><span>Our Sponsors</span></h2>
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
			</main><!-- .site-main -->
		</div><!-- .site-content -->
<style>
.trns {background: transparent !important;
border: 0 !important;
color: #FFF !important;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$( document ).ready(function() {    
	var getval = document.domain;
	var pass_arg = {get_val:getval};
	$.ajax({
	  dataType: "json",
	  url: "admin/readajax.php",
	  type: "POST",
	  async : true,
	  data: pass_arg,
	});
});
</script> 
<?php include "includes/footer.php"; ?>