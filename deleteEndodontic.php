<?php
require('connect.php');
$HN = $_POST['PatientHN'];
$stu = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];

$delete_endo = "DELETE FROM dent_hardcopy WHERE HN = '$HN' AND hard_Date='$harddate'";
$result_endo = $conn->query($delete_endo);

$delete_endo1 = "DELETE FROM medical_his,dental_his,subject_symptom,object_symptom,examination,radiograph_crown,radiograph_pulpcham,radiograph_root,radiograph_pulpcanal,radiograph_perirad,radiograph_alveolar,pulpal_diagnosis,periradicular_diagnosis,treatment_plan,patients_xray WHERE HN = '$HN' AND Date='$harddate'";
$result_endo1 = $conn->query($delete_endo1);


if($result_endo === TRUE && $result_endo1 === TRUE){
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