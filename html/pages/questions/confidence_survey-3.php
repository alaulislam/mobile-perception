<style>
   input[type=radio] {
   transform: scale(1.5);
   -webkit-transform: scale(1.5);
   }
</style>
<div class="row">
  <div class="col">

<div class="container">
      <div class="mt-1 d-flex justify-content-center section-header">
        <h3>Confidence survey</h3>
      </div>
      <p>You have completed the last set of trials. Please rate your confidence in the correctness of your responses for the last block of answers.</p> 
    <div class="form-group" id="form_likert">
        <h5>How confident are you that your answers were correct?</h5>
        
        <div class="mt-3">
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="5" name="last_set_confidence_survey" id="radio_last_set_cs_completely_confident">
            <label class="form-check-label" for="radio_last_set_cs_completely_confident" style="margin-left:6px;">Completely confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="4" name="last_set_confidence_survey" id="radio_last_set_cs_fairly_confident">
            <label class="form-check-label" for="radio_last_set_cs_fairly_confident" style="margin-left:6px;">Fairly confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="3" name="last_set_confidence_survey" id="radio_last_set_cs_somewhat_confident">
            <label class="form-check-label" for="radio_last_set_cs_somewhat_confident" style="margin-left:6px;">Somewhat confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="2" name="last_set_confidence_survey" id="radio_last_set_cs_slightly_confident">
            <label class="form-check-label" for="radio_last_set_cs_slightly_confident" style="margin-left:6px;">Slightly confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="1" name="last_set_confidence_survey" id="radio_last_set_cs_not_confident">
            <label class="form-check-label" for="radio_last_set_cs_not_confident" style="margin-left:6px;">Not confident at all</label>
          </div>
        </div>

    </div>
    <div class="mt-4"></div>
   
</div>

</div>
</div>
<script>
$(document).ready(function(){
  $("#btn_<?php echo $id;?>").prop('disabled', true);
  $('#radio_last_set_cs_completely_confident, #radio_last_set_cs_fairly_confident, #radio_last_set_cs_somewhat_confident, #radio_last_set_cs_slightly_confident, #radio_last_set_cs_not_confident').change(function () {
          if( 
             $('#radio_last_set_cs_completely_confident').is(":checked")||
             $('#radio_last_set_cs_fairly_confident').is(":checked") ||
             $('#radio_last_set_cs_somewhat_confident').is(":checked") ||
             $('#radio_last_set_cs_slightly_confident').is(":checked") ||
             $('#radio_last_set_cs_not_confident').is(":checked")
          )
          {
                   $("#btn_<?php echo $id;?>").prop('disabled', false); 
                 }
          else
             {
                $("#btn_<?php echo $id;?>").prop('disabled', true);
             }  
   });

});

$('body').on('next', function(e, type){
        // var page_number = $('#page_' + type).val();
        // console.log("page number",  type)
        event.preventDefault();
        if (type === '<?php echo $id;?>'){

          var global_attn_check_fail_count  = parseInt($('#attention_check_fail_count').val());
     

         if(global_attn_check_fail_count >= 6){
         excluded = true;
         $('body').trigger('excluded');
         var excluded_for_attn_check = "excluded_participant_for_at_least_six_wrong_ans";
         var participant_id          = $('#participant_id').val();
         var system_generated_id     = $('#system_generated_id').val();
         var experiment_sequence     = <?php echo $between_subject_sequence;?>;
         var experiment_duration     = parseInt(timeSpentOnSite/1000);
         var browserInfo             = bowser.getParser(window.navigator.userAgent);
         var browser_name            = browserInfo.getBrowserName();
         var browser_version         = browserInfo.getBrowserVersion();
         var operating_system        = browserInfo.getOSName();
         $.ajax({
            type        : 'POST',  
            url         : 'ajax/excluded_for_attention_check.php',  
            data        : {
                              excluded_for_attn_check     : JSON.stringify(excluded_for_attn_check), 
                              participant_id              : JSON.stringify(participant_id), 
                              system_generated_id         : JSON.stringify(system_generated_id), 
                              experiment_sequence         : JSON.stringify(experiment_sequence),
                              experiment_duration         : JSON.stringify(experiment_duration), 
                              browser_name                : JSON.stringify(browser_name),
                              browser_version             : JSON.stringify(browser_version),
                              operating_system            : JSON.stringify(operating_system),
                              total_attn_check_ques_wrong : JSON.stringify(global_attn_check_fail_count)
                        }, 
            dataType    : 'json',  
            success:function(response){
               if( response.status == 'error' ) {
                  console.log('Something bad happened!');
               } else {
                  console.log("Participant excluded .");
               }
            },
            complete: function(response, textStatus) {
            },
            error:function (jqXHR, status, thrownError){
            }
         });// ajax end
         $('#<?php echo $next ?>').hide();
         $('#excluded_for_trials_attn_check_page').show();
          } else {
            // console.log("passed on attention check");
            $('#<?php echo $id ?>').hide().promise().done(() => $('#<?php echo $next ?>').show());
          }
        if(!excluded){
          var page_name                   = '<?php echo $id;?>';
          var participant_id_cs_1         = $('#participant_id').val();
          var system_generated_id         = $('#system_generated_id').val();
          var experiment_sequence         = <?php echo $between_subject_sequence;?>;
          var experiment_order            = '<?php echo $experiment_order["experiment_sequence_3"];?>';
          var last_set_confidence_survey  = $('input[name=last_set_confidence_survey]:checked').val();

          $.ajax({
                type        : 'POST',  
                url         : 'ajax/page_data_save.php',  
                data        : {
                                  page_name                   : JSON.stringify(page_name), 
                                  participant_id              : JSON.stringify(participant_id_cs_1), 
                                  system_generated_id         : JSON.stringify(system_generated_id), 
                                  experiment_sequence         : JSON.stringify(experiment_sequence),
                                  experiment_order            : JSON.stringify(experiment_order),  
                                  last_set_confidence_survey  : JSON.stringify(last_set_confidence_survey)
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
                    console.log(jqXHR);
                }
          });// ajax end
         } //end !excluded "if"

        } //end page "if"
    
  });



</script>