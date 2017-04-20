<?php
require('connect.php');
$dentId = $_POST['dentid'];
$dentname = $_POST['dentname'];
$status = $_POST['dentstatus'];
$password = $_POST['dentpassword'];
$encode = md5($password);

 $duplicate = "SELECT * FROM dentist_info WHERE dentId = '$dentId'";
 $resduplicate = $conn->query($duplicate);
 $objduplicate = mysqli_fetch_array($resduplicate);

 if($objduplicate['dentId'] == "" && $_POST['dentid'] != "" && $_POST['dentname'] != "" && $_POST['dentstatus'] != "" && $_POST['dentpassword'] != ""){
 		 $sql = "INSERT INTO dentist_info VALUES('$dentId','$dentname','$status')";
		 $sql1 = "INSERT INTO dental_member VALUES('$dentId','$encode')";
		 if($conn->query($sql) && ($conn->query($sql1)) === TRUE){
		 	?>
		   <script type="text/javascript">
		 	window.alert("Insert Success...");
		 	window.location = "dentist_info.php";
		 </script>
		 	<?php
		 }else{
		 ?>
		   <script type="text/javascript">
		 	window.alert("Insert Failed!!!!");
		 	window.location = "dentist_info.php";
		 </script>
		 	<?php
		 }
 }
 else if($objduplicate['dentId'] != ""){
 	?>
	 <script type="text/javascript">
	 	window.alert('duplicate dent id insert failed');
	 	window.location = "dentist_info.php";
	 </script>
	 	<?php
 }
 else if($_POST['dentid'] == "" || $_POST['dentname'] == "" || $_POST['dentstatus'] == "" || $_POST['dentpassword'] == ""){
 	?>
	 <script type="text/javascript">
	 	window.alert('Plaese fill in all information');
	 	window.location = "dentist_info.php";
	 </script>
	 	<?php
 }
 
?>
