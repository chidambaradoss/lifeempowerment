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
.count_box {
    font-size: 50px;
    text-align: center;
    box-shadow: #929292 1px 1px 4px 1px;
    padding: 10px;
    background-color: #fff;
}
.count_box_title {
    font-size: 20px;
}
#home-count-section {

    padding: 30px 5px 30px 5px;
    background-color: #eaf0f0;

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

				<section id="home-count-section" class="">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div class="count_box">
									<i class="fa fa-user-circle count_box_icon"></i>
									<span class="count_box_count">15</span>
									<div class="count_box_title">
									Available Instructor
								</div>
								</div>
								
							</div>

							<div class="col-md-3">
								<div class="count_box">
									<i class="fa fa-mortar-board count_box_icon"></i>
									<span class="count_box_count">30</span>
									<div class="count_box_title">
									Available Classes
								</div>
								</div>
								
							</div>

							<div class="col-md-3">
								<div class="count_box">
									<i class="fa fa-support count_box_icon"></i>
									<span class="count_box_count">7</span>
									<div class="count_box_title">
									Free Classes
								</div>
								</div>
								
							</div>

							<div class="col-md-3">
								<div class="count_box">
									<i class="fa fa-group count_box_icon"></i>
									<span class="count_box_count">2320</span>
									<div class="count_box_title">
									Registered Users
								</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</section>

<style type="text/css">
	#home-slider img {

    width: 120px !important;
    height: 120px !important;
    filter: none;
    top: 70px;

border-radius: 50%;

}
#home-slider .item {

    height: 300px;

}
#home-slider .carousel-inner {

    position: relative;
    width: 100%;
    overflow: hidden;
    height: 280px;
    background: #acb4b4;

}
#home-slider .carousel-caption {

   top: 125px;

}
#home-slider .glyphicon-chevron-left::before {

    content: "\f053";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;

}
#home-slider .glyphicon-chevron-right::before {

    content: "\f054";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;

}
</style>
				<section id="home-slider">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
    					<!-- Indicators -->
    					<ol class="carousel-indicators">
    					  	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    					  	<li data-target="#myCarousel" data-slide-to="1"></li>
   					   	  	<li data-target="#myCarousel" data-slide-to="2"></li>
    					</ol>

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					      <div class="item active">

					        <img src="uploads/profile_images/59ca5b5205415.jpg" alt="Los Angeles" >
					        <div class="carousel-caption">
						        <p>LA is always so much fun!</p>
						        <h3>AWOEYO OLAYEMI</h3>
						        
						    </div>

					      </div>

					      <div class="item">
					        <img src="uploads/profile_images/5bb892dfc80c3.jpg" alt="Los Angeles" >
					        <div class="carousel-caption">
						        <p>LA is always so much fun!</p>
						        <h3>Los Angeles</h3>
						        
						    </div>
					      </div>
					    
					      <div class="item">
					        <img src="uploads/profile_images/5bb8938c51e2e.jpg" alt="Los Angeles" >
					        <div class="carousel-caption">
						        <p>LA is always so much fun!</p>
						        <h3>Los Angeles</h3>
						        
						    </div>
					      </div>
					    </div>

					    <!-- Left and right controls -->
					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right"></span>
					      <span class="sr-only">Next</span>
					    </a>
  					</div>
					
				</section>

				

				<section id="home-partner" class="">
					<div class="container">
						<h2 class="main-title ribbon"><span>OUR PARTNERS</span></h2>
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