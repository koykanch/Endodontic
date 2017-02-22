<?php
 require('connect.php');

////Endorecord
$HN = $_POST['HN'];
$stu = $_POST['stu_code'];
$dent = $_POST['dent_id'];
$harddate = $_POST['harddate'];
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));

// $update_endo = "UPDATE dent_hardcopy SET hardcopyData = '$image' WHERE HN = '$HN' AND hard_Date='$harddate' AND student_code = '$stu' AND dentId = '$dent'";
// $result_endo = $conn->query($update_endo);

//Patient's History----Medical History
// if(!isset($_POST['nonemed'])){
// 	$none = 0;
// }else{
// 	$none = $_POST['nonemed'];
// }
// if(isset($_POST['cardiodismed']) && $none == 0){
// 	$cardiovascular = $_POST['cardiodismed'];
// }else{
// 	$cardiovascular = 0;
// }
// if(isset($_POST['pulmonarydismed']) && $none == 0){
// 	$pulmonary = $_POST['pulmonarydismed'];
// }else{
// 	$pulmonary = 0;
// }
// if(isset($_POST['gastrodismed']) && $none == 0){
// 	$gastrointestinal = $_POST['gastrodismed'];
// }else{
// 	$gastrointestinal = 0;
// }
// if(isset($_POST['hemadismed']) && $none == 0){
// 	$hematologic = $_POST['hemadismed'];
// }else{
// 	$hematologic = 0;
// }
// if(isset($_POST['neurodismed']) && $none == 0){
// 	$neurologic = $_POST['neurodismed'];
// }else{
// 	$neurologic = 0;
// }
// if(isset($_POST['allergicmed']) && $none == 0){
// 	$allergic_to = $_POST['allermed'];
// }else{
// 	$allergic_to = "";
// }
// if(isset($_POST['bloodpressmed'])){
// 	$blood_pressure = $_POST['blood'];
// }else{
// 	$blood_pressure = "";
// }

// if(isset($_POST['othermed'])){
// 	$other_med = $_POST['medother'];
// }else{
// 	$other_med = "";
// }
// if(isset($_POST['takingmed'])){
// 	$taking_medicine = $_POST['medtaking'];
// }else{
// 	$taking_medicine = "";
// }

// $personal_doctor = $_POST['personalmed'];
// $tel = $_POST['telmed'];
// $remark_medical = $_POST['remarkmed'];

// // echo 'HN :'.$HN.'<br>date :'.$harddate.'<br>none :'.$none.'<br>cardiovascular :'.$cardiovascular.'<br>pulmonary :'.$pulmonary.'<br>gastrointestinal :'.$gastrointestinal.'<br>hematologic :'.$hematologic.'<br>neurologic :'.$neurologic.'<br>allergic_to :'.$allergic_to.'<br>blood_pressure :'.$blood_pressure.'<br>other :'.$other_med.'<br>taking_medicine :'.$taking_medicine.'<br>personal_doctor :'.$personal_doctor.'<br>tel :'.$tel.'<br>remark :'.$remark_medical;
// $update_medical = "UPDATE medical_his SET none = b'$none',cardiovascular = b'$cardiovascular',pulmonary = b'$pulmonary',gastrointestinal = b'$gastrointestinal',hematologis = b'$hematologic',Neurologic = b'$neurologic',allergic = '$allergic_to',blood_pres = '$blood_pressure',Other = '$other_med',taking_med = '$taking_medicine',personal_doc = '$personal_doctor',Tel = '$tel',remark = '$remark_medical' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_med = $conn->query($update_medical);

// //Patient's History----Dental History
// $chief_complaint = $_POST['chiefdent'];
// $present_illness = $_POST['presentilldent'];

// $update_dental = "UPDATE dental_his SET chief_complaint = '$chief_complaint',his_of_presentill = '$present_illness' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_dental = $conn->query($update_dental);

//Examination----S.Subjective Symptoms
// $pain_intensity = $_POST['paininten'];
// $pain_character = $_POST['paincharacter'];

// if(isset($_POST['onset'])){
// 	$onset = $_POST['onset']; //Spontaneous =0; Stimulation =1;
// }

