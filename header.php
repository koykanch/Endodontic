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

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">

    </head>
<body>
<!-- change background image at assets/js/scripts.js --> 
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
            <?php 
            if(isset($_SESSION['username'])){
            ?>
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php
                            require('connect.php');
                            $sql = "SELECT * FROM dentalstudent_info,dentist_info WHERE dentId = ".$_SESSION['username']." OR student_code = ".$_SESSION['username']."";
                            $result = $conn->query($sql);
                            $row = mysqli_fetch_array($result);

                            if($_SESSION['username'] == $row['dentId']){
                                echo '<h4>Hello =>'.$row['dent_name'].'</h4>';

                                ?>
                                <div class="collapse navbar-collapse" id="top-navbar-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="Login.php" target="_top">Logout</a></li>
                                    </ul>
                                </div>
                                <?php
                            }else{
                                echo '<h4>Hello=>'.$row['student_name'].'</h4>';
                                ?>
                                <div class="collapse navbar-collapse" id="top-navbar-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="Login.php" target="_top">Logout</a></li>
                                    </ul>
                                </div>
                                <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>

            <?php }else{
                ?>
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Login.php" target="_top">Login</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
            </div>
        </nav>
 
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

