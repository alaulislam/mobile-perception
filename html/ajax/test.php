<?php

//  var_dump($_POST);
// // Or
//   print_r($_POST);
//  session_start();

if(isset($_POST['participant_id']) 
&& isset($_POST['chart']) 
&& isset( $_POST['elements'])  
&& isset( $_POST['trial']) 
&& isset( $_POST['sequence']) 
&& isset( $_POST['file']) 
&& isset( $_POST['time']) 
&& isset( $_POST['feedback'])){
      $participant_id   = json_decode($_POST['participant_id'], true);
      $chart            = json_decode($_POST['chart'], true);
      $elements         = json_decode($_POST['elements'], true);
      $trial            = json_decode($_POST['trial'], true);
      $sequence         = json_decode($_POST['sequence'], true);
      $file             = json_decode($_POST['file'], true);
      $time             = json_decode($_POST['time'], true);
      $feedback         = json_decode($_POST['feedback'], true);
}
$response = array();
$filename = "../../results/" . $participant_id .'.csv';
$exists = file_exists($filename);
if (!$handle = fopen($filename, 'a')) {
      echo "Cannot open file ($filename)";
      $response['status'] = 'error';
      $response['message'] = 'Cannot open the csv file';
      exit;
}
  
$headers = "participant, timestamp, chart, elements, trial, sequence, file, time, feedback";
if (!$exists){
  if (fwrite($handle, $headers) === FALSE) {
      echo "Cannot write the header names to file ($filename)";
      $response['status'] = 'error';
      $response['message'] = 'Cannot write the header names to csv file';
      exit;
  }
}

$form_data    = '';
$timestamp    = date(DateTime::ISO8601); // need to look whether it's same time or individual
$trial_length = count($chart);    
for($i=0; $i < $trial_length; $i++){
    $form_data.=PHP_EOL."$participant_id, $timestamp, $chart[$i], $elements[$i], $trial[$i], $sequence[$i], $file[$i], $time[$i], $feedback[$i]";
}
if (fwrite($handle, $form_data) === FALSE) {
  echo "Cannot write the participants study data to file ($filename)";
  $response['status'] = 'error';
  $response['message'] = 'Cannot write the participants study data to csv file';
  exit;
}

// echo "Success, wrote ($form_data) to file ($filename)";
$response['status'] = 'success';
$response['message'] = 'This was successful';
$response['participant_id'] = $participant_id;

fclose($handle);
echo json_encode($response);

?>
