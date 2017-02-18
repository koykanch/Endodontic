<?php
Class Medicalrecord
{
	public function searchpatient($conn)
	{
		$sql = "SELECT * FROM dent_hardcopy,patients_info WHERE dent_hardcopy.HN = patients_info.HN";
		$result = $conn->query($sql);
		

		while($objresult = mysqli_fetch_array($result)){
		echo '<tr>
			  <td>'.$objresult['HN'].'</td>
			  <td>'.$objresult['patientName'].'</td>';
			  $date=date('d/m/Y',strtotime($objresult['hard_Date']));
			  echo '<td>'.$date.'</td>
			  <td>'.$objresult['student_code'].'</td>
			  <td>'.$objresult['dentId'].'</td>
			  <td><form action="report.php" method="post" name="summary" target="_blank">
			  		<input type="hidden" name="PatientHN" value="'.$objresult['HN'].'">
			  		<input type="hidden" name="Stu_code" value="'.$objresult['student_code'].'">
			  		<input type="hidden" name="Dent_id" value="'.$objresult['dentId'].'">
			  		<input type="hidden" name="hard_date" value="'.$objresult['hard_Date'].'">

			  		<input type="submit" class="btn btn-success"  name="detail" value="View"></tr>
			  	  </form>';
		}
	}
}
?>