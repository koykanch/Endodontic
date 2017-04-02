<?php
 require('connect.php');

//Endorecord
$HN = $_POST['HNpatient'];
$tooth = $_POST['tooth'];
$stu = $_POST['codestudent'];
$dent = $_POST['dentname'];
$datedemo = $_POST['demo'];
$timedemo = $_POST['endo_time'];
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));

// echo 'HN:'.$HN.'<br>student code: '.$stu.'<br>dent Id:'.$dent.'<br>date:'.$datedemo;
 $insert_endo = "INSERT INTO dent_hardcopy(HN, hard_Date, student_code, dentId, hardcopyData, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo','$stu','$dent','$image','$datedemo')";
 $result_endo = $conn->query($insert_endo);

 // //Patient's History----Medical History
 
if(!isset($_POST['nonemed'])){
	$none = 0;
}else{
	$none = $_POST['nonemed'];
}
if(isset($_POST['cardiodismed']) && $none == 0){
	$cardiovascular = $_POST['cardiodismed'];
}else{
	$cardiovascular = 0;
}
if(isset($_POST['pulmonarydismed']) && $none == 0){
	$pulmonary = $_POST['pulmonarydismed'];
}else{
	$pulmonary = 0;
}
if(isset($_POST['gastrodismed']) && $none == 0){
	$gastrointestinal = $_POST['gastrodismed'];
}else{
	$gastrointestinal = 0;
}
if(isset($_POST['hemadismed']) && $none == 0){
	$hematologic = $_POST['hemadismed'];
}else{
	$hematologic = 0;
}
if(isset($_POST['neurodismed']) && $none == 0){
	$neurologic = $_POST['neurodismed'];
}else{
	$neurologic = 0;
}

if(isset($_POST['allergicmed'])){
	$allergic_to = $_POST['allermed'];
}else{
	$allergic_to = "";
}


if(isset($_POST['bloodpressmed'])){
	$blood_pressure1 = $_POST['blood1'];
	$blood_pressure2 = $_POST['blood2'];
}else{
	$blood_pressure1 = "";
	$blood_pressure2 = "";
}

if(isset($_POST['othermed'])){
	$other_med = $_POST['medother'];
}else{
	$other_med = "";
}
if(isset($_POST['takingmed'])){
	$taking_medicine = $_POST['medtaking'];
}else{
	$taking_medicine = "";
}

$personal_doctor = $_POST['personalmed'];
$tel = $_POST['telmed'];
$remark_medical = $_POST['remarkmed'];

   // echo 'HN :'.$HN.'<br>date :'.$datedemo.'<br>none :'.$none.'<br>cardiovascular :'.$cardiovascular.'<br>pulmonary :'.$pulmonary.'<br>gastrointestinal :'.$gastrointestinal.'<br>hematologic :'.$hematologic.'<br>neurologic :'.$neurologic.'<br>allergic_to :'.$allergic_to.'<br>blood_pressure :'.$blood_pressure1.'<br>blood_pressure:'.$blood_pressure2.'<br>other :'.$other_med.'<br>taking_medicine :'.$taking_medicine.'<br>personal_doctor :'.$personal_doctor.'<br>tel :'.$tel.'<br>remark :'.$remark_medical;
 $insert_medical = "INSERT INTO medical_his (HN, Date, none, cardiovascular, pulmonary, gastrointestinal, hematologis, Neurologic, allergic, blood_pres1, blood_pres2, Other, taking_med, personal_doc, Tel, remark, date_treatment)VALUES('$HN','$datedemo'"."'$timedemo',b'$none',b'$cardiovascular',b'$pulmonary',b'$gastrointestinal',b'$hematologic',b'$neurologic','$allergic_to','$blood_pressure1','$blood_pressure2','$other_med','$taking_medicine','$personal_doctor','$tel','$remark_medical','$datedemo')";
$result_med = $conn->query($insert_medical);

// //Patient's History----Dental History
$chief_complaint = $_POST['chiefdent'];
$present_illness = $_POST['presentilldent'];

$insert_dental = "INSERT INTO dental_his(HN, Date, chief_complaint, his_of_presentill, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo','$chief_complaint','$present_illness','$datedemo')";
$result_dental = $conn->query($insert_dental);

// //Examination----S.Subjective Symptoms
$pain_intensity = $_POST['paininten'];
$pain_character = $_POST['paincharacter'];

// if(isset($_POST['onset'])){
// 	$onset = $_POST['onset']; //Spontaneous =0; Stimulation =1;
// }

// if($onset == 1){
// 	$onsetstimul = $_POST['onsetstimul']; //Stimulation Required //deffinition of Stimulation
// }else{
// 	$onsetstimul = ""; //Stimulation Required //deffinition of Stimulation is null because onset = spontan
// }

if(isset($_POST['onset_spont'])){
	$onset = $_POST['onset_spont']; 
}else{
	$onset = 0;
}

if(isset($_POST['onset_stimu'])){
	$onsetstimul = $_POST['stimulation'];
}else{
	$onsetstimul = "";
}
 
$onset_other = $_POST['onset_other'];
$duration = $_POST['duration'];
$location = $_POST['location']; //Localized or Diffused

