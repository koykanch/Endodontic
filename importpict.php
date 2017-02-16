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

    <!-- Loader -->
	<div class="loader">
		<div class="loader-img"></div>
	</div>
	

     <div class="container">
        <div class="panel panel-info">
        <div class="panel-heading"><h3>Import Picture</h3></div>
        <div class="panel-body">
			<form name="import" method="post" enctype="multipart/form-data">
				<center><table border="0">
				<tr height="80">
					<td><input type="file"  name="f1"></td>
				</tr>
				<tr align="center">
					<td>
					<input type="submit" name="submit1" class="btn btn-info" value="UPLOAD">
					<input type="submit" class="btn btn-success" name="submit3" value="PROCESS">
					<input type="reset" name="clear" class="btn btn-danger" value="RESET"></td>
				</tr>
				</table></center>
			</form>
		
		</div>
		</div>
		</div>
	</div>


<div class="container">
	<div class="panel panel-danger">
    <div class="panel-heading"><h3>บันทึกข้อมูล</h3></div>
    <div class="panel-body">
    	
			<!-- Trigger/Open The Modal -->
			<p><button id="myBtn">Endodontic record</button></p>
			<p><button id="myButton">Patient's history</button></p>
			<p><button id="myButton1">Examination</button></p>
			<p><button id="myButton2">Diagnosis</button></p>
			<p><button id="myButton3">Treatment Planning</button></p>
		
	</div>
	</div>
	</div>
</div>

<?php 
require('connect.php');
require('class_patient.php');
require('class_stu.php');
require('class_dent.php');

$patient = new Patient;
$stu = new Student;
$instruc = new Dentist;

?>

<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="sect-container">
        <form name="hnpatient" action="" method="post">
            <div class="panel panel-info">
            <span class="close">&times;</span>
                <div class="panel-heading"><h3>Endodontic Record</h3></div>
                    <div class="panel-body">
                    <table>
                    <col width="30">
                    <tr height="80">
                      <td>
                        <b>HN: </b>
                      </td>
                      <td>
                             <?php $patient->SearchHN($conn); ?>
                        <!-- <input type="text" style="width: 100px; height: 50px;" name="hnid"> -->
                        </td>
                    </tr>

                    <!-- <td>
                        <b>Patient's name: </b>
                        <input type="text" style="width: 350px; height: 50px;" name="patientname">
                    </td> -->
                    <!-- <td>
                        <b>Age: </b><input type="text" style="width: 100px; height: 50px;" name="age">
                    </td> -->
                    <tr>
                    <td>
                        <b>Tooth: </b>
                    </td>
                    <td>
                        <input type="text" style="width: 100px; height: 50px;" name="tooth">
                    </td>
                    <!-- <td>
                        <b>Gender: </b>
                            <select style="width:100px; height: 50px;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                    </td> -->
                    </tr>

                    <tr height="80">
                    <td>
                        <b>Dental student:</b>
                    </td>
                    <td>
                        <?php $stu->searchstu($conn); ?>
                        <!-- <input type="text" name="student"> -->
                    </td>
                </tr>

                <tr height="80">
                    <td>
                        <b>Instructor:</b>
                    </td>
                    <td>
                        <?php $instruc->searchdent($conn); ?>
                        <!-- <input type="text" name="instructor"> -->
                    </td>
                </tr>

                <tr height="80">
                    <td>
                        <b>Date:</b>
                    </td>
                    <td>

                        <div id="demo" style="width:200px;"></div>
                    </td>
                </tr>
                    </table>        
                </div>
            </div>
        </form>
	</div> 
  </div>
</div>
</div>

