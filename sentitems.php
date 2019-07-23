<?php
include "includes/header.php";?>
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
			   <?php if(isset($sent)){
							echo"<div class='alert alert-success'> Your message has been sent</div>";
						}
			    ?>
                  <?php include "includes/profileleft.php"; ?>
                  <div class="col-sm-9">
                     <div class="col-sm-12 profile-box">
                        <div class="col-md-12 row">
                           <div class="panel">
                              <div class="panel-body" style="padding:25px;">
							    <div class="row">
								   <div class="col-sm-8 text-left">
								      <ul class="mail-list1">
									     <li><a href="messages.php"><i class="fa fa-envelope-o pdr5"></i> Inbox</a></li>
										<!--<li><a href="compose.php"><i class="fa fa-pencil-square-o pdr5"></i> Compose Mail</a></li>-->
										 <li><a href="sentitems.php"><i class="fa fa-envelope-open-o pdr5"></i> Sent Items</a></li>
									  </ul>
								   </div>
								</div>
							  
                                 <div class="row">
								    
                                    <div class="table-responsive courses-table">
										<table class="table">
											<thead>
												<tr>
													<th>&nbsp; <input type="checkbox" id="select_all"></th>
													<th>To</th>
													<th>Subject</th>
													<th>Date</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<form method="POST" action="" name="">
												<?php $sentmsg=$db->get_all("SELECT a.*,b.fname,b.lname FROM inbox as a inner join register as b on a.to_id=b.id  WHERE from_id='$user_id' AND delstatus_from=0 order by a.id desc");
												
												foreach($sentmsg as $sent){?>
												<tr>
													<td><input type="checkbox"  name="chkbox[]" class="checkthis"  value="<?php echo $sent['id'] ?>"></td>
													<td><?php echo $sent['fname'].' '.$sent['lname']; ?></td>
													<?php $id=base64_encode($sent['id']); ?>
													<td><a href="messagedetail.php?mid=<?php echo $id ?>"></a><?php echo $sent['subject']; ?></td>
													<td><?php echo date('d M Y',$sent['crcdt']); ?></td>
													<td><a href="sentitems.php?did=<?php echo base64_encode($sent['id']);?>" onclick="return confirm('Are  you sure want to delete?');" class="btn btn-danger btn-xs"><span style="color:#fff;" class="fa fa-trash"></span></a></td>
													
													
												</tr>
													
												<?php } ?>
												<?php
												if(isset($did)){
														$id=base64_decode($did);
														$query=$db->insertrec("UPDATE inbox SET delstatus_from='1' where id='$id'");
														header("location:sentitems.php");
														exit;
												}
											?>
												
											</tbody>
										
										</table>
									</div><!-- .courses-table -->
									<?php $ct=count($sentmsg);
												if($ct==0){
													echo"<div class='alert alert-warning'> <center>Your Sent Items tab is empty!</center></div>"; 
												}	?>
									<?php if($ct!=0){ ?><input type="submit" class="btn btn-danger" value="Delete All" name="alldelete" onclick="return confirm('Are you sure want to delete all?');"/> 
									<?php } ?>
									</form>			
									<?php
							          if(isset($alldelete)){
										 $delarray=$chkbox;
							             foreach($delarray as $id){
							               $db->insertrec("UPDATE inbox SET delstatus_from='1' WHERE id='$id'");
										 }
							               header("location:sentitems.php");
									  }
						            ?> 
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
	$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkthis').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkthis').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkthis').on('click',function(){
        if($('.checkthis:checked').length == $('.checkthis').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
  <?php include "includes/footer.php"; ?>