<?php
require('connect.php');
session_start();
 $username = $_SESSION['username'];
 date_default_timezone_set("Asia/Bangkok");
  $time = date('Y-m-d H:i:s');
  $timenull = NULL;
   $sql1 = "UPDATE dent_login SET logout_time = '".$time."' WHERE username = '$username' AND logout_time IS NULL";
   $resultsql1 = $conn->query($sql1);

    if($resultsql1 === TRUE){
     unset($_SESSION['username']); 
     unset($_SESSION['password']);
     session_destroy();
   	?>
	  <script type="text/javascript">
   		window.alert('Logout Success');
   		window.location= "Login.php";
   	</script>
   	<?php
   }else{
     echo 'Error description: '.mysqli_error($conn);
    ?>
    // <script type="text/javascript">
    //    window.alert('Logout Unsuccess');
    //    window.location= "frame.html";
    //  </script>
   <?php
    }
?>
