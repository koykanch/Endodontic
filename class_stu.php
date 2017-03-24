<?php

class Student
{
	public function searchstu($conn){
		?>
		
		<option value=" "><-- Please Select Student --></option>
		<?php
			$strSQL = "SELECT * FROM dentalstudent_info";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["student_code"];?>"> <?php echo $objResult["student_code"]; ?> : <?php echo $objResult["student_name"]; ?> </option>
			<?php
		}
	}

	public function searchstuedit($conn,$HN,$harddate){
			$searchStu = "SELECT * FROM dent_hardcopy WHERE HN = '$HN' AND hard_Date = '$harddate'";
			$resultStu = $conn->query($searchStu);
			$objresultStu = mysqli_fetch_array($resultStu);

			$searchStuname = "SELECT * FROM dentalstudent_info WHERE student_code = '".$objresultStu['student_code']."'";
			$resultStuname = $conn->query($searchStuname);
			$objresultStuname = mysqli_fetch_array($resultStuname);
		?>
		
			<option value="<?php echo $objresultStu['student_code']; ?>">
				<?php echo $objresultStu['student_code']; ?> : <?php echo $objresultStuname['student_name']; ?>		
			</option>
		<?php
			$strSQL = "SELECT * FROM dentalstudent_info WHERE student_code != '".$objresultStu['student_code']."'ORDER BY student_code";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["student_code"];?>"> <?php echo $objResult["student_code"]; ?> : <?php echo $objResult["student_name"]; ?> </option>
			<?php
		}
	}
}
?>