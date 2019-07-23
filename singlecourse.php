<?php
include "includes/header.php";

$cid=isset($cid)?base64_decode($cid):'';
$course=$db->singlerec("select a.*,b.category_name,c.fname,c.lname,c.headline,c.bio,c.img,c.email,c.fb_url,c.tw_url,c.linkedin_url,c.user_role from course as a inner join category as b on a.cat=b.id left join register as c on a.user_id=c.id where a.id='$cid'");
$types=$course['type'];
$id=isset($_SESSION['userid'])?$_SESSION:'';
if(empty($course)){
	header("location:index.php");
	exit;
}
 


?>
		<div id="content" class="site-content">
			<div class="single-course-title">
				<div class="container">
					<div class="row">
						<div class="thumb">
							 <img src="uploads/course_images/<?php echo $course['img1']; ?>" alt="Profile Picture" class="img-responsive">
						</div><!-- .thumb -->

						<div class="info">
							<h1><?php echo $course['title'] ?></h1>
							<div class="course-meta newico">
								<ul>
									<li>
										<div class="star-rating">
											<span style="width:<?php echo $com_obj->percentage($course['id']);?>%"></span>
										</div>
										<span>(<?php echo $com_obj->review_count($course['id']); ?> reviews)</span>
									</li>
									<li><i class="fa fa-users"></i><?php echo $com_obj->buy_count($course['id']); ?></li>
									
									<li><a href="#course-review"><i class="fa fa-comment"></i><?php echo $com_obj->review_count($course['id']); ?></a></li>
									<?php
									$result=$db->singlerec("select * from wishlist where user_id='$user_id' AND course_id='$cid'");
									if($result!=''){?>
										<li><a href="javascript:;"><i class="fa fa-heart fa-2x" data-toggle="tooltip" title="Already added">Wishlist</i></a> </li>
									<?php
									}
									else {
									?>
									<li  id="wishlistid"><a href="#"><i class="fa fa-heart-o fa-2x"  onclick="wishlist('<?= $course['id'] ?>');"  ></i></a> Wishlist</li>
									<?php } ?>
									<?php
									$viewpage=$course['viewpage']+1;
									$viewcount=$db->insertrec("UPDATE course set viewpage=$viewpage  Where id =$cid");
									$fetch=$db->singlerec("SELECT * FROM course where id=$cid");
									?>
									<li><i class="fa fa-eye fa-2x"></i><?php echo $fetch['viewpage'];?> Views</li>
								</ul>
							</div>
							<div class="course-desc">
								<p><?php echo $com_obj->limit_text($course['description'],100); ?></p>
							</div>
							<div class="course-detail">
								<ul>
									<li>Start: <?php echo date("d M Y", $course['crcdt']); ?></li>
									<li>Duration: <?php echo $course['duration'] ?> weeks</li>
									<li>Category:<?php echo $course['category_name'] ?></li>
									<li class="hidden">Address: Unisas Campus, Cambridge St, Boston</li>
								</ul>
							</div>
							<?php if($types==1){ ?>
								<p class="price">Price: <?php echo $DCrncy.$course['price'] ?> </p>
							<?php } else if($types==0){?>
							<p class="price">Free course </p>
							<?php } ?>
							<?php 
							$cat=$db->singlerec("select * from checkout where user_id='$user_id' and course_id='$cid'"); 
							$type=$course['type'];
							$pay=$cat['pay_status'];
							$user=isset($userinfo['user_role'])?$userinfo['user_role']:'';
							//$id=$_SESSION['id']?$id:'';
							if((empty($cat)) && ($type==1) ) { 
							
							?>
							<?php $id=base64_encode($course['id']); if(!empty($user_id)){?>
							<a href="checkout.php?payid=<?php echo $id;?>" class="button primary rounded apply-button">Buy now
							<?} else{?><a href="#" data-toggle="modal" data-target="#sign-in" class="button primary rounded apply-button">Buy now <?}?>
							<?php
							 }else if(($pay==0)&& ($type==1) ){ ?>
							 </a>
							 <a  class="button primary rounded apply-button">Waiting For Admin Approval
							 <?php } ?>
							</a>
						</div><!-- .info -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .single-course-title -->

			<nav class="course-nav">
				<div class="container">
					<ul class="nav-scroll">
						<li><a class="active" href="#course-about">About the course</a></li>
						<li><a href="#course-speakers">Instructor</a></li>
						<li><a href="#course-video">Video</a></li>
						<li><a href="#course-gallery">Gallery</a></li>
						<li><a href="#course-pdf">PDF File</a></li>
						<li><a href="#course-faq">FAQs</a></li>
						<li><a href="#course-review">Reviews</a></li>
					</ul>
				</div>
			</nav><!-- .course-nav -->
			
			

			<section id="course-about" class="course-section">
				<div class="container ">
				  <div class="col-sm-9">
				  <?php if(($cat['pay_status']==1)&& ($course['type']==1)){ ?>
					<div class="col-sm-12">
					
					   <h2>About the Course</h2>
					   <p><?php echo $course['about'] ?></p>
					   <p><?php echo $course['brief_description'] ?></p>
					</div>
					
					<div class="col-sm-12">
					   <h2 class="title" >Requirments</h2>
						<p><?php echo $course['requirement'] ?></p>
					</div>

					<?php }elseif(($course['type']==0) ) { ?>
						<div class="col-sm-12" class="form-control tiny">
					
					   <h2 class="title" >About the Course</h2>
					   <p><?php echo $course['about'] ?></p>
					   <p><?php echo $course['brief_description']?></p>
					   </div>
					   <div class="col-sm-12">
					   <h2 class="title">Requirments</h2>
						<p><?php echo $course['requirement'] ?></p>
					</div>
					<?php } elseif($course['user_id'] == $_SESSION['userid']) { 
                         	?>
						<div class="col-sm-12" class="form-control tiny">
					   <h2 class="title" >About the Course</h2>
					   <p><?php echo $course['about'] ?></p>
					   <p><?php echo $course['brief_description']?></p>
					   </div>
					   <div class="col-sm-12">
					   <h2 class="title">Requirments</h2>
						<p><?php echo $course['requirement'] ?></p>
					</div>	
					
					<?php } else{ 
						echo"<div class='alert alert-warning'>You must be buy a course to view the Course details.</div>";
					 } ?>
					</div>
					<div  class="col-md-3 sidebar" >
					<?php if(($user!=1)  && ($course['type']!=0) ){?>
						<aside id="cartt" class="widget appply-form">
						<?php
						if(($user_id!='')){
							
								$result=$db->singlerec("select * from checkout where user_id='$user_id' AND course_id='$cid'");
								if(empty($result)){
									?>
									<a href="javascript:;"  class="button large full primary rounded apply-button add-to-cart" onclick="cart('<?= $course['id']  ?>','<?= $course['price'] ?>');">Add To Cart</a>
									<?php
								}
								else if((!empty($result)) &&(empty($cat))){?>
								<a href="javascript:;" class="button full primary rounded apply-button add-to-cart btn-aftr-cart" disabled>Added to cart</a>
								
								<a href="cart.php" class="button full rounded apply-button add-to-cart mt10 btn-aftr-cart" ><i class="fa fa-shopping-cart pdr5"></i> View Cart</a>
								<?php
								}else if($pay==0){ }?>
						       <?php  }else{ ?>
							<a href="index.php" class="button large full primary rounded apply-button add-to-cart" disabled>Login to add cart</a>
						   <?php } ?>
							<div class="course-detail">
								<ul>
									<li>Price: <span class="price"><?php echo $DCrncy.$course['price']; ?></span></li>
								
									<li>Level: <?php $levels=$course['level']; echo $GT_level[$levels]; ?></li>
									<li>Category:<?php echo $course['category_name'] ?></li>
									<li>
										<div class="star-rating">
											<span style="width:<?php echo $com_obj->percentage($course['id']);?>%"></span>
										</div>
										<span>(<?php echo $com_obj->review_count($course['id']); ?> reviews)</span>
									</li>
								</ul>
							</div>
						</aside>
						<?php } ?>
						<div class="row social-share">
						  <h4>Share This Class</h4>
						  <div class="col-sm-4">
						    <a href="http://www.facebook.com/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank" class="btn btn-block fb-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						  </div>
						  <div class="col-sm-4">
						    <a href="http://www.twitter.com/share.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank" class="btn btn-block twitter-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						  </div>
						  <div class="col-sm-4">
						    <a href="mailto:<?php echo $course['email']; ?>" class="btn btn-block email-btn"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						  </div>
						</div>
					</div>
				</div>
				
			</section><!-- #course-about -->
			<section id="course-speakers" class="course-section">
				<div class="container">
					
					<div class="row">
					<div class="col-sm-6" style="margin-bottom: 20px;">
						<h2 class="title">Skills covered in this course</h2>
						<?php if(!empty($course['tag'])){ ?>
						<ul class="author_skill_list">
							<?php 
							
						  	$tag=explode(',',$course['tag']);
						  	$i=0;
						  foreach ($tag as $i => $tags) { ?>
						  	
						
						   <li><a href="#">
						   	<?php
						  	echo $tags;
						  	$i++;
						  	?>
						   </a></li>
							<?php  } ?>
				
						</ul>
						<?php } else{ echo"<div class='alert alert-warning'>No Records Found!.</div>"; } ?>
					</div>
					<h2 class="title">Teachers</h2>
						<div class="col-md-6">
							<div class="speaker">
								<div class="speaker-thumb">
								<?php if($course['user_id']==0){ ?>
									<img src="uploads/profile_images/noimage.png"  alt="Profile Picture" class="img-responsive">
								<? } else{?>
									<img src="uploads/profile_images/<?php echo $course['img']; ?>" alt="Profile Picture" class="img-responsive">
								<?php } ?>
								<?php if($course['user_id']!=0){ ?>
									<div class="socials">
										<ul>
											<?php 
										     $fb=$course['fb_url'];
											 $tw=$course['tw_url'];
											 $ln=$course['linkedin_url'];
											 
											 if(!empty($fb)){ ?>				
											<li><a href="<?php echo $course['fb_url']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
											 <?php }else { ?>
											 <li><a href="#" title="Not Mentioned" target="_blank"><i class="fa fa-facebook"></i></a></li>
											 <?php } if(!empty($tw)){ ?>
											<li><a href="<?php echo $course['tw_url']; ?>"target="_blank"><i class="fa fa-twitter"></i></a></li>
											 <?php } else{ ?>
											 <li><a href="#" title="Not Mentioned" target="_blank"><i class="fa fa-twitter"></i></a></li>
											 <?php }if(!empty($ln)){ ?>
											<li><a href="<?php echo $course['linkedin_url']; ?>" target="_blank"><i class="fa fa-linkedin "></i></a></li>
											 <?php }else{ ?>
											 <li><a href="#" title="Not Mentioned" target="_blank"><i class="fa fa-linkedin "></i></a></li>
											 <?php } ?>
										</ul>
									</div>
								<?php } ?>
								</div><!-- .speaker-thumb -->

								<div class="speaker-info">
									<a href="publicprofile.php?pid=<?php echo base64_encode($course['user_id']); ?>" class="name"><?php echo $course['fname'].$course['lname']; ?></a>
									<span class="job"><?php echo $course['headline']; ?></span>
									<p><?php echo $course['bio']; ?></p>
								</div><!-- .speaker-info -->
							</div><!-- .speaker -->
						</div>

					</div>
					
				</div>
			</section><!-- #course-speakers -->

			<section id="course-video" class="course-section">
				<div class="container">
					<h2 class="title">Video</h2>
					<p><?php echo $course['video_title1'];?></p>

					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<a data-toggle="modal"  href="#video_modal" class="video-playico">
							<?php 
							    $vidimg=$course['video_pre1'];
							    $image = (file_exists("uploads/video_images/$vidimg") && !empty($vidimg))?"uploads/video_images/$vidimg":"uploads/video_images/noimage.png";
								?>
							 
								<img src="<?php echo $image; ?>" alt="" />
							</a>
						</div>
						
					</div>
				</div>
			</section><!-- #course-video -->

			<section id="course-gallery" class="course-section">
				<div class="container">
					<h2 class="title">Gallery</h2>
					
					<div class="gallery clearfix col-3">
						<a data-gal="prettyPhoto[gal]" href="uploads/course_images/<?php echo $course['img1']; ?>" class="gallery-item">
						<?php 
						     $cimg=$course['img1'];
						     $ima = (file_exists("uploads/course_images/$cimg") && !empty($cimg))?"uploads/course_images/$cimg":"uploads/course_images/noimage.png";?>
							<img src="<?php echo $ima; ?>" alt="" />
						</a>

						<a data-gal="prettyPhoto[gal]" href="uploads/course_images/<?php echo $course['img2']; ?>" class="gallery-item">
						<?php 
						     $cimgs=$course['img2'];
						     $ima2 = (file_exists("uploads/course_images/$cimgs") && !empty($cimgs))?"uploads/course_images/$cimgs":"uploads/course_images/noimage.png";?>
							<img src="<?php echo $ima2; ?>" alt="" />
						</a>

						<a data-gal="prettyPhoto[gal]" href="uploads/video_images/
						<?php echo $course['video_pre1']; ?>" class="gallery-item">
						<?php 
						     $cimgd=$course['video_pre1'];
						     $ima3 = (file_exists("uploads/video_images/$cimgd") && !empty($cimgd))?"uploads/video_images/$cimgd":"uploads/course_images/noimage.png";?>
							<img src="<?php echo $ima3; ?>" alt="" />
						</a>
						
					</div><!-- .gallery -->
				</div>
			</section><!-- #course-gallery -->
			
			<section id="course-pdf" class="course-section">
				<div class="container">
					<h2 class="title">PDF File</h2>
					<div class="row">
						<div class="col-md-6">
						<?php if(($cat['pay_status']==1)&& ($course['type']==1)){ ?>
							<div class="panel-group accordion" id="accordion">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
										<?php $pdf=$course['file_pdf'];
											if(!empty($pdf)){?>
										<a href="uploads/document/<?=$course['file_pdf']; ?>" download>Click here to download File</a>
											<? } else{ 
											echo"<div class='alert alert-warning'>No Document found!.</div>";
											 }?>
										</h4>
									</div>
									
								</div>
							</div>
							<?php }elseif(($course['type']==0)){ ?>
														<div class="panel-group accordion" id="accordion">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
										<?php $pdf=$course['file_pdf'];
											if(!empty($pdf)){?>
										<a href="uploads/document/<?=$course['file_pdf']; ?>" download>Click here to download File</a>
										<? } else{ 
											echo"<div class='alert alert-warning'>No Document found!.</div>";
											 }?>
										</h4>
									</div>
									
								</div>
							</div>
							<?php } elseif(($course['user_id'] == $_SESSION['userid'])){ ?>
														<div class="panel-group accordion" id="accordion">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
										<?php $pdf=$course['file_pdf'];
											if(!empty($pdf)){?>
										<a href="uploads/document/<?=$course['file_pdf']; ?>" download>Click here to download File</a>
										<? } else{ 
											echo"<div class='alert alert-warning'>No Document found!.</div>";
											 }?>
										</h4>
									</div>
									
								</div>
							</div>
							<?php }else{ 
						echo"<div class='alert alert-warning'>You must be buy a course to view the PDF file.</div>";
					 } ?>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</section>

			<section id="course-faq" class="course-section">
				<div class="container">
					<h2 class="title">FAQ's</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="panel-group accordion" id="accordion">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion1">
										<?php echo $course['faq_ques1']; ?></a>
										</h4>
									</div>
									<div id="accordion1" class="panel-collapse collapse">
										<div class="panel-body"><?php echo $course['faq_ans1']; ?></a></div>
									</div>
								</div>

								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion2">
										<?php echo $course['faq_ques2']; ?></a>
										</h4>
									</div>
									<div id="accordion2" class="panel-collapse collapse">
										<div class="panel-body"><?php echo $course['faq_ans2']; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #course-faq -->

			<section id="course-review" class="course-section">
				<div class="container">
					<h2 class="title">Course reviews</h2>
					
					<div id="reviews">
						<div class="ratings-counter">
							<div class="avegare">
								<div class="star-rating normal">
									<span style="width:<?php echo $com_obj->percentage($course['id']); ?>%"></span>
								</div>
								<span><?php echo $com_obj->rating_count($course['id']);?></span>
							</div><!-- .avegare -->

							<div class="star-progress">
								<div class="star-item star5">
									<label>5 Star</label>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $com_obj->star_percentage($course['id'],5); ?>%">
											<span><?php echo $com_obj->star_count($course['id'],5); ?></span>
										</div>
									</div>
								</div><!-- .star5 -->
								
								<div class="star-item star4">
									<label>4 Star</label>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $com_obj->star_percentage($course['id'],4); ?>%">
											<span><?php echo $com_obj->star_count($course['id'],4); ?></span>
										</div>
									</div>
								</div><!-- .star4 -->

								<div class="star-item star3">
									<label>3 Star</label>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $com_obj->star_percentage($course['id'],3); ?>%">
											<span><?php echo $com_obj->star_count($course['id'],3); ?></span>
										</div>
									</div>
								</div><!-- .star3 -->

								<div class="star-item star2">
									<label>2 Star</label>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $com_obj->star_percentage($course['id'],2); ?>%">
											<span><?php echo $com_obj->star_count($course['id'],2); ?></span>
										</div>
									</div>
								</div><!-- .star2 -->

								<div class="star-item star1">
									<label>1 Star</label>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $com_obj->star_percentage($course['id'],1); ?>%">
											<span><?php echo $com_obj->star_count($course['id'],1); ?></span>
										</div>
									</div>
								</div><!-- .star1 -->
							</div><!-- .star-progress -->
						</div><!-- .ratings-counter -->

						<div class="comments-area" id="comments">
							<ol class="comment-list">
								<?php $row=$db->get_all("SELECT a.*,b.fname,b.lname,b.img FROM register as b inner join review as a on a.user_id=b.id WHERE course_id='$cid'");
									foreach($row as $rate){?>
								<li class="comment">
									<div class="comment-body">
										<div class="comment-avatar">
											<img class="avatar" src="uploads/profile_images/<?php echo $rate['img']; ?>" alt="" />
										</div><!-- .comment-avatar -->
										<header class="comment-meta">
											<cite class="comment-author"><?php echo $rate['fname'].' '.$rate['lname']; ?></cite>
											<span class="comment-date"> <?php echo date("d M Y", $rate['crcdt']); ?></span>
										</header><!-- .comment-meta -->
										<div class="comment-content comment">
											<p><?php echo $rate['description']; ?></p>
										</div> <!-- .comment-content -->
									</div><!-- .comment-body -->
								</li><!-- .comment -->
									<?php } ?> 
							</ol><!-- .comment-list -->
							<?php
								if(isset($submit)){
									$userid=$db->escapstr($user_id);
									$curseid=$db->escapstr($cid);
									$descrips=$db->escapstr($comment);
									$ratings=$db->escapstr($rating);
									$date=time();
									$ip=$_SERVER['REMOTE_ADDR'];
									
									$set="user_id='$userid'";
									$set .=",course_id='$curseid'";
									$set .=",description='$descrips'";
									$set .=",rating='$ratings'";
									$set .=",crcdt='$date'";
									$set .=",ip_addr='$ip'";
									$db->insertrec("INSERT INTO review set $set");
									$locat=$_SERVER['REQUEST_URI'];
									header("location:$locat&rev");
								}?>
							<?php if(!empty($user_id)){ 
							 if(isset($rev)){ 
							      echo "<script>swal('Success','You review posted successfully','success')</script>";  
							}  ?>
							<div class="comment-respond" id="respond">
								<h3 class="comment-reply-title" id="reply-title">Add a review <?php echo $revis=isset($revis)?$revis:''; ?></h3>
								<form novalidate="" class="comment-form" name="myform" id="commentform" method="post" enctype="multipart/form-data" action="singlecourse.php?cid=<?php echo base64_encode($cid);?>" />
									<p class="comment-form-rating">
										<label>Your Rating:</label>
										<span class="comment-rating">
											<a class="one-star" onclick="setrating(1)" href="#" data-rating="1"></a>
											<a class="two-star" onclick="setrating(2)" href="#" data-rating="2"></a>
											<a class="three-star" onclick="setrating(3)" href="#" data-rating="3"></a>
											<a class="four-star" onclick="setrating(4)" href="#" data-rating="4"></a>
											<a class="five-star" onclick="setrating(5)" href="#" data-rating="5"></a>
											<input type="hidden" id="rate" name="rating" value=""/>
										</span><!-- .comment-rating -->
									</p>
									<p class="comment-form-comment">
										<label for="comment">Your Comment:</label>
										<textarea id="comment" name="comment" cols="45" rows="2" aria-required="true" required></textarea>
									</p>
									<p class="form-submit">
										<label for="submit">Submit</label>
										<input name="submit" type="submit" id="submit" class="button medium primary rounded" value="Submit" />
									</p>
								</form>
							</div> <!-- #respond -->
							<?php } else { echo "<div class='alert alert-warning'>You must be logged in to post a review</div>"; } ?>
							
						</div><!-- .comments-area -->
					</div><!-- #reviews -->
				</div>
			</section><!-- #course-review -->
		</div><!-- .site-content -->

