<?php include "includes/header.php"; ?>
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
                   <?php include "includes/profileleft.php"; ?>
                  <div class="col-sm-9">
					<div class="row">
					   <div class="col-sm-12">
					       <ul class="prof_menu">
							   <li><a href="studentdashboard.php">My Course</a></li>
							   <li class="active"><a href="myfavourite.php">My Wishlist</a></li>
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
                                   
									   $sql="select a.id as wishlistid,a.course_id,b.*,c.id,c.fname,c.lname,c.img from wishlist as a inner join course as b on a.course_id=b.id left join register as c on c.id=b.user_id  where a.user_id ='$user_id'";
                                 $count=$db->numrows($sql);
                               //  echo $count;
                              if ($count==0) {
                               echo "<div class='alert alert-warning'>No Records Found.</div>";
                              }
                              else{

									   $favcourse=$db->get_all($sql.$limit);
									   $path="uploads/course_images/";
									   foreach($favcourse as $fav){ 
									   ?>
                                          <div class="course">
                                             <div class="course-inner shadow">
                                                <div class="course-thumb">
                                                   <a class="mini-zoom" href="singlecourse.php?cid=<?php $id=base64_encode($fav['course_id']); echo $id; ?>">
                                                   <img src="<?php echo $path .$fav['img1']; ?>" alt="" />
                                                   <img class="img-list" src="<?php echo $path .$fav['img1']; ?>" alt="" />
                                                   </a>
                                                </div>
                                                <!-- .course-thumb -->
                                                <div class="course-info">
                                                   <span class="course-cat"><?php $favid=$fav['cat'];$favcat=$db->singlerec("SELECT category_name FROM category WHERE id='$favid'"); echo $favcat ['category_name']; ?></span>	
                                                   <h3 class="course-title"><a href="singlecourse.php?cid=<?php $id=base64_encode($fav['id']); echo $id; ?>"><?php echo $fav ['title']; ?></a></h3>
                                                   <div class="course-desc">
                                                      <p><?php echo $fav ['description']; ?></p>
                                                   </div>
                                                   <!-- .course-desc -->
                                                   <div class="course-author">
                                                      <a href="publicprofile.php?pid=<?php $id=base64_encode($fav['user_id']); echo $id; ?>"><img src="uploads/profile_images/<?php echo $fav['img']; ?>" style="width:32px" alt="" /></a>
                                                      <span>by <a href="publicprofile.php?pid=<?php $id=base64_encode($fav['user_id']); echo $id; ?>"><?php echo $fav['fname'].' '.$fav['lname']; ?></a></span>
                                                   </div>
                                                   <!-- .course-author -->
                                                   <div class="course-meta">
                                                      <ul>
                                                         <li><a href="myfavourite.php?did=<?php echo base64_encode($fav['wishlistid']);?>" onclick="return confirm('Are  you sure want to remove?');" class="button primary rounded"><i class="fa fa-heart"></i> Remove </a></li>
                                                      </ul>
                                                   </div>
                                                   <!-- .course-meta -->
                                                </div>
                                                <!-- .course-info -->
                                             </div>
                                             <!-- .course-inner -->
                                          </div>
                                          <!-- .course -->
									   <? } 
                                } 
                              ?>
                                          <?php
												if(isset($did)){
														$id=base64_decode($did);
													    $db->insertrec("delete from wishlist where id='$id'");
														header("location:myfavourite.php");
														exit;
												}
											?>
                                     <center><? echo $pagingLink = getPagingLink1($sql,$rowsPerPage,"",$db); ?></center>
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
 <?php include "includes/footer.php"?>
      