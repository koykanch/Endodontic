<?php
require('connect.php');
$username = $_POST['InputUsername'];
$strPassword = mysqli_real_escape_string($conn,md5($_POST['InputPassword']));

$sql = "SELECT * FROM dental_member WHERE username = '$username' and password = '$strPassword'";
$result = $conn->query($sql);
$objresult = mysqli_fetch_array($result);

if($objresult != ""){
	?>
	<script type="text/javascript">
		window.alert('Login Success...');
		window.location= "frame.html";
	</script>
	<?php
}else{
	?>
	<script type="text/javascript">
		window.alert('Login Unsuccess...');
		window.location= "Login.html";
	</script>
	<?php
}
?>
