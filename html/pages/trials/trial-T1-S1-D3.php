<style>
   .trial_images_T1S1D3{  
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
   .trial_images_T1S1D3 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
   }
   #gif_trial_images_T_T1S1D3{  
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
   #gif_trial_images_T_T1S1D3 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
   }
   #gif_trial_images_T_T1S1D3 .btn {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   -ms-transform: translate(-50%, -50%);
   background-color: #555;
   color: white;
   font-size: 16px;
   padding: 12px 24px;
   border: none;
   cursor: pointer;
   border-radius: 5px;
   text-align: center;
   }
   #gif_trial_images_T_T1S1D3 .btn:hover {
   background-color: black;
   }
</style>
<?php
   $total_image_T_T1S1D3          = 34;
   $experiment_order_T_T1S1D3     = 'T1-S1-D3';
   $chart_type_T_T1S1D3           = "S1";
   $img_start_T_T1S1D3            = $image_start_end["D3"][0];
   $img_end_T_T1S1D3              = $image_start_end["D3"][1];
   $trial_image_shuffle_T_T1S1D3  = array();
   $trial_image_shuffle_T_T1S1D3  = handleImage_T_T1S1D3($img_start_T_T1S1D3, $img_end_T_T1S1D3, $chart_type_T_T1S1D3);
     
   function handleImage_T_T1S1D3($img_start_T_T1S1D3, $img_end_T_T1S1D3, $chart_type_T_T1S1D3){
         $handle_task = fopen("img_csv/$chart_type_T_T1S1D3.csv",'r') or die("can't open file");
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
       for($i =0, $k = $img_start_T_T1S1D3; $k <= $img_end_T_T1S1D3; $k ++, $i++){
         if ($k  % 4 != 0) 
         {
           if(isset($images[$k]))
           {
             $temp_image_array[$i] = $images[$k];
           }
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
         <h5 id="header_question_T_T1S1D3">On which day did you sleep longer, Saturday or Sunday?</h5>
         <div class="d-flex justify-content-center" style="margin-top: 10px;" id="div_training_images_T_T1S1D3">
            <input type="hidden" id="current_trial_image_name_T_T1S1D3" value="">
            <div class="slideshow-container">
               <div class="slideshow-inner justify-content-center ">
                  <div id="gif_trial_images_T_T1S1D3">
                     <img  src="img/exp_start2.jpg"/>
                     <button class="btn glow-on-hover" id="btn_trial_images_T_T1S1D3">Start!</button>
                  </div>
                  <div id="div_trial_images_T_T1S1D3" style="display:none">
                     <?php
                        for( $i_T1S1D3 = 0; $i_T1S1D3 < 30; $i_T1S1D3++)
                        {  ?>  
                     <?php if($i_T1S1D3 == 6){ ?> 
                     <div class="trial_images_T1S1D3" id="T1S1D3-attn-s1_300_t1l">
                        <img  src="img/attention/T1_S1/attn-s1_300_t1l.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S1D3 == 13){ ?> 
                     <div class="trial_images_T1S1D3" id="T1S1D3-attn-s1_301_t1r">
                        <img  src="img/attention/T1_S1/attn-s1_301_t1r.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S1D3 == 20){ ?> 
                     <div class="trial_images_T1S1D3" id="T1S1D3-attn-s1_302_t1l">
                        <img  src="img/attention/T1_S1/attn-s1_302_t1l.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S1D3 == 27){ ?> 
                     <div class="trial_images_T1S1D3" id="T1S1D3-attn-s1_303_t1r">
                        <img  src="img/attention/T1_S1/attn-s1_303_t1r.png"/>
                     </div>
                     <?php } ?>
                     <div class="trial_images_T1S1D3" id="T1S1D3_<?php echo $i_T1S1D3; ?>_<?php echo $trial_image_shuffle_T_T1S1D3[$i_T1S1D3] ?>" >
                        <img id="img_T1S1D3_<?php echo $i_T1S1D3 ?>_<?php echo $trial_image_shuffle_T_T1S1D3[$i_T1S1D3] ?>" src="img/<?php echo $chart_type_T_T1S1D3; ?>/<?php echo $trial_image_shuffle_T_T1S1D3[$i_T1S1D3] ?>.png"/>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center" id="div_trainging_ans_buttons_T_T1S1D3">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
               <button type="button" id="btn_saturday_T_T1S1D3" class="btn btn-info">Sat</button>
               <button type="button" id="btn_sunday_T_T1S1D3" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
         </div>
         <div class="row mt-4 d-none" id="end_message_T_T1S1D3">
            <div class="alert alert-success col-md-4 col-md-offset-4">
               <h4 class="alert-heading"><i class="fa fa-check"></i> Congratulations!</h4>
               You finished your main trials. Please press <strong>Next</strong> to proceed.
            </div>
         </div>
         <div class=mt-4></div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var trial_image_count_T_T1S1D3 = <?php echo $total_image_T_T1S1D3; ?>;
   var viz_size_T_T1S1D3 = '<?php echo $chart_type_T_T1S1D3 ?>';
   var stimuli_T_T1S1D3 = viz_size_T_T1S1D3.toLowerCase();
   var image_index_T_T1S1D3 = 1; 
   var image_file_name_T_T1S1D3 = [];
   var chart_T_T1S1D3 = [];
   var task_T_T1S1D3 = [];
   var trial_T_T1S1D3 = [];
   var sequence_T_T1S1D3 = [];
   var feedback_T_T1S1D3 = [];
   var feedback_time_T_T1S1D3 = [];
   
   $(document).ready(function() {
     $("#btn_<?php echo $id;?>").hide();
     $("#btn_saturday_T_T1S1D3").hide();
     $("#btn_sunday_T_T1S1D3").hide();
   
     $("#btn_trial_images_T_T1S1D3").click(function(){
       $("#gif_trial_images_T_T1S1D3").hide();
       $('#div_trial_images_T_T1S1D3').show();
       $("#btn_saturday_T_T1S1D3").show();
       $("#btn_sunday_T_T1S1D3").show();
     }); 
   var time_counter_init_T_T1S1D3 = performance.now();
   set_current_time_T_T1S1D3(time_counter_init_T_T1S1D3);
   console.log("Initital time counter", time_counter_init_T_T1S1D3);
   show_images_T_T1S1D3(image_index_T_T1S1D3);
   
   function set_current_time_T_T1S1D3(time_counter){
     last_time_count_T_T1S1D3 = time_counter;
   }
   
   function show_images_T_T1S1D3(n){
         if( image_index_T_T1S1D3 > trial_image_count_T_T1S1D3){
         $("#div_training_images_T_T1S1D3").children().hide();
         $("#div_trainging_ans_buttons_T_T1S1D3").children().hide();
         $('#end_message_T_T1S1D3').removeClass("d-none");
         $("#header_question_T_T1S1D3").hide();
         $("#btn_<?php echo $id;?>").show();
           return;
         }
         var i;
         var slides_T_T1S1D3 = document.getElementsByClassName("trial_images_T1S1D3");
         if (n > slides_T_T1S1D3.length) {image_index_T_T1S1D3 = 1}
         if (n < 1) {image_index_T_T1S1D3 = slides_T_T1S1D3.length}
         for (i = 0; i < slides_T_T1S1D3.length; i++) {
             slides_T_T1S1D3[i].style.display = "none";
         }
         slides_T_T1S1D3[image_index_T_T1S1D3-1].style.display = "block";
         $('#current_trial_image_name_T_T1S1D3').val();
         // console.log(slides_T_T1S1D3[image_index_T_T1S1D3-1].id);
         $('#current_trial_image_name_T_T1S1D3').val(slides_T_T1S1D3[image_index_T_T1S1D3-1].id);
   
   }
   function next_images_T_T1S1D3(n){
       if (n < 0){
       show_images_T_T1S1D3(image_index_T_T1S1D3 -= 1);
       } else {
       show_images_T_T1S1D3(image_index_T_T1S1D3 += 1); 
       }
   }
   
   $("#btn_sunday_T_T1S1D3").click(function(){
           var current_trial_image_name_T_T1S1D3 = $('#current_trial_image_name_T_T1S1D3').val();
           //var attention_check = current_trial_image_name_T_T1S1D3.startsWith("T1S1D3ATTN-");
           time_counter_sunday_btn_T_T1S1D3 = performance.now();
           image_file_name_T_T1S1D3.push(current_trial_image_name_T_T1S1D3);
           chart_T_T1S1D3.push(stimuli_T_T1S1D3);
           task_T_T1S1D3.push("t1");
           var start_pos = current_trial_image_name_T_T1S1D3.indexOf('_') + 1;
           var end_pos = current_trial_image_name_T_T1S1D3.indexOf('_',start_pos);
           var image_number = current_trial_image_name_T_T1S1D3.substring(start_pos,end_pos);
           sequence_T_T1S1D3.push(image_number);
           trial_T_T1S1D3.push(image_index_T_T1S1D3);
   
           var sliced_current_trial_image_name = current_trial_image_name_T_T1S1D3.slice(current_trial_image_name_T_T1S1D3.lastIndexOf('t1') + 2);
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
           if(feedback_match === 'r'){
             feedback_T_T1S1D3.push("correct");
             feedback_time_T_T1S1D3.push(time_counter_sunday_btn_T_T1S1D3 - last_time_count_T_T1S1D3);
           }else{
             feedback_T_T1S1D3.push("error");
             feedback_time_T_T1S1D3.push(time_counter_sunday_btn_T_T1S1D3 - last_time_count_T_T1S1D3);
           }
           set_current_time_T_T1S1D3(time_counter_sunday_btn_T_T1S1D3);
           next_images_T_T1S1D3(1);
   }); 
   
   $("#btn_saturday_T_T1S1D3").click(function(){
       var current_trial_image_name_T_T1S1D3 = $('#current_trial_image_name_T_T1S1D3').val();
           time_counter_saturday_btn_T_T1S1D3 = performance.now();
         
           image_file_name_T_T1S1D3.push(current_trial_image_name_T_T1S1D3);
           chart_T_T1S1D3.push(stimuli_T_T1S1D3);
           task_T_T1S1D3.push("t1");
           var start_pos = current_trial_image_name_T_T1S1D3.indexOf('_') + 1;
           var end_pos = current_trial_image_name_T_T1S1D3.indexOf('_',start_pos);
           var image_number = current_trial_image_name_T_T1S1D3.substring(start_pos,end_pos)
           // console.log("Image Seq", image_number)
           sequence_T_T1S1D3.push(image_number);
           trial_T_T1S1D3.push(image_index_T_T1S1D3);
   
           var sliced_current_trial_image_name = current_trial_image_name_T_T1S1D3.slice(current_trial_image_name_T_T1S1D3.lastIndexOf('t1') + 2);
   
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
           if(feedback_match === 'l'){
             feedback_T_T1S1D3.push("correct");
             feedback_time_T_T1S1D3.push(time_counter_saturday_btn_T_T1S1D3 - last_time_count_T_T1S1D3);
           }else{
             feedback_T_T1S1D3.push("error");
             feedback_time_T_T1S1D3.push(time_counter_saturday_btn_T_T1S1D3 - last_time_count_T_T1S1D3);
           }
   
           set_current_time_T_T1S1D3(time_counter_saturday_btn_T_T1S1D3);
           next_images_T_T1S1D3(1);
      
   }); 
   
   });
   
   $('body').on('next', function(e, type){
      event.preventDefault();
      var page_name_T_T1S1D3                 = '<?php echo $id;?>';
      var participant_id_T_T1S1D3            = $('#participant_id').val();
      var system_generated_id_T_T1S1D3       = $('#system_generated_id').val();
      var experiment_sequence_T_T1S1D3       = '<?php echo $between_subject_sequence;?>';
      var experiment_order_T_T1S1D3          = '<?php echo $experiment_order_T_T1S1D3;?>';
      var is_main_trial_T_T1S1D3             = 1;
     if (type === '<?php echo $id;?>'){
   
      $.ajax({
           type        : 'POST',  
           url         : 'ajax/experiment_data_save.php',  
           data        : { 
                                  page_name                   : JSON.stringify(page_name_T_T1S1D3), 
                                  participant_id              : JSON.stringify(participant_id_T_T1S1D3), 
                                  system_generated_id         : JSON.stringify(system_generated_id_T_T1S1D3), 
                                  experiment_sequence         : JSON.stringify(experiment_sequence_T_T1S1D3),
                                  experiment_order            : JSON.stringify(experiment_order_T_T1S1D3),
                                  is_main_trial               : JSON.stringify(is_main_trial_T_T1S1D3),
                                  task                        : JSON.stringify(task_T_T1S1D3),
                                  visualization_size          : JSON.stringify(chart_T_T1S1D3),
                                  trial_order                 : JSON.stringify(trial_T_T1S1D3),
                                  image_file_order            : JSON.stringify(sequence_T_T1S1D3),
                                  answering_time              : JSON.stringify(feedback_time_T_T1S1D3),
                                  answer                      : JSON.stringify(feedback_T_T1S1D3),
                                  image_file_name             : JSON.stringify(image_file_name_T_T1S1D3)
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
       
   });
   
</script>