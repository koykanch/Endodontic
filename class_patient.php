<?php

class Patient
{
	public function Patientinfo($conn)
	{
		$sql = "SELECT * FROM patients_info";
		$result = $conn->query($sql);

		while($row=mysqli_fetch_array($result)){

			$studentId = $row['HN'];
			$date=date('d/m/Y',strtotime($row['birthdate']));
			if($row['gender'] == 'F'){
						$gender = 'หญิง';
					}else{
						$gender = 'ชาย';
					}
			echo '<tr>
				<td>'.$row['HN'].'</td>
				<td>'.$row['patientName'].'</td>
				<td>'.$gender.'</td>
				<td>'.$date.'</td>
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

	public function SearchHN($conn){
	
		?>
		<td><select name="searchHN" style="height:30" OnChange="window.location= '?item=' +this.value;">
			<option value=""><-- Please Select HN of patient --></option>
			<?php
			$strSQL = "SELECT * FROM patients_info GROUP BY HN";
			$objQuery = $conn->query($strSQL);
			while($objResult = mysqli_fetch_array($objQuery))
			{
				if($_GET["item"] == $objResult["HN"])
				{
					$sel = "selected";
				}
				else
				{
					$sel = "";
				}
			?>
				<option value="<?php echo $objResult["HN"];?>" <?php echo $sel;?>> 
					<?php echo $objResult["HN"];?>
				</option>
			<?php
			}
			?>
			</select></td>  

			<td> 
			 <?php    
			 error_reporting( error_reporting() & ~E_NOTICE );
			if($_GET["item"] != "")
			{
				?> <select name="searchHN" style="height:30">
				<?php
				$strSQL = "SELECT * FROM patients_info WHERE HN = '".$_GET["item"]."' ";
				$objQuery = $conn->query($strSQL);
				while($objResult2 = mysqli_fetch_array($objQuery)){  
					
					?> <option name="txtName" style="width:1000;" value="<?php echo $objResult2["HN"];?>"><?php echo  $objResult2["HN"]?> : <?php echo $objResult2["patientName"];?> <?php

				}
				?>  </select> <?php
			}
			   
	}

}
?>
