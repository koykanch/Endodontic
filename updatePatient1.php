<?php
require('connect.php');
$HN = $_POST['HN'];
$name = $_POST['patientname'];
$gender = $_POST['gender'];
$birth = $_POST['patientbirth'];
$sub_gender = substr($gender, 0,1);

 $sql = "UPDATE patients_info SET patientName = '$name', gender = '$sub_gender', birthdate = '$birth' WHERE HN = '$HN'";
 if($conn->query($sql) === TRUE){
 	?>
   <script type="text/javascript">
 	window.alert("Update Success...");
 	window.location = "patient_info.php";
 </script>
 	<?php
 }else{
 ?>
   <script type="text/javascript">
 	window.alert("Update Failed!!!!");
 	window.location = "patient_info.php";
 </script>
 	<?php
 }
?>
