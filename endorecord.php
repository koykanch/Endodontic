<!DOCTYPE html>
<html>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/multi-step-form.css">
  <style type="text/css">

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

        .row{
          height: 60px;
        }

        label{
          float: left;
        }

    </style>

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
  document.endodontic.irrever.disabled = status;
  document.endodontic.symptomirrever.disabled =status;
  document.endodontic.asymtomirrever.disabled = status;
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
</script>

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

    echo "<--------------------------------------None------------------------------------------------><br><br>";
    $check->CheckNone($image,$conn);
      $cnone0 = $_SESSION['count0'];
      // echo "Number of black color (0) = ".$cnone0."<br>";

       $avgnone = $_SESSION['avgnone'];
       echo "average percent of white color = ".$avgnone."<br>";
       echo "<br><br><br><br>";
       $_SESSION['avgnone'] = $avgnone;

    echo "<---------------------------------Cardiovascular Diseases----------------------------------><br><br>";
    $check->Checkcardiovascular($image,$conn);
      $ccardio0 = $_SESSION['count0'];
      $avgcardio = $_SESSION['avgcardio'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgcardio."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgcardio'] = $avgcardio;

    echo "<-------------------------------------Pulmonary Diseases-----------------------------------><br><br>";
    $check->CheckPulmonary($image,$conn);
      $cpul0 = $_SESSION['count0'];
      $avgpul = $_SESSION['avgpul'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgpul."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgpul'] = $avgpul;


    echo "<--------------------------------Gastrointestinal Diseases---------------------------------><br><br>";
    $check->CheckGastro($image,$conn);
      $cgastro0 = $_SESSION['count0'];
      $avggastro = $_SESSION['avggastro'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avggastro."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avggastro'] = $avggastro;

    echo "<------------------------------------Hematologic Diseases---------------------------------><br><br>";
    $check->CheckHematologic($image,$conn);
      $chema0 = $_SESSION['count0'];
      $avghema = $_SESSION['avghema'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avghema."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avghema'] = $avghema;

    echo "<------------------------------------Neurologic Diseases---------------------------------><br><br>";
    $check->CheckNeurologic($image,$conn);
      $cneuro0 = $_SESSION['count0'];
      $avgneuro = $_SESSION['avgneuro'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgneuro."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgneuro'] = $avgneuro;

    echo "<------------------------------------Allergic to---------------------------------><br><br>";
    $check->CheckAllergic($image,$conn);
      $callergic0 = $_SESSION['count0'];
      $avgallergic = $_SESSION['avgallergic'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgallergic."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgallergic'] = $avgallergic;

    echo "<------------------------------------Blood Pressure------------------------------><br><br>";
    $check->CheckBlood($image,$conn);
      $cblood0 = $_SESSION['count0'];
      $avgblood = $_SESSION['avgblood'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgblood."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgblood'] = $avgblood;

    echo "<---------------------------------------Other------------------------------------><br><br>";
    $check->CheckOther($image,$conn);
      $cother0 = $_SESSION['count0'];
      $avgother = $_SESSION['avgother'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgallergic."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgother'] = $avgother;

    echo "<-----------------------------------Taking Medicine------------------------------><br><br>";
    $check->CheckTaking($image,$conn);
      $ctaking0 = $_SESSION['count0'];
      $avgtaking = $_SESSION['avgtaking'];
    //  echo "Number of black color (0) = ".$cpul0."<br>";
      echo "average percent of white color = ".$avgtaking."<br>";
      echo "<br><br><br><br>";
      $_SESSION['avgtaking'] = $avgtaking;
  } 
?>
</head>
<body onload=enable_text(false);>

<?php
require('connect.php');
require('class_patient.php');
require('class_stu.php');
require('class_dent.php');

$patient = new Patient;
$stu = new Student;
$instruc = new Dentist;
?>
<!-- multistep form -->
<form id="msform" name="endodontic" method="post" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Import picture</li>
    <li>Endodontic Record</li>
    <li>Patient's history</li>
    <li>Examination</li>
    <li>Diagnosis</li>
    <li>Treatment Planning</li>
  </ul>

  <!-- fieldsets -->
<fieldset>
  <div class="sect-container">
  <div class="panel panel-info">
  <div class="panel-heading"><h3>Import Picture</h3></div>
  <div class="panel-body">
    <div class="row">
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
  <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
  <div class="sect-container">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>Endodontic Record</h3></div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-12"><label>HN: &nbsp;&nbsp;</label>
              
                     <?php $patient->SearchHN($conn); ?></div>
            </div>

            <div class="row">
                <div class="col-md-12"><label>Tooth: &nbsp;&nbsp;</label>
                <input type="text" style="width: 100px; height: 50px; float:left;" name="tooth"></div>
            </div>

            <div class="row">
               <div class="col-md-12"><label>Dental student: &nbsp;&nbsp;</label>
               <?php $stu->searchstu($conn); ?></div>
            </div>

            <div class="row">
               <div class="col-md-12"><label> Instructor: &nbsp;&nbsp;</label>
               <?php $instruc->searchdent($conn); ?>
               </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                  <label>Date: &nbsp;&nbsp;</label>
                  <div id="demo" style="width:200px; float:left;">
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
  <div class="sect-container">
  <div class="panel panel-info">
  <div class="panel-heading"><h3>Patient's History</h3></div>
    <div class="panel-body">
           <h4>Medical History</h4>
            <div class="row">
            <?php
              if($avgnone >= 30){
                echo'
              <div class="col-md-4"><input type="checkbox" onclick="enable_text(this.checked)" style="float:left;" name="nonemed" value="nonemed" checked><label>&nbsp;None</label></div>';
              }else{
                echo'
              <div class="col-md-4"><input type="checkbox" onclick="enable_text(this.checked)" style="float:left;" name="nonemed" value="nonemed"><label>&nbsp;None</label></div>';
              }
            ?>

            <?php 
              if($avgcardio >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="cardiodismed" value="cardiodismed" checked><label>&nbsp;Cardiovascular Diseases</label></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="cardiodismed" value="cardiodismed"><label>&nbsp;Cardiovascular Diseases</label></div>';
              }
            ?>

            <?php
              if($avgpul >= 30){
                echo'
                <div class="col-md-4"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="pulmonarydismed" checked><label>&nbsp;Pulmonary Diseases</label></div>';
              }else{
                echo'
                <div class="col-md-4"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="pulmonarydismed"><label>&nbsp;Pulmonary Diseases</label></div>';
              }
            ?>
              
            </div>  
          

            <div class="row">
            <?php
              if($avggastro >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="gastrodismed" value="gastrodismed" checked><label>&nbsp;Gastrointestinal Diseases</label></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="gastrodismed" value="gastrodismed"><label>&nbsp;Gastrointestinal Diseases</label></div>';
              }
            ?>

            <?php
              if($avghema >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="hemadismed" value="hemadismed" checked><label>&nbsp;Hematologic Diseases</label></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="hemadismed" value="hemadismed"><label>&nbsp;Hematologic Diseases</label></div>';
              }
            ?> 

            <?php
              if($avgneuro >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="neurodismed" value="neurodismed" checked><label>&nbsp;Neurologic Diseases</label></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="neurodismed" value="neurodismed"><label>&nbsp;Neurologic Diseases</label></div>';
              }
            ?>
            </div>

            <div class="row">

            <?php 
              if($avgallergic >= 30){
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="allergicmed" value="allergicmed" checked><label>&nbsp; Allergic to : &nbsp;&nbsp;</label><input type="text" name="allermed" style="width: 280px; height: 50px; float:left;"></div>';
              }else{
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="allergicmed" value="allergicmed"><label>&nbsp; Allergic to : &nbsp;&nbsp;</label><input type="text" name="allermed" style="width: 280px; height: 50px; float:left;"></div>';
              }
              ?>

            <?php
              if($avgblood >= 30){
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="bloodpressmed" value="bloodpressmed" checked><label>&nbsp;Blood Pressure (if needed): &nbsp;&nbsp;</label> <input type="text" name="blood" style="width: 180px; height: 50px; float:left;"></div>';
              }else{
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="bloodpressmed" value="bloodpressmed"><label>&nbsp;Blood Pressure (if needed): &nbsp;&nbsp;</label> <input type="text" name="blood" style="width: 180px; height: 50px; float:left;"></div>';
              }
            ?>
            </div>

            <div class="row">
            <?php            
              if($avgother >= 30){
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="othermed" value="othermed" checked><label>&nbsp; Other : &nbsp; </label><textarea rows="5" cols="50" style="float:left;" name="medother" ></textarea></div>';
              }else{
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="othermed" value="othermed"><label>&nbsp; Other : &nbsp; </label><textarea rows="5" cols="50" style="float:left;" name="medother" ></textarea></div>';
              }
            ?>

            <?php
              if($avgtaking >= 30){
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="takingmed" value="takingmed" checked><label>&nbsp; Taking medicine : &nbsp; </label><input type="text" name="medtaking" style="width: 250px; height: 50px; float:left;"></div>';
              }else{
                echo '<div class="col-md-6"><input type="checkbox" style="float:left;" name="takingmed" value="takingmed"><label>&nbsp; Taking medicine : &nbsp; </label><input type="text" name="medtaking" style="width: 250px; height: 50px; float:left;"></div>';
              }
            ?>
            </div>

          <div class="row">
            <div class="col-md-6"><label>Personal Doctor : &nbsp;</label><input type="text" name="personalmed" style="width: 250px; height: 50px; float:left;"></div>
            <div class="col-md-6"><label>Tel : &nbsp;</label><input type="text" name="telmed" style="width: 350px; height: 50px; float:left;"></div>
          </div>

          <div class="row">
            <div class="col-md-12"><label>Remark : &nbsp; </label><textarea name="remarkmed" rows="5" cols="50" style="float:left;"></textarea></div>
            
          </div>

          <h4>Dental History</h4>
          <div class="row">
            <div class="col-md-12"><label>Chief Complaint : &nbsp;</label><input type="text" name="chiefdent" style="width: 700px; height: 50px; float:left;"></div>
          </div>
          
          <div class="row"> 
            <div class="col-md-12"><label>History of Present Illness : &nbsp; </label></b><textarea name="presentilldent" style="float:left;" rows="5" cols="50"></textarea></div>
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
      <h4>S.Subjective Symptoms</h4>
    <div class="row">
        <div class="col-md-2">
         <label>Pain intensity: </label> 
        </div>

         <div class="col-md-2">
          <input type="radio" name="paininten" style="float:left;" value="noneinten"><label>&nbsp; None</label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="paininten" style="float:left;" value="mildinten"><label> &nbsp; Mild </label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="paininten" style="float:left;" value="moderateinten"><label> &nbsp; Moderate </label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="paininten" style="float:left;" value="seversinten"><label> &nbsp; Severe </label>
         </div>

         <div class="col-md-2"></div>
      </div>

      <div class="row">
      <div class="col-md-2">
        <label>Pain Character: </label>
      </div>

      <div class="col-md-2">
        <input type="radio" name="painchar" style="float:left;" value="dullchar"><label>&nbsp; Dull</label>
      </div>

      <div class="col-md-2">
          <input type="radio" name="painchar" style="float:left;" value="sharpchar"><label> &nbsp; Sharp</label>
      </div>

      <div class="col-md-6">
          <input type="radio" name="painchar" style="float:left;" value="throbbingchar"><label> &nbsp; Throbbing</label>
      </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <label>Onset: </label>
        </div> 

        <div class="col-md-2">
          <input type="radio" name="onset" style="float:left;" value="spontaneousonset"><label>&nbsp; Spontaneous</label>
        </div>

        <div class="col-md-8">
          <input type="radio" name="onset" style="float:left;" value="stimulationonset"><label> &nbsp; Stimulation Required &nbsp;</label>
          <input type="text" id="onsetsti" name="onsetstimul" style="width: 300px; height: 50px; float:left;">
        </div>

        

     </div>

      <div class="row">
         <div class="col-md-2"><label>Duration: </label></div> 

         <div class="col-md-2">
          <input type="radio" name="duration" style="float:left;" value="secondsduration"><label>&nbsp; Seconds</label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="duration" style="float:left;" value="minutesduration"><label> &nbsp; Minutes</label> 
         </div>

         <div class="col-md-2">
          <input type="radio" name="duration" style="float:left;" value="hoursduration"><label> &nbsp; Hours </label> 
         </div>

         <div class="col-md-2">
          <input type="radio" name="duration" style="float:left;" value="intermittentduration"><label> &nbsp; Intermittent </label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="duration" style="float:left;" value="constantduration"><label> &nbsp; Constant </label>
         </div>
      </div>


      <div class="row">
         <div class="col-md-2"><label>Location: </label></div> 

         <div class="col-md-2">
          <input type="radio" name="location" style="float:left;" value="localizedlocat"><label>&nbsp; Localized</label>
         </div>

         <div class="col-md-2">
          <input type="radio" name="location" style="float:left;" value="diffusedlocat"><label> &nbsp; Diffused </label>
         </div>

         <div class="col-md-6">
          <input type="radio" name="location" style="float:left;" value="radiatinglocat"><label> &nbsp; Radiating to &nbsp; </label><input type="text" name="locatradiat" style="width: 250px; height: 50px; float:left;"> 
         </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
          <input type="radio" name="location" style="float:left;" value="referredlocat"><label> &nbsp; Referred to &nbsp; </label>
          <input type="text" name="refer" style="width: 250px; height: 50px; float:left;"> 
         </div>
      </div>

      <br><br>
        <h4>&nbsp;&nbsp;O.Objective Symptoms</h4>
      <div class="row">
      <div class="col-md-2">
          <label>&nbsp;&nbsp;&nbsp;Extraoral: </label>
      </div>   

      <div class="col-md-2">
          <input type="radio" name="extra" style="float:left;" value="facialextra"><label>&nbsp; Facial Swelling</label>
      </div>

      <div class="col-md-2">
          <input type="radio" name="extra" style="float:left;" value="lymphextra"><label>&nbsp; Lymph Node</label>
      </div>

      <div class="col-md-6">
          <input type="radio" name="extra" style="float:left;" value="extsinusextra"><label>&nbsp; Sinus Tract</label>
      </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
          <input type="radio" name="extra" style="float:left;" value="otherextra"><label>&nbsp; Other &nbsp;</label> 
          <textarea name="extraother" rows="5" cols="50" style="float:left;"></textarea>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-2">
         <label>&nbsp;&nbsp; Intraoral: </label>
         </div>

          <div class="col-md-5">
          <input type="radio" name="intra" style="float:left;" value="swellingintra"><label>&nbsp; Swelling (Soft/Firm) area &nbsp; </label><input type="text" name="intraswell" style="width: 200px; height: 50px; float:left;">
          </div>

          <div class="col-md-5">
          <input type="radio" style="float:left;" name="intra" value="sinusintra"><label>&nbsp; Sinus Tract at &nbsp; </label><input type="text" name="intrasinus" style="width: 250px; height: 50px; float:left;">
          </div>

      </div>

      <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Tooth: </label>
          </div>

          <div class="col-md-2">
          <input type="radio" name="tooth" style="float:left;" value="cariestooth"><label>&nbsp; Caries</label>
          </div>

          <div class="col-md-2">
          <input type="radio" name="tooth" style="float:left;" value="pulptoothex"><label>&nbsp; Pulp Exposure</label>
          </div>

          <div class="col-md-2">
          <input type="radio" name="tooth" style="float:left;" value="pulptoothpoly"><label>&nbsp; Pulp Polyp</label>
          </div>

          <div class="col-md-4">
          <input type="radio" name="tooth" style="float:left;" value="opentoothdrai"><label> &nbsp; Opened for Drainage</label>
          </div>

      </div>

      <div class="row">
          <div class="col-md-2"></div>

          <div class="col-md-2">
          <input type="radio" name="tooth" style="float:left;" value="temptooth"><label>&nbsp; Temp. Restoration</label>
          </div>

          <div class="col-md-8">
              <input type="radio" name="tooth" style="float:left;" value="restoothtoration"><label> &nbsp; Restoration with &nbsp; </label><input type="text" name="toothrestoration" style="width: 500px; height: 50px; float:left; ">
          </div>   
      </div>

      <div class="row">
          <div class="col-md-2"></div>

          <div class="col-md-5">
              <input type="radio" name="tooth" style="float:left;" value="fracturetoration"><label> &nbsp; Fracture at &nbsp; </label><input type="text" name="toothfractoration" style="width: 300px; height: 50px; float:left;">
          </div>            

          <div class="col-md-5">
              <input type="radio" name="tooth" style="float:left;" value="crowntooth"><label> &nbsp; Crown Discoloration to &nbsp; </label><input type="text" name="toothcrown" style="width: 200px; height: 50px; float:left;">
          </div> 
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <input type="radio" name="tooth" style="float:left;" value="othertooth"><label> &nbsp; Other &nbsp; </label><textarea type="text" name="toothother" rows="5" cols="50" style="float:left;"></textarea>
          </div>                
      </div>

      <br><br>
      <h4>&nbsp;&nbsp;Radiographic findings</h4>
      <div class="row">
        <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Crown: </label>
        </div>
        <div class="col-md-2">
              <input type="radio" name="crown" style="float:left;" value="normcrown"><label>&nbsp; Normal </label>
        </div>
        <div class="col-md-2">
              <input type="radio" name="crown" style="float:left;" value="restcrown"><label>&nbsp; Restoration </label>
        </div>
        <div class="col-md-2">
              <input type="radio" name="crown" style="float:left;" value="fractcrown"><label>&nbsp; Fracture </label>
        </div>
        
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
              <input type="radio" name="crown" style="float:left;" value="cariescrown"><label>&nbsp; Caries &nbsp;&nbsp;
              area &nbsp; </label><input type="text" name="crowarea" style="width: 100px; height: 50px; float:left;"><label>&nbsp; &nbsp;
              depth &nbsp; </label><input type="text" name="crowdepth" style="width: 100px; height: 50px; float:left;">
        </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <input type="radio" name="crown" style="float:left;" value="othercrown"><label>&nbsp; Other &nbsp; </label>
              <textarea type="text" name="crownother" rows="5" cols="50" style="float:left;"></textarea>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Pulp Chambar: </label>
          </div>
          <div class="col-md-2">
              <input type="radio" name="pulpcham" style="float:left;" value="normcham"><label>&nbsp; Normal </label>
          </div>

          <div class="col-md-2">
              <input type="radio" name="pulpcham" style="float:left;" value="stonecham"><label>&nbsp; Pulp Stone</label> 
          </div>

          <div class="col-md-2">
              <input type="radio" name="pulpcham" style="float:left;" value="rescham"><label>&nbsp; Resorption </label>
          </div>

          <div class="col-md-4">
          <input type="radio" name="pulpcham" style="float:left;" value="calcificatecham"><label>&nbsp; Calcification &nbsp;</label>
              <select style="height: 50px; float:left;">
                  <option value="partialchamber">Partial</option>
                  <option value="completechamber">Complete</option>
              </select>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <input type="radio" name="pulpcham" style="float:left;" value="otherchamber"><label>&nbsp; Other &nbsp;</label> 
              <textarea type="text" name="crownother" rows="5" cols="50" style="float:left;"></textarea>
          </div>
      </div>

       <div class="row">
        <div class="col-md-2">
          <label>&nbsp;&nbsp;&nbsp;Root: </label>
        </div>

        <div class="col-md-2">
              <input type="radio" name="root" style="float:left;" value="normroot"><label>&nbsp; Normal </label>
        </div>
        
        <div class="col-md-2">
              <input type="radio" name="root" style="float:left;" value="cariesroot"><label>&nbsp; Caries</label>
        </div>

        <div class="col-md-2">
              <input type="radio" name="root" style="float:left;" value="curvatureroot"><label>&nbsp; Curvature</label>
        </div>

        <div class="col-md-2">
              <input type="radio" name="root" style="float:left;" value="extresroot"><label>&nbsp; Ext. Resorption</label>
        </div>

        <div class="col-md-2">
              <input type="radio" name="root" style="float:left;" value="fractroot"><label>&nbsp; Fracture</label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <input type="radio" style="float:left;" name="root" value="otherroot"><label>&nbsp; Other &nbsp; </label>
            <textarea type="text" rows="5" cols="50" name="rootother" style="float:left;"></textarea>
        </div>
      </div>

      <div class="row">
          <div class="col-md-2"> 
            <label>Pulp Canal: </label>
          </div>

          <div class="col-md-2"> 
              <input type="radio" style="float:left;" name="pulpcan" value="normcanel"><label>&nbsp; Normal</label> 
          </div>

          <div class="col-md-2"> 
              <input type="radio" style="float:left;" name="pulpcan" value="resorpcanel"><label>&nbsp; Resorption</label>
          </div>

          <div class="col-md-2"> 
              <input type="radio" style="float:left;" name="pulpcan" value="perforcanel"><label>&nbsp; Perforation</label>
          </div>

          <div class="col-md-4">
              <input type="radio" style="float:left;" name="pulpcan" value="prevcanel"><label>&nbsp; Previous RCT</label>
          </div>

      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="pulpcan" value="brokecanel"><label>&nbsp; Broken Instrument</label>
          </div>
          <div class="col-md-6">
              <input type="radio" style="float:left;" name="pulpcan" value="calcificatecanel"><label>&nbsp; Calcification &nbsp;</label>
              <select style="height: 50px; float:left;">
                  <option value="partialcanel">Partial</option>
                  <option value="completecanel">Complete</option>
              </select>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <input type="radio" style="float:left;" name="pulpcan" value="othercanel"><label>&nbsp; Other &nbsp; </label>
              <textarea type="text" rows="5" cols="50" name="rootother" style="float:left;"></textarea>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Periradicular: </label>
          </div>
          <div class="col-md-2">
              <input type="radio" style="float:left;" name="perirad" value="normperirad"><label>&nbsp; Normal </label>
          </div>
          <div class="col-md-2">
              <input type="radio" style="float:left;" name="perirad" value="widenperirad"><label>&nbsp; Widening PDL </label>
          </div>
          <div class="col-md-3">
              <input type="radio" style="float:left;" name="perirad" value="lossperirad"><label>&nbsp; Loss of Lamina Dura </label>
          </div>

          <div class="col-md-3">
              <input type="radio" style="float:left;" name="perirad" value="resorpperirad"><label>&nbsp; Resorption </label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-2">
              <input type="radio" style="float:left;" name="perirad" value="apexperirad"><label>&nbsp; Open Apex </label>
          </div>
          <div class="col-md-2">
              <input type="radio" style="float:left;" name="perirad" value="osteoperirad"><label>&nbsp; OsteosIcerosis</label>
          </div>
          <div class="col-md-6">
              <input type="radio" style="float:left;" name="perirad" value="hyperperirad"><label>&nbsp; Hyperplasia of cementurn </label>
          </div>
      </div>          

      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-5">
              <input type="radio" style="float:left;" name="perirad" value="perialessperirad"><label>&nbsp; Periapical Lesion &nbsp;</label>
              <input type="text" name="periradperialess" style="width: 200px; height: 50px; float:left;"> 
          </div>

          <div class="col-md-5">
              <input type="radio" style="float:left;" name="perirad" value="laterlessperirad"><label>&nbsp; Lateral Lesion &nbsp;</label>
              <input type="text" name="periradlaterless" style="width: 200px; height:50px; float:left;"> 
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <input type="radio" style="float:left;" name="perirad" value="otherperirad"><label>&nbsp; Other &nbsp; </label>
              <textarea type="text" rows="5" cols="50" name="periradother" style="float:left;"></textarea>
          </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <label>&nbsp;&nbsp;&nbsp;Alveolar Bone: </label>
        </div>
        <div class="col-md-2">
              <input type="radio" style="float:left;" name="alveolar" value="normalveolar"><label>&nbsp; Normal </label>
        </div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="generalalveolar"><label>&nbsp; Generalized Bone loss </label>
          </div>
          <div class="col-md-4">
              <input type="radio" style="float:left;" name="alveolar" value="localalveolar"><label>&nbsp; Localized Bone loss</label>
          </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-5">
              <input type="radio" style="float:left;" name="perirad" value="otherperirad"><label>&nbsp; Other &nbsp; </label>
              <textarea rows="5" cols="50" style="float:left;" name="periradother"></textarea>
        </div>

        <div class="col-md-5">
              <label>Remarks: </label>
              <textarea rows="5" cols="50" style="float:left;" name="otherremark"></textarea>
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
<div class="panel-heading"><h3>Diagnosis</h3></div>
  <div class="panel-body">
      <h4>Pulpal Diagnosis</h4>
      <div class="row" style="height:30px;">
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="puldiagnorm" value="normalpuldiag" onclick="enable_pulpaldiag(this.checked)"><label>&nbsp; Normal </label>
          </div>

          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="puldiagrevers" value="reverspuldiag"><label>&nbsp; Reversible Pulpitis </label>
          </div>

          <div class="col-md-6">
              <input type="checkbox" style="float:left;" name="irrever" value="irreverpuldiag"><label>&nbsp; Irreversible Pulpitis </label>
          </div>
      </div>

      <div class="row" style="height:20px;">
          <div class="col-md-7"></div>
          <div class="col-md-5">
              <input type="checkbox" style="float:left;" name="symptomirrever" value="symptompuldiag" ><label>&nbsp; Symptomatic </label><br>
          </div>

      </div> 

      <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5">
              <input type="checkbox" style="float:left;" name="asymtomirrever" value="asymtompuldiag"> <label>&nbsp; Asymtomatic </label>
          </div>
      </div> 

      <div class="row">
          <div class="col-md-3"> 
              <input type="checkbox" style="float:left;" name="pulpnecrosis" value="pulpnecrosis"><label>&nbsp; Pulp Necrosis </label>
          </div>
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="previnitiat" value="prevnitiat"><label>&nbsp; Previously Initiated Therapy </label>
          </div>
          <div class="col-md-6">
              <input type="checkbox" style="float:left;" name="prevtreat" value="prevtreat"><label>&nbsp; Previously treated &nbsp;&nbsp;</label>
              <select style="height:50px; width: 110px; float:left;" name="prevselect">
                  <option value="improper">Improper</option>
                  <option value="incomplete">Incomplete RCT</option>
              </select>
          </div>
      </div>
     
      
      <h4>Periradicular Diagnosis</h4>
      <div class="row">
        <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="periraddiagnorm" value="normalperdiag" onclick="enable_periraddiag(this.checked)"><label>&nbsp; Normal </label>
        </div>

        <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="symptomperdiag" value="symptomperdiag"><label>&nbsp; Symptomatic Apical Periodontitis </label>
        </div>

        <div class="col-md-5">
              <input type="checkbox" style="float:left;" name="asymptomperdiag" value="asymptomperdiag"><label>&nbsp; Asymptomatic Apical Periodontitis</label>    
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="acuteperdiag" value="acuteperdiag"><label>&nbsp; Acute Apical Abscess </label>
        </div>

        <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="chronicperdiag" value="chronicperdiag"><label>&nbsp; Chronic Apical Abscess</label>
        </div>

        <div class="col-md-5">
                  <input type="checkbox" style="float:left;"  name="perdiag" value="otherperdiag"><label>&nbsp; Other &nbsp;</label> <textarea name="perdiagother" rows="5" cols="40" style="float:left;"></textarea>
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
<div class="panel-heading"><h3>Treatment Planning</h3></div>
<div class="panel-body">
  <div class="row">
    <div class="col-md-2">
      <input type="checkbox" style="float:left;" name="notreat" value="notreat" onclick="enable_treatment(this.checked)"><label>&nbsp; No Treatment</label>
    </div>

    <div class="col-md-3">
      <input type="checkbox" style="float:left;" name="pulpotomy" value="pulpotomy"><label>&nbsp;Pulpotomy &nbsp;</label>
          <select style="height: 50px; float:left;" name="pulposelect">
              <option value="partial">Partial</option>
              <option value="full">Full</option>
          </select>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="pulpectomy" value="pulpectomy"><label>&nbsp;Pulpectomy</label>
    </div>

    <div class="col-md-5">
        <input type="checkbox" style="float:left;" name="nonrootcanel" value="nonrootcanel"><label>&nbsp;Non-surgical Root Canel Treatment</label>
        
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="nonretreatment" value="nonretreatment"><label>&nbsp;Non-surgical Retreatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="apexification" value="apexification"><label>&nbsp;Apexification</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="intentional" value="intentional"><label>&nbsp;Intentional RCT</label>
    </div>

    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="rootcaneltreat" value="rootcaneltreat"><label>&nbsp;Surgical Root Canel Treatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="perio" value="perio"><label>&nbsp;Perio Consult</label>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
            <input type="checkbox" style="float:left;" name="othertreat" value="othertreat"><label>&nbsp; Other &nbsp;</label> <textarea name="periradother" rows="5" cols="50" style="float:left;"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
           <label>Plan for final restoration: </label>
           <textarea name="planrestor" rows="5" cols="50" style="float:left;"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
        <label>Pre-op treatment: </label>
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="cariesremove"><label>&nbsp; Caries Removal</label>  
    </div>

    <div class="col-md-2">
        <input type="radio" style="float:left;" name="preop" value="dam"><label>&nbsp; Dam </label>
    </div>

    <div class="col-md-6">
        <input type="radio" style="float:left;" name="preop" value="otherpreop"><label>&nbsp; Other &nbsp;</label>
        <textarea name="preopother" rows="5" cols="50" style="float:left;"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
        <label>Anesthesia: </label>
    </div>
    
    <div class="col-md-2">
        <input type="radio" style="float:left;" name="anesthesis" value="anesrequired"><label>&nbsp; Required</label>
    </div>    

    <div class="col-md-8">
         <input type="radio" style="float:left;" name="anesthesis" value="anesnotrequired"><label>&nbsp; Not required </label>
    </div>  
  </div>

  <div class="row">
    <div class="col-md-12">
        <label>X-ray file:</label>
        <input type="file" name="xrayfile" style="float:left;">
    </div>
  </div>

</div>
</div>
</div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="submit" name="submit" class="submit action-button" value="Submit" />
</fieldset>
</form>

<!-- Javascript -->
<script src="assets/js/multi-step-form.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>


</body>
</html>



<script type="text/javascript">
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

