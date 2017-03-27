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

    <!-- check enable or disable textbox -->
    <script type="text/javascript">
  function enable_text(status)
{
status=status;  // true or false
  document.endodontic.cardiodismed.disabled = status;
  document.endodontic.pulmonarydismed.disabled = status;
  document.endodontic.gastrodismed.disabled = status;
  document.endodontic.hemadismed.disabled = status;
  document.endodontic.neurodismed.disabled = status;
  document.endodontic.neurodismed.disabled = status;
  document.endodontic.allergicmed.disabled = status;
  document.endodontic.allermed.disabled =status;

}

function enable_pulpaldiag(status){
  status = status;
  document.endodontic.puldiagrevers.disabled = status;
  document.endodontic.pulpnecrosis.disabled =status;
  document.endodontic.previnitiat.disabled =status;
  document.endodontic.prevtreat.disabled = status;
  document.endodontic.prevselect.disabled = status;

}

function enable_periraddiag(status){
  document.endodontic.symptomperdiag.disabled = status;
  document.endodontic.asymptomperdiag.disabled = status;
  document.endodontic.acuteperdiag.disabled = status;
  document.endodontic.chronicperdiag.disabled = status;

}

function enable_treatment(status){
  status = status;
  document.endodontic.pulpotomy.disabled = status;
  document.endodontic.pulposelect.disabled = status;
  document.endodontic.pulpectomy.disabled = status;
  document.endodontic.nonrootcanel.disabled = status;
  document.endodontic.nonretreatment.disabled = status;
  document.endodontic.apexification.disabled = status;
  document.endodontic.intentional.disabled = status;
  document.endodontic.rootcaneltreat.disabled = status;
  document.endodontic.perio.disabled = status;

}

function enable_radiocrown(status){
  document.endodontic.restcrown.disabled = status;
  document.endodontic.fractcrown.disabled = status;
  document.endodontic.cariescrown.disabled = status;
}

function enable_radiopulpcham(status){
  document.endodontic.stonecham.disabled = status;
  document.endodontic.rescham.disabled = status;
  document.endodontic.calcificatecham.disabled = status;
}

function enable_root(status){
  document.endodontic.cariesroot.disabled = status;
  document.endodontic.curvatureroot.disabled = status;
  document.endodontic.extresroot.disabled = status;
  document.endodontic.fractroot.disabled = status;
}

function enable_pulpcanal(status){
  document.endodontic.resorpcanel.disabled = status;
  document.endodontic.perforcanel.disabled = status;
  document.endodontic.prevcanel.disabled = status;
  document.endodontic.brokecanel.disabled = status;
  document.endodontic.calcificatecanel.disabled = status;
}

function enable_periradicular(status){
  document.endodontic.widenperirad.disabled = status;
  document.endodontic.lossperirad.disabled = status;
  document.endodontic.resorpperirad.disabled = status;
  document.endodontic.apexperirad.disabled = status;
  document.endodontic.osteoperirad.disabled = status;
  document.endodontic.hyperperirad.disabled = status;
  document.endodontic.perialessperirad.disabled = status;
  document.endodontic.laterlessperirad.disabled = status;
}

function insertendorec() {
    document.endodontic.action = 'insertendorec.php';
}

</script>
</head>

<body onload=enable_text(false);>
<?php
    require('connect.php');
    $HN = $_POST['PatientHN'];
    $stucode = $_POST['Stu_code'];
    $dent = $_POST['Dent_id'];
    $harddate = $_POST['hard_date'];

    require('class_stu.php');
    require('class_dent.php');
    require('class_endodontic.php');
    $stu = new Student;
    $instruc = new Dentist;
    $endo = new Endodontic;
?>


<!-- multistep form -->
<form id="msform" name="endodontic_update" method="post" enctype="multipart/form-data" action="update_endo.php">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Endodontic Record</li>
     <li>Patient's history</li>
    <li>Examination</li>
    <li>Diagnosis</li>
    <li>Treatment Planning</li> 
  </ul>

<fieldset>
  <div class="sect-container">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>Endodontic Record</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12"><label>HN: &nbsp;&nbsp;</label>
                      <select name="HNpatient" style="width: 100px; height:50px; float:left;" disabled="true">
                         <option value="<?php echo $HN ?>"><?php echo $HN ?></option>
                      </select>
                    </div>
                </div> 

                <?php
                    $searchTooth = "SELECT * FROM examination WHERE HN = '$HN' AND Date = '$harddate'";
                    $resultTooth = $conn->query($searchTooth);
                    $objresultTooth = mysqli_fetch_array($resultTooth);
                ?>

                <div class="row">
                    <div class="col-md-12"><label>Tooth: &nbsp;&nbsp;</label>
                    <input type="text" style="width: 100px; height: 50px; float:left;" name="tooth" maxlength="2" value="<?php echo $objresultTooth['exam_tooth']; ?>">
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-12"><label>Dental student: &nbsp;&nbsp;</label>
                      <select name="codestudent" style="width: 300px; height:50px; float:left;" disabled="true">
                          <?php $stu->searchstuedit($conn,$HN,$harddate); ?>
                      </select>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-12"><label> Instructor: &nbsp;&nbsp;</label>
                      <select name="dentname" style="width: 300px; height:50px; float:left;" disabled="true">
                          <?php $instruc->searchdentedit($conn,$HN,$harddate); ?>
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <label>Date: &nbsp;&nbsp;</label>
                      <input type="date" name="datedemo" style="width:200px; float:left;" value="<?php echo substr($harddate, 0,10); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <label>Time:&nbsp;</label>
                      <input type="time" name="endo_time" style="float:left;" value="<?php echo substr($harddate, 11) ?>">
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <center><input type="file" name="f1"></center>
                  </div>
                </div>
            </div>  
    </div>
   </div>
  <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>


