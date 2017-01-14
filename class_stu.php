<?php

class Student
{
	public function Studentinfo($conn)
	{
		$per_page=5;
		// Let's put FROM and WHERE parts of the query into variable
		$from_where="FROM dentalstudent_info";
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

	public function searchstu($conn){
		?>
		<select name="codestudent" style="width: 300px; height:50px; float:left;">
		<option value=" "><-- Please Select Student --></option>
		<?php
			$strSQL = "SELECT * FROM dentalstudent_info ORDER BY student_code";
			$objQuery = $conn->query($strSQL);
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["student_code"];?> : <?php echo $objResult["student_name"]; ?>"> <?php echo $objResult["student_code"]; ?> : <?php echo $objResult["student_name"]; ?> </option>
			<?php
		}
				
		?>
			</select>
			<?php
	}
}
?>