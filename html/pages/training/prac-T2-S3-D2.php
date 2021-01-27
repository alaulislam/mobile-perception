<style>
   .trial_images_P_T2S3D2{  
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
   .trial_images_P_T2S3D2 img{
   max-height: 100%;
   max-width: 100%;
   position: absolute;
   margin: auto;
   top: 0; left: 0; bottom: 0; right: 0;
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
   $total_image_P_T2S3D2 = 15;
   $img_start_P_T2S3D2 = $image_start_end["D2"][0]; 
   $img_end_P_T2S3D2 = $image_start_end["D2"][1]; 
   $chart_type_P_T2S3D2 = "S3";
   $trial_shuffle_P_T2S3D2 = array();
   $trial_shuffle_P_T2S3D2 = handleImageFIle_P_T2S3D2($img_start_P_T2S3D2, $img_end_P_T2S3D2, $chart_type_P_T2S3D2);
     
   function handleImageFIle_P_T2S3D2($img_start_P_T2S3D2, $img_end_P_T2S3D2, $chart_type_P_T2S3D2){
         $handle_task = fopen("img_csv/$chart_type_P_T2S3D2.csv",'r') or die("can't open file");
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
       
   
       for($i =0, $k = $img_start_P_T2S3D2; $k <= $img_end_P_T2S3D2; $k += 4, $i++){
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
      <div class="mt-3"></div>
       <h5 id="header_question_P_T2S3D2">Did you go to bed later than planned (22:00) on 4 or more days this week?</h5>
         <div class="d-flex justify-content-center" id="div_trainging_images_P_T2S3D2">
            <input type="hidden" id="current_trial_image_name_P_T2S3D2" name="current_trial_image_name_P_T2S3D2" value="">
            <div class="slideshow-container">
               <div class="slideshow-inner justify-content-center">
                  <?php
                     for( $i_P_T2S3D2 = 0; $i_P_T2S3D2 < $total_image_P_T2S3D2; $i_P_T2S3D2++)
                     {  ?>                                     
                  <div class="trial_images_P_T2S3D2" id="P-T2S3D2-<?php echo $i_P_T2S3D2; ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>">
                     <img id="img-P-T2S3D2-<?php echo $i_P_T2S3D2 ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>" src="img/<?php echo $chart_type_P_T2S3D2 ?>/<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>.png"/>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center" id="div_trainging_ans_buttons_P_T2S3D2">
            <div class = "btn-group-justified btn-group-lg btn-group-horizontal">
                <button type="button" id="btn_no_P_T2S3D2" class="btn btn-info">No</button>
               <button type="button" id="btn_yes_P_T2S3D2" class="btn btn-info" style="margin-right: 15px;">Yes</button>
            </div>
         </div>
         <div class="row mt-4 d-none" id="end_message_P_T2S3D2">
            <div class="alert alert-success col-md-4 col-md-offset-4">
            <h4 class="alert-heading"><i class="fa fa-check"></i> Congratulations!</h4>
            You finished your training trials. Please click <strong>Next</strong> to proceed with the main trails.
            </div>
        </div>
         <div class=mt-4></div>
         <div class="modal left xs fade" id="modal_correct_ans_P_T2S3D2" tabindex="-1" role="dialog" aria-labelledby="top_modal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
               <div class="modal-content h-auto rounded-right">
                  <div class="mt-1"></div>
                  <div class="modal-body text-center">
                     <div class="row">
                           <div class="col-4 img-container">
                              <img src="img/icons/correct.png" style="height:40px !important;"  alt="CORRECT!">
                           </div>
                           <div class="col-8"><p class="lead" style="margin-left:-30px">Your answer is correct!</p></div>
                        </div>
                     <div class="progress">
                        <div class="progress-bar bg-info" id="progress_bar_correct_P_T2S3D2" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div style="margin-top:-15px"></div>
                  <div class="modal-footer">
                     <p class="d-none" id="btn_next_correct_modal_message_P_T2S3D2">Training is over, wait a moment please!</p>
                     <button type="button" class="btn btn-dark border rounded-pill shadow-sm mb-1" id="btn_next_correct_modal_P_T2S3D2">NEXT</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal left xs fade" id="modal_error_ans_P_T2S3D2" tabindex="-1" role="dialog" aria-labelledby="top_modal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
               <div class="modal-content h-auto rounded-right">
                  <div class="mt-1"></div>
                  <div class="modal-body text-center">
                  <div class="row">
                           <div class="col-4 img-container">
                              <img src="img/icons/error.png" style="height:40px !important;"  alt="Wrong!">
                           </div>
                           <div class="col-8"><p class="lead" style="margin-left:-30px">Your answer is wrong!</p></div>
                        </div>
                     <div class="progress">
                        <div class="progress-bar bg-info" id="progress_bar_error_P_T2S3D2" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div style="margin-top:-15px"></div>
                  <div class="modal-footer">
                     <p class="d-none" id="btn_next_error_modal_message_P_T2S3D2">Training is over, wait a moment please!</p>
                     <button type="button" class="btn btn-dark border rounded-pill shadow-sm mb-1" id="btn_next_error_modal_P_T2S3D2">NEXT</button>
                  </div>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>
<script type="text/javascript">
   var trial_image_count_P_T2S3D2 = <?php echo $total_image_P_T2S3D2; ?>;
   var image_index_P_T2S3D2 = 1;
   
   var file_P_T2S3D2 = [];
   var chart_P_T2S3D2 = [];
   var elements_P_T2S3D2 = [];
   var trial_P_T2S3D2 = [];
   var sequence_P_T2S3D2 = [];
   var feedback_P_T2S3D2 = [];
   var feedback_time_P_T2S3D2 = [];
   
   $(document).ready(function() {
      $("#btn_<?php echo $id;?>").hide();
       var time_counter_0_P_T2S3D2 = performance.now();
       set_current_time_P_T2S3D2(time_counter_0_P_T2S3D2);
       console.log("Initital time counter", time_counter_0_P_T2S3D2);
       show_images_P_T2S3D2(image_index_P_T2S3D2);
       $('.trial_images_P_T2S3D2').unbind('click touch');
   
       function set_current_time_P_T2S3D2(time_counter){
         last_time_count_P_T2S3D2 = time_counter;
       }
       function button_enable_P_T2S3D2(){
           $('#btn_no_P_T2S3D2').prop('disabled', false);
           $('#btn_yes_P_T2S3D2').prop('disabled', false);
       }
       function button_disable_P_T2S3D2(){
           $('#btn_no_P_T2S3D2').prop('disabled', true);
           $('#btn_yes_P_T2S3D2').prop('disabled', true);     
       }
   
       function show_images_P_T2S3D2(n){
            if( image_index_P_T2S3D2 === trial_image_count_P_T2S3D2){
                $("#btn_next_correct_modal_P_T2S3D2").hide();
                $("#btn_next_error_modal_P_T2S3D2").hide();
                $('#btn_next_correct_modal_message_P_T2S3D2').removeClass("d-none");
                $('#btn_next_error_modal_message_P_T2S3D2').removeClass("d-none");
             }
             if( image_index_P_T2S3D2 > trial_image_count_P_T2S3D2){
               button_disable_P_T2S3D2();
              $("#div_trainging_images_P_T2S3D2").children().hide();
              $("#div_trainging_ans_buttons_P_T2S3D2").children().hide();
              $('#end_message_P_T2S3D2').removeClass("d-none");
              $("#header_question_P_T2S3D2").hide();
               $("#btn_<?php echo $id;?>").show();
               return;
             }
             var i_P_T2S3D2;
             var slides_P_T2S3D2 = document.getElementsByClassName("trial_images_P_T2S3D2");
             if (n > slides_P_T2S3D2.length) {image_index_P_T2S3D2 = 1}
             if (n < 1) {image_index_P_T2S3D2 = slides_P_T2S3D2.length}
             for (i_P_T2S3D2 = 0; i_P_T2S3D2 < slides_P_T2S3D2.length; i_P_T2S3D2++) {
                 slides_P_T2S3D2[i_P_T2S3D2].style.display = "none";
             }
             slides_P_T2S3D2[image_index_P_T2S3D2-1].style.display = "block";
             $('#current_trial_image_name_P_T2S3D2').val();
             // console.log(slides_P_T2S3D2[image_index_P_T2S3D2-1].id);
             $('#current_trial_image_name_P_T2S3D2').val(slides_P_T2S3D2[image_index_P_T2S3D2-1].id);
       }
       function next_images_P_T2S3D2(n){
           button_enable_P_T2S3D2();
           if (n < 0){
           show_images_P_T2S3D2(image_index_P_T2S3D2 -= 1);
           } else {
           show_images_P_T2S3D2(image_index_P_T2S3D2 += 1); 
           }
       }
       var progress_bar_interval_P_T2S3D2;
       function clear_modal_progress_bar_interval_P_T2S3D2(){
         clearInterval(progress_bar_interval_P_T2S3D2);
       }
       function fill_progress_bar_P_T2S3D2(answer){
         var progressBar =  $("#progress_bar_"+answer+"_P_T2S3D2"),
             width = 0;
             progressBar.width(width);
             progress_bar_interval_P_T2S3D2 = setInterval(function() {
                 width += 2;
                 progressBar.css('width', width + '%');
                 if (width >= 100) {
                     clearInterval(progress_bar_interval_P_T2S3D2);
                     if(answer === "correct"){
                       $('#modal_correct_ans_P_T2S3D2').fadeOut(100,function(){
                           $('#modal_correct_ans_P_T2S3D2').modal('hide');
                       });
                     }
                     if(answer === "error"){
                       $('#modal_error_ans_P_T2S3D2').fadeOut(100,function(){
                           $('#modal_error_ans_P_T2S3D2').modal('hide');
                       });
                     }
                     next_images_P_T2S3D2(1);
                     progressBar.css('width', 0 + '%');
                 }
             }, 100); // 5 second = 100/width 2 => 50 => .1*50 [[ 100= .1 second ]] ; if width=1 => 10 second or, 50 = .05
       }
   
       $("#btn_no_P_T2S3D2").click(function(){
           var current_trial_image_name_P_T2S3D2 = $('#current_trial_image_name_P_T2S3D2').val();
           var time_counter_left_P_T2S3D2 = performance.now();

           file_P_T2S3D2.push(current_trial_image_name_P_T2S3D2);
           var stimuli_P_T2S3D2 = current_trial_image_name_P_T2S3D2.substring(0,2);
           chart_P_T2S3D2.push(stimuli_P_T2S3D2);
           elements_P_T2S3D2.push("t2");
           var start_pos_P_T2S3D2 = current_trial_image_name_P_T2S3D2.indexOf('_') + 1;
           var end_pos_P_T2S3D2 = current_trial_image_name_P_T2S3D2.indexOf('_',start_pos_P_T2S3D2);
           var image_number_P_T2S3D2 = current_trial_image_name_P_T2S3D2.substring(start_pos_P_T2S3D2,end_pos_P_T2S3D2)
           // console.log("Trial No", image_number_P_T2S3D2)
           sequence_P_T2S3D2.push(image_number_P_T2S3D2);
           trial_P_T2S3D2.push(image_index_P_T2S3D2);
   
           var sliced_current_trial_image_name_P_T2S3D2 = current_trial_image_name_P_T2S3D2.slice(current_trial_image_name_P_T2S3D2.lastIndexOf('t2') + 2);
           var feedback_match_P_T2S3D2 = sliced_current_trial_image_name_P_T2S3D2.substr(0, 1);
           if(feedback_match_P_T2S3D2 === 'r'){
             $('#modal_correct_ans_P_T2S3D2').modal('show');
             clear_modal_progress_bar_interval_P_T2S3D2();
             fill_progress_bar_P_T2S3D2("correct");
            $("#btn_next_correct_modal_P_T2S3D2").off('click').on('click', function(){
              clear_modal_progress_bar_interval_P_T2S3D2();
              $("#progress_bar_correct_P_T2S3D2").css('width', 0 + '%');
               $('#modal_correct_ans_P_T2S3D2').modal('toggle');
              //  $('#modal_correct_ans_P_T2S3D2').fadeOut(100,function(){ $('#modal_correct_ans_P_T2S3D2').modal('hide'); });
               next_images_P_T2S3D2(1);
             });
             feedback_P_T2S3D2.push("correct");
             feedback_time_P_T2S3D2.push(time_counter_left_P_T2S3D2 - last_time_count_P_T2S3D2);
           }else{
              $('#modal_error_ans_P_T2S3D2').modal('show');
              clear_modal_progress_bar_interval_P_T2S3D2();
              fill_progress_bar_P_T2S3D2("error");
              $("#btn_next_error_modal_P_T2S3D2").off('click').on('click', function(){
                clear_modal_progress_bar_interval_P_T2S3D2();
                $("#progress_bar_error_P_T2S3D2").css('width', 0 + '%');
                    $('#modal_error_ans_P_T2S3D2').modal('toggle');
              //  $('#modal_error_ans_P_T2S3D2').fadeOut(100,function(){$('#modal_error_ans_P_T2S3D2').modal('hide'); });
               next_images_P_T2S3D2(1);
             });

             feedback_P_T2S3D2.push("error");
             feedback_time_P_T2S3D2.push(time_counter_left_P_T2S3D2 - last_time_count_P_T2S3D2);
           }
           set_current_time_P_T2S3D2(time_counter_left_P_T2S3D2);
          
       }); 
   
       $("#btn_yes_P_T2S3D2").click(function(){
           var current_trial_image_name_P_T2S3D2 = $('#current_trial_image_name_P_T2S3D2').val();
           var time_counter_left_P_T2S3D2 = performance.now();
           
           file_P_T2S3D2.push(current_trial_image_name_P_T2S3D2);
           var stimuli_P_T2S3D2 = current_trial_image_name_P_T2S3D2.substring(0,2);
           chart_P_T2S3D2.push(stimuli_P_T2S3D2);
           elements_P_T2S3D2.push("t2");
           var start_pos_P_T2S3D2 = current_trial_image_name_P_T2S3D2.indexOf('_') + 1;
           var end_pos_P_T2S3D2 = current_trial_image_name_P_T2S3D2.indexOf('_',start_pos_P_T2S3D2);
           var image_number_P_T2S3D2 = current_trial_image_name_P_T2S3D2.substring(start_pos_P_T2S3D2,end_pos_P_T2S3D2)
           // console.log("Image Seq", image_number_P_T2S3D2)
           sequence_P_T2S3D2.push(image_number_P_T2S3D2);
           trial_P_T2S3D2.push(image_index_P_T2S3D2);
   
           var sliced_current_trial_image_name_P_T2S3D2 = current_trial_image_name_P_T2S3D2.slice(current_trial_image_name_P_T2S3D2.lastIndexOf('t2') + 2);
   
           var feedback_match_P_T2S3D2 = sliced_current_trial_image_name_P_T2S3D2.substr(0, 1);
           if(feedback_match_P_T2S3D2 === 'l'){
             $('#modal_correct_ans_P_T2S3D2').modal('show');
             clear_modal_progress_bar_interval_P_T2S3D2();
             fill_progress_bar_P_T2S3D2("correct");
            $("#btn_next_correct_modal_P_T2S3D2").off('click').on('click', function(){
              clear_modal_progress_bar_interval_P_T2S3D2();
              $("#progress_bar_correct_P_T2S3D2").css('width', 0 + '%');
              $('#modal_correct_ans_P_T2S3D2').modal('toggle');
               // $('#modal_correct_ans_P_T2S3D2').fadeOut(100,function(){ $('#modal_correct_ans_P_T2S3D2').modal('hide'); });
               next_images_P_T2S3D2(1);
             });
             feedback_P_T2S3D2.push("correct");
             feedback_time_P_T2S3D2.push(time_counter_left_P_T2S3D2 - last_time_count_P_T2S3D2);
           }else{
             $('#modal_error_ans_P_T2S3D2').modal('show');
              clear_modal_progress_bar_interval_P_T2S3D2();
              fill_progress_bar_P_T2S3D2("error");
              $("#btn_next_error_modal_P_T2S3D2").off('click').on('click', function(){
                clear_modal_progress_bar_interval_P_T2S3D2();
                $("#progress_bar_error_P_T2S3D2").css('width', 0 + '%');
              // $("#btn_next_error_modal_P_T2S3D2").click(function(){
               // $('#modal_error_ans_P_T2S3D2').fadeOut(100,function(){$('#modal_error_ans_P_T2S3D2').modal('hide'); });
               $('#modal_error_ans_P_T2S3D2').modal('toggle');
               next_images_P_T2S3D2(1);
              });
             feedback_P_T2S3D2.push("error");
             feedback_time_P_T2S3D2.push(time_counter_left_P_T2S3D2 - last_time_count_P_T2S3D2);
           }
   
           set_current_time_P_T2S3D2(time_counter_left_P_T2S3D2);
          
       }); 
   
   });
   
   $('body').on('next', function(e, type){
   
     // var page_number = $('#page_' + type).val();
     //  console.log("page number",  type);
     event.preventDefault();
     var p_id_P_T2S3D2 = $('#participant_id').val();
     if (type === '<?php echo $id;?>'){
       $.ajax({
           type        : 'POST',  
           url         : 'ajax/test.php',  
           data        : { participant_id  : JSON.stringify(p_id_P_T2S3D2), 
                           chart           : JSON.stringify(chart_P_T2S3D2), 
                           elements        : JSON.stringify(elements_P_T2S3D2), 
                           trial           : JSON.stringify(trial_P_T2S3D2), 
                           sequence        : JSON.stringify(sequence_P_T2S3D2),
                           file            : JSON.stringify(file_P_T2S3D2), 
                           time            : JSON.stringify(feedback_time_P_T2S3D2), 
                           feedback        : JSON.stringify(feedback_P_T2S3D2) 
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
             //  alert('error occured');
             var jsonValue = jQuery.parseJSON( jqXHR.responseText );
             console.log(jsonValue.Message);
             // console.log(jqXHR);
           }
       });
   
     }
     // $('#'+type).remove();
       
   });
   
</script>

