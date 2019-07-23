<?php
include "includes/header.php";
$pid=isset($pid)?base64_decode($pid):'';
if(empty($user_id) && empty($pid)){
	header("location:index.php");
}
$details=$db->singlerec("select * from register where id='$pid' AND active_status='1'");
$bio=$details['bio']; 
$type=$details['user_role'];
$statusvalue=$db->singlerec("select status from follows where from_id='$user_id' and to_id='$pid'");	
$stat=$statusvalue['status'];
//$viewcount=$db->singlerec("UPDATE register set viewprofile=viewprofile+1  Where id ='$pid'");
//echo $viewcount['viewprofile']; 

if(empty($details)){
	header("location:index.php");
	exit;
}
?>

		<div id="content" class="site-content">
		
			<div class="single-course-title">
				<div class="container">
					<div class="row">
						<div class="thumb">
							<img src="<?php echo 'uploads/profile_images/'.$details['img']; ?>" alt="" />
						</div><!-- .thumb -->
                 
						<div class="info">
							<h1><?php echo $details['fname'].' '.$details['lname']; ?></h1>
							<h3 style="color:#FFF; margin:10px 0;"><?php echo $details['headline']?></h3>
						<?php if($type==1){ ?>
							<div class="course-meta newico">
								<ul>
									<li>
										<div class="star-rating">
											<span style="width:<?php echo $com_obj->review_star($details['id']); ?>%"></span>
										</div>
										<span>(<?php echo $com_obj->review_rating($details['id']); ?> reviews)</span>
									</li>
									<li><i class="fa fa-users"></i> Students (<?php echo $com_obj->buy_student($details['id']); ?>)</li>
									<li><a href="#"><i class="fa fa-comment"></i> Reviews (<?php echo $com_obj->review_rating($details['id']); ?>)</a></li>
									<li>Since: <?php echo date("d M Y", $details['crcdt']); ?></li>
									<li><a href="#university-courses-2"><i class="fa fa-list"></i> Courses (<?php echo $com_obj->course($details['id']); ?>)</a></li>
									
									<?php
										
										
									$viewcount=$db->insertrec("UPDATE register set viewprofile=viewprofile+1  Where id ='$pid'");
									$fetch=$db->singlerec("SELECT * FROM register WHERE id='$pid'");

									?>
									<li><i class="fa fa-eye fa-2x"></i><?php echo $fetch['viewprofile'] ?> Views
									</li>
									<!-- <li><a href="#"><i class="fa fa-heart-o fa-2x"></i></a> Wishlist</li> -->
								</ul>
							</div><!-- .course-meta -->
                    <?php }else if($type==0){ ?>  
<div class="course-meta newico">
								<ul>
									<!--<li>
										<div class="star-rating">
											<span style="width:<?php echo $com_obj->review_star($details['id']); ?>%"></span>
										</div>
										<span>(<?php echo $com_obj->review_rating($details['id']); ?> reviews)</span>
									</li>
									<li><i class="fa fa-users"></i> Students (<?php echo $com_obj->buy_student($details['id']); ?>)</li>
									<li><a href="#"><i class="fa fa-comment"></i> Reviews (<?php echo $com_obj->review_rating($details['id']); ?>)</a></li>-->
									<li>Since: <?php echo date("d M Y", $details['crcdt']); ?></li>
									<li><a href="#university-courses-2"><i class="fa fa-list"></i> Courses (<?php echo $com_obj->checkout($pid); ?>)</a></li>
									
									<?php
										
									$viewcount=$db->insertrec("UPDATE register set viewprofile=viewprofile+1  Where id ='$pid'");
									$fetch=$db->singlerec("SELECT * FROM register WHERE id='$pid'");

									?>
									<li><i class="fa fa-eye fa-2x"></i><?php echo $fetch['viewprofile'] ?> Views
									</li>
									<!-- <li><a href="#"><i class="fa fa-heart-o fa-2x"></i></a> Wishlist</li> -->
								</ul>
							</div><!-- .course-meta -->
					<?php } ?>							
							<div class="course-desc">
								<p><?php echo $bio; ?></p>
							</div>
							
							<?php if(!empty($user_id) && ($user_id!==$pid)){?>
							<?php $id=base64_encode($details['id']); ?>
							<a href="compose.php?toid=<?php echo $id;?>" class="button large primary rounded apply-button">Send Message</a>
							
							<a href="javascript:;" id="follo" class="button large primary rounded apply-button" onclick="return follow('<?php echo $pid ?>');"><?php if($stat==1){ ?>UnFollow <?php } else if(empty($stat)){ ?>Follow<?php } ?></a>
							
							<?php } else if(empty($user_id)){ ?>
							<a href="compose.php?toid=<?php echo $id;?>" class="button large primary rounded apply-button">Send Message</a>
							<?php } ?>
						</div><!-- .info -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .single-course-title -->
		
			<section id="course-about" class="course-section">
				<div class="container ">
				  <?php if(!empty($bio)){ ?>
				  <div class="col-sm-9">
					<h2 class="title">Bio</h2>
					<p><?php echo $details['bio'] ?></p>
					</div>
				 <?php }else{ ?>
							 <div class="col-sm-9">
							 	<h2 class="title">Bio</h2>
								<p>No Records Found</p>
							</div>
							<?php } ?>
					<div class="col-md-3 sidebar">
						<ul class="social-list">
												<li class="col-sm-12">
													  <a href="<?php echo $details['fb_url']; ?>" target="_blank" href="#" class="fb btn btn-block">Facebook</a>
												</li>
												<li class="col-sm-12">
													  <a href="<?php echo $details['tw_url']; ?>" target="_blank" class="tw btn btn-block">Twitter</a>
												</li>
												<li class="col-sm-12">
													  <a href="<?php echo $details['linkedin_url']; ?>" target="_blank" class="lnk btn btn-block">Linked In</a>
												</li>
												<li class="col-sm-12">
													  <a href="<?php echo $details['gplus_url']; ?>" target="_blank" class="gp btn btn-block">Google Plus</a>
												</li>
												<li class="col-sm-12">
													  <a href="<?php echo $details['yt_url']; ?>" target="_blank" class="yt btn btn-block">YouTube</a>
												</li>
											</ul>
					</div>
					
					
				</div>
			</section><!-- #course-about -->
