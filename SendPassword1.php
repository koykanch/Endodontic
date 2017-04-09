<html>
<head>
<title>Send Password</title>
</head>
<body>
<?php
	require('connect.php');
	$strSQL = "SELECT * FROM dental_member WHERE username = '".trim($_POST['txtUsername'])."'";
	$objQuery = $conn->query($strSQL);
	$objResult = mysqli_fetch_array($objQuery);


	if(!$objResult)
	{
			echo "Not Found Username!";
	}
	else
	{
			echo "Your password send successful.<br>Send to mail : ".$_POST['txtEmail'];		
			$strPassword = mysqli_real_escape_string($conn,md5($objResult['password']));
			$strTo = $_POST['txtEmail'];
			$strSubject = "Your Account information username and password.";
			$strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
			$strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
			$strMessage = "";
			$strMessage .= "Username : ".$objResult["username"]."<br>";
			$strMessage .= "Password : ".$strPassword."<br>";
			$strMessage .= "=================================<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

	}
?>
</body>
</html>