<div class="modal fade follower-modal" id="video_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $course['video_title1']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
		<?php if(!empty($course['video1'])){ ?>
		    <div class="embed-responsive embed-responsive-16by9">
			
			<?php if(($cat['pay_status']==0)&& ($course['type']==0)){ ?>
			    <video width="100%" controls>
				  <source src="uploads/course_video/<?php echo $course['video1']; ?>" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
			<?php } elseif($course['user_id'] == $_SESSION['userid']){ ?>
				<video width="100%" controls>
				  <source src="uploads/course_video/<?php echo $course['video1']; ?>" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
			
			<?php } elseif(($cat['pay_status']==1)&& ($course['type']==1)){?>
			<video width="100%" controls>
				  <source src="uploads/course_video/<?php echo $course['video1']; ?>" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
			<?php } else{ echo"<div class='alert alert-warning'>You must be buy a course to view the video.</div>";}?>
			
			</div>
		<?php }else{  echo"<div class='alert alert-warning'>No Records Found.</div>";}?>
		</div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	

<script type="text/javascript">


function cart(id,price)
{
	
	
	 $.ajax({
		url:'cartajax.php?id='+id+'&price='+price,
		success:function(result)
		{


			if(result==1){
				swal("Success","<?php echo $course['title']; ?> added to cart successfully","success");
				$("#cartt").load(location.href + " #cartt");				
			}
					
		}
	}); 
}

function wishlist(id)
{ 
	$.ajax({
		url:'wishlistajax.php?id='+id,
		success:function(result)
		{
			$('#wishlistid').html(result);
		}
	})
}

function setrating(val){
	$("#rate").value(val)
}
</script>
<style>
   .video-playico:before {
	 position: absolute;
	 content: "\f01d";
	 font-family: FontAwesome;
	 font-size:5em;
	 color:#FFF;
	 top: 50%;
	 left: 50%;
	 margin: -33px 0 0 -33px;
   }
</style>
<?php include "includes/footer.php"; ?>	