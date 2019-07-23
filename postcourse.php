<?php
include "includes/header.php";
$id=isset($id)?base64_decode($id):'';
$editcrs=$db->singlerec("select img1,img2,video_pre1,video_pre2,video1,video2,file_pdf from course where id='$id'");
$gender=$userinfo['gender'];
$bio=$userinfo['bio'];
$mobile=$userinfo['mobile'];
if (empty($gender) && empty($bio) && empty($mobile)) {
	echo "<script>
	salert('Please fill the edit profile');
			</script>";
	echo "<script>location.href='usereditprofile.php';
</script>";		

}

if(isset($complete)){
	//echo "dsfdgdflgj xcmnvkjdfh";exit;
	$titles=$db->escapstr($title);
	$descrip=$db->escapstr($description);
	$category=$db->escapstr($cate);
	$subcate=$db->escapstr($sub);
	$ctype=$db->escapstr($type);
	$levels=$db->escapstr($level);
	$abouts=$db->escapstr($courses);
	$classdescrip=$db->escapstr($descrip);
	$requirments=$db->escapstr($require);
	$duration=$db->escapstr($duration);
	$price=$db->escapstr($price);
	$tag=$db->escapstr(implode(",",$tag));
	$questions1=$db->escapstr($question);
	$answers1=$db->escapstr($answer);
	$questions2=$db->escapstr($questi1);
	$answers2=$db->escapstr($ans1);
	$picture1=$db->escapstr($picture);
	$picture2=$db->escapstr($titlepic);
	$videotitle1=$db->escapstr($video);
	$videotitle2=$db->escapstr($videos);
	$date=time();
	
	$set ="user_id='$user_id'";
	$set .=",title='$titles'";
	$set .=",description='$descrip'";
	$set .=",cat='$category'";
	$set .=",subcat='$subcate'";
	$set .=",type='$ctype'";
	$set .=",level='$levels'";
	$set .=",about='$abouts'";
	$set .=",brief_description='$classdescrip'";
	$set .=",requirement='$requirments'";
	$set .=",duration='$duration'";
	$set .=",price='$price'";
	$set .=",tag='$tag'"; 
	$set .=",faq_ques1='$questions1'";
	$set .=",faq_ans1='$answers1'";
	$set .=",faq_ques2='$questions2'";
	$set .=",faq_ans2='$answers2'";
	$set .=",img_title1='$picture1'";
	$set .=",img_title2='$picture2'";
	$set .=",video_title1='$videotitle1'";
	$set .=",video_title2='$videotitle2'";
	$set .=",crcdt='$date'";
	
	$imgs1=isset($_FILES['images1']['tmp_name'])?$_FILES['images1']['tmp_name']:'';
	$imgs2=isset($_FILES['images2']['tmp_name'])?$_FILES['images2']['tmp_name']:'';
	$vimgs3=isset($_FILES['images3']['tmp_name'])?$_FILES['images3']['tmp_name']:'';
	$vimgs4=isset($_FILES['images4']['tmp_name'])?$_FILES['images4']['tmp_name']:'';
	$vdimgs5=isset($_FILES['images5']['tmp_name'])?$_FILES['images5']['tmp_name']:'';
	//Print_r($_FILES['images5']);exit;
	$vdimgs6=isset($_FILES['images6']['tmp_name'])?$_FILES['images6']['tmp_name']:'';
	$upfile=isset($_FILES['upfile']['tmp_name'])?$_FILES['upfile']['tmp_name']:'';
	
	$imgerr='';
		if($imgs1!=''){
		   if(!empty($id)){
			$img=$editcrs['img1'];
			$path="uploads/course_images/";
			@unlink($path.$img);
		   }
		
		$uniqname1=uniqid();
		$upload1=$com_obj->upload_image("images1",$uniqname1,600,600,"uploads/course_images/","new");
		if($upload1){
			$newimg1=$com_obj->img_Name;
			$set .=",img1='$newimg1'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}	

	
	if($imgs2!=''){
		if(!empty($id)){
			$img=$editcrs['img2']; 
			$path="uploads/course_images/";
			@unlink($path.$img);
		} 
		$uniqname2=uniqid();
		$upload2=$com_obj->upload_image("images2",$uniqname2,600,600,"uploads/course_images/","new");
		if($upload2){
			$newimg2=$com_obj->img_Name;
			$set .=",img2='$newimg2'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	if($vimgs3!=''){
		if(!empty($id)){
			$vimg=$editcrs['video_pre1'];
			$path="uploads/video_images/";
			@unlink($path.$vimg);
		} 
		$uniqname3=uniqid();
		$upload3=$com_obj->upload_image("images3",$uniqname3,600,600,"uploads/video_images/","new");
		if($upload3){
			$newimg3=$com_obj->img_Name;
			$set .=",video_pre1='$newimg3'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	if($vimgs4!=''){
		if(!empty($id)){
			$vimg=$editcrs['video_pre2'];
			$path="uploads/video_images/";
			@unlink($path.$vimg);
		} 
		$uniqname4=uniqid();
		$upload4=$com_obj->upload_image("images4",$uniqname4,600,600,"uploads/video_images/","new");
		if($upload4){
			$newimg4=$com_obj->img_Name;
			$set .=",video_pre2='$newimg4'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	if($vdimgs5!=''){
		if(!empty($id)){
			$vimg=$editcrs['video1'];
			$path="uploads/course_video/";
			@unlink($path.$vimg);
		} 
		$uniqname5=uniqid();
		$upload5=$com_obj->upload_video("images5",$uniqname5,"uploads/course_video/","new");
		file_exists("uploads/course_video/");
		if($upload5){
			$newimg5=$com_obj->img_Name;
			$set .=",video1='$newimg5'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	if($vdimgs6!=''){
		if(!empty($id)){
			$vimg=$editcrs['video2'];
			$path="uploads/course_video/";
			@unlink($path.$vimg);
		} 
		$uniqname6=uniqid();
		$upload6=$com_obj->upload_video("images6",$uniqname6,"uploads/course_video/","new");
		if($upload6){
			$newimg6=$com_obj->img_Name;
			$set .=",video2='$newimg6'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	
	if($upfile!=''){
		if(!empty($id)){
			$file=$editcrs['file_pdf'];
			$path="uploads/document/";
			@unlink($path.$file);
		} 
		$uniqname7=uniqid();
		$upload7=$com_obj->upload_files("upfile",$uniqname7,"uploads/document/","new");
		if($upload7){
			$newfile=$com_obj->img_Name;
			$set .=",file_pdf='$newfile'";
		}
		else{
			$imgerr.="$com_obj->img_Err <br>";
		}
	}
	
	if($imgerr==''){
		if(empty($id)){
			
			$db->insertrec("INSERT INTO course set $set");
			header("location:mylisting.php?success");
			exit;
		}
		else{
			
		  //echo "UPDATE course set $set WHERE id='$id'";exit;
			$db->insertrec("UPDATE course set $set WHERE id='$id'");
			header("location:mylisting.php?succed");
			exit;
		}
	}
	else{
	 $error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$imgerr</div>";
	}
}
if(!empty($id)){
$courseedit=$db->singlerec("SELECT * FROM course WHERE id='$id'");
$title=$courseedit['title'];
$description=$courseedit['description'];
$cate=$courseedit['cat'];
$sub=$courseedit['subcat'];
$type=$courseedit['type'];
$level=$courseedit['level'];
$courses=$courseedit['about'];
$descrip=$courseedit['brief_description'];
$require=$courseedit['requirement'];
$duration=$courseedit['duration'];
$price=$courseedit['price'];
$tag=explode("','",$courseedit['tag']);
$question=$courseedit['faq_ques1'];
$answer=$courseedit['faq_ans1'];
$questi1=$courseedit['faq_ques2'];
$ans1=$courseedit['faq_ans2'];
$picture=$courseedit['img_title1'];
$titlepic=$courseedit['img_title2'];
$video=$courseedit['video_title1'];
$videos=$courseedit['video_title2'];
}

?>
<script src="js/postcoursevali.js"></script>	
		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				  <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
				
					<div class="row">
					   <div class="col-sm-12">
					   
					       <ul class="prof_menu">
							   <li><a href="teacherdashboard.php">Dashboard</a></li>
							   <li class="active"><a href="postcourse.php">Post New Course</a></li>
							   <li><a href="mylisting.php">Manage Course</a></li>
							</ul>
					   </div>
					</div>
				    <div class="col-sm-12 profile-box">
					  

						<div class="post-couese-wiz">
		<section>
        <div class="wizard">
            
			
			<!----------------End Hidden---------------------->
			<div class="wizard-inner hidden">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
			
			<!----------------End Hidden---------------------->

            <form role="form"   method="POST" enctype="multipart/form-data" action="" >
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="row">
						    <fieldset>	
								<?php echo $error=isset($error)?($error):''; ?>							
							   <legend>Basic Details</legend>
								<div class="form-group">
								   <label class="profile-label">Class Title</label>
								   <input type="text" name="title" id="title" class="form-control"  value="<?php echo $title=isset($title)?$title:'';?>" >
								</div>

								<div class="form-group">
								   <label class="profile-label">Class Description</label>
								   
								   
								   <textarea rows="5" name="description"  id="description" class="form-control tiny" maxlength="100" ><?php echo $description=isset($description)?$description:'';?></textarea>
								</div>						   
							   
							   <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Category</label>
										   <select class="form-control" name="cate"  onchange="getSubcategory(this.value)">
											  <?php echo $cate=isset($cate)?$cate:''; echo $drop->get_dropdown($db,"SELECT id,category_name FROM category WHERE parent_id='0'",$cate);
											  ?>
										   </select>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Subcategory</label>
										   <select class="form-control" name="sub" id="sub" >
											  <option value="" >---select---</option>
											  <?php $sub=isset($sub) ? $sub :''; echo $drop->get_dropdown($db,"select id,category_name from category",$sub);
											?>
											  
										   </select>
										</div>
									</div>
							   </div>
							   
							   <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Class Type</label>
										   <select class="form-control"  name="type" id="type" >
											<?php
											foreach($GT_types as $key=>$types) {
											$type=isset($type)?$type:'';
											if($type==$types) $st="selected";
											else $st="";
											echo "<option value='$key' $st>$types</option>";
										    }
										    ?>
										   </select>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Level</label>
										   <select class="form-control" name="level" id="level" >
											  <?php
											foreach($GT_level as $key=>$levels) {
											$level=isset($level)?$level:'';
											if($level==$levels) $st="selected";
											else $st="";
											echo "<option value='$key' $st>$levels</option>";
										}
										?>
										   </select>
										</div>
									</div>
							   </div>
							 </fieldset>
						
							<ul class="list-inline pull-right">
							<!--onclick="basicstp1();"-->
								<li><button type="button"   class="button primary rounded apply-button next-step">Save and continue</button></li>
							</ul>
						</div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="row">
							
							   <fieldset>
								  <legend>Course Details</legend>
								  
								 <div class="form-group">
								   <label class="profile-label">About The Course</label>
								   <textarea rows="5" name="courses" id="courses"  class="form-control tiny"><?php echo $courses=isset($courses)?$courses:'';?></textarea>
								</div>	
								
								
								<div class="form-group">
								   <label class="profile-label">Brief Description</label>
								   <textarea rows="5" name="descrip" id="descrip"  class="form-control tiny"><?php echo $descrip=isset($descrip)?$descrip:'';?></textarea>
								</div>	
								
								<div class="form-group">
								   <label class="profile-label">Requirments</label>
								   <textarea rows="5" name="require" id="require"  class="form-control tiny"><?php echo $require=isset($require)?$require:'';?></textarea>
								</div>
	 
								 <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Class Duration (In Weeks)</label>
										   <input type="text" name="duration" id="duration"  value="<?php echo $duration=isset($duration)?$duration:'';?>" class="form-control">
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
										   <label class="profile-label">Price</label>
										   <input type="text" name="price" id="price"  value="<?php echo $price=isset($price)?$price:'';?>" class="form-control">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
										   <label class="profile-label">Tag</label>
										   <input type="text" name="tag[]" id="tag"  value="<?php 	
										   if ($id==0) {
										   	$tag="";
										   		echo $tag;
										   	}
										   	else{	
										      foreach ($tag as $key => $tags) {
										   	  echo $tags=isset($tags)?$tags:'';
										   }
										}
										  ?>" class="form-control">
										</div>
									</div>
							   </div>   
							   
							   </fieldset>
						
							
							<ul class="list-inline pull-right">
								<li><button type="button" class="btn btn-default prev-step mt10">Previous</button></li>
								<!--onclick="detailsstp2();" -->
								<li><button type="button" id="step-2" class="button primary rounded apply-button next-step">Save and continue</button></li>
							</ul>
						</div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="row">
							
							   <fieldset>
									<legend>FAQ</legend>
									<div class="form-group">
									   <label class="profile-label">Question</label>
									   <input type="text" name="question"  id="question" value="<?php echo $question=isset($question)?$question:'';?>" class="form-control">
									</div>
								
									<div class="form-group">
									   <label class="profile-label">Answer</label>
									   <textarea rows="5" name="answer" id="answer"  class="form-control tiny"><?php echo $answer=isset($answer)?$answer:'';?></textarea>
									</div>
								
									<div id="add_faq" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									  <div class="panel-body">
										<div class="form-group">
										   <label class="profile-label">Question</label>
										   <input type="text" name="questi1"  id="questi1" value="<?php echo $questi1=isset($questi1)?$questi1:'';?>" class="form-control">
										</div>
										
										<div class="form-group">
										   <label class="profile-label">Answer</label>
										   <textarea rows="5" name="ans1" id="ans1"  class="form-control tiny"><?php echo $ans1=isset($ans1)?$ans1:'';?></textarea>
										</div>
									  </div>
									</div>
								
								<a class="collapsed button success rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_faq" aria-expanded="false" aria-controls="add_faq">+ Add More FAQ's</a>
							   </fieldset>
							
							<ul class="list-inline pull-right">
								<li><button type="button"  class="btn btn-default prev-step mt10">Previous</button></li>
								<!--onclick="faqstp3();"-->
								<li><button type="button" id="step-3"  class="button primary rounded apply-button next-step">Save and continue</button></li>
							</ul>
						</div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="row">
						   
							   <fieldset>
									<legend>Photos (You can upload only two images)</legend>
									
									<div class="form-group">
									   <label class="profile-label">Title Of The Picture</label>
									   <input type="text" name="picture"  value="<?php echo $picture=isset($picture)?$picture:'';?>" class="form-control">
									</div>
								
									<div class="form-group">
									   <label class="profile-label">Select Picture</label>
									   <div class="row">
											
												<div class="col-sm-4">
													<!--<button class="file-upload button info rounded">--><input type="file" name="images1" class="file-upload button success rounded"><!--</button>-->
												<?php if(!empty($id)){ 
												?>
													<div class="col-sm-6"> 
														<img class="file-input" src="uploads/course_images/<?php echo $courseedit['img1']; ?>" alt="" />
													</div>
												<? } ?>
											</div>
										  
									   </div>
									</div>
								
									<div id="add_image" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									  <div class="panel-body">
										<div class="form-group">
										   <label class="profile-label">Title Of The Picture</label>
										   <input type="text" name="titlepic" value="<?php echo $titlepic=isset($titlepic)?$titlepic:'';?>" class="form-control">
										</div>
									
										<div class="form-group">
										   <label class="profile-label">Select Picture</label>
										   <div class="row">
											  <div class="col-sm-4">
												 <!--<button class="file-upload button info rounded">--><input type="file" name="images2" accept="image/*" class="file-upload button success rounded"><!--</button>-->
												 <?php if(!empty($id)){ ?>
													<div class="col-sm-6"> 
														<img class="img-list" src="uploads/course_images/<?php echo $courseedit['img2']; ?>" alt="" />
													</div>
												 <? } ?>
											  </div>
										
										   </div>
										</div>
									  </div>
									</div>
								
								<a class="collapsed button primary rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_image" aria-expanded="false" aria-controls="add_image">+ Add More Photos</a>
							   </fieldset>
							   
							   
							   <fieldset class="mt30">
									<legend>Videos (You can upload only two Videos)</legend>
									<div class="form-group">
									   <label class="profile-label">Title Of The Video</label>
									   <input type="text" name="video" id="video" value="<?php echo $video=isset($video)?$video:'';?>" class="form-control">
									</div>
									
									
									<div class="form-group">
									   <label class="profile-label">Select Video Pre Image</label>
									   <div class="row">
									      <div class="col-sm-4">
										     <!--<button class="file-upload button info rounded">--><input type="file" name="images3" accept="image/*" id="images3"  class="file-upload button success rounded"> <!--</button>-->
											 <?php if(!empty($id)){ ?>
												<div class="col-sm-6"> 
													<img class="img-list" src="uploads/video_images/<?php echo $courseedit['video_pre1']; ?>" alt="" />
												</div>
											 <? } ?>
										  </div>
										 
									   </div>
									</div>
									
									
									<div class="form-group">
									   <label class="profile-label">Select Video</label>
									   <div class="row">
									      <div class="col-sm-4">
										     <!--<button class="file-upload button info rounded">--><input type="file" name="images5" id="images5"   class="file-upload button success rounded"> <!--</button>-->
										  </div>
										
									   </div>
									</div>
								
									<div id="add_video" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									  <div class="panel-body">
										<div class="form-group">
										   <label class="profile-label">Title Of The Video</label>
										   <input type="text" name="videos" value="<?php echo $videos=isset($videos)?$videos:'';?>" class="form-control">
										</div>
										
										<div class="form-group">
									   <label class="profile-label">Select Video Pre Image</label>
									   <div class="row">
									      <div class="col-sm-4">
										     <!--<button class="file-upload button info rounded">--><input type="file" name="images4" accept="image/*" class="file-upload button success rounded"> <!--</button>-->
											 <?php if(!empty($id)){ ?>
												<div class="col-sm-6">
													<img class="img-list" src="uploads/video_images/<?php echo $courseedit['video_pre2']; ?>" alt="" />
												</div>
											 <? } ?>
										  </div>
										  
									   </div>
									</div>
									
										<div class="form-group">
										   <label class="profile-label">Select Video</label>
										   <div class="row">
											  <div class="col-sm-4">
												 <!--<button class="file-upload button info rounded">--><input type="file" name="images6"  accept="video/*" class="file-upload button success rounded"> <!--</button>-->
											  </div>
											  
										   </div>
										</div>
									  </div>
									</div>
								
								<a class="collapsed button primary rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_video" aria-expanded="false" aria-controls="add_video">+ Add More Videos</a><br><br>
								
								<div class="form-group">
										   <label class="profile-label">Select Document</label>
										   <div class="row">
											  <div class="col-sm-4">
												 <!--<button class="file-upload button info rounded">--><input type="file" name="upfile"   class="file-upload button success rounded"> <!--</button>-->
											  </div>
											  
										   </div>
										</div>
								
							   </fieldset>
							
						   <ul class="list-inline pull-right">
								<li><button type="button" name="button" class="btn btn-default prev-step mt10">Previous</button></li>
								<li><input type="submit" id="step-4" onclick="photostp4();" name="complete" value="Complete" class="button success rounded "></li>
							</ul>
						</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
					</div>
				  </div>
				</div>
			</section><!-- #course-about -->	
		</div><!-- .site-content -->

		
	<script>
	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
	</script>
	<script>
 function coursetype(){
	 
	var course = $("#type").val();
	
	
	$.ajax({
		type: 'post',
		url: 'coursetype.php',
		data: {
		"course":course,
		},
		success:function(data){
			console.log(data);
			$('select#price').html(data);
			$("select#price").trigger("chosen:updated");
			}
		});  
 }
  <?php include "includes/footer.php"; ?> 
 <script type="text/javascript">
	function getSubcategory(val)
	{

		 $.ajax({
	
			url:"subcatajax.php?val="+val,
			success:function(result)
			{
				$('#sub').html(result);
			}
		}); 
	}
</script>
	

