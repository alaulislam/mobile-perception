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
    "page"		=> "pages/tutorial/welcome.php",
    "disabled"	=> false
  );
  $IMPORTANT_PAGE = array(
    "id"		=> "important",
    "next"		=> "consent",
    "button" 	=> "Next",
    "page"		=> "pages/tutorial/important.php",
    "disabled"	=> false
  );

  $CONSENT_PAGE = array(
    "id"		=> "consent",
    "next"		=> "pre_questionnaire",
    "button" 	=> "I agree. Start the experiment.",
    "page"		=> "pages/tutorial/consent.php",
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
    "next"		=> "task_explanation_page_$task[0]",
    "button" 	=> "Next",
    "page"		=> "pages/tutorial/basics_training.php",
    "disabled"	=> false
  );

  $TASK_EXPLANATION_PAGE = array(
    "id"  => "task_explanation_page_$task[0]",
    "next" => "intermittent_message_page",
    "button" => "Next",
    "page"  => "pages/instructions/prac-$task[0].php",
    "disabled"	=> false
  );

  $INTERMITTENT_MESSAGE_PAGE = array(
    "id"		=> "intermittent_message_page",
    "next"		=> "instruction_prac_$task[0]_$stimuli[0]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/intermittent_message.php",
    "disabled"	=> false
  );

  $PAGE_TEST = array(
    "id"		=> "test-A-B-C",
    "next"		=> "",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/test2.php",
    // "page"		=> "pages/questions/confidence_survey-1.php",
    // "page"		=> "pages/training/prac-T3-S3-D3.php",
    // "page"		=> "pages/questions/post_questionnaire.php",
    // "page"		=> "pages/tutorial/thank_you.php",
    "disabled"	=> false
  );

  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[0]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[0]",
    "next"		=> "practice_$task[0]_$stimuli[0]_$data_img[0]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/prac-inst-$task[0]-$stimuli[0].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[0]_$data_img[0]"} = array(
    "id"  => "practice_$task[0]_$stimuli[0]_$data_img[0]",
    "next" => "instructiion_trial_one",
    "button" => "Next",
    "page"  => "pages/training/prac-$task[0]-$stimuli[0]-$data_img[0].php",
    // "page"  => "pages/training/prac-T1-S1-D1.php",
    "disabled"	=> false
  );

    $INSTRUCTION_TRIAL_1 = array(
    "id"		=> "instructiion_trial_one",
    "next"		=> "trial_$task[0]_$stimuli[0]_$data_img[0]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/trial-instructions.php",
    "disabled"	=> false
    );


  ${"TRIAL_TASK_$task[0]_$stimuli[0]_$data_img[0]"} = array(
    "id"  => "trial_$task[0]_$stimuli[0]_$data_img[0]",
    // "next" => "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "next" => "confidence_survey_1",
    "button" => "Next",
    "page"  => "pages/trials/trial-$task[0]-$stimuli[0]-$data_img[0].php",
    "disabled"	=> false
  );

  $CONFIDENCE_SURVEY_1 = array(
    "id"		=> "confidence_survey_1",
    "next"		=> "instruction_prac_$task[0]_$stimuli[1]",
    "button" 	=> "Next",
    "page"		=> "pages/questions/confidence_survey-1.php",
    "disabled"	=> false
  );

  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[1]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[1]",
    "next"		=> "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/prac-inst-$task[0]-$stimuli[1].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[1]_$data_img[1]"} = array(
    "id"  => "practice_$task[0]_$stimuli[1]_$data_img[1]",
    "next" => "instructiion_trial_two",
    "button" => "Next",
    "page"  => "pages/training/prac-$task[0]-$stimuli[1]-$data_img[1].php",
    "disabled"	=> false
  );

  $INSTRUCTION_TRIAL_2 = array(
    "id"		=> "instructiion_trial_two",
    "next"		=> "trial_$task[0]_$stimuli[1]_$data_img[1]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/trial-instructions.php",
    "disabled"	=> false
    );

  ${"TRIAL_TASK_$task[0]_$stimuli[1]_$data_img[1]"} = array(
    "id"  => "trial_$task[0]_$stimuli[1]_$data_img[1]",
    "next" => "confidence_survey_2",
    "button" => "Next",
    "page"  => "pages/trials/trial-$task[0]-$stimuli[1]-$data_img[1].php",
    "disabled"	=> false
  );

  $CONFIDENCE_SURVEY_2 = array(
    "id"		=> "confidence_survey_2",
    "next"		=> "instruction_prac_$task[0]_$stimuli[2]",
    "button" 	=> "Next",
    "page"		=> "pages/questions/confidence_survey-2.php",
    "disabled"	=> false
  );

  ${"INSTRUCTION_PRAC_$task[0]_$stimuli[2]"} = array(
    "id"		=> "instruction_prac_$task[0]_$stimuli[2]",
    "next"		=> "practice_$task[0]_$stimuli[2]_$data_img[2]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/prac-inst-$task[0]-$stimuli[2].php",
    "disabled"	=> false
  );

  ${"PRACTICE_TASK_$task[0]_$stimuli[2]_$data_img[2]"} = array(
    "id"  => "practice_$task[0]_$stimuli[2]_$data_img[2]",
    "next" => "instructiion_trial_three",
    "button" => "Next",
    "page"  => "pages/training/prac-$task[0]-$stimuli[2]-$data_img[2].php",
    "disabled"	=> false
  );

  $INSTRUCTION_TRIAL_3 = array(
    "id"		=> "instructiion_trial_three",
    "next"		=> "trial_$task[0]_$stimuli[2]_$data_img[2]",
    "button" 	=> "Next",
    "page"		=> "pages/instructions/trial-instructions.php",
    "disabled"	=> false
    );

  ${"TRIAL_TASK_$task[0]_$stimuli[2]_$data_img[2]"} = array(
    "id"  => "trial_$task[0]_$stimuli[2]_$data_img[2]",
    "next" => "confidence_survey_3",
    "button" => "Next",
    "page"  => "pages/trials/trial-$task[0]-$stimuli[2]-$data_img[2].php",
    "disabled"	=> false
  );

  $CONFIDENCE_SURVEY_3 = array(
    "id"		=> "confidence_survey_3",
    "next"		=> "post_questionnaire",
    "button" 	=> "Next",
    "page"		=> "pages/questions/confidence_survey-3.php",
    "disabled"	=> false
  );

  $POST_QUESTIONNAIRE_PAGE = array(
    "id"		=> "post_questionnaire",
    "next"		=> "feedback",
    "button" 	=> "Next",
    "page"		=> "pages/questions/post_questionnaire.php",
    "disabled"	=> false
  );


  // $VIS_PAGE = array(
  //   "id"		=> "vis",
  //   "next"		=> "comprehension",
  //   "button" 	=> "Confirm",
  //   "page"		=> "pages/visualization/vis_page.php",
  //   "disabled"	=> false
  // );

  // $COMPREHENSION_PAGE = array(
  //   "id"		=> "comprehension",
  //   "next"		=> "attention",
  //   "button" 	=> "Confirm",
  //   "page"		=> "pages/trials/comprehension.php",
  //   "disabled"	=> true
  // );


  // $ATTENTION_PAGE = array(
  //   "id"		=> "attention",
  //   "next"		=> "end",
  //   "button"  => "Finish Study", // needs to be written exactly like that to trigger the finished event
  //   "page"		=> "pages/trials/attention.php",
  //   "disabled"	=> true
  // );

  $ATTENTION_FAILED_PAGE_T1S1 = array(
    "id"		=> "excluded",
    "next"		=> "non",
    "button" 	=> " ",
    // "page"		=> "pages/trials/attention-failed-T1S1.php",
    "page"		=> "pages/ajax/attention_check_failed.php",
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
    "page"		=> "pages/tutorial/end.php",
    "disabled"	=> true
  );


  $PAGE_ORDER = array(
          // $WELCOME_PAGE, 
          // $IMPORTANT_PAGE,
          // $CONSENT_PAGE,
          // $PRE_QUESTIONNAIRE_PAGE,
           $BASICS_SLEEP_VIZ_PAGE,
          // $TASK_EXPLANATION_PAGE,
          // $INTERMITTENT_MESSAGE_PAGE,

           //$PAGE_TEST,

          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[0]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[0]_$data_img[0]"},
          // $INSTRUCTION_TRIAL_1, 
          // ${"TRIAL_TASK_$task[0]_$stimuli[0]_$data_img[0]"},
          // $CONFIDENCE_SURVEY_1,

          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[1]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[1]_$data_img[1]"},
          // $INSTRUCTION_TRIAL_2, 
          // ${"TRIAL_TASK_$task[0]_$stimuli[1]_$data_img[1]"},
          // $CONFIDENCE_SURVEY_2,

          // ${"INSTRUCTION_PRAC_$task[0]_$stimuli[2]"},
          // ${"PRACTICE_TASK_$task[0]_$stimuli[2]_$data_img[2]"},
          // $INSTRUCTION_TRIAL_3,
          // ${"TRIAL_TASK_$task[0]_$stimuli[2]_$data_img[2]"},
          // $CONFIDENCE_SURVEY_3, 
        
          // $POST_QUESTIONNAIRE_PAGE,
          // $FEEDBACK_PAGE,
          // $END_PAGE

          // $VIS_PAGE
          // $COMPREHENSION_PAGE,
          // $ATTENTION_PAGE,
          $ATTENTION_FAILED_PAGE_T1S1,
          // $END_PAGE
        );
  
 ?>
