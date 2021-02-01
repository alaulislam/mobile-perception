<?php 
	// log start
	if(isset($_POST['target_log'])){
		// $page_name   = json_decode($_POST['page_name'], true);
        $target_log   = json_decode($_POST['target_log'], true);
        if($target_log === "finish"){
            if(
                isset($_POST['participant_id'])
				&& isset($_POST['system_generated_id'])
				&& isset($_POST['experiment_sequence'])
                && isset($_POST['experiment_duration'])
                && isset($_POST['browser_name'])
                && isset($_POST['browser_version'])
                && isset($_POST['operating_system'])
                ){
                        $participant_id                                 = json_decode($_POST['participant_id'], true);
						$system_generated_id                            = json_decode($_POST['system_generated_id'], true);
						$experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                        $experiment_duration                            = json_decode($_POST['experiment_duration'], true);
                        $browser_name                                   = json_decode($_POST['browser_name'], true);
                        $browser_version                                = json_decode($_POST['browser_version'], true);
                        $operating_system                               = json_decode($_POST['operating_system'], true);
                }
                // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
                $response = array();
                $filename = "../../results/individual/$experiment_sequence/". $system_generated_id ."_". $participant_id ."_log.csv";
                $exists = file_exists($filename);
                if (!$handle = fopen($filename, 'a')) {
                    echo "Cannot open file ($filename)";
                    $response['status'] = 'error';
                    $response['message'] = 'Cannot open the csv file';
                    exit;
                }
                
                $headers = "participant_id, system_generated_id, experiment_browser, experiment_browser_version, experiment_os, timestamp, experiment_duration";
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
        
                $form_data = PHP_EOL."$participant_id, $system_generated_id, $browser_name, $browser_version, $operating_system, $timestamp, $experiment_duration";
                if (fwrite($handle, $form_data) === FALSE) {
                echo "Cannot write the participants study data to file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot write the participants study data to csv file';
                exit;
                }
        
                $response['status'] = 'success';
                $response['message'] = 'Log saved successfully';
                $response['data'] =  $form_data;
        
                fclose($handle);
                echo json_encode($response);
        }
	}//target_log finish

?>
