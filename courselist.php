<?php include "includes/header.php"; ?>
		<div id="content" class="site-content courses-content ">
			<?php include "includes/findcourse.php";?>
			<div class="container" style="padding-top:50px;">
				<div class="row">
					<main id="main" class="site-main col-md-9">
 						<div class="sort clearfix">
							<!--<form action="#" class="ordering pull-left" />
								<div class="selectbox">
									<select class="orderby" name="orderby">
										<option value="menu_order" />Default sorting
										<option value="popularity" />popularity
										<option value="rating" />average rating
										<option value="date" />newness
										<option value="price" />price: low to high
										<option value="price-desc" />price: high to low
									</select>
								</div>
							</form> -->

							<div class="style-switch pull-right clearfix">								
								<a href="#" data-view="grid"><i class="fa fa-th"></i></a>
								<a class="active" href="#" data-view="list"><i class="fa fa-th-list"></i></a>
							</div>
						</div> <!-- .sort --> 
				
						<div class="courses layout list column-3">
						<?php
						$que="SELECT a.*, b.category_name, c.fname,c.lname,c.img FROM course as a INNER JOIN category as b ON a.cat=b.id INNER JOIN register as c ON a.user_id = c.id WHERE a.active_status='1'";
						
						if(isset($find)){
							$category=$db->escapstr($category);
							$key=$db->escapstr($keyword);
							if(!empty($key)){
								$que.=" AND a.title or b.category_name like '%$key%'";
								
							}
							if(!empty($category)){
								$que.=" AND a.cat ='$category'";
							}
						}
						if(isset($search)){
							$keywrd=$db->escapstr($keywordss);
							if(!empty($keywrd)){
								$que.=" AND a.title or b.category_name like '%$keywrd%'";
								
							}
						}
						if(isset($subcatid)){
							$subcatid=$db->escapstr($subcatid);
							if(!empty($subcatid)){
							  $que.=" AND a.subcat='$subcatid'";
							}
						}
						if(isset($cattid)){
							$cattid=$db->escapstr($cattid);
							if(!empty($cattid)){
							  $que.=" AND a.cat='$cattid'";
							}
						}
						if(isset($popcourseid)){
							$popcourseid=$db->escapstr($popcourseid);
							if(!empty($popcourseid)){
							  $que.=" AND a.id='$popcourseid'";
							}
						}
						include "pagination.php";
						$rowsperpage=5;
						$limit=limitation($rowsperpage);
						$details=$db->get_all($que.$limit);
						$norec=count($details);
						if($norec==0){
							echo"<div class='alert alert-warning'> No records found!</div>";
						}
						else{
						foreach($details as $det):
						
						?>
							<div class="course">
								<div class="course-inner shadow">
									<div class="course-thumb">
										<a class="mini-zoom" href="singlecourse.php?cid=<?php echo base64_encode($det['id']);?>">
											<img src="<?php echo 'uploads/course_images/'.$det['img1']; ?> " alt="<?php echo $det['img_title1'];?>" />
											<img class="img-list" src="<?php echo 'uploads/course_images/'.$det['img1']; ?>" alt="<?php echo $det['img_title1'];?>" />
										</a>
									</div><!-- .course-thumb -->

									<div class="course-info">
										<span class="course-cat"><a href="singlecourse.php?cid=<?php echo base64_encode($det['id']); ?>"><?php echo $det['category_name']; ?></a></span>	

										<h3 class="course-title"><a href="singlecourse.php?cid=<?php echo base64_encode($det['id']); ?>"><?php echo $det['title']; ?></a></h3>

										<div class="course-desc">
											<p><?php echo substr($det['description'],0,370); ?></p>
										</div><!-- .course-desc -->

										<div class="course-author">
										<?php
											$img=!empty($det['img'])?$det['img']:'noimage.png';
											$name=!empty($det['fname'])?$det['fname'].' '.$det['lname']:'Admin';
										?>
											<a href="javascript:;"><img src="<?php echo 'uploads/profile_images/'.$img; ?>" width="20" alt="<?php echo $name;?>" /></a>
											<span>by <a href="publicprofile.php?pid=<?php echo base64_encode($det['user_id']); ?>"><?php echo $name; ?></a></span>
										</div><!-- .course-author -->

										<div class="course-meta">
											<ul>
											 <li><i class="fa fa-users"></i><?php echo $com_obj->buy_student($det['id']); ?></li>
											 <li><a href="javascript:;"><i class="fa fa-comment"></i> <?php echo $com_obj->review_count($det['id']); ?></a></li>
											 <li><a href="javascript:;" class="c-price"><?php echo $DCrncy.$det['price']; ?></a></li>
											</ul>
										</div><!-- .course-meta -->
									</div><!-- .course-info -->
								</div><!-- .course-inner -->
							</div><!-- .course -->
						<? endforeach ?>
						<? } ?>
						</div><!-- .courses -->
						
						


					</main><!-- .site-main -->

					<div id="sidebar" class="sidebar col-md-3">
						<aside class="widget">
							<h3 class="widget-title">All Categories</h3>
							
							<ul>
							<?php
							$record=$db->get_all("select id,category_name from category where parent_id='0' AND active_status='1'");
							foreach($record as $rec){
							?>
								<li><a href="courselist.php?cattid=<?php echo $rec['id'] ?>"><?php echo $rec['category_name'] ?></a></li>
							<?php } ?>
							</ul>
							
							
							
						</aside><!-- .widget -->

						<aside class="widget courses-widget">
							<h3 class="widget-title">Popular courses</h3>
							<div class="courses">
							
								<ul>
								<?php
							    $records=$db->get_all("select * from course where active_status='1' order by rand() limit 5");
							    foreach($records as $record){
								
								?>
									<li>
										<a class="thumb" href="courselist.php?popcourseid=<?php echo $record['id'] ?>"><img src="<?php echo 'uploads/course_images/'.$record['img1'] ?>" alt="<?php echo $record['img_title1'] ?>" /></a>
										<div class="info">
											<h4><a href="courselist.php?popcourseid=<?php echo $record['id'] ?>"><?php echo $record['title'] ?></a></h4>
											<span><i class="fa fa-users"></i><?php echo $com_obj->buy_student($record['id']); ?></span>
										</div>
									</li>
									<?php } ?>

								</ul>
							
							</div><!-- .widget -->
						</aside><!-- .widget -->

					</div><!-- .sidebar -->
				</div><!-- .row -->
			<center><?php echo $pagingLink = getPagingLink1($que,$rowsperpage,"",$db); ?></center>
			</div><!-- .container -->
			
		</div><!-- .site-content -->

<?php include "includes/footer.php"; ?>
