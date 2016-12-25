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
				<td><input type="submit" class="btn-danger" name="edit" value="EDIT"></td>
			</tr>';
		}
	}
}
?>