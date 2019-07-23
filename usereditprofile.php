<?php
include "includes/header.php";
if(isset($profile)) {
	$firstname=$db->escapstr($fsname);
	$lastname=$db->escapstr($lsname);
	$headline=$db->escapstr($hhead);	
	$genders=$db->escapstr($gender);	
	$bios=$db->escapstr($bio);	
	$websites=$db->escapstr($url);	
	$language=$db->escapstr($language);	
	$mobile=$db->escapstr($number);	
	$countrys=$db->escapstr($country);	
	$states=$db->escapstr($state);
	$citys=$db->escapstr($city);
	$zipcode=$db->escapstr($code);
	$fb=$db->escapstr($fbook);
	$tw=$db->escapstr($twitter);
	$link=$db->escapstr($link);
	$plus=$db->escapstr($gplus);
	$tube=$db->escapstr($ytube);

	$set ="fname='$firstname'";
	$set .=",lname='$lastname'";
	$set .=",headline='$headline'";
	$set .=",gender='$gender'";
	$set .=",bio='$bios'";
	$set .=",website='$websites'";
	$set .=",language='$language'";
	$set .=",mobile='$mobile'";
	$set .=",country='$countrys'";
	$set .=",state='$states'";
	$set .=",city='$citys'";
	$set .=",zip_code='$zipcode'";
	$set .=",fb_url='$fb'";
	$set .=",tw_url='$tw'";
	$set .=",linkedin_url='$link'";
	$set .=",gplus_url='$plus'";
	$set .=",yt_url='$tube'";
	
	
	$sql=$db->insertrec("UPDATE register set $set WHERE id='$user_id'");
	header("location:userprofile.php?update");

}
?>


		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				  <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
				  
				    <div class="col-sm-12 profile-box">
					   <form class="form-horizondal pd25" action="" name="myform" onsubmit="return ValidateEdit()"  method="POST">
					       <fieldset>					   
						   <legend>Basic Details</legend>
						   <div class="row">
						        <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">First Name</label>
									   <input type="text" name="fsname" id="fname" value="<?php echo $userinfo['fname']; ?>" class="form-control">
									</div>
								</div>
								
								<div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Last Name</label>
									   <input type="text" name="lsname" id="lname" value="<?php echo $userinfo['lname']; ?>" class="form-control">
									</div>
								</div>
						   </div>
						   
						   <div class="row">
						      <div class="col-sm-6">
							    <div class="form-group">
								   <label class="profile-label">Headline</label>
								   <input type="text" name="hhead" id="head" value="<?php echo $userinfo['headline']; ?>" class="form-control">
							    </div>
							  </div>
							  
							  <div class="col-sm-6">
							    <div class="form-group">
								   <label class="profile-label">Gender</label>
								   <select class="form-control" name="gender"  value="<?php echo $userinfo['gender']; ?>" >
								      <?php
										foreach($GT_Gender as $genders) {
											if($userinfo['gender']==$genders) $st="selected";
											else $st="";
											echo "<option value='$genders' $st>$genders</option>";
										}
										?>
								   </select>
							    </div>
							  </div>
						   </div>
						   
						   <div class="form-group">
							   <label class="profile-label">Bio</label>
							   <textarea rows="5" name="bio"   class="form-control" id="bioid"> <p>&nbsp;<?php echo $userinfo['bio']; ?></p></textarea>
						   </div>
						   
						   <div class="row">
						        <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Website URL</label>
									   <input type="text" name="url" id="weburl" value="<?php echo $userinfo['website']; ?>"   class="form-control">
									</div>
								</div>
								
								<div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Select Language</label>
									   <select class="form-control" name="language" value="<?php echo $userinfo['language']; ?>" >
										<?php
										foreach($GT_lang as $lang) {
											$language=isset($language)?$language:'';
											if($userinfo['language']==$lang) $st="selected";
											else $st="";
											echo "<option value='$lang' $st>$lang</option>";
										}
										?>
									   </select>
									</div>
								</div>
						   </div>
						   </fieldset>
						   
						   
						   <fieldset class="mt20">
						      <legend>Other Details</legend>
							  <div class="row">
							     <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Mobile Number</label>
									   <input type="text" name="number" id="txtPhoneNo" onkeypress="return isNumber(event)" value="<?php echo $userinfo['mobile']; ?>" class="form-control">
									</div>
								 </div>
								 <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Email Address</label>
									   <input type="text" name="email" value="<?php echo $userinfo['email']; ?>" class="form-control" disabled>
									</div>
								 </div>
							  </div>
							  
							  <div class="row">
							     <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Country</label>
									   <select class="form-control" name="country" Onchange="return get_state(this.value);" id="country" >
									      <?php
											echo $drop->get_dropdown($db,"SELECT country_id,country_name from country where country_status='1' order by country_name asc",$userinfo['country']);
										  ?>
									   </select>
									</div>
								 </div>
								 <div class="col-sm-6">
								    <div class="form-group" id="state1">
									   <label class="profile-label">State</label>
									   <select   class="form-control" name="state" Onchange="return get_city(this.value);" id="state">
									    <?php
										  echo $drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$userinfo[country]' order by state_name asc",$userinfo['state']);
										 ?>
									   </select>
									</div>
								 </div>
							  </div>
							  
							  <div class="row">
							     <div class="col-sm-6">
								    <div class="form-group" id="city1">
									   <label class="profile-label">City</label>
									   <select   class="form-control"  name="city" id="city">
									   <?php
										  echo $drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$userinfo[state]' order by city_name asc",$userinfo['city']);
										 ?>
									  </select>
									</div>
								 </div>
								 <div class="col-sm-6">
								    <div class="form-group">
									   <label class="profile-label">Zipcode</label>
									   <input type="text" name="code" value="<?php echo !empty($userinfo['zip_code'])?$userinfo['zip_code']:''; ?>" class="form-control">
									</div>
								 </div>
							  </div>
							  
							  
						   </fieldset>
						   
						   <fieldset class="mt20">
						      <legend>Social Profiles</legend>
							  
							  <div class="row">
						        <ul class="social-list">
								    <li class="col-sm-12">
									   <div class="col-sm-3">
									      <a href="javascript:;" class="fb btn btn-block">Facebook</a>
									   </div>
									   <div class="col-sm-6">
									       <input type="text" name="fbook" value="<?php echo $userinfo['fb_url']; ?>" class="form-control">
									   </div>
									</li>
									
									<li class="col-sm-12">
									   <div class="col-sm-3">
									      <a href="javascript:;" class="tw btn btn-block">Twitter</a>
									   </div>
									   <div class="col-sm-6">
									       <input type="text" name="twitter" value="<?php echo $userinfo['tw_url']; ?>" class="form-control">
									   </div>
									</li>
									
									<li class="col-sm-12">
									   <div class="col-sm-3">
									      <a href="javascript:;" class="lnk btn btn-block">Linked In</a>
									   </div>
									   <div class="col-sm-6">
									       <input type="text" name="link" value="<?php echo $userinfo['linkedin_url']; ?>" class="form-control">
									   </div>
									</li>
									
									<li class="col-sm-12">
									   <div class="col-sm-3">
									      <a href="javascript:;" class="gp btn btn-block">Google Plus</a>
									   </div>
									   <div class="col-sm-6">
									       <input type="text" name="gplus" value="<?php echo $userinfo['gplus_url']; ?>" class="form-control">
									   </div>
									</li>
									
									<li class="col-sm-12">
									   <div class="col-sm-3">
									      <a href="javascript:;" class="yt btn btn-block">YouTube</a>
									   </div>
									   <div class="col-sm-6">
									       <input type="text" name="ytube" value="<?php echo $userinfo['yt_url']; ?>" class="form-control">
									   </div>
									</li>
								</ul>
						       </div>
						   </fieldset>
					      
						  <div class="form-group text-center mt20">
						      <input type="submit" name="profile"   class="button primary rounded" value="Save Profile">
						  </div>
					   </form>
					</div>
				  </div>
				</div>
			</section><!-- #course-about -->	
		</div><!-- .site-content -->

		
