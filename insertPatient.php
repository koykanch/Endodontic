<?php
require('connect.php');
$hn = $_POST['hn'];
$name = $_POST['patientname'];
$gender = $_POST['gender'];
$birth = $_POST['patientbirth'];
$sub_gender = substr($gender, 0,1);

 $sql = "INSERT INTO patients_info VALUES('$hn','$name','$sub_gender','$birth')";
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
