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
							   <li><a href="myfavourite.php">My Wishlist</a></li>
							   <li class="active"><a href="myprogress.php">In Progress</a></li>
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
									   $queri="select a.*,b.course_id,c.fname,c.lname,c.img from course as a inner join checkout as b on a.id=b.course_id left join register as c on  c.id=a.user_id  where b.user_id ='$user_id' and b.pay_status='0'"; 
                               $count=$db->numrows($queri);
                                //echo $count;
                              if ($count==0) {
                                 echo "<div class='alert alert-warning'>No Records Found.</div>";
                              }
                               else{ 
									   $mycourse=$db->get_all($queri.$limit);
									   $path="uploads/course_images/";
									   foreach($mycourse as $progrs){ ?>
                                          <div class="course">
                                             <div class="course-inner shadow">
                                                <div class="course-thumb">
                                                   <a class="mini-zoom" href="singlecourse.php?cid=<?php $id=base64_encode($progrs['id']); echo $id;?>">
                                                   <img src="<?php echo $path. $progrs['img1']; ?>" alt="" />
                                                   <img class="img-list" src="<?php echo $path. $progrs['img1']; ?>" alt="" />
                                                   </a>
                                                </div>
                                                <!-- .course-thumb -->
                                               
                                            <div class="course-info">
                                                   <span class="course-cat"><?php $sproid=$progrs['cat'];$procat=$db->singlerec("SELECT category_name FROM category WHERE id='$sproid'"); echo $procat ['category_name']; ?></span>	
                                                   <h3 class="course-title"><a href="singlecourse.php?cid=<?php $id=base64_encode($progrs['id']); echo $id; ?>"><?php echo $progrs ['title']; ?></a></h3>
                                                   <div class="course-desc">
                                                      <p><?php echo $progrs ['description']; ?></p>
                                                   </div>
                                                   <!-- .course-desc -->
                                                   <div class="course-author">
                                                      <a href="publicprofile.php?pid=<?php $id=base64_encode($progrs['user_id']); echo $id; ?>"><img src="uploads/profile_images/<?php echo $progrs['img']; ?>" style="width:32px" alt="" /></a>
                                                      <span>by <a href="publicprofile.php?pid=<?php $id=base64_encode($progrs['user_id']); echo $id; ?>"><?php echo $progrs['fname'].' '.$progrs['lname']; ?></a></span>
                                                   </div>
                                                   <!-- .course-author -->
                                                   <div class="course-meta">
                                                      <ul>
                                                         <li><a href="singlecourse.php?cid=<?php $id=base64_encode($progrs['id']); echo $id; ?>" class="button primary rounded"> Start Course</a></li>
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
										<center><? echo $pagingLink = getPagingLink1($queri,$rowsPerPage,"",$db); ?></center>
                                       <!-- .courses -->
                                      <!-- <nav class="pagination">
                                          <ul>
                                             <li class="prev"><a href="#">Previous</a></li>
                                             <li><span class="current">1</span></li>
                                             <li><a href="#">2</a></li>
                                             <li><a href="#">3</a></li>
                                             <li><a href="#">4</a></li>
                                             <li><a href="#">5</a></li>
                                             <li><span>...</span></li>
                                             <li><a href="#">68</a></li>
                                             <li class="next"><a href="#">Next</a></li>
                                          </ul>
                                       </nav>-->
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