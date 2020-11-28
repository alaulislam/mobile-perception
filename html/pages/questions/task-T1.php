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

.trial_images_T1{  
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
    .trial_images_T1 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
}

</style>
<?php
  $total_image_T1 = 15;
  $img_start_T1 = $image_start_end[0]; 
  $img_end_T1 = $image_start_end[1]; 
  $chart_type_T1 = $stimuli[0];
  $practice_trial_shuffle_T1 = array();
  $practice_trial_shuffle_T1 = handleImageFIleT1($img_start_T1, $img_end_T1, $chart_type_T1);
    
  function handleImageFIleT1($img_start_T1, $img_end_T1, $chart_type_T1){
        $handle_task = fopen("img_csv/$chart_type_T1.csv",'r') or die("can't open file");
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
      

      for($i =0, $k = $img_start_T1; $k <= $img_end_T1; $k += 4, $i++){
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
              <input type="hidden" id="current_trial_image_name_T1" name="current_trial_image_name_T1" value="">
                <div class="slideshow-container">
                            <div class="slideshow-inner justify-content-center">
                            Task 1
                            <!-- <div class="trial_images_T1" id="xxx">
                                          <img  src="img/S1/s1_20_t1rt2lt3l.png"/>
                             </div>   -->
                              <?php
                                      for( $i_t1 = 0; $i_t1 < $total_image_T1; $i_t1++)
                                      {  ?>                                     
                                          <div class="trial_images_T1" id="T1-<?php echo $i_t1; ?>-<?php echo $practice_trial_shuffle_T1[$i_t1] ?>">
                                            <img id="img-T1-<?php echo $i_t1 ?>-<?php echo $practice_trial_shuffle_T1[$i_t1] ?>" src="img/<?php echo $chart_type_T1 ?>/<?php echo $practice_trial_shuffle_T1[$i_t1] ?>.png"/>
                                              <div class="d-flex justify-content-center">
                                                  <div class="caption center-block" id="feedback_correct_T1-<?php echo $i_t1; ?>-<?php echo $practice_trial_shuffle_T1[$i_t1] ?>" style="display:none; color: black;margin-top: 173px;background: green;width: 86px;text-align: center;">Correct!</div>
                                              </div>
                                              <div class="d-flex justify-content-center">
                                                  <div class="caption center-block" id="feedback_error_T1-<?php echo $i_t1; ?>-<?php echo $practice_trial_shuffle_T1[$i_t1] ?>" style="display:none; color: white;margin-top: 173px;background: red;width: 86px;text-align: center;">Wrong!</div>
                                              </div>
                                          </div>  
                                <?php } ?>
                                
                            </div>
                         
                 </div>
      </div>


      <div class="d-flex justify-content-center">
            <div class = "btn-group-justified btn-group-lg btn-group-vertical">
              <button type="button" id="btn_saturday_T1" class="btn btn-info">Sat</button>
              <button type="button" id="btn_sunday_T1" class="btn btn-info" style="margin-top: 15px;">Sun</button>
            </div>
    </div>

      
  </div> 
</div>

<script type="text/javascript">
var trial_image_count_T1 = <?php echo $total_image_T1; ?>;
var image_index_T1 = 1;

var file_T1 = [];
var chart_T1 = [];
var elements_T1 = [];
var trial_T1 = [];
var sequence_T1 = [];
var feedback_T1 = [];
var feedback_time_T1 = [];
// window.addEventListener("load",function() {

// })

$(document).ready(function() {

    var time_counter_0_T1 = performance.now();
    set_current_time_T1(time_counter_0_T1);
    console.log("Initital time counter", time_counter_0_T1);
    show_images_T1(image_index_T1);
    $('.trial_images_T1').unbind('click touch');

    function set_current_time_T1(time_counter){
      last_time_count = time_counter;
    }
    function canvas_image_touch_deactive_T1(){
      $('.trial_images_T1').unbind('click touch');  
    }
    function button_enable_T1(){
        $('#btn_saturday_T1').prop('disabled', false);
        $('#btn_sunday_T1').prop('disabled', false);
    }
    function button_disable_T1(){
        $('#btn_saturday_T1').prop('disabled', true);
        $('#btn_sunday_T1').prop('disabled', true);     
    }

    function show_images_T1(n){
          if( image_index_T1 > trial_image_count_T1){
            button_disable_T1();
            canvas_image_touch_deactive_T1();
            return;
          }
          var i;
          var slides_T1 = document.getElementsByClassName("trial_images_T1");
          if (n > slides_T1.length) {image_index_T1 = 1}
          if (n < 1) {image_index_T1 = slides_T1.length}
          for (i = 0; i < slides_T1.length; i++) {
              slides_T1[i].style.display = "none";
          }
          slides_T1[image_index_T1-1].style.display = "block";
          $('#current_trial_image_name_T1').val();
          // console.log(slides_T1[image_index_T1-1].id);
          $('#current_trial_image_name_T1').val(slides_T1[image_index_T1-1].id);
    }
    function next_images_T1(n){
        button_enable_T1();
        canvas_image_touch_deactive_T1();
        if (n < 0){
        show_images_T1(image_index_T1 -= 1);
        } else {
        show_images_T1(image_index_T1 += 1); 
        }
    }

    $("#btn_sunday_T1").click(function(){
        var current_trial_image_name_T1 = $('#current_trial_image_name_T1').val();
        time_counter_left = performance.now();
        // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
        if( image_index_T1 === trial_image_count_T1){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_T1();
        $(".trial_images_T1").on('click touch', function () {
            next_images_T1(1);
            // feedback_hide_T1();
            $("#feedback_correct_"+current_trial_image_name_T1).hide();
            $("#feedback_error_"+current_trial_image_name_T1).hide();
         });

     
        file_T1.push(current_trial_image_name_T1);
        var stimuli = current_trial_image_name_T1.substring(0,2);
        chart_T1.push(stimuli);
        elements_T1.push("t1");
        var start_pos = current_trial_image_name_T1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_T1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_T1.substring(start_pos,end_pos)
        // console.log("Trial No", image_number)
        sequence_T1.push(image_number);
        trial_T1.push(image_index_T1);

        var sliced_current_trial_image_name = current_trial_image_name_T1.slice(current_trial_image_name_T1.lastIndexOf('t1') + 2);
        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'r'){
          
          // var element = document.querySelector('[id^="img-"]').id;
           $("#img-"+current_trial_image_name_T1).css({"border-color": "green", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_correct_"+current_trial_image_name_T1).show();
          feedback_T1.push("correct");
          feedback_time_T1.push(time_counter_left - last_time_count);
        }else{

          $("#img-"+current_trial_image_name_T1).css({"border-color": "red", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });
          $("#feedback_error_"+current_trial_image_name_T1).show();
          feedback_T1.push("error");
          feedback_time_T1.push(time_counter_left - last_time_count);
        }

        set_current_time_T1(time_counter_left);
       
    }); 

    $("#btn_saturday_T1").click(function(){
        var current_trial_image_name_T1 = $('#current_trial_image_name_T1').val();
        time_counter_left = performance.now();
        // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
        if( image_index_T1 === trial_image_count_T1){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_T1();
        $(".trial_images_T1").on('click touch', function () {
            next_images_T1(1);
            $("#feedback_correct_"+current_trial_image_name_T1).hide();
            $("#feedback_error_"+current_trial_image_name_T1).hide();
         });

      
        file_T1.push(current_trial_image_name_T1);
        var stimuli = current_trial_image_name_T1.substring(0,2);
        chart_T1.push(stimuli);
        elements_T1.push("t1");
        var start_pos = current_trial_image_name_T1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_T1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_T1.substring(start_pos,end_pos)
        // console.log("Image Seq", image_number)
        sequence_T1.push(image_number);
        trial_T1.push(image_index_T1);

        var sliced_current_trial_image_name = current_trial_image_name_T1.slice(current_trial_image_name_T1.lastIndexOf('t1') + 2);

        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'l'){
          $("#img-"+current_trial_image_name_T1).css({"border-color": "green", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_correct_"+current_trial_image_name_T1).show();
          feedback_T1.push("correct");
          feedback_time_T1.push(time_counter_left - last_time_count);
        }else{
          $("#img-"+current_trial_image_name_T1).css({"border-color": "red", 
             "border-width":"4px", 
             "border-style":"solid",
            //  "opacity":"0.5",
             "filter":"alpha(opacity=90)",
             });

          $("#feedback_error_"+current_trial_image_name_T1).show();
          feedback_T1.push("error");
          feedback_time_T1.push(time_counter_left - last_time_count);
        }

        set_current_time_T1(time_counter_left);
       
    }); 

});

$('body').on('next', function(e, type){

  // var page_number = $('#page_' + type).val();
  //  console.log("page number",  type);
  event.preventDefault();
  var p_id_T1 = $('#participant_id').val();
  if (type === '<?php echo $id;?>'){
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : { participant_id  : JSON.stringify(p_id_T1), 
                        chart           : JSON.stringify(chart_T1), 
                        elements        : JSON.stringify(elements_T1), 
                        trial           : JSON.stringify(trial_T1), 
                        sequence        : JSON.stringify(sequence_T1),
                        file            : JSON.stringify(file_T1), 
                        time            : JSON.stringify(feedback_time_T1), 
                        feedback        : JSON.stringify(feedback_T1) 
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

