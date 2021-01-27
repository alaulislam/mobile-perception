<style>
   .attention_check_failed_slide:not(:first-child) {
   display: none;
   }
   .controls {
   width: 200px;
   }
   .pre {
   float: left;
   }
   .attention_check_failed_understand_btn {
   float: right;
   }
   .img-container {
   text-align: center;
   }
</style>
<?php 
$task_name_failed_page = $task[0]; 
$task_during_the_experiment = "";
if($task_name_failed_page == "T1"){
   $task_during_the_experiment = "On which day did you sleep longer, Saturday or Sunday?";
}
if($task_name_failed_page == "T2"){
   $task_during_the_experiment = "Did you go to bed later than planned (22:00) on 4 or more days this week?";
}
if($task_name_failed_page == "T3"){
   $task_during_the_experiment = "Did you sleep longer on average on the weekend days (Sat, Sun) compared to the weekdays (Mon-Fri)?";
}

?>
<div class="row">
<div class="col">
   <div class="container">
      <div class="mt-1 d-flex justify-content-center section-header">
         <h3>We are sorry, but you cannot continue the experiment</h3>
      </div>
      <div id="attention_check_failed">
         <div class="visible attention_check_failed_slide">
            <p>On the previous page, you did not choose the right answer and, consequently, did not pass the attention check test.</p>
            <p>In the initial experiment instructions, we warned you that there would be an attention check, and that if you failed it, you would not be paid.</p>
            <div class="mt-4"></div>
            <div class="row">
               <div class="col-sm-12">
                  <h5 class="d-inline-block align-middle text-muted attention_check_failed_counter_display mt-2" ></h5>
                  <button type="button" class="btn btn-warning attention_check_failed_understand_btn" style="width:80%">I understand</button>
               </div>
            </div>
         </div>
         <div class="attention_check_failed_slide">
            <p id="att_failed">
               We asked, <strong>What was the task?</strong>
               </br>The right answer was: </br><em style="color: green"> <?php echo  $task_during_the_experiment;?></em>
               </br>
               And the second question was,
               <strong>What type of data did you see during the experiment?</strong></br>
               The right answer was: </br><em style="color: green"> Sleep data</em>
            </p>
            <div class="row">
               <div class="col-sm-12">
                  <h5 class="d-inline-block align-middle text-muted attention_check_failed_counter_display mt-2"></h5>
                  <button type="button" class="btn btn-warning attention_check_failed_understand_btn" style="width:80%">I understand</button>
               </div>
            </div>
         </div>
         <div class="attention_check_failed_slide">
            <p>For our research study to be valid, it is critical for us to get reliable data. To get reliable data, we need to make sure that our participants read all instructions. Your response to the previous attention check is an indication that you may not have paid full attention to all our instructions.</p>
            <p>Please feel free to contact us if you have any question or complaint. Email:</br><a href="mailto:mohammad-alaul.islam@inria.fr">mohammad-alaul.islam@inria.fr</a></p>
         </div>
      </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
       let count = 1;
       function updateDisplay(){
           $('.attention_check_failed_counter_display').text(count +"/3")
       };
   
       updateDisplay();
       
            $("#attention_check_failed_comment").hide();
            $("#btn_<?php echo $id;?>").hide();
            $(".attention_check_failed_understand_btn").click(function() {
               count++;
               updateDisplay();
                var current_div = $('#attention_check_failed .attention_check_failed_slide.visible').first();
               var next_div = current_div.next();

               current_div.removeClass("visible").hide();
               next_div.addClass("visible").show();
               if (!next_div.next().length) {
                   $(this).hide();
                   $('.attention_check_failed_counter_display').hide();
                   $('.attention_check_failed_understand_btn').hide();
               }
           });
   
          
   });
   
   
</script>