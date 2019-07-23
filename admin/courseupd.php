<?php
include "header.php"; 
$upd=isset($upd)?$upd:'';
$id=isset($id)?$id:'';
$act=isset($act)?$act:'';
$page=isset($page)?$page:'';
$Message=isset($Message)?$Message:'';

$title=isset($title)?$title:'';
$description=isset($description)?$description:'';
$cat=isset($cat)?$cat:'';
$subcat=isset($subcat)?$subcat:'';
$type=isset($type)?$type:'';
$title=isset($title)?$title:'';

$about=isset($about)?$about:'';
$brief_description=isset($brief_description)?$brief_description:'';
$requirement=isset($requirement)?$requirement:'';
$duration=isset($duration)?$duration:'';
$price=isset($price)?$price:'';


$faq_ques1=isset($faq_ques1)?$faq_ques1:'';
$faq_ans1=isset($faq_ans1)?$faq_ans1:'';
$faq_ques2=isset($faq_ques2)?$faq_ques2:'';
$faq_ans2=isset($faq_ans2)?$faq_ans2:'';

$img_title1=isset($img_title1)?$img_title1:'';
$img1=isset($img1)?$img1:'';
$img_title2=isset($img_title2)?$img_title2:'';
$img2=isset($img2)?$img2:'';

$video_title1=isset($video_title1)?$video_title1:'';
$video_pre1=isset($video_pre1)?$video_pre1:'';
$video1=isset($video1)?$video1:'';
$video_title2=isset($video_title2)?$video_title2:'';
$video_pre2=isset($video_pre2)?$video_pre2:'';
$video2=isset($video2)?$video2:'';
$file_pdf=isset($file_pdf)?$file_pdf:'';

