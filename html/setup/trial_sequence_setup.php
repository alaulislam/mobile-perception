<?php
// The following function check whether any entry is started 2 hrs/120 min before and hasn't finished yet, 
//it assumes that someone started the experiment and did not finish. So, it delete those entry in the temp file.
deleteUnixTimeIfMoreThanTwoHour();
function deleteUnixTimeIfMoreThanTwoHour(){

  function getTimeStampArray(){
    $filename = "../results/experiment_condition.csv";
    $exists = file_exists($filename);
    if($exists){
      $handle = fopen($filename, 'r') or die("can't open file");
      $data = fgetcsv($handle, 1000, ",");
      $timeArray = array();
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          if (isset($data[1])) {
            $time = $data[1];
            if ( !in_array($time, $timeArray) ) {
              array_push($timeArray, $time);
            }
          }
          // $time = $data[1];
      }
      fclose($handle) or die("can't close file");
      return $timeArray;
    }else{
       return array();
    }
   
  }
  $current_time = time();
  // $test_time = 1605139790;
  $filename_with_path = '../results/experiment_condition.csv';                                         
  $time_array = getTimeStampArray();
  $del_tag_array = [];
  if(!empty($time_array)){
    foreach ($time_array as $value) {
      // $minutes = (int)($seconds / 60);
      $difference = $current_time - $value;
      $difference_min = (int)($difference/60);
      if((int)($difference/60) > 120){ //120 min = 2 hr
        array_push($del_tag_array, $value);
      }
    }
  } 
  // $del_tag_array = [9800000,23243434];                                                         
  $tag_data_from_csv = [];
  if (!empty($del_tag_array)) {
  if ($handle = fopen($filename_with_path, "r")) {                                
    while ($data = fgetcsv($handle, 1000, ",")) {   
      if (isset($data[1])) {                            
        if (in_array($data[1], $del_tag_array)){                                
            continue;                                                           
        }
      }                                                                       
          $tag_data_from_csv[] = $data;                                           
      }                                                                           
    }                                                                               
    fclose($handle);                                                                
    if ($handle = fopen($filename_with_path, "w")) {                                
        foreach ($tag_data_from_csv as $data_at_each_index)                         
        {                                                                           
            fputcsv($handle, $data_at_each_index) or die('cannot write file');         
        }                                                                           
    }                                                                               
  fclose($handle);
  }
  
}

