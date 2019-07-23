<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> User </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">User </li>
                            </ol>
                        </div>
                    </div>
<?
$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$crcdt = isSet($crcdt) ? $usecrcdtrcre : '' ;
 
$GetRecordView = $db->singlerec("select * from register where id='$id'");
@extract($GetRecordView);

?>
                   <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>View User Details</h3><a href="register.php"  class="btn btn-success">Back</a></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table height="300">
                                    <thead>
                                        <tr>
										<td>Name</td><td style="width:50px;">:</td><td><? echo $name;?></td>
										</tr>
										<tr>
										<td>Password</td><td style="width:50px;">:</td><td><? echo $decript_password;?></td>
										</tr>
										<tr>
										<td>Email Id</td><td style="width:50px;">:</td><td><? echo $email; ?></td>
										</tr>
										<tr>
										<td>Mobile No</td><td style="width:50px;">:</td><td><? echo $mobile; ?></td>
										</tr>
										<tr>
										<td>Image</td><td style="width:50px;">:</td><td><img src="../uploads/profile_img/<? echo $img;?>" width="50" height="50"></td>
										</tr>
									</thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
			<? include "leftmenu.php"; ?>	
            </div>
<?

include "footer.php";
?>