<?php
require('connect.php');
$student_code = $_POST['stu_code'];

$sql = "DELETE FROM dentalstudent_info WHERE student_code = '$student_code'";
$sql1 = "DELETE FROM dental_member WHERE username = '$student_code'";
if($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE){
	?>
<script type="text/javascript">
	window.alert('Delete success...');
	window.location = "Student_info.php";
</script>
	<?php
}else{
	?>
<script type="text/javascript">
	window.alert('Delete Failed!!!');
	window.location = "Student_info.php";
</script>
	<?php
}
?>