if(isset($_POST['locat_radiating'])){
	$location_radiat = $_POST['locatradiat'];
}else{
	$location_radiat = "";
}

if(isset($_POST['locat_referred'])){
	$refer = $_POST['refer'];
}else{
	$refer = "";
}


// // echo 'HN :'.$HN.'<br>date :'.$datedemo.'<br>pain inten :'.$pain_intensity.'<br>pain char :'.$pain_character.'<br>duration :'.$duration.'<br>location :'.$location.'<br>onset :'.$onset.'<br>onsetstimul :'.$onsetstimul.'<br>location_radiat : '.$location_radiat.'<br>refer :'.$refer;
  $insert_subject = "INSERT INTO subject_symptom(HN, Date, paininten_id, painchar_id, duration_id, locat_locOrdiff, onset_spontaneous, stimulation_id, onset_other, locat_radiating, locat_referred, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo','$pain_intensity','$pain_character','$duration','$location',b'$onset','$onsetstimul','$onset_other','$location_radiat','$refer','$datedemo')";
  $result_subject = $conn->query($insert_subject);

//Examination----O.Objective Symptoms 
// test variable

if(!isset($_POST['extrafacial_check'])){
	$extrafacial_check = 0;
	//$extrafacial = '';
	
}else{
	$extrafacial_check = $_POST['extrafacial_check'];
	//$extrafacial = $_POST['extrafacial'];
}

if(!isset($_POST['extralymph_check'])){
	$extralymph_check = 0;
	//$extralymphnode = '';

}else{
	$extralymph_check = $_POST['extralymph_check'];
	//$extralymphnode = $_POST['extralymphnode'];
}

if(!isset($_POST['extrasinus_check'])){
	$extrasinus_check = 0;
	//$extrasinus = '';
}else{
	$extrasinus_check = $_POST['extrasinus_check'];
	//$extrasinus = $_POST['extrasinus'];
}

$extraother = $_POST['extraother'];

$swellsoftorfirm = $_POST['swellsoftorfirm'];
$intraswell_area = $_POST['intraswell_area'];

if(!isset($_POST['intra_sinus'])){
	$intra_sinus = 0;
	$intrasinus = '';
}else{
	$intra_sinus = $_POST['intra_sinus'];
	$intrasinus = $_POST['intrasinus'];
}

if(!isset($_POST['cariestooth'])){
	$tooth_caries = 0;
}else{
	$tooth_caries = $_POST['cariestooth'];
}
if(!isset($_POST['pulptoothex'])){
	$tooth_pulpexpo = 0;
}else{
	$tooth_pulpexpo = $_POST['pulptoothex'];
}
if(!isset($_POST['pulptoothpoly'])){
	$tooth_pulppoly=0;
}else{
	$tooth_pulppoly = $_POST['pulptoothpoly'];
}
if(!isset($_POST['opentoothdrai'])){
	$tooth_open=0;
}else{
	$tooth_open = $_POST['opentoothdrai'];
}
if(!isset($_POST['temptooth'])){
	$tooth_temp=0;
}else{
	$tooth_temp = $_POST['temptooth'];
}
if(isset($_POST['restoothtoration'])){ //chek with checkbox name(restoothtoration is name of checkbox)
	$restoration_with = $_POST['toothrestoration']; 
}else{
	$restoration_with = "";
}
if(isset($_POST['fracturetoration'])){ //chek with checkbox name(fracturetoration is name of checkbox)
	$fracture_at = $_POST['toothfractoration']; 
}else{
	$fracture_at = "";
}
if(isset($_POST['crowntooth'])){ //chek with checkbox name(fracturetoration is name of checkbox)
	$crown_discoloration = $_POST['toothcrown']; 
}else{
	$crown_discoloration = "";
}

$toothother = $_POST['toothother'];

$insert_object = "INSERT INTO object_symptom(HN, Date, ext_facialswelling, ext_lymphnode, ext_sinustract, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other, date_treatment)  VALUES('$HN','$datedemo'"."'$timedemo',b'$extrafacial_check',b'$extralymph_check',b'$extrasinus_check','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother','$datedemo')";
$result_object = $conn->query($insert_object);
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
  // echo 'HN: '.$HN.'<br>date: '.$datedemo.'<br>extrafacial_check: '.$extrafacial_check.'<br>extrafacial: '.$extrafacial.'<br>extralymph_check: '.$extralymph_check.'<br>extralymphnode: '.$extralymphnode.'<br>extrasinus_check: '.$extrasinus_check.'<br>extrasinus: '.$extrasinus.'<br>extraother: '.$extraother.'<br>swellsoftorfirm: '.$swellsoftorfirm.'<br>intraswell_area: '.$intraswell_area.'<br>intrasinus: '.$intrasinus.'<br>tooth_caries: '.$tooth_caries.'<br>restoration_with: '.$restoration_with.'<br>tooth_pulpexpo: '.$tooth_pulpexpo.'<br>tooth_pulppoly: '.$tooth_pulppoly.'<br>fracture_at: '.$fracture_at.'<br>crown_discoloration: '.$crown_discoloration.'<br>tooth_open: '.$tooth_open.'<br>tooth_temp: '.$tooth_temp.'<br>toothother: '.$toothother;