<?php if($type==1) {?>
			<section id="university-courses-2">
					<div class="container pdb20">
						<h2 class="main-title"><span>Courses Posted by <?php echo $details['fname'].' '.$details['lname']; ?></span></h2>
						<div class="carou-slider animation-element fade-in">
							<div class="courses-slider">
								<div class="item">
									<div class="courses layout column-4">
										<?
										$crs=$db->get_all("select a.* , b.category_name from course as a inner join category as b on a.cat = b.id where a.user_id='$pid' AND a.active_status='1'");
										foreach($crs as $c):
										?>
										<div class="course">
											<div class="course-inner shadow">
												<div class="course-thumb">
													<a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>">
													<img src="<?php echo 'uploads/course_images/'.$c['img1']; ?>" alt="<?php echo $c['img_title1'];?>" />
													<img class="img-list" src="<?php echo 'uploads/course_images/'.$c['img1']; ?>" alt="<?php echo $c['img_title1'];?>" />
													</a>
												</div><!-- .course-thumb -->

												<div class="course-info">
													<span class="course-cat"><a href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>"><?php echo $c['category_name'] ?></a></span>	
													<h3 class="course-title"><a href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>"><?php
															$len=28;
													 echo checklength($c['title'],$len); ?></a></h3>
											
													<div class="course-meta">
														<ul>
															<li><i class="fa fa-users"></i><?php echo $com_obj->buy_student($c['id']); ?></li>
															<li><a href="javascript:;"><i class="fa fa-comment"></i><?php echo $com_obj->review_count($c['id']); ?></a></li>
															<li><a href="javascript:;" class="c-price"><?php echo $DCrncy.$c['price'] ?></a></li>
														</ul>
													</div><!-- .course-meta -->
												</div><!-- .course-info -->
											</div><!-- .course-inner -->
										</div><!-- .course -->
										<? endforeach ?>
							</div><!-- .courses-slider -->
						</div><!-- .carou-slider -->
					</div><!-- .container -->
				</section><!-- #university-courses-2 -->
<?php } else if($type==0){ ?>
	<section id="university-courses-2">
					<div class="container pdb20">
						<h2 class="main-title"><span>Courses Purchased by <?php echo $details['fname'].' '.$details['lname']; ?></span></h2>
						<div class="carou-slider animation-element fade-in">
							<div class="courses-slider">
								<div class="item">
									<div class="courses layout column-4">
										<?php 
										
										$crs=$db->get_all("select a.*,b.user_id as bid,b.course_id,b.pay_status,c.category_name from course as a inner join checkout as b on a.id=b.course_id left join category as c on a.cat=c.id where b.user_id='$pid' and a.active_status='1' and b.pay_status='1'");
										foreach($crs as $c):
										?>
										<div class="course">
											<div class="course-inner shadow">
												<div class="course-thumb">
													<a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>">
													<img src="<?php echo 'uploads/course_images/'.$c['img1']; ?>" alt="<?php echo $c['img_title1'];?>" />
													<img class="img-list" src="<?php echo 'uploads/course_images/'.$c['img1']; ?>" alt="<?php echo $c['img_title1'];?>" />
													</a>
												</div><!-- .course-thumb -->

												<div class="course-info">
													<span class="course-cat"><a href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>"><?php echo $c['category_name'] ?></a></span>	
													<h3 class="course-title"><a href="singlecourse.php?cid=<?php echo base64_encode($c['id']);?>"><?php
															$len=28;
													 echo checklength($c['title'],$len); ?></a></h3>
											
													<div class="course-meta">
														<ul>
															<li><i class="fa fa-users"></i><?php echo $com_obj->buy_student($c['id']); ?></li>
															<li><a href="javascript:;"><i class="fa fa-comment"></i><?php echo $com_obj->review_count($c['id']); ?></a></li>
															<li><a href="javascript:;" class="c-price"><?php echo $DCrncy.$c['price'] ?></a></li>
														</ul>
													</div><!-- .course-meta -->
												</div><!-- .course-info -->
											</div><!-- .course-inner -->
										</div><!-- .course -->
										<? endforeach ?>
							</div><!-- .courses-slider -->
						</div><!-- .carou-slider -->
					</div><!-- .container -->
				</section>
<?php } ?>				

				</div><!-- .site-content -->
<script type="text/javascript">
function follow(pid)
 {
	$.ajax({
		url:"followajax.php?pid="+pid,
		success:function(result) 
		{
			$('#follo').html(result);
		}
	});
}		
</script>	


<?php include "includes/footer.php"?>
