<? include "header.php"; ?>
<!-- datepicker start -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<!--datepicker end-->
	<div class="boxed">
		<!--CONTENT CONTAINER-->
		<!--===================================================-->
		<div id="content-container">
			<!--Page Title-->
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<div class="pageheader">
				<h3><i class="fa fa-home"></i> Dashboard </h3>
				<div class="breadcrumb-wrapper">
					<span class="label">You are here:</span>
					<ol class="breadcrumb">
						<li> <a href="#"> Home </a> </li>
						<li class="active"> Dashboard </li>
					</ol>
				</div>
			</div>
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<!--End page title-->
			<!--Page content-->
			<!--===================================================-->
			<?
			$homesrch=isset($homesrch)?$homesrch:'';
			$shorthome=isset($shorthome)?$shorthome:'';
			$daterange=isset($daterange)?$daterange:'';
			$fltrusr=""; $fltrordr=""; $fltrupd="";
			/* if($homesrch){
				$formdt = substr($daterange,0,10);
				$todt = substr($daterange,-10);
				if($shorthome==1){
					$hmedate=date("Y-m-d");
					$fltrusr .="and crcdt like '%$hmedate%'";
					$fltrordr .="and order_date like '%$hmedate%'";
					$fltrupd .="and upload_date like '%$hmedate%'";
				}
				else if($shorthome==2){
					$hmedate=date('Y-m-d',strtotime("-1 days"));						
					$fltrusr .="and crcdt like '%$hmedate%'";
					$fltrordr .="and order_date like '%$hmedate%'";
					$fltrupd .="and upload_date like '%$hmedate%'";
				}
				else if($shorthome==3){
					$fltrusr .="and crcdt between '$formdt' and '$todt'";
					$fltrordr .="and order_date between '$formdt' and '$todt'";
					$fltrupd .="and upload_date between '$formdt' and '$todt'";
				}
			}
		 	$GetUser = $db->singlerec("select count(*) as tot from register where user_access='0' and active_status='1' $fltrusr");
			$totuser = $GetUser['tot'];
			$GetVendor = $db->singlerec("select count(*) as tots from register where user_access='1' and active_status='1' $fltrusr");
			$totvendor = $GetVendor['tots'];
			$GetSale = $db->singlerec("select sum(price) as tot from orders where price !='' $fltrordr");
			$totsale = $GetSale['tot'];
			$GetProd = $db->singlerec("select count(*) as tot from upload where active_status='1' $fltrupd");
			$totprod = $GetProd['tot'];
			$GetProdPending = $db->singlerec("select count(*) as tot from upload where active_status='0' $fltrupd");
			$pendingprod = $GetProdPending['tot'];
			$GetAdminComm = $db->singlerec("select sum(admin_commission ) as tot from orders where price !='' $fltrordr");
			$admincomm = bcadd(0,$GetAdminComm['tot'],2); */
			?>
		<!--	<div id="page-content">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
						<div class="panel media pad-all" style="background-color: transparent;box-shadow: 0 1px 1px rgba(0, 0, 0, 0);margin-bottom: -10px;">
							<!-- <div class=""><!--media-left-->
								<!--<form action="welcome.php" method="post"> 
									<!--<h4>Filter the results using these options</h4>-->
									
									<!--<div class="row">
									<div class="col-sm-5">
									   <select name="shorthome" onchange="datefilter(this.value);" class="form-control"></select>
									</div>
									<div class="col-sm-5 input-daterange" id="DispTpy" style="display:none;">			  
									  <input type="text" id="daterange" name="daterange" value="" class="form-control">
									</div>
									<div class="col-sm-2">
									   <input type="submit" name="homesrch" class="btn btn-info" value="Filter">
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	-->
			<div id="page-content">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Registered User-->
					
						<div class="panel media pad-all" >
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-success">
								<i class="fa fa-user fa-2x"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><?php echo $com_obj->approved_user(); ?></p>
								<p class="h5 mar-no text-right">Approved User</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--New Order-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
								<i class="fa fa-user fa-2x"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><?php echo $com_obj->pending_user(); ?></p>
								<p class="h5 mar-no text-right">Pending User</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Sales-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-success">
								<i class="fa fa-shopping-cart fa-2x"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><?php echo $com_obj->approved_course(); ?></p>
								<p class="h5 mar-no text-right">Approved courses</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Comments-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
								<i class="fa fa-shopping-cart fa-2x"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><?php echo $com_obj->pending_course(); ?></p>
								<p class="h5 mar-no text-right">Pending courses</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<!--Panel with Header-->
						<!--===================================================-->
						<div class="panel panel-bordered panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordionThree"><b>Recent Approved Courses</b></a> <span class="label label-warning label-circle pull-right" style="margin-top: 12px;"><?php echo $com_obj->approved_course(); ?></span></h4>
							</div>
							
							<div class="panel-body">
								<div class="carousel slide" id="c-slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="item active">
											<table class="table mar-no">
												<?php $recentcrs=$db->get_all("select title,price,crcdt from course where active_status='1' order by id desc limit 5 " );?>
												<tr><th>Name</th><th>Price</th><th>Date</th></tr>
												<?php foreach($recentcrs as $recent){ ?>
												<tr><td><?php echo $recent['title']; ?></td><td><?php echo $DCrncy.$recent['price']; ?></td><td><?php echo date("d M Y", $recent['crcdt']); ?></td></tr>	
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--===================================================-->
						<!--End Panel with Header-->
					</div>
					<div class="col-lg-4">
						<div class="panel panel-bordered panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordionThree"><b>Recent Approved User</b></a> <span class="label label-warning label-circle pull-right" style="margin-top: 12px;"><?php echo $com_obj->Approved_user(); ?></span></h4>
							</div>
							<div class="panel-body">
								<div class="carousel slide" id="c-slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="item active">
											<table class="table mar-no">
												<?php $recentuser=$db->get_all("select fname,lname,login_ip_addr,crcdt from register where active_status='1' order by id desc limit 5 " );?>
												<tr><th>Name</th><th>IpAddress</th><th>Date</th></tr>
												<?php foreach($recentuser as $user){ ?>
												<tr><td><?php echo $user['fname'].' '.$user['lname']; ?></td><td><?php echo $user['login_ip_addr']; ?></td><td><?php echo date("d M Y", $user['crcdt']); ?></td></tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-bordered panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordionThree"><b>Recent User Waiting for Approve</b></a> <span class="label label-success label-circle pull-right" style="margin-top: 12px;"><?php echo $com_obj->pending_user(); ?></span> </h4>
							</div>
							<div class="panel-body">
								<div class="carousel slide" id="c-slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="item active">
											<table class="table mar-no">
												<?php $penduser=$db->get_all("select fname,lname,login_ip_addr,crcdt from register where active_status='0' order by id desc limit 5 " );?>
												<tr><th>Name</th><th>IpAddress</th><th>Date</th></tr>
												<?php foreach($penduser as $pend){ ?>
												<tr><td><?php echo $pend['fname'].' '.$pend['lname']; ?></td><td><?php echo $pend['login_ip_addr']; ?></td><td><?php echo date("d M Y", $pend['crcdt']); ?></td></tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<? //include "newupdate.php"; ?>
			</div>
			<!--===================================================-->
			<!--End page content-->
		</div>
		<!--===================================================-->
		<!--END CONTENT CONTAINER-->
		<? include "leftmenu.php"; ?>
	</div>
	<script type="text/javascript" src="js/datepicker.js"></script>
<? include "footer.php"; ?>