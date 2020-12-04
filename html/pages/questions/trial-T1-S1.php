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

.trial_images_T1S1{  
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
    .trial_images_T1S1 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
}


#gif_trial_images_T1S1{  
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
    #gif_trial_images_T1S1 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
}

#gif_trial_images_T1S1 .btn {
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

#gif_trial_images_T1S1 .btn:hover {
  background-color: black;
}



</style>


<?php
  $total_image_T1S1 = 31;
  $img_start_T1S1 = $image_start_end[0];
  $img_end_T1S1 = $image_start_end[1]; 
  $chart_type_T1S1 = "S1";
  $practice_trial_shuffle_T1S1 = array();
  $practice_trial_shuffle_T1S1 = handleImageFIle_S1($img_start_T1S1, $img_end_T1S1, $chart_type_T1S1);
    
  function handleImageFIle_S1($img_start_T1S1, $img_end_T1S1, $chart_type_T1S1){
        $handle_task = fopen("img_csv/$chart_type_T1S1.csv",'r') or die("can't open file");
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
      for($i =0, $k = $img_start_T1S1; $k <= $img_end_T1S1; $k ++, $i++){
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
    <div class="d-flex justify-content-center task-description">
          <h2 class="legend">On which day did you sleep longer, Saturday or Sunday?</h2>
      </div>
      
      <div class="d-flex justify-content-center" style="margin-top: 10px;">
                <input type="hidden" id="current_trial_image_name_T1S1" value="">
                    <div class="slideshow-container">
                        <div class="slideshow-inner justify-content-center ">
                        <div id="gif_trial_images_T1S1">
                                   <img  src="img/exp_start2.jpg"/>
                                   <button class="btn" id="btn_trial_images_T1S1">Start!</button>
                             </div> 
                             <div id="div_trial_images_T1S1" style="display:none"> 
                        <?php
                                for( $i_t1s1 = 0; $i_t1s1 < 30; $i_t1s1++)
                                {  ?>                                     
                                    <div class="trial_images_T1S1" id="T1S1_<?php echo $i_t1s1; ?>_<?php echo $practice_trial_shuffle_T1S1[$i_t1s1] ?>" >
                                      <img id="img_T1S1_<?php echo $i_t1s1 ?><?php echo $practice_trial_shuffle_T1S1[$i_t1s1] ?>" src="img/<?php echo $chart_type_T1S1; ?>/<?php echo $practice_trial_shuffle_T1S1[$i_t1s1] ?>.png"/>
                                    </div>  
                          <?php } ?>

                                  <!-- <div class="trial_images_T1S1" id="T1S1ATTN-s1_76_t1lt2lt3r">
                                          <img  src="img/attention/T1_S1/ATTN-s1_76_t1lt2lt3r.png"/>
                                  </div> -->
                                  <div class="trial_images_T1S1" id="T1S1ATTN-s1_113_t1rt2lt3r">
                                          <img  src="img/attention/T1_S1/ATTN-s1_113_t1rt2lt3r.png"/>
                                  </div>
                                  <!-- <div class="trial_images_T1S1" id="T1S1ATTN-s1_117_t1lt2lt3r">
                                          <img  src="img/attention/T1_S1/ATTN-s1_117_t1lt2lt3r.png"/>
                                  </div> -->

                          </div>
                        </div>
                    </div>
      </div>


      <div class="d-flex justify-content-center">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
              <button type="button" id="btn_saturday_T1S1" class="btn btn-info">Sat</button>
              <button type="button" id="btn_sunday_T1S1" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
    </div>

      
  </div> 
</div>

<script type="text/javascript">
var trial_image_count_T1S1 = <?php echo $total_image_T1S1; ?>;
var image_index_T1S1 = 1;

var file_T1S1 = [];
var chart_T1S1 = [];
var elements_T1S1 = [];
var trial_T1S1 = [];
var sequence_T1S1 = [];
var feedback_T1S1 = [];
var feedback_time_T1S1 = [];
var attention_check_count_T1S1 = 0;


$(document).ready(function() {
  $("#btn_saturday_T1S1").hide();
  $("#btn_sunday_T1S1").hide();
  $("#btn_<?php echo $id;?>").hide();

  $("#btn_trial_images_T1S1").click(function(){
    $("#gif_trial_images_T1S1").hide();
    $('#div_trial_images_T1S1').show();
    $("#btn_saturday_T1S1").show();
    $("#btn_sunday_T1S1").show();
    $("#btn_<?php echo $id;?>").show();
  }); 

  // setTimeout(function() {
  //   $("#gif_trial_images_T1S1").hide();
  //   }, 4000);
  //   $('#div_trial_images_T1S1').delay(4000).show(0);  

var time_counter_0_T1S1 = performance.now();
set_current_time_T1S1(time_counter_0_T1S1);
console.log("Initital time counter", time_counter_0_T1S1);
show_images_T1S1(image_index_T1S1);
$('.trial_images_T1S1').unbind('click touch');

function set_current_time_T1S1(time_counter){
  last_time_count = time_counter;
}
// function canvas_image_touch_deactive_T1S1(){
//   $('.trial_images_T1S1').unbind('click touch');  
// }
function button_enable_T1S1(){
    $('#btn_saturday_T1S1').prop('disabled', false);
    $('#btn_sunday_T1S1').prop('disabled', false);
}
function button_disable_T1S1(){
    $('#btn_saturday_T1S1').prop('disabled', true);
    $('#btn_sunday_T1S1').prop('disabled', true);     
}

function show_images_T1S1(n){
      if( image_index_T1S1 > trial_image_count_T1S1){
        button_disable_T1S1();
        $("#btn_<?php echo $id;?>").prop('disabled', false);
        // alert(attention_check_count_T1S1);
        return;
      }
      var i;
      var slides_T1S1 = document.getElementsByClassName("trial_images_T1S1");
      if (n > slides_T1S1.length) {image_index_T1S1 = 1}
      if (n < 1) {image_index_T1S1 = slides_T1S1.length}
      for (i = 0; i < slides_T1S1.length; i++) {
          slides_T1S1[i].style.display = "none";
      }
      slides_T1S1[image_index_T1S1-1].style.display = "block";
      $('#current_trial_image_name_T1S1').val();
      // console.log(slides_T1S1[image_index_T1S1-1].id);
      $('#current_trial_image_name_T1S1').val(slides_T1S1[image_index_T1S1-1].id);

}
function next_images_T1S1(n){
    button_enable_T1S1();
    // canvas_image_touch_deactive_T1S1();
    if (n < 0){
    show_images_T1S1(image_index_T1S1 -= 1);
    } else {
    show_images_T1S1(image_index_T1S1 += 1); 
    }
}

$("#btn_sunday_T1S1").click(function(){
    var current_trial_image_name_T1S1 = $('#current_trial_image_name_T1S1').val();
    var attention_check = current_trial_image_name_T1S1.startsWith("T1S1ATTN-");
    if(!attention_check){
        time_counter_left = performance.now();
        file_T1S1.push(current_trial_image_name_T1S1);
        var stimuli = current_trial_image_name_T1S1.substring(0,2);
        chart_T1S1.push(stimuli);
        elements_T1S1.push("t1");
        var start_pos = current_trial_image_name_T1S1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_T1S1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_T1S1.substring(start_pos,end_pos)
        sequence_T1S1.push(image_number);
        trial_T1S1.push(image_index_T1S1);

        var sliced_current_trial_image_name = current_trial_image_name_T1S1.slice(current_trial_image_name_T1S1.lastIndexOf('t1') + 2);
        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'r'){
          feedback_T1S1.push("correct");
          feedback_time_T1S1.push(time_counter_left - last_time_count);
        }else{
          feedback_T1S1.push("error");
          feedback_time_T1S1.push(time_counter_left - last_time_count);
        }
        set_current_time_T1S1(time_counter_left);
    }else{
        var attn_sliced_current_trial_image_name = current_trial_image_name_T1S1.slice(current_trial_image_name_T1S1.lastIndexOf('t1') + 2);
        var attn_feedback_match = attn_sliced_current_trial_image_name.substr(0, 1);
        if(attn_feedback_match === 'r'){
          attention_check_count_T1S1 = attention_check_count_T1S1 + 1;
        }else{
          attention_check_count_T1S1 = attention_check_count_T1S1 + 0;
        } 
    }
    if( image_index_T1S1 > trial_image_count_T1S1){
        button_disable_T1S1();
        return;
      }
      else{
        next_images_T1S1(1);
      }
   
}); 

$("#btn_saturday_T1S1").click(function(){
    var current_trial_image_name_T1S1 = $('#current_trial_image_name_T1S1').val();
    var attention_check = current_trial_image_name_T1S1.startsWith("T1S1ATTN-");
    if(!attention_check){
        time_counter_left = performance.now();
      
        file_T1S1.push(current_trial_image_name_T1S1);
        var stimuli = current_trial_image_name_T1S1.substring(0,2);
        chart_T1S1.push(stimuli);
        elements_T1S1.push("t1");
        var start_pos = current_trial_image_name_T1S1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_T1S1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_T1S1.substring(start_pos,end_pos)
        // console.log("Image Seq", image_number)
        sequence_T1S1.push(image_number);
        trial_T1S1.push(image_index_T1S1);

        var sliced_current_trial_image_name = current_trial_image_name_T1S1.slice(current_trial_image_name_T1S1.lastIndexOf('t1') + 2);

        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'l'){
          feedback_T1S1.push("correct");
          feedback_time_T1S1.push(time_counter_left - last_time_count);
        }else{
          feedback_T1S1.push("error");
          feedback_time_T1S1.push(time_counter_left - last_time_count);
        }

        set_current_time_T1S1(time_counter_left);

    }else{
        var attn_sliced_current_trial_image_name = current_trial_image_name_T1S1.slice(current_trial_image_name_T1S1.lastIndexOf('t1') + 2);
        var attn_feedback_match = attn_sliced_current_trial_image_name.substr(0, 1);
        if(attn_feedback_match === 'l'){
          attention_check_count_T1S1 = attention_check_count_T1S1 + 1;
        }else{
          attention_check_count_T1S1 = attention_check_count_T1S1 + 0;
        } 
    }
    
    if( image_index_T1S1 > trial_image_count_T1S1){
        button_disable_T1S1();
        return;
      }
      else{
        next_images_T1S1(1);
      }
   
}); 

});

$('body').on('next', function(e, type){
  // var page_number = $('#page_' + type).val();
  //  console.log("page number",  page_number);
  event.preventDefault();
  var p_id_T1S1 = $('#participant_id').val();
  if (type === '<?php echo $id;?>'){
    if(attention_check_count_T1S1 === 0){
      excluded = true;
      $('body').trigger('excluded');
      // console.log("failed on attention check --> exclude");
      $('#<?php echo $next ?>').hide().promise().done(() => $('#excluded').show());
      $(":button").hide();
    } else {
      // console.log("passed on attention check");
      $('#<?php echo $id ?>').hide().promise().done(() => $('#<?php echo $next ?>').show());
  }
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : { participant_id  : JSON.stringify(p_id_T1S1), 
                        chart           : JSON.stringify(chart_T1S1), 
                        elements        : JSON.stringify(elements_T1S1), 
                        trial           : JSON.stringify(trial_T1S1), 
                        sequence        : JSON.stringify(sequence_T1S1),
                        file            : JSON.stringify(file_T1S1), 
                        time            : JSON.stringify(feedback_time_T1S1), 
                        feedback        : JSON.stringify(feedback_T1S1) 
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


