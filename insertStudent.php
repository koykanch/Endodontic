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
	
 $duplicate = "SELECT * FROM dentalstudent_info WHERE student_code = '$code'";
 $resduplicate = $conn->query($duplicate);
 $objduplicate = mysqli_fetch_array($resduplicate);

 if($objduplicate['student_code'] == "" && $_POST['studentid'] != "" && $_POST['studentname'] != "" && $_POST['studentpassword'] && $_POST['student_begin'] != "" && $_POST['student_end'] != ""){
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
	}
	else if($objduplicate['student_code'] != ""){
		?>
		 <script type="text/javascript">
		 	window.alert('duplicate student code insert failed');
		 	window.location = "Student_info.php";
		 </script>
		 	<?php
	}
	else if($_POST['studentid'] == "" || $_POST['studentname'] == "" || $_POST['studentpassword'] || $_POST['student_begin'] == "" || $_POST['student_end'] == ""){
		?>
		 <script type="text/javascript">
		 	window.alert('Plaese fill in all information');
		 	window.location = "Student_info.php";
		 </script>
		 	<?php
	}
	
 

?>