// if(isset($_POST['extrafacial_check']) && isset($_POST['extralymph_check']) && isset($_POST['extrasinus_check'])){
// 	echo 'select all';
//  	$insert_object = "INSERT INTO object_symptom VALUES('$HN','$datedemo',b'$extrafacial_check','$extrafacial',b'$extralymph_check','$extralymphnode',b'$extrasinus_check','$extrasinus','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(isset($_POST['extrafacial_check']) && !isset($_POST['extralymph_check']) && !isset($_POST['extrasinus_check'])){
// 	echo 'select extraficial';
// 	$insert_object = "INSERT INTO object_symptom(HN, Date, ext_facialswelling, facialswell_id, ext_lymphnode, ext_sinustract, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other) VALUES('$HN','$datedemo',b'$extrafacial_check','$extrafacial',b'$extralymph_check',b'$extrasinus_check','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(!isset($_POST['extrafacial_check']) && isset($_POST['extralymph_check']) && !isset($_POST['extrasinus_check'])){
// 	echo 'select extralymphnode';
// 	$insert_object = "INSERT INTO object_symptom(HN, Date, ext_facialswelling, ext_lymphnode, lymphnode_id ext_sinustract, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other) VALUES('$HN','$datedemo',b'$extrafacial_check',b'$extralymph_check', '$extralymphnode',b'$extrasinus_check','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(!isset($_POST['extrafacial_check']) && !isset($_POST['extralymph_check']) && isset($_POST['extrasinus_check'])){
// 	echo 'select extrasinus';
// 	$insert_object = "INSERT INTO object_symptom (HN, Date, ext_facialswelling, ext_lymphnode, ext_sinustract, sinustract_id, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other)VALUES('$HN','$datedemo',b'$extrafacial_check',b'$extralymph_check',b'$extrasinus_check','$extrasinus','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(isset($_POST['extrafacial_check']) && isset($_POST['extralymph_check']) && !isset($_POST['extrasinus_check'])){
// 	echo 'select extrafacial and extralymphnode';
// 	$insert_object = "INSERT INTO object_symptom (HN, Date, ext_facialswelling, facialswell_id, ext_lymphnode, lymphnode_id,ext_sinustract, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other)VALUES('$HN','$datedemo',b'$extrafacial_check','$extrafacial',b'$extralymph_check','$extralymphnode',b'$extrasinus_check','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(isset($_POST['extrafacial_check']) && !isset($_POST['extralymph_check']) && isset($_POST['extrasinus_check'])){
// 	echo 'select extraficial and extrasinus';
// 	$insert_object = "INSERT INTO object_symptom (HN, Date, ext_facialswelling, facialswell_id, ext_lymphnode,ext_sinustract, sinustract_id, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other)VALUES('$HN','$datedemo',b'$extrafacial_check','$extrafacial',b'$extralymph_check',b'$extrasinus_check','$extrasinus','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(!isset($_POST['extrafacial_check']) && isset($_POST['extralymph_check']) && isset($_POST['extrasinus_check'])){
// 	echo 'select extralymphnode and extrasinus';
// 	$insert_object = "INSERT INTO object_symptom (HN, Date, ext_facialswelling, ext_lymphnode, lymphnode_id, ext_sinustract, sinustract_id, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other)VALUES('$HN','$datedemo',b'$extrafacial_check', b'$extralymph_check','$extralymphnode',b'$extrasinus_check','$extrasinus','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }
// else if(!isset($_POST['extrafacial_check']) && !isset($_POST['extralymph_check']) && !isset($_POST['extrasinus_check'])){
// 	echo 'not select all';
// 	$insert_object = "INSERT INTO object_symptom (HN, Date, ext_facialswelling, ext_lymphnode, ext_sinustract, ext_other, intra_swellsoftOrfirm, intra_swellarea, intra_sinustract, tooth_caries, tooth_restoration, tooth_pulpexposure, tooth_pulppolyp, tooth_fracture, tooth_crown, tooth_open, tooth_temp, tooth_other)VALUES('$HN','$datedemo',b'$extrafacial_check', b'$extralymph_check',b'$extrasinus_check','$extraother',b'$swellsoftorfirm','$intraswell_area','$intrasinus',b'$tooth_caries','$restoration_with',b'$tooth_pulpexpo',b'$tooth_pulppoly','$fracture_at','$crown_discoloration',b'$tooth_open',b'$tooth_temp','$toothother')";
//  	// echo $insert_object;
//   	$result_object = $conn->query($insert_object);
// }

//Examination----Examination 
$numtooth1 = $_POST['numtooth1'];
$ept1 = $_POST['epttooth1'];
$cold1 = $_POST['cold1'];
$heat1 = $_POST['heat1'];
$perc1 = $_POST['perc1'];
$palp1 = $_POST['palp1'];
$mobility1 = $_POST['mobility1'];
$probe_mb1 = $_POST['probe_mb1'];
$probe_b1 = $_POST['probe_b1'];
$probe_db1 = $_POST['probe_db1'];
$probe_ml1 = $_POST['probe_ml1'];
$probe_l1 = $_POST['probe_l1'];
$probe_dl1 = $_POST['probe_dl1'];


