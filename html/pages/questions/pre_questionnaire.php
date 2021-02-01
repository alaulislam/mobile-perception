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
               <input class="form-check-input" type="checkbox" name="pre_questionnaire_q_one[]" id="checkbox_smartwatch">
               <label class="form-check-label" for="checkbox_smartwatch" style="margin-left:6px;">Smartwatch</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="pre_questionnaire_q_one[]" id="checkbox_fitness_band">
               <label class="form-check-label" for="checkbox_fitness_band"  style="margin-left:6px;">Fitness Band</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="pre_questionnaire_q_one[]" id="checkbox_none">
               <label class="form-check-label" for="checkbox_none"  style="margin-left:6px;">None of these</label>
            </div>
         </div>
         <div class="form-group" style="margin-top:-10px">
            <p><strong>I have read/used bar charts like the ones below:</strong></p>
            <div style="margin-top:-15px;"></div>
            <div class="img-container">
               <img src="img/questions/pre_questionnaire1.png" style="width:240px !important;" alt="Example Bar Charts">
            </div>
            <div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input" value="1" name="pre_questionnaire_q_two" id="option_strongly_agree">
                  <label class="form-check-label" for="option_strongly_agree" style="margin-left:6px;">Never</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input" value="2" name="pre_questionnaire_q_two" id="option_agree">
                  <label class="form-check-label" for="option_agree" style="margin-left:6px;">Almost never</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input" value="3" name="pre_questionnaire_q_two" id="option_neither_agree_disagree">
                  <label class="form-check-label" for="option_neither_agree_disagree" style="margin-left:6px;">Occasionally / a few times</label>
               </div>
               <div class="form-check" style="margin-top:2px">
                  <input type="radio" class="form-check-input" value="4" name="pre_questionnaire_q_two" id="option_disagree">
                  <label class="form-check-label" for="option_disagree" style="margin-left:6px;">Almost every day</label>
               </div>
               <div class="form-check" style="margin-top:2px"> 
                  <input type="radio" class="form-check-input" value="5" name="pre_questionnaire_q_two" id="option_strongly_disagree">
                  <label class="form-check-label" for="option_strongly_disagree" style="margin-left:6px;">Every day</label>
               </div>
            </div>
         </div>
         <div style="margin-top:-10px"></div>
         <span class="text-muted" style="font-size:13px;"> Next button will only be "clickable" if both questions are answered.</span>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
     $("#btn_<?php echo $id;?>").prop('disabled', true);
      //      if ($(this).is(":checked"))
     $('#checkbox_smartwatch, #checkbox_fitness_band, #checkbox_none').change(function () {
       if ($('#checkbox_none').is(":checked")) {
            $('#checkbox_smartwatch').prop('checked', false);
            $('#checkbox_smartwatch').attr('disabled', true);
            $('#checkbox_fitness_band').prop('checked', false)
            $('#checkbox_fitness_band').attr('disabled', true);
         } 
         else if ($('#checkbox_none').not(":checked")){
             $('#checkbox_none').attr('disabled', false);
             $('#checkbox_smartwatch').attr('disabled', false);
             $('#checkbox_fitness_band').attr('disabled', false);
         }
   
        if ($('#checkbox_smartwatch').is(":checked")) {
             $('#checkbox_none').prop('checked', false);
             $('#checkbox_none').attr('disabled', true); 
         } 
        else if($('#checkbox_fitness_band').is(":checked")){
             $('#checkbox_none').prop('checked', false);
             $('#checkbox_none').attr('disabled', true);
          }
     });
   
     $('#checkbox_smartwatch, #checkbox_fitness_band, #checkbox_none').change(function () {
       if( 
          $('#checkbox_smartwatch').is(":checked")||
          $('#checkbox_fitness_band').is(":checked") ||
          $('#checkbox_none').is(":checked")
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
          $('#checkbox_smartwatch').is(":checked") ||
          $('#checkbox_fitness_band').is(":checked") ||
          $('#checkbox_none').is(":checked")
       ){
          $("#btn_<?php echo $id;?>").prop('disabled', false);
       }else{
          $("#btn_<?php echo $id;?>").prop('disabled', true);
       }
   
     });


   });

   $('body').on('next', function(e, type){
      // var page_number = $('#page_' + type).val();
      // console.log("page number",  type)
      event.preventDefault();
      //  var pre_questionnaire_q_one_answer = [];
      // $("input[name='pre_questionnaire_q_one[]']:checked").each(function ()
      // {
      //    pre_questionnaire_q_one_answer.push($(this).val());
      // });
      var has_smartwatch = 0;
      var has_fitness_band = 0;
      if ( $('#checkbox_smartwatch').is(":checked") && $('#checkbox_fitness_band').is(":checked") ){
         has_smartwatch = 1;
         has_fitness_band = 1;
      }else if( $('#checkbox_smartwatch').is(":checked") && $('#checkbox_fitness_band').not(":checked") ){
         has_smartwatch = 1;
         has_fitness_band = 0;
      }else if( $('#checkbox_smartwatch').not(":checked") && $('#checkbox_fitness_band').is(":checked") ){
         has_smartwatch = 0;
         has_fitness_band = 1;
      }else{
         has_smartwatch = 0;
         has_fitness_band = 0;
      }
      // console.log(has_smartwatch, has_fitness_band);
      //var data = [];
      // $("input[name='pre_questionnaire_q_one[]']:checked").each (function (index, element) {

      //    data[$(element).attr('id')] = $(element).val();
      // });
      var is_used_bar_chart_likert = [];
      var is_used_bar_chart_likert = $('input[name=pre_questionnaire_q_two]:checked').val();
      var system_generated_id = $('#system_generated_id').val();
      var participant_id_pre_questionnaire = $('#participant_id').val();
      var page_name = '<?php echo $id;?>';
      var experiment_sequence = <?php echo $between_subject_sequence;?>;

      if (type === '<?php echo $id;?>'){
      $.ajax({
            type        : 'POST',  
            url         : 'ajax/page_data_save.php',  
            data        : {
                              page_name                  : JSON.stringify(page_name), 
                              participant_id             : JSON.stringify(participant_id_pre_questionnaire), 
                              system_generated_id        : JSON.stringify(system_generated_id), 
                              experiment_sequence        : JSON.stringify(experiment_sequence), 
                              has_smartwatch             : JSON.stringify(has_smartwatch), 
                              has_fitness_band           : JSON.stringify(has_fitness_band), 
                              is_used_bar_chart_likert   : JSON.stringify(is_used_bar_chart_likert), 

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
      }); // end Ajax
      
      }

     
 });
</script>