// if($onset == 1){
// 	$onsetstimul = $_POST['onsetstimul']; //Stimulation Required //deffinition of Stimulation
// }else{
// 	$onsetstimul = ""; //Stimulation Required //deffinition of Stimulation is null because onset = spontan
// }
 
// $duration = $_POST['duration'];
// $location = $_POST['location']; //Localized or Diffused

// if(isset($_POST['locat_radiating'])){
// 	$location_radiat = $_POST['locatradiat'];
// }else{
// 	$location_radiat = "";
// }

// if(isset($_POST['locat_referred'])){
// 	$refer = $_POST['refer'];
// }else{
// 	$refer = "";
// }
// //echo 'HN :'.$HN.'<br>date :'.$harddate.'<br>pain inten :'.$pain_intensity.'<br>pain char :'.$pain_character.'<br>duration :'.$duration.'<br>location :'.$location.'<br>onset :'.$onset.'<br>onsetstimul :'.$onsetstimul.'<br>location_radiat : '.$location_radiat.'<br>refer :'.$refer;
// $update_subject = "UPDATE subject_symptom SET paininten_id = '$pain_intensity',painchar_id = '$pain_character',duration_id = '$duration',locat_locOrdiff = '$location',onset_spontOrstim = b'$onset',stimulation_detail = '$onsetstimul',locat_radiating = '$location_radiat',locat_referred = '$refer' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_subject = $conn->query($update_subject);

//Examination----O.Objective Symptoms 
// if(!isset($_POST['extrafacial_check'])){
// 	$extrafacial_check = 0;
// 	$extrafacial = '';
// }else{
// 	$extrafacial_check = $_POST['extrafacial_check'];
// 	$extrafacial = $_POST['extrafacial'];
// }

// if(!isset($_POST['extralymph_check'])){
// 	$extralymph_check = 0;
// 	$extralymphnode = '';
// }else{
// 	$extralymph_check = $_POST['extralymph_check'];
// 	$extralymphnode = $_POST['extralymphnode'];
// }

// if(!isset($_POST['extrasinus_check'])){
// 	$extrasinus_check = 0;
// 	$extrasinus = '';
// }else{
// 	$extrasinus_check = $_POST['extrasinus_check'];
// 	$extrasinus = $_POST['extrasinus'];
// }

// $extraother = $_POST['extraother'];

// $swellsoftorfirm = $_POST['swellsoftorfirm'];
// $intraswell_area = $_POST['intraswell_area'];

// if(!isset($_POST['intra_sinus'])){
// 	$intra_sinus = 0;
// 	$intrasinus = '';
// }else{
// 	$intra_sinus = $_POST['intra_sinus'];
// 	$intrasinus = $_POST['intrasinus'];
// }

// if(!isset($_POST['cariestooth'])){
// 	$tooth_caries = 0;
// }else{
// 	$tooth_caries = $_POST['cariestooth'];
// }
// if(!isset($_POST['pulptoothex'])){
// 	$tooth_pulpexpo = 0;
// }else{
// 	$tooth_pulpexpo = $_POST['pulptoothex'];
// }
// if(!isset($_POST['pulptoothpoly'])){
// 	$tooth_pulppoly=0;
// }else{
// 	$tooth_pulppoly = $_POST['pulptoothpoly'];
// }
// if(!isset($_POST['opentoothdrai'])){
// 	$tooth_open=0;
// }else{
// 	$tooth_open = $_POST['opentoothdrai'];
// }
// if(!isset($_POST['temptooth'])){
// 	$tooth_temp=0;
// }else{
// 	$tooth_temp = $_POST['temptooth'];
// }
// if(isset($_POST['restoothtoration'])){ //chek with checkbox name(restoothtoration is name of checkbox)
// 	$restoration_with = $_POST['toothrestoration']; 
// }else{
// 	$restoration_with = "";
// }
// if(isset($_POST['fracturetoration'])){ //chek with checkbox name(fracturetoration is name of checkbox)
// 	$fracture_at = $_POST['toothfractoration']; 
// }else{
// 	$fracture_at = "";
// }
// if(isset($_POST['crowntooth'])){ //chek with checkbox name(fracturetoration is name of checkbox)
// 	$crown_discoloration = $_POST['toothcrown']; 
// }else{
// 	$crown_discoloration = "";
// }