if(isset($_REQUEST['title'])){
	$crcdt=time();
	$title=$db->escapstr($title);
	$description=$db->escapstr($description);
	$cat=$db->escapstr($cat);
	$subcat=$db->escapstr($subcat);
	$type=$db->escapstr($type);
	$level=$db->escapstr($level);

	$about=$db->escapstr($about);
	$brief_description=$db->escapstr($brief_description);
	$requirement=$db->escapstr($requirement);
	$duration=$db->escapstr($duration);
	$price=$db->escapstr($price);
	$tag=$db->escapstr(implode(",",$tag));
	
	$faq_ques1=$db->escapstr($faq_ques1);
	$faq_ans1=$db->escapstr($faq_ans1);
	$faq_ques2=$db->escapstr($faq_ques2);
	$faq_ans2=$db->escapstr($faq_ans2);
	
	$img_title1=$db->escapstr($img_title1);
	$img1=$db->escapstr($img1);
	$img_title2=$db->escapstr($img_title2);
	$img2=$db->escapstr($img2);
	
	$video_title1=$db->escapstr($video_title1);
	$video_pre1=$db->escapstr($video_pre1);
	$video1=$db->escapstr($video1);
	$video_title2=$db->escapstr($video_title2);
	$video_pre2=$db->escapstr($video_pre2);
	$video2=$db->escapstr($video2);
	
	
	$checkStatus = $db->check1column("course","title",$title);
	if($upd == 2)
		$checkStatus = 0;
		
	if($checkStatus == 0){
		$set = "title='$title'";
		$set .= ",description='$description'";
		$set .= ",cat='$cat'";
		$set .= ",subcat='$subcat'";
		$set .= ",type='$type'";
		$set .= ",level='$level'";
		
		$set .= ",about='$about'";
		$set .= ",brief_description='$brief_description'";
		$set .= ",requirement='$requirement'";
		$set .= ",duration='$duration'";
		$set .= ",price='$price'";
		$set .= ",tag='$tag'";

		$set .= ",faq_ques1='$faq_ques1'";
		$set .= ",faq_ans1='$faq_ans1'";
		$set .= ",faq_ques2='$faq_ques2'";
		$set .= ",faq_ans2='$faq_ans2'";
		
		$set .= ",img_title1='$img_title1'";
		$set .= ",img_title2='$img_title2'";
		$set .= ",video_title1='$video_title1'";
		$set .= ",video_title2='$video_title2'";
		
		
		//file upload
		
		$img1=isset($_FILES['img1']['tmp_name'])?$_FILES['img1']['tmp_name']:''; 
		//print_r($_FILES['img1']);exit;
		$img2=isset($_FILES['img2']['tmp_name'])?$_FILES['img2']['tmp_name']:'';
		$video_pre1=isset($_FILES['video_pre1']['tmp_name'])?$_FILES['video_pre1']['tmp_name']:'';
		$video1=isset($_FILES['video1']['tmp_name'])?$_FILES['video1']['tmp_name']:'';
		$video_pre2=isset($_FILES['video_pre2']['tmp_name'])?$_FILES['video_pre2']['tmp_name']:'';
		$video2=isset($_FILES['video2']['tmp_name'])?$_FILES['video2']['tmp_name']:''; 
		
		$upfile=isset($_FILES['upfile']['tmp_name'])?$_FILES['upfile']['tmp_name']:''; 
		//echo $img1.$img2.$video_pre1.$video1.$video_pre2.$video2; exit;
		

		$imgerr='';
		if($img1!=''){
			$uniqname1=uniqid();
			$upload1=$com_obj->upload_image("img1",$uniqname1,600,600,"../uploads/course_images/","new");
			if($upload1){
				$img1=$com_obj->img_Name;
				$set .=",img1='$img1'";
				}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		
		if($img2!=''){
			$uniqname2=uniqid();
			$upload2=$com_obj->upload_image("img2",$uniqname2,600,600,"../uploads/course_images/","new");
			if($upload2){
				$img2=$com_obj->img_Name;
				$set .=",img2='$img2'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		if($video_pre1!=''){
			$uniqname3=uniqid();
			$upload3=$com_obj->upload_image("video_pre1",$uniqname3,600,600,"../uploads/video_images/","new");
			if($upload3){
				$video_pre1=$com_obj->img_Name;
				$set .=",video_pre1='$video_pre1'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		if($video1!=''){
			$uniqname4=uniqid();
			$upload4=$com_obj->upload_video("video1",$uniqname4,"../uploads/course_video/","new");
			if($upload4){
				$video1=$com_obj->img_Name;
				$set .=",video1='$video1'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		if($video_pre2!=''){
			$uniqname5=uniqid();
			$upload5=$com_obj->upload_image("video_pre2",$uniqname5,600,600,"../uploads/video_images/","new");
			if($upload5){
				$video_pre2=$com_obj->img_Name;
				$set .=",video_pre2='$video_pre2'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		if($video2!=''){
			$uniqname6=uniqid();
			$upload6=$com_obj->upload_video("video2",$uniqname6,"../uploads/course_video/","new");
			if($upload6){
				$video2=$com_obj->img_Name;
				$set .=",video2='$video2'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
		
		if($upfile!=''){
			$uniqname7=uniqid();
			$upload7=$com_obj->upload_files("upfile",$uniqname7,"../uploads/document/","new");
			if($upload7){
				$file=$com_obj->img_Name;
				$set .=",file_pdf='$file'";
			}
			else{
				$imgerr.="$com_obj->img_Err <br>";
			}
		}
							
		if($imgerr=='') {
			if($upd==1) {
				$set .= ",crcdt='$crcdt'";    
				$set .= ",active_status='1'";
				$db->insertrec("insert into course set $set");
				$act = "add";
			}
			else if($upd==2) {
				$set .= ",chngdt = '$crcdt'";    
				$db->insertrec("update course set $set where id='$id'");
				$act = "upd";
			}
			echo "<script>window.location='course.php?page=$pg&act=$act'</script>";
			header("location:course.php?page=$pg&act=$act");
			exit;
		}
		else {
			$error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$imgerr</div>";
			
		}
	}	
	else {
		$Message="<font color='#000'>$title Already Exist</font>";
	}
}

if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from course where id='$id'");
@extract($GetRecord);
?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce.js" ></script>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>Course </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Course </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		 <div id="page-content">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $TextChange; ?> Course </h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- START Form Wizard -->
                                        <form class="form-horizontal form-bordered" action="" method="post" enctype="multipart/form-data" id="wizard-validate">
                                            <!-- Wizard Container 1 -->
                                            <div class="wizard-title"> Course </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-sign-in"></i>Course Details
                                                        </h5>
                                                        <p class="text-muted"> Enter Your Course Details </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Title : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="title" type="text" placeholder="Enter class title" value="<?php echo $title; ?>" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Description : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="description" type="text" placeholder="Enter class description" value="<?php echo $description; ?>" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Category : </label>
                                                    <div class="col-sm-6">
													<select name="cat" id="category" class="form-control" onchange="getSubcategory(this.value)" data-parsley-group="order" data-parsley-required >
														
														<?php echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0'",$cat);
														?>
														</select>
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Sub category : </label>
                                                    <div class="col-sm-6">
														<select name="subcat" id="subcategory" class="form-control" data-parsley-group="order" data-parsley-required >
														<option value="">---select---</option>
														<?php echo $drop->get_dropdown($db,"select id,category_name from category",$subcat);
														?>
														</select>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Type : </label>
                                                    <div class="col-sm-6">
                                                      <select name="type" class="form-control" data-parsley-group="order" data-parsley-required >
													  <option value="">---select---</option>
													  <?php
													 					
													  foreach($GT_types as $key => $types){ 
													  $type=isset($type) ? $type : '';													
													  if($type==$key)
														  $st="selected";
														  else $st="";
														  echo "<option value='$key' $st>$types</option>";
														  }
														  ?>
														 </select>
													</div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Level : </label>
                                                    <div class="col-sm-6">
														<select name="level" class="form-control" data-parsley-group="order" data-parsley-required >
														<option value="">---select---</option>
														<?php
														foreach($GT_level as $key => $levels){
														$level=isset($level) ? $level : '';
														if($level==$key) $st="selected";
														else $st="";
														echo "<option value='$key' $st>$levels</option>";
														}
														?>
														</select>
                                                    </div>
                                                </div>
											</div>
											
                                            <!--/ Wizard Container 1 -->
                                            <!-- Wizard Container 2 -->
                                            <div class="wizard-title"> Describe </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-user"></i> Describe
                                                        </h5>
                                                        <p class="text-muted"> Describe about your course </p>
                                                    </div>
                                                </div>
												
												
													<div class="form-group">
                                                    <label class="col-sm-2 control-label"> About The Course : </label>
                                                    <div class="col-sm-6">
                                                        <textarea rows="5" class="form-control" name="about" type="text" data-parsley-group="information" data-parsley-required ><?php echo $about;?></textarea>
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Description : </label>
                                                    <div class="col-sm-6">
                                                        <textarea rows="5" class="form-control" name="brief_description" type="text" data-parsley-group="information" data-parsley-required><?php echo $brief_description;?></textarea>
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Requirements : </label>
                                                    <div class="col-sm-6">
                                                        <textarea rows="5" class="form-control" name="requirement" type="text" data-parsley-group="information" data-parsley-required><?php echo $requirement;?></textarea>
                                                    </div>
                                                </div>																												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Duration : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="duration" type="text" value="<?php echo $duration; ?>" data-parsley-group="information" data-parsley-required/>
                                                    </div>
                                                </div>
										<div class="form-group">
										   <label class="col-sm-2 control-label">Tag</label>
										
										   <div class="col-sm-6">
										   <input type="text" name="tag[]" id="tag"  value="<?php 
										   $courseedit = $db->singlerec("select * from course where id='$id'");	
										   $tag=explode("','",$courseedit['tag']);	
										   //if ($id==0) {
										   	//$tag="";
										   	//	echo $tag;
										   	//}
										   	//else{	
										   foreach ($tag as $key => $tags) {
										   	echo $tags=isset($tags)?$tags:'';
										   }
										//}
										  ?>">
										</div>
										</div>
													<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Class Price : </label>

                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="price" type="text" value="<?php echo $price; ?>" data-parsley-group="information" data-parsley-required/>
                                                    </div>
                                                </div>	

                                            </div><div class="col-sm-6">
									
									</div>
                                            <!--/ Wizard Container 2 -->
											
                                            <!-- Wizard Container 3 -->
                                            <div class="wizard-title"> FAQ </div>
											<div class="wizard-container">
										   <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Question : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="faq_ques1" type="text" value="<?php echo $faq_ques1; ?>" data-parsley-group="payment" data-parsley-required />
                                                    </div>
                                                </div>	
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Answer : </label>
                                                    <div class="col-sm-6">
                                                        <textarea rows="5" class="form-control" name="faq_ans1" type="text" data-parsley-group="payment" data-parsley-required><?php echo $faq_ans1;?></textarea>
                                                    </div>
                                                </div>
												
												<div id="add_faq" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												 <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Question : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="faq_ques2" type="text" value="<?php echo $faq_ques2; ?>"/>
                                                    </div>
                                                </div>	
												     
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Answer : </label>
                                                    <div class="col-sm-6">
                                                        <textarea rows="5" class="form-control" name="faq_ans2" type="text"><?php echo $faq_ans2;?></textarea>
                                                    </div>
                                                </div>
												</div>
												<a class="collapsed button success rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_faq" aria-expanded="false" aria-controls="add_faq">+ Add More FAQ's</a>
																								
                                            </div>
											
											
                                            <!--/ Wizard Container 4 -->
                                            <!-- Wizard Container 5 -->
                                            <div class="wizard-title"> Course Image </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Course Image
                                                        </h5>
                                                        <p class="text-muted"> Add photos of your course </p>
														<?php
														{
															echo $error=isset($error) ? $error : '';
														}
														?>
														
														  <fieldset>
															<legend>Photos</legend>
															<div class="panel-body">
															<div class="form-group">
															   <label class="profile-label">Title Of The Picture</label>
															   <input type="text" name="img_title1" value="<?php echo $img_title1;?>" class="form-control" data-parsley-group="experience" data-parsley-required>
															</div>
															
													
																	
															<div class="form-group">
															<label class="col-sm-2 control-label"> Upload Picture  </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="img1" <?php if($upd==1){?>data-parsley-group="experience" data-parsley-required <?php } ?>>
																</div>
																
																<div class="col-sm-5">
																<?php 
																if($upd != 1)
																{
																	if($img1!=''){
																	?>
																<span> <img src="<?php echo "../uploads/course_images/".$img1;?>" style="height:103px;width:103px;" > </span>
																<?php
																}}
																?>
																</div>
															</div>
														</div>
								
														<div id="add_image" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
														
														  <div class="panel-body">
															<div class="form-group">
															   <label class="profile-label">Title Of The Picture</label>
															   <input type="text" name="img_title2" value="<?php echo $img_title2;?>" class="form-control" >
															</div>
																																	
															<div class="form-group">
															<label class="col-sm-2 control-label"> Upload Picture 1: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="img2" >
																</div>
																
																<div class="col-sm-5">
																<?php 
																if($upd != 1)
																{
																	if($img2!=''){
																	?>
																<span> <img src="<?php echo "../uploads/course_images/".$img2;?>" style="height:103px;width:103px;" > </span>
																<?php
																}}
																?>
																</div>
															</div>
														</div>
										
													  </div>
													</div>
								
														<a class="collapsed button success rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_image" aria-expanded="false" aria-controls="add_image">+ Add More Photos</a>
													   </fieldset>
													   
													   <fieldset class="mt30">
															<legend>Videos</legend>
															<div class="form-group">
															   <label class="profile-label">Title Of The Video</label>
															   <input type="text" name="video_title1" value="<?php echo $video_title1;?>" class="form-control" data-parsley-group="experience" data-parsley-required>
															</div>
															
															<div class="form-group">
															<label class="col-sm-2 control-label"> select pre Image: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="video_pre1" <?php if($upd==1){?>data-parsley-group="experience" data-parsley-required <?php } ?>>
																</div>
																
																<div class="col-sm-5">
																<?php 
																if($upd != 1)
																{
																	if($video_pre1!=''){
																	?>
																	<span> <img src="<?php echo "../uploads/video_images/".$video_pre1;?>" style="height:103px;width:103px;" > </span>
																<?php
																}}
																?>
																</div>
															</div>
														</div>
															
															
															<div class="form-group">
															<label class="col-sm-2 control-label"> Upload Video: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="video1" <?php if($upd==1){ ?>data-parsley-group="experience" data-parsley-required <? } ?> >
																</div>
																
																
															</div>
														</div>
									
														<div id="add_video" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
														  <div class="panel-body">
															<div class="form-group">
															   <label class="profile-label">Title Of The Video</label>
															   <input type="text" name="video_title2" value="<?php echo $video_title2;?>" class="form-control" >
															</div>
															
															<div class="form-group">
															<label class="col-sm-2 control-label"> Select Pre Image2: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="video_pre2">
																</div>
																
																<div class="col-sm-5">
																<?php 
																if($upd != 1)
																{
																	if($video_pre2!=''){
																	?>
																<span> <img src="<?php echo "../uploads/video_images/".$video_pre2;?>" style="height:103px;width:103px;" > </span>
																<?php
																}}
																?>
																</div>
															</div>
														</div>
															
									
														<div class="form-group">
															<label class="col-sm-2 control-label"> Upload Video 2: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="video2">
																</div>
																
															
															</div>
														</div>
													</div>
													</div>
								
													<a class="collapsed button success rounded" role="button" data-toggle="collapse" data-parent="#accordion" href="#add_video" aria-expanded="false" aria-controls="add_video">+ Add More Videos</a><br><br>
													
													<div class="form-group">
															<label class="col-sm-2 control-label"> Select Document: </label>
															<div class="col-sm-6">
																<div class="col-sm-7">
																   <input class="new-file-upload" type="file"  name="upfile">
																</div>
																
															
															</div>
														</div>
													
													
												   </fieldset>
						   											
														
																											
														
                                                    </div>
                                                </div>
											</div>
                                            <!-- Wizard Container 5 -->
                                        </form>
                                        <!--/ END Form Wizard -->
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    
		<!--===================================================-->
		<!--End page content-->
	</div>
	
	<script type="text/javascript">
	function getSubcategory(val)
	{

		 $.ajax({
	
			url:"subcatajax.php?val="+val,
			success:function(result)
			{
				$('#subcategory').html(result);
			}
		}); 
	}
	</script>
	
	<style>
	.new-file-upload{    background: #449d44;
    color: #FFF;
    padding: 10px;}
	.file-upload {
	position: relative;
	overflow: hidden;
	margin: 10px; }

	.file-upload input.file-input {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0); }
	</style>
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>

<script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
		<!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/jasmine.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
		<script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->	