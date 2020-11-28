<?php
/*  This file contains the behavior description for all pages in the experiment. 
    To define an experiment flow, create an array variable as below for each page and then indicate the order additionally in the variable $PAGE_ORDER defined at the bottom of the file.
    The meaning of the array elements is as following:
      - id: the div id used to find the page (must be unique)
      - next: the page to be shown after the one being currently defined 
      - button: the text written in the next button at the bottom of the page
      - page: the relative url to the page being currently defined
      - disabled: boolean indicating whether the button should be disabled when the page is shown
 */
// $task = array("T1", "T2", "T3"); 
// $stimuli[0] = array("S1", "S2", "S3"); 
// $PRACTICE_TASK_T1 = array(); 
// $PRACTICE_TASK_T2 = array(); 
// $PRACTICE_TASK_T3 = array();
// $TRIAL_TASK_S1 = array(); 
// $TRIAL_TASK_S2 = array(); 
// $TRIAL_TASK_S3 = array();

  // Pages definition
  $IMPORTANT_PAGE = array(
    "id"		=> "important",
    "next"		=> "consent",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/important.php",
    "disabled"	=> false
  );

  $CONSENT_PAGE = array(
    "id"		=> "consent",
    "next"		=> "description",
    "button" 	=> "I agree. Start the experiment.",
    "page"		=> "pages/instructions/consent.php",
    "disabled"	=> false
  );

  $DESCRIPTION_PAGE = array(
    "id"		=> "description",
    "next"		=> "trial",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/description.php",
    "disabled"	=> false
  );
  
  // $EXPERIMENT_SETUP = array(
  //     "id"  => "experiment",
  //     "next" => "practice_task_p_1",
  //     "button" => "Next",
  //     "page"  => "pages/instructions/experiment-start.php",
  //     "disabled"	=> false
  //   );

  ${"PRACTICE_TASK_$task[0]_$stimuli[0]"} = array(
    "id"  => "practice_$task[0]_$stimuli[0]",
    "next" => "trial_$task[0]-$stimuli[0]",
    "button" => "Next",
    "page"  => "pages/questions/prac-$task[0]-$stimuli[0].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]-$stimuli[0]"} = array(
    "id"  => "trial_$task[0]-$stimuli[0]",
    "next" => "practice_$task[0]_$stimuli[1]",
    "button" => "Next",
    "page"  => "pages/questions/trial-$task[0]-$stimuli[0].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[1]"} = array(
    "id"  => "practice_$task[0]_$stimuli[1]",
    "next" => "trial_$task[0]-$stimuli[1]",
    "button" => "Next",
    "page"  => "pages/questions/prac-$task[0]-$stimuli[1].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]-$stimuli[1]"} = array(
    "id"  => "trial_$task[0]-$stimuli[1]",
    "next" => "practice_$task[0]_$stimuli[2]",
    "button" => "Next",
    "page"  => "pages/questions/trial-$task[0]-$stimuli[1].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[2]"} = array(
    "id"  => "practice_$task[0]_$stimuli[2]",
    "next" => "trial_$task[0]-$stimuli[2]",
    "button" => "Next",
    "page"  => "pages/questions/prac-$task[0]-$stimuli[2].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]-$stimuli[2]"} = array(
    "id"  => "trial_$task[0]-$stimuli[2]",
    "next" => "vis",
    "button" => "Next",
    "page"  => "pages/questions/trial-$task[0]-$stimuli[2].php",
    "disabled"	=> false
  );

  $VIS_PAGE = array(
    "id"		=> "vis",
    "next"		=> "comprehension",
    "button" 	=> "Confirm",
    "page"		=> "pages/visualization/vis_page.php",
    "disabled"	=> false
  );

  $COMPREHENSION_PAGE = array(
    "id"		=> "comprehension",
    "next"		=> "attention",
    "button" 	=> "Confirm",
    "page"		=> "pages/questions/comprehension.php",
    "disabled"	=> true
  );


  $ATTENTION_PAGE = array(
    "id"		=> "attention",
    "next"		=> "end",
    "button"  => "Finish Study", // needs to be written exactly like that to trigger the finished event
    "page"		=> "pages/questions/attention.php",
    "disabled"	=> true
  );

  $ATTENTION_FAILED_PAGE = array(
    "id"		=> "excluded",
    "next"		=> "non",
    "button" 	=> " ",
    "page"		=> "pages/questions/attention-failed.php",
    "disabled"	=> true
  );

  $FEEDBACK_PAGE = array(
    "id"    => "feedback",
    "next"    => "end",
    "button"  => "Finish Study", // needs to be written exactly like that to trigger the finished event
    "page"    => "pages/questions/feedback.php",
    "disabled"  => false
  );

  $END_PAGE = array(
    "id"		=> "end",
    "next"		=> "none",
    "button" 	=> " ",
    "page"		=> "pages/instructions/end.php",
    "disabled"	=> true
  );

  // This array defines the order of the pages. 
  // You can temporarily modify this order for debugging. Just move the page you want first at the first position.


  // $dynamic_pages = array();

  // for ($dp_i= 0; $dp_i< 3; $dp_i++){

  //   // $dynamic_pages[] =  "\$PRACTICE_TASK_$task[$i]";
  //   // array_push($dynamic_pages, "\$TRIAL_TASK_$stimuli[0][$i]");
  //   $add_one = $dp_i+1;

  //   ${"PRACTICE_TASK_$task[$dp_i]"} = array(
  //     "id"  => "practice_task_p_$dp_i",
  //     "next" => "trial_task_t_$dp_i",
  //     "button" => "Next",
  //     "page"  => "pages/questions/task-$task[$dp_i].php",
  //     "disabled"	=> true
  //   );

  //   ${"TRIAL_TASK_$stimuli[0][$dp_i]"} = array(
  //     "id"  => "trial_task_t_$dp_i",
  //     "next" => "practice_task_p_$add_one",
  //     "button" => "Next",
  //     "page"  => "pages/questions/trial-$stimuli[0][$dp_i].php",
  //     "disabled"	=> true
  //   );

  // }

  // for ($dp_i= 0; $dp_i< 3; $dp_i++){
  //   $dynamic_pages[] =  "\$PRACTICE_TASK_$task[$dp_i]";
  //   array_push($dynamic_pages, "\$TRIAL_TASK_$stimuli[0][$dp_i]");
  // }

  // var_dump($PRACTICE_TASK_T2);
  // $str = implode(", ", $dynamic_pages);
  // $commaList = json_encode($dynamic_pages);
  // $commaList = implode(', ', $dynamic_pages);
  //  var_dump($str);
  // echo $str;

  $PAGE_ORDER = array(
          // $IMPORTANT_PAGE,
          // $CONSENT_PAGE,
          // $DESCRIPTION_PAGE,
          //  $TRIAL_QUESTIONS,
          //  $EXPERIMENT_SETUP,
          ${"PRACTICE_TASK_$task[0]_$stimuli[0]"}, 
          ${"TRIAL_TASK_$task[0]-$stimuli[0]"},
          ${"PRACTICE_TASK_$task[0]_$stimuli[1]"}, 
          ${"TRIAL_TASK_$task[0]-$stimuli[1]"},
          ${"PRACTICE_TASK_$task[0]_$stimuli[2]"}, 
          ${"TRIAL_TASK_$task[0]-$stimuli[2]"},
        
          
          // $VIS_PAGE
          // $COMPREHENSION_PAGE,
          // $ATTENTION_PAGE,
          // $ATTENTION_FAILED_PAGE,
          // $END_PAGE
        );
  
 ?>
