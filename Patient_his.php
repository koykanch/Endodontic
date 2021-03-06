
<!DOCTYPE html>
<html lang="en">

    <head>    
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
            .first-container{
                margin-top: 50px;
                margin-left: 50px;
                margin-right: 50px;
            }

            .sect-container{
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

            table{
                margin-left: 15px;
                text-align: left;
            }

            td{
                padding: 5px;
            }

        </style>

    </head>

 <body><!-- change background image at assets/js/scripts.js --> 
        <!-- Loader -->
        <div class="loader">
            <div class="loader-img"></div>
        </div>

    <div class="first-container">
        <form name="hnpatient" action="" method="post">
            <div class="panel panel-danger">
                <div class="panel-heading"><h3>Endodontic Record</h3></div>
                    <div class="panel-body">
                    <table width="90%">
                    <tr>
                    <td width="15%">
                        <b>HN: </b><input type="text" style="width: 150px;" name="hnid">
                    </td>
                    <td width="15%">
                        <b>Patient's name: </b><input type="text" name="patientname">
                    </td>
                    <td width="15%">
                        <b>Age: </b><input type="text" style="width: 150px;" name="age">
                    </td>
                    <td width="15%">
                        <b>Tooth: </b><input type="text" style="width: 150px;" name="tooth">
                    </td>
                    <td colspan="2" width="45%">
                        <b>Gender: </b>
                            <select style="width:150px;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                    </td>
                    </tr>
                    </table>        
                </div>
            </div>
        </form>
    </div>

    <div class="sect-container">
        <form name="patient_his" method="post" action="Exam_his.html">
            <div class="panel panel-info">
            <div class="panel-heading"><h3>Patient's History</h3></div>
                <div class="panel-body">
                    <div class="form-group">
                       <h4>Medical History</h4>
                       
                       <table width="100%">
                       
                       <tr>
                       <td width="25%">
                       <?php
                            if($_SESSION['avgnone'] > 30){
                                ?>
                                <input type="checkbox" name="nonemed" value="nonemed" checked>&nbsp;None
                                <?php
                            }else{
                                ?>
                                <input type="checkbox" name="nonemed" value="nonemed">&nbsp;None
                                <?php
                            }
                       ?>
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

                        <tr>
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

                        <tr>
                        <td colspan="2" width="50%"> 
                        <input type="checkbox" name="bloodpressmed" value="bloodpressmed">&nbsp;Blood Pressure (if needed) &nbsp; <input type="text" name="blood">
                        </td>
                        <td colspan="2" width="50%">
                        <input type="checkbox" name="othermed" value="othermed">&nbsp; Other &nbsp; <input type="text" name="medother">
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2" width="50%">
                        <input type="checkbox" name="takingmed" value="takingmed">&nbsp; Taking medicine &nbsp; <input type="text" name="medtaking">
                        </td>
                        <td colspan="2" width="50%"><b>
                        Personal Doctor</b>&nbsp;<input type="text" name="personalmed">
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2" width="50%"><b> Tel &nbsp;</b> <input type="text" name="telmed">
                        </td>
                        <td colspan="2" width="50%"><b> Remark &nbsp; </b><input type="text" name="remarkmed">
                        </td>
                        </tr>

                      </table> 

                      <h4>Dental History</h4>
                      <table width="100%">
                      <tr>
                      <td width="100%"><b>
                         Chief Complaint &nbsp;<input type="text" name="chiefdent"></b>
                      </td>
                      </tr>
                      
                      <tr>
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