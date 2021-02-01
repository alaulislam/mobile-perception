<?php
if(isset($_POST['page_name']) && !empty($_POST['page_name'])  ){ //if isset start
    $page_name                        = "";
    $participant_id                   = "";
    $system_generated_id              = "";
    $experiment_sequence              = 0;
    $experiment_order                 = "";
    $task                             = [];
    $visualization_size               = [];
    $trial_order                      = [];
    $image_file_order                 = [];
    $answering_time                   = [];
    $answer                           = [];
    $image_file_name                  = [];     
    $page_name   = json_decode($_POST['page_name'], true);
    //practice_T1_S1_D1 start  
    if($page_name == "practice_T1_S1_D1" || $page_name == "practice_T1_S1_D2" || $page_name == "practice_T1_S1_D3" ||
        $page_name == "practice_T1_S2_D1" || $page_name == "practice_T1_S2_D2" || $page_name == "practice_T1_S2_D3" ||
        $page_name == "practice_T1_S3_D1" || $page_name == "practice_T1_S3_D2" || $page_name == "practice_T1_S3_D3" ||
        $page_name == "practice_T2_S1_D1" || $page_name == "practice_T2_S1_D2" || $page_name == "practice_T2_S1_D3" ||
        $page_name == "practice_T2_S2_D1" || $page_name == "practice_T2_S2_D2" || $page_name == "practice_T2_S2_D3" ||
        $page_name == "practice_T2_S3_D1" || $page_name == "practice_T2_S3_D2" || $page_name == "practice_T2_S3_D3" ||
        $page_name == "practice_T3_S1_D1" || $page_name == "practice_T3_S1_D2" || $page_name == "practice_T3_S1_D3" ||
        $page_name == "practice_T3_S2_D1" || $page_name == "practice_T3_S2_D2" || $page_name == "practice_T3_S2_D3" ||
        $page_name == "practice_T3_S3_D1" || $page_name == "practice_T3_S3_D2" || $page_name == "practice_T3_S3_D3" 
        )
    {
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id']) 
            && isset($_POST['experiment_sequence']) 
            && isset($_POST['experiment_order'])
            && isset($_POST['task'])
            && isset($_POST['visualization_size'])
            && isset($_POST['trial_order'])
            && isset($_POST['image_file_order'])
            && isset($_POST['answering_time'])
            && isset($_POST['answer'])
            && isset($_POST['image_file_name'])
            ){
                  $participant_id                   = json_decode($_POST['participant_id'], true);
                  $system_generated_id              = json_decode($_POST['system_generated_id'], true);
                  $experiment_sequence              = json_decode($_POST['experiment_sequence'], true);
                  $experiment_order                 = json_decode($_POST['experiment_order'], true);
                  $is_main_trial                    = json_decode($_POST['is_main_trial'], true);
                  $task                             = json_decode($_POST['task'], true);
                  $visualization_size               = json_decode($_POST['visualization_size'], true);
                  $trial_order                      = json_decode($_POST['trial_order'], true);
                  $image_file_order                 = json_decode($_POST['image_file_order'], true);
                  $answering_time                   = json_decode($_POST['answering_time'], true);
                  $answer                           = json_decode($_POST['answer'], true);
                  $image_file_name                  = json_decode($_POST['image_file_name'], true);     
            }
        //    echo '<script>console.log(
        //    "page_name=" '.$page_name.',
        //    "participant_id=" '.$participant_id.',
        //    "system_generated_id=" '.$system_generated_id.',
        //    "experiment_sequence=" '.$experiment_sequence .',
        //    "experiment_order=" '.$experiment_order.',
        //    "is_main_trial=" '.$is_main_trial.',
        //    "task=" '.$task.',
        //    "visualization_size=" '.$visualization_size.',
        //    "trial_order=" '.$trial_order.',
        //    "image_file_order=" '.$image_file_order.',
        //    "answering_time=" '.$answering_time.',
        //    "answer=" '.$answer.',
        //    "image_file_name=" '.$image_file_name.',)</script>';   

    } //practice_T1_S3_D1 start


    //trial_T1_S1_D1 start  
    if($page_name == "trial_T1_S1_D1" || $page_name == "trial_T1_S1_D2" || $page_name == "trial_T1_S1_D3" ||
    $page_name == "trial_T1_S2_D1" || $page_name == "trial_T1_S2_D2" || $page_name == "trial_T1_S2_D3" ||
    $page_name == "trial_T1_S3_D1" || $page_name == "trial_T1_S3_D2" || $page_name == "trial_T1_S3_D3" ||
    $page_name == "trial_T2_S1_D1" || $page_name == "trial_T2_S1_D2" || $page_name == "trial_T2_S1_D3" ||
    $page_name == "trial_T2_S2_D1" || $page_name == "trial_T2_S2_D2" || $page_name == "trial_T2_S2_D3" ||
    $page_name == "trial_T2_S3_D1" || $page_name == "trial_T2_S3_D2" || $page_name == "trial_T2_S3_D3" ||
    $page_name == "trial_T3_S1_D1" || $page_name == "trial_T3_S1_D2" || $page_name == "trial_T3_S1_D3" ||
    $page_name == "trial_T3_S2_D1" || $page_name == "trial_T3_S2_D2" || $page_name == "trial_T3_S2_D3" ||
    $page_name == "trial_T3_S3_D1" || $page_name == "trial_T3_S3_D2" || $page_name == "trial_T3_S3_D3" 
    ){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id']) 
            && isset($_POST['experiment_sequence']) 
            && isset($_POST['experiment_order'])
            && isset($_POST['task'])
            && isset($_POST['visualization_size'])
            && isset($_POST['trial_order'])
            && isset($_POST['image_file_order'])
            && isset($_POST['answering_time'])
            && isset($_POST['answer'])
            && isset($_POST['image_file_name'])
            ){
                    $participant_id                   = json_decode($_POST['participant_id'], true);
                    $system_generated_id              = json_decode($_POST['system_generated_id'], true);
                    $experiment_sequence              = json_decode($_POST['experiment_sequence'], true);
                    $experiment_order                 = json_decode($_POST['experiment_order'], true);
                    $is_main_trial                    = json_decode($_POST['is_main_trial'], true);
                    $task                             = json_decode($_POST['task'], true);
                    $visualization_size               = json_decode($_POST['visualization_size'], true);
                    $trial_order                      = json_decode($_POST['trial_order'], true);
                    $image_file_order                 = json_decode($_POST['image_file_order'], true);
                    $answering_time                   = json_decode($_POST['answering_time'], true);
                    $answer                           = json_decode($_POST['answer'], true);
                    $image_file_name                  = json_decode($_POST['image_file_name'], true);     
            }
        //    echo '<script>console.log(
        //    "page_name=" '.$page_name.',
        //    "participant_id=" '.$participant_id.',
        //    "system_generated_id=" '.$system_generated_id.',
        //    "experiment_sequence=" '.$experiment_sequence .',
        //    "experiment_order=" '.$experiment_order.',
        //    "is_main_trial=" '.$is_main_trial.',
        //    "task=" '.$task.',
        //    "visualization_size=" '.$visualization_size.',
        //    "trial_order=" '.$trial_order.',
        //    "image_file_order=" '.$image_file_order.',
        //    "answering_time=" '.$answering_time.',
        //    "answer=" '.$answer.',
        //    "image_file_name=" '.$image_file_name.',)</script>';   

    } //trial_T1_S1_D1 end
    
    if($system_generated_id !="" &&  $participant_id !="" &&  $experiment_order !="" && $experiment_sequence !="")
    {
        $response = array();
        $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_trials_". $experiment_order ."_seq_". $experiment_sequence . ".csv";
        // $filename = "../../results/" . $participant_id .'.csv';
        $exists = file_exists($filename);
        if (!$handle = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            $response['status'] = 'error';
            $response['message'] = 'Cannot open the csv file';
            exit;
        }
        
        $headers = "participant_id, system_generated_id, experiment_sequence, experiment_order, is_main_trial, task, visualization_size, trial_order, image_file_order, answering_time, answer, image_file_name, timestamp, page_name";
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
        $trial_length = count($visualization_size);    
        for($i=0; $i < $trial_length; $i++){
            $form_data.=PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $experiment_order, $is_main_trial, $task[$i], $visualization_size[$i], $trial_order[$i], $image_file_order[$i], $answering_time[$i], $answer[$i], $image_file_name[$i], $timestamp, $page_name";
        }
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
    

} //if isset end

?>