<!-- The Modal -->
<div id="popup" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="sect-container">
    <form name="patient_his" method="post" action="Exam_his.html">
            <div class="panel panel-info">
            <span class="close1">&times;</span>
            <div class="panel-heading"><h3>Patient's History</h3></div>
                <div class="panel-body">
                    <div class="form-group">
                       <h4>Medical History</h4>
                       
                       <table>
                       <tr height="80">
                        <td>
                            <input type="checkbox" name="nonemed" value="nonemed">&nbsp;None
                        </td>                    

                        <td>
                        <input type="checkbox" name="cardiodismed" value="cardiodismed">&nbsp; Cardiovascular Diseases
                        </td>
                        <td>
                        <input type="checkbox" name="pulmonarydismed" value="pulmonarydismed">&nbsp; Pulmonary Diseases
                        </td>
                        <td>
                        <input type="checkbox" name="gastrodismed" value="gastrodismed">&nbsp; Gastrointestinal Diseases
                        </td>
                        </tr>

                        <tr height="80">
                        <td> 
                        <input type="checkbox" name="hemadismed" value="hemadismed">&nbsp;Hematologic Diseases
                        </td>
                        <td>
                        <input type="checkbox" name="neurodismed" value="neurodismed">&nbsp; Neurologic Diseases
                        </td>
                        <td colspan="2" width="50%">
                        <input type="checkbox" name="allergicmed" value="allergicmed">&nbsp; Allergic to &nbsp;&nbsp;
                        <input type="text" name="allermed" style="width: 280px; height: 50px;">
                        </td>
                        </tr>

                        <tr height="80">
                        <td colspan="2"> 
                        <input type="checkbox" name="bloodpressmed" value="bloodpressmed">&nbsp;Blood Pressure (if needed) &nbsp; <input type="text" name="blood" style="width: 180px; height: 50px;">
                        </td>
                        <td colspan="2">
                        <input type="checkbox" name="othermed" value="othermed">&nbsp; Other &nbsp; <input type="text" name="medother" style="width: 310px; height: 50px;">
                        </td>
                        </tr>

                        <tr height="80">
                        <td colspan="2">
                        <input type="checkbox" name="takingmed" value="takingmed">&nbsp; Taking medicine &nbsp; <input type="text" name="medtaking" style="width: 250px; height: 50px;">
                        </td>
                        <td colspan="2"><b>
                        Personal Doctor</b>&nbsp;<input type="text" name="personalmed" style="width: 250px; height: 50px;">
                        </td>
                        </tr>

                        <tr height="80">
                        <td colspan="2"><b> Tel &nbsp;</b> <input type="text" name="telmed" style="width: 350px; height: 50px;">
                        </td>
                        <td colspan="2"><b> Remark &nbsp; </b><input type="text" name="remarkmed" style="width: 300px; height: 50px;">
                        </td>
                        </tr>

                      </table> 

                      <h4>Dental History</h4>
                      <table>
                      <tr height="80">
                      <td><b>
                         Chief Complaint &nbsp;<input type="text" name="chiefdent" style="width: 700px; height: 50px;"></b>
                      </td>
                      </tr>
                      
                      <tr height="80"> 
                      <td><b>
                          History of Present Illness &nbsp; </b><input type="text" name="presentilldent" style="width: 620px; height: 50px;">
                      </td>    
                      </tr>    
                      </table>
                    </div>
                <center><input type="submit" class="big-link-1 btn scroll-link" name="next" value="ADD">
                <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR"></center>
                </div>
            </div>
        </form>        
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="popup1" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="sect-container">
    <form name="examform" action="Diagnosis_his.html" method="post">
    <div class="panel panel-info">
    <span class="close2">&times;</span>
        <div class="panel-heading"><h3>Examination</h3></div>
        
        <div class="panel panel-body">
            <h4>S.Subjective Symptoms</h4>

            <table>
            <tr height="80">
               <td><b>Pain intensity: </b></td> 

               <td>
                <input type="radio" name="paininten" value="noneinten">&nbsp; None
               </td>

               <td>
                <input type="radio" name="paininten" value="mildinten"> &nbsp; Mild
               </td>

               <td>
                <input type="radio" name="paininten" value="moderateinten"> &nbsp; Moderate
               </td>

               <td>
                <input type="radio" name="paininten" value="seversinten"> &nbsp; Severe
               </td>

               <td></td>
            </tr>

            <tr height="80">
               <td width="20%"><b>Pain Character: </b></td> 

               <td>
                <input type="radio" name="painchar" value="dullchar">&nbsp; Dull
               </td>

               <td>
                <input type="radio" name="painchar" value="sharpchar"> &nbsp; Sharp
               </td>

               <td>
                <input type="radio" name="painchar" value="throbbingchar"> &nbsp; Throbbing
               </td>

               <td></td>
               <td></td>
            </tr>

            <tr height="80">
               <td><b>Onset: </b></td> 

               <td>
                <input type="radio" name="onset" value="spontaneousonset">&nbsp; Spontaneous
               </td>

               <td colspan="4">
                <input type="radio" name="onset" value="stimulationonset"> &nbsp; Stimulation Required &nbsp;
                <input type="text" name="onsetstimul" style="width: 300px; height: 50px; ">
               </td>

            </tr>

            <tr height="80">
               <td><b>Duration: </b></td> 

               <td>
                <input type="radio" name="duration" value="secondsduration">&nbsp; Seconds
               </td>

               <td>
                <input type="radio" name="duration" value="minutesduration"> &nbsp; Minutes 
               </td>

               <td>
                <input type="radio" name="duration" value="hoursduration"> &nbsp; Hours 
               </td>

               <td>
                <input type="radio" name="duration" value="intermittentduration"> &nbsp; Intermittent 
               </td>

               <td>
                <input type="radio" name="duration" value="constantduration"> &nbsp; Constant 
               </td>
            </tr>


            <tr height="80">
               <td><b>Location: </b></td> 

               <td>
                <input type="radio" name="location" value="localizedlocat">&nbsp; Localized
               </td>

               <td>
                <input type="radio" name="location" value="diffusedlocat"> &nbsp; Diffused 
               </td>

               <td colspan="3">
                <input type="radio" name="location" value="radiatinglocat"> &nbsp; Radiating to &nbsp; <input type="text" name="locatradiat" style="width: 250px; height: 50px;"> 
               </td>
            </tr>

            <tr height="80">
                <td></td>
               <td colspan="5">
                <input type="radio" name="location" value="referredlocat"> &nbsp; Referred to &nbsp;
                <input type="text" name="refer" style="width: 500px; height: 50px;"> 
               </td>
            </tr>
            
            </table>

            <br><br>
            <h4>O.Objective Symptoms</h4>
            <table>
            <tr height="80">
                <td><b>
                Extraoral: </b>
                </td>

                <td>
                <input type="radio" name="extra" value="facialextra">&nbsp; Facial Swelling
                </td>

                <td>
                <input type="radio" name="extra" value="lymphextra">&nbsp; Lymph Node
                </td>

                <td>
                <input type="radio" name="extra" value="extsinusextra">&nbsp; Sinus Tract
                </td>
            </tr>
            <tr height="80">
                <td></td>
                <td colspan="3">
                <input type="radio" name="extra" value="otherextra">&nbsp; Other &nbsp; 
                <input type="text" name="extraother" style="width: 600px; height: 50px;">
                </td>
            </tr>
            
            <tr height="80">
                <td><b>
                Intraoral: </b>
                </td>

                <td colspan="3">
                <input type="radio" name="intra" value="swellingintra">&nbsp; Swelling (Soft/Firm) area &nbsp; <input type="text" name="intraswell" style="width: 450px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="3">
                <input type="radio" name="intra" value="sinusintra">&nbsp; Sinus Tract at &nbsp; <input type="text" name="intrasinus" style="width: 540px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>
                Tooth: </b>
                </td>

                <td>
                <input type="radio" name="tooth" value="cariestooth">&nbsp; Caries
                </td>

                <td>
                <input type="radio" name="tooth" value="pulptoothex">&nbsp; Pulp Exposure
                </td>

                <td>
                <input type="radio" name="tooth" value="pulptoothpoly">&nbsp; Pulp Polyp
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td>
                <input type="radio" name="tooth" value="opentoothdrai"> &nbsp; Opened for Drainage
                </td>

                <td colspan="2">
                <input type="radio" name="tooth" value="temptooth">&nbsp; Temp. Restoration
                </td>
            </tr>

            <tr height="80">
                <td width="15%"></td>

                <td colspan="3">
                    <input type="radio" name="tooth" value="restoothtoration"> &nbsp; Restoration with &nbsp; <input type="text" name="toothrestoration" style="width: 500px; height: 50px;">
                </td>                 
            </tr>

            <tr height="80">
                <td></td>

                <td colspan="3">
                    <input type="radio" name="tooth" value="fracturetoration"> &nbsp; Fracture at &nbsp; <input type="text" name="toothfractoration" style="width: 550px; height: 50px;">
                </td>                 
            </tr>

            <tr height="80">
                <td></td>

                <td colspan="3">
                    <input type="radio" name="tooth" value="crowntooth"> &nbsp; Crown Discoloration to &nbsp; <input type="text" name="toothcrown" style="width: 450px; height: 50px;">
                </td> 
            </tr>

                <td></td>
                <td colspan="3">
                    <input type="radio" name="tooth" value="othertooth"> &nbsp; Other &nbsp; <input type="text" name="toothother" style="width: 550px; height: 50px;">
                </td>                 
            </tr>
            </table>

            <br><br>
            <h4>Radiographic findings</h4>
            <table>
            <tr height="80">
                <td width="18%"><b>Crown: </b></td>
                <td width="15%">
                    <input type="radio" name="crown" value="normcrown">&nbsp; Normal 
                </td>
                <td>
                    <input type="radio" name="crown" value="restcrown">&nbsp; Restoration
                </td>
                <td colspan="2">
                    <input type="radio" name="crown" value="fractcrown">&nbsp; Fracture
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="4">
                    <input type="radio" name="crown" value="cariescrown">&nbsp; Caries &nbsp;&nbsp;   
                    area &nbsp; <input type="text" name="crowarea" style="width: 100px; height: 50px;">&nbsp; &nbsp;
                    depth &nbsp; <input type="text" name="crowdepth" style="width: 100px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="4">
                    <input type="radio" name="crown" value="othercrown">&nbsp; Other &nbsp; 
                    <input type="text" name="crownother" style="width: 400px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>Pulp Chambar: </b></td>
                <td>
                    <input type="radio" name="pulpcham" value="normcham">&nbsp; Normal 
                </td>

                <td>
                    <input type="radio" name="pulpcham" value="stonecham">&nbsp; Pulp Stone 
                </td>

                <td colspan="2">
                    <input type="radio" name="pulpcham" value="rescham">&nbsp; Resorption 
                </td>
            </tr>
            <tr height="80">
                <td></td>
                <td colspan="2">
                    <input type="radio" name="pulpcham" value="calcificatecham">&nbsp; Calcification &nbsp;
                    <select style="height: 50px;">
                        <option value="partialchamber">Partial</option>
                        <option value="completechamber">Complete</option>
                    </select>
                </td>

                <td colspan="2">
                    <input type="radio" name="pulpcham" value="otherchamber">&nbsp; Other &nbsp; <input type="text" name="crownother" style="width: 150px; height: 50px;">
                </td>
            </tr>

             <tr height="80">
                <td><b>Root: </b></td>
                <td>
                    <input type="radio" name="root" value="normroot">&nbsp; Normal 
                </td>
                <td>
                    <input type="radio" name="root" value="cariesroot">&nbsp; Caries
                </td>
                <td colspan="2">
                    <input type="radio" name="root" value="curvatureroot">&nbsp; Curvature
                </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">
                    <input type="radio" name="root" value="extresroot">&nbsp; Ext. Resorption
                </td>
                <td colspan="2">
                    <input type="radio" name="root" value="fractroot">&nbsp; Fracture
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="4">
                    <input type="radio" name="root" value="otherroot">&nbsp; Other &nbsp; 
                    <input type="text" name="rootother" style="width: 400px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>Pulp Canal: </b></td>
                <td>
                    <input type="radio" name="pulpcan" value="normcanel">&nbsp; Normal 
                </td>
                <td>
                    <input type="radio" name="pulpcan" value="resorpcanel">&nbsp; Resorption
                </td>
                <td colspan="2">
                    <input type="radio" name="pulpcan" value="perforcanel">&nbsp; Perforation
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="radio" name="pulpcan" value="prevcanel">&nbsp; Previous RCT
                </td>
                <td colspan="2">
                    <input type="radio" name="pulpcan" value="brokecanel">&nbsp; Broken Instrument
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="2">
                    <input type="radio" name="pulpcan" value="calcificatecanel">&nbsp; Calcification &nbsp;
                    <select style="height: 50px;">
                        <option value="partialcanel">Partial</option>
                        <option value="completecanel">Complete</option>
                    </select>
                </td>

                <td colspan="2">
                    <input type="radio" name="pulpcan" value="othercanel">&nbsp; Other &nbsp; 
                    <input type="text" name="rootother" style="width: 150px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>Periradicular: </b></td>
                <td>
                    <input type="radio" name="perirad" value="normperirad">&nbsp; Normal 
                </td>
                <td>
                    <input type="radio" name="perirad" value="widenperirad">&nbsp; Widening PDL 
                </td>
                <td colspan="2">
                    <input type="radio" name="perirad" value="lossperirad">&nbsp; Loss of Lamina Dura 
                </td>
            </tr>
                <td></td>
                <td>
                    <input type="radio" name="perirad" value="resorpperirad">&nbsp; Resorption 
                </td>
                <td>
                    <input type="radio" name="perirad" value="apexperirad">&nbsp; Open Apex 
                </td>
                <td colspan="2">
                    <input type="radio" name="perirad" value="osteoperirad">&nbsp; OsteosIcerosis
                </td>
            </tr>

            <tr height="80">
                <td></td>
                
                <td colspan="2">
                    <input type="radio" name="perirad" value="hyperperirad">&nbsp; Hyperplasia of cementurn 
                </td>
                <td colspan="2">
                    <input type="radio" name="perirad" value="perialessperirad">&nbsp; Periapical Lesion &nbsp;
                    <input type="text" name="periradperialess" style="width: 200px; height: 50px;"> 
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="5">
                    <input type="radio" name="perirad" value="laterlessperirad">&nbsp; Lateral Lesion &nbsp;
                    <input type="text" name="periradlaterless" style="width: 500px; height:50px;"> 
                </td>
            </tr>

            <tr height="80">
                <td></td>
                <td colspan="5">
                    <input type="radio" name="perirad" value="otherperirad">&nbsp; Other &nbsp; <input type="text" name="periradother" style="width: 550px; height:50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>Alveolar Bone: </b></td>
                <td>
                    <input type="radio" name="alveolar" value="normalveolar">&nbsp; Normal 
                </td>
                <td width="25%">
                    <input type="radio" name="alveolar" value="generalalveolar">&nbsp; Generalized Bone loss 
                </td>
                <td colspan="2">
                    <input type="radio" name="alveolar" value="localalveolar">&nbsp; Localized Bone loss
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">
                    <input type="radio" name="perirad" value="otherperirad">&nbsp; Other &nbsp; 
                    <input type="text" name="periradother" style="width:550px; height: 50px;">
                </td>
            </tr>

            <tr height="80">
                <td><b>Remarks: </b></td>
                <td colspan="4">
                    <input type="text" name="otherremark" style="width: 700px; height: 50px;">
                </td>
            </tr>
            </table><br><br>
            <center><input type="submit" class="big-link-1 btn scroll-link" name="next" value="ADD">
            <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR"></center>
        </div>
    </div>   
    </form>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="popup2" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="sect-container">
        <form name="diagnosisform" action="Treatment_his.html" method="post">
            <div class="panel panel-info">
            <span class="close3">&times;</span>
                <div class="panel-heading"><h3>Diagnosis</h3></div>
                <div class="panel-body">
                    <h4>Pulpal Diagnosis</h4>
                    <table>
                    <tr>
                        <td width="30%">
                            <input type="checkbox" name="puldiagnorm" value="normalpuldiag">&nbsp; Normal 
                        </td>
                        <td width="35%">
                            <input type="checkbox" name="puldiagrevers" value="reverspuldiag">&nbsp; Reversible Pulpitis 
                        </td>
                        <td>
                            <input type="checkbox" name="irrever" value="irreverpuldiag">&nbsp; Irreversible Pulpitis
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> 
                            <input type="checkbox" name="symptomirrever" value="symptompuldiag" style="margin-left:2em;">&nbsp; Symptomatic <br>
                            <input type="checkbox" name="asymtomirrever" value="asymtompuldiag" style="margin-left:2em;">&nbsp; Asymtomatic
                        </td>
                    </tr> 

                    <tr height="80">
                        <td>
                            <input type="checkbox" name="pulpnecrosis" value="pulpnecrosis">&nbsp; Pulp Necrosis 
                        </td>
                        <td>
                            <input type="checkbox" name="previnitiat" value="prevnitiat">&nbsp; Previously Initiated Therapy 
                        </td>
                        <td>
                            <input type="checkbox" name="prevtreat" value="prevtreat">&nbsp; Previously treated
                            <select style="height:50px; width: 110px;">
                                <option value="improper">Improper</option>
                                <option value="incomplete">Incomplete RCT</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                    
                    <h4>Periradicular Diagnosis</h4>
                    <table>
                        <tr height="80">
                            <td width="28%">
                            <input type="checkbox" name="periraddiagnorm" value="normalperdiag">&nbsp; Normal 
                            </td>

                            <td width="38%">
                            <input type="checkbox" name="symptomperdiag" value="symptomperdiag">&nbsp; Symptomatic Apical Periodontitis    
                            </td>

                            <td>
                            <input type="checkbox" name="asymptomperdiag" value="asymptomperdiag">&nbsp; Asymptomatic Apical Periodontitis    
                            </td>
                        </tr>

                        <tr height="80">
                             <td>
                            <input type="checkbox" name="acuteperdiag" value="acuteperdiag">&nbsp; Acute Apical Abscess    
                            </td>

                             <td>
                            <input type="checkbox" name="chronicperdiag" value="chronicperdiag">&nbsp; Chronic Apical Abscess
                            </td>

                            <td>
                                <input type="checkbox" name="perdiag" value="otherperdiag">&nbsp; Other &nbsp; <input type="text" name="perdiagother" style="width: 200px; height: 50px;">
                            </td>
                        </tr>
                    </table><br><br>
                    <center><input type="submit" class="big-link-1 btn scroll-link" name="next" value="ADD">
                    <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR"></center>
                </div>    
            </div>
        </form>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="popup3" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="sect-container">
        <form name="treatment" action="" method="post">
            <div class="panel panel-info">
            <span class="close4">&times;</span>
            <div class="panel-heading"><h3>Treatment Planning</h3></div>
            <div class="panel-body">
                <table>

                <tr height="80">
                  <td width="35%">
                  <input type="checkbox" name="notreat" value="notreat">No Treatment
                  </td>

                  <td>
                  <input type="checkbox" name="pulpotomy" value="pulpotomy">Pulpotomy
                      <select style="height: 50px;" name="pulposelect">
                          <option value="partial">Partial</option>
                          <option value="full">Full</option>
                      </select>
                  </td>

                  <td>
                  <input type="checkbox" name="pulpectomy" value="pulpectomy">Pulpectomy
                  </td>
                </tr>

                <tr>
                  <td>
                  <input type="checkbox" name="nonrootcanel" value="nonrootcanel">Non-surgical Root Canel Treatment
                  </td>

                  <td>
                  <input type="checkbox" name="nonretreatment" value="nonretreatment">Non-surgical Retreatment
                  </td>

                  <td>
                  <input type="checkbox" name="apexification" value="apexification">Apexification
                  </td>
                </tr>

                <tr height="80">
                  
                  <td>
                  <input type="checkbox" name="intentional" value="intentional">Intentional RCT
                  </td>

                  <td>
                  <input type="checkbox" name="rootcaneltreat" value="rootcaneltreat">Surgical Root Canel Treatment
                  </td>

                  <td>
                  <input type="checkbox" name="perio" value="perio">Perio Consult
                  </td>
                </tr>

                <tr height="80">
                  <td colspan="3">
                      <input type="checkbox" name="othertreat" value="othertreat">&nbsp; Other &nbsp; <input type="text" name="periradother">
                  </td>
                </tr>

                <tr>
                  <td>
                     <b>Plan for final restoration: </b>
                  </td>

                  <td colspan="2">
                      <input type="text" name="planrestor" style="height: 50px;">
                  </td>
                </tr>

                <tr height="80">
                  <td>
                      <b>Pre-op treatment: </b>
                  </td>

                  <td>
                      <input type="radio" name="preop" value="cariesremove">&nbsp; Caries Removal
                  </td>
                  <td>
                      <input type="radio" name="preop" value="dam">&nbsp; Dam
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td colspan="2">
                      <input type="radio" name="preop" value="otherpreop">&nbsp; Other 
                      <input type="text" name="preopother">
                  </td>
                </tr>

                <tr height="80">
                    <td><b>Anesthesia: </b></td>
                    <td>
                        <input type="radio" name="anesthesis" value="anesrequired">&nbsp; Required
                    </td>    

                    <td>
                        <input type="radio" name="anesthesis" value="anesnotrequired">&nbsp; Not required
                    </td>  
                </tr>

                <tr height="80">
                    <td>
                        <b>X-ray file:</b>
                    </td>
                    <td colspan="2"><input type="file" name="xrayfile"></td>
                </tr>

                
                </table><br><br>
                <center><input type="submit" class="big-link-1 btn scroll-link" name="next" value="ADD">
                <input type="reset" class="big-link-1 btn scroll-link" name="reset" value="CLEAR"></center>

            </div>
            </div>
        </form>
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

