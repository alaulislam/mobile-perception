

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
            <h4>Post-questionnaire</h4>
         </div>
         <div class="form-group">
            <p><strong>For looking at your weekly sleep data, which of the three display forms and sizes would you prefer?</strong></p>
            <div style="margin-top:-10px">
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" value="1" name="q" id="option_square_size">
                  <img src="img/questions/post_square.png" style="width:40px !important; margin-left:6px;" alt="Square size">
               </div>
               <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" value="2" name="q" id="option_wide_size">
                  <img src="img/questions/post_wide.png" style="width:50px !important; margin-left:6px;" alt="Wide size">
               </div>
               <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" value="3" name="q" id="option_tall_size">
                  <img src="img/questions/post_tall.png" style="height:45px !important; margin-left:6px;" alt="Tall size">
               </div>
            </div>
         </div>
         <div class="form-group" style="margin-top:-10px">
            <p><strong>Of the two wristband-sized displays (small size), which orientation do you prefer?</strong></p>
            <div style="margin-top:-10px">
               <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" value="1" name="r" id="option_orientation_wide">
                  <img src="img/questions/post_wide.png" style="width:50px !important; margin-left:6px;" alt="Wide size">
               </div>
               <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" value="2" name="r" id="option_orientation_tall">
                  <img src="img/questions/post_tall.png" style="height:45px !important; margin-left:6px;" alt="Tall size">
               </div>
            </div>
         </div>
         <div class="form-group" style="margin-top:-10px">
            <p><strong>What would you like to learn about your own personal sleep?</strong></p>
            <div style="margin-top:-10px;"></div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="checkbox_duration" value="option1">
               <label class="form-check-label" for="checkbox_duration" style="margin-left:6px;">Duration</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="checkbox_phase" value="option2">
               <label class="form-check-label" for="checkbox_phase" style="margin-left:6px;">Phases</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="checkbox_quality" value="option3">
               <label class="form-check-label" for="checkbox_quality" style="margin-left:6px;">Quality</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="checkbox_schedule" value="option3">
               <label class="form-check-label" for="checkbox_schedule" style="margin-left:6px;">Schedule</label>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
       $("#btn_<?php echo $id;?>").prop('disabled', true);
       $('#checkbox_duration, #checkbox_phase, #checkbox_quality, #checkbox_schedule').change(function () {
          if( 
             $('#checkbox_duration').is(":checked")||
             $('#checkbox_phase').is(":checked") ||
             $('#checkbox_quality').is(":checked") ||
             $('#checkbox_schedule').is(":checked")
          )
          {
             if(
                $('#option_square_size').is(":checked") || 
                $('#option_wide_size').is(":checked") || 
                $('#option_tall_size').is(":checked")
             )
             {  if(
                 $('#option_orientation_wide').is(":checked") || 
                 $('#option_orientation_tall').is(":checked")
                 ){
                   $("#btn_<?php echo $id;?>").prop('disabled', false); 
                 }
                 
                }
          }else
             {
                $("#btn_<?php echo $id;?>").prop('disabled', true);
             }  
        });
   
        $('#option_square_size, #option_wide_size, #option_tall_size').change(function () {
          if( 
             $('#option_square_size').is(":checked")||
             $('#option_wide_size').is(":checked") ||
             $('#option_tall_size').is(":checked")
          )
          {
             if(
               $('#checkbox_duration').is(":checked")||
               $('#checkbox_phase').is(":checked") ||
               $('#checkbox_quality').is(":checked") ||
               $('#checkbox_schedule').is(":checked")
             )
             {  if(
                 $('#option_orientation_wide').is(":checked") || 
                 $('#option_orientation_tall').is(":checked")
                 ){
                   $("#btn_<?php echo $id;?>").prop('disabled', false); 
                 }
                 
                }
          }else
             {
                $("#btn_<?php echo $id;?>").prop('disabled', true);
             }  
        });
   
        $('#option_orientation_wide, #option_orientation_tall').change(function () {
          if( 
           $('#option_orientation_wide').is(":checked") || 
           $('#option_orientation_tall').is(":checked")
          )
          {
             if(
               $('#checkbox_duration').is(":checked")||
               $('#checkbox_phase').is(":checked") ||
               $('#checkbox_quality').is(":checked") ||
               $('#checkbox_schedule').is(":checked")
             )
             {  if(
               $('#option_square_size').is(":checked")||
               $('#option_wide_size').is(":checked") ||
               $('#option_tall_size').is(":checked")
                
                 ){
                   $("#btn_<?php echo $id;?>").prop('disabled', false); 
                 }
                 
                }
          }else
             {
                $("#btn_<?php echo $id;?>").prop('disabled', true);
             }  
        });
        
   
   });
        
</script>