<?php include "includes/footer.php"; ?>
<script>
	function get_state(val){
		//alert(val);
		 $.ajax({
			 url: "state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	//alert(val);
	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
<script> 
function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}

	
	function ValidateEdit() {
		tinyMCE.triggerSave();
		
	var bio = document.getElementById("bioid");	
	
	if(trimfield(bio.value)=='') {
		bio.focus();
        swal("Oops...","Bio must be filled out","error");
		 document.getElementById('bioid').focus();
        return false;
    }

		//fname validation
		var a = document.getElementById("fname");
		if(a.value.length<=0) {
            	 a.focus();
                 swal("Oops...","Firstname must be filled out","error");
        return false; 
        }
	
	//lname validation
		var b = document.getElementById("lname");
    if(b.value.length<=0) {
            	 b.focus();
        swal("Oops...","Lastname must be filled out","error");
        return false;
    }
	var c = document.getElementById("head");
    if(c.value.length<=0) {
            	 c.focus();
            	
        swal("Oops...","Headline must be filled out","error");
        return false;
    }
		
	var phoneNo = document.getElementById('txtPhoneNo');
	 if(phoneNo.value.length<=0) {
            	 phoneNo.focus();
	    /* if (phoneNo.value == "" || phoneNo.value == null) { */
            swal("Oops...","Please enter your Mobile No.","error");
            return false;
        }
        if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
			 phoneNo.focus();
            swal("Oops...","Mobile No. is not valid, Please Enter 10 Digit Mobile No.","error");
            return false;
        }
		
 	var url = document.getElementById('weburl');
		var re=/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/;
		if(url.value !=""){
		  if (!re.test(url.value)) { 
		    url.focus();
			  swal("Oops...","Please enter valid website url","error");
			  return false;
		   }
		}

 
   return true;
}


function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		swal("Oops...","Please enter only Numbers.","error");
		return false;
	}
}
</script>