<!DOCTYPE html>
<html ng-app="myapp">
<head>
	<title>Summary</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Filter of name -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css"> -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        


        <script type="text/javascript" src="dbcontroller.js"></script>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">
        <style type="text/css">
            .first-container{
                margin-top: 50px;
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

            button{
                margin-top: 2em;
                width: 150px;
                height: 40px;
                background-color: #FFD54F;
                border: none;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px
            }
        </style>
<?php
error_reporting(0);
session_start();

$user = $_SESSION['username'];
	require('connect.php');
	
?>
</head>
<body ng-controller="showdatacontroller">


<!-- change background image at assets/js/scripts.js --> 
    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

	<div class="first-container">
	<div class="panel panel-info">
	<div class="panel-heading"><h3>ข้อมูลการรักษา</h3></div>
	<div class="panel-body">

    <div ng-controller="showdatacontroller">
    <form class="navbar-form" role="search">
        <div class="form-group">
            <p><input ng-model="sData"  class="form-control"  placeholder="ค้นหา"/></p>
        </div><br><br>

        <div>
            <p align="left"><b>Medical History</b></p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="nonemed" type="checkbox" ng-true-value="1" ng-false-value=""/>None &nbsp;&nbsp;
                <input ng-model="cardiodismed" type="checkbox" ng-true-value="1" ng-false-value="" />Cardiovascular Diseases&nbsp;&nbsp;
                <input ng-model="pulmonarydismed" type="checkbox" ng-true-value="1" ng-false-value="" />Pulmonary Diseases&nbsp;&nbsp;
                
            </p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="gastrodismed" type="checkbox" ng-true-value="1" ng-false-value="" />Gastrointestinal Diseases&nbsp;&nbsp;
                <input ng-model="hemadismed" type="checkbox" ng-true-value="1" ng-false-value="" />Hematologic Diseases &nbsp;&nbsp;
                <input ng-model="neurodismed" type="checkbox" ng-true-value="1" ng-false-value="" />Neurologic Diseases &nbsp;&nbsp;
            </p>
            <!-- <p align="left" style="padding-left: 2em;">
                 Blood Pressure: 
                 <select ng-model="blood1">
                    <option value="">SELECT</option>
                 <?php
                      // for($i=0; $i<=250; $i++){
                      //   echo '<option value="<?php echo $i ?>">'.$i.'</option>';
                      // }
                 ?>
                </select> &nbsp; / &nbsp;
                <select ng-model="blood2">
                    <option value="">SELECT</option>
                 <?php
                      // for($i=0; $i<=250; $i++){
                      //   echo '<option value="<?php echo $i ?>">'.$i.'</option>';
                      // }
                 ?>
                </select> &nbsp;&nbsp;
            </p> -->

            <p align="left"><b>S. Subjective Symptoms</b></p>
            <p align="left" style="padding-left: 2em;">
                 <b>Pain intensity: </b>
                 <select ng-model="paininten">
                  <option value="">SELECT</option>
                  <option value="01">None</option>
                  <option value="02">Mild</option>
                  <option value="03">Moderate</option>
                  <option value="04">Severe</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <b>Pain Character: </b>
                 <select ng-model="paincharacter">
                  <option value="">SELECT</option>
                  <option value="01">Dull</option>
                  <option value="02">Sharp</option>
                  <option value="03">Throbbing</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <b>Onset: </b> 
                <input ng-model="onset_spont" type="checkbox" ng-true-value="1" ng-false-value="" />Spontaneous &nbsp;&nbsp;
                Stimulation Required:
                 <select ng-model="onset_stimu">
                  <option value="">SELECT</option>
                  <option value="01">Hot</option>
                  <option value="02">Cold</option>
                  <option value="03">Biting</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <b>Duration: </b> 
                 <select ng-model="duration">
                  <option value="">SELECT</option>
                  <option value="01">Seconds</option>
                  <option value="02">Minutes</option>
                  <option value="03">Hours</option>
                  <option value="04">Intermittent</option>
                  <option value="05">Constant</option>

                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <b>Location: </b> 
                 <select ng-model="location">
                  <option value="">SELECT</option>
                  <option value="01">Localized</option>
                  <option value="02">Diffused</option>
                </select> &nbsp;&nbsp;
            Radiating to: <input ng-model="locatradiat" style="width: 50px; height:25px;" />&nbsp;&nbsp;
            Referred to: <input ng-model="refer" style="width: 50px; height:25px;" />&nbsp;&nbsp;
            </p>

            <p align="left"><b>O. Objective Symptoms</b></p>
            <p align="left" style="padding-left: 2em;">
                 <b>Extraoral: </b>
                <input ng-model="extrafacial_check" type="checkbox" ng-true-value="1" ng-false-value="" />Facial Swelling &nbsp;&nbsp;
                <input ng-model="extralymph_check" type="checkbox" ng-true-value="1" ng-false-value="" />Lymph Node &nbsp;&nbsp;
                <input ng-model="extrasinus_check" type="checkbox" ng-true-value="1" ng-false-value="" />Sinus Tract &nbsp;&nbsp;
            </p>

            <p align="left" style="padding-left: 2em;">
                 <b>Intraoral: </b>
                Swelling: <select ng-model="swellsoftorfirm">
                  <option value="">SELECT</option>
                  <option value="0">Soft</option>
                  <option value="1">Firm</option>
                </select> &nbsp;&nbsp;
                area: <input ng-model="intraswell_area" style="width: 50px; height:25px;" />&nbsp;&nbsp;
                Sinus Tract at: <input ng-model="intra_sinus" style="width: 50px; height:25px;" />&nbsp;&nbsp;
            </p>

            <p align="left" style="padding-left: 2em;">
                 <b>Tooth: </b>
                <input ng-model="cariestooth" type="checkbox" ng-true-value="1" ng-false-value="" />Caries &nbsp;&nbsp;
                Restoration with: <input ng-model="toothrestoration" style="width: 50px; height:25px;" />&nbsp;&nbsp;
                <input ng-model="pulptoothex" type="checkbox" ng-true-value="1" ng-false-value="" />Pulp Exposure &nbsp;&nbsp;
                <input ng-model="pulptoothpoly" type="checkbox" ng-true-value="1" ng-false-value="" />Pulp Polyp &nbsp;&nbsp;
                Fracture at: <input ng-model="fracturetoration" style="width: 50px; height:25px;" />&nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 5em;">
                Crown Discoloration to: <input ng-model="crowntooth" style="width: 50px; height:25px;" />&nbsp;&nbsp;
                <input ng-model="opentoothdrai" type="checkbox" ng-true-value="1" ng-false-value="" />Opened for Drainage &nbsp;&nbsp;
                <input ng-model="temptooth" type="checkbox" ng-true-value="1" ng-false-value="" />Temp. Restoration &nbsp;&nbsp;
            </p>

            <p align="left"><b>Examination</b></p>
            <p align="left" style="padding-left: 2em;">
                
             <b>Tooth: </b><input ng-model="tooth" style="width: 50px; height:25px;" />&nbsp;&nbsp;
             <!-- <b>EPT: </b><input ng-model="epttooth" style="width: 50px; height:25px;" />&nbsp;&nbsp; -->
             <b>Cold: </b><select ng-model="cold_exam">
                  <option value="">SELECT</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">Positive</option>
                  <option value="negative">Negative</option>
                </select> &nbsp;&nbsp;
              <b>Heat: </b><select ng-model="heat_exam">
                  <option value="">SELECT</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">Positive</option>
                  <option value="negative">Negative</option>
                </select> &nbsp;&nbsp;
              <b>Perc<sup>n</sup>: </b><select ng-model="perc_exam">
                  <option value="">SELECT</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">Positive</option>
                  <option value="negative">Negative</option>
                </select> &nbsp;&nbsp;
              <b>Palp<sup>n</sup>: </b><select ng-model="palp_exam">
                  <option value="">SELECT</option>
                  <option value="WNL">WNL</option>
                  <option value="positive">Positive</option>
                  <option value="negative">Negative</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
              <b>Mobility: </b><select ng-model="mobility_exam">
                  <option value="">SELECT</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select> &nbsp;&nbsp;
              <b>Special Test: </b><select ng-model="spectest_exam">
                  <option value="">SELECT</option>
                  <option value="01">Illumination Test</option>
                  <option value="02">Dye Test</option>
                  <option value="03">Anes Test</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left"><b>Radiographic findings</b></p>
            <p align="left" style="padding-left: 2em;">
            <b>Crown: &nbsp;&nbsp;</b>
                <input ng-model="normcrown" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                <input ng-model="cariescrown" type="checkbox" ng-true-value="1" ng-false-value="" />Caries
                (area: <input ng-model="crowarea" placeholder="area" style="width: 60px; height: 25px;" /> &nbsp;&nbsp; 
                depth: <input ng-model="crowdepth" placeholder="depth" style="width: 60px; height: 25px;"/> ) &nbsp;&nbsp; 
                <input ng-model="restcrown" type="checkbox" ng-true-value="1" ng-false-value="" />Restoration &nbsp;&nbsp;
                <input ng-model="fractcrown" type="checkbox" ng-true-value="1" ng-false-value="" />Fracture  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
            <b>Pulp Chamber: &nbsp;&nbsp;</b>
                <input ng-model="normcham" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                Calcification: <select ng-model="calcificatecham">
                  <option value="">SELECT</option>
                  <option value="0">Partial</option>
                  <option value="1">Complete</option>
                </select> &nbsp;&nbsp;
                <input ng-model="pulpcham_pulpstone" type="checkbox" ng-true-value="1" ng-false-value="" />Pulp Stone &nbsp;&nbsp;
                <input ng-model="pulpcham_resorption" type="checkbox" ng-true-value="1" ng-false-value="" />Resorption  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
            <b>Root: &nbsp;&nbsp;</b>
                <input ng-model="normroot" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                <input ng-model="cariesroot" type="checkbox" ng-true-value="1" ng-false-value="" />Caries &nbsp;&nbsp;
                <input ng-model="curvatureroot" type="checkbox" ng-true-value="1" ng-false-value="" />Curvature  &nbsp;&nbsp;
                <input ng-model="extresroot" type="checkbox" ng-true-value="1" ng-false-value="" />Ext. Resorption  &nbsp;&nbsp;
                <input ng-model="fractroot" type="checkbox" ng-true-value="1" ng-false-value="" />Fracture  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
            <b>Pulp Canal: &nbsp;&nbsp;</b>
                <input ng-model="normcanel" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                Calcification: <select ng-model="calcificatecanel">
                  <option value="">SELECT</option>
                  <option value="0">Partial</option>
                  <option value="1">Complete</option>
                </select> &nbsp;&nbsp;
                <input ng-model="resorpcanel" type="checkbox" ng-true-value="1" ng-false-value="" />Resorption &nbsp;&nbsp;
                <input ng-model="perforcanel" type="checkbox" ng-true-value="1" ng-false-value="" />Perforation &nbsp;&nbsp;
                <input ng-model="prevcanel" type="checkbox" ng-true-value="1" ng-false-value="" />Previous RCT  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 8.2em;">
                <input ng-model="brokecanel" type="checkbox" ng-true-value="1" ng-false-value="" />Broken Instrument  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
            <b>Periradicular: &nbsp;&nbsp;</b>
                <input ng-model="normperirad" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                <input ng-model="widenperirad" type="checkbox" ng-true-value="1" ng-false-value="" />Widening PDL &nbsp;&nbsp;
                <input ng-model="lossperirad" type="checkbox" ng-true-value="1" ng-false-value="" />Loss of Lamina Dura &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 9em;">
                Periapical Lesion: <input ng-model="periradperialess1" style="width: 50px; height: 25px;"/>
                X <input ng-model="periradperialess2" style="width: 50px; height: 25px;"/> mm
                Lateral Lesionn: <input ng-model="laterlessperirad1" style="width: 50px; height: 25px;"/>
                X <input ng-model="laterlessperirad2" style="width: 50px; height: 25px;"/> mm
            </p>
            <p align="left" style="padding-left: 9em;">
                <input ng-model="resorpperirad" type="checkbox" ng-true-value="1" ng-false-value="" />Resorption  &nbsp;&nbsp;
                <input ng-model="osteoperirad" type="checkbox" ng-true-value="1" ng-false-value="" />OsteosIcerosis  &nbsp;&nbsp;
                <input ng-model="hyperperirad" type="checkbox" ng-true-value="1" ng-false-value="" />Hyperplasia of cementurn  &nbsp;&nbsp;
            </p>
             <p align="left" style="padding-left: 2em;">
            <b>Alveolar Bone: &nbsp;&nbsp;</b>
                <input ng-model="normalveolar" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                <input ng-model="generalalveolar" type="checkbox" ng-true-value="0" ng-false-value="" />Generalized Bone loss &nbsp;&nbsp;
                <input ng-model="localalveolar" type="checkbox" ng-true-value="1" ng-false-value="" />Localized Bone loss &nbsp;&nbsp;
            </p>

            <p align="left"><b>Pulpal Diagnosis</b></p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="puldiagnorm" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                Reversible Or Irreversible Pulpitis: <select ng-model="reverOrirrever">
                  <option value="">SELECT</option>
                  <option value="0">Reversible</option>
                  <option value="1">Irreversible</option>
                </select> &nbsp;&nbsp;

                Symptomatic Or Asymptomatic: <select ng-model="sympOrasymp">
                  <option value="">SELECT</option>
                  <option value="0">Symptomatic</option>
                  <option value="1">Asymptomatic</option>
                </select> &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="pulpnecrosis" type="checkbox" ng-true-value="1" ng-false-value="" />Pulp Necrosis &nbsp;&nbsp;
                <input ng-model="previnitiat" type="checkbox" ng-true-value="1" ng-false-value="" />Previously Initiated Therapy &nbsp;&nbsp;
                <input ng-model="prev_improper" type="checkbox" ng-true-value="1" ng-false-value="" />Previously treated (Improper) &nbsp;&nbsp;
                <input ng-model="prev_incomplete" type="checkbox" ng-true-value="1" ng-false-value="" />Previously treated (Incomplete RCT) &nbsp;&nbsp;
            </p>

            <p align="left"><b>Periradicular Diagnosis</b></p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="periraddiagnorm" type="checkbox" ng-true-value="1" ng-false-value="" />Normal &nbsp;&nbsp;
                <input ng-model="per_symp" type="checkbox" ng-true-value="0" ng-false-value=""/>Symptomatic Apical Periodontitis&nbsp;&nbsp;
                <input ng-model="per_asymp" type="checkbox" ng-true-value="1" ng-false-value="" />Asymptomatic Apical Periodontitis  &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="acute" type="checkbox" ng-true-value="0" ng-false-value="" />Acute Apical Abscess  &nbsp;&nbsp;
                <input ng-model="chronic" type="checkbox" ng-true-value="1" ng-false-value="" />Chronic Apical Abscess   &nbsp;&nbsp;
            </p>

            <p align="left"><b>Treatment planning</b></p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="notreat" type="checkbox" ng-true-value="1" ng-false-value="" />No Treatment &nbsp;&nbsp;
                Pulpotomy: <select ng-model="pulpotomy">
                  <option value="">SELECT</option>
                  <option value="0">Partial</option>
                  <option value="1">Full</option>
                </select> &nbsp;&nbsp;
                <input ng-model="pulpectomy" type="checkbox" ng-true-value="1" ng-false-value="" />Pulpectomy  &nbsp;&nbsp;
                <input ng-model="nonrootcanel" type="checkbox" ng-true-value="1" ng-false-value="" />Non-surgical Root Canel Treatment   &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
                <input ng-model="nonretreatment" type="checkbox" ng-true-value="1" ng-false-value="" />Non-surgical Retreatment   &nbsp;&nbsp;
                <input ng-model="apexification" type="checkbox" ng-true-value="1" ng-false-value="" />Apexification   &nbsp;&nbsp;
                <input ng-model="intentional" type="checkbox" ng-true-value="1" ng-false-value="" />Intentional RCT &nbsp;&nbsp;
                <input ng-model="rootcaneltreat" type="checkbox" ng-true-value="1" ng-false-value="" />Surgical Root Canel Treatment &nbsp;&nbsp;
                <input ng-model="perio" type="checkbox" ng-true-value="1" ng-false-value="" />Perio Consult &nbsp;&nbsp;
            </p>

            <p align="left" style="padding-left: 2em;">
                <b>Plan for final restoration: </b><input ng-model="planrestor" style="width: 200px; height: 30px;"/>
            </p>
            <p align="left" style="padding-left: 2em;">
            <b>Pre-op treatment: </b>&nbsp;&nbsp;
                <input ng-model="preop_carie" type="checkbox" ng-true-value="1" ng-false-value="" />Caries Removal &nbsp;&nbsp;
                <input ng-model="preop_dam" type="checkbox" ng-true-value="1" ng-false-value="" />Dam &nbsp;&nbsp;
            </p>
            <p align="left" style="padding-left: 2em;">
            
            <b>Anesthesia: </b><select ng-model="anesthesis">
                  <option value="">SELECT</option>
                  <option value="1">Required</option>
                  <option value="0">Not required</option>
                </select> &nbsp;&nbsp;
          
        </div>
        <!-- <label ng-repeat="name in selectedName">
            <input type="checkbox" name="selectedName[]" value="{{name.Name}}"  ng-checked="selectionList(name)">{{name.Name}}
        </label>    -->     
     </form>       

<?php
$checkuser = "SELECT * FROM dentist_info WHERE dentId = '".$_SESSION['username']."'";
$rescheckuser = $conn->query($checkuser);
$rowcheckuser = mysqli_fetch_array($rescheckuser);   
?>

	    <table class="table table-bordered" border="1">
	        <tr bgcolor="#D1C4E9">
                <td>ลำดับที่</td>
	            <td>รหัสผู้ป่วย</td>
	            <td>ชื่อผู้ป่วย</td>
	            <td>ประจำวันที่</td>
	            <td>นักศึกษาผู้รักษา</td>
	            <td>ทันตแพทย์ผู้รักษา</td>
        	    <td>จัดการการรักษา</td>
                
	        </tr>
        <!-- {{showData | json}} -->
        <!-- {{periradperialess2 | json}} -->

            <?php
                if($user != ""){
                    ?>
                    
                    <tr ng-repeat="c in showData| filter:sData | filter:{none: nonemed, cardiovascular: cardiodismed, pulmonary: pulmonarydismed, gastrointestinal: gastrodismed, hematologis: hemadismed, Neurologic: neurodismed, paininten_id: paininten, painchar_id: paincharacter, duration_id: duration, locat_locOrdiff: location, onset_spontaneous: onset_spont, stimulation_id: onset_stimu, locat_radiating: locatradiat, locat_referred: refer, ext_facialswelling: extrafacial_check, ext_lymphnode: extralymph_check, ext_sinustract: extrasinus_check, intra_swellsoftOrfirm: swellsoftorfirm, intra_swellarea: intraswell_area, intra_sinustract: intra_sinus, tooth_caries: cariestooth, tooth_restoration: toothrestoration, tooth_pulpexposure: pulptoothex, tooth_pulppolyp: pulptoothpoly, tooth_fracture: fracturetoration, tooth_crown: crowntooth, tooth_open: opentoothdrai, tooth_temp: temptooth, exam_tooth: tooth, exam_EPT: epttooth, exam_cold: cold_exam, exam_heat: heat_exam, exam_perc: perc_exam, exam_palp: palp_exam,exam_mobility: mobility_exam, spectest_id: spectest_exam, crown_normal: normcrown, crown_caries: cariescrown, crown_cariesarea: crowarea, crown_cariesdepth: crowdepth, crown_restoration: restcrown, crown_fracture: fractcrown, pulpcham_normal: normcham, pulpcham_calPartOrComp: calcificatecham, pulpcham_pulpstone: pulpcham_pulpstone, pulpcham_resorption: pulpcham_resorption, root_normal: normroot, root_caries: cariesroot, root_curvature: curvatureroot, root_extresorption: extresroot, root_fracture: fractroot, pulpcan_normal: normcanel,  pulpcan_calPartOrComp: calcificatecanel, pulpcan_resorption: resorpcanel, pulpcan_perforation: perforcanel, pulpcan_previousRCT: prevcanel, pulpcan_broken: brokecanel, perirad_normal: normperirad, perirad_wideningPDL: widenperirad, perirad_lossoflam: lossperirad, perirad_periapical1: periradperialess1, perirad_periapical2: periradperialess2, perirad_lateral1: laterlessperirad1, perirad_lateral2: laterlessperirad2, perirad_resorption: resorpperirad, perirad_osteos: osteoperirad, perirad_hyper: hyperperirad, bone_normal: normalveolar, bone_genOrlocal: generalalveolar, bone_genOrlocal: localalveolar, normal: puldiagnorm, ReverOrIrreversiblepulp: reverOrirrever, Irreversible_sympOrasymp: sympOrasymp, pulp_necrosis: pulpnecrosis, prev_initiat: previnitiat, prev_treated_improper: prev_improper, prev_treated_incomplete: prev_incomplete, Normal: periraddiagnorm, sympOrasympt_apical: per_symp, sympOrasympt_apical: per_asymp, acuteOrchronic_apical: acute, acuteOrchronic_apical: chronic, no_treatment: notreat, pulp_partOrfull: pulpotomy, pulpectomy: pulpectomy, non_sur_root: nonrootcanel, non_sur_retreat: nonretreatment, apexification: apexification, intentionalRCT: intentional, sur_root: rootcaneltreat, perio_consult: perio, plan_for_final: planrestor,     pre_op_treat_caries: preop_carie, pre_op_treat_dam: preop_dam, Anest_reqOrnotreq: anesthesis}"> 
                  
                      <td>{{c.Seq_no}}</td>
                      <td>{{c.HN}}</td>
                      <td>{{c.patientName}}</td>
                      <td>{{c.hard_Date| date:'dd-MM-yyyy'}}</td>
                      <td>{{c.student_name}}</td>
                      <td>{{c.dent_name}}</td>
                      <td><form action="report.php" method="post" name="summary" target="_blank">
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date | date: 'dd-MM-yyyy'}}">

                        <input type="submit" class="btn btn-success" style="width:100px; height:30px;" name="detail" value="VIEW">
                      </form>

                      <form action="updateEndodontic.php" method="post" name="edit_detail" target="_blank" style = "margin-top: .05cm;">
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                        <span ng-if="c.student_code == <?php echo $user; ?>">
                            <input type="submit" class="btn btn-info" style="width:100px; height:30px;" name="edit" value="EDIT">
                        </span>
                        
                        <span ng-if="c.dentId == <?php echo $user; ?>" >
                            <input type="submit" class="btn btn-info" style="width:100px; height:30px;" name="edit" value="EDIT">
                        </span>
                        </span>
                      </form>

                      <?php
                          $duplication = "SELECT dentId FROM dentist_info WHERE dentId = '$user' AND status = '01'";
                          $resduplication = $conn->query($duplication);
                          $objduplication = mysqli_fetch_array($resduplication);
                      ?>
                      <form action="deleteEndodontic.php" method="post" name="delete_detail" onSubmit="return confirm('are you sure?')" style = "margin-top: .05cm;" >
                        <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                        <input type="hidden" name="PatientHN" value="{{c.HN}}">
                        <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                        <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                        <input type="hidden" name="hard_date" value="{{c.hard_Date}}">
                        <span ng-if="<?php echo $objduplication['dentId'] != null ?>">
                        <input type="submit" class="btn btn-danger" style="width:100px; height:30px;" name="delete" value="DELETE"></tr>
                        </span>
                      </form></tr>
                    <?php
                }else{
                    ?>

                    <tr ng-repeat="c in showData| filter:sData | filter:{none: nonemed, cardiovascular: cardiodismed, pulmonary: pulmonarydismed, gastrointestinal: gastrodismed, hematologis: hemadismed, Neurologic: neurodismed, paininten_id: paininten, painchar_id: paincharacter, duration_id: duration, locat_locOrdiff: location, onset_spontaneous: onset_spont, stimulation_id: onset_stimu, locat_radiating: locatradiat, locat_referred: refer, ext_facialswelling: extrafacial_check, ext_lymphnode: extralymph_check, ext_sinustract: extrasinus_check, intra_swellsoftOrfirm: swellsoftorfirm, intra_swellarea: intraswell_area, intra_sinustract: intra_sinus, tooth_caries: cariestooth, tooth_restoration: toothrestoration, tooth_pulpexposure: pulptoothex, tooth_pulppolyp: pulptoothpoly, tooth_fracture: fracturetoration, tooth_crown: crowntooth, tooth_open: opentoothdrai, tooth_temp: temptooth, exam_tooth: tooth, exam_EPT: epttooth, exam_cold: cold_exam, exam_heat: heat_exam, exam_perc: perc_exam, exam_palp: palp_exam,exam_mobility: mobility_exam, spectest_id: spectest_exam, crown_normal: normcrown, crown_caries: cariescrown, crown_cariesarea: crowarea, crown_cariesdepth: crowdepth, crown_restoration: restcrown, crown_fracture: fractcrown, pulpcham_normal: normcham, pulpcham_calPartOrComp: calcificatecham, pulpcham_pulpstone: pulpcham_pulpstone, pulpcham_resorption: pulpcham_resorption, root_normal: normroot, root_caries: cariesroot, root_curvature: curvatureroot, root_extresorption: extresroot, root_fracture: fractroot, pulpcan_normal: normcanel,  pulpcan_calPartOrComp: calcificatecanel, pulpcan_resorption: resorpcanel, pulpcan_perforation: perforcanel, pulpcan_previousRCT: prevcanel, pulpcan_broken: brokecanel, perirad_normal: normperirad, perirad_wideningPDL: widenperirad, perirad_lossoflam: lossperirad, perirad_periapical1: periradperialess1, perirad_periapical2: periradperialess2, perirad_lateral1: laterlessperirad1, perirad_lateral2: laterlessperirad2, perirad_resorption: resorpperirad, perirad_osteos: osteoperirad, perirad_hyper: hyperperirad, bone_normal: normalveolar, bone_genOrlocal: generalalveolar, bone_genOrlocal: localalveolar, normal: puldiagnorm, ReverOrIrreversiblepulp: reverOrirrever, Irreversible_sympOrasymp: sympOrasymp, pulp_necrosis: pulpnecrosis, prev_initiat: previnitiat, prev_treated_improper: prev_improper, prev_treated_incomplete: prev_incomplete, Normal: periraddiagnorm, sympOrasympt_apical: per_symp, sympOrasympt_apical: per_asymp, acuteOrchronic_apical: acute, acuteOrchronic_apical: chronic, no_treatment: notreat, pulp_partOrfull: pulpotomy, pulpectomy: pulpectomy, non_sur_root: nonrootcanel, non_sur_retreat: nonretreatment, apexification: apexification, intentionalRCT: intentional, sur_root: rootcaneltreat, perio_consult: perio, plan_for_final: planrestor,     pre_op_treat_caries: preop_carie, pre_op_treat_dam: preop_dam, Anest_reqOrnotreq: anesthesis}"> 

                      <td>{{c.Seq_no}}</td>                    
                      <td>{{c.HN}}</td>
                      <td>{{c.patientName}}</td>
                      <td>{{c.hard_Date| date:'dd-MM-yyyy'}}</td>
                      <td>{{c.student_code}}</td>
                      <td>{{c.dentId}}</td>
                      <td><form action="report.php" method="post" name="summary" target="_blank">
                            <input type="hidden" name="seqnum" value="{{c.Seq_no}}">
                            <input type="hidden" name="PatientHN" value="{{c.HN}}">
                            <input type="hidden" name="Stu_code" value="{{c.student_code}}">
                            <input type="hidden" name="Dent_id" value="{{c.dentId}}">
                            <input type="hidden" name="hard_date" value="{{c.hard_Date}}">

                            <input type="submit" class="btn btn-success" style="width:100px; height:30px;" name="detail" value="VIEW">
                            </form></td>
                    </tr>
                    <?php
                }
            ?>
    </div>
</body>
</html>
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

        <!-- filter name for search-->
        