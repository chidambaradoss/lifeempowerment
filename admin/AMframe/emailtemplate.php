<?php
@ob_start();
class emailtemplate {
	
	function signup($url,$siteinfo){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
		global $firstname;
		global $email;
				
		$msg = '<div style="background:#f0f0f0;padding:0px;margin:0px;width:100%" bgcolor="#f0f0f0">



<div style="background:#f0f0f0;padding-bottom:2em">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody><tr>
            <td></td>
            <td style="max-width:530px;width:530px" width="530" align="center">
                <table style="max-width:530px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody><tr>
                        <td colspan="3">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody><tr>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#2b2b2b;vertical-align:top">
                                                    <a href="#" style="font-family:Helvetica,Arial,sans-serif;line-height:1.3em;letter-spacing:0.02em;font-weight:300;text-align:center;font-size:16px;color:#2b2b2b" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$sitelogo.'" alt=" '.$sitetitle.' " title=" '.$sitetitle.'" style="padding-left:10px;border:0;font-family:Helvetica,Arial,sans-serif;letter-spacing:0.02em;font-weight:300;font-size:16px;color:#ccc" class="CToWUd"  border="0">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#FEDDD4">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f5f5f5" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="20" align="center">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="70"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:300;text-align:center;font-size:32px;color:#575756;letter-spacing:0.05em;text-align:center">
                                                    <p style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:700;text-align:center;font-size:32px;color:#612d91;letter-spacing:0.05em;text-align:center;text-decoration:none" href="#" target="_blank" data-saferedirecturl="#">Welcome To SmartEdu <br>
													
													</ps></td>
                                                <td width="70"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="40" align="center">
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>

                    <tr bgcolor="#ffffff">
                        <td colspan="3" bgcolor="#ffffff">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody><tr>
                                    <td></td>
                                    <td style="max-width:480px" width="480">
                                        <table style="max-width:480px;background:#ffffff" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:20px;color:#000000" align="left">
												Hello '.$firstname.'
                                                </td>
                                                <td width="30"></td>
                                            </tr>

                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td width="30"></td>
                                                    <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#000000" align="left">
                                                  A verification email was send to your email address.open this email and click the below link to activate your account.
                                                    </td>
                                                    <td width="30"></td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
												<tr>
												   <td colspan="3">
												      <a href=" '.$url.'" style="background-color:#36a6de;border:0;border-radius:4px;color:#fff;display:block;padding:1.3em .5em;margin:5px auto;font-family:Helvetica,Arial,sans-serif;font-weight:400;letter-spacing:0.12em;font-size:13px;line-height:18px;text-align:center;text-decoration:none;width:240px" target="_blank" data-saferedirecturl="#">Activate Email</a>
													</td>
												</tr>
                                                

                                            <tr>
                                                <td colspan="3" height="20"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" height="40"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#EBEBEB" align="center">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#EBEBEB" align="center">
                                <tbody><tr>
                                    <td colspan="11" height="16"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;line-height:1.4;font-weight:300;text-align:center;font-size:10px;color:#999999" align="center">
                                                     Copyright © '.date("Y").' '.$sitetitle.'.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="margin:0 auto" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_tw.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-twitter.png" alt="Twitter" title="Twitter" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_fb.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-fb.png" alt="Facebook" title="Facebook" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_ln.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-linkedin.png" alt="Linkedin" title="LinkedIn" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_gp.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/icon-googleplus.png" alt="Google+" title="Google+" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                              
                                                <td width="8"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="13" height="16"></td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
            <td></td>
        </tr>
    </tbody></table>
</div>

</div>';            

		return $msg;
	}

