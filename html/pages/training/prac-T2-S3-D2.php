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
         <!-- <h5 class="text-center">Did you go to bed later than planned (22:00) on 4 or more days this week?</h5> -->
         <div class="d-flex justify-content-center">
            <input type="hidden" id="current_trial_image_name_P_T2S3D2" name="current_trial_image_name_P_T2S3D2" value="">
            <div class="slideshow-container">
               <div class="slideshow-inner justify-content-center ">
                  <!-- <div class="trial_images_P_T2S3D2" id="xxx">
                     <img  src="img/S1/s1_20_t1rt2lt3l.png"/>
                     </div>   -->
                  <?php
                     for( $i_P_T2S3D2 = 0; $i_P_T2S3D2 < $total_image_P_T2S3D2; $i_P_T2S3D2++)
                     {  ?>                                     
                  <div class="trial_images_P_T2S3D2" id="P-T2S3D2-<?php echo $i_P_T2S3D2; ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>">
                     <img id="img-P-T2S3D2-<?php echo $i_P_T2S3D2 ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>" src="img/<?php echo $chart_type_P_T2S3D2 ?>/<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>.png"/>
                     <div class="d-flex justify-content-center">
                        <div class="caption center-block" id="feedback_correct_P-T2S3D2-<?php echo $i_P_T2S3D2; ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>" style="display:none; color: black;margin-top: 173px;background: green;width: 86px;text-align: center;">Correct!</div>
                     </div>
                     <div class="d-flex justify-content-center">
                        <div class="caption center-block" id="feedback_error_P-T2S3D2-<?php echo $i_P_T2S3D2; ?>-<?php echo $trial_shuffle_P_T2S3D2[$i_P_T2S3D2] ?>" style="display:none; color: white;margin-top: 173px;background: red;width: 86px;text-align: center;">Wrong!</div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center">
            <div class = "btn-group-justified btn-group-lg btn-group-horizontal">
               <button type="button" id="btn_no_P_T2S3D2" class="btn btn-info">No</button>
               <button type="button" id="btn_yes_P_T2S3D2" class="btn btn-info" style="margin-right: 15px;">Yes</button>
            </div>
         </div>
         <div class=mt-4></div>
         <div class="row" id="alert_prac_T2S3D2">
            <div class="alert alert-dark alert-dismissible fade show col-md-4 col-md-offset-4">
               <strong>NB:</strong> Press on the training images after each feedback for the next image.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
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
   // window.addEventListener("load",function() {
   
   // })
   
   $(document).ready(function() {
       $("#btn_<?php echo $id;?>").hide();
       var time_counter_0_P_T2S3D2 = performance.now();
       set_current_time_P_T2S3D2(time_counter_0_P_T2S3D2);
       console.log("Initital time counter", time_counter_0_P_T2S3D2);
       show_images_P_T2S3D2(image_index_P_T2S3D2);
       $('.trial_images_P_T2S3D2').unbind('click touch');
   
       function set_current_time_P_T2S3D2(time_counter){
         last_time_count = time_counter;
       }
       function canvas_image_touch_deactive_P_T2S3D2(){
         $('.trial_images_P_T2S3D2').unbind('click touch');  
       }
       function button_enable_P_T2S3D2(){
           $('#btn_yes_P_T2S3D2').prop('disabled', false);
           $('#btn_no_P_T2S3D2').prop('disabled', false);
       }
       function button_disable_P_T2S3D2(){
           $('#btn_yes_P_T2S3D2').prop('disabled', true);
           $('#btn_no_P_T2S3D2').prop('disabled', true);     
       }
   
       function show_images_P_T2S3D2(n){
             if( image_index_P_T2S3D2 > trial_image_count_P_T2S3D2){
               button_disable_P_T2S3D2();
               canvas_image_touch_deactive_P_T2S3D2();
               var current_trial_image_name_P_T2S3D2 = $('#current_trial_image_name_P_T2S3D2').val();
               $("#img-"+current_trial_image_name_P_T2S3D2).css({"border-style":"none"});
               $('#alert_prac_T2S3D2').hide();
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
           canvas_image_touch_deactive_P_T2S3D2();
           if (n < 0){
           show_images_P_T2S3D2(image_index_P_T2S3D2 -= 1);
           } else {
           show_images_P_T2S3D2(image_index_P_T2S3D2 += 1); 
           }
       }
   
       $("#btn_no_P_T2S3D2").click(function(){
           var current_trial_image_name_P_T2S3D2 = $('#current_trial_image_name_P_T2S3D2').val();
          
           time_counter_left = performance.now();
           // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
           button_disable_P_T2S3D2();
           $(".trial_images_P_T2S3D2").on('click touch', function () {
               next_images_P_T2S3D2(1);
               // feedback_hide_T1();
               $("#feedback_correct_"+current_trial_image_name_P_T2S3D2).hide();
               $("#feedback_error_"+current_trial_image_name_P_T2S3D2).hide();
            });
   
        
           file_P_T2S3D2.push(current_trial_image_name_P_T2S3D2);
           var stimuli = current_trial_image_name_P_T2S3D2.substring(0,2);
           chart_P_T2S3D2.push(stimuli);
           elements_P_T2S3D2.push("t2");
           var start_pos = current_trial_image_name_P_T2S3D2.indexOf('_') + 1;
           var end_pos = current_trial_image_name_P_T2S3D2.indexOf('_',start_pos);
           var image_number = current_trial_image_name_P_T2S3D2.substring(start_pos,end_pos)
           // console.log("Trial No", image_number)
           sequence_P_T2S3D2.push(image_number);
           trial_P_T2S3D2.push(image_index_P_T2S3D2);
   
           var sliced_current_trial_image_name = current_trial_image_name_P_T2S3D2.slice(current_trial_image_name_P_T2S3D2.lastIndexOf('t2') + 2);
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
         
           if(feedback_match === 'r'){
             
             // var element = document.querySelector('[id^="img_T2_"]').id;
              $("#img-"+current_trial_image_name_P_T2S3D2).css({"border-color": "green", 
                "border-width":"4px", 
                "border-style":"solid",
               //  "opacity":"0.5",
                "filter":"alpha(opacity=90)",
                });
   
             $("#feedback_correct_"+current_trial_image_name_P_T2S3D2).show();
             feedback_P_T2S3D2.push("correct");
             feedback_time_P_T2S3D2.push(time_counter_left - last_time_count);
           }else{
   
             $("#img-"+current_trial_image_name_P_T2S3D2).css({"border-color": "red", 
                "border-width":"4px", 
                "border-style":"solid",
               //  "opacity":"0.5",
                "filter":"alpha(opacity=90)",
                });
             $("#feedback_error_"+current_trial_image_name_P_T2S3D2).show();
             feedback_P_T2S3D2.push("error");
             feedback_time_P_T2S3D2.push(time_counter_left - last_time_count);
           }
   
           set_current_time_P_T2S3D2(time_counter_left);
          
       }); 
   
       $("#btn_yes_P_T2S3D2").click(function(){
           var current_trial_image_name_P_T2S3D2 = $('#current_trial_image_name_P_T2S3D2').val();
           time_counter_left = performance.now();
           // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
           button_disable_P_T2S3D2();
           $(".trial_images_P_T2S3D2").on('click touch', function () {
               next_images_P_T2S3D2(1);
               $("#feedback_correct_"+current_trial_image_name_P_T2S3D2).hide();
               $("#feedback_error_"+current_trial_image_name_P_T2S3D2).hide();
            });
   
         
           file_P_T2S3D2.push(current_trial_image_name_P_T2S3D2);
           var stimuli = current_trial_image_name_P_T2S3D2.substring(0,2);
           chart_P_T2S3D2.push(stimuli);
           elements_P_T2S3D2.push("t2");
           var start_pos = current_trial_image_name_P_T2S3D2.indexOf('_') + 1;
           var end_pos = current_trial_image_name_P_T2S3D2.indexOf('_',start_pos);
           var image_number = current_trial_image_name_P_T2S3D2.substring(start_pos,end_pos)
           // console.log("Image Seq", image_number)
           sequence_P_T2S3D2.push(image_number);
           trial_P_T2S3D2.push(image_index_P_T2S3D2);
   
           var sliced_current_trial_image_name = current_trial_image_name_P_T2S3D2.slice(current_trial_image_name_P_T2S3D2.lastIndexOf('t2') + 2);
   
           var feedback_match = sliced_current_trial_image_name.substr(0, 1);
           if(feedback_match === 'l'){
             $("#img-"+current_trial_image_name_P_T2S3D2).css({"border-color": "green", 
                "border-width":"4px", 
                "border-style":"solid",
               //  "opacity":"0.5",
                "filter":"alpha(opacity=90)",
                });
   
             $("#feedback_correct_"+current_trial_image_name_P_T2S3D2).show();
             feedback_P_T2S3D2.push("correct");
             feedback_time_P_T2S3D2.push(time_counter_left - last_time_count);
           }else{
             $("#img-"+current_trial_image_name_P_T2S3D2).css({"border-color": "red", 
                "border-width":"4px", 
                "border-style":"solid",
               //  "opacity":"0.5",
                "filter":"alpha(opacity=90)",
                });
   
             $("#feedback_error_"+current_trial_image_name_P_T2S3D2).show();
             feedback_P_T2S3D2.push("error");
             feedback_time_P_T2S3D2.push(time_counter_left - last_time_count);
           }
   
           set_current_time_P_T2S3D2(time_counter_left);
          
       }); 
   
   });
   
   $('body').on('next', function(e, type){
     // var page_number = $('#page_' + type).val();
     //  console.log("page number",  page_number);
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
       
   });
   
</script>