<script type="text/javascript">
    // Get the modal
    var popup = document.getElementById('popup');

    // Get the button that opens the modal
    var buttonn = document.getElementById("myButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close1")[0];

    // When the user clicks on the button, open the modal 
    buttonn.onclick = function() {
        popup.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        popup.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }

</script>

<script type="text/javascript">
    // Get the modal
    var popup1 = document.getElementById('popup1');

    // Get the button that opens the modal
    var buttonn1 = document.getElementById("myButton1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

    // When the user clicks on the button, open the modal 
    buttonn1.onclick = function() {
        popup1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        popup1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == popup1) {
            popup1.style.display = "none";
        }
    }

</script>

<script type="text/javascript">
    // Get the modal
    var popup2 = document.getElementById('popup2');

    // Get the button that opens the modal
    var buttonn2 = document.getElementById("myButton2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close3")[0];

    // When the user clicks on the button, open the modal 
    buttonn2.onclick = function() {
        popup2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        popup2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == popup2) {
            popup2.style.display = "none";
        }
    }

</script>

<script type="text/javascript">

    // Get the modal
    var popup3 = document.getElementById('popup3');

    // Get the button that opens the modal
    var buttonn3 = document.getElementById("myButton3");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close4")[0];

    // When the user clicks on the button, open the modal 
    buttonn3.onclick = function() {
        popup3.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        popup3.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == popup3) {
            popup3.style.display = "none";
        }
    }


////////////////////////////////////////// Calendar //////////////////////////////////////////
    var cal  = new WinkelCalendar({
        container: 'demo'
    });

    var cal  = new WinkelCalendar({
        defaultDate : new Date(),
        bigBanner: true,
        format : "DD/MM/YYYY",
        onSelect : null
    });

    // Sets a new date
    cal.setDate('07-11-2016')

    // Sets the date to todays's date
    cal.today()

    // Opens the datepicker
    cal.today()

    // Closes the datepicker
    cal.close()
</script>
