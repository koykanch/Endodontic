<?php

class Student
{
	public function Studentinfo($conn)
	{
		$sql = "SELECT * FROM dentalstudent_info";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){

			$studentId = $row['student_code'];

			echo '<tr>
				<td>'.$row['student_code'].'</td>
				<td>'.$row['student_name'].'</td>
				<td>'.$row['student_timebegin'].'</td>
				<td>'.$row['student_timeend'].'</td>
				<td><input type="submit" class="btn-danger" name="edit" value="EDIT"></td>
			</tr>';
		}
	}
}
?>