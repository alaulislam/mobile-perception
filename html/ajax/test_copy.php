<?php

//   var_dump($_POST);
// // Or
//   print_r($_POST);
// <!-- participant, timestamp, chart, elements, trial, file, time, feedback -->

if( isset( $_POST['trial_img_name_array']) && isset( $_POST['trial_img_ans_array'])  && isset( $_POST['trial_img_time_array']) ){
  $trial_img_name_array = json_decode($_POST['trial_img_name_array'], true);
  $trial_img_ans_array = json_decode($_POST['trial_img_ans_array'], true);
  $trial_img_time_array = json_decode($_POST['trial_img_time_array'], true);
  
  // $array = explode(', ', $trial_img_name_array); //split string into array seperated by ', '
 
  // foreach($trial_img_name_array as $key => $value) {
  //   echo "<li>$key: $value</li>";
  // }
  
}

$trial_img_name_array_length = count($trial_img_name_array);    
$i = 0;
while ($i < $trial_img_name_array_length)
{
    ${'trial_img_name_' . $i} = $trial_img_name_array[$i];
    $i++;
}
$trial_img_ans_length = count($trial_img_ans_array);    
$j = 0;
while ($j < $trial_img_ans_length)
{
    ${'trial_img_ans_' . $j} = $trial_img_ans_array[$j];
    $j++;
}
$trial_img_time_ength = count($trial_img_time_array);    
$k = 0;
while ($k < $trial_img_time_ength)
{
    ${'trial_img_time_' . $k} = $trial_img_time_array[$k];
    $k++;
}

// $i = 1;
// while ($i < $arrayLength)
// {
//   echo  ${'trial_img_name_' . $i}; //print value
//    $i++;
// }


  $agree_filename = "../../results/test.csv";
  $exists = file_exists($agree_filename);
  $agree_file = fopen($agree_filename, "a");
  if (!$exists){
      fputcsv($agree_file, array('participant_id', 'timestamp', 'trial_img_name_0', 'trial_img_ans_0', 'trial_img_time_0', 'trial_img_name_1', 'trial_img_ans_1', 'trial_img_time_1', 'trial_img_name_2', 'trial_img_ans_2', 'trial_img_time_2'));
     #fwrite($agree_file, "participant_id,timestamp,selection");
  }
  $no_rows = count(file($agree_filename));
  if($no_rows > 1)
  {
    $no_rows = ($no_rows - 1) + 1;
  }

  $form_data = array(
    PHP_EOL .
    'participant_id'  => $no_rows,
    'timestamp' =>  date(DateTime::ISO8601),
    'trial_img_name_0' => $trial_img_name_0,
    'trial_img_ans_0' => $trial_img_ans_0,
    'trial_img_time_0' => $trial_img_time_0,
    'trial_img_name_1' => $trial_img_name_1,
    'trial_img_ans_1' => $trial_img_ans_1,
    'trial_img_time_1' => $trial_img_time_1,
    'trial_img_name_2' => $trial_img_name_2,
    'trial_img_ans_2' => $trial_img_ans_2,
    'trial_img_time_2' => $trial_img_time_2,
  );

  fputcsv($agree_file, $form_data);


  fclose($agree_file);
	exit;

?>