// $toothother = $_POST['toothother'];
// // echo 'HN: '.$HN.'<br>date: '.$harddate.'<br>extrafacial_check: '.$extrafacial_check.'<br>extrafacial: '.$extrafacial.'<br>extralymph_check: '.$extralymph_check.'<br>extralymphnode: '.$extralymphnode.'<br>extrasinus_check: '.$extrasinus_check.'<br>extrasinus: '.$extrasinus.'<br>extraother: '.$extraother.'<br>swellsoftorfirm: '.$swellsoftorfirm.'<br>intraswell_area: '.$intraswell_area.'<br>intrasinus: '.$intrasinus.'<br>tooth_caries: '.$tooth_caries.'<br>restoration_with: '.$restoration_with.'<br>tooth_pulpexpo: '.$tooth_pulpexpo.'<br>tooth_pulppoly: '.$tooth_pulppoly.'<br>fracture_at: '.$fracture_at.'<br>crown_discoloration: '.$crown_discoloration.'<br>tooth_open: '.$tooth_open.'<br>tooth_temp: '.$tooth_temp.'<br>toothother: '.$toothother;
// $update_object = "UPDATE object_symptom SET ext_facialswelling = b'$extrafacial_check',facialswell_id = '$extrafacial',ext_lymphnode = b'$extralymph_check',lymphnode_id = '$extralymphnode',ext_sinustract = b'$extrasinus_check',sinustract_id = '$extrasinus',ext_other = '$extraother',intra_swellsoftOrfirm = b'$swellsoftorfirm',intra_swellarea = '$intraswell_area',intra_sinustract = '$intrasinus',tooth_caries = b'$tooth_caries',tooth_restoration = '$restoration_with',tooth_pulpexposure = b'$tooth_pulpexpo',tooth_pulppolyp = b'$tooth_pulppoly',tooth_fracture = '$fracture_at',tooth_crown = '$crown_discoloration',tooth_open = b'$tooth_open',tooth_temp = b'$tooth_temp',tooth_other = '$toothother' WHERE HN = '$HN' AND Date = '$harddate'";
 // $result_object = $conn->query($update_object);

//Examination----Examination 
// $numtooth = $_POST['numtooth'];
// $ept = $_POST['epttooth'];

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
// // echo 'HN: '.$HN.'<br>date:'.$harddate.'<br>numtooth:'.$numtooth.'<br>ept:'.$ept.'<br>cold:'.$cold.'<br>heat:'.$heat.'<br>perc:'.$perc.'<br>palp:'.$palp.'<br>mobility:'.$mobility.'<br>probe_mb:'.$probe_mb.'<br>probe_b:'.$probe_b.'<br>probe_db:'.$probe_db.'<br>probe_ml:'.$probe_ml.'<br>probe_l:'.$probe_l.'<br>probe_dl:'.$probe_dl.'<br>special_test:'.$special_test;
//  $update_examination = "UPDATE examination SET exam_tooth = '$numtooth',exam_EPT = '$ept',exam_cold = b'$cold',exam_heat = b'$heat',exam_perc = b'$perc',exam_palp = b'$palp',exam_mobility = '$mobility',exam_perioMB = '$probe_mb',exam_perioB = '$probe_b',exam_perioDB = '$probe_db',exam_perioML = '$probe_ml',exam_perioL = '$probe_l',exam_perioDL = '$probe_dl',spectest_id = '$special_test' WHERE HN = '$HN' AND Date = '$harddate'";
//  $result_examination = $conn->query($update_examination);

//Radiograph_Crown
// if(!isset($_POST['normcrown'])){
// 	$normcrown=0;
// }else{
// 	$normcrown = $_POST['normcrown'];
// }

// if(isset($_POST['restcrown']) && $normcrown == 0){
// 	$restcrown = $_POST['restcrown'];
// }else{
// 	$restcrown=0;
// }

// if(isset($_POST['fractcrown']) && $normcrown == 0){
// 	$fractcrown = $_POST['fractcrown'];
// }else{
// 	$fractcrown=0;
// }

