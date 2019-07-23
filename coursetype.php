<?php 
include ('admin/AMframe/config.php');
ob_start();
$course=isset($course) ? $course : '' ;
echo $course;exit;

if(isset($course)){
		$exe="select id,coach_name from coach where active_status='1' and FIND_IN_SET('$schoolid',school_id) and FIND_IN_SET('$course',team) order by coach_name asc ";
		$coach =$drop->get_dropdown($db,$exe,$course);
		echo $coach;
}
?>
	
	