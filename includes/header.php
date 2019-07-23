<?php 
include "admin/AMframe/config.php";
$user_id=isset($_SESSION['userid'])?$_SESSION['userid']:'';

if(!empty($user_id)){
	$userinfo=$db->singlerec("SELECT * FROM register WHERE id='$user_id'");
}

if($cms_on != $cms_approve){echo "<script>location.href='$cms_approve';</script>";}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>On-line Course Home</title>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script type="text/javascript" src="js/tinymce.js" ></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">

	tinyMCE.init({
		// General options

		mode : "textareas",

		theme : "simple",

		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options

		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",

		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,",


		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		theme_advanced_resizing : false,



		// Example content CSS (should be your site CSS)

		content_css : "css/content.css",



		// Drop lists for link/image/media/template dialogs

		template_external_list_url : "lists/template_list.js",

		external_link_list_url : "lists/link_list.js",

		external_image_list_url : "lists/image_list.js",

		media_external_list_url : "lists/media_list.js",



		// Replace values for the template plugin

		template_replace_values : {

			username : "Some User",

			staffid : "991234"

		}

		});

</script>-->
	
    <link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="shortcut icon" type="image/png" href="images/assets/favicon.png" />
	<script src="js/sweetalert.min.js"></script><!--js alert-->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script><!--jquery-->

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/ie9/html5shiv.min.js"></script>
      <script src="js/ie9/respond.min.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script> 	
	function ValidateSignup()  
	{ 
		//fname validation fn field is required
		var a = document.sform.fname.value;
    if (a == "") {
        swal("Oops...","Firstname must be filled out","error" );
        return false;
    }
	//lname validation
		var b = document.sform.lname.value;
    if (b == "") {
        swal("Oops...","Lastname must be filled out","error");
        return false;
    }
	//email validation
		var emailval=document.sform.email.value;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
	if(emailval == "") {
		swal("Oops...","Please enter your email address","error");
		return false;
	}
		
	if(!emailval.match(mailformat))  {  
		
		swal("Oops...","You have entered an invalid email address!","error");  
		document.sform.email.focus();  
		return false;  
	}  
			//password validation
		var c = document.sform.pwd.value;
	if (c == "") {
		swal("Oops...","Password must be filled out","error");
		return false;
	}
		var e = document.sform.cpwd.value;
	if (e == "") {
		swal("Oops...","Confirm password must be filled out","error");
		return false;
	}
	
	if ($('input:checkbox[name="user"]:checked').length === 0){
		swal ("Oops...","Please select your  Agree to our Terms of Use and Privacy Policy","error");
		return false;
	}	
}
</script>	
<script>
function ValidateSignin()  {
	//email validation
		var val=document.lgform.email.value;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(val == "") {
		swal("Oops...","Please enter your email address","error");
		return false;
	}
		
	if(!val.match(mailformat)){  
		
		swal("Oops...","You have entered an invalid email address!","error");  
		document.lgform.email.focus();  
		return false;  
	} 
//password validation
		var f = document.lgform.pwd.value;
		if (f == "") {
			swal("Oops...","Password must be filled out","error");
			return false;
	}
}
</script>	
</head>
<?php include "includes/followers.php"; ?>
<?php include "register.php"; ?>
<?php include "login.php"; ?>
<body class="<?php if($livepage=="courselist.php") echo "left-sidebar"; else if($livepage=="index.php") echo "home6 header6"; else echo "single-course";?>">
<!-- 	<div id="pageloader">
		<div class="pageloader">
			<div class="textedit">
				<span class="site-name"><img src="images/assets/logo.png"></span>
			</div>	
		</div>.pageloader
	</div><!-- #pageloader -->