// The following function select a random experiment sequence and according to this set the experiment
function getRandomTrialSequence(){

  function checkTrialSequence(){
    $filename = "../results/experiment_condition.csv";
    $exists = file_exists($filename);
    if($exists){
      $handle = fopen($filename, 'r') or die("can't open file");
      $data = fgetcsv($handle, 1000, ",");
      $sequence = array();
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          if (isset($data[0])) {      
            $serial = $data[0];
            if ( !in_array($serial, $sequence) ) {
              array_push($sequence, $serial);
            }
          }
         
      }
      fclose($handle) or die("can't close file");
      return $sequence;
    }else{
      return array();
    }
   
  }
  $experiment_sequence = array(1,2,3,4,5,6,7,8,9);
  // $experiment_sequence = array(6);
  function getUnfinishedExperimentSequence($finished_seq, $all_seq){
    $unfinished_seq = [];
    for($i = 0; $i< count($all_seq); $i++)
    {
        if ( !in_array($all_seq[$i], $finished_seq) ) {
              array_push($unfinished_seq, $all_seq[$i]);
        }
    }
    return $unfinished_seq; 
  }

  function checkFinishedTrialSequence(){
    $filename = "../results/experiment_condition_done.csv";
    $exists = file_exists($filename);
    if($exists){
      $handle = fopen($filename, 'r') or die("can't open file");
      $data = fgetcsv($handle, 1000, ",");
      $sequence = array();
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          if (isset($data[0])) {      
            $serial = $data[0];
            if ( !in_array($serial, $sequence) ) {
              array_push($sequence, $serial);
            }
          }
         
      }
      fclose($handle) or die("can't close file");
      return $sequence;
    }else{
      return array();
    }
  }
  function getFinalExpSequence($e_s_t, $e_s){
    $f_e_s = [];
    for($i = 0; $i< count($e_s); $i++)
    {
        if ( !in_array($e_s[$i], $e_s_t) ) {
              array_push($f_e_s, $e_s[$i]);
        }
    }
    return $f_e_s; 
  }

  $experiment_sequence_finished = [];
  $experiment_sequence_finished = checkFinishedTrialSequence();
  $unfinished_experiment_sequence = [];
  $unfinished_experiment_sequence = getUnfinishedExperimentSequence($experiment_sequence_finished, $experiment_sequence); // compare with all experiment sequence with done sequence and get the undone sequence
  // var_dump($experiment_sequence_check);

  $experiment_sequence_temp = [];
  $experiment_sequence_temp = checkTrialSequence(); // check what experiment condition/sequence is in queue
  $final_experiment_sequence = [];
  $final_experiment_sequence = getFinalExpSequence($experiment_sequence_temp, $unfinished_experiment_sequence); // leave those experiment sequence what is in queue and what sequence is already done
  // var_dump($final_experiment_sequence);
  // pick a random sequence what is not done
  if(!empty($final_experiment_sequence)){
    $random_sequence_key = array_rand($final_experiment_sequence);
    $random_sequence_value = $final_experiment_sequence[$random_sequence_key];
  }else{
    $random_sequence_key = array_rand($experiment_sequence); //if all conditions are finished pick a random sequence from the original sequence
    $random_sequence_value = $experiment_sequence[$random_sequence_key];
  }
//   $random_sequence_key = array_rand($final_experiment_sequence);
  
  return $random_sequence_value;
}
function setTempTrialSequence($trial_sequence){
    $filename = "../results/experiment_condition.csv";
    $exists = file_exists($filename);
    $handle = fopen( $filename ,'a') or die("can't open file");
    // $agree_file = fopen($agree_filename, "a");
    if (!$exists){
        fputcsv($handle, array('file', 'timestamp'));
    }
    $form_data = array(
      PHP_EOL .
      'file'  => $trial_sequence,
      'timestamp' =>  time(),
    );
    fputcsv($handle, $form_data);
    fclose($handle);
  }

