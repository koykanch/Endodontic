<!DOCTYPE html>
<html>
<body>
<?php
require_once('mpdf/mpdf.php');
ob_start();

require('connect.php');
$HN = $_POST['PatientHN'];
$stucode = $_POST['Stu_code'];
$dent = $_POST['Dent_id'];
$harddate = $_POST['hard_date'];
  
?>
	<div style="font-size:30px; margin-left: 14em;">
		  <b>Endodontic Record</b>
	</div>

	<div style="font-size:20px; margin-left:14em;">
		  <b>Faculty of Dentistry, Chiang Mai University</b>
	</div><br><br>

	<div>
		  <label style="font-size:20px;">HN : <?php echo $HN; ?></label>
	</div><br>

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
      <th style="font-size: 20px;" align="left" colspan="4">Patient's History</th>
    </tr>

    <tr>
      <th style="font-size: 15px;" align="left" colspan="4">
      <?php
        $searchMed = "SELECT * FROM medical_his WHERE HN = '$HN' AND Date = '$harddate'";
        $resultMed = $conn->query($searchMed);
        $objresultMed = mysqli_fetch_array($resultMed);
      ?>
          <u>Medical History</u>
      </th>
    </tr>

    <tr>
      <td>
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

      <td>
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

      <td>  
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

      <td>
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
      <td colspan="2">
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

      <td colspan="2">
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
    </tr>

    <tr>
      <td colspan="2">
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

      <td colspan="2">
         <input type="checkbox"
              <?php
               if($objresultMed['blood_pres'] != ""){
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
          Blood Pressure (if needed): 
           <?php echo $objresultMed['blood_pres']; ?>
      </td>
    </tr>

    <tr>
      <td colspan="2">
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

      <td colspan="2">
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
    </tr>

    <tr>
      <td colspan="2">
            Personal Doctor :
            <?php echo $objresultMed['personal_doc']; ?>
      </td>

      <td colspan="2">
            Tel : 
            <?php echo $objresultMed['Tel']; ?>
      </td>
    </tr>

    <tr>
      <td colspan="4">
          Remark : 
          <?php echo $objresultMed['remark']; ?>
      </td>
    </tr>

    <tr>
      <th style="font-size: 15px;" align="left" colspan="4"><u>Dental History</u></th>
    </tr>

    <tr>
      <td colspan="4">
        <?php
          $searchDen = "SELECT * FROM dental_his WHERE HN = '$HN' AND Date = '$harddate'";
          $resultDen = $conn->query($searchDen);
          $objresultDen = mysqli_fetch_array($resultDen);
        ?>  
          Chief Complaint :
          <?php echo $objresultDen['chief_complaint']; ?>
      </td>
    </tr>

    <tr>
      <td colspan="4">
          History of Present Illness : 
          <?php echo $objresultDen['his_of_presentill']; ?>
      </td>
    </tr>
  </table><br>
    
  <table width="100%">
    <tr>
      <th style="font-size:20px;" align="left" colspan="3">Examination</th>
    </tr>

    <tr>
    <?php
      $searchSubj = "SELECT * FROM subject_symptom WHERE HN = '$HN' AND Date = '$harddate'";
      $resultSubj = $conn->query($searchSubj);
      $objresultSubj = mysqli_fetch_array($resultSubj);
    ?>

      <th style="font-size:15px;" align="left"><u>S.Subjective Symptoms</u></th>

      <?php
        $searchObj = "SELECT * FROM object_symptom WHERE HN='$HN' AND Date = '$harddate'";
        $resultObj = $conn->query($searchObj);
        $objresultObj = mysqli_fetch_array($resultObj);
      ?>
    
      <th style="font-size: 15px;" colspan="2" align="left"><u>O.Objective Symptoms</u></th>
    </tr>
      
    <tr>
      <td>
        <?php
          $paininten = "SELECT * FROM pain_intensity WHERE paininten_id = '".$objresultSubj['paininten_id']."'";
          $resultpainin = $conn->query($paininten);
          $objresultpainin = mysqli_fetch_array($resultpainin);
        ?>
        Pain intensity: <?php echo $objresultpainin['paininten_detail']; ?>
      </td>
      
      <td>Extraoral:</td>
      <td>
        <?php
          if($objresultObj['ext_facialswelling'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
              <?php
                $facialswell = "SELECT * FROM extra_facial WHERE facialswell_id = '".$objresultObj['facialswell_id']."'";
                $resultfacial = $conn->query($facialswell);
                $objresultfacial = mysqli_fetch_array($resultfacial);
              ?>
              Facial Swelling:
              <?php echo $objresultfacial['facialswell_detail']; ?> 
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
              Facial Swelling:
              <?php
          }
        ?>
      </td>
    </tr>

    <tr>
      <td>
        <?php
          $painchar = "SELECT * FROM pain_character WHERE painchar_id = '".$objresultSubj['painchar_id']."'";
          $resultpainchar = $conn->query($painchar);
          $objresultpainchar = mysqli_fetch_array($resultpainchar);
        ?>

        Pain Character: <?php echo $objresultpainchar['painchar_detail']; ?>
      </td>

      <td></td>
      <td>
        <?php
          if($objresultObj['ext_lymphnode'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
            <?php
                $lymphnode = "SELECT * FROM extra_lymphnode WHERE lymphnode_id = '".$objresultObj['lymphnode_id']."'";
                $resultlymphnode = $conn->query($lymphnode);
                $objresultlymphnode = mysqli_fetch_array($resultlymphnode);
            ?>
                Lymph Node: 
                <?php echo $objresultlymphnode['lymphnode_detail']; ?>
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
                Lymph Node: 
            <?php
          }
        ?>
      </td>
    </tr>

    <tr>
      <td>
        Onset: 
          <?php 
            if($objresultSubj['onset_spontOrstim'] == "0") {
              echo "Spontaneous";
            }else{
              echo "Stimulation Required(".$objresultSubj['stimulation_detail'].")";
            }

          ?> 
      </td>

      <td></td>
      <td>
        <?php
          if($objresultObj['ext_sinustract'] == "1"){
            ?>
              <input type="checkbox" checked="true" disabled="true">
            <?php
                $sinus = "SELECT * FROM extra_sinus WHERE sinustract_id = '".$objresultObj['sinustract_id']."'";
                $resultsinus = $conn->query($sinus);
                $objresultsinus = mysqli_fetch_array($resultsinus);
            ?>
              Sinus Tract:
              <?php echo $objresultsinus['sinustract_detail']; ?>  
            <?php
          }else{
            ?>
              <input type="checkbox" disabled="true">
              Sinus Tract: 
            <?php
          } 
        ?>
      </td>
    </tr>

    <tr>
      <td>
        <?php
          $duration = "SELECT * FROM duration WHERE duration_id = '".$objresultSubj['duration_id']."'";
          $resultduration = $conn->query($duration);
          $objresultduration = mysqli_fetch_array($resultduration);
        ?>

        Duration: <?php echo $objresultduration['duration_detail']; ?>
      </td>

      <td></td>
      <td>
        Other: <?php echo $objresultObj['ext_other']; ?>
      </td>
    </tr>

    <tr>
      <td>
        <?php
          $location = "SELECT * FROM location WHERE location_id = '".$objresultSubj['locat_locOrdiff']."'";
          $resultlocation = $conn->query($location);
          $objresultlocation = mysqli_fetch_array($resultlocation);
        ?>

        Location: <?php echo $objresultlocation['location_detail']; ?>
      </td>

      <td>Intraoral:</td>
      <td>
        <?php
              if($objresultObj['intra_swellsoftOrfirm'] == "0"){
                $swell = "Soft";
              }else{
                $swell = "Firm";
              }
            ?>
              Sweling(<?php echo $swell; ?>) &nbsp; area : <?php echo $objresultObj['intra_swellarea']; ?>
      </td>
    </tr>

    <tr>
      <td style="padding-left:60px">
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
        &nbsp;Radiating to &nbsp;
        <?php echo $objresultSubj['locat_radiating']; ?>
      </td>

      <td></td>
      <td>
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
      <td style="padding-left:60px">
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
        &nbsp;Referred to &nbsp;
        <?php echo $objresultSubj['locat_referred']; ?>

      </td>

      <td>Tooth:</td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
            Fracture at &nbsp; <?php echo $objresultObj['tooth_fracture']; ?>
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
            Crown Discoloration to &nbsp; 
            <?php echo $objresultObj['tooth_crown']; ?>
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
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
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td> Other: <?php echo $objresultObj['tooth_other']; ?> </td>
    </tr>
  </table>

  
      <div style="font-size: 15px;"><b>Examination: </b></div>
      <?php
        $searchExam = "SELECT * FROM examination WHERE HN = '$HN' AND Date = '$harddate'";
        $resultExam = $conn->query($searchExam);
        $objresultExam = mysqli_fetch_array($resultExam);
      ?>
      <div>
        <table border="1" cellpadding="5" cellspacing="2">
              <tr>
                <th rowspan="2">Tooth</th>
                <th rowspan="2">EPT</th>
                <th rowspan="2">Cold</th>
                <th rowspan="2">Heat</th>
                <th rowspan="2">Perc<sup>n</sup></th>
                <th rowspan="2">Palp<sup>n</sup></th>
                <th rowspan="2">Mobility</th>
                <th colspan="6">Pero Probe (mm)</th>

                <th rowspan="2">Special Test<br>(if necessary)</th>
              </tr>
              <tr>
                <th>MB</th>
                <th>B</th>
                <th>DB</th>
                <th>ML</th>
                <th>L</th>
                <th>DL</th>
              </tr> 
              
              <tr>
                <td><?php echo $objresultExam['exam_tooth']; ?></td>
                <td><?php echo $objresultExam['exam_EPT']; ?></td>
                <td>
                    <?php 
                  if($objresultExam['exam_cold'] == "1"){
                      echo '+';
                  }else{
                      echo '-';
                  } ?>
                </td>

                <td>
                  <?php 
                    if($objresultExam['exam_heat'] == "1"){
                        echo '+';
                    }else{
                        echo '-';
                    } ?>
                </td>

                <td>
                  <?php 
                  if($objresultExam['exam_perc'] == "1"){
                      echo '+';
                  }else{
                      echo '-';
                  } ?>
                </td>

                <td>
                  <?php 
                    if($objresultExam['exam_palp'] == "1"){
                        echo '+';
                    }else{
                        echo '-';
                    } ?>
                </td>

                <td>
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
                    
                <td>
                  <?php echo $objresultExam['exam_perioMB']; ?>
                </td>

                <td>
                  <?php echo $objresultExam['exam_perioB']; ?>
                </td>

                <td>
                  <?php echo $objresultExam['exam_perioDB']; ?>
                </td>

                <td>
                  <?php echo $objresultExam['exam_perioML']; ?>
                </td>

                <td>
                  <?php echo $objresultExam['exam_perioL']; ?>
                </td>

                <td>
                  <?php echo $objresultExam['exam_perioDL']; ?>
                </td>

                <td>
                  <?php
                    $specialtest = "SELECT * FROM special_test WHERE spectest_id = '".$objresultExam['spectest_id']."'";
                    $resultspecialtest = $conn->query($specialtest);
                    $objresultspecialtest = mysqli_fetch_array($resultspecialtest);

                    echo $objresultspecialtest['spectest_detail'];
                  ?>
                </td>
              </tr>
          </table><br>

        <table cellpadding="4">
            <tr>
              <th style="font-size:15px;" colspan="4" align="left"><u>Radiographic findings</u></th>
            </tr>

            <tr>
              <td>
                <b>Crown:</b>
              </td>

              <td>
              <?php
                $searchRadio = "SELECT * FROM radiograph_crown WHERE HN = '$HN' AND Date = '$harddate'";
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
              </td>

              <td>
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
              </td>

              <td>
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
              </td>
            </tr>

            <tr>
              <td></td>
              <td>
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
                 Fracture
              </td>

              <td colspan="2">
                Other : &nbsp; 
                <?php echo $objresultRadio['crown_other']; ?>
              </td>
            </tr>
          

        <tr>
          <td><b>Pulp Chambar:</b></td>

          <td>
            <?php
              $searchPulpcham = "SELECT * FROM radiograph_pulpcham WHERE HN = '$HN' AND Date = '$harddate'";
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
          </td>

          <td>
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
          </td>

          <td>
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
          </td>
        </tr>

        <tr>
          <td></td>
          <td>
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
            Resorption
          </td>

          <td colspan="2">
              Other : 
              <?php echo $objresultPulpcham['pulpcham_other']; ?>
          </td>
        </tr>
      
        <tr>
          <?php
            $searchRoot = "SELECT * FROM radiograph_root WHERE HN = '$HN' AND Date = '$harddate'";
            $resultRoot = $conn->query($searchRoot);
            $objresultRoot = mysqli_fetch_array($resultRoot); 
          ?>

          <td>
              <b>Root: </b>
          </td>

          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
          </td>
        </tr>

        <tr>
          <td></td>
          <td>
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
          </td>

          <td>
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
                 Fracture
          </td>

          <td>
              Other : <?php echo $objresultRoot['root_other']; ?>
          </td>
        </tr>

        <tr>
          <td>
            <?php
              $searchPulpcan = "SELECT * FROM radiograph_pulpcanal WHERE HN = '$HN' AND Date = '$harddate'";
              $resultPulpcan = $conn->query($searchPulpcan);
              $objresultPulpcan = mysqli_fetch_array($resultPulpcan); 
            ?>

            <b>Pulp Canal:</b>
          </td>

          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
          </td>
        </tr>

        <tr>
          <td></td>

          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
            Broken Instrument
          </td>
        </tr>

        <tr>
          <td></td>
          <td colspan="3">
            Other : <?php echo $objresultPulpcan['pulpcan_other']; ?>
          </td>
        </tr>

        <tr>
          <td>
            <?php
              $searchPerirad = "SELECT * FROM radiograph_perirad WHERE HN = '$HN' AND Date = '$harddate'";
              $resultPerirad = $conn->query($searchPerirad);
              $objresultPerirad = mysqli_fetch_array($resultPerirad);   
            ?>
            <b>Periradicular:</b>
          </td>

          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
          </td>
        </tr>

        <tr>
          <td></td>
          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
          </td>
        </tr>

        <tr>
          <td></td>
          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
             Hyperplasia of cementurn
          </td>
        </tr>

        <tr>
          <td></td>
          <td colspan="3">
              Other : <?php echo $objresultPerirad['perirad_other']; ?>
          </td>
        </tr>

        <tr>
          <td>
            <?php
              $searchAlveolar = "SELECT * FROM radiograph_alveolar WHERE HN = '$HN' AND Date = '$harddate'";
              $resultAlveolar = $conn->query($searchAlveolar);
              $objresultAlveolar = mysqli_fetch_array($resultAlveolar);
            ?>
            <b>Alveolar Bone: </b>
          </td>

          <td>
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
          </td>

          <td>
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
          </td>

          <td>
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
            &nbsp; Localized Bone loss
          </td>
        </tr>

        <tr>
          <td></td>
          <td colspan="3">
            Other : <?php echo $objresultAlveolar['bone_other']; ?>
          </td>
        </tr>

        <tr>
          <td><b>Remarks: </b></td>
          <td colspan="3"><?php echo $objresultAlveolar['remark']; ?></td>
        </tr>
      </table><br>

      <table cellpadding="5">
        <?php
          $searchPulpaldiag = "SELECT * FROM pulpal_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
          $resultPulpaldiag = $conn->query($searchPulpaldiag);
          $objresultPulpaldiag = mysqli_fetch_array($resultPulpaldiag);
        ?>
      <tr>
        <th style="font-size: 20px;" align="left" colspan="2">Diagnosis</th>
      </tr>

      <tr>
        <td style="font-size: 15px;" width="80%">
            <b>Pulpal Diagnosis</b>
        </td>

        <td style="font-size: 15px;" width="80%">
          <?php
            $searchPeriraddiag = "SELECT * FROM periradicular_diagnosis WHERE HN = '$HN' AND Date = '$harddate'";
            $resultPeriraddiag = $conn->query($searchPeriraddiag);
            $objresultPeriraddiag = mysqli_fetch_array($resultPeriraddiag);
          ?>
          <b>Periradicular Diagnosis</b>
        </td>
      </tr>

      <tr>    
        <td>
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

        <td>
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
        <td>
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

        <td>
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
        <td>
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

        <td>
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

      <tr style="margin-left:2em;">
        <td>
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

        <td>
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

      <tr style="margin-left:2em;">
        <td>
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

        <td>
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
        <td>
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

        <td>
          Other : <?php $objresultPeriraddiag['other']; ?>
        </td>

      </tr>

      <tr>
        <td>
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
        <td>
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
    </table><br><br><br><br><br><br><br><br><br>

    <table>
      <?php
        $searchTreatment = "SELECT * FROM treatment_plan WHERE HN = '$HN' AND Date = '$harddate'";
        $resultTreatment = $conn->query($searchTreatment);
        $objresultTreatment = mysqli_fetch_array($resultTreatment);
      ?>

      <tr>
        <th style="font-size:20px;" align="left" colspan="3">Treatment Planning</th>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
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
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>
         Other : <?php echo $objresultTreatment['treat_other']; ?>
        </td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td colspan="3" height="20"></td>
      </tr>
      <tr>
        <td>
          <b> Plan for final restoration: </b>
        <?php echo $objresultTreatment['plan_for_final']; ?>
        </td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td colspan="3" height="20"></td>
      </tr>
      <tr>
        <td>
          <b>Pre-op treatment: </b>
      <input type="radio"
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
        </td>

        <td>
          <input type="radio" 
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
        </td>

        <td>
           Other : <?php echo $objresultTreatment['pre_op_treat_other']; ?>
        </td>
      </tr>

      <tr>
        <td>
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
        </td>

        <td>
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
        <td></td>
      </tr>
    </table>

<!-- Javascript -->
<script src="assets/js/multi-step-form.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

</body>
</html>
<?php
$html = ob_get_contents();        
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/MyPDF.pdf"); 
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>