<!-- Modal -->
<div class="login-model modal fade" id="sign-in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="row">
		<div class="login-form">
        <!-- Nav tabs -->


		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div style="padding-right:25px;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="padding-top:15px;">&times;</span></button>
			</div>
			<div role="tabpanel" class="tab-pane active" id="login1">
			  <div class="row">
			    <div class="col-sm-4 hidden-xs paddr0">
					<div class="bgimg" style="    min-height: 405px;">
					  <div class="bgcontent" style="padding:50px 0;">
					     <div class="details-text">
							<h2>Welcome Back to Smart Edu</h2>
							<div class="header-separator"></div>
							<h4>Sign in to continue to your account.</h4>
							<p class="panel-tos"></p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-sm-8 col-xs-12 padd" id='myModel'>
			    <form class="lgform-1" action="index.php" name="lgform" onsubmit="return ValidateSignin()" method="POST">
					<?php if(isset($registered)){
							echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
							echo"<div class='alert alert-success'> Registered successfully,Please activate Your account through your email</div>";
						}
						if(isset($activated)){
							echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
						}
						if(isset($deleted)){
							echo '<script>$(window).load(function(){$("#sign-in").modal("show"); });</script>';
							echo"<div class='alert alert-success'>Your account deleted successfully</div>";
						}
						echo $row=isset($row)?$row:''; 
						echo $delete=isset($delete)?$delete:'';
					?>
				   <!--<div class="form-group">
				      <a href="#" class="btn btn-block fb-btn">Sign In With Facebook</a>
				   </div>-->
				   <div class="form-group">
				      <p>Sign In</p>
				   </div>
				   <div class="form-separator">
					 <p class="hidden">or</p>
				   </div>
				   <div class="form-group">
					 <input type="email" name="email" class="form-control" placeholder="Email">
					</div>
					
					<div class="form-group">
					 <input type="password" name="pwd" class="form-control" placeholder="Password">
					</div>
					
					
					<div class="form-group">
					   <a class="forgot-pass" href="#" data-toggle="modal" data-target="#forget-password" class="close" data-dismiss="modal" aria-label="Close">Forgot password?</a>
					</div>
					
					<div class="form-group">
				      <input class="btn btn-block sign-btn" type="submit" name="login" value="signin">
				   </div>
				   
				  <!-- <div class="form-group">
					   <input type="checkbox"> &nbsp;Keep me signed in until I sign out
					</div>-->
					
					<div class="form-group text-center">
					  <p>Not a member? <a class="forgot-pass" href="#" data-toggle="modal" data-target="#sign-up" class="close" data-dismiss="modal" aria-label="Close">Sign up</a></p>
					</div>

				</form>
				</div>
			  </div>
			</div>
		  </div>

		</div>
	   </div>
      </div>
    </div>
  </div>
</div>

<div class="login-model modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="row">
		<div class="login-form">
        <!-- Nav tabs -->
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div style="padding-right:25px;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="padding-top:15px;">&times;</span></button>
			</div>
			<div role="tabpanel" class="tab-pane active" id="signup2">
			 <div class="row">
			 <div class="col-sm-4 hidden-xs paddr0">
					<div class="bgimg" style="min-height: 480px;">
					  <div class="bgcontent" style="padding:50px 0;">
					     <div class="details-text">
							<h2>Join Smart Edu for Free</h2>
							<div class="header-separator"></div>
							<h4>Access thousands of online classes in design, business, and more!</h4>
							<p class="panel-tos"></p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-sm-8 col-xs-12 padd">
				<form class="lgform-1" method="post" name="sform" onsubmit="return ValidateSignup()" action="index.php">
						<?php echo $text=isset($text)?$text:''; ?>
					   <!--<div class="form-group">
						  <a href="" class="btn btn-block fb-btn">Sign Up With Facebook</a>
					   </div>
					   <div class="form-separator">
						 <p>or</p>
					   </div>-->
						<div class="form-group">
						  <p>Sign Up</p>
						</div>
						<div class="form-separator">
						 <p class="hidden">or</p>
						</div>
					   
					   <div class="form-group">
					     <div class="row">
						    <div class="col-sm-6">
							   <input type="text" name="fname" class="form-control" placeholder="First Name">
							</div>
							<div class="col-sm-6">
							   <input type="text" name="lname" class="form-control" placeholder="Last Name">
							</div>
						 </div>						 
						</div>
					   
					   <div class="form-group">
						 <input type="email"  name="email" class="form-control" placeholder="Email">
						</div>
						
						<div class="form-group">
						 <input type="password" name="pwd" class="form-control" placeholder="Password">
						</div>
						
						<div class="form-group">
						 <input type="password" name="cpwd" class="form-control" placeholder="Confirm Password">
						</div>
						
						<div class="form-group">
						   <input type="checkbox" name="user"> &nbsp;Agree to our <span><a href="terms.php" target="_blank" > Terms of Use</a><span> and <span><a href="privacy-policy.php" target="_blank"> Privacy Policy</a></span>.
						</div>
						
						<div class="form-group">
						  <input type="submit" class="btn btn-block sign-btn" name="register" value="signup">
					   </div>
						
						<div class="form-group text-center">
						  <p>Already a member? <a class="forgot-pass" href="#" data-toggle="modal" data-target="#sign-in" class="close" data-dismiss="modal" aria-label="Close">Login.</a></p>
						</div>
						
				</form>
					</div>
				</div>
			</div>
		  </div>

		</div>
	   </div>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->

