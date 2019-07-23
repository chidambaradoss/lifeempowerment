<?php include "includes/header.php"; ?>

<div id="content" class="site-content">
<section id="course-about" class="course-section">
   <div class="container ">
	  <?php include "includes/profileleft.php"; ?>
	  <div class="col-sm-9">
		<div class="row">
		   <div class="col-sm-12">
			   <ul class="prof_menu">
				   <li><a href="teacherdashboard.php">Dashboard</a></li>
				   <li><a href="postcourse.php">Post New Course</a></li>
				   <li class="active"><a href="mylisting.php">Manage Course</a></li>
				</ul>
		   </div>
		</div>
		 <div class="col-sm-12 profile-box">
			<div class="col-md-12 row">
			   <div class="panel">
			   <?php if(isset($success)){
							echo"<div class='alert alert-success'> Your New course posted successfully</div>";
						
						}
						if(isset($succed)){
							echo"<div class='alert alert-success'> Your New course Updated successfully</div>";
						}	
						?>
				  <div class="panel-body" style="padding:25px;">
					 <div class="row">
						<main id="main" class="site-main col-md-12">
						   <div class="sort clearfix">
							  <div class="style-switch pull-right clearfix">								
								 <a href="#" data-view="grid"><i class="fa fa-th"></i></a>
								 <a class="active" href="#" data-view="list"><i class="fa fa-th-list"></i></a>
							  </div>
						   </div>
							<div class="courses layout list column-3">
								<?php
								include "pagination.php";
								$rowsPerPage=3;
								$limit=limitation($rowsPerPage); 

								$que="select a.*,b.category_name from course as a inner join category as b on a.cat=b.id  where user_id='$user_id' order by a.id desc";
								
								$count=$db->numrows($que);
                                //echo $count;
                              if ($count==0) {
                                 echo "<div class='alert alert-warning'>No Records Found.</div>";
                              }	
                              else {

								$getcrs=$db->get_all($que.$limit);
								$path="uploads/course_images/";
								foreach($getcrs as $crs):
								?>
								<div class="course">
									<div class="course-inner shadow">
									<div class="course-thumb col-sm-3">
									   <a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($crs['id']); ?>" >
									   <img src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
									   <img class="img-list" src="<?php echo $path.$crs['img1']; ?>" alt="<?php echo $crs['title']; ?>"/>
									   </a>
									</div>
									<div class="course-info col-sm-8 no-padding">
									   <span class="course-cat"><a href="javascript:;"><?php echo $crs['category_name']; ?></a></span>	
									   <h3 class="course-title"><a href="singlecourse.php?cid=<?php $id=base64_encode($crs['id']); echo $id; ?>"><?php echo $crs['title']; ?></a></h3>
									   <div class="course-desc">
										  <p><?php echo $crs['description']; ?></p>
									   </div>
									   <div class="course-meta">
										  <ul>
										  <?php $id=base64_encode($crs['id']); ?>
											 <li><a href="postcourse.php?id=<?php echo $id;?>" class="button primary rounded pull-right"><i class="fa fa-pencil-square-o pdr5"></i> Edit Course</a></li>
										  </ul>
									   </div>
									</div>
									</div>
								</div>
								<?php endforeach; 
									}
								?>

						   </div>
						  <center><?php echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?></center>
						  <!-- <nav class="pagination hidden">
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
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
</section>
</div>
<?php include "includes/footer.php"; ?>