<?php

class Patient
{
	public function Patientinfo($conn)
	{
		$per_page=5;
		// Let's put FROM and WHERE parts of the query into variable
		$from_where="FROM patients_info";
		// and get total number of records
		$sql = "SELECT count(*) ".$from_where;
		$result = $conn->query($sql);
		$row = mysqli_fetch_row($result);
		$total_rows = $row[0];

		//let's get page number from the query string 
		if (isset($_GET['page'])) $CUR_PAGE = intval($_GET['page']); else $CUR_PAGE=1;
		//and calculate $start variable for the LIMIT clause
		$start = abs(($CUR_PAGE-1)*$per_page);

		//Let's query database for the actual data
		$sql = "SELECT * $from_where LIMIT $start,$per_page";
		$result = $conn->query($sql);
		// and fill an array
		while ($row=mysqli_fetch_array($result)) $DATA[++$start]=$row;

		//now let's form new query string without page variable
		$uri = strtok($_SERVER['REQUEST_URI'],"?")."?";    
		$tmpget = $_GET;
		unset($tmpget['page']);
		if ($tmpget) {
		  $uri .= http_build_query($tmpget)."&";
		}    
		//now we're getting total pages number and fill an array of links
		$num_pages=ceil($total_rows/$per_page);
		for($i=1;$i<=$num_pages;$i++) $PAGES[$i]=$uri.'page='.$i;

		//and, finally, starting output in the template.
		?>
		<?php foreach ($DATA as $i => $row): 
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
		 endforeach ?>	
		 </table>

             Pages: 
            <?php foreach ($PAGES as $i => $link): ?>
            <?php if ($i == $CUR_PAGE): ?>
            <b><?php=$i?></b>
            <?php else: ?> 
            <a href="<?=$link?>"><?php echo $i?></a>
            <?php endif ?> 
            <?php endforeach ?><br> 
            Found rows: <b><?php echo $total_rows?></b><br>
                </div>    
                </div>    
                </div>
	<?php
	}

	public function SearchHN($conn){
		?>
		<select name="HNpatient" style="width: 300px; height:50px;">
		<option value=" "><-- Please Select Item --></option>
		<?php
			$strSQL = "SELECT * FROM patients_info ORDER BY HN";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["HN"];?> : <?php echo $objResult['patientName']; ?>"> <?php echo $objResult["HN"]; ?> : <?php echo $objResult['patientName']; ?> </option>
			<?php
		}
				
		?>
			</select>
			<?php
	}

}
?>