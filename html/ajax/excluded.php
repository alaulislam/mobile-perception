<?php

	$data = json_decode(file_get_contents('php://input'), true);

	$excluded_filename = "../../results/excluded.csv";
	$exists = file_exists($excluded_filename);

	$excluded_file = fopen($excluded_filename, "a+");

	if (!$exists){
	fwrite($excluded_file, "timestamp,participant_id,system_generated_id,study_id,session_id,browser_name,browser_version,os,reloaded");
	}

	fwrite($excluded_file,
		PHP_EOL .
		date(DateTime::ISO8601) . ',' .
		$data['participant_id'] . ',' .
		$data['system_generated_id']      . ',' .
		$data['study_id']       . ',' .
		$data['session_id']     . ',' .
		$data['browser_name']   . ',' .
		$data["browser_version"]. ',' .
		$data["os"],
		($data["reloaded"] ? "1" : "0") // tests whether the user reloaded or didnt pass the att. check
	);

	fclose($excluded_file);
	exit;

?>
