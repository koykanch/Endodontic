<?php
session_start();
if(isset($_SESSION['username'])){
  $user = $_SESSION['username'];
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>บันทึกประวัติการรักษา</title>
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

function processendorec() {
    document.endodontic.action = 'processpict.php';
}

</script>

  <?php

  require('connect.php');
  if(isset($_POST['upload']))
  {
    
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
      
      // $sql = "INSERT INTO dent_hardcopy(hard_Date,hardcopyData) VALUES('2017-01-24','$image')";
      $res = $conn->query($sql);

      if($res){
        ?>  
          <script>
            window.alert('Success....');
          </script>
        <?php
      }else
      { 
        ?>  
          <script>
            window.alert('Unsuccess!!!');
          </script>
        <?php
      }
    }
         
  }

  if(isset($_POST['submit3'])){
    require('class.php');
    $image1 = $_FILES['f1']['name'];

    $image = imagecreatefromjpeg($image1);
    imagefilter($image, IMG_FILTER_GRAYSCALE); //first, convert to grayscale
    imagefilter($image, IMG_FILTER_CONTRAST, -255); //then, apply a full contrast
    //imagejpeg($image);

    $check = new Check;

   // echo "<--------------------------------------None------------------------------------------------><br><br>";
    $check->CheckNone($image,$conn);
      $cnone0 = $_SESSION['count0'];
     // // echo "Number of black color (0) = ".$cnone0."<br>";

       $avgnone = $_SESSION['avgnone'];
       // echo "average percent of white color = ".$avgnone."<br>";
       // echo "<br><br><br><br>";
       $_SESSION['avgnone'] = $avgnone;

   // echo "<---------------------------------Cardiovascular Diseases----------------------------------><br><br>";
    $check->Checkcardiovascular($image,$conn);
      $ccardio0 = $_SESSION['count0'];
      $avgcardio = $_SESSION['avgcardio'];
    // // echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgcardio."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgcardio'] = $avgcardio;

   // echo "<-------------------------------------Pulmonary Diseases-----------------------------------><br><br>";
    $check->CheckPulmonary($image,$conn);
      $cpul0 = $_SESSION['count0'];
      $avgpul = $_SESSION['avgpul'];
  //  //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgpul."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgpul'] = $avgpul;


   // echo "<--------------------------------Gastrointestinal Diseases---------------------------------><br><br>";
    $check->CheckGastro($image,$conn);
      $cgastro0 = $_SESSION['count0'];
      $avggastro = $_SESSION['avggastro'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avggastro."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avggastro'] = $avggastro;

   // echo "<------------------------------------Hematologic Diseases---------------------------------><br><br>";
    $check->CheckHematologic($image,$conn);
      $chema0 = $_SESSION['count0'];
      $avghema = $_SESSION['avghema'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avghema."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avghema'] = $avghema;

   // echo "<------------------------------------Neurologic Diseases---------------------------------><br><br>";
    $check->CheckNeurologic($image,$conn);
      $cneuro0 = $_SESSION['count0'];
      $avgneuro = $_SESSION['avgneuro'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgneuro."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgneuro'] = $avgneuro;

   // echo "<------------------------------------Allergic to---------------------------------><br><br>";
    $check->CheckAllergic($image,$conn);
      $callergic0 = $_SESSION['count0'];
      $avgallergic = $_SESSION['avgallergic'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgallergic."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgallergic'] = $avgallergic;

   // echo "<------------------------------------Blood Pressure------------------------------><br><br>";
    $check->CheckBlood($image,$conn);
      $cblood0 = $_SESSION['count0'];
      $avgblood = $_SESSION['avgblood'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgblood."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgblood'] = $avgblood;

   // echo "<---------------------------------------Other------------------------------------><br><br>";
    $check->CheckOther($image,$conn);
      $cother0 = $_SESSION['count0'];
      $avgother = $_SESSION['avgother'];
  //  //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgallergic."<br>";
      // echo "<br><br><br><br>";
      $_SESSION['avgother'] = $avgother;

  //  echo "<-----------------------------------Taking Medicine------------------------------><br><br>";
    $check->CheckTaking($image,$conn);
      $ctaking0 = $_SESSION['count0'];
      $avgtaking = $_SESSION['avgtaking'];
   // //  echo "Number of black color (0) = ".$cpul0."<br>";
      // echo "average percent of white color = ".$avgtaking."<br>";
      // echo "<br><br><br><br>";
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
require ('class_endodontic.php');

$patient = new Patient;
$stu = new Student;
$instruc = new Dentist;
$endo = new Endodontic;
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
      <!-- <input type="submit" class="btn btn-info" name="upload" value="UPLOAD" disabled> -->
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
                  <select name="HNpatient" style="width: 300px; height:50px; float:left;">
                     <?php $patient->SearchHN($conn); ?>
                  </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"><label>Tooth: &nbsp;&nbsp;</label>
                <input type="text" style="width: 100px; height: 50px; float:left;" name="tooth" maxlength="2"></div>
            </div>

            <div class="row">
               <div class="col-md-12"><label>Dental student: &nbsp;&nbsp;</label>
                  <select name="codestudent" style="width: 300px; height:50px; float:left;">
                    <?php
                      $user_student = "SELECT * FROM dentalstudent_info WHERE student_code = '$user'";
                      $resuser_stu = $conn->query($user_student);
                      $objuser_stu = mysqli_fetch_array($resuser_stu);
                      if(isset($objuser_stu['student_code'])){
                        ?>
                          <option value="<?php echo $objuser_stu['student_code']; ?>">
                            <?php echo $objuser_stu['student_code']; ?> : <?php echo $objuser_stu['student_name']; ?>   
                          </option> <?php
                      }else{
                          $stu->searchstu($conn); 
                      }
                      ?>
                  </select>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12"><label> Instructor: &nbsp;&nbsp;</label>
                  <select name="dentname" style="width: 300px; height:50px; float:left;">
                    <?php
                      $user_instruc = "SELECT * FROM dentist_info WHERE dentId = '$user'";
                      $resuser_instruc = $conn->query($user_instruc);
                      $objuser_instruc = mysqli_fetch_array($resuser_instruc);

                      if(isset($objuser_instruc['dentId'])){
                        ?>
                          <option value="<?php echo $objuser_instruc['dentId']; ?>">
                            <?php echo $objuser_instruc['dentId']; ?> : <?php echo $objuser_instruc['dent_name']; ?>
                          </option> <?php
                      }else{
                         $instruc->searchdent($conn); 
                      }
                    ?>
                  </select>
               </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                <?php
                date_default_timezone_set('Asia/Bangkok');
                  $insert_datetime = date('Y-m-d H:i:s');
                  $insert_date = substr($insert_datetime, 0,10);
                  $insert_time = substr($insert_datetime, 11,12);
                ?>
                  <label>Date: &nbsp;&nbsp;</label>
                  <input type="date" name="demo" style="width:200px; float:left;" value="<?php echo $insert_date; ?>">
                  <!-- <div type="text" id="demo" name="demo" style="width:200px; float:left;"> -->
                </div>
            </div>
               
            <div class="row">
                <div class="col-md-12">
                  <label>Time:&nbsp;</label>
                  <input type="time" name="endo_time" step="1" style="float:left;" value="<?php echo $insert_time; ?>">
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
              error_reporting(0);
              if($avgnone >= 30){
                echo'
              <div class="col-md-2"><input type="checkbox" onclick="enable_text(this.checked)" style="float:left;" name="nonemed" value="1" checked><label>&nbsp;None</label></div>';
              }else{
                echo'
              <div class="col-md-2"><input type="checkbox" onclick="enable_text(this.checked)" style="float:left;" name="nonemed" value="1"><label>&nbsp;None</label></div>';
              }
            ?>

            <?php 
            error_reporting(0);
              if($avgcardio >= 30){ 
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="cardiodismed" value="1" checked><label>&nbsp;Cardiovascular Diseases</label></div>';
              }else{
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="cardiodismed" value="1"><label>&nbsp;Cardiovascular Diseases</label></div>';
              }
            ?>

            <?php
            error_reporting(0);
              if($avgpul >= 30){
                echo'
                <div class="col-md-3"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="1" checked><label>&nbsp;Pulmonary Diseases</label></div>';
              }else{
                echo'
                <div class="col-md-3"><input type="checkbox" style="float:left;" name="pulmonarydismed" value="1"><label>&nbsp;Pulmonary Diseases</label></div>';
              }
            ?>
            
            <?php
            error_reporting(0);
              if($avggastro >= 30){
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="gastrodismed" value="1" checked><label>&nbsp;Gastrointestinal Diseases</label></div>';
              }else{
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="gastrodismed" value="1"><label>&nbsp;Gastrointestinal Diseases</label></div>';
              }
            ?>  

            </div>  
          
            <div class="row">
            <?php
            error_reporting(0);
              if($avghema >= 30){
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="hemadismed" value="1" checked><label>&nbsp;Hematologic Diseases</label></div>';
              }else{
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="hemadismed" value="1"><label>&nbsp;Hematologic Diseases</label></div>';
              }
            ?> 

            <?php
            error_reporting(0);
              if($avgneuro >= 30){
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="neurodismed" value="1" checked><label>&nbsp;Neurologic Diseases</label></div>';
              }else{
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="neurodismed" value="1"><label>&nbsp;Neurologic Diseases</label></div>';
              }
            ?>

            <?php 
            error_reporting(0);
              if($avgallergic >= 30){
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="allergicmed" value="allergicmed" checked><label>&nbsp; Allergic to : &nbsp;&nbsp;</label><input type="text" name="allermed" style="width: 100px; height: 30px; float:left;"></div>';
              }else{
                echo '<div class="col-md-3"><input type="checkbox" style="float:left;" name="allergicmed" value="allergicmed"><label>&nbsp; Allergic to : &nbsp;&nbsp;</label><input type="text" name="allermed" style="width: 100px; height: 30px; float:left;"></div>';
              }
              ?>

            </div>

            <div class="row">
            <?php
            error_reporting(0);
              if($avgblood >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="bloodpressmed" value="bloodpressmed" checked><label>&nbsp;Blood Pressure: &nbsp;</label> 
                <select name="blood1" style="width:60px; height:30px; float:left;">';
                  for($i=0; $i<=250; $i++){
                    echo '<option value="<?php echo $i ?>">'.$i.'</option>';
                  }

                echo '</select>

                <label style="font-size: 25px;">/</label>
                <select name="blood2" style="width:60px; height:30px; float:left;">';
                  for($i=0; $i<=250; $i++){
                    echo '<option value="<?php echo $i ?>">'.$i.'</option>';
                  }
                echo '</select>
                </div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="bloodpressmed" value="bloodpressmed"><label>&nbsp;Blood Pressure: &nbsp;</label> 

                <select name="blood1" style="width:60px; height:30px; float:left;">';
                  for($i=0; $i<=250; $i++){
                    echo '<option>'.$i.'</option>';
                  }

                echo '</select>
          
                <label style="font-size: 25px;">/</label>
                <select name="blood2" style="width:60px; height:30px; float:left;">';
                  for($i=0; $i<=250; $i++){
                    echo '<option>'.$i.'</option>';
                  }
                echo '</select>
                </div>';
              }
            ?>

            <?php     
            error_reporting(0);       
              if($avgother >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="othermed" value="othermed" checked><label>&nbsp; Other : &nbsp; </label><textarea rows="2" cols="20" style="float:left;" name="medother" ></textarea></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="othermed" value="othermed"><label>&nbsp; Other : &nbsp; </label><textarea rows="2" cols="20" style="float:left;" name="medother" ></textarea></div>';
              }
            ?>

            <?php
            error_reporting(0);
              if($avgtaking >= 30){
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="takingmed" value="takingmed" checked><label>&nbsp; Taking medicine : &nbsp; </label><input type="text" name="medtaking" style="width: 150px; height: 50px; float:left;"></div>';
              }else{
                echo '<div class="col-md-4"><input type="checkbox" style="float:left;" name="takingmed" value="takingmed"><label>&nbsp; Taking medicine : &nbsp; </label><input type="text" name="medtaking" style="width: 150px; height: 50px; float:left;"></div>';
              }
            ?>
            </div>

          <div class="row">
            <div class="col-md-6"><label>Personal Doctor : &nbsp;</label><input type="text" name="personalmed" style="width: 250px; height: 50px; float:left;"></div>

            <div class="col-md-6"><label>Tel : &nbsp;</label><input type="text" name="telmed" style="width: 350px; height: 50px; float:left;"></div>
          </div>

          <div class="row">
            <div class="col-md-12"><label>Remark : &nbsp; </label><textarea name="remarkmed" rows="4" cols="50" style="float:left;"></textarea></div>
            
          </div>

          <h4>Dental History</h4>
          <div class="row">
            <div class="col-md-12"><label>Chief Complaint : &nbsp;</label><input type="text" name="chiefdent" style="width: 450px; height: 50px; float:left;"></div>
          </div>
          
          <div class="row"> 
            <div class="col-md-12"><label>History of Present Illness : &nbsp; </label></b><textarea name="presentilldent" style="float:left;" rows="4" cols="50"></textarea></div>
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

        <div class="col-md-10">
         <select name="paininten" style="float:left; padding: .5em;">
           <?php $endo->selpaininten($conn); ?>
         </select>
        </div>

    </div>

    <div class="row">
      <div class="col-md-2">
        <label>Pain Character: </label>
      </div>

      <div class="col-md-10">
         <select name="paincharacter" style="float:left; padding: .5em;">
           <?php $endo->selpaincharact($conn); ?>
         </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1">
            <label>Onset: </label>
        </div> 

        <div class="col-md-2">
          <input type="checkbox" name="onset_spont" style="float:left;" value="1"><label>&nbsp; Spontaneous</label>
        </div>

        <div class="col-md-5">
          <input type="checkbox" name="onset_stimu" style="float:left;" value="1"><label> &nbsp; Stimulation Required &nbsp;</label>
          <select name="stimulation" style="float:left; padding: .5em;">
           <?php $endo->selstimulation($conn); ?>
         </select>
          <!--<input type="text" id="onsetsti" name="onsetstimul" style="width: 300px; height: 50px; float:left;"> -->
        </div>

        <div class="col-md-4">
          <label>Other &nbsp;</label><input type="text" name="onset_other" style="float:left;">
        </div>
    </div>

    <div class="row">
         <div class="col-md-2"><label>Duration: </label></div> 

         <div class="col-md-10">
         <select name="duration" style="float:left; padding: .5em;">
           <?php $endo->selduration($conn); ?>
         </select>
        </div>
      </div>


      <div class="row">
         <div class="col-md-2"><label>Location: </label></div> 

         <div class="col-md-10">
         <select name="location" style="float:left; padding: .5em;">
           <?php $endo->sellocation($conn); ?>
         </select>
        </div>
      </div>

      <div class="row">
      <div class="col-md-2"></div>
         <div class="col-md-10">
          <input type="checkbox" name="locat_radiating" style="float:left;" value="radiatinglocat"><label> &nbsp; Radiating to &nbsp; </label><input type="text" name="locatradiat" style="width: 250px; height: 50px; float:left;"> 
         </div> 
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <input type="checkbox" name="locat_referred" style="float:left;" value="referredlocat"><label> &nbsp; Referred to &nbsp; </label>
        <input type="text" name="refer" style="width: 250px; height: 50px; float:left;"> 
       </div>
      </div>

      <br><br>
        <h4>O.Objective Symptoms</h4>
      <div class="row">
      <div class="col-md-3">
         <label>&nbsp; Extraoral: </label>
      </div>

      <div class="col-md-3">
          <input type="checkbox" name="extrafacial_check" style="float:left;" value="1">
          <label>&nbsp;&nbsp;Facial Swelling </label>
      </div>   

      <!--<div class="col-md-9">
        <select name="extrafacial" style="float:left; padding: .5em;">
        
          // $endo->selextrafacial($conn);
        
        </select>
      </div> 
      </div>-->

        <div class="col-md-3">
            <input type="checkbox" name="extralymph_check" style="float:left;" value="1">
            <label>&nbsp;&nbsp;Lymph Node </label>
        </div>   

      <!--  <div class="col-md-9">
          <select name="extralymphnode" style="float:left; padding: .5em;">
          
          //  $endo->selextralymphnode($conn);
          
          </select>
        </div> 
      </div>-->

      
        <div class="col-md-3">
            <input type="checkbox" name="extrasinus_check" style="float:left;" value="1">
            <label>&nbsp;&nbsp;Sinus Tract </label>
        </div>   

      <!--  <div class="col-md-9">
          <select name="extrasinus" style="float:left; padding: .5em;">
          
           // $endo->selextrasinus($conn);
          
          </select> 
        </div>-->
      </div>
      
      <div class="row">
          <div class="col-md-3">
              <label>&nbsp; Other: &nbsp;</label> 
          </div>
          <div class="col-md-9">
              <textarea name="extraother" rows="3" cols="50" style="float:left;"></textarea>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-2">
         <label>&nbsp;&nbsp; Intraoral: </label>
         </div>

          <div class="col-md-5">
          <select name="swellsoftorfirm" style="float:left; padding: .5em;">
            <option value="">select swelling</option>
            <option value="0">Soft</option>
            <option value="1">Firm</option>
          </select>
         
          <label>&nbsp;&nbsp; area &nbsp; </label><input type="text" name="intraswell_area" style="width: 100px; height: 40px; float:left;">
          </div>

          <div class="col-md-5">
          <input type="radio" style="float:left;" name="intra_sinus" value="1"><label>&nbsp; Sinus Tract at &nbsp; </label><input type="text" name="intrasinus" style="width: 100px; height: 40px; float:left;">
          </div>

      </div>

      <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Tooth: </label>
          </div>

          <div class="col-md-2">
          <input type="checkbox" name="cariestooth" style="float:left;" value="1"><label>&nbsp; Caries</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" name="restoothtoration" style="float:left;" value="1"><label> &nbsp; Restoration with &nbsp; </label><input type="text" name="toothrestoration" style="width: 100px; height: 20px; float:left; ">
          </div>   

          <div class="col-md-2">
          <input type="checkbox" name="pulptoothex" style="float:left;" value="1"><label>&nbsp; Pulp Exposure</label>
          </div>

          <div class="col-md-2">
          <input type="checkbox" name="pulptoothpoly" style="float:left;" value="1"><label>&nbsp; Pulp Polyp</label>
          </div>
      </div>

      <br>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-3">
              <input type="checkbox" name="fracturetoration" style="float:left;" value="1"><label> &nbsp; Fracture at &nbsp; </label>
              <input type="text" name="toothfractoration" style="width: 100px; height: 20px; float:left;">
          </div>

          <div class="col-md-4">
              <input type="checkbox" name="crowntooth" style="float:left;" value="1"><label> &nbsp; Crown Discoloration to &nbsp; </label><input type="text" name="toothcrown" style="width: 100px; height: 20px; float:left;">
          </div> 

          <div class="col-md-3">
          <input type="checkbox" name="opentoothdrai" style="float:left;" value="1"><label> &nbsp; Opened for Drainage</label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
        

          <div class="col-md-3">
          <input type="checkbox" name="temptooth" style="float:left;" value="1"><label>&nbsp; Temp. Restoration</label>
          </div>

          <div class="col-md-7">
              <label> &nbsp; Other: &nbsp; </label><textarea type="text" name="toothother" rows="3" cols="50" style="float:left;"></textarea>
          </div>                
      </div>

      <br><br>
      <h4>Examination</h4>
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
              <td><input type="text" name="numtooth1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="epttooth1" style="width: 50px; height:30px;"></td>
              <td>
                <select name="cold1" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="heat1" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="perc1" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="palp1" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="mobility1" style="width: 55px;">
                 <option value="">Please select</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                </select>
              </td>
              <td><input type="text" name="probe_mb1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_b1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_db1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_ml1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_l1" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_dl1" style="width: 50px; height:30px;"></td>
              <td>
                <select name="special_test1" style="float:left; width:100px;">
                  <?php
                    $endo->selspecialtest($conn);
                  ?>
                </select>
              </td>
            </tr>

            <tr>
              <td><input type="text" name="numtooth2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="epttooth2" style="width: 50px; height:30px;"></td>
              <td>
                <select name="cold2" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="heat2" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="perc2" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="palp2" style="width: 55px;">
                  <option value="">Please select</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              </td>

              <td>
                <select name="mobility2" style="width: 55px;">
                 <option value="">Please select</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                </select>
              </td>
              <td><input type="text" name="probe_mb2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_b2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_db2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_ml2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_l2" style="width: 50px; height:30px;"></td>
              <td><input type="text" name="probe_dl2" style="width: 50px; height:30px;"></td>
              <td>
                <select name="special_test2" style="float:left; width:100px;">
                  <?php
                    $endo->selspecialtest($conn);
                  ?>
                </select>
              </td>
            </tr>
            
        </table>

      <!-- <div class="row" style="height: 80px;">
        <div class="col-md-2">
            <label>Tooth : &nbsp;</label>
            <input type="text" name="numtooth" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-2">
            <label>EPT : &nbsp;</label>
            <input type="text" name="epttooth" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-2">
            <input type="checkbox" name="checkcold" value="1" style="float:left;">
            <label>&nbsp; Cold </label>
        </div>

        <div class="col-md-2">
            <input type="checkbox" name="checkheat" value="1" style="float:left;">
            <label>&nbsp; Heat </label>
        </div>

        <div class="col-md-2">
            <input type="checkbox" name="checkperc" value="1" style="float:left;">
            <label>&nbsp; Perc<sup>n</sup> </label>
        </div>

        <div class="col-md-2">
            <input type="checkbox" name="checkpalp" value="1" style="float:left;">
            <label>&nbsp; Palp<sup>n</sup> </label>
        </div>
      </div>

      <div class="row" style="height: 80px;">
        <div class="col-md-2">
          <label>Mobility : &nbsp;</label>
          <select name="mobility" style="float:left; height:50px;">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
          </select>
        </div>

        <div class="col-md-3">
          <label>Perio Probe of MB : &nbsp;</label>
          <input type="text" name="probe_mb" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-3">
          <label>Perio Probe of B : &nbsp;</label>
          <input type="text" name="probe_b" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-4">
          <label>Perio Probe of DB : &nbsp;</label>
          <input type="text" name="probe_db" style="width: 80px; height: 50px; float:left;">
        </div>
      </div>

      <div class="row" style="height: 80px;">
        <div class="col-md-3">
          <label>Perio Probe of ML : &nbsp;</label>
          <input type="text" name="probe_ml" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-3">
          <label>Perio Probe of L : &nbsp;</label>
          <input type="text" name="probe_l" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-3">
          <label>Perio Probe of DL : &nbsp;</label>
          <input type="text" name="probe_dl" style="width: 80px; height: 50px; float:left;">
        </div>

        <div class="col-md-3">
          <input type="checkbox" name="spectest" value="1" style="float:left;">
          <label>Special Test: &nbsp;</label>
          <select name="special_test" style="float:left; width:100px; height:50px;">
            
             //  $endo->selspecialtest($conn);
            
          </select>
        </div>
      </div> -->

      <br><br>
      <h4>&nbsp;&nbsp;Radiographic findings</h4>
      <div class="row">
        <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Crown: </label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="normcrown" style="float:left;" value="1" onclick="enable_radiocrown(this.checked)"><label>&nbsp; Normal </label>
        </div>

        <div class="col-md-4">
              <input type="checkbox" name="cariescrown" style="float:left;" value="1"><label>&nbsp; Caries &nbsp;&nbsp;
              area &nbsp; </label><input type="text" name="crowarea" style="width: 60px; height: 30px; float:left;"><label>&nbsp; &nbsp;
              depth &nbsp; </label><input type="text" name="crowdepth" style="width: 60px; height: 30px; float:left;">
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="restcrown" style="float:left;" value="1"><label>&nbsp; Restoration </label>
        </div>
        <div class="col-md-2">
              <input type="checkbox" name="fractcrown" style="float:left;" value="1"><label>&nbsp; Fracture </label>
        </div>
        
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <label>Other : &nbsp; </label>
              <textarea name="crownother" rows="3" cols="50" style="float:left;"></textarea>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2">
            <label>&nbsp;&nbsp;&nbsp;Pulp Chamber: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" name="normcham" style="float:left;" value="1" onclick="enable_radiopulpcham(this.checked)"><label>&nbsp; Normal </label>
          </div>

          <div class="col-md-4">
          <input type="checkbox" name="calcificatecham" style="float:left;" value="1"><label>&nbsp; Calcification &nbsp;</label>
              <select name="partialorcomp" style="height: 40px; float:left;">
                  <option value="0">Partial</option>
                  <option value="1">Complete</option>
              </select>
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="stonecham" style="float:left;" value="1"><label>&nbsp; Pulp Stone</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" name="rescham" style="float:left;" value="1"><label>&nbsp; Resorption </label>
          </div>
      </div>

      <br>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <label>Other &nbsp;</label> 
              <textarea name="pulpchamother" rows="3" cols="50" style="float:left;"></textarea>
          </div>
      </div>

       <div class="row">
        <div class="col-md-2">
          <label>&nbsp;&nbsp;&nbsp;Root: </label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="normroot" style="float:left;" value="1" onclick="enable_root(this.checked)"><label>&nbsp; Normal </label>
        </div>
        
        <div class="col-md-2">
              <input type="checkbox" name="cariesroot" style="float:left;" value="1"><label>&nbsp; Caries</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="curvatureroot" style="float:left;" value="1"><label>&nbsp; Curvature</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="extresroot" style="float:left;" value="1"><label>&nbsp; Ext. Resorption</label>
        </div>

        <div class="col-md-2">
              <input type="checkbox" name="fractroot" style="float:left;" value="1"><label>&nbsp; Fracture</label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <label>Other &nbsp; </label>
            <textarea rows="3" cols="50" name="root_other" style="float:left;"></textarea>
        </div>
      </div>

      <div class="row">
          <div class="col-md-2"> 
            <label>&nbsp;&nbsp;&nbsp;Pulp Canal: </label>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="normcanel" value="1" onclick="enable_pulpcanal(this.checked)"><label>&nbsp; Normal</label> 
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="calcificatecanel" value="1"><label>&nbsp; Calcification &nbsp;</label>
              <select name="select_cal" style="height: 40px; float:left;">
                  <option value="0">Partial</option>
                  <option value="1">Complete</option>
              </select>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="resorpcanel" value="1"><label>&nbsp; Resorption</label>
          </div>

          <div class="col-md-2"> 
              <input type="checkbox" style="float:left;" name="perforcanel" value="1"><label>&nbsp; Perforation</label>
          </div>
      </div>

      <br>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="prevcanel" value="1"><label>&nbsp; Previous RCT</label>
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="brokecanel" value="1"><label>&nbsp; Broken Instrument</label>
          </div>

          <div class="col-md-4">
              <label>Other &nbsp; </label>
              <textarea type="text" rows="3" cols="30" name="pulpcanother" style="float:left;"></textarea>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2">
              <label>&nbsp;&nbsp;&nbsp;Periradicular: </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="normperirad" value="1" onclick="enable_periradicular(this.checked)"><label>&nbsp; Normal </label>
          </div>
          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="widenperirad" value="1"><label>&nbsp; Widening PDL </label>
          </div>
          <div class="col-md-3">
              <input type="checkbox" style="float:left;" name="lossperirad" value="1"><label>&nbsp; Loss of Lamina Dura </label>
          </div>
      </div>

      <br>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="perialessperirad" value="1"><label>&nbsp; Periapical Lesion &nbsp;</label>
              <input type="text" name="periradperialess1" style="width: 50px; height: 20px; float:left;"><label><label style="font-size: 20px;"> X </label>&nbsp;
              <input type="text" name="periradperialess2" style="width: 50px; height: 20px; float:left;">
                <label>&nbsp; mm &nbsp;</label> 
          </div>

          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="laterlessperirad" value="1"><label>&nbsp; Lateral Lesion &nbsp;</label>
              <input type="text" name="laterlessperirad1" style="width: 60px; height:20px; float:left;">&nbsp;<label style="font-size: 20px;"> X </label>&nbsp;
              <input type="text" name="laterlessperirad2" style="width: 60px; height:20px; float:left;"><label>
              &nbsp; mm &nbsp;</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="resorpperirad" value="1"><label>&nbsp; Resorption </label>
          </div>
      </div>          

      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="apexperirad" value="1"><label>&nbsp; Open Apex width &nbsp;</label>
              <input type="text" name="apexperirad_width" style="width: 100px; height:20px; float:left;"><label>&nbsp; mm &nbsp;</label> 
          </div>

          <div class="col-md-2">
              <input type="checkbox" style="float:left;" name="osteoperirad" value="1"><label>&nbsp; OsteosIcerosis</label>
          </div>
          <div class="col-md-4">
              <input type="checkbox" style="float:left;" name="hyperperirad" value="1"><label>&nbsp; Hyperplasia of cementurn </label>
          </div>
      </div>

      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
              <label>Other &nbsp; </label>
              <textarea rows="3" cols="50" name="perother" style="float:left;"></textarea>
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
              <label>Other &nbsp; </label>
              <textarea rows="3" cols="40" style="float:left;" name="alveolarother"></textarea>
        </div>
      </div>

      <br><br>
      <h4>&nbsp;&nbsp;Remarks &nbsp;</h4>
        <textarea rows="3" cols="40" style="float:left; margin-left:2em;" name="otherremark"></textarea>

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
  <div class="row">
    <div class="col-md-6">
      <h4>Pulpal Diagnosis</h4>
      <div class="row" style="height:20px;">
          <div class="col-md-11">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="puldiagnorm" value="1" onclick="enable_pulpaldiag(this.checked)"><label>&nbsp; Normal </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="reverOrirrever" value="0"><label>&nbsp; Reversible Pulpitis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="reverOrirrever" value="1"><label>&nbsp; Irreversible Pulpitis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-5">
              <input type="radio" style="float:left; margin-left: 4em;" name="sympOrasymp" value="1" ><label>&nbsp; Symptomatic </label><br>
          </div>
      </div> 

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-5">
              <input type="radio" style="float:left; margin-left: 4em;" name="sympOrasymp" value="0"> <label>&nbsp; Asymtomatic </label>
          </div>
      </div> 

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-6"> 
              <input type="checkbox" style="float:left; margin-left: 2em;" name="pulpnecrosis" value="1"><label>&nbsp; Pulp Necrosis </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-7">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="previnitiat" value="1"><label>&nbsp; Previously Initiated Therapy </label>
          </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
          <div class="col-md-10">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="prevtreat" value="1"><label>&nbsp; Previously treated &nbsp;&nbsp;</label>
              <select style="height:40px; width: 120px; float:left;" name="prevselect">
                  <option value="0">Improper</option>
                  <option value="1">Incomplete RCT</option>
              </select>
          </div>
      </div>
     </div>


     <div class="col-md-6">
      <h4>Periradicular Diagnosis</h4>
      <div class="row" style="height:20px;">
        <div class="col-md-3">
              <input type="checkbox" style="float:left; margin-left: 2em;" name="periraddiagnorm" value="1" onclick="enable_periraddiag(this.checked)"><label>&nbsp; Normal </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-10">
              <input type="radio" style="float:left; margin-left: 2em;" name="per_sympOrasymp" value="0"><label>&nbsp; Symptomatic Apical Periodontitis </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-10">
              <input type="radio" style="float:left; margin-left: 2em;" name="per_sympOrasymp" value="1"><label>&nbsp; Asymptomatic Apical Periodontitis</label>    
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="acuteOrchronic" value="0"><label>&nbsp; Acute Apical Abscess </label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-6">
              <input type="radio" style="float:left; margin-left: 2em;" name="acuteOrchronic" value="1"><label>&nbsp; Chronic Apical Abscess</label>
        </div>
      </div>

      <br>
      <div class="row" style="height:20px;">
        <div class="col-md-12">
                <label style="margin-left: 2em;">&nbsp; Other : &nbsp;</label> <textarea name="perdiagother" rows="3" cols="40" style="float:left;"></textarea>
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
<div class="sect-container">
<div class="panel panel-info">
<div class="panel-heading"><h3>Treatment Planning</h3></div>
<div class="panel-body">
  <div class="row">
    <div class="col-md-2">
      <input type="checkbox" style="float:left;" name="notreat" value="1" onclick="enable_treatment(this.checked)"><label>&nbsp; No Treatment</label>
    </div>

    <div class="col-md-3">
      <input type="checkbox" style="float:left;" name="pulpotomy" value="1"><label>&nbsp;Pulpotomy &nbsp;</label>
          <select style="height: 50px; float:left;" name="pulposelect">
              <option value="0">Partial</option>
              <option value="1">Full</option>
          </select>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="pulpectomy" value="1"><label>&nbsp;Pulpectomy</label>
    </div>

    <div class="col-md-5">
        <input type="checkbox" style="float:left;" name="nonrootcanel" value="1"><label>&nbsp;Non-surgical Root Canel Treatment</label>
        
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="nonretreatment" value="1"><label>&nbsp;Non-surgical Retreatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="apexification" value="1"><label>&nbsp;Apexification</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="intentional" value="1"><label>&nbsp;Intentional RCT</label>
    </div>

    <div class="col-md-3">
        <input type="checkbox" style="float:left;" name="rootcaneltreat" value="1"><label>&nbsp;Surgical Root Canel Treatment</label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="perio" value="1"><label>&nbsp;Perio Consult</label>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
            <label>&nbsp; Other : &nbsp;</label> <textarea name="periradother" rows="3" cols="50" style="float:left;"></textarea>
    </div>
  </div><br><br><br><br><br><br>


  <div class="row">
    <div class="col-md-12">
           <label>Plan for final restoration: </label>
           <textarea name="planrestor" rows="5" cols="50" style="float:left;"></textarea>
    </div>
  </div><br><br><br><br><br><br><br>


  <div class="row">
    <div class="col-md-2">
        <label>Pre-op treatment: </label>
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="preop_carie" value="1"><label>&nbsp; Caries Removal</label>  
    </div>

    <div class="col-md-2">
        <input type="checkbox" style="float:left;" name="preop_dam" value="1"><label>&nbsp; Dam </label>
    </div>

    <div class="col-md-6">
        <label>&nbsp; Other :  &nbsp;</label>
        <textarea name="preopother" rows="3" cols="50" style="float:left; "></textarea>
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
  </div><br><br><br>

  <div class="row">
    <div class="col-md-5">
        <label>X-ray file:&nbsp;</label>
        <input type="file" name="xrayfile" style="float:left; width:200px;">
    </div>

    <div class="col-md-4">
        <label>X-ray date:&nbsp;</label>
        <input type="date" name="xraydate" style="float:left;" value="<?php echo $insert_date; ?>">
    </div>

    <div class="col-md-3">
        <label>X-ray time:&nbsp;</label>
        <input type="time" name="xraytime" style="float:left;" value="<?php echo $insert_time; ?>">
    </div>
  </div>

</div>
</div>
</div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="submit" name="submit_insert" value="Submit" onclick="insertendorec();return true;" />
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



<!-- <script type="text/javascript">
////////////////////////////////////////// Calendar //////////////////////////////////////////
    var cal  = new WinkelCalendar({
        container: 'demo',
          defaultDate : new Date(),
        bigBanner: true,
        format : "DD/MM/YYYY",
        onSelect : null
    });


    // Sets a new date
    cal.setDate('07-11-2016');

    // Sets the date to todays's date
    cal.today();

    // Opens the datepicker
    cal.today();

    // Closes the datepicker
//  cal.close();
</script> -->

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
  <?php
}else{
  header('Location: Login.php');
}
?>
