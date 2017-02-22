<!DOCTYPE html>
<html>
<head>
	<title>Endodontic Record Report</title>
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
    <!--  <link rel="stylesheet" href="assets/css/cuppa-datepicker-styles.css">
    <script src="assets/js/moment.min.js"></script> 
    <script src="assets/js/cuppa-calendar.js"></script>  -->

  <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">

<!-- include for multi-step -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/multi-step-form.css">
  <style type="text/css">


/*css for textbox*/
    input[type="text"], 
        textarea, 
        textarea.form-control {
            margin: 0;
            /*padding: 1px 80px;*/
            vertical-align: middle;
            background: none;
            border: 1px solid #BDBDBD;
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
            border: 1px solid #BDBDBD;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .row{
          height: 60px;
        }

        label{
          float: left;
        }

    </style>
</head>
<body>
<?php
// require_once('mpdf/mpdf.php');
// ob_start();

require('connect.php');
$HN = $_POST['PatientHN'];
$stucode = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];
  
?>
	<div>
		  <p><label style="float:right; font-size:40px; margin-right:2em;"><b>Endodontic Record</b></label></p>
	</div><br><br><br>

	<div>
		  <p><label style="float:right; font-size:25px; margin-right:2em;"><b>Faculty of Dentistry, Chiang Mai University</b></label></p>
	</div><br><br>

	<div>
		  <p><label style="font-size:20px; float:left; margin-left:2em;">HN : <?php echo $HN; ?></label></p>
	</div><br><br>

  <?php
    $sql = "SELECT * FROM patients_info WHERE HN = '$HN'";
    $result = $conn->query($sql);
    $objresult = mysqli_fetch_array($result);
    $birthdate = $objresult['birthdate'];

    $from = new DateTime($birthdate);
    $to   = new DateTime('today');
    $age = $from->diff($to)->y;

  ?>
	<div>
		  <p style="font-size:20px; float:left; margin-left:2em;"><label>Patient's name: <?php echo $objresult['patientName']; ?> Age: <?php echo $age; ?> Gender: <?php echo $objresult['gender']; ?>

      </label></p>
	</div><br><br>

	<div class="sect-container">
 	<div class="panel panel-info" style="margin-right:2em; margin-left:2em;">
	<div class="panel-heading"><h3>Patient's History</h3></div>
  <div class="panel-body">
  <?php
    $searchMed = "SELECT * FROM medical_his WHERE HN = '$HN' AND Date = '$harddate'";
    $resultMed = $conn->query($searchMed);
    $objresultMed = mysqli_fetch_array($resultMed);
  ?>
     <h4>Medical History</h4>
     <div class="row">
        <div class="col-md-4"><input type="checkbox" style="float:left;" name="nonemed" value="1"
          <?php
             if($objresultMed['none'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
        <label>&nbsp;None</label></div>
          
        <div class="col-md-4"><input type="checkbox" style="float:left;" name="cardiodismed" value="1"
          <?php
             if($objresultMed['cardiovascular'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
        <label>&nbsp;Cardiovascular Diseases</label></div>
		
        <div class="col-md-4"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="1"
          <?php
             if($objresultMed['pulmonary'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
        <label>&nbsp;Pulmonary Diseases</label></div>
    </div>

    <div class="row">

		   <div class="col-md-4"><input type="checkbox" style="float:left;" name="gastrodismed" value="1" 
          <?php
             if($objresultMed['gastrointestinal'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
       <label>&nbsp;Gastrointestinal Diseases</label></div>

		   <div class="col-md-4"><input type="checkbox" style="float:left;" name="hemadismed" value="1" 
          <?php
             if($objresultMed['hematologis'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
       <label>&nbsp;Hematologic Diseases</label></div>

		   <div class="col-md-4"><input type="checkbox" style="float:left;" name="neurodismed" value="1" 
          <?php
             if($objresultMed['Neurologic'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
       <label>&nbsp;Neurologic Diseases</label></div>
		</div>

		<div class="row">
 
		  <div class="col-md-6"><input type="checkbox" style="float:left;" name="allergicmed" value="1"
          <?php
             if($objresultMed['allergic'] != ""){
              ?>
                checked="true" 
                disabled="true">

              <?php   
             }else{
              ?>
                disabled="true">
              <?php
             }
          ?>
       <label>&nbsp; Allergic to : &nbsp;&nbsp;</label>
       <input type="text" name="allermed"  style="width: 280px; height: 50px; float:left;" value="<?php echo $objresultMed['allergic']; ?>" disabled="true" >
      </div>

  	   <div class="col-md-6"><input type="checkbox" style="float:left;" name="bloodpressmed" value="1" 
          <?php
           if($objresultMed['blood_pres'] != ""){
            ?>
              checked="true" 
              disabled="true">
            <?php   
           }else{
            ?>
              disabled="true">
            <?php
           }
        ?>
       <label>&nbsp;Blood Pressure (if needed): &nbsp;&nbsp;</label> 
       <input type="text" name="blood" style="width: 180px; height: 50px; float:left;" value="<?php echo $objresultMed['blood_pres']; ?>" disabled="true" >
             
       </div>
		  </div>

		  <p><div class="row">

  	 <div class="col-md-6">
       <input type="checkbox" style="float:left;" name="othermed" value="1"
          <?php
           if($objresultMed['Other'] != ""){
            ?>
              checked="true" 
              disabled="true">
            <?php   
           }else{
            ?>
              disabled="true">
            <?php
           }
        ?>
        <label>&nbsp; Other : &nbsp; </label>
        <textarea rows="3" cols="45" style="float:left;" name="medother" disabled><?php echo $objresultMed['Other']; ?></textarea>
     </div>

	   <div class="col-md-6"><input type="checkbox" style="float:left;" name="takingmed" value="1" 
        <?php
        if($objresultMed['taking_med'] != ""){
          ?>
              checked="true" 
              disabled="true">
            <?php 
        }else{
           ?>
            disabled="true">
           <?php
        }
      ?>
     <label>&nbsp; Taking medicine : &nbsp; </label>
     <input type="text" name="medtaking" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultMed['taking_med']; ?>" disabled="true" >
     </div>
         
		  </div></p><br><br><br>

		  <div class="row">   
          <div style="height:80px;" class="col-md-6"><label>Personal Doctor : &nbsp;</label><input type="text" name="personalmed" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultMed['personal_doc']; ?>" disabled></div>

          <div style="height:80px;" class="col-md-6"><label>Tel : &nbsp;</label><input type="text" name="telmed" style="width: 350px; height: 50px; float:left;" value="<?php echo $objresultMed['Tel']; ?>" disabled></div>
      </div>

      <div class="row">
          <div style="height:150px;" class="col-md-12"><label>Remark : &nbsp; </label><textarea name="remarkmed" rows="3" cols="50" style="float:left;" disabled><?php echo $objresultMed['remark']; ?></textarea></div>
      </div>

    <?php
      $searchDen = "SELECT * FROM dental_his WHERE HN = '$HN' AND Date = '$harddate'";
      $resultDen = $conn->query($searchDen);
      $objresultDen = mysqli_fetch_array($resultDen);
    ?>

    <h4>Dental History</h4>
      <div class="row">
          <div class="col-md-12"><label>Chief Complaint : &nbsp;</label><input type="text" name="chiefdent" style="width: 700px; height: 50px; float:left;" value="<?php echo $objresultDen['chief_complaint']; ?>" disabled></div>
      </div>
    
      <div class="row"> 
        <div class="col-md-12"><label>History of Present Illness : &nbsp; </label><textarea name="presentilldent" style="float:left;" rows="5" cols="50" disabled=""><?php echo $objresultDen['his_of_presentill']; ?></textarea></div>
      </div>
  </div>
  </div>
  </div>


  <div class="sect-container">
  <div class="panel panel-info" style="margin-right:2em; margin-left:2em;">
  <div class="panel-heading"><h3>Examination</h3></div>     
  <div class="panel panel-body">

  <?php
    $searchSubj = "SELECT * FROM subject_symptom WHERE HN = '$HN' AND Date = '$harddate'";
    $resultSubj = $conn->query($searchSubj);
    $objresultSubj = mysqli_fetch_array($resultSubj);

  ?>
    <h4>S.Subjective Symptoms</h4>
      <div class="row">
        <div class="col-md-2">
        <?php
          $paininten = "SELECT * FROM pain_intensity WHERE paininten_id = '".$objresultSubj['paininten_id']."'";
          $resultpainin = $conn->query($paininten);
          $objresultpainin = mysqli_fetch_array($resultpainin);
        ?>
         <label>Pain intensity: </label><?php echo $objresultpainin['paininten_detail']; ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
        <?php
          $painchar = "SELECT * FROM pain_character WHERE painchar_id = '".$objresultSubj['painchar_id']."'";
          $resultpainchar = $conn->query($painchar);
          $objresultpainchar = mysqli_fetch_array($resultpainchar);
        ?>
          <label>Pain Character: </label><?php echo $objresultpainchar['painchar_detail']; ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <label>Onset: </label>
          <?php 
            if($objresultSubj['onset_spontOrstim'] == "0") {
              echo "Spontaneous";
            }else{
              echo "Stimulation Required(".$objresultSubj['stimulation_detail'].")";
            }

          ?>
        </div> 
      </div>

      <div class="row">
      <?php
          $duration = "SELECT * FROM duration WHERE duration_id = '".$objresultSubj['duration_id']."'";
          $resultduration = $conn->query($duration);
          $objresultduration = mysqli_fetch_array($resultduration);
      ?>
       <div class="col-md-2"><label>Duration: </label><?php echo $objresultduration['duration_detail']; ?></div> 
      </div>

    	<div class="row">
      <?php
          $location = "SELECT * FROM location WHERE location_id = '".$objresultSubj['locat_locOrdiff']."'";
          $resultlocation = $conn->query($location);
          $objresultlocation = mysqli_fetch_array($resultlocation);
      ?>
    	  <div class="col-md-2"><label>Location: </label><?php echo $objresultlocation['location_detail']; ?></div> 
    	</div>

      <div class="row">
      <div class="col-md-1"></div>
       <div class="col-md-10">
        <input type="checkbox" name="locat_radiating" style="float:left;" value="radiatinglocat"
          <?php
            if($objresultSubj['locat_radiating'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
        <label> &nbsp; Radiating to &nbsp; </label>
        <input type="text" name="locatradiat" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultSubj['locat_radiating']; ?>" disabled> 
       </div> 
        
      </div>

      <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-10">
          <input type="checkbox" name="locat_referred" style="float:left;" value="referredlocat"
            <?php
            if($objresultSubj['locat_referred'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
          <label> &nbsp; Referred to &nbsp; </label>
          <input type="text" name="refer" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultSubj['locat_referred']; ?>" disabled="true"> 
        
      </div>
      </div>

      <br><br>

      <?php
        $searchObj = "SELECT * FROM object_symptom WHERE HN='$HN' AND Date = '$harddate'";
        $resultObj = $conn->query($searchObj);
        $objresultObj = mysqli_fetch_array($resultObj);

      ?>

      <h4>&nbsp;&nbsp;O.Objective Symptoms</h4>
        <div class="row">
        <div class="col-md-3">
        <?php
          if($objresultObj['ext_facialswelling'] == "1"){
            ?>
              <input type="checkbox" name="extrafacial_check" style="float:left;" value="1" checked="true" disabled="true">
              <?php
                $facialswell = "SELECT * FROM extra_facial WHERE facialswell_id = '".$objresultObj['facialswell_id']."'";
                $resultfacial = $conn->query($facialswell);
                $objresultfacial = mysqli_fetch_array($resultfacial);
              ?>
              <label>&nbsp;&nbsp;Extraoral Facial Swelling: </label><?php echo $objresultfacial['facialswell_detail']; ?>
              </div> 
            <?php
          }else{
            ?>
              <input type="checkbox" name="extrafacial_check" style="float:left;" value="1" disabled="true">
              <label>&nbsp;&nbsp;Extraoral Facial Swelling: </label>
              </div>
              <?php
          }
        ?>
              
        </div>

        <div class="row">
          <div class="col-md-3">
        <?php
          if($objresultObj['ext_lymphnode'] == "1"){
            ?>
              <input type="checkbox" name="extralymph_check" style="float:left;" value="1" checked="true" disabled="true">
            <?php
                $lymphnode = "SELECT * FROM extra_lymphnode WHERE lymphnode_id = '".$objresultObj['lymphnode_id']."'";
                $resultlymphnode = $conn->query($lymphnode);
                $objresultlymphnode = mysqli_fetch_array($resultlymphnode);
            ?>
                <label>&nbsp;&nbsp;Extraoral Lymph Node: </label><?php echo $objresultlymphnode['lymphnode_detail']; ?>
            </div> 
            <?php
          }else{
            ?>
              <input type="checkbox" name="extralymph_check" style="float:left;" value="1" disabled="true">
                <label>&nbsp;&nbsp;Extraoral Lymph Node: </label>
            </div> 
            <?php
          }
        ?>
                
        </div>

        <div class="row">
          <div class="col-md-3">
          <?php
          if($objresultObj['ext_sinustract'] == "1"){
            ?>
              <input type="checkbox" name="extrasinus_check" style="float:left;" value="1" checked="true" disabled="true">
            <?php
                $sinus = "SELECT * FROM extra_sinus WHERE sinustract_id = '".$objresultObj['sinustract_id']."'";
                $resultsinus = $conn->query($sinus);
                $objresultsinus = mysqli_fetch_array($resultsinus);
            ?>
              <label>&nbsp;&nbsp;Extra Sinus Tract: </label><?php echo $objresultsinus['sinustract_detail']; ?>
            </div>  
            <?php
          }else{
            ?>
              <input type="checkbox" name="extrasinus_check" style="float:left;" value="1" disabled="true">
              <label>&nbsp;&nbsp;Extra Sinus Tract: </label>
            </div>  
            <?php
          } 
        ?>
        </div>
        
        <p><div class="row">
            <div class="col-md-3">
                <label>&nbsp; Other: &nbsp;</label> 
            </div>
            <div style="height:150px;" class="col-md-9">
                <textarea name="extraother" rows="3" cols="50" style="float:left;" disabled="true"><?php echo $objresultObj['ext_other']; ?></textarea>
            </div>
        </div></p>
        
        <div style="height:150px;" class="row">
            <div class="col-md-2">
              
                <label>&nbsp;&nbsp; Intraoral:  </label>
            </div>

            <div class="col-md-5">
              <?php
                if($objresultObj['intra_swellsoftOrfirm'] == "0"){
                  $swell = "Soft";
                }else{
                  $swell = "Firm";
                }
              ?>
                <label>Sweling(<?php echo $swell; ?>)</label>
                <label>&nbsp;&nbsp; area &nbsp; </label><input type="text" name="intraswell_area" style="width: 150px; height: 50px; float:left;" value="<?php echo $objresultObj['intra_swellarea']; ?>" disabled>
            </div>

            <div class="col-md-5">
 
              <input type="radio" style="float:left;" name="intra_sinus" value="1" 
                <?php
                  if($objresultObj['intra_sinustract'] == "1"){
                    ?>
                        checked="true" 
                        disabled="true">
                    <?php 
                  }else{
                     ?>
                      disabled="true">
                     <?php
                  }
                ?>
              <label>&nbsp; Sinus Tract at &nbsp; </label>
              <input type="text" name="intrasinus" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultObj['intra_sinustract']; ?>" disabled="true">
            </div>            
        </div>

        <div class="row">
            <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Tooth: </label>
            </div>

            <div class="col-md-3">
                <input type="checkbox" name="cariestooth" style="float:left;" value="1"
                  <?php
                    if($objresultObj['tooth_caries'] == "1"){
                      ?>
                        checked="true" 
                        disabled="true">
                      <?php 
                    }else{
                     ?>
                      disabled="true">
                     <?php
                    }
                  ?>
                <label>&nbsp; Caries</label>
                </div>
              
            <div class="col-md-2">
            
                <input type="checkbox" name="pulptoothex" style="float:left;" value="1"
                  <?php
                    if($objresultObj['tooth_pulpexposure'] == "1"){
                      ?>
                        checked="true" 
                        disabled="true">
                      <?php 
                    }else{
                     ?>
                      disabled="true">
                     <?php
                    }
                  ?>
                <label>&nbsp; Pulp Exposure</label>
                </div>              

            <div class="col-md-2">
                <input type="checkbox" name="pulptoothpoly" style="float:left;" value="1" 
                  <?php
                    if($objresultObj['tooth_pulppolyp'] == "1"){
                      ?>
                        checked="true" 
                        disabled="true">
                      <?php 
                    }else{
                     ?>
                      disabled="true">
                     <?php
                    }
                  ?>
                <label>&nbsp; Pulp Polyp</label>
                </div>

            <div class="col-md-3">
              <input type="checkbox" name="opentoothdrai" style="float:left;" value="1" 
                <?php
                  if($objresultObj['tooth_open'] == "1"){
                    ?>
                      checked="true" 
                      disabled="true">
                    <?php 
                  }else{
                   ?>
                    disabled="true">
                   <?php
                  }
                ?>
              <label> &nbsp; Opened for Drainage</label>
            </div>

        </div>

        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-3">
              <input type="checkbox" name="temptooth" style="float:left;" value="1" 
                <?php
                if($objresultObj['tooth_temp'] == "1"){
                  ?>
                      checked="true" 
                      disabled="true">
                    <?php 
                  }else{
                   ?>
                    disabled="true">
                   <?php
                  }
                ?>
                  <label>&nbsp; Temp. Restoration</label>
                </div>

            <div class="col-md-7">
              <input type="checkbox" name="restoothtoration" style="float:left;" value="1"
              <?php
              if($objresultObj['tooth_restoration'] != ""){
                ?>
                      checked="true" 
                      disabled="true">
                    <?php 
                  }else{
                   ?>
                    disabled="true">
                   <?php
                  }
                ?>
                  <label> &nbsp; Restoration with &nbsp; </label>
                  <input type="text" name="toothrestoration" style="width: 300px; height: 50px; float:left;" value="<?php echo $objresultObj['tooth_restoration']; ?>" disabled="true">
                </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <input type="checkbox" name="fracturetoration" style="float:left;" value="1"
                <?php
                  if($objresultObj['tooth_fracture'] != ""){
                    ?>
                      checked="true" 
                      disabled="true">
                    <?php 
                  }else{
                   ?>
                    disabled="true">
                   <?php
                  }
                ?>
                <label> &nbsp; Fracture at &nbsp; </label>
                <input type="text" name="toothfractoration" style="width: 300px; height: 50px; float:left;" value="<?php echo $objresultObj['tooth_fracture']; ?>" disabled="true">
                </div>            

            <div class="col-md-5">
                <input type="checkbox" name="crowntooth" style="float:left;" value="1" 
                <?php
                  if($objresultObj['tooth_crown'] != ""){
                    ?>
                      checked="true" 
                      disabled="true">
                    <?php 
                  }else{
                   ?>
                    disabled="true">
                   <?php
                  }
                ?>
                <label> &nbsp; Crown Discoloration to &nbsp; </label>
                <input type="text" name="toothcrown" style="width: 200px; height: 50px; float:left;" value="<?php echo $objresultObj['tooth_crown']; ?>" disabled="true">
                </div>

        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <label> &nbsp; Other: &nbsp; </label><textarea type="text" name="toothother" rows="5" cols="50" style="float:left;" disabled><?php echo $objresultObj['tooth_other']; ?></textarea>
              </div>              
        </div><br><br>

      <h4>Examination</h4>
      <?php
        $searchExam = "SELECT * FROM examination WHERE HN = '$HN' AND Date = '$harddate'";
        $resultExam = $conn->query($searchExam);
        $objresultExam = mysqli_fetch_array($resultExam);
      ?>
        <div class="row" style="height: 80px;">
          <div class="col-md-2">
              <label>Tooth : &nbsp;</label>
              <input type="text" name="numtooth" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_tooth']; ?>" disabled>
          </div>

          <div class="col-md-2">
              <label>EPT : &nbsp;</label>
              <input type="text" name="epttooth" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_EPT']; ?>" disabled>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="checkcold" value="1" style="float:left;" 
                <?php 
                  if($objresultExam['exam_cold'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } ?>

              <label>&nbsp; Cold </label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="checkheat" value="1" style="float:left;"
                <?php 
                  if($objresultExam['exam_heat'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } ?>
              
              <label>&nbsp; Heat </label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="checkperc" value="1" style="float:left;"
                <?php 
                  if($objresultExam['exam_perc'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } ?>

              <label>&nbsp; Perc<sup>n</sup> </label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="checkpalp" value="1" style="float:left;"
                <?php 
                    if($objresultExam['exam_palp'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
              <label>&nbsp; Palp<sup>n</sup> </label>
          </div>
        </div>

        <div class="row" style="height: 80px;">
          <div class="col-md-2">
            <label>Mobility : &nbsp;</label>
            <?php 
              if($objresultExam['exam_mobility'] == "1"){
                  echo '1<sup>0</sup>'; 
              }
              else if($objresultExam['exam_mobility'] == "2"){
                  echo '2<sup>0</sup>'; 
              }
              else if($objresultExam['exam_mobility'] == "3"){
                  echo '3<sup>0</sup>';
              }
            ?>
          </div>

          <div class="col-md-3">
            <label>Perio Probe of MB : &nbsp;</label>
            <input type="text" name="probe_mb" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioMB']; ?>" disabled>
          </div>

          <div class="col-md-3">
            <label>Perio Probe of B : &nbsp;</label>
            <input type="text" name="probe_b" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioB']; ?>" disabled>
          </div>

          <div class="col-md-4">
            <label>Perio Probe of DB : &nbsp;</label>
            <input type="text" name="probe_db" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioDB']; ?>" disabled>
          </div>
        </div>

        <div class="row" style="height: 80px;">
          <div class="col-md-3">
            <label>Perio Probe of ML : &nbsp;</label>
            <input type="text" name="probe_ml" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioML']; ?>" disabled>
          </div>

          <div class="col-md-3">
            <label>Perio Probe of L : &nbsp;</label>
            <input type="text" name="probe_l" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioL']; ?>" disabled>
          </div>

          <div class="col-md-3">
            <label>Perio Probe of DL : &nbsp;</label>
            <input type="text" name="probe_dl" style="width: 80px; height: 35px; float:left;" value="<?php echo $objresultExam['exam_perioDL']; ?>" disabled>
          </div>

          <div class="col-md-3">

            <input type="checkbox" name="spectest" value="1" style="float:left;"
              <?php 
                    if($objresultExam['spectest_id'] != ""){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>

            <?php
              $specialtest = "SELECT * FROM special_test WHERE spectest_id = '".$objresultExam['spectest_id']."'";
              $resultspecialtest = $conn->query($specialtest);
              $objresultspecialtest = mysqli_fetch_array($resultspecialtest);

            ?>
            <label>Special Test: &nbsp;</label><?php echo $objresultspecialtest['spectest_detail']; ?>

          </div>
        </div>

      <br><br>

      <?php
        $searchRadio = "SELECT * FROM radiograph_crown WHERE HN = '$HN' AND Date = '$harddate'";
        $resultRadio = $conn->query($searchRadio);
        $objresultRadio = mysqli_fetch_array($resultRadio);
          
      ?>
      <h4>&nbsp;&nbsp;Radiographic findings</h4>
        <div class="row">
          <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Crown: </label>
          </div>
          <div class="col-md-2">
                <input type="checkbox" name="normcrown" style="float:left;" value="1"
                  <?php 
                    if($objresultRadio['crown_normal'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
                <label>&nbsp; Normal </label>
          </div>
          <div class="col-md-2">
                <input type="checkbox" name="restcrown" style="float:left;" value="1"
                  <?php 
                    if($objresultRadio['crown_restoration'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
                <label>&nbsp; Restoration </label>
          </div>
          <div class="col-md-2">
                <input type="checkbox" name="fractcrown" style="float:left;" value="1"
                  <?php 
                    if($objresultRadio['crown_fracture'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
                <label>&nbsp; Fracture </label>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
                <input type="checkbox" name="cariescrown" style="float:left;" value="1"
                  <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
               
                <label>&nbsp; Caries &nbsp;&nbsp; area &nbsp; </label>
                <input type="text" name="crowarea" style="width: 100px; height: 35px; float:left;"
                  <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         value="<?php echo $objresultRadio['crown_cariesarea']; ?>"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
                <label>&nbsp; &nbsp; depth &nbsp; </label>
                <input type="text" name="crowdepth" style="width: 100px; height: 35px; float:left;"
                  <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         value="<?php echo $objresultRadio['crown_cariesdepth']; ?>"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div style="height:200px;" class="col-md-10">
              <label>&nbsp; Other : &nbsp; </label>
              <textarea name="crownother" rows="5" cols="50" style="float:left;" disabled><?php echo $objresultRadio['crown_other']; ?></textarea>
          </div>
        </div>


      <?php
        $searchPulpcham = "SELECT * FROM radiograph_pulpcham WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPulpcham = $conn->query($searchPulpcham);
        $objresultPulpcham = mysqli_fetch_array($resultPulpcham);
          
      ?>
        <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Pulp Chambar: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" name="normcham" style="float:left;" value="1"
                <?php 
                      if($objresultPulpcham['pulpcham_normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="stonecham" style="float:left;" value="1"
                <?php 
                      if($objresultPulpcham['pulpcham_pulpstone'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Pulp Stone</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="rescham" style="float:left;" value="1"
                <?php 
                      if($objresultPulpcham['pulpcham_resorption'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Resorption </label>
          </div>

          <div style="height:50px;" class="col-md-4">
          <input type="checkbox" name="calcificatecham" style="float:left;" value="1"
                <?php 
                      if($objresultPulpcham['pulpcham_calPartOrComp'] != ""){
                        ?>
                           checked = "true"
                           disabled = "true" >       
                           <label>&nbsp; Calcification : &nbsp;</label>               
                          <?php
                        if($objresultPulpcham['pulpcham_calPartOrComp'] == "0"){
                          echo "Partial";
                        }else{
                          echo "Complete";
                        }
                          
                      }else{
                          ?>
                           disabled = "true" >
                           <label>&nbsp; Calcification &nbsp;</label> 
                          <?php 
                      } 
                ?>
                
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div style="height:200px;" class="col-md-10">
              <label>&nbsp; Other &nbsp;</label> 
              <textarea name="pulpchamother" rows="5" cols="50" style="float:left;" disabled><?php echo $objresultPulpcham['pulpcham_other']; ?></textarea>
          </div>
        </div>


      <?php
        $searchRoot = "SELECT * FROM radiograph_root WHERE HN = '$HN' AND Date = '$harddate'";
        $resultRoot = $conn->query($searchRoot);
        $objresultRoot = mysqli_fetch_array($resultRoot);
          
      ?>
       <div class="row">
          <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Root: </label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="normroot" style="float:left;" value="1" 
                <?php 
                      if($objresultRoot['root_normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
          </div>
          
          <div class="col-md-2">
              <input type="checkbox" name="cariesroot" style="float:left;" value="1"
                <?php 
                      if($objresultRoot['root_caries'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Caries</label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="curvatureroot" style="float:left;" value="1"
                <?php 
                      if($objresultRoot['root_curvature'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Curvature</label>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="extresroot" style="float:left;" value="1"
                <?php 
                      if($objresultRoot['root_extresorption'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Ext. Resorption</label>
          </div>

          <div style="height:50px;" class="col-md-2">
              <input type="checkbox" name="fractroot" style="float:left;" value="1"
                <?php 
                      if($objresultRoot['root_fracture'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Fracture</label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div style="height:200px;" class="col-md-10">
              <label>&nbsp; Other &nbsp; </label>
              <textarea rows="5" cols="50" name="root_other" style="float:left;" disabled><?php echo $objresultRoot['root_other']; ?></textarea>
          </div>
      </div>

      <?php
        $searchPulpcan = "SELECT * FROM radiograph_pulpcanal WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPulpcan = $conn->query($searchPulpcan);
        $objresultPulpcan = mysqli_fetch_array($resultPulpcan);
          
      ?>
      <div class="row">
          <div class="col-md-2"> 
            <label>Pulp Canal: </label>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="normcanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal</label> 
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="resorpcanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_resorption'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Resorption</label>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="perforcanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_perforation'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Perforation</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="prevcanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_previousRCT'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Previous RCT</label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="brokecanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_broken'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Broken Instrument</label>
          </div>
          <div style="height:80px;" class="col-md-6">
              <input type="checkbox" style="float:left;" name="calcificatecanel" value="1"
                <?php 
                      if($objresultPulpcan['pulpcan_calPartOrComp'] != ""){
                          ?>
                           checked = "true"
                           disabled = "true" >    
                           <label>&nbsp; Calcification: &nbsp;</label>                  
                          <?php
                          if($objresultPulpcan['pulpcan_calPartOrComp'] == "0"){
                            echo "Partial";
                          }else{
                            echo "Complete";
                          }
                      }else{
                          ?>
                           disabled = "true" >
                           <label>&nbsp; Calcification &nbsp;</label>
                          <?php 
                      } 
                ?>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div style="height:150px;" class="col-md-10">
              <label>&nbsp; Other &nbsp; </label>
              <textarea type="text" rows="3" cols="50" name="pulpcanother" style="float:left;" disabled><?php echo $objresultPulpcan['pulpcan_other']; ?></textarea>
          </div>
      </div>

      <?php
        $searchPerirad = "SELECT * FROM radiograph_perirad WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPerirad = $conn->query($searchPerirad);
        $objresultPerirad = mysqli_fetch_array($resultPerirad);
          
      ?>
      <div class="row">
          <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Periradicular: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="normperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="widenperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_wideningPDL'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Widening PDL </label>
          </div>
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="lossperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_lossoflam'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Loss of Lamina Dura </label>
          </div>

          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="resorpperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_resorption'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Resorption </label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="apexperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_openapex'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Open Apex </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="osteoperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_osteos'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; OsteosIcerosis</label>
          </div>
          <div style="height:40px;" class="col-md-6">
              <input type="checkbox" style="float:left;" name="hyperperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_hyper'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Hyperplasia of cementurn </label>
          </div>
      </div>          

      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-5">
              <input type="checkbox" style="float:left;" name="perialessperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_periapical'] != ""){
                          ?>
                           checked = "true"
                           disabled = "true" > 
                           <label>&nbsp; Periapical Lesion &nbsp;</label>
                           <input type="text" name="periradperialess" style="width: 200px; height: 50px; float:left;" value="<?php echo $objresultPerirad['perirad_periapical']; ?>" disabled> 

                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                           <label>&nbsp; Periapical Lesion &nbsp;</label>
                           <input type="text" name="periradperialess" style="width: 200px; height: 50px; float:left;" disabled> 
                          <?php 
                      } 
                ?>
              
          </div>

          <div style="height:60px;" class="col-md-5">
              <input type="checkbox" style="float:left;" name="laterlessperirad" value="1"
                <?php 
                      if($objresultPerirad['perirad_lateral'] != ""){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                           <label>&nbsp; Lateral Lesion &nbsp;</label>
                           <input type="text" name="periradlaterless" style="width: 200px; height:50px; float:left;" value="<?php echo $objresultPerirad['perirad_lateral']; ?>" disabled>
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                           <label>&nbsp; Lateral Lesion &nbsp;</label>
                           <input type="text" name="periradlaterless" style="width: 200px; height:50px; float:left;" disabled>
                          <?php 
                      } 
                ?>
               
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div style="height:200px;" class="col-md-10">
              <label>&nbsp; Other &nbsp; </label>
              <textarea rows="5" cols="50" name="perother" style="float:left;" disabled><?php echo $objresultPerirad['perirad_other']; ?></textarea>
          </div>
      </div>


      <?php
        $searchAlveolar = "SELECT * FROM radiograph_alveolar WHERE HN = '$HN' AND Date = '$harddate'";
        $resultAlveolar = $conn->query($searchAlveolar);
        $objresultAlveolar = mysqli_fetch_array($resultAlveolar);
          
      ?>
      <div class="row">
        <div class="col-md-2">
          <label>&nbsp;&nbsp;&nbsp;Alveolar Bone: </label>
        </div>
        <div class="col-md-2">
              <input type="radio" style="float:left;" name="alveolar" value="normalveolar"
                <?php 
                      if($objresultAlveolar['bone_normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
        </div>

          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="generalalveolar" 
                <?php
                  if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "0"){
                    ?>
                      checked="true"
                      disabled = "true" >
                    <?php
                  }else{
                    ?>
                      disabled = "true" >
                    <?php
                  }
                ?>
              <label>&nbsp; Generalized Bone loss </label>
          </div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="localalveolar"
                <?php
                  if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "1"){
                    ?>
                      checked="true"
                      disabled = "true" >
                    <?php
                  }else{
                    ?>
                      disabled = "true" >
                    <?php
                  }
                ?>
              <label>&nbsp; Localized Bone loss</label>
          </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-5">
              <label>&nbsp; Other &nbsp; </label>
              <textarea rows="5" cols="40" style="float:left;" name="alveolarother" disabled><?php echo $objresultAlveolar['bone_other']; ?></textarea>
        </div>

        <div class="col-md-5">
              <label>Remarks: </label>
              <textarea rows="5" cols="40" style="float:left;" name="otherremark" disabled><?php echo $objresultAlveolar['remark']; ?></textarea>
        </div>
      </div>
</div>
</div>
</div>  

<?php
  $searchPulpaldiag = "SELECT * FROM pulpal_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
  $resultPulpaldiag = $conn->query($searchPulpaldiag);
  $objresultPulpaldiag = mysqli_fetch_array($resultPulpaldiag);
?>
<div class="sect-container">
<div class="panel panel-info" style="margin-right:2em; margin-left:2em;">
<div class="panel-heading"><h3>Diagnosis</h3></div>
  <div class="panel-body">
      <h4>Pulpal Diagnosis</h4>
      <div class="row" style="height:30px;">
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="puldiagnorm" value="1" 
                <?php 
                      if($objresultPulpaldiag['normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
          </div>

          <div class="col-md-3">
              <input type="radio" style="float:left;" name="reverOrirrever" value="0"
                <?php 
                      if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "0"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Reversible Pulpitis </label>
          </div>

          <div class="col-md-6">
              <input type="radio" style="float:left;" name="reverOrirrever" value="1"
                <?php 
                      if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Irreversible Pulpitis </label>
          </div>
      </div>

      <div class="row" style="height:20px;">
          <div class="col-md-7"></div>
          <div class="col-md-5">
              <input type="radio" style="float:left;" name="sympOrasymp" value="1" 
                <?php 
                      if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Symptomatic </label><br>
          </div>

      </div> 

      <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5">
              <input type="radio" style="float:left;" name="sympOrasymp" value="0"
                 <?php 
                      if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "0"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Asymtomatic </label>
          </div>
      </div> 

      <div class="row">
          <div class="col-md-3"> 
              <input type="checkbox" style="float:left;" name="pulpnecrosis" value="1"
                <?php 
                      if($objresultPulpaldiag['pulp_necrosis'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Pulp Necrosis </label>
          </div>
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="previnitiat" value="1"
                <?php 
                      if($objresultPulpaldiag['prev_initiat'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Previously Initiated Therapy </label>
          </div>
          <div class="col-md-6">
              <input type="checkbox" style="float:left;" name="prevtreat" value="1"
                <?php 
                      if($objresultPulpaldiag['prev_treated'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >
                           <label>&nbsp; Previously treated: &nbsp;&nbsp;</label>                      
                          <?php
                          if($objresultPulpaldiag['prev_treated_improper'] == "1"){
                            echo "Improper";
                          }
                          else if($objresultPulpaldiag['prev_treated_incomplete'] == "1"){
                            echo "Incomplete RCT";
                          }else{
                            echo "";
                          }
                      }else{
                          ?>
                           disabled = "true" >
                           <label>&nbsp; Previously treated &nbsp;&nbsp;</label>
                          <?php 
                      } 
                ?>
          </div>
      </div>
     
      <?php
        $searchPeriraddiag = "SELECT * FROM periradicular_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPeriraddiag = $conn->query($searchPeriraddiag);
        $objresultPeriraddiag = mysqli_fetch_array($resultPeriraddiag);
      ?>
      <h4>Periradicular Diagnosis</h4>
      <div class="row">
        <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="periraddiagnorm" value="1"
                <?php 
                      if($objresultPeriraddiag['Normal'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Normal </label>
        </div>

        <div class="col-md-4">
              <input type="radio" style="float:left;" name="per_sympOrasymp" value="0"
                <?php 
                      if($objresultPeriraddiag['sympOrasympt_apical'] == "0"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Symptomatic Apical Periodontitis </label>
        </div>

        <div class="col-md-5">
              <input type="radio" style="float:left;" name="per_sympOrasymp" value="1"
                <?php 
                      if($objresultPeriraddiag['sympOrasympt_apical'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Asymptomatic Apical Periodontitis</label>    
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
              <input type="radio" style="float:left;" name="acuteOrchronic" value="0"
                <?php 
                      if($objresultPeriraddiag['acuteOrchronic_apical'] == "0"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Acute Apical Abscess </label>
        </div>

        <div class="col-md-4">
              <input type="radio" style="float:left;" name="acuteOrchronic" value="1"
                <?php 
                      if($objresultPeriraddiag['acuteOrchronic_apical'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >                      
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } 
                ?>
              <label>&nbsp; Chronic Apical Abscess</label>
        </div>

        <div class="col-md-5">
                  <label>&nbsp; Other : &nbsp;</label> 
                  <textarea name="perdiagother" rows="3" cols="35" style="float:left;" disabled><?php $objresultPeriraddiag['other']; ?></textarea>
        </div>
      </div>
</div> 
</div>
</div>

<?php
  $searchTreatment = "SELECT * FROM treatment_plan WHERE HN = '$HN' AND Date = '$harddate'";
  $resultTreatment = $conn->query($searchTreatment);
  $objresultTreatment = mysqli_fetch_array($resultTreatment);
?>
<div class="sect-container">
<div class="panel panel-info" style="margin-right:2em; margin-left:2em;">
<div class="panel-heading"><h3>Treatment Planning</h3></div>
<div class="panel-body">
  <div class="row">
    <div class="col-md-2">
      <input type="checkbox" style="float:left;" name="notreat" value="1"
        <?php 
            if($objresultTreatment['no_treatment'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
      <label>&nbsp; No Treatment</label>
    </div>

    <div class="col-md-3">
      <input type="checkbox" style="float:left;" name="pulpotomy" value="1"
        <?php 
            if($objresultTreatment['Pulpotomy'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >     
                 <label>&nbsp;Pulpotomy: &nbsp;</label>
                <?php
                if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "0"){
                  echo "Partial";
                }
                else if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "1"){
                  echo "Full";
                }else{
                  echo "";
                }
            }else{
                ?>
                 disabled = "true" >
                 <label>&nbsp;Pulpotomy &nbsp;</label>
                <?php 
            } 
        ?>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="pulpectomy" value="1"
          <?php 
            if($objresultTreatment['pulpectomy'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Pulpectomy</label>
    </div>

    <div class="col-md-5">
        <input type="checkbox" style="float:left;" name="nonrootcanel" value="1"
          <?php 
            if($objresultTreatment['non_sur_root'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Non-surgical Root Canel Treatment</label>
        
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="nonretreatment" value="1"
        <?php 
            if($objresultTreatment['non_sur_retreat'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Non-surgical Retreatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="apexification" value="1"
          <?php 
            if($objresultTreatment['apexification'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Apexification</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="intentional" value="1"
          <?php 
            if($objresultTreatment['intentionalRCT'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Intentional RCT</label>
    </div>

    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="rootcaneltreat" value="1"
          <?php 
            if($objresultTreatment['sur_root'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Surgical Root Canel Treatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="perio" value="1"
          <?php 
            if($objresultTreatment['perio_consult'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp;Perio Consult</label>
    </div>
  </div>

  <div class="row">
    <div style="height:150px;" class="col-md-12">
            <label>&nbsp; Other : &nbsp;</label>
            <textarea name="periradother" rows="3" cols="50" style="float:left;" disabled><?php echo $objresultTreatment['treat_other']; ?></textarea>
    </div>
  </div>

  <div class="row">
    <div style="height:150px;" class="col-md-12">
           <label>Plan for final restoration: </label>
           <textarea name="planrestor" rows="3" cols="50" style="float:left;" disabled><?php echo $objresultTreatment['plan_for_final']; ?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
        <label>Pre-op treatment: </label>
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="cariesremove"
          <?php 
            if($objresultTreatment['pre_op_treat_caries'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp; Caries Removal</label>  
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="dam"
          <?php 
            if($objresultTreatment['pre_op_treat_dam'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp; Dam </label>
    </div>

    <div class="col-md-6">
        <label>&nbsp; Other :  &nbsp;</label>
        <textarea name="preopother" rows="3" cols="40" style="float:left; " disabled><?php echo $objresultTreatment['pre_op_treat_other']; ?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
        <label>Anesthesia: </label>
    </div>
    
    <div class="col-md-2">
        <input type="radio" style="float:left;" name="anesthesis" value="anesrequired"
          <?php 
            if($objresultTreatment['Anest_reqOrnotreq'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp; Required</label>
    </div>    

    <div class="col-md-8">
         <input type="radio" style="float:left;" name="anesthesis" value="anesnotrequired"
          <?php 
            if($objresultTreatment['Anest_reqOrnotreq'] == "0"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        <label>&nbsp; Not required </label>
    </div>  
  </div>
</div> 
</div>
</div>


<!-- Javascript -->
<script src="assets/js/multi-step-form.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

</body>
</html>
<!-- <?php
$html = ob_get_contents();        
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/MyPDF.pdf"); 
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a> -->