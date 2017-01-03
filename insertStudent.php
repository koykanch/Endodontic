<?php
require('connect.php');
$code = $_POST['studentid'];
$name = $_POST['studentname'];
$password = $_POST['studentpassword'];
$begin = $_POST['student_begin'];
$end = $_POST['student_end'];
$begin1 = date('Y-m-d',strtotime($begin));
$end1=date('Y-m-d',strtotime($end));
$encode = md5($password);
 $sql = "INSERT INTO dentalstudent_info VALUES('$code', '$name', '$begin1', '$end1')";
 $sql1 = "INSERT INTO dental_member VALUES('$code','$encode')";

 if($conn->query($sql) && ($conn->query($sql1)) === TRUE){
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