$trial_sequence = getRandomTrialSequence();
if(!empty($trial_sequence)){
  setTempTrialSequence($trial_sequence);
  $task = array();
  $stimuli = array();
  $data_img = array();
  $image_start_end = array();

  switch ($trial_sequence)
    {
        case 1:
            $between_subject_sequence = $trial_sequence;
            $task = array("T1"); 
            $stimuli = array("S1","S2","S3");
            $data_img = array("D1","D2","D3");
            $image_start_end = array(
              "D1" => array( 0, 39 ),
              "D2" => array( 40, 79 ),
              "D3" => array( 80, 119),
            );
            $experiment_order = array(
              "experiment_sequence_1" => "T1-S1-D1",
              "experiment_sequence_2" => "T1-S2-D2",
              "experiment_sequence_3" => "T1-S3-D3"
            );
            // var_dump("the value is either 1.");
            break;
        case 2:
              $between_subject_sequence = $trial_sequence;
              $task = array("T1"); 
              $stimuli = array("S3","S1","S2");
              $data_img = array("D1","D2","D3");
              $image_start_end = array(
                "D1" => array( 0, 39 ),
                "D2" => array( 40, 79 ),
                "D3" => array( 80, 119),
            );
            $experiment_order = array(
              "experiment_sequence_1" => "T1-S3-D1",
              "experiment_sequence_2" => "T1-S1-D2",
              "experiment_sequence_3" => "T1-S2-D3"
            );      
              break;
        case 3:
              $between_subject_sequence = $trial_sequence;
              $task = array("T1");
              $stimuli = array("S2","S3","S1");
              $data_img = array("D1","D2","D3");
              $image_start_end = array(
                "D1" => array( 0, 39 ),
                "D2" => array( 40, 79 ),
                "D3" => array( 80, 119),
              );
              $experiment_order = array(
                "experiment_sequence_1" => "T1-S2-D1",
                "experiment_sequence_2" => "T1-S3-D2",
                "experiment_sequence_3" => "T1-S1-D3"
              );   
              // var_dump("the value is either 4.");
              break;

        case 4:
            $between_subject_sequence = $trial_sequence;
            $task = array("T2");
            $stimuli = array("S1","S2","S3");
            $data_img = array("D1","D2","D3");
            $image_start_end = array(
              "D1" => array( 0, 39 ),
              "D2" => array( 40, 79 ),
              "D3" => array( 80, 119),
            );
            $experiment_order = array(
              "experiment_sequence_1" => "T2-S1-D1",
              "experiment_sequence_2" => "T2-S2-D2",
              "experiment_sequence_3" => "T2-S3-D3"
            );
            // var_dump("the value is either 2.");
            break;
        
        case 5:
              $between_subject_sequence = $trial_sequence;
              $task = array("T2");
              $stimuli = array("S3","S1","S2");
              $data_img = array("D1","D2","D3");
              $image_start_end = array(
                "D1" => array( 0, 39 ),
                "D2" => array( 40, 79 ),
                "D3" => array( 80, 119),
             );
             $experiment_order = array(
              "experiment_sequence_1" => "T2-S3-D1",
              "experiment_sequence_2" => "T2-S1-D2",
              "experiment_sequence_3" => "T2-S2-D3"
            );     
              break;
        case 6:
                $between_subject_sequence = $trial_sequence;
                $task = array("T2"); 
                $stimuli = array("S2","S3","S1");
                $data_img = array("D1","D2","D3");
                $image_start_end = array(
                  "D1" => array( 0, 39 ),
                  "D2" => array( 40, 79 ),
                  "D3" => array( 80, 119),
                );
                $experiment_order = array(
                  "experiment_sequence_1" => "T2-S2-D1",
                  "experiment_sequence_2" => "T2-S3-D2",
                  "experiment_sequence_3" => "T2-S1-D3"
                );  
                break;

        case 7:
            $between_subject_sequence = $trial_sequence;
            $task = array("T3");
            $stimuli = array("S1","S2","S3");
            $data_img = array("D1","D2","D3");
            $image_start_end = array(
              "D1" => array( 0, 39 ),
              "D2" => array( 40, 79 ),
              "D3" => array( 80, 119),
          );
          $experiment_order = array(
            "experiment_sequence_1" => "T3-S1-D1",
            "experiment_sequence_2" => "T3-S2-D2",
            "experiment_sequence_3" => "T3-S3-D3"
          );
            // var_dump("the value is either 3.");
            break;
       
        case 8:
              $between_subject_sequence = $trial_sequence;
              $task = array("T3");
              $stimuli = array("S3","S1","S2");
              $data_img = array("D1","D2","D3");
              $image_start_end = array(
                "D1" => array( 0, 39 ),
                "D2" => array( 40, 79 ),
                "D3" => array( 80, 119),
             );
             $experiment_order = array(
              "experiment_sequence_1" => "T3-S3-D1",
              "experiment_sequence_2" => "T3-S1-D2",
              "experiment_sequence_3" => "T3-S2-D3"
            );        
              break;
       
        case 9:
            $between_subject_sequence = $trial_sequence;
            $task = array("T3");
            $stimuli = array("S2","S3","S1");
            $data_img = array("D1","D2","D3");
            $image_start_end = array(
              "D1" => array( 0, 39 ),
              "D2" => array( 40, 79 ),
              "D3" => array( 80, 119),
            );
            $experiment_order = array(
              "experiment_sequence_1" => "T3-S2-D1",
              "experiment_sequence_2" => "T3-S3-D2",
              "experiment_sequence_3" => "T3-S1-D3"
            );  
            break;
     
      
    }
}



?>  
