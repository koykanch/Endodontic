<?php
require('connect.php');
$code = $_POST['studentid'];
$name = $_POST['studentname'];
$begin = $_POST['student_begin'];
$end = $_POST['student_end'];
$begin1 = date('Y-m-d',strtotime($begin));
$end1=date('Y-m-d',strtotime($end));

 $sql = "INSERT INTO dentalstudent_info VALUES('$code', '$name', '$begin1', '$end1')";
 if($conn->query($sql) === TRUE){
 	?>
 <script type="text/javascript">
 	window.alert('Insert Success...');
 	window.location = "Student_info.php";
 </script>
 	<?php
 }else{
 	?>
 <script type="text/javascript">
 	window.alert('Insert Failed!!!');
 	window.location = "Student_info.php";
 </script>
 	<?php
}
?>
