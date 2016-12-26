<?php
require('connect.php');
$dentId = $_POST['dentId'];

$sql = "DELETE FROM dentist_info WHERE dentId = '$dentId'";
if($conn->query($sql) === TRUE){
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
