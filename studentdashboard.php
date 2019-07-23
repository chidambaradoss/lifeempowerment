<?php
include "includes/header.php"; 
if($userinfo['user_role']!=0) {
	echo "<script>location.href='userprofile.php';</script>";
	header("Location: userprofile.php");
	exit;
}?>
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
                  <?php include "includes/profileleft.php"; ?>
                  <div class="col-sm-9">
					<div class="row">
					   <div class="col-sm-12">
					       <ul class="prof_menu">
							   <li class="active"><a href="studentdashboard.php">My Course</a></li>
							   <li><a href="myfavourite.php">My Wishlist</a></li>
							   <li><a href="myprogress.php">In Progress</a></li>
							</ul>
					   </div>
					</div>
                     <div class="col-sm-12 profile-box">
                        <div class="col-md-12 row">
                           <div class="panel">
                              <div class="panel-body" style="padding:25px;">
                                 <div class="row">
                                    <main id="main" class="site-main col-md-12">
                                       <div class="sort clearfix">
                                          <div class="style-switch pull-right clearfix">								
                                             <a href="#" data-view="grid"><i class="fa fa-th"></i></a>
                                             <a class="active" href="#" data-view="list"><i class="fa fa-th-list"></i></a>
                                          </div>
                                       </div>
                                       <!-- .sort -->
                                       <div class="courses layout list column-3">
									    <?php 
										include "pagination.php";
										$rowsPerPage="3";
										$limit=limitation($rowsPerPage);
                              //echo "select count(*) from (select a.*,b.course_id,c.fname,c.lname,c.img from course as a inner join checkout as b on a.id=b.course_id left join register as c on c.id=a.user_id  where b.user_id ='$user_id' and b.pay_status='1')t";
										$ques="select a.*,b.course_id,c.fname,c.lname,c.img from course as a inner join checkout as b on a.id=b.course_id left join register as c on c.id=a.user_id  where b.user_id ='$user_id' and b.pay_status='1'"; 
                                 $count=$db->numrows($ques);
                                //echo $count;
                              if ($count==0) {
                                 echo "<div class='alert alert-warning'>No Records Found.</div>";
                              }
                               else{ 
										$studcourse=$db->get_all($ques.$limit);
                              
										foreach($studcourse as $std){ ?>
                                          <div class="course">
                                             <div class="course-inner shadow">
                                                <div class="course-thumb">
                                                   <a class="mini-zoom" href="singlecourse.php?cid=<?php $id=base64_encode($std['id']); echo $id; ?>">
												    <img src="uploads/course_images/<?php echo $std['img1']; ?>" alt="" />
                                                   <img class="img-list"  src="uploads/course_images/<?php echo $std['img1']; ?>" alt="" />
                                                   </a> 
                                                </div>
                                                <!-- .course-thumb -->
                                                <div class="course-info">
                                                   <span class="course-cat"><?php $scatid=$std['cat'];$scat=$db->singlerec("SELECT category_name FROM category WHERE id='$scatid'"); echo $scat ['category_name']; ?></span>	
                                                   <h3 class="course-title"><a href="singlecourse.php?cid=<?php $id=base64_encode($std['id']); echo $id; ?>"><?php echo $std ['title']; ?></a></h3>
                                                   <div class="course-desc">
                                                      <p><?php echo $std ['description']; ?></p>
                                                   </div>
                                                   <!-- .course-desc -->
                                                   <div class="course-author">
                                                      <a href="publicprofile.php?pid=<?php $id=base64_encode($std['user_id']); echo $id; ?>"><img src="uploads/profile_images/<?php echo $std['img']; ?>" style="width:32px" alt="" /></a>
                                                      <span>by <a href="publicprofile.php?pid=<?php  $id=base64_encode($std['user_id']); echo $id; ?>"><?php echo $std['fname'].' '.$std['lname']; ?></a></span>
                                                   </div>
                                                   <!-- .course-author -->
                                                   <div class="course-meta">
                                                      <ul>
                                                       <!--  <li><i class="fa fa-thumbs-o-up"></i> 50</li>-->
                                                         <li><i class="fa fa-users"></i> <?php echo $com_obj->buy_student($std['user_id']); ?></li>
                                                         <li><a href="#"><i class="fa fa-comment"></i> <?php echo $com_obj->review_rating($std['course_id']); ?></a></li>
                                                         
                                                      </ul>
                                                   </div>
                                                   <!-- .course-meta -->
                                                </div>
                                                <!-- .course-info -->
                                             </div>
                                             <!-- .course-inner -->
                                          </div>
                                          <!-- .course -->
                                          
                                       </div>
											  <? } 
                                     }  
                                   ?>
                                       <!-- .courses -->
                                       <center><? echo $pagingLink = getPagingLink1($ques,$rowsPerPage,"",$db); ?></center>
                                    </main>
                                    <!-- .site-main -->
                                 </div>
                                 <!-- .row -->
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