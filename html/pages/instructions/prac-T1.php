<style>

.task_explanation_T1_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.task_explanation_T1_understand_btn {
    float: right;
}

.img-container {
     text-align: center;
}
.task_explanation_T1_slide_counter{
   margin-top:2px;
}
.task_explanation_T1_understand_btn{
   width:80%;
   margin-top: -6px;
}

</style>

<div class="row">
   <div class="col">
      <div class="container">
         <div class="mt-1 d-flex justify-content-center section-header">
            <h3>Task explanation</h3>
         </div>
         <div id="task_explanation_T1">
            <div class="visible task_explanation_T1_slide">
               <p>In this experiment you will complete the same task for the 3 different visualization sizes.</p>
               <p><b>Your question to answer:</b> On which day did you sleep longer, Saturday or Sunday?</p>
               <p><b>Possible answers:</b> Saturday or Sunday</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T1_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T1_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T1_slide">
               <p><b>How to do it:</b> Comparing the bar width of Saturday & Sunday and choose the longer one. For example,</p>
               <div class="img-container">
                  <img src="img/task_explanation/task_explanation_T1.gif" style="width:180px !important;"  alt="Example Bar Charts">
               </div>
               <p class="text-center">Saturday < Sunday</br><b>Answer:</b> Sunday</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T1_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T1_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T1_slide">
               <p><b>Q.</b> On which day did you sleep longer, Saturday or Sunday?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T1_S1.gif" style="width:200px !important;"  alt="Example of Square visualization.">
                  <figcaption class="figure-caption">Example of Square size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">Saturday > Sunday</br><b>Answer:</b> Saturday</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T1_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T1_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T1_slide">
               <p><b>Q.</b> On which day did you sleep longer, Saturday or Sunday?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T1_S2.gif" style="width:220px !important;"  alt="Example of Wide size visualization.">
                  <figcaption class="figure-caption">Example of Wide size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">Saturday < Sunday</br><b>Answer:</b> Sunday</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T1_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T1_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T1_slide">
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T1_S3.gif" style="height: 160px !important;"  alt="Example of Tall size visualization.">
                  <figcaption class="figure-caption">Example of Tall size visualization.</figcaption>
               </figure>
               <div class="form-group mt-2">
                  <p><b>Q.</b> On which day did you sleep longer, Saturday or Sunday?</p>
                  <div class="d-flex justify-content-center">
                     <div class="form-check form-check-inline">
                        <input class="form-check-input radio_btn_task_explanation_T1" type="radio" id="radio_btn_task_explanation_T1_Sat" value="Saturday" name="radio_btn_task_explanation_T1">
                        <label class="form-check-label lead" for="radio_btn_task_explanation_T1_Sat">Saturday</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input radio_btn_task_explanation_T1" type="radio" id="radio_btn_task_explanation_T1_Sun" value="Sunday" name="radio_btn_task_explanation_T1">
                        <label class="form-check-label lead" for="radio_btn_task_explanation_T1_Sun">Sunday</label>
                     </div>
                  </div>
               </div>
               <div role="alert" id="alert_correct_task_explanation_T1">
                  <p class="text-success"><strong>Correct!</strong> Click <strong>Next</strong> to proceed to the next section.</p>
               </div>
               <div role="alert" id="alert_wrong_task_explanation_T1">
                  <p class="text-danger"><strong>Wrong!</strong> The correct answer is Saturday. Please select Saturday to proceed to the next section.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(document).ready(function() {
        let count = 1;
        function updateDisplay(){
            $('.task_explanation_T1_slide_counter').text(count +"/5")
        };

        updateDisplay();
    
         $("#task_explanation_T1_slide_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         $("#alert_correct_task_explanation_T1").hide();
         $("#alert_wrong_task_explanation_T1").hide();
         

         $(".task_explanation_T1_understand_btn").click(function() {

        count++;
        updateDisplay();
        
        var current_div = $('#task_explanation_T1 .task_explanation_T1_slide.visible').first();
        var next_div = current_div.next();

        current_div.removeClass("visible").hide();
        next_div.addClass("visible").show();
        
        if (!next_div.next().length) {
            // $(this).hide();
            $('.task_explanation_T1_slide_counter').hide();
            $('.task_explanation_T1_understand_btn').hide();

            $('.radio_btn_task_explanation_T1').on('input', function() {
                    var answer_T1 = $(this).val();
                    if(answer_T1 === "Saturday"){
                        $("#alert_wrong_task_explanation_T1").hide();
                        $("#alert_correct_task_explanation_T1").show();
                        $("#btn_<?php echo $id;?>").show();
                    }else{
                        $("#btn_<?php echo $id;?>").hide();
                        $("#alert_correct_task_explanation_T1").hide();
                        $("#alert_wrong_task_explanation_T1").show();
                    }
            });

        }
        });
        

       
});


</script>