$numtooth2 = $_POST['numtooth2'];
$ept2 = $_POST['epttooth2'];
$cold2 = $_POST['cold2'];
$heat2 = $_POST['heat2'];
$perc2 = $_POST['perc2'];
$palp2 = $_POST['palp2'];
$mobility2 = $_POST['mobility2'];
$probe_mb2 = $_POST['probe_mb2'];
$probe_b2 = $_POST['probe_b2'];
$probe_db2 = $_POST['probe_db2'];
$probe_ml2 = $_POST['probe_ml2'];
$probe_l2 = $_POST['probe_l2'];
$probe_dl2 = $_POST['probe_dl2'];

// if(isset($_POST['special_test1'])){
// 	$special_test1 = $_POST['special_test1'];
// }else{
// 	$special_test1 = "";
// }

// if(isset($_POST['special_test2'])){
// 	$special_test2 = $_POST['special_test2'];
// }else{
// 	$special_test2 = "";
// }

// if(!isset($_POST['checkcold'])){
// 	$cold=0;
// }else{
// 	$cold = $_POST['checkcold'];
// }

// if(!isset($_POST['checkheat'])){
// 	$heat=0;
// }else{
// 	$heat = $_POST['checkheat'];
// }

// if(!isset($_POST['checkperc'])){
// 	$perc=0;
// }else{
// 	$perc = $_POST['checkperc'];
// }

// if(!isset($_POST['checkpalp'])){
// 	$palp=0;
// }else{
// 	$palp = $_POST['checkpalp'];
// }
// $mobility = $_POST['mobility'];
// $probe_mb = $_POST['probe_mb'];
// $probe_b = $_POST['probe_b'];
// $probe_db = $_POST['probe_db'];
// $probe_ml = $_POST['probe_ml'];
// $probe_l = $_POST['probe_l'];
// $probe_dl = $_POST['probe_dl'];
// if(isset($_POST['spectest'])){
// 	$special_test = $_POST['special_test'];
// }else{
// 	$special_test = "";
// }

 //echo 'HN: '.$HN.'<br>date:'.$datedemo.'<br>time:'.$timedemo.'<br>numtooth:'.$numtooth1.'<br>ept:'.$ept1.'<br>cold:'.$cold1.'<br>heat:'.$heat1.'<br>perc:'.$perc1.'<br>palp:'.$palp1.'<br>mobility:'.$mobility1.'<br>probe_mb:'.$probe_mb1.'<br>probe_b:'.$probe_b1.'<br>probe_db:'.$probe_db1.'<br>probe_ml:'.$probe_ml1.'<br>probe_l:'.$probe_l1.'<br>probe_dl:'.$probe_dl1.'<br>special_test:'.$special_test1;

 //echo '<br><br>HN: '.$HN.'<br>date:'.$datedemo.'<br>time:'.$timedemo.'<br>numtooth:'.$numtooth2.'<br>ept:'.$ept2.'<br>cold:'.$cold2.'<br>heat:'.$heat2.'<br>perc:'.$perc2.'<br>palp:'.$palp2.'<br>mobility:'.$mobility2.'<br>probe_mb:'.$probe_mb2.'<br>probe_b:'.$probe_b2.'<br>probe_db:'.$probe_db2.'<br>probe_ml:'.$probe_ml2.'<br>probe_l:'.$probe_l2.'<br>probe_dl:'.$probe_dl2.'<br>special_test:'.$special_test2;

 // // echo 'HN: '.$HN.'<br>date:'.$datedemo.'<br>numtooth:'.$numtooth.'<br>ept:'.$ept.'<br>cold:'.$cold.'<br>heat:'.$heat.'<br>perc:'.$perc.'<br>palp:'.$palp.'<br>mobility:'.$mobility.'<br>probe_mb:'.$probe_mb.'<br>probe_b:'.$probe_b.'<br>probe_db:'.$probe_db.'<br>probe_ml:'.$probe_ml.'<br>probe_l:'.$probe_l.'<br>probe_dl:'.$probe_dl.'<br>special_test:'.$special_test;

	$searchSeqhard = "SELECT MAX(Seq_no) as maxid FROM dent_hardcopy";
	$resultSeqhard = $conn->query($searchSeqhard);
	$objresultSeqhard = mysqli_fetch_assoc($resultSeqhard);
	//echo $objresultSeqhard['maxid'];
	$last_seq = $objresultSeqhard['maxid'];

if($_POST['special_test1'] != ""){
	//echo "spec1";
	$special_test1 = $_POST['special_test1'];
	$insert_examination1 = "INSERT INTO examination(Seq_hardcopy,HN, Date, exam_tooth, exam_EPT, exam_cold, exam_heat, exam_perc, exam_palp, exam_mobility, exam_perioMB, exam_perioB, exam_perioDB, exam_perioML, exam_perioL, exam_perioDL, spectest_id, date_treatment) VALUES('$last_seq','$HN','$datedemo'"."'$timedemo','$numtooth1','$ept1','$cold1','$heat1','$perc1','$palp1','$mobility1','$probe_mb1','$probe_b1','$probe_db1','$probe_ml1','$probe_l1','$probe_dl1','$special_test1','$datedemo')";
	$result_examination1 = $conn->query($insert_examination1);
}else if($_POST['special_test1'] == ""){
	//echo "spec1/1";
	$insert_examination1 = "INSERT INTO examination(Seq_hardcopy,HN, Date, exam_tooth, exam_EPT, exam_cold, exam_heat, exam_perc, exam_palp, exam_mobility, exam_perioMB, exam_perioB, exam_perioDB, exam_perioML, exam_perioL, exam_perioDL, date_treatment) VALUES('$last_seq','$HN','$datedemo'"."'$timedemo','$numtooth1','$ept1','$cold1','$heat1','$perc1','$palp1','$mobility1','$probe_mb1','$probe_b1','$probe_db1','$probe_ml1','$probe_l1','$probe_dl1','$datedemo')";
	$result_examination1 = $conn->query($insert_examination1);
}

