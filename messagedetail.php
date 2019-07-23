<?php include "includes/header.php";
$mid=base64_decode($mid);
if(empty($user_id) || empty($mid)){
	header("location:index.php");
}
?>
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
										<!-- <li><a href="Compose.php"><i class="fa fa-pencil-square-o pdr5"></i> compose Mail</a></li>-->
										 <li><a href="sentitems.php"><i class="fa fa-envelope-open-o pdr5"></i> Sent Items</a></li>
									  </ul>
								   </div>
								</div>
                                 <div class="row">
                                    <div class="table-responsive courses-table">
										<table class="table">
											<thead>
												<tr>
													<th>Mail ID</th>
													<th>Subject</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
											<?php  $viewmsg=$db->singlerec("SELECT a.*,b.email FROM inbox as a inner join register as b on a.from_id=b.id WHERE to_id='$user_id' AND a.id='$mid'");
											?>
												<?php if($viewmsg['read_status']==0){
												$db->insertrec("UPDATE inbox SET read_status=1 WHERE id='$mid'"); }?>
												<tr>
													<td><?php echo $viewmsg['email'];?></td>
													<td><a href="messagedetail.php"><?php echo $viewmsg['subject']; ?></a></td>
													<td><?php echo date('d M Y',$viewmsg['crcdt']); ?></td>
												</tr>
												<tr>
												    <td colspan="3">
													   <h4>Message</h4><br>
													   <?php echo $viewmsg['message']; ?>
													</td>
												</tr>
											
											</tbody>
										</table>
										<div class="col-sm-12 text-center">
										<?php  $id=base64_encode($viewmsg['from_id']);?>
										    <a href="compose.php?toid=<?php echo $id; ?>" class="button rounded primary">Reply</a>
										</div>
									</div><!-- .courses-table -->
                                 </div><!-- .row -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section> <!-- #course-about -->	
         </div> <!-- .site-content -->
<?php include "includes/footer.php"; ?>	