<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<head>
	<title>import picture</title>
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

        .menu-body{
                display: block;
                padding: .4em 3em .4em .4em;                
                margin: 10em 0;
                background:#E3F2FD;
            }

        /* Modal Body */
		.modal-body {
			padding: 2px 16px;
			text-align: left;
		}

		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		    text-align: left;
		}

		/* Modal Content */
		.modal-content {
		    position: relative;
		    background-color: #fefefe;
		    margin: 15% auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 90%;
		    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		    -webkit-animation-name: animatetop;
		    -webkit-animation-duration: 0.4s;
		    animation-name: animatetop;
		    animation-duration: 0.4s;
		    text-align: left;
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
		    from {top: -300px; opacity: 0} 
		    to {top: 0; opacity: 1}
		}

		@keyframes animatetop {
		    from {top: -300px; opacity: 0}
		    to {top: 0; opacity: 1}
		}

		/* The Close Button */
		.close {
		    color: #aaa;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: black;
		    text-decoration: none;
		    cursor: pointer;
		}

		input[type="text"], 
        textarea, 
        textarea.form-control {
            margin: 0;
            /*padding: 1px 80px;*/
            vertical-align: middle;
            background: none;
            border: 1px solid #0277BD;
            font-family: 'Open Sans', sans-serif;
            font-size: 22px;
            font-weight: 100;
            color: #000000;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        input[type="text"]:focus, 
        textarea:focus, 
        textarea.form-control:focus {
            outline: 0;
            border: 1px solid #43A047;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
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
					<table border="1">
					<tr><h3>Import Picture</h3></tr>
					<tr height="80">
						<td>Select File</td>
						<td colspan="2"><input type="file" name="f1"></td>
					</tr>
					<tr align="center">
						<td><input type="submit" name="submit1"  value="UPLOAD" disabled></td>
						<!-- <td><input type="submit" name="submit2" value="display"></td> -->
						<td><input type="submit" name="submit3" value="PROCESS"></td>
						<td><input type="reset" name="clare" value="RESET"></td>
					</tr>
					</table>
				</form>
			 </div>
			</div>
		</div>

		<div class="block-3-container section-container what-we-do-container">
	        <div class="container">
	        	<div class="menu-body">
	        	<center><table>
	        	<tr>
	        		<td width="80%">สิ่งที่ต้องกรอก</td>
	        		<td width="80%">การจัดการ</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<!-- Trigger/Open The Modal -->
						<button id="myBtn">Open Modal</button>
					</td>
					<td>
						<input type="submit" name="edit" value="EDIT">
					</td>
				</tr>
				</table></center>

						<!-- The Modal -->
						<div id="myModal" class="modal">

					  	<!-- Modal content -->
					  	<div class="modal-content">
						  <div class="modal-body">
						    <div class="sect-container">
					        <form name="patient_his" method="post" action="Exam_his.html">
					            <div class="panel panel-success">
					            	<span class="close">&times;</span>
					            <div class="panel-heading"><h3>Patient's History</h3></div>
					            	<div class="panel-body">
					                    <div class="form-group">
					                       <h4>Medical History</h4>
					                       
					                       <table width="100%">
					                       
					                       <tr height="80">
					                       <td width="25%">
					                        <input type="checkbox" name="nonemed" value="nonemed">&nbsp;None
					                        </td>
					                        <td width="25%">
					                        <input type="checkbox" name="cardiodismed" value="cardiodismed">&nbsp; Cardiovascular Diseases
					                        </td>
					                        <td width="25%">
					                        <input type="checkbox" name="pulmonarydismed" value="pulmonarydismed">&nbsp; Pulmonary Diseases
					                        </td>
					                        <td width="25%">
					                        <input type="checkbox" name="gastrodismed" value="gastrodismed">&nbsp; Gastrointestinal Diseases
					                        </td>
					                        </tr>

					                        <tr height="80">
					                        <td width="25%"> 
					                        <input type="checkbox" name="hemadismed" value="hemadismed">&nbsp;Hematologic Diseases
					                        </td>
					                        <td width="25%">
					                        <input type="checkbox" name="neurodismed" value="neurodismed">&nbsp; Neurologic Diseases
					                        </td>
					                        <td colspan="2" width="50%">
					                        <input type="checkbox" name="allergicmed" value="allergicmed">&nbsp; Allergic to &nbsp;&nbsp;
					                        <input type="text" name="allermed" style="width: 400px; height: 50px;">
					                        </td>
					                        </tr>

					                        <tr height="80">
					                        <td colspan="2" width="50%"> 
					                        <input type="checkbox" name="bloodpressmed" value="bloodpressmed">&nbsp;Blood Pressure (if needed) &nbsp; <input type="text" name="blood">
					                        </td>
					                        <td colspan="2" width="50%">
					                        <input type="checkbox" name="othermed" value="othermed">&nbsp; Other &nbsp; <input type="text" name="medother">
					                        </td>
					                        </tr>

					                        <tr height="80">
					                        <td colspan="2" width="50%">
					                        <input type="checkbox" name="takingmed" value="takingmed">&nbsp; Taking medicine &nbsp; <input type="text" name="medtaking">
					                        </td>
					                        <td colspan="2" width="50%"><b>
					                        Personal Doctor</b>&nbsp;<input type="text" name="personalmed">
					                        </td>
					                        </tr>

					                        <tr height="80">
					                        <td colspan="2" width="50%"><b> Tel &nbsp;</b> <input type="text" name="telmed">
					                        </td>
					                        <td colspan="2" width="50%"><b> Remark &nbsp; </b><input type="text" name="remarkmed">
					                        </td>
					                        </tr>

					                      </table> 

					                      <h4>Dental History</h4>
					                      <table width="100%">
					                      <tr height="80">
					                      <td width="100%"><b>
					                         Chief Complaint &nbsp;<input type="text" name="chiefdent"></b>
					                      </td>
					                      </tr>
					                      
					                      <tr height="80">
					                      <td width="100%"><b>
					                          History of Present Illness &nbsp; </b><input type="text" name="presentilldent">
					                      </td>    
					                      </tr>    
					                      </table>
					                    </div>
					                <input type="submit" class="big-link-1 btn scroll-link" name="next" value="NEXT">
					                <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR">
					                </div>
					            </div>
					        </form>        
					    	</div> 
						  </div>
						</div>
					</div>
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
			 $_SESSION['avgnone'] = $avgnone;

		$check->CheckPulmonary($image,$conn);
			$cpul0 = $_SESSION['count0'];
			$avgpul = $_SESSION['avg'];
		//	echo "Number of black color (0) = ".$cpul0."<br>";
			echo "average percent of white color = ".$avgpul."<br>";
			echo "<br><br><br><br>";
			$_SESSION['avgpul'] = $avgpul;

	}
?>


</body>    
</html>

<script type="text/javascript">
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
</script>