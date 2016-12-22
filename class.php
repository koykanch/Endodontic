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
		  $_SESSION['avg'] = $average;
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
		  $_SESSION['avg'] = $average;
		}
	}
}
?>