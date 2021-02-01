<?php
 
 if(isset($_POST['page_name']) ){
    $page_name   = json_decode($_POST['page_name'], true);
    //pre_questionnaire start
    if($page_name === "pre_questionnaire"){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id']) 
            && isset($_POST['experiment_sequence']) 
            && isset($_POST['has_smartwatch'])
            && isset($_POST['has_fitness_band'])
            && isset($_POST['is_used_bar_chart_likert'])
            ){
                  $participant_id                   = json_decode($_POST['participant_id'], true);
                  $system_generated_id              = json_decode($_POST['system_generated_id'], true);
                  $experiment_sequence              = json_decode($_POST['experiment_sequence'], true);
                  $has_smartwatch                   = json_decode($_POST['has_smartwatch'], true);
                  $has_fitness_band                 = json_decode($_POST['has_fitness_band'], true);
                  $is_used_bar_chart_likert         = json_decode($_POST['is_used_bar_chart_likert'], true);
            }
            // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
            // print_r( $participant_id, $experiment_sequence, $has_smartwatch, $has_fitness_band, $is_used_bar_chart_likert);
            $response = array();
            $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_" . $participant_id ."_". $page_name ."_seq_". $experiment_sequence . ".csv";
            $exists = file_exists($filename);
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot open the csv file';
                exit;
            }
            
            $headers = "participant_id, system_generated_id, experiment_sequence, has_smartwatch, has_fitness_band, is_used_bar_chart_likert, timestamp,  page_name";
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

            $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $has_smartwatch, $has_fitness_band, $is_used_bar_chart_likert, $timestamp, $page_name";

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
    } // pre_questionnaire end

     //post_questionnaire start
     if($page_name === "post_questionnaire"){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id'])
            && isset($_POST['experiment_sequence'])  
            && isset($_POST['viz_preference_for_weekly_sleep_data']) 
            && isset($_POST['orientation_preference_for_wristband_display'])
            && isset($_POST['is_checked_sleep_duration'])
            && isset($_POST['is_checked_sleep_phase'])
            && isset($_POST['is_checked_sleep_quality'])
            && isset($_POST['is_checked_sleep_schedule'])
            && isset($_POST['attention_check_question_one'])
            && isset($_POST['attention_check_question_two'])
            ){
                  $participant_id                                 = json_decode($_POST['participant_id'], true);
                  $system_generated_id                            = json_decode($_POST['system_generated_id'], true);
                  $experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                  $viz_preference_for_weekly_sleep_data           = json_decode($_POST['viz_preference_for_weekly_sleep_data'], true);
                  $orientation_preference_for_wristband_display   = json_decode($_POST['orientation_preference_for_wristband_display'], true);
                  $is_checked_sleep_duration                      = json_decode($_POST['is_checked_sleep_duration'], true);
                  $is_checked_sleep_phase                         = json_decode($_POST['is_checked_sleep_phase'], true);
                  $is_checked_sleep_quality                       = json_decode($_POST['is_checked_sleep_quality'], true);
                  $is_checked_sleep_schedule                      = json_decode($_POST['is_checked_sleep_schedule'], true);
                  $attention_check_question_one                   = json_decode($_POST['attention_check_question_one'], true);
                  $attention_check_question_two                   = json_decode($_POST['attention_check_question_two'], true);
            }
            // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
            // print_r( $participant_id, $experiment_sequence, $has_smartwatch, $has_fitness_band, $is_used_bar_chart_likert);
            $response = array();
            $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_". $page_name ."_seq_". $experiment_sequence . ".csv";
            $exists = file_exists($filename);
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot open the csv file';
                exit;
            }
            
            $headers = "participant_id, system_generated_id, experiment_sequence, viz_preference_for_weekly_sleep_data, orientation_preference_for_wristband_display, is_checked_sleep_duration, is_checked_sleep_phase, is_checked_sleep_quality, is_checked_sleep_schedule, attention_check_question_one, attention_check_question_two, timestamp, page_name";
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

            $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $viz_preference_for_weekly_sleep_data, $orientation_preference_for_wristband_display, $is_checked_sleep_duration, $is_checked_sleep_phase, $is_checked_sleep_quality, $is_checked_sleep_schedule, $attention_check_question_one, $attention_check_question_two, $timestamp, $page_name";
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
    } // post_questionnaire end

     //first_set_confidence_survey start
     if($page_name === "confidence_survey_1"){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id'])
            && isset($_POST['experiment_sequence'])
            && isset($_POST['experiment_order'])  
            && isset($_POST['first_set_confidence_survey']) 
            ){
                  $participant_id                                 = json_decode($_POST['participant_id'], true);
                  $system_generated_id                            = json_decode($_POST['system_generated_id'], true);
                  $experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                  $experiment_order                               = json_decode($_POST['experiment_order'], true);
                  $first_set_confidence_survey                    = json_decode($_POST['first_set_confidence_survey'], true);
            }
            // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
            // print_r( $participant_id, $experiment_sequence, $has_smartwatch, $has_fitness_band, $is_used_bar_chart_likert);
            $response = array();
            $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_confidence_". $experiment_order ."_seq_". $experiment_sequence ."_CS_1.csv";
            // $filename = "../../results/individual/". $system_generated_id ."_". $participant_id ."_". $page_name ."_seq_". $experiment_sequence . ".csv";
            $exists = file_exists($filename);
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot open the csv file';
                exit;
            }
            
            $headers = "participant_id, system_generated_id, experiment_sequence, experiment_order, first_set_confidence_survey_likert, timestamp, page_name";
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

            $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $experiment_order, $first_set_confidence_survey, $timestamp, $page_name";
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
    } // first_set_confidence_survey end

    //second_set_confidence_survey start
    if($page_name === "confidence_survey_2"){
    if(
        isset($_POST['participant_id'])
        && isset($_POST['system_generated_id'])
        && isset($_POST['experiment_sequence'])
        && isset($_POST['experiment_order'])  
        && isset($_POST['second_set_confidence_survey']) 
        ){
                $participant_id                                 = json_decode($_POST['participant_id'], true);
                $system_generated_id                            = json_decode($_POST['system_generated_id'], true);
                $experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                $experiment_order                               = json_decode($_POST['experiment_order'], true);
                $second_set_confidence_survey                   = json_decode($_POST['second_set_confidence_survey'], true);
        }
        // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
        // print_r( $participant_id, $experiment_sequence, $has_smartwatch, $has_fitness_band, $is_used_bar_chart_likert);
        $response = array();
        $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_confidence_". $experiment_order ."_seq_". $experiment_sequence ."_CS_2.csv";
        $exists = file_exists($filename);
        if (!$handle = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            $response['status'] = 'error';
            $response['message'] = 'Cannot open the csv file';
            exit;
        }
        
        $headers = "participant_id, system_generated_id, experiment_sequence, experiment_order, second_set_confidence_survey_likert, timestamp, page_name";
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

        $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $experiment_order, $second_set_confidence_survey, $timestamp, $page_name";
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
    } // second_set_confidence_survey end
    
    //last_set_confidence_survey start
    if($page_name === "confidence_survey_3"){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id'])
            && isset($_POST['experiment_sequence'])
            && isset($_POST['experiment_order'])  
            && isset($_POST['last_set_confidence_survey']) 
            ){
                    $participant_id                                 = json_decode($_POST['participant_id'], true);
                    $system_generated_id                            = json_decode($_POST['system_generated_id'], true);
                    $experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                    $experiment_order                               = json_decode($_POST['experiment_order'], true);
                    $last_set_confidence_survey                     = json_decode($_POST['last_set_confidence_survey'], true);
            }
            // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
            $response = array();
            $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_confidence_". $experiment_order ."_seq_". $experiment_sequence ."_CS_3.csv";
            $exists = file_exists($filename);
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot open the csv file';
                exit;
            }
            
            $headers = "participant_id, system_generated_id, experiment_sequence, experiment_order, last_set_confidence_survey_likert, timestamp, page_name";
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
    
            $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $experiment_order, $last_set_confidence_survey, $timestamp, $page_name";
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
    } // last_set_confidence_survey end
    
    //feedback start
    if($page_name === "feedback"){
        if(
            isset($_POST['participant_id'])
            && isset($_POST['system_generated_id'])
            && isset($_POST['experiment_sequence'])
            && isset($_POST['feedbaack_comments']) 
            ){
                    $participant_id                                 = json_decode($_POST['participant_id'], true);
                    $system_generated_id                            = json_decode($_POST['system_generated_id'], true);
                    $experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                    $feedbaack_comments                             = json_decode($_POST['feedbaack_comments'], true);
            }
            // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
            $response = array();
            $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_". $page_name ."_seq_". $experiment_sequence . ".csv";
            $exists = file_exists($filename);
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot open the csv file';
                exit;
            }
            
            $headers = "participant_id, system_generated_id, experiment_sequence, feedbaack_comments, timestamp, page_name";
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
    
            $form_data = PHP_EOL."$participant_id, $system_generated_id, $experiment_sequence, $feedbaack_comments, $timestamp, $page_name";
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
    } // feedback end

 }
?>