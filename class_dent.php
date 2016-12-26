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
				<td>'.$row['dent_name'].'</td>';
				

				if($row['status'] == '0'){
					echo '<td>พนักงาน</td>';
				}else{
					echo '<td>ทันตแพทย์</td>';
				}
			
			echo '<td>
					<form action="updateDentist.php" method="post" name="updatebtn">
							<input type="hidden" name="dentId" value="'.$row['dentId'].'">
							<input type="submit" class="btn btn-primary" name="'.$row['dentId'].'" value="Edit" style="width: 100px;">
					</form><br>'; ?>
					<form action="deleteDentist.php" method="post" name="deletebtn" onSubmit="return confirm('are you sure?')">
							<input type="hidden" name="dentId" value="<?php echo $row['dentId']; ?>">
							<input type="submit" class="btn btn-danger"  value="Delete" style="width: 100px;"name="<?php echo $row['dentId']; ?>">
					</form>
				 </td>
			</tr><?php
		}
	}
}

?>