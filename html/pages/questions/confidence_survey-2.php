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
      <p>You have completed the second set of trials. Please rate your confidence in the correctness of your responses for the last block of answers.</p> 
    <div class="form-group" id="form_likert">
        <h5>How confident are you that your answers were correct?</h5>
        
        <div class="mt-3">
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="5" name="second_set_confidence_survey" id="radio_second_set_cs_completely_confident">
            <label class="form-check-label" for="radio_second_set_cs_completely_confident" style="margin-left:6px;">Completely confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="4" name="second_set_confidence_survey" id="radio_second_set_cs_fairly_confident">
            <label class="form-check-label" for="radio_second_set_cs_fairly_confident" style="margin-left:6px;">Fairly confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="3" name="second_set_confidence_survey" id="radio_second_set_cs_somewhat_confident">
            <label class="form-check-label" for="radio_second_set_cs_somewhat_confident" style="margin-left:6px;">Somewhat confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="2" name="second_set_confidence_survey" id="radio_second_set_cs_slightly_confident">
            <label class="form-check-label" for="radio_second_set_cs_slightly_confident" style="margin-left:6px;">Slightly confident</label>
          </div>
          <div class="form-check" style="margin-top:4px">
            <input type="radio" class="form-check-input" value="1" name="second_set_confidence_survey" id="radio_second_set_cs_not_confident">
            <label class="form-check-label" for="radio_second_set_cs_not_confident" style="margin-left:6px;">Not confident at all</label>
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
  $('#radio_second_set_cs_completely_confident, #radio_second_set_cs_fairly_confident, #radio_second_set_cs_somewhat_confident, #radio_second_set_cs_slightly_confident, #radio_second_set_cs_not_confident').change(function () {
          if( 
             $('#radio_second_set_cs_completely_confident').is(":checked")||
             $('#radio_second_set_cs_fairly_confident').is(":checked") ||
             $('#radio_second_set_cs_somewhat_confident').is(":checked") ||
             $('#radio_second_set_cs_slightly_confident').is(":checked") ||
             $('#radio_second_set_cs_not_confident').is(":checked")
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
          var page_name                   = '<?php echo $id;?>';
          var participant_id_cs_1         = $('#participant_id').val();
          var system_generated_id         = $('#system_generated_id').val();
          var experiment_sequence         = <?php echo $between_subject_sequence;?>;
          var experiment_order            = '<?php echo $experiment_order["experiment_sequence_2"];?>';
          var second_set_confidence_survey = $('input[name=second_set_confidence_survey]:checked').val();

          $.ajax({
                type        : 'POST',  
                url         : 'ajax/page_data_save.php',  
                data        : {
                                  page_name                   : JSON.stringify(page_name), 
                                  participant_id              : JSON.stringify(participant_id_cs_1), 
                                  system_generated_id         : JSON.stringify(system_generated_id), 
                                  experiment_sequence         : JSON.stringify(experiment_sequence),
                                  experiment_order            : JSON.stringify(experiment_order),  
                                  second_set_confidence_survey : JSON.stringify(second_set_confidence_survey)
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
          });
        }
    
  });



</script>