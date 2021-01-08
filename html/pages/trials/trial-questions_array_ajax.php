<style>
.watch-face {
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
  
}
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
img {
  max-width: 100%;
  max-height: 100%;
}
</style>

<div class="row justify-content-center align-items-center">
  <div class="col-12">
    <div class="d-flex justify-content-center task-description">
          <h2 class="legend">On which day did you sleep longer, Saturday or Sunday?</h2>
      </div>
      
      <div class="d-flex justify-content-center" style="margin-top: 10px;">
         <div class="watch-container">
                <div class="watch-face text-center" id="imageDiv2"> 
                    <input type="hidden" id="selectionId" name="selectionId" value="">
                    <input type="hidden" id="selectionArray" name="selectionArray[]" value="">
                        <div class="slideshow-container">
                            <div class="slideshow-inner">
                                <div class="mySlides" id="s1_0_t1rt2rt3l">
                                    <img  src='img/trial/s1_0_t1rt2rt3l.png'/>
                                </div>  
                                <div class="mySlides" id="s1_5_t1lt2rt3l">
                                    <img  src='img/trial/s1_5_t1lt2rt3l.png'/>
                                </div>  
                                <div class="mySlides" id="s1_13_t1rt2rt3r">
                                    <img  src='img/trial/s1_13_t1rt2rt3r.png'/>
                                </div>  
                            </div>
                        </div>
                </div>
          </div>
      </div>
    
        <div class="d-flex justify-content-center" style="margin-top: 10px;">
      
                <div class="col-xs-6">
                  <button type="button" id="btn_no" class="btn btn-info btn-lg" onclick="left_btn_for_sunday()">Sun</button>
                </div>
                <div class="col-xs-6" style="margin-left: 15px;">
                  <button type="button" id="btn_yes" class="btn btn-info btn-lg" onclick="right_btn_for_saturday()">Sat</button>
                </div>
                <div class="col-xs-6" id="feedback_correct" style="margin-left: 15px; display:none;">
                  <div class="d-inline p-2 bg-success text-white">Correct!</div>
                </div>
                <div class="col-xs-6" id="feedback_wrong" style="margin-left: 15px; display:none;">
                  <div class="d-inline p-2 bg-danger text-white">Wrong!</div>
                </div>
         </div>
      
  </div> 
</div>
<?php 
// function debug_to_console($data) {
//   $output = $data;
//   if (is_array($output))
//       $output = implode(',', $output);

//   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
?>
<script type="text/javascript">
var trial_image_count = 3;
var slideIndex = 1;
var myTimer;
var slideshowContainer;
var selectionArray = [];
var trial_img_name = [];
var trial_img_ans = [];
var trial_img_ans_time = [];
var time_counter_0,time_counter_right, time_counter_left, last_time_count;
window.addEventListener("load",function() {
    time_counter_0 = performance.now();
    set_current_time(time_counter_0);
    console.log("Initital time counter", time_counter_0);
    showSlides(slideIndex);
    $('.mySlides').unbind('click touch');
    // myTimer = setInterval(function(){plusSlides(1)}, 4000);
})

        // NEXT AND PREVIOUS CONTROL
function plusSlides(n){
        $('.mySlides').unbind('click touch');
        $('#btn_yes').prop('disabled', false);
        $('#btn_no').prop('disabled', false);
        // console.log('N:', n)
        // clearInterval(myTimer);
        if (n < 0){
        showSlides(slideIndex -= 1);
        } else {
        showSlides(slideIndex += 1); 
        }
        
        //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
        
        // if (n === -1){
        // myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
        // } else if( n < 2){ 
        // myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
        // }
    }

//Controls the current slide and resets interval if needed
// function currentSlide(n){
//         clearInterval(myTimer);
//         myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
//         showSlides(slideIndex = n);
// }

