<?php

class Patient
{
	public function Patientinfo($conn)
	{
		$sql = "SELECT * FROM patients_info";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){

			$studentId = $row['HN'];

			echo '<tr>
				<td>'.$row['HN'].'</td>
				<td>'.$row['patientName'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['birthdate'].'</td>
				<td>
					<form action="updatePatient.php" method="post" name="updatebtn">
							<input type="hidden" name="PatientHN" value="'.$row['HN'].'">
							<input type="submit" class="btn btn-primary" style="width: 100px; name="'.$row['HN'].'" value="Edit" >
					</form><br>';?>
					<form action="deletePatient.php" method="post" name="deletebtn" onSubmit="return confirm('are you sure?')">
							<input type="hidden" name="HN" value="<?php echo $row['HN']; ?>">
							<input type="submit" class="btn btn-danger"  value="Delete" style="width: 100px;"name="<?php echo $row['HN']; ?>">

					</form>				
				</td>
			</tr><?php	
		}
	}

}
?>