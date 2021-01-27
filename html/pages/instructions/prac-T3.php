<style>

.task_explanation_T3_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.task_explanation_T3_understand_btn {
    float: right;
}

.img-container {
     text-align: center;
}
.task_explanation_T3_slide_counter{
   margin-top:2px;
}
.task_explanation_T3_understand_btn{
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
         <div id="task_explanation_T3">
            <div class="visible task_explanation_T3_slide">
               <p>In this experiment you will complete the same task for the 3 different visualization sizes.</p>
               <p><b>Your question to answer:</b></br>Did you sleep longer on average on the weekend days (Sat, Sun) compared to the weekdays (Mon-Fri)?</p>
               <p><b>Possible answers:</b> Yes or No</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T3_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T3_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T3_slide">
               <p><b>How to do it:</b>
               </br>&#9755;&nbsp; Compare the average bar width for weekend days (Sat & Sun) with the average bar width for the weekdays. 
               </p>
               <figure class="img-container">
               <img src="img/task_explanation/task_explanation_T3_1.png" style="width:180px !important;"  alt="Example of Square size visualization.">
                  <figcaption class="figure-caption">Example of Square size visualization.</figcaption>
               </figure>
               <p></p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T3_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T3_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T3_slide">
               <p><b>How to do it:</b>
                </br>&#9755;&nbsp; You cannot calculate the answer, so eyeball it and make your best guess.
               </p>
               <div class="img-container" style="margin-top: -6px;">
                  <img src="img/task_explanation/task_explanation_T3_2.gif" style="width:180px !important;"  alt="Example Charts">
               </div>
               <p class="text-center">Weekend average sleep <b>></b> Weekdays average sleep</br><b>Answer:</b> YES</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T3_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T3_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T3_slide">
               <p><b>Q.</b> Did you sleep longer on average on the weekend days (Sat, Sun) compared to the weekdays (Mon-Fri)?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T3_S2.gif" style="width:220px !important;"  alt="Example of Wide size visualization.">
                  <figcaption class="figure-caption">Example of Wide size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">Weekend average sleep <b><</b> Weekdays average sleep</br><b>Answer:</b> NO</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T3_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T3_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T3_slide">
             <p><b>Q.</b> Did you sleep longer on average on the weekend days (Sat, Sun) compared to the weekdays (Mon-Fri)?</p>
          
               <figure class="img-container" style="margin-top:-10px">
                  <img src="img/task_explanation/task_explanation_T3_S3.gif" style="height: 160px !important;"  alt="Example of Tall size visualization.">
                  <figcaption class="figure-caption">Example of Tall size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">Weekend average sleep <b>></b> Weekdays average sleep</br><b>Answer:</b> YES</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T3_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T3_understand_btn">I understand</button>
                  </div>
               </div>
            </div>

            <div class="task_explanation_T3_slide">
                     <p>During the experiment you will use these two buttons to answer. </p>
                     <div class="d-flex justify-content-center">
                        <div class = "btn-group-justified btn-group-lg btn-group-horizontal">
                           <button type="button" class="btn btn-info">No</button>
                           <button type="button" class="btn btn-info" style="margin-right: 15px;">Yes</button>
                        </div>
                     </div>
                     <p class="text-center text-muted" style="font-size:90%;">Example of answering buttons</p>
                     <div class="mt-4">
                     <p>  Hold your phone so you can comfortably push these buttons. 
                     Try it now and then press <strong>Next</strong> to move on.</p>
                     </div>
            </div>

            <!-- <div class="task_explanation_T3_slide">
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T3_S3.gif" style="height: 160px !important;"  alt="Example of Tall size visualization.">
                  <figcaption class="figure-caption">Example of Tall size visualization.</figcaption>
               </figure>
               <div class="form-group mt-2">
                  <p><b>Q.</b> Did you sleep longer on average on the weekend days (Sat, Sun) compared to the weekdays (Mon-Fri)?</p>
                  <div class="d-flex justify-content-center" style="margin-top:-25px;">
                     <div class="form-check form-check-inline">
                        <input class="form-check-input radio_btn_task_explanation_T3" type="radio" id="radio_btn_task_explanation_T3_yes" value="yes" name="radio_btn_task_explanation_T3">
                        <label class="form-check-label lead" for="radio_btn_task_explanation_T3_yes">YES</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input radio_btn_task_explanation_T3" type="radio" id="radio_btn_task_explanation_T3_no" value="no" name="radio_btn_task_explanation_T3">
                        <label class="form-check-label lead" for="radio_btn_task_explanation_T3_no">NO</label>
                     </div>
                  </div>
               </div>
               <div role="alert" id="alert_correct_task_explanation_T3" style="margin-top:-10px;">
                  <p class="text-success"><strong>Correct!</strong> Click <strong>Next</strong> to proceed to the next section.</p>
               </div>
               <div role="alert" id="alert_wrong_task_explanation_T3">
                  <p class="text-danger"><strong>Wrong!</strong> The correct answer is YES. Please select YES to proceed to the next section.</p>
               </div>
            </div> -->
         </div>
      </div>
   </div>
</div>

<script>
$(document).ready(function(event) {
   // event.preventDefault();
        let count = 1;
        function updateDisplay(){
            $('.task_explanation_T3_slide_counter').text(count +"/7")
        };

        updateDisplay();
    
         $("#task_explanation_T1_slide_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         // $("#alert_correct_task_explanation_T3").hide();
         // $("#alert_wrong_task_explanation_T3").hide();
         
         $(".task_explanation_T3_understand_btn").click(function() {

        count++;
        updateDisplay();
        
        var current_div = $('#task_explanation_T3 .task_explanation_T3_slide.visible').first();
        var next_div = current_div.next();

        current_div.removeClass("visible").hide();
        next_div.addClass("visible").show();
        
        if (!next_div.next().length) {
            $('.task_explanation_T3_slide_counter').hide();
            $('.task_explanation_T3_understand_btn').hide();
            $("#btn_<?php echo $id;?>").show();

            // $('.radio_btn_task_explanation_T3').on('input', function() {
            //         var answer_T1 = $(this).val();
            //         if(answer_T1 === "yes"){
            //             $("#alert_wrong_task_explanation_T3").hide();
            //             $("#alert_correct_task_explanation_T3").show();
            //             $("#btn_<?php echo $id;?>").show();
            //         }else{
            //             $("#btn_<?php echo $id;?>").hide();
            //             $("#alert_correct_task_explanation_T3").hide();
            //             $("#alert_wrong_task_explanation_T3").show();
            //         }
            // });
        }
    });
       
});

</script>

