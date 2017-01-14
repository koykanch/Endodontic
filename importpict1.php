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
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/cuppa-datepicker-styles.css">
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/cuppa-calendar.js"></script>

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
                padding: .5em 3em .4em .4em;                
                margin: 10em 0;
                background:#E3F2FD;
            }

        .menu-body{
                display: block;
                padding: .4em 3em .4em .4em;                
                margin: 10em 0;
                background:#E3F2FD;
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

        .container{
          margin-top: 30px;
        }

        td{
          padding-right: 7px;
        }

        button{
            background-color: #B39DDB;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 250px;
            
           
        }

    </style>

</head>
<body>
<form name="import" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="panel panel-info">
  <div class="panel-heading"><h3>Import Picture</h3></div>
  <div class="panel-body">
    <div class="row" style="height:50px;">
      <div class="col-md-12">
        <center><input type="file" name="f1"></center>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
      <input type="submit" name="submit1" class="btn btn-info" value="UPLOAD" disabled>
      <input type="submit" class="btn btn-success" name="submit3" value="PROCESS">
      <input type="reset" name="clear" class="btn btn-danger" value="RESET">
      </div>
    </div>
  </div>
  </div>
  </div>
</form>
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
      
      $sql = "INSERT INTO dent_hardcopy(hardcopyData) VALUES('$image')";
         $res = $conn->query($sql);

         if($res){
        echo "Success...";
      }else
      { 
        echo "Unsuccess!!!!";
      }
    }
         
  }
if(isset($_POST['submit3'])){
    require('class.php');
    $image = $_FILES['f1']['name'];
    $check = new Check;

?>
<div class="sect-container">
<?php
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
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgpul."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgpul'] = $avgpul;
?>
</div>
<?php
  }
?>
</body>
</html>