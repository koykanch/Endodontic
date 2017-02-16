<?php
require('connect.php');
$dentId = $_POST['dentId'];

$sql = "DELETE FROM dentist_info WHERE dentId = '$dentId'";
$sql1 = "DELETE FROM dental_member WHERE username = '$dentId'";
if($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE){
	?>
<script type="text/javascript">
	window.alert('Delete success...');
	window.location = "dentist_info.php";
</script>
	<?php
}else{
	?>
<script type="text/javascript">
	window.alert('Delete Failed!!!');
	window.location = "dentist_info.php";
</script>
	<?php
}
?>