// if(isset($_POST['cariescrown']) && $normcrown == 0){
// 	$cariescrown = $_POST['cariescrown'];
// }else{
// 	$cariescrown=0;
// }

// if($normcrown == 0 && $cariescrown == 1){
// 	$crowarea = $_POST['crowarea'];
// 	$crowdepth = $_POST['crowdepth'];
// }else{
// 	$crowarea = "";
// 	$crowdepth = "";
// }

// $crownother = $_POST['crownother'];
// echo 'HN: '.$HN.'<br>date: '.$harddate.'<br>normcrown:'.$normcrown.'<br>cariescrown:'.$cariescrown.'<br>crowarea:'.$crowarea.'<br>crowdepth:'.$crowdepth.'<br>restcrown:'.$restcrown.'<br>fractcrown:'.$fractcrown.'<br>crownother:'.$crownother;
//  $update_radiocrown = "UPDATE radiograph_crown SET crown_normal = b'$normcrown',crown_caries = b'$cariescrown',crown_cariesarea = '$crowarea',crown_cariesdepth = '$crowdepth',crown_restoration = b'$restcrown',crown_fracture = b'$fractcrown',crown_other = '$crownother' WHERE HN = '$HN' AND Date = '$harddate'";
//  $result_radiocrown = $conn->query($update_radiocrown);

// //Radiograph_pulpcham
// if(!isset($_POST['normcham'])){
// 	$pulpcham_normal=0;
// }else{
// 	$pulpcham_normal = $_POST['normcham'];
// }

// if(isset($_POST['stonecham']) && $pulpcham_normal == 0){
// 	$pulpcham_stone = $_POST['stonecham'];
// }else{
// 	$pulpcham_stone=0;
// }

// if(isset($_POST['rescham'])&& $pulpcham_normal == 0){
// 	$pulpcham_resorp = $_POST['rescham'];
// }else{
// 	$pulpcham_resorp=0;
// }
// if(isset($_POST['calcificatecham'])&& $pulpcham_normal == 0){
// 	$pulpcham_partorcomp = $_POST['partialorcomp']; // partial=0; complete=1;
// }else{
// 	$pulpcham_partorcomp = "";
// }
// $pulpchamother = $_POST['pulpchamother'];
// //echo 'HN: '.$HN.'<br>date: '.$harddate.'<br>normal:'.$pulpcham_normal.'<br>Partial or Complete:'.$pulpcham_partorcomp.'<br>pulpcham_stone:'.$pulpcham_stone.'<br>pulpcham_resorp:'.$pulpcham_resorp.'<br>pulpchamother:'.$pulpchamother;
//  $update_radiopulpcham = "UPDATE radiograph_pulpcham SET pulpcham_normal = b'$pulpcham_normal',pulpcham_calPartOrComp = '$pulpcham_partorcomp',pulpcham_pulpstone = b'$pulpcham_stone',pulpcham_resorption = b'$pulpcham_resorp',pulpcham_other = '$pulpchamother' WHERE HN = '$HN' AND Date = '$harddate'";
//  $result_radiopulpcham = $conn->query($update_radiopulpcham);

// //Radiograph_root
// if(!isset($_POST['normroot'])){
// 	$root_normal=0;
// }else{
// 	$root_normal = $_POST['normroot'];
// }

// if(isset($_POST['cariesroot']) && $root_normal == 0){
// 	$root_caries = $_POST['cariesroot'];
// }else{
// 	$root_caries = 0;
// }

// if(isset($_POST['curvatureroot']) && $root_normal == 0){
// 	$root_curvature = $_POST['curvatureroot'];
// }else{
// 	$root_curvature=0;
// }

// if(isset($_POST['extresroot']) && $root_normal == 0){
// 	$root_extresorp = $_POST['extresroot'];
// }else{
// 	$root_extresorp=0;
// }

// if(isset($_POST['fractroot']) && $root_normal == 0){
// 	$root_fracture = $_POST['fractroot'];
// }else{
// 	$root_fracture = 0;
// }

