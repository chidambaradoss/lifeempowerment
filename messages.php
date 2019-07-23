<?php include "includes/header.php";
if(empty($user_id)){
	header("location:index.php");
}
?>
         <!-- .site-header -->
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
               <div class="container ">
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
													<th>From</th>
													<th>Subject</th>
													<th>Date</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<form method="POST" action="" name="">
											<?php 
											$getmsg=$db->get_all("SELECT a.*,b.fname,b.lname FROM inbox as a inner join register as b on a.from_id=b.id WHERE to_id='$user_id' AND delstatus_to='0' order by a.id desc");
											foreach($getmsg as $msg){?>
												<tr>
													<td><input type="checkbox"  name="chkbox[]" class="checkthis"  value="<?php echo $msg['id']; ?>"></td>
													<td><?php echo $msg['fname'].' '.$msg['lname']; ?></td>
													<?php if($msg['read_status']!=1){ ?>
														<td><b><a href="messagedetail.php?mid=<?php echo base64_encode($msg['id']); ?>"><?php echo $msg['subject']; ?></a></b></td>
													<?php } else {?> <td><a href="messagedetail.php?mid=<?php echo base64_encode($msg['id']); ?>"><?php echo $msg['subject']; ?></a></td><?php } ?>
													
													<td><?php echo date('d M Y',$msg['crcdt']); ?></td>
													<td><a href="messages.php?did=<?php echo base64_encode($msg['id']);?>" onclick="return confirm('Are  you sure want to delete?');" class="btn btn-danger btn-xs"><span style="color:#fff;" class="fa fa-trash"></span></a></td>

												</tr>
											
											<?php } ?>
											<?php
												if(isset($did)){
														$id=base64_decode($did);
													    $db->insertrec("UPDATE inbox SET delstatus_to='1' where id='$id'");
														header("location:messages.php");
														exit;
												}
											?>
										
											</tbody>
											
										</table>
										
									</div><!-- .courses-table -->
									<?php $ct=count($getmsg);
												if($ct==0){
													echo"<div class='alert alert-warning'> <center>Your Inbox tab is empty!</center></div>";
												}
									?>
									<?php if($ct!=0){ ?><input type="submit" class="btn btn-danger" value="Delete All" name="alldelete" onclick="return confirm('Are you sure want to delete all?');"/> 
									<?php } ?>
									</form>	
									<?php
							          if(isset($alldelete)){
										 $delarray=$chkbox;
							             foreach($delarray as $id){
							               $db->insertrec("UPDATE inbox SET delstatus_to='1' WHERE id='$id'");
										 }
							              header("location:messages.php");
									  }
						            ?> 
                                 </div><!-- .row -->
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
//select multiple checkbox to delete operartion.
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