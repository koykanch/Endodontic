<?php
require('connect.php');
$hn = $_POST['hn'];
$name = $_POST['patientname'];
$gender = $_POST['gender'];
$birth = $_POST['patientbirth'];
$sub_gender = substr($gender, 0,1);

 $duplicate = "SELECT * FROM patients_info WHERE HN = '$hn'";
 $resduplicate = $conn->query($duplicate);
 $objduplicate = mysqli_fetch_array($resduplicate);

 if($objduplicate['HN'] == "" && $_POST['hn'] != "" && $_POST['patientname'] != "" && $_POST['gender'] != "" && $_POST['patientbirth'] != ""){
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
}
else if($objduplicate['HN'] != ""){
	?>
	   <script type="text/javascript">
	 	window.alert("HN duplicate insert Failed");
	 	window.location = "patient_info.php";
	 </script>
	 	<?php
}
else if($_POST['hn'] == "" || $_POST['patientname'] == "" || $_POST['gender'] == "" || $_POST['patientbirth'] == ""){
	?>
	 <script type="text/javascript">
	 	window.alert('Plaese fill in all information');
	 	window.location = "patient_info.php";
	 </script>
	 	<?php
}

 
?>
