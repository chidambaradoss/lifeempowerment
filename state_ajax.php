<? include "admin/AMframe/config.php";
ob_start(); 
$val=isSet($val) ? $val : '' ;
$DropDownQry = "SELECT state_id,state_name from state where state_country_id='$val' and state_status='1' order by state_name asc";
$state = $drop->get_dropdown($db,$DropDownQry,NULL);
?>
 <label class="profile-label">State</label>
<select class="form-control" name="state" id="state" Onchange="return get_city(this.value);">
<?php echo $state;?>
</select>