// $root_other = $_POST['root_other'];
// // echo 'HN:'.$HN.'<br>Date:'.$harddate.'<br>normal:'.$root_normal.'<br>caries:'.$root_caries.'<br>curvature:'.$root_curvature.'<br>extra resorption: '.$root_extresorp.'<br>fracture: '.$root_fracture.'<br>other:'.$root_other;
// $update_radioroot = "UPDATE radiograph_root SET root_normal = b'$root_normal',root_caries = b'$root_caries',root_curvature = b'$root_curvature',root_extresorption = b'$root_extresorp',root_fracture = b'$root_fracture',root_other = '$root_other' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_radioroot = $conn->query($update_radioroot);

// //Radiograph_pulpcanal

// if(!isset($_POST['normcanel'])){
// 	$pulpcan_normal=0;
// }else{
// 	$pulpcan_normal = $_POST['normcanel'];
// }

// if(isset($_POST['resorpcanel']) && $pulpcan_normal == 0){
// 	$pulpcan_resorp = $_POST['resorpcanel'];
// }else{
// 	$pulpcan_resorp=0;
// }

// if(isset($_POST['perforcanel']) && $pulpcan_normal == 0){
// 	$pulpcan_perfor = $_POST['perforcanel'];
// }else{
// 	$pulpcan_perfor=0;
// }

// if(isset($_POST['prevcanel']) && $pulpcan_normal == 0){
// 	$pulpcan_prev = $_POST['prevcanel'];
// }else{
// 	$pulpcan_prev=0;
// }

// if(isset($_POST['brokecanel']) && $pulpcan_normal == 0){
// 	$pulpcan_broke = $_POST['brokecanel'];
// }else{
// 	$pulpcan_broke=0;
// }

// if(isset($_POST['calcificatecanel']) && $pulpcan_normal == 0){ //check with checkbox name(calcificatecanel is the name of checkbox)
// 	//$pulpcan_cal = $_POST['calcificatecanel'];
// 	$pulpcan_selcal = $_POST['select_cal']; // partial =0 | complete = 1
// }else{
// 	//$pulpcan_cal = 0;
// 	$pulpcan_selcal = "";
// }

// $pulpcanother = $_POST['pulpcanother'];
// // echo 'HN:'.$HN.'<br>date:'.$harddate.'<br>normal:'.$pulpcan_normal.'<br>Calcification: '.$pulpcan_selcal.'<br>resorption: '.$pulpcan_resorp.'<br>Perforation: '.$pulpcan_perfor.'<br>Previous RCT: '.$pulpcan_prev.'<br>Broken Instrument: '.$pulpcan_broke.'<br>Other: '.$pulpcanother;
//  $update_radiopulpcanal = "UPDATE radiograph_pulpcanal SET pulpcan_normal = b'$pulpcan_normal',pulpcan_calPartOrComp = '$pulpcan_selcal',pulpcan_resorption = b'$pulpcan_resorp',pulpcan_perforation = b'$pulpcan_perfor',pulpcan_previousRCT = b'$pulpcan_prev',pulpcan_broken = b'$pulpcan_broke',pulpcan_other = '$pulpcanother' WHERE HN = '$HN' AND Date = '$harddate'";
//  $result_radiopulpcanal = $conn->query($update_radiopulpcanal);

//Radiograph_perirad 
// if(!isset($_POST['normperirad'])){
// 	$perirad_normal = 0;
// }else{
// 	$perirad_normal = $_POST['normperirad'];
// }

// if(isset($_POST['widenperirad']) && $perirad_normal == 0){
// 	$perirad_widen = $_POST['widenperirad'];
// }else{
// 	$perirad_widen = 0;
// }

// if(isset($_POST['lossperirad']) && $perirad_normal == 0){
// 	$perirad_loss = $_POST['lossperirad'];
// }else{
// 	$perirad_loss = 0;
// }

// if(isset($_POST['resorpperirad']) && $perirad_normal == 0){
// 	$perirad_resorp = $_POST['resorpperirad'];
// }else{
// 	$perirad_resorp = 0;
// }

// if(isset($_POST['apexperirad']) && $perirad_normal == 0){
// 	$perirad_openapex = $_POST['apexperirad'];
// }else{
// 	$perirad_openapex = 0;
// }

// if(isset($_POST['osteoperirad']) && $perirad_normal == 0){
// 	$perirad_osteos = $_POST['osteoperirad'];
// }else{
// 	$perirad_osteos = 0;
// }

