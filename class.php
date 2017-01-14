<?php
class Check{
	//eieieiieiei
	public function CheckNone($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 277; $i <= 295; $i++) //x coordinate
		  {
		  	for($j = 927; $j <= 944 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=278 && $i<=294){
		      	 	if($j>=928 && $j<=943){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=278 && $i<=294){
		      	 	if($j>=928 && $j<=943){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgnone'] = $average;
		}
	}

	public function Checkcardiovascular($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 423; $i <= 441; $i++) //x coordinate
		  {
		  	for($j = 927; $j <= 944 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=424 && $i<=440){
		      	 	if($j>=928 && $j<=943){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=424 && $i<=440){
		      	 	if($j>=928 && $j<=943){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgcardio'] = $average;
		}
	}

	public function CheckPulmonary($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 802; $i <= 818; $i++) //x coordinate
		  {
		  	for($j = 927; $j <= 944 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=803 && $i<=817){
		      	 	if($j>=928 && $j<=943){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=803 && $i<=817){
		      	 	if($j>=928 && $j<=943){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgpul'] = $average;
		}
	}

	public function CheckGastro($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 1130; $i <= 1147; $i++) //x coordinate
		  {
		  	for($j = 927; $j <= 943 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=1131 && $i<=1146){
		      	 	if($j>=928 && $j<=942){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=1131 && $i<=1146){
		      	 	if($j>=928 && $j<=942){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avggastro'] = $average;
		}
	}

	public function CheckHematologic($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 1507; $i <= 1525; $i++) //x coordinate
		  {
		  	for($j = 927; $j <= 943 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=1508 && $i<=1524){
		      	 	if($j>=928 && $j<=942){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=1508 && $i<=1524){
		      	 	if($j>=928 && $j<=942){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avghema'] = $average;
		}
	}

	public function CheckNeurologic($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 277; $i <= 294; $i++) //x coordinate
		  {
		  	for($j = 960; $j <= 978 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=278 && $i<=293){
		      	 	if($j>=961 && $j<=977){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=278 && $i<=293){
		      	 	if($j>=961 && $j<=977){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgneuro'] = $average;
		}
	}

	public function CheckAllergic($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 577; $i <= 595; $i++) //x coordinate
		  {
		  	for($j = 960; $j <= 978 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=578 && $i<=594){
		      	 	if($j>=961 && $j<=977){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=578 && $i<=594){
		      	 	if($j>=961 && $j<=977){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgallergic'] = $average;
		}
	}

	public function CheckBlood($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 984; $i <= 1001; $i++) //x coordinate
		  {
		  	for($j = 960; $j <= 978 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=985 && $i<=1000){
		      	 	if($j>=961 && $j<=977){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=985 && $i<=1000){
		      	 	if($j>=961 && $j<=977){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgblood'] = $average;
		}
	}

	public function CheckOther($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 1472; $i <= 1490; $i++) //x coordinate
		  {
		  	for($j = 960; $j <= 977 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=1473 && $i<=1489){
		      	 	if($j>=961 && $j<=976){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=1473 && $i<=1489){
		      	 	if($j>=961 && $j<=976){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgother'] = $average;
		}
	}

	public function CheckTaking($image,$conn){
		if($image == ""){
			?>
			<script>
				window.alert('กรุณาเลือกไฟล์ภาพ');
			</script>
			<?php
		}
		else{
			//Checkbox of None
		  $palette = array();
		  $img = imagecreatefromjpeg($image);
			
		  if(!$img) {
		    return FALSE;
		  }
		 $count0 = 0;
		 $count1 = 0;
		  for($i = 277; $i <= 295; $i++) //x coordinate
		  {
		  	for($j = 960; $j <= 978 ; $j++) //y coordinate
		    {

		      $thisColor = imagecolorat($img, $i, $j);
		      $rgb = imagecolorsforindex($img, $thisColor); 
		      $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));

		      if('#'.$color == '#000000') 
		      {
		      	 echo "0";
		      	 
		      	 if($i>=278 && $i<=294){
		      	 	if($j>=961 && $j<=977){
		      	 		$count0 = $count0 + 1;
		      	 	}
		      	 }
		      } 
		      else
		      {
		      	  echo "1";
		      	 if($i>=278 && $i<=294){
		      	 	if($j>=961 && $j<=977){
		      	 		$count1 = $count1 + 1;
		      	 	}
		      	 }
		      }
		      
		    }
		   
		  echo "<br>";
		  }
		  echo "Number of black color (0) = ". $count0."<br>";
		  echo "Number of white color (1) = ". $count1."<br>";
		  $_SESSION['count0'] = $count0;
		  $average = ($count0/$count1) * 100;
		  $_SESSION['avgtaking'] = $average;
		}
	}
}
?>