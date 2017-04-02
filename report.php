<!DOCTYPE html>
<html>
<body>
<?php
require_once('mpdf/mpdf.php');
ob_start();

require('connect.php');
$sq = $_POST['seqnum'];
$HN = $_POST['PatientHN'];
$stucode = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];
  
?>
  <div>
    <label style="font-size:20px;">HN : <?php echo $HN; ?></label>
  </div>

	<div style="font-size:30px; margin-left: 14em">
		  <b>Endodontic Record</b>
	</div>

	<div style="font-size:20px; margin-left:14em;">
		  <b>Faculty of Dentistry, Chiang Mai University</b>
	</div><br><br>

  <?php
    $sql = "SELECT * FROM patients_info WHERE HN = '$HN'";
    $result = $conn->query($sql);
    $objresult = mysqli_fetch_array($result);
    $birthdate = $objresult['birthdate'];

    $from = new DateTime($birthdate);
    $to   = new DateTime('today');
    $age = $from->diff($to)->y;

  ?>
	<div style="font-size:20px;">
		 <b>Patient's name: </b><?php echo $objresult['patientName']; ?> <b>Age:</b> <?php echo $age; ?> <b>Gender:</b> <?php echo $objresult['gender']; ?>
	</div><br>

  <table width="100%">
    <tr>
      <th style="font-size: 18px;" align="left" colspan="5">Patient's History</th>
    </tr>

    <tr>
      <th style="font-size: 15px;" align="left" colspan="5">
      <?php
        $searchMed = "SELECT * FROM medical_his WHERE Seq_no = '$sq'";
        $resultMed = $conn->query($searchMed);
        $objresultMed = mysqli_fetch_array($resultMed);
      ?>
          <u>Medical History</u>
      </th>
    </tr>

    <tr>
      <td style="font-size: 12px;">
            <input type="checkbox"
              <?php
                 if($objresultMed['none'] == "1"){
                  ?>
                    checked="true" disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
            None
      </td>

      <td style="font-size: 12px;"> 
            <input type="checkbox"
              <?php
                 if($objresultMed['cardiovascular'] == "1"){
                  ?>
                    checked="true" disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
            Cardiovascular Diseases
      </td>

      <td style="font-size: 12px;">  
            <input type="checkbox" 
              <?php
                 if($objresultMed['pulmonary'] == "1"){
                  ?>
                    checked="true" 
                    disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
            Pulmonary Diseases
      </td>  

      <td style="font-size: 12px;">
           <input type="checkbox" 
              <?php
                 if($objresultMed['gastrointestinal'] == "1"){
                  ?>
                    checked="true" 
                    disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
           Gastrointestinal Diseases
      </td>
    </tr>

    <tr>
      <td style="font-size: 12px;">
          <input type="checkbox" 
              <?php
                 if($objresultMed['hematologis'] == "1"){
                  ?>
                    checked="true" 
                    disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
           Hematologic Diseases
      </td>

      <td style="font-size:12px;">
          <input type="checkbox" 
              <?php
                 if($objresultMed['Neurologic'] == "1"){
                  ?>
                    checked="true" 
                    disabled="true">
                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
           Neurologic Diseases
      </td>

      <td style="font-size:12px;">
        <input type="checkbox" 
              <?php
                 if($objresultMed['allergic'] != ""){
                  ?>
                    checked="true" 
                    disabled="true">

                  <?php   
                 }else{
                  ?>
                    disabled="true">
                  <?php
                 }
              ?>
            Allergic to :
           <?php echo $objresultMed['allergic']; ?>
      </td>

      <td style="font-size:12px;">
         <input type="checkbox"
              <?php
               if($objresultMed['blood_pres1'] != ""){
                ?>
                  checked="true" 
                  disabled="true">
                <?php   
               }else{
                ?>
                  disabled="true">
                <?php
               }
            ?>
          Blood Pressure : 
           <?php echo $objresultMed['blood_pres1']; ?>/<?php echo $objresultMed['blood_pres2']; ?>
      </td>

    </tr>

    <tr>
      <td style="font-size:12px;">
           <input type="checkbox" 
              <?php
               if($objresultMed['Other'] != ""){
                ?>
                  checked="true" 
                  disabled="true">
                <?php   
               }else{
                ?>
                  disabled="true">
                <?php
               }
            ?>
            Other : &nbsp; 
            <?php echo $objresultMed['Other']; ?>
      </td>

      <td style="font-size: 12px;">
         <input type="checkbox" 
            <?php
            if($objresultMed['taking_med'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
          Taking medicine : &nbsp; 
         <?php echo $objresultMed['taking_med']; ?>
      </td>

      <td style="font-size:12px;">
            Personal Doctor :
            <?php echo $objresultMed['personal_doc']; ?>
      </td>

      <td style="font-size:12px;">
            Tel : 
            <?php echo $objresultMed['Tel']; ?>
      </td>
    </tr>

    <tr>
      <td colspan="4" style="font-size:12px;">
          Remark : 
          <?php echo $objresultMed['remark']; ?>
      </td>
    </tr>

    <tr>
      <th style="font-size: 15px;" align="left" colspan="4"><u>Dental History</u></th>
    </tr>

    <tr>
      <td colspan="4" style="font-size:12px;">
        <?php
          $searchDen = "SELECT * FROM dental_his WHERE Seq_no = '$sq'";
          $resultDen = $conn->query($searchDen);
          $objresultDen = mysqli_fetch_array($resultDen);
        ?>  
          Chief Complaint :
          <?php echo $objresultDen['chief_complaint']; ?>
      </td>
    </tr>

    <tr>
      <td colspan="4" style="font-size:12px;">
          History of Present Illness : 
          <?php echo $objresultDen['his_of_presentill']; ?>
      </td>
    </tr>
  </table>
    
  <table width="100%">
    <tr>
      <th style="font-size:18px;" align="left" colspan="3">Examination</th>
    </tr>

    <tr>
    <?php
      $searchSubj = "SELECT * FROM subject_symptom WHERE Seq_no = '$sq'";
      $resultSubj = $conn->query($searchSubj);
      $objresultSubj = mysqli_fetch_array($resultSubj);
    ?>

      <th style="font-size:15px;" align="left"><u>S.Subjective Symptoms</u></th>

      <?php
        $searchObj = "SELECT * FROM object_symptom WHERE Seq_no = '$sq'";
        $resultObj = $conn->query($searchObj);
        $objresultObj = mysqli_fetch_array($resultObj);
      ?>
    
      <th style="font-size: 15px;" colspan="2" align="left"><u>O.Objective Symptoms</u></th>
    </tr>
      
    <tr>
      <td style="font-size: 12px;" width="310">
        <?php
          $paininten = "SELECT * FROM pain_intensity WHERE paininten_id = '".$objresultSubj['paininten_id']."'";
          $resultpainin = $conn->query($paininten);
          $objresultpainin = mysqli_fetch_array($resultpainin);
        ?>
        Pain intensity: <?php echo $objresultpainin['paininten_detail']; ?>
      </td>
      
      <td style="font-size: 12px;" width="400">Extraoral:
        <?php
          if($objresultObj['ext_facialswelling'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
              Facial Swelling
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
              Facial Swelling
              <?php
          }
        ?>

        <?php
          if($objresultObj['ext_lymphnode'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
              Lymph Node
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
                Lymph Node
            <?php
          }
        ?>

        <?php
          if($objresultObj['ext_sinustract'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
               Sinus Tract
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
              Sinus Tract
            <?php
          } 
        ?>

        Other: <?php echo $objresultObj['ext_other']; ?>
      </td>
    </tr>

    <tr>
      <td style="font-size: 12px;">
        <?php
          $painchar = "SELECT * FROM pain_character WHERE painchar_id = '".$objresultSubj['painchar_id']."'";
          $resultpainchar = $conn->query($painchar);
          $objresultpainchar = mysqli_fetch_array($resultpainchar);
        ?>

        Pain Character: <?php echo $objresultpainchar['painchar_detail']; ?>
      </td>

      <td style="font-size: 12px;">Intraoral:
        <?php
              if($objresultObj['intra_swellsoftOrfirm'] == "0"){
                $swell = "Soft";
              }else{
                $swell = "Firm";
              }
            ?>
              Sweling ( <?php echo $swell; ?> ) &nbsp; area : <?php echo $objresultObj['intra_swellarea']; ?> &nbsp;&nbsp;

        <input type="radio" 
          <?php
            if($objresultObj['intra_sinustract'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
              <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
        Sinus Tract at : 
        <?php echo $objresultObj['intra_sinustract']; ?>
      </td>
    </tr>

    <tr>
      <td style="font-size: 12px;">
        Onset: 
          <input type="checkbox"
          <?php
            if($objresultSubj['onset_spontaneous'] == 1){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
         Spontaneous &nbsp;

         <?php
         $stimu_id = $objresultSubj['stimulation_id'];
         $stimulation = "SELECT * FROM stimulation_required WHERE stimulation_id = '$stimu_id'";
         $resultObjstimu = $conn->query($stimulation);
         $Objstimu = mysqli_fetch_array($resultObjstimu);

         ?>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox"
          <?php 
            if($objresultSubj['stimulation_id'] != "") {
              ?>
                  checked="true" 
                  disabled="true">
                  
                <?php 
                echo "Stimulation Required ( ".$Objstimu['stimulation_detail']." )";
            }else{
              ?>
                disabled="true">
                Stimulation Required()
              <?php
            }

          ?> 
      </td>

      <td style="font-size: 12px;">
        Tooth:
        <input type="checkbox"
          <?php
            if($objresultObj['tooth_caries'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php 
            }else{
             ?>
              disabled="true">
             <?php
            }
          ?>
           Caries

        <input type="checkbox"
          <?php
          if($objresultObj['tooth_restoration'] != ""){
            ?>
                  checked="true" 
                  disabled="true">
                <?php 
              }else{
               ?>
                disabled="true">
               <?php
              }
            ?>
            Restoration with : &nbsp;
            <?php echo $objresultObj['tooth_restoration']; ?>

        <input type="checkbox"
          <?php
            if($objresultObj['tooth_pulpexposure'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php 
            }else{
             ?>
              disabled="true">
             <?php
            }
          ?>
        Pulp Exposure

        <input type="checkbox"  
          <?php
            if($objresultObj['tooth_pulppolyp'] == "1"){
              ?>
                checked="true" 
                disabled="true">
              <?php 
            }else{
             ?>
              disabled="true">
             <?php
            }
          ?>
        Pulp Polyp

        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"
          <?php
            if($objresultObj['tooth_fracture'] != ""){
              ?>
                checked="true" 
                disabled="true">
              <?php 
            }else{
             ?>
              disabled="true">
             <?php
            }
          ?>
          Fracture at : <?php echo $objresultObj['tooth_fracture']; ?>

        <input type="checkbox"
            <?php
              if($objresultObj['tooth_crown'] != ""){
                ?>
                  checked="true" 
                  disabled="true">
                <?php 
              }else{
               ?>
                disabled="true">
               <?php
              }
            ?>
            Crown Discoloration to: 
            <?php echo $objresultObj['tooth_crown']; ?>

          <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox"  
              <?php
                if($objresultObj['tooth_open'] == "1"){
                  ?>
                    checked="true" 
                    disabled="true">
                  <?php 
                }else{
                 ?>
                  disabled="true">
                 <?php
                }
              ?>
            Opened for Drainage

          <input type="checkbox"
            <?php
            if($objresultObj['tooth_temp'] == "1"){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
              }else{
               ?>
                disabled="true">
               <?php
              }
            ?>
            Temp. Restoration

          Other : <?php echo $objresultObj['tooth_other']; ?>
      </td>
    </tr>

    <tr>
      <td style="font-size: 12px;">
        <?php
          $duration = "SELECT * FROM duration WHERE duration_id = '".$objresultSubj['duration_id']."'";
          $resultduration = $conn->query($duration);
          $objresultduration = mysqli_fetch_array($resultduration);
        ?>

        Duration: <?php echo $objresultduration['duration_detail']; ?>
      </td>

    </tr>

    <tr>
      <td style="font-size: 12px;">
        <?php
          $location = "SELECT * FROM location WHERE location_id = '".$objresultSubj['locat_locOrdiff']."'";
          $resultlocation = $conn->query($location);
          $objresultlocation = mysqli_fetch_array($resultlocation);
        ?>

        Location: <?php echo $objresultlocation['location_detail']; ?>

        <input type="checkbox"
          <?php
            if($objresultSubj['locat_radiating'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
        Radiating to : 
        <?php echo $objresultSubj['locat_radiating']; ?>

        <input type="checkbox"
            <?php
            if($objresultSubj['locat_referred'] != ""){
              ?>
                  checked="true" 
                  disabled="true">
                <?php 
            }else{
               ?>
                disabled="true">
               <?php
            }
          ?>
        Referred to : 
        <?php echo $objresultSubj['locat_referred']; ?>
      </td>
    </tr>
  </table>

  
      <div style="font-size: 15px;"><b>Examination: </b></div>
      <?php
        $searchExam = "SELECT * FROM examination WHERE Seq_hardcopy = '$sq'";
        $resultExam = $conn->query($searchExam);
        
      ?>
      <div>
        <table border="1" cellpadding="5" cellspacing="2">
              <tr>
                <th rowspan="2" style="font-size: 12px;">Tooth</th>
                <th rowspan="2" style="font-size: 12px;">EPT</th>
                <th rowspan="2" style="font-size: 12px;">Cold</th>
                <th rowspan="2" style="font-size: 12px;">Heat</th>
                <th rowspan="2" style="font-size: 12px;">Perc<sup>n</sup></th>
                <th rowspan="2" style="font-size: 12px;">Palp<sup>n</sup></th>
                <th rowspan="2" style="font-size: 12px;">Mobility</th>
                <th colspan="6" style="font-size: 12px;">Pero Probe (mm)</th>

                <th rowspan="2" style="font-size: 12px;">Special Test<br>(if necessary)</th>
              </tr>
              <tr>
                <th style="font-size: 12px;">MB</th>
                <th style="font-size: 12px;">B</th>
                <th style="font-size: 12px;">DB</th>
                <th style="font-size: 12px;">ML</th>
                <th style="font-size: 12px;">L</th>
                <th style="font-size: 12px;">DL</th>
              </tr> 
              
              <?php while ($objresultExam = mysqli_fetch_array($resultExam)) {
                ?>
                <tr>
                <td style="font-size: 12px;"><?php echo $objresultExam['exam_tooth']; ?></td>
                <td style="font-size: 12px;"><?php echo $objresultExam['exam_EPT']; ?></td>
                <td style="font-size: 12px;">
                  <?php 
                    if($objresultExam['exam_cold'] == "WNL"){
                        echo 'WNL';
                    }else if($objresultExam['exam_cold'] == "positive"){
                        echo '+';
                    }else if($objresultExam['exam_cold'] == "negative"){
                        echo '-';
                    }else{
                        echo '';
                    }
                  ?>
                </td>

                <td style="font-size: 12px;">
                  <?php 
                    if($objresultExam['exam_heat'] == "WNL"){
                        echo 'WNL';
                    }else if($objresultExam['exam_heat'] == "positive"){
                        echo '+';
                    }else if($objresultExam['exam_heat'] == "negative"){
                        echo '-';
                    }else{
                        echo '';
                    }
                  ?>
                </td>

                <td style="font-size: 12px;">
                  <?php 
                    if($objresultExam['exam_perc'] == "WNL"){
                        echo 'WNL';
                    }else if($objresultExam['exam_perc'] == "positive"){
                        echo '+';
                    }else if($objresultExam['exam_perc'] == "negative"){
                        echo '-';
                    }else{
                        echo '';
                    }
                  ?>
                </td>

                <td style="font-size: 12px;">
                  <?php 
                    if($objresultExam['exam_palp'] == "WNL"){
                        echo 'WNL';
                    }else if($objresultExam['exam_palp'] == "positive"){
                        echo '+';
                    }else if($objresultExam['exam_palp'] == "negative"){
                        echo '-';
                    }else{
                        echo '';
                    }
                  ?>
                </td>

                <td style="font-size: 12px;">
                  <?php 
                    if($objresultExam['exam_mobility'] == "1"){
                        echo '<font>1<sup>0</sup></font>'; 
                    }
                    else if($objresultExam['exam_mobility'] == "2"){
                        echo '<font>2<sup>0</sup></font>'; 
                    }
                    else if($objresultExam['exam_mobility'] == "3"){
                        echo '<font>3<sup>0</sup></font>';
                    }
                  ?>
                </td>
                    
                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioMB']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioB']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioDB']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioML']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioL']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php echo $objresultExam['exam_perioDL']; ?>
                </td>

                <td style="font-size: 12px;">
                  <?php
                    $specialtest = "SELECT * FROM special_test WHERE spectest_id = '".$objresultExam['spectest_id']."'";
                    $resultspecialtest = $conn->query($specialtest);
                    $objresultspecialtest = mysqli_fetch_array($resultspecialtest);

                    echo $objresultspecialtest['spectest_detail'];
                  ?>
                </td>
              </tr>
                <?php
              }
              ?>
        </table>

        <table cellpadding="4">
            <tr>
              <th style="font-size:15px;" align="left"><u>Radiographic findings</u></th>
            </tr>

            <tr>
              <td style="font-size:12px;">
                <b>Crown:</b>
             
              <?php
                $searchRadio = "SELECT * FROM radiograph_crown WHERE Seq_no = '$sq'";
                $resultRadio = $conn->query($searchRadio);
                $objresultRadio = mysqli_fetch_array($resultRadio);  
              ?>
                  <input type="checkbox"
                <?php 
                  if($objresultRadio['crown_normal'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } ?>
               Normal 

                  <input type="checkbox"
                  <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
               
                 Caries &nbsp; area : 
                <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         <font><?php echo $objresultRadio['crown_cariesarea']; ?>"</font>                   
                        <?php
                    }else{
                        echo '';
                    } ?>
                &nbsp; depth : 
                  <?php 
                    if($objresultRadio['crown_caries'] == "1"){
                        ?>
                         <?php echo $objresultRadio['crown_cariesdepth']; ?>                
                        <?php
                    }else{
                        echo '';
                    } ?>

          
                <input type="checkbox"
                    <?php 
                      if($objresultRadio['crown_restoration'] == "1"){
                          ?>
                           checked = "true"
                           disabled = "true" >
                          <?php
                      }else{
                          ?>
                           disabled = "true" >
                          <?php 
                      } ?>
                   Restoration 
              
                <input type="checkbox"
                  <?php 
                    if($objresultRadio['crown_fracture'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } ?>
                 Fracture  / &nbsp;

                Other : &nbsp; 
                <?php echo $objresultRadio['crown_other']; ?>
              </td>
            </tr>
          
        <tr>
          <td style="font-size:12px;"><b>Pulp Chambar:</b>

            <?php
              $searchPulpcham = "SELECT * FROM radiograph_pulpcham WHERE Seq_no = '$sq'";
              $resultPulpcham = $conn->query($searchPulpcham);
              $objresultPulpcham = mysqli_fetch_array($resultPulpcham);
            ?>

            <input type="checkbox"
            <?php 
              if($objresultPulpcham['pulpcham_normal'] == "1"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
            ?>
            Normal 

            <input type="checkbox"
            <?php 
              if($objresultPulpcham['pulpcham_calPartOrComp'] != ""){
                ?>
                   checked = "true"
                   disabled = "true" >       
                   &nbsp; Calcification : &nbsp;        
                  <?php
                if($objresultPulpcham['pulpcham_calPartOrComp'] == "0"){
                  echo "Partial";
                }else{
                  echo "Complete";
                }
                  
              }else{
                  ?>
                   disabled = "true" >
                 Calcification
                  <?php 
              } 
            ?>

            <input type="checkbox"
            <?php 
                  if($objresultPulpcham['pulpcham_pulpstone'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
            Pulp Stone

            <input type="checkbox"
            <?php 
                  if($objresultPulpcham['pulpcham_resorption'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
            Resorption / &nbsp;

              Other : 
              <?php echo $objresultPulpcham['pulpcham_other']; ?>
          </td>
        </tr>
      
        <tr>
          <?php
            $searchRoot = "SELECT * FROM radiograph_root WHERE Seq_no = '$sq'";
            $resultRoot = $conn->query($searchRoot);
            $objresultRoot = mysqli_fetch_array($resultRoot); 
          ?>

          <td style="font-size:12px;">
              <b>Root: </b>
      
              <input type="checkbox" 
                <?php 
                    if($objresultRoot['root_normal'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } 
                ?>
              Normal 
        
              <input type="checkbox"
            <?php 
              if($objresultRoot['root_caries'] == "1"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
            ?>
              Caries
       
              <input type="checkbox"
              <?php 
                if($objresultRoot['root_curvature'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
              ?>
                Curvature

              <input type="checkbox"
                <?php 
                  if($objresultRoot['root_extresorption'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
                ?>
                 Ext. Resorption

              <input type="checkbox"
                <?php 
                  if($objresultRoot['root_fracture'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
                ?>
                 Fracture / &nbsp;
        
              Other : <?php echo $objresultRoot['root_other']; ?>
          </td>
        </tr>

        <tr>
          <td style="font-size:12px;">
            <?php
              $searchPulpcan = "SELECT * FROM radiograph_pulpcanal WHERE Seq_no = '$sq'";
              $resultPulpcan = $conn->query($searchPulpcan);
              $objresultPulpcan = mysqli_fetch_array($resultPulpcan); 
            ?>

            <b>Pulp Canal:</b>
          
            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_normal'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
          Normal
        
            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_calPartOrComp'] != ""){
                    ?>
                     checked = "true"
                     disabled = "true" >    
                     Calcification:                  
                    <?php
                    if($objresultPulpcan['pulpcan_calPartOrComp'] == "0"){
                      echo "Partial";
                    }else{
                      echo "Complete";
                    }
                }else{
                    ?>
                     disabled = "true" >
                     Calcification
                    <?php 
                } 
            ?>

            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_resorption'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
            Resorption

            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_perforation'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
            Perforation
         
            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_previousRCT'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
           Previous RCT
    
     
            <input type="checkbox"
            <?php 
                if($objresultPulpcan['pulpcan_broken'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
            Broken Instrument <br> &emsp;&emsp;&emsp;&emsp;&emsp;

            Other : <?php echo $objresultPulpcan['pulpcan_other']; ?>
          </td>
        </tr>

        <tr>
          <td style="font-size:12px;">
            <?php
              $searchPerirad = "SELECT * FROM radiograph_perirad WHERE Seq_no = '$sq'";
              $resultPerirad = $conn->query($searchPerirad);
              $objresultPerirad = mysqli_fetch_array($resultPerirad);   
            ?>
            <b>Periradicular:</b>
    
            <input type="checkbox" 
              <?php 
                  if($objresultPerirad['perirad_normal'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
              ?>
           Normal 
   
            <input type="checkbox"
              <?php 
                  if($objresultPerirad['perirad_wideningPDL'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
              ?>
                Widening PDL
 
            <input type="checkbox"
              <?php 
                    if($objresultPerirad['perirad_lossoflam'] == "1"){
                        ?>
                         checked = "true"
                         disabled = "true" >                      
                        <?php
                    }else{
                        ?>
                         disabled = "true" >
                        <?php 
                    } 
              ?>
              Loss of Lamina Dura

            <input type="checkbox"
              <?php 
                if($objresultPerirad['perirad_periapical'] != ""){
                    ?>
                     checked = "true"
                     disabled = "true" > 
                    Periapical Lesion : 
                     <?php echo $objresultPerirad['perirad_periapical']; ?>

                    <?php
                }else{
                    ?>
                     disabled = "true" >
                     Periapical Lesion : 
                    <?php 
                } 
              ?>

            <input type="checkbox"
              <?php 
                if($objresultPerirad['perirad_lateral'] != ""){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                     Lateral Lesion : 
                     <?php echo $objresultPerirad['perirad_lateral']; ?>
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                     Lateral Lesion :
                    <?php 
                } 

              ?>

            <input type="checkbox"
              <?php 
                if($objresultPerirad['perirad_resorption'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
              ?>
            Resorption 

            <br> &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="checkbox"
              <?php 
                if($objresultPerirad['perirad_openapex'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
              ?>
              Open Apex 

             <input type="checkbox"
                <?php 
                  if($objresultPerirad['perirad_osteos'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
                ?>
              OsteosIcerosis

            <input type="checkbox"
              <?php 
                if($objresultPerirad['perirad_hyper'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
              ?>
             Hyperplasia of cementurn / &nbsp;

              Other : <?php echo $objresultPerirad['perirad_other']; ?>
          </td>
        </tr>

        <tr>
          <td style="font-size:12px;">
            <?php
              $searchAlveolar = "SELECT * FROM radiograph_alveolar WHERE Seq_no = '$sq'";
              $resultAlveolar = $conn->query($searchAlveolar);
              $objresultAlveolar = mysqli_fetch_array($resultAlveolar);
            ?>
            <b>Alveolar Bone: </b>
     
            <input type="radio"
              <?php 
                if($objresultAlveolar['bone_normal'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
              ?>
            Normal 
     
            <input type="radio" 
              <?php
                if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "0"){
                  ?>
                    checked="true"
                    disabled = "true" >
                  <?php
                }else{
                  ?>
                    disabled = "true" >
                  <?php
                }
              ?>
             Generalized Bone loss
         
            <input type="radio"
              <?php
                if($objresultAlveolar['bone_genOrlocal'] != "" && $objresultAlveolar['bone_genOrlocal'] == "1"){
                  ?>
                    checked="true"
                    disabled = "true" >
                  <?php
                }else{
                  ?>
                    disabled = "true" >
                  <?php
                }
              ?>
            &nbsp; Localized Bone loss / &nbsp;
  
            Other : <?php echo $objresultAlveolar['bone_other']; ?>
          </td>
        </tr>

        <tr>
          <td style="font-size:12px;"><b>Remarks: </b>
          <?php echo $objresultAlveolar['remark']; ?></td>
        </tr>
      </table><br>

      <table style="margin-top: 8em;">
        <?php
          $searchPulpaldiag = "SELECT * FROM pulpal_diagnosis WHERE Seq_no = '$sq'";
          $resultPulpaldiag = $conn->query($searchPulpaldiag);
          $objresultPulpaldiag = mysqli_fetch_array($resultPulpaldiag);
        ?>
      <tr>
        <th style="font-size: 15px;" align="left" colspan="2">Diagnosis</th>
      </tr>

      <tr> 
        <td style="font-size: 12px; width: 230px;">
            <b>Pulpal Diagnosis</b>
        </td>

        <td style="font-size: 12px;">
          <?php
            $searchPeriraddiag = "SELECT * FROM periradicular_diagnosis WHERE Seq_no = '$sq'";
            $resultPeriraddiag = $conn->query($searchPeriraddiag);
            $objresultPeriraddiag = mysqli_fetch_array($resultPeriraddiag);
          ?>
          <b>Periradicular Diagnosis</b>
        </td>
      </tr>

      <tr>    
        <td style="font-size: 12px;">
          <input type="checkbox"  
          <?php 
                if($objresultPulpaldiag['normal'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
          ?>
          Normal 
        </td>

        <td style="font-size: 12px;">
          <input type="checkbox"
            <?php 
                  if($objresultPeriraddiag['Normal'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
          Normal 
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="radio"
          <?php 
                if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "0"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
          ?>
            Reversible Pulpitis
        </td>

        <td style="font-size: 12px;">
          <input type="radio" 
            <?php 
                  if($objresultPeriraddiag['sympOrasympt_apical'] == "0"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
          Symptomatic Apical Periodontitis
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="radio"
          <?php 
                if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
          ?>
          Irreversible Pulpitis
        </td>

        <td style="font-size: 12px;">
          <input type="radio" 
            <?php 
                  if($objresultPeriraddiag['sympOrasympt_apical'] == "1"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
          Asymptomatic Apical Periodontitis   
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px; padding-left:2em;">
          <input type="radio"  
          <?php 
              if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "1"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
          ?>
          Symptomatic
        </td>

        <td style="font-size: 12px;">
          <input type="radio"
            <?php 
                  if($objresultPeriraddiag['acuteOrchronic_apical'] == "0"){
                      ?>
                       checked = "true"
                       disabled = "true" >                      
                      <?php
                  }else{
                      ?>
                       disabled = "true" >
                      <?php 
                  } 
            ?>
           Acute Apical Abscess
        </td>
      </tr>

      <tr>
        <td style="padding-left:2em; font-size: 12px;">
          <input type="radio"
           <?php 
              if($objresultPulpaldiag['ReverOrIrreversiblepulp'] != "" && $objresultPulpaldiag['ReverOrIrreversiblepulp'] == "1" && $objresultPulpaldiag['Irreversible_sympOrasymp'] == "0"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
          ?>
         Asymtomatic
        </td>

        <td style="font-size: 12px;"> 
           <input type="radio"
            <?php 
                if($objresultPeriraddiag['acuteOrchronic_apical'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
          Chronic Apical Abscess
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
            <?php 
                if($objresultPulpaldiag['pulp_necrosis'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
           Pulp Necrosis 
        </td>

        <td style="font-size: 12px;">
          Other : <?php $objresultPeriraddiag['other']; ?>
        </td>

      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
            <?php 
                if($objresultPulpaldiag['prev_initiat'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
          Previously Initiated Therapy
        </td>
        <td></td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
            <?php 
                if($objresultPulpaldiag['prev_treated'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >
                      Previously treated: &nbsp;                   
                    <?php
                    if($objresultPulpaldiag['prev_treated_improper'] == "1"){
                      echo "Improper";
                    }
                    else if($objresultPulpaldiag['prev_treated_incomplete'] == "1"){
                      echo "Incomplete RCT";
                    }else{
                      echo "";
                    }
                }else{
                    ?>
                     disabled = "true" >
                      Previously treated &nbsp;
                    <?php 
                } 
            ?>
        </td>
        <td></td>
      </tr>
    </table>

    <table style="margin-top: 1em;">
      <?php
        $searchTreatment = "SELECT * FROM treatment_plan WHERE Seq_no = '$sq'";
        $resultTreatment = $conn->query($searchTreatment);
        $objresultTreatment = mysqli_fetch_array($resultTreatment);
      ?>

      <tr>
        <th style="font-size:15px;" align="left">Treatment Planning</th>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
              if($objresultTreatment['no_treatment'] == "1"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
          ?>
         No Treatment
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
        <?php 
            if($objresultTreatment['Pulpotomy'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >     
                 Pulpotomy: 
                <?php
                if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "0"){
                  echo "Partial";
                }
                else if($objresultTreatment['pulp_partOrfull'] != "" && $objresultTreatment['pulp_partOrfull'] == "1"){
                  echo "Full";
                }else{
                  echo "";
                }
            }else{
                ?>
                 disabled = "true" >
                 Pulpotomy 
                <?php 
            } 
        ?>
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['pulpectomy'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Pulpectomy
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['non_sur_root'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Non-surgical Root Canel Treatment
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
        <?php 
            if($objresultTreatment['non_sur_retreat'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Non-surgical Retreatment
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['apexification'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Apexification
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['intentionalRCT'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Intentional RCT
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['sur_root'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Surgical Root Canel Treatment
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <input type="checkbox"
          <?php 
            if($objresultTreatment['perio_consult'] == "1"){
                ?>
                 checked = "true"
                 disabled = "true" >                      
                <?php
            }else{
                ?>
                 disabled = "true" >
                <?php 
            } 
        ?>
        Perio Consult
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
         Other : <?php echo $objresultTreatment['treat_other']; ?>
        </td>
      </tr>

      <tr>
        <td height="15"></td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <b> Plan for final restoration: </b>
        <?php echo $objresultTreatment['plan_for_final']; ?>
        </td>
      </tr>

      <tr>
        <td height="15"></td>
      </tr>
      <tr>
        <td style="font-size: 12px;">
          <b>Pre-op treatment: </b>
      <input type="checkbox"
        <?php 
          if($objresultTreatment['pre_op_treat_caries'] == "1"){
              ?>
               checked = "true"
               disabled = "true" >                      
              <?php
          }else{
              ?>
               disabled = "true" >
              <?php 
          } 
      ?>
       Caries Removal 

          <input type="checkbox" 
        <?php 
          if($objresultTreatment['pre_op_treat_dam'] == "1"){
              ?>
               checked = "true"
               disabled = "true" >                      
              <?php
          }else{
              ?>
               disabled = "true" >
              <?php 
          } 
      ?>
       Dam

           Other : <?php echo $objresultTreatment['pre_op_treat_other']; ?>
        </td>
      </tr>

      <tr>
        <td style="font-size: 12px;">
          <b>Anesthesia: </b>
            <input type="radio"
              <?php 
                if($objresultTreatment['Anest_reqOrnotreq'] == "1"){
                    ?>
                     checked = "true"
                     disabled = "true" >                      
                    <?php
                }else{
                    ?>
                     disabled = "true" >
                    <?php 
                } 
            ?>
            Required 

          <input type="radio" style="float:left;"
            <?php 
              if($objresultTreatment['Anest_reqOrnotreq'] == "0"){
                  ?>
                   checked = "true"
                   disabled = "true" >                      
                  <?php
              }else{
                  ?>
                   disabled = "true" >
                  <?php 
              } 
          ?>
          Not required
        </td>
      </tr>
    </table><br><br>

    <?php
      $searchXray = "SELECT * FROM patients_xray WHERE Seq_no = '$sq'";
      $resultXray = $conn->query($searchXray);
      $objresultXray = mysqli_fetch_array($resultXray); 
    ?>

    <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $objresultXray['xrayData'] ).'"   style="width: 200px; height:300px;"/>';

    $searchStuname = "SELECT * FROM dentalstudent_info WHERE student_code = '$stucode'";
    $resultStuname = $conn->query($searchStuname);
    $objresultStuname = mysqli_fetch_array($resultStuname);

    $searchDentname = "SELECT * FROM dentist_info WHERE dentId = '$dent'";
    $resultDentname = $conn->query($searchDentname);
    $objresultDentname = mysqli_fetch_array($resultDentname);

    $date = substr($harddate, 0,10);
    $newDate = date("d/m/Y", strtotime($date));
    ?>
    <p style="font-size: 14px; margin-left: 32em"><b>Dental student: </b><?php echo $objresultStuname['student_name']; ?></p>
    <p style="font-size: 14px; margin-left: 32em"><b>Instructor: </b><?php echo $objresultDentname['dent_name']; ?></p>
    <p style="font-size: 14px; margin-left: 32em"><b>Date: </b><?php echo $newDate; ?></p>



<!-- Javascript -->
<script src="assets/js/multi-step-form.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

</body>
</html>
<?php
error_reporting(0);
$html = ob_get_contents();        
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/MyPDF.pdf"); 
?>
<script type="text/javascript">
  window.location="MyPDF/MyPDF.pdf";
</script>
<!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a> -->