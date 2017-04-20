<?php
require('connect.php');
$username = $_POST['InputUsername'];
$strPassword = mysqli_real_escape_string($conn,md5($_POST['InputPassword']));

$sql = "SELECT * FROM dental_member WHERE username = '$username' AND password = '$strPassword'";
$result = $conn->query($sql);
$objresult = mysqli_fetch_array($result);
 if($_POST['InputUsername'] == "" && $_POST['InputPassword'] == ""){
 	?>
	 	<script type="text/javascript">
	 		window.alert('Please input username and password');
	 		window.location= "Login.php";
	 	</script>
	 <?php
 }
 else if($_POST['InputUsername'] == "" || $_POST['InputPassword'] == ""){
 	if($_POST['InputUsername'] == ""){
 		?>
	 	<script type="text/javascript">
	 		window.alert('Please input username');
	 		window.location= "Login.php";
	 	</script>
	 <?php
 	}else{
 		?>
	 	<script type="text/javascript">
	 		window.alert('Please input password');
	 		window.location= "Login.php";
	 	</script>
	 <?php
 	}
 }
 else{
 	if($objresult != ""){
	 	session_start();
	 	$_SESSION['username'] = $objresult['username'];
	 	?>
	 	<script type="text/javascript">
	 		window.alert('Login Success...');
	 		window.location= "Endodontic_system.html";
	 	</script>
	 	<?php
	 	date_default_timezone_set("Asia/Bangkok");
		 $time = date('Y-m-d H:i:s');
		 $sql1 = "INSERT INTO dent_login(username,login_time) VALUES('$username','".$time."')";
		 $resultsql1 = $conn->query($sql1);

	 }else{
	 
	 	?>
		<script type="text/javascript">
	 		window.alert('Login Unsuccess...');
	 		window.location= "Login.php";
	 	</script>
	 	<?php
	 }
 }
 
?>
