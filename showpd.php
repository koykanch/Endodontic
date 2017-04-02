<?php
	require('connect.php');

	$sql = "SELECT dent_hardcopy.Seq_no,dent_hardcopy.HN,patients_info.HN,patients_info.patientName,dent_hardcopy.student_code,dent_hardcopy.dentId,dent_hardcopy.hard_Date,medical_his.none,medical_his.cardiovascular,medical_his.pulmonary ,medical_his.gastrointestinal ,medical_his.hematologis ,medical_his.Neurologic ,medical_his.allergic ,medical_his.blood_pres1 ,medical_his.blood_pres2 ,medical_his.Other ,medical_his.taking_med ,medical_his.personal_doc ,medical_his.Tel ,medical_his.remark ,medical_his.date_treatment ,medical_his.edit_by, dental_his.chief_complaint, dental_his.his_of_presentill, dental_his.date_treatment, dental_his.edit_by,subject_symptom.paininten_id, subject_symptom.painchar_id, subject_symptom.duration_id, subject_symptom.locat_locOrdiff, subject_symptom.onset_spontaneous, subject_symptom.stimulation_id, subject_symptom.onset_other, subject_symptom.locat_radiating, subject_symptom.locat_referred, subject_symptom.date_treatment, subject_symptom.edit_by,object_symptom.ext_facialswelling, object_symptom.ext_lymphnode, object_symptom.ext_sinustract, object_symptom.ext_other, object_symptom.intra_swellsoftOrfirm, object_symptom.intra_swellarea, object_symptom.intra_sinustract, object_symptom.tooth_caries, object_symptom.tooth_restoration, object_symptom.tooth_pulpexposure, object_symptom.tooth_pulppolyp, object_symptom.tooth_fracture, object_symptom.tooth_crown, object_symptom.tooth_open, object_symptom.tooth_temp, object_symptom.tooth_other, object_symptom.date_treatment, object_symptom.edit_by, examination.exam_tooth, examination.exam_EPT, examination.exam_cold, examination.exam_heat, examination.exam_perc, examination.exam_palp, examination.exam_mobility, examination.exam_perioMB, examination.exam_perioB, examination.exam_perioDB, examination.exam_perioML, examination.exam_perioL, examination.exam_perioDL, examination.spectest_id, examination.date_treatment, examination.edit_by, radiograph_crown.crown_normal, radiograph_crown.crown_caries, radiograph_crown.crown_cariesarea,radiograph_crown.crown_cariesdepth,radiograph_crown.crown_restoration,radiograph_crown.crown_fracture,radiograph_crown.crown_other,radiograph_crown.date_treatment,radiograph_crown.edit_by,radiograph_perirad.perirad_normal, radiograph_perirad.perirad_wideningPDL, radiograph_perirad.perirad_lossoflam, radiograph_perirad.perirad_periapical1, radiograph_perirad.perirad_periapical2, radiograph_perirad.perirad_lateral1, radiograph_perirad.perirad_lateral2, radiograph_perirad.perirad_resorption, radiograph_perirad.perirad_openapex, radiograph_perirad.perirad_osteos, radiograph_perirad.perirad_hyper, radiograph_perirad.perirad_other, radiograph_perirad.date_treatment, radiograph_perirad.edit_by, radiograph_pulpcanal.pulpcan_normal, radiograph_pulpcanal.pulpcan_calPartOrComp, radiograph_pulpcanal.pulpcan_resorption, radiograph_pulpcanal.pulpcan_perforation, radiograph_pulpcanal.pulpcan_previousRCT, radiograph_pulpcanal.pulpcan_broken, radiograph_pulpcanal.pulpcan_other, radiograph_pulpcanal.date_treatment, radiograph_pulpcanal.edit_by, radiograph_pulpcham.pulpcham_normal, radiograph_pulpcham.pulpcham_calPartOrComp, radiograph_pulpcham.pulpcham_pulpstone, radiograph_pulpcham.pulpcham_resorption, radiograph_pulpcham.pulpcham_other, radiograph_pulpcham.date_treatment, radiograph_pulpcham.edit_by, radiograph_root.root_normal,radiograph_root.root_caries, radiograph_root.root_curvature, radiograph_root.root_extresorption, radiograph_root.root_fracture, radiograph_root.root_other, radiograph_root.date_treatment, radiograph_root.edit_by, radiograph_alveolar.bone_normal, radiograph_alveolar.bone_genOrlocal, radiograph_alveolar.bone_other, radiograph_alveolar.remark, radiograph_alveolar.date_treatment, radiograph_alveolar.edit_by, treatment_plan.no_treatment, treatment_plan.Pulpotomy, treatment_plan.pulp_partOrfull, treatment_plan.pulpectomy, treatment_plan.non_sur_root, treatment_plan.non_sur_retreat, treatment_plan.apexification, treatment_plan.intentionalRCT, treatment_plan.sur_root, treatment_plan.perio_consult, treatment_plan.treat_other, treatment_plan.plan_for_final, treatment_plan.pre_op_treat_caries, treatment_plan.pre_op_treat_dam, treatment_plan.pre_op_treat_other, treatment_plan.Anest_reqOrnotreq, treatment_plan.date_treatment, treatment_plan.edit_by, pulpal_diagnosis.normal, pulpal_diagnosis.ReverOrIrreversiblepulp, pulpal_diagnosis.Irreversible_sympOrasymp, pulpal_diagnosis.pulp_necrosis, pulpal_diagnosis.prev_initiat, pulpal_diagnosis.prev_treated, pulpal_diagnosis.prev_treated_improper, pulpal_diagnosis.prev_treated_incomplete, pulpal_diagnosis.date_treatment, pulpal_diagnosis.edit_by, periradicular_diagnosis.Normal, periradicular_diagnosis.sympOrasympt_apical, periradicular_diagnosis.acuteOrchronic_apical, periradicular_diagnosis.other, periradicular_diagnosis.date_treatment, periradicular_diagnosis.edit_by, patients_xray.xrayData, patients_xray.xray_datetime, patients_xray.edit_date, patients_xray.edit_by
		FROM dent_hardcopy, patients_info, medical_his, dental_his, subject_symptom, object_symptom, examination, radiograph_crown, radiograph_perirad, radiograph_pulpcanal, radiograph_pulpcham, radiograph_root, radiograph_alveolar, treatment_plan, pulpal_diagnosis, periradicular_diagnosis, patients_xray
		WHERE dent_hardcopy.HN = patients_info.HN
			AND dent_hardcopy.Seq_no = medical_his.Seq_no
			AND dent_hardcopy.Seq_no = dental_his.Seq_no
			AND dent_hardcopy.Seq_no = subject_symptom.Seq_no
			AND dent_hardcopy.Seq_no = object_symptom.Seq_no
			AND dent_hardcopy.Seq_no = examination.Seq_hardcopy
			AND dent_hardcopy.Seq_no = radiograph_crown.Seq_no
			AND dent_hardcopy.Seq_no = radiograph_perirad.Seq_no
			AND dent_hardcopy.Seq_no = radiograph_pulpcanal.Seq_no
			AND dent_hardcopy.Seq_no = radiograph_pulpcham.Seq_no
			AND dent_hardcopy.Seq_no = radiograph_root.Seq_no
			AND dent_hardcopy.Seq_no = radiograph_alveolar.Seq_no
			AND dent_hardcopy.Seq_no = treatment_plan.Seq_no
			AND dent_hardcopy.Seq_no = pulpal_diagnosis.Seq_no
			AND dent_hardcopy.Seq_no = periradicular_diagnosis.Seq_no
			AND dent_hardcopy.Seq_no = patients_xray.Seq_no";


	// $sql = "SELECT * FROM patients_info";
	$result = $conn->query($sql);


	 // echo $result;
	$arr = array();

	// $objresult = mysqli_fetch_array($result, MYSQLI_NUM);
	if ($result->num_rows > 0) {
    // output data of each row
		    while($row = $result->fetch_assoc()) {
		         // echo "HN : " . $row["HN"];
		    	$arr[] = $row;
		    }
	} else {
    		echo "0 results";
	}
	echo $json_response = json_encode($arr);
?>