// if(isset($_POST['hyperperirad']) && $perirad_normal == 0){
// 	$perirad_hyper = $_POST['hyperperirad'];
// }else{
// 	$perirad_hyper = 0;
// }

// if($perirad_normal == 0 && isset($_POST['perialessperirad'])){
// 	$periapical_lesion = $_POST['periradperialess'];
// }else{
// 	$periapical_lesion = "";
// }

// if($perirad_normal == 0 && isset($_POST['laterlessperirad'])){
// 	$lateral_lesion = $_POST['periradlaterless'];
// }else{
// 	$lateral_lesion = "";
// }

// $perother = $_POST['perother'];

// echo 'HN:'.$HN.'<br>date:'.$harddate.'<br>normal: '.$perirad_normal.'<br>Widening PDL: '.$perirad_widen.'<br>Loss of Lamina Dura: '.$perirad_loss.'<br>Periapical Lession: '.$periapical_lesion.'<br>Lateral lession: '.$lateral_lesion.'<br>Resorption: '.$perirad_resorp.'<br>Open Apex: '.$perirad_openapex.'<br>Osteoslcerosis: '.$perirad_osteos.'<br>Hyperplasia of cementurn: '.$perirad_hyper.'<br>Other: '.$perother;
// $update_radioperirad = "UPDATE radiograph_perirad SET perirad_normal = b'$perirad_normal',perirad_wideningPDL = b'$perirad_widen',perirad_lossoflam = b'$perirad_loss',perirad_periapical = '$periapical_lesion',perirad_lateral = '$lateral_lesion',perirad_resorption = b'$perirad_resorp',perirad_openapex = b'$perirad_openapex',perirad_osteos = b'$perirad_osteos',perirad_hyper = b'$perirad_hyper',perirad_other = '$perother' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_radioperirad = $conn->query($update_radioperirad);

// //Radiograph_alveolar
// if(isset($_POST['alveolar'])){
// 	$alveolar = $_POST['alveolar'];
// }else{
// 	$alveolar = "";
// 	$normalveolar = 0;
// 	$generalOrlocal = "";
// }

// if($alveolar == "normalveolar"){
// 	$normalveolar = 1;
// 	$generalOrlocal = "";
// }
// else if($alveolar == "generalalveolar"){
// 	$normalveolar = 0;
// 	$generalOrlocal = 0; //general =0;
// }
// else if($alveolar == "localalveolar"){
// 	$normalveolar = 0;
// 	$generalOrlocal = 1; //local = 1;
// }

// $alveolarother = $_POST['alveolarother'];
// $remark = $_POST['otherremark'];

// // echo 'HN:'.$HN.'<br>Date: '.$harddate.'<br>normal: '.$normalveolar.'<br>Generalized or Localized: '.$generalOrlocal.'<br>Other: '.$alveolarother.'<br>Remark: '.$remark;
// $update_alveolar = "UPDATE radiograph_alveolar SET bone_normal = b'$normalveolar',bone_genOrlocal = '$generalOrlocal',bone_other = '$alveolarother',remark = '$remark' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_alveolar = $conn->query($update_alveolar);

//Diagnosis----Pulpal Diagnosis
// if(!isset($_POST['puldiagnorm'])){
// 	$pul_normal = 0;
// }else{
// 	$pul_normal = $_POST['puldiagnorm'];
// }

// if(isset($_POST['reverOrirrever']) && $pul_normal == 0){
// 	$ReverOrIrrever = $_POST['reverOrirrever'];
// }else{
// 	$ReverOrIrrever = "";
// }

// if(isset($_POST['reverOrirrever']) && $pul_normal == 0 && $ReverOrIrrever == 1){
// 	if(isset($_POST['sympOrasymp'])){
// 		$sympOrasymp = $_POST['sympOrasymp'];
// 	}else{
// 		?>
 		<script> 
// 			window.alert('Please select Symptomatic or Asymptomatic'); 
// 		</script>
 		<?php
// 		$sympOrasymp = "1";
// 	}
// }else{
// 	$sympOrasymp = "";
// }

