<style>
   .trial_images_P_T1S3D1{  
   width: 213px;
   height: 213px;
   border: 2px solid black;
   margin: 10px 0px 10px 0;
   position: relative; /* added */
   border-top: 15px solid black;
   border-top-left-radius: 20px;
   border-top-right-radius: 20px;
   border-bottom: 28px solid black;
   border-bottom-left-radius: 15px;
   border-bottom-right-radius: 15px;
   border-left: 18px solid black;
   border-right: 18px solid black; 
   background: black;
   } 
   .trial_images_P_T1S3D1 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
   }
   .img-container {
   text-align: center;
   }
   .modal-header{
   border:0px;
   max-height: 0px !important;
   }
   .modal-footer{
   border:0px;
   }
</style>
<?php
   $total_image_P_T1S3D1 = 15;
   $experiment_order_P_T1S3D1 ="T1-S3-D1";
   $chart_type_P_T1S3D1 = "S3";
   $img_start_P_T1S3D1 = $image_start_end["D1"][0]; 
   $img_end_P_T1S3D1 = $image_start_end["D1"][1]; 
   $trial_shuffle_P_T1S3D1 = array();
   $trial_shuffle_P_T1S3D1 = handleImageimage_P_T1S3D1($img_start_P_T1S3D1, $img_end_P_T1S3D1, $chart_type_P_T1S3D1);
     
   function handleImageimage_P_T1S3D1($img_start_P_T1S3D1, $img_end_P_T1S3D1, $chart_type_P_T1S3D1){
         $handle_task = fopen("img_csv/$chart_type_P_T1S3D1.csv",'r') or die("can't open file");
         $task_data = fgetcsv($handle_task, 1000, ",");
         $images = array();
         while (($task_data = fgetcsv($handle_task, 1000, ",")) !== FALSE) {
             $image_name = $task_data[0];
             if ( !in_array($image_name, $images) ) {
                 array_push($images, $image_name);
             }
         }
       fclose($handle_task) or die("can't close file");
       $temp_image_array = array();
       
   
       for($i =0, $k = $img_start_P_T1S3D1; $k <= $img_end_P_T1S3D1; $k += 4, $i++){
         if(isset($images[$k]))
         {
           $temp_image_array[$i] = $images[$k];
         }
       }
   
       $practice_trial_shuffle = [];
       $practice_trial_shuffle= $temp_image_array;
       shuffle($practice_trial_shuffle);
       if(isset($practice_trial_shuffle[0]) && isset($practice_trial_shuffle[2]) && isset($practice_trial_shuffle[7]) 
       && isset($practice_trial_shuffle[3]) && isset($practice_trial_shuffle[6]) )
       {
         array_push($practice_trial_shuffle, $practice_trial_shuffle[0]);
         array_push($practice_trial_shuffle, $practice_trial_shuffle[2]);
         array_push($practice_trial_shuffle, $practice_trial_shuffle[7]);
         array_push($practice_trial_shuffle, $practice_trial_shuffle[3]);
         array_push($practice_trial_shuffle, $practice_trial_shuffle[6]);
       }
   
       return $practice_trial_shuffle;
     }
   
   ?>  