if($_POST['numtooth2'] != "" && $_POST['special_test2'] != ""){
	//echo "spec2";
	$special_test2 = $_POST['special_test2'];
	$insert_examination2 = "INSERT INTO examination(Seq_hardcopy,HN, Date, exam_tooth, exam_EPT, exam_cold, exam_heat, exam_perc, exam_palp, exam_mobility, exam_perioMB, exam_perioB, exam_perioDB, exam_perioML, exam_perioL, exam_perioDL, spectest_id, date_treatment) VALUES('$last_seq','$HN','$datedemo'"."'$timedemo','$numtooth2','$ept2','$cold2','$heat2','$perc2','$palp2','$mobility2','$probe_mb2','$probe_b2','$probe_db2','$probe_ml2','$probe_l2','$probe_dl2','$special_test2','$datedemo')";
	$result_examination2 = $conn->query($insert_examination2);
}else if($_POST['numtooth2'] != "" && $_POST['special_test2'] == ""){
	//echo "spec2/1";
	$insert_examination2 = "INSERT INTO examination(Seq_hardcopy,HN, Date, exam_tooth, exam_EPT, exam_cold, exam_heat, exam_perc, exam_palp, exam_mobility, exam_perioMB, exam_perioB, exam_perioDB, exam_perioML, exam_perioL, exam_perioDL, date_treatment) VALUES('$last_seq','$HN','$datedemo'"."'$timedemo','$numtooth2','$ept2','$cold2','$heat2','$perc2','$palp2','$mobility2','$probe_mb2','$probe_b2','$probe_db2','$probe_ml2','$probe_l2','$probe_dl2','$datedemo')";
	$result_examination2 = $conn->query($insert_examination2);
}

//Radiograph_Crown
if(!isset($_POST['normcrown'])){
	$normcrown=0;
}else{
	$normcrown = $_POST['normcrown'];
}

if(isset($_POST['restcrown']) && $normcrown == 0){
	$restcrown = $_POST['restcrown'];
}else{
	$restcrown=0;
}

if(isset($_POST['fractcrown']) && $normcrown == 0){
	$fractcrown = $_POST['fractcrown'];
}else{
	$fractcrown=0;
}

if(isset($_POST['cariescrown']) && $normcrown == 0){
	$cariescrown = $_POST['cariescrown'];
}else{
	$cariescrown=0;
}

if($normcrown == 0 && $cariescrown == 1){
	$crowarea = $_POST['crowarea'];
	$crowdepth = $_POST['crowdepth'];
}else{
	$crowarea = "";
	$crowdepth = "";
}

$crownother = $_POST['crownother'];

// //echo 'HN: '.$HN.'<br>date: '.$datedemo.'<br>normcrown:'.$normcrown.'<br>cariescrown:'.$cariescrown.'<br>crowarea:'.$crowarea.'<br>crowdepth:'.$crowdepth.'<br>restcrown:'.$restcrown.'<br>fractcrown:'.$fractcrown.'<br>crownother:'.$crownother;
 $insert_radiocrown = "INSERT INTO radiograph_crown(HN, Date, crown_normal, crown_caries, crown_cariesarea, crown_cariesdepth, crown_restoration, crown_fracture, crown_other, date_treatment)  VALUES('$HN','$datedemo'"."'$timedemo',b'$normcrown',b'$cariescrown','$crowarea','$crowdepth',b'$restcrown',b'$fractcrown','$crownother','$datedemo')";
 $result_radiocrown = $conn->query($insert_radiocrown);


// // //Radiograph_pulpcham
if(!isset($_POST['normcham'])){
	$pulpcham_normal=0;
}else{
	$pulpcham_normal = $_POST['normcham'];
}

if(isset($_POST['stonecham']) && $pulpcham_normal == 0){
	$pulpcham_stone = $_POST['stonecham'];
}else{
	$pulpcham_stone=0;
}

if(isset($_POST['rescham'])&& $pulpcham_normal == 0){
	$pulpcham_resorp = $_POST['rescham'];
}else{
	$pulpcham_resorp=0;
}
if(isset($_POST['calcificatecham'])&& $pulpcham_normal == 0){
	$pulpcham_partorcomp = $_POST['partialorcomp']; // partial=0; complete=1;
}else{
	$pulpcham_partorcomp = "";
}
$pulpchamother = $_POST['pulpchamother'];

