<!DOCTYPE html>
<html ng-app="myapp">
<head>
	<title>Summary</title>
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
        <link rel="stylesheet" href="assets/css/popup.css">
        <link rel="stylesheet" href="assets/css/cuppa-datepicker-styles.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Filter of name -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css"> -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
        <script type="text/javascript" src="dbcontroller.js"></script>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">
        <style type="text/css">
            .first-container{
                margin-top: 50px;
                margin-left: 50px;
                margin-right: 50px;
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

            input[type="text"]:-moz-placeholder, textarea:-moz-placeholder, textarea.form-control:-moz-placeholder { color: #000; }
            input[type="text"]:-ms-input-placeholder, textarea:-ms-input-placeholder, textarea.form-control:-ms-input-placeholder { color: #000; }
            input[type="text"]::-webkit-input-placeholder, textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #000; }

            button{
                margin-top: 2em;
                width: 150px;
                height: 40px;
                background-color: #FFD54F;
                border: none;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px
            }
        </style>
<?php
error_reporting(0);
session_start();

$user = $_SESSION['username'];
	require('connect.php');
	
?>
</head>
<body ng-controller="showdatacontroller">


<!-- change background image at assets/js/scripts.js --> 
    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

	<div class="first-container">
	<div class="panel panel-info">
	<div class="panel-heading"><h3>ข้อมูลการรักษา</h3></div>
	<div class="panel-body">

    <div ng-controller="showdatacontroller">
    <form class="navbar-form" role="search">
        <div class="form-group">
            <p><input ng-model="sData"  class="form-control"  placeholder="ค้นหา"/></p>
        </div>
     </form>       
	    <table class="table table-bordered" border="1">
	        <tr bgcolor="#D1C4E9">
                <td>ลำดับที่</td>
	            <td>รหัสผู้ป่วย</td>
	            <td>ชื่อผู้ป่วย</td>
	            <td>ประจำวันที่</td>
	            <td>นักศึกษาผู้รักษา</td>
	            <td>ทันตแพทย์ผู้รักษา</td>
	            <td>รายละเอียดการรักษา</td>
	        </tr>

            <?php
                if($user != ""){
                    ?>
                    {{showData | json}}
                    <tr ng-repeat="c in showData| filter:sData">
                      <td>{{c.Seq_no}}</td>
                      <td>{{c.HN}}</td>
                      <td>{{c.patientName}}</td>
                      <td>{{c.hard_Date| date:'dd-MM-yyyy'}}</td>
                      <td>{{c.student_code}}</td>
                      <td>{{c.dentId}}</td>
                      <td><form action="report.php" method="post" name="summary" target="_blank">
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                        <input type="submit" class="btn btn-success" style="width:100px;" name="detail" value="VIEW">
                      </form><br>

                      <form action="updateEndodontic.php" method="post" name="edit_detail" target="_blank">
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                        <input type="submit" class="btn btn-info" style="width:100px;" name="edit" value="EDIT">
                      </form><br>

                      <form action="deleteEndodontic.php" method="post" name="delete_detail">
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                        <input type="submit" class="btn btn-danger" style="width:100px;" name="delete" value="DELETE"></tr>
                      </form></tr>
                    <?php
                }else{
                    ?>
                    <tr ng-repeat="c in showData| filter:sData"> 
                      <td>{{c.Seq_no}}</td>                    
                      <td>{{c.HN}}</td>
                      <td>{{c.patientName}}</td>
                      <td>{{c.hard_Date| date:'dd-MM-yyyy'}}</td>
                      <td>{{c.student_code}}</td>
                      <td>{{c.dentId}}</td>
                      <td><form action="report.php" method="post" name="summary" target="_blank">
                            <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                            <input type="hidden" name="PatientHN" value="{{c.HN}}">
                            <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                            <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                            <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                            <input type="submit" class="btn btn-success" style="width:100px;" name="detail" value="VIEW">
                            </form></td>
                    </tr>
                    <?php
                }
            ?>
    </div>
</body>
</html>
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

        <!-- filter name for search-->
        