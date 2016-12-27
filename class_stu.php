<?php

class Student
{
	public function Studentinfo($conn)
	{
		$sql = "SELECT * FROM dentalstudent_info";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){

			$studentId = $row['student_code'];
			$begin=date('d/m/Y',strtotime($row['student_timebegin']));
			$end=date('d/m/Y',strtotime($row['student_timeend']));
			echo '<tr>
				<td>'.$row['student_code'].'</td>
				<td>'.$row['student_name'].'</td>
				<td>'.$begin.'</td>
				<td>'.$end.'</td>
				<td>
					<form action="updateStudent.php" method="post" name="updatebtn">
							<input type="hidden" name="studentId" value="'.$row['student_code'].'">
							<input type="submit" class="btn btn-primary" style="width: 100px;" name="'.$row['student_code'].'" value="Edit">
					</form><br>';
				?>
					<form action="deleteStu.php" method="post" name="deletebtn" onSubmit="return confirm('are you sure?')">
							<input type="hidden" name="stu_code" value="<?php echo $row['student_code']; ?>">
							<input type="submit" class="btn btn-danger"  value="Delete" style="width: 100px;"name="<?php echo $row['student_code']; ?>">
					</form>	
				</td>
			</tr><?php
		}
	}
}
?>