<?php include "admin/AMframe/config.php";
$course_id=isset($course_id) ? $course_id : '';
echo $db->insertrec("delete from cart where course_id='$course_id'");
?>