$insert_radiopulpcham = "INSERT INTO radiograph_pulpcham(HN, Date, pulpcham_normal, pulpcham_calPartOrComp, pulpcham_pulpstone, pulpcham_resorption, pulpcham_other, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$pulpcham_normal','$pulpcham_partorcomp',b'$pulpcham_stone',b'$pulpcham_resorp','$pulpchamother','$datedemo')";
$result_radiopulpcham = $conn->query($insert_radiopulpcham);

// // //Radiograph_root
if(!isset($_POST['normroot'])){
	$root_normal=0;
}else{
	$root_normal = $_POST['normroot'];
}

if(isset($_POST['cariesroot']) && $root_normal == 0){
	$root_caries = $_POST['cariesroot'];
}else{
	$root_caries = 0;
}

if(isset($_POST['curvatureroot']) && $root_normal == 0){
	$root_curvature = $_POST['curvatureroot'];
}else{
	$root_curvature=0;
}

if(isset($_POST['extresroot']) && $root_normal == 0){
	$root_extresorp = $_POST['extresroot'];
}else{
	$root_extresorp=0;
}

if(isset($_POST['fractroot']) && $root_normal == 0){
	$root_fracture = $_POST['fractroot'];
}else{
	$root_fracture = 0;
}

$root_other = $_POST['root_other'];

$insert_radioroot = "INSERT INTO radiograph_root(HN, Date, root_normal, root_caries, root_curvature, root_extresorption, root_fracture, root_other, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$root_normal',b'$root_caries',b'$root_curvature',b'$root_extresorp',b'$root_fracture','$root_other','$datedemo')";
$result_radioroot = $conn->query($insert_radioroot);

// //Radiograph_pulpcanal

if(!isset($_POST['normcanel'])){
	$pulpcan_normal=0;
}else{
	$pulpcan_normal = $_POST['normcanel'];
}

if(isset($_POST['resorpcanel']) && $pulpcan_normal == 0){
	$pulpcan_resorp = $_POST['resorpcanel'];
}else{
	$pulpcan_resorp=0;
}

if(isset($_POST['perforcanel']) && $pulpcan_normal == 0){
	$pulpcan_perfor = $_POST['perforcanel'];
}else{
	$pulpcan_perfor=0;
}

if(isset($_POST['prevcanel']) && $pulpcan_normal == 0){
	$pulpcan_prev = $_POST['prevcanel'];
}else{
	$pulpcan_prev=0;
}

if(isset($_POST['brokecanel']) && $pulpcan_normal == 0){
	$pulpcan_broke = $_POST['brokecanel'];
}else{
	$pulpcan_broke=0;
}

if(isset($_POST['calcificatecanel']) && $pulpcan_normal == 0){ //check with checkbox name(calcificatecanel is the name of checkbox)
	//$pulpcan_cal = $_POST['calcificatecanel'];
	$pulpcan_selcal = $_POST['select_cal']; // partial =0 | complete = 1
}else{
	//$pulpcan_cal = 0;
	$pulpcan_selcal = "";
}

$pulpcanother = $_POST['pulpcanother'];

$insert_radiopulpcanal = "INSERT INTO radiograph_pulpcanal(HN, Date, pulpcan_normal, pulpcan_calPartOrComp, pulpcan_resorption, pulpcan_perforation, pulpcan_previousRCT, pulpcan_broken, pulpcan_other, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$pulpcan_normal','$pulpcan_selcal',b'$pulpcan_resorp',b'$pulpcan_perfor',b'$pulpcan_prev',b'$pulpcan_broke','$pulpcanother','$datedemo')";
$result_radiopulpcanal = $conn->query($insert_radiopulpcanal);

//Radiograph_perirad 

if(!isset($_POST['normperirad'])){
	$perirad_normal = 0;
}else{
	$perirad_normal = $_POST['normperirad'];
}

if(isset($_POST['widenperirad']) && $perirad_normal == 0){
	$perirad_widen = $_POST['widenperirad'];
}else{
	$perirad_widen = 0;
}

if(isset($_POST['lossperirad']) && $perirad_normal == 0){
	$perirad_loss = $_POST['lossperirad'];
}else{
	$perirad_loss = 0;
}

if(isset($_POST['resorpperirad']) && $perirad_normal == 0){
	$perirad_resorp = $_POST['resorpperirad'];
}else{
	$perirad_resorp = 0;
}

if(isset($_POST['apexperirad']) && $perirad_normal == 0){
	$perirad_openapex = $_POST['apexperirad_width'];
}else{
	$perirad_openapex = "";
}

if(isset($_POST['osteoperirad']) && $perirad_normal == 0){
	$perirad_osteos = $_POST['osteoperirad'];
}else{
	$perirad_osteos = 0;
}

if(isset($_POST['hyperperirad']) && $perirad_normal == 0){
	$perirad_hyper = $_POST['hyperperirad'];
}else{
	$perirad_hyper = 0;
}

if($perirad_normal == 0 && isset($_POST['perialessperirad'])){
	$periapical_lesion1 = $_POST['periradperialess1'];
	$periapical_lesion2 = $_POST['periradperialess2'];
}else{
	$periapical_lesion1 = "";
	$periapical_lesion2 = "";
}