	function forget($mgs,$siteinfo){
		
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
		global $fname;
		global $email;
				
		$msg = '<div style="background:#f0f0f0;padding:0px;margin:0px;width:100%" bgcolor="#f0f0f0">



<div style="background:#f0f0f0;padding-bottom:2em">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody><tr>
            <td></td>
            <td style="max-width:530px;width:530px" width="530" align="center">
                <table style="max-width:530px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody><tr>
                        <td colspan="3">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody><tr>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#2b2b2b;vertical-align:top">
                                                    <a href="#" style="font-family:Helvetica,Arial,sans-serif;line-height:1.3em;letter-spacing:0.02em;font-weight:300;text-align:center;font-size:16px;color:#2b2b2b" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$sitelogo.'" alt=" '.$sitetitle.' " title=" '.$sitetitle.'" style="padding-left:10px;border:0;font-family:Helvetica,Arial,sans-serif;letter-spacing:0.02em;font-weight:300;font-size:16px;color:#ccc" class="CToWUd"  border="0">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#FEDDD4">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f5f5f5" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="20" align="center">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="70"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:300;text-align:center;font-size:32px;color:#575756;letter-spacing:0.05em;text-align:center">
                                                    <p style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:700;text-align:center;font-size:32px;color:#612d91;letter-spacing:0.05em;text-align:center;text-decoration:none" href="#" target="_blank" data-saferedirecturl="#">Welcome To SmartEdu <br>
													
													</ps></td>
                                                <td width="70"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="40" align="center">
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>

                    <tr bgcolor="#ffffff">
                        <td colspan="3" bgcolor="#ffffff">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody><tr>
                                    <td></td>
                                    <td style="max-width:480px" width="480">
                                        <table style="max-width:480px;background:#ffffff" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:20px;color:#000000" align="left">
												Hello, '.$fname.'
                                                </td>
                                                <td width="30"></td>
                                            </tr>

                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td width="30"></td>
                                                    <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#000000" align="left">This is your newly generated password.Please use this to login your account.<br><br>
                                                   '.$mgs.'
                                                    </td>
                                                    <td width="30"></td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
												
                                            <tr>
                                                <td colspan="3" height="20"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" height="40"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#EBEBEB" align="center">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#EBEBEB" align="center">
                                <tbody><tr>
                                    <td colspan="11" height="16"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;line-height:1.4;font-weight:300;text-align:center;font-size:10px;color:#999999" align="center">
                                                     Copyright © '.date("Y").' '.$sitetitle.'.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="margin:0 auto" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_tw.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-twitter.png" alt="Twitter" title="Twitter" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_fb.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-fb.png" alt="Facebook" title="Facebook" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_ln.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-linkedin.png" alt="Linkedin" title="LinkedIn" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_gp.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/icon-googleplus.png" alt="Google+" title="Google+" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                              
                                                <td width="8"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="13" height="16"></td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
            <td></td>
        </tr>
    </tbody></table>
</div>

</div>';            

		return $msg;
	}

	function contact($mgss,$siteinfo){
		
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
		global $name;
		global $email;
				
		$msg = '<div style="background:#f0f0f0;padding:0px;margin:0px;width:100%" bgcolor="#f0f0f0">



<div style="background:#f0f0f0;padding-bottom:2em">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody><tr>
            <td></td>
            <td style="max-width:530px;width:530px" width="530" align="center">
                <table style="max-width:530px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody><tr>
                        <td colspan="3">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody><tr>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#2b2b2b;vertical-align:top">
                                                    <a href="#" style="font-family:Helvetica,Arial,sans-serif;line-height:1.3em;letter-spacing:0.02em;font-weight:300;text-align:center;font-size:16px;color:#2b2b2b" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$sitelogo.'" alt=" '.$sitetitle.' " title=" '.$sitetitle.'" style="padding-left:10px;border:0;font-family:Helvetica,Arial,sans-serif;letter-spacing:0.02em;font-weight:300;font-size:16px;color:#ccc" class="CToWUd"  border="0">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#FEDDD4">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f5f5f5" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="20" align="center">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="70"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:300;text-align:center;font-size:32px;color:#575756;letter-spacing:0.05em;text-align:center">
                                                    <p style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:700;text-align:center;font-size:32px;color:#612d91;letter-spacing:0.05em;text-align:center;text-decoration:none" href="#" target="_blank" data-saferedirecturl="#">Welcome To SmartEdu <br>
													
													</ps></td>
                                                <td width="70"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="40" align="center">
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>

                    <tr bgcolor="#ffffff">
                        <td colspan="3" bgcolor="#ffffff">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody><tr>
                                    <td></td>
                                    <td style="max-width:480px" width="480">
                                        <table style="max-width:480px;background:#ffffff" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:20px;color:#000000" align="left">
												Enquiry From, '.$name.'
                                                </td>
                                                <td width="30"></td>
                                            </tr>

                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td width="30"></td>
                                                    <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#000000" align="left">
                                                   '.$mgss.'
                                                    </td>
                                                    <td width="30"></td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
												
                                            <tr>
                                                <td colspan="3" height="20"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" height="40"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#EBEBEB" align="center">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#EBEBEB" align="center">
                                <tbody><tr>
                                    <td colspan="11" height="16"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;line-height:1.4;font-weight:300;text-align:center;font-size:10px;color:#999999" align="center">
                                                   Copyright © '.date("Y").' '.$sitetitle.'.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="margin:0 auto" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_tw.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-twitter.png" alt="Twitter" title="Twitter" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_fb.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-fb.png" alt="Facebook" title="Facebook" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_ln.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-linkedin.png" alt="Linkedin" title="LinkedIn" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_gp.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/icon-googleplus.png" alt="Google+" title="Google+" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                              
                                                <td width="8"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="13" height="16"></td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
            <td></td>
        </tr>
    </tbody></table>
</div>

</div>';            

		return $msg;
	}


