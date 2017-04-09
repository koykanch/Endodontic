<?php
	require('connect.php');

	$sql = "SELECT D.Seq_no,D.HN, P.patientName,D.hard_Date, D.student_code, D.dentId, M.none, M.cardiovascular,M.pulmonary ,M.gastrointestinal ,M.hematologis ,M.Neurologic ,M.allergic ,M.blood_pres1 ,M.blood_pres2 ,M.Other ,M.taking_med ,M.personal_doc ,M.Tel ,M.remark ,M.date_treatment ,M.edit_by,DH.chief_complaint, DH.his_of_presentill, DH.date_treatment, DH.edit_by, S.paininten_id, S.painchar_id, S.duration_id, S.locat_locOrdiff, S.onset_spontaneous, S.stimulation_id, S.onset_other, S.locat_radiating, S.locat_referred, S.date_treatment, S.edit_by, O.ext_facialswelling, O.ext_lymphnode, O.ext_sinustract, O.ext_other, O.intra_swellsoftOrfirm, O.intra_swellarea, O.intra_sinustract, O.tooth_caries, O.tooth_restoration, O.tooth_pulpexposure, O.tooth_pulppolyp, O.tooth_fracture, O.tooth_crown, O.tooth_open, O.tooth_temp, O.tooth_other, O.date_treatment, O.edit_by, E.exam_tooth, E.exam_EPT, E.exam_cold, E.exam_heat, E.exam_perc, E.exam_palp, E.exam_mobility, E.exam_perioMB, E.exam_perioB, E.exam_perioDB, E.exam_perioML, E.exam_perioL, E.exam_perioDL, E.spectest_id, E.date_treatment, E.edit_by, RCrown.crown_normal, RCrown.crown_caries, RCrown.crown_cariesarea,RCrown.crown_cariesdepth,RCrown.crown_restoration,RCrown.crown_fracture,RCrown.crown_other,RCrown.date_treatment,RCrown.edit_by, RPerirad.perirad_normal, RPerirad.perirad_wideningPDL, RPerirad.perirad_lossoflam, RPerirad.perirad_periapical1, RPerirad.perirad_periapical2, RPerirad.perirad_lateral1, RPerirad.perirad_lateral2, RPerirad.perirad_resorption, RPerirad.perirad_openapex, RPerirad.perirad_osteos, RPerirad.perirad_hyper, RPerirad.perirad_other, RPerirad.date_treatment, RPerirad.edit_by, RPulpcanal.pulpcan_normal, RPulpcanal.pulpcan_calPartOrComp, RPulpcanal.pulpcan_resorption, RPulpcanal.pulpcan_perforation, RPulpcanal.pulpcan_previousRCT, RPulpcanal.pulpcan_broken, RPulpcanal.pulpcan_other, RPulpcanal.date_treatment, RPulpcanal.edit_by, Rpulpcham.pulpcham_normal, Rpulpcham.pulpcham_calPartOrComp, Rpulpcham.pulpcham_pulpstone, Rpulpcham.pulpcham_resorption, Rpulpcham.pulpcham_other, Rpulpcham.date_treatment, Rpulpcham.edit_by, Rroot.root_normal,Rroot.root_caries, Rroot.root_curvature, Rroot.root_extresorption, Rroot.root_fracture, Rroot.root_other, Rroot.date_treatment, Rroot.edit_by, Ralveolar.bone_normal, Ralveolar.bone_genOrlocal, Ralveolar.bone_other, Ralveolar.remark, Ralveolar.date_treatment, Ralveolar.edit_by, T.no_treatment, T.Pulpotomy, T.pulp_partOrfull, T.pulpectomy, T.non_sur_root, T.non_sur_retreat, T.apexification, T.intentionalRCT, T.sur_root, T.perio_consult, T.treat_other, T.plan_for_final, T.pre_op_treat_caries, T.pre_op_treat_dam, T.pre_op_treat_other, T.Anest_reqOrnotreq, T.date_treatment, T.edit_by, Pulpal.normal, Pulpal.ReverOrIrreversiblepulp, Pulpal.Irreversible_sympOrasymp, Pulpal.pulp_necrosis, Pulpal.prev_initiat, Pulpal.prev_treated, Pulpal.prev_treated_improper, Pulpal.prev_treated_incomplete, Pulpal.date_treatment, Pulpal.edit_by, Perirad.Normal, Perirad.sympOrasympt_apical, Perirad.acuteOrchronic_apical, Perirad.other, Perirad.date_treatment, Perirad.edit_by, xray.xray_datetime, xray.edit_date, xray.edit_by, Dent.status
		FROM dent_hardcopy AS D, patients_info AS P, medical_his AS M, dental_his AS DH, subject_symptom AS S, object_symptom AS O, examination AS E, radiograph_crown AS RCrown, radiograph_perirad AS RPerirad, radiograph_pulpcanal AS RPulpcanal, radiograph_pulpcham AS Rpulpcham, radiograph_root AS Rroot, radiograph_alveolar AS Ralveolar, treatment_plan AS T, pulpal_diagnosis AS Pulpal, periradicular_diagnosis AS Perirad, patients_xray AS xray, dentist_info AS Dent
		WHERE D.HN = P.HN 
		AND D.Seq_no = M.Seq_no
		AND D.Seq_no = DH.Seq_no
		AND D.Seq_no = S.Seq_no
		AND D.Seq_no = O.Seq_no
		AND D.Seq_no = E.Seq_hardcopy
		AND D.Seq_no = RCrown.Seq_no
		AND D.Seq_no = RPerirad.Seq_no
		AND D.Seq_no = RPulpcanal.Seq_no
		AND D.Seq_no = Rpulpcham.Seq_no
		AND D.Seq_no = Rroot.Seq_no
		AND D.Seq_no = Ralveolar.Seq_no
		AND D.Seq_no = T.Seq_no
		AND D.Seq_no = Pulpal.Seq_no
		AND D.Seq_no = Perirad.Seq_no
		AND D.Seq_no = xray.Seq_no
		AND D.dentId = Dent.dentId
		GROUP BY D.Seq_no";



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