if($perirad_normal == 0 && isset($_POST['laterlessperirad'])){
	$lateral_lesion1 = $_POST['laterlessperirad1'];
	$lateral_lesion2 = $_POST['laterlessperirad2'];
}else{
	$lateral_lesion1 = "";
	$lateral_lesion2 = "";
}

$perother = $_POST['perother'];

$insert_radioperirad = "INSERT INTO radiograph_perirad(HN, Date, perirad_normal, perirad_wideningPDL, perirad_lossoflam, perirad_periapical1, perirad_periapical2, perirad_lateral1, perirad_lateral2, perirad_resorption, perirad_openapex, perirad_osteos, perirad_hyper, perirad_other, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$perirad_normal',b'$perirad_widen',b'$perirad_loss','$periapical_lesion1','$periapical_lesion2','$lateral_lesion1','$lateral_lesion2',b'$perirad_resorp','$perirad_openapex',b'$perirad_osteos',b'$perirad_hyper','$perother','$datedemo')";
$result_radioperirad = $conn->query($insert_radioperirad);

//Radiograph_alveolar
if(isset($_POST['alveolar'])){
	$alveolar = $_POST['alveolar'];
}else{
	$alveolar = "";
	$normalveolar = 0;
	$generalOrlocal = "";
}

if($alveolar == "normalveolar"){
	$normalveolar = 1;
	$generalOrlocal = "";
}
else if($alveolar == "generalalveolar"){
	$normalveolar = 0;
	$generalOrlocal = 0; //general =0;
}
else if($alveolar == "localalveolar"){
	$normalveolar = 0;
	$generalOrlocal = 1; //local = 1;
}

$alveolarother = $_POST['alveolarother'];
$remark = $_POST['otherremark'];

$insert_alveolar = "INSERT INTO radiograph_alveolar(HN, Date, bone_normal, bone_genOrlocal, bone_other, remark, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$normalveolar','$generalOrlocal','$alveolarother','$remark','$datedemo')";
$result_alveolar = $conn->query($insert_alveolar);

//Diagnosis----Pulpal Diagnosis

if(!isset($_POST['puldiagnorm'])){
	$pul_normal = 0;
}else{
	$pul_normal = $_POST['puldiagnorm'];
}

if(isset($_POST['reverOrirrever']) && $pul_normal == 0){
	$ReverOrIrrever = $_POST['reverOrirrever'];
}else{
	$ReverOrIrrever = "";
}

if(isset($_POST['reverOrirrever']) && $pul_normal == 0 && $ReverOrIrrever == 1){
	
	if(isset($_POST['sympOrasymp'])){
		$sympOrasymp = $_POST['sympOrasymp'];
	}else{
   		?>
        	  <script> window.alert('Please select Symptomatic or Asymptomatic'); </script> 
   		<?php
 		$sympOrasymp = "1";
 	}
 }else{
 	$sympOrasymp = "";
 }

if(isset($_POST['pulpnecrosis']) && $pul_normal == 0){
	$pulpnecrosis = $_POST['pulpnecrosis'];
}else{
	$pulpnecrosis=0;
}

if(isset($_POST['previnitiat']) && $pul_normal == 0){
	$prev_initiated = $_POST['previnitiat'];
}else{
	$prev_initiated=0;
}

if(isset($_POST['prevtreat']) && $pul_normal == 0){
	$prev_treated = $_POST['prevtreat'];
}
else{
	$prev_treated=0;
}
//Improper = 0; Incomplete = 1;
if($pul_normal==0 && $prev_treated==1 && $_POST['prevselect'] == 0){
	$Improper = 1;
	$Incomplete = 0;
}
else if($pul_normal==0 && $prev_treated==1 && $_POST['prevselect'] == 1){
	$Improper = 0;
	$Incomplete = 1; 
}else{
	$Improper = "";
	$Incomplete = "";
}

$insert_pulpaldiag = "INSERT INTO pulpal_diagnosis(HN, Date, normal, ReverOrIrreversiblepulp, Irreversible_sympOrasymp, pulp_necrosis, prev_initiat, prev_treated, prev_treated_improper, prev_treated_incomplete, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$pul_normal','$ReverOrIrrever','$sympOrasymp',b'$pulpnecrosis',b'$prev_initiated',b'$prev_treated',b'$Improper',b'$Incomplete','$datedemo')";
$result_pulpaldiag = $conn->query($insert_pulpaldiag);

//Diagnosis----Periradicular Diagnosis

if(!isset($_POST['periraddiagnorm'])){
	$per_normal=0;
}else{
	$per_normal = $_POST['periraddiagnorm'];
}

if(isset($_POST['per_sympOrasymp']) && $per_normal == 0){
	$sympOrasympt_apical = $_POST['per_sympOrasymp'];
}else{
	$sympOrasympt_apical = "";
}

if(isset($_POST['acuteOrchronic']) && $per_normal == 0){
	$acuteOrchronic_apical = $_POST['acuteOrchronic'];
}else{
	$acuteOrchronic_apical = "";
}
$perdiagother = $_POST['perdiagother'];

$insert_periraddiag = "INSERT INTO periradicular_diagnosis(HN, Date, Normal, sympOrasympt_apical, acuteOrchronic_apical, other, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$per_normal','$sympOrasympt_apical','$acuteOrchronic_apical','$perdiagother','$datedemo')";
$result_periraddiag = $conn->query($insert_periraddiag);

