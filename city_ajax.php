<? include "admin/AMframe/config.php";
ob_start(); 
$val=isSet($val) ? $val : '' ;
$DropDownQry = "SELECT city_id,city_name from city where city_state_id='$val' and city_status='1' order by city_name asc";
$city = $drop->get_dropdown($db,$DropDownQry,NULL);
?>
 <label class="profile-label">City</label>
<select class="form-control" name="city" id="city">
<? echo $city;?>
</select>


