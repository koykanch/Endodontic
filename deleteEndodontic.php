<?php
require('connect.php');
$HN = $_POST['PatientHN'];
$stu = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];

$delete_endo = "DELETE FROM dent_hardcopy WHERE HN = '$HN' AND hard_Date='$harddate'";
$result_endo = $conn->query($delete_endo);

$delete_medical = "DELETE FROM medical_his WHERE HN = '$HN' AND Date='$harddate'"; 
$result_medical = $conn->query($delete_medical);

$delete_dental = "DELETE FROM dental_his WHERE HN = '$HN' AND Date='$harddate'";
$result_dental = $conn->query($delete_dental);

$delete_subject = "DELETE FROM subject_symptom WHERE HN = '$HN' AND Date='$harddate'";
$result_subject = $conn->query($delete_subject);

$delete_object = "DELETE FROM object_symptom WHERE HN = '$HN' AND Date='$harddate'";
$result_object = $conn->query($delete_object);

$delete_examination = "DELETE FROM examination WHERE HN = '$HN' AND Date='$harddate'"; 
$result_examination = $conn->query($delete_examination);

$delete_radiocrown = "DELETE FROM radiograph_crown WHERE HN = '$HN' AND Date='$harddate'";
$result_radiocrown = $conn->query($delete_radiocrown);

$delete_radiopulpcham = "DELETE FROM radiograph_pulpcham WHERE HN = '$HN' AND Date='$harddate'";
$result_radiopulpcham = $conn->query($delete_radiopulpcham);

$delete_radioroot = "DELETE FROM radiograph_root WHERE HN = '$HN' AND Date='$harddate'";
$result_radioroot = $conn->query($delete_radioroot);

$delete_radiopulpcan = "DELETE FROM  radiograph_pulpcanal WHERE HN = '$HN' AND Date='$harddate'";
$result_radiopulpcan = $conn->query($delete_radiopulpcan);

$delete_radioperirad = "DELETE FROM radiograph_perirad WHERE HN = '$HN' AND Date='$harddate'";
$result_radioperirad = $conn->query($delete_radioperirad);

$delete_radioalveolar = "DELETE FROM radiograph_alveolar WHERE HN = '$HN' AND Date='$harddate'";
$result_radioalveolar = $conn->query($delete_radioalveolar);

$delete_radiopulpaldiag = "DELETE FROM pulpal_diagnosis WHERE HN = '$HN' AND Date='$harddate'";
$result_radiopulpaldiag = $conn->query($delete_radiopulpaldiag);

$delete_radioperiraddiag = "DELETE FROM periradicular_diagnosis WHERE HN = '$HN' AND Date='$harddate'";
$result_radioperiraddiag = $conn->query($delete_radioperiraddiag);

$delete_treatment = "DELETE FROM treatment_plan WHERE HN = '$HN' AND Date = '$harddate'";
$result_treatment = $conn->query($delete_treatment);

$delete_xray = "DELETE FROM patients_xray WHERE HN = '$HN' AND Date = '$harddate'";
$result_xray = $conn->query($delete_xray);

if($result_endo === TRUE && $result_medical === TRUE && $result_dental === TRUE && $result_subject === TRUE && $result_object === TRUE && $result_examination === TRUE && $result_radiocrown === TRUE && $result_radiopulpcham === TRUE && $result_radioroot === TRUE && $result_radiopulpcan === TRUE && $result_radioperirad === TRUE && $result_radioalveolar === TRUE && $result_radiopulpaldiag === TRUE && $result_radioperiraddiag === TRUE && $result_treatment === TRUE && $result_xray === TRUE){
  	?>
  		<script>
  			window.alert('Delete Success');
  			window.location = "summary.php";
  		</script>
  	<?php

  }else{
  	?>
  		<script>
  			window.alert('Delete Unsuccess');
  			//window.location = "endorecord.php";
  		</script>
  	<?php
  	echo "Error description: " . mysqli_error($conn);
  }
?>