// if(isset($_POST['pulpnecrosis']) && $pul_normal == 0){
// 	$pulpnecrosis = $_POST['pulpnecrosis'];
// }else{
// 	$pulpnecrosis=0;
// }

// if(isset($_POST['previnitiat']) && $pul_normal == 0){
// 	$prev_initiated = $_POST['previnitiat'];
// }else{
// 	$prev_initiated=0;
// }

// if(isset($_POST['prevtreat']) && $pul_normal == 0){
// 	$prev_treated = $_POST['prevtreat'];
// }
// else{
// 	$prev_treated=0;
// }
// //Improper = 0; Incomplete = 1;
// if($pul_normal==0 && $prev_treated==1 && $_POST['prevselect'] == 0){
// 	$Improper = 1;
// 	$Incomplete = 0;
// }
// else if($pul_normal==0 && $prev_treated==1 && $_POST['prevselect'] == 1){
// 	$Improper = 0;
// 	$Incomplete = 1; 
// }else{
// 	$Improper = "";
// 	$Incomplete = "";
// }

// echo 'HN: '.$HN.'<br>Date: '.$harddate.'<br>normal: '.$pul_normal.'<br>Reversible or Irreversible: '.$ReverOrIrrever.'<br>Symptomatic or Asymtomatic: '.$sympOrasymp.'<br>Pulp necrosis: '.$pulpnecrosis.'<br>Previously Initiated: '.$prev_initiated.'<br>Previously treated: '.$prev_treated.'<br>Improper: '.$Improper.'<br>Incomplete: '.$Incomplete;
// $update_pulpaldiag = "UPDATE pulpal_diagnosis SET normal = b'$pul_normal',ReverOrIrreversiblepulp = '$ReverOrIrrever',Irreversible_sympOrasymp = '$sympOrasymp',pulp_necrosis = b'$pulpnecrosis',prev_initiat = b'$prev_initiated',prev_treated = b'$prev_treated',prev_treated_improper = b'$Improper',prev_treated_incomplete = b'$Incomplete' WHERE HN ='$HN' AND Date = '$harddate'";
// $result_pulpaldiag = $conn->query($update_pulpaldiag);

//Diagnosis----Periradicular Diagnosis
// if(!isset($_POST['periraddiagnorm'])){
// 	$per_normal=0;
// }else{
// 	$per_normal = $_POST['periraddiagnorm'];
// }

// if(isset($_POST['per_sympOrasymp']) && $per_normal == 0){
// 	$sympOrasympt_apical = $_POST['per_sympOrasymp'];
// }else{
// 	$sympOrasympt_apical = "";
// }

// if(isset($_POST['acuteOrchronic']) && $per_normal == 0){
// 	$acuteOrchronic_apical = $_POST['acuteOrchronic'];
// }else{
// 	$acuteOrchronic_apical = "";
// }
// $perdiagother = $_POST['perdiagother'];

// // echo 'HN: '.$HN.'<br>Date: '.$harddate.'<br>normal: '.$per_normal.'<br>Symptomatic or Asymptomatic: '.$sympOrasympt_apical.'<br>Acute apical or Chronic apical: '.$acuteOrchronic_apical.'<br>Other: '.$perdiagother;
// $update_periraddiag = "UPDATE periradicular_diagnosis SET Normal = b'$per_normal',sympOrasympt_apical = '$sympOrasympt_apical',acuteOrchronic_apical = '$acuteOrchronic_apical',other = '$perdiagother' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_periraddiag = $conn->query($update_periraddiag);

//Treatment Planning
// if(!isset($_POST['notreat'])){
// 	$notreat = 0;
// }else{
// 	$notreat = $_POST['notreat'];
// }

// if(!isset($_POST['pulposelect'])){
// 	$pulposelect = "";
// }else{
// 	$pulposelect = $_POST['pulposelect'];
// }

// if(isset($_POST['pulpotomy']) && $notreat == 0){
// 	$pulpotomy = $_POST['pulpotomy'];
// 	$pulp_partialOrfull = $pulposelect;
// }else{
// 	$pulpotomy=0;
// 	$pulp_partialOrfull = "";
// }

// if(isset($_POST['pulpectomy']) && $notreat == 0){
// 	$pulpectomy = $_POST['pulpectomy'];
// }else{
// 	$pulpectomy=0;
// }

