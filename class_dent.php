<?php

class Dentist
{
	public function searchdent($conn){
		?>
		<option value=" "><-- Please Select Dentist --></option>
		<?php
			$strSQL = "SELECT * FROM dentist_info ORDER BY dentId";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["dentId"];?>"> <?php echo $objResult["dentId"]; ?> : <?php echo $objResult["dent_name"]; ?> </option>
			<?php
		}
	}

	public function searchdentedit($conn,$HN,$harddate){
			$searchDent = "SELECT * FROM dent_hardcopy WHERE HN = '$HN' AND hard_Date = '$harddate'";
			$resultDent = $conn->query($searchDent);
			$objresultDent = mysqli_fetch_array($resultDent);

			$searchDentname = "SELECT * FROM dentist_info WHERE dentId = '".$objresultDent['dentId']."'";
			$resultDentname = $conn->query($searchDentname);
			$objresultDentname = mysqli_fetch_array($resultDentname);
		?>
		
			<option value="<?php echo $objresultDent['dentId']; ?>">
				<?php echo $objresultDent['dentId']; ?> : <?php echo $objresultDentname['dent_name']; ?>		
			</option>
		<?php
			$strSQL = "SELECT * FROM dentist_info WHERE dentId != '".$objresultDent['dentId']."'ORDER BY dentId";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["dentId"];?>"> <?php echo $objResult["dentId"]; ?> : <?php echo $objResult["dent_name"]; ?> </option>
			<?php
		}
	}
}

?>