	function bankdata($mgs,$siteinfo){
		
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
		global $fname;
		global $email;
				
		$msg = '<div style="background:#f0f0f0;padding:0px;margin:0px;width:100%" bgcolor="#f0f0f0">



<div style="background:#f0f0f0;padding-bottom:2em">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody><tr>
            <td></td>
            <td style="max-width:530px;width:530px" width="530" align="center">
                <table style="max-width:530px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody><tr>
                        <td colspan="3">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody><tr>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <table cellspacing="0" cellpadding="0" border="0" align="left">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#2b2b2b;vertical-align:top">
                                                    <a href="#" style="font-family:Helvetica,Arial,sans-serif;line-height:1.3em;letter-spacing:0.02em;font-weight:300;text-align:center;font-size:16px;color:#2b2b2b" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$sitelogo.'" alt=" '.$sitetitle.' " title=" '.$sitetitle.'" style="padding-left:10px;border:0;font-family:Helvetica,Arial,sans-serif;letter-spacing:0.02em;font-weight:300;font-size:16px;color:#ccc" class="CToWUd"  border="0">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#FEDDD4">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f5f5f5" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="20" align="center">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="70"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:300;text-align:center;font-size:32px;color:#575756;letter-spacing:0.05em;text-align:center">
                                                    <p style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.25em;font-weight:700;text-align:center;font-size:32px;color:#612d91;letter-spacing:0.05em;text-align:center;text-decoration:none" href="#" target="_blank" data-saferedirecturl="#">Welcome To SmartEdu <br>
													
													</ps></td>
                                                <td width="70"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="40" align="center">
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>

                    <tr bgcolor="#ffffff">
                        <td colspan="3" bgcolor="#ffffff">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody><tr>
                                    <td></td>
                                    <td style="max-width:480px" width="480">
                                        <table style="max-width:480px;background:#ffffff" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                            <tbody><tr>
                                                <td colspan="3" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:20px;color:#000000" align="left">
												Hello, '.$fname.'
                                                </td>
                                                <td width="30"></td>
                                            </tr>

                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td width="30"></td>
                                                    <td style="font-family:Helvetica,Arial,sans-serif;margin:0;padding:0;line-height:1.5em;letter-spacing:0.05em;font-weight:300;text-align:left;font-size:16px;color:#000000" align="left">
Transfer money to the following account to complete course purchase. Once your payment has been completed, You can view the course videos..<br><br><h2>Bank Details</h2>
                                                   '.$mgs.'
                                                    </td>
                                                    <td width="30"></td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3" height="15"></td>
                                                </tr>
												
                                            <tr>
                                                <td colspan="3" height="20"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" height="40"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" bgcolor="#EBEBEB" align="center">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#EBEBEB" align="center">
                                <tbody><tr>
                                    <td colspan="11" height="16"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td style="font-family:Helvetica,Arial,sans-serif;line-height:1.4;font-weight:300;text-align:center;font-size:10px;color:#999999" align="center">
                                                     Copyright © '.date("Y").' '.$sitetitle.'.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="margin:0 auto" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_tw.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-twitter.png" alt="Twitter" title="Twitter" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_fb.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-fb.png" alt="Facebook" title="Facebook" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_ln.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/social-linkedin.png" alt="Linkedin" title="LinkedIn" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                                <td width="20">
                                                    <a href="'.$_gp.'" style="text-decoration:none;display:block" target="_blank" data-saferedirecturl="#">
                                                        <img src="'.$siteurl.'/images/social/icon-googleplus.png" alt="Google+" title="Google+" style="border:0;margin:0 auto;display:block" class="CToWUd" width="20" height="20">
                                                    </a>
                                                </td>
                                                <td width="8"></td>
                                              
                                                <td width="8"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" height="16"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="13" height="16"></td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
            <td></td>
        </tr>
    </tbody></table>
</div>

</div>';            

		return $msg;
	}
	
}
?>