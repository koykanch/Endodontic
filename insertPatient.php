<?php
require('connect.php');
$name = $_POST['patientname'];
$gender = $_POST['gender'];
$birth = $_POST['patientbirth'];
$sub_gender = substr($gender, 0,1);

 $sql = "INSERT INTO patients_info (patientName, gender, birthdate) VALUES('$name','$sub_gender','$birth')";
 if($conn->query($sql) === TRUE){
 	?>
   <script type="text/javascript">
 	window.alert("Insert Success...");
 	window.location = "patient_info.php";
 </script>
 	<?php
 }else{
 ?>
   <script type="text/javascript">
 	window.alert("Insert Failed!!!!");
 	window.location = "patient_info.php";
 </script>
 	<?php
 }
?>