// if(isset($_POST['nonrootcanel']) && $notreat == 0){
// 	$non_rootcanel = $_POST['nonrootcanel'];
// }else{
// 	$non_rootcanel=0;
// }

// if(isset($_POST['nonretreatment']) && $notreat == 0){
// 	$non_retreatment = $_POST['nonretreatment'];
// }else{
// 	$non_retreatment=0;
// }

// if(isset($_POST['apexification']) && $notreat == 0){
// 	$apexification = $_POST['apexification'];
// }else{
// 	$apexification=0;
// }

// if(isset($_POST['intentional']) && $notreat == 0){
// 	$intentional_RCT = $_POST['intentional'];
// }else{
// 	$intentional_RCT=0;
// }

// if(isset($_POST['rootcaneltreat']) && $notreat == 0){
// 	$rootcaneltreat = $_POST['rootcaneltreat'];
// }else{
// 	$rootcaneltreat=0;
// }

// if(isset($_POST['perio']) && $notreat == 0){
// 	$perio = $_POST['perio'];
// }else{
// 	$perio=0;
// }

// $periradother = $_POST['periradother'];
// $planrestor = $_POST['planrestor'];

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
// $preopother = $_POST['preopother'];

// if(!isset($_POST['anesthesis'])){
// 	$anesthesis = "";
// }else{
// 	$anesthesis = $_POST['anesthesis'];
// }

// if($anesthesis == "anesrequired"){
// 	$reqOrnotreq = 1; //require
// }
// else if("anesnotrequired"){
// 	$reqOrnotreq = 0; //not require
// }

// echo 'HN: '.$HN.'<br>Date: '.$harddate.'<br>No treatment: '.$notreat.'<br>Pulpotomy: '.$pulpotomy.'<br>Partial or Full: '.$pulp_partialOrfull.'<br>Pulpectomy: '.$pulpectomy.'<br>Non-surgical Root Canal Treatment: '.$non_rootcanel.'<br>Non-surgical Retreatment: '.$non_retreatment.'<br>Apexification: '.$apexification.'<br>Intentional RCT: '.$intentional_RCT.'<br>Surgical Root Canal Treatment: '.$rootcaneltreat.'<br>Perio Consult: '.$perio.'<br>Other: '.$periradother.'<br>Plan for final restoration: '.$planrestor.'<br>Caries Removal: '.$preop_caries.'<br>Dam: '.$preop_dam.'<br>Other: '.$preopother.'<br>Anesthesia: '.$reqOrnotreq;
// $update_treatment = "UPDATE treatment_plan SET no_treatment = b'$notreat',Pulpotomy = b'$pulpotomy',pulp_partOrfull = '$pulp_partialOrfull',pulpectomy = b'$pulpectomy',non_sur_root = b'$non_rootcanel',non_sur_retreat = b'$non_retreatment',apexification = b'$apexification',intentionalRCT = b'$intentional_RCT',sur_root = b'$rootcaneltreat',perio_consult = b'$perio',treat_other = '$periradother',plan_for_final = '$planrestor',pre_op_treat_caries = b'$preop_caries',pre_op_treat_dam = b'$preop_dam',pre_op_treat_other = '$preopother',Anest_reqOrnotreq = b'$reqOrnotreq' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_treatment = $conn->query($update_treatment);

// $xrayfile = addslashes(file_get_contents($_FILES['xrayfile']['tmp_name']));
// $xraydate = $_POST['xraydate'];
// $xraytime = $_POST['xraytime'];

// $update_xray = "UPDATE patients_xray SET xrayData = '$xrayfile',xray_datetime = '$xraydate'"."'$xraytime' WHERE HN = '$HN' AND Date = '$harddate'";
// $result_xray = $conn->query($update_xray);

 if($result_endo === TRUE){
  	?>
  		<script>
  			window.alert('Update Success');
  			//window.location = "endorecord.php";
  		</script>
  	<?php

  }else{
  	?>
  		<script>
  			window.alert('Update Unsuccess');
  			//window.location = "endorecord.php";
  		</script>
  	<?php
  	echo "Error description: " . mysqli_error($conn);
  }
?>