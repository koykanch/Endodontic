<?php
require('connect.php');
$dentId = $_POST['dentid'];
$dentname = $_POST['dentname'];
$status = $_POST['dentstatus'];
$password = $_POST['dentpassword'];
$encode = md5($password);
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
?>
