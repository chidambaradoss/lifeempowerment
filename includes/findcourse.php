
<div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/about-title.jpg">
				<div class="container">
					<div class="search-by-cat bgtrans">
<form action="courselist.php" method="GET">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div class="selectbox">
									<select name="category" id="cate" onchange="getSubcategory(this.value)">
										<?php echo $category=isset($category)?$category:''; echo $drop->get_dropdown($db,"SELECT id,category_name FROM category WHERE parent_id='0'",$category);
										?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<input type="text" name="keyword" value="<?php $keyword=isset($keyword)?$keyword:'';?>" placeholder="Enter Keyword" />
							</div>

							<div class="col-md-3">
								<input type="submit" name="find"  value="Find Course" class="button primary rounded large full" />
							</div>
						</div>
					</div><!-- .container -->
				</form>
				</div><!-- .search-by-cat -->
				</div><!-- .container -->
			</div><!-- .page-title -->