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

  // Pages definition
  $WELCOME_PAGE = array(
    "id"		=> "welcome",
    "next"		=> "important",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/welcome.php",
    "disabled"	=> false
  );
  $IMPORTANT_PAGE = array(
    "id"		=> "important",
    "next"		=> "consent",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/important.php",
    "disabled"	=> false
  );

  $CONSENT_PAGE = array(
    "id"		=> "consent",
    "next"		=> "pre_questionnaire",
    "button" 	=> "I agree. Start the experiment.",
    "page"		=> "pages/instructions/consent.php",
    "disabled"	=> false
  );
  
  $PRE_QUESTIONNAIRE_PAGE = array(
    "id"		=> "pre_questionnaire",
    "next"		=> "basics_training",
    "button" 	=> "Next",
    "page"		=> "pages/questions/pre_questionnaire.php",
    "disabled"	=> false
  );

  $BASICS_SLEEP_VIZ_PAGE = array(
    "id"		=> "basics_training",
    "next"		=> "instruction_prac_$task[0]_$stimuli[0]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/basics_training.php",
    "disabled"	=> false
  );

  $TASK_T1_TEST = array(
    "id"		=> "task_T1_training",
    "next"		=> "",
    "button" 	=> "Next",
    "page"		=> "pages/training/prac-T2.php",
    "disabled"	=> false
  );


  
  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[0]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[0]",
    "next"		=> "practice_$task[0]_$stimuli[0]_$data_img[0]",
    "button" 	=> "Next",
    "page"		=> "pages/training/prac-inst-$task[0]-$stimuli[0].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[0]_$data_img[0]"} = array(
    "id"  => "practice_$task[0]_$stimuli[0]_$data_img[0]",
    "next" => "trial_$task[0]_$stimuli[0]_$data_img[0]",
    "button" => "Next",
    "page"  => "pages/experiments/prac-$task[0]-$stimuli[0]-$data_img[0].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]_$stimuli[0]_$data_img[0]"} = array(
    "id"  => "trial_$task[0]_$stimuli[0]_$data_img[0]",
    // "next" => "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "next" => "instruction_prac_$task[0]_$stimuli[1]",
    "button" => "Next",
    "page"  => "pages/experiments/trial-$task[0]-$stimuli[0]-$data_img[0].php",
    "disabled"	=> false
  );

  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[1]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[1]",
    "next"		=> "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "button" 	=> "Next",
    "page"		=> "pages/training/prac-inst-$task[0]-$stimuli[1].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[1]_$data_img[1]"} = array(
    "id"  => "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "next" => "trial_$task[0]_$stimuli[1]_$data_img[1]",
    "button" => "Next",
    "page"  => "pages/experiments/prac-$task[0]-$stimuli[1]-$data_img[1].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]_$stimuli[1]_$data_img[1]"} = array(
    "id"  => "trial_$task[0]_$stimuli[1]_$data_img[1]",
    // "next" => "practice_$task[0]_$stimuli[2]_$data_img[2]",
    "next" => "instruction_prac_$task[0]_$stimuli[2]",
    "button" => "Next",
    "page"  => "pages/experiments/trial-$task[0]-$stimuli[1]-$data_img[1].php",
    "disabled"	=> false
  );

  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[2]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[2]",
    "next"		=> "practice_$task[0]_$stimuli[2]_$data_img[2]",
    "button" 	=> "Next",
    "page"		=> "pages/training/prac-inst-$task[0]-$stimuli[2].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[2]_$data_img[2]"} = array(
    "id"  => "practice_$task[0]_$stimuli[2]_$data_img[2]",
    "next" => "trial_$task[0]_$stimuli[2]_$data_img[2]",
    "button" => "Next",
    "page"  => "pages/experiments/prac-$task[0]-$stimuli[2]-$data_img[2].php",
    "disabled"	=> false
  );

  ${"TRIAL_TASK_$task[0]_$stimuli[2]_$data_img[2]"} = array(
    "id"  => "trial_$task[0]_$stimuli[2]_$data_img[2]",
    "next" => "vis",
    "button" => "Next",
    "page"  => "pages/experiments/trial-$task[0]-$stimuli[2]-$data_img[2].php",
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
    "page"		=> "pages/experiments/comprehension.php",
    "disabled"	=> true
  );


  $ATTENTION_PAGE = array(
    "id"		=> "attention",
    "next"		=> "end",
    "button"  => "Finish Study", // needs to be written exactly like that to trigger the finished event
    "page"		=> "pages/experiments/attention.php",
    "disabled"	=> true
  );

  $ATTENTION_FAILED_PAGE_T1S1 = array(
    "id"		=> "excluded",
    "next"		=> "non",
    "button" 	=> " ",
    "page"		=> "pages/experiments/attention-failed-T1S1.php",
    "disabled"	=> true
  );

  $FEEDBACK_PAGE = array(
    "id"    => "feedback",
    "next"    => "end",
    "button"  => "Finish Study", // needs to be written exactly like that to trigger the finished event
    "page"    => "pages/experiments/feedback.php",
    "disabled"  => false
  );

  $END_PAGE = array(
    "id"		=> "end",
    "next"		=> "none",
    "button" 	=> " ",
    "page"		=> "pages/instructions/end.php",
    "disabled"	=> true
  );


  $PAGE_ORDER = array(
          //  $WELCOME_PAGE, 
          //  $IMPORTANT_PAGE,
          //  $CONSENT_PAGE,
          //  $PRE_QUESTIONNAIRE_PAGE,
          //  $BASICS_SLEEP_VIZ_PAGE,

          $TASK_T1_TEST

          // $DESCRIPTION_PAGE,
          //  $TRIAL_QUESTIONS,
          //  $EXPERIMENT_SETUP,
          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[0]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[0]_$data_img[0]"}, 
          // ${"TRIAL_TASK_$task[0]_$stimuli[0]_$data_img[0]"},

          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[1]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[1]_$data_img[1]"}, 
          // ${"TRIAL_TASK_$task[0]_$stimuli[1]_$data_img[1]"},

          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[2]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[2]_$data_img[2]"},
          // ${"TRIAL_TASK_$task[0]_$stimuli[2]_$data_img[2]"},
        
          
          // $VIS_PAGE
          // $COMPREHENSION_PAGE,
          // $ATTENTION_PAGE,
          //$ATTENTION_FAILED_PAGE_T1S1,
          // $END_PAGE
        );
  
 ?>
