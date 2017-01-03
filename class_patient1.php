<!DOCTYPE html>
<html>
<head>
<?php
require('connect.php');
?>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

			<select name="HNpatient" id="HNpatient" onchange="javascript:window.location='?item='+this.value;">
			<option value=" "><-- Please Select Item --></option>
		<?php
			$strSQL = "SELECT * FROM patients_info ORDER BY HN";
			$objQuery2 = $conn->query($strSQL);
	
		while($objResult2 = mysqli_fetch_array($objQuery2))
		{
			if($_GET["item"] == $objResult2["HN"])
				{
					$sel = "selected";
				}
				else
				{
					$sel = "";
				}
			?>
				<option value="<?php echo $objResult2["HN"];?>" <?php echo $sel;?>> <?php echo $objResult2["HN"]; ?> </option>
			<?php
		}
				
		?>
			</select>
		  </p>

		<?php		   
			 error_reporting( error_reporting() & ~E_NOTICE );
			if($_GET["item"] != "")
			{
				
				$strSQL2 = "SELECT * FROM patients_info WHERE HN = '".$_GET["item"]."' ";
				$objQuery3 = $conn->query($strSQL2);
				$objResult3 = mysqli_fetch_array($objQuery3) 
					
					?> <input type="text" name="txtName" style="width:1000; height:30" value="<?php echo $objResult3["HN"]; ?> : <?php echo $objResult3["patientName"];?>"><?php
				}
			?>
</body>
</html>
