<?php
include "includes/header.php";
if(isset($submit)){
	
	$captcha=isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
	if(empty($captcha)){
		echo "<script>location.href='contact.php?captcha_err'</script>";
		header("location:contact.php?captcha_err");
		exit;
	}
	else{
    $secretKey = $captchasecretkey;
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ipaddress);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1){
     echo "<script>location.href='contact.php?captcha_mismatch'</script>";
     header("location:contact.php?captcha_mismatch");
     exit;
    }else{
    $name=$db->escapstr($yname);
	$email=$db->escapstr($email);
	$subj=$db->escapstr($subject);
	$mgs=$db->escapstr($message);
	$date=time();
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$set ="name='$name'";
	$set .=",email='$email'";
	$set .=",subject='$subj'";
	$set .=",message='$mgs'";
	$set .=",crcdt='$date'";
	$set .=",ip_addr='$ip'";
	
	$id=$db->insertid("INSERT INTO contact set $set");
	$_SESSION['verifyid']=$id;
	$sub="Enquiry alert";
	$mgss="Name:&nbsp; $name<br> Email:&nbsp; $email<br>Reason:&nbsp; $subj<br>Message:&nbsp; $mgs<br>";
	$mess=$email_temp->contact($mgss,$siteinfo);
	$com_obj->email("",$siteemail,$sub,$mess);
	$select=isset($send)?$send:'';
	if(!empty($select)){
		$com_obj->email("",$email,$sub,$mess);
	}
	header("location:contact.php?success");
}	}
}

?>
		<div id="content" class="site-content">
		<?php include "includes/findcourse.php";?>
<?php if(isset($success)){
	echo"<script>swal('Great', 'Your enquiry sent successfully', 'success')</script>";
}

if(isset($captcha_err ) || isset( $captcha_mismatch)){
	echo"<script>swal('Failed', 'Captcha Error', 'error')</script>";
}


?>
			<div class="container">
				<div class="row">
					<main id="main" class="site-main col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="contact-form">
									<h3 class="title">Contact Form</h3>
									<p>Send an email. All fields with an * are required.</p>
									<form action="" method="POST" name="newform" onsubmit="return ValidateContact()" />
										<input class="input-text" type="text" name="yname" placeholder="Your Name *" />
										<input class="input-text" name="email" type="email" placeholder="Your Email *" />
										<div class="selectbox" >
											<select name="subject" >
												<?php
													foreach($GT_Contact as $cont) {
													$subject=isset($subject)?$subject:'';
													if($subject==$cont) $st="selected";
													else $st="";
													echo "<option value='$cont' $st>$cont</option>";
										}
										?>
											</select>
										</div>
										<textarea rows="2" cols="50" name="message" placeholder="Your Message *"></textarea>
										<div class="form-group">
										<div class="g-recaptcha" data-sitekey="<?=$captchasitekey;?>">
										</div>
										</div>
										<div class="checkbox">
											<input id="send" type="checkbox" name="send" value="1" />
											<label for="send">Send copy to yourself</label>
										</div>
										<input class="button primary rounded" type="submit" name="submit" value="Send Email" />
									</form>
								</div><!-- .contact-form -->
							</div>

							<div class="col-md-6">
								<div class="contact-info">
									<div id="map"></div>

									<h3 class="title">Contact Infomation</h3>
									<?php
									$contact=$db->singlerec("select * from contactus where id='1'");?>
									<p><?=$contact['address'] ?></p>
									<p>India <?= $contact['india_phn'] ?></p>
									<p>USA  <?= $contact['usa_phn'] ?></p>
									<p>UK  <?= $contact['uk_phn'] ?></p>
									<p>Email: <a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a></p>
								</div><!-- .contact-info -->
							</div>
						</div>						
					</main><!-- .site-main -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-content -->
	<!-- Google Map -->
    <!--<script src="http://maps.googleapis.com/maps/api/js"></script>-->
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBR_em1pVtQ6NcGKPuGyvhW-OlzJo0QDCg"></script>
    <script>
		function initialize() {			
			var customMapType = new google.maps.StyledMapType([
				{
					featureType: "all",
					stylers: [
						{ saturation: -100 }
					]
				},{
					featureType: "road.arterial",
					elementType: "geometry",
					stylers: [
						{ hue: "#005EFF" },
						{ saturation: -100 }
					]
				},{
					featureType: "poi.business",
					elementType: "labels",
					stylers: [
						{ visibility: "off" }
					]
				}
			], {
				name: 'Universum'
			});

			var customMapTypeId = 'custom_style';

			var myLatLng = {lat: 42.376012, lng: -71.115920};

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				scrollwheel: false,
			    navigationControl: false,
			    mapTypeControl: false,
			    scaleControl: false,
				center: myLatLng
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Universum',
				icon: 'images/assets/icons/map-maker.png'

			});

			var contentString = 'Universum';

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});

			map.mapTypes.set(customMapTypeId, customMapType);
			map.setMapTypeId(customMapTypeId);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php include "includes/footer.php"; ?>	
		
<script>
function ValidateContact() {
		
		var a = document.newform.yname.value;
    if (a == "") {
		swal("Oops...","Your name must be filled out","error");
        return false;
    }
		var emailval=document.newform.email.value;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
	if(emailval == "") {
		swal("Oops...","Your email must be filled out","error");
		return false;
	}
		var c = document.newform.message.value;
    if (c == "") {
        swal("Oops...","Your message must be filled out","error");
        return false;
    }
	
}
</script>