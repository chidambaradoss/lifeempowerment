<?php
include "includes/header.php";
if($userinfo['user_role']!=1) {
	echo "<script>location.href='userprofile.php';</script>";
	//header("Location: userprofile.php");
	exit;
}
?>
         <!-- .site-header -->
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
                   <?php include "includes/profileleft.php"; ?>
                  <div class="col-sm-9">
					<?php
					if(isset($upd)){
						echo"<div class='alert alert-success'>Your role has been upgraded to teacher. Now you can post your courses.</div>";
					}
					?>
					<div class="row">
					   <div class="col-sm-12">
					       <ul class="prof_menu">
							   <li class="active"><a href="teacherdashboard.php">Dashboard</a></li>

							  <li><a href="postcourse.php">Post New Course</a></li>
							 
							   <li><a href="mylisting.php">Manage Course</a></li>
							</ul>
					   </div>
					</div>
					
					
                     <div class="col-sm-12 profile-box">
                        <div class="col-md-12 row">
                           <div class="panel">
                              <div class="panel-body" style="padding:25px;">
                                 <div class="row">
                                    <div class="col-sm-12 text-center">
									    <div class="col-sm-4">
										    <h2>Total Revenue</h2>
											<h2 style="color:#612D91; font-weight:bold;"><?php echo$DCrncy.$com_obj->total_revenue($userinfo['id']); ?></h2>
										</div>
										
										<div class="col-sm-4">
										    <h2>Recent Average Rating</h2>
											<h2 style="color:#612D91; font-weight:bold;"><?php echo $com_obj->percentage($userinfo['id']);?>%</h2>
										</div>
										
										<div class="col-sm-4">
										    <h2>Total Students</h2>
											<h2 style="color:#612D91; font-weight:bold;"><?php echo $com_obj->buy_student($userinfo['id']); ?></h2>
										</div>
									</div>
                                 </div>
                                 <!-- .row -->
								 
								 <div class="row mt30">
								    <div class="col-sm-12">
									   <h1>Recently Added Course</h1>
									   <div class="row mt20">
									   <?php 
									   $query="SELECT * FROM course WHERE user_id='$user_id' ORDER by id DESC limit 3";

									     $count=$db->numrows($query);
                                //echo $count;
                              if ($count==0) {
                                 echo "<div class='alert alert-warning'>No Records Found.</div>";
                              }
                               else {

									   $getcourse=$db->get_all($query);


									    foreach($getcourse as $course){ ?>
									       <div class="col-sm-4">
										       <div class="course">
													<div class="course-inner shadow">
														<div class="course-thumb">
															<a class="mini-zoom" href="singlecourse.php?cid=<?php $id=base64_encode($course['id']); echo $id; ?>">
															<img  src="uploads/course_images/<?php echo $course['img1']; ?>" alt="" />
																<!--<img class="img-list" src="uploads/course_images//* <?php echo $course['img1']; ?> */" alt="" />-->
															</a>
														</div><!-- .course-thumb -->
														<div class="course-info">
															<span class="course-cat"><?php $catid=$course['cat'];$cat=$db->singlerec("SELECT category_name FROM category WHERE id='$catid'"); echo $cat ['category_name']; ?></span>	
															<h3 class="course-title" >
															<a href="singlecourse.php?cid=<?php $id=base64_encode($course['id']); echo $id; ?>"><?php echo $course ['title']; ?></a></h3>

															<div class="course-desc">
																
															</div><!-- .course-desc -->

														</div><!-- .course-info -->
													</div><!-- .course-inner -->
												</div><!-- .course -->
										   </div>
										    <?php 
										} 

										    }?> 
									   </div>
									</div>
								 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- #course-about -->	
         </div>
         <!-- .site-content -->
   <?php include "includes/footer.php"; ?>  