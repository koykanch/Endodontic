<!DOCTYPE html>
<html lang="en">

    <head>    
    <?php session_start(); ?>
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
        <link rel="stylesheet" href="datepicker/datepicker.css">
        <script src="datepicker/datepicker.js"></script>

        <!-- filter when type-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>

        <!-- pagination แบ่งหน้าแสดงข้อมูล -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">
        <style type="text/css">
            .first-container{
                margin-top: 50px;
                margin-left: 50px;
                margin-right: 50px;
            }

            input[type="text"],
            input[type="password"], 
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
            input[type="password"]:focus, 
            textarea:focus, 
            textarea.form-control:focus {
                outline: 0;
                border: 1px solid #43A047;
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            input[type="text"],input[type="password"]:-moz-placeholder, textarea:-moz-placeholder, textarea.form-control:-moz-placeholder { color: #000; }
            input[type="text"],input[type="password"]:-ms-input-placeholder, textarea:-ms-input-placeholder, textarea.form-control:-ms-input-placeholder { color: #000; }
            input[type="text"],input[type="password"]::-webkit-input-placeholder, textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #000; }


            button{
                margin-top: 2em;
                width: 200px;
                height: 45px;
                background-color: #FFD54F;
                border: none;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px
            }

            .panel-body{
                font-size: 14px;
            }
        </style>

    </head>
<?php
    require("connect.php");
?>
 <body><!-- change background image at assets/js/scripts.js --> 
    <!-- Loader -->
        <div class="loader">
            <div class="loader-img"></div>
        </div>
<?php
error_reporting(0);
$checkuser = "SELECT * FROM dentist_info WHERE dentId = '".$_SESSION['username']."'";
$rescheckuser = $conn->query($checkuser);
$rowcheckuser = mysqli_fetch_array($rescheckuser);

if(isset($_SESSION['username'])){
    if(isset($rowcheckuser['dentId'])){
        if($rowcheckuser['status'] == '01'){
    ?>
        <div class="container">
            <button id="myBtn" style="float: right;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="float: left;"></span>
                <!-- Trigger/Open The Modal -->
                เพิ่มข้อมูลนักศึกษา
            </button>  
        </div> 
    <?php 
        }
    }
}
?>
        <div class="first-container">
        <div class="panel panel-info">
        <div class="panel-heading"><h3>ข้อมูลนักศึกษา (Student Information)</h3></div>
        <div class="panel-body" id="student-list">
            <input class="search" placeholder="Search" /><br><br>
            <table class="table table-bordered" border="1">
            <tbody class="list">
                <tr bgcolor="#D1C4E9">
                    <td>รหัสนักศึกษา</td>
                    <td>ชื่อนักศึกษา</td>
                    <td>ช่วงเวลาที่อยู่รักษาผู้ป่วย</td>
                    <td>ช่วงเวลาที่หยุดรักษาผู้ป่วย</td>
                <?php
                if(isset($_SESSION['username'])){
                    if(isset($rowcheckuser['dentId'])){
                        if($rowcheckuser['status'] == '01'){
                            echo '<td>จัดการข้อมูลนักศึกษา</td>';
                        }
                    }
                }
                ?>
                </tr>
                <?php
                    $sql = "SELECT * FROM dentalstudent_info";
                    $resSql = $conn->query($sql);

                    while ($row = mysqli_fetch_array($resSql)) {
                        $studentId = $row['student_code'];
                        $begin=date('d/m/Y',strtotime($row['student_timebegin']));
                        $end=date('d/m/Y',strtotime($row['student_timeend']));
                        echo '<tr>
                            <td class="stu_code">'.$row['student_code'].'</td>
                            <td class="stu_name">'.$row['student_name'].'</td>
                            <td class="start">'.$begin.'</td>
                            <td class="end">'.$end.'</td>';

                        if(isset($_SESSION['username'])){
                             if(isset($rowcheckuser['dentId'])){
                                if($rowcheckuser['status'] == '01'){
                        echo '<td>
                                <form action="updateStudent.php" method="post" name="updatebtn">
                                        <input type="hidden" name="studentId" value="'.$row['student_code'].'">
                                        <input type="submit" class="btn btn-primary" style="width: 100px;" name="'.$row['student_code'].'" value="Edit">
                                </form><br>';
                            ?>
                                <form action="deleteStu.php" method="post" name="deletebtn" onSubmit="return confirm('are you sure?')">
                                        <input type="hidden" name="stu_code" value="<?php echo $row['student_code']; ?>">
                                        <input type="submit" class="btn btn-danger"  value="Delete" style="width: 100px;"name="<?php echo $row['student_code']; ?>">
                                </form> 
                            </td> <?php } 
                                }
                            }
                       ?>
                        </tr><?php } ?>   
                        </tbody>
                     </table>
                     <ul class="pagination"></ul>
        </div>    
        </div>    
        </div>

        <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-body">
        <div class="sect-container">
        <form name="student" action="insertStudent.php" method="post">
            <div class="panel panel-danger">
            <span class="close">&times;</span>
                <div class="panel-heading"><h3>Student Record</h3></div>
                    <div class="panel-body">
                    <table>

                    <tr height="80">
                        <td width="30%"><b>Student ID: </b></td>
                        <td><input type="text" name="studentid" maxlength="9"></td>
                    </tr>

                    <tr height="80">
                        <td width="30%"><b>Student name: </b></td>
                        <td><input type="text" name="studentname" maxlength="100"></td>
                    </tr>

                    <tr height="80">
                        <td width="30%"><b>Password: </b></td>
                        <td><input type="password" name="studentpassword"></td>
                    </tr>

                    <tr height="80">
                        <td width="30%"><b>Time begin: </b></td>
                        <td><!-- <input type="text" name="timebegin"> -->
                            <i class="glyphicon glyphicon-calendar" style="font-size: 20px;"></i>
                            <input type="text" name="student_begin" class="startDate" placeholder="Start">
                        
                        </td>
                    </tr>

                    <tr height="80">
                        <td width="30%"><b>Time end: </b></td>
                        <td>
                        <!-- <input type="text" name="timeend"> -->
                            <i class="glyphicon glyphicon-calendar" style="font-size: 20px;"></i>
                            <input type="text" name="student_end" class="endDate" placeholder="End">
                        </td>
                    </tr>

                    </table>

                    <br><br>
                    <input type="submit" class="big-link-1 btn scroll-link" name="submit" value="ADD">
                    <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR">
                </div>
            </div>
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
 </body>
 </html>
<script type="text/javascript">
    var tripDatePicker = new datePicker({
        start:  document.getElementsByClassName('startDate'),
        end:    document.getElementsByClassName('endDate'),
    });

    var tripDatePicker = new datePicker({
        start:  document.getElementsByClassName('startDate'),
        end:    document.getElementsByClassName('endDate'),
        months: 2,
    });
</script>
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

<!-- script for filter name when type -->
<script type="text/javascript">
    var options = {
        valueNames: [ 'stu_code', 'stu_name', 'start', 'end' ]
        };
    var student = new List('student-list', options);
</script>

<!-- script for pagination แบ่งหน้าแสดงข้อมูล -->
<script type="text/javascript">
    var options = {
        valueNames: [ 'stu_code', 'stu_name', 'start', 'end' ],
        page: 5,
        plugins: [
          ListPagination({})
          ]
        };
    var student = new List('student-list', options);
</script>