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
}
?>