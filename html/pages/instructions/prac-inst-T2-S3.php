<style>
.training_T2S3_page_slide:not(:first-child) {
    display: none;
}
.controls {
    width: 200px;
}
.pre {
    float: left;
}

.training_T2S3_page_understand_btn {
    float: right;
}

.img-container {
     text-align: center;
}

</style>

<div class="row">
  <div class="col">
  <div class="container">
  <div class="mt-1 d-flex justify-content-center section-header">
        <h4>Training Instructions: Tall size visualization</h4>
      </div>

    <div id="training_T2S3">
        <div class="visible training_T2S3_page_slide">
        <p>&#10148; During your training trials, you will be shown the same Wide size images as before but the image will vary each time.</p>
           <p>&#10148; If bedtime is later than (22:00) on 4 or more days in the week, press the YES button otherwise NO.</p>
           <figure class="img-container" style="margin-top:-10px">
                <img src="img/instruction/answer-button-T2T3.png" style="width:120px !important; "  alt="Task two answer button">
                <figcaption class="figure-caption">Example of answer buttons.</figcaption>
           
            <div class="row" style="margin-top:10px">
                <div class="col-sm-12">
                    <h5 class="d-inline-block align-middle text-muted training_T2S3_counter_display"></h5>
                    <button type="button" class="btn btn-warning training_T2S3_page_understand_btn" style="width:80%">I understand</button>
                </div>
            </div>
            
        </div>
        <div class="visible training_T2S3_page_slide">
        <p>&#10148; Only during training - each time you submit an answer, you will see feedback on a popup window, whether your answer choice is correct or wrong.</p>
            <div class="img-container" >
                  <img src="img/instruction/click-S3.png" style="height:180px !important;"  alt="feedback popup">
           </div>
           <div class="mt-4"></div>
            <div class="row" style="margin-top:10px">
                <div class="col-sm-12">
                    <h5 class="d-inline-block align-middle text-muted training_T2S3_counter_display"></h5>
                    <button type="button" class="btn btn-warning training_T2S3_page_understand_btn" style="width:80%">I understand</button>
                </div>
            </div>
        </div>

        <div class="visible training_T2S3_page_slide">
        <p>&#10148; The next training image will come after 5 seconds (you'll see a loading bar for this 5s) and the popup window will close automatically, or you can press the <strong>Next</strong> button for the next image if you don't want to wait for 5s.</p>
            <p>&#10148; It is ok if you do not answer correctly. Make a quick good guess of the right answer, but do not try to measure or calculate correct answers.</p>
        </div>


</div>

    <div id="training_T2S3_page_comment">
        <p class="text-muted"> Click <strong>Next</strong> to proceed to the training trials.</p>
    </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    let count = 1;
    function updateDisplay(){
        $('.training_T2S3_counter_display').text(count +"/3")
    };

    updateDisplay();
    
    $("#training_T2S3_page_comment").hide();
    $("#btn_<?php echo $id;?>").hide();
    $(".training_T2S3_page_understand_btn").click(function() {
      count++;
      updateDisplay();
      var current_div = $('#training_T2S3 .training_T2S3_page_slide.visible').first();
      var next_div = current_div.next();
      current_div.removeClass("visible").hide();
      next_div.addClass("visible").show();
      if (!next_div.next().length) {
          $('.training_T2S3_counter_display').hide();
          $('.training_T2S3_page_understand_btn').hide();
          $("#training_T2S3_page_comment").show();
          $("#btn_<?php echo $id;?>").show();
      }
  });

       
});


</script>