<fieldset>
  <div class="sect-container">
  <div class="panel panel-info">
  <div class="panel-heading"><h3>Patient's History</h3></div>
    <div class="panel-body">
       <h4>Medical History</h4>
       <?php
            $searchMed = "SELECT * FROM medical_his WHERE HN = '$HN' AND Date = '$harddate'";
            $resultMed = $conn->query($searchMed);
            $objresultMed = mysqli_fetch_array($resultMed);
       ?>
    <div class="row">
        <div class="col-md-2"><input type="checkbox" style="float:left;" name="nonemed" value="1"
          <?php
             if($objresultMed['none'] == "1"){
              ?>
                checked="true" onclick="enable_text(this.checked)">
              <?php   
             }else{
                echo ">";
             }
             
          ?>
        <label>&nbsp;None</label>
        </div>
          
        <div class="col-md-3"><input type="checkbox" style="float:left;" name="cardiodismed" value="1"
          <?php
             if($objresultMed['cardiovascular'] == "1"){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
              
          ?>
        <label>&nbsp;Cardiovascular Diseases</label>
        </div>
        
        <div class="col-md-3"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="1"
          <?php
             if($objresultMed['pulmonary'] == "1"){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
              
          ?>
        <label>&nbsp;Pulmonary Diseases</label>
        </div>

        <div class="col-md-3"><input type="checkbox" style="float:left;" name="gastrodismed" value="1" 
          <?php
             if($objresultMed['gastrointestinal'] == "1"){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
             
          ?>
       <label>&nbsp;Gastrointestinal Diseases</label>
       </div>
      </div>

      <div class="row">
        <div class="col-md-3"><input type="checkbox" style="float:left;" name="hemadismed" value="1" 
          <?php
             if($objresultMed['hematologis'] == "1"){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
              
          ?>
       <label>&nbsp;Hematologic Diseases</label>
       </div>

        <div class="col-md-3"><input type="checkbox" style="float:left;" name="neurodismed" value="1" 
          <?php
             if($objresultMed['Neurologic'] == "1"){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
              
          ?>
            <label>&nbsp;Neurologic Diseases</label>
        </div>

        <div class="col-md-3">
            <input type="checkbox" style="float:left;" name="allergicmed" value="1"
          <?php
             if($objresultMed['allergic'] != ""){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
             
          ?>
            <label>&nbsp; Allergic to : &nbsp;&nbsp; </label> 
            <input type="text" name="allermed" style="width: 100px; height: 30px; float:left;" value="<?php echo $objresultMed['allergic']; ?>">
        </div>
        </div>

        <div class="row">
        <div class="col-md-4">
            <input type="checkbox" style="float:left;" name="bloodpressmed" value="1" 
            <?php
               if($objresultMed['blood_pres1'] != "" && $objresultMed['blood_pres2'] != ""){
                ?>
                  checked="true" >
                <?php   
               }else{
                   echo ">";
               }
            ?>
           <label>&nbsp;Blood Pressure: &nbsp;&nbsp;</label> 
           <!-- <input type="text" name="blood1" style="width: 60px; height: 30px; float:left;" value="<?php echo  $objresultMed['blood_pres1']; ?>"> --> 
            
            <select name="blood1" style="width:60px; height:30px; float:left;">';
              <?php  
                if($objresultMed['blood_pres1'] != ""){
                     echo '<option>'.$objresultMed['blood_pres1'].'</option>';
                  }
                  for($i=0; $i<=250; $i++){
                      echo '<option>'.$i.'</option>';
                  } ?>
            </select>
          
          <label style="font-size: 25px;">/</label>
            <select name="blood2" style="width:60px; height:30px; float:left;">';
            <?php
              if($objresultMed['blood_pres2'] != ""){
                     echo '<option>'.$objresultMed['blood_pres2'].'</option>';
                  }
                for($i=0; $i<=250; $i++){
                  echo '<option>'.$i.'</option>';
                }
            ?>
            </select>
        </div>

       <div class="col-md-4">
         <input type="checkbox" style="float:left;" name="othermed" value="1"
            <?php
             if($objresultMed['Other'] != ""){
              ?>
                checked="true" >
              <?php   
             }else{
                echo ">";
             }
          ?>
          <label>&nbsp; Other : &nbsp; </label>
          <textarea rows="2" cols="20" style="float:left;" name="medother" ><?php echo $objresultMed['Other']; ?></textarea>
       </div>

     <div class="col-md-4"><input type="checkbox" style="float:left;" name="takingmed" value="1" 
        <?php
        if($objresultMed['taking_med'] != ""){
          ?>
              checked="true" >
            <?php 
        }else{
            echo ">";
        }
      ?>
     <label>&nbsp; Taking medicine : &nbsp; </label>
     <input type="text" name="medtaking" style="width: 150px; height: 50px; float:left;" value="<?php echo $objresultMed['taking_med']; ?>">
     </div> 
    </div>

    <div class="row">   
      <div class="col-md-6"><label>Personal Doctor : &nbsp;</label>
        <input type="text" name="personalmed" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultMed['personal_doc']; ?>">
      </div>

      <div class="col-md-6"><label>Tel : &nbsp;</label>
        <input type="text" name="telmed" style="width: 350px; height: 50px; float:left;" value="<?php echo $objresultMed['Tel']; ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"><label>Remark : &nbsp; </label>
        <textarea name="remarkmed" rows="4" cols="50" style="float:left;"><?php echo $objresultMed['remark']; ?></textarea>
      </div>
    </div>

    <?php
      $searchDen = "SELECT * FROM dental_his WHERE HN = '$HN' AND Date = '$harddate'";
      $resultDen = $conn->query($searchDen);
      $objresultDen = mysqli_fetch_array($resultDen);
    ?>

    <h4>Dental History</h4>
      <div class="row">
          <div class="col-md-12"><label>Chief Complaint : &nbsp;</label>
            <input type="text" name="chiefdent" style="width: 450px; height: 50px; float:left;" value="<?php echo $objresultDen['chief_complaint']; ?>">
          </div>
      </div>
    
      <div class="row"> 
        <div class="col-md-12"><label>History of Present Illness : &nbsp; </label>
          <textarea name="presentilldent" style="float:left;" rows="4" cols="50"><?php echo $objresultDen['his_of_presentill']; ?></textarea>
        </div>
      </div>

    </div>
    </div>
    </div>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
  <div class="sect-container">
  <div class="panel panel-info">
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
         <label>Pain intensity: </label> 
        </div>

        <div class="col-md-10">
        <select name="paininten" style="float:left; padding: .5em;">
           <?php $endo->selpaininten_edit($conn,$objresultSubj['paininten_id']); ?>
         </select>
        </div>
    </div>

    <div class="row">
      <div class="col-md-2">
        <label>Pain Character: </label>
      </div>

      <div class="col-md-10">
         <select name="paincharacter" style="float:left; padding: .5em;">
           <?php $endo->selpaincharact_edit($conn,$objresultSubj['painchar_id']); ?>
         </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1">
            <label>Onset: </label>
        </div> 

        
        <div class="col-md-2">
          <input type="checkbox" name="onset_spont" style="float:left;" value="1" 
            <?php
                if($objresultSubj['onset_spontaneous'] == "1"){
                    ?>
                    checked = "true" >
                    <?php
                }else{
                    echo ">";
                }
            ?>
          
          <label>&nbsp; Spontaneous</label>
        </div>

        <div class="col-md-5">
          <input type="checkbox" name="onset_stimu" style="float:left;" value="1"
            <?php
                if($objresultSubj['stimulation_id'] != ""){
                    ?>
                    checked = "true" >
                    <?php
                }else{
                    echo ">";
                }
            ?>
          <label> &nbsp; Stimulation Required &nbsp;</label>

          <select name="stimulation" style="float:left; padding: .5em;">
          <?php
              $endo->selstimulation_edit($conn,$objresultSubj['stimulation_id']);
          ?>
          </select>
        </div>

        <div class="col-md-4">
          <label>Other &nbsp;</label>
          <input type="text" name="onset_other" style="float:left;" value="<?php echo $objresultSubj['onset_other'] ?>">
        </div>
     </div>

     <div class="row">
         <div class="col-md-2"><label>Duration: </label></div> 

         <div class="col-md-2">
         <select name="duration" style="float:left; padding: .5em;">
           <?php $endo->selduration_edit($conn,$objresultSubj['duration_id']); ?>
         </select>
        </div>
    </div>

    <div class="row">
         <div class="col-md-2"><label>Location: </label></div> 

         <div class="col-md-2">
         <select name="location" style="float:left; padding: .5em;">
           <?php $endo->sellocation_edit($conn,$objresultSubj['locat_locOrdiff']); ?>
         </select>
        </div>
    </div>

    <div class="row">
      <div class="col-md-2"></div>
         <div class="col-md-10">
          <input type="checkbox" name="locat_radiating" style="float:left;" value="radiatinglocat"
            <?php
                if($objresultSubj['locat_radiating'] != ""){
                ?>
                  checked="true" >
                <?php 
                }else{
                   echo ">";
                }
            ?>
          <label> &nbsp; Radiating to &nbsp; </label>
          <input type="text" name="locatradiat" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultSubj['locat_radiating']; ?>"> 
         </div> 
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <input type="checkbox" name="locat_referred" style="float:left;" value="referredlocat"
          <?php
            if($objresultSubj['locat_referred'] != ""){
              ?>
                  checked="true" >
                <?php 
            }else{
               echo ">";
            }
          ?>
            <label> &nbsp; Referred to &nbsp; </label>
            <input type="text" name="refer" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultSubj['locat_referred']; ?>"> 
        </div>
    </div>

    <?php
        $searchObj = "SELECT * FROM object_symptom WHERE HN='$HN' AND Date = '$harddate'";
        $resultObj = $conn->query($searchObj);
        $objresultObj = mysqli_fetch_array($resultObj);
    ?>
    <h4>O.Objective Symptoms</h4>
    <div class="row">
      <div class="col-md-3">
         <label>&nbsp; Extraoral: </label>
      </div>

      <div class="col-md-3">
          <input type="checkbox" name="extrafacial_check" style="float:left;" value="1"
            <?php
                if($objresultObj['ext_facialswelling'] == "1"){
                    ?>
                        checked = "true" >
                    <?php
                }else{
                    echo ">";
                    ?>
                    <?php
                }
            ?>
            <label>&nbsp;&nbsp;Facial Swelling </label>
      </div>

      <div class="col-md-3">
          <input type="checkbox" name="extralymph_check" style="float:left;" value="1"
          <?php
              if($objresultObj['ext_lymphnode'] == "1"){
                  ?>
                      checked = "true" >
                  <?php
              }else{
                  echo ">";
                  ?>
                  <?php
              }
          ?>
          <label>&nbsp;&nbsp;Lymph Node: </label>
      </div>   

      <div class="col-md-3">
          <input type="checkbox" name="extrasinus_check" style="float:left;" value="1"
          <?php
              if($objresultObj['ext_sinustract'] == "1"){
                  ?>
                      checked = "true" >
                  <?php
              }else{
                  echo ">";
                  ?>
                  <?php
              }
          ?>
          <label>&nbsp;&nbsp;Sinus Tract: </label>
      </div> 
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>&nbsp; Other: &nbsp;</label> 
        </div>
        <div class="col-md-9">
            <textarea name="extraother" rows="5" cols="50" style="float:left;"><?php echo $objresultObj['ext_other']; ?></textarea>
        </div>
    </div>

      <div class="row">
          <div class="col-md-2">
         <label>&nbsp;&nbsp; Intraoral: </label>
         </div>

         <div class="col-md-5">
          <select name="swellsoftorfirm" style="float:left; padding: .5em;">
            <?php
            if($objresultObj['intra_swellsoftOrfirm'] == "0"){
                echo '<option value="0">Soft</option>
                     <option value="1">Firm</option>';
            }else{
                echo '<option value="1">Firm</option>
                     <option value="0">Soft</option>';
            }
            ?>            
          </select>

          <label>&nbsp;&nbsp; area &nbsp; </label>
          <input type="text" name="intraswell_area" style="width: 150px; height: 50px; float:left;" value="<?php echo $objresultObj['intra_swellarea']; ?>">
          </div>

          <div class="col-md-5">
          <input type="radio" style="float:left;" name="intra_sinus" value="1"
            <?php
              if($objresultObj['intra_sinustract'] != ""){
                ?>
                    checked="true" >
                <?php 
              }else{
                 echo ">";
              }
            ?>
          <label>&nbsp; Sinus Tract at &nbsp; </label>
          <input type="text" name="intrasinus" style="width: 250px; height: 50px; float:left;" value="<?php echo $objresultObj['intra_sinustract']; ?>">
         </div>
      </div>

      <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Tooth: </label>
          </div>

          <div class="col-md-2">
          <input type="checkbox" name="cariestooth" style="float:left;" value="1"
            <?php
                if($objresultObj['tooth_caries'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
          <label>&nbsp; Caries</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" name="restoothtoration" style="float:left;" value="1"
                <?php
                    if($objresultObj['tooth_restoration'] != ""){
                      ?>
                        checked="true" >
                      <?php 
                    }else{
                      echo ">";
                    }
                ?>
              <label> &nbsp; Restoration with &nbsp; </label>
              <input type="text" name="toothrestoration" style="width: 100px; height: 20px; float:left; " value="<?php echo $objresultObj['tooth_restoration']; ?>">
          </div>   

          <div class="col-md-2">
          <input type="checkbox" name="pulptoothex" style="float:left;" value="1"
            <?php
                if($objresultObj['tooth_pulpexposure'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
          <label>&nbsp; Pulp Exposure</label>
          </div>

          <div class="col-md-2">
          <input type="checkbox" name="pulptoothpoly" style="float:left;" value="1"
            <?php
                if($objresultObj['tooth_pulppolyp'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
          <label>&nbsp; Pulp Polyp</label>
          </div>
      </div>

      <br><br><br><br>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <input type="checkbox" name="fracturetoration" style="float:left;" value="1"
              <?php
                  if($objresultObj['tooth_fracture'] != ""){
                    ?>
                      checked="true" >
                    <?php 
                  }else{
                    echo ">";
                  }
              ?>
            <label> &nbsp; Fracture at &nbsp; </label>
            <input type="text" name="toothfractoration" style="width: 100px; height: 20px; float:left;" value="<?php echo $objresultObj['tooth_fracture']; ?>">
        </div>

        <div class="col-md-4">
            <input type="checkbox" name="crowntooth" style="float:left;" value="1"
              <?php
                  if($objresultObj['tooth_crown'] != ""){
                    ?>
                      checked="true" >
                    <?php 
                  }else{
                    echo ">";
                  }
              ?>
            <label> &nbsp; Crown Discoloration to &nbsp; </label>
            <input type="text" name="toothcrown" style="width: 100px; height: 20px; float:left;" value="<?php echo $objresultObj['tooth_crown']; ?>">
        </div> 

        <div class="col-md-3">
        <input type="checkbox" name="opentoothdrai" style="float:left;" value="1"
          <?php
              if($objresultObj['tooth_open'] == "1"){
                ?>
                  checked="true" >
                <?php 
              }else{
                echo ">";
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
                  checked="true" >
                <?php 
              }else{
                echo ">";
              }
          ?>
        <label>&nbsp; Temp. Restoration</label>
        </div>

        <div class="col-md-7">
            <label> &nbsp; Other: &nbsp; </label>
            <textarea type="text" name="toothother" rows="3" cols="50" style="float:left;"><?php echo $objresultObj['tooth_other']; ?></textarea>
        </div> 
      </div>
                        
      <br><br>
      <h4>Examination</h4>
      <?php
        $searchExam = "SELECT * FROM examination WHERE HN = '$HN' AND Date = '$harddate'";
        $resultExam = $conn->query($searchExam);
        $objresultExam = mysqli_fetch_array($resultExam);
      ?>

        <table class="table table-bordered"> 
          <tr>
            <th rowspan="2"> <div align="center">Tooth </div></th>
            <th rowspan="2"> <div align="center">EPT</div></th>
            <th rowspan="2"> <div align="center">Cold</div></th>
            <th rowspan="2"> <div align="center">Heat</div></th>
            <th rowspan="2"> <div align="center">Perc<sup>n</sup></div></th>
            <th rowspan="2"> <div align="center">Palp<sup>n</sup></div></th>
            <th rowspan="2"> <div align="center">Mobility</div></th>
            <th colspan="6"> <div align="center">Perio Probe (mm)</div></th>
            <th rowspan="2"> <div align="center">Special Test <p>(if necessary)</p></div></th>
          </tr>

          <tr>
            <th><div align="center">MB</div></th>
            <th><div align="center">B</div></th>
            <th><div align="center">DB</div></th>
            <th><div align="center">ML</div></th>
            <th><div align="center">L</div></th>
            <th><div align="center">DL</div></th>
          </tr>

          <tr>
            <td>
              <input type="text" name="numtooth1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_tooth']; ?>">
            </td>
            <td>
              <input type="text" name="epttooth1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_EPT']?>"></td>
            <td>
              <select name="cold1" style="width: 55px;">
                <?php
                  if($objresultExam['exam_cold'] != ""){
                    $endo->selexamcold_edit($conn, $objresultExam['exam_cold']);
                  }else{
                    ?>
                    <select name="cold1" style="width: 55px;">
                      <option value="">Please select</option>
                      <option value="WNL">WNL</option>
                      <option value="positive">positive</option>
                      <option value="negative">negative</option>
                    </select>
                    <?php
                  }
                  
                ?>
              </select>
            </td>

            <td>
              <select name="heat1" style="width: 55px;">
              <?php
                  if($objresultExam['exam_heat'] != ""){
                    $endo->selexamheat_edit($conn, $objresultExam['exam_heat']);
                  }else{
                    ?>
                      <option value="">Please select</option>
                      <option value="WNL">WNL</option>
                      <option value="positive">positive</option>
                      <option value="negative">negative</option>
                    <?php
                  }
              ?>
              </select>
            </td>

            <td>
                <select name="perc1" style="width: 55px;">
                <?php
                  if($objresultExam['exam_perc'] != ""){
                    $endo->selexamperc_edit($conn, $objresultExam['exam_perc']);
                  }else{
                    ?>
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                   <?php
                  }
              ?>
                </select>
            </td>

            <td>
              <select name="palp1" style="width: 55px;">
              <?php
                if($objresultExam['exam_palp'] != ""){
                  $endo->selexampalp_edit($conn, $objresultExam['exam_palp']);
                }else{
                  ?>
                <option value="">Please select</option>
                <option value="WNL">WNL</option>
                <option value="positive">positive</option>
                <option value="negative">negative</option>
                <?php
                }
              ?>
              </select>
            </td>

            <td>
              <select name="mobility1" style="width: 55px;">
              <?php
                if($objresultExam['exam_mobility'] != ""){
                  $endo->selexammobility_edit($conn, $objresultExam['exam_mobility']);
                }else{
                  ?>
               <option value="">Please select</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <?php
                }
              ?>
              </select>
            </td>

            <td><input type="text" name="probe_mb1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioMB'] ?>"></td>
            <td><input type="text" name="probe_b1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioB'] ?>"></td>
            <td><input type="text" name="probe_db1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioDB'] ?>"></td>
            <td><input type="text" name="probe_ml1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioML'] ?>"></td>
            <td><input type="text" name="probe_l1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioL'] ?>"></td>
            <td><input type="text" name="probe_dl1" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioDL'] ?>"></td>
            <td>
              <select name="special_test1" style="float:left; width:100px;">
                <?php
               
                  $endo->selspecialtest_edit($conn,$objresultExam['spectest_id']);
      
                ?>
              </select>
            </td>      
          </tr>

          <tr>
            <td>
              <input type="text" name="numtooth2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_tooth']; ?>">
            </td>
            <td>
              <input type="text" name="epttooth2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_EPT']?>"></td>
            <td>
              <select name="cold1" style="width: 55px;">
                <?php
                  if($objresultExam['exam_cold'] != ""){
                    $endo->selexamcold_edit($conn, $objresultExam['exam_cold']);
                  }else{
                    ?>
                    <select name="cold2" style="width: 55px;">
                      <option value="">Please select</option>
                      <option value="WNL">WNL</option>
                      <option value="positive">positive</option>
                      <option value="negative">negative</option>
                    </select>
                    <?php
                  }
                  
                ?>
              </select>
            </td>

            <td>
              <select name="heat2" style="width: 55px;">
              <?php
                  if($objresultExam['exam_heat'] != ""){
                    $endo->selexamheat_edit($conn, $objresultExam['exam_heat']);
                  }else{
                    ?>
                      <option value="">Please select</option>
                      <option value="WNL">WNL</option>
                      <option value="positive">positive</option>
                      <option value="negative">negative</option>
                    <?php
                  }
              ?>
              </select>
            </td>

            <td>
                <select name="perc2" style="width: 55px;">
                <?php
                  if($objresultExam['exam_perc'] != ""){
                    $endo->selexamperc_edit($conn, $objresultExam['exam_perc']);
                  }else{
                    ?>
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                   <?php
                  }
              ?>
                </select>
            </td>

            <td>
              <select name="palp2" style="width: 55px;">
              <?php
                if($objresultExam['exam_palp'] != ""){
                  $endo->selexampalp_edit($conn, $objresultExam['exam_palp']);
                }else{
                  ?>
                <option value="">Please select</option>
                <option value="WNL">WNL</option>
                <option value="positive">positive</option>
                <option value="negative">negative</option>
                <?php
                }
              ?>
              </select>
            </td>

            <td>
              <select name="mobility2" style="width: 55px;">
              <?php
                if($objresultExam['exam_mobility'] != ""){
                  $endo->selexammobility_edit($conn, $objresultExam['exam_mobility']);
                }else{
                  ?>
               <option value="">Please select</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <?php
                }
              ?>
              </select>
            </td>

            <td><input type="text" name="probe_mb2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioMB'] ?>"></td>
            <td><input type="text" name="probe_b2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioB'] ?>"></td>
            <td><input type="text" name="probe_db2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioDB'] ?>"></td>
            <td><input type="text" name="probe_ml2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioML'] ?>"></td>
            <td><input type="text" name="probe_l2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioL'] ?>"></td>
            <td><input type="text" name="probe_dl2" style="width: 50px; height:30px;" value="<?php echo $objresultExam['exam_perioDL'] ?>"></td>
            <td>
              <select name="special_test2" style="float:left; width:100px;">
                <?php
               
                  $endo->selspecialtest_edit($conn,$objresultExam['spectest_id']);
      
                ?>
              </select>
            </td>      
          </tr>
        </table>

      <br><br>
      <h4>Radiographic findings</h4>
       <?php
        $searchRadio = "SELECT * FROM radiograph_crown WHERE HN = '$HN' AND Date = '$harddate'";
        $resultRadio = $conn->query($searchRadio);
        $objresultRadio = mysqli_fetch_array($resultRadio);  
      ?>
      <div class="row">
        <div class="col-md-2">
            <label>Crown: </label>
        </div>
        <div class="col-md-2">
              <input type="checkbox" name="normcrown" style="float:left;" value="1"
            <?php
                if($objresultRadio['crown_normal'] == "1"){
                  ?>
                    checked="true" onclick="enable_radiocrown(this.checked)">
                  <?php 
                }else{
                  echo ">";
                }
            ?>
              <label>&nbsp; Normal </label>
        </div>

        <div class="col-md-4">
              <input type="checkbox" name="cariescrown" style="float:left;" value="1"
            <?php
                if($objresultRadio['crown_caries'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
              <label>&nbsp; Caries &nbsp;&nbsp; area &nbsp; </label>
              <input type="text" name="crowarea" style="width: 60px; height: 30px; float:left;" value="<?php echo $objresultRadio['crown_cariesarea']; ?>">

              <label>&nbsp; &nbsp;depth &nbsp; </label>
              <input type="text" name="crowdepth" style="width: 60px; height: 30px; float:left;" value="<?php echo $objresultRadio['crown_cariesdepth']; ?>">
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="restcrown" style="float:left;" value="1"
            <?php
                if($objresultRadio['crown_restoration'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
              <label>&nbsp; Restoration </label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="fractcrown" style="float:left;" value="1"
            <?php
                if($objresultRadio['crown_fracture'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
            ?>
              <label>&nbsp; Fracture </label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <label>&nbsp; Other : &nbsp; </label>
          <textarea name="crownother" rows="3" cols="50" style="float:left;"><?php echo $objresultRadio['crown_other']; ?></textarea>
        </div>
      </div>

      <?php
        $searchPulpcham = "SELECT * FROM radiograph_pulpcham WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPulpcham = $conn->query($searchPulpcham);
        $objresultPulpcham = mysqli_fetch_array($resultPulpcham);
      ?>

      <div class="row">
          <div class="col-md-2">
            <label>Pulp Chambar: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" name="normcham" style="float:left;" value="1"
               <?php
                if($objresultPulpcham['pulpcham_normal'] == "1"){
                  ?>
                    checked="true" onclick="enable_radiopulpcham(this.checked)">
                  <?php 
                }else{
                  echo ">";
                }
            ?>
              <label>&nbsp; Normal </label>
          </div>

          <div class="col-md-4">
          <input type="checkbox" name="calcificatecham" style="float:left;" value="1"
            <?php
                if($objresultPulpcham['pulpcham_calPartOrComp'] != ""){
                  ?>
                    checked="true" >
                    <label>&nbsp; Calcification &nbsp;</label>
                  <?php 
                    if($objresultPulpcham['pulpcham_calPartOrComp'] == "0"){
                        ?>
                      <select name="partialorcomp" style="height: 40px; float:left;">
                          <option value="0">Partial</option>
                          <option value="1">Complete</option>
                      </select>
                        <?php
                    }else{
                        ?>
                      <select name="partialorcomp" style="height: 40px; float:left;">
                          <option value="1">Complete</option>
                          <option value="0">Partial</option>
                      </select>
                        <?php
                    }
                }else{
                  echo ">";
                  ?>
                  <label>&nbsp; Calcification &nbsp;</label>
                  <select name="partialorcomp" style="height: 40px; float:left;">
                      <option value="0">Partial</option>
                      <option value="1">Complete</option>
                  </select>
                 <?php
                }
            ?>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="stonecham" style="float:left;" value="1"
              <?php
                if($objresultPulpcham['pulpcham_pulpstone'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Pulp Stone</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="rescham" style="float:left;" value="1"
              <?php
                if($objresultPulpcham['pulpcham_resorption'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Resorption </label>
          </div>
      </div><br>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <label>&nbsp; Other &nbsp;</label> 
              <textarea name="pulpchamother" rows="3" cols="50" style="float:left;"><?php echo $objresultPulpcham['pulpcham_other']; ?></textarea>
          </div>
      </div><br>

      <?php
        $searchRoot = "SELECT * FROM radiograph_root WHERE HN = '$HN' AND Date = '$harddate'";
        $resultRoot = $conn->query($searchRoot);
        $objresultRoot = mysqli_fetch_array($resultRoot);
          
      ?>
      <div class="row">
        <div class="col-md-2">
          <label>Root: </label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="normroot" style="float:left;" value="1"
              <?php
                if($objresultRoot['root_normal'] == "1"){
                  ?>
                    checked="true" onclick="enable_root(this.checked)">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Normal </label>
        </div>
        
        <div class="col-md-2">
              <input type="checkbox" name="cariesroot" style="float:left;" value="1"
              <?php
                if($objresultRoot['root_caries'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Caries</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="curvatureroot" style="float:left;" value="1"
              <?php
                if($objresultRoot['root_curvature'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Curvature</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="extresroot" style="float:left;" value="1"
              <?php
                if($objresultRoot['root_extresorption'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Ext. Resorption</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="fractroot" style="float:left;" value="1"
              <?php
                if($objresultRoot['root_fracture'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Fracture</label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <label>&nbsp; Other &nbsp; </label>
            <textarea rows="3" cols="50" name="root_other" style="float:left;"><?php echo $objresultRoot['root_other']; ?></textarea>
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
                    checked="true" onclick="enable_pulpcanal(this.checked)">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
               <label>&nbsp; Normal</label> 
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="calcificatecanel" value="1"
                <?php
                if($objresultPulpcan['pulpcan_calPartOrComp'] != ""){
                  ?>
                    checked="true">
                    <label>&nbsp; Calcification &nbsp;</label>
                  <?php 
                  if($objresultPulpcan['pulpcan_calPartOrComp'] == "1"){
                    ?>
                    <select name="select_cal" style="height: 40px; float:left;">
                      <option value="1">Complete</option>
                      <option value="0">Partial</option>
                    </select>
                    <?php
                  }else{
                    ?>
                    <select name="select_cal" style="height: 40px; float:left;">
                      <option value="0">Partial</option>
                      <option value="1">Complete</option>
                    </select>
                    <?php
                  }
                }else{
                  echo ">";
                  ?>
                  <label>&nbsp; Calcification &nbsp;</label>
                    <select name="select_cal" style="height: 40px; float:left;">
                      <option value="0">Partial</option>
                      <option value="1">Complete</option>
                    </select>
                  <?php
                }
              ?>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="resorpcanel" value="1"
              <?php
                if($objresultPulpcan['pulpcan_resorption'] == "1"){
                  ?>
                    checked="true">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Resorption</label>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="perforcanel" value="1"
              <?php
                if($objresultPulpcan['pulpcan_perforation'] == "1"){
                  ?>
                    checked="true">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Perforation</label>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="prevcanel" value="1"
              <?php
                if($objresultPulpcan['pulpcan_previousRCT'] == "1"){
                  ?>
                    checked="true">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Previous RCT</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="brokecanel" value="1"
              <?php
                if($objresultPulpcan['pulpcan_broken'] == "1"){
                  ?>
                    checked="true">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Broken Instrument</label>
          </div>
        
          <div class="col-md-4">
              <label>&nbsp; Other &nbsp; </label>
              <textarea type="text" rows="3" cols="30" name="pulpcanother" style="float:left;"><?php echo $objresultPulpcan['pulpcan_other']; ?></textarea>
          </div>
      </div>

      <?php
        $searchPerirad = "SELECT * FROM radiograph_perirad WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPerirad = $conn->query($searchPerirad);
        $objresultPerirad = mysqli_fetch_array($resultPerirad);
      ?>
      <div class="row">
          <div class="col-md-2">
              <label>Periradicular: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="normperirad" value="1" 
              <?php
                if($objresultPerirad['perirad_normal'] == "1"){
                  ?>
                    checked="true" onclick="enable_periradicular(this.checked)">
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Normal </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="widenperirad" value="1"
              <?php
                if($objresultPerirad['perirad_wideningPDL'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Widening PDL </label>
          </div>
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="lossperirad" value="1"
              <?php
                if($objresultPerirad['perirad_lossoflam'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Loss of Lamina Dura </label>
          </div>
      </div>

        <br>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="perialessperirad" value="1"
                <?php
                if($objresultPerirad['perirad_periapical1'] != ""){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Periapical Lesion &nbsp;</label>
              <input type="text" name="periradperialess1" style="width: 50px; height: 20px; float:left;" value="<?php echo $objresultPerirad['perirad_periapical1']; ?>">
              <label style="font-size: 20px;"> X </label>&nbsp; 
              <input type="text" name="periradperialess2" style="width: 50px; height: 20px; float:left;" value="<?php echo $objresultPerirad['perirad_periapical2']; ?>">
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="laterlessperirad" value="1"
              <?php
                if($objresultPerirad['perirad_lateral1'] != ""){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Lateral Lesion &nbsp;</label>
              <input type="text" name="laterlessperirad1" style="width: 50px; height:20px; float:left;" value="<?php echo $objresultPerirad['perirad_lateral1']; ?>">
              <label style="font-size: 20px;"> X </label>&nbsp;  
              <input type="text" name="laterlessperirad1" style="width: 50px; height:20px; float:left;" value="<?php echo $objresultPerirad['perirad_lateral2']; ?>">
          </div>

          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="resorpperirad" value="1"
              <?php
                if($objresultPerirad['perirad_resorption'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Resorption </label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="apexperirad" value="1"
              <?php
                if($objresultPerirad['perirad_openapex'] != ""){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Open Apex width</label>
              <input type="text" name="apexperirad_width" style="width: 100px; height:20px; float:left;" value="<?php echo $objresultPerirad['perirad_openapex'] ?>"><label>&nbsp; mm &nbsp;</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="osteoperirad" value="1"
              <?php
                if($objresultPerirad['perirad_osteos'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; OsteosIcerosis</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="hyperperirad" value="1"
              <?php
                if($objresultPerirad['perirad_hyper'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Hyperplasia of cementurn </label>
          </div>
      </div>         

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <label>&nbsp; Other &nbsp; </label>
              <textarea rows="3" cols="50" name="perother" style="float:left;"><?php echo $objresultPerirad['perirad_other']; ?></textarea>
          </div>
      </div>

      <?php
        $searchAlveolar = "SELECT * FROM radiograph_alveolar WHERE HN = '$HN' AND Date = '$harddate'";
        $resultAlveolar = $conn->query($searchAlveolar);
        $objresultAlveolar = mysqli_fetch_array($resultAlveolar);
          
      ?>

      <div class="row">
        <div class="col-md-2">
          <label>Alveolar Bone: </label>
        </div>
        <div class="col-md-2">
              <input type="radio" style="float:left;" name="alveolar" value="normalveolar"
              <?php
                if($objresultAlveolar['bone_normal'] == "1"){
                  ?>
                    checked="true" >
                  <?php 
                }else{
                  echo ">";
                }
              ?>
              <label>&nbsp; Normal </label>
        </div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="generalalveolar"
              <?php
                  if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "0"){
                    ?>
                      checked="true" >
                    <?php
                  }else{
                    echo ">";
                  }
                ?>
              <label>&nbsp; Generalized Bone loss </label>
          </div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="localalveolar"
              <?php
                  if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "1"){
                    ?>
                      checked="true" >
                    <?php
                  }else{
                    echo ">";
                  }
                ?>
              <label>&nbsp; Localized Bone loss</label>
          </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-5">
              <label>&nbsp; Other &nbsp; </label>
              <textarea rows="3" cols="40" style="float:left;" name="alveolarother"><?php echo $objresultAlveolar['bone_other']; ?></textarea>
        </div>
      </div>

      <br><br>
      <h4>Remarks &nbsp;</h4>
        <textarea rows="3" cols="40" style="float:left; margin-left:2em;" name="otherremark"><?php echo $objresultAlveolar['remark']; ?></textarea>

  </div>
  </div>
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
<div class="sect-container">
<div class="panel panel-info">
<div class="panel-heading"><h3>Diagnosis</h3></div>
  <div class="panel-body">
  <?php
      $searchPulpaldiag = "SELECT * FROM pulpal_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
      $resultPulpaldiag = $conn->query($searchPulpaldiag);
      $objresultPulpaldiag = mysqli_fetch_array($resultPulpaldiag);
    ?>
    <div class="row">
    <div class="col-md-6">
    <h4>Pulpal Diagnosis</h4>
      <div class="row" style="height:20px;">
          <div class="col-md-11">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="puldiagnorm" value="1"
              <?php 
                      if($objresultPulpaldiag['normal'] == "1"){
                          ?>
                           checked = "true" onclick="enable_pulpaldiag(this.checked)">                   
                          <?php
                      }else{
                          echo ">";
                      } 
                ?>
               <label>&nbsp; Normal </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="reverOrirrever" value="0"
              <?php 
                  if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "0"){
                      ?>
                       checked = "true" >                      
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Reversible Pulpitis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="reverOrirrever" value="1"
              <?php 
                  if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1"){
                      ?>
                       checked = "true" >                  
                      <?php
                  }else{
                     echo ">";
                  } 
                ?>
              <label>&nbsp; Irreversible Pulpitis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-5">
              <input type="radio" style="float:left; margin-left: 4em;" name="sympOrasymp" value="1" 
                <?php 
                  if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "1"){
                      ?>
                       checked = "true" >
                      <?php
                  }else{
                     echo ">";
                  } 
                ?>
              <label>&nbsp; Symptomatic </label><br><br>
          </div>
      </div> 

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-5">
              <input type="radio" style="float:left; margin-left: 4em;" name="sympOrasymp" value="0"
              <?php 
                  if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "0"){
                      ?>
                       checked = "true" >                    
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Asymtomatic </label>
          </div>
      </div> 

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6"> 
              <input type="checkbox" style="float:left; margin-left: 2em;" name="pulpnecrosis" value="1"
              <?php 
                  if($objresultPulpaldiag['pulp_necrosis'] == "1"){
                      ?>
                       checked = "true" >                      
                      <?php
                  }else{
                     echo ">";
                  } 
                ?>
              <label>&nbsp; Pulp Necrosis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-7">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="previnitiat" value="1" 
              <?php 
                  if($objresultPulpaldiag['prev_initiat'] == "1"){
                      ?>
                       checked = "true" >                     
                      <?php
                  }else{
                      echo ">";
                  } 
              ?>
              <label>&nbsp; Previously Initiated Therapy </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-10">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="prevtreat" value="1"
                <?php 
                      if($objresultPulpaldiag['prev_treated'] == "1"){
                          ?>
                           checked = "true" >
                           <label>&nbsp; Previously treated &nbsp;&nbsp;</label>
                           <?php
                          if($objresultPulpaldiag['prev_treated_improper'] == "1"){
                            ?>
                            <select style="height:40px; width: 120px; float:left;" name="prevselect">
                              <option value="0">Improper</option>
                              <option value="1">Incomplete RCT</option>
                            </select>
                            <?php
                          }
                          else if($objresultPulpaldiag['prev_treated_incomplete'] == "1"){
                            ?>
                            <select style="height:40px; width: 120px; float:left;" name="prevselect">
                              <option value="1">Incomplete RCT</option>
                              <option value="0">Improper</option>
                            </select>
                            <?php
                          }
                        }else{
                            echo ">";
                          ?>
                           <label>&nbsp; Previously treated &nbsp;&nbsp;</label>
                           <select style="height:40px; width: 120px; float:left;" name="prevselect">
                              <option value="0">Improper</option>
                              <option value="1">Incomplete RCT</option>
                            </select>
                          <?php 
                      } 
                ?>              
          </div>
      </div>
     </div>

      <?php
        $searchPeriraddiag = "SELECT * FROM periradicular_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
        $resultPeriraddiag = $conn->query($searchPeriraddiag);
        $objresultPeriraddiag = mysqli_fetch_array($resultPeriraddiag);
      ?>

     <div class="col-md-6">
      <h4>Periradicular Diagnosis</h4>
      <div class="row" style="height:20px;">
        <div class="col-md-3">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="periraddiagnorm" value="1" 
              <?php 
                  if($objresultPeriraddiag['Normal'] == "1"){
                      ?>
                       checked = "true" onclick="enable_periraddiag(this.checked)">                   
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
               <label>&nbsp; Normal </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-10">
              <input type="radio" style="float:left; margin-left: 2em;" name="per_sympOrasymp" value="0"
              <?php 
                  if($objresultPeriraddiag['sympOrasympt_apical'] == "0"){
                      ?>
                       checked = "true" >                     
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Symptomatic Apical Periodontitis </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-10">
              <input type="radio" style="float:left; margin-left: 2em;" name="per_sympOrasymp" value="1"
              <?php 
                  if($objresultPeriraddiag['sympOrasympt_apical'] == "1"){
                      ?>
                       checked = "true" >                      
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Asymptomatic Apical Periodontitis</label>  
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="acuteOrchronic" value="0"
              <?php 
                  if($objresultPeriraddiag['acuteOrchronic_apical'] == "0"){
                      ?>
                       checked = "true" >                   
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Acute Apical Abscess </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="acuteOrchronic" value="1" 
              <?php 
                  if($objresultPeriraddiag['acuteOrchronic_apical'] == "1"){
                      ?>
                       checked = "true" >                     
                      <?php
                  }else{
                      echo ">";
                  } 
                ?>
              <label>&nbsp; Chronic Apical Abscess</label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-12">
                <label style="margin-left: 2em;">&nbsp; Other : &nbsp;</label> <textarea name="perdiagother" rows="3" cols="40" style="float:left;"><?php echo $objresultPeriraddiag['other']; ?></textarea>
        </div>
      </div>
    </div>
    </div>

  </div>
</div>
</div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
</fieldset> 

<fieldset>
<?php
  $searchTreatment = "SELECT * FROM treatment_plan WHERE HN = '$HN' AND Date = '$harddate'";
  $resultTreatment = $conn->query($searchTreatment);
  $objresultTreatment = mysqli_fetch_array($resultTreatment);
?>
<div class="sect-container">
<div class="panel panel-info">
<div class="panel-heading"><h3>Treatment Planning</h3></div>
<div class="panel-body">
    <div class="row">
    <div class="col-md-2">
      <input type="checkbox" style="float:left;" name="notreat" value="1" 
        <?php 
            if($objresultTreatment['no_treatment'] == "1"){
                ?>
                 checked = "true" onclick="enable_treatment(this.checked)">                   
                <?php
            }else{
                echo ">";
            } 
        ?>
      <label>&nbsp; No Treatment</label>
    </div>

    <div class="col-md-3">
      <input type="checkbox" style="float:left;" name="pulpotomy" value="1"
      <?php 
            if($objresultTreatment['Pulpotomy'] == "1"){
                ?>
                 checked = "true" >  
                 <label>&nbsp;Pulpotomy &nbsp;</label>
                <?php
                if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "0"){
                    ?>
                     <select style="height: 50px; float:left;" name="pulposelect">
                          <option value="0">Partial</option>
                          <option value="1">Full</option>
                      </select>
                    <?php
                }   
                else if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "1"){
                    ?>
                     <select style="height: 50px; float:left;" name="pulposelect">
                          <option value="1">Full</option>
                          <option value="0">Partial</option>
                      </select>
                    <?php
                }
            }else{
                  echo ">";
                ?>
                 <label>&nbsp;Pulpotomy &nbsp;</label>
                 <select style="height: 50px; float:left;" name="pulposelect">
                      <option value="1">Full</option>
                      <option value="0">Partial</option>
                  </select>
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
                <?php
            }else{
               echo ">";
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
                <?php
            }else{
                echo ">";
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
                 checked = "true"  >                  
                <?php
            }else{
               echo ">";
            } 
        ?>
        <label>&nbsp;Non-surgical Retreatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="apexification" value="1"
        <?php 
            if($objresultTreatment['apexification'] == "1"){
                ?>
                 checked = "true" >                     
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp;Apexification</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="intentional" value="1"
        <?php 
            if($objresultTreatment['intentionalRCT'] == "1"){
                ?>
                 checked = "true" >                      
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp;Intentional RCT</label>
    </div>

    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="rootcaneltreat" value="1"
        <?php 
            if($objresultTreatment['sur_root'] == "1"){
                ?>
                 checked = "true" >                    
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp;Surgical Root Canel Treatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="perio" value="1"
        <?php 
            if($objresultTreatment['perio_consult'] == "1"){
                ?>
                 checked = "true" >                    
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp;Perio Consult</label>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
            <label>&nbsp; Other : &nbsp;</label> 
            <textarea name="periradother" rows="3" cols="50" style="float:left;"><?php echo $objresultTreatment['treat_other']; ?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
           <label>Plan for final restoration: </label>
           <textarea name="planrestor" rows="5" cols="50" style="float:left;"><?php echo $objresultTreatment['plan_for_final']; ?></textarea>
    </div>
  </div><br><br><br><br><br><br><br>

  <div class="row">
    <div class="col-md-2">
        <label>Pre-op treatment: </label>
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="cariesremove"
        <?php 
            if($objresultTreatment['pre_op_treat_caries'] == "1"){
                ?>
                 checked = "true" >                     
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp; Caries Removal</label>  
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="dam"
        <?php 
            if($objresultTreatment['pre_op_treat_dam'] == "1"){
                ?>
                 checked = "true" >                      
                <?php
            }else{
               echo ">";
            } 
        ?>
        <label>&nbsp; Dam </label>
    </div>

    <div class="col-md-6">
        <label>&nbsp; Other :  &nbsp;</label>
        <textarea name="preopother" rows="3" cols="50" style="float:left; "><?php echo $objresultTreatment['pre_op_treat_other']; ?></textarea>
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
                 checked = "true" >                    
                <?php
            }else{
                echo ">";
            } 
        ?>
        <label>&nbsp; Required</label>
    </div>    

    <div class="col-md-8">
         <input type="radio" style="float:left;" name="anesthesis" value="anesnotrequired"
         <?php 
            if($objresultTreatment['Anest_reqOrnotreq'] == "0"){
                ?>
                 checked = "true" >                   
                <?php
            }else{
                echo ">" ;
            } 
        ?>
         <label>&nbsp; Not required </label>
    </div>  
  </div><br><br><br>

<?php
  $searchXray = "SELECT * FROM patients_xray WHERE HN = '$HN' AND Date = '$harddate'";
  $resultXray = $conn->query($searchXray);
  $objresultXray = mysqli_fetch_array($resultXray);
  $datetime_Xray = $objresultXray['xray_datetime']; 
  $date_Xray = substr($datetime_Xray, 0,10);
  $time_Xray = substr($datetime_Xray, 11);

?>
  <div class="row">
    <div class="col-md-5">
        <label>X-ray file:&nbsp;</label>
        <input type="file" name="xrayfile" style="float:left; width:300px; ">
    </div>

    <div class="col-md-4">
        <label>X-ray date:&nbsp;</label>
        <input type="date" name="xraydate" style="float:left;" value="<?php echo $date_Xray; ?>">
    </div>

    <div class="col-md-3">
        <label>X-ray time:&nbsp;</label>
        <input type="time" name="xraytime" style="float:left;" value="<?php echo $time_Xray; ?>">
    </div>
  </div>

  <div class="row">
  <?php
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $objresultXray['xrayData'] ).'"style="width:100px; height:150px;"/>';
    ?>
  </div> 
</div>
</div>
</div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="hidden" name="HN" value="<?php echo $HN; ?>">
  <input type="hidden" name="stu_code" value="<?php echo $stucode; ?>">
  <input type="hidden" name="dent_id" value="<?php echo $dent; ?>">
  <input type="hidden" name="harddate" value="<?php echo $harddate; ?>">
  <input type="submit" name="submit_insert" value="Submit"/>
  
</fieldset>


<!-- Javascript -->
<script src="assets/js/multi-step-form.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

</body>
</html>

<script type="text/javascript">
  //$ = jQuery; check and uncheck radio
$(':radio').mousedown(function(e){
  var $self = $(this);
  if( $self.is(':checked') ){
    var uncheck = function(){
      setTimeout(function(){$self.removeAttr('checked');},0);
    };
    var unbind = function(){
      $self.unbind('mouseup',up);
    };
    var up = function(){
      uncheck();
      unbind();
    };
    $self.bind('mouseup',up);
    $self.one('mouseout', unbind);
  }
});
</script>