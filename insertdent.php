<?php
require('connect.php');
$dentId = $_POST['dentid'];
$dentname = $_POST['dentname'];
$status = $_POST['dentstatus'];
$sub_status = substr($status, 0,1);

 $sql = "INSERT INTO dentist_info VALUES('$dentId','$dentname',b'$sub_status')";
 if($conn->query($sql) === TRUE){
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
