<style>
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
            <h3>Pre-questionnaire</h3>
         </div>
         <div class="form-group">
            <p><strong>Do you own any of these?</strong></p>
            <div style="margin-top:-10px;"></div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox_smartwatch" value="option1">
               <label class="form-check-label" for="inlineCheckbox_smartwatch" style="margin-left:6px;">Smartwatch</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox_fitnessband" value="option2">
               <label class="form-check-label" for="inlineCheckbox_fitnessband"  style="margin-left:6px;">Fitness Band</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox_none" value="option3">
               <label class="form-check-label" for="inlineCheckbox_none"  style="margin-left:6px;">None of these</label>
            </div>
         </div>
         <div class="form-group" id="form_likert">
            <p><strong>I have read/used bar charts like the ones below:</strong></p>
            <div style="margin-top:-15px;"></div>
            <div class="img-container">
               <img src="img/questions/pre_questionnaire1.png" style="width:240px !important;" alt="Example Bar Charts">
            </div>
            <div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input validates-required validates" value="1" name="q" id="option_strongly_agree">
                  <label class="form-check-label" for="option1" style="margin-left:6px;">Never</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input validates-required validates" value="2" name="q" id="option_agree">
                  <label class="form-check-label" for="option2" style="margin-left:6px;">Almost never</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input validates-required validates" value="3" name="q" id="option_neither_agree_disagree">
                  <label class="form-check-label" for="option3" style="margin-left:6px;">Occasionally / a few times</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input validates-required validates" value="4" name="q" id="option_disagree">
                  <label class="form-check-label" for="option4" style="margin-left:6px;">Almost every day</label>
               </div>
               <div class="form-check" style="margin-top:2px"> 
                  <input type="radio" class="form-check-input validates-required validates" value="5" name="q" id="option_strongly_disagree">
                  <label class="form-check-label" for="option5" style="margin-left:6px;">Every day</label>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
     $("#btn_<?php echo $id;?>").prop('disabled', true);
      //      if ($(this).is(":checked"))
     $('#inlineCheckbox_smartwatch, #inlineCheckbox_fitnessband, #inlineCheckbox_none').change(function () {
       if ($('#inlineCheckbox_none').is(":checked")) {
            $('#inlineCheckbox_smartwatch').prop('checked', false);
            $('#inlineCheckbox_smartwatch').attr('disabled', true);
            $('#inlineCheckbox_fitnessband').prop('checked', false)
            $('#inlineCheckbox_fitnessband').attr('disabled', true);
         } 
         else if ($('#inlineCheckbox_none').not(":checked")){
             $('#inlineCheckbox_none').attr('disabled', false);
             $('#inlineCheckbox_smartwatch').attr('disabled', false);
             $('#inlineCheckbox_fitnessband').attr('disabled', false);
         }
   
        if ($('#inlineCheckbox_smartwatch').is(":checked")) {
             $('#inlineCheckbox_none').prop('checked', false);
             $('#inlineCheckbox_none').attr('disabled', true); 
         } 
        else if($('#inlineCheckbox_fitnessband').is(":checked")){
             $('#inlineCheckbox_none').prop('checked', false);
             $('#inlineCheckbox_none').attr('disabled', true);
          }
     });
   
     $('#inlineCheckbox_smartwatch, #inlineCheckbox_fitnessband, #inlineCheckbox_none').change(function () {
       if( 
          $('#inlineCheckbox_smartwatch').is(":checked")||
          $('#inlineCheckbox_fitnessband').is(":checked") ||
          $('#inlineCheckbox_none').is(":checked")
       )
       {
          if(
             $('#option_strongly_agree').is(":checked") || 
             $('#option_agree').is(":checked") || 
             $('#option_neither_agree_disagree').is(":checked") || 
             $('#option_disagree').is(":checked") || 
             $('#option_strongly_disagree').is(":checked")
          )
          {  $("#btn_<?php echo $id;?>").prop('disabled', false); }
       }else
          {
             $("#btn_<?php echo $id;?>").prop('disabled', true);
          }  
     });
   
     $('#option_strongly_agree, #option_agree, #option_neither_agree_disagree, #option_disagree, #option_strongly_disagree').change(function () {
       if(
          $('#inlineCheckbox_smartwatch').is(":checked") ||
          $('#inlineCheckbox_fitnessband').is(":checked") ||
          $('#inlineCheckbox_none').is(":checked")
       ){
          $("#btn_<?php echo $id;?>").prop('disabled', false);
       }else{
          $("#btn_<?php echo $id;?>").prop('disabled', true);
       }
   
     });
   
   });
</script>