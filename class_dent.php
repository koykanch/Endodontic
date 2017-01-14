<?php

class Dentist
{
	
	public function Dentistinfo($conn)
	{
		$per_page=2;
		// Let's put FROM and WHERE parts of the query into variable
		$from_where="FROM dentist_info";
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
		foreach ($DATA as $i => $row):

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

	public function searchdent($conn){
		?>
		<select name="dentname" style="width: 300px; height:50px; float:left;">
		<option value=" "><-- Please Select Dentist --></option>
		<?php
			$strSQL = "SELECT * FROM dentist_info ORDER BY dentId";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["dentId"];?> : <?php echo $objResult["dent_name"]; ?>"> <?php echo $objResult["dentId"]; ?> : <?php echo $objResult["dent_name"]; ?> </option>
			<?php
		}
				
		?>
			</select>
			<?php
	}
}

?>