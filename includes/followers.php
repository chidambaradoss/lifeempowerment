
<?php
$followers=$db->get_all("SELECT a.*,b.fname,b.lname,b.img,b.headline,b.id as bid FROM follows as a inner join register as b on a.from_id=b.id  WHERE to_id='$user_id' AND status='1'  group by a.id order by a.id desc");
$follcount=count($followers);
if($follcount==0){
	$foll="</div class='alert alert-warning' style='text-align:center'>No Records Found</div>";
}

 ?>

<div class="modal fade follower-modal" id="followers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $follcount;  ?>  Followers </h4>
      </div>
      <div class="modal-body">
        <div class="row">
		 <?php echo $foll=isset($foll)?$foll:'';?>
		   <ul class="follower-list">
		     <?php
			  $i=0;
              foreach($followers as $fsmsg){
			  $userid=$fsmsg['from_id'];
			  $statusvalue=$db->singlerec("select status from follows where from_id='$user_id' and to_id='$userid'");
			  $stat=$statusvalue['status'];
	          $img=$fsmsg['img'];
	          $fname=$fsmsg['fname'];
	          $lname=$fsmsg['lname'];
	          $head=$fsmsg['headline'];
			  $i = ++$i;
			 ?> 			  
			  <li>
			    <div class="row">
				   <div class="col-sm-3">
				      <img  src="uploads/profile_images/<?php echo $img; ?>" width="50" class="img-responsive img-circle">
				   </div>
				   <div class="col-sm-6">
				      <div class="pd10">
						  <h4><a href="publicprofile.php?pid=<?php $id=base64_encode($userid); echo $id; ?>" target="_blank"><?php echo $fname.''.$lname; ?></a></h4>
						  <p><?php echo $head;?></p>
					   </div>
				   </div>
				   <div class="col-sm-3">
				   <a href="javascript:;" id="<?php echo 'f'.$i; ?>" class="follow-btn"  onclick="return follow('<?php echo $userid ?>','<?php echo 'f'.$i; ?>');"><?php if($stat==1){ ?>UnFollow <?php } else if(empty($stat)){ ?>Follow<?php } ?></a>
				   </div>
				  
				</div>
			  </li>
 <?php $i++; } ?>
		   </ul>
		 
		</div>
      </div>
	 
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

 <?php 


$following=$db->get_all("SELECT a.*,b.fname,b.lname,b.img,b.headline FROM follows as a inner join register as b on a.to_id=b.id   WHERE from_id='$user_id' AND status='1'  group by a.id order by a.id desc");
$folcount=count($following);
if($folcount==0){
  $ffcount="</div class='alert alert-warning' style='text-align:center'>No Records Found</div>";
	
}

?>

<div class="modal fade follower-modal" id="following" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $folcount;?> Following</h4>
      </div>
      <div class="modal-body">
        <div class="row">
		 <?php echo $ffcount=isset($ffcount)?$ffcount:'';?>
		   <ul class="follower-list">
		 <?php   
		         $i=0;
		         foreach($following as $fngmsg){
				 $userid=$fngmsg['to_id'];
			     $statusvalue=$db->singlerec("select status from follows where from_id='$user_id' and to_id='$userid'");
			     $stat=$statusvalue['status'];
	             $img=$fngmsg['img'];
	             $fname=$fngmsg['fname'];
	             $lname=$fngmsg['lname'];
	             $head=$fngmsg['headline']; 
				  $i = ++$i;?>
			  <li>
			  
			    <div class="row">
				   <div class="col-sm-3">
				      <img src="uploads/profile_images/<?php echo $img; ?>" width="50" class="img-responsive img-circle">
				   </div>
				   <div class="col-sm-6">
				      <div class="pd10">
						  <h4><a href="publicprofile.php?pid=<?php $id=base64_encode($userid); echo $id; ?>" target="_blank"><?php echo $fname.''.$lname; ?></a></h4>
						  <p><?php echo $head;?></p>
					   </div>
				   </div>
				   <div class="col-sm-3">
				     <a href="javascript:;" id="<?php echo 'ff'.$i;?>" class="follow-btn" onclick="return fall('<?php echo $userid ?>','<?php echo 'ff'.$i;?>');"><?php if($stat==1){ ?>UnFollow <?php } else if(empty($stat)){ ?>Follow<?php } ?></a>
				   </div>
				  
				</div>
			  </li>
				 <?php } ?>
		   </ul>
		</div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
<script type="text/javascript">
function follow(pid,fal)
 {
	$.ajax({
		url:"followajax.php?pid="+pid,
		success:function(result) 
		{
			$('#'+fal).html(result);
		}
	});
}		
</script>	
<script type="text/javascript">
function fall(pid,fid)
 {
	 //alert(fid);return false;
	$.ajax({
		url:"followajax.php?pid="+pid,
		success:function(result) 
		{
			$('#'+fid).html(result);
		}
	});
}		
</script>	
