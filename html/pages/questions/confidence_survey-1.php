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
      <p>You have completed the first set of trials. Please rate your confidence in the correctness of your responses for the last block of answers.</p> 
    <div class="form-group" id="form_likert">
        <h5>How confident are you that your answers were correct?</h5>
        
        <div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="1" name="q" id="radio_first_set_cs_completely_confident">
            <label class="form-check-label" for="radio_first_set_cs_completely_confident" style="margin-left:6px;">Completely confident</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="2" name="q" id="radio_first_set_cs_fairly_confident">
            <label class="form-check-label" for="radio_first_set_cs_fairly_confident" style="margin-left:6px;">Fairly confident</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="3" name="q" id="radio_first_set_cs_somewhat_confident">
            <label class="form-check-label" for="radio_first_set_cs_somewhat_confident" style="margin-left:6px;">Somewhat confident</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="4" name="q" id="radio_first_set_cs_slightly_confident">
            <label class="form-check-label" for="radio_first_set_cs_slightly_confident" style="margin-left:6px;">Slightly confident</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="5" name="q" id="radio_first_set_cs_not_confident">
            <label class="form-check-label" for="radio_first_set_cs_not_confident" style="margin-left:6px;">Not confident at all</label>
          </div>
        </div>

    </div>
   
</div>

</div>
</div>
<script>
$(document).ready(function(){
  $("#btn_<?php echo $id;?>").prop('disabled', true);
  $('#radio_first_set_cs_completely_confident, #radio_first_set_cs_fairly_confident, #radio_first_set_cs_somewhat_confident, #radio_first_set_cs_slightly_confident, #radio_first_set_cs_not_confident').change(function () {
          if( 
             $('#radio_first_set_cs_completely_confident').is(":checked")||
             $('#radio_first_set_cs_fairly_confident').is(":checked") ||
             $('#radio_first_set_cs_somewhat_confident').is(":checked") ||
             $('#radio_first_set_cs_slightly_confident').is(":checked") ||
             $('#radio_first_set_cs_not_confident').is(":checked")
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
</script>