//Treatment Planning

if(!isset($_POST['notreat'])){
	$notreat = 0;
}else{
	$notreat = $_POST['notreat'];
}

if(!isset($_POST['pulposelect'])){
	$pulposelect = "";
}else{
	$pulposelect = $_POST['pulposelect'];
}

if(isset($_POST['pulpotomy']) && $notreat == 0){
	$pulpotomy = $_POST['pulpotomy'];
	$pulp_partialOrfull = $pulposelect;
}else{
	$pulpotomy=0;
	$pulp_partialOrfull = "";
}

if(isset($_POST['pulpectomy']) && $notreat == 0){
	$pulpectomy = $_POST['pulpectomy'];
}else{
	$pulpectomy=0;
}

if(isset($_POST['nonrootcanel']) && $notreat == 0){
	$non_rootcanel = $_POST['nonrootcanel'];
}else{
	$non_rootcanel=0;
}

if(isset($_POST['nonretreatment']) && $notreat == 0){
	$non_retreatment = $_POST['nonretreatment'];
}else{
	$non_retreatment=0;
}

if(isset($_POST['apexification']) && $notreat == 0){
	$apexification = $_POST['apexification'];
}else{
	$apexification=0;
}

if(isset($_POST['intentional']) && $notreat == 0){
	$intentional_RCT = $_POST['intentional'];
}else{
	$intentional_RCT=0;
}

if(isset($_POST['rootcaneltreat']) && $notreat == 0){
	$rootcaneltreat = $_POST['rootcaneltreat'];
}else{
	$rootcaneltreat=0;
}

if(isset($_POST['perio']) && $notreat == 0){
	$perio = $_POST['perio'];
}else{
	$perio=0;
}

$periradother = $_POST['periradother'];
$planrestor = $_POST['planrestor'];

if(isset($_POST['preop_carie'])){
	$preop_caries = 1;
}else{
	$preop_caries = 0;
}

if(isset($_POST['preop_dam'])){
	$preop_dam = 1;
}else{
	$preop_dam = 0;
}
// if(!isset($_POST['preop'])){
// 	$preop = "";
// }else{
// 	$preop = $_POST['preop'];
// }

// if($preop == "cariesremove"){
// 	$preop_caries = 1;
// 	$preop_dam = 0;
// }
// else if($preop == "dam"){
// 	$preop_caries = 0;
// 	$preop_dam = 1;
// }else{
// 	$preop_caries = 0;
// 	$preop_dam = 0;
// }
$preopother = $_POST['preopother'];

if(!isset($_POST['anesthesis'])){
	$anesthesis = "";
}else{
	$anesthesis = $_POST['anesthesis'];
}

if($anesthesis == "anesrequired"){
	$reqOrnotreq = 1; //require
}
else if($anesthesis == "anesnotrequired"){
	$reqOrnotreq = 0; //not require
}

$insert_treatment = "INSERT INTO treatment_plan(HN, Date, no_treatment, Pulpotomy, pulp_partOrfull, pulpectomy, non_sur_root, non_sur_retreat, apexification, intentionalRCT, sur_root, perio_consult, treat_other, plan_for_final, pre_op_treat_caries, pre_op_treat_dam, pre_op_treat_other, Anest_reqOrnotreq, date_treatment) VALUES('$HN','$datedemo'"."'$timedemo',b'$notreat',b'$pulpotomy','$pulp_partialOrfull',b'$pulpectomy',b'$non_rootcanel',b'$non_retreatment',b'$apexification',b'$intentional_RCT',b'$rootcaneltreat',b'$perio','$periradother','$planrestor',b'$preop_caries',b'$preop_dam','$preopother',b'$reqOrnotreq','$datedemo')";
$result_treatment = $conn->query($insert_treatment);

$xrayfile = addslashes(file_get_contents($_FILES['xrayfile']['tmp_name']));
$xraydate = $_POST['xraydate'];
$xraytime = $_POST['xraytime'];

$insert_xray = "INSERT INTO patients_xray(HN,Date,xrayData,xray_datetime) VALUES('$HN','$datedemo','$xrayfile','$xraydate'"."'$xraytime')";
$result_xray = $conn->query($insert_xray);

   if($result_endo === TRUE && $result_med === TRUE  && $result_dental === TRUE && $result_subject === TRUE && $result_object === TRUE && $result_examination1 === TRUE && $result_radiocrown === TRUE && $result_radiopulpcham === TRUE && $result_radioroot === TRUE &&  $result_radiopulpcanal === TRUE && $result_radioperirad === TRUE && $result_alveolar === TRUE && $result_pulpaldiag === TRUE && $result_periraddiag === TRUE && $result_treatment === TRUE && $result_xray === TRUE){

     	?>
     		<script>
     			window.alert('Success');
    				//window.location = "endorecord.php";
     		</script>
     	<?php
     }else{
    	?>
     		<script>
     			window.alert('Unsuccess');
     			//window.location = "endorecord.php";
     		</script>
     	<?php
     	echo "Error description: " . mysqli_error($conn);
     	//echo "<br>Error description: " . mysqli_error($result_med);
     } 
?>