<div class="login-model modal fade" id="forget-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="row">
		<div class="login-form">
        <!-- Nav tabs -->
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div style="padding-right:25px;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="padding-top:15px;">&times;</span></button>
			</div>
			
			<div role="tabpanel" class="tab-pane active" id="forgt-pass3">
			  <div class="row">
			  <div class="col-sm-4 hidden-xs paddr0">
					<div class="bgimg">
					  <div class="bgcontent" style="padding:50px 0;">
					     <div class="details-text">
							<h2>Join Smart Edu for Free</h2>
							<div class="header-separator"></div>
							<h4>Access thousands of online classes in design, business, and more!</h4>
							<p class="panel-tos"></p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-sm-8 col-xs-12 padd">
				<form class="lgform-1" method="post" action="index.php">
						<?php echo $show=isset($show)?$show:'';
						?>
					   <div class="form-group">
						 <p>We'll send password reset instructions to the email address associated with your account.</p>
						</div>
						
						<div class="form-group">
						 <input type="email" name="email" class="form-control" placeholder="Email">
						</div>

						<div class="form-group">
						  <button type="submit" name="getpass" value="get password" class="btn btn-block sign-btn">Get Password</button>
					   </div>
						
						<div class="form-group text-center">
						  <p>You have password? <a href="#" class="forgot-pass" data-toggle="modal" data-target="#sign-in" class="close" data-dismiss="modal" aria-label="Close">Login.</a></p>
						</div>
					</form>
					</div>
				</div>
			</div>
		  </div>

		</div>
	   </div>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->	
	
	
	

	<div id="wrapper">
		<header id="header" class="site-header">
		<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-8">
							<nav class="top-nav">
								<style type="text/css">
																		
									.header_flag_img {
										width: 24px;
									    margin-right: 5px;
									}
								</style>
																
								<ul>
									<?php
								$contact=$db->singlerec("select * from contactus where id='1'");?>

									<li><img class="header_flag_img" src="http://www.4visioncapital.com/site_assets/wp-content/uploads/2019/06/flag_us.png"><?= $contact['usa_phn'] ?></li>
									<li><img class="header_flag_img" src="http://www.4visioncapital.com/site_assets/wp-content/uploads/2019/06/flag_ng.png"><?= $contact['india_phn'] ?></li>
									<li><img class="header_flag_img" src="http://www.4visioncapital.com/site_assets/wp-content/uploads/2019/06/flag_gh.png"><?= $contact['uk_phn'] ?></li>
									<li><a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a></li>
									
								</ul>
							</nav>
						</div>
						
						<div class="col-md-4 col-sm-4 col-xs-4 cart-menu">
						    
								<a style="float: right;margin-top: 3px;margin-bottom: 3px;" <?php if(isset($_SESSION['userid'])) echo  'href="cart.php"'; else echo 'href="#" onclick="show()"';?> ><i class="fa fa-opencart"></i> View Cart </a>

						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .top-header -->
			<div class="mid-header">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-sm-8 col-xs-9">
							<div class="site-brand">
								<a class="logo" href="http://www.4visioncapital.com/">
									<img src="admin/uploads/general_setting/<?php echo $sitelogo; ?>" alt="<?php echo $sitetitle; ?>"/>
								</a>
							</div>
						</div>

						<div class="col-md-10 col-sm-4 col-xs-3">
							<nav class="main-menu">
								<span class="mobile-btn"><i class="fa fa-bars"></i></span>
								<ul>
<!--   -->
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home"><a href="http://www.4visioncapital.com/index">Home</a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-920 "><a href="http://www.4visioncapital.com/about_us">ABOUT US</a></li>
                                                                            
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://shop.4visioncapital.com">Shop</a></li>
                                                                            <li class="<?php if($livepage=='index.php'){echo ' current-menu-item';}?> menu-item menu-item-type-post_type menu-item-object-page"><a href="http://www.4visioncapital.com/life_empowerment">Life Empowerment</a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="index.php">Vision Capital Lab</a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://www.4visioncapital.com/events">Events</a></li>
                                                                            
<!-- -->
								
									
									<li <?php if($livepage=="courselist.php"){
										echo "class='current-menu-item'";}?>><a href="courselist.php">Courses</a>
									
										<div class="sub-menu mega-menu">
										<?php
										$cat=$db->get_all("select * from category where parent_id='0' AND active_status='1'");
										for($i=0; $i<=3; $i++) {
										?>
										<div class="row">
												<div class="col-md-3">
													<h3><?php echo $cat[$i]['category_name']; ?></h3>
													<ul>
														<?php
														$catid=$cat[$i]['id']; 
														$sub_cat=$db->get_all("select * from category where parent_id=$catid AND active_status='1'");
														foreach($sub_cat as $subc){
														?>
														<li><a href="courselist.php?subcatid=<?php echo $subc['id']; ?>" ><?php echo $subc['category_name']; ?></a></li>
														<?php } ?>
													</ul>
												</div>
										<?php } ?>
										</div>
										</div>
									</li>
									<?php
										if(!empty($user_id)){
											echo '<li><a href="#">Hi, '.$userinfo['fname'].'</a>
										<ul class="sub-menu"  style="width: inherit; min-width: 180px;">
											<li><a href="userprofile.php">View Profile</a></li>
											<li><a href="cart.php">View Cart</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
										</li>';
										}
										else{
											echo'<li><a href="#" data-toggle="modal" data-target="#sign-in">Sign In</a></li>
											<li><a href="#" data-toggle="modal" data-target="#sign-up">Sign Up</a></li>';
										}
									?>
								</ul>
							</nav>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .mid-header -->
		</header><!-- .site-header -->
