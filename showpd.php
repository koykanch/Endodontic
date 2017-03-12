<?php
	require('connect.php');

	$sql = "SELECT dent_hardcopy.HN,patients_info.patientName,dent_hardcopy.student_code,dent_hardcopy.dentId,dent_hardcopy.hard_Date FROM dent_hardcopy,patients_info WHERE dent_hardcopy.HN = patients_info.HN";
	// $sql = "SELECT * FROM patients_info";
	$result = $conn->query($sql);
	 // echo $result;
	$arr = array();

	// $objresult = mysqli_fetch_array($result, MYSQLI_NUM);
	if ($result->num_rows > 0) {
    // output data of each row
		    while($row = $result->fetch_assoc()) {
		         // echo "HN : " . $row["HN"];
		    	$arr[] = $row;
		    }
	} else {
    		echo "0 results";
	}
	echo $json_response = json_encode($arr);
?>