<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php";
			$GetRec = $db->singlerec("select * from membership where id='$mid'");
			$titname = ucwords($GetRec['name']);
		?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Membership for <?echo $titname;?></h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active">Membership for <?echo $titname;?></li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$Message = isSet($Message) ? $Message : '' ;
$name=isSet($name)?$name:'';
$cost=isSet($cost)?$cost:'';
$no_of_prj=isSet($no_of_prj)?$no_of_prj:'';
$duration=isSet($duration)?$duration:'';

if($submit){
    $crcdt = time();
	$name = strtolower(trim(addslashes($name)));
		$checkStatus = $db->check2column("membership","name",$name,"parent_id",$midval);
		
		if($upd == 2)
			$checkStatus = 0;

		if($checkStatus == 0){
			$set ="name='$name'";
			$set .=",parent_id='$midval'";
			$set .=",cost='$cost'";
			$set .=",no_of_prj='$no_of_prj'";
			$set .=",duration='$duration'";
			if($upd == 1){
				$set .=",active_status='1'";
				$db->insertrec("insert into membership set $set");
				$act="add";
			}
			else if($upd == 2){
				$db->insertrec("update membership set $set where id='$idvalue'");
				$act="upd";
			}
			header("location:submembership.php?act=$act&mid=$midval");
			exit;
		}	
		 else {
			$id = $idvalue;
			$mid = $midval;
			$Message = "<font color='red'>$name Already Exit's</font>";
		}
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from membership where id='$id'");
@extract($GetRecord);
$name = stripslashes($name);
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Membership for <?echo $titname;?></h3>
						</div>
						<form class="form-horizontal" method="post" action="submembershipupd.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="midval" value="<?echo $mid;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Cost <font color="red">*</font></td>
										<td><input type="text" name="cost" id="cost" value="<? echo $cost; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>No of Project <font color="red">*</font></td>
										<td><input type="text" name="no_of_prj" id="no_of_prj" value="<? echo $no_of_prj; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Duration <font color="red">*</font></td>
										<td><input type="text" name="duration" id="duration" value="<? echo $duration; ?>" class="form-control">
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="submembership.php?mid=<?echo $mid;?>">Cancel</a>
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
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>