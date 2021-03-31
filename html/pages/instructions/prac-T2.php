<style>

.task_explanation_T2_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.task_explanation_T2_understand_btn {
    float: right;
}

.img-container {
     text-align: center;
}
.task_explanation_T2_slide_counter{
   margin-top:2px;
}
.task_explanation_T2_understand_btn{
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
         <div id="task_explanation_T2">
            <div class="visible task_explanation_T2_slide">
               <p>In this experiment you will complete the same task for the 3 different visualization sizes.</p>
               <p><b>Your question to answer:</b></br>Did you go to bed later than planned (22:00) on 4 or more days this week?</p>
               <p><b>Possible answers:</b> Yes or No</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T2_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T2_slide">
               <p><b>How to do it:</b>
               </br>&#9755;&nbsp;Count the number of bars that start on the right of the 22:00 line and if there are 4 bars or more than these then your answer should be <strong>YES</strong>
               </p>
               <div class="img-container">
                  <img src="img/task_explanation/task_explanation_T2_1.gif" style="width:180px !important;"  alt="Example Bar Charts">
               </div>
               <p class="text-center">6 days >= 4 days</br><b>Answer:</b> YES</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T2_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T2_slide">
               <p><b>How to do it:</b>
                </br>&#9755;&nbsp; Also, you can count the number of bars that start to the left of the 22:00 line and if there are only 3 or less than this then the answer is  <strong>YES</strong>
               </p>
               <div class="img-container" style="margin-top: -6px;">
                  <img src="img/task_explanation/task_explanation_T2_2.gif" style="width:180px !important;"  alt="Example Bar Charts">
               </div>
               <p class="text-center">1 day <= 3 days</br><b>Answer:</b> YES</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T2_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T2_slide">
               <p><b>Q.</b> Did you go to bed later than planned (22:00) on 4 or more days this week?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T2_S1.gif" style="width:180px !important;"  alt="Example of Square visualization.">
                  <figcaption class="figure-caption">Example of Square size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">2 days  <=  4 days</br><b>Answer:</b> NO</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T2_understand_btn">I understand</button>
                  </div>
               </div>
            </div>
            <div class="task_explanation_T2_slide">
               <p><b>Q.</b> Did you go to bed later than planned (22:00) on 4 or more days this week?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T2_S2.gif" style="width:220px !important;"  alt="Example of Wide size visualization.">
                  <figcaption class="figure-caption">Example of Wide size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">4 days  >=  4 days</br><b>Answer:</b> YES</p>
               <div class="row">
                  <div class="col-sm-12">
                     <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                     <button type="button" class="btn btn-warning task_explanation_T2_understand_btn" style="width:80%;margin-top: -6px;">I understand</button>
                  </div>
               </div>
            </div>
            

            <div class="task_explanation_T2_slide">
               <p><b>Q.</b> Did you go to bed later than planned (22:00) on 4 or more days this week?</p>
               <figure class="img-container">
                  <img src="img/task_explanation/task_explanation_T2_S3.gif" style="height: 160px !important;"  alt="Example of Tall size visualization.">
                  <figcaption class="figure-caption">Example of Tall size visualization.</figcaption>
               </figure>
               <p class="text-center mt-0">1 day  <=  4 days</br><b>Answer:</b> NO</p>
               <div class="row">
                     <div class="col-sm-12">
                        <h5 class="d-inline-block align-middle text-muted task_explanation_T2_slide_counter"></h5>
                        <button type="button" class="btn btn-warning task_explanation_T2_understand_btn">I understand</button>
                     </div>
               </div>
            </div>

            <div class="task_explanation_T2_slide">
                     <p>During the experiment you will use these two buttons to answer. </p>
                     <div class="d-flex justify-content-center">
                        <div class = "btn-group-justified btn-group-lg btn-group-horizontal">
                           <button type="button" class="btn btn-info">No</button>
                           <button type="button" class="btn btn-info" style="margin-right: 15px;">Yes</button>
                        </div>
                     </div>
                     <p class="text-center text-muted" style="font-size:90%;">Example of answering buttons</p>
                     <div class="mt-4">
                     <p>  Hold your phone properly so that you can comfortably push these buttons. 
                     Press <strong>Next</strong> to move on.</p>
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
            $('.task_explanation_T2_slide_counter').text(count +"/7")
        };

        updateDisplay();
    
         $("#task_explanation_T1_slide_comment").hide();
         $("#btn_<?php echo $id;?>").hide();
         // $("#alert_correct_task_explanation_T1").hide();
         // $("#alert_wrong_task_explanation_T1").hide();
         
         $(".task_explanation_T2_understand_btn").click(function() {

        count++;
        updateDisplay();
        
        var current_div = $('#task_explanation_T2 .task_explanation_T2_slide.visible').first();
        var next_div = current_div.next();

        current_div.removeClass("visible").hide();
        next_div.addClass("visible").show();
        
        if (!next_div.next().length) {
            $('.task_explanation_T2_slide_counter').hide();
            $('.task_explanation_T2_understand_btn').hide();
            $("#btn_<?php echo $id;?>").show();
            // $('.radio_btn_task_explanation_T2').on('input', function() {
            //         var answer_T1 = $(this).val();
            //         if(answer_T1 === "no"){
            //             $("#alert_wrong_task_explanation_T1").hide();
            //             $("#alert_correct_task_explanation_T1").show();
            //             $("#btn_<?php echo $id;?>").show();
            //         }else{
            //             $("#btn_<?php echo $id;?>").hide();
            //             $("#alert_correct_task_explanation_T1").hide();
            //             $("#alert_wrong_task_explanation_T1").show();
            //         }
            // });
        }
    });
       
});

</script>