<div class="row">
   <div class="col">
      <div class="container">
         <div class=mt-3></div>
         <h5 id="header_question_P_T1S3D1">On which day did you sleep longer, Saturday or Sunday?</h5>
         <div class="d-flex justify-content-center" id="div_trainging_images_P_T1S3D1">
            <input type="hidden" id="current_trial_image_name_P_T1S3D1" name="current_trial_image_name_P_T1S3D1" value="">
            <div class="slideshow-container">
               <div class="slideshow-inner justify-content-center">
                  <?php
                     for( $i_P_T1S3D1 = 0; $i_P_T1S3D1 < $total_image_P_T1S3D1; $i_P_T1S3D1++)
                     {  ?>                                     
                  <div class="trial_images_P_T1S3D1" id="P-T1S3D1-<?php echo $i_P_T1S3D1; ?>-<?php echo $trial_shuffle_P_T1S3D1[$i_P_T1S3D1] ?>">
                     <img id="img-P-T1S3D1-<?php echo $i_P_T1S3D1 ?>-<?php echo $trial_shuffle_P_T1S3D1[$i_P_T1S3D1] ?>" src="img/<?php echo $chart_type_P_T1S3D1 ?>/<?php echo $trial_shuffle_P_T1S3D1[$i_P_T1S3D1] ?>.png"/>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center" id="div_trainging_ans_buttons_P_T1S3D1">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
               <button type="button" id="btn_saturday_P_T1S3D1" class="btn btn-info">Sat</button>
               <button type="button" id="btn_sunday_P_T1S3D1" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
         </div>
         <div class="row mt-4 d-none" id="end_message_P_T1S3D1">
            <div class="alert alert-success col-md-4 col-md-offset-4">
               <h4 class="alert-heading"><i class="fa fa-check"></i> Congratulations!</h4>
               You finished your training trials. Please click <strong>Next</strong> to proceed with the main trails.
            </div>
         </div>
         <div class=mt-4></div>
         <div class="modal left xs fade" id="modal_correct_ans_P_T1S3D1" tabindex="-1" role="dialog" aria-labelledby="top_modal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
               <div class="modal-content h-auto rounded-right">
                  <div class="mt-1"></div>
                  <div class="modal-header d-none" id="modal_correct_dismiss_P_T1S3D1">
                     <!-- <h5 class="modal-title"><i class="fa fa-cog"></i> Preferences</h5> -->
                     <button type="button" class="close" id="modal_correct_dismiss_btn_P_T1S3D1"  data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body text-center">
                     <div class="row">
                        <div class="col-4 img-container">
                           <img src="img/icons/correct.png" style="height:40px !important;"  alt="CORRECT!">
                        </div>
                        <div class="col-8">
                           <p class="lead" style="margin-left:-30px">Your answer is correct!</p>
                        </div>
                     </div>
                     <div class="progress">
                        <div class="progress-bar bg-info" id="progress_bar_correct_P_T1S3D1" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div style="margin-top:-15px"></div>
                  <div class="modal-footer">
                     <p class="d-none" id="btn_next_correct_modal_message_P_T1S3D1">Training is over, wait a moment please!</p>
                     <button type="button" class="btn btn-dark border rounded-pill btn-wider w-100" id="btn_next_correct_modal_P_T1S3D1">NEXT</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal left xs fade" id="modal_error_ans_P_T1S3D1" tabindex="-1" role="dialog" aria-labelledby="top_modal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
               <div class="modal-content h-auto rounded-right">
                  <div class="mt-1"></div>
                  <div class="modal-body text-center">
                     <div class="row">
                        <div class="col-4 img-container">
                           <img src="img/icons/error.png" style="height:40px !important;"  alt="Wrong!">
                        </div>
                        <div class="col-8">
                           <p class="lead" style="margin-left:-30px">Your answer is wrong!</p>
                        </div>
                     </div>
                     <div class="progress">
                        <div class="progress-bar bg-info" id="progress_bar_error_P_T1S3D1" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div style="margin-top:-15px"></div>
                  <div class="modal-footer">
                     <p class="d-none" id="btn_next_error_modal_message_P_T1S3D1">Training is over, wait a moment please!</p>
                     <button type="button" class="btn btn-dark border rounded-pill btn-wider w-100" id="btn_next_error_modal_P_T1S3D1">NEXT</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var trial_image_count_P_T1S3D1 = <?php echo $total_image_P_T1S3D1; ?>;
   var viz_size_P_T1S3D1 = '<?php echo $chart_type_P_T1S3D1 ?>';
   var stimuli_P_T1S3D1 = viz_size_P_T1S3D1.toLowerCase();
   var image_index_P_T1S3D1 = 1;
   var image_file_name_P_T1S3D1 = [];
   var chart_P_T1S3D1 = [];
   var task_P_T1S3D1 = [];
   var trial_P_T1S3D1 = [];
   var sequence_P_T1S3D1 = [];
   var feedback_P_T1S3D1 = [];
   var feedback_time_P_T1S3D1 = [];
   
   $(document).ready(function() { 
   
     $("#btn_<?php echo $id;?>").hide();
       var time_counter_init_P_T1S3D1 = performance.now();
       set_current_time_P_T1S3D1(time_counter_init_P_T1S3D1);
      //  console.log("Initital time counter", time_counter_init_P_T1S3D1);
       show_images_P_T1S3D1(image_index_P_T1S3D1);
       function set_current_time_P_T1S3D1(time_counter){
         last_time_count_P_T1S3D1 = time_counter;
       }
       function button_enable_P_T1S3D1(){
           $('#btn_saturday_P_T1S3D1').prop('disabled', false);
           $('#btn_sunday_P_T1S3D1').prop('disabled', false);
       }
       function show_images_P_T1S3D1(n){
             if( image_index_P_T1S3D1 === trial_image_count_P_T1S3D1){
                $("#btn_next_correct_modal_P_T1S3D1").hide();
                $("#btn_next_error_modal_P_T1S3D1").hide();
                $('#btn_next_correct_modal_message_P_T1S3D1').removeClass("d-none");
                $('#btn_next_error_modal_message_P_T1S3D1').removeClass("d-none");
             }
             if( image_index_P_T1S3D1 > trial_image_count_P_T1S3D1){
              $("#div_trainging_images_P_T1S3D1").children().hide();
              $("#div_trainging_ans_buttons_P_T1S3D1").children().hide();
              $('#end_message_P_T1S3D1').removeClass("d-none");
              $("#header_question_P_T1S3D1").hide();
              $("#btn_<?php echo $id;?>").show();
               return;
             }
             
             var i_P_T1S3D1;
             var slides_P_T1S3D1 = document.getElementsByClassName("trial_images_P_T1S3D1");
             if (n > slides_P_T1S3D1.length) {image_index_P_T1S3D1 = 1}
             if (n < 1) {image_index_P_T1S3D1 = slides_P_T1S3D1.length}
             for (i_P_T1S3D1 = 0; i_P_T1S3D1 < slides_P_T1S3D1.length; i_P_T1S3D1++) {
                 slides_P_T1S3D1[i_P_T1S3D1].style.display = "none";
             }
             slides_P_T1S3D1[image_index_P_T1S3D1-1].style.display = "block";
             $('#current_trial_image_name_P_T1S3D1').val();
             // console.log(slides_P_T1S3D1[image_index_P_T1S3D1-1].id);
             $('#current_trial_image_name_P_T1S3D1').val(slides_P_T1S3D1[image_index_P_T1S3D1-1].id);
       }
       function next_images_P_T1S3D1(n){
           button_enable_P_T1S3D1();
           if (n < 0){
           show_images_P_T1S3D1(image_index_P_T1S3D1 -= 1);
           } else {
           show_images_P_T1S3D1(image_index_P_T1S3D1 += 1); 
           }
       }
       var progress_bar_interval_P_T1S3D1;
       function clear_modal_progress_bar_interval_P_T1S3D1(){
         clearInterval(progress_bar_interval_P_T1S3D1);
       }
       function fill_progress_bar_P_T1S3D1(answer){
         var progressBar =  $("#progress_bar_"+answer+"_P_T1S3D1"),
             width = 0;
             progressBar.width(width);
             progress_bar_interval_P_T1S3D1 = setInterval(function() {
                 width += 2;
                 progressBar.css('width', width + '%');
                 if (width >= 100) {
                     clearInterval(progress_bar_interval_P_T1S3D1);
                     if(answer === "correct"){
                       $('#modal_correct_ans_P_T1S3D1').fadeOut(100,function(){
                           $('#modal_correct_ans_P_T1S3D1').modal('hide');
                       });
                     }
                     if(answer === "error"){
                       $('#modal_error_ans_P_T1S3D1').fadeOut(100,function(){
                           $('#modal_error_ans_P_T1S3D1').modal('hide');
                       });
                     }
                     next_images_P_T1S3D1(1);
                     progressBar.css('width', 0 + '%');
                 }
             }, 100); // 5 second = 100/width 2 => 50 => .1*50 [[ 100= .1 second ]] ; if width=1 => 10 second or, 50 = .05
       }
   
       $("#btn_sunday_P_T1S3D1").click(function(){
           var current_trial_image_name_P_T1S3D1 = $('#current_trial_image_name_P_T1S3D1').val();
           var time_counter_left_P_T1S3D1 = performance.now();
           // console.log("Left button clicked" + (time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1) + " milliseconds.")
        
           image_file_name_P_T1S3D1.push(current_trial_image_name_P_T1S3D1);
         //   var stimuli_P_T1S3D1 = current_trial_image_name_P_T1S3D1.substring(0,2);
           chart_P_T1S3D1.push(stimuli_P_T1S3D1);
           task_P_T1S3D1.push("t1");
           var start_pos_P_T1S3D1 = current_trial_image_name_P_T1S3D1.indexOf('_') + 1;
           var end_pos_P_T1S3D1 = current_trial_image_name_P_T1S3D1.indexOf('_',start_pos_P_T1S3D1);
           var image_number_P_T1S3D1 = current_trial_image_name_P_T1S3D1.substring(start_pos_P_T1S3D1,end_pos_P_T1S3D1)
           // console.log("Trial No", image_number_P_T1S3D1)
           sequence_P_T1S3D1.push(image_number_P_T1S3D1);
           trial_P_T1S3D1.push(image_index_P_T1S3D1);
   
           var sliced_current_trial_image_name_P_T1S3D1 = current_trial_image_name_P_T1S3D1.slice(current_trial_image_name_P_T1S3D1.lastIndexOf('t1') + 2);
           var feedback_match_P_T1S3D1 = sliced_current_trial_image_name_P_T1S3D1.substr(0, 1);
           if(feedback_match_P_T1S3D1 === 'r'){
             $('#modal_correct_ans_P_T1S3D1').modal('show');
             clear_modal_progress_bar_interval_P_T1S3D1();
             fill_progress_bar_P_T1S3D1("correct");
            $("#btn_next_correct_modal_P_T1S3D1").off('click').on('click', function(){
              clear_modal_progress_bar_interval_P_T1S3D1();
              $("#progress_bar_correct_P_T1S3D1").css('width', 0 + '%');
               $('#modal_correct_ans_P_T1S3D1').modal('toggle');
              //  $('#modal_correct_ans_P_T1S3D1').fadeOut(100,function(){ $('#modal_correct_ans_P_T1S3D1').modal('hide'); });
               next_images_P_T1S3D1(1);
             });
             feedback_P_T1S3D1.push("correct");
             feedback_time_P_T1S3D1.push(time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1);
           }else{
              $('#modal_error_ans_P_T1S3D1').modal('show');
              clear_modal_progress_bar_interval_P_T1S3D1();
              fill_progress_bar_P_T1S3D1("error");
              $("#btn_next_error_modal_P_T1S3D1").off('click').on('click', function(){
                clear_modal_progress_bar_interval_P_T1S3D1();
                $("#progress_bar_error_P_T1S3D1").css('width', 0 + '%');
                    $('#modal_error_ans_P_T1S3D1').modal('toggle');
              //  $('#modal_error_ans_P_T1S3D1').fadeOut(100,function(){$('#modal_error_ans_P_T1S3D1').modal('hide'); });
               next_images_P_T1S3D1(1);
             });
   
             feedback_P_T1S3D1.push("error");
             feedback_time_P_T1S3D1.push(time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1);
           }
           set_current_time_P_T1S3D1(time_counter_left_P_T1S3D1);
       }); 
   
       $("#btn_saturday_P_T1S3D1").click(function(){
   
           var current_trial_image_name_P_T1S3D1 = $('#current_trial_image_name_P_T1S3D1').val();
           time_counter_left_P_T1S3D1 = performance.now();
           // console.log("Left button clicked" + (time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1) + " milliseconds.")
   
           image_file_name_P_T1S3D1.push(current_trial_image_name_P_T1S3D1);
         //   var stimuli_P_T1S3D1 = current_trial_image_name_P_T1S3D1.substring(8,2);
           chart_P_T1S3D1.push(stimuli_P_T1S3D1);
           task_P_T1S3D1.push("t1");
           var start_pos_P_T1S3D1 = current_trial_image_name_P_T1S3D1.indexOf('_') + 1;
           var end_pos_P_T1S3D1 = current_trial_image_name_P_T1S3D1.indexOf('_',start_pos_P_T1S3D1);
           var image_number_P_T1S3D1 = current_trial_image_name_P_T1S3D1.substring(start_pos_P_T1S3D1,end_pos_P_T1S3D1)
           // console.log("Image Seq", image_number_P_T1S3D1)
           sequence_P_T1S3D1.push(image_number_P_T1S3D1);
           trial_P_T1S3D1.push(image_index_P_T1S3D1);
   
           var sliced_current_trial_image_name_P_T1S3D1 = current_trial_image_name_P_T1S3D1.slice(current_trial_image_name_P_T1S3D1.lastIndexOf('t1') + 2);
   
           var feedback_match_P_T1S3D1 = sliced_current_trial_image_name_P_T1S3D1.substr(0, 1);
           if(feedback_match_P_T1S3D1 === 'l'){
             $('#modal_correct_ans_P_T1S3D1').modal('show');
             clear_modal_progress_bar_interval_P_T1S3D1();
             fill_progress_bar_P_T1S3D1("correct");
            $("#btn_next_correct_modal_P_T1S3D1").off('click').on('click', function(){
              clear_modal_progress_bar_interval_P_T1S3D1();
              $("#progress_bar_correct_P_T1S3D1").css('width', 0 + '%');
               $('#modal_correct_ans_P_T1S3D1').fadeOut(100,function(){ $('#modal_correct_ans_P_T1S3D1').modal('hide'); });
               next_images_P_T1S3D1(1);
             });
             feedback_P_T1S3D1.push("correct");
             feedback_time_P_T1S3D1.push(time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1);
           }else{
             $('#modal_error_ans_P_T1S3D1').modal('show');
              clear_modal_progress_bar_interval_P_T1S3D1();
              fill_progress_bar_P_T1S3D1("error");
              $("#btn_next_error_modal_P_T1S3D1").off('click').on('click', function(){
                clear_modal_progress_bar_interval_P_T1S3D1();
                $("#progress_bar_error_P_T1S3D1").css('width', 0 + '%');
              // $("#btn_next_error_modal_P_T1S3D1").click(function(){
               $('#modal_error_ans_P_T1S3D1').fadeOut(100,function(){$('#modal_error_ans_P_T1S3D1').modal('hide'); });
               next_images_P_T1S3D1(1);
              });
             feedback_P_T1S3D1.push("error");
             feedback_time_P_T1S3D1.push(time_counter_left_P_T1S3D1 - last_time_count_P_T1S3D1);
           }
           set_current_time_P_T1S3D1(time_counter_left_P_T1S3D1);
       });
   });
   
   $('body').on('next', function(e, type){
     // var page_number = $('#page_' + type).val();
     //  console.log("page number",  type);
     event.preventDefault();
      var page_name_P_T1S3D1                   = '<?php echo $id;?>';
      var participant_id_P_T1S3D1              = $('#participant_id').val();
      var system_generated_id_P_T1S3D1         = $('#system_generated_id').val();
      var experiment_sequence_P_T1S3D1         = '<?php echo $between_subject_sequence;?>';
      var experiment_order_P_T1S3D1            = '<?php echo $experiment_order_P_T1S3D1;?>';
      var is_main_trial_P_T1S3D1               = 0;
     if (type === '<?php echo $id;?>'){
       $.ajax({
           type        : 'POST',  
           url         : 'ajax/experiment_data_save.php',  
           data        : { 
                                  page_name                   : JSON.stringify(page_name_P_T1S3D1), 
                                  participant_id              : JSON.stringify(participant_id_P_T1S3D1), 
                                  system_generated_id         : JSON.stringify(system_generated_id_P_T1S3D1), 
                                  experiment_sequence         : JSON.stringify(experiment_sequence_P_T1S3D1),
                                  experiment_order            : JSON.stringify(experiment_order_P_T1S3D1),
                                  is_main_trial               : JSON.stringify(is_main_trial_P_T1S3D1),
                                  task                        : JSON.stringify(task_P_T1S3D1),
                                  visualization_size          : JSON.stringify(chart_P_T1S3D1),
                                  trial_order                 : JSON.stringify(trial_P_T1S3D1),
                                  image_file_order            : JSON.stringify(sequence_P_T1S3D1),
                                  answering_time              : JSON.stringify(feedback_time_P_T1S3D1),
                                  answer                      : JSON.stringify(feedback_P_T1S3D1),
                                  image_file_name             : JSON.stringify(image_file_name_P_T1S3D1)
                         }, 
           dataType    : 'json',  
           success:function(response){
               if( response.status == 'error' ) {
                 console.log('Something bad happened!');
               } else {
                   console.log(response.participant_id);
               }
           },
           complete: function(response, textStatus) {
             // console.log(textStatus)
           },
           error:function (jqXHR, status, thrownError){
                console.log(jqXHR);
                console.log(status);
                console.log(thrownError);
           }
       });
   
     }
     // $('#'+type).remove();
       
   });
   
</script>