<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<head>
	<title>Image Processing</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dentistry Information Systems</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:700,300,400">        
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/elegant-font/code/style.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/icon.png">

    <style type="text/css">
    	.menucenter{
                display: block;
                padding: .4em 3em .4em .4em;                
                margin: 10em 0;
                background:#E3F2FD;
            }
    </style>
</head>
<body>

        <!-- Loader -->
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>
		
		<!-- Top menu -->
		<nav class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="Home.html"></a> <!-- import pic from style.css file -->
				</div>
			
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="scroll-link" href="#top-content">Top</a></li>
                        <li><a class="scroll-link" href="#manage">Manage</a></li>
                        <li><a href="Login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
		</nav>
		
		<div class="manage-container section-container">
            <div class="container">
             <div class="menucenter">
				<form name="import" method="post" enctype="multipart/form-data">
					<table>
					<tr height="80">
						<td>Select File</td>
						<td colspan="2"><input type="file" name="f1"></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit1" value="UPLOAD" disabled></td>
						<!-- <td><input type="submit" name="submit2" value="display"></td> -->
						<td><input type="submit" name="submit3" value="PROCESS"></td>
						<td><input type="reset" name="clare" value="RESET"></td>
					</tr>
					</table>
				</form>
			 </div>
			</div>
		</div>

 <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

<?php

	require('connect.php');
	if(isset($_POST['submit1']))
	{
		error_reporting(0);
		//print_r($_FILES['f1']);
		$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
		//$source_file = $_FILES['f1']['tmp_name'];

		if($image == ""){
			?>	
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>

			<?php
		}else{
			
			$sql = "INSERT INTO image(imageName) VALUES('$encoded_image')";
		     $res = $conn->query($sql);

		     if($res){
				echo "Success...";
			}else
			{	
				echo "Unsuccess!!!!";
			}
		}
		     
	}

	if(isset($_POST['submit2']))
	{
		
		$sql1 = "SELECT * FROM image ";
		$run = $conn->query($sql1);
		echo "<table border='2'>";
		echo "<tr>";
		
		if ($run) {

		    while ($row = mysqli_fetch_array($run)) {
		    	echo "<td>";
		    	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imageName']).'" />';
		    	echo "<br>";
		    	?><a href="delete.php?id=<?php echo $row['imageID']; ?>">Delete</a> <?php
		     	echo "</td>";
		    }
		    echo "</tr>";
		}
			
	}

	if(isset($_POST['submit3'])){
		require('class.php');
		$image = $_FILES['f1']['name'];
		$check = new Check;

		$check->CheckNone($image,$conn);
			$cnone0 = $_SESSION['count0'];
			// echo "Number of black color (0) = ".$cnone0."<br>";

			 $avgnone = $_SESSION['avg'];
			 echo "average percent of white color = ".$avgnone."<br>";
			 echo "<br><br><br><br>";

		$check->CheckPulmonary($image,$conn);
			$cpul0 = $_SESSION['count0'];
			$avgpul = $_SESSION['avg'];
		//	echo "Number of black color (0) = ".$cpul0."<br>";
			echo "average percent of white color = ".$avgpul."<br>";
			echo "<br><br><br><br>";
	}
?>


</body>    
</html>