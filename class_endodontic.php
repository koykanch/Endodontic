<?php
class Endodontic{
	public function selpaininten($conn){
		$sql = "SELECT * FROM pain_intensity";
		$result = $conn->query($sql);
		?>
			<option value="">select pain intensity</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['paininten_id'] ?>"><?php echo $row['paininten_detail'] ?></option>
			<?php
		}
	}

	public function selpaincharact($conn){
		$sql = "SELECT * FROM pain_character";
		$result = $conn->query($sql);
		?>
			<option value="">select pain character</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['painchar_id'] ?>"><?php echo $row['painchar_detail'] ?></option>
			<?php
		}
	}

	public function selstimulation($conn)
	{
		$sql = "SELECT * FROM stimulation_required";
		$result = $conn->query($sql);
		?>
			<option value="">select stimulation</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['stimulation_id'] ?>"><?php echo $row['stimulation_detail'] ?></option>
			<?php
		}
	}

	public function selduration($conn){
		$sql = "SELECT * FROM duration";
		$result = $conn->query($sql);
		?>
			<option value="">select duration</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['duration_id'] ?>"><?php echo $row['duration_detail'] ?></option>
			<?php
		}
	}

	public function sellocation($conn){
		$sql = "SELECT * FROM location";
		$result = $conn->query($sql);
		?>
			<option value="">select location</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_detail'] ?></option>
			<?php
		}
	}

	public function selextrafacial($conn){
		$sql = "SELECT * FROM extra_facial";
		$result = $conn->query($sql);
		?>
			<option value="">select facial swelling</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['facialswell_id'] ?>"><?php echo $row['facialswell_detail'] ?></option>
			<?php
		}
	}

	public function selextralymphnode($conn){
		$sql = "SELECT * FROM extra_lymphnode";
		$result = $conn->query($sql);
		?>
			<option value="">select lymph node</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['lymphnode_id'] ?>"><?php echo $row['lymphnode_detail'] ?></option>
			<?php
		}
	}

	public function selextrasinus($conn){
		$sql = "SELECT * FROM extra_sinus";
		$result = $conn->query($sql);
		?>
			<option value="">select sinus tract</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['sinustract_id'] ?>"><?php echo $row['sinustract_detail'] ?></option>
			<?php
		}
	}

	public function selspecialtest($conn){
		$sql = "SELECT * FROM special_test";
		$result = $conn->query($sql);
		?>
			<option value="">select special test</option>
		<?php
		while($row = mysqli_fetch_array($result)){
			?>
			<option value="<?php echo $row['spectest_id'] ?>"><?php echo $row['spectest_detail'] ?></option>
			<?php
		}
	}

	public function searchHN($conn){
		$sql = "SELECT * FROM patients_info WHERE HN ='1'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		return $row['HN'];
	}

	public function searchHN1($conn){
		$sql = "SELECT * FROM patients_info WHERE HN ='1'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		return $row['patientName'];
	}

	public function searchHN3($conn){
		$sql = "SELECT * FROM patients_info WHERE HN = '1'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		return $row['gender'];
	}

	public function selpaininten_edit($conn,$painintenId){
		$searchPainintenname = "SELECT * FROM pain_intensity WHERE paininten_id = '$painintenId'";
		$resultPainintenname = $conn->query($searchPainintenname);
		$objresultPainintenname = mysqli_fetch_array($resultPainintenname);
		?>
			<option value="<?php echo $painintenId; ?>"><?php echo $painintenId; ?> : <?php echo $objresultPainintenname['paininten_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM pain_intensity WHERE paininten_id != '$painintenId' ORDER BY paininten_id";
		$objQuery = $conn->query($strSQL);
	
			echo '<option value="">Select pain intensity</option>';
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["paininten_id"];?>"> <?php echo $objResult["paininten_id"]; ?> : <?php echo $objResult["paininten_detail"]; ?> </option>
			<?php
		}
	}

	public function selpaincharact_edit($conn,$paincharId){
		$searchPaincharname = "SELECT * FROM pain_character WHERE painchar_id = '$paincharId'";
		$resultPaincharname = $conn->query($searchPaincharname);
		$objresultPaincharname = mysqli_fetch_array($resultPaincharname);
		?>
			<option value="<?php echo $paincharId; ?>"><?php echo $paincharId; ?> : <?php echo $objresultPaincharname['painchar_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM pain_character WHERE painchar_id != '$paincharId' ORDER BY painchar_id";
		$objQuery = $conn->query($strSQL); 
		echo '<option value="">Select pain character</option>';
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["painchar_id"];?>"> <?php echo $objResult["painchar_id"]; ?> : <?php echo $objResult["painchar_detail"]; ?> </option>
			<?php
		}
	}

	public function selstimulation_edit($conn,$stimulation_id){
		$searchStimulationname = "SELECT * FROM stimulation_required WHERE stimulation_id = '$stimulation_id'";
		$resultStimulationname = $conn->query($searchStimulationname);
		$objresultStimulationname = mysqli_fetch_array($resultStimulationname);
		?>
			<option value="<?php echo $objresultStimulationname['stimulation_id'] ?>"><?php echo $objresultStimulationname['stimulation_detail']?></option>
		<?php

		$strSQL = "SELECT * FROM stimulation_required WHERE stimulation_id != '$stimulation_id' ORDER BY stimulation_id";
		$objQuery = $conn->query($strSQL); 
		echo '<option value="">Select stimulation required</option>';
		while($row = mysqli_fetch_array($objQuery)){
			?>
			<option value="<?php echo $row['stimulation_id'] ?>"><?php echo $row['stimulation_detail'] ?></option>
			<?php
		}
	}

	public function selduration_edit($conn,$durationId){
		$searchDurationname = "SELECT * FROM duration WHERE duration_id = '$durationId'";
		$resultDurationname = $conn->query($searchDurationname);
		$objresultDurationname = mysqli_fetch_array($resultDurationname);
		?>
			<option value="<?php echo $durationId; ?>"><?php echo $durationId; ?> : <?php echo $objresultDurationname['duration_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM duration WHERE duration_id != '$durationId' ORDER BY duration_id";
		$objQuery = $conn->query($strSQL); 
		echo '<option value="">Select duration</option>';
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["duration_id"];?>"> <?php echo $objResult["duration_id"]; ?> : <?php echo $objResult["duration_detail"]; ?> </option>
			<?php
		}
	}

	public function sellocation_edit($conn,$locat_locOrdiff){
		$searchLocation = "SELECT * FROM location WHERE location_id = '$locat_locOrdiff'";
		$resultLocation = $conn->query($searchLocation);
		$objresultLocation = mysqli_fetch_array($resultLocation);
		?>
			<option value="<?php echo $locat_locOrdiff; ?>"><?php echo $locat_locOrdiff; ?> : <?php echo $objresultLocation['location_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM location WHERE location_id != '$locat_locOrdiff' ORDER BY location_id";
		$objQuery = $conn->query($strSQL); 
		echo '<option value="">Select location</option>';
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["location_id"];?>"> <?php echo $objResult["location_id"]; ?> : <?php echo $objResult["location_detail"]; ?> </option>
			<?php
		}
	}

	public function selextrafacial_edit($conn,$facialswellId){
		$searchFacial = "SELECT * FROM extra_facial WHERE facialswell_id = '$facialswellId'";
		$resultFacial = $conn->query($searchFacial);
		$objresultFacial = mysqli_fetch_array($resultFacial);
		?>
			<option value="<?php echo $facialswellId; ?>"><?php echo $facialswellId; ?> : <?php echo $objresultFacial['facialswell_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM extra_facial WHERE facialswell_id != '$facialswellId' ORDER BY facialswell_id";
		$objQuery = $conn->query($strSQL); 
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["facialswell_id"];?>"> <?php echo $objResult["facialswell_id"]; ?> : <?php echo $objResult["facialswell_detail"]; ?> </option>
			<?php
		}
	}

	public function selextralymphnode_edit($conn,$lymphnodeId){
		$searchLymph = "SELECT * FROM extra_lymphnode WHERE lymphnode_id = '$lymphnodeId'";
		$resultLymph = $conn->query($searchLymph);
		$objresultLymph = mysqli_fetch_array($resultLymph);
		?>
			<option value="<?php echo $lymphnodeId; ?>"><?php echo $lymphnodeId; ?> : <?php echo $objresultLymph['lymphnode_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM extra_lymphnode WHERE lymphnode_id != '$lymphnodeId' ORDER BY lymphnode_id";
		$objQuery = $conn->query($strSQL); 
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["lymphnode_id"];?>"> <?php echo $objResult["lymphnode_id"]; ?> : <?php echo $objResult["lymphnode_detail"]; ?> </option>
			<?php
		}
	}

	public function selextrasinus_edit($conn,$sinustractId){
		$searchSinus = "SELECT * FROM extra_sinus WHERE sinustract_id = '$sinustractId'";
		$resultSinus = $conn->query($searchSinus);
		$objresultSinus = mysqli_fetch_array($resultSinus);
		?>
			<option value="<?php echo $sinustractId; ?>"><?php echo $sinustractId; ?> : <?php echo $objresultSinus['sinustract_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM extra_sinus WHERE sinustract_id != '$sinustractId' ORDER BY sinustract_id";
		$objQuery = $conn->query($strSQL); 
	
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["sinustract_id"];?>"> <?php echo $objResult["sinustract_id"]; ?> : <?php echo $objResult["sinustract_detail"]; ?> </option>
			<?php
		}
	}

	public function selexamcold_edit($conn,$exam_cold){
		if($exam_cold=='WNL'){
			?>
			<option value="WNL">WNL</option>
			<option value="">Plaese select</option>
	        <option value="positive">positive</option>
	        <option value="negative">negative</option>
	        <?php
		}else if($exam_cold=='positive'){
			?>
			<option value="positive">positive</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="negative">negative</option>
	        <?php
		}else{
			?>
			<option value="negative">negative</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="positive">positive</option>
	        <?php
		}
	}
				
	public function selexamheat_edit($conn, $exam_heat){
		if($exam_heat=='WNL'){
			?>
			<option value="WNL">WNL</option>
			<option value="">Plaese select</option>
	        <option value="positive">positive</option>
	        <option value="negative">negative</option>
	        <?php
		}else if($exam_heat=='positive'){
			?>
			<option value="positive">positive</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="negative">negative</option>
	        <?php
		}else{
			?>
			<option value="negative">negative</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="positive">positive</option>
	        <?php
		}
	}

	public function selexamperc_edit($conn, $exam_perc){
		if($exam_perc=='WNL'){
			?>
			<option value="WNL">WNL</option>
			<option value="">Plaese select</option>
	        <option value="positive">positive</option>
	        <option value="negative">negative</option>
	        <?php
		}else if($exam_perc=='positive'){
			?>
			<option value="positive">positive</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="negative">negative</option>
	        <?php
		}else{
			?>
			<option value="negative">negative</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="positive">positive</option>
	        <?php
		}
	}

	public function selexampalp_edit($conn, $exam_palp){
		if($exam_palp=='WNL'){
			?>
			<option value="WNL">WNL</option>
			<option value="">Plaese select</option>
	        <option value="positive">positive</option>
	        <option value="negative">negative</option>
	        <?php
		}else if($exam_palp=='positive'){
			?>
			<option value="positive">positive</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="negative">negative</option>
	        <?php
		}else{
			?>
			<option value="negative">negative</option>
			<option value="">Plaese select</option>
	        <option value="WNL">WNL</option>
	        <option value="positive">positive</option>
	        <?php
		}
	}

	public function selexammobility_edit($conn, $exam_mobility){
		if($exam_mobility=='1'){
			?>
			<option value="1">1</option>
			<option value="">Plaese select</option>
	        <option value="2">2</option>
	        <option value="3">3</option>
	        <?php
		}else if($exam_mobility=='2'){
			?>
			<option value="2">2</option>
			<option value="">Plaese select</option>
	        <option value="1">1</option>
	        <option value="3">3</option>
	        <?php
		}else{
			?>
			<option value="3">3</option>
			<option value="">Plaese select</option>
	        <option value="1">1</option>
	        <option value="2">2</option>
	        <?php
		}
	}

	public function selspecialtest_edit($conn,$spectestId){
		$searchSpecial = "SELECT * FROM special_test WHERE spectest_id = '$spectestId'";
		$resultSpecial = $conn->query($searchSpecial);
		$objresultSpecial = mysqli_fetch_array($resultSpecial);
		?>
			<option value="<?php echo $spectestId; ?>"><?php echo $spectestId; ?> : <?php echo $objresultSpecial['spectest_detail']; ?></option>
		<?php
		$strSQL = "SELECT * FROM special_test WHERE spectest_id != '$spectestId' ORDER BY spectest_id";
		$objQuery = $conn->query($strSQL); 
	
				echo '<option value="">select special test</option>';
		while($objResult = mysqli_fetch_array($objQuery))
		{
			?>
				<option value="<?php echo $objResult["spectest_id"];?>"> <?php echo $objResult["spectest_id"]; ?> : <?php echo $objResult["spectest_detail"]; ?> </option>
			<?php
		}
	}

}
?>