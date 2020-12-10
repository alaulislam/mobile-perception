<style>
.watch-crown {
	position: relative;
	z-index: -1;
	width: 8px;
	height: 40px;
	top: -120px;
	left: 210px;
	border-radius: 5px;
	background: #868686;
	border-right: 2px solid rgba(0, 0, 0, 0.05);
	box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

.trial_images_T3S3D3{  
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
    .trial_images_T3S3D3 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
}
#gif_trial_images_T3S3D3{  
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
#gif_trial_images_T3S3D3 img{
  max-height: 100%;
  max-width: 100%;
  position: absolute;
  margin: auto;
  top: 0; left: 0; bottom: 0; right: 0;
}

#gif_trial_images_T3S3D3 .btn {
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

#gif_trial_images_T3S3D3 .btn:hover {
  background-color: black;
}

</style>


<?php
  $total_image_T3S3D3 = 30;
  $img_start_T3S3D3 = $image_start_end["D3"][0];
  $img_end_T3S3D3 = $image_start_end["D3"][1];
  $chart_type_T3S3D3 = "S3";
  $practice_trial_shuffle_T3S3D3 = array();
  $practice_trial_shuffle_T3S3D3 = handleImageFIle_T3S3D3($img_start_T3S3D3, $img_end_T3S3D3, $chart_type_T3S3D3);
    
  function handleImageFIle_T3S3D3($img_start_T3S3D3, $img_end_T3S3D3, $chart_type_T3S3D3){
        $handle_task = fopen("img_csv/$chart_type_T3S3D3.csv",'r') or die("can't open file");
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
      for($i =0, $k = $img_start_T3S3D3; $k <= $img_end_T3S3D3; $k ++, $i++){
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
<div class="row justify-content-center align-items-center">
  <div class="col-12">
    <!-- <div class="d-flex justify-content-center task-description">
          <h2 class="legend">Did you sleep longer on average on the weekend days (Sat, Sun) compared to the
weekdays (Mon-Fri)?</h2>
      </div> -->
      
      <div class="d-flex justify-content-center" style="margin-top: 10px;">
                    <input type="hidden" id="current_trial_image_name_T3S3D3" value="">
                        <div class="slideshow-container">
                            <div class="slideshow-inner justify-content-center ">
                            <div id="gif_trial_images_T3S3D3">
                                <img  src="img/exp_start2.jpg"/>
                                   <button class="btn" id="btn_trial_images_T3S3D3">Start!</button>
                             </div> 
                             <div id="div_trial_images_T3S3D3" style="display:none"> 
                            <?php
                                    for( $i_T3S3D3 = 0; $i_T3S3D3 < $total_image_T3S3D3; $i_T3S3D3++)
                                    {  ?>  
                                      <?php if($i_T3S3D3 == 6){ ?> 
                                        <div class="trial_images_T3S3D3" id="T3S3D3-attn-s3_0_t3l">
                                            <img  src="img/attention/T3_S3/attn-s3_0_t3l.png"/>
                                        </div>
                                      <?php } ?>
                                      <?php if($i_T3S3D3 == 13){ ?> 
                                        <div class="trial_images_T3S3D3" id="T3S3D3-attn-s3_1_t3r">
                                            <img  src="img/attention/T3_S3/attn-s3_1_t3r.png"/>
                                        </div>
                                      <?php } ?>
                                      <?php if($i_T3S3D3 == 20){ ?> 
                                        <div class="trial_images_T3S3D3" id="T3S3D3-attn-s3_2_t3l">
                                            <img  src="img/attention/T3_S3/attn-s3_2_t3l.png"/>
                                        </div>
                                      <?php } ?>
                                      <?php if($i_T3S3D3 == 27){ ?> 
                                        <div class="trial_images_T3S3D3" id="T3S3D3-attn-s3_3_t3r">
                                            <img  src="img/attention/T3_S3/attn-s3_3_t3r.png"/>
                                        </div>
                                      <?php } ?>                                       
                                        <div class="trial_images_T3S3D3" id="T3S3D3_<?php echo $i_T3S3D3; ?>_<?php echo $practice_trial_shuffle_T3S3D3[$i_T3S3D3] ?>">
                                          <img id="img_T3S3D3_<?php echo $i_T3S3D3 ?><?php echo $practice_trial_shuffle_T3S3D3[$i_T3S3D3] ?>" src="img/<?php echo $chart_type_T3S3D3; ?>/<?php echo $practice_trial_shuffle_T3S3D3[$i_T3S3D3] ?>.png"/>
                                        </div>  
                              <?php } ?>
                              </div>
                            </div>
                        </div>
      </div>


      <div class="d-flex justify-content-center">
            <div class = "btn-group-justified btn-group-lg btn-group-horizontal">
              <button type="button" id="btn_no_T3S3D3" class="btn btn-info">No</button>
              <button type="button" id="btn_yes_T3S3D3" class="btn btn-info" style="margin-right: 15px;">Yes</button>
            </div>
    </div>
    <div class="d-flex justify-content-center task-description">
          <ul id="init_instruction_T3S3D3">
          <h2>Instructions</h2>
          <!-- <li class="list-group-item d-flex justify-content-between align-items-center">On the next page, when you will click Start!, main experiment will start.</li> -->
            <li class="list-group-item d-flex justify-content-between align-items-center">Click Start! to start your main experiment</li>
            <li class="list-group-item d-flex justify-content-between align-items-center">There will be no feedback for your answer and the next image will automatically appear after your response.</li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Please, note that if you fail to answer easy attention check images (if any) correctly, you would be terminated from the experiment.</li>
          </ul>
      </div>

      
  </div> 
</div>

<script type="text/javascript">
var trial_image_count_T3S3D3 = <?php echo $total_image_T3S3D3; ?>;
var image_index_T3S3D3 = 1;

var file_T3S3D3 = [];
var chart_T3S3D3 = [];
var elements_T3S3D3 = [];
var trial_T3S3D3 = [];
var sequence_T3S3D3 = [];
var feedback_T3S3D3 = [];
var feedback_time_T3S3D3 = [];


$(document).ready(function() {
  $("#btn_yes_T3S3D3").hide();
  $("#btn_no_T3S3D3").hide();
  $("#btn_<?php echo $id;?>").hide();
  $("#gif_trial_images_T3S3D3").click(function(){
    $("#gif_trial_images_T3S3D3").hide();
    $('#div_trial_images_T3S3D3').show();
    $("#btn_yes_T3S3D3").show();
    $("#btn_no_T3S3D3").show();
    $("#btn_<?php echo $id;?>").show();
    $('#init_instruction_T3S3D3').hide();
  }); 

var time_counter_0_T3S3D3 = performance.now();
set_current_time_T3S3D3(time_counter_0_T3S3D3);
console.log("Initital time counter", time_counter_0_T3S3D3);
show_images_T3S3D3(image_index_T3S3D3);
$('.trial_images_T3S3D3').unbind('click touch');

function set_current_time_T3S3D3(time_counter){
  last_time_count = time_counter;
}
function canvas_image_touch_deactive_T3S3D3(){
  $('.trial_images_T3S3D3').unbind('click touch');  
}
function button_enable_T3S3D3(){
    $('#btn_yes_T3S3D3').prop('disabled', false);
    $('#btn_no_T3S3D3').prop('disabled', false);
}
function button_disable_T3S3D3(){
    $('#btn_yes_T3S3D3').prop('disabled', true);
    $('#btn_no_T3S3D3').prop('disabled', true);     
}

function show_images_T3S3D3(n){
      if( image_index_T3S3D3 > trial_image_count_T3S3D3){
        button_disable_T3S3D3();
        // canvas_image_touch_deactive_T3S3D3();
        return;
      }
      var i;
      var slides_T3S3D3 = document.getElementsByClassName("trial_images_T3S3D3");
      if (n > slides_T3S3D3.length) {image_index_T3S3D3 = 1}
      if (n < 1) {image_index_T3S3D3 = slides_T3S3D3.length}
      for (i = 0; i < slides_T3S3D3.length; i++) {
          slides_T3S3D3[i].style.display = "none";
      }
      slides_T3S3D3[image_index_T3S3D3-1].style.display = "block";
      $('#current_trial_image_name_T3S3D3').val();
      // console.log(slides_T3S3D3[image_index_T3S3D3-1].id);
      $('#current_trial_image_name_T3S3D3').val(slides_T3S3D3[image_index_T3S3D3-1].id);

}
function total_image_T3S3D3(n){
    button_enable_T3S3D3();
    // canvas_image_touch_deactive_T3S3D3();
    if (n < 0){
    show_images_T3S3D3(image_index_T3S3D3 -= 1);
    } else {
    show_images_T3S3D3(image_index_T3S3D3 += 1); 
    }
}

$("#btn_no_T3S3D3").click(function(){
    var current_trial_image_name_T3S3D3 = $('#current_trial_image_name_T3S3D3').val();
    time_counter_left = performance.now();
    // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
    if( image_index_T3S3D3 === trial_image_count_T3S3D3){
        $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
    button_disable_T3S3D3();
    // $(".trial_images_T3S3D3").on('click touch', function () {
    //     total_image_T3S3D3(1);
    //     $("#feedback_correct_T3S3D3_"+current_trial_image_name_T3S3D3).hide();
    //     $("#feedback_error_T3S3D3_"+current_trial_image_name_T3S3D3).hide();
    //  });

    file_T3S3D3.push(current_trial_image_name_T3S3D3);
    var stimuli = current_trial_image_name_T3S3D3.substring(0,2);
    chart_T3S3D3.push(stimuli);
    elements_T3S3D3.push("t1");
    var start_pos = current_trial_image_name_T3S3D3.indexOf('_') + 1;
    var end_pos = current_trial_image_name_T3S3D3.indexOf('_',start_pos);
    var image_number = current_trial_image_name_T3S3D3.substring(start_pos,end_pos)
    // console.log("Trial No", image_number)
    sequence_T3S3D3.push(image_number);
    trial_T3S3D3.push(image_index_T3S3D3);

    var sliced_current_trial_image_name = current_trial_image_name_T3S3D3.slice(current_trial_image_name_T3S3D3.lastIndexOf('t3') + 2);
    var feedback_match = sliced_current_trial_image_name.substr(0, 1);
    if(feedback_match === 'r'){
      
      // var element = document.querySelector('[id^="img_T3S3D3_"]').id;
       $("#img_T3S3D3_"+current_trial_image_name_T3S3D3).css({"border-color": "green", 
         "border-width":"4px", 
         "border-style":"solid",
        //  "opacity":"0.5",
         "filter":"alpha(opacity=90)",
         });

      $("#feedback_correct_T3S3D3_"+current_trial_image_name_T3S3D3).show();
      feedback_T3S3D3.push("correct");
      feedback_time_T3S3D3.push(time_counter_left - last_time_count);
    }else{

      $("#img_T3S3D3_"+current_trial_image_name_T3S3D3).css({"border-color": "red", 
         "border-width":"4px", 
         "border-style":"solid",
        //  "opacity":"0.5",
         "filter":"alpha(opacity=90)",
         });
      $("#feedback_error_T3S3D3_"+current_trial_image_name_T3S3D3).show();
      feedback_T3S3D3.push("error");
      feedback_time_T3S3D3.push(time_counter_left - last_time_count);
    }

    set_current_time_T3S3D3(time_counter_left);
    total_image_T3S3D3(1);
   
}); 

$("#btn_yes_T3S3D3").click(function(){
    var current_trial_image_name_T3S3D3 = $('#current_trial_image_name_T3S3D3').val();
    time_counter_left = performance.now();
    // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
    if( image_index_T3S3D3 === trial_image_count_T3S3D3){
        $("#btn_<?php echo $id;?>").prop('disabled', false);
    }
    button_disable_T3S3D3();
    // $(".trial_images_T3S3D3").on('click touch', function () {
    //     total_image_T3S3D3(1);
    //     $("#feedback_correct_T3S3D3_"+current_trial_image_name_T3S3D3).hide();
    //     $("#feedback_error_T3S3D3_"+current_trial_image_name_T3S3D3).hide();
    //  });

  
    file_T3S3D3.push(current_trial_image_name_T3S3D3);
    var stimuli = current_trial_image_name_T3S3D3.substring(0,2);
    chart_T3S3D3.push(stimuli);
    elements_T3S3D3.push("t1");
    var start_pos = current_trial_image_name_T3S3D3.indexOf('_') + 1;
    var end_pos = current_trial_image_name_T3S3D3.indexOf('_',start_pos);
    var image_number = current_trial_image_name_T3S3D3.substring(start_pos,end_pos)
    // console.log("Image Seq", image_number)
    sequence_T3S3D3.push(image_number);
    trial_T3S3D3.push(image_index_T3S3D3);

    var sliced_current_trial_image_name = current_trial_image_name_T3S3D3.slice(current_trial_image_name_T3S3D3.lastIndexOf('t3') + 2);

    var feedback_match = sliced_current_trial_image_name.substr(0, 1);
    if(feedback_match === 'l'){
      $("#img_T3S3D3_"+current_trial_image_name_T3S3D3).css({"border-color": "green", 
         "border-width":"4px", 
         "border-style":"solid",
        //  "opacity":"0.5",
         "filter":"alpha(opacity=90)",
         });

      $("#feedback_correct_T3S3D3_"+current_trial_image_name_T3S3D3).show();
      feedback_T3S3D3.push("correct");
      feedback_time_T3S3D3.push(time_counter_left - last_time_count);
    }else{
      $("#img_T3S3D3_"+current_trial_image_name_T3S3D3).css({"border-color": "red", 
         "border-width":"4px", 
         "border-style":"solid",
        //  "opacity":"0.5",
         "filter":"alpha(opacity=90)",
         });

      $("#feedback_error_T3S3D3_"+current_trial_image_name_T3S3D3).show();
      feedback_T3S3D3.push("error");
      feedback_time_T3S3D3.push(time_counter_left - last_time_count);
    }

    set_current_time_T3S3D3(time_counter_left);
    total_image_T3S3D3(1);
   
}); 

});

$('body').on('next', function(e, type){
  // var page_number = $('#page_' + type).val();
  //  console.log("page number",  page_number);
  event.preventDefault();
  var p_id_T3S3D3 = $('#participant_id').val();
  if (type === '<?php echo $id;?>'){
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : { participant_id  : JSON.stringify(p_id_T3S3D3), 
                        chart           : JSON.stringify(chart_T3S3D3), 
                        elements        : JSON.stringify(elements_T3S3D3), 
                        trial           : JSON.stringify(trial_T3S3D3), 
                        sequence        : JSON.stringify(sequence_T3S3D3),
                        file            : JSON.stringify(file_T3S3D3), 
                        time            : JSON.stringify(feedback_time_T3S3D3), 
                        feedback        : JSON.stringify(feedback_T3S3D3) 
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


