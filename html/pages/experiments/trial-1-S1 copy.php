<style>
/* .watch-face {
  width: 213px;
  height: 213px;
  border-radius: 0%;
  background: #1f1e1e;
	/* background: #3F484A; Dial colour */
  border-top: 15px solid black;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom: 28px solid black;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
  border-left: 18px solid black;
  border-right: 18px solid black;
  
} */
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
/* .slideshow-inner{
  display: inline-block;  
} */
.trial_images_S1{  
    width: 213px;
    height: 213px;
    border: 2px solid black;
    margin: 10px 0px 100px 0;
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
.trial_images_S1 img{
      max-height: 100%;
      max-width: 100%;
      position: absolute;
      margin: auto;
      top: 0; left: 0; bottom: 0; right: 0;
} 

</style>
<?php
  $total_image_S1 = 30;
  $img_start_S1 = $image_start_end[0];
  $img_end_S1 = $image_start_end[1]; 
  $chart_type_S1 = $stimuli[0];
  $practice_trial_shuffle_S1 = array();
  $practice_trial_shuffle_S1 = handleImageFIle_S1($img_start_S1, $img_end_S1, $chart_type_S1);
    
  function handleImageFIle_S1($img_start_S1, $img_end_S1, $chart_type_S1){
        $handle_task = fopen("img_csv/$chart_type_S1.csv",'r') or die("can't open file");
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
      for( $i = $img_start_S1; $i <= $img_end_S1; $i ++){
        if ($i % 4 != 0) {
          if(isset($images[$i])){
            array_push($temp_image_array, $images[$i]);
        }
          // var_dump($images[$i]);
        
      }
        
      }
      $practice_trial_shuffle = [];
      $practice_trial_shuffle= $temp_image_array;
      shuffle($practice_trial_shuffle);
      //0,8,28,12,24
      // array_push($practice_trial_shuffle, $temp_image_array[0]);
      // array_push($practice_trial_shuffle, $temp_image_array[2]);
      // array_push($practice_trial_shuffle, $temp_image_array[7]);
      // array_push($practice_trial_shuffle, $temp_image_array[3]);
      // array_push($practice_trial_shuffle, $temp_image_array[6]);
      return $practice_trial_shuffle;
    }
//  var_dump( $practice_trial_shuffle_S1);

?>  

<div class="row justify-content-center align-items-center">
  <div class="col-12">
    <div class="d-flex justify-content-center task-description">
          <h2 class="legend">On which day did you sleep longer, Saturday or Sunday?</h2>
      </div>
      
      <div class="d-flex justify-content-center" style="margin-top: 10px;">
         <div class="watch-container">
              
                    <input type="hidden" id="current_trial_image_name_S1" name="current_trial_image_name_S1" value="">
                        <div class="slideshow-container">
                            <div class="slideshow-inner">

                        
                            <?php
                                    for( $i_s1 = 0; $i_s1 <= $total_image_S1; $i_s1++)
                                    { ?>
                                        <div class="trial_images_S1" id="<?php echo $practice_trial_shuffle_S1[$i_s1] ?>">
                                          <img  src="img/<?php echo $chart_type_S1; ?>/<?php echo $practice_trial_shuffle_S1[$i_s1] ?>.png"/>
                                        </div>  
                              <?php } ?>

                            </div>
                        </div>
               
          </div>
      </div>
    
        <div class="d-flex justify-content-center" style="margin-top: 10px;">
      
                <div class="col-xs-6">
                  <button type="button" id="btn_sunday_S1" class="btn btn-info btn-lg">Sat</button>
                </div>
                <div class="col-xs-6" style="margin-left: 15px;">
                  <button type="button" id="btn_saturday_S1" class="btn btn-info btn-lg">Sun</button>
                </div>    
         </div>
         <div class="d-flex justify-content-center" style="margin-top: 10px;">
         <div class="col-xs-6" id="feedback_correct" style="margin-left: 15px; display:none;">
                  <div class="d-inline p-2 bg-success text-white">Correct!</div>
                </div>
            <div class="col-xs-6" id="feedback_error" style="margin-left: 15px; display:none;">
                <div class="d-inline p-2 bg-danger text-white">Wrong!</div>
            </div>
         </div>
      
  </div> 
</div>

<script type="text/javascript">
var trial_image_count_S1 = <?php echo $total_image_S1;?>;
var image_index_S1 = 1;

var file_S1 = [];
var chart_S1 = [];
var task_S1 = [];
var trial_S1 = [];
var sequence_S1 = [];
var feedback_S1 = [];
var feedback_time_S1 = [];
// window.addEventListener("load",function() {

// })

$(document).ready(function() {

    time_counter_0_S1 = performance.now();
    set_current_time_S1(time_counter_0_S1);
    console.log("Initital time counter", time_counter_0_S1);
    show_images_S1(image_index_S1);
    $('.trial_images_S1').unbind('click touch');

    function set_current_time_S1(time_counter){
      last_time_count = time_counter;
    }
    function canvas_image_touch_deactive_S1(){
      $('.trial_images_S1').unbind('click touch');  
    }
    function button_enable_S1(){
        $('#btn_saturday_S1').prop('disabled', false);
        $('#btn_sunday_S1').prop('disabled', false);
    }
    function button_disable_S1(){
        $('#btn_saturday_S1').prop('disabled', true);
        $('#btn_sunday_S1').prop('disabled', true);     
    }
    function feedback_hide_S1(){
        $("#feedback_correct").hide();
        $("#feedback_error").hide();
    }
    function show_images_S1(n){
          if( image_index_S1 > trial_image_count_S1){
            button_disable_S1();
            canvas_image_touch_deactive_S1();
            return;
          }
          var i;
          var slides = document.getElementsByClassName("trial_images_S1");
          if (n > slides.length) {image_index_S1 = 1}
          if (n < 1) {image_index_S1 = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          slides[image_index_S1-1].style.display = "block";
          $('#current_trial_image_name_S1').val();
          // console.log(slides[image_index_S1-1].id);
          $('#current_trial_image_name_S1').val(slides[image_index_S1-1].id);
    }
    function next_images_S1(n){
        button_enable_S1();
        canvas_image_touch_deactive_S1();
        if (n < 0){
        show_images_S1(image_index_S1 -= 1);
        } else {
        show_images_S1(image_index_S1 += 1); 
        }
    }

    $("#btn_sunday_S1").click(function(){
        time_counter_left = performance.now();
        // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
        if( image_index_S1 === trial_image_count_S1){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_S1();
        $(".trial_images_S1").on('click touch', function () {
            next_images_S1(1);
            feedback_hide_S1();
         });

        var current_trial_image_name_S1 = $('#current_trial_image_name_S1').val();
        file_S1.push(current_trial_image_name_S1);
        var stimuli = current_trial_image_name_S1.substring(0,2);
        chart_S1.push(stimuli);
        task_S1.push("t1");
        var start_pos = current_trial_image_name_S1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_S1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_S1.substring(start_pos,end_pos)
        // console.log("Trial No", image_number)
        sequence_S1.push(image_number);
        trial_S1.push(image_index_S1);

        var sliced_current_trial_image_name = current_trial_image_name_S1.slice(current_trial_image_name_S1.lastIndexOf('t1') + 2);
        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'r'){
          $("#feedback_correct").show();
          feedback_S1.push("correct");
          feedback_time_S1.push(time_counter_left - last_time_count);
        }else{
          $("#feedback_error").show();
          feedback_S1.push("error");
          feedback_time_S1.push(time_counter_left - last_time_count);
        }

        set_current_time_S1(time_counter_left);
       
    }); 

    $("#btn_saturday_S1").click(function(){
        time_counter_left = performance.now();
        // console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
        if( image_index_S1 === trial_image_count_S1){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        button_disable_S1();
        $(".trial_images_S1").on('click touch', function () {
            next_images_S1(1);
            feedback_hide_S1();
         });

        var current_trial_image_name_S1 = $('#current_trial_image_name_S1').val();
        file_S1.push(current_trial_image_name_S1);
        var stimuli = current_trial_image_name_S1.substring(0,2);
        chart_S1.push(stimuli);
        task_S1.push("t1");
        var start_pos = current_trial_image_name_S1.indexOf('_') + 1;
        var end_pos = current_trial_image_name_S1.indexOf('_',start_pos);
        var image_number = current_trial_image_name_S1.substring(start_pos,end_pos)
        // console.log("Image Seq", image_number)
        sequence_S1.push(image_number);
        trial_S1.push(image_index_S1);

        var sliced_current_trial_image_name = current_trial_image_name_S1.slice(current_trial_image_name_S1.lastIndexOf('t1') + 2);

        var feedback_match = sliced_current_trial_image_name.substr(0, 1);
        if(feedback_match === 'l'){
          $("#feedback_correct").show();
          feedback_S1.push("correct");
          feedback_time_S1.push(time_counter_left - last_time_count);
        }else{
          $("#feedback_error").show();
          feedback_S1.push("error");
          feedback_time_S1.push(time_counter_left - last_time_count);
        }

        set_current_time_S1(time_counter_left);
       
    }); 

});

$('body').on('next', function(e, type){
  // var page_number = $('#page_' + type).val();
  //  console.log("page number",  page_number);
  event.preventDefault();
  var p_id = $('#participant_id').val();
  if (type === '<?php echo $id;?>'){
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : { participant_id     : JSON.stringify(p_id), 
                        chart_S1           : JSON.stringify(chart_S1), 
                        task_S1            : JSON.stringify(task_S1), 
                        trial_S1           : JSON.stringify(trial_S1), 
                        sequence_S1        : JSON.stringify(sequence_S1),
                        file_S1            : JSON.stringify(file_S1), 
                        time               : JSON.stringify(feedback_time_S1), 
                        feedback_S1        : JSON.stringify(feedback_S1) 
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


