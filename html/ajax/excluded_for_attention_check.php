<?php
 if(isset($_POST['excluded_for_attn_check']) ){
    $excluded_for_attn_check  = json_decode($_POST['excluded_for_attn_check'], true);
    //pre_questionnaire start
    if($excluded_for_attn_check == "excluded_participant_for_last_two_questions" || $excluded_for_attn_check == "excluded_participant_for_at_least_six_wrong_ans"){
        if(isset($_POST['participant_id']) 
        && isset($_POST['system_generated_id']) 
        && isset($_POST['experiment_sequence'])
        && isset($_POST['experiment_duration'])
        && isset($_POST['browser_name'])
        && isset($_POST['browser_version'])
        && isset($_POST['operating_system'])
        && isset($_POST['total_attn_check_ques_wrong']) 
    ){
                  $participant_id                   = json_decode($_POST['participant_id'], true);
                  $system_generated_id              = json_decode($_POST['system_generated_id'], true);
                  $experiment_sequence              = json_decode($_POST['experiment_sequence'], true);
                  $experiment_duration              = json_decode($_POST['experiment_duration'], true);
                  $browser_name                     = json_decode($_POST['browser_name'], true);
                  $browser_version                  = json_decode($_POST['browser_version'], true);
                  $operating_system                 = json_decode($_POST['operating_system'], true);
                  $total_attn_check_ques_wrong      = json_decode($_POST['total_attn_check_ques_wrong'], true);
     }
     $response = array();
     $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_seq_". $experiment_sequence ."_excluded_for_attention_check.csv";
     $exists = file_exists($filename);
     if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         $response['status'] = 'error';
         $response['message'] = 'Cannot open the csv file';
         exit;
     }
     
     $headers = "participant_id, system_generated_id, experiment_sequence, experiment_browser, experiment_browser_version, experiment_os, timestamp, experiment_duration, exclusion_reason, total_wrong_ans";
     if (!$exists){
     if (fwrite($handle, $headers) === FALSE) {
         echo "Cannot write the header names to file ($filename)";
         $response['status']    = 'error';
         $response['message']   = 'Cannot write the header names to csv file';
         exit;
     }
     }

     $form_data    = '';
     $timestamp    = date(DateTime::ISO8601); // need to look whether it's same time or individual

     $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $browser_name, $browser_version, $operating_system, $timestamp, $experiment_duration, $excluded_for_attn_check, $total_attn_check_ques_wrong";

     if (fwrite($handle, $form_data) === FALSE) {
     echo "Cannot write the participants study data to file ($filename)";
     $response['status'] = 'error';
     $response['message'] = 'Cannot write the participants study data to csv file';
     exit;
     }

     $response['status'] = 'success';
     $response['message'] = 'Data saved successfully';
     $response['data'] =  $form_data;

     fclose($handle);
     echo json_encode($response);
}
}
?>