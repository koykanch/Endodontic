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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- filter when type-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>

        <!-- pagination แบ่งหน้าแสดงข้อมูล -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>

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
            input[type="text"],input[type="password"]:-webkit-input-placeholder, textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #000; }


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
                    เพิ่มข้อมูลทันตแพทย์
                </button>  
            </div>
        <?php
        }
    }
   
}
?>
        <div class="first-container">
        <div class="panel panel-info">
        <div class="panel-heading"><h3>ข้อมูลทันตแพทย์ (Dentist Information)</h3></div>
        <div class="panel-body" id="dent-list">
            <input class="search" placeholder="Search" /><br><br>
            <table class="table table-bordered" border="1">
                <tbody class="list">
                <tr bgcolor="#D1C4E9">
                    <td>รหัสทันตแพทย์</td>
                    <td>ชื่อทันตแพทย์</td>
                    <td>สถานะ</td>
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
                    $sql = "SELECT * FROM dentist_info";
                    $resSql = $conn->query($sql);

                    while ($row = mysqli_fetch_array($resSql)) {
                        $dentistId = $row['dentId'];

                        echo '<tr>
                            <td class="Id">'.$row['dentId'].'</td>
                            <td class="name">'.$row['dent_name'].'</td>';

                            $status_detail = "SELECT * FROM dentist_status WHERE status_id = '".$row['status']."'";
                            $resstatus_detail = $conn->query($status_detail);
                            $objstatus_detail = mysqli_fetch_array($resstatus_detail);

                        echo '<td class="stat">'.$objstatus_detail['status_detail'].'</td>';
                        
                        if(isset($_SESSION['username'])){
                            if(isset($rowcheckuser['dentId'])){
                                if($rowcheckuser['status'] == '01'){
                                     echo '<td>
                                        <form action="updateDentist.php" method="post" name="updatebtn">
                                                <input type="hidden" name="dentId" value="'.$row['dentId'].'">
                                                <input type="submit" class="btn btn-primary" name="'.$row['dentId'].'" value="Edit" style="width: 100px;">
                                        </form><br>'; ?>
                                        <form action="deleteDentist.php" method="post" name="deletebtn" onSubmit="return confirm('are you sure?')">
                                                <input type="hidden" name="dentId" value="<?php echo $row['dentId']; ?>">
                                                <input type="submit" class="btn btn-danger"  value="Delete" style="width: 100px;"name="<?php echo $row['dentId']; ?>">
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
        <form name="dentist" action="insertdent.php" method="post">
            <div class="panel panel-danger">
            <span class="close">&times;</span>
                <div class="panel-heading"><h3>Dentist Record</h3></div>
                    <div class="panel-body">
                    <table>

                    <tr height="80">
                        <td><b>Dent ID: </b></td>
                        <td><input type="text" name="dentid" maxlength="9"></td>
                    </tr>

                    <tr height="80">
                        <td><b>Dentist's name: </b></td>
                        <td><input type="text" name="dentname" maxlength="100"></td>
                    </tr>

                    <tr height="80">
                        <td><b>Dentist's password: </b></td>
                        <td><input type="password" name="dentpassword"></td>
                    </tr>

                    <?php
                        $statusdent = "SELECT * FROM dentist_status";
                        $resstatus = $conn->query($statusdent);
                    ?>
                    <tr height="80">
                        <td><b>Status: </b></td>
                        <td>
                        <select name="dentstatus" style="height: 50px;">
                            <?php
                            while($rowstatus = mysqli_fetch_array($resstatus)){
                                ?>
                                    <option value="<?php echo $rowstatus['status_id']; ?>"><?php echo $rowstatus['status_detail'] ?></option>';
                               <?php
                            }
                            ?>
                        </select>
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
        valueNames: [ 'Id', 'name', 'stat' ]
        };
    var dentist = new List('dent-list', options);
</script>

<!-- script for pagination แบ่งหน้าแสดงข้อมูล -->
<script type="text/javascript">
    var options = {
        valueNames: [ 'Id', 'name', 'stat' ],
        page: 5,
        plugins: [
          ListPagination({})
          ]
        };
    var dentist = new List('dent-list', options);
</script>