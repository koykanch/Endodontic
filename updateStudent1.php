<?php
require('connect.php');
$code = $_POST['stu_code'];
$name = $_POST['studentname'];
$begin = $_POST['student_begin'];
$end = $_POST['student_end'];
$begin1 = date('Y-m-d',strtotime($begin));
$end1=date('Y-m-d',strtotime($end));

 $sql = "UPDATE dentalstudent_info SET student_name = '$name', student_timebegin = '$begin1', student_timeend = '$end1' WHERE student_code = '$code'";
 if($conn->query($sql) === TRUE){
 	?>
 <script type="text/javascript">
 	window.alert('Update Success...');
 	window.location = "Student_info.php";
 </script>
 	<?php
 }else{
 	?>
 <script type="text/javascript">
 	window.alert('Update Failed!!!');
 	window.location = "Student_info.php";
 </script>
 	<?php
}
?>
