<html>
<head>
 
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap1.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome1.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom1.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <style type="text/css">
    .list-group{
        padding-top: 2em;
    }

    .rounded-list a{
        position: relative;
        display: block;
        padding: .4em .4em .4em 2em;                
        margin: .5em 0;
        background: #81C784;    
        color: #444;
        text-decoration: none;
        -moz-border-radius: .3em; /*กำหนดเส้นขอบแบบโค้งมน*/
        -webkit-border-radius: .3em; /*กำหนดเส้นขอบแบบโค้งมน*/
        border-radius: .3em;
        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -ms-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        transition: all .3s ease-out;   
        font-size:16px;
    }

    .rounded-list  ul { list-style-type: circle; }
    .rounded-list a:hover{
        background: #69F0AE;
    }
    .rounded-list a:hover:before{
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);  
    }
    .rounded-list a:before{
        /*content: counter(li);
        counter-increment: li;*/
        content: "";
        display: block;
        background: url("assets/img/dent1.png") center #fff no-repeat;
        position: absolute; 
        left: -1.3em;
        top: 50%;
        margin-top: -1.3em;
        /*background: #d6a4d6;*/
        height: 2.5em;
        width: 2.5em;
        line-height: 2em;
        border: .3em solid #FFC107;
        text-align: center;
        font-weight: bold;
        -moz-border-radius: 2em;
        -webkit-border-radius: 2em;
        border-radius: 2em;
        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -ms-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        transition: all .3s ease-out;
    }

 </style> 
<?php session_start(); ?>
</head>
<body>
<!-- <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
             <li><a href="patient_info.php" target="part">ข้อมูลผู้ป่วย</a></li>
             <li><a href="dentist_info.php" target="part">ข้อมูลทันตแพทย์</a></li>
             <li><a href="Student_info.php" target="part">ข้อมูลนักศึกษาทันตแพทย์</a></li>
             <li><a href="importpict.php" target="part">อัพเดทประวัติการรักษา</li></a>
             <li><a href="#" target="part">รายงานสรุปผล</a></li>
        </ul>
    </div>
</nav> -->

 <div class="list-group">
	<ul class="rounded-list">
		 <li><a href="patient_info.php" class="list-group-item-warning" target="part">ข้อมูลผู้ป่วย<br />Manage data of Patients</a></li>
		 <li><a href="dentist_info.php" class="list-group-item-warning" target="part">ข้อมูลทันตแพทย์<br />Manage data of Dentist</a></li>
		 <li><a href="Student_info.php" class="list-group-item-warning" target="part">ข้อมูลนักศึกษาทันตแพทย์<br />Manage data of Dental student</a></li>
<?php 
    if(isset($_SESSION['username'])){
        ?>
        <li><a href="endorecord.php" class="list-group-item-warning" target="_blank">บันทึกประวัติการรักษา<br />Endodontic Record</a></li>
<?php 
    } ?>

         <li><a href="summary.php" class="list-group-item-warning" target="part">รายงานสรุปผล<br />Report</a></li>
         </li>
    
    </ul>
</div> 

</body>
</html>