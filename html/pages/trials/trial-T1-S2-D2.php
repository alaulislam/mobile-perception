<style>
   .trial_images_T1S2D2{  
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
   .trial_images_T1S2D2 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
   }
   #gif_trial_images_T_T1S2D2{  
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
   #gif_trial_images_T_T1S2D2 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
   }
   #gif_trial_images_T_T1S2D2 .btn {
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
   #gif_trial_images_T_T1S2D2 .btn:hover {
   background-color: black;
   }
</style>
<?php
   $total_image_T_T1S2D2          = 34;
   $experiment_order_T_T1S2D2     = 'T1-S2-D2';
   $chart_type_T_T1S2D2           = "S2";
   $img_start_T_T1S2D2            = $image_start_end["D2"][0];
   $img_end_T_T1S2D2              = $image_start_end["D2"][1];
   $trial_image_shuffle_T_T1S2D2  = array();
   $trial_image_shuffle_T_T1S2D2  = handleImage_T_T1S2D2($img_start_T_T1S2D2, $img_end_T_T1S2D2, $chart_type_T_T1S2D2);
     
   function handleImage_T_T1S2D2($img_start_T_T1S2D2, $img_end_T_T1S2D2, $chart_type_T_T1S2D2){
         $handle_task = fopen("img_csv/$chart_type_T_T1S2D2.csv",'r') or die("can't open file");
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
       for($i =0, $k = $img_start_T_T1S2D2; $k <= $img_end_T_T1S2D2; $k ++, $i++){
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
         <h5 id="header_question_T_T1S2D2">On which day did you sleep longer, Saturday or Sunday?</h5>
         <div class="d-flex justify-content-center" style="margin-top: 10px;" id="div_training_images_T_T1S2D2">
            <input type="hidden" id="current_trial_image_name_T_T1S2D2" value="">
            <div class="slideshow-container">
               <div class="slideshow-inner justify-content-center ">
                  <div id="gif_trial_images_T_T1S2D2">
                     <img  src="img/exp_start2.jpg"/>
                     <button class="btn glow-on-hover" id="btn_trial_images_T_T1S2D2">Start!</button>
                  </div>
                  <div id="div_trial_images_T_T1S2D2" style="display:none">
                     <?php
                        for( $i_T1S2D2 = 0; $i_T1S2D2 < 30; $i_T1S2D2++)
                        {  ?>  
                     <?php if($i_T1S2D2 == 6){ ?> 
                     <div class="trial_images_T1S2D2" id="T1S2D2-attn-s2_300_t1l">
                        <img  src="img/attention/T1_S2/attn-s2_300_t1l.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S2D2 == 13){ ?> 
                     <div class="trial_images_T1S2D2" id="T1S2D2-attn-s2_301_t1r">
                        <img  src="img/attention/T1_S2/attn-s2_301_t1r.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S2D2 == 20){ ?> 
                     <div class="trial_images_T1S2D2" id="T1S2D2-attn-s2_302_t1l">
                        <img  src="img/attention/T1_S2/attn-s2_302_t1l.png"/>
                     </div>
                     <?php } ?>
                     <?php if($i_T1S2D2 == 27){ ?> 
                     <div class="trial_images_T1S2D2" id="T1S2D2-attn-s2_303_t1r">
                        <img  src="img/attention/T1_S2/attn-s2_303_t1r.png"/>
                     </div>
                     <?php } ?>
                     <div class="trial_images_T1S2D2" id="T1S2D2-<?php echo $i_T1S2D2; ?>-<?php echo $trial_image_shuffle_T_T1S2D2[$i_T1S2D2] ?>" >
                        <img id="img-T1S2D2-<?php echo $i_T1S2D2 ?>-<?php echo $trial_image_shuffle_T_T1S2D2[$i_T1S2D2] ?>" src="img/<?php echo $chart_type_T_T1S2D2; ?>/<?php echo $trial_image_shuffle_T_T1S2D2[$i_T1S2D2] ?>.png"/>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center" id="div_trainging_ans_buttons_T_T1S2D2">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
               <button type="button" id="btn_saturday_T_T1S2D2" class="btn btn-info">Sat</button>
               <button type="button" id="btn_sunday_T_T1S2D2" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
         </div>
         <div class="row mt-4 d-none" id="end_message_T_T1S2D2">
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
   var trial_image_count_T_T1S2D2 = <?php echo $total_image_T_T1S2D2; ?>;
   var viz_size_T_T1S2D2 = '<?php echo $chart_type_T_T1S2D2 ?>';
   var stimuli_T_T1S2D2 = viz_size_T_T1S2D2.toLowerCase();
   var image_index_T_T1S2D2 = 1; 
   var image_file_name_T_T1S2D2 = [];
   var chart_T_T1S2D2 = [];
   var task_T_T1S2D2 = [];
   var trial_T_T1S2D2 = [];
   var sequence_T_T1S2D2 = [];
   var feedback_T_T1S2D2 = [];
   var feedback_time_T_T1S2D2 = [];
   var attention_check_flag_T_T1S2D2 = false;
   var attention_check_counter_T_T1S2D2 = 0;
   
   $(document).ready(function() {
     $("#btn_<?php echo $id;?>").hide();
     $("#btn_saturday_T_T1S2D2").hide();
     $("#btn_sunday_T_T1S2D2").hide();
   
     $("#btn_trial_images_T_T1S2D2").click(function(){
       $("#gif_trial_images_T_T1S2D2").hide();
       $('#div_trial_images_T_T1S2D2').show();
       $("#btn_saturday_T_T1S2D2").show();
       $("#btn_sunday_T_T1S2D2").show();
     }); 
   var time_counter_init_T_T1S2D2 = performance.now();
   set_current_time_T_T1S2D2(time_counter_init_T_T1S2D2);
   console.log("Initital time counter", time_counter_init_T_T1S2D2);
   show_images_T_T1S2D2(image_index_T_T1S2D2);
   
   function set_current_time_T_T1S2D2(time_counter){
     last_time_count_T_T1S2D2 = time_counter;
   }
   
   function show_images_T_T1S2D2(n){
         if( image_index_T_T1S2D2 > trial_image_count_T_T1S2D2){
         $("#div_training_images_T_T1S2D2").children().hide();
         $("#div_trainging_ans_buttons_T_T1S2D2").children().hide();
         $('#end_message_T_T1S2D2').removeClass("d-none");
         $("#header_question_T_T1S2D2").hide();
         $("#btn_<?php echo $id;?>").show();
           return;
         }
         var i;
         var slides_T_T1S2D2 = document.getElementsByClassName("trial_images_T1S2D2");
         if (n > slides_T_T1S2D2.length) {image_index_T_T1S2D2 = 1}
         if (n < 1) {image_index_T_T1S2D2 = slides_T_T1S2D2.length}
         for (i = 0; i < slides_T_T1S2D2.length; i++) {
             slides_T_T1S2D2[i].style.display = "none";
         }
         slides_T_T1S2D2[image_index_T_T1S2D2-1].style.display = "block";
         $('#current_trial_image_name_T_T1S2D2').val();
         // console.log(slides_T_T1S2D2[image_index_T_T1S2D2-1].id);
         $('#current_trial_image_name_T_T1S2D2').val(slides_T_T1S2D2[image_index_T_T1S2D2-1].id);
   
   }
   function next_images_T_T1S2D2(n){
       if (n < 0){
       show_images_T_T1S2D2(image_index_T_T1S2D2 -= 1);
       } else {
       show_images_T_T1S2D2(image_index_T_T1S2D2 += 1); 
       }
   }
   
   $("#btn_sunday_T_T1S2D2").click(function(){
           var current_trial_image_name_T_T1S2D2 = $('#current_trial_image_name_T_T1S2D2').val();
           var attention_check_img_T_T1S2D2 = current_trial_image_name_T_T1S2D2.startsWith("T1S2D2-attn-");
           if(attention_check_img_T_T1S2D2){
            attention_check_flag_T_T1S2D2 = true;
           }
           time_counter_sunday_btn_T_T1S2D2 = performance.now();
           image_file_name_T_T1S2D2.push(current_trial_image_name_T_T1S2D2);
           chart_T_T1S2D2.push(stimuli_T_T1S2D2);
           task_T_T1S2D2.push("t1");
           var start_pos = current_trial_image_name_T_T1S2D2.indexOf('_') + 1;
           var end_pos = current_trial_image_name_T_T1S2D2.indexOf('_',start_pos);
           var image_number = current_trial_image_name_T_T1S2D2.substring(start_pos,end_pos);
           sequence_T_T1S2D2.push(image_number);
           trial_T_T1S2D2.push(image_index_T_T1S2D2);
   
           var sliced_current_trial_image_name = current_trial_image_name_T_T1S2D2.slice(current_trial_image_name_T_T1S2D2.lastIndexOf('t1') + 2);
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
           if(feedback_match === 'r'){
             feedback_T_T1S2D2.push("correct");
             feedback_time_T_T1S2D2.push(time_counter_sunday_btn_T_T1S2D2 - last_time_count_T_T1S2D2);
           }else{
             feedback_T_T1S2D2.push("error");
             feedback_time_T_T1S2D2.push(time_counter_sunday_btn_T_T1S2D2 - last_time_count_T_T1S2D2);
             if(attention_check_flag_T_T1S2D2){
               attention_check_counter_T_T1S2D2 += 1;
             }
           }
           attention_check_flag_T_T1S2D2 = false;
           set_current_time_T_T1S2D2(time_counter_sunday_btn_T_T1S2D2);
           next_images_T_T1S2D2(1);
   }); 
   
   $("#btn_saturday_T_T1S2D2").click(function(){
           var current_trial_image_name_T_T1S2D2 = $('#current_trial_image_name_T_T1S2D2').val();
           var attention_check_img_T_T1S2D2 = current_trial_image_name_T_T1S2D2.startsWith("T1S2D2-attn-");
           if(attention_check_img_T_T1S2D2){
            attention_check_flag_T_T1S2D2 = true;
           }
           time_counter_saturday_btn_T_T1S2D2 = performance.now();
           image_file_name_T_T1S2D2.push(current_trial_image_name_T_T1S2D2);
           chart_T_T1S2D2.push(stimuli_T_T1S2D2);
           task_T_T1S2D2.push("t1");
           var start_pos = current_trial_image_name_T_T1S2D2.indexOf('_') + 1;
           var end_pos = current_trial_image_name_T_T1S2D2.indexOf('_',start_pos);
           var image_number = current_trial_image_name_T_T1S2D2.substring(start_pos,end_pos)
           // console.log("Image Seq", image_number)
           sequence_T_T1S2D2.push(image_number);
           trial_T_T1S2D2.push(image_index_T_T1S2D2);
   
           var sliced_current_trial_image_name = current_trial_image_name_T_T1S2D2.slice(current_trial_image_name_T_T1S2D2.lastIndexOf('t1') + 2);
   
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
           if(feedback_match === 'l'){
             feedback_T_T1S2D2.push("correct");
             feedback_time_T_T1S2D2.push(time_counter_saturday_btn_T_T1S2D2 - last_time_count_T_T1S2D2);
           }else{
             feedback_T_T1S2D2.push("error");
             feedback_time_T_T1S2D2.push(time_counter_saturday_btn_T_T1S2D2 - last_time_count_T_T1S2D2);
             if(attention_check_flag_T_T1S2D2){
               attention_check_counter_T_T1S2D2+=1;
             }
           }
           attention_check_flag_T_T1S2D2 = false;
           set_current_time_T_T1S2D2(time_counter_saturday_btn_T_T1S2D2);
           next_images_T_T1S2D2(1);
      
   }); 
   
   });
   
   $('body').on('next', function(e, type){
      event.preventDefault();
      var page_name_T_T1S2D2                 = '<?php echo $id;?>';
      var participant_id_T_T1S2D2            = $('#participant_id').val();
      var system_generated_id_T_T1S2D2       = $('#system_generated_id').val();
      var experiment_sequence_T_T1S2D2       = '<?php echo $between_subject_sequence;?>';
      var experiment_order_T_T1S2D2          = '<?php echo $experiment_order_T_T1S2D2;?>';
      var is_main_trial_T_T1S2D2             = 1;
     
     if (type === '<?php echo $id;?>'){
      
      var global_attn_check_fail_count_T_T1S2D2       = parseInt($('#attention_check_fail_count').val());
      var curr_page_attn_check_fail_count_T_T1S2D2    = parseInt(attention_check_counter_T_T1S2D2);
      $('#attention_check_fail_count').val(global_attn_check_fail_count_T_T1S2D2 + curr_page_attn_check_fail_count_T_T1S2D2);
   
      $.ajax({
           type        : 'POST',  
           url         : 'ajax/experiment_data_save.php',  
           data        : { 
                                  page_name                   : JSON.stringify(page_name_T_T1S2D2), 
                                  participant_id              : JSON.stringify(participant_id_T_T1S2D2), 
                                  system_generated_id         : JSON.stringify(system_generated_id_T_T1S2D2), 
                                  experiment_sequence         : JSON.stringify(experiment_sequence_T_T1S2D2),
                                  experiment_order            : JSON.stringify(experiment_order_T_T1S2D2),
                                  is_main_trial               : JSON.stringify(is_main_trial_T_T1S2D2),
                                  task                        : JSON.stringify(task_T_T1S2D2),
                                  visualization_size          : JSON.stringify(chart_T_T1S2D2),
                                  trial_order                 : JSON.stringify(trial_T_T1S2D2),
                                  image_file_order            : JSON.stringify(sequence_T_T1S2D2),
                                  answering_time              : JSON.stringify(feedback_time_T_T1S2D2),
                                  answer                      : JSON.stringify(feedback_T_T1S2D2),
                                  image_file_name             : JSON.stringify(image_file_name_T_T1S2D2)
                         }, 
           dataType    : 'json',  
           success:function(response){
               if( response.status == 'error' ) {
                 console.log('Something bad happened!');
               } else {
                   console.log(response.message);
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