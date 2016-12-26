<?php
require('connect.php');
$HN = $_POST['HN'];

$sql = "DELETE FROM patients_info WHERE HN = '$HN'";
if($conn->query($sql) === TRUE){
	?>
<script type="text/javascript">
	window.alert('Delete success...');
	window.location = "patient_info.php";
</script>
	<?php
}else{
	?>
<script type="text/javascript">
	window.alert('Delete Failed!!!');
	window.location = "patient_info.php";
</script>
	<?php
}
?>