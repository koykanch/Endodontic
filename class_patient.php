<?php

class Patient
{
	public function SearchHN($conn){
		?>
		
		<option value=" "><-- Please Select Item --></option>
		<?php
			$strSQL = "SELECT * FROM patients_info ORDER BY HN";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["HN"];?>"> <?php echo $objResult["HN"]; ?> : <?php echo $objResult["patientName"]; ?> </option>
			<?php
		}
	}

}
?>