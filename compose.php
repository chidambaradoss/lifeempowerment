<?php
include "includes/header.php";
$toid=isset($toid)?base64_decode($toid):'';
if(empty($user_id) && empty($toid)){
	header("location:index.php");
}
if(isset($send)){
	$subject=$db->escapstr($sub);
	$message=$db->escapstr($msg);
	$date=time();
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$set="from_id='$user_id'";
	$set .=",to_id='$toid'";
	$set .=",subject='$subject'";
	$set .=",message='$message'";
	$set .=",crcdt='$date'";
	$set .=",ip_addr='$ip'";
	$db->insertrec("INSERT INTO inbox set $set");
	header("location:sentitems.php?sent");
}
$result=$db->singlerec("SELECT fname,lname FROM register WHERE id='$toid'"); 
?>

         <!-- .site-header -->
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
                  <?php include "includes/profileleft.php"; ?>
                  <div class="col-sm-9">
                     <div class="col-sm-12 profile-box"
>                        <div class="col-md-12 row">
                           <div class="panel">
                              <div class="panel-body" style="padding:25px;">
							    <div class="row">
								   <div class="col-sm-8 text-left">
								      <ul class="mail-list1">
									     <li><a href="messages.php"><i class="fa fa-envelope-o pdr5"></i> Inbox</a></li>
										 <li><a href="compose.php"><i class="fa fa-pencil-square-o pdr5"></i> Compose Mail</a></li>
										 <li><a href="sentitems.php"><i class="fa fa-envelope-open-o pdr5"></i> Sent Items</a></li>
									  </ul>
								   </div>
								</div>
							  
                                 <div class="row">
								    <form class="form-horizandal" name="newform" action="" onsubmit="return ValidateCompose()" method="POST">
									    <div class="form-group">
										   <label class="profile-label">To</label>
										   <input class="form-control" name="to" value="<?php echo $result['fname'].' '.$result['lname']; ?>" type="text">
										</div>
										<div class="form-group">
										   <label class="profile-label">Subject</label>
										   <input class="form-control" id="sub" name="sub" type="text">
										</div>
										<div class="form-group">
										   <label class="profile-label">Message</label>
										   <textarea class="form-control tiny" id="message"  name="msg" rows="5" ></textarea>
										</div>
										<div class="form-group">
										   <input type="submit" name="send" class="button rounded success" value="Send Mail">
										</div>
                                    </form>
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
<script> 	
	function ValidateCompose()  
	{ 
	tinyMCE.triggerSave();
	
		var a = document.getElementById("sub");
     if(a.value.length<=0) {
            a.focus();	
        swal("Oops...","Subject field is required!","error" );
        return false;
    }
	
	 var b = document.getElementById("message");
         if(b.value.length<=0) {
			  b.focus();
        swal("Oops...","Message field is required!","error");
        return false;
    }
return true;	
}
</script>
<?php include "includes/footer.php"; ?>