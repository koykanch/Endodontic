<?php
require('connect.php');
$sq = $_POST['seqnum'];
$HN = $_POST['PatientHN'];
$stu = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];


$delete_endo = "DELETE FROM dent_hardcopy WHERE Seq_no = '$sq'";
$result_endo = $conn->query($delete_endo);

if($result_endo === TRUE){
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
// $delete_medical = "DELETE FROM medical_his WHERE Seq_no = '$sq'"; 
// $result_medical = $conn->query($delete_medical);

// $delete_dental = "DELETE FROM dental_his WHERE Seq_no = '$sq'";
// $result_dental = $conn->query($delete_dental);

// $delete_subject = "DELETE FROM subject_symptom WHERE Seq_no = '$sq'";
// $result_subject = $conn->query($delete_subject);

// $delete_object = "DELETE FROM object_symptom WHERE Seq_no = '$sq'";
// $result_object = $conn->query($delete_object);

// $delete_examination = "DELETE FROM examination WHERE Seq_no = '$sq'"; 
// $result_examination = $conn->query($delete_examination);

// $delete_radiocrown = "DELETE FROM radiograph_crown WHERE Seq_no = '$sq'";
// $result_radiocrown = $conn->query($delete_radiocrown);

// $delete_radiopulpcham = "DELETE FROM radiograph_pulpcham WHERE Seq_no = '$sq'";
// $result_radiopulpcham = $conn->query($delete_radiopulpcham);

// $delete_radioroot = "DELETE FROM radiograph_root WHERE Seq_no = '$sq'";
// $result_radioroot = $conn->query($delete_radioroot);

// $delete_radiopulpcan = "DELETE FROM  radiograph_pulpcanal WHERE Seq_no = '$sq'";
// $result_radiopulpcan = $conn->query($delete_radiopulpcan);

// $delete_radioperirad = "DELETE FROM radiograph_perirad WHERE Seq_no = '$sq'";
// $result_radioperirad = $conn->query($delete_radioperirad);

// $delete_radioalveolar = "DELETE FROM radiograph_alveolar WHERE Seq_no = '$sq'";
// $result_radioalveolar = $conn->query($delete_radioalveolar);

// $delete_radiopulpaldiag = "DELETE FROM pulpal_diagnosis WHERE Seq_no = '$sq'";
// $result_radiopulpaldiag = $conn->query($delete_radiopulpaldiag);

// $delete_radioperiraddiag = "DELETE FROM periradicular_diagnosis WHERE Seq_no = '$sq'";
// $result_radioperiraddiag = $conn->query($delete_radioperiraddiag);

// $delete_treatment = "DELETE FROM treatment_plan WHERE Seq_no = '$sq'";
// $result_treatment = $conn->query($delete_treatment);

// $delete_xray = "DELETE FROM patients_xray WHERE Seq_no = '$sq'";
// $result_xray = $conn->query($delete_xray);


?>