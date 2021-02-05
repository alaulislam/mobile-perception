<?php 
	// log start
	if(isset($_POST['target_message'])){
		// $page_name   = json_decode($_POST['page_name'], true);
        $target_message   = json_decode($_POST['target_message'], true);
        if($target_message === "sequence_set"){
            if(isset($_POST['experiment_sequence'])
                && isset($_POST['experiment_duration'])
                ){
						$experiment_sequence                            = json_decode($_POST['experiment_sequence'], true);
                        $experiment_duration                            = json_decode($_POST['experiment_duration'], true);
                }
                // echo '<script>console.log('.$participant_id.','.$system_generated_id.','. $experiment_sequence .','.$has_smartwatch.','.$has_fitness_band.','.$is_used_bar_chart_likert.')</script>';
                $response = array();
                $filename = "../../results/experiment_condition_done.csv";
                $exists = file_exists($filename);
                if (!$handle = fopen($filename, 'a')) {
                    echo "Cannot open file ($filename)";
                    $response['status'] = 'error';
                    $response['message'] = 'Cannot open the csv file';
                    exit;
                }
                
                $headers = "experiment_sequence,experiment_duration";
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
        
                $form_data = PHP_EOL."$experiment_sequence,$experiment_duration";
                if (fwrite($handle, $form_data) === FALSE) {
                echo "Cannot write the participants study data to file ($filename)";
                $response['status'] = 'error';
                $response['message'] = 'Cannot write the participants study data to csv file';
                exit;
                }
        
                $response['status'] = 'success';
                $response['message'] = 'Experiment sequence saved successfully';
                $response['data'] =  $form_data;
        
                fclose($handle);
                echo json_encode($response);
        }
	}//target_log finish

?>
