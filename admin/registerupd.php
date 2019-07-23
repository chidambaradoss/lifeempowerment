<? include "header.php"; 
error_reporting(1);
$fname = isset($fname)?$fname:'';
$lname = isset($lname)?$lname:'';
$email = isset($email)?$email:'';
$mobile = isset($mobile)?$mobile:'';
$language= isset($language)?$language:'';
$headline = isset($headline)?$headline:'';
$bio= isset($bio)?$bio:'';
$address1 = isset($address1)?$address1:'';
$address2 = isset($address2)?$address2:'';
$country = isset($country)?$country:'';
$state = isset($state)?$state:'';
$city = isset($city)?$city:'';
$zip_code = isset($zip_code)?$zip_code:'';
$website = isset($website)?$website:'';
$gender  = isset($gender) ? $gender : '' ;
$fb_url  = isset($fb_url) ? $fb_url: '' ;
$tw_url  = isset($tw_url) ? $tw_url: '' ;
$linkedin_url = isset($linkedin_url) ? $linkedin_url: '' ;
$gplus_url = isset($gplus_url) ? $gplus_url: '' ;
$yt_url  = isset($ytube) ? $yt_url: '' ;


if($act ==  "del" && $nimg != "") {
    $RemoveImage = "../uploads/profile_img/300x300/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update register set img='noimage.png' where id='$id'");
    header("Location:registerupd.php?upd=2&msg=nimgscs&id=$id");
	echo "<script>location.href='registerupd.php?upd=2&msg=nimgscs&id=$id'</script>";
    exit;
}

if(isset($_submit)){
	$crcdt=time();
    $firstname = $db->escapstr($fname);
	$lastname = $db->escapstr($lname);
    $email = $db->escapstr($email);
    $mobile = $db->escapstr($mobile);
	$language = $db->escapstr($language);
	$headline = $db->escapstr($headline);
	$bio = $db->escapstr($bio);

    $country = $db->escapstr($country);
    $state = $db->escapstr($state);
	$city = $db->escapstr($city);
    $zip_code = $db->escapstr($zip_code);
	$website = $db->escapstr($website);
	$gender = $db->escapstr($gender);
	$fburl = $db->escapstr($fburl);
	$twitter = $db->escapstr($twitter);
	$linkedin = $db->escapstr($linkedin);
	$gplus= $db->escapstr($gplus);
	$ytube = $db->escapstr($ytube);
   	$password_length = strlen($pass);
	$pass = $db->escapstr($pass);
	$epass = md5($pass);	
	$ip=$_SERVER['REMOTE_ADDR'];
	//echo "select count(email )as  total from register where email='$email'"; 
	
	

	$set  = "fname = '$firstname'";
	$set  .= ",lname = '$lastname'";
	$set  .= ",email = '$email'";
	$set  .= ",mobile = '$mobile'";
	$set  .= ",language = '$language'";
	$set  .= ",headline = '$headline'";
	$set  .= ",bio = '$bio'";
	$set  .= ",country = '$country'";
	$set  .= ",state = '$state'";
	$set  .= ",city = '$city'";		
	$set  .= ",zip_code = '$zip_code'";	
	$set  .= ",website = '$website'";	
	$set  .= ",gender = '$gender'";	
	$set  .= ",fb_url = '$fburl'";
	$set  .= ",tw_url = '$twitter'";
	$set  .= ",linkedin_url = '$linkedin'";
	$set  .= ",gplus_url = '$gplus'";
	$set  .= ",yt_url = '$ytube'";
					
	if(!empty($pass)){
		$set  .= ",password = '$epass'";
	}
	if($upd == 1){
		$set  .= ",crcdt = '$crcdt'";    
		$set  .= ",active_status = '1'";
		$set  .= ",login_ip_addr = '$ip'";
		$checkmail=$db->singlerec("select count(email) as  total from register where email='$email'");
		$countemail=$checkmail['total']; 
		if ($countemail==0) {
		$idvalue = $db->insertid("insert into register set $set");
		$act = "add"; 
		
		}
		else{
		
			$act = "mailerror"; 
	
	}
	}
	else if($upd == 2){
		$set  .= ",chngdt = '$crcdt'";    
		$db->insertrec("update register set $set where id='$idvalue'");
		$act = "upd";
	}		
	echo "<script>window.location='register.php'</script>"; 
	header("location:register.php?act=$act");
}

$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);



if($upd==2){
	$TextChange = "Edit";
	$imghid = "";
	if($psw == 1){$passshow = "<b><font color='green'>Your password is : $decript_password</font></b>";}
	else{$passshow = "<span><a href='registerupd.php?upd=$upd&id=$id&page=$page&psw=1'>Get Password</a></span>";}
}
else{
	$TextChange = "Create";
	$imghid = "style='display:none;'";
	$passshow = "";
}

if($act == "ps")
	$Message = "<b><font color='red'>Atleast 4 minimum character need!!!...</font></b>";
else if($act == "img")
	$Message = "<b><font color='red'>Please Upload in this type of Image png & jpg & jpeg & gif</font></b>" ;
else if($act == "exceed")
	$Message="<b><font color='red'>You sponsor has reached the referral limit!</font></b>";
else if($act == "invalid")
	$Message="<b><font color='red'>Invalid Sponsor ID!</font></b>";
else if($act == "pmch")
	$Message="<b><font color='red'>Password do not matches!</font></b>";
else if($act == "tpmch")
	$Message="<b><font color='red'>Transaction password do not matches!</font></b>";
else if($act == "mailerror")
	$Message="<b><font color='red'>Email is already Existing !</font></b>";
