<?php

class Dentist
{
	
	public function Dentistinfo($conn)
	{
		$sql = "SELECT * FROM dentist_info";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){

			$dentistId = $row['dentId'];

			echo '<tr>
				<td>'.$row['dentId'].'</td>
				<td>'.$row['dent_name'].'</td>
				<td>'.$row['status'].'</td>
				<td><input type="submit" class="btn-danger" name="edit" value="EDIT"></td>
			</tr>';
		}
	}
}

?>