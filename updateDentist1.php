<?php
require('connect.php');
$dentId = $_POST['id'];
$dentname = $_POST['dentname'];
$status = $_POST['dentstatus'];

if($_POST['dentname'] != "" && $_POST['dentstatus'] != ""){
	$sql = "UPDATE dentist_info SET dent_name = '$dentname', status = '$status' WHERE dentId = '$dentId'";
	 if($conn->query($sql) === TRUE){
	 	?>
	   <script type="text/javascript">
	 	window.alert("Update Success...");
	 	window.location = "dentist_info.php";
	 </script>
	 	<?php
	 }else{
	 ?>
	   <script type="text/javascript">
	 	window.alert("Update Failed!!!!");
	 	window.location = "dentist_info.php";
	 </script>
	 	<?php
	 }
}
else if($_POST['dentname'] == "" || $_POST['dentstatus'] == ""){
	?>
	   <script type="text/javascript">
	 	window.alert("Please fill in all information");
	 	window.location = "dentist_info.php";
	 </script>
	 	<?php
}
 
?>
