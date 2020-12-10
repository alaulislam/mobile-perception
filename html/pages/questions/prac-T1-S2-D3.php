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

.trial_images_P_T1S2D3{  
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
    .trial_images_P_T1S2D3 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
}

</style>
<?php
  $total_image_P_T1S2D3 = 15;
  $img_start_P_T1S2D3 = $image_start_end["D3"][0]; 
  $img_end_P_T1S2D3 = $image_start_end["D3"][1]; 
  $chart_type_P_T1S2D3 = "S2";
  $trial_shuffle_P_T1S2D3 = array();
  $trial_shuffle_P_T1S2D3 = handleImageFIle_P_T1S2D3($img_start_P_T1S2D3, $img_end_P_T1S2D3, $chart_type_P_T1S2D3);
    
  function handleImageFIle_P_T1S2D3($img_start_P_T1S2D3, $img_end_P_T1S2D3, $chart_type_P_T1S2D3){
        $handle_task = fopen("img_csv/$chart_type_P_T1S2D3.csv",'r') or die("can't open file");
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
      

      for($i =0, $k = $img_start_P_T1S2D3; $k <= $img_end_P_T1S2D3; $k += 4, $i++){
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

<div class="row justify-content-center align-items-center">
  <div class="col-12">
    <div class="d-flex justify-content-center task-description">
          <h2 class="legend">On which day did you sleep longer, Saturday or Sunday?</h2>
      </div>
      
      <div class="d-flex justify-content-center" style="margin-top: 10px;">
              <input type="hidden" id="current_trial_image_name_P_T1S2D3" name="current_trial_image_name_P_T1S2D3" value="">
                <div class="slideshow-container">
                            <div class="slideshow-inner justify-content-center">
                            <!-- <div class="trial_images_P_T1S2D3" id="xxx">
                                          <img  src="img/S1/s1_20_t1rt2lt3l.png"/>
                             </div>   -->
                              <?php
                                      for( $i_P_T1S2D3 = 0; $i_P_T1S2D3 < $total_image_P_T1S2D3; $i_P_T1S2D3++)
                                      {  ?>                                     
                                          <div class="trial_images_P_T1S2D3" id="P-T1S2D3-<?php echo $i_P_T1S2D3; ?>-<?php echo $trial_shuffle_P_T1S2D3[$i_P_T1S2D3] ?>">
                                            <img id="img-P-T1S2D3-<?php echo $i_P_T1S2D3 ?>-<?php echo $trial_shuffle_P_T1S2D3[$i_P_T1S2D3] ?>" src="img/<?php echo $chart_type_P_T1S2D3 ?>/<?php echo $trial_shuffle_P_T1S2D3[$i_P_T1S2D3] ?>.png"/>
                                              <div class="d-flex justify-content-center">
                                                  <div class="caption center-block" id="feedback_correct_P-T1S2D3-<?php echo $i_P_T1S2D3; ?>-<?php echo $trial_shuffle_P_T1S2D3[$i_P_T1S2D3] ?>" style="display:none; color: black;margin-top: 173px;background: green;width: 86px;text-align: center;">Correct!</div>
                                              </div>
                                              <div class="d-flex justify-content-center">
                                                  <div class="caption center-block" id="feedback_error_P-T1S2D3-<?php echo $i_P_T1S2D3; ?>-<?php echo $trial_shuffle_P_T1S2D3[$i_P_T1S2D3] ?>" style="display:none; color: white;margin-top: 173px;background: red;width: 86px;text-align: center;">Wrong!</div>
                                              </div>
                                          </div>  
                                <?php } ?>
                                
                            </div>
                         
                 </div>
      </div>


      <div class="d-flex justify-content-center">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
              <button type="button" id="btn_saturday_P_T1S2D3" class="btn btn-info">Sat</button>
              <button type="button" id="btn_sunday_P_T1S2D3" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
    </div>

      
  </div> 
</div>

<script type="text/javascript">
var trial_image_count_P_T1S2D3 = <?php echo $total_image_P_T1S2D3; ?>;
var image_index_P_T1S2D3 = 1;

var file_P_T1S2D3 = [];
var chart_P_T1S2D3 = [];
var elements_P_T1S2D3 = [];
var trial_P_T1S2D3 = [];
var sequence_P_T1S2D3 = [];
var feedback_P_T1S2D3 = [];
var feedback_time_P_T1S2D3 = [];
// window.addEventListener("load",function() {

// })

$(document).ready(function() {

    var time_counter_0_P_T1S2D3 = performance.now();
    set_current_time_P_T1S2D3(time_counter_0_P_T1S2D3);
    console.log("Initital time counter", time_counter_0_P_T1S2D3);
    show_images_P_T1S2D3(image_index_P_T1S2D3);
    $('.trial_images_P_T1S2D3').unbind('click touch');

    function set_current_time_P_T1S2D3(time_counter){
      last_time_count_P_T1S2D3 = time_counter;
    }
    function canvas_image_touch_deactive_P_T1S2D3(){
      $('.trial_images_P_T1S2D3').unbind('click touch');  
    }
    function button_enable_P_T1S2D3(){
        $('#btn_saturday_P_T1S2D3').prop('disabled', false);
        $('#btn_sunday_P_T1S2D3').prop('disabled', false);
    }
    function button_disable_P_T1S2D3(){
        $('#btn_saturday_P_T1S2D3').prop('disabled', true);
        $('#btn_sunday_P_T1S2D3').prop('disabled', true);     
    }

    function show_images_P_T1S2D3(n){
          if( image_index_P_T1S2D3 > trial_image_count_P_T1S2D3){
            button_disable_P_T1S2D3();
            canvas_image_touch_deactive_P_T1S2D3();
            return;
          }
          var i_P_T1S2D3;
          var slides_P_T1S2D3 = document.getElementsByClassName("trial_images_P_T1S2D3");
          if (n > slides_P_T1S2D3.length) {image_index_P_T1S2D3 = 1}
          if (n < 1) {image_index_P_T1S2D3 = slides_P_T1S2D3.length}
          for (i_P_T1S2D3 = 0; i_P_T1S2D3 < slides_P_T1S2D3.length; i_P_T1S2D3++) {
              slides_P_T1S2D3[i_P_T1S2D3].style.display = "none";
          }
          slides_P_T1S2D3[image_index_P_T1S2D3-1].style.display = "block";
          $('#current_trial_image_name_P_T1S2D3').val();
          // console.log(slides_P_T1S2D3[image_index_P_T1S2D3-1].id);
          $('#current_trial_image_name_P_T1S2D3').val(slides_P_T1S2D3[image_index_P_T1S2D3-1].id);
    }
    function next_images_P_T1S2D3(n){
        button_enable_P_T1S2D3();
        canvas_image_touch_deactive_P_T1S2D3();
        if (n < 0){
        show_images_P_T1S2D3(image_index_P_T1S2D3 -= 1);
        } else {
        show_images_P_T1S2D3(image_index_P_T1S2D3 += 1); 
        }
    }

    $("#btn_sunday_P_T1S2D3").click(function(){
        var current_trial_image_name_P_T1S2D3 = $('#current_trial_image_name_P_T1S2D3').val();
        var time_counter_left_P_T1S2D3 = performance.now();
        // console.log("Left button clicked" + (time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3) + " milliseconds.")
        if( image_index_P_T1S2D3 === trial_image_count_P_T1S2D3){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_P_T1S2D3();
        $(".trial_images_P_T1S2D3").on('click touch', function () {
            next_images_P_T1S2D3(1);
            // feedback_hide_T1();
            $("#feedback_correct_"+current_trial_image_name_P_T1S2D3).hide();
            $("#feedback_error_"+current_trial_image_name_P_T1S2D3).hide();
         });

     
        file_P_T1S2D3.push(current_trial_image_name_P_T1S2D3);
        var stimuli_P_T1S2D3 = current_trial_image_name_P_T1S2D3.substring(0,2);
        chart_P_T1S2D3.push(stimuli_P_T1S2D3);
        elements_P_T1S2D3.push("t1");
        var start_pos_P_T1S2D3 = current_trial_image_name_P_T1S2D3.indexOf('_') + 1;
        var end_pos_P_T1S2D3 = current_trial_image_name_P_T1S2D3.indexOf('_',start_pos_P_T1S2D3);
        var image_number_P_T1S2D3 = current_trial_image_name_P_T1S2D3.substring(start_pos_P_T1S2D3,end_pos_P_T1S2D3)
        // console.log("Trial No", image_number_P_T1S2D3)
        sequence_P_T1S2D3.push(image_number_P_T1S2D3);
        trial_P_T1S2D3.push(image_index_P_T1S2D3);

        var sliced_current_trial_image_name_P_T1S2D3 = current_trial_image_name_P_T1S2D3.slice(current_trial_image_name_P_T1S2D3.lastIndexOf('t1') + 2);
        var feedback_match_P_T1S2D3 = sliced_current_trial_image_name_P_T1S2D3.substr(0, 1);
        if(feedback_match_P_T1S2D3 === 'r'){
          
          // var element = document.querySelector('[id^="img-"]').id;
           $("#img-"+current_trial_image_name_P_T1S2D3).css({"border-color": "green", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_correct_"+current_trial_image_name_P_T1S2D3).show();
          feedback_P_T1S2D3.push("correct");
          feedback_time_P_T1S2D3.push(time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3);
        }else{

          $("#img-"+current_trial_image_name_P_T1S2D3).css({"border-color": "red", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });
          $("#feedback_error_"+current_trial_image_name_P_T1S2D3).show();
          feedback_P_T1S2D3.push("error");
          feedback_time_P_T1S2D3.push(time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3);
        }

        set_current_time_P_T1S2D3(time_counter_left_P_T1S2D3);
       
    }); 

    $("#btn_saturday_P_T1S2D3").click(function(){
        var current_trial_image_name_P_T1S2D3 = $('#current_trial_image_name_P_T1S2D3').val();
        time_counter_left_P_T1S2D3 = performance.now();
        // console.log("Left button clicked" + (time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3) + " milliseconds.")
        if( image_index_P_T1S2D3 === trial_image_count_P_T1S2D3){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_P_T1S2D3();
        $(".trial_images_P_T1S2D3").on('click touch', function () {
            next_images_P_T1S2D3(1);
            $("#feedback_correct_"+current_trial_image_name_P_T1S2D3).hide();
            $("#feedback_error_"+current_trial_image_name_P_T1S2D3).hide();
         });

      
        file_P_T1S2D3.push(current_trial_image_name_P_T1S2D3);
        var stimuli_P_T1S2D3 = current_trial_image_name_P_T1S2D3.substring(0,2);
        chart_P_T1S2D3.push(stimuli_P_T1S2D3);
        elements_P_T1S2D3.push("t1");
        var start_pos_P_T1S2D3 = current_trial_image_name_P_T1S2D3.indexOf('_') + 1;
        var end_pos_P_T1S2D3 = current_trial_image_name_P_T1S2D3.indexOf('_',start_pos_P_T1S2D3);
        var image_number_P_T1S2D3 = current_trial_image_name_P_T1S2D3.substring(start_pos_P_T1S2D3,end_pos_P_T1S2D3)
        // console.log("Image Seq", image_number_P_T1S2D3)
        sequence_P_T1S2D3.push(image_number_P_T1S2D3);
        trial_P_T1S2D3.push(image_index_P_T1S2D3);

        var sliced_current_trial_image_name_P_T1S2D3 = current_trial_image_name_P_T1S2D3.slice(current_trial_image_name_P_T1S2D3.lastIndexOf('t1') + 2);

        var feedback_match_P_T1S2D3 = sliced_current_trial_image_name_P_T1S2D3.substr(0, 1);
        if(feedback_match_P_T1S2D3 === 'l'){
          $("#img-"+current_trial_image_name_P_T1S2D3).css({"border-color": "green", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_correct_"+current_trial_image_name_P_T1S2D3).show();
          feedback_P_T1S2D3.push("correct");
          feedback_time_P_T1S2D3.push(time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3);
        }else{
          $("#img-"+current_trial_image_name_P_T1S2D3).css({"border-color": "red", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_error_"+current_trial_image_name_P_T1S2D3).show();
          feedback_P_T1S2D3.push("error");
          feedback_time_P_T1S2D3.push(time_counter_left_P_T1S2D3 - last_time_count_P_T1S2D3);
        }

        set_current_time_P_T1S2D3(time_counter_left_P_T1S2D3);
       
    }); 

});

$('body').on('next', function(e, type){

  // var page_number = $('#page_' + type).val();
  //  console.log("page number",  type);
  event.preventDefault();
  var p_id_P_T1S2D3 = $('#participant_id').val();
  if (type === '<?php echo $id;?>'){
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : { participant_id  : JSON.stringify(p_id_P_T1S2D3), 
                        chart           : JSON.stringify(chart_P_T1S2D3), 
                        elements        : JSON.stringify(elements_P_T1S2D3), 
                        trial           : JSON.stringify(trial_P_T1S2D3), 
                        sequence        : JSON.stringify(sequence_P_T1S2D3),
                        file            : JSON.stringify(file_P_T1S2D3), 
                        time            : JSON.stringify(feedback_time_P_T1S2D3), 
                        feedback        : JSON.stringify(feedback_P_T1S2D3) 
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


