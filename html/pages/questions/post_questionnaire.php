<style>
   .post_questionnaire_page_slide:not(:first-child) {
   display: none;
   }
   .controls {
   width: 200px;
   }
   .pre {
   float: left;
   }
   .post_questionnaire_page_understand_btn {
   float: right;
   }
   .img-container {
   text-align: center;
   }
   input[type=checkbox] {
   /* All browsers except webkit*/
   transform: scale(1.5);
   /* Webkit browsers*/
   -webkit-transform: scale(1.5);
   }
   input[type=radio] {
   /* All browsers except webkit*/
   transform: scale(1.5);
   /* Webkit browsers*/
   -webkit-transform: scale(1.5);
   }
</style>

<div class="row">
   <div class="col">
      <div class="container">
         <div class="mt-1 d-flex justify-content-center section-header">
            <h4>Post-questionnaire</h4>
         </div>
         <div id="post_questionnaire_page">
            <div class="visible post_questionnaire_page_slide">
               <div class="form-group">
                  <p><strong>For looking at your weekly sleep data, which of the three visualizations would you prefer?</strong></p>
                  <div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="post_questionnaire_question_one" id="post_question_option_square_size" value="square">
                        <img src="img/questions/post_square.png" style="width:40px !important; margin-left:6px;" alt="Square size">
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="post_questionnaire_question_one" id="post_question_option_wide_size" value="wide">
                        <img src="img/questions/post_wide.png" style="width:50px !important; margin-left:6px;" alt="Wide size">
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="post_questionnaire_question_one" id="post_question_option_tall_size" value="tall">
                        <img src="img/questions/post_tall.png" style="height:45px !important; margin-left:6px;" alt="Tall size">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <p><strong>Of the two wristband-sized displays (wide & tall), which orientation do you prefer?</strong></p>
                  <div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="post_questionnaire_question_two" id="post_question_option_orientation_wide" value="wide">
                        <img src="img/questions/post_wide.png" style="width:50px !important; margin-left:6px;" alt="Wide size">
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="post_questionnaire_question_two" id="post_question_option_orientation_tall" value="tall">
                        <img src="img/questions/post_tall.png" style="height:45px !important; margin-left:6px;" alt="Tall size">
                     </div>
                  </div>
               </div>
               <div class="mt-4">
                  <span class="text-muted" style="font-size:13px;">The next button will only be "clickable" if both questions are answered.</span>
               </div>
               <div class="row mt-2">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted post_questionnaire_page_counter_display mt-2" ></h5>
                     <button type="button" class="btn btn-primary post_questionnaire_page_understand_btn" id="first_page_post_questionnaire_page_understand_btn" value="xyz" style="width:80%">NEXT</button>
                  </div>
               </div>
            </div>
            <div class="post_questionnaire_page_slide">
               <p><strong>What would you like to learn about your own personal sleep?</strong></p>
               <form>
                  <label>
                  <input type="checkbox" value="1" id="is_checked_sleep_duration" value="option1">
                  <span style="margin-left:6px;">How long I slept</span>
                  </label>
                  <label>
                  <input type="checkbox" id="is_checked_sleep_phase" value="option2">
                  <span style="margin-left:6px;">My sleep phases (awake, REM, light sleep, etc.)</span>
                  </label>
                  <label>
                  <input type="checkbox" id="is_checked_sleep_quality" value="option3">
                  <span style="margin-left:6px;">How well I slept</span>
                  </label>
                  <label>
                  <input type="checkbox" id="is_checked_sleep_schedule" value="option3">
                  <span style="margin-left:6px;">How I slept related to sleep goals I set (hours, bedtime/wakeup time, etc.)</span>
                  </label>
                  <label>
                  <input type="checkbox" id="is_checked_not_interested" value="option3">
                  <span style="margin-left:6px;">I don't know/ I am not interested in the data</span>
                  </label>
               </form>
               <div class="mt-4">
                  <span class="text-muted" style="font-size:13px;"> The next button will only be "clickable" if the above question is answered.</span>
               </div>
               <div class="row mt-2">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted post_questionnaire_page_counter_display mt-2"></h5>
                     <button type="button" class="btn btn-primary post_questionnaire_page_understand_btn" id="second_page_post_questionnaire_page_understand_btn" style="width:80%">NEXT</button>
                  </div>
               </div>
            </div>
            <div class="post_questionnaire_page_slide">
               <p><strong>What was the task?</strong></p>
               <form>
                  <label>
                  <input type="radio" value="T1" name="attn_q_one" id="radio_attn_chk_task_one">
                  <span style="font-size:13px">On which day did you sleep longer, Saturday or Sunday?</span>
                  </label>
                  <label>
                  <input type="radio" value="T2" name="attn_q_one" id="radio_attn_chk_task_two">
                  <span style="font-size:13px">Did you go to bed later than planned (22:00) on 4 or more days this week?</span>
                  </label>
                  <label>
                  <input type="radio" value="T3" name="attn_q_one" id="radio_attn_chk_task_three">
                  <span style="font-size:13px">Did you sleep longer on average on the weekend days (Sat, Sun) compared to the
                  weekdays (Mon-Fri)?</span>
                  </label>
               </form>
               <div class="form-group">
                  <p><strong>What type of data did you see during the experiment?</strong></p>
                  <div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="rainfall" name="attn_q_two" id="radio_attn_chk_rainfall">
                        <label class="form-check-label" for="option1" style="margin-left:6px;">Rainfall data</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="sleep" name="attn_q_two" id="radio_attn_chk_sleep">
                        <label class="form-check-label" for="option2" style="margin-left:6px;">Sleep data</label>
                     </div>
                     <div class="form-check form-check-inline"  style="margin-top:3px">
                        <input type="radio" class="form-check-input" value="weather" name="attn_q_two" id="radio_attn_chk_weather">
                        <label class="form-check-label" for="option3" style="margin-left:6px;">Weather data</label>
                     </div>
                  </div>
               </div>
               <div>
                  <span class="text-muted" style="font-size:13px;"> The next button will only be "clickable" if both questions are answered.</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {

      // var task_name_test = "<?php echo $task[0] ?>" ;
      // alert(task_name_test);
      $("#btn_<?php echo $id;?>").prop('disabled', true);
      $("#btn_<?php echo $id;?>").hide();
      $("#first_page_post_questionnaire_page_understand_btn").prop('disabled', true);
      $("#second_page_post_questionnaire_page_understand_btn").prop('disabled', true);
       let count = 1;
       function updateDisplay(){
           $('.post_questionnaire_page_counter_display').text(count +"/3")
       };
   
       updateDisplay();
       

      $(".post_questionnaire_page_understand_btn").click(function() {
         //Show previous button
         // $('.pre').show();
         count++;
         updateDisplay();
         
            var current_div = $('#post_questionnaire_page .post_questionnaire_page_slide.visible').first();

         //Find the next element
         var next_div = current_div.next();

         //Change which div is showing
         current_div.removeClass("visible").hide();
         next_div.addClass("visible").show();
         
         //If there's no more elements, hide the NEXT button
         if (!next_div.next().length) {
               $(this).hide();
               $('.post_questionnaire_page_counter_display').hide();
               $('.post_questionnaire_page_understand_btn').hide();
               $("#btn_<?php echo $id;?>").show();
         }
      });

      $('#post_question_option_square_size, #post_question_option_wide_size, #post_question_option_tall_size').change(function () {
         if( 
            $('#post_question_option_square_size').is(":checked")||
            $('#post_question_option_wide_size').is(":checked") ||
            $('#post_question_option_tall_size').is(":checked")
         )
         {
            if( $('#post_question_option_orientation_wide').is(":checked") || $('#post_question_option_orientation_tall').is(":checked") )
            {
               $("#first_page_post_questionnaire_page_understand_btn").prop('disabled', false);
            }
         else
            {
               $("#first_page_post_questionnaire_page_understand_btn").prop('disabled', true);
            } 
         }
      });

      $('#post_question_option_orientation_wide, #post_question_option_orientation_tall').change(function () {
         if( 
            $('#post_question_option_orientation_wide').is(":checked")||
            $('#post_question_option_orientation_tall').is(":checked")
         )
         {
            if( $('#post_question_option_square_size').is(":checked")||
            $('#post_question_option_wide_size').is(":checked") ||
            $('#post_question_option_tall_size').is(":checked") 
            ){
               $("#first_page_post_questionnaire_page_understand_btn").prop('disabled', false);
            }
         else
            {
               $("#first_page_post_questionnaire_page_understand_btn").prop('disabled', true);
            } 
         }
      });

      $('#is_checked_sleep_duration, #is_checked_sleep_phase, #is_checked_sleep_quality, #is_checked_sleep_schedule, #is_checked_not_interested').change(function () {
       if ($('#is_checked_not_interested').is(":checked")) {
            $('#is_checked_sleep_duration').prop('checked', false);
            $('#is_checked_sleep_duration').attr('disabled', true);
            $('#is_checked_sleep_phase').prop('checked', false)
            $('#is_checked_sleep_phase').attr('disabled', true);
            $('#is_checked_sleep_quality').prop('checked', false)
            $('#is_checked_sleep_quality').attr('disabled', true);
            $('#is_checked_sleep_schedule').prop('checked', false)
            $('#is_checked_sleep_schedule').attr('disabled', true);
         } 
         else if ($('#is_checked_not_interested').not(":checked")){
             $('#is_checked_not_interested').attr('disabled', false);
             $('#is_checked_sleep_duration').attr('disabled', false);
             $('#is_checked_sleep_phase').attr('disabled', false);
             $('#is_checked_sleep_quality').attr('disabled', false);
             $('#is_checked_sleep_schedule').attr('disabled', false);
         }
   
        if ( $('#is_checked_sleep_duration').is(":checked") || 
            $('#is_checked_sleep_phase').is(":checked") ||
            $('#is_checked_sleep_quality').is(":checked") ||
            $('#is_checked_sleep_schedule').is(":checked")  
        ) {
             $('#is_checked_not_interested').prop('checked', false);
             $('#is_checked_not_interested').attr('disabled', true); 
         } 
     });

      $('#is_checked_sleep_duration, #is_checked_sleep_phase, #is_checked_sleep_quality, #is_checked_sleep_schedule, #is_checked_not_interested').change(function () {
         if( 
            $('#is_checked_sleep_duration').is(":checked")||
            $('#is_checked_sleep_phase').is(":checked") ||
            $('#is_checked_sleep_quality').is(":checked") ||
            $('#is_checked_sleep_schedule').is(":checked") ||
            $('#is_checked_not_interested').is(":checked")
         )
         {
               $("#second_page_post_questionnaire_page_understand_btn").prop('disabled', false);
         }
      else
         {
            $("#second_page_post_questionnaire_page_understand_btn").prop('disabled', true);
         } 
      });

      $('#radio_attn_chk_task_one, #radio_attn_chk_task_two, #radio_attn_chk_task_three').change(function () {
         if( 
            $('#radio_attn_chk_task_one').is(":checked")||
            $('#radio_attn_chk_task_two').is(":checked") ||
            $('#radio_attn_chk_task_three').is(":checked")
         )
         {
            if( $('#radio_attn_chk_rainfall').is(":checked") || $('#radio_attn_chk_sleep').is(":checked") || $('#radio_attn_chk_weather').is(":checked") )
            {
               $("#btn_<?php echo $id;?>").prop('disabled', false);
            }
         else
            {
               $("#btn_<?php echo $id;?>").prop('disabled', true);
            } 
         }
      });

      $('#radio_attn_chk_rainfall, #radio_attn_chk_sleep, #radio_attn_chk_weather').change(function () {
         if( 
            $('#radio_attn_chk_rainfall').is(":checked")||
            $('#radio_attn_chk_sleep').is(":checked") ||
            $('#radio_attn_chk_weather').is(":checked")
         )
         {
            if( 
            $('#radio_attn_chk_task_one').is(":checked") ||
            $('#radio_attn_chk_task_two').is(":checked") ||
            $('#radio_attn_chk_task_three').is(":checked") )
            {
               $("#btn_<?php echo $id;?>").prop('disabled', false);
            }
         else
            {
               $("#btn_<?php echo $id;?>").prop('disabled', true);
            } 
         }
      });

   
          
   });

   $('body').on('next', function(e, type){
   // console.log("next");
   var  excluded = false;
   if (type === '<?php echo $id;?>'){
      var first_question_answer = $('input[name=attn_q_one]:checked').val();
      var second_question_answer = $('input[name=attn_q_two]:checked').val();
      var task_name = "<?php echo $task[0] ?>" ;
      // alert(task_name);
      if(first_question_answer != task_name && second_question_answer != "sleep"){
         excluded = true;
         $('body').trigger('excluded');
         // console.log("failed on attention check --> exclude");
         $('#<?php echo $next ?>').hide().promise().done(() => $('#excluded').show());
         $(":button").hide();
      } else {
         // console.log("passed on attention check");
         $('#<?php echo $id ?>').hide().promise().done(() => $('#<?php echo $next ?>').show());
      }
      //ajax for data saving start if excluded = false
      if(!excluded){
         var page_name                 = '<?php echo $id;?>';
         var participant_id            = $('#participant_id').val();
         var system_generated_id       = $('#system_generated_id').val();
         var experiment_sequence       = <?php echo $between_subject_sequence;?>;
         var viz_preference_for_weekly_sleep_data = $('input[name=post_questionnaire_question_one]:checked').val();
         var orientation_preference_for_wristband_display = $('input[name=post_questionnaire_question_two]:checked').val();
         var is_checked_sleep_duration = 0, is_checked_sleep_phase = 0, is_checked_sleep_quality = 0, is_checked_sleep_schedule = 0;
         if ( $('#is_checked_sleep_duration').is(":checked") ){
            is_checked_sleep_duration = 1;
         }
         if ( $('#is_checked_sleep_phase').is(":checked") ){
            is_checked_sleep_phase = 1;
         }
         if ( $('#is_checked_sleep_quality').is(":checked") ){
            is_checked_sleep_quality = 1;
         }
         if ( $('#is_checked_sleep_schedule').is(":checked") ){
            is_checked_sleep_schedule = 1;
         }
         if ( $('#is_checked_not_interested').is(":checked") ){
            is_checked_sleep_duration = 0;
            is_checked_sleep_phase = 0;
            is_checked_sleep_quality = 0;
            is_checked_sleep_schedule = 0;
         }
         var attention_check_question_one = $('input[name=attn_q_one]:checked').val();
         var attention_check_question_two = $('input[name=attn_q_two]:checked').val();
         $.ajax({
            type        : 'POST',  
            url         : 'ajax/page_data_save.php',  
            data        : {
                              page_name                                       : JSON.stringify(page_name), 
                              participant_id                                  : JSON.stringify(participant_id), 
                              system_generated_id                             : JSON.stringify(system_generated_id), 
                              experiment_sequence                             : JSON.stringify(experiment_sequence),
                              viz_preference_for_weekly_sleep_data            : JSON.stringify(viz_preference_for_weekly_sleep_data),
                              orientation_preference_for_wristband_display    : JSON.stringify(orientation_preference_for_wristband_display),
                              is_checked_sleep_duration                       : JSON.stringify(is_checked_sleep_duration), 
                              is_checked_sleep_phase                          : JSON.stringify(is_checked_sleep_phase), 
                              is_checked_sleep_quality                        : JSON.stringify(is_checked_sleep_quality),
                              is_checked_sleep_schedule                       : JSON.stringify(is_checked_sleep_schedule),
                              attention_check_question_one                    : JSON.stringify(attention_check_question_one),
                              attention_check_question_two                    : JSON.stringify(attention_check_question_two)

                        }, 
            dataType    : 'json',  
            success:function(response){
               if( response.status == 'error' ) {
                  console.log('Something bad happened!');
               } else {
                  console.log("Data saved successfully.");
               }
            },
            complete: function(response, textStatus) {
            // console.log(textStatus)
            },
            error:function (jqXHR, status, thrownError){
            //  alert('error occured');
            // var jsonValue = jQuery.parseJSON( jqXHR.responseText );
            // console.log(jsonValue.Message);
            }
      });


      }// ajax end

   }

});
   
   
</script>