?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>User </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> User </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> User <?echo $Message;?></h3>
						</div>
						<form class="form-horizontal" name="myForm" method="post" action="" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">
								<table style="padding:25px;">
									
									<tr>
										<td>Firstname</td>
										<td><input type="text" name="fname" class="form-control" value="<?= $fname; ?>"required>
										</td>
									</tr>
									<tr>
										<td>Lastname</td>
										<td><input type="text" name="lname" class="form-control" value="<?= $lname; ?>"required>
										</td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="text" name="pass" class="form-control" value="" placeholder="*****">
										</td>
									</tr>
									<tr>
										<td>Email Address</td>
										<td><input type="email" name="email" class="form-control" id="emailaddress" onblur="return validation();" value="<? echo $email; ?>" required <?php if($upd==2) { echo "readonly"; } ?>>
										<?php if($upd==1){ ?><div id="mailerr"></div><?php } ?>
										</td>
									</tr>
									<tr>
										<td>Mobile Number</td>
										<td><input type="number" name="mobile" class="form-control" value="<?=$mobile; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Select Language</td>
										<td><select class="form-control" name="language" value="<?=$language; ?>" >
										<?php
										foreach($GT_lang as $lang) {
											//$language=isset($language)?$language:'';
											if($language==$lang) $st="selected";
											else $st="";
											echo "<option value='$lang' $st>$lang</option>";
										}
										?>
									   </select>
									   </td>
									</tr>
									<tr>
										<td>Headline</td>
										<td><input type="text" name="headline" class="form-control" value="<?=$headline; ?>" required>
										</td>
									</tr>
									<tr>
										<td>Bio</td>
										<td><input type="text" name="bio" class="form-control" value="<?=$bio; ?>" >
										</td>
									</tr>
									
									
								
									<tr>
										<td>Country</td>
										<td>
											<select class="form-control" name="country" onchange="return setSate(this.value);" id="country" >
											   <?=$countries = $drop->get_dropdown($db,"select country_id,country_name from country where country_status!='0'",$country); ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>State</td>
										<td>
											<select class="form-control" name="state" id="state" onchange="return setCity(this.value);">
												<?=$drop->get_dropdown($db,"select state_id,state_name from state where state_status!='0'",$state);?>
											</select>
										</td>
									</tr>
									<tr>
										<td>City</td>
										<td>
											<select class="form-control" name="city" id="city">
											  <?php if(!empty($state)){
												echo $drop->get_dropdown($db,"select city_id,city_name from city where city_status!='0' AND city_state_id='".$state."'",$city);
											  }?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Zip Code</td>
										<td><input type="text" name="zip_code" class="form-control" value="<? echo $zip_code; ?>" >
										</td>
									</tr>
									
									<tr>
										<td>Website url</td>
										<td><input type="text" name="website" class="form-control" value="<? echo $website; ?>" >
										</td>
									</tr>
									
									
									<tr>
									<td>Gender</td>
									<td><select class="form-control" name="gender"  value="<?php echo $gender; ?>"  >
								      <?php
										foreach($GT_Gender as $genders) {
											if($gender==$genders) $st="selected";
											else $st="";
											echo "<option value='$genders' $st>$genders</option>";
										}
										?>
								    </select>
								    </td>
									</tr>
									
									<tr>
										<td>Facebook</td>
									   <td>
									   <input type="text" name="fbook" value="<?php echo $fb_url; ?>" class="form-control">
										</td>
									</tr>
									
									<tr>
										<td>Twitter
										</td>
									   <td>
									   <input type="text" name="twitter" value="<?php echo $tw_url; ?>" class="form-control">
										</td>
									</tr>
									
									<tr>
										<td>LinkedIn</td>
									   <td>
									   <input type="text" name="linkedin" value="<?php echo $linkedin_url; ?>" class="form-control">
										</td>
									</tr>
									
									<tr>
										<td>Google plus</td>
									   <td>
									   <input type="text" name="gplus" value="<?php echo $gplus_url; ?>" class="form-control">
										</td>
									</tr>
									
									<tr>
										<td>You Tube</td>
									   <td>
									   <input type="text" name="ytube" value="<?php echo $yt_url; ?>" class="form-control">
										</td>
									</tr>
								
									
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="_submit" value="Save"></div>
								<a class="btn btn-info" href="register.php">Cancel</a>
							</div>
						</form>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
				</div>
			  </div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
	</div>
	
	<script>
		function setSate(id){
	      $.ajax({url: "state_ajax.php?country_id="+id, success: function(result){
          $("#state").html(result);
         }});
 		}
		function setCity(id){
			 $.ajax({url: "city_ajax.php?state_id="+id, success: function(result){
        $("#city").html(result);
    }});
		}
	</script>
	
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>
<script>   
function  validation(){
	var email = $("#emailaddress").val();
	
	$.ajax({
		type: 'post',
		url: 'getmail.php',
		dataType: 'json',
		data: {
		"email":email,
		},
		success:function(data){
			if(data['status']=='succ'){
				$("#valemail").prop("disabled", false);
				$("#mailerr").html("<span style='color:#006633;'>Valid Email !!!</span>")
				}
				else if(data['status']=='fail'){
				$("#valemail").prop("disabled", true);
				$("#mailerr").html("<span style='color:#FF0000;'>Email Address Already exists !!!</span>")
				}
				else if(data['status']=='fails'){
				$("#valemail").prop("disabled", true);
				$("#mailerr").html("<span style='color:#FF0000;'>Invalid Email Address ,Please Enter valid Email !!!</span>")
				}
			}
		});
	 }
</script> 