function set_current_time(time_counter){
  last_time_count = time_counter;
}
function showSlides(n){
          if( slideIndex > trial_image_count){
            $('#btn_yes').prop('disabled', true);
            $('#btn_no').prop('disabled', true);
            $('.mySlides').unbind('click touch');
            return;
          }
          var i;
          var slides = document.getElementsByClassName("mySlides");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          slides[slideIndex-1].style.display = "block";
          $('#selectionId').val();
          // console.log(slides[slideIndex-1].id);
          $('#selectionId').val(slides[slideIndex-1].id);
        }
function right_btn_for_saturday(){
        // time_counter_right = last_time_count;
        time_counter_right = performance.now();
        console.log("Right button clicked" + (time_counter_right - last_time_count) + " milliseconds.")
        
        if( slideIndex === trial_image_count){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        $('#btn_yes').prop('disabled', true);
        $('#btn_no').prop('disabled', true);
        $(".mySlides").on('click touch', function () {
            plusSlides(1);
            $("#feedback_correct").hide();
            $("#feedback_wrong").hide();
         });
        
        var str = $('#selectionId').val();
      // s1_0_t1rt2rt3l
        var sliced_str = str.slice(str.lastIndexOf('t1') + 2);
        var res = sliced_str.substr(0, 1);
        if(res === 'l'){
            $("#feedback_correct").show();
            trial_img_name.push(str)
            trial_img_ans.push("correct");
            trial_img_ans_time.push(time_counter_right - last_time_count);

          }else{
            $("#feedback_wrong").show();
            trial_img_name.push(str);
            trial_img_ans.push("wrong");
            trial_img_ans_time.push(time_counter_right - last_time_count);
          }

          set_current_time(time_counter_right);

    }
function left_btn_for_sunday(){
        time_counter_left = performance.now();
        console.log("Left button clicked" + (time_counter_left - last_time_count) + " milliseconds.")
        if( slideIndex === trial_image_count){
            $("#btn_<?php echo $id;?>").prop('disabled', false);
        }
        $('#btn_yes').prop('disabled', true);
        $('#btn_no').prop('disabled', true);
        $(".mySlides").on('click touch', function () {
            plusSlides(1);
            $("#feedback_correct").hide();
            $("#feedback_wrong").hide();
         });
        var str = $('#selectionId').val();
        var sliced_str = str.slice(str.lastIndexOf('t1') + 2);
        var res = sliced_str.substr(0, 1);

        if(res === 'r'){
          $("#feedback_correct").show();
          trial_img_name.push(str);
          trial_img_ans.push("correct");
          trial_img_ans_time.push(time_counter_left - last_time_count);
        }else{
          $("#feedback_wrong").show();
          trial_img_name.push(str);
          trial_img_ans.push("wrong");
          trial_img_ans_time.push(time_counter_left - last_time_count);
        }

        set_current_time(time_counter_left);
   }

// <?php 
//   $t_img_name = '';
//   $t_img_ans = '';
//   $t_img_ans_time = '';
// ?>

$('body').on('next', function(e, type){

  if (type === '<?php echo $id;?>'){
    $.ajax({
        type        : 'POST',  
        url         : 'ajax/test.php',  
        data        : {"trial_img_name_array" : JSON.stringify(trial_img_name), "trial_img_ans_array" : JSON.stringify(trial_img_ans), "trial_img_time_array" : JSON.stringify(trial_img_ans_time)}, // Our data object
        dataType    : 'json',  
        beforeSend : function() {
            // This will run before sending an Ajax request.
            // Do whatever activity you want, like show loaded.
        },
        success:function(response){
            var obj = eval(response);
            if(obj)
            {
                if(obj.error==0){
                    // alert('success');
                }
                else{
                    // alert('error');
                }
            }
        },
        complete : function() {
            // This will run after sending an Ajax complete
        },
        error:function (xhr, ajaxOptions, thrownError){
            // alert('error occured');
            // If any error occurs in request
        }
    });

  }
     
    event.preventDefault();
});

</script>

<!-- participant, timestamp, chart, elements, trial, file, time, answer -->


<!-- P1, 2.5843E+14, s1, t1, 0, s1_32_t1rt2lt3r